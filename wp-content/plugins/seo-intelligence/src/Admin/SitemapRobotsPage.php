<?php

declare(strict_types=1);

namespace SeoIntelligence\Admin;

use SeoIntelligence\Core\Config;
use SeoIntelligence\Core\Container;
use SeoIntelligence\Frontend\FrontendMetaManager;
use SeoIntelligence\Robots\RobotsManager;
use SeoIntelligence\Sitemap\SitemapManager;

/**
 * Sitemap, Robots.txt & Bot Crawling Management Admin Page.
 */
final class SitemapRobotsPage
{
    public function __construct(
        private readonly Container $container
    ) {
    }

    public function render(): void
    {
        /** @var SitemapManager $sitemapManager */
        $sitemapManager = $this->container->get('sitemap_manager');
        /** @var RobotsManager $robotsManager */
        $robotsManager = $this->container->get('robots_manager');

        $saved = false;

        // Process POST form submission
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' &&
            isset($_POST['seoi_sitemap_robots_nonce']) &&
            wp_verify_nonce((string) $_POST['seoi_sitemap_robots_nonce'], 'seoi_save_sitemap_robots')
        ) {
            // Sitemap settings
            $sitemapEnabled = isset($_POST['sitemap_enabled']);
            $sitemapPostTypes = isset($_POST['sitemap_post_types']) && is_array($_POST['sitemap_post_types'])
                ? array_map('sanitize_key', $_POST['sitemap_post_types'])
                : ['post', 'page'];
            $sitemapTaxonomies = isset($_POST['sitemap_taxonomies']) && is_array($_POST['sitemap_taxonomies'])
                ? array_map('sanitize_key', $_POST['sitemap_taxonomies'])
                : ['category'];
            $sitemapImages = isset($_POST['sitemap_include_images']);
            $sitemapLimit = max(100, min(5000, (int) ($_POST['sitemap_items_per_page'] ?? 1000)));

            // Robots policy & bot crawling
            $robotsPolicy = sanitize_text_field((string) ($_POST['robots_policy'] ?? 'aeo_geo_max'));
            $customRules = sanitize_textarea_field((string) ($_POST['robots_custom_rules'] ?? ''));

            $allowedBots = [];
            foreach (RobotsManager::BOT_REGISTRY as $key => $bot) {
                $allowedBots[$key] = isset($_POST['bot_' . $key]);
            }

            // Webmaster tools & meta (auto-clean full meta tags or filenames)
            $rawGoogle = (string) ($_POST['meta_google_verification'] ?? '');
            $googleVerify = FrontendMetaManager::cleanVerificationToken($rawGoogle, 'google');

            $rawBing = (string) ($_POST['meta_bing_verification'] ?? '');
            $bingVerify = FrontendMetaManager::cleanVerificationToken($rawBing, 'bing');

            $frontendMeta = isset($_POST['enable_frontend_meta']);
            $jsonLdSchema = isset($_POST['enable_json_ld_schema']);

            // Save to Config / Options
            Config::set('sitemap_enabled', $sitemapEnabled);
            Config::set('sitemap_post_types', $sitemapPostTypes);
            Config::set('sitemap_taxonomies', $sitemapTaxonomies);
            Config::set('sitemap_include_images', $sitemapImages);
            Config::set('sitemap_items_per_page', $sitemapLimit);

            Config::set('robots_policy', $robotsPolicy);
            Config::set('robots_custom_rules', $customRules);
            Config::set('robots_allowed_bots', $allowedBots);

            Config::set('meta_google_verification', $googleVerify);
            Config::set('meta_bing_verification', $bingVerify);
            Config::set('enable_frontend_meta', $frontendMeta);
            Config::set('enable_json_ld_schema', $jsonLdSchema);

            // Flush rewrite rules immediately
            $sitemapManager->flushRules();

            $saved = true;
        }

        $sitemapStats = $sitemapManager->getStats();
        $botMatrix = $robotsManager->getBotStatusMatrix();
        $generatedRobots = $robotsManager->getGeneratedRobotsTxt();

        $currentPolicy = (string) Config::get('robots_policy', 'aeo_geo_max');
        $sitemapEnabled = (bool) Config::get('sitemap_enabled', true);
        $sitemapPostTypes = (array) Config::get('sitemap_post_types', ['post', 'page', 'paket_usaha', 'kemitraan']);
        $sitemapTaxonomies = (array) Config::get('sitemap_taxonomies', ['category']);
        $includeImages = (bool) Config::get('sitemap_include_images', true);
        $itemsPerPage = (int) Config::get('sitemap_items_per_page', 1000);
        $customRules = (string) Config::get('robots_custom_rules', '');
        $googleVerify = (string) Config::get('meta_google_verification', '');
        $bingVerify = (string) Config::get('meta_bing_verification', '');
        $frontendMeta = (bool) Config::get('enable_frontend_meta', true);
        $jsonLdSchema = (bool) Config::get('enable_json_ld_schema', true);

        $sitemapUrl = $sitemapManager->getSitemapUrl('index');
        $robotsUrl = $robotsManager->getRobotsUrl();
        ?>
        <div class="wrap seoi-wrap">
            <!-- Header -->
            <div class="seoi-header">
                <div class="seoi-header-left">
                    <div class="seoi-badge-brand">
                        <i class="ri-radar-line"></i> <?php esc_html_e('Indexing & Bot Crawling Suite', 'seo-intelligence'); ?>
                    </div>
                    <h1 class="seoi-title"><?php esc_html_e('Sitemap XML, Robots.txt & Bot Crawling Manager', 'seo-intelligence'); ?></h1>
                    <p class="seoi-subtitle">
                        <?php esc_html_e('Kelola indeks XML Sitemap berkecepatan tinggi, hak akses perayap mesin pencari tradisional (Google, Bing), dan optimasi perayapan agen AI (OpenAI GPTBot, Claude, Perplexity) untuk dominasi GEO & AEO.', 'seo-intelligence'); ?>
                    </p>
                </div>
                <div class="seoi-header-right">
                    <a href="<?php echo esc_url($sitemapUrl); ?>" target="_blank" class="seoi-btn seoi-btn-secondary">
                        <i class="ri-external-link-line"></i> <?php esc_html_e('Buka sitemap.xml', 'seo-intelligence'); ?>
                    </a>
                    <a href="<?php echo esc_url($robotsUrl); ?>" target="_blank" class="seoi-btn seoi-btn-primary">
                        <i class="ri-file-text-line"></i> <?php esc_html_e('Buka robots.txt', 'seo-intelligence'); ?>
                    </a>
                </div>
            </div>

            <?php if ($saved) : ?>
                <div class="seoi-alert seoi-alert-success">
                    <i class="ri-checkbox-circle-line"></i>
                    <span><?php esc_html_e('Pengaturan Sitemap, Robots.txt, dan Bot Crawling berhasil disimpan! Rewrite rules telah diperbarui.', 'seo-intelligence'); ?></span>
                </div>
            <?php endif; ?>

            <!-- Real-time Status Metric Cards -->
            <div class="seoi-metrics-grid">
                <div class="seoi-metric-card">
                    <div class="seoi-metric-icon" style="background: rgba(2, 132, 199, 0.1); color: #0284c7;">
                        <i class="ri-node-tree"></i>
                    </div>
                    <div class="seoi-metric-content">
                        <div class="seoi-metric-label"><?php esc_html_e('Status XML Sitemap', 'seo-intelligence'); ?></div>
                        <div class="seoi-metric-value" style="color: #0284c7;">
                            <?php echo $sitemapEnabled ? esc_html__('Aktif & Terindeks', 'seo-intelligence') : esc_html__('Dinonaktifkan', 'seo-intelligence'); ?>
                        </div>
                        <div class="seoi-metric-desc">
                            <?php printf(esc_html__('%d Total URL terdaftar dalam %d sub-sitemap.', 'seo-intelligence'), $sitemapStats['total_urls'], $sitemapStats['total_sitemaps']); ?>
                        </div>
                    </div>
                </div>

                <div class="seoi-metric-card">
                    <div class="seoi-metric-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                        <i class="ri-robot-2-line"></i>
                    </div>
                    <div class="seoi-metric-content">
                        <div class="seoi-metric-label"><?php esc_html_e('Kebijakan Robots.txt', 'seo-intelligence'); ?></div>
                        <div class="seoi-metric-value" style="color: #10b981;">
                            <?php 
                            echo match ($currentPolicy) {
                                'aeo_geo_max' => esc_html__('AEO & GEO Ready', 'seo-intelligence'),
                                'search_only' => esc_html__('Search Only', 'seo-intelligence'),
                                default       => esc_html__('Custom Mode', 'seo-intelligence'),
                            };
                            ?>
                        </div>
                        <div class="seoi-metric-desc">
                            <?php echo $robotsManager->hasPhysicalRobotsTxt() ? esc_html__('Peringatan: Terdapat file fisik robots.txt di server.', 'seo-intelligence') : esc_html__('Virtual Dynamic Handler Aktif.', 'seo-intelligence'); ?>
                        </div>
                    </div>
                </div>

                <div class="seoi-metric-card">
                    <div class="seoi-metric-icon" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;">
                        <i class="ri-sparkling-2-line"></i>
                    </div>
                    <div class="seoi-metric-content">
                        <div class="seoi-metric-label"><?php esc_html_e('Bot Crawling Coverage', 'seo-intelligence'); ?></div>
                        <div class="seoi-metric-value" style="color: #9333ea;">
                            <?php
                            $allowedCount = 0;
                            foreach ($botMatrix as $b) {
                                if ($b['allowed']) {
                                    $allowedCount++;
                                }
                            }
                            echo esc_html($allowedCount . ' / ' . count($botMatrix) . ' Bot Diizinkan');
                            ?>
                        </div>
                        <div class="seoi-metric-desc"><?php esc_html_e('Siap untuk sitasi Google SGE, Perplexity & SearchGPT.', 'seo-intelligence'); ?></div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form method="post" action="" class="seoi-settings-form">
                <?php wp_nonce_field('seoi_save_sitemap_robots', 'seoi_sitemap_robots_nonce'); ?>

                <!-- Section 1: Bot Crawling & AEO / GEO Matrix -->
                <div class="seoi-card">
                    <div class="seoi-card-header">
                        <h2><i class="ri-shield-user-line"></i> <?php esc_html_e('Perizinan Bot Crawling (Search Engine & AI Answer Engines)', 'seo-intelligence'); ?></h2>
                        <span class="seoi-badge seoi-badge-brand"><?php esc_html_e('AEO & GEO Engine', 'seo-intelligence'); ?></span>
                    </div>
                    <p class="seoi-help-text">
                        <?php esc_html_e('Di era Generative Engine Optimization (GEO) dan Answer Engine Optimization (AEO), mengizinkan bot AI seperti GPTBot, ClaudeBot, dan PerplexityBot sangat krusial agar profil Cleanique Laundry muncul sebagai jawaban dan rekomendasi utama saat audiens bertanya kepada asisten AI.', 'seo-intelligence'); ?>
                    </p>

                    <!-- Policy selector -->
                    <div class="seoi-form-group" style="margin-bottom: 24px;">
                        <label for="robots_policy" style="font-weight: 700; font-size: 14px; display: block; margin-bottom: 8px;">
                            <?php esc_html_e('Mode Kebijakan Crawling:', 'seo-intelligence'); ?>
                        </label>
                        <select name="robots_policy" id="robots_policy" class="seoi-input-select" style="max-width: 500px;">
                            <option value="aeo_geo_max" <?php selected($currentPolicy, 'aeo_geo_max'); ?>>
                                <?php esc_html_e('★ Maksimal AEO & GEO (Izinkan Google, Bing, OpenAI, Claude, Perplexity) — Sangat Disarankan', 'seo-intelligence'); ?>
                            </option>
                            <option value="search_only" <?php selected($currentPolicy, 'search_only'); ?>>
                                <?php esc_html_e('Mesin Pencari Saja (Izinkan Google/Bing, Blokir Bot Scraping AI)', 'seo-intelligence'); ?>
                            </option>
                            <option value="custom" <?php selected($currentPolicy, 'custom'); ?>>
                                <?php esc_html_e('Kustom Penuh (Tulis aturan robots.txt secara manual)', 'seo-intelligence'); ?>
                            </option>
                        </select>
                    </div>

                    <!-- Bot Matrix Table -->
                    <div class="seoi-table-wrap" style="overflow-x: auto;">
                        <table class="wp-list-table widefat fixed striped" style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden;">
                            <thead>
                                <tr>
                                    <th style="width: 25%;"><?php esc_html_e('Perayap (Bot Agent)', 'seo-intelligence'); ?></th>
                                    <th style="width: 20%;"><?php esc_html_e('Pengembang / Platform', 'seo-intelligence'); ?></th>
                                    <th style="width: 20%;"><?php esc_html_e('Kategori Mesin', 'seo-intelligence'); ?></th>
                                    <th style="width: 20%;"><?php esc_html_e('Status Perayapan', 'seo-intelligence'); ?></th>
                                    <th style="width: 15%; text-align: center;"><?php esc_html_e('Akses Crawl', 'seo-intelligence'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($botMatrix as $key => $bot) : ?>
                                    <tr>
                                        <td>
                                            <strong style="color: #0f172a;"><?php echo esc_html($bot['name']); ?></strong>
                                            <div style="font-size: 11px; color: #64748b;"><?php echo esc_html($bot['description']); ?></div>
                                        </td>
                                        <td>
                                            <span style="font-weight: 600;"><?php echo esc_html($bot['vendor']); ?></span>
                                        </td>
                                        <td>
                                            <?php if ($bot['is_ai']) : ?>
                                                <span class="seoi-badge" style="background: #fdf2f8; color: #be185d; border: 1px solid #fbcfe8;">
                                                    <i class="ri-sparkling-fill"></i> <?php echo esc_html($bot['category']); ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="seoi-badge" style="background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0;">
                                                    <i class="ri-search-line"></i> <?php echo esc_html($bot['category']); ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($bot['allowed']) : ?>
                                                <span style="color: #16a34a; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                                    <i class="ri-checkbox-circle-fill"></i> <?php esc_html_e('Diizinkan (Allow)', 'seo-intelligence'); ?>
                                                </span>
                                            <?php else : ?>
                                                <span style="color: #dc2626; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                                    <i class="ri-close-circle-fill"></i> <?php esc_html_e('Diblokir (Disallow)', 'seo-intelligence'); ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <label class="seoi-switch">
                                                <input type="checkbox" name="bot_<?php echo esc_attr($key); ?>" value="1" <?php checked($bot['allowed']); ?> />
                                                <span class="seoi-slider"></span>
                                            </label>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Custom Rules Textarea -->
                    <div class="seoi-form-group" style="margin-top: 24px;">
                        <label for="robots_custom_rules" style="font-weight: 700; font-size: 14px; display: block; margin-bottom: 8px;">
                            <?php esc_html_e('Aturan Tambahan (Custom Directives):', 'seo-intelligence'); ?>
                        </label>
                        <p class="seoi-help-text">
                            <?php esc_html_e('Tambahkan instruksi kustom Disallow / Allow lainnya baris per baris. Sitemap URL akan otomatis disisipkan di baris paling bawah.', 'seo-intelligence'); ?>
                        </p>
                        <textarea name="robots_custom_rules" id="robots_custom_rules" rows="4" class="seoi-textarea" style="font-family: monospace; font-size: 13px;" placeholder="# Disallow: /private-folder/"><?php echo esc_textarea($customRules); ?></textarea>
                    </div>

                    <!-- Live Robots.txt Preview -->
                    <div style="margin-top: 24px; background: #0f172a; color: #e2e8f0; border-radius: 8px; padding: 20px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; border-bottom: 1px solid #334155; padding-bottom: 10px;">
                            <span style="font-weight: 700; font-size: 13px; color: #38bdf8;">
                                <i class="ri-terminal-box-line"></i> <?php esc_html_e('Preview Live Output: /robots.txt', 'seo-intelligence'); ?>
                            </span>
                            <a href="<?php echo esc_url($robotsUrl); ?>" target="_blank" style="color: #38bdf8; font-size: 12px; text-decoration: underline;">
                                <?php esc_html_e('Buka URL Asli ↗', 'seo-intelligence'); ?>
                            </a>
                        </div>
                        <pre style="margin: 0; font-size: 12px; line-height: 1.6; color: #94a3b8; overflow-x: auto; white-space: pre-wrap;"><?php echo esc_html($generatedRobots); ?></pre>
                    </div>
                </div>

                <!-- Section 2: XML Sitemap Configuration -->
                <div class="seoi-card" style="margin-top: 32px;">
                    <div class="seoi-card-header">
                        <h2><i class="ri-node-tree"></i> <?php esc_html_e('Konfigurasi XML Sitemap Generator', 'seo-intelligence'); ?></h2>
                        <a href="<?php echo esc_url($sitemapUrl); ?>" target="_blank" class="seoi-btn seoi-btn-sm seoi-btn-secondary">
                            <i class="ri-external-link-line"></i> <?php esc_html_e('Preview sitemap.xml', 'seo-intelligence'); ?>
                        </a>
                    </div>
                    <p class="seoi-help-text">
                        <?php esc_html_e('Sitemap index otomatis diperbarui secara dinamis setiap kali Anda mempublikasikan atau mengubah paket usaha, landing page, atau artikel blog.', 'seo-intelligence'); ?>
                    </p>

                    <!-- Toggle Enable -->
                    <div class="seoi-form-group" style="margin-bottom: 20px;">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 700;">
                            <input type="checkbox" name="sitemap_enabled" value="1" <?php checked($sitemapEnabled); ?> />
                            <span><?php esc_html_e('Aktifkan XML Sitemap Otomatis (/sitemap.xml)', 'seo-intelligence'); ?></span>
                        </label>
                    </div>

                    <!-- Post types to include -->
                    <div class="seoi-form-group" style="margin-bottom: 20px;">
                        <label style="font-weight: 700; display: block; margin-bottom: 8px;">
                            <?php esc_html_e('Tipe Konten (Post Types) yang Disertakan dalam Sitemap:', 'seo-intelligence'); ?>
                        </label>
                        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                            <?php
                            $availablePostTypes = [
                                'page'        => 'Halaman Statis (Pages / Landing Pages)',
                                'post'        => 'Artikel & Berita (Posts)',
                                'paket_usaha' => 'Katalog Paket Usaha Laundry (Custom Post Type)',
                                'kemitraan'   => 'Peluang Kemitraan (Custom Post Type)',
                            ];
                            foreach ($availablePostTypes as $pt => $label) :
                                $checked = in_array($pt, $sitemapPostTypes, true);
                            ?>
                                <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
                                    <input type="checkbox" name="sitemap_post_types[]" value="<?php echo esc_attr($pt); ?>" <?php checked($checked); ?> />
                                    <span><?php echo esc_html($label); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Taxonomies to include -->
                    <div class="seoi-form-group" style="margin-bottom: 20px;">
                        <label style="font-weight: 700; display: block; margin-bottom: 8px;">
                            <?php esc_html_e('Taksonomi yang Disertakan:', 'seo-intelligence'); ?>
                        </label>
                        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                            <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
                                <input type="checkbox" name="sitemap_taxonomies[]" value="category" <?php checked(in_array('category', $sitemapTaxonomies, true)); ?> />
                                <span><?php esc_html_e('Kategori Artikel (Categories)', 'seo-intelligence'); ?></span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
                                <input type="checkbox" name="sitemap_taxonomies[]" value="post_tag" <?php checked(in_array('post_tag', $sitemapTaxonomies, true)); ?> />
                                <span><?php esc_html_e('Tag Artikel (Tags)', 'seo-intelligence'); ?></span>
                            </label>
                        </div>
                    </div>

                    <!-- Image Sitemap toggle -->
                    <div class="seoi-form-group" style="margin-bottom: 20px;">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 700;">
                            <input type="checkbox" name="sitemap_include_images" value="1" <?php checked($includeImages); ?> />
                            <span><?php esc_html_e('Sertakan Gambar (Google Image Sitemap) untuk meningkatkan trafik pencarian visual', 'seo-intelligence'); ?></span>
                        </label>
                    </div>

                    <!-- Limit -->
                    <div class="seoi-form-group" style="max-width: 250px;">
                        <label for="sitemap_items_per_page" style="font-weight: 700; display: block; margin-bottom: 6px;">
                            <?php esc_html_e('Batas URL per Sub-Sitemap:', 'seo-intelligence'); ?>
                        </label>
                        <input type="number" name="sitemap_items_per_page" id="sitemap_items_per_page" class="seoi-input-number" min="100" max="5000" value="<?php echo esc_attr((string) $itemsPerPage); ?>" />
                    </div>

                    <!-- Sub-Sitemaps Table -->
                    <div style="margin-top: 24px;">
                        <h4 style="font-size: 14px; font-weight: 700; margin-bottom: 10px; color: #0f172a;">
                            <?php esc_html_e('Daftar Sub-Sitemap yang Aktif Saat Ini:', 'seo-intelligence'); ?>
                        </h4>
                        <table class="wp-list-table widefat fixed striped" style="border: 1px solid #e2e8f0; border-radius: 8px;">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e('Sitemap URL', 'seo-intelligence'); ?></th>
                                    <th><?php esc_html_e('Jumlah Entri', 'seo-intelligence'); ?></th>
                                    <th><?php esc_html_e('Terakhir Diperbarui', 'seo-intelligence'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sitemapStats['sub_sitemaps'] as $sub) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo esc_url($sub['url']); ?>" target="_blank" style="font-weight: 600; color: #0284c7;">
                                                <?php echo esc_html($sub['url']); ?> ↗
                                            </a>
                                        </td>
                                        <td>
                                            <span class="seoi-badge" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">
                                                <?php echo esc_html((string) $sub['count']); ?> URL
                                            </span>
                                        </td>
                                        <td><?php echo esc_html(gmdate('Y-m-d H:i:s', strtotime($sub['lastmod']))); ?> UTC</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section 3: Webmaster Tools & Frontend Meta ("dan lainya") -->
                <div class="seoi-card" style="margin-top: 32px;">
                    <div class="seoi-card-header">
                        <h2><i class="ri-global-line"></i> <?php esc_html_e('Verifikasi Google Search Console & Webmaster Tools', 'seo-intelligence'); ?></h2>
                    </div>
                    <p class="seoi-help-text">
                        <?php esc_html_e('Hubungkan website dengan Google Search Console dan Bing Webmaster Tools, serta aktifkan injeksi otomatis Canonical URL, OpenGraph, Twitter Cards, dan Schema JSON-LD.', 'seo-intelligence'); ?>
                    </p>

                    <?php
                    $isBlogPublic = (int) get_option('blog_public', 1);
                    if ($isBlogPublic === 0) :
                    ?>
                        <!-- Critical Warning: Search Engine Discouraged -->
                        <div style="background: #fef2f2; border: 1px solid #fecaca; border-left: 4px solid #dc2626; padding: 14px 18px; border-radius: 8px; margin-bottom: 24px;">
                            <h4 style="margin: 0 0 6px 0; color: #991b1b; display: flex; align-items: center; gap: 8px; font-size: 15px;">
                                <i class="ri-error-warning-fill" style="font-size: 18px;"></i> <?php esc_html_e('Peringatan Kritis: WordPress Memblokir Mesin Pencari (noindex aktif)!', 'seo-intelligence'); ?>
                            </h4>
                            <p style="margin: 0; font-size: 13.5px; color: #7f1d1d; line-height: 1.5;">
                                <?php esc_html_e('WordPress Anda saat ini mengaktifkan opsi "Halangi mesin pencari mengindeks situs ini". Opsi ini menyisipkan tag noindex sehingga Google Search Console menolak pengindeksan.', 'seo-intelligence'); ?><br>
                                <a href="<?php echo esc_url(admin_url('options-reading.php')); ?>" target="_blank" style="font-weight: 700; color: #dc2626; text-decoration: underline;">
                                    <?php esc_html_e('Klik di sini untuk membuka Settings > Reading dan hilangkan centang opsi tersebut →', 'seo-intelligence'); ?>
                                </a>
                            </p>
                        </div>
                    <?php endif; ?>

                    <!-- Step-by-Step GSC Guide -->
                    <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 16px 20px; margin-bottom: 24px;">
                        <h4 style="margin: 0 0 10px 0; color: #166534; font-size: 15px; display: flex; align-items: center; gap: 8px;">
                            <i class="ri-lightbulb-flash-line"></i> <?php esc_html_e('Panduan Langkah Demi Langkah Menghubungkan ke Google Search Console:', 'seo-intelligence'); ?>
                        </h4>
                        <ol style="margin: 0; padding-left: 20px; font-size: 13.5px; color: #14532d; line-height: 1.65;">
                            <li><?php echo sprintf(
                                /* translators: %s: GSC link */
                                __('Buka %s lalu klik <strong>Tambahkan Properti (Add Property)</strong>.', 'seo-intelligence'),
                                '<a href="https://search.google.com/search-console" target="_blank" rel="noopener" style="font-weight: 600; text-decoration: underline;">Google Search Console</a>'
                            ); ?></li>
                            <li><?php echo sprintf(
                                /* translators: %s: Site home URL */
                                __('Pilih kotak sebelah kanan: <strong>Awalan URL (URL Prefix)</strong> dan masukkan URL persis: <code>%s</code> <em>(Jangan pilih "Domain" jika ingin verifikasi cepat tanpa DNS registrar).</em>', 'seo-intelligence'),
                                esc_html(home_url('/'))
                            ); ?></li>
                            <li><?php esc_html_e('Pilih metode verifikasi <strong>Tag HTML (HTML tag)</strong>. Salin kode tag tersebut (contoh: <meta name="google-site-verification" content="abcdef..." />).', 'seo-intelligence'); ?></li>
                            <li><?php esc_html_e('Tempelkan ke kolom input di bawah ini, lalu klik tombol "Simpan Pengaturan". Sistem kami otomatis mengekstrak token yang valid dan juga mendukung verifikasi File HTML secara otomatis.', 'seo-intelligence'); ?></li>
                            <li><?php esc_html_e('Kembali ke Google Search Console dan klik tombol <strong>Verifikasi (Verify)</strong>.', 'seo-intelligence'); ?></li>
                            <li><?php echo sprintf(
                                /* translators: %s: sitemap filename */
                                __('Setelah terverifikasi, buka menu <strong>Peta Situs (Sitemaps)</strong> di Google Search Console, ketik <code>%s</code> lalu klik <strong>Kirim (Submit)</strong>.', 'seo-intelligence'),
                                'sitemap.xml'
                            ); ?></li>
                        </ol>
                    </div>

                    <div class="seoi-form-group" style="margin-bottom: 24px;">
                        <label for="meta_google_verification" style="font-weight: 700; display: block; margin-bottom: 6px;">
                            <i class="ri-google-fill text-primary"></i> <?php esc_html_e('Google Search Console Verification Code / HTML Tag:', 'seo-intelligence'); ?>
                        </label>
                        <input type="text" name="meta_google_verification" id="meta_google_verification" class="seoi-input-text" style="max-width: 650px;" value="<?php echo esc_attr($googleVerify); ?>" placeholder="Tempel seluruh tag HTML <meta ...> atau hanya kodenya saja" />
                        <span style="font-size: 12px; color: #64748b; display: block; margin-top: 4px;">
                            <?php esc_html_e('Anda dapat menempelkan seluruh baris <meta name="google-site-verification" content="..." /> atau cukup token kodenya saja. Sistem akan otomatis membersihkannya.', 'seo-intelligence'); ?>
                        </span>

                        <?php if (!empty($googleVerify)) : ?>
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px 14px; margin-top: 10px; font-size: 13px; max-width: 650px;">
                                <span style="color: #475569; font-weight: 600; display: flex; align-items: center; gap: 6px;">
                                    <i class="ri-checkbox-circle-fill" style="color: #16a34a;"></i> <?php esc_html_e('Tag Verifikasi Aktif di <head> Halaman Depan:', 'seo-intelligence'); ?>
                                </span>
                                <code style="display: block; margin-top: 6px; padding: 6px 10px; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 4px; color: #0284c7; word-break: break-all;">
                                    &lt;meta name="google-site-verification" content="<?php echo esc_attr($googleVerify); ?>" /&gt;
                                </code>
                                <div style="margin-top: 8px; display: flex; gap: 14px; align-items: center;">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank" class="seoi-link-action" style="font-size: 12px;">
                                        <i class="ri-external-link-line"></i> <?php esc_html_e('Buka Halaman Depan', 'seo-intelligence'); ?>
                                    </a>
                                    <span style="color: #cbd5e1;">|</span>
                                    <a href="<?php echo esc_url(home_url('/google' . $googleVerify . '.html')); ?>" target="_blank" class="seoi-link-action" style="font-size: 12px;">
                                        <i class="ri-file-text-line"></i> <?php echo esc_html(sprintf(__('Tes File Verifikasi (/google%s.html)', 'seo-intelligence'), substr($googleVerify, 0, 8) . '...')); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="seoi-form-group" style="margin-bottom: 24px;">
                        <label for="meta_bing_verification" style="font-weight: 700; display: block; margin-bottom: 6px;">
                            <?php esc_html_e('Bing Webmaster Verification Code:', 'seo-intelligence'); ?>
                        </label>
                        <input type="text" name="meta_bing_verification" id="meta_bing_verification" class="seoi-input-text" style="max-width: 650px;" value="<?php echo esc_attr($bingVerify); ?>" placeholder="misal: 1234567890ABCDEF1234567890ABCDEF" />
                    </div>

                    <div class="seoi-form-group" style="margin-bottom: 12px;">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 700;">
                            <input type="checkbox" name="enable_frontend_meta" value="1" <?php checked($frontendMeta); ?> />
                            <span><?php esc_html_e('Injeksi Otomatis Meta Description, Canonical URL, OpenGraph, & Twitter Cards di <head>', 'seo-intelligence'); ?></span>
                        </label>
                    </div>

                    <div class="seoi-form-group">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 700;">
                            <input type="checkbox" name="enable_json_ld_schema" value="1" <?php checked($jsonLdSchema); ?> />
                            <span><?php esc_html_e('Injeksi Otomatis JSON-LD Schema (Organization PT Indotech & WebSite SearchAction)', 'seo-intelligence'); ?></span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="seoi-actions-bar" style="margin-top: 32px; padding: 20px; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; justify-content: flex-end;">
                    <button type="submit" class="seoi-btn seoi-btn-primary seoi-btn-lg">
                        <i class="ri-save-3-line"></i> <?php esc_html_e('Simpan Pengaturan & Refresh Rewrite Rules', 'seo-intelligence'); ?>
                    </button>
                </div>
            </form>
        </div>
        <?php
    }
}
