<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\Readability;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Indonesian-First Readability Analyzer.
 * Tailored specifically for Bahasa Indonesia linguistic morphology, sentence length, and transition logic.
 */
final class ReadabilityAnalyzer implements AnalyzerInterface
{
    /**
     * Common Indonesian Transition Words & Conjunctions (Kata Penghubung Antar-kalimat & Intra-kalimat).
     */
    private const ID_TRANSITION_WORDS = [
        'selain itu', 'namun', 'oleh karena itu', 'dengan demikian', 'sedangkan',
        'sebagai contoh', 'di samping itu', 'maka dari itu', 'selanjutnya',
        'bahkan', 'akibatnya', 'meskipun demikian', 'sebaliknya', 'walaupun begitu',
        'pada akhirnya', 'terlebih lagi', 'khususnya', 'seperti halnya', 'oleh sebab itu',
        'pada dasarnya', 'dalam hal ini', 'singkatnya', 'dengan kata lain'
    ];

    public function getId(): string
    {
        return 'readability';
    }

    public function getName(): string
    {
        return __('Keterbacaan Bahasa Indonesia', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::READABILITY;
    }

    public function getDescription(): string
    {
        return __('Menguji kompleksitas kalimat, silabel kata, kata penghubung (transisi), dan kenyamanan membaca Bahasa Indonesia.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $cleanText = $context->getCleanText();

        if (mb_strlen($cleanText) < 80) {
            $findings[] = Finding::issue(
                id: 'readability-no-text',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Teks Terlalu Singkat Untuk Evaluasi Keterbacaan',
                description: 'Tidak cukup teks kalimat untuk menghitung metrik keterbacaan secara akurat.',
                whyItMatters: 'Metrik keterbacaan membutuhkan korpus kalimat yang memadai.',
                recommendation: 'Tambahkan materi konten yang lengkap.',
                location: 'body'
            );

            return new AnalysisResult($this->getId(), $this->getCategory(), $findings);
        }

        // 1. Sentence Segmentation
        // Split sentences by '.', '!', '?'
        $sentences = preg_split('/[.!?]+(?:\s+|$)/u', $cleanText, -1, PREG_SPLIT_NO_EMPTY) ?: [];
        $totalSentences = count($sentences);

        $longSentences = 0;
        $totalWords = 0;
        $transitionCount = 0;
        $lowerText = mb_strtolower($cleanText);

        // Count occurrences of transition phrases
        foreach (self::ID_TRANSITION_WORDS as $phrase) {
            $transitionCount += substr_count($lowerText, $phrase);
        }

        foreach ($sentences as $sentence) {
            $sentenceWords = preg_split('/\s+/u', trim($sentence), -1, PREG_SPLIT_NO_EMPTY) ?: [];
            $wCount = count($sentenceWords);
            $totalWords += $wCount;

            // Flag sentences with > 22 words in Indonesian as complex
            if ($wCount > 22) {
                $longSentences++;
            }
        }

        $avgSentenceWords = $totalSentences > 0 ? round($totalWords / $totalSentences, 1) : 0;
        $longSentencePct = $totalSentences > 0 ? round(($longSentences / $totalSentences) * 100, 1) : 0;

        // 2. Evaluate Average Sentence Length
        if ($avgSentenceWords > 22) {
            $findings[] = Finding::issue(
                id: 'readability-avg-sentence-long',
                analyzerId: $this->getId(),
                severity: Severity::ERROR,
                title: sprintf('Rata-rata Kalimat Terlalu Panjang (%.1f kata/kalimat)', $avgSentenceWords),
                description: 'Rata-rata panjang kalimat melebihi ambang batas ideal Bahasa Indonesia (standar: 14 - 18 kata).',
                whyItMatters: 'Kalimat yang panjang menurunkan retensi pembaca, meningkatkan tingkat kebingungan, dan mempersulit AI model dalam menyarikan jawaban langsung (AEO).',
                recommendation: 'Gunakan tanda titik lebih sering daripada koma atau kata sambung "dan/yang" bertumpuk.',
                location: 'body',
                metadata: ['avg_sentence_words' => $avgSentenceWords]
            );
        } elseif ($longSentencePct > 25.0) {
            $findings[] = Finding::issue(
                id: 'readability-high-long-sentence-pct',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: sprintf('%.1f%% Kalimat Melebihi 22 Kata', $longSentencePct),
                description: sprintf('Terdapat %d kalimat panjang dari total %d kalimat.', $longSentences, $totalSentences),
                whyItMatters: 'Lebih dari 20% kalimat panjang membuat artikel terasa berat dan melelahkan dibaca.',
                recommendation: 'Pecah kalimat majemuk bertingkat menjadi dua kalimat tunggal yang tegas.',
                location: 'body'
            );
        } else {
            $findings[] = Finding::success(
                id: 'readability-sentence-length-good',
                analyzerId: $this->getId(),
                title: sprintf('Panjang Kalimat Sangat Seimbang (%.1f kata/kalimat)', $avgSentenceWords),
                description: 'Ritme kalimat nyaman dan mudah dicerna oleh pembaca dari berbagai kalangan.',
                location: 'body'
            );
        }

        // 3. Transition Words (Kata Penghubung Alur)
        $transitionRatio = $totalSentences > 0 ? round(($transitionCount / $totalSentences) * 100, 1) : 0;
        if ($totalSentences >= 5 && $transitionRatio < 15.0) {
            $findings[] = Finding::issue(
                id: 'readability-low-transitions',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Alur Kalimat Minim Kata Penghubung / Transisi',
                description: sprintf('Hanya terdeteksi %d kata transisi pada %d kalimat (%.1f%%). Target ideal: minimal 15%%.', $transitionCount, $totalSentences, $transitionRatio),
                whyItMatters: 'Kata transisi seperti "selain itu", "namun", "oleh karena itu", "sebagai contoh" memandu alur logika berpikir pembaca dengan mulus.',
                recommendation: 'Sisipkan kata transisi yang relevan di awal kalimat penjelas atau kalimat simpulan.',
                location: 'body'
            );
        } else {
            $findings[] = Finding::success(
                id: 'readability-transitions-good',
                analyzerId: $this->getId(),
                title: 'Variasi Kata Penghubung Alur Sangat Baik',
                description: 'Artikel menggunakan kata transisi secara proporsional untuk menjembatani ide antar-paragraf.',
                location: 'body'
            );
        }

        // 4. Scannability: Lists check
        $xpath = $context->getXPath();
        $lists = $xpath->query('//ul | //ol');
        if ($totalWords > 400 && (!$lists || $lists->length === 0)) {
            $findings[] = Finding::issue(
                id: 'readability-no-lists',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Belum Memanfaatkan Daftar Berbutir (Bullet Points / Angka)',
                description: 'Halaman yang panjang belum memuat elemen <ul> atau <ol> untuk memecah daftar informasi.',
                whyItMatters: 'Pembaca daring melakukan "scanning" cepat. Format list memudahkan mata menangkap poin kunci secara instan.',
                recommendation: 'Ubah poin fitur, benefit, atau langkah-langkah kerja menjadi bullet points.',
                location: 'main'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
