<?php

declare(strict_types=1);

namespace SeoIntelligence\Frontend;

use SeoIntelligence\Core\Config;
use SeoIntelligence\Core\SeoPluginDetector;

/**
 * Frontend Meta Tag & Structured Data Injector ("dan lainya").
 * Outputs canonical URLs, meta descriptions, robots directives, OpenGraph, Twitter Cards,
 * Webmaster Verification tags, and JSON-LD schema into wp_head.
 */
final class FrontendMetaManager
{
    /**
     * Register hooks.
     */
    public function register(): void
    {
        if (is_admin()) {
            return;
        }

        add_action('wp_head', [$this, 'injectHeadMeta'], 1);
        add_filter('document_title_parts', [$this, 'filterTitleParts'], 10);
    }

    /**
     * Filter title parts for clean, high-ranking titles.
     *
     * @param array<string, string> $parts
     * @return array<string, string>
     */
    public function filterTitleParts(array $parts): array
    {
        // If third-party SEO is active and we do not override, let them handle title
        if (SeoPluginDetector::isThirdPartySeoActive() && !Config::get('override_third_party_seo', false)) {
            return $parts;
        }

        if (is_front_page()) {
            $parts['title'] = get_bloginfo('name') ?: 'Cleanique Laundry';
            $parts['tagline'] = get_bloginfo('description') ?: 'Paket Usaha Laundry & Aplikasi Kasir POS Cerdas';
        }
        return $parts;
    }

    /**
     * Inject all essential SEO & AEO meta tags into wp_head.
     */
    public function injectHeadMeta(): void
    {
        if (!Config::get('enable_frontend_meta', true)) {
            return;
        }

        // Section 30 of READABLE.md: Check for third-party SEO plugins
        if (SeoPluginDetector::isThirdPartySeoActive() && !Config::get('override_third_party_seo', false)) {
            $this->injectMinimalMeta();
            return;
        }

        $canonical = $this->getCanonicalUrl();
        $description = $this->getMetaDescription();
        $title = wp_get_document_title();
        $siteName = get_bloginfo('name') ?: 'Cleanique Laundry';
        $imageUrl = $this->getShareImageUrl();

        echo "\n<!-- SEO & AEO Intelligence System by PT Indotech Berkah Abadi -->\n";

        // 1. Canonical Link
        if (!empty($canonical)) {
            echo '<link rel="canonical" href="' . esc_url($canonical) . '" />' . "\n";
        }

        // 2. Meta Description
        if (!empty($description)) {
            echo '<meta name="description" content="' . esc_attr($description) . '" />' . "\n";
        }

        // 3. Meta Robots Directives
        $robotsDirective = $this->getRobotsDirective();
        echo '<meta name="robots" content="' . esc_attr($robotsDirective) . '" />' . "\n";

        // 4. OpenGraph Metadata
        $ogType = is_singular('post') ? 'article' : 'website';
        echo '<meta property="og:locale" content="' . esc_attr(get_locale()) . '" />' . "\n";
        echo '<meta property="og:type" content="' . esc_attr($ogType) . '" />' . "\n";
        echo '<meta property="og:title" content="' . esc_attr($title) . '" />' . "\n";
        if (!empty($description)) {
            echo '<meta property="og:description" content="' . esc_attr($description) . '" />' . "\n";
        }
        if (!empty($canonical)) {
            echo '<meta property="og:url" content="' . esc_url($canonical) . '" />' . "\n";
        }
        echo '<meta property="og:site_name" content="' . esc_attr($siteName) . '" />' . "\n";
        if (!empty($imageUrl)) {
            echo '<meta property="og:image" content="' . esc_url($imageUrl) . '" />' . "\n";
            echo '<meta property="og:image:alt" content="' . esc_attr($title) . '" />' . "\n";
        }

        // 5. Twitter Cards
        echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
        echo '<meta name="twitter:title" content="' . esc_attr($title) . '" />' . "\n";
        if (!empty($description)) {
            echo '<meta name="twitter:description" content="' . esc_attr($description) . '" />' . "\n";
        }
        if (!empty($imageUrl)) {
            echo '<meta name="twitter:image" content="' . esc_url($imageUrl) . '" />' . "\n";
        }

        // 6. Search Engine Verification
        $googleVerify = self::cleanVerificationToken((string) Config::get('meta_google_verification', ''), 'google');
        if (!empty($googleVerify)) {
            echo '<meta name="google-site-verification" content="' . esc_attr($googleVerify) . '" />' . "\n";
        }

        $bingVerify = self::cleanVerificationToken((string) Config::get('meta_bing_verification', ''), 'bing');
        if (!empty($bingVerify)) {
            echo '<meta name="msvalidate.01" content="' . esc_attr($bingVerify) . '" />' . "\n";
        }

        // 7. Sitemap Discovery Tag
        $sitemapUrl = untrailingslashit(home_url()) . '/sitemap.xml';
        echo '<link rel="sitemap" type="application/xml" title="Sitemap" href="' . esc_url($sitemapUrl) . '" />' . "\n";

        // 8. JSON-LD Structured Data Schema
        if (Config::get('enable_json_ld_schema', true)) {
            $this->injectSchemaJsonLd($canonical, $title, $description, $imageUrl);
        }

        echo "<!-- / SEO & AEO Intelligence System -->\n\n";
    }

    /**
     * Determine canonical URL for the current request.
     */
    private function getCanonicalUrl(): string
    {
        if (is_front_page()) {
            return home_url('/');
        }

        if (is_singular()) {
            $id = get_queried_object_id();
            return get_permalink($id) ?: '';
        }

        if (is_category() || is_tag() || is_tax()) {
            $term = get_queried_object();
            if ($term instanceof \WP_Term) {
                $link = get_term_link($term);
                return !is_wp_error($link) ? $link : '';
            }
        }

        if (is_post_type_archive()) {
            $postType = get_query_var('post_type');
            if (is_array($postType)) {
                $postType = reset($postType);
            }
            return get_post_type_archive_link((string) $postType) ?: '';
        }

        return '';
    }

    /**
     * Compute clean meta description.
     */
    private function getMetaDescription(): string
    {
        if (is_front_page()) {
            $tagline = get_bloginfo('description');
            return $tagline ?: 'Cleanique Laundry — Paket Usaha Laundry Kiloan & Komersial Lengkap dan Aplikasi Manajemen POS Kasir Cerdas Modern by PT Indotech Berkah Abadi.';
        }

        if (is_singular()) {
            $postId = get_queried_object_id();

            // Custom field description if available
            $customDesc = get_post_meta($postId, '_seoi_meta_description', true);
            if (!empty($customDesc) && is_string($customDesc)) {
                return wp_strip_all_tags($customDesc);
            }

            // Excerpt
            $excerpt = get_the_excerpt($postId);
            if (!empty($excerpt)) {
                return wp_html_excerpt(wp_strip_all_tags($excerpt), 155, '...');
            }

            // Fallback to content snippet
            $content = get_post_field('post_content', $postId);
            if (!empty($content) && is_string($content)) {
                $clean = wp_strip_all_tags(strip_shortcodes($content));
                $clean = preg_replace('/\s+/', ' ', $clean) ?? '';
                return wp_html_excerpt($clean, 155, '...');
            }
        }

        if (is_category() || is_tag() || is_tax()) {
            $desc = category_description();
            if (!empty($desc)) {
                return wp_html_excerpt(wp_strip_all_tags($desc), 155, '...');
            }
        }

        return get_bloginfo('description') ?: 'Cleanique Laundry — Solusi Ekosistem Bisnis & Digitalisasi Laundry Modern Indonesia.';
    }

    /**
     * Determine robots meta directive.
     */
    private function getRobotsDirective(): string
    {
        $public = (bool) get_option('blog_public', 1);
        if (!$public || is_404() || is_search()) {
            return 'noindex, follow';
        }

        if (is_singular()) {
            $postId = get_queried_object_id();
            $noindex = get_post_meta($postId, '_seoi_noindex', true);
            if ($noindex === '1') {
                return 'noindex, nofollow';
            }
        }

        return 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    }

    /**
     * Get primary share image for OpenGraph and Twitter.
     */
    private function getShareImageUrl(): string
    {
        if (is_singular()) {
            $postId = get_queried_object_id();
            if (has_post_thumbnail($postId)) {
                $url = get_the_post_thumbnail_url($postId, 'large');
                if ($url) {
                    return $url;
                }
            }
        }

        // Fallback to logo in theme or root
        $logoPath = get_template_directory_uri() . '/assets/images/hero-outlet.jpg';
        return $logoPath;
    }

    /**
     * Inject JSON-LD Schema.org graph for modern GEO & AEO search engines.
     */
    private function injectSchemaJsonLd(string $canonical, string $title, string $description, string $imageUrl): void
    {
        $homeUrl = home_url('/');
        $siteName = get_bloginfo('name') ?: 'Cleanique Laundry';

        $schema = [
            '@context' => 'https://schema.org',
            '@graph'   => [
                // 1. Organization Schema
                [
                    '@type'        => 'Organization',
                    '@id'          => $homeUrl . '#organization',
                    'name'         => 'PT Indotech Berkah Abadi',
                    'alternateName'=> 'Cleanique Laundry',
                    'url'          => $homeUrl,
                    'logo'         => [
                        '@type'      => 'ImageObject',
                        '@id'        => $homeUrl . '#logo',
                        'url'        => $imageUrl,
                        'caption'    => 'Cleanique Laundry by Indotech',
                    ],
                    'contactPoint' => [
                        '@type'       => 'ContactPoint',
                        'telephone'   => '+62-812-1555-5388',
                        'contactType' => 'customer service',
                        'areaServed'  => 'ID',
                        'availableLanguage' => ['Indonesian', 'English'],
                    ],
                ],
                // 2. WebSite Schema
                [
                    '@type'     => 'WebSite',
                    '@id'       => $homeUrl . '#website',
                    'url'       => $homeUrl,
                    'name'      => $siteName,
                    'publisher' => ['@id' => $homeUrl . '#organization'],
                    'potentialAction' => [
                        '@type'       => 'SearchAction',
                        'target'      => $homeUrl . '?s={search_term_string}',
                        'query-input' => 'required name=search_term_string',
                    ],
                ],
            ],
        ];

        // 3. WebPage or Article Schema
        if (is_singular()) {
            $postId = get_queried_object_id();
            $publishedTime = get_post_time('c', true, $postId);
            $modifiedTime = get_post_modified_time('c', true, $postId);

            $pageSchema = [
                '@type'            => is_singular('post') ? 'Article' : 'WebPage',
                '@id'              => $canonical . '#webpage',
                'url'              => $canonical,
                'name'             => $title,
                'headline'         => $title,
                'description'      => $description,
                'inLanguage'       => get_locale(),
                'datePublished'    => $publishedTime,
                'dateModified'     => $modifiedTime,
                'isPartOf'         => ['@id' => $homeUrl . '#website'],
            ];

            if (!empty($imageUrl)) {
                $pageSchema['image'] = $imageUrl;
            }

            $schema['@graph'][] = $pageSchema;
        }

        echo '<script type="application/ld+json">' . "\n";
        echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
        echo '</script>' . "\n";
    }

    /**
     * Inject minimal safe meta when a third-party SEO plugin is active.
     * Prevents duplicate title, meta description, and schema tags.
     */
    private function injectMinimalMeta(): void
    {
        $googleVerify = self::cleanVerificationToken((string) Config::get('meta_google_verification', ''), 'google');
        $bingVerify = self::cleanVerificationToken((string) Config::get('meta_bing_verification', ''), 'bing');
        $sitemapUrl = untrailingslashit(home_url()) . '/sitemap.xml';

        echo "\n<!-- SEO & AEO Intelligence (Compatibility Mode: Third-Party SEO Plugin Detected) -->\n";
        if (!empty($googleVerify)) {
            echo '<meta name="google-site-verification" content="' . esc_attr($googleVerify) . '" />' . "\n";
        }
        if (!empty($bingVerify)) {
            echo '<meta name="msvalidate.01" content="' . esc_attr($bingVerify) . '" />' . "\n";
        }
        echo '<link rel="sitemap" type="application/xml" title="Sitemap" href="' . esc_url($sitemapUrl) . '" />' . "\n";
        echo "<!-- / SEO & AEO Intelligence Compatibility Mode -->\n\n";
    }

    /**
     * Clean and extract raw verification token from raw string or full HTML tag.
     * Prevents escaping errors when users paste full `<meta name="..." content="..." />` tag.
     *
     * @param string $rawToken Raw user input
     * @param string $type Verification provider type ('google' | 'bing')
     * @return string Extracted alphanumeric token
     */
    public static function cleanVerificationToken(string $rawToken, string $type = 'google'): string
    {
        $rawToken = trim($rawToken);
        if (empty($rawToken)) {
            return '';
        }

        // 1. If full meta tag is pasted: <meta ... content="TOKEN" ... />
        if (preg_match('/content=[\'"]([^\'"]+)[\'"]/i', $rawToken, $matches)) {
            return trim($matches[1]);
        }

        // 2. If unquoted or stripped content attribute: content=TOKEN
        if (preg_match('/content=([^\s>]+)/i', $rawToken, $matches)) {
            return trim(trim($matches[1], '\'"/'));
        }

        // 3. If google verification filename is pasted: google[TOKEN].html
        if ($type === 'google' && preg_match('/google([a-zA-Z0-9_-]+)\.html/i', $rawToken, $matches)) {
            return trim($matches[1]);
        }

        // 4. Strip any stray HTML tags, quotes, slashes
        $cleaned = strip_tags($rawToken);
        $cleaned = trim($cleaned, '"\'/ ');

        return $cleaned;
    }
}
