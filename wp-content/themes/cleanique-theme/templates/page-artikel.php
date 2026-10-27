<?php
/**
 * Template Name: Halaman Pusat Artikel & Edukasi Laundry
 * Description: Portal artikel edukasi, panduan bisnis, tips teknis, dan spotlight wawasan industri laundry PT Indotech Berkah Abadi.
 * SEO Note: Template ini menggunakan the_post() dari main loop agar plugin SEO (Yoast/RankMath)
 *           dapat membaca metadata halaman (title, meta description, canonical, OG) dengan benar.
 *
 * @package Cleanique
 */

get_header();

// ── SEO Plugin Compatibility ────────────────────────────────────────────────
// Jalankan main WordPress loop SEKALI agar plugin SEO (Yoast/RankMath/AIOSEO)
// dapat membaca $post global dan menginject title, meta description, canonical URL
// yang sudah dikonfigurasi melalui meta box plugin di editor halaman ini.
if (have_posts()) {
    the_post();
}
// ────────────────────────────────────────────────────────────────────────────

$wa_url           = cleanique_get_whatsapp_url('general');
$categories       = get_categories(['hide_empty' => true]);
$search_query     = get_search_query();
$paged            = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
$current_cat_slug = get_query_var('category_name');
?>

<main id="main-content" class="cq-blog-index-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Payno Modern Split Layout)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero" id="artikel-hero">
    <div class="cq-container">
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Pusat Edukasi
          </div>
          <h1 class="cq-payno-heading">
            Wawasan Industri, Panduan Bisnis &amp; <span class="cq-text-blue">Inovasi Laundry.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            Kumpulan panduan praktis, kalkulasi balik modal, SOP perawatan mesin komersial, formulasi chemical standar pabrik, serta digitalisasi kasir modern langsung dari para praktisi Cleanique.
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Panduan Praktis Siap Terap</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Bedah SOP &amp; Mesin Komersial</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Wawasan Bisnis Terkini</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="#kumpulan-artikel" class="cq-btn cq-btn-primary cq-btn-pill">
              Panduan Terbaru
            </a>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
            </a>
          </div>
        </div>
      </div>

      <!-- Search Form & Category Filter Pills Bar -->
      <div class="cq-blog-filter-bar" style="margin-top: clamp(24px, 3.5vw, 40px);">
        <form role="search" method="get" class="cq-blog-search-form" action="<?php echo esc_url(home_url('/artikel/')); ?>">
          <div class="cq-blog-search-pill">
            <i class="ri-search-line" style="color: var(--cq-primary); font-size: 18px; margin-right: 8px;" aria-hidden="true"></i>
            <input type="search" class="cq-blog-search-input" placeholder="Cari tips mesin, formula chemical, nota digital, BEP..." value="<?php echo esc_attr($search_query); ?>" name="s" aria-label="Cari artikel">
            <button type="submit" class="cq-blog-search-btn">
              Cari
            </button>
          </div>
        </form>

        <!-- Category Filter Pills -->
        <div class="cq-cat-pills-row" role="navigation" aria-label="Filter Kategori Artikel">
          <a href="<?php echo esc_url(home_url('/artikel/')); ?>" class="cq-cat-pill <?php echo (empty($current_cat_slug) && empty($search_query)) ? 'is-active' : ''; ?>">
            Semua Topik
          </a>
          <?php if (!empty($categories)) : ?>
            <?php foreach ($categories as $cat) : ?>
              <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="cq-cat-pill <?php echo ($current_cat_slug === $cat->slug) ? 'is-active' : ''; ?>">
                <?php echo esc_html($cat->name); ?> (<?php echo esc_html($cat->count); ?>)
              </a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. ARTIKEL CONTENT WRAPPER
       ======================================================== -->
  <section class="cq-section" id="kumpulan-artikel" style="padding-top: var(--cq-sp-40); padding-bottom: clamp(60px, 8vw, 90px); background: #f8fafc;">
    <div class="cq-container">
      

      <!-- Section Title for Articles Bento Hub -->
      <div class="cq-bento-section-header" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--cq-sp-32); border-bottom: 1px solid var(--cq-border-light); padding-bottom: var(--cq-sp-16); flex-wrap: wrap; gap: 12px;">
        <div>
          <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.4rem, 1.2rem + 0.6vw, 1.8rem); font-weight: 600; letter-spacing: -0.02em; color: var(--cq-dark-navy); margin: 0 0 4px 0;">
            <?php
            if (!empty($search_query)) {
                echo 'Hasil Pencarian: "' . esc_html($search_query) . '"';
            } elseif (!empty($current_cat_slug)) {
                echo 'Kategori: ' . esc_html(single_cat_title('', false));
            } else {
                echo 'Koleksi Artikel &amp; Panduan Terkini';
            }
            ?>
          </h2>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); margin: 0;">
            Dapatkan wawasan terkini untuk memajukan bisnis laundry komersial Anda.
          </p>
        </div>
        <span style="font-size: 12px; font-weight: 700; color: var(--cq-primary); display: inline-flex; align-items: center; gap: 6px;">
          <i class="ri-shield-check-fill" style="color: var(--mint-cta, #10b981);" aria-hidden="true"></i> Diperbarui Berkala oleh PT Indotech
        </span>
      </div>

      <!-- Main Articles Bento Grid (Asymmetric & Cardless) -->
      <div class="cq-bento-articles-grid">
        <?php
        $args = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 9,
            'paged'          => $paged,
        ];

        if (!empty($search_query)) {
            $args['s'] = $search_query;
        }

        $articles_query = new WP_Query($args);

        if ($articles_query->have_posts()) :
            $post_counter = 0;
            while ($articles_query->have_posts()) : $articles_query->the_post();
                $post_counter++;
                $post_cats = get_the_category();
                $cat_name  = !empty($post_cats) ? $post_cats[0]->name : 'Edukasi';
                $reading_time = function_exists('cleanique_get_reading_time') ? cleanique_get_reading_time() : '4 mnt baca';

                // Bento Layout Rhythm: Posisi 1 dan 4 pada setiap batch 4 item menjadi Wide Bento (2-kolom)
                $mod = ($post_counter - 1) % 4;
                $is_wide_bento = ($mod === 0 || $mod === 3) ? 'is-wide-bento' : '';
        ?>
          <article class="cq-article-bento cq-article-card-bento <?php echo esc_attr($is_wide_bento); ?>">
            <div class="cq-bento-thumb-wrap cq-bento-card-thumb-wrap">
              <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail($is_wide_bento ? 'large' : 'cleanique-card', ['loading' => ($post_counter === 1 ? 'eager' : 'lazy'), 'alt' => get_the_title()]); ?>
                <?php else : ?>
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
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
        <?php
            endwhile;
            wp_reset_postdata();
        ?>
      </div>

      <!-- Modern Pagination -->
      <nav class="cq-pagination-modern" aria-label="Navigasi Halaman Artikel">
        <?php
        echo paginate_links([
            'total'     => $articles_query->max_num_pages,
            'current'   => $paged,
            'mid_size'  => 2,
            'prev_text' => '<i class="ri-arrow-left-s-line" aria-hidden="true"></i> Sebelumnya',
            'next_text' => 'Selanjutnya <i class="ri-arrow-right-s-line" aria-hidden="true"></i>',
        ]);
        ?>
      </nav>

      <?php
            wp_reset_postdata();
        else :
      ?>
        <div style="text-align: center; padding: 60px 20px; background: #ffffff; border-radius: 24px; border: 1px solid var(--cq-border-light); grid-column: 1 / -1;">
          <i class="ri-article-line" style="font-size: 3rem; color: var(--cq-text-muted); margin-bottom: 16px; display: inline-block;"></i>
          <h3 style="font-family: var(--cq-font-heading); font-size: 1.25rem; font-weight: 500; color: var(--cq-dark-navy); margin-bottom: 8px;">
            Belum Ada Artikel yang Sesuai
          </h3>
          <p style="color: var(--cq-text-muted); font-size: var(--cq-fs-sm); max-width: 480px; margin: 0 auto 20px;">
            Tidak ditemukan artikel dengan kata kunci pencarian tersebut. Coba gunakan istilah umum seperti "mesin", "chemical", atau "kemitraan".
          </p>
          <a href="<?php echo esc_url(home_url('/artikel/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
            Semua Artikel
          </a>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <!-- ========================================================
       3. CLOSING BANNER CTA (Contained Section Card)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section cq-blog-cta-section" id="blog-cta" aria-labelledby="blog-cta-title">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <h2 id="blog-cta-title" class="cq-banner-cta-title">
          Siap Memulai Bisnis Laundry Mandiri Tanpa Potongan Royalti?
        </h2>
        <p class="cq-banner-cta-desc">
          Dapatkan konsultasi gratis mengenai analisis lokasi, pemilihan set mesin cuci &amp; dryer bergaransi, dan pasokan deterjen pabrik langsung dari tim ahli PT Indotech Berkah Abadi.
        </p>
        <div class="cq-banner-cta-actions">
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Hubungi Konsultan
          </a>
          <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
            Pilihan Paket
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
