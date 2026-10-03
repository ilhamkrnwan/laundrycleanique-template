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
$archive_title = get_the_archive_title();
$archive_desc = get_the_archive_description();
$categories = get_categories(['hide_empty' => true]);
?>

<main id="main-content" class="cq-blog-archive-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO HEADER: Kategori & Arsip Edukasi
       ======================================================== -->
  <section class="cq-sky-canvas cq-blog-hero">
    <div class="cq-container">
      <div class="cq-blog-hero-inner">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
          Arsip Topik Edukasi &bull; PT Indotech Berkah Abadi
        </div>
        <h1 class="cq-blog-title">
          <?php echo wp_kses_post($archive_title); ?>
        </h1>
        <?php if ($archive_desc) : ?>
          <div class="cq-blog-desc">
            <?php echo wp_kses_post($archive_desc); ?>
          </div>
        <?php else : ?>
          <p class="cq-blog-desc">
            Kumpulan artikel dan panduan praktis terpilih dalam topik ini untuk membantu operasional dan perkembangan bisnis laundry Anda.
          </p>
        <?php endif; ?>

        <!-- Category Filter Pills -->
        <div class="cq-cat-pills-row" style="margin-top: var(--cq-sp-20);" role="navigation" aria-label="Filter Kategori">
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
    </div>
  </section>

  <!-- ========================================================
       2. ARTIKEL LISTING IN ARCHIVE
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
            <i class="ri-arrow-left-line" aria-hidden="true"></i> <?php esc_html_e('Lihat Semua Artikel', 'cleanique'); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php
get_footer();
