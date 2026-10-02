<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\Content;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Content Quality & Depth Analyzer.
 * Evaluates word counts, paragraph length, wall of text, and content substance.
 */
final class ContentAnalyzer implements AnalyzerInterface
{
    public function getId(): string
    {
        return 'content';
    }

    public function getName(): string
    {
        return __('Kualitas & Kedalaman Konten', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::CONTENT;
    }

    public function getDescription(): string
    {
        return __('Menganalisis volume kata, kepadatan paragraf, dan kelengkapan materi artikel.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $cleanText = $context->getCleanText();
        $words = preg_split('/\s+/u', $cleanText, -1, PREG_SPLIT_NO_EMPTY) ?: [];
        $wordCount = count($words);

        // 1. Check Total Word Count
        if ($wordCount < 100) {
            $findings[] = Finding::issue(
                id: 'content-extremely-thin',
                analyzerId: $this->getId(),
                severity: Severity::CRITICAL,
                title: sprintf('Konten Halaman Sangat Tipis (%d kata)', $wordCount),
                description: 'Halaman hanya memuat sangat sedikit teks atau teks belum terisi secara memadai.',
                whyItMatters: 'Mesin pencari seperti Google menganggap halaman di bawah 100 kata sebagai "thin content" atau stub, sehingga berisiko tidak diindeks atau dianggap berkualitas rendah.',
                recommendation: 'Tambahkan penjelasan komprehensif, rincian produk/layanan, atau informasi detail minimal 300 - 600 kata.',
                location: 'body'
            );
        } elseif ($wordCount < 300) {
            $findings[] = Finding::issue(
                id: 'content-low-word-count',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: sprintf('Jumlah Kata Relatif Sedikit (%d kata)', $wordCount),
                description: 'Halaman memiliki kurang dari 300 kata materi utama.',
                whyItMatters: 'Untuk bersaing di kata kunci kompetitif atau dikutip mesin AI, konten memerlukan kedalaman konteks dan elaborasi informasi yang cukup.',
                recommendation: 'Perkaya konten dengan sub-topik pendukung, studi kasus, FAQ, atau keunggulan spesifik.',
                location: 'body'
            );
        } else {
            $findings[] = Finding::success(
                id: 'content-word-count-good',
                analyzerId: $this->getId(),
                title: sprintf('Kedalaman Konten Memadai (%d kata)', $wordCount),
                description: 'Jumlah kata pada halaman mencukupi untuk memberikan konteks yang kaya bagi pengguna dan mesin perayap.',
                location: 'body'
            );
        }

        // 2. Wall of Text Detection (Paragraphs > 120 words)
        $xpath = $context->getXPath();
        $paragraphs = $xpath->query('//p');
        $longParagraphCount = 0;

        if ($paragraphs) {
            foreach ($paragraphs as $p) {
                $pText = trim($p->textContent);
                $pWords = preg_split('/\s+/u', $pText, -1, PREG_SPLIT_NO_EMPTY) ?: [];
                if (count($pWords) > 120) {
                    $longParagraphCount++;
                }
            }
        }

        if ($longParagraphCount > 0) {
            $findings[] = Finding::issue(
                id: 'content-wall-of-text',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: sprintf('Ditemukan %d Paragraf Terlalu Panjang (Wall of Text)', $longParagraphCount),
                description: 'Terdapat blok paragraf dengan lebih dari 120 kata tanpa jeda visual atau pemenggalan.',
                whyItMatters: 'Paragraf padat sangat melelahkan mata pengguna smartphone dan meningkatkan bounce rate.',
                recommendation: 'Pecah paragraf menjadi 2-4 kalimat ringkas per paragraf, dan gunakan bullet points untuk daftar fitur atau langkah.',
                location: 'p'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
