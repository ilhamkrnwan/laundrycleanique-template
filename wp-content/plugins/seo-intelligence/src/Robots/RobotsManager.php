<?php

declare(strict_types=1);

namespace SeoIntelligence\Robots;

use SeoIntelligence\Core\Config;

/**
 * Production-Grade Robots.txt & Bot Crawling Manager.
 * Orchestrates Traditional Search Engine Crawlers and Modern Generative AI / AEO Crawlers
 * (GPTBot, ClaudeBot, PerplexityBot, Applebot, Google-Extended).
 */
final class RobotsManager
{
    /**
     * Master registry of supported web crawlers and AI search agents.
     */
    public const BOT_REGISTRY = [
        // Traditional Search Engines
        'googlebot' => [
            'name'        => 'Googlebot',
            'agent'       => 'Googlebot',
            'vendor'      => 'Google',
            'category'    => 'Search Engine',
            'description' => 'Crawler utama Google Search, Mobile Indexing, dan Snippet SERP.',
            'default'     => true,
            'is_ai'       => false,
        ],
        'bingbot' => [
            'name'        => 'Bingbot',
            'agent'       => 'Bingbot',
            'vendor'      => 'Microsoft Bing',
            'category'    => 'Search Engine & Copilot',
            'description' => 'Crawler mesin pencari Bing dan Microsoft Copilot.',
            'default'     => true,
            'is_ai'       => false,
        ],
        'duckduckbot' => [
            'name'        => 'DuckDuckBot',
            'agent'       => 'DuckDuckBot',
            'vendor'      => 'DuckDuckGo',
            'category'    => 'Search Engine',
            'description' => 'Crawler privasi mesin pencari DuckDuckGo.',
            'default'     => true,
            'is_ai'       => false,
        ],
        'yandexbot' => [
            'name'        => 'YandexBot',
            'agent'       => 'YandexBot',
            'vendor'      => 'Yandex',
            'category'    => 'Search Engine',
            'description' => 'Crawler mesin pencari Yandex.',
            'default'     => true,
            'is_ai'       => false,
        ],

        // Generative AI & Answer Engine (AEO / GEO) Crawlers
        'gptbot' => [
            'name'        => 'GPTBot',
            'agent'       => 'GPTBot',
            'vendor'      => 'OpenAI',
            'category'    => 'AEO & SearchGPT',
            'description' => 'Mengindeks konten web untuk pencarian SearchGPT dan respons ChatGPT.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'chatgpt_user' => [
            'name'        => 'ChatGPT-User',
            'agent'       => 'ChatGPT-User',
            'vendor'      => 'OpenAI',
            'category'    => 'Live Browsing AI',
            'description' => 'Digunakan langsung saat pengguna ChatGPT meminta membaca URL secara live.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'claudebot' => [
            'name'        => 'ClaudeBot',
            'agent'       => 'ClaudeBot',
            'vendor'      => 'Anthropic',
            'category'    => 'AEO / GEO Engine',
            'description' => 'Crawler resmi Claude AI untuk penemuan data dan sitasi jawaban bisnis.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'anthropic_ai' => [
            'name'        => 'anthropic-ai',
            'agent'       => 'anthropic-ai',
            'vendor'      => 'Anthropic',
            'category'    => 'AEO Knowledge',
            'description' => 'Bot pengumpul pengetahuan web untuk model Anthropic Claude.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'perplexitybot' => [
            'name'        => 'PerplexityBot',
            'agent'       => 'PerplexityBot',
            'vendor'      => 'Perplexity AI',
            'category'    => 'Answer Engine (AEO)',
            'description' => 'Mengambil sumber rujukan dan kutipan jawaban langsung di Perplexity.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'applebot' => [
            'name'        => 'Applebot',
            'agent'       => 'Applebot',
            'vendor'      => 'Apple',
            'category'    => 'Search & Siri',
            'description' => 'Mengindeks web untuk pencarian Safari, Siri Suggestions, dan Spotlight.',
            'default'     => true,
            'is_ai'       => false,
        ],
        'applebot_extended' => [
            'name'        => 'Applebot-Extended',
            'agent'       => 'Applebot-Extended',
            'vendor'      => 'Apple',
            'category'    => 'Apple Intelligence',
            'description' => 'Digunakan untuk melatih dan menyuplai data Apple Intelligence AI.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'google_extended' => [
            'name'        => 'Google-Extended',
            'agent'       => 'Google-Extended',
            'vendor'      => 'Google',
            'category'    => 'Gemini & AI Overviews',
            'description' => 'Crawler Google untuk melatih Gemini dan menyempurnakan AI Overviews.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'bytespider' => [
            'name'        => 'Bytespider',
            'agent'       => 'Bytespider',
            'vendor'      => 'ByteDance / TikTok',
            'category'    => 'GEO AI Engine',
            'description' => 'Crawler pencarian pintar dan asisten AI ByteDance.',
            'default'     => true,
            'is_ai'       => true,
        ],
        'cohere_ai' => [
            'name'        => 'cohere-ai',
            'agent'       => 'cohere-ai',
            'vendor'      => 'Cohere',
            'category'    => 'Enterprise AI',
            'description' => 'Bot pengindeksan data korporasi dan pencarian semantik Cohere.',
            'default'     => true,
            'is_ai'       => true,
        ],
    ];

    /**
     * Register hooks with WordPress.
     */
    public function register(): void
    {
        // Core WordPress robots_txt filter
        add_filter('robots_txt', [$this, 'filterRobotsTxt'], 999, 2);

        // Fallback early request interception
        add_action('parse_request', [$this, 'handleEarlyRobotsRequest'], 1);
    }

    /**
     * Handle early request for /robots.txt to guarantee output across custom rewrite rules.
     */
    public function handleEarlyRobotsRequest(\WP $wp): void
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        $path = (string) wp_parse_url($uri, PHP_URL_PATH);

        if (preg_match('#/robots\.txt$#i', $path)) {
            $this->renderDirect();
            exit;
        }
    }

    /**
     * Filter callback for WordPress do_robots().
     */
    public function filterRobotsTxt(string $output, bool $public): string
    {
        // If site is set to "Discourage search engines from indexing" in WP Settings
        if (!$public) {
            return "User-agent: *\nDisallow: /\n";
        }

        return $this->getGeneratedRobotsTxt();
    }

    /**
     * Output robots.txt directly with text/plain headers.
     */
    public function renderDirect(): void
    {
        if (headers_sent()) {
            return;
        }

        $public = (bool) get_option('blog_public', 1);
        header('Content-Type: text/plain; charset=UTF-8', true, 200);
        header('X-Robots-Tag: noindex, follow', true);
        header('Cache-Control: public, max-age=86400', true);

        if (!$public) {
            echo "User-agent: *\nDisallow: /\n";
            return;
        }

        echo $this->getGeneratedRobotsTxt();
    }

    /**
     * Build and return the complete robots.txt string.
     */
    public function getGeneratedRobotsTxt(): string
    {
        $policy = (string) Config::get('robots_policy', 'aeo_geo_max');
        $customRules = (string) Config::get('robots_custom_rules', '');

        // If user selected Full Custom
        if ($policy === 'custom' && !empty(trim($customRules))) {
            return trim($customRules) . "\n\nSitemap: " . esc_url_raw($this->getSitemapUrl()) . "\n";
        }

        $homeUrl = untrailingslashit(home_url());
        $sitemapUrl = $this->getSitemapUrl();

        $lines = [];
        $lines[] = '# ==============================================================================';
        $lines[] = '# Robots.txt Generated by SEO & AEO Intelligence';
        $lines[] = '# Website: ' . $homeUrl;
        $lines[] = '# Policy: ' . strtoupper($policy);
        $lines[] = '# Last Updated: ' . gmdate('Y-m-d H:i:s') . ' UTC';
        $lines[] = '# ==============================================================================';
        $lines[] = '';

        // 1. Global Baseline Directives
        $lines[] = '# --- Global Directives ---';
        $lines[] = 'User-agent: *';
        $lines[] = 'Disallow: /wp-admin/';
        $lines[] = 'Disallow: /wp-includes/';
        $lines[] = 'Disallow: /trackback/';
        $lines[] = 'Disallow: /xmlrpc.php';
        $lines[] = 'Disallow: /*?s=*';
        $lines[] = 'Disallow: /*?*search=*';
        $lines[] = 'Allow: /wp-admin/admin-ajax.php';
        $lines[] = 'Allow: /wp-content/uploads/';
        $lines[] = 'Allow: /wp-content/themes/';
        $lines[] = 'Allow: /wp-content/plugins/';
        $lines[] = '';

        // 2. Specific Bots Rules
        $allowedBots = (array) Config::get('robots_allowed_bots', []);

        if ($policy === 'search_only') {
            // Allow traditional search engines, block AI scrapers
            $lines[] = '# --- Search Engine Crawlers (Allowed) ---';
            foreach (self::BOT_REGISTRY as $key => $bot) {
                if (!$bot['is_ai']) {
                    $lines[] = 'User-agent: ' . $bot['agent'];
                    $lines[] = 'Allow: /';
                    $lines[] = '';
                }
            }

            $lines[] = '# --- Generative AI & LLM Crawlers (Restricted) ---';
            foreach (self::BOT_REGISTRY as $key => $bot) {
                if ($bot['is_ai']) {
                    $lines[] = 'User-agent: ' . $bot['agent'];
                    $lines[] = 'Disallow: /';
                    $lines[] = '';
                }
            }
        } else {
            // AEO / GEO Maximum Visibility (Default)
            $lines[] = '# --- Verified Search Engine Crawlers ---';
            foreach (self::BOT_REGISTRY as $key => $bot) {
                if (!$bot['is_ai']) {
                    $isAllowed = $allowedBots[$key] ?? true;
                    $lines[] = 'User-agent: ' . $bot['agent'];
                    $lines[] = $isAllowed ? 'Allow: /' : 'Disallow: /';
                    $lines[] = '';
                }
            }

            $lines[] = '# --- Generative Engine (GEO) & Answer Engine (AEO) Crawlers ---';
            foreach (self::BOT_REGISTRY as $key => $bot) {
                if ($bot['is_ai']) {
                    $isAllowed = $allowedBots[$key] ?? true;
                    $lines[] = 'User-agent: ' . $bot['agent'];
                    $lines[] = $isAllowed ? 'Allow: /' : 'Disallow: /';
                    $lines[] = '';
                }
            }
        }

        // 3. Custom Append Rules (if user has extra rules)
        if (!empty(trim($customRules))) {
            $lines[] = '# --- Custom User Directives ---';
            $lines[] = trim($customRules);
            $lines[] = '';
        }

        // 4. XML Sitemap reference
        $lines[] = '# --- XML Sitemaps ---';
        $lines[] = 'Sitemap: ' . esc_url_raw($sitemapUrl);
        $lines[] = '';

        return implode("\n", $lines);
    }

    /**
     * Get sitemap index URL.
     */
    public function getSitemapUrl(): string
    {
        return untrailingslashit(home_url()) . '/sitemap.xml';
    }

    /**
     * Get robots.txt public URL.
     */
    public function getRobotsUrl(): string
    {
        return untrailingslashit(home_url()) . '/robots.txt';
    }

    /**
     * Check if a physical robots.txt file exists on the server.
     */
    public function hasPhysicalRobotsTxt(): bool
    {
        return file_exists($this->getPhysicalRobotsTxtPath());
    }

    /**
     * Get path to physical robots.txt in ABSPATH.
     */
    public function getPhysicalRobotsTxtPath(): string
    {
        return ABSPATH . 'robots.txt';
    }

    /**
     * Returns full bot status matrix for the admin UI.
     *
     * @return array<string, array{name: string, vendor: string, category: string, description: string, is_ai: boolean, allowed: boolean}>
     */
    public function getBotStatusMatrix(): array
    {
        $policy = (string) Config::get('robots_policy', 'aeo_geo_max');
        $allowedBots = (array) Config::get('robots_allowed_bots', []);
        $matrix = [];

        foreach (self::BOT_REGISTRY as $key => $bot) {
            $isAllowed = true;
            if ($policy === 'search_only') {
                $isAllowed = !$bot['is_ai'];
            } else {
                $isAllowed = (bool) ($allowedBots[$key] ?? true);
            }

            $matrix[$key] = [
                'name'        => $bot['name'],
                'agent'       => $bot['agent'],
                'vendor'      => $bot['vendor'],
                'category'    => $bot['category'],
                'description' => $bot['description'],
                'is_ai'       => $bot['is_ai'],
                'allowed'     => $isAllowed,
            ];
        }

        return $matrix;
    }
}
