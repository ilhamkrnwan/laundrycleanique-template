<?php

declare(strict_types=1);

namespace SeoIntelligence\Admin;

use SeoIntelligence\Core\Container;
use SeoIntelligence\Database\Repository\AuditRepository;

/**
 * Image Diagnostics & Asset Inventory View.
 */
final class ImageInventoryPage
{
    public function __construct(
        private readonly Container $container
    ) {
    }

    public function render(): void
    {
        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');
        $images = $repo->getImageAssets(100, 0);

        $missingAltCount = 0;
        $missingDimCount = 0;
        $totalImages = count($images);

        foreach ($images as $img) {
            $meta = $img['metadata'] ?? [];
            if (empty($meta['alt'])) {
                $missingAltCount++;
            }
            if (empty($meta['width']) || empty($meta['height'])) {
                $missingDimCount++;
            }
        }
        ?>
        <div class="wrap seoi-wrap">
            <div class="seoi-header">
                <div class="seoi-header-left">
                    <div class="seoi-badge-brand">
                        <i class="ri-image-2-line"></i> <?php esc_html_e('Inventaris Gambar & Diagnosa CLS', 'seo-intelligence'); ?>
                    </div>
                    <h1 class="seoi-title"><?php esc_html_e('Inventaris & Kualitas Gambar Halaman', 'seo-intelligence'); ?></h1>
                    <p class="seoi-subtitle"><?php esc_html_e('Memeriksa kelengkapan atribut Alt deskriptif untuk aksesibilitas & Google Image, dimensi eksplisit untuk mencegah Cumulative Layout Shift (CLS), dan format modern.', 'seo-intelligence'); ?></p>
                </div>
                <div class="seoi-header-actions">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-page-audit')); ?>" class="seoi-btn seoi-btn-secondary">
                        <i class="ri-file-search-line"></i> <?php esc_html_e('Audit Halaman', 'seo-intelligence'); ?>
                    </a>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="seoi-stats-grid">
                <div class="seoi-card seoi-stat-card">
                    <div class="seoi-stat-icon icon-blue"><i class="ri-image-line"></i></div>
                    <div class="seoi-stat-content">
                        <div class="seoi-stat-number"><?php echo esc_html((string) $totalImages); ?></div>
                        <div class="seoi-stat-label"><?php esc_html_e('Total Gambar Terdeteksi', 'seo-intelligence'); ?></div>
                    </div>
                </div>

                <div class="seoi-card seoi-stat-card">
                    <div class="seoi-stat-icon icon-red"><i class="ri-file-warning-line"></i></div>
                    <div class="seoi-stat-content">
                        <div class="seoi-stat-number"><?php echo esc_html((string) $missingAltCount); ?></div>
                        <div class="seoi-stat-label"><?php esc_html_e('Gambar Tanpa Alt Text', 'seo-intelligence'); ?></div>
                    </div>
                </div>

                <div class="seoi-card seoi-stat-card">
                    <div class="seoi-stat-icon icon-amber"><i class="ri-layout-row-line"></i></div>
                    <div class="seoi-stat-content">
                        <div class="seoi-stat-number"><?php echo esc_html((string) $missingDimCount); ?></div>
                        <div class="seoi-stat-label"><?php esc_html_e('Tanpa Dimensi Width/Height (Risiko CLS)', 'seo-intelligence'); ?></div>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="seoi-card seoi-table-card">
                <div class="seoi-card-header">
                    <h2><i class="ri-gallery-line"></i> <?php esc_html_e('Daftar Gambar Terdiagnosa', 'seo-intelligence'); ?></h2>
                </div>

                <?php if (empty($images)) : ?>
                    <div class="seoi-empty-state">
                        <i class="ri-image-add-line"></i>
                        <p><?php esc_html_e('Belum ada data gambar tersimpan. Lakukan audit halaman terlebih dahulu untuk mengindeks aset media.', 'seo-intelligence'); ?></p>
                        <a href="<?php echo esc_url(admin_url('admin.php?page=seo-intelligence-page-audit')); ?>" class="seoi-btn seoi-btn-primary seoi-btn-sm">
                            <?php esc_html_e('Jalankan Audit Halaman Sekarang', 'seo-intelligence'); ?>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="seoi-table-responsive">
                        <table class="seoi-table">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e('Preview & Berkas', 'seo-intelligence'); ?></th>
                                    <th><?php esc_html_e('Halaman Sumber', 'seo-intelligence'); ?></th>
                                    <th><?php esc_html_e('Atribut Alt', 'seo-intelligence'); ?></th>
                                    <th><?php esc_html_e('Dimensi (CLS)', 'seo-intelligence'); ?></th>
                                    <th><?php esc_html_e('Format', 'seo-intelligence'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($images as $img) : 
                                    $meta = $img['metadata'] ?? [];
                                    $alt = $meta['alt'] ?? '';
                                    $hasAlt = !empty(trim((string) $alt));
                                    $hasDim = !empty($meta['width']) && !empty($meta['height']);
                                    $ext = strtolower(pathinfo((string) wp_parse_url($img['url'], PHP_URL_PATH), PATHINFO_EXTENSION));
                                    $isModern = in_array($ext, ['webp', 'avif', 'svg'], true);
                                ?>
                                    <tr>
                                        <td>
                                            <div class="seoi-media-preview-cell">
                                                <img src="<?php echo esc_url($img['url']); ?>" alt="" class="seoi-media-thumb" loading="lazy" />
                                                <div class="seoi-media-file-info">
                                                    <a href="<?php echo esc_url($img['url']); ?>" target="_blank" class="seoi-media-url">
                                                        <?php echo esc_html(basename((string) wp_parse_url($img['url'], PHP_URL_PATH))); ?>
                                                    </a>
                                                    <span class="seoi-media-host"><?php echo esc_html($img['is_third_party'] ? __('Pihak Ketiga (Eksternal)', 'seo-intelligence') : __('Internal', 'seo-intelligence')); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="<?php echo esc_url($img['page_url']); ?>" target="_blank" class="seoi-page-link">
                                                <?php echo esc_html($img['page_title']); ?> <i class="ri-external-link-line"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if ($hasAlt) : ?>
                                                <span class="seoi-badge-status badge-success">
                                                    <i class="ri-checkbox-circle-line"></i> <?php echo esc_html(mb_strimwidth($alt, 0, 35, '...')); ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="seoi-badge-status badge-danger">
                                                    <i class="ri-close-circle-line"></i> <?php esc_html_e('Alt Kosong', 'seo-intelligence'); ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($hasDim) : ?>
                                                <span class="seoi-badge-status badge-success">
                                                    <?php echo esc_html($meta['width'] . ' × ' . $meta['height']); ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="seoi-badge-status badge-warning">
                                                    <i class="ri-alert-line"></i> <?php esc_html_e('Tanpa width/height', 'seo-intelligence'); ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="seoi-badge-pill <?php echo $isModern ? 'pill-success' : 'pill-neutral'; ?>">
                                                .<?php echo esc_html(strtoupper($ext ?: 'IMG')); ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
