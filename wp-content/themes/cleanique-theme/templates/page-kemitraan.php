<?php
/**
 * Template Name: Halaman Kemitraan Laundry
 * Description: Template resmi katalog paket kemitraan usaha laundry PT Indotech Berkah Abadi.
 * Fitur: 4 Paket Turnkey, Roadmap SOP Pelatihan, Tabel Perbandingan 0% Royalti, Simulasi ROI, dan FAQ.
 * SEO Note: Template ini menggunakan the_post() dari main loop agar plugin SEO (Yoast/RankMath)
 *           dapat membaca metadata halaman dengan benar.
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

$wa_url           = cleanique_get_whatsapp_url('kemitraan');
$proposal_pdf_url = get_option('cleanique_kemitraan_proposal_url');
$headline         = get_option('cleanique_kemitraan_headline', 'Peluang Bisnis Laundry Siap Operasi 100% Hak Milik Tanpa Royalti');
?>

<main id="main-content" class="cq-kemitraan-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Payno Modern Split Layout)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero" id="kemitraan-hero">
    <div class="cq-container">
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Kemitraan Turnkey
          </div>
          <?php if (!empty($headline) && $headline !== 'Peluang Bisnis Laundry Siap Operasi 100% Hak Milik Tanpa Royalti') : ?>
            <h1 class="cq-payno-heading">
              <?php echo esc_html($headline); ?>
            </h1>
          <?php else : ?>
            <h1 class="cq-payno-heading">
              Peluang Bisnis Laundry Mandiri, <span class="cq-text-blue">100% Hak Milik Tanpa Royalti.</span>
            </h1>
          <?php endif; ?>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            Mulai usaha laundry komersial dengan risiko terukur. Dapatkan paket turnkey siap jalan: mesin cuci &amp; pengering baru, pasokan biang sabun pekat harga tangan pertama dari pabrik Yogyakarta, instalasi plumbing &amp; kelistrikan, serta pelatihan trainer onsite 5 hari 4 malam sampai grand opening.
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> 0% Royalty Fee Selamanya</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Biang Sabun Pabrik Sleman</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Bahan Bersertifikat Halal</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Software POS Kasir Cloud</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Sekarang
            </a>
            <a href="#katalog-paket" class="cq-btn cq-btn-white-pill cq-btn-pill">
              Lihat Paket
            </a>
            <?php if (!empty($proposal_pdf_url)) : ?>
              <a href="<?php echo esc_url($proposal_pdf_url); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill" target="_blank" rel="noopener">
                <i class="ri-file-download-line" aria-hidden="true"></i> Unduh Proposal
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- 4 Stats Counter Row (Clean Payno Cards) -->
      <div class="cq-corp-stats-row" style="margin-top: clamp(32px, 4vw, 48px);">
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">0%</div>
          <div class="cq-corp-stat-label">Royalti Selamanya &bull; Bebas Potongan</div>
        </div>
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">4 - 8 Bln</div>
          <div class="cq-corp-stat-label">Rata-Rata Balik Modal (BEP Nyata)</div>
        </div>
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">300+</div>
          <div class="cq-corp-stat-label">Mitra Aktif di Seluruh Indonesia</div>
        </div>
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">100%</div>
          <div class="cq-corp-stat-label">Hak Milik Mesin, Merk &amp; Omzet</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. KATALOG PAKET KEMITRAAN (Tiered Bento Pricing Architecture)
       ======================================================== -->
  <section class="cq-section" id="katalog-paket" style="padding: clamp(60px, 8vw, 90px) 0; background: #f8fafc;">
    <div class="cq-container">
      <div style="text-align: center; max-width: 760px; margin: 0 auto clamp(28px, 4vw, 40px);">
        <span class="cq-badge-clean" style="margin-bottom: var(--cq-sp-12);">Paket Kemitraan</span>
        <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-12);">
          Pilihan Paket Kemitraan Sesuai Skala Bisnis Anda
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); line-height: 1.65; margin: 0;">
          Semua paket kemitraan turnkey komplit di bawah <strong>sudah otomatis INCLUDE Paket Pelatihan SOP &amp; Pendampingan Onsite (senilai Rp 8.500.000)</strong> tanpa biaya tambahan. Bagi yang sudah memiliki unit mesin sendiri, tersedia pula paket pelatihan terpisah.
        </p>
      </div>

      <!-- Toggle Skema Investasi (Tiered Bento Switcher) -->
      <div class="cq-pricing-switcher-wrap">
        <div class="cq-pricing-switcher-pills" role="tablist" aria-label="Pilihan Skema Pembayaran">
          <button type="button" class="cq-pricing-pill-btn is-active" data-scheme="full" role="tab" aria-selected="true">
            <i class="ri-wallet-3-line"></i>
            <span>Bayar Lunas</span>
          </button>
          <button type="button" class="cq-pricing-pill-btn" data-scheme="termin" role="tab" aria-selected="false">
            <i class="ri-calendar-check-line"></i>
            <span>Skema Termin</span>
            <span class="cq-switcher-badge">DP 50%</span>
          </button>
        </div>
        <div class="cq-pricing-switcher-note">
          <span class="cq-scheme-note cq-scheme-note-full is-active">
            <i class="ri-shield-check-fill"></i> Paket komplit siap buka: mesin baru, instalasi pipa &amp; gas, chemical awal, dan pelatihan tuntas 0% royalti.
          </span>
          <span class="cq-scheme-note cq-scheme-note-termin">
            <i class="ri-information-fill"></i> Ringan di awal: <strong>DP 50%</strong> saat penandatanganan MOU, <strong>Termin 40%</strong> saat mesin tiba di lokasi, dan <strong>Pelunasan 10%</strong> saat serah terima.
          </span>
        </div>
      </div>

      <!-- Tiered Bento Pricing Layout (3 Core Top + 2 Wide Bottom) -->
      <div class="cq-pricing-bento-layout">
        <!-- Row 1: 3 Core Cards (Starter, Super, Premium) -->
        <div class="cq-pricing-bento-top">
          <!-- Card 1: Starter -->
          <div class="cq-kemitraan-card">
            <div class="cq-kemitraan-header">
              <h3 class="cq-corp-card-title">Paket Starter</h3>
              <p class="cq-corp-card-desc">Solusi hemat bagi pemula untuk membuka usaha laundry kiloan di perumahan atau area kos.</p>
            </div>
            <div class="cq-kemitraan-price-box">
              <div class="cq-kemitraan-price-display">
                <span class="cq-price-prefix">Rp</span>
                <span class="cq-price-val" data-price-full="45" data-price-termin="22,5">45</span>
                <span class="cq-price-unit">
                  <span class="cq-price-unit-main">Juta</span>
                  <span class="cq-price-unit-sub" data-sub-full="-an" data-sub-termin="-an (MOU)">-an</span>
                </span>
              </div>
              <p class="cq-price-subtext" data-label-full="Estimasi modal siap buka" data-label-termin="DP 50% saat MOU">Estimasi modal siap buka</p>
            </div>
            <div class="cq-kemitraan-roi-pill">
              <i class="ri-line-chart-line"></i> BEP 4 &ndash; 6 Bulan
            </div>
            <div class="cq-kemitraan-divider"></div>
            <ul class="cq-kemitraan-specs-list">
              <li class="cq-spec-highlight-free"><i class="ri-gift-line" aria-hidden="true"></i> <span>Pelatihan SOP Onsite (Gratis)</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>1 Unit Mesin Cuci Front Load 7 kg + Top Load 9 kg</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>1 Unit Pengering Box Konversi Gas 10 kg</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Starter Paket Chemical Biang Pabrik Orchid</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>2 Unit Setrika Listrik + Detailing</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Aplikasi Kasir POS Cleanique 6 Bulan</span></li>
            </ul>
            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url(cleanique_get_kemitraan_whatsapp_url(30)); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
              </a>
              <a href="<?php echo esc_url(home_url('/kemitraan/paket-kiloan-starter/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Detail Paket
              </a>
            </div>
          </div>

          <!-- Card 2: Super (Featured / Paling Populer) -->
          <div class="cq-kemitraan-card is-featured">
            <div class="cq-kemitraan-ribbon">
              <i class="ri-fire-fill"></i> Paling Populer
            </div>
            <div class="cq-kemitraan-header">
              <h3 class="cq-corp-card-title">Paket Super</h3>
              <p class="cq-corp-card-desc">Kapasitas menengah untuk ruko komersial strategis, melayani kiloan cepat dan bed cover.</p>
            </div>
            <div class="cq-kemitraan-price-box is-featured">
              <div class="cq-kemitraan-price-display">
                <span class="cq-price-prefix is-featured">Rp</span>
                <span class="cq-price-val is-featured" data-price-full="75" data-price-termin="37,5">75</span>
                <span class="cq-price-unit">
                  <span class="cq-price-unit-main is-featured">Juta</span>
                  <span class="cq-price-unit-sub" data-sub-full="-an" data-sub-termin="-an (MOU)">-an</span>
                </span>
              </div>
              <p class="cq-price-subtext" data-label-full="Estimasi modal siap buka" data-label-termin="DP 50% saat MOU">Estimasi modal siap buka</p>
            </div>
            <div class="cq-kemitraan-roi-pill is-featured">
              <i class="ri-line-chart-line"></i> BEP 5 &ndash; 8 Bulan
            </div>
            <div class="cq-kemitraan-divider"></div>
            <ul class="cq-kemitraan-specs-list">
              <li class="cq-spec-highlight-free"><i class="ri-gift-line" aria-hidden="true"></i> <span>Pelatihan Onsite 5 Hari (Gratis)</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>2 Unit Mesin Cuci Front Load 7 kg + Top Load 12 kg</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>2 Unit Pengering Box Konversi Gas 10 kg</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Setrika Uap Boiler 15 Liter + Listrik</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Vertical Steamer untuk Jas &amp; Gaun</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Tablet Kasir + POS Cleanique 1 Tahun</span></li>
            </ul>
            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url(cleanique_get_kemitraan_whatsapp_url(31)); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block cq-btn-featured" target="_blank" rel="noopener">
                <i class="ri-whatsapp-fill"></i> Pilih Paket
              </a>
              <a href="<?php echo esc_url(home_url('/kemitraan/paket-komersial-pro-ruko/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Detail Paket
              </a>
            </div>
          </div>

          <!-- Card 3: Premium (Industrial) -->
          <div class="cq-kemitraan-card">
            <div class="cq-kemitraan-header">
              <h3 class="cq-corp-card-title">Paket Premium</h3>
              <p class="cq-corp-card-desc">Skala komersial besar untuk sentra laundry hotel melati, asrama, dan guesthouse.</p>
            </div>
            <div class="cq-kemitraan-price-box">
              <div class="cq-kemitraan-price-display">
                <span class="cq-price-prefix">Rp</span>
                <span class="cq-price-val" data-price-full="167" data-price-termin="83,5">167</span>
                <span class="cq-price-unit">
                  <span class="cq-price-unit-main">Juta</span>
                  <span class="cq-price-unit-sub" data-sub-full="-an" data-sub-termin="-an (MOU)">-an</span>
                </span>
              </div>
              <p class="cq-price-subtext" data-label-full="Estimasi modal siap buka" data-label-termin="DP 50% saat MOU">Estimasi modal siap buka</p>
            </div>
            <div class="cq-kemitraan-roi-pill">
              <i class="ri-line-chart-line"></i> BEP 6 &ndash; 10 Bulan
            </div>
            <div class="cq-kemitraan-divider"></div>
            <ul class="cq-kemitraan-specs-list">
              <li class="cq-spec-highlight-free"><i class="ri-gift-line" aria-hidden="true"></i> <span>Pelatihan Komprehensif (Gratis)</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>4 Unit Mesin Cuci Front Load 7 kg + 2 Top Load 12 kg</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>4 Unit Pengering Box Konversi Gas 10 kg</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>2 Unit Setrika Uap Boiler 20 Liter</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>PC Kasir + Printer Nota &amp; Tablet</span></li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Aplikasi POS Cleanique 1,5 Tahun</span></li>
            </ul>
            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url(cleanique_get_kemitraan_whatsapp_url(32)); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
              </a>
              <a href="<?php echo esc_url(home_url('/kemitraan/paket-industrial-express/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Detail Paket
              </a>
            </div>
          </div>
        </div>

        <!-- Row 2: 2 Wide Bento Cards (Pelatihan & SOP + Enterprise Industrial) -->
        <div class="cq-pricing-bento-bottom">
          <!-- Card 4: Horizontal Split Card (Paket Pelatihan & SOP Tanpa Mesin) -->
          <div class="cq-pricing-horizontal-card">
            <div class="cq-pricing-horizontal-left">
              <div class="cq-kemitraan-header">
                <span class="cq-pkg-tag"><i class="ri-user-star-line"></i> Tanpa Mesin</span>
                <h3 class="cq-corp-card-title">Pelatihan SOP Saja</h3>
                <p class="cq-corp-card-desc">Bimbingan operasional mandiri bagi yang sudah memiliki unit mesin sendiri.</p>
              </div>
              <div class="cq-kemitraan-price-box">
                <div class="cq-kemitraan-price-display">
                  <span class="cq-price-prefix">Rp</span>
                  <span class="cq-price-val" data-price-full="8,5" data-price-termin="4,25">8,5</span>
                  <span class="cq-price-unit">
                    <span class="cq-price-unit-main">Juta</span>
                    <span class="cq-price-unit-sub" data-sub-full="" data-sub-termin=" (MOU)"></span>
                  </span>
                </div>
                <p class="cq-price-subtext" data-label-full="Pelatihan onsite komplit" data-label-termin="DP 50% saat MOU">Pelatihan onsite komplit</p>
              </div>
              <div class="cq-kemitraan-actions">
                <a href="<?php echo esc_url(cleanique_get_kemitraan_whatsapp_url(41)); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                  <span>Pilih Pelatihan</span>
                  <i class="ri-arrow-right-line"></i>
                </a>
              </div>
            </div>
            <div class="cq-pricing-horizontal-right">
              <h4 class="cq-horizontal-right-title"><i class="ri-checkbox-multiple-fill"></i> Modul Pelatihan:</h4>
              <ul class="cq-horizontal-feature-list">
                <li>
                  <i class="ri-checkbox-circle-fill"></i>
                  <div>
                    <strong>Bimbingan Onsite 5 Hari</strong>
                    <span>Pelatihan langsung di outlet Anda sampai siap beroperasi.</span>
                  </div>
                </li>
                <li>
                  <i class="ri-checkbox-circle-fill"></i>
                  <div>
                    <strong>SOP Cuci &amp; Spotting Noda</strong>
                    <span>Teknik pembersihan noda darah, minyak, jamur, serta setrika uap.</span>
                  </div>
                </li>
                <li>
                  <i class="ri-checkbox-circle-fill"></i>
                  <div>
                    <strong>Starter Chemical Pabrik Orchid</strong>
                    <span>Deterjen konsentrat, softener, &amp; parfum microcapsule tahan lama.</span>
                  </div>
                </li>
                <li>
                  <i class="ri-checkbox-circle-fill"></i>
                  <div>
                    <strong>Aplikasi POS &amp; Nota WhatsApp</strong>
                    <span>Pencatatan kasir digital berbasis cloud dan anti-curang.</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <!-- Card 5: Enterprise Industrial Card (Custom Quote & Skala Besar) -->
          <div class="cq-pricing-enterprise-card">
            <div class="cq-enterprise-header">
              <span class="cq-pkg-tag is-enterprise"><i class="ri-building-4-line"></i> Skala Industri</span>
              <h3 class="cq-corp-card-title">Skala Industri Besar</h3>
              <p class="cq-corp-card-desc">Kebutuhan kapasitas mesin ekstra besar untuk sentra laundry rumah sakit, hotel, dan asrama.</p>
            </div>
            <div class="cq-enterprise-specs">
              <div class="cq-enterprise-spec-item">
                <i class="ri-ruler-2-line"></i>
                <span>Layout alur &amp; survey</span>
              </div>
              <div class="cq-enterprise-spec-item">
                <i class="ri-sound-module-line"></i>
                <span>Mesin 25 &ndash; 100 kg</span>
              </div>
              <div class="cq-enterprise-spec-item">
                <i class="ri-fire-line"></i>
                <span>Boiler uap sentral gas</span>
              </div>
              <div class="cq-enterprise-spec-item">
                <i class="ri-file-text-line"></i>
                <span>Kontrak resmi PT</span>
              </div>
            </div>
            <div class="cq-enterprise-footer">
              <a href="<?php echo esc_url(cleanique_get_kemitraan_whatsapp_url(32)); ?>" class="cq-btn cq-btn-enterprise cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <span>Hubungi Kami</span>
                <i class="ri-arrow-right-line"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. DAFTAR MITRA AKTIF CLEANIQUE LAUNDRY (Jaringan Outlet Mandiri)
       ======================================================== -->
  <section class="cq-mitra-active-section" id="mitra-aktif">
    <div class="cq-container">
      <div style="text-align: center; max-width: 760px; margin: 0 auto;">
        <span class="cq-badge-clean" style="margin-bottom: var(--cq-sp-12);">300+ Mitra</span>
        <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-12);">
          Daftar Mitra Aktif Cleanique
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: #475569; line-height: 1.65; margin: 0;">
          Jaringan outlet mandiri yang beroperasi aktif menggunakan peralatan dan SOP resmi PT Indotech Berkah Abadi.
        </p>
      </div>

      <!-- City Filter Bar -->
      <div class="cq-mitra-filter-bar">
        <button type="button" class="cq-mitra-filter-btn is-active" data-filter="all">Semua Kota</button>
        <button type="button" class="cq-mitra-filter-btn" data-filter="diy">Yogyakarta</button>
        <button type="button" class="cq-mitra-filter-btn" data-filter="solo">Surakarta</button>
        <button type="button" class="cq-mitra-filter-btn" data-filter="semarang">Semarang</button>
        <button type="button" class="cq-mitra-filter-btn" data-filter="jateng">Klaten</button>
      </div>

      <!-- Active Partners Grid -->
      <div class="cq-mitra-active-grid" id="cq-mitra-grid">
        <!-- Mitra 1: Sleman Minomartani -->
        <div class="cq-mitra-active-card" data-city="diy">
          <div class="cq-mitra-active-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-sleman.webp'); ?>" 
                 alt="Cleanique Express Minomartani" 
                 class="cq-mitra-active-img"
                 loading="lazy">
            <div class="cq-card-badge-group">
              <span class="cq-card-badge">Sleman, DIY</span>
              <span class="cq-card-badge is-highlight">Paket Super</span>
            </div>
          </div>
          <div class="cq-mitra-active-body">
            <h3 class="cq-mitra-active-title">Cleanique Minomartani</h3>
            <p class="cq-mitra-active-desc">Outlet komersial aktif dengan kapasitas 160 kg per hari melayani perumahan dan kos mahasiswa.</p>
            <div class="cq-mitra-active-action">
              <a href="https://maps.google.com/?q=Cleanique+Express+Minomartani+Sleman" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Lihat Lokasi
              </a>
            </div>
          </div>
        </div>

        <!-- Mitra 2: Solo Jebres -->
        <div class="cq-mitra-active-card" data-city="solo">
          <div class="cq-mitra-active-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-solo.webp'); ?>" 
                 alt="Cleanique Express Kampus UNS" 
                 class="cq-mitra-active-img"
                 loading="lazy">
            <div class="cq-card-badge-group">
              <span class="cq-card-badge">Solo, Jateng</span>
              <span class="cq-card-badge is-highlight">Paket Super</span>
            </div>
          </div>
          <div class="cq-mitra-active-body">
            <h3 class="cq-mitra-active-title">Cleanique Kampus UNS</h3>
            <p class="cq-mitra-active-desc">Outlet strategis sentra mahasiswa UNS dengan sistem kasir digital dan layanan ekspres.</p>
            <div class="cq-mitra-active-action">
              <a href="https://maps.google.com/?q=Cleanique+Laundry+Jebres+Solo" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Lihat Lokasi
              </a>
            </div>
          </div>
        </div>

        <!-- Mitra 3: Semarang Tembalang -->
        <div class="cq-mitra-active-card" data-city="semarang">
          <div class="cq-mitra-active-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-semarang.webp'); ?>" 
                 alt="Cleanique Prima Tembalang" 
                 class="cq-mitra-active-img"
                 loading="lazy">
            <div class="cq-card-badge-group">
              <span class="cq-card-badge">Semarang</span>
              <span class="cq-card-badge is-highlight">Paket Premium</span>
            </div>
          </div>
          <div class="cq-mitra-active-body">
            <h3 class="cq-mitra-active-title">Cleanique Tembalang</h3>
            <p class="cq-mitra-active-desc">Sentra produksi laundry kapasitas besar melayani asrama kampus Undip dan pemukiman.</p>
            <div class="cq-mitra-active-action">
              <a href="https://maps.google.com/?q=Cleanique+Prima+Tembalang+Semarang" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Lihat Lokasi
              </a>
            </div>
          </div>
        </div>

        <!-- Mitra 4: Sleman Palagan -->
        <div class="cq-mitra-active-card" data-city="diy">
          <div class="cq-mitra-active-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-sleman.webp'); ?>" 
                 alt="Cleanique Ruko Palagan" 
                 class="cq-mitra-active-img"
                 loading="lazy">
            <div class="cq-card-badge-group">
              <span class="cq-card-badge">Sleman, DIY</span>
              <span class="cq-card-badge is-highlight">Paket Super</span>
            </div>
          </div>
          <div class="cq-mitra-active-body">
            <h3 class="cq-mitra-active-title">Cleanique Ruko Palagan</h3>
            <p class="cq-mitra-active-desc">Cabang mandiri di cluster perumahan elit dengan pasokan biang sabun pabrik standar.</p>
            <div class="cq-mitra-active-action">
              <a href="https://maps.google.com/?q=Cleanique+Laundry+Palagan+Sleman" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Lihat Lokasi
              </a>
            </div>
          </div>
        </div>

        <!-- Mitra 5: Klaten Kota -->
        <div class="cq-mitra-active-card" data-city="jateng">
          <div class="cq-mitra-active-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-solo.webp'); ?>" 
                 alt="Cleanique Mandiri Klaten Kota" 
                 class="cq-mitra-active-img"
                 loading="lazy">
            <div class="cq-card-badge-group">
              <span class="cq-card-badge">Klaten</span>
              <span class="cq-card-badge is-highlight">Paket Starter</span>
            </div>
          </div>
          <div class="cq-mitra-active-body">
            <h3 class="cq-mitra-active-title">Cleanique Klaten Kota</h3>
            <p class="cq-mitra-active-desc">Outlet mandiri pemula yang sukses beroperasi melayani pelanggan residensial dan kantor.</p>
            <div class="cq-mitra-active-action">
              <a href="https://maps.google.com/?q=Cleanique+Klaten+Kota" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Lihat Lokasi
              </a>
            </div>
          </div>
        </div>

        <!-- Mitra 6: Training Center Mlati Sleman -->
        <div class="cq-mitra-active-card" data-city="diy">
          <div class="cq-mitra-active-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/08-standardisasi-pelatihan-sop-teknisi.webp'); ?>" 
                 alt="Cleanique Training Center" 
                 class="cq-mitra-active-img"
                 loading="lazy">
            <div class="cq-card-badge-group">
              <span class="cq-card-badge">Yogyakarta</span>
              <span class="cq-card-badge is-highlight">Pusat Diklat</span>
            </div>
          </div>
          <div class="cq-mitra-active-body">
            <h3 class="cq-mitra-active-title">Cleanique Training Center</h3>
            <p class="cq-mitra-active-desc">Fasilitas riset resmi untuk demo mesin laundry, uji formula chemical, dan diklat calon mitra.</p>
            <div class="cq-mitra-active-action">
              <a href="https://maps.google.com/?q=PT+Indotech+Berkah+Abadi+Sleman" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Kunjungi Lokasi
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Trust Metrics Bar -->
      <div class="cq-mitra-stats-grid">
        <div class="cq-mitra-stat-item">
          <div class="cq-mitra-stat-num">300+</div>
          <div class="cq-mitra-stat-lbl">Outlet Mitra Mandiri Aktif di Pulau Jawa</div>
        </div>
        <div class="cq-mitra-stat-item">
          <div class="cq-mitra-stat-num">0%</div>
          <div class="cq-mitra-stat-lbl">Biaya Royalti / Potongan Bagi Hasil Bulanan</div>
        </div>
        <div class="cq-mitra-stat-item">
          <div class="cq-mitra-stat-num">100%</div>
          <div class="cq-mitra-stat-lbl">Hak Milik Sah Mesin, Brand &amp; Keuntungan</div>
        </div>
        <div class="cq-mitra-stat-item">
          <div class="cq-mitra-stat-num">5D4N</div>
          <div class="cq-mitra-stat-lbl">Pelatihan Trainer Onsite di Lokasi Mitra</div>
        </div>
      </div>
      </div>
</section>

  <!-- ========================================================
       4. TABEL PERBANDINGAN 0% ROYALTI (Cleanique vs Franchise Konvensional)
       ======================================================== -->
  <section class="cq-section" style="padding: clamp(60px, 8vw, 90px) 0; background: #ffffff;">
    <div class="cq-container">
      <div style="text-align: center; max-width: 720px; margin: 0 auto clamp(32px, 5vw, 44px);">
        <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-12);">
          Mengapa Bermitra dengan Cleanique Jauh Lebih Menguntungkan?
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); line-height: 1.65; margin: 0;">
          Kami adalah mitra manufaktur &amp; teknologi, bukan franchisor yang membebani keuntungan bulanan Anda dengan potongan omzet.
        </p>
      </div>

      <div class="cq-compare-wrap">
        <table class="cq-compare-table">
          <thead>
            <tr>
              <th style="width: 34%;">Fitur &amp; Model Bisnis</th>
              <th class="col-highlight" style="width: 33%;">Cleanique Laundry (PT Indotech)</th>
              <th style="width: 33%;">Franchise / Waralaba Lain</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Biaya Royalti Bulanan</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> 0% (Rp 0 Selamanya)</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> 5% – 12% dari Omzet Tiap Bulan</span></td>
            </tr>
            <tr>
              <td><strong>Status Kepemilikan Mesin &amp; Aset</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> 100% Hak Milik Sah Mitra</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Terikat Sistem Hak Sewa / Pinjam</span></td>
            </tr>
            <tr>
              <td><strong>Kebebasan Merk &amp; Branding</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> Bebas Pakai Merk Sendiri / Cleanique</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Wajib Pakai Merk Franchise Tertentu</span></td>
            </tr>
            <tr>
              <td><strong>Harga Pasokan Biang Sabun &amp; Bahan</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> Harga Tangan Pertama dari Pabrik Sleman</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Harga Distributor (Sudah Dimarkup Tinggi)</span></td>
            </tr>
            <tr>
              <td><strong>Biaya Lisensi Software Kasir POS</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> Gratis Termasuk di Paket Usaha</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Biaya Langganan Bulanan/Tahunan</span></td>
            </tr>
            <tr>
              <td><strong>Dukungan Teknis &amp; Suku Cadang</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> Konsultasi Teknis Tanpa Batas + Gudang Sparepart DIY</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Antri Teknisi Luar Kota / Pihak Ketiga</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. 6 KEUNGGULAN KEMITRAAN BERSAMA PT INDOTECH (Benefit Bento)
       ======================================================== -->
  <section class="cq-section" style="padding: clamp(60px, 8vw, 90px) 0; background: #ffffff;">
    <div class="cq-container">
      <div style="text-align: center; max-width: 720px; margin: 0 auto clamp(32px, 5vw, 48px);">
        <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-12);">
          Pondasi Keberhasilan Outlet Anda Bersama Indotech
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); line-height: 1.65; margin: 0;">
          Dukungan menyeluruh dari satu atap manufaktur, rekayasa mesin, dan tim IT in-house.
        </p>
      </div>

      <div class="cq-kemitraan-benefits-grid">
        <div class="cq-kemitraan-benefit-card">
          <div class="cq-kemitraan-benefit-icon">
            <i class="ri-building-4-fill" aria-hidden="true"></i>
          </div>
          <h3 class="cq-kemitraan-benefit-title">Legalitas Berbadan Hukum PT</h3>
          <p class="cq-kemitraan-benefit-desc">
            PT Indotech Berkah Abadi memiliki izin industri resmi, legalitas NIB lengkap, dan kantor operasional fisik yang dapat dikunjungi setiap hari kerja di Sleman, DIY.
          </p>
        </div>

        <div class="cq-kemitraan-benefit-card">
          <div class="cq-kemitraan-benefit-icon">
            <i class="ri-flask-fill" aria-hidden="true"></i>
          </div>
          <h3 class="cq-kemitraan-benefit-title">Pabrik Biang Sabun Mandiri</h3>
          <p class="cq-kemitraan-benefit-desc">
            Mitra Cleanique mendapatkan prioritas suplai biang sabun pekat, softener, parfum, dan paket bahan laundry langsung dari tangki produksi pabrik. Bahan bersertifikat halal.
          </p>
        </div>

        <div class="cq-kemitraan-benefit-card">
          <div class="cq-kemitraan-benefit-icon">
            <i class="ri-shield-check-fill" aria-hidden="true"></i>
          </div>
          <h3 class="cq-kemitraan-benefit-title">Unit Baru &amp; Konsultasi Teknis</h3>
          <p class="cq-kemitraan-benefit-desc">
            Semua unit mesin 100% baru, bukan bekas atau rekondisi. Setelah outlet berjalan, mitra tetap bisa berkonsultasi teknis tanpa batas waktu dan memperoleh suku cadang dari gudang Sleman.
          </p>
        </div>

        <div class="cq-kemitraan-benefit-card">
          <div class="cq-kemitraan-benefit-icon">
            <i class="ri-smartphone-fill" aria-hidden="true"></i>
          </div>
          <h3 class="cq-kemitraan-benefit-title">Aplikasi Kasir POS Real-Time</h3>
          <p class="cq-kemitraan-benefit-desc">
            Software kasir kasir laundry terintegrasi. Cetak nota transaksi, notifikasi WhatsApp status cucian ke pelanggan, dan monitoring pendapatan langsung dari ponsel pemilik.
          </p>
        </div>

        <div class="cq-kemitraan-benefit-card">
          <div class="cq-kemitraan-benefit-icon">
            <i class="ri-hand-coin-fill" aria-hidden="true"></i>
          </div>
          <h3 class="cq-kemitraan-benefit-title">100% Hak Milik Tanpa Fee Bulanan</h3>
          <p class="cq-kemitraan-benefit-desc">
            Tidak ada potongan royalti persenan omzet, tidak ada biaya franchise tahunan, dan tidak ada pinalti jika mitra ingin mengembangkan cabang baru dengan mandiri.
          </p>
        </div>

        <div class="cq-kemitraan-benefit-card">
          <div class="cq-kemitraan-benefit-icon">
            <i class="ri-customer-service-2-fill" aria-hidden="true"></i>
          </div>
          <h3 class="cq-kemitraan-benefit-title">Konsultasi Teknis Tanpa Batas</h3>
          <p class="cq-kemitraan-benefit-desc">
            Grup konsultasi WhatsApp eksklusif bersama trainer dan konsultan bisnis siap membantu memecahkan kendala operasional harian outlet Anda.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       7. FAQ KEMITRAAN (Accordion Interaktif)
       ======================================================== -->
  <section class="cq-section" style="padding: clamp(60px, 8vw, 90px) 0; background: #f8fafc;" id="faq">
    <div class="cq-container">
      <div style="text-align: center; max-width: 680px; margin: 0 auto clamp(32px, 5vw, 44px);">
        <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-12);">
          Hal yang Kerap Ditanyakan Calon Mitra
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); line-height: 1.65; margin: 0;">
          Jawaban lugas dan transparan mengenai sistem kemitraan tanpa royalti Cleanique Laundry.
        </p>
      </div>

      <div style="max-width: 820px; margin: 0 auto;" class="cq-faq-accordion">
        <details class="cq-accordion-item" open>
          <summary class="cq-accordion-trigger">
            <span>Apakah benar-benar bebas biaya royalti selamanya?</span>
            <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
          </summary>
          <div class="cq-accordion-content">
            <p><strong>Benar 100%.</strong> PT Indotech Berkah Abadi menganut model kemitraan bisnis mandiri. Anda tidak akan pernah ditagih biaya royalti persenan omzet bulanan, biaya perpanjangan lisensi merk tahunan, ataupun biaya wajib lainnya. 100% pendapatan kotor maupun bersih adalah hak milik penuh Anda.</p>
          </div>
        </details>

        <details class="cq-accordion-item">
          <summary class="cq-accordion-trigger">
            <span>Saya belum pernah berbisnis laundry, apakah ada pelatihan karyawan?</span>
            <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
          </summary>
          <div class="cq-accordion-content">
            <p>Ya, seluruh paket kemitraan sudah mencakup modul pelatihan komprehensif. Tim pelatih kami memberikan bimbingan teknis langsung (onsite/daring) mulai dari teknik mencuci bahan pakaian sensitif, teknik spotting noda membandel (darah, minyak, jamur), teknik setrika uap cepat, hingga pengoperasian software kasir Cleanique.</p>
          </div>
        </details>

        <details class="cq-accordion-item">
          <summary class="cq-accordion-trigger">
            <span>Bagaimana jika mesin cuci atau pengering mengalami kendala teknis?</span>
            <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
          </summary>
          <div class="cq-accordion-content">
            <p>Semua unit yang kami kirim 100% baru, bukan bekas atau rekondisi. PT Indotech memiliki gudang suku cadang di Sleman, DIY. Setelah outlet berjalan, mitra dapat berkonsultasi teknis tanpa batas waktu via WhatsApp, termasuk panduan diagnosa awal dan pengadaan sparepart dari gudang kami.</p>
          </div>
        </details>

        <details class="cq-accordion-item">
          <summary class="cq-accordion-trigger">
            <span>Apakah pasokan biang sabun dan pewangi wajib dibeli dari pabrik Cleanique?</span>
            <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
          </summary>
          <div class="cq-accordion-content">
            <p>Kami menyarankan mitra menggunakan biang sabun dan paket bahan dari pabrik kami karena diformulasikan khusus dengan busa rendah (low foam) yang melindungi bearing mesin cuci dan parfum yang tahan lama. Sebagai mitra Cleanique, Anda mendapatkan harga pabrik tangan pertama yang lebih hemat dari pasokan toko grosir biasa. Bahan kami bersertifikat halal.</p>
          </div>
        </details>

        <details class="cq-accordion-item">
          <summary class="cq-accordion-trigger">
            <span>Berapa lama estimasi waktu dari penandatanganan hingga outlet siap buka?</span>
            <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
          </summary>
          <div class="cq-accordion-content">
            <p>Rata-rata proses persiapan outlet memakan waktu <strong>7 hingga 14 hari kerja</strong>, bergantung pada kesiapan fisik ruko/kios (instalasi pipa air masuk dan buangan, ketersediaan daya listrik PLN, dan penyelesaian renovasi interior).</p>
          </div>
        </details>
      </div>
    </div>
  </section>

  <!-- ========================================================
       8. BOTTOM CONSULTATION CTA BOX (Corporate Showcase Bento)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section" id="kontak" style="padding-top: 0; padding-bottom: clamp(60px, 8vw, 100px);">
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

            <h2 class="cq-banner-cta-title">
              Siap Membuka Usaha Laundry Anda?
            </h2>

            <p class="cq-banner-cta-desc">
              Dapatkan paket usaha siap buka, mesin garansi pabrik, pasokan chemical tangan pertama Sleman, dan bimbingan sampai balik modal.
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
              <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
                Kunjungan Showroom
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
                <i class="ri-map-pin-2-line" aria-hidden="true"></i> Showroom &amp; Pabrik Sleman
              </div>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/02-paket-usaha-laundry-siap-buka.webp'); ?>" 
                   alt="Paket Kemitraan Laundry Siap Buka Cleanique" 
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

<script>
document.addEventListener('DOMContentLoaded', function() {
  // --- Filter Interactivity: Daftar Mitra Aktif ---
  const filterBtns = document.querySelectorAll('.cq-mitra-filter-btn');
  const mitraCards = document.querySelectorAll('.cq-mitra-active-card');

  if (filterBtns.length && mitraCards.length) {
    filterBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        filterBtns.forEach(b => b.classList.remove('is-active'));
        this.classList.add('is-active');
        const filter = this.dataset.filter;

        mitraCards.forEach(card => {
          if (filter === 'all' || card.dataset.city === filter) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  }
});
</script>

<?php
get_footer();
