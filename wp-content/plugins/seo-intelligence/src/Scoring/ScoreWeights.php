<?php

declare(strict_types=1);

namespace SeoIntelligence\Scoring;

/**
 * Scoring Weights Configuration across 11 core categories.
 * Balances the contribution of each category towards the overall 0–100 health score.
 */
final class ScoreWeights
{
    /**
     * Default weights. Total sums precisely to 100.
     */
    private const DEFAULT_WEIGHTS = [
        ScoreCategory::SEO->value         => 14,
        ScoreCategory::CONTENT->value     => 12,
        ScoreCategory::READABILITY->value => 12,
        ScoreCategory::GEO->value         => 10,
        ScoreCategory::AEO->value         => 10,
        ScoreCategory::HEADINGS->value    => 8,
        ScoreCategory::IMAGES->value      => 8,
        ScoreCategory::LINKS->value       => 8,
        ScoreCategory::SCHEMA->value      => 6,
        ScoreCategory::ASSETS->value      => 6,
        ScoreCategory::UX->value          => 6,
    ];

    /**
     * Get active weights array.
     *
     * @return array<string, int>
     */
    public static function getWeights(): array
    {
        $saved = get_option('seoi_score_weights', self::DEFAULT_WEIGHTS);
        if (!is_array($saved) || empty($saved)) {
            $saved = self::DEFAULT_WEIGHTS;
        }

        // Allow third-party filter
        return apply_filters('seoi_scoring_weights', array_merge(self::DEFAULT_WEIGHTS, $saved));
    }
}
