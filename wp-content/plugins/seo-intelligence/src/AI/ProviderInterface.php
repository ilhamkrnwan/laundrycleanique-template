<?php

declare(strict_types=1);

namespace SeoIntelligence\AI;

use SeoIntelligence\Analysis\Finding;

/**
 * AI Provider Contract.
 * Allows pluggable AI engines (Gemini, OpenAI, Claude) to supply actionable rewrites.
 */
interface ProviderInterface
{
    /**
     * Unique provider identifier.
     */
    public function getId(): string;

    /**
     * Human-readable provider name.
     */
    public function getName(): string;

    /**
     * Is this provider configured with a valid API key?
     */
    public function isConfigured(): bool;

    /**
     * Generate an AI-assisted fix or rewrite for a specific finding.
     *
     * @param Finding $finding
     * @param string $pageContext
     * @return string
     */
    public function suggestFix(Finding $finding, string $pageContext): string;

    /**
     * Generate 3-5 high-relevance AEO FAQ pairs for the given content.
     *
     * @param string $content
     * @return array<array{question: string, answer: string}>
     */
    public function generateFaqPairs(string $content): array;
}
