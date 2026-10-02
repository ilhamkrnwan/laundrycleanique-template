<?php

declare(strict_types=1);

namespace SeoIntelligence\Scoring;

use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;

/**
 * Transparent & Traceable Score Calculator.
 * Calculates category-specific scores and weighted overall health score.
 */
final class ScoreCalculator
{
    /**
     * Compute comprehensive score summary from an array of AnalysisResults.
     *
     * @param array<AnalysisResult> $results
     * @return array{
     *   overall: int,
     *   categories: array<string, array{label: string, score: int, icon: string, weight: int}>,
     *   counts: array<string, int>,
     *   critical_count: int,
     *   error_count: int,
     *   warning_count: int,
     *   passed_count: int
     * }
     */
    public static function calculate(array $results): array
    {
        $weights = ScoreWeights::getWeights();
        $categoryScores = [];
        $categoryFindings = [];

        // Group findings and compute scores per category
        foreach ($results as $result) {
            $catKey = $result->category->value;
            if (!isset($categoryScores[$catKey])) {
                $categoryScores[$catKey] = [];
                $categoryFindings[$catKey] = [];
            }
            $categoryScores[$catKey][] = $result->calculateScore();
            foreach ($result->findings as $f) {
                $categoryFindings[$catKey][] = $f;
            }
        }

        $categoriesOut = [];
        $weightedSum = 0.0;
        $totalWeightApplied = 0;

        foreach ($weights as $catKey => $weight) {
            $enumCat = ScoreCategory::tryFrom($catKey);
            $label = $enumCat ? $enumCat->getLabel() : ucfirst($catKey);
            $icon = $enumCat ? $enumCat->getIcon() : 'ri-bar-chart-line';

            // Average score if multiple analyzers in same category, default to 100 if none
            $score = 100;
            if (!empty($categoryScores[$catKey])) {
                $score = (int) round(array_sum($categoryScores[$catKey]) / count($categoryScores[$catKey]));
            }

            $categoriesOut[$catKey] = [
                'label'  => $label,
                'score'  => $score,
                'icon'   => $icon,
                'weight' => $weight,
            ];

            $weightedSum += ($score * $weight);
            $totalWeightApplied += $weight;
        }

        $overall = $totalWeightApplied > 0
            ? (int) round($weightedSum / $totalWeightApplied)
            : 100;

        // Tally all findings by severity
        $counts = [
            Severity::CRITICAL->value => 0,
            Severity::ERROR->value    => 0,
            Severity::WARNING->value  => 0,
            Severity::NOTICE->value   => 0,
            Severity::SUCCESS->value  => 0,
            Severity::INFO->value     => 0,
        ];

        foreach ($results as $result) {
            foreach ($result->findings as $finding) {
                $counts[$finding->severity->value]++;
            }
        }

        return [
            'overall'        => max(0, min(100, $overall)),
            'categories'     => $categoriesOut,
            'counts'         => $counts,
            'critical_count' => $counts[Severity::CRITICAL->value],
            'error_count'    => $counts[Severity::ERROR->value],
            'warning_count'  => $counts[Severity::WARNING->value],
            'passed_count'   => $counts[Severity::SUCCESS->value],
        ];
    }
}
