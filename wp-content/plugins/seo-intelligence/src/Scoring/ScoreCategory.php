<?php

declare(strict_types=1);

namespace SeoIntelligence\Scoring;

/**
 * Score Categories Enum (11 Core Dimensions).
 */
enum ScoreCategory: string
{
    case SEO         = 'seo';
    case CONTENT     = 'content';
    case READABILITY = 'readability';
    case HEADINGS    = 'headings';
    case IMAGES      = 'images';
    case ASSETS      = 'assets';
    case SCHEMA      = 'schema';
    case LINKS       = 'links';
    case GEO         = 'geo';
    case AEO         = 'aeo';
    case UX          = 'ux';

    /**
     * Human-readable category label.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::SEO         => 'Technical SEO',
            self::CONTENT     => 'Kualitas Konten',
            self::READABILITY => 'Keterbacaan (Readability)',
            self::HEADINGS    => 'Struktur Heading (H1–H6)',
            self::IMAGES      => 'Optimasi Gambar & CLS',
            self::ASSETS      => 'Aset Web & Beban Script',
            self::SCHEMA      => 'Structured Data (Schema)',
            self::LINKS       => 'Distribusi Tautan & Anchor',
            self::GEO         => 'GEO (Generative Engine)',
            self::AEO         => 'AEO (Answer Engine)',
            self::UX          => 'UX & Responsivitas Mobile',
        };
    }

    /**
     * Category icon (Remix Icon).
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::SEO         => 'ri-global-line',
            self::CONTENT     => 'ri-file-text-line',
            self::READABILITY => 'ri-book-open-line',
            self::HEADINGS    => 'ri-heading',
            self::IMAGES      => 'ri-image-2-line',
            self::ASSETS      => 'ri-speed-line',
            self::SCHEMA      => 'ri-code-box-line',
            self::LINKS       => 'ri-links-line',
            self::GEO         => 'ri-brain-line',
            self::AEO         => 'ri-question-answer-line',
            self::UX          => 'ri-smartphone-line',
        };
    }

    /**
     * Alias for getIcon().
     */
    public function getRemixIcon(): string
    {
        return $this->getIcon();
    }
}
