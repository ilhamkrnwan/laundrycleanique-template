<?php

declare(strict_types=1);

namespace SeoIntelligence\Analysis;

use SeoIntelligence\Scoring\ScoreCalculator;

/**
 * Analysis Orchestrator Pipeline.
 * Executes registered analyzers safely with individual failure isolation and benchmarking.
 */
final class AnalysisManager
{
    /**
     * @var array<string, AnalyzerInterface>
     */
    private array $analyzers = [];

    /**
     * Register an analyzer instance.
     */
    public function register(AnalyzerInterface $analyzer): void
    {
        $this->analyzers[$analyzer->getId()] = $analyzer;
    }

    /**
     * Get all registered analyzers (including those added via WordPress filter).
     *
     * @return array<string, AnalyzerInterface>
     */
    public function getAnalyzers(): array
    {
        /** @var array<string, AnalyzerInterface> $filtered */
        $filtered = apply_filters('seo_intelligence_analyzers', $this->analyzers);
        return apply_filters('seoi_registered_analyzers', $filtered);
    }

    /**
     * Run full analysis on the provided context.
     *
     * @param AnalysisContext $context
     * @return array{
     *   url: string,
     *   post_id: int|null,
     *   http_status: int,
     *   duration_seconds: float,
     *   scores: array,
     *   results: array<string, AnalysisResult>,
     *   all_findings: array<Finding>
     * }
     */
    public function analyze(AnalysisContext $context): array
    {
        $startOverall = microtime(true);
        $results = [];
        $allFindings = [];

        do_action('seo_intelligence_before_analysis', $context);
        do_action('seoi_before_analysis', $context);

        foreach ($this->getAnalyzers() as $id => $analyzer) {
            $start = microtime(true);
            try {
                $result = $analyzer->analyze($context);
                $duration = (microtime(true) - $start) * 1000.0;

                // Ensure execution time is captured
                if ($result->executionTimeMs <= 0.0) {
                    $result = new AnalysisResult(
                        analyzerId: $result->analyzerId,
                        category: $result->category,
                        findings: $result->findings,
                        executionTimeMs: $duration
                    );
                }

                $results[$id] = $result;
                foreach ($result->findings as $finding) {
                    $allFindings[] = $finding;
                }
            } catch (\Throwable $e) {
                // Graceful failure: Do not crash entire audit if a single check errors
                $errorFinding = Finding::issue(
                    id: 'analyzer-failure-' . $id,
                    analyzerId: $id,
                    severity: Severity::NOTICE,
                    title: sprintf('Pemeriksaan "%s" mengalami kendala', $analyzer->getName()),
                    description: $e->getMessage(),
                    whyItMatters: 'Analisis spesifik ini tidak dapat selesai karena format atau respon halaman tidak terduga.',
                    recommendation: 'Periksa log error server atau jalankan ulang audit.',
                    location: 'analyzer'
                );

                $results[$id] = new AnalysisResult(
                    analyzerId: $id,
                    category: $analyzer->getCategory(),
                    findings: [$errorFinding],
                    executionTimeMs: (microtime(true) - $start) * 1000.0
                );
                $allFindings[] = $errorFinding;
            }
        }

        $scores = ScoreCalculator::calculate($results);
        $totalDuration = microtime(true) - $startOverall;

        $output = [
            'url'              => $context->url,
            'post_id'          => $context->postId,
            'http_status'      => $context->httpStatus,
            'duration_seconds' => round($totalDuration, 3),
            'scores'           => $scores,
            'results'          => $results,
            'all_findings'     => $allFindings,
        ];

        do_action('seoi_after_analysis', $output, $context);

        return $output;
    }
}
