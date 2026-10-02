<?php

declare(strict_types=1);

namespace SeoIntelligence\Sitemap;

use SeoIntelligence\Core\Config;

/**
 * Production-Grade XML Sitemap Generator for WordPress.
 * Generates valid sitemap index, post type sitemaps with images, and human-friendly XSL styling.
 */
final class SitemapManager
{
    /**
     * Register WordPress hooks for sitemap generation.
     */
    public function register(): void
    {
        // Disable barebones WP core sitemaps to avoid conflicts
        add_filter('wp_sitemaps_enabled', '__return_false');

        // Register custom rewrite rules and query vars
        add_filter('query_vars', [$this, 'registerQueryVars']);
        add_action('init', [$this, 'addRewriteRules']);

        // Intercept requests early
        add_action('parse_request', [$this, 'handleSitemapRequest'], 1);
        add_action('template_redirect', [$this, 'handleTemplateRedirect'], 1);
    }

    /**
     * Register custom query vars.
     *
     * @param array<string> $vars
     * @return array<string>
     */
    public function registerQueryVars(array $vars): array
    {
        $vars[] = 'seoi_sitemap';
        $vars[] = 'seoi_sitemap_type';
        $vars[] = 'seoi_sitemap_xsl';
        return $vars;
    }

    /**
     * Add rewrite rules for XML sitemaps.
     */
    public function addRewriteRules(): void
    {
        add_rewrite_rule('^sitemap\.xml$', 'index.php?seoi_sitemap=1&seoi_sitemap_type=index', 'top');
        add_rewrite_rule('^sitemap_index\.xml$', 'index.php?seoi_sitemap=1&seoi_sitemap_type=index', 'top');
        add_rewrite_rule('^sitemap-([a-zA-Z0-9_-]+)\.xml$', 'index.php?seoi_sitemap=1&seoi_sitemap_type=$matches[1]', 'top');
        add_rewrite_rule('^sitemap\.xsl$', 'index.php?seoi_sitemap_xsl=1', 'top');
    }

    /**
     * Early request parsing for sitemap URLs (works even if permalinks are default or non-pretty).
     */
    public function handleSitemapRequest(\WP $wp): void
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        $path = (string) wp_parse_url($uri, PHP_URL_PATH);

        // Redirect old wp-sitemap.xml to standard sitemap.xml
        if (str_ends_with($path, 'wp-sitemap.xml')) {
            wp_safe_redirect($this->getSitemapUrl('index'), 301);
            exit;
        }

        // Direct matching of sitemap URL paths
        if (preg_match('#/sitemap\.xsl$#', $path)) {
            $this->renderXsl();
            exit;
        }

        if (preg_match('#/sitemap(?:_index)?\.xml$#', $path)) {
            $this->renderIndex();
            exit;
        }

        if (preg_match('#/sitemap-([a-zA-Z0-9_-]+)\.xml$#', $path, $matches)) {
            $this->renderType($matches[1]);
            exit;
        }
    }

    /**
     * Template redirect fallback if parse_request was bypassed.
     */
    public function handleTemplateRedirect(): void
    {
        $isXsl = (bool) get_query_var('seoi_sitemap_xsl');
        if ($isXsl) {
            $this->renderXsl();
            exit;
        }

        $isSitemap = (bool) get_query_var('seoi_sitemap');
        if ($isSitemap) {
            $type = (string) get_query_var('seoi_sitemap_type', 'index');
            if ($type === 'index' || empty($type)) {
                $this->renderIndex();
            } else {
                $this->renderType($type);
            }
            exit;
        }
    }

    /**
     * Output standard HTTP headers for XML output.
     */
    private function sendHeaders(string $contentType = 'text/xml'): void
    {
        if (headers_sent()) {
            return;
        }

        header('Content-Type: ' . $contentType . '; charset=UTF-8', true, 200);
        header('X-Robots-Tag: noindex, follow', true);
        header('Cache-Control: public, max-age=3600', true);
    }

    /**
     * Generate and output the XML Sitemap Index.
     */
    public function renderIndex(): void
    {
        if (!Config::get('sitemap_enabled', true)) {
            status_header(404);
            echo '<!-- SEO Intelligence: XML Sitemap is disabled in settings. -->';
            exit;
        }

        $this->sendHeaders();

        $xslUrl = esc_url($this->getXslUrl());
        $subSitemaps = $this->getSubSitemaps();

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<?xml-stylesheet type="text/xsl" href="' . $xslUrl . '"?>' . "\n";
        echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($subSitemaps as $item) {
            echo "  <sitemap>\n";
            echo '    <loc>' . esc_url($item['url']) . "</loc>\n";
            if (!empty($item['lastmod'])) {
                echo '    <lastmod>' . esc_html($item['lastmod']) . "</lastmod>\n";
            }
            echo "  </sitemap>\n";
        }

        echo '</sitemapindex>' . "\n";
        exit;
    }

    /**
     * Generate and output a specific post type or taxonomy sitemap.
     */
    public function renderType(string $type): void
    {
        if (!Config::get('sitemap_enabled', true)) {
            status_header(404);
            echo '<!-- SEO Intelligence: XML Sitemap is disabled in settings. -->';
            exit;
        }

        $this->sendHeaders();
        $xslUrl = esc_url($this->getXslUrl());
        $includeImages = (bool) Config::get('sitemap_include_images', true);
        $limit = (int) Config::get('sitemap_items_per_page', 1000);

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<?xml-stylesheet type="text/xsl" href="' . $xslUrl . '"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        if ($includeImages) {
            echo '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"' . "\n";
        }
        echo '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        if ($type === 'category' || $type === 'post_tag') {
            $this->renderTaxonomyUrls($type, $limit);
        } else {
            $this->renderPostTypeUrls($type, $limit, $includeImages);
        }

        echo '</urlset>' . "\n";
        exit;
    }

    /**
     * Render URLs for a specific post type.
     */
    private function renderPostTypeUrls(string $postType, int $limit, bool $includeImages): void
    {
        // Homepage check for 'page' post type
        $frontPageId = (int) get_option('page_on_front');

        $args = [
            'post_type'      => $postType,
            'post_status'    => 'publish',
            'posts_per_page' => $limit,
            'orderby'        => 'modified',
            'order'          => 'DESC',
            'no_found_rows'  => true,
        ];

        $query = new \WP_Query($args);

        // If 'page' and front page is static, include homepage first
        if ($postType === 'page') {
            $homeLastMod = get_lastpostmodified('GMT');
            $homeLastModIso = $homeLastMod ? gmdate('c', strtotime($homeLastMod)) : gmdate('c');
            
            echo "  <url>\n";
            echo '    <loc>' . esc_url(home_url('/')) . "</loc>\n";
            echo '    <lastmod>' . esc_html($homeLastModIso) . "</lastmod>\n";
            echo "    <changefreq>daily</changefreq>\n";
            echo "    <priority>1.0</priority>\n";
            echo "  </url>\n";
        }

        while ($query->have_posts()) {
            $query->the_post();
            $postId = get_the_ID();

            // Skip homepage if already rendered above
            if ($postType === 'page' && $postId === $frontPageId) {
                continue;
            }

            // Check noindex meta if set
            $noindex = get_post_meta($postId, '_seoi_noindex', true);
            if ($noindex === '1') {
                continue;
            }

            $permalink = get_permalink($postId);
            if (!$permalink) {
                continue;
            }

            $modifiedGmt = get_post_modified_time('c', true, $postId) ?: gmdate('c');
            $priority = $this->calculatePriority($postType, $postId);
            $changefreq = $this->calculateChangeFreq($postType);

            echo "  <url>\n";
            echo '    <loc>' . esc_url($permalink) . "</loc>\n";
            echo '    <lastmod>' . esc_html($modifiedGmt) . "</lastmod>\n";
            echo '    <changefreq>' . esc_html($changefreq) . "</changefreq>\n";
            echo '    <priority>' . esc_html($priority) . "</priority>\n";

            // Attach image sitemap data
            if ($includeImages) {
                $images = $this->getPostImages($postId);
                foreach ($images as $img) {
                    echo "    <image:image>\n";
                    echo '      <image:loc>' . esc_url($img['url']) . "</image:loc>\n";
                    if (!empty($img['title'])) {
                        echo '      <image:title>' . esc_html($img['title']) . "</image:title>\n";
                    }
                    echo "    </image:image>\n";
                }
            }

            echo "  </url>\n";
        }

        wp_reset_postdata();
    }

    /**
     * Render URLs for terms in a taxonomy.
     */
    private function renderTaxonomyUrls(string $taxonomy, int $limit): void
    {
        $terms = get_terms([
            'taxonomy'   => $taxonomy,
            'hide_empty' => true,
            'number'     => $limit,
        ]);

        if (is_wp_error($terms) || empty($terms)) {
            return;
        }

        foreach ($terms as $term) {
            $termLink = get_term_link($term);
            if (is_wp_error($termLink)) {
                continue;
            }

            echo "  <url>\n";
            echo '    <loc>' . esc_url($termLink) . "</loc>\n";
            echo "    <changefreq>weekly</changefreq>\n";
            echo "    <priority>0.5</priority>\n";
            echo "  </url>\n";
        }
    }

    /**
     * Extract images (featured image and post content images) for Image Sitemap.
     *
     * @return array<array{url: string, title: string}>
     */
    private function getPostImages(int $postId): array
    {
        $images = [];

        // 1. Featured Image
        if (has_post_thumbnail($postId)) {
            $thumbId = get_post_thumbnail_id($postId);
            $url = wp_get_attachment_image_url($thumbId, 'full');
            if ($url) {
                $images[] = [
                    'url'   => $url,
                    'title' => get_the_title($thumbId) ?: get_the_title($postId),
                ];
            }
        }

        // 2. Images embedded in post content
        $content = get_post_field('post_content', $postId);
        if (is_string($content) && str_contains($content, '<img')) {
            if (preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches)) {
                $srcs = array_slice($matches[1], 0, 5); // Max 5 content images
                foreach ($srcs as $src) {
                    if (str_starts_with($src, 'http')) {
                        $images[] = [
                            'url'   => $src,
                            'title' => get_the_title($postId),
                        ];
                    }
                }
            }
        }

        return $images;
    }

    /**
     * Compute SEO priority for a given post.
     */
    private function calculatePriority(string $postType, int $postId): string
    {
        if ($postType === 'page') {
            $slug = get_post_field('post_name', $postId);
            // High priority landing pages
            if (in_array($slug, ['paket-usaha-laundry', 'aplikasi-laundry', 'kemitraan', 'tentang-kami'], true)) {
                return '0.9';
            }
            return '0.7';
        }

        if ($postType === 'paket_usaha' || $postType === 'kemitraan') {
            return '0.9'; // Core business conversion pages
        }

        if ($postType === 'post') {
            return '0.8';
        }

        return '0.6';
    }

    /**
     * Compute change frequency based on post type.
     */
    private function calculateChangeFreq(string $postType): string
    {
        return match ($postType) {
            'post'        => 'weekly',
            'paket_usaha' => 'weekly',
            'kemitraan'   => 'weekly',
            'page'        => 'monthly',
            default       => 'monthly',
        };
    }

    /**
     * Get list of sub-sitemaps for the index.
     *
     * @return array<array{url: string, lastmod: string, count: int, title: string}>
     */
    public function getSubSitemaps(): array
    {
        $postTypes = (array) Config::get('sitemap_post_types', ['post', 'page', 'paket_usaha', 'kemitraan']);
        $taxonomies = (array) Config::get('sitemap_taxonomies', ['category']);
        $items = [];

        foreach ($postTypes as $pt) {
            if (!post_type_exists($pt)) {
                continue;
            }

            $count = (int) wp_count_posts($pt)->publish;
            if ($count === 0 && $pt !== 'page') {
                continue;
            }

            $lastPost = get_posts([
                'post_type'      => $pt,
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'orderby'        => 'modified',
                'order'          => 'DESC',
            ]);

            $lastmod = !empty($lastPost) ? get_post_modified_time('c', true, $lastPost[0]->ID) : gmdate('c');
            $ptObj = get_post_type_object($pt);

            $items[] = [
                'type'    => $pt,
                'url'     => $this->getSitemapUrl($pt),
                'lastmod' => $lastmod,
                'count'   => $count + ($pt === 'page' ? 1 : 0),
                'title'   => $ptObj ? $ptObj->labels->name : ucfirst($pt),
            ];
        }

        foreach ($taxonomies as $tax) {
            if (!taxonomy_exists($tax)) {
                continue;
            }

            $termCount = (int) wp_count_terms(['taxonomy' => $tax, 'hide_empty' => true]);
            if ($termCount === 0) {
                continue;
            }

            $taxObj = get_taxonomy($tax);

            $items[] = [
                'type'    => $tax,
                'url'     => $this->getSitemapUrl($tax),
                'lastmod' => gmdate('c'),
                'count'   => $termCount,
                'title'   => $taxObj ? $taxObj->labels->name : ucfirst($tax),
            ];
        }

        return $items;
    }

    /**
     * Generate full sitemap URL.
     */
    public function getSitemapUrl(string $type = 'index'): string
    {
        $home = untrailingslashit(home_url());
        if ($type === 'index') {
            return $home . '/sitemap.xml';
        }
        return $home . '/sitemap-' . $type . '.xml';
    }

    /**
     * Get XSL stylesheet URL.
     */
    public function getXslUrl(): string
    {
        return untrailingslashit(home_url()) . '/sitemap.xsl';
    }

    /**
     * Total indexed URLs across all active post types.
     */
    public function getStats(): array
    {
        $sub = $this->getSubSitemaps();
        $totalUrls = 0;
        foreach ($sub as $s) {
            $totalUrls += (int) ($s['count'] ?? 0);
        }

        return [
            'total_urls'      => $totalUrls,
            'total_sitemaps'  => count($sub),
            'sitemap_index'   => $this->getSitemapUrl('index'),
            'sub_sitemaps'    => $sub,
            'is_enabled'      => (bool) Config::get('sitemap_enabled', true),
        ];
    }

    /**
     * Flush WordPress rewrite rules safely.
     */
    public function flushRules(): void
    {
        $this->addRewriteRules();
        flush_rewrite_rules(false);
    }

    /**
     * Render the human-friendly responsive XSL stylesheet.
     */
    public function renderXsl(): void
    {
        if (headers_sent()) {
            return;
        }

        header('Content-Type: text/xsl; charset=UTF-8', true, 200);
        header('Cache-Control: public, max-age=86400', true);

        $siteTitle = get_bloginfo('name') ?: 'Cleanique Laundry';
        $siteUrl = home_url('/');
        $sitemapIndexUrl = $this->getSitemapUrl('index');

        echo <<<'XSL'
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0"
    xmlns:html="http://www.w3.org/TR/REC-html40"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html xmlns="http://www.w3.org/1999/xhtml" lang="id-ID">
            <head>
                <title>XML Sitemap — Cleanique Laundry</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <style type="text/css">
                    :root {
                        --primary: #0284c7;
                        --primary-dark: #0369a1;
                        --secondary: #059669;
                        --dark: #0f172a;
                        --gray-100: #f8fafc;
                        --gray-200: #e2e8f0;
                        --gray-600: #475569;
                        --gray-800: #1e293b;
                    }
                    * { box-sizing: border-box; margin: 0; padding: 0; }
                    body {
                        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
                        color: var(--gray-800);
                        background: #f1f5f9;
                        line-height: 1.5;
                        padding: 30px 20px;
                    }
                    .container {
                        max-width: 1100px;
                        margin: 0 auto;
                        background: #ffffff;
                        border-radius: 16px;
                        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
                        overflow: hidden;
                        border: 1px solid var(--gray-200);
                    }
                    .header {
                        background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
                        color: #ffffff;
                        padding: 32px 40px;
                    }
                    .header h1 {
                        font-size: 26px;
                        font-weight: 800;
                        letter-spacing: -0.5px;
                        margin-bottom: 8px;
                    }
                    .header p {
                        font-size: 14px;
                        opacity: 0.9;
                    }
                    .badge {
                        display: inline-block;
                        background: rgba(255, 255, 255, 0.2);
                        padding: 4px 12px;
                        border-radius: 999px;
                        font-size: 12px;
                        font-weight: 700;
                        margin-bottom: 12px;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                    }
                    .content { padding: 32px 40px; }
                    .intro {
                        background: #f8fafc;
                        border-left: 4px solid var(--primary);
                        padding: 16px 20px;
                        border-radius: 0 8px 8px 0;
                        font-size: 14px;
                        color: var(--gray-600);
                        margin-bottom: 24px;
                    }
                    .intro a { color: var(--primary); text-decoration: none; font-weight: 600; }
                    .intro a:hover { text-decoration: underline; }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        font-size: 13px;
                        text-align: left;
                    }
                    th {
                        background: #f8fafc;
                        color: var(--gray-600);
                        padding: 12px 16px;
                        font-weight: 700;
                        text-transform: uppercase;
                        font-size: 11px;
                        letter-spacing: 0.5px;
                        border-bottom: 2px solid var(--gray-200);
                    }
                    td {
                        padding: 12px 16px;
                        border-bottom: 1px solid #f1f5f9;
                        vertical-align: middle;
                    }
                    tr:hover td { background: #f8fafc; }
                    td a {
                        color: var(--primary);
                        font-weight: 600;
                        text-decoration: none;
                        word-break: break-all;
                    }
                    td a:hover { text-decoration: underline; }
                    .pill {
                        display: inline-block;
                        padding: 2px 8px;
                        border-radius: 6px;
                        font-size: 11px;
                        font-weight: 700;
                    }
                    .pill-priority { background: #e0f2fe; color: #0369a1; }
                    .pill-freq { background: #f1f5f9; color: var(--gray-600); }
                    .pill-images { background: #dcfce7; color: #15803d; }
                    .footer {
                        text-align: center;
                        padding: 20px 40px;
                        background: #f8fafc;
                        border-top: 1px solid var(--gray-200);
                        font-size: 12px;
                        color: var(--gray-600);
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <div class="badge">SEO &amp; AEO Intelligence</div>
                        <h1>XML Sitemap Generator</h1>
                        <p>Dokumen indeks resmi untuk mesin pencari (Google, Bing) dan Answer Engine (OpenAI ChatGPT, Perplexity, Claude).</p>
                    </div>
                    <div class="content">
                        <div class="intro">
                            Sitemap ini di-generate secara dinamis oleh <strong>SEO &amp; AEO Intelligence</strong> untuk memastikan seluruh URL dan aset gambar terindeks dengan cepat dan akurat.
                            <xsl:if test="sitemap:urlset">
                                &#160;|&#160;<a href="sitemap.xml">← Kembali ke Sitemap Index</a>
                            </xsl:if>
                        </div>

                        <!-- Sitemap Index Output -->
                        <xsl:if test="sitemap:sitemapindex">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 70%;">Sub-Sitemap XML</th>
                                        <th style="width: 30%;">Terakhir Diperbarui</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
                                        <tr>
                                            <td>
                                                <a href="{sitemap:loc}"><xsl:value-of select="sitemap:loc"/></a>
                                            </td>
                                            <td>
                                                <xsl:value-of select="concat(substring(sitemap:lastmod,0,11), ' ', substring(sitemap:lastmod,12,8))"/>
                                            </td>
                                        </tr>
                                    </xsl:for-each>
                                </tbody>
                            </table>
                        </xsl:if>

                        <!-- Sub-Sitemap Urlset Output -->
                        <xsl:if test="sitemap:urlset">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Halaman / URL</th>
                                        <th style="width: 10%;">Gambar</th>
                                        <th style="width: 12%;">Frekuensi</th>
                                        <th style="width: 10%;">Prioritas</th>
                                        <th style="width: 18%;">Terakhir Diubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <xsl:for-each select="sitemap:urlset/sitemap:url">
                                        <tr>
                                            <td>
                                                <a href="{sitemap:loc}" target="_blank"><xsl:value-of select="sitemap:loc"/></a>
                                            </td>
                                            <td>
                                                <xsl:choose>
                                                    <xsl:when test="count(image:image) &gt; 0">
                                                        <span class="pill pill-images"><xsl:value-of select="count(image:image)"/> Img</span>
                                                    </xsl:when>
                                                    <xsl:otherwise>—</xsl:otherwise>
                                                </xsl:choose>
                                            </td>
                                            <td>
                                                <span class="pill pill-freq"><xsl:value-of select="sitemap:changefreq"/></span>
                                            </td>
                                            <td>
                                                <span class="pill pill-priority"><xsl:value-of select="sitemap:priority"/></span>
                                            </td>
                                            <td>
                                                <xsl:value-of select="concat(substring(sitemap:lastmod,0,11), ' ', substring(sitemap:lastmod,12,8))"/>
                                            </td>
                                        </tr>
                                    </xsl:for-each>
                                </tbody>
                            </table>
                        </xsl:if>
                    </div>
                    <div class="footer">
                        Powered by <strong>SEO &amp; AEO Intelligence</strong> — PT Indotech Berkah Abadi
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
XSL;
        exit;
    }
}
