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
