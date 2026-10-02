<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\SEO;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Technical SEO Analyzer.
 * Validates title tags, meta descriptions, canonical URLs, robots indexing directives, and OpenGraph tags.
 */
final class TechnicalSeoAnalyzer implements AnalyzerInterface
{
    public function getId(): string
    {
        return 'seo';
    }

    public function getName(): string
    {
        return __('SEO Teknis & Meta Tag', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::SEO;
    }

    public function getDescription(): string
    {
        return __('Memverifikasi tag Title, Meta Description, Canonical URL, direktif Robots, dan metadata OpenGraph.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();

        // 1. Title Tag
        $titleNodes = $xpath->query('//title');
        if (!$titleNodes || $titleNodes->length === 0) {
            $findings[] = Finding::issue(
                id: 'seo-missing-title',
                analyzerId: $this->getId(),
                severity: Severity::CRITICAL,
                title: 'Halaman Tidak Memiliki Tag <title>',
                description: 'Tag <title> tidak ditemukan di dalam dokumen HTML.',
                whyItMatters: 'Judul halaman adalah faktor penentu peringkat dan teks utama yang diklik pencari di Google SERP.',
                recommendation: 'Tambahkan tag <title> deskriptif berisi kata kunci target utama dan nama brand (35 - 60 karakter).',
                location: 'head > title'
            );
        } else {
            $titleText = trim($titleNodes->item(0)->textContent);
            $titleLen = mb_strlen($titleText);

            if ($titleLen < 25) {
                $findings[] = Finding::issue(
                    id: 'seo-title-too-short',
                    analyzerId: $this->getId(),
                    severity: Severity::WARNING,
                    title: sprintf('Tag Title Terlalu Pendek (%d karakter)', $titleLen),
                    description: sprintf('Judul saat ini: "%s". Panjang ideal adalah 35 - 60 karakter.', $titleText),
                    whyItMatters: 'Judul yang terlalu singkat melewatkan peluang menyertakan kata kunci pencarian yang relevan.',
                    recommendation: 'Perpanjang judul dengan menambahkan kata manfaat utama atau nama brand di akhir (misal: "Peluang Usaha Laundry Kiloan Menguntungkan | Cleanique Laundry").',
                    location: 'head > title'
                );
            } elseif ($titleLen > 65) {
                $findings[] = Finding::issue(
                    id: 'seo-title-too-long',
                    analyzerId: $this->getId(),
                    severity: Severity::WARNING,
                    title: sprintf('Tag Title Berisiko Terpotong di Google SERP (%d karakter)', $titleLen),
                    description: sprintf('Judul "%s" melebihi batas tampilan standar Google (maksimal sekitar 60 karakter).', $titleText),
                    whyItMatters: 'Judul yang terpotong (...) dapat menghilangkan kalimat ajakan bertindak (CTA) dan menurunkan Click-Through Rate (CTR).',
                    recommendation: 'Padatkan judul agar pesan utama dan brand selesai sebelum karakter ke-60.',
                    location: 'head > title'
                );
            } else {
                $findings[] = Finding::success(
                    id: 'seo-title-optimal',
                    analyzerId: $this->getId(),
                    title: sprintf('Panjang Tag Title Sangat Optimal (%d karakter)', $titleLen),
                    description: sprintf('Judul: "%s"', esc_html($titleText)),
                    location: 'head > title'
                );
            }
        }

        // 2. Meta Description
        $metaDescNodes = $xpath->query('//meta[translate(@name, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="description"]/@content');
        if (!$metaDescNodes || $metaDescNodes->length === 0) {
            $findings[] = Finding::issue(
                id: 'seo-missing-meta-description',
                analyzerId: $this->getId(),
                severity: Severity::ERROR,
                title: 'Meta Description Tidak Ditemukan',
                description: 'Tidak ada tag <meta name="description" content="..."> pada halaman ini.',
                whyItMatters: 'Tanpa meta deskripsi yang ditentukan, Google akan memilih potongan acak dari halaman yang seringkali kurang persuasif bagi calon pengunjung.',
                recommendation: 'Tulis meta deskripsi menarik sepanjang 130 - 155 karakter yang memuat kalimat penawaran dan ajakan bertindak.',
                location: 'head > meta[name=description]'
            );
        } else {
            $descText = trim($metaDescNodes->item(0)->textContent);
            $descLen = mb_strlen($descText);

            if ($descLen < 80) {
                $findings[] = Finding::issue(
                    id: 'seo-meta-desc-too-short',
                    analyzerId: $this->getId(),
                    severity: Severity::WARNING,
                    title: sprintf('Meta Description Terlalu Singkat (%d karakter)', $descLen),
                    description: sprintf('Deskripsi saat ini: "%s". Panjang ideal: 120 - 155 karakter.', $descText),
                    whyItMatters: 'Deskripsi pendek menyisakan ruang kosong di snippet hasil pencarian dan kurang meyakinkan pencari.',
                    recommendation: 'Perluas penjelasan dengan mencantumkan garansi, keunggulan, atau nilai tambah layanan.',
                    location: 'head > meta[name=description]'
                );
            } elseif ($descLen > 165) {
                $findings[] = Finding::issue(
                    id: 'seo-meta-desc-too-long',
                    analyzerId: $this->getId(),
                    severity: Severity::NOTICE,
                    title: sprintf('Meta Description Melebihi Batas Snippet SERP (%d karakter)', $descLen),
                    description: 'Teks deskripsi akan terpotong dengan tanda titik tiga (...) di halaman hasil pencarian.',
                    whyItMatters: 'Pesan penting yang berada di ujung kalimat mungkin tidak terbaca oleh calon pengunjung.',
                    recommendation: 'Persingkat deskripsi menjadi di bawah 160 karakter tanpa menghilangkan daya tarik penawaran.',
                    location: 'head > meta[name=description]'
                );
            } else {
                $findings[] = Finding::success(
                    id: 'seo-meta-desc-optimal',
                    analyzerId: $this->getId(),
                    title: sprintf('Panjang Meta Description Sangat Presisi (%d karakter)', $descLen),
                    description: sprintf('Deskripsi: "%s"', esc_html($descText)),
                    location: 'head > meta[name=description]'
                );
            }
        }

        // 3. Canonical Tag
        $canonicalNodes = $xpath->query('//link[translate(@rel, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="canonical"]/@href');
        if (!$canonicalNodes || $canonicalNodes->length === 0) {
            $findings[] = Finding::issue(
                id: 'seo-missing-canonical',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: 'Tag Canonical URL Belum Terpasang',
                description: 'Tidak ditemukan tag <link rel="canonical" href="..."> di dalam bagian <head>.',
                whyItMatters: 'Canonical tag mencegah masalah duplikasi konten apabila halaman diakses via parameter tracking, variasi URL slash, atau HTTP/HTTPS.',
                recommendation: 'Tambahkan tag canonical yang menunjuk ke URL permanen kanonikal halaman ini.',
                location: 'head > link[rel=canonical]'
            );
        } else {
            $canonicalHref = trim($canonicalNodes->item(0)->textContent);
            $findings[] = Finding::success(
                id: 'seo-canonical-present',
                analyzerId: $this->getId(),
                title: 'Tag Canonical URL Aktif dan Terpasang',
                description: sprintf('Canonical: %s', esc_html($canonicalHref)),
                location: 'head > link[rel=canonical]'
            );
        }

        // 4. Meta Robots noindex check
        $robotsNodes = $xpath->query('//meta[translate(@name, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="robots"]/@content');
        if ($robotsNodes && $robotsNodes->length > 0) {
            $robotsVal = strtolower($robotsNodes->item(0)->textContent);
            if (str_contains($robotsVal, 'noindex')) {
                $findings[] = Finding::issue(
                    id: 'seo-robots-noindex-detected',
                    analyzerId: $this->getId(),
                    severity: Severity::CRITICAL,
                    title: 'Halaman Berstatus noindex (Tidak Akan Masuk Google)',
                    description: sprintf('Tag meta robots memuat direktif "%s".', $robotsVal),
                    whyItMatters: 'Direktif noindex secara sengaja melarang mesin pencari menampilkan halaman ini di hasil pencarian publik.',
                    recommendation: 'Jika halaman ini dimaksudkan untuk umum, hapus direktif noindex di pengaturan SEO atau WordPress Settings > Reading.',
                    location: 'head > meta[name=robots]'
                );
            }
        }

        // 5. OpenGraph Tags (og:title, og:image)
        $ogTitleNodes = $xpath->query('//meta[@property="og:title"]/@content');
        $ogImageNodes = $xpath->query('//meta[@property="og:image"]/@content');

        if (!$ogTitleNodes || $ogTitleNodes->length === 0 || !$ogImageNodes || $ogImageNodes->length === 0) {
            $findings[] = Finding::issue(
                id: 'seo-incomplete-opengraph',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Metadata OpenGraph (og:title / og:image) Belum Lengkap',
                description: 'Tag OpenGraph untuk pratinjau kartu media sosial (WhatsApp, Facebook, Twitter/X) belum sepenuhnya terpasang.',
                whyItMatters: 'Saat tautan dibagikan di chat WhatsApp atau media sosial, kartu tautan tidak akan menampilkan gambar banner yang menarik.',
                recommendation: 'Tambahkan tag og:title, og:description, dan og:image dengan gambar beresolusi minimal 1200x630 piksel.',
                location: 'head > meta[property^=og:]'
            );
        } else {
            $findings[] = Finding::success(
                id: 'seo-opengraph-complete',
                analyzerId: $this->getId(),
                title: 'Pratinjau OpenGraph Siap untuk Media Sosial & WhatsApp',
                description: 'Tag og:title dan og:image terpasang dengan benar.',
                location: 'head'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
