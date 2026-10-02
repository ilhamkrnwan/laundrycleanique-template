<?php

declare(strict_types=1);

namespace SeoIntelligence\Admin;

use SeoIntelligence\Core\Container;
use SeoIntelligence\Database\Repository\AuditRepository;

/**
 * Main SEO Intelligence Dashboard Page.
 */
final class DashboardPage
{
    public function __construct(
        private readonly Container $container
    ) {
    }

    public function render(): void
    {
        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');
        $latest = $repo->getLatestAudit();
        $stats = $repo->getGlobalStats();
        $recentAudits = $repo->getRecentAudits(5);
        $recentPages = $repo->getAuditedPages(8);

        $avgScore = $stats['avg_score'] ?: ($latest ? (int) $latest['overall_score'] : 0);
        $scoreClass = $avgScore >= 90 ? 'score-excellent' : ($avgScore >= 70 ? 'score-good' : ($avgScore >= 50 ? 'score-warning' : 'score-danger'));

        ?>
        <div class="wrap seoi-wrap">
            <!-- Header -->
            <div class="seoi-header">
                <div class="seoi-header-left">
                    <div class="seoi-badge-brand">
                        <i class="ri-shield-check-line"></i> SEO Intelligence v<?php echo esc_html(SEOI_VERSION); ?>
                    </div>
                    <h1 class="seoi-title"><?php esc_html_e('Kesehatan SEO & AEO Website', 'seo-intelligence'); ?></h1>
                    <p class="seoi-subtitle"><?php esc_html_e('Audit holistik berbasis explainable diagnosis: SEO Teknis, GEO, AEO, Struktur Heading, dan Keterbacaan Bahasa Indonesia.', 'seo-intelligence'); ?></p>
                </div>
                <div class="seoi-header-actions">
                    <?php if (!empty($recentPages)) : ?>
                        <a href="<?php echo esc_url(admin_url('admin-post.php?action=seoi_export_report&page_id=' . $recentPages[0]['id'] . '&download=1')); ?>" target="_blank" class="seoi-btn seoi-btn-secondary" title="<?php esc_attr_e('Unduh Laporan Eksekutif OpenSEO HTML Halaman Terakhir', 'seo-intelligence'); ?>">
                            <i class="ri-file-chart-line"></i> <?php esc_html_e('Export Laporan Eksekutif', 'seo-intelligence'); ?>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-page-audit')); ?>" class="seoi-btn seoi-btn-secondary">
                        <i class="ri-file-search-line"></i> <?php esc_html_e('Audit Halaman', 'seo-intelligence'); ?>
                    </a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-site-audit')); ?>" class="seoi-btn seoi-btn-primary">
                        <i class="ri-radar-line"></i> <?php esc_html_e('Audit Menyeluruh', 'seo-intelligence'); ?>
                    </a>
                </div>
            </div>

            <!-- Stats Overview Cards -->
            <div class="seoi-stats-grid">
                <!-- Score Card -->
                <div class="seoi-card seoi-score-card <?php echo esc_attr($scoreClass); ?>">
                    <div class="seoi-score-gauge">
                        <div class="seoi-score-number"><?php echo esc_html((string) $avgScore); ?></div>
                        <div class="seoi-score-scale">/ 100</div>
                    </div>
                    <div class="seoi-score-details">
                        <h3><?php esc_html_e('Skor Rata-Rata', 'seo-intelligence'); ?></h3>
                        <p><?php echo $avgScore >= 80 ? esc_html__('Kondisi sangat prima untuk mesin pencari & AI', 'seo-intelligence') : esc_html__('Membutuhkan optimasi beberapa indikator kunci', 'seo-intelligence'); ?></p>
                    </div>
                </div>

                <!-- Pages Audited -->
                <div class="seoi-card seoi-stat-card">
                    <div class="seoi-stat-icon icon-blue"><i class="ri-pages-line"></i></div>
                    <div class="seoi-stat-content">
                        <div class="seoi-stat-number"><?php echo esc_html((string) $stats['total_pages']); ?></div>
                        <div class="seoi-stat-label"><?php esc_html_e('Halaman Terindeks Audit', 'seo-intelligence'); ?></div>
                    </div>
                </div>

                <!-- Critical Issues -->
                <div class="seoi-card seoi-stat-card">
                    <div class="seoi-stat-icon icon-red"><i class="ri-alarm-warning-line"></i></div>
                    <div class="seoi-stat-content">
                        <div class="seoi-stat-number"><?php echo esc_html((string) $stats['total_critical']); ?></div>
                        <div class="seoi-stat-label"><?php esc_html_e('Masalah Kritis (Blokir Penelusuran)', 'seo-intelligence'); ?></div>
                    </div>
                </div>

                <!-- Warnings -->
                <div class="seoi-card seoi-stat-card">
                    <div class="seoi-stat-icon icon-amber"><i class="ri-error-warning-line"></i></div>
                    <div class="seoi-stat-content">
                        <div class="seoi-stat-number"><?php echo esc_html((string) ($stats['total_error'] + $stats['total_warning'])); ?></div>
                        <div class="seoi-stat-label"><?php esc_html_e('Peluang Peningkatan (AEO & GEO)', 'seo-intelligence'); ?></div>
                    </div>
                </div>
            </div>

            <!-- Main Content Two Columns -->
            <div class="seoi-grid-2col">
                <!-- Left: Recent Audited Pages Table -->
                <div class="seoi-card seoi-table-card">
                    <div class="seoi-card-header">
                        <h2><i class="ri-history-line"></i> <?php esc_html_e('Riwayat Audit Halaman Terakhir', 'seo-intelligence'); ?></h2>
                        <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-page-audit')); ?>" class="seoi-link-action"><?php esc_html_e('Uji Halaman Baru →', 'seo-intelligence'); ?></a>
                    </div>
                    <?php if (empty($recentPages)) : ?>
                        <div class="seoi-empty-state">
                            <i class="ri-search-eye-line"></i>
                            <p><?php esc_html_e('Belum ada halaman yang diaudit. Coba uji halaman Beranda atau Landing Page Peluang Usaha sekarang.', 'seo-intelligence'); ?></p>
                            <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-page-audit')); ?>" class="seoi-btn seoi-btn-primary seoi-btn-sm">
                                <?php esc_html_e('Mulai Audit Halaman Pertama', 'seo-intelligence'); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="seoi-table-responsive">
                            <table class="seoi-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e('Judul & URL', 'seo-intelligence'); ?></th>
                                        <th><?php esc_html_e('Skor', 'seo-intelligence'); ?></th>
                                        <th><?php esc_html_e('Kritis', 'seo-intelligence'); ?></th>
                                        <th><?php esc_html_e('Peringatan', 'seo-intelligence'); ?></th>
                                        <th><?php esc_html_e('Waktu', 'seo-intelligence'); ?></th>
                                        <th><?php esc_html_e('Aksi', 'seo-intelligence'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentPages as $p) : 
                                        $pScore = (int) $p['overall_score'];
                                        $pillClass = $pScore >= 80 ? 'pill-success' : ($pScore >= 60 ? 'pill-warning' : 'pill-danger');
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="seoi-page-cell-title"><?php echo esc_html($p['title']); ?></div>
                                                <a href="<?php echo esc_url($p['url']); ?>" target="_blank" class="seoi-page-cell-url">
                                                    <?php echo esc_html($p['url']); ?> <i class="ri-external-link-line"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="seoi-pill <?php echo esc_attr($pillClass); ?>">
                                                    <?php echo esc_html((string) $pScore); ?>
                                                </span>
                                            </td>
                                            <td><span class="seoi-count-critical"><?php echo esc_html((string) $p['critical_count']); ?></span></td>
                                            <td><span class="seoi-count-warning"><?php echo esc_html((string) ($p['error_count'] + $p['warning_count'])); ?></span></td>
                                            <td><span class="seoi-time-ago"><?php echo esc_html(human_time_diff(strtotime($p['created_at']), current_time('timestamp')) . ' lalu'); ?></span></td>
                                            <td>
                                                <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-page-audit&audit_page_id=' . $p['id'])); ?>" class="seoi-btn seoi-btn-ghost seoi-btn-xs">
                                                    <i class="ri-eye-line"></i> <?php esc_html_e('Rincian', 'seo-intelligence'); ?>
                                                </a>
                                                <a href="<?php echo esc_url(admin_url('admin-post.php?action=seoi_export_report&page_id=' . $p['id'] . '&download=1')); ?>" target="_blank" class="seoi-btn seoi-btn-secondary seoi-btn-xs" title="<?php esc_attr_e('Unduh Dokumen Eksekutif HTML', 'seo-intelligence'); ?>">
                                                    <i class="ri-download-2-line"></i> <?php esc_html_e('Report', 'seo-intelligence'); ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right: Dimension Coverage & Quick Audit Shortcuts -->
                <div class="seoi-col-sidebar">
                    <!-- Quick Audit Shortcuts -->
                    <div class="seoi-card">
                        <div class="seoi-card-header">
                            <h2><i class="ri-flashlight-line"></i> <?php esc_html_e('Audit Kilat Halaman Kunci', 'seo-intelligence'); ?></h2>
                        </div>
                        <p class="seoi-help-text"><?php esc_html_e('Pilih salah satu halaman utama untuk langsung memeriksa kualitas SEO & AEO:', 'seo-intelligence'); ?></p>
                        <div class="seoi-quick-list">
                            <?php
                            $quickPages = [
                                ['title' => 'Beranda Utama', 'url' => home_url('/')],
                                ['title' => 'Peluang Usaha Laundry', 'url' => home_url('/peluang-usaha-laundry/')],
                                ['title' => 'Tentang Kami', 'url' => home_url('/tentang-kami/')],
                                ['title' => 'Kontak', 'url' => home_url('/kontak/')],
                                ['title' => 'Artikel Blog', 'url' => home_url('/artikel/')],
                            ];
                            foreach ($quickPages as $qp) :
                            ?>
                                <div class="seoi-quick-item">
                                    <div class="seoi-quick-info">
                                        <div class="seoi-quick-name"><?php echo esc_html($qp['title']); ?></div>
                                        <div class="seoi-quick-path"><?php echo esc_html(wp_parse_url($qp['url'], PHP_URL_PATH) ?: '/'); ?></div>
                                    </div>
                                    <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-page-audit&target_url=' . urlencode($qp['url']))); ?>" class="seoi-btn seoi-btn-secondary seoi-btn-xs">
                                        <i class="ri-play-line"></i> <?php esc_html_e('Audit', 'seo-intelligence'); ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- 11 Dimensions Reference Card -->
                    <div class="seoi-card">
                        <div class="seoi-card-header">
                            <h2><i class="ri-layout-masonry-line"></i> <?php esc_html_e('11 Dimensi Analisis Aktif', 'seo-intelligence'); ?></h2>
                        </div>
                        <ul class="seoi-dimension-list">
                            <li><i class="ri-file-text-line"></i> <strong>Kualitas Konten:</strong> Kedalaman kata & densitas kata kunci</li>
                            <li><i class="ri-book-open-line"></i> <strong>Keterbacaan ID:</strong> Silabel kata majemuk & panjang kalimat</li>
                            <li><i class="ri-heading"></i> <strong>Struktur Heading:</strong> H1-H6 hierarki tanpa lompatan level</li>
                            <li><i class="ri-image-line"></i> <strong>Media & Alt:</strong> Dimensi, format modern, dan alt deskriptif</li>
                            <li><i class="ri-speed-line"></i> <strong>Aset & Beban:</strong> CSS/JS render-blocking & font bloat</li>
                            <li><i class="ri-global-line"></i> <strong>SEO Teknis:</strong> Canonical, Title, Meta desc, OpenGraph</li>
                            <li><i class="ri-code-box-line"></i> <strong>Schema JSON-LD:</strong> LocalBusiness, FAQ, Breadcrumbs</li>
                            <li><i class="ri-links-line"></i> <strong>Tautan:</strong> Internal link equity & jangkar teks kontekstual</li>
                            <li><i class="ri-brain-line"></i> <strong>GEO (Generative AI):</strong> Kejelasan entitas & format kutipan</li>
                            <li><i class="ri-question-answer-line"></i> <strong>AEO (Answer Engine):</strong> Struktur FAQ & jawaban langsung</li>
                            <li><i class="ri-smartphone-line"></i> <strong>UX & Mobile:</strong> Tap target, viewport, dan legibilitas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
