<?php
/**
 * Template Name: Company Profile - Solusi Kami
 * Description: Halaman Layanan & Ekosistem Solusi Cleanique Laundry
 * Modern Payno Fintech Aesthetic
 *
 * @package Cleanique
 */

get_header();

// ── SEO Plugin Compatibility ────────────────────────────────────────────────
// Plugin SEO (Yoast/RankMath/AIOSEO) memerlukan the_post() dari main loop
// untuk menginject title, meta description, canonical, dan OG tags ke <head>.
if (have_posts()) {
    the_post();
}
// ────────────────────────────────────────────────────────────────────────────

$wa_url = cleanique_get_whatsapp_url('general');
?>

<main id="main-content" class="cq-solutions-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Payno Modern Split Layout)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero" id="solusi">
    <div class="cq-container">
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Ekosistem Solusi Terpadu &bull; PT Indotech Berkah Abadi
          </div>
          <h1 class="cq-payno-heading">
            Solusi Lengkap dari Hulu ke Hilir, <span class="cq-text-blue">Untuk Usaha Laundry Modern Indonesia.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            Cleanique Laundry menyediakan rantai pasok dan sistem terpadu bagi para wirausahawan binatu: mulai dari paket pembukaan outlet fisik siap pakai dengan mesin komersial heavy-duty, suplai chemical langsung dari pabrik, hingga transformasi kasir digital modern berbasis komputasi cloud.
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Solusi 01: Paket Usaha Turnkey Siap Buka</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Solusi 02: Aplikasi POS Kasir Cloud (Trial 7 Hari)</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="#solusi-paket" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-store-2-line" aria-hidden="true"></i> Solusi Paket Usaha
            </a>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Tim Ahli
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. STATEMENT SECTION (Payno Concentric Arch Aura)
       ======================================================== -->
  <section class="cq-statement-section">
    <div class="cq-container" style="max-width: 1040px;">
      <div class="cq-payno-statement-card">
        <div class="cq-payno-arch-glow" aria-hidden="true">
          <svg width="140" height="90" viewBox="0 0 140 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <filter id="cq-sol-arch-blur-outer" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="7" />
              </filter>
              <filter id="cq-sol-arch-blur-mid" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5" />
              </filter>
              <filter id="cq-sol-arch-blur-core" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" />
              </filter>
            </defs>
            <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" filter="url(#cq-sol-arch-blur-outer)" />
            <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" filter="url(#cq-sol-arch-blur-mid)" />
            <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" filter="url(#cq-sol-arch-blur-core)" />
          </svg>
        </div>

        <h2 class="cq-statement-text">
          Apapun Tahap Bisnis Anda Saat Ini.<br class="cq-hide-mobile">
          Mulai dari Buka Usaha Baru hingga Digitalisasi Outlet yang Sedang Berjalan,<br class="cq-hide-mobile">
          Cleanique Menyediakan <span class="cq-text-blue">Solusi Tepat Sasaran &amp; Terbukti Untung.</span>
        </h2>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. PILAR 1: PAKET USAHA LAUNDRY TURNKEY
       ======================================================== -->
  <section class="cq-section" id="solusi-paket">
    <div class="cq-container">
      <div class="cq-visual-split" style="align-items: center; margin-bottom: var(--cq-sp-64);">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" 
               alt="Outlet Paket Usaha Kemitraan Laundry Cleanique" 
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.4rem + 1.2vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.2; margin-bottom: var(--cq-sp-16);">
            Paket Usaha Laundry Lengkap (Turnkey Business)
          </h2>
          <p style="color: var(--cq-text-muted); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--cq-sp-16);">
            Bagi calon investor dan pengusaha yang ingin memiliki outlet laundry kiloan atau komersial tanpa perlu bingung meriset mesin, meracik chemical, atau menyusun SOP. Seluruh peralatan siap pakai bergaransi resmi pabrik.
          </p>

          <ul class="cq-portal-gateway-bullets" style="margin-bottom: var(--cq-sp-24);">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Set mesin cuci &amp; dryer komersial heavy-duty bergaransi resmi pabrik.</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Instalasi pipa air, kelistrikan, dan cerobong pembuangan gas standar aman.</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Pasokan deterjen, softener, dan parfum langsung dari pabrik Indotech.</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Termasuk lisensi sistem aplikasi kasir digital POS Cleanique.</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Pelatihan SOP karyawan, pendampingan grand opening, dan 100% tanpa royalti fee.</li>
          </ul>

          <div style="display: flex; gap: var(--cq-sp-12); flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
              Detail Paket Usaha Laundry <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
            <a href="<?php echo esc_url(cleanique_get_whatsapp_url('paket_usaha')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Tanya Paket via WA
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       4. PILAR 2: APLIKASI KASIR POS CLOUD & WHATSAPP
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="solusi-pos">
    <div class="cq-container">
      <div class="cq-visual-split is-reversed" style="align-items: center;">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" 
               alt="Aplikasi POS Kasir Laundry Cleanique Cloud" 
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.4rem + 1.2vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.2; margin-bottom: var(--cq-sp-16);">
            Sistem Kasir Digital POS Laundry Modern (Cloud SaaS)
          </h2>
          <p style="color: var(--cq-text-muted); font-size: 1.05rem; line-height: 1.7; margin-bottom: var(--cq-sp-16);">
            Solusi bagi pemilik laundry yang lelah dengan nota kertas manual yang sering hilang, salah hitung timbangan, atau risiko manipulasi kasir. Tingkatkan kepuasan pelanggan dengan teknologi notifikasi WhatsApp otomatis.
          </p>

          <ul class="cq-portal-gateway-bullets" style="margin-bottom: var(--cq-sp-24);">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Pengiriman nota otomatis langsung ke WhatsApp pelanggan dalam 1 detik.</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Tautan live tracking status pakaian mandiri (Cuci &rarr; Kering &rarr; Selesai).</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Laporan arus kas, tutup shift, dan audit anti-kecurangan kasir.</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Asisten AI bisnis laundry cerdas terintegrasi 24/7.</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <strong>Free Trial 7 Hari penuh tanpa kartu kredit!</strong></li>
          </ul>

          <div style="display: flex; gap: var(--cq-sp-12); flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg">
              Coba Gratis POS (Trial 7 Hari) <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
            <a href="<?php echo esc_url(cleanique_get_whatsapp_url('aplikasi_trial')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Tanya CS POS via WA
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. CLOSING BANNER CTA
       ======================================================== -->
  <section class="cq-section cq-section-dark cq-banner-cta-section">
    <div class="cq-container cq-section-header">
      <h2 class="cq-banner-cta-title">
        Bingung Menentukan Solusi yang Paling Tepat?
      </h2>
      <p class="cq-banner-cta-desc">
        Konsultasikan rencana bisnis atau kendala operasional laundry Anda sekarang bersama tim konsultan ahli <strong>PT Indotech Berkah Abadi</strong>.
      </p>
      <div class="cq-banner-cta-actions">
        <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Gratis via WhatsApp
        </a>
        <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
          <i class="ri-map-pin-line" aria-hidden="true"></i> Lokasi Kantor &amp; Workshop
        </a>
        <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
          Katalog Paket Usaha
        </a>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
