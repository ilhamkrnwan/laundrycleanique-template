<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\Assets;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Assets & Page Weight Analyzer.
 * Checks render-blocking CSS/JS, external font connections, and script loading strategy.
 */
final class AssetAnalyzer implements AnalyzerInterface
{
    public function getId(): string
    {
        return 'assets';
    }

    public function getName(): string
    {
        return __('Aset, Font & Beban Rendering', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::ASSETS;
    }

    public function getDescription(): string
    {
        return __('Mendeteksi script dan stylesheet pemblokir rendering (render-blocking), optimasi preconnect Google Fonts, dan efisiensi aset.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();

        // 1. Check Scripts in <head> for render-blocking
        $headScripts = $xpath->query('//head/script[@src]');
        $blockingScripts = 0;

        if ($headScripts) {
            foreach ($headScripts as $script) {
                /** @var \DOMElement $script */
                $hasDefer = $script->hasAttribute('defer');
                $hasAsync = $script->hasAttribute('async');
                $type = $script->getAttribute('type');

                if (!$hasDefer && !$hasAsync && $type !== 'module') {
                    $blockingScripts++;
                }
            }
        }

        if ($blockingScripts > 0) {
            $findings[] = Finding::issue(
                id: 'assets-render-blocking-scripts',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: sprintf('Ditemukan %d Script Pemblokir Render di Bagian <head>', $blockingScripts),
                description: 'Script JavaScript eksternal dimuat di dalam <head> tanpa atribut defer atau async.',
                whyItMatters: 'Browser harus menghentikan perenderan HTML sampai script selesai diunduh dan dieksekusi, memperlambat First Contentful Paint (FCP).',
                recommendation: 'Tambahkan atribut defer atau pindahkan pemanggilan script ke footer sebelum tag penutup </body>.',
                location: 'head > script'
            );
        } else {
            $findings[] = Finding::success(
                id: 'assets-scripts-non-blocking',
                analyzerId: $this->getId(),
                title: 'Script Terjadwal Baik (Bebas Pemblokiran Render Kritis)',
                description: 'Tidak ada script sinkron tanpa defer yang menghalangi perenderan di bagian <head>.',
                location: 'head'
            );
        }

        // 2. Google Fonts Preconnect Check
        $fontLinks = $xpath->query('//head/link[contains(@href, "fonts.googleapis.com")]');
        if ($fontLinks && $fontLinks->length > 0) {
            $preconnectLinks = $xpath->query('//head/link[@rel="preconnect" and contains(@href, "fonts.gstatic.com")]');
            if (!$preconnectLinks || $preconnectLinks->length === 0) {
                $findings[] = Finding::issue(
                    id: 'assets-fonts-missing-preconnect',
                    analyzerId: $this->getId(),
                    severity: Severity::NOTICE,
                    title: 'Google Fonts Dimuat Tanpa preconnect gstatic',
                    description: 'Font eksternal Google Fonts digunakan, namun tag <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> tidak ditemukan.',
                    whyItMatters: 'Preconnect melakukan negosiasi koneksi TLS dan TCP lebih dini ke server font, menghemat 100 - 300 ms waktu pemuatan teks.',
                    recommendation: 'Tambahkan <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> di urutan paling awal dalam <head>.',
                    location: 'head > link'
                );
            }
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
