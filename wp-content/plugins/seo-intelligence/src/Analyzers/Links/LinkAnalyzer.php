<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\Links;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Links Distribution & Anchor Text Quality Analyzer.
 * Validates internal link equity, empty links, generic anchor text, and external link security.
 */
final class LinkAnalyzer implements AnalyzerInterface
{
    private const GENERIC_ANCHORS = [
        'klik di sini', 'klik disini', 'click here', 'baca selengkapnya',
        'read more', 'link', 'tautan', 'di sini', 'disini', 'more', 'info'
    ];

    public function getId(): string
    {
        return 'links';
    }

    public function getName(): string
    {
        return __('Distribusi Tautan & Teks Jangkar (Anchor)', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::LINKS;
    }

    public function getDescription(): string
    {
        return __('Menganalisis tautan internal/eksternal, mendeteksi teks jangkar generik (klik di sini), dan tautan kosong.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();
        $links = $xpath->query('//a[@href]');

        if (!$links || $links->length === 0) {
            $findings[] = Finding::issue(
                id: 'links-no-links-found',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: 'Tidak Ditemukan Tautan pada Halaman Ini',
                description: 'Halaman tidak memiliki tautan internal maupun tautan keluar sama sekali.',
                whyItMatters: 'Halaman tanpa tautan memutus alur penelusuran (crawl path) Googlebot dan mempersulit pengunjung menemukan halaman terkait.',
                recommendation: 'Tambahkan tautan internal ke halaman layanan, kontak, atau artikel terkait.',
                location: 'body'
            );

            return new AnalysisResult($this->getId(), $this->getCategory(), $findings);
        }

        $homeHost = wp_parse_url(home_url(), PHP_URL_HOST);
        $internalCount = 0;
        $externalCount = 0;
        $emptyHrefCount = 0;
        $genericAnchorCount = 0;
        $unsafeBlankCount = 0;

        foreach ($links as $link) {
            /** @var \DOMElement $link */
            $href = trim($link->getAttribute('href'));
            $text = trim(preg_replace('/\s+/', ' ', $link->textContent) ?? '');
            $target = strtolower($link->getAttribute('target'));
            $rel = strtolower($link->getAttribute('rel'));

            // 1. Empty / Placeholder Links
            if (empty($href) || $href === '#' || str_starts_with($href, 'javascript:')) {
                $emptyHrefCount++;
                continue;
            }

            // 2. Classify internal vs external
            $host = wp_parse_url($href, PHP_URL_HOST);
            if (empty($host) || $host === $homeHost) {
                $internalCount++;
            } else {
                $externalCount++;

                // Security check for target="_blank"
                if ($target === '_blank' && !str_contains($rel, 'noopener') && !str_contains($rel, 'noreferrer')) {
                    $unsafeBlankCount++;
                }
            }

            // 3. Generic Anchor Check
            $lowerText = strtolower($text);
            if (in_array($lowerText, self::GENERIC_ANCHORS, true)) {
                $genericAnchorCount++;
            }
        }

        // Findings:
        // Internal Links
        if ($internalCount === 0) {
            $findings[] = Finding::issue(
                id: 'links-zero-internal',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: 'Halaman Tidak Memiliki Tautan Internal',
                description: 'Tidak ada link yang mengarah ke halaman lain di dalam website ini.',
                whyItMatters: 'Tautan internal mendistribusikan PageRank dan otoritas domain ke seluruh bagian website Anda.',
                recommendation: 'Sisipkan link kontekstual ke halaman terkait (misal paket usaha, cabang laundry, atau testimoni).',
                location: 'body'
            );
        } else {
            $findings[] = Finding::success(
                id: 'links-internal-healthy',
                analyzerId: $this->getId(),
                title: sprintf('Tautan Internal Aktif (%d tautan)', $internalCount),
                description: 'Halaman terhubung dengan baik ke bagian lain dari arsitektur website.',
                location: 'body'
            );
        }

        // Generic Anchor Text
        if ($genericAnchorCount > 0) {
            $findings[] = Finding::issue(
                id: 'links-generic-anchors-detected',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: sprintf('Ditemukan %d Tautan dengan Teks Jangkar Generik ("klik di sini")', $genericAnchorCount),
                description: 'Terdapat link yang menggunakan kata "klik di sini", "baca selengkapnya", atau teks generik lainnya.',
                whyItMatters: 'Google menggunakan teks jangkar (anchor text) untuk memahami subjek halaman yang dituju. Kata generik menyia-nyiakan nilai semantik tautan.',
                recommendation: 'Ganti dengan kata kunci deskriptif yang menerangkan topik tujuan (misal: "Lihat rincian paket usaha laundry" alih-alih "klik di sini").',
                location: 'a'
            );
        }

        // Empty Href
        if ($emptyHrefCount > 0) {
            $findings[] = Finding::issue(
                id: 'links-empty-href',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: sprintf('Ditemukan %d Tautan Kosong atau Menggunakan href="#"', $emptyHrefCount),
                description: 'Tautan mengarah ke tanda pagar (#) atau javascript kosong.',
                whyItMatters: 'Tautan kosong dapat menjebak bot perayap dan membingungkan pengguna yang mengharapkan navigasi halaman.',
                recommendation: 'Ganti elemen tersebut dengan tag <button> jika untuk fungsi interaktif, atau berikan URL tujuan yang sah.',
                location: 'a[href="#"]'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
