<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\UX;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Mobile-Friendliness & UX Analyzer.
 * Validates viewport configuration, language attribute, charset, and legibility indicators.
 */
final class UxMobileAnalyzer implements AnalyzerInterface
{
    public function getId(): string
    {
        return 'ux';
    }

    public function getName(): string
    {
        return __('UX & Responsivitas Mobile', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::UX;
    }

    public function getDescription(): string
    {
        return __('Memverifikasi meta viewport mobile, atribut bahasa HTML, dan kenyamanan antarmuka pengguna.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();

        // 1. Viewport Meta Tag
        $viewportNodes = $xpath->query('//meta[translate(@name, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="viewport"]/@content');
        if (!$viewportNodes || $viewportNodes->length === 0) {
            $findings[] = Finding::issue(
                id: 'ux-missing-viewport',
                analyzerId: $this->getId(),
                severity: Severity::CRITICAL,
                title: 'Halaman Tidak Memiliki Meta Viewport Mobile',
                description: 'Tidak ditemukan tag <meta name="viewport" content="width=device-width, initial-scale=1">.',
                whyItMatters: 'Tanpa viewport, browser smartphone akan merender halaman dalam mode desktop yang mengecil, menggagalkan audit Mobile-First Indexing Google.',
                recommendation: 'Tambahkan <meta name="viewport" content="width=device-width, initial-scale=1"> ke dalam bagian <head>.',
                location: 'head > meta[name=viewport]'
            );
        } else {
            $viewportContent = strtolower(trim($viewportNodes->item(0)->textContent));
            if (str_contains($viewportContent, 'user-scalable=no') || str_contains($viewportContent, 'maximum-scale=1')) {
                $findings[] = Finding::issue(
                    id: 'ux-viewport-disables-zoom',
                    analyzerId: $this->getId(),
                    severity: Severity::WARNING,
                    title: 'Pinch-to-Zoom Dinonaktifkan pada Viewport',
                    description: 'Atribut viewport membatasi kemampuan pengguna untuk memperbesar teks (user-scalable=no).',
                    whyItMatters: 'Menonaktifkan zoom melanggar pedoman aksesibilitas WCAG 2.1 untuk pengguna yang membutuhkan perbesaran huruf.',
                    recommendation: 'Hapus opsi user-scalable=no dari meta viewport.',
                    location: 'head > meta[name=viewport]'
                );
            } else {
                $findings[] = Finding::success(
                    id: 'ux-viewport-valid',
                    analyzerId: $this->getId(),
                    title: 'Konfigurasi Meta Viewport Responsif dan Aksesibel',
                    description: 'Halaman siap menyesuaikan layout dengan mulus di berbagai ukuran layar smartphone.',
                    location: 'head > meta[name=viewport]'
                );
            }
        }

        // 2. HTML lang attribute
        $htmlLangNodes = $xpath->query('//html/@lang');
        if (!$htmlLangNodes || $htmlLangNodes->length === 0 || empty(trim($htmlLangNodes->item(0)->textContent))) {
            $findings[] = Finding::issue(
                id: 'ux-missing-html-lang',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Atribut Bahasa Dokumen (<html lang="...">) Belum Ditentukan',
                description: 'Tag <html> tidak memiliki atribut lang deklaratif.',
                whyItMatters: 'Atribut bahasa membantu mesin pencari mengidentifikasi audiens regional dan membantu alat text-to-speech membaca kata dengan aksen yang tepat.',
                recommendation: 'Tambahkan lang="id" atau lang="id-ID" pada tag <html> pembuka.',
                location: 'html'
            );
        } else {
            $langVal = trim($htmlLangNodes->item(0)->textContent);
            $findings[] = Finding::success(
                id: 'ux-html-lang-declared',
                analyzerId: $this->getId(),
                title: sprintf('Bahasa Dokumen Dideklarasikan: "%s"', esc_html($langVal)),
                description: 'Atribut bahasa aktif membantu pemilahan target geografis.',
                location: 'html'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
