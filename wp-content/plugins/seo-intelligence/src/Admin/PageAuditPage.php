<?php

declare(strict_types=1);

namespace SeoIntelligence\Admin;

use SeoIntelligence\Core\Container;
use SeoIntelligence\Database\Repository\AuditRepository;

/**
 * On-Demand Single Page Audit View.
 */
final class PageAuditPage
{
    public function __construct(
        private readonly Container $container
    ) {
    }

    public function render(): void
    {
        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');

        // Check if preloaded with specific page ID or target URL
        $auditPageId = isset($_GET['audit_page_id']) ? (int) $_GET['audit_page_id'] : 0;
        $targetUrl = isset($_GET['target_url']) ? esc_url_raw($_GET['target_url']) : '';

        // Fetch all published posts & pages for dropdown picker
        $sitePages = get_posts([
            'post_type'      => ['page', 'post'],
            'post_status'    => 'publish',
            'posts_per_page' => 100,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ]);

        $preloadedFindings = [];
        $preloadedPage = null;

        if ($auditPageId > 0) {
            global $wpdb;
            $tablePages = $wpdb->prefix . 'seoi_pages';
            $preloadedPage = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tablePages} WHERE id = %d", $auditPageId), ARRAY_A);
            if ($preloadedPage) {
                $preloadedFindings = $repo->getPageFindings($auditPageId);
                $targetUrl = $preloadedPage['url'];
            }
        }
        ?>
        <div class="wrap seoi-wrap">
            <div class="seoi-header">
                <div class="seoi-header-left">
                    <div class="seoi-badge-brand">
                        <i class="ri-file-search-line"></i> <?php esc_html_e('Audit Halaman Individual', 'seo-intelligence'); ?>
                    </div>
                    <h1 class="seoi-title"><?php esc_html_e('Diagnosa & Optimasi Halaman Tunggal', 'seo-intelligence'); ?></h1>
                    <p class="seoi-subtitle"><?php esc_html_e('Audit mendalam dan terperinci untuk satu URL spesifik dengan rincian temuan transparan tanpa skor gelap.', 'seo-intelligence'); ?></p>
                </div>
                <div class="seoi-header-actions">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence')); ?>" class="seoi-btn seoi-btn-secondary">
                        <i class="ri-arrow-left-line"></i> <?php esc_html_e('Kembali ke Dashboard', 'seo-intelligence'); ?>
                    </a>
                </div>
            </div>

            <!-- Audit Trigger Form -->
            <div class="seoi-card seoi-audit-form-card">
                <form id="seoi-page-audit-form" class="seoi-form-inline">
                    <div class="seoi-form-group-grow">
                        <label for="seoi-target-url" class="seoi-form-label"><?php esc_html_e('Pilih Halaman atau Ketik URL:', 'seo-intelligence'); ?></label>
                        <div class="seoi-input-group">
                            <input type="url" id="seoi-target-url" name="url" class="seoi-input-text" 
                                placeholder="<?php echo esc_attr(home_url('/peluang-usaha-laundry/')); ?>" 
                                value="<?php echo esc_attr($targetUrl); ?>" required />
                            <select id="seoi-page-selector" class="seoi-select-preset">
                                <option value=""><?php esc_html_e('-- Pilih Dari Daftar Halaman --', 'seo-intelligence'); ?></option>
                                <option value="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo('name') . ' (Beranda)'); ?></option>
                                <?php foreach ($sitePages as $sp) : ?>
                                    <option value="<?php echo esc_url(get_permalink($sp->ID)); ?>">
                                        <?php echo esc_html($sp->post_title . ' (' . $sp->post_type . ')'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" id="seoi-btn-run-audit" class="seoi-btn seoi-btn-primary seoi-btn-lg">
                        <i class="ri-radar-fill"></i> <span><?php esc_html_e('Mulai Audit Halaman', 'seo-intelligence'); ?></span>
                    </button>
                </form>
            </div>

            <!-- Live Status & Loader -->
            <div id="seoi-audit-loading" class="seoi-card seoi-loading-card" style="display: none;">
                <div class="seoi-spinner-large"></div>
                <div class="seoi-loading-text">
                    <h3><?php esc_html_e('Sedang Menjalankan 11 Mesin Analisis...', 'seo-intelligence'); ?></h3>
                    <p id="seoi-loading-step"><?php esc_html_e('Mengunduh HTML dan mengevaluasi keterbacaan, heading, gambar, dan schema...', 'seo-intelligence'); ?></p>
                </div>
            </div>

            <!-- Results Container -->
            <div id="seoi-audit-results" style="<?php echo $preloadedPage ? '' : 'display: none;'; ?>">
                <!-- Score Summary Ribbon -->
                <div class="seoi-card seoi-results-summary-card">
                    <div class="seoi-summary-left">
                        <div class="seoi-gauge-circle" id="seoi-result-gauge">
                            <span class="seoi-gauge-value" id="seoi-result-overall-score"><?php echo $preloadedPage ? esc_html($preloadedPage['overall_score']) : '0'; ?></span>
                            <span class="seoi-gauge-max">/100</span>
                        </div>
                        <div class="seoi-summary-info">
                            <h2 id="seoi-result-page-title"><?php echo $preloadedPage ? esc_html($preloadedPage['title']) : ''; ?></h2>
                            <a href="<?php echo $preloadedPage ? esc_url($preloadedPage['url']) : '#'; ?>" target="_blank" id="seoi-result-page-url" class="seoi-summary-url">
                                <span><?php echo $preloadedPage ? esc_html($preloadedPage['url']) : ''; ?></span> <i class="ri-external-link-line"></i>
                            </a>
                            <div class="seoi-summary-meta">
                                <span><i class="ri-time-line"></i> <span id="seoi-result-duration">-</span></span>
                                <span><i class="ri-shield-keyhole-line"></i> HTTP <span id="seoi-result-http-status"><?php echo $preloadedPage ? esc_html($preloadedPage['http_status']) : '200'; ?></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="seoi-summary-badges">
                        <div class="seoi-badge-stat badge-critical">
                            <span class="seoi-b-num" id="seoi-count-critical"><?php echo $preloadedPage ? esc_html($preloadedPage['critical_count']) : '0'; ?></span>
                            <span class="seoi-b-label"><?php esc_html_e('Kritis', 'seo-intelligence'); ?></span>
                        </div>
                        <div class="seoi-badge-stat badge-error">
                            <span class="seoi-b-num" id="seoi-count-error"><?php echo $preloadedPage ? esc_html($preloadedPage['error_count']) : '0'; ?></span>
                            <span class="seoi-b-label"><?php esc_html_e('Error', 'seo-intelligence'); ?></span>
                        </div>
                        <div class="seoi-badge-stat badge-warning">
                            <span class="seoi-b-num" id="seoi-count-warning"><?php echo $preloadedPage ? esc_html($preloadedPage['warning_count']) : '0'; ?></span>
                            <span class="seoi-b-label"><?php esc_html_e('Peringatan', 'seo-intelligence'); ?></span>
                        </div>
                    </div>
                    <div class="seoi-summary-actions" style="display: flex; flex-direction: column; justify-content: center; gap: 8px; margin-left: 20px;">
                        <a href="<?php echo esc_url(admin_url('admin-post.php?action=seoi_export_report&page_id=' . ($preloadedPage ? $preloadedPage['id'] : 0) . '&download=1')); ?>" 
                           id="seoi-btn-export-report" 
                           target="_blank" 
                           class="seoi-btn seoi-btn-primary" 
                           title="<?php esc_attr_e('Download dokumen HTML audit eksekutif mandiri siap cetak/kirim klien.', 'seo-intelligence'); ?>"
                           style="<?php echo $preloadedPage ? '' : 'display: none;'; ?>">
                            <i class="ri-file-chart-line"></i> <?php esc_html_e('Export Laporan Eksekutif (OpenSEO)', 'seo-intelligence'); ?>
                        </a>
                        <a href="<?php echo esc_url(admin_url('admin-post.php?action=seoi_export_report&page_id=' . ($preloadedPage ? $preloadedPage['id'] : 0))); ?>" 
                           id="seoi-btn-view-report" 
                           target="_blank" 
                           class="seoi-btn seoi-btn-ghost seoi-btn-xs" 
                           style="<?php echo $preloadedPage ? '' : 'display: none;'; ?>">
                            <i class="ri-external-link-line"></i> <?php esc_html_e('Buka Preview Laporan di Tab Baru', 'seo-intelligence'); ?>
                        </a>
                    </div>
                </div>

                <!-- Category Sub-scores Grid -->
                <div class="seoi-categories-grid" id="seoi-categories-container">
                    <!-- Populated dynamically via JS or PHP -->
                </div>

                <!-- Findings Filter Bar & List -->
                <div class="seoi-card seoi-findings-card">
                    <div class="seoi-findings-header">
                        <div class="seoi-findings-tabs" id="seoi-findings-filter-tabs">
                            <button type="button" class="seoi-tab active" data-severity="all">
                                <?php esc_html_e('Semua Temuan', 'seo-intelligence'); ?> <span class="tab-badge" id="tab-count-all">0</span>
                            </button>
                            <button type="button" class="seoi-tab" data-severity="critical">
                                <i class="ri-close-circle-fill text-critical"></i> <?php esc_html_e('Kritis', 'seo-intelligence'); ?> <span class="tab-badge" id="tab-count-critical">0</span>
                            </button>
                            <button type="button" class="seoi-tab" data-severity="error">
                                <i class="ri-error-warning-fill text-error"></i> <?php esc_html_e('Error', 'seo-intelligence'); ?> <span class="tab-badge" id="tab-count-error">0</span>
                            </button>
                            <button type="button" class="seoi-tab" data-severity="warning">
                                <i class="ri-alert-fill text-warning"></i> <?php esc_html_e('Peringatan', 'seo-intelligence'); ?> <span class="tab-badge" id="tab-count-warning">0</span>
                            </button>
                            <button type="button" class="seoi-tab" data-severity="success">
                                <i class="ri-checkbox-circle-fill text-success"></i> <?php esc_html_e('Lolos & Sukses', 'seo-intelligence'); ?> <span class="tab-badge" id="tab-count-success">0</span>
                            </button>
                        </div>
                    </div>

                    <!-- Findings Cards List -->
                    <div id="seoi-findings-list" class="seoi-findings-body">
                        <!-- Populated by JS -->
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
