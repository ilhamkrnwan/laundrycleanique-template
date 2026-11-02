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
            Coba Gratis
          </a>
          <button class="cq-nav-toggle" id="cq-nav-toggle" type="button" aria-label="Buka Menu Navigasi" aria-expanded="false" aria-controls="cq-mobile-drawer">
            <span class="cq-hamburger-line"></span>
            <span class="cq-hamburger-line"></span>
            <span class="cq-hamburger-line"></span>
          </button>
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
          <li role="none"><a href="#mitra-sukses" class="cq-nav-link" role="menuitem">Mitra Sukses</a></li>
          <li role="none"><a href="#faq" class="cq-nav-link" role="menuitem">FAQ</a></li>
        </ul>
        <div class="cq-lp-header-actions">
          <a href="#daftar-promo" class="cq-btn cq-btn-white-pill cq-btn-sm cq-btn-pill">
            Klaim Promo
          </a>
          <button class="cq-nav-toggle" id="cq-nav-toggle" type="button" aria-label="Buka Menu Navigasi" aria-expanded="false" aria-controls="cq-mobile-drawer">
            <span class="cq-hamburger-line"></span>
            <span class="cq-hamburger-line"></span>
            <span class="cq-hamburger-line"></span>
          </button>
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
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-nav-link <?php echo is_page('paket-usaha-laundry') ? 'active' : ''; ?>" role="menuitem">
                Paket Usaha
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-nav-link <?php echo (is_post_type_archive('kemitraan') || is_singular('kemitraan') || is_page('kemitraan')) ? 'active' : ''; ?>" role="menuitem">
                Kemitraan
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-nav-link <?php echo is_page('aplikasi-laundry') ? 'active' : ''; ?>" role="menuitem">
                Aplikasi Kasir
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-nav-link <?php echo is_page('tentang-kami') ? 'active' : ''; ?>" role="menuitem">
                Tentang Kami
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url(home_url('/artikel/')); ?>" class="cq-nav-link <?php echo (!is_front_page() && (is_home() || is_singular('post') || is_archive() || is_category() || is_page('berita') || is_page('artikel'))) ? 'active' : ''; ?>" role="menuitem">
                Artikel
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
</header>

<!-- ========================================================
     MOBILE NAVIGATION DRAWER (Full-Screen Rich Navigation)
     Topmost Layer (z-index tertinggi) langsung di bawah <body>
     ======================================================== -->
<div class="cq-mobile-drawer" id="cq-mobile-drawer" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Menu Navigasi Mobile">
  <div class="cq-drawer-backdrop" id="cq-drawer-backdrop"></div>
  <div class="cq-drawer-panel">
    <!-- 1. Header: Brand + Official Verification + Close -->
    <div class="cq-drawer-header">
      <div class="cq-drawer-header-left">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-drawer-brand" aria-label="Beranda Cleanique Laundry">
          <?php echo cleanique_get_site_logo('cq-drawer-logo'); ?>
        </a>
        <span class="cq-drawer-official-badge">
          <i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Resmi PT
        </span>
      </div>
      <button class="cq-drawer-close" id="cq-drawer-close" type="button" aria-label="Tutup Menu">
        <i class="ri-close-line" aria-hidden="true"></i>
      </button>
    </div>

    <!-- 2. Scrollable Body with Rich Business Information -->
    <div class="cq-drawer-scroll-body">
      <!-- Quick Search Form -->
      <div class="cq-drawer-search-wrap">
        <form role="search" method="get" class="cq-drawer-search-form" action="<?php echo esc_url(home_url('/')); ?>">
          <i class="ri-search-line cq-drawer-search-icon" aria-hidden="true"></i>
          <input type="search" class="cq-drawer-search-input" placeholder="Cari paket usaha, mesin, chemical..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
          <button type="submit" class="cq-drawer-search-btn" aria-label="Cari">
            <i class="ri-arrow-right-line" aria-hidden="true"></i>
          </button>
        </form>
      </div>


      <!-- Section 1: Core Business Solutions (Pilar Solusi & Kemitraan) -->
      <div class="cq-drawer-group">
        <div class="cq-drawer-group-header">
          <span class="cq-drawer-group-title">Solusi &amp; Kemitraan Bisnis</span>
          <span class="cq-drawer-group-sub">Peluang usaha siap buka &amp; ekosistem pabrik</span>
        </div>
        <ul class="cq-drawer-nav-list">
          <li>
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-drawer-nav-item <?php echo (is_page('paket-usaha-laundry') || is_page_template('templates/page-paket-usaha.php')) ? 'active' : ''; ?>">
              <span class="cq-drawer-item-icon cq-icon-brand-blue">
                <i class="ri-store-3-line" aria-hidden="true"></i>
              </span>
              <span class="cq-drawer-item-content">
                <span class="cq-drawer-item-title-row">
                  <span class="cq-drawer-item-title">Paket Usaha Laundry</span>
                  <span class="cq-drawer-badge cq-badge-populer">POPULER</span>
                </span>
                <span class="cq-drawer-item-sub">Mesin komersial, instalasi &amp; training komplit</span>
              </span>
              <i class="ri-arrow-right-s-line cq-drawer-arrow" aria-hidden="true"></i>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-drawer-nav-item <?php echo (is_page('kemitraan') || is_post_type_archive('kemitraan') || is_singular('kemitraan')) ? 'active' : ''; ?>">
              <span class="cq-drawer-item-icon cq-icon-gold">
                <i class="ri-shake-hands-line" aria-hidden="true"></i>
              </span>
              <span class="cq-drawer-item-content">
                <span class="cq-drawer-item-title-row">
                  <span class="cq-drawer-item-title">Katalog Kemitraan</span>
                  <span class="cq-drawer-badge cq-badge-royalty">0% ROYALTI</span>
                </span>
                <span class="cq-drawer-item-sub">Rincian modal, estimasi BEP &amp; kontrak resmi PT</span>
              </span>
              <i class="ri-arrow-right-s-line cq-drawer-arrow" aria-hidden="true"></i>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-drawer-nav-item <?php echo (is_page('pabrik-chemical') || is_page_template('templates/page-pabrik-chemical.php')) ? 'active' : ''; ?>">
              <span class="cq-drawer-item-icon cq-icon-chemical">
                <i class="ri-flask-line" aria-hidden="true"></i>
              </span>
              <span class="cq-drawer-item-content">
                <span class="cq-drawer-item-title-row">
                  <span class="cq-drawer-item-title">Pabrik Chemical Orchid</span>
                  <span class="cq-drawer-badge cq-badge-diy">PABRIK DIY</span>
                </span>
                <span class="cq-drawer-item-sub">Harga tangan pertama pabrik, suplai stabil Sleman</span>
              </span>
              <i class="ri-arrow-right-s-line cq-drawer-arrow" aria-hidden="true"></i>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-drawer-nav-item <?php echo (is_page('aplikasi-laundry') || is_page_template('templates/page-aplikasi-laundry.php')) ? 'active' : ''; ?>">
              <span class="cq-drawer-item-icon cq-icon-tech">
                <i class="ri-smartphone-line" aria-hidden="true"></i>
              </span>
              <span class="cq-drawer-item-content">
                <span class="cq-drawer-item-title-row">
                  <span class="cq-drawer-item-title">Aplikasi Kasir POS</span>
                  <span class="cq-drawer-badge cq-badge-pos">CLOUD POS</span>
                </span>
                <span class="cq-drawer-item-sub">Sistem kasir digital anti-curang &amp; e-nota WhatsApp</span>
              </span>
              <i class="ri-arrow-right-s-line cq-drawer-arrow" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </div>

      <!-- Section 2: Value Proposition Banner Highlight -->
      <div class="cq-drawer-highlight-card">
        <div class="cq-drawer-highlight-tag">
          <i class="ri-fire-fill" aria-hidden="true"></i> Peluang Bisnis 2026 • 0% Royalti
        </div>
        <div class="cq-drawer-highlight-title">Buka Usaha Laundry Tanpa Biaya Franchise</div>
        <div class="cq-drawer-highlight-desc">100% keuntungan milik Anda, mesin komersial bergaransi, pasokan chemical tangan pertama pabrik Sleman DIY.</div>
      </div>

      <!-- Section 3: Corporate & Information Navigation (2x2 Grid) -->
      <div class="cq-drawer-group">
        <div class="cq-drawer-group-header">
          <span class="cq-drawer-group-title">Informasi &amp; Profil Perusahaan</span>
        </div>
        <div class="cq-drawer-nav-grid">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-drawer-grid-item <?php echo is_front_page() ? 'active' : ''; ?>">
            <span class="cq-drawer-grid-icon"><i class="ri-home-4-line" aria-hidden="true"></i></span>
            <span class="cq-drawer-grid-text">
              <span class="cq-drawer-grid-title">Beranda</span>
              <span class="cq-drawer-grid-sub">Profil &amp; ringkasan</span>
            </span>
          </a>
          <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-drawer-grid-item <?php echo (is_page('tentang-kami') || is_page_template('templates/page-tentang-kami.php')) ? 'active' : ''; ?>">
            <span class="cq-drawer-grid-icon"><i class="ri-building-line" aria-hidden="true"></i></span>
            <span class="cq-drawer-grid-text">
              <span class="cq-drawer-grid-title">Tentang Kami</span>
              <span class="cq-drawer-grid-sub">Profil legalitas PT</span>
            </span>
          </a>
          <a href="<?php echo esc_url(home_url('/artikel/')); ?>" class="cq-drawer-grid-item <?php echo (!is_front_page() && (is_home() || is_singular('post') || is_archive() || is_category() || is_page('berita') || is_page('artikel') || is_page_template('templates/page-artikel.php'))) ? 'active' : ''; ?>">
            <span class="cq-drawer-grid-icon"><i class="ri-newspaper-line" aria-hidden="true"></i></span>
            <span class="cq-drawer-grid-text">
              <span class="cq-drawer-grid-title">Artikel Bisnis</span>
              <span class="cq-drawer-grid-sub">Edukasi &amp; SOP</span>
            </span>
          </a>
          <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-drawer-grid-item <?php echo (is_page('kontak') || is_page_template('templates/page-kontak.php')) ? 'active' : ''; ?>">
            <span class="cq-drawer-grid-icon"><i class="ri-map-pin-line" aria-hidden="true"></i></span>
            <span class="cq-drawer-grid-text">
              <span class="cq-drawer-grid-title">Kontak &amp; Visit</span>
              <span class="cq-drawer-grid-sub">Showroom Sleman</span>
            </span>
          </a>
        </div>
      </div>

      <!-- Section 4: Company Credentials & Showroom Card -->
      <div class="cq-drawer-credentials-card">
        <div class="cq-drawer-credentials-header">
          <div class="cq-drawer-corp-name">
            <strong>PT Indotech Berkah Abadi</strong>
            <span class="cq-drawer-corp-badge"><i class="ri-shield-check-fill" aria-hidden="true"></i> Resmi PT</span>
          </div>
          <div class="cq-drawer-corp-tagline">Produsen Mesin, Chemical Orchid &amp; Konsultan Bisnis</div>
        </div>

        <!-- Trust Guarantees Grid -->
        <div class="cq-drawer-trust-grid">
          <div class="cq-drawer-trust-item">
            <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
            <span>100% Hak Milik</span>
          </div>
          <div class="cq-drawer-trust-item">
            <i class="ri-shield-flash-fill" aria-hidden="true"></i>
            <span>Garansi Mesin</span>
          </div>
          <div class="cq-drawer-trust-item">
            <i class="ri-team-fill" aria-hidden="true"></i>
            <span>300+ Mitra</span>
          </div>
        </div>

        <div class="cq-drawer-credentials-list">
          <div class="cq-drawer-cred-item">
            <i class="ri-map-pin-2-fill cq-cred-icon" aria-hidden="true"></i>
            <div class="cq-cred-text">
              <span class="cq-cred-label">Kantor &amp; Showroom DIY:</span>
              <span class="cq-cred-value">Jl. Jongke Kidul Tengah No. 30, Sendangadi, Mlati, Kab. Sleman, D.I. Yogyakarta 55285</span>
            </div>
          </div>
          <div class="cq-drawer-cred-item">
            <i class="ri-time-fill cq-cred-icon" aria-hidden="true"></i>
            <div class="cq-cred-text">
              <span class="cq-cred-label">Jam Operasional:</span>
              <span class="cq-cred-value">Senin – Sabtu: 08.00 – 17.00 WIB</span>
            </div>
          </div>
          <div class="cq-drawer-cred-item">
            <i class="ri-customer-service-2-fill cq-cred-icon" aria-hidden="true"></i>
            <div class="cq-cred-text">
              <span class="cq-cred-label">Hotline WhatsApp:</span>
              <a href="tel:085600061005" class="cq-cred-link">0856-0006-1005</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. Fixed Bottom Action Dock (Thumb Zone Ergonomics) -->
    <?php
      $mobile_wa_kemitraan = function_exists('cleanique_get_whatsapp_url') ? cleanique_get_whatsapp_url('kemitraan') : 'https://wa.me/6285600061005';
      $mobile_proposal_pdf = get_option('cleanique_kemitraan_proposal_url') ?: 'https://drive.google.com/file/d/1cl51VSTqbNmxvRCXOHvG6cBSsiQ514hi/view?usp=sharing';
    ?>
    <div class="cq-drawer-footer">
      <a href="<?php echo esc_url($mobile_wa_kemitraan); ?>" class="cq-drawer-footer-btn cq-drawer-footer-wa" target="_blank" rel="noopener">
        <i class="ri-whatsapp-fill" aria-hidden="true"></i>
        <span class="cq-drawer-footer-btn-label">
          <strong>Konsultasi WA</strong>
          <small><span class="cq-online-dot"></span> Online • Fast Response</small>
        </span>
      </a>
      <a href="<?php echo esc_url($mobile_proposal_pdf); ?>" class="cq-drawer-footer-btn cq-drawer-footer-pdf" target="_blank" rel="noopener">
        <i class="ri-file-download-line" aria-hidden="true"></i>
        <span class="cq-drawer-footer-btn-label">
          <strong>Proposal PDF</strong>
          <small>Investasi &amp; BEP</small>
        </span>
      </a>
    </div>
  </div>
</div>

<!-- Global Desktop Search Modal (Topmost Layer Outside Header) -->
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
        <input type="search" class="cq-search-modal-input" placeholder="Ketik kata kunci (misal: paket kemitraan, biang sabun, mesin cuci)..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
        <button type="submit" class="cq-btn cq-btn-primary cq-btn-sm cq-btn-pill">Cari</button>
      </div>
    </form>
    <div class="cq-search-modal-suggestions">
      <span class="cq-search-sug-label"><i class="ri-fire-line"></i> Rekomendasi Pencarian:</span>
      <div class="cq-search-sug-pills">
        <a href="<?php echo esc_url(home_url('/?s=kemitraan')); ?>" class="cq-search-tag">Paket Kemitraan</a>
        <a href="<?php echo esc_url(home_url('/?s=biang+sabun')); ?>" class="cq-search-tag">Biang Sabun Pabrik</a>
        <a href="<?php echo esc_url(home_url('/?s=mesin+cuci')); ?>" class="cq-search-tag">Mesin Cuci &amp; Pengering</a>
        <a href="<?php echo esc_url(home_url('/?s=aplikasi+kasir')); ?>" class="cq-search-tag">Aplikasi Kasir POS</a>
      </div>
    </div>
  </div>
</div>
