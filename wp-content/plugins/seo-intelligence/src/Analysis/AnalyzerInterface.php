<?php

declare(strict_types=1);

namespace SeoIntelligence\Analysis;

use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Standard Analyzer Contract.
 * Every audit module implements this interface to produce structured, explainable findings.
 */
interface AnalyzerInterface
{
    /**
     * Unique machine-readable analyzer identifier.
     */
    public function getId(): string;

    /**
     * Human-readable analyzer title.
     */
    public function getName(): string;

    /**
     * Category that this analyzer contributes to.
     */
    public function getCategory(): ScoreCategory;

    /**
     * Brief explanation of what this analyzer checks.
     */
    public function getDescription(): string;

    /**
     * Execute analysis on the provided context.
     *
     * @param AnalysisContext $context
     * @return AnalysisResult
     */
    public function analyze(AnalysisContext $context): AnalysisResult;
}
