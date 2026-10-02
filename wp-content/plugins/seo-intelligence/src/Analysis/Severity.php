<?php

declare(strict_types=1);

namespace SeoIntelligence\Analysis;

/**
 * Finding Severity Levels.
 */
enum Severity: string
{
    case CRITICAL = 'critical';
    case ERROR    = 'error';
    case WARNING  = 'warning';
    case NOTICE   = 'notice';
    case SUCCESS  = 'success';
    case INFO     = 'info';

    /**
     * Penalty points deducted from a category base score of 100.
     */
    public function getPenaltyPoints(): int
    {
        return match ($this) {
            self::CRITICAL => 25,
            self::ERROR    => 15,
            self::WARNING  => 8,
            self::NOTICE   => 3,
            self::SUCCESS  => 0,
            self::INFO     => 0,
        };
    }

    /**
     * Color representation for UI tags and badges.
     */
    public function getColor(): string
    {
        return match ($this) {
            self::CRITICAL => '#dc2626', // Red-600
            self::ERROR    => '#ef4444', // Red-500
            self::WARNING  => '#f59e0b', // Amber-500
            self::NOTICE   => '#3b82f6', // Blue-500
            self::SUCCESS  => '#10b981', // Emerald-500
            self::INFO     => '#64748b', // Slate-500
        };
    }

    /**
     * Human-readable label (Indonesian-aware).
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::CRITICAL => 'Kritis',
            self::ERROR    => 'Kesalahan',
            self::WARNING  => 'Peringatan',
            self::NOTICE   => 'Catatan',
            self::SUCCESS  => 'Optimal',
            self::INFO     => 'Info',
        };
    }
}
