<?php
/**
 * Archive Template (Kategori, Tag, Penulis & Arsip Edukasi)
 * Cleanique Laundry by PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic
 *
 * @package Cleanique
 */

get_header();

$wa_url = cleanique_get_whatsapp_url('general');
$proposal_pdf_url = get_option('cleanique_kemitraan_proposal_url');
$archive_title = get_the_archive_title();
$archive_desc = get_the_archive_description();
$categories = get_categories(['hide_empty' => true]);
?>

<main id="main-content" class="cq-blog-archive-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO HEADER: Kategori & Arsip Edukasi (Payno Modern Split Layout)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero" id="arsip-hero">
    <div class="cq-container">
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Arsip Edukasi
          </div>
          <h1 class="cq-payno-heading">
            <?php echo wp_kses_post($archive_title); ?>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <?php if ($archive_desc) : ?>
            <div class="cq-payno-hero-desc">
              <?php echo wp_kses_post($archive_desc); ?>
            </div>
          <?php else : ?>
            <p class="cq-payno-hero-desc">
              Kumpulan artikel dan panduan praktis terpilih dalam topik ini untuk membantu operasional dan perkembangan bisnis laundry Anda.
            </p>
          <?php endif; ?>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Panduan Praktis</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Riset Terverifikasi</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Tips Operasional</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/artikel/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
              Semua Kategori
            </a>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
            </a>
          </div>
        </div>
      </div>

      <!-- Category Filter Pills -->
      <div class="cq-cat-pills-row" style="margin-top: clamp(20px, 3vw, 32px);" role="navigation" aria-label="Filter Kategori">
        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/artikel/')); ?>" class="cq-cat-pill">
          <i class="ri-apps-2-line" aria-hidden="true"></i> Semua Kategori
        </a>
        <?php if (!empty($categories)) : ?>
          <?php foreach ($categories as $cat) : ?>
            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="cq-cat-pill <?php echo (is_category($cat->term_id)) ? 'is-active' : ''; ?>">
              <i class="ri-folder-3-line" aria-hidden="true"></i> <?php echo esc_html($cat->name); ?> (<?php echo esc_html($cat->count); ?>)
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. ARTIKEL LISTING IN ARCHIVE
       ======================================================== -->
  <section class="cq-section" style="padding-top: var(--cq-sp-40);">
    <div class="cq-container">
      <?php if (have_posts()) : ?>
        <div class="cq-bento-articles-grid">
          <?php 
          $post_counter = 0;
          while (have_posts()) : the_post(); 
              $post_counter++;
              $post_cats = get_the_category();
              $cat_name = !empty($post_cats) ? $post_cats[0]->name : 'Edukasi';
              $reading_time = function_exists('cleanique_get_reading_time') ? cleanique_get_reading_time() : '4 mnt baca';

              // Bento Rhythm: Item 1 & 4 pada tiap blok 4 item menjadi Wide Bento
              $mod = ($post_counter - 1) % 4;
              $is_wide_bento = ($mod === 0 || $mod === 3) ? 'is-wide-bento' : '';
          ?>
            <article class="cq-article-bento cq-article-card-bento <?php echo esc_attr($is_wide_bento); ?>">
              <div class="cq-bento-thumb-wrap cq-bento-card-thumb-wrap">
                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail($is_wide_bento ? 'large' : 'cleanique-card', ['loading' => ($post_counter === 1 ? 'eager' : 'lazy'), 'alt' => get_the_title()]); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/01-thumbnail-kembangkan-bisnis-laundry.webp'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                  <?php endif; ?>
                </a>
                <div class="cq-bento-badges cq-bento-card-badges">
                  <span class="cq-bento-tag cq-bento-card-tag">
                    <?php echo esc_html($cat_name); ?>
                  </span>
                  <span class="cq-bento-time cq-bento-card-time">
                    <?php echo esc_html($reading_time); ?>
                  </span>
                </div>
              </div>

              <div class="cq-bento-body cq-bento-card-body">
                <div class="cq-bento-meta cq-bento-card-meta">
                  <span><i class="ri-calendar-line" aria-hidden="true"></i> <?php echo get_the_date('d M Y'); ?></span>
                  <span class="cq-bento-meta-dot">&bull;</span>
                  <span><i class="ri-shield-check-line" aria-hidden="true"></i> Riset Indotech</span>
                </div>

                <h3 class="cq-bento-title cq-bento-card-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <p class="cq-bento-excerpt cq-bento-card-excerpt">
                  <?php echo wp_trim_words(get_the_excerpt(), $is_wide_bento ? 28 : 16, '...'); ?>
                </p>

                <div class="cq-bento-footer cq-bento-card-footer">
                  <div class="cq-bento-hub cq-bento-card-hub">
                    <span class="cq-bento-hub-dot"></span>
                    <span>Indotech Hub</span>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="cq-bento-action cq-bento-card-action" aria-label="Baca Panduan <?php the_title_attribute(); ?>">
                    <span>Baca Panduan</span>
                    <span class="cq-bento-action-circle" aria-hidden="true">
                      <i class="ri-arrow-right-up-line"></i>
                    </span>
                  </a>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <nav class="cq-pagination-modern" aria-label="<?php esc_attr_e('Navigasi Halaman Arsip', 'cleanique'); ?>">
          <?php
          the_posts_pagination([
              'mid_size'  => 2,
              'prev_text' => '<i class="ri-arrow-left-s-line" aria-hidden="true"></i> ' . __('Sebelumnya', 'cleanique'),
              'next_text' => __('Selanjutnya', 'cleanique') . ' <i class="ri-arrow-right-s-line" aria-hidden="true"></i>',
          ]);
          ?>
        </nav>

      <?php else : ?>
        <div class="cq-empty-state" style="text-align: center; padding: var(--cq-sp-48) 0;">
          <div class="cq-empty-icon" style="font-size: 48px; color: var(--brand-deep); margin-bottom: var(--cq-sp-16);" aria-hidden="true"><i class="ri-inbox-line"></i></div>
          <h2 class="cq-empty-title" style="font-family: var(--cq-font-heading); font-size: 1.5rem; margin-bottom: 8px;"><?php esc_html_e('Belum Ada Artikel di Topik Ini', 'cleanique'); ?></h2>
          <p class="cq-empty-desc" style="color: var(--cq-text-muted); max-width: 500px; margin: 0 auto var(--cq-sp-24);">
            <?php esc_html_e('Saat ini belum ada artikel yang dipublikasikan dalam kategori ini. Silakan kunjungi semua kategori atau hubungi kami untuk informasi seputar usaha laundry.', 'cleanique'); ?>
          </p>
          <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/artikel/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
            Semua Artikel
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>

    <!-- ========================================================
       CLOSING BANNER CTA (Corporate Showcase Bento)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section cq-blog-cta-section" id="blog-cta" aria-labelledby="archive-cta-title">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <div class="cq-banner-cta-grid">

          <!-- Left Column: Value Prop & Actions -->
          <div class="cq-banner-cta-left">
            <div class="cq-banner-cta-badges">
              <span class="cq-badge-pill cq-badge-accent">
                Kemitraan Resmi
              </span>
              <span class="cq-badge-pill cq-badge-success">
                0% Royalti
              </span>
            </div>

            <h2 id="archive-cta-title" class="cq-banner-cta-title">
              Siap Memulai Bisnis Laundry Mandiri?
            </h2>

            <p class="cq-banner-cta-desc">
              Dapatkan paket lengkap mesin komersial bergaransi, pasokan deterjen pabrik Sleman, dan bimbingan operasional sampai balik modal.
            </p>

            <div class="cq-banner-cta-actions">
              <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi WhatsApp
              </a>
              <?php if (!empty($proposal_pdf_url)) : ?>
                <a href="<?php echo esc_url($proposal_pdf_url); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
                  <i class="ri-file-download-line" aria-hidden="true"></i> Unduh Proposal
                </a>
              <?php endif; ?>
              <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
                Pilihan Paket
              </a>
            </div>

            <div class="cq-banner-cta-trust">
              <span><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> 100% Hak Milik</span>
              <span><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Garansi Pabrik</span>
              <span><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Termasuk Pelatihan</span>
            </div>
          </div>

          <!-- Right Column: Visual Showcase -->
          <div class="cq-banner-cta-right">
            <div class="cq-banner-cta-visual">
              <div class="cq-banner-cta-visual-badge">
                <i class="ri-store-2-line" aria-hidden="true"></i> Paket Usaha Turnkey
              </div>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/02-paket-usaha-laundry-siap-buka.webp'); ?>" 
                   alt="Paket Usaha Kemitraan Laundry Siap Buka Cleanique" 
                   loading="lazy" 
                   class="cq-banner-cta-img">
              <div class="cq-banner-cta-visual-footer">
                <span class="cq-cta-stat-pill">
                  <i class="ri-shield-star-line"></i> 300+ Mitra Aktif
                </span>
                <span class="cq-cta-stat-pill">
                  <i class="ri-star-fill" style="color: #facc15;"></i> 5.0 Terverifikasi
                </span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
