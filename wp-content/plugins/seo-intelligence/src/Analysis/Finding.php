<?php

declare(strict_types=1);

namespace SeoIntelligence\Analysis;

/**
 * Structured Finding Model.
 * Represents a single observable issue, pass, or suggestion identified on a page.
 */
final class Finding implements \JsonSerializable
{
    /**
     * @param string $id Unique identifier of the finding check (e.g. 'missing-h1', 'weak-image-alt').
     * @param string $analyzerId Identifier of the analyzer that produced this finding.
     * @param Severity $severity Severity level.
     * @param string $title Concise title of the finding.
     * @param string $description Detailed explanation of what was detected.
     * @param string $whyItMatters Why this issue impacts SEO, GEO, AEO, user experience, or accessibility.
     * @param string $recommendation Actionable step-by-step guidance on how to resolve the issue.
     * @param string $location CSS selector, HTML tag, or content section where the issue occurs.
     * @param array<string, mixed> $metadata Additional structured context (dimensions, sizes, offsets, etc.).
     */
    public function __construct(
        public readonly string $id,
        public readonly string $analyzerId,
        public readonly Severity $severity,
        public readonly string $title,
        public readonly string $description,
        public readonly string $whyItMatters,
        public readonly string $recommendation,
        public readonly string $location = 'document',
        public readonly array $metadata = []
    ) {
    }

    /**
     * Create a success finding.
     */
    public static function success(
        string $id,
        string $analyzerId,
        string $title,
        string $description,
        string $location = 'document',
        array $metadata = []
    ): self {
        return new self(
            id: $id,
            analyzerId: $analyzerId,
            severity: Severity::SUCCESS,
            title: $title,
            description: $description,
            whyItMatters: '',
            recommendation: '',
            location: $location,
            metadata: $metadata
        );
    }

    /**
     * Create an actionable issue finding.
     */
    public static function issue(
        string $id,
        string $analyzerId,
        Severity $severity,
        string $title,
        string $description,
        string $whyItMatters,
        string $recommendation,
        string $location = 'document',
        array $metadata = []
    ): self {
        return new self(
            id: $id,
            analyzerId: $analyzerId,
            severity: $severity,
            title: $title,
            description: $description,
            whyItMatters: $whyItMatters,
            recommendation: $recommendation,
            location: $location,
            metadata: $metadata
        );
    }

    /**
     * Serialization for REST API and database persistence.
     */
    public function jsonSerialize(): array
    {
        return [
            'id'             => $this->id,
            'analyzer_id'    => $this->analyzerId,
            'severity'       => $this->severity->value,
            'severity_label' => $this->severity->getLabel(),
            'severity_color' => $this->severity->getColor(),
            'title'          => $this->title,
            'description'    => $this->description,
            'why_it_matters' => $this->whyItMatters,
            'recommendation' => $this->recommendation,
            'location'       => $this->location,
            'metadata'       => $this->metadata,
        ];
    }
}
