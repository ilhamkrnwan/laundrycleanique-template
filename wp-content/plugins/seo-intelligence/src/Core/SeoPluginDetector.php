<?php

declare(strict_types=1);

namespace SeoIntelligence\Core;

/**
 * Third-Party SEO Plugin Detector and Conflict Prevention Engine.
 * Adheres strictly to Section 30 of READABLE.md:
 * Detects Yoast, Rank Math, All in One SEO, SEOPress, and The SEO Framework.
 * Prevents duplicate meta tags and schema without destructive overrides.
 */
final class SeoPluginDetector
{
    /**
     * Map of known third-party SEO plugins and their version/presence constants.
     */
    private const KNOWN_PLUGINS = [
        'yoast' => [
            'name'     => 'Yoast SEO',
            'constant' => 'WPSEO_VERSION',
            'class'    => 'WPSEO_Frontend',
        ],
        'rank_math' => [
            'name'     => 'Rank Math',
            'constant' => 'RANK_MATH_VERSION',
            'class'    => 'RankMath',
        ],
        'aioseo' => [
            'name'     => 'All in One SEO',
            'constant' => 'AIOSEO_VERSION',
            'class'    => 'AIOSEO\Plugin\AIOSEO',
        ],
        'seopress' => [
            'name'     => 'SEOPress',
            'constant' => 'SEOPRESS_VERSION',
            'class'    => 'SEOPRESS_Init',
        ],
        'the_seo_framework' => [
            'name'     => 'The SEO Framework',
            'constant' => 'THE_SEO_FRAMEWORK_VERSION',
            'class'    => 'The_SEO_Framework\Load',
        ],
    ];

    /**
     * Check if any recognized third-party SEO plugin is active.
     */
    public static function isThirdPartySeoActive(): bool
    {
        return self::getActivePlugin() !== null;
    }

    /**
     * Get details of the active third-party SEO plugin if any.
     *
     * @return array{key: string, name: string}|null
     */
    public static function getActivePlugin(): ?array
    {
        foreach (self::KNOWN_PLUGINS as $key => $info) {
            if (defined($info['constant']) || class_exists($info['class'], false)) {
                return [
                    'key'  => $key,
                    'name' => $info['name'],
                ];
            }
        }
        return null;
    }

    /**
     * Register admin conflict notification notice.
     */
    public static function registerNotice(): void
    {
        add_action('admin_notices', function () {
            $active = self::getActivePlugin();
            if ($active === null) {
                return;
            }

            // Only display notice inside SEO Intelligence admin screens
            $screen = get_current_screen();
            if (!$screen || !str_contains($screen->id, 'seo-intelligence')) {
                return;
            }

            $pluginName = esc_html($active['name']);
            ?>
            <div class="notice notice-info is-dismissible seoi-plugin-notice" style="border-left-color: #0284c7; background: #f0f9ff; padding: 12px 16px;">
                <p style="margin: 0; font-size: 13px; color: #0369a1;">
                    <strong><i class="ri-information-line"></i> <?php esc_html_e('SEO Plugin Detected', 'seo-intelligence'); ?></strong><br />
                    <?php printf(esc_html__('%s is active. SEO Intelligence will perform analysis only and will not override %s metadata unless explicitly configured in Settings.', 'seo-intelligence'), $pluginName, $pluginName); ?>
                </p>
            </div>
            <?php
        });
    }
}
