<?php
/**
 * Main Template File (Fallback Blog Index & Search Results)
 * Cleanique Laundry by PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic
 *
 * @package Cleanique
 */

get_header();

$wa_url = cleanique_get_whatsapp_url('general');
$is_search = is_search();
$categories = get_categories(['hide_empty' => true]);
?>

<main id="main-content" class="cq-blog-index-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO HEADER
       ======================================================== -->
  <section class="cq-sky-canvas cq-blog-hero">
    <div class="cq-container">
      <div class="cq-blog-hero-inner">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
          <?php echo $is_search ? 'Pencarian' : 'Pusat Edukasi'; ?>
        </div>
        <h1 class="cq-blog-title">
          <?php if ($is_search) : ?>
            Hasil Pencarian: <span class="cq-text-blue">&ldquo;<?php echo esc_html(get_search_query()); ?>&rdquo;</span>
          <?php else : ?>
            Panduan Praktis, Tips &amp; <span class="cq-text-blue">Strategi Bisnis Laundry.</span>
          <?php endif; ?>
        </h1>
        <p class="cq-blog-desc">
          <?php if ($is_search) : ?>
            Berikut adalah artikel dan wawasan yang relevan dengan kata kunci pencarian Anda.
          <?php else : ?>
            Kumpulan panduan mendalam seputar investasi mesin komersial, racikan chemical standar pabrik, otomatisasi kasir POS WhatsApp, dan strategi mendongkrak profit outlet Anda.
          <?php endif; ?>
        </p>

        <!-- Search Form & Category Pills Filter -->
        <div class="cq-blog-filter-bar">
          <form role="search" method="get" class="cq-blog-search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="cq-blog-search-pill">
              <i class="ri-search-line" style="color: var(--brand-deep); font-size: 18px; margin-right: 8px;" aria-hidden="true"></i>
              <input type="search" class="cq-blog-search-input" placeholder="Cari tips mesin, chemical, nota digital..." value="<?php echo get_search_query(); ?>" name="s" aria-label="Cari artikel">
              <button type="submit" class="cq-blog-search-btn">
                Cari
              </button>
            </div>
          </form>

          <!-- Category Filter Pills -->
          <div class="cq-cat-pills-row" role="navigation" aria-label="Filter Kategori Artikel">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/artikel/')); ?>" class="cq-cat-pill <?php echo !is_category() ? 'is-active' : ''; ?>">
              <i class="ri-apps-2-line" aria-hidden="true"></i> Semua Kategori
            </a>
            <?php if (!empty($categories)) : ?>
              <?php foreach ($categories as $cat) : ?>
                <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="cq-cat-pill">
                  <i class="ri-folder-3-line" aria-hidden="true"></i> <?php echo esc_html($cat->name); ?> (<?php echo esc_html($cat->count); ?>)
                </a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. ARTIKEL LISTING
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
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
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
        <nav class="cq-pagination-modern" aria-label="<?php esc_attr_e('Navigasi Halaman Artikel', 'cleanique'); ?>">
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
          <div class="cq-empty-icon" style="font-size: 48px; color: var(--brand-deep); margin-bottom: var(--cq-sp-16);" aria-hidden="true"><i class="ri-search-eye-line"></i></div>
          <h2 class="cq-empty-title" style="font-family: var(--cq-font-heading); font-size: 1.5rem; margin-bottom: 8px;"><?php esc_html_e('Tidak Ada Artikel yang Ditemukan', 'cleanique'); ?></h2>
          <p class="cq-empty-desc" style="color: var(--cq-text-muted); max-width: 500px; margin: 0 auto var(--cq-sp-24);">
            <?php esc_html_e('Kata kunci yang Anda cari belum cocok dengan artikel manapun. Coba cari kata kunci lain seperti "paket", "kasir", atau "parfum".', 'cleanique'); ?>
          </p>
          <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/artikel/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
            Semua Artikel
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- ========================================================
       CLOSING BANNER CTA (Contained Section Card)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section cq-blog-cta-section" id="blog-cta" aria-labelledby="index-cta-title">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <h2 id="index-cta-title" class="cq-banner-cta-title">
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
