<?php
/**
 * Single Template for Custom Post Type: Paket Usaha (single-paket_usaha.php)
 * Description: Template detail khusus untuk setiap varian paket usaha laundry kemitraan PT Indotech Berkah Abadi.
 *
 * @package Cleanique
 */

get_header();

while (have_posts()) : the_post();
    $price = get_post_meta(get_the_ID(), '_cq_paket_price', true);
    $badge = get_post_meta(get_the_ID(), '_cq_paket_badge', true);
    $featured = get_post_meta(get_the_ID(), '_cq_paket_featured', true);
    $specs_raw = get_post_meta(get_the_ID(), '_cq_paket_specs', true);
    $specs = !empty($specs_raw) ? array_filter(array_map('trim', explode("\n", $specs_raw))) : [];

    $wa_number = get_theme_mod('cleanique_wa_number', '6281234567890');
    $clean_wa = preg_replace('/[^0-9]/', '', $wa_number);
    $wa_msg = "Halo Tim Cleanique Laundry (PT Indotech Berkah Abadi), saya tertarik konsultasi " . get_the_title() . " (" . ($price ?: 'Konsultasi') . "). Mohon info rincian modal dan jadwal konsultasi.";
    $wa_paket_url = 'https://api.whatsapp.com/send?phone=' . $clean_wa . '&text=' . rawurlencode($wa_msg);
?>

<main id="main-content">
  <section class="cq-section" style="padding-top: var(--cq-sp-40); padding-bottom: var(--cq-sp-64); background: linear-gradient(180deg, #F0F9FF 0%, #FFFFFF 100%);">
    <div class="cq-container" style="max-width: 1040px;">
    <!-- Breadcrumb & Back Link -->
    <div style="margin-bottom: var(--cq-sp-24);">
      <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-sm" style="display: inline-flex; align-items: center; gap: 6px;">
        Semua Paket
      </a>
    </div>

    <div class="cq-invest-card <?php echo $featured ? 'is-popular' : ''; ?>" style="padding: clamp(32px, 5vw, 56px);">
      <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: var(--cq-sp-16);">
        <div style="display: flex; align-items: center; gap: 10px;">
          <span class="cq-badge-pill cq-badge-accent">
            Paket Usaha
          </span>
          <?php if (!empty($badge)) : ?>
            <span class="cq-badge-pill cq-badge-warning"><?php echo esc_html($badge); ?></span>
          <?php endif; ?>
        </div>
        <div style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); font-weight: 600;">
          <i class="ri-shield-check-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Garansi Resmi PT Indotech Berkah Abadi
        </div>
      </div>

      <h1 class="cq-hero-title" style="margin-bottom: var(--cq-sp-12); font-size: clamp(2rem, 1.6rem + 2vw, 3.2rem);">
        <?php the_title(); ?>
      </h1>

      <div style="display: flex; align-items: baseline; gap: 8px; margin-bottom: var(--cq-sp-24);">
        <span class="cq-invest-price-val" style="margin: 0; color: var(--brand-deep);">
          <?php echo esc_html($price ?: 'Konsultasi Budget'); ?>
        </span>
        <span style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); font-weight: 600;">/ perkiraan modal awal siap buka</span>
      </div>

      <?php if (has_post_thumbnail()) : ?>
        <div style="border-radius: 24px; overflow: hidden; margin-bottom: var(--cq-sp-32); box-shadow: 0 10px 30px -10px rgba(0,0,0,0.15);">
          <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto; display: block; object-fit: cover;', 'loading' => 'eager']); ?>
        </div>
      <?php endif; ?>

      <!-- Package Description Content -->
      <div class="cq-content" style="font-size: var(--cq-fs-base); line-height: 1.7; color: var(--ink); margin-bottom: var(--cq-sp-32);">
        <?php the_content(); ?>
      </div>

      <?php if (!empty($specs)) : ?>
        <div style="background: #F8FAFC; border-radius: 20px; padding: clamp(20px, 3vw, 32px); border: 1px solid var(--cq-border-light); margin-bottom: var(--cq-sp-32);">
          <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-lg); font-weight: 500; color: var(--ink); margin-bottom: var(--cq-sp-16);">
            Spesifikasi &amp; Fasilitas yang Didapatkan Mitra:
          </h3>
          <ul class="cq-pricing-list" style="margin-bottom: 0;">
            <?php foreach ($specs as $spec) : ?>
              <li class="checked" style="font-size: var(--cq-fs-sm);"><?php echo esc_html($spec); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- Bottom Action Row -->
      <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 16px; padding-top: var(--cq-sp-24); border-top: 1px solid var(--cq-border-light);">
        <a href="<?php echo esc_url($wa_paket_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Paket
        </a>
        <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/#mitra-sukses')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
          Mitra Sukses
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       CLOSING BANNER CTA (Contained Section Card)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section" id="paket-cta">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <h2 class="cq-banner-cta-title">
          Siap Membuka Cabang Laundry Mandiri dengan <?php the_title(); ?>?
        </h2>
        <p class="cq-banner-cta-desc">
          Konsultasikan kesiapan lokasi ruko, perhitungan BEP, dan jadwal instalasi mesin bersama tim ahli PT Indotech Berkah Abadi. 100% hak milik Anda tanpa royalti fee.
        </p>
        <div class="cq-banner-cta-actions">
          <a href="<?php echo esc_url($wa_paket_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Hubungi Konsultan
          </a>
          <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
            Pilihan Paket
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
endwhile;
get_footer();
