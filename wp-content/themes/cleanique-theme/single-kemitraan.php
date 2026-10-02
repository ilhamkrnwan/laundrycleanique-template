<?php
/**
 * Single Template for Custom Post Type: Kemitraan (single-kemitraan.php)
 * Description: Template detail khusus untuk setiap varian paket kemitraan laundry PT Indotech Berkah Abadi.
 *
 * @package Cleanique
 */

get_header();

while (have_posts()) : the_post();
    $post_id     = get_the_ID();
    $price       = get_post_meta($post_id, '_cq_kemitraan_price', true);
    $badge       = get_post_meta($post_id, '_cq_kemitraan_badge', true);
    $roi         = get_post_meta($post_id, '_cq_kemitraan_roi', true);
    $featured    = get_post_meta($post_id, '_cq_kemitraan_featured', true);
    $brochure    = get_post_meta($post_id, '_cq_kemitraan_brochure', true) ?: get_option('cleanique_kemitraan_proposal_url');
    $specs_raw   = get_post_meta($post_id, '_cq_kemitraan_specs', true);
    $specs       = !empty($specs_raw) ? array_filter(array_map('trim', explode("\n", $specs_raw))) : [];
    $wa_url      = cleanique_get_kemitraan_whatsapp_url($post_id);
    $terms       = get_option('cleanique_kemitraan_terms');
    $office_addr = get_theme_mod('cleanique_office_address', 'PT Indotech Berkah Abadi - Sleman, D.I. Yogyakarta, Indonesia');
?>

<main id="main-content" style="padding-top: clamp(100px, 12vw, 130px); padding-bottom: clamp(60px, 8vw, 90px); background: #f8fafc;">
  <div class="cq-container">
    <!-- Breadcrumb & Back Navigation -->
    <nav aria-label="Breadcrumb" style="margin-bottom: var(--cq-sp-24); font-size: var(--cq-fs-xs); color: var(--cq-text-muted);">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: var(--cq-text-muted); text-decoration: none;">Beranda</a>
      <span style="margin: 0 8px;">/</span>
      <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" style="color: var(--cq-text-muted); text-decoration: none;">Kemitraan</a>
      <span style="margin: 0 8px;">/</span>
      <span style="color: var(--cq-dark-navy); font-weight: 700;"><?php the_title(); ?></span>
    </nav>

    <!-- Main Detail Grid -->
    <div style="display: grid; grid-template-columns: 1fr; gap: clamp(24px, 4vw, 40px); align-items: start;">
      <div style="display: grid; grid-template-columns: 1fr; gap: 32px;" class="cq-kemitraan-single-layout">
        
        <!-- Left: Main Presentation -->
        <article class="cq-corp-card" style="padding: clamp(24px, 4vw, 48px);">
          <!-- Header Meta -->
          <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: var(--cq-sp-16);">
            <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
              <span class="cq-badge-pill cq-badge-accent" style="margin: 0;">
                <i class="ri-store-2-line"></i> Program Kemitraan Resmi
              </span>
              <?php if (!empty($badge)) : ?>
                <span class="cq-badge-pill cq-badge-warning" style="margin: 0;"><?php echo esc_html($badge); ?></span>
              <?php endif; ?>
            </div>
            <div style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); font-weight: 600;">
              <i class="ri-shield-check-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> PT Indotech Berkah Abadi
            </div>
          </div>

          <h1 style="font-family: var(--cq-font-heading); font-size: clamp(2rem, 1.6rem + 1.8vw, 3rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.15; margin-bottom: var(--cq-sp-16);">
            <?php the_title(); ?>
          </h1>

          <!-- Price & ROI Banner -->
          <div style="background: var(--sky-50); border: 1px solid var(--sky-200); border-radius: 16px; padding: 20px 24px; margin-bottom: var(--cq-sp-32); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
            <div>
              <span style="font-size: 11px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; color: var(--cq-primary-dark); display: block; margin-bottom: 2px;">
                Estimasi Modal Awal Siap Buka
              </span>
              <div style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.4rem + 1.4vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy);">
                <?php echo esc_html($price ?: 'Konsultasi Budget'); ?>
              </div>
            </div>
            <?php if (!empty($roi)) : ?>
              <div style="text-align: right;">
                <span style="font-size: 11px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; color: #059669; display: block; margin-bottom: 2px;">
                  Estimasi Balik Modal (BEP)
                </span>
                <span class="cq-kemitraan-roi-chip" style="font-size: 13px; padding: 6px 16px;">
                  <i class="ri-time-line"></i> <?php echo esc_html($roi); ?>
                </span>
              </div>
            <?php endif; ?>
          </div>

          <?php if (has_post_thumbnail()) : ?>
            <div style="border-radius: 18px; overflow: hidden; margin-bottom: var(--cq-sp-32); border: 1px solid var(--cq-border-light);">
              <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto; display: block; object-fit: cover;', 'loading' => 'eager']); ?>
            </div>
          <?php endif; ?>

          <!-- Content Description -->
          <div class="cq-content" style="font-size: var(--cq-fs-base); line-height: 1.75; color: var(--cq-dark-soft); margin-bottom: var(--cq-sp-36);">
            <?php the_content(); ?>
          </div>

          <!-- Equipment & Facility Specs -->
          <?php if (!empty($specs)) : ?>
            <div style="background: #ffffff; border: 1px solid var(--cq-border-light); border-radius: 18px; padding: clamp(20px, 3vw, 32px); margin-bottom: var(--cq-sp-36); box-shadow: 0 4px 16px -4px rgba(15,23,42,0.04);">
              <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-lg); font-weight: 700; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px;">
                <i class="ri-tools-fill" style="color: var(--cq-primary);"></i> Peralatan &amp; Fasilitas yang Didapatkan:
              </h3>
              <ul class="cq-kemitraan-specs-list" style="margin-bottom: 0;">
                <?php foreach ($specs as $spec) : ?>
                  <li style="font-size: var(--cq-fs-base);"><i class="ri-checkbox-circle-fill"></i> <span><?php echo esc_html($spec); ?></span></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- 4 Pillars of Guarantee -->
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-bottom: var(--cq-sp-36);">
            <div style="padding: 16px; background: var(--cq-bg-subtle); border-radius: 12px; border: 1px solid var(--cq-border-light);">
              <strong style="display: block; color: var(--cq-dark-navy); margin-bottom: 4px;"><i class="ri-hand-coin-line" style="color: var(--mint-cta);"></i> 100% Hak Milik</strong>
              <span style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted);">Tanpa potongan omzet atau royalti bulanan.</span>
            </div>
            <div style="padding: 16px; background: var(--cq-bg-subtle); border-radius: 12px; border: 1px solid var(--cq-border-light);">
              <strong style="display: block; color: var(--cq-dark-navy); margin-bottom: 4px;"><i class="ri-shield-check-line" style="color: var(--cq-primary);"></i> Garansi Mesin Resmi</strong>
              <span style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted);">Jaminan servis dan suku cadang pabrik.</span>
            </div>
            <div style="padding: 16px; background: var(--cq-bg-subtle); border-radius: 12px; border: 1px solid var(--cq-border-light);">
              <strong style="display: block; color: var(--cq-dark-navy); margin-bottom: 4px;"><i class="ri-flask-line" style="color: #d97706;"></i> Chemical Pabrik</strong>
              <span style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted);">Suplai chemical tangan pertama dari Sleman.</span>
            </div>
            <div style="padding: 16px; background: var(--cq-bg-subtle); border-radius: 12px; border: 1px solid var(--cq-border-light);">
              <strong style="display: block; color: var(--cq-dark-navy); margin-bottom: 4px;"><i class="ri-smartphone-line" style="color: #059669;"></i> Bonus Software POS</strong>
              <span style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted);">Aplikasi kasir otomatisasi nota WhatsApp.</span>
            </div>
          </div>

          <!-- Bottom Action Row -->
          <div style="display: flex; flex-wrap: wrap; gap: 14px; padding-top: var(--cq-sp-24); border-top: 1px solid var(--cq-border-light);">
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Konsultasi &amp; Booking Paket via WhatsApp
            </a>
            <?php if (!empty($brochure)) : ?>
              <a href="<?php echo esc_url($brochure); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
                <i class="ri-file-download-line"></i> Unduh Proposal Lengkap (PDF)
              </a>
            <?php endif; ?>
            <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
              <i class="ri-arrow-left-line"></i> Lihat Paket Lainnya
            </a>
          </div>
        </article>

      </div>
    </div>
  </div>
</main>

<?php
endwhile;
get_footer();
