<?php
/**
 * Cleanique Header Template
 * Mendukung Company Profile (Compro) Navigation & Distraction-Free Single Page Landing Page Header
 *
 * @package Cleanique
 */

$is_paket_usaha = is_page_template('templates/page-paket-usaha.php') || is_page('paket-usaha-laundry');
$is_aplikasi_laundry = is_page_template('templates/page-aplikasi-laundry.php') || is_page('aplikasi-laundry');
$is_landing_page = $is_paket_usaha || $is_aplikasi_laundry;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>
<body <?php body_class($is_landing_page ? 'cq-body-landing-page' : 'cq-body-compro'); ?>>
<?php wp_body_open(); ?>

<!-- Accessible Skip Link -->
<a href="#main-content" class="cq-skip-link">
  Loncat ke Konten Utama
</a>

<header class="cq-header <?php echo $is_landing_page ? 'cq-header-lp' : 'cq-header-compro'; ?>" id="site-header">
  <div class="cq-container">
    <nav class="cq-navbar" aria-label="<?php esc_attr_e('Navigasi Utama', 'cleanique'); ?>">
      <!-- Brand Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-brand" aria-label="Cleanique Laundry Beranda">
        <?php echo cleanique_get_site_logo(); ?>
        <span class="cq-brand-badge">by Indotech.id</span>
      </a>

      <?php if ($is_aplikasi_laundry) : ?>
        <!-- Payno-Style Pill Navigation for Aplikasi Laundry -->
        <ul class="cq-nav-menu cq-nav-menu-app" role="menubar">
          <li role="none"><a href="#top" class="cq-nav-link" role="menuitem">Home</a></li>
          <li role="none"><a href="#masalah" class="cq-nav-link" role="menuitem">Masalah</a></li>
          <li role="none"><a href="#fitur" class="cq-nav-link" role="menuitem">Fitur</a></li>
          <li role="none"><a href="#testimoni" class="cq-nav-link" role="menuitem">Testimoni</a></li>
          <li role="none"><a href="#pricing" class="cq-nav-link" role="menuitem">Harga</a></li>
          <li role="none"><a href="#faq" class="cq-nav-link" role="menuitem">FAQ</a></li>
        </ul>
        <div class="cq-lp-header-actions">
          <a href="#trial-form" class="cq-btn cq-btn-white-pill cq-btn-sm cq-btn-pill">
            <i class="ri-rocket-2-line"></i> Free Trial 7 Hari
          </a>
        </div>
      <?php elseif ($is_paket_usaha) : ?>
        <!-- Modern Pill Navigation for Peluang Usaha Laundry -->
        <ul class="cq-nav-menu cq-nav-menu-app" role="menubar">
          <li role="none"><a href="#top" class="cq-nav-link" role="menuitem">Home</a></li>
          <li role="none"><a href="#peluang" class="cq-nav-link" role="menuitem">Peluang</a></li>
          <li role="none"><a href="#masalah" class="cq-nav-link" role="menuitem">Anti-Gagal</a></li>
          <li role="none"><a href="#solusi" class="cq-nav-link" role="menuitem">Solusi</a></li>
          <li role="none"><a href="#fasilitas" class="cq-nav-link" role="menuitem">Fasilitas</a></li>
          <li role="none"><a href="#pilihan-paket" class="cq-nav-link" role="menuitem">Paket</a></li>
          <li role="none"><a href="#kalkulator" class="cq-nav-link" role="menuitem">Simulasi ROI</a></li>
          <li role="none"><a href="#faq" class="cq-nav-link" role="menuitem">FAQ</a></li>
        </ul>
        <div class="cq-lp-header-actions">
          <a href="#daftar-promo" class="cq-btn cq-btn-white-pill cq-btn-sm cq-btn-pill">
            <i class="ri-cursor-line"></i> Klaim Promo
          </a>
        </div>
      <?php else : ?>
        <!-- ========================================================
             COMPANY PROFILE (COMPRO) NAVIGATION MENU
             Standard: Beranda, Tentang Kami, Berita, Kemitraan, Kontak
             ======================================================== -->
        <?php if (has_nav_menu('primary')) : ?>
          <?php
          wp_nav_menu([
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'cq-nav-menu',
              'fallback_cb'    => false,
              'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
              'depth'          => 1,
          ]);
          ?>
        <?php else : ?>
          <ul class="cq-nav-menu" role="menubar">
            <li role="none">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-nav-link <?php echo is_front_page() ? 'active' : ''; ?>" role="menuitem">
                Beranda
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-nav-link <?php echo is_page('tentang-kami') ? 'active' : ''; ?>" role="menuitem">
                Tentang Kami
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/berita/')); ?>" class="cq-nav-link <?php echo (!is_front_page() && (is_home() || is_singular('post') || is_archive() || is_category() || is_page('berita') || is_page('artikel'))) ? 'active' : ''; ?>" role="menuitem">
                Berita
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-nav-link <?php echo (is_post_type_archive('kemitraan') || is_singular('kemitraan') || is_page('kemitraan')) ? 'active' : ''; ?>" role="menuitem">
                Kemitraan
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-nav-link <?php echo is_page('kontak') ? 'active' : ''; ?>" role="menuitem">
                Kontak
              </a>
            </li>
          </ul>
        <?php endif; ?>

        <!-- Compro Action Buttons -->
        <div class="cq-nav-actions">
          <button type="button" class="cq-nav-search-btn" id="cq-search-open-btn" aria-label="Buka Pencarian Artikel & Solusi" title="Pencarian">
            <i class="ri-search-line"></i>
          </button>
          <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-outline cq-btn-sm">
            <i class="ri-customer-service-2-line"></i> Kontak
          </a>
          <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-primary cq-btn-sm">
            <i class="ri-shake-hands-line"></i> Peluang Kemitraan
          </a>
        </div>

        <!-- Accessible Mobile Menu Toggle Button (Compro Only) -->
        <button class="cq-nav-toggle" id="cq-nav-toggle" type="button" aria-label="Buka Menu Navigasi" aria-expanded="false" aria-controls="cq-mobile-drawer">
          <span class="cq-hamburger-line"></span>
          <span class="cq-hamburger-line"></span>
          <span class="cq-hamburger-line"></span>
        </button>
      <?php endif; ?>
    </nav>
  </div>

  <?php if (!$is_landing_page) : ?>
    <!-- Mobile Navigation Drawer Overlay & Panel (Compro Only) -->
    <div class="cq-mobile-drawer" id="cq-mobile-drawer" aria-hidden="true">
      <div class="cq-drawer-backdrop" id="cq-drawer-backdrop"></div>
      <div class="cq-drawer-panel">
        <div class="cq-drawer-header">
          <div class="cq-drawer-brand">
            <?php echo cleanique_get_site_logo('cq-drawer-logo'); ?>
          </div>
          <button class="cq-drawer-close" id="cq-drawer-close" type="button" aria-label="Tutup Menu">
            <i class="ri-close-line"></i>
          </button>
        </div>

        <!-- Mobile Drawer Search Bar -->
        <div class="cq-drawer-search-wrap">
          <form role="search" method="get" class="cq-drawer-search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <i class="ri-search-line cq-drawer-search-icon" aria-hidden="true"></i>
            <input type="search" class="cq-drawer-search-input" placeholder="Cari paket kemitraan, chemical, berita..." value="<?php echo get_search_query(); ?>" name="s" aria-label="Cari di situs Cleanique" />
            <button type="submit" class="cq-drawer-search-btn" aria-label="Submit pencarian"><i class="ri-arrow-right-line"></i></button>
          </form>
        </div>

        <ul class="cq-drawer-menu">
          <li>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-drawer-link <?php echo is_front_page() ? 'active' : ''; ?>">
              <i class="ri-home-4-line"></i> Beranda
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-drawer-link <?php echo is_page('tentang-kami') ? 'active' : ''; ?>">
              <i class="ri-building-line"></i> Tentang Kami
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/berita/')); ?>" class="cq-drawer-link <?php echo (!is_front_page() && (is_home() || is_singular('post') || is_archive() || is_category() || is_page('berita') || is_page('artikel'))) ? 'active' : ''; ?>">
              <i class="ri-newspaper-line"></i> Berita &amp; Artikel
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-drawer-link <?php echo (is_post_type_archive('kemitraan') || is_singular('kemitraan') || is_page('kemitraan')) ? 'active' : ''; ?>">
              <i class="ri-shake-hands-line"></i> Kemitraan Laundry
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-drawer-link <?php echo is_page('kontak') ? 'active' : ''; ?>">
              <i class="ri-map-pin-line"></i> Kontak &amp; Showroom
            </a>
          </li>
        </ul>

        <div class="cq-drawer-footer">
          <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-block" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line"></i> Konsultasi Kemitraan via WA
          </a>
          <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-outline cq-btn-block">
            <i class="ri-store-2-line"></i> Lihat Pilihan Paket Kemitraan
          </a>
          <div class="cq-drawer-indotech">
            <strong>PT Indotech Berkah Abadi</strong><br>
            Sleman, D.I. Yogyakarta &bull; Legalitas Resmi PT
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Global Desktop Search Modal -->
  <div class="cq-search-modal" id="cq-search-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="cq-search-modal-title">
    <div class="cq-search-modal-backdrop" id="cq-search-backdrop"></div>
    <div class="cq-search-modal-dialog">
      <div class="cq-search-modal-header">
        <span id="cq-search-modal-title" class="cq-search-modal-title">
          <i class="ri-search-eye-line" style="color: var(--cq-primary);"></i> Cari Informasi, Berita &amp; Kemitraan
        </span>
        <button type="button" class="cq-search-modal-close" id="cq-search-close-btn" aria-label="Tutup pencarian">
          <i class="ri-close-line"></i>
        </button>
      </div>
      <form role="search" method="get" class="cq-search-modal-form" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="cq-search-modal-input-wrap">
          <i class="ri-search-line cq-search-modal-icon"></i>
          <input type="search" class="cq-search-modal-input" placeholder="Ketik kata kunci (misal: paket kemitraan, parfum laundry, mesin stack)..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
          <button type="submit" class="cq-btn cq-btn-primary cq-btn-sm cq-btn-pill">Cari Sekarang</button>
        </div>
      </form>
      <div class="cq-search-modal-suggestions">
        <span class="cq-search-sug-label"><i class="ri-fire-line"></i> Rekomendasi Pencarian:</span>
        <div class="cq-search-sug-pills">
          <a href="<?php echo esc_url(home_url('/?s=kemitraan')); ?>" class="cq-search-tag">Paket Kemitraan</a>
          <a href="<?php echo esc_url(home_url('/?s=chemical+orchid')); ?>" class="cq-search-tag">Chemical Pabrik Orchid</a>
          <a href="<?php echo esc_url(home_url('/?s=mesin+komersial')); ?>" class="cq-search-tag">Mesin Cuci Heavy Duty</a>
          <a href="<?php echo esc_url(home_url('/?s=aplikasi+kasir')); ?>" class="cq-search-tag">Aplikasi Kasir POS</a>
        </div>
      </div>
    </div>
  </div>
</header>
