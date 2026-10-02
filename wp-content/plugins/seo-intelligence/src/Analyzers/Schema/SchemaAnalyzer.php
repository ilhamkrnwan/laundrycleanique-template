<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\Schema;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Structured Data (Schema.org JSON-LD) Analyzer.
 * Parses, validates, and identifies schema types such as LocalBusiness, FAQPage, Article, and Breadcrumbs.
 */
final class SchemaAnalyzer implements AnalyzerInterface
{
    public function getId(): string
    {
        return 'schema';
    }

    public function getName(): string
    {
        return __('Data Terstruktur & Schema JSON-LD', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::SCHEMA;
    }

    public function getDescription(): string
    {
        return __('Mengevaluasi sintaks JSON-LD dan keberadaan schema LocalBusiness, FAQPage, Organization, dan Breadcrumbs.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();

        $schemaScripts = $xpath->query('//script[@type="application/ld+json"]');

        if (!$schemaScripts || $schemaScripts->length === 0) {
            $findings[] = Finding::issue(
                id: 'schema-missing-jsonld',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: 'Tidak Ditemukan Schema JSON-LD pada Halaman',
                description: 'Tidak ada script terstruktur <script type="application/ld+json"> yang terpasang.',
                whyItMatters: 'Schema JSON-LD adalah bahasa universal yang memudahkan Google memahami entitas bisnis Anda untuk memicu Rich Snippets, FAQ dropdown, dan Google Maps knowledge panel.',
                recommendation: 'Tambahkan schema JSON-LD minimal LocalBusiness (DryCleaningOrLaundry) untuk bisnis laundry atau WebPage / Organization.',
                location: 'head'
            );

            return new AnalysisResult($this->getId(), $this->getCategory(), $findings);
        }

        $detectedTypes = [];
        $jsonSyntaxErrors = 0;

        foreach ($schemaScripts as $script) {
            $rawJson = trim($script->textContent);
            if (empty($rawJson)) {
                continue;
            }

            $decoded = json_decode($rawJson, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $jsonSyntaxErrors++;
                continue;
            }

            $this->extractTypes($decoded, $detectedTypes);
        }

        // 1. Syntax Errors
        if ($jsonSyntaxErrors > 0) {
            $findings[] = Finding::issue(
                id: 'schema-json-syntax-error',
                analyzerId: $this->getId(),
                severity: Severity::CRITICAL,
                title: sprintf('Ditemukan %d Skrip JSON-LD Mengalami Kesalahan Sintaks', $jsonSyntaxErrors),
                description: 'Format JSON di dalam skrip schema rusak atau tidak valid.',
                whyItMatters: 'Google Search Console akan mencatat error "Unparseable structured data" dan mengabaikan seluruh data terstruktur pada halaman ini.',
                recommendation: 'Periksa tanda kurung, koma, dan karakter escape pada blok JSON-LD Anda.',
                location: 'script[type="application/ld+json"]'
            );
        }

        // 2. Report Detected Schema Types
        if (!empty($detectedTypes)) {
            $typesString = implode(', ', array_unique($detectedTypes));
            $findings[] = Finding::success(
                id: 'schema-types-detected',
                analyzerId: $this->getId(),
                title: sprintf('Schema JSON-LD Aktif: %s', $typesString),
                description: 'Data terstruktur terbaca dengan format yang valid oleh parser schema.',
                location: 'script[type="application/ld+json"]',
                metadata: ['types' => $detectedTypes]
            );

            // Check specifically for LocalBusiness or DryCleaningOrLaundry for local SEO strength
            $hasLocalBiz = in_array('LocalBusiness', $detectedTypes, true) || 
                            in_array('DryCleaningOrLaundry', $detectedTypes, true) ||
                            in_array('Store', $detectedTypes, true);

            if ($hasLocalBiz) {
                $findings[] = Finding::success(
                    id: 'schema-localbusiness-present',
                    analyzerId: $this->getId(),
                    title: 'Schema Bisnis Lokal (LocalBusiness / Laundry) Dikonfigurasi',
                    description: 'Entitas bisnis fisik terdaftar untuk mendukung penelusuran lokal Google Maps dan "laundry terdekat".',
                    location: 'script[type="application/ld+json"]'
                );
            }
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }

    private function extractTypes(mixed $data, array &$types): void
    {
        if (!is_array($data)) {
            return;
        }

        if (isset($data['@type'])) {
            $type = is_array($data['@type']) ? implode('/', $data['@type']) : (string) $data['@type'];
            $types[] = $type;
        }

        if (isset($data['@graph']) && is_array($data['@graph'])) {
            foreach ($data['@graph'] as $node) {
                $this->extractTypes($node, $types);
            }
        }
    }
}
