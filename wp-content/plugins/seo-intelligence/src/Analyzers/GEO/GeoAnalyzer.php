<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\GEO;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Generative Engine Optimization (GEO) Analyzer.
 * Measures readiness for AI citation engines (Perplexity, Gemini Overviews, ChatGPT Search).
 * Evaluates entity clarity, factual statistics, definitional sentences, and E-E-A-T signals.
 */
final class GeoAnalyzer implements AnalyzerInterface
{
    public function getId(): string
    {
        return 'geo';
    }

    public function getName(): string
    {
        return __('GEO (Generative Engine Optimization)', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::GEO;
    }

    public function getDescription(): string
    {
        return __('Menguji kesiapan konten untuk dikutip dan dirangkum oleh mesin pencari AI (Google Gemini, Perplexity, ChatGPT).', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $cleanText = $context->getCleanText();
        $lowerText = mb_strtolower($cleanText);

        // 1. Entity Definition Clarity (e.g. "[Brand] adalah...")
        // LLMs look for explicit entity definitions to cite in knowledge graphs.
        $hasDefinition = preg_match('/\b(adalah|merupakan|yaitu|yakni)\b/u', $lowerText);
        if (!$hasDefinition) {
            $findings[] = Finding::issue(
                id: 'geo-missing-clear-definition',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: 'Belum Memuat Kalimat Definisi Entitas yang Tegas',
                description: 'Tidak ditemukan pola kalimat definisi eksplisit (misal: "[Nama Brand] adalah penyedia layanan...").',
                whyItMatters: 'Model Generative AI (LLM) memprioritaskan kalimat definisi langsung yang diawali kata "adalah" atau "merupakan" untuk disarikan ke dalam AI Overview.',
                recommendation: 'Sertakan kalimat deklaratif di paragraf awal yang dengan tegas menjelaskan identitas layanan dan bidang bisnis Anda.',
                location: 'body > p:first-of-type'
            );
        } else {
            $findings[] = Finding::success(
                id: 'geo-definition-present',
                analyzerId: $this->getId(),
                title: 'Definisi Entitas Eksplisit Ditemukan',
                description: 'Konten memiliki struktur kalimat deklaratif yang mudah disarikan oleh mesin generative AI.',
                location: 'body'
            );
        }

        // 2. Factual Numbers & Statistics Density
        // LLMs strongly favor synthesizing concrete data points (percentages, prices, years, counts)
        preg_match_all('/\b(?:\d+[\.,]?\d*|\d+%)|\b(?:rp\s*[\d\.]+)\b/ui', $cleanText, $numMatches);
        $numberCount = count($numMatches[0] ?? []);

        if ($numberCount < 2) {
            $findings[] = Finding::issue(
                id: 'geo-low-data-density',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Kepadatan Data Angka & Fakta Tergolong Rendah',
                description: sprintf('Hanya ditemukan %d data numerik pada teks.', $numberCount),
                whyItMatters: 'Mesin AI seperti Perplexity dan SearchGPT lebih sering mengutip sumber yang menyajikan angka konkret, statistik, atau estimasi terukur.',
                recommendation: 'Tambahkan data konkret seperti estimasi modal, lama pengerjaan (jam/hari), kapasitas mesin, atau persentase margin keuntungan.',
                location: 'body'
            );
        } else {
            $findings[] = Finding::success(
                id: 'geo-data-density-good',
                analyzerId: $this->getId(),
                title: sprintf('Kepadatan Fakta & Angka Sangat Baik (%d data numerik)', $numberCount),
                description: 'Teks kaya akan fakta terukur yang siap dirangkum menjadi tabel perbandingan AI.',
                location: 'body'
            );
        }

        // 3. E-E-A-T & Contact Authority Signals (Phone, Email, Address, Brand)
        $hasPhone = preg_match('/\b(?:\+?62|08)\d{8,13}\b/', $cleanText);
        $hasAddress = preg_match('/\b(?:jl\.|jalan|ruko|komplek|kota|kabupaten|provinsi|indonesia)\b/ui', $cleanText);

        if (!$hasPhone && !$hasAddress) {
            $findings[] = Finding::issue(
                id: 'geo-missing-contact-signals',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Minim Sinyal Keberadaan Bisnis Fisik (NAP Signals)',
                description: 'Tidak terdeteksi nomor telepon resmi atau alamat fisik pada teks halaman ini.',
                whyItMatters: 'LLM mengandalkan konsistensi NAP (Name, Address, Phone) untuk memverifikasi keabsahan entitas bisnis lokal.',
                recommendation: 'Cantumkan informasi kontak resmi atau tautan ke halaman Kontak di footer.',
                location: 'footer'
            );
        } else {
            $findings[] = Finding::success(
                id: 'geo-contact-signals-valid',
                analyzerId: $this->getId(),
                title: 'Sinyal Otoritas Bisnis Lokal (E-E-A-T) Terdeteksi',
                description: 'Informasi kontak dan lokasi fisik terkonfirmasi pada konten.',
                location: 'body'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
