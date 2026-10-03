<?php
/**
 * Single Template for Custom Post Type: Kemitraan (single-kemitraan.php)
 * Description: Template detail premium untuk setiap varian paket kemitraan laundry PT Indotech Berkah Abadi.
 * Mendukung: Plugin SEO (Yoast/RankMath), Schema.org Product markup, Sticky CTA sidebar.
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

    // Social share URLs
    $current_url   = get_permalink();
    $current_title = get_the_title();
    $share_wa_url  = 'https://api.whatsapp.com/send?text=' . rawurlencode($current_title . ' - ' . $current_url);
    $share_fb_url  = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($current_url);
    $share_x_url   = 'https://twitter.com/intent/tweet?text=' . rawurlencode($current_title) . '&url=' . rawurlencode($current_url);

    // Tanggal
    $published_iso = get_the_date('c');
    $modified_iso  = get_the_modified_date('c');

    // Paket lain (navigasi prev/next)
    $other_kemitraan = get_posts([
        'post_type'      => 'kemitraan',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
        'post__not_in'   => [$post_id],
    ]);
?>

<main id="main-content" class="cq-kemitraan-single-page" itemscope itemtype="https://schema.org/Product">
  <!-- Schema.org hidden meta -->
  <meta itemprop="name" content="<?php the_title_attribute(); ?>">
  <meta itemprop="description" content="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 30, '...')); ?>">
  <?php if (!empty($price)) : ?>
    <div itemprop="offers" itemscope itemtype="https://schema.org/Offer" style="display:none;">
      <meta itemprop="price" content="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $price)); ?>">
      <meta itemprop="priceCurrency" content="IDR">
      <meta itemprop="availability" content="https://schema.org/InStock">
      <meta itemprop="url" content="<?php echo esc_url($current_url); ?>">
    </div>
  <?php endif; ?>
  <div itemprop="brand" itemscope itemtype="https://schema.org/Brand" style="display:none;">
    <meta itemprop="name" content="Cleanique Laundry – PT Indotech Berkah Abadi">
  </div>

  <!-- ========================================================
       BREADCRUMB NAV
       ======================================================== -->
  <div class="cq-breadcrumb-strip">
    <div class="cq-container">
      <nav class="cq-single-breadcrumbs" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item">
            <i class="ri-home-4-line" aria-hidden="true"></i>
            <span itemprop="name">Beranda</span>
          </a>
          <meta itemprop="position" content="1">
        </span>
        <i class="ri-arrow-right-s-line cq-bc-sep" aria-hidden="true"></i>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" itemprop="item">
            <span itemprop="name">Kemitraan</span>
          </a>
          <meta itemprop="position" content="2">
        </span>
        <i class="ri-arrow-right-s-line cq-bc-sep" aria-hidden="true"></i>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span class="cq-breadcrumb-current" itemprop="name" aria-current="page"><?php the_title(); ?></span>
          <meta itemprop="position" content="3">
        </span>
      </nav>
    </div>
  </div>

  <!-- ========================================================
       HERO HEADER: Paket Kemitraan Title
       ======================================================== -->
  <header class="cq-kemitraan-single-hero">
    <div class="cq-container">
      <div class="cq-kemitraan-single-hero-inner">
        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: var(--cq-sp-16);">
          <span class="cq-badge-pill cq-badge-accent" style="margin: 0;">
            <i class="ri-store-2-line"></i> Program Kemitraan Resmi
          </span>
          <?php if (!empty($badge)) : ?>
            <span class="cq-badge-pill cq-badge-warning" style="margin: 0;"><?php echo esc_html($badge); ?></span>
          <?php endif; ?>
          <?php if ($featured === '1') : ?>
            <span class="cq-badge-pill" style="margin: 0; background: #fef9c3; color: #713f12; border: 1px solid #fde047;">
              <i class="ri-star-fill"></i> Paket Terlaris
            </span>
          <?php endif; ?>
        </div>

        <h1 class="cq-kemitraan-single-title" itemprop="name">
          <?php the_title(); ?>
        </h1>

        <p class="cq-kemitraan-single-subtitle">
          <?php echo wp_trim_words(get_the_excerpt(), 24, '...'); ?>
        </p>

        <!-- Quick Share -->
        <div class="cq-hero-share-actions">
          <span class="cq-hero-share-title">Bagikan:</span>
          <a href="<?php echo esc_url($share_wa_url); ?>" target="_blank" rel="noopener" class="cq-mini-share-btn is-wa" title="WhatsApp" aria-label="Bagikan via WhatsApp">
            <i class="ri-whatsapp-line"></i>
          </a>
          <a href="<?php echo esc_url($share_fb_url); ?>" target="_blank" rel="noopener" class="cq-mini-share-btn is-fb" title="Facebook" aria-label="Bagikan via Facebook">
            <i class="ri-facebook-fill"></i>
          </a>
          <a href="<?php echo esc_url($share_x_url); ?>" target="_blank" rel="noopener" class="cq-mini-share-btn is-x" title="X / Twitter" aria-label="Bagikan via X">
            <i class="ri-twitter-x-line"></i>
          </a>
          <button type="button" class="cq-mini-share-btn is-copy cq-copy-link-btn" title="Salin Tautan" aria-label="Salin Tautan" data-url="<?php echo esc_url($current_url); ?>">
            <i class="ri-links-line"></i>
          </button>
        </div>
      </div>
    </div>
  </header>

  <!-- ========================================================
       MAIN LAYOUT: Two Column (Content + Sticky Sidebar)
       ======================================================== -->
  <div class="cq-container cq-article-body-container" style="padding-top: clamp(32px, 5vw, 48px); padding-bottom: clamp(60px, 8vw, 100px);">
    <div class="cq-single-layout">

      <!-- ======================================================
           LEFT: Main Article Content
           ====================================================== -->
      <article class="cq-single-main" itemscope itemtype="https://schema.org/Product">

        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
          <figure class="cq-kemitraan-single-fig">
            <?php the_post_thumbnail('large', [
                'loading'  => 'eager',
                'alt'      => get_the_title(),
                'itemprop' => 'image',
                'style'    => 'width: 100%; height: auto; border-radius: 20px; display: block;',
            ]); ?>
          </figure>
        <?php endif; ?>

        <!-- Price & ROI Banner -->
        <div class="cq-kemitraan-single-price-banner">
          <div>
            <span class="cq-kemitraan-price-label-sm">Estimasi Modal Awal Siap Buka</span>
            <div class="cq-kemitraan-price-big" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
              <span itemprop="price" content="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $price ?: '0')); ?>">
                <?php echo esc_html($price ?: 'Konsultasi Budget'); ?>
              </span>
              <meta itemprop="priceCurrency" content="IDR">
            </div>
          </div>
          <?php if (!empty($roi)) : ?>
            <div style="text-align: right;">
              <span class="cq-kemitraan-price-label-sm" style="color: #059669;">Estimasi Balik Modal (BEP)</span>
              <div class="cq-kemitraan-roi-chip" style="font-size: 14px; padding: 8px 18px; margin-top: 4px;">
                <i class="ri-time-line"></i> <?php echo esc_html($roi); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <!-- 4 Guarantee Pills -->
        <div class="cq-kemitraan-single-pillars">
          <div class="cq-kemitraan-pillar-item">
            <i class="ri-hand-coin-fill" style="color: #10b981;"></i>
            <div>
              <strong>100% Hak Milik</strong>
              <span>Tanpa royalti bulanan</span>
            </div>
          </div>
          <div class="cq-kemitraan-pillar-item">
            <i class="ri-shield-check-fill" style="color: var(--cq-primary);"></i>
            <div>
              <strong>Garansi Mesin Resmi</strong>
              <span>Servis & suku cadang pabrik</span>
            </div>
          </div>
          <div class="cq-kemitraan-pillar-item">
            <i class="ri-flask-fill" style="color: #d97706;"></i>
            <div>
              <strong>Chemical Pabrik DIY</strong>
              <span>Harga tangan pertama Sleman</span>
            </div>
          </div>
          <div class="cq-kemitraan-pillar-item">
            <i class="ri-smartphone-fill" style="color: #7c3aed;"></i>
            <div>
              <strong>Bonus Software POS</strong>
              <span>Kasir + notifikasi WhatsApp</span>
            </div>
          </div>
        </div>

        <!-- Equipment Specs List -->
        <?php if (!empty($specs)) : ?>
          <div class="cq-kemitraan-specs-card">
            <h2 class="cq-kemitraan-specs-heading">
              <i class="ri-tools-fill" style="color: var(--cq-primary);"></i>
              Peralatan &amp; Fasilitas yang Didapatkan
            </h2>
            <ul class="cq-kemitraan-specs-list cq-kemitraan-specs-list--full">
              <?php foreach ($specs as $spec) : ?>
                <li>
                  <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                  <span><?php echo esc_html($spec); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- Main Description / WordPress Content -->
        <?php
        $raw_content = get_the_content();
        if (!empty(trim(strip_tags($raw_content)))) :
        ?>
          <div class="cq-single-prose cq-content" style="margin-top: var(--cq-sp-36);">
            <?php the_content(); ?>
          </div>
        <?php endif; ?>

        <!-- Terms & Conditions (jika ada) -->
        <?php if (!empty($terms)) : ?>
          <div style="background: #f8fafc; border: 1px solid var(--cq-border-light); border-radius: 14px; padding: 20px 24px; margin-top: var(--cq-sp-36);">
            <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-sm); font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
              <i class="ri-file-text-line" style="color: var(--cq-text-muted);"></i> Syarat & Ketentuan Kemitraan
            </h3>
            <div style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.65;">
              <?php echo wp_kses_post($terms); ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Tags -->
        <?php $post_tags = get_the_tags(); if ($post_tags) : ?>
          <div class="cq-article-tags" style="margin-top: var(--cq-sp-32); padding-top: var(--cq-sp-24); border-top: 1px solid var(--cq-border-light);">
            <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--cq-text-muted); margin-right: 8px;">Tag:</span>
            <?php foreach ($post_tags as $tag) : ?>
              <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="cq-tag-chip" rel="tag"><?php echo esc_html($tag->name); ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <!-- Social Share Footer -->
        <div class="cq-article-share-footer" style="margin-top: var(--cq-sp-32); padding: 24px; background: var(--cq-bg-subtle); border-radius: 16px; border: 1px solid var(--cq-border-light);">
          <p style="font-size: var(--cq-fs-sm); font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 14px;">
            Bagikan info paket ini ke rekan atau keluarga yang sedang mencari peluang bisnis laundry:
          </p>
          <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="<?php echo esc_url($share_wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-sm">
              <i class="ri-whatsapp-line"></i> Bagikan via WhatsApp
            </a>
            <a href="<?php echo esc_url($share_fb_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-sm">
              <i class="ri-facebook-fill"></i> Facebook
            </a>
            <button type="button" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-sm cq-copy-link-btn" data-url="<?php echo esc_url($current_url); ?>">
              <i class="ri-links-line"></i> Salin Tautan
            </button>
          </div>
        </div>

        <!-- Navigation: Other Packages -->
        <?php if (!empty($other_kemitraan)) : ?>
          <div style="margin-top: var(--cq-sp-48);">
            <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.2rem, 1rem + 0.6vw, 1.5rem); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-20);">
              Lihat Paket Kemitraan Lainnya
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px;">
              <?php foreach ($other_kemitraan as $pkg) :
                $pkg_price   = get_post_meta($pkg->ID, '_cq_kemitraan_price', true);
                $pkg_badge   = get_post_meta($pkg->ID, '_cq_kemitraan_badge', true);
                $pkg_roi     = get_post_meta($pkg->ID, '_cq_kemitraan_roi', true);
              ?>
                <a href="<?php echo esc_url(get_permalink($pkg->ID)); ?>" class="cq-kemitraan-nav-card">
                  <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 8px; margin-bottom: 8px;">
                    <strong style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-sm); color: var(--cq-dark-navy); font-weight: 700; flex: 1;"><?php echo esc_html($pkg->post_title); ?></strong>
                    <?php if (!empty($pkg_badge)) : ?>
                      <span style="font-size: 10px; font-weight: 700; background: #fef3c7; color: #92400e; padding: 2px 8px; border-radius: 20px; white-space: nowrap;"><?php echo esc_html($pkg_badge); ?></span>
                    <?php endif; ?>
                  </div>
                  <?php if (!empty($pkg_price)) : ?>
                    <div style="font-size: var(--cq-fs-sm); font-weight: 800; color: var(--cq-primary); margin-bottom: 4px;"><?php echo esc_html($pkg_price); ?></div>
                  <?php endif; ?>
                  <?php if (!empty($pkg_roi)) : ?>
                    <div style="font-size: 11px; color: #059669;"><i class="ri-time-line"></i> BEP: <?php echo esc_html($pkg_roi); ?></div>
                  <?php endif; ?>
                  <div class="cq-kemitraan-nav-card-arrow"><i class="ri-arrow-right-line"></i></div>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

      </article>

      <!-- ======================================================
           RIGHT: Sticky Sidebar CTA
           ====================================================== -->
      <aside class="cq-single-sidebar">

        <!-- Sticky CTA Card -->
        <div class="cq-sidebar-sticky-wrap">

          <!-- Price Summary Card -->
          <div class="cq-kemitraan-sidebar-card">
            <?php if (!empty($badge)) : ?>
              <div class="cq-kemitraan-ribbon" style="position: relative; border-radius: 10px 10px 0 0; margin: -24px -24px 20px; text-align: center; padding: 10px 20px;">
                <?php echo esc_html($badge); ?>
              </div>
            <?php endif; ?>

            <div style="font-size: 11px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.06em; color: var(--cq-text-muted); margin-bottom: 6px;">
              Investasi Modal Awal
            </div>
            <div class="cq-kemitraan-sidebar-price">
              <?php echo esc_html($price ?: 'Konsultasi'); ?>
            </div>
            <?php if (!empty($roi)) : ?>
              <div class="cq-kemitraan-roi-chip" style="margin-top: 10px; font-size: 13px;">
                <i class="ri-time-line"></i> BEP: <?php echo esc_html($roi); ?>
              </div>
            <?php endif; ?>

            <hr style="margin: 20px 0; border: none; border-top: 1px solid var(--cq-border-light);">

            <!-- Specs Preview (max 5) -->
            <?php if (!empty($specs)) : ?>
              <ul style="list-style: none; padding: 0; margin: 0 0 20px; display: flex; flex-direction: column; gap: 9px;">
                <?php foreach (array_slice($specs, 0, 6) as $spec) : ?>
                  <li style="display: flex; align-items: flex-start; gap: 8px; font-size: 13px; color: var(--cq-dark-soft);">
                    <i class="ri-checkbox-circle-fill" style="color: #10b981; font-size: 15px; flex-shrink: 0; margin-top: 1px;"></i>
                    <span><?php echo esc_html($spec); ?></span>
                  </li>
                <?php endforeach; ?>
                <?php if (count($specs) > 6) : ?>
                  <li style="font-size: 12px; color: var(--cq-text-muted); font-style: italic; padding-left: 23px;">
                    + <?php echo (count($specs) - 6); ?> item fasilitas lainnya...
                  </li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>

            <!-- Primary CTA -->
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block cq-btn-lg" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Konsultasi &amp; Booking Paket
            </a>

            <?php if (!empty($brochure)) : ?>
              <a href="<?php echo esc_url($brochure); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block" style="margin-top: 10px;" target="_blank" rel="noopener">
                <i class="ri-file-download-line"></i> Unduh Proposal PDF
              </a>
            <?php endif; ?>

            <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block" style="margin-top: 10px;">
              <i class="ri-arrow-left-line"></i> Lihat Semua Paket
            </a>

            <!-- Trust Signals -->
            <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--cq-border-light);">
              <div style="display: flex; flex-direction: column; gap: 8px;">
                <div style="font-size: 11px; color: var(--cq-text-muted); display: flex; align-items: center; gap: 6px;">
                  <i class="ri-shield-check-fill" style="color: #10b981;"></i>
                  <span>0% Biaya Royalti Selamanya</span>
                </div>
                <div style="font-size: 11px; color: var(--cq-text-muted); display: flex; align-items: center; gap: 6px;">
                  <i class="ri-building-4-fill" style="color: var(--cq-primary);"></i>
                  <span>PT Indotech Berkah Abadi – Legal PT Resmi</span>
                </div>
                <div style="font-size: 11px; color: var(--cq-text-muted); display: flex; align-items: center; gap: 6px;">
                  <i class="ri-map-pin-2-fill" style="color: #d97706;"></i>
                  <span>Kantor &amp; Showroom – Sleman, DIY</span>
                </div>
                <div style="font-size: 11px; color: var(--cq-text-muted); display: flex; align-items: center; gap: 6px;">
                  <i class="ri-group-fill" style="color: #7c3aed;"></i>
                  <span>300+ Mitra Aktif di Seluruh Indonesia</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Mini FAQ Card -->
          <div class="cq-corp-card" style="padding: 20px 24px; margin-top: 16px;">
            <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-sm); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: 14px; display: flex; align-items: center; gap: 6px;">
              <i class="ri-question-answer-line" style="color: var(--cq-primary);"></i> Pertanyaan Umum
            </h3>
            <div style="display: flex; flex-direction: column; gap: 12px;">
              <details class="cq-accordion-item" style="border-radius: 10px; border: 1px solid var(--cq-border-light); overflow: hidden;">
                <summary class="cq-accordion-trigger" style="font-size: 12px; padding: 12px 16px;">
                  <span>Apakah ada biaya royalti bulanan?</span>
                  <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
                </summary>
                <div class="cq-accordion-content" style="font-size: 12px; padding: 12px 16px; padding-top: 0;">
                  <p style="margin: 0;">Tidak sama sekali. 0% royalti selamanya — 100% keuntungan menjadi hak penuh Anda.</p>
                </div>
              </details>
              <details class="cq-accordion-item" style="border-radius: 10px; border: 1px solid var(--cq-border-light); overflow: hidden;">
                <summary class="cq-accordion-trigger" style="font-size: 12px; padding: 12px 16px;">
                  <span>Berapa lama estimasi setup hingga buka?</span>
                  <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
                </summary>
                <div class="cq-accordion-content" style="font-size: 12px; padding: 12px 16px; padding-top: 0;">
                  <p style="margin: 0;">Rata-rata 7–14 hari kerja setelah penandatanganan, tergantung kesiapan fisik lokasi.</p>
                </div>
              </details>
              <details class="cq-accordion-item" style="border-radius: 10px; border: 1px solid var(--cq-border-light); overflow: hidden;">
                <summary class="cq-accordion-trigger" style="font-size: 12px; padding: 12px 16px;">
                  <span>Apakah tersedia pelatihan karyawan?</span>
                  <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
                </summary>
                <div class="cq-accordion-content" style="font-size: 12px; padding: 12px 16px; padding-top: 0;">
                  <p style="margin: 0;">Ya, termasuk pelatihan onsite/daring teknik cuci, kimia, dan operasional kasir POS.</p>
                </div>
              </details>
            </div>
            <a href="<?php echo esc_url(home_url('/kemitraan/#faq')); ?>" style="display: inline-flex; align-items: center; gap: 4px; margin-top: 12px; font-size: 12px; font-weight: 700; color: var(--cq-primary); text-decoration: none;">
              Lihat semua FAQ <i class="ri-arrow-right-line"></i>
            </a>
          </div>

        </div><!-- /.cq-sidebar-sticky-wrap -->
      </aside>

    </div><!-- /.cq-single-layout -->
  </div><!-- /.cq-container -->

</main>

<script>
// Copy Link button handler
document.querySelectorAll('.cq-copy-link-btn').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var url = this.dataset.url || window.location.href;
    if (navigator.clipboard) {
      navigator.clipboard.writeText(url).then(function() {
        var origHTML = btn.innerHTML;
        btn.innerHTML = '<i class="ri-check-line"></i> Tersalin!';
        setTimeout(function() { btn.innerHTML = origHTML; }, 2000);
      });
    } else {
      var ta = document.createElement('textarea');
      ta.value = url;
      document.body.appendChild(ta);
      ta.select();
      document.execCommand('copy');
      document.body.removeChild(ta);
    }
  });
});
</script>

<?php
endwhile;
get_footer();
