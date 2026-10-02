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
          <i class="ri-book-read-line" style="color: var(--mint-cta); font-size: 15px;" aria-hidden="true"></i>
          <?php echo $is_search ? 'Hasil Pencarian Edukasi' : 'Pusat Edukasi &amp; Wawasan Laundry'; ?>
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
                <i class="ri-search-2-line" aria-hidden="true"></i> Cari
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
        <div class="cq-grid-3">
          <?php while (have_posts()) : the_post(); ?>
            <article class="cq-article-card-v2">
              <div class="cq-article-card-thumb-wrap">
                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('cleanique-card', ['loading' => 'lazy', 'alt' => get_the_title()]); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                  <?php endif; ?>
                </a>
                <span class="cq-article-card-tag">
                  <i class="ri-price-tag-3-line" aria-hidden="true"></i>
                  <?php
                  $post_cats = get_the_category();
                  echo !empty($post_cats) ? esc_html($post_cats[0]->name) : 'Edukasi';
                  ?>
                </span>
              </div>

              <div class="cq-article-card-body-v2">
                <div class="cq-article-card-meta-v2">
                  <span><i class="ri-calendar-line" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
                  <span>&bull;</span>
                  <span><i class="ri-time-line" aria-hidden="true"></i> <?php echo cleanique_get_reading_time(); ?></span>
                </div>

                <h3 class="cq-article-card-title-v2">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <p class="cq-article-card-excerpt-v2">
                  <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                </p>

                <div class="cq-article-card-footer-v2">
                  <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted); display: inline-flex; align-items: center; gap: 4px;">
                    <i class="ri-building-line" aria-hidden="true"></i> Indotech Hub
                  </span>
                  <a href="<?php the_permalink(); ?>" class="cq-article-card-link-v2">
                    Baca Panduan <i class="ri-arrow-right-line" aria-hidden="true"></i>
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
            <i class="ri-arrow-left-line" aria-hidden="true"></i> <?php esc_html_e('Kembali ke Semua Artikel', 'cleanique'); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php
get_footer();
