<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\Headings;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Heading Hierarchy & Structure Analyzer.
 * Validates H1-H6 semantic hierarchy, single H1 rule, skipped levels, and heading lengths.
 */
final class HeadingAnalyzer implements AnalyzerInterface
{
    public function getId(): string
    {
        return 'headings';
    }

    public function getName(): string
    {
        return __('Struktur & Hierarki Heading', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::HEADINGS;
    }

    public function getDescription(): string
    {
        return __('Memeriksa aturan H1 tunggal, keteraturan urutan H1-H6 tanpa lompatan level, dan kelengkapan teks judul.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();

        // 1. Collect all heading elements in document order
        $headingNodes = $xpath->query('//h1 | //h2 | //h3 | //h4 | //h5 | //h6');
        $headingsList = [];
        $h1Count = 0;
        $emptyHeadingCount = 0;
        $tooLongHeadingCount = 0;

        if ($headingNodes) {
            foreach ($headingNodes as $node) {
                /** @var \DOMElement $node */
                $tag = strtolower($node->nodeName);
                $level = (int) substr($tag, 1);
                $text = trim(preg_replace('/\s+/', ' ', $node->textContent) ?? '');

                if ($level === 1) {
                    $h1Count++;
                }

                if (empty($text)) {
                    $emptyHeadingCount++;
                }

                if (mb_strlen($text) > 75) {
                    $tooLongHeadingCount++;
                }

                $headingsList[] = [
                    'tag'   => $tag,
                    'level' => $level,
                    'text'  => $text,
                ];
            }
        }

        // 2. Validate H1 Count
        if ($h1Count === 0) {
            $findings[] = Finding::issue(
                id: 'heading-missing-h1',
                analyzerId: $this->getId(),
                severity: Severity::CRITICAL,
                title: 'Halaman Tidak Memiliki Tag H1 (Judul Utama)',
                description: 'Tidak ditemukan elemen <h1> pada halaman ini.',
                whyItMatters: 'Tag H1 adalah sinyal hierarki terpenting bagi Google dan LLM AI untuk memahami topik primer sebuah halaman web.',
                recommendation: 'Tambahkan tepat satu elemen <h1> yang memuat kata kunci utama halaman secara alami.',
                location: 'body'
            );
        } elseif ($h1Count > 1) {
            $findings[] = Finding::issue(
                id: 'heading-multiple-h1',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: sprintf('Ditemukan %d Tag H1 (Disarankan Tepat Satu)', $h1Count),
                description: 'Terdapat lebih dari satu tag <h1> di dalam satu halaman.',
                whyItMatters: 'Beberapa H1 dapat mengaburkan fokus semantik topik utama halaman dan membingungkan pembaca layar (screen reader).',
                recommendation: 'Gunakan 1 H1 sebagai topik induk, lalu turunkan sub-bagian lainnya menjadi <h2>.',
                location: 'body'
            );
        } else {
            $findings[] = Finding::success(
                id: 'heading-single-h1-valid',
                analyzerId: $this->getId(),
                title: 'Tag H1 Tunggal Terdefinisi dengan Benar',
                description: sprintf('Judul H1: "%s"', esc_html(mb_strimwidth($headingsList[0]['text'] ?? '', 0, 60, '...'))),
                location: 'h1'
            );
        }

        // 3. Check for Skipped Levels (e.g. H2 -> H4 without H3)
        $skippedCount = 0;
        $prevLevel = 0;

        foreach ($headingsList as $h) {
            $currLevel = $h['level'];
            if ($prevLevel > 0 && $currLevel > ($prevLevel + 1)) {
                $skippedCount++;
                $findings[] = Finding::issue(
                    id: 'heading-skipped-level-' . $skippedCount,
                    analyzerId: $this->getId(),
                    severity: Severity::WARNING,
                    title: sprintf('Hierarki Melompat: <%s> Langsung Diikuti <%s>', 'h' . $prevLevel, $h['tag']),
                    description: sprintf('Judul "%s" melompati level tanpa perantara tag <h%d>.', esc_html(mb_strimwidth($h['text'], 0, 40, '...')), $prevLevel + 1),
                    whyItMatters: 'Hierarki semantik yang terputus merusak struktur Outline dokumen bagi mesin perayap dan alat bantu aksesibilitas WCAG.',
                    recommendation: sprintf('Ubah <%s> menjadi <h%d> atau tambahkan subjudul penengah.', $h['tag'], $prevLevel + 1),
                    location: $h['tag']
                );
            }
            $prevLevel = $currLevel;
        }

        if ($skippedCount === 0 && count($headingsList) > 1) {
            $findings[] = Finding::success(
                id: 'heading-hierarchy-clean',
                analyzerId: $this->getId(),
                title: 'Hierarki Heading Teratur dan Runtut',
                description: 'Tidak ada lompatan tingkatan level heading yang tidak wajar.',
                location: 'headings'
            );
        }

        // 4. Empty Headings
        if ($emptyHeadingCount > 0) {
            $findings[] = Finding::issue(
                id: 'heading-empty-tags',
                analyzerId: $this->getId(),
                severity: Severity::ERROR,
                title: sprintf('Ditemukan %d Tag Heading Kosong Tanpa Teks', $emptyHeadingCount),
                description: 'Terdapat tag heading yang dibuat namun tidak memuat teks konten apa pun.',
                whyItMatters: 'Tag heading kosong adalah kode sampah semantik yang membingungkan screen reader dan menurunkan skor audit teknis.',
                recommendation: 'Hapus elemen heading kosong atau isi dengan teks judul yang relevan.',
                location: 'headings'
            );
        }

        // 5. Excessively Long Headings
        if ($tooLongHeadingCount > 0) {
            $findings[] = Finding::issue(
                id: 'heading-too-long',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: sprintf('%d Heading Melebihi 75 Karakter', $tooLongHeadingCount),
                description: 'Judul sub-bagian terlalu panjang dan mendekati panjang paragraf.',
                whyItMatters: 'Heading harus ringkas, padat, dan berfungsi sebagai penanda navigasi visual.',
                recommendation: 'Persingkat judul heading menjadi 4 - 8 kata kunci yang tajam.',
                location: 'headings'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
