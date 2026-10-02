<?php
/**
 * Blog Posts Index Template (Halaman Arsip & Pusat Edukasi)
 * Cleanique Laundry by PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic
 *
 * @package Cleanique
 */

get_header();

$wa_url = cleanique_get_whatsapp_url('general');
$current_cat_id = get_queried_object_id();
$categories = get_categories(['hide_empty' => true]);
?>

<main id="main-content" class="cq-blog-index-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO HEADER: Edukasi & Pusat Wawasan Bisnis Laundry
       ======================================================== -->
  <section class="cq-sky-canvas cq-blog-hero">
    <div class="cq-container">
      <div class="cq-blog-hero-inner">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
          <i class="ri-book-read-line" style="color: var(--mint-cta); font-size: 15px;" aria-hidden="true"></i>
          Pusat Edukasi &amp; Wawasan Laundry &bull; PT Indotech Berkah Abadi
        </div>
        <h1 class="cq-blog-title">
          Panduan Praktis, Tips &amp; <span class="cq-text-blue">Strategi Bisnis Laundry.</span>
        </h1>
        <p class="cq-blog-desc">
          Kumpulan panduan mendalam seputar investasi mesin komersial, racikan chemical standar pabrik, otomatisasi kasir POS WhatsApp, dan strategi mendongkrak profit outlet Anda.
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
                <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="cq-cat-pill <?php echo (is_category($cat->term_id)) ? 'is-active' : ''; ?>">
                  <i class="ri-folder-3-line" aria-hidden="true"></i> <?php echo esc_html($cat->name); ?> (<?php echo esc_html($cat->count); ?>)
                </a>
              <?php endforeach; ?>
            <?php else : ?>
              <span class="cq-cat-pill is-active"><i class="ri-folder-3-line" aria-hidden="true"></i> Panduan Usaha</span>
              <span class="cq-cat-pill"><i class="ri-folder-3-line" aria-hidden="true"></i> Digitalisasi POS</span>
              <span class="cq-cat-pill"><i class="ri-folder-3-line" aria-hidden="true"></i> Chemical Pabrik</span>
              <span class="cq-cat-pill"><i class="ri-folder-3-line" aria-hidden="true"></i> Tips Operasional</span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. ARTIKEL LISTING & SPOTLIGHT
       ======================================================== -->
  <section class="cq-section" style="padding-top: var(--cq-sp-40);">
    <div class="cq-container">
      <?php if (have_posts()) : ?>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_counter = 0;
        ?>

        <?php while (have_posts()) : the_post(); $post_counter++; ?>
          <?php if ($paged === 1 && $post_counter === 1 && !is_search()) : ?>
            <!-- Featured Spotlight Article (Post Pertama pada Halaman 1) -->
            <article class="cq-article-spotlight">
              <div class="cq-spotlight-img-wrap">
                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['loading' => 'eager', 'alt' => get_the_title()]); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="<?php the_title_attribute(); ?>" loading="eager">
                  <?php endif; ?>
                </a>
                <div class="cq-spotlight-badge">
                  <i class="ri-sparkling-fill" style="color: #f59e0b;" aria-hidden="true"></i>
                  <?php
                  $cats = get_the_category();
                  echo !empty($cats) ? esc_html($cats[0]->name) : 'Artikel Utama';
                  ?>
                </div>
              </div>

              <div class="cq-spotlight-body">
                <div class="cq-spotlight-meta">
                  <span><i class="ri-calendar-line" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
                  <span>&bull;</span>
                  <span><i class="ri-time-line" aria-hidden="true"></i> <?php echo cleanique_get_reading_time(); ?></span>
                  <span>&bull;</span>
                  <span><i class="ri-user-line" aria-hidden="true"></i> <?php the_author(); ?></span>
                </div>
                <h2 class="cq-spotlight-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <p class="cq-spotlight-excerpt">
                  <?php echo wp_trim_words(get_the_excerpt(), 28, '...'); ?>
                </p>
                <div>
                  <a href="<?php the_permalink(); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
                    Baca Artikel Lengkap <i class="ri-arrow-right-line" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </article>

            <!-- Buka Grid untuk Post Selanjutnya -->
            <div class="cq-grid-3">
          <?php else : ?>
            <?php if ($paged === 1 && $post_counter === 2) : ?>
              <!-- Grid container sudah terbuka dari blok di atas -->
            <?php elseif ($post_counter === 1) : ?>
              <!-- Jika di halaman > 1, buka grid langsung dari awal -->
              <div class="cq-grid-3">
            <?php endif; ?>

            <!-- Normal Article Card V2 -->
            <article class="cq-article-card-v2">
              <div class="cq-article-card-thumb-wrap">
                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('cleanique-card', ['loading' => 'lazy', 'alt' => get_the_title()]); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
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
          <?php endif; ?>
        <?php endwhile; ?>

        <!-- Tutup Grid -->
        <?php if ($post_counter > 1 || $paged > 1) : ?>
          </div>
        <?php elseif ($paged === 1 && $post_counter === 1) : ?>
          </div>
        <?php endif; ?>

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
        <!-- ========================================================
             DEMO FALLBACK ARTICLES (JIKA BELUM ADA POSTINGAN WP)
             Memberikan tampilan visual yang kaya dan tetap bernilai edukasi
             ======================================================== -->
        <div class="cq-grid-3">
          <!-- Demo Card 1 -->
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="Panduan Memulai Usaha Laundry Kiloan Modal Hemat" loading="lazy">
              </a>
              <span class="cq-article-card-tag">
                <i class="ri-price-tag-3-line" aria-hidden="true"></i> Panduan Usaha
              </span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 5 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>">
                  Panduan Lengkap Memulai Usaha Laundry Kiloan Modal Hemat untuk Pemula
                </a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Strategi menentukan lokasi potensial, kalkulasi kebutuhan mesin cuci &amp; dryer komersial, serta simulasi modal balik (BEP) dalam 6 hingga 9 bulan.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);">
                  <i class="ri-user-line" aria-hidden="true"></i> Tim Ahli Indotech
                </span>
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-article-card-link-v2">
                  Pelajari Paket <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>

          <!-- Demo Card 2 -->
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" alt="Mengatasi Kecurangan Kasir Laundry dengan Nota WhatsApp" loading="lazy">
              </a>
              <span class="cq-article-card-tag" style="color: #059669; border-color: rgba(5, 150, 105, 0.25);">
                <i class="ri-smartphone-line" aria-hidden="true"></i> Digitalisasi POS
              </span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 4 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">
                  Cara Mengurangi Risiko Kecurangan Kasir Laundry Menggunakan Nota WhatsApp Otomatis
                </a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Bahaya laten nota kertas manual bagi cashflow outlet dan bagaimana sistem digitalisasi struk WhatsApp mencegah nota ganda &amp; penggelapan kasir.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);">
                  <i class="ri-shield-check-line" aria-hidden="true"></i> Solusi Finansial
                </span>
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-article-card-link-v2">
                  Coba Trial POS <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>

          <!-- Demo Card 3 -->
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" alt="Rahasia Parfum Laundry Tahan 30 Hari di Lemari" loading="lazy">
              </a>
              <span class="cq-article-card-tag" style="color: #d97706; border-color: rgba(217, 119, 6, 0.25);">
                <i class="ri-flask-line" aria-hidden="true"></i> Chemical Pabrik
              </span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 6 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">
                  Rahasia Formulasi Parfum Microcapsule: Pakaian Wangi Segar Tahan hingga 30 Hari
                </a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Teknologi butiran mikro pewangi yang baru pecah saat kain bergesekan. Trik menekan biaya chemical tanpa mengurangi aroma mewah kesukaan pelanggan.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);">
                  <i class="ri-flask-line" aria-hidden="true"></i> Laboratorium Indotech
                </span>
                <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-article-card-link-v2">
                  Katalog Kimia <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>

          <!-- Demo Card 4 -->
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equipment-washer-extractor.jpg'); ?>" alt="Perbedaan Mesin Cuci Rumah Tangga vs Komersial" loading="lazy">
              </a>
              <span class="cq-article-card-tag">
                <i class="ri-settings-4-line" aria-hidden="true"></i> Perawatan Mesin
              </span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 4 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>">
                  Mengapa Mesin Cuci Rumah Tangga Cepat Rusak untuk Usaha Laundry Kiloan?
                </a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Beda durabilitas motor penggerak, kapasitas bearing baja, dan efisiensi listrik mesin commercial grade heavy-duty vs mesin cuci rumahan konvensional.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);">
                  <i class="ri-tools-line" aria-hidden="true"></i> Divisi Mekanik
                </span>
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-article-card-link-v2">
                  Lihat Spesifikasi <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>

          <!-- Demo Card 5 -->
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" alt="SOP Menghilangkan Noda Karat Darah dan Minyak" loading="lazy">
              </a>
              <span class="cq-article-card-tag" style="color: #dc2626; border-color: rgba(220, 38, 38, 0.25);">
                <i class="ri-shield-flash-line" aria-hidden="true"></i> Spotting Noda
              </span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 5 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">
                  SOP Standar Menghilangkan Noda Karat, Getah, dan Minyak Tanpa Merusak Serat Kain
                </a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Panduan praktis perlakuan khusus (*spotting chemical*) untuk pakaian berharga pelanggan agar terhindar dari komplain dan ganti rugi kain rusak.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);">
                  <i class="ri-book-open-line" aria-hidden="true"></i> SOP Teknis
                </span>
                <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-article-card-link-v2">
                  Solusi Noda <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>

          <!-- Demo Card 6 -->
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" alt="Strategi Pemasaran Laundry Ramai Pelanggan Baru" loading="lazy">
              </a>
              <span class="cq-article-card-tag" style="color: #7c3aed; border-color: rgba(124, 58, 237, 0.25);">
                <i class="ri-megaphone-line" aria-hidden="true"></i> Pemasaran &amp; Loyalitas
              </span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 4 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">
                  5 Strategi Pemasaran Laundry Efektif Agar Pelanggan Lama Terus Repeat Order
                </a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Pemanfaatan sistem poin loyalitas pelanggan, broadcast pengingat cuci pakaian berkala via WhatsApp, dan promo paket langganan bulanan.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);">
                  <i class="ri-line-chart-line" aria-hidden="true"></i> Pertumbuhan Bisnis
                </span>
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-article-card-link-v2">
                  Pelajari Sistem POS <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- ========================================================
       3. CONCENTRIC ARCH GLOw STATEMENT / CONSULTATION BOX
       ======================================================== -->
  <section class="cq-statement-section" style="padding-top: 0;">
    <div class="cq-container" style="max-width: 1040px;">
      <div class="cq-payno-statement-card">
        <div class="cq-payno-arch-glow" aria-hidden="true">
          <svg width="140" height="90" viewBox="0 0 140 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <filter id="cq-blog-arch-blur-outer" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="7" />
              </filter>
              <filter id="cq-blog-arch-blur-mid" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5" />
              </filter>
              <filter id="cq-blog-arch-blur-core" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" />
              </filter>
            </defs>
            <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" filter="url(#cq-blog-arch-blur-outer)" />
            <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" filter="url(#cq-blog-arch-blur-mid)" />
            <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" filter="url(#cq-blog-arch-blur-core)" />
          </svg>
        </div>

        <h2 class="cq-statement-text" style="margin-bottom: var(--cq-sp-20);">
          Ingin Diskusi Langsung Seputar Rencana Pembukaan Outlet Anda?<br class="cq-hide-mobile">
          Tim Konsultan <span class="cq-text-blue">PT Indotech Berkah Abadi</span> Siap Membantu 24/7.
        </h2>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Gratis via WhatsApp
          </a>
          <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill">
            <i class="ri-store-2-line" aria-hidden="true"></i> Rincian Paket Usaha
          </a>
          <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill">
            <i class="ri-smartphone-line" aria-hidden="true"></i> Coba POS (Trial 7 Hari)
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
