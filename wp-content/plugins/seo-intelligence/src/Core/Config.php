<?php

declare(strict_types=1);

namespace SeoIntelligence\Core;

/**
 * Global Configuration and Default Thresholds.
 */
final class Config
{
    public const OPTION_KEY = 'seoi_settings';

    /**
     * Default options array.
     */
    public const DEFAULTS = [
        'default_language'       => 'id_ID',
        'enable_geo_aeo'         => true,
        'enable_ai_assist'       => false,
        'ai_provider'            => 'gemini', // 'gemini' | 'openai' | 'custom'
        'ai_api_key'             => '',
        'ai_endpoint'            => '',
        'crawl_delay_ms'         => 300,
        'max_crawl_urls'         => 500,
        'min_word_count_post'    => 600,
        'min_word_count_page'    => 300,
        'max_sentence_words'     => 25,
        'max_paragraph_words'    => 75,
        'max_image_weight_kb'    => 200,
        'max_css_files'          => 8,
        'max_js_files'           => 12,

        // Scoring Weights
        'scoring_weights'        => [
            'seo'           => 18,
            'content'       => 15,
            'readability'   => 12,
            'geo'           => 12,
            'aeo'           => 12,
            'headings'      => 8,
            'images'        => 8,
            'schema'        => 6,
            'accessibility' => 5,
            'performance'   => 4,
        ],

        // XML Sitemap Configuration
        'sitemap_enabled'        => true,
        'sitemap_post_types'     => ['post', 'page', 'paket_usaha', 'kemitraan'],
        'sitemap_taxonomies'     => ['category'],
        'sitemap_include_images' => true,
        'sitemap_items_per_page' => 1000,

        // Robots.txt & Bot Crawling Optimization
        'robots_policy'          => 'aeo_geo_max', // 'aeo_geo_max' | 'search_only' | 'custom'
        'robots_custom_rules'    => '',
        'robots_allowed_bots'    => [
            'googlebot'         => true,
            'bingbot'           => true,
            'duckduckbot'       => true,
            'yandexbot'         => true,
            'gptbot'            => true,
            'chatgpt_user'      => true,
            'claudebot'         => true,
            'anthropic_ai'      => true,
            'perplexitybot'     => true,
            'applebot'          => true,
            'applebot_extended' => true,
            'google_extended'   => true,
            'bytespider'        => true,
            'cohere_ai'         => true,
        ],

        // Frontend Meta & Verification
        'enable_frontend_meta'   => true,
        'enable_json_ld_schema'  => true,
        'meta_google_verification' => '',
        'meta_bing_verification'   => '',
    ];

    /**
     * Retrieve a setting value with fallback to defaults.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $options = get_option(self::OPTION_KEY, self::DEFAULTS);
        if (!is_array($options)) {
            $options = self::DEFAULTS;
        }

        return $options[$key] ?? self::DEFAULTS[$key] ?? $default;
    }

    /**
     * Update a setting value.
     */
    public static function set(string $key, mixed $value): bool
    {
        $options = get_option(self::OPTION_KEY, self::DEFAULTS);
        if (!is_array($options)) {
            $options = self::DEFAULTS;
        }

        $options[$key] = $value;
        return update_option(self::OPTION_KEY, $options);
    }

    /**
     * Retrieve all settings.
     */
    public static function all(): array
    {
        $options = get_option(self::OPTION_KEY, self::DEFAULTS);
        return is_array($options) ? array_merge(self::DEFAULTS, $options) : self::DEFAULTS;
    }
}
