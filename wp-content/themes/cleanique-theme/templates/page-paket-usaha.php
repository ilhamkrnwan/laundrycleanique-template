<?php
/**
 * Template Name: Landing Page - Paket Usaha Laundry
 * Description: Landing page konversi tinggi untuk penawaran peluang & paket usaha laundry Cleanique by PT Indotech Berkah Abadi.
 * Persona: Bo / Calon Pengusaha Baru & Investor Pemula
 * Deadline Promo: 31 Desember
 * Design: High-Converting Payno Fintech Design System
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

$wa_url = cleanique_get_whatsapp_url('paket_usaha');
?>

<main id="main-content">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Payno Modern Split Layout & Ambient Stage)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero">
    <div class="cq-container">
      <!-- Top Row: Split Headline (Left) & Persuasive Copy + CTA (Right) -->
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Paket Usaha
          </div>
          <h1 class="cq-payno-heading">
            Bisnis Laundry Selalu Ramai, <span class="cq-text-blue">Buka Usaha Siap Operasi Tanpa Takut Gagal.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            Mau punya bisnis laundry yang ramai tapi <strong>bingung mulai dari mana &amp; takut modal puluhan juta hangus?</strong> Jangan habiskan waktu dan biaya untuk <em>trial &amp; error</em> bertahun-tahun. Bersama <strong>Cleanique</strong>, Anda langsung memiliki paket usaha kemitraan lengkap: mesin cuci &amp; pengering siap pakai, <strong>biang sabun pekat</strong> yang diencerkan sendiri agar biaya operasional lebih murah, SOP tuntas, bonus sistem POS kasir, dan <strong>100% keuntungan milik Anda TANPA Royalty Fee!</strong>
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> 100% Hak Milik Tanpa Bagi Hasil</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Bahan Bersertifikat Halal</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Pendampingan Onsite Sampai Buka</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="#daftar-promo" class="cq-btn cq-btn-primary cq-btn-pill">
              Klaim Promo
            </a>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
            </a>
          </div>
        </div>
      </div>

      <!-- Center Stage: Turnkey Outlet Showcase & 3 Floating Glass Cards -->
      <div class="cq-payno-stage cq-peluang-stage">
        <!-- Floating Card 1 (Left): Estimasi Balik Modal & Margin -->
        <div class="cq-floating-card cq-float-left">
          <span style="font-size: 10px; color: var(--cq-text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; display: block;">Estimasi Balik Modal</span>
          <div style="font-family: var(--cq-font-heading); font-size: 19px; font-weight: 800; color: var(--ink); margin: 3px 0 2px;">
            4 – 8 Bulan <span style="font-size: 11px; color: var(--mint-cta); font-weight: 700;">+55% Margin <i class="ri-arrow-right-up-line" aria-hidden="true"></i></span>
          </div>
          <div style="font-size: 11px; color: var(--brand-deep); display: flex; align-items: center; gap: 4px; font-weight: 600;">
            <i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Cashflow Cair Tiap Hari
          </div>
        </div>

        <!-- Floating Card 2 (Right): 100% Hak Milik Tanpa Royalti -->
        <div class="cq-floating-card cq-float-right" style="max-width: 250px;">
          <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 2px;">
            <span class="cq-badge-pill cq-badge-accent" style="font-size: 9px; padding: 2px 8px;">
              Kemitraan Mandiri
            </span>
            <span style="font-size: 9px; color: var(--mint-cta); font-weight: 700;">100% Profit Anda</span>
          </div>
          <div style="font-size: 11px; font-weight: 600; color: var(--ink); line-height: 1.35; margin: 3px 0;">
            "Bukan franchise. Bebas royalty fee seumur hidup, tanpa potongan omzet bulanan."
          </div>
          <div style="font-size: 9.5px; color: var(--brand-deep); font-weight: 700;">
            Mesin &amp; outlet 100% hak milik
          </div>
        </div>

        <!-- Floating Card 3 (Bottom Left): Suplai Biang Sabun Pabrik -->
        <div class="cq-floating-card cq-float-bottom">
          <div class="cq-screen-avatar-img" style="width: 28px; height: 28px; background: #e0f2fe;">
            <i class="ri-flask-fill" style="color: var(--brand-deep); font-size: 16px;" aria-hidden="true"></i>
          </div>
          <div>
            <div style="font-size: 11px; font-weight: 700; color: var(--ink); line-height: 1.2;">Suplai Biang Sabun Pabrik</div>
            <div style="font-size: 10px; color: var(--cq-text-muted);">PT Indotech Berkah Abadi &bull; <span style="color: var(--mint-cta); font-weight: 600;">Biaya Operasional Lebih Murah</span></div>
          </div>
        </div>

        <!-- Center Showcase Frame -->
        <div class="cq-peluang-showcase-frame">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" 
               alt="Standar Tampilan Outlet Kemitraan Laundry Cleanique Modern &amp; Higienis" 
               class="cq-peluang-showcase-img" 
               loading="lazy">
          <div class="cq-peluang-frame-overlay">
            <div class="cq-peluang-frame-badge">
              Standar Outlet
            </div>
          </div>
        </div>
      </div>

      <!-- Dynamic Glass Countdown Card: Berakhir 31 Desember -->
      <div class="cq-promo-countdown-banner is-warning" data-countdown-deadline="2026-12-31T23:59:59+07:00" style="margin-top: var(--cq-sp-40);">
        <div class="cq-countdown-flex">
          <div class="cq-countdown-meta">
            <span class="cq-countdown-badge is-warning">
              Promo Terbatas
            </span>
            <div class="cq-countdown-title">Subsidi Ongkir &amp; Bonus Lisensi POS 1 Tahun Penuh!</div>
            <p class="cq-countdown-subtitle">Termasuk pelatihan trainer onsite 5 hari 4 malam hingga outlet siap buka.</p>
          </div>
          <div class="cq-countdown-timer">
            <div class="cq-countdown-box">
              <span class="cq-countdown-val cq-cd-days">00</span>
              <span class="cq-countdown-lbl">Hari</span>
            </div>
            <span class="cq-countdown-sep">:</span>
            <div class="cq-countdown-box">
              <span class="cq-countdown-val cq-cd-hours">00</span>
              <span class="cq-countdown-lbl">Jam</span>
            </div>
            <span class="cq-countdown-sep">:</span>
            <div class="cq-countdown-box">
              <span class="cq-countdown-val cq-cd-mins">00</span>
              <span class="cq-countdown-lbl">Menit</span>
            </div>
            <span class="cq-countdown-sep">:</span>
            <div class="cq-countdown-box">
              <span class="cq-countdown-val cq-cd-secs">00</span>
              <span class="cq-countdown-lbl">Detik</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. STATEMENT SECTION (Payno Signature Concentric Arch Glow)
       ======================================================== -->
  <section class="cq-statement-section">
    <div class="cq-container" style="max-width: 1040px;">
      <div class="cq-payno-statement-card">
        <!-- Soft Concentric Blue Arch Aura -->
        <div class="cq-payno-arch-glow" aria-hidden="true">
          <svg width="140" height="90" viewBox="0 0 140 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <filter id="cq-arch-blur-outer" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="7" />
              </filter>
              <filter id="cq-arch-blur-mid" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5" />
              </filter>
              <filter id="cq-arch-blur-core" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" />
              </filter>
            </defs>
            <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" filter="url(#cq-arch-blur-outer)" />
            <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" filter="url(#cq-arch-blur-mid)" />
            <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" filter="url(#cq-arch-blur-core)" />
          </svg>
        </div>

        <h2 class="cq-statement-text">
          Buka Usaha Laundry Bukan Sekadar Membeli Mesin.<br class="cq-hide-mobile">
          Ini Tentang Memiliki <span class="cq-text-blue">Ekosistem Teruji</span> yang<br class="cq-hide-mobile">
          Langsung Menghasilkan Kas Nyata Setiap Hari.
        </h2>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. PELUANG USAHA: Mengapa Bisnis Laundry Tidak Ada Matinya?
       ======================================================== -->
  <section class="cq-section" id="peluang">
    <div class="cq-container">
      <div class="cq-section-header">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">
          Potensi Pasar
        </div>
        <h2 class="cq-section-title">Mengapa Bisnis Laundry Dikatakan "Tidak Ada Matinya"?</h2>
        <p class="cq-section-desc">
          Bukan bisnis musiman atau tren sesaat. Selama manusia masih mengenakan pakaian, kebutuhan mencuci akan selalu ada setiap hari tanpa memandang kondisi ekonomi.
        </p>
        <div class="cq-mobile-swipe-indicator"><i class="ri-arrow-left-right-line" aria-hidden="true"></i> Geser ke samping &rarr;</div>
      </div>

      <div class="cq-peluang-grid-4">
        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-blue" aria-hidden="true"><i class="ri-shirt-line"></i></div>
          <h3 class="cq-peluang-card-title">Kebutuhan Pokok Harian</h3>
          <p class="cq-peluang-card-desc">
            Pakaian kotor diproduksi setiap hari oleh setiap individu. Keluarga sibuk, mahasiswa, dan pekerja kantoran tidak sempat mencuci sendiri dan selalu membutuhkan jasa laundry.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill"></i> Kebutuhan Primer Non-Stop
          </div>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-emerald" aria-hidden="true"><i class="ri-money-dollar-circle-line"></i></div>
          <h3 class="cq-peluang-card-title">Cash Flow Harian Nyata</h3>
          <p class="cq-peluang-card-desc">
            Bebas piutang macet berbulan-bulan. Pelanggan membayar lunas saat pakaian ditimbang atau diambil. Uang kas berputar cepat dan dapat Anda nikmati setiap hari.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill"></i> Bayar Lunas di Muka / Kas Cepat
          </div>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-indigo" aria-hidden="true"><i class="ri-repeat-line"></i></div>
          <h3 class="cq-peluang-card-title">Tingkat Repeat Order 75%+</h3>
          <p class="cq-peluang-card-desc">
            Pelanggan mencuci secara rutin setiap 3 sampai 7 hari sekali. Begitu cocok dengan kebersihan dan keharuman outlet Anda, mereka menjadi pelanggan setia bertahun-tahun.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill"></i> Siklus Cuci Rutin 3 - 7 Hari
          </div>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-teal" aria-hidden="true"><i class="ri-percent-line"></i></div>
          <h3 class="cq-peluang-card-title">Margin Laba Bersih 50–65%</h3>
          <p class="cq-peluang-card-desc">
            Karena pasokan bahan kimia disuplai langsung dari pabrik PT Indotech Berkah Abadi tanpa perantara distributor, HPP cuci Anda sangat terjangkau dan profit bersih maksimal.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill"></i> HPP Murah Direct Pabrik
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       4. AGITASI KETAKUTAN: 4 Kesalahan Fatal Pemula (Anti-Gagal)
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="masalah">
    <div class="cq-container">
      <div class="cq-section-header">
        <div class="cq-badge-pill cq-badge-warning" style="margin-bottom: var(--cq-sp-12);">
          Analisis Risiko
        </div>
        <h2 class="cq-section-title">Mau Buka Sendiri Tapi Bingung &amp; Takut Gagal? Jangan Jadi Korban Trial &amp; Error!</h2>
        <p class="cq-section-desc">
          Banyak orang mencoba merintis laundry sendirian dari nol tanpa panduan. Akhirnya modal puluhan juta habis dalam 6 bulan pertama karena 4 kesalahan fatal ini:
        </p>
        <div class="cq-mobile-swipe-indicator"><i class="ri-arrow-left-right-line" aria-hidden="true"></i> Geser ke samping &rarr;</div>
      </div>

      <div class="cq-grid-2">
        <div class="cq-peluang-pain-card">
          <div class="cq-pain-top-row">
            <div class="cq-pain-icon-wrap" aria-hidden="true">
              <i class="ri-tools-fill"></i>
            </div>
            <div class="cq-peluang-pain-badge">
              Risiko Mesin
            </div>
          </div>
          <h3 class="cq-peluang-pain-title">Beli Mesin Tanpa Survei &amp; Instalasi yang Benar</h3>
          <p class="cq-card-desc">
            Membeli unit mesin tanpa menghitung daya listrik, debit air, dan jalur pembuangan lebih dulu. Hasilnya kapasitas mesin tidak sesuai volume cucian, alur kerja berantakan, dan outlet terpaksa menambah biaya perbaikan di awal operasional.
          </p>
          <div class="cq-pain-safe-guard">
            <i class="ri-shield-check-fill"></i> <span><strong>Proteksi Cleanique:</strong> Surveyor memeriksa kelayakan lokasi lebih dulu, lalu kapasitas unit disesuaikan dengan paket yang dipilih.</span>
          </div>
        </div>

        <div class="cq-peluang-pain-card">
          <div class="cq-pain-top-row">
            <div class="cq-pain-icon-wrap" aria-hidden="true">
              <i class="ri-test-tube-fill"></i>
            </div>
            <div class="cq-peluang-pain-badge">
              Risiko Kimia
            </div>
          </div>
          <h3 class="cq-peluang-pain-title">Trial &amp; Error Meracik Bahan (Baju Rusak)</h3>
          <p class="cq-card-desc">
            Mencoba meracik deterjen dan parfum sendiri atau membeli curah tanpa izin edar. Hasilnya: baju pelanggan apek saat musim hujan, serat kain sobek, atau luntur. Pelanggan komplain keras dan meminta ganti rugi.
          </p>
          <div class="cq-pain-safe-guard">
            <i class="ri-shield-check-fill"></i> <span><strong>Proteksi Cleanique:</strong> Suplai biang sabun &amp; paket bahan pabrik yang diencerkan sendiri, takaran sudah terukur per siklus cuci.</span>
          </div>
        </div>

        <div class="cq-peluang-pain-card">
          <div class="cq-pain-top-row">
            <div class="cq-pain-icon-wrap" aria-hidden="true">
              <i class="ri-fire-fill"></i>
            </div>
            <div class="cq-peluang-pain-badge">
              Risiko Instalasi
            </div>
          </div>
          <h3 class="cq-peluang-pain-title">Instalasi Pipa Amatir &amp; Bahaya Kebocoran Gas</h3>
          <p class="cq-card-desc">
            Menyuruh tukang bangunan umum memasang instalasi dryer konversi gas dan pompa air tanpa SOP sertifikasi. Tekanan air sering drop, mesin cepat berkerak, dan rawan bahaya kebakaran gas.
          </p>
          <div class="cq-pain-safe-guard">
            <i class="ri-shield-check-fill"></i> <span><strong>Proteksi Cleanique:</strong> Instalasi dikerjakan tim instalasi PT Indotech dengan standar keselamatan gas dan air.</span>
          </div>
        </div>

        <div class="cq-peluang-pain-card">
          <div class="cq-pain-top-row">
            <div class="cq-pain-icon-wrap" aria-hidden="true">
              <i class="ri-hand-coin-fill"></i>
            </div>
            <div class="cq-peluang-pain-badge">
              Risiko Royalti
            </div>
          </div>
          <h3 class="cq-peluang-pain-title">Terjebak Franchise Lain dengan Royalty Fee Seumur Hidup</h3>
          <p class="cq-card-desc">
            Mengambil franchise merk lain yang memotong 5% - 10% omzet setiap bulan. Bekerja keras banting tulang setiap hari, tetapi sebagian besar keuntungan bersih habis disetor ke kantor pusat waralaba.
          </p>
          <div class="cq-pain-safe-guard">
            <i class="ri-shield-check-fill"></i> <span><strong>Proteksi Cleanique:</strong> 100% kemitraan mandiri murni: Tanpa bagi hasil, tanpa royalty fee seumur hidup.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. SOLUSI CLEANIQUE: Kemitraan Mandiri Tanpa Risiko Gagal
       ======================================================== -->
  <section class="cq-section" id="solusi">
    <div class="cq-container">
      <div class="cq-section-header">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">
          Model Turnkey
        </div>
        <h2 class="cq-section-title">Bersama Cleanique, Anda Buka Laundry Tanpa Risiko Gagal</h2>
        <p class="cq-section-desc">
          Kami memberikan paket komplit siap buka (*Turnkey Business*) yang didukung langsung oleh penyedia mesin dan pabrik biang sabun PT Indotech Berkah Abadi.
        </p>
        <div class="cq-mobile-swipe-indicator"><i class="ri-arrow-left-right-line" aria-hidden="true"></i> Geser ke samping &rarr;</div>
      </div>

      <div class="cq-grid-3">
        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-award-fill"></i></div>
          <h3 class="cq-peluang-card-title">100% Milik Anda (Tanpa Royalti)</h3>
          <p class="cq-peluang-card-desc">
            Cleanique adalah konsep kemitraan mandiri murni. Tidak ada biaya franchise tahunan, tidak ada potongan bagi hasil. Seluruh laba bersih dari keringat Anda 100% masuk ke kantong Anda sendiri.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-cpu-line"></i></div>
          <h3 class="cq-peluang-card-title">Mesin Baru Sesuai Kapasitas Paket</h3>
          <p class="cq-peluang-card-desc">
            Semua unit 100% baru, bukan bekas atau rekondisi. Komposisi front load, top load, dan pengering box gas disesuaikan dengan kapasitas paket serta hasil survei lokasi.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-flask-fill"></i></div>
          <h3 class="cq-peluang-card-title">Biang Sabun &amp; Paket Bahan Pabrik</h3>
          <p class="cq-peluang-card-desc">
            Biang sabun pekat, softener, dan parfum waterbase diencerkan sendiri di outlet. Biaya per kilo cucian lebih murah dibanding membeli sabun jadi, stok lebih tahan lama, dan bahan bersertifikat halal.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-graduation-cap-fill"></i></div>
          <h3 class="cq-peluang-card-title">SOP Higienis &amp; Training Onsite</h3>
          <p class="cq-peluang-card-desc">
            Anda dan staf diajarkan teknik pencucian berbagai jenis kain, takaran bahan presisi, teknik setrika uap licin seketika, packing rapi, hingga pelayanan kasir prima sampai mandiri.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-smartphone-line"></i></div>
          <h3 class="cq-peluang-card-title">Sistem Kasir Cleanique POS Termasuk</h3>
          <p class="cq-peluang-card-desc">
            Semua paket sudah include aplikasi kasir digital Cleanique: nota WhatsApp otomatis, live tracking pelanggan, serta dashboard laporan omzet yang dapat Anda pantau real-time dari smartphone.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-team-line"></i></div>
          <h3 class="cq-peluang-card-title">Pendampingan Sampai Hari Buka</h3>
          <p class="cq-peluang-card-desc">
            Surveyor dan konsultan kami memetakan lokasi, daya listrik, sumber air, dan jalur pembuangan limbah sebelum paket disusun. Setelah itu trainer mendampingi operasional hingga grand opening.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       6. GALERI FASILITAS & PERALATAN KELAS INDUSTRI
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="fasilitas">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Apa Saja yang Anda Dapatkan dalam Setiap Paket?</h2>
        <p class="cq-section-desc">Peralatan baru dan siap pakai, dirakit serta diuji di lokasi oleh tim instalasi PT Indotech Berkah Abadi.</p>
      </div>

      <?php
      $fasilitas_items = [
          [
              'title' => 'Mesin Cuci Front & Top Load',
              'desc'  => 'Front load 7 kg untuk cucian harian, top load 9–12 kg untuk sprei dan selimut. Cukup untuk volume kiloan tanpa makan tempat.',
              'image' => get_template_directory_uri() . '/assets/images/equip-washer-dryer.jpg',
              'alt'   => 'Mesin Cuci Laundry Cleanique',
              'tag'   => 'Peralatan Utama',
          ],
          [
              'title' => 'Pengering Box Konversi Gas',
              'desc'  => 'Pakaian kering tanpa bergantung cuaca. Memakai gas LPG sehingga lebih hemat dibanding pengering listrik.',
              'image' => get_template_directory_uri() . '/assets/images/equip-boiler-iron.jpg',
              'alt'   => 'Mesin Pengering Box Konversi Gas',
              'tag'   => 'Pengeringan',
          ],
          [
              'title' => 'Setrika Uap Tabung & Meja Setrika',
              'desc'  => 'Setrika uap tabung untuk hasil licin seketika, ditambah setrika listrik untuk detailing bagian kerah dan lipatan.',
              'image' => get_template_directory_uri() . '/assets/images/equip-boiler-iron.jpg',
              'alt'   => 'Setrika Uap Tabung dan Meja Setrika',
              'tag'   => 'Finishing Rapi',
          ],
          [
              'title' => 'Biang Sabun & Paket Bahan',
              'desc'  => 'Bahan pekat (softener, parfum waterbase, anti noda) diencerkan sendiri di outlet. Biaya per kilo cucian lebih murah dan bersertifikat halal.',
              'image' => get_template_directory_uri() . '/assets/images/chemical-products.jpg',
              'alt'   => 'Biang Sabun dan Paket Bahan Laundry',
              'tag'   => 'Hemat Operasional',
          ],
          [
              'title' => 'Pelatihan Trainer Onsite',
              'desc'  => 'Trainer mendampingi 5 hari 4 malam: operasional, kasir, pembukuan, hingga marketing lokal.',
              'image' => get_template_directory_uri() . '/assets/images/indotech-team.jpg',
              'alt'   => 'Pelatihan Trainer Onsite Cleanique',
              'tag'   => 'Pendampingan',
          ],
          [
              'title' => 'Media Promo & Branding',
              'desc'  => 'Akrilik billboard, neon box, x-banner, brosur, nota transaksi, dan kartu member siap pakai saat grand opening.',
              'image' => get_template_directory_uri() . '/assets/images/hero-outlet.jpg',
              'alt'   => 'Media Promosi dan Branding Outlet Cleanique',
              'tag'   => 'Media Promosi',
          ],
      ];
      ?>

      <!-- Continuous Infinite Carousel Track (Payno Modern Marquee) -->
      <div class="cq-equip-track-wrap">
        <div class="cq-equip-track">
          <!-- Group 1: Original Items -->
          <div class="cq-equip-group">
            <?php foreach ($fasilitas_items as $item) : ?>
              <div class="cq-equip-card-modern">
                <div class="cq-equip-img-wrap">
                  <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" loading="lazy" width="400" height="200">
                </div>
                <div class="cq-equip-body-modern">
                  <span class="cq-equip-tag"><?php echo esc_html($item['tag']); ?></span>
                  <h4 class="cq-equip-title-modern"><?php echo esc_html($item['title']); ?></h4>
                  <p class="cq-equip-desc-modern"><?php echo esc_html($item['desc']); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Group 2: Duplicate Items for 100% Seamless Infinite Loop -->
          <div class="cq-equip-group" aria-hidden="true">
            <?php foreach ($fasilitas_items as $item) : ?>
              <div class="cq-equip-card-modern">
                <div class="cq-equip-img-wrap">
                  <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" loading="lazy" width="400" height="200">
                </div>
                <div class="cq-equip-body-modern">
                  <span class="cq-equip-tag"><?php echo esc_html($item['tag']); ?></span>
                  <h4 class="cq-equip-title-modern"><?php echo esc_html($item['title']); ?></h4>
                  <p class="cq-equip-desc-modern"><?php echo esc_html($item['desc']); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       7. PILIHAN PAKET INVESTASI KEMITRAAN
       ======================================================== -->
  <section class="cq-section" id="pilihan-paket">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Paket Usaha Siap Buka Sesuai Budget Anda</h2>
        <p class="cq-section-desc">
          Pilih paket yang paling cocok dengan lokasi dan modal Anda. Semua paket BO sudah termasuk pelatihan manajemen &amp; operasional. Amankan kuota subsidi ongkir &amp; bonus lisensi POS sebelum 31 Desember!
        </p>
        <div class="cq-mobile-swipe-indicator"><i class="ri-arrow-left-right-line" aria-hidden="true"></i> Geser ke samping &rarr;</div>
      </div>

      <div class="cq-grid-3">
        <?php
        $paket_query = new WP_Query([
            'post_type'      => 'kemitraan',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        ]);

        if ($paket_query->have_posts()) :
            while ($paket_query->have_posts()) : $paket_query->the_post();
                $price = get_post_meta(get_the_ID(), '_cq_kemitraan_price', true);
                $badge = get_post_meta(get_the_ID(), '_cq_kemitraan_badge', true);
                $featured = get_post_meta(get_the_ID(), '_cq_kemitraan_featured', true);
                $specs_raw = get_post_meta(get_the_ID(), '_cq_kemitraan_specs', true);
                $specs = !empty($specs_raw) ? array_filter(array_map('trim', explode("\n", $specs_raw))) : [];
        ?>
          <div class="cq-invest-card <?php echo $featured ? 'is-popular' : ''; ?>">
            <?php if (!empty($badge)) : ?>
              <div class="cq-invest-badge-pill"><?php echo esc_html($badge); ?></div>
            <?php endif; ?>
            <h3 class="cq-pricing-title"><?php the_title(); ?></h3>
            <p class="cq-card-desc"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
            <div class="cq-invest-price-val">
              <?php echo esc_html($price ?: 'Konsultasi'); ?> <small>/ <?php echo $badge === 'Tanpa Mesin' ? 'biaya paket' : 'modal awal'; ?></small>
            </div>
            <ul class="cq-pricing-list">
              <?php foreach ($specs as $spec) : ?>
                <li class="checked"><?php echo esc_html($spec); ?></li>
              <?php endforeach; ?>
            </ul>
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn <?php echo $featured ? 'cq-btn-primary' : 'cq-btn-outline'; ?> cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Paket
            </a>
          </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <!-- Fallback: data paket tidak tersedia -->
        <div class="cq-invest-card is-popular">
          <h3 class="cq-pricing-title">Katalog Paket Sedang Diperbarui</h3>
          <p class="cq-card-desc">Rincian paket Starter, Super, Premium, dan Paket Pelatihan dapat kami kirimkan langsung melalui WhatsApp.</p>
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Minta Katalog
          </a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ========================================================
       8. SHOWCASE KEMITRAAN SUKSES & TESTIMONI MITRA
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="mitra-sukses">
    <div class="cq-container">
      <div class="cq-section-header">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">
          Studi Kasus
        </div>
        <h2 class="cq-section-title">Kemitraan yang Telah Berjalan &amp; Menikmati Hasil Nyata</h2>
        <p class="cq-section-desc">
          Bukan sekadar janji di atas kertas. Simak cerita langsung dari para mitra Cleanique di berbagai kota yang telah sukses membuka dan menjalankan usaha laundry mandiri mereka bersama PT Indotech Berkah Abadi.
        </p>
        <div class="cq-mobile-swipe-indicator"><i class="ri-arrow-left-right-line" aria-hidden="true"></i> Geser ke samping &rarr;</div>
      </div>

      <div class="cq-story-grid">
        <!-- Mitra 1: Sleman, DIY -->
        <article class="cq-success-story-card">
          <div class="cq-story-img-container">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-sleman.jpg'); ?>" 
                 alt="Outlet Mitra Cleanique Express Minomartani Sleman" 
                 class="cq-story-img" loading="lazy">
            <div class="cq-story-img-badge">
              Sleman, DIY
            </div>
            <div class="cq-story-paket-tag">Commercial Pro</div>
          </div>
          <div class="cq-story-body">
            <div class="cq-story-rating" aria-label="Rating 5 dari 5 bintang">
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <span class="cq-story-rating-text">5.0 &bull; Mitra Terverifikasi</span>
            </div>
            <blockquote class="cq-story-quote">
              &ldquo;Awalnya kami ragu karena sama sekali belum pernah bisnis laundry. Untung didampingi surveyor dan trainer Indotech dari perancangan pipa, kelistrikan sampai pelatihan takaran bahan. Biang sabunnya hemat banget karena diencerkan sendiri dan hasilnya konsisten. Dalam 6 bulan modal kami sudah balik!&rdquo;
            </blockquote>
            <div class="cq-story-author-box">
              <div class="cq-story-avatar-initial">H&amp;S</div>
              <div class="cq-story-author-info">
                <div class="cq-story-author-name">Pak Hendro &amp; Ibu Siska</div>
                <div class="cq-story-outlet-name">Owner Cleanique Express Minomartani</div>
              </div>
            </div>
            <div class="cq-story-metrics">
              <div class="cq-story-metric-item">
                <span class="cq-metric-label">Cucian Harian</span>
                <span class="cq-metric-val">110+ Kg/Hari</span>
              </div>
              <div class="cq-story-metric-divider"></div>
              <div class="cq-story-metric-item">
                <span class="cq-metric-label">Balik Modal</span>
                <span class="cq-metric-val cq-highlight-metric">Bulan ke-6</span>
              </div>
            </div>
          </div>
        </article>

        <!-- Mitra 2: Solo, Jawa Tengah -->
        <article class="cq-success-story-card">
          <div class="cq-story-img-container">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-solo.jpg'); ?>" 
                 alt="Outlet Mitra Cleanique Laundry Solo Jebres" 
                 class="cq-story-img" loading="lazy">
            <div class="cq-story-img-badge">
              Solo, Jateng
            </div>
            <div class="cq-story-paket-tag">Commercial Pro</div>
          </div>
          <div class="cq-story-body">
            <div class="cq-story-rating" aria-label="Rating 5 dari 5 bintang">
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <span class="cq-story-rating-text">5.0 &bull; Mitra Terverifikasi</span>
            </div>
            <blockquote class="cq-story-quote">
              &ldquo;Yang paling memuaskan adalah sistem aplikasi kasir Cleanique POS-nya. Nota langsung terkirim WhatsApp ke pelanggan, omzet harian bisa dipantau langsung dari HP sambil saya tetap bekerja kantor. Dan yang luar biasa: 100% keuntungan bersih masuk kantong saya sendiri tanpa royalti fee!&rdquo;
            </blockquote>
            <div class="cq-story-author-box">
              <div class="cq-story-avatar-initial">DP</div>
              <div class="cq-story-author-info">
                <div class="cq-story-author-name">Mas Dimas Pratama</div>
                <div class="cq-story-outlet-name">Owner Cleanique Laundry Solo</div>
              </div>
            </div>
            <div class="cq-story-metrics">
              <div class="cq-story-metric-item">
                <span class="cq-metric-label">Cucian Harian</span>
                <span class="cq-metric-val">95 Kg/Hari</span>
              </div>
              <div class="cq-story-metric-divider"></div>
              <div class="cq-story-metric-item">
                <span class="cq-metric-label">Balik Modal</span>
                <span class="cq-metric-val cq-highlight-metric">Bulan ke-5</span>
              </div>
            </div>
          </div>
        </article>

        <!-- Mitra 3: Semarang, Jawa Tengah -->
        <article class="cq-success-story-card">
          <div class="cq-story-img-container">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mitra-outlet-semarang.jpg'); ?>" 
                 alt="Outlet Mitra Cleanique Laundry Tembalang Semarang" 
                 class="cq-story-img" loading="lazy">
            <div class="cq-story-img-badge">
              Semarang
            </div>
            <div class="cq-story-paket-tag">Industrial Premium</div>
          </div>
          <div class="cq-story-body">
            <div class="cq-story-rating" aria-label="Rating 5 dari 5 bintang">
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <i class="ri-star-fill"></i>
              <span class="cq-story-rating-text">5.0 &bull; Mitra Terverifikasi</span>
            </div>
            <blockquote class="cq-story-quote">
              &ldquo;Mesinnya bekerja dari pagi sampai malam tanpa kendala, dan biang sabunnya jauh lebih hemat dibanding beli deterjen jadi. Tim instalasi PT Indotech juga rapi saat pemasangan pipa dan gas. Sekarang kami sedang persiapan membuka cabang kedua!&rdquo;
            </blockquote>
            <div class="cq-story-author-box">
              <div class="cq-story-avatar-initial">NH</div>
              <div class="cq-story-author-info">
                <div class="cq-story-author-name">Ibu Hj. Nurul Hidayati</div>
                <div class="cq-story-outlet-name">Owner Cleanique Tembalang Premium</div>
              </div>
            </div>
            <div class="cq-story-metrics">
              <div class="cq-story-metric-item">
                <span class="cq-metric-label">Cucian Harian</span>
                <span class="cq-metric-val">200+ Kg/Hari</span>
              </div>
              <div class="cq-story-metric-divider"></div>
              <div class="cq-story-metric-item">
                <span class="cq-metric-label">Ekspansi Bisnis</span>
                <span class="cq-metric-val cq-highlight-metric">Buka Cabang ke-2</span>
              </div>
            </div>
          </div>
        </article>
      </div>

      <!-- Trust Badges Strip -->
      <div class="cq-mitra-trust-strip">
        <div class="cq-trust-stat-box">
          <div class="cq-trust-stat-val">35+</div>
          <div class="cq-trust-stat-lbl">Gerai Mitra Beroperasi</div>
        </div>
        <div class="cq-trust-stat-box">
          <div class="cq-trust-stat-val">100%</div>
          <div class="cq-trust-stat-lbl">Bebas Royalti Fee Selamanya</div>
        </div>
        <div class="cq-trust-stat-box">
          <div class="cq-trust-stat-val">4 - 8 Bln</div>
          <div class="cq-trust-stat-lbl">Rata-rata Waktu Balik Modal</div>
        </div>
        <div class="cq-trust-stat-box">
          <div class="cq-trust-stat-val">Langsung Pabrik</div>
          <div class="cq-trust-stat-lbl">Jaminan Mesin &amp; Kimia Resmi</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       9. LEAD PROPOSAL FORM & BOOKING PROMO SLOT
       ======================================================== -->
  <section class="cq-section" id="daftar-promo">
    <div class="cq-container">
      <div class="cq-peluang-form-card">
        <div class="cq-card-header-flex" style="margin-bottom: var(--cq-sp-12);">
          <div>
            <span class="cq-badge-pill cq-badge-warning" style="margin-bottom: 6px;">Promo Terbatas</span>
            <h2 class="cq-hero-card-title" style="margin-bottom: 0;">Daftar &amp; Amankan Slot Promo Kemitraan</h2>
          </div>
        </div>
        <p class="cq-hero-card-desc">
          Konsultan bisnis kami akan langsung mengirimkan proposal rincian paket, estimasi balik modal (BEP), denah layout outlet, dan voucher subsidi ongkir ke WhatsApp Anda.
        </p>

        <form id="cq-proposal-form" class="cq-form-trial">
          <div class="cq-form-group">
            <label for="investor-name">Nama Lengkap</label>
            <input type="text" id="investor-name" class="cq-input" placeholder="Contoh: Budi Santoso" required>
          </div>
          <div class="cq-form-group">
            <label for="investor-wa">Nomor WhatsApp Aktif</label>
            <input type="tel" id="investor-wa" class="cq-input" placeholder="08xxxxxxxxxx" required>
          </div>
          <div class="cq-form-group">
            <label for="investor-city">Rencana Kota / Lokasi Usaha</label>
            <input type="text" id="investor-city" class="cq-input" placeholder="Contoh: Sleman, Yogyakarta" required>
          </div>
          <div class="cq-form-group">
            <label class="cq-form-label" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
              <span>Pilihan Paket yang Diminati</span>
              <span style="font-size: 11.5px; color: var(--cq-text-muted); font-weight: 500;">Pilih salah satu</span>
            </label>
            <input type="hidden" id="investor-paket" name="paket" value="Paket Super (Rp 75 Jt - Paling Populer)">

            <div class="cq-paket-card-selector" role="radiogroup" aria-label="Pilihan Paket yang Diminati">
              <!-- Card 1: Starter -->
              <label class="cq-paket-choice-card" data-paket="Paket Starter (Rp 45 Jt)">
                <input type="radio" name="paket_radio" value="Paket Starter (Rp 45 Jt)" class="cq-paket-radio-native">
                <div class="cq-paket-choice-top">
                  <span class="cq-paket-choice-badge">Starter</span>
                  <span class="cq-paket-choice-check"><i class="ri-check-line" aria-hidden="true"></i></span>
                </div>
                <div class="cq-paket-choice-body">
                  <span class="cq-paket-choice-name">Starter</span>
                  <span class="cq-paket-choice-price">Rp 45 Jt</span>
                  <span class="cq-paket-choice-sub">Ruko 24 m&sup2; &bull; Hemat Pemula</span>
                </div>
              </label>

              <!-- Card 2: Super (Default Selected) -->
              <label class="cq-paket-choice-card is-selected is-popular" data-paket="Paket Super (Rp 75 Jt - Paling Populer)">
                <input type="radio" name="paket_radio" value="Paket Super (Rp 75 Jt - Paling Populer)" class="cq-paket-radio-native" checked>
                <div class="cq-paket-choice-top">
                  <span class="cq-paket-choice-badge is-popular">Terlaris</span>
                  <span class="cq-paket-choice-check"><i class="ri-check-line" aria-hidden="true"></i></span>
                </div>
                <div class="cq-paket-choice-body">
                  <span class="cq-paket-choice-name">Super</span>
                  <span class="cq-paket-choice-price">Rp 75 Jt</span>
                  <span class="cq-paket-choice-sub">Ruko 36 m&sup2; &bull; POS 1 Tahun</span>
                </div>
              </label>

              <!-- Card 3: Premium -->
              <label class="cq-paket-choice-card" data-paket="Paket Premium (Rp 167 Jt)">
                <input type="radio" name="paket_radio" value="Paket Premium (Rp 167 Jt)" class="cq-paket-radio-native">
                <div class="cq-paket-choice-top">
                  <span class="cq-paket-choice-badge">Premium</span>
                  <span class="cq-paket-choice-check"><i class="ri-check-line" aria-hidden="true"></i></span>
                </div>
                <div class="cq-paket-choice-body">
                  <span class="cq-paket-choice-name">Premium</span>
                  <span class="cq-paket-choice-price">Rp 167 Jt</span>
                  <span class="cq-paket-choice-sub">72 m&sup2; &bull; Skala Besar</span>
                </div>
              </label>

              <!-- Card 4: Pelatihan Saja -->
              <label class="cq-paket-choice-card" data-paket="Paket Pelatihan Manajemen &amp; Operasional (Rp 8,5 Jt)">
                <input type="radio" name="paket_radio" value="Paket Pelatihan Manajemen &amp; Operasional (Rp 8,5 Jt)" class="cq-paket-radio-native">
                <div class="cq-paket-choice-top">
                  <span class="cq-paket-choice-badge">Pelatihan</span>
                  <span class="cq-paket-choice-check"><i class="ri-check-line" aria-hidden="true"></i></span>
                </div>
                <div class="cq-paket-choice-body">
                  <span class="cq-paket-choice-name">Pelatihan</span>
                  <span class="cq-paket-choice-price">Rp 8,5 Jt</span>
                  <span class="cq-paket-choice-sub">Tanpa Mesin &bull; 5 Hari</span>
                </div>
              </label>
            </div>
          </div>
          <button type="submit" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block cq-btn-lg">
            Daftar Promo
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- ========================================================
       10. FAQ ACCORDION (Aksesibilitas & Pertanyaan Umum)
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="faq">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Pertanyaan Seputar Kemitraan Laundry Cleanique</h2>
      </div>

      <div class="cq-accordion">
        <div class="cq-accordion-item is-open">
          <button class="cq-accordion-trigger" type="button" aria-expanded="true">
            <span>Apakah ada biaya royalti bulanan (Franchise Fee)?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Sama sekali tidak ada! Cleanique Laundry menganut konsep kemitraan mandiri murni (*Turnkey Business*). 100% keuntungan harian dan bulanan adalah milik Anda seutuhnya tanpa potongan bagi hasil ke pusat.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Bagaimana jika saya belum pernah punya pengalaman bisnis laundry?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Justru kemitraan Cleanique dirancang khusus untuk pemula agar tidak terjebak trial-error. Anda dan karyawan akan dilatih tuntas onsite mulai dari pengoperasian mesin, teknik spotting noda, takaran bahan, hingga SOP pelayanan pelanggan dan pembukuan kasir.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Apakah unit mesin baru dan bagaimana pendampingannya?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Semua unit 100% baru, bukan bekas atau rekondisi. Pendampingan meliputi survei kelayakan lokasi, instalasi oleh tim PT Indotech Berkah Abadi, pelatihan trainer onsite 5 hari 4 malam, serta konsultasi teknis tanpa batas waktu setelah outlet berjalan.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Apakah melayani pengiriman dan instalasi ke luar kota atau luar pulau?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Ya, kami melayani pengiriman dan instalasi paket usaha ke seluruh kota di Indonesia menggunakan armada ekspedisi kargo rekanan yang aman dan berasuransi penuh.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Bagaimana kelanjutan pasokan bahan laundry setelah buka?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Mitra mendapatkan akses harga khusus pabrik untuk biang sabun, softener, parfum waterbase, dan cairan anti-noda. Bahan dikirim dalam bentuk pekat lalu diencerkan sendiri di outlet, sehingga biaya per kilo cucian lebih murah dibanding membeli sabun jadi.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Apakah bahan laundry Cleanique bersertifikat halal?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Ya. Bahan yang kami suplai bersertifikat halal. Bagi mitra yang ingin naik kelas, kami mendampingi proses sertifikasi halal outlet sehingga usaha Anda berpeluang masuk ekosistem mitra bisnis syariah.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       11. FINAL BANNER CTA (Contained Section Card)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <h2 class="cq-banner-cta-title">
          Siap Membuka Usaha Laundry Sukses Anda?
        </h2>
        <p class="cq-banner-cta-desc">
          Jangan biarkan rasa takut gagal dan kebingungan menunda langkah Anda. Amankan kuota promo kemitraan dan konsultasikan lokasi usaha Anda bersama tim ahli Cleanique hari ini.
        </p>
        <div class="cq-banner-cta-actions">
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Sekarang
          </a>
          <a href="#daftar-promo" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
            Minta Proposal
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
