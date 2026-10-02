<?php

declare(strict_types=1);

namespace SeoIntelligence\Admin;

use SeoIntelligence\Core\Container;
use SeoIntelligence\Database\Repository\AuditRepository;

/**
 * Site-Wide Sequential Crawler & Audit View.
 */
final class SiteAuditPage
{
    public function __construct(
        private readonly Container $container
    ) {
    }

    public function render(): void
    {
        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');
        $recentAudits = $repo->getRecentAudits(5);
        ?>
        <div class="wrap seoi-wrap">
            <div class="seoi-header">
                <div class="seoi-header-left">
                    <div class="seoi-badge-brand">
                        <i class="ri-radar-line"></i> <?php esc_html_e('Audit Menyeluruh Website', 'seo-intelligence'); ?>
                    </div>
                    <h1 class="seoi-title"><?php esc_html_e('Crawler Sekuensial & Audit Menyeluruh', 'seo-intelligence'); ?></h1>
                    <p class="seoi-subtitle"><?php esc_html_e('Memindai seluruh struktur halaman publik WordPress secara aman tanpa risiko server timeout, dilengkapi live progress bar.', 'seo-intelligence'); ?></p>
                </div>
                <div class="seoi-header-actions">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence')); ?>" class="seoi-btn seoi-btn-secondary">
                        <i class="ri-arrow-left-line"></i> <?php esc_html_e('Kembali ke Dashboard', 'seo-intelligence'); ?>
                    </a>
                </div>
            </div>

            <!-- Crawler Launcher Card -->
            <div class="seoi-card seoi-crawler-card">
                <div class="seoi-crawler-intro">
                    <div class="seoi-crawler-icon">
                        <i class="ri-compass-3-line"></i>
                    </div>
                    <div class="seoi-crawler-text">
                        <h3><?php esc_html_e('Audit Otomatis Seluruh URL Publik', 'seo-intelligence'); ?></h3>
                        <p><?php esc_html_e('Sistem akan menemukan seluruh beranda, postingan blog, landing page, dan halaman statis, lalu mengevaluasi setiap halaman satu per satu.', 'seo-intelligence'); ?></p>
                    </div>
                    <div class="seoi-crawler-btn-wrap">
                        <button type="button" id="seoi-btn-start-crawl" class="seoi-btn seoi-btn-primary seoi-btn-lg">
                            <i class="ri-play-circle-line"></i> <span><?php esc_html_e('Mulai Audit Website Sekarang', 'seo-intelligence'); ?></span>
                        </button>
                    </div>
                </div>

                <!-- Progress Section (Hidden initially) -->
                <div id="seoi-crawler-progress-section" style="display: none;" class="seoi-progress-section">
                    <div class="seoi-progress-header">
                        <div class="seoi-progress-title">
                            <span class="seoi-spinner-inline" id="seoi-crawl-spinner"></span>
                            <span id="seoi-crawl-status-text"><?php esc_html_e('Mempersiapkan antrean halaman...', 'seo-intelligence'); ?></span>
                        </div>
                        <div class="seoi-progress-percentage" id="seoi-crawl-percent">0%</div>
                    </div>

                    <!-- Progress Bar Track -->
                    <div class="seoi-progress-bar-track">
                        <div class="seoi-progress-bar-fill" id="seoi-progress-fill" style="width: 0%;"></div>
                    </div>

                    <!-- Progress Metrics Grid -->
                    <div class="seoi-crawl-metrics-grid">
                        <div class="seoi-metric-item">
                            <span class="seoi-m-label"><?php esc_html_e('Kemajuan', 'seo-intelligence'); ?></span>
                            <span class="seoi-m-value" id="seoi-metric-processed">0 / 0</span>
                        </div>
                        <div class="seoi-metric-item">
                            <span class="seoi-m-label"><?php esc_html_e('Skor Rata-Rata', 'seo-intelligence'); ?></span>
                            <span class="seoi-m-value" id="seoi-metric-avg-score">0</span>
                        </div>
                        <div class="seoi-metric-item text-critical">
                            <span class="seoi-m-label"><?php esc_html_e('Masalah Kritis', 'seo-intelligence'); ?></span>
                            <span class="seoi-m-value" id="seoi-metric-critical">0</span>
                        </div>
                        <div class="seoi-metric-item text-warning">
                            <span class="seoi-m-label"><?php esc_html_e('Peringatan', 'seo-intelligence'); ?></span>
                            <span class="seoi-m-value" id="seoi-metric-warning">0</span>
                        </div>
                    </div>

                    <!-- Control Buttons -->
                    <div class="seoi-crawler-controls">
                        <button type="button" id="seoi-btn-pause-crawl" class="seoi-btn seoi-btn-secondary seoi-btn-sm">
                            <i class="ri-pause-line"></i> <?php esc_html_e('Jeda Sementara', 'seo-intelligence'); ?>
                        </button>
                        <button type="button" id="seoi-btn-cancel-crawl" class="seoi-btn seoi-btn-ghost seoi-btn-sm text-danger">
                            <i class="ri-stop-circle-line"></i> <?php esc_html_e('Batalkan', 'seo-intelligence'); ?>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Live Stream Results Table -->
            <div class="seoi-card seoi-table-card">
                <div class="seoi-card-header">
                    <h2><i class="ri-list-check-3"></i> <?php esc_html_e('Aliran Hasil Pemindaian Halaman', 'seo-intelligence'); ?></h2>
                    <span id="seoi-stream-count" class="seoi-counter-badge">0 halaman</span>
                </div>
                <div class="seoi-table-responsive">
                    <table class="seoi-table" id="seoi-crawler-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Halaman & URL', 'seo-intelligence'); ?></th>
                                <th><?php esc_html_e('Status', 'seo-intelligence'); ?></th>
                                <th><?php esc_html_e('Skor', 'seo-intelligence'); ?></th>
                                <th><?php esc_html_e('Kritis', 'seo-intelligence'); ?></th>
                                <th><?php esc_html_e('Peringatan', 'seo-intelligence'); ?></th>
                                <th><?php esc_html_e('Aksi', 'seo-intelligence'); ?></th>
                            </tr>
                        </thead>
                        <tbody id="seoi-crawler-tbody">
                            <tr class="seoi-empty-row">
                                <td colspan="6" class="text-center">
                                    <?php esc_html_e('Belum ada pemindaian aktif. Klik "Mulai Audit Website Sekarang" untuk memulai.', 'seo-intelligence'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
}
