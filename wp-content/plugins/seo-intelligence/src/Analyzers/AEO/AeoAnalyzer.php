<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\AEO;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Answer Engine Optimization (AEO) Analyzer.
 * Validates question-based headings (5W+1H in Indonesian), direct answer paragraphs (35-65 words), and voice search readiness.
 */
final class AeoAnalyzer implements AnalyzerInterface
{
    private const QUESTION_WORDS_ID = [
        'apa', 'apakah', 'bagaimana', 'berapa', 'mengapa', 'kenapa',
        'siapa', 'dimana', 'kapan', 'cara'
    ];

    public function getId(): string
    {
        return 'aeo';
    }

    public function getName(): string
    {
        return __('AEO (Answer Engine Optimization)', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::AEO;
    }

    public function getDescription(): string
    {
        return __('Menguji struktur pertanyaan-jawaban langsung (Direct Answers) untuk Google Featured Snippets dan Voice Search.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();

        // 1. Search for Headings containing Question words
        $headings = $xpath->query('//h2 | //h3 | //h4');
        $questionHeadings = [];

        if ($headings) {
            foreach ($headings as $h) {
                /** @var \DOMElement $h */
                $text = trim($h->textContent);
                $lower = mb_strtolower($text);

                $isQuestion = false;
                if (str_ends_with($text, '?')) {
                    $isQuestion = true;
                } else {
                    foreach (self::QUESTION_WORDS_ID as $qw) {
                        if (preg_match('/\b' . preg_quote($qw, '/') . '\b/u', $lower)) {
                            $isQuestion = true;
                            break;
                        }
                    }
                }

                if ($isQuestion) {
                    $questionHeadings[] = [
                        'element' => $h,
                        'text'    => $text,
                    ];
                }
            }
        }

        // Evaluate Question Headings Presence
        if (empty($questionHeadings)) {
            $findings[] = Finding::issue(
                id: 'aeo-no-question-headings',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: 'Belum Ada Subjudul Berformat Pertanyaan (5W + 1H)',
                description: 'Tidak ditemukan heading (H2/H3) yang menggunakan format tanya (misal: "Berapa modal awal laundry?", "Bagaimana cara kerja sistem kemitraan?").',
                whyItMatters: 'Google Featured Snippets dan asisten suara memprioritaskan heading berbasis pertanyaan pengguna langsung untuk dijadikan cuplikan pilihan di posisi 0.',
                recommendation: 'Tambahkan setidaknya 2 - 3 subjudul yang mengantisipasi pertanyaan paling umum dari calon pelanggan Anda.',
                location: 'headings'
            );
        } else {
            $findings[] = Finding::success(
                id: 'aeo-question-headings-found',
                analyzerId: $this->getId(),
                title: sprintf('Ditemukan %d Subjudul Berformat Pertanyaan Ramah AEO', count($questionHeadings)),
                description: sprintf('Contoh: "%s"', esc_html(mb_strimwidth($questionHeadings[0]['text'], 0, 50, '...'))),
                location: 'headings'
            );

            // 2. Direct Answer Paragraph Check
            // Check the immediate next sibling paragraph after the question heading
            $optimalAnswerFound = false;
            foreach ($questionHeadings as $qh) {
                /** @var \DOMElement $hElem */
                $hElem = $qh['element'];
                $sibling = $hElem->nextSibling;

                while ($sibling !== null && $sibling->nodeType !== XML_ELEMENT_NODE) {
                    $sibling = $sibling->nextSibling;
                }

                if ($sibling && strtolower($sibling->nodeName) === 'p') {
                    $pWords = preg_split('/\s+/u', trim($sibling->textContent), -1, PREG_SPLIT_NO_EMPTY) ?: [];
                    $pCount = count($pWords);

                    // Ideal Featured Snippet length is between 35 and 65 words
                    if ($pCount >= 30 && $pCount <= 70) {
                        $optimalAnswerFound = true;
                        break;
                    }
                }
            }

            if ($optimalAnswerFound) {
                $findings[] = Finding::success(
                    id: 'aeo-direct-answer-optimal',
                    analyzerId: $this->getId(),
                    title: 'Paragraf Jawaban Langsung Sangat Presisi (30 - 70 kata)',
                    description: 'Terdapat jawaban padat langsung di bawah subjudul pertanyaan, format ideal untuk Google Featured Snippets.',
                    location: 'p'
                );
            } else {
                $findings[] = Finding::issue(
                    id: 'aeo-answer-paragraph-length',
                    analyzerId: $this->getId(),
                    severity: Severity::NOTICE,
                    title: 'Paragraf Jawaban Belum Optimal untuk Featured Snippet',
                    description: 'Paragraf pertama setelah subjudul pertanyaan terlalu panjang atau terlalu singkat.',
                    whyItMatters: 'Algoritma cuplikan pilihan Google paling menyukai jawaban to-the-point dengan panjang 40 - 60 kata yang langsung menjawab inti pertanyaan tanpa bertele-tele.',
                    recommendation: 'Tuliskan jawaban langsung dalam 1-2 kalimat padat (sekitar 40-50 kata) tepat di bawah heading pertanyaan sebelum penjelasan lanjutan.',
                    location: 'h2 + p'
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
