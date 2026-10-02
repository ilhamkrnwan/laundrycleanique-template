<?php

declare(strict_types=1);

namespace SeoIntelligence\Analysis;

use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Result returned by a single Analyzer.
 */
final class AnalysisResult implements \JsonSerializable
{
    /**
     * @param string $analyzerId
     * @param ScoreCategory $category
     * @param array<Finding> $findings
     * @param float $executionTimeMs
     */
    public function __construct(
        public readonly string $analyzerId,
        public readonly ScoreCategory $category,
        public readonly array $findings = [],
        public readonly float $executionTimeMs = 0.0
    ) {
    }

    /**
     * Compute the category sub-score (0 to 100).
     * Begins at 100 and applies traceable severity deductions.
     */
    public function calculateScore(): int
    {
        $score = 100;
        foreach ($this->findings as $finding) {
            $score -= $finding->severity->getPenaltyPoints();
        }

        return max(0, min(100, $score));
    }

    /**
     * Get count of findings by severity.
     *
     * @return array<string, int>
     */
    public function getCountsBySeverity(): array
    {
        $counts = [
            Severity::CRITICAL->value => 0,
            Severity::ERROR->value    => 0,
            Severity::WARNING->value  => 0,
            Severity::NOTICE->value   => 0,
            Severity::SUCCESS->value  => 0,
            Severity::INFO->value     => 0,
        ];

        foreach ($this->findings as $finding) {
            $counts[$finding->severity->value]++;
        }

        return $counts;
    }

    /**
     * Json serialization.
     */
    public function jsonSerialize(): array
    {
        return [
            'analyzer_id'       => $this->analyzerId,
            'category'          => $this->category->value,
            'category_label'    => $this->category->getLabel(),
            'score'             => $this->calculateScore(),
            'findings'          => $this->findings,
            'counts'            => $this->getCountsBySeverity(),
            'execution_time_ms' => round($this->executionTimeMs, 2),
        ];
    }
}
