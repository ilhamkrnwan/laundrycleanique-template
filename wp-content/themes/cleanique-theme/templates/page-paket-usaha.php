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
            <i class="ri-shield-check-fill" style="color: var(--mint-cta); font-size: 15px;" aria-hidden="true"></i>
            Pabrikan Resmi: PT Indotech Berkah Abadi &bull; Sleman, DIY
          </div>
          <h1 class="cq-payno-heading">
            Bisnis Laundry Selalu Ramai, <span class="cq-text-blue">Buka Usaha Siap Operasi Tanpa Takut Gagal.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            Mau punya bisnis laundry yang ramai tapi <strong>bingung mulai dari mana &amp; takut modal puluhan juta hangus?</strong> Jangan habiskan waktu dan biaya untuk <em>trial &amp; error</em> bertahun-tahun. Bersama <strong>Cleanique</strong>, Anda langsung memiliki paket usaha kemitraan lengkap: mesin komersial heavy-duty bergaransi, formula chemical standar pabrik Orchid Brand, SOP tuntas, bonus sistem POS kasir, dan <strong>100% keuntungan milik Anda TANPA Royalty Fee!</strong>
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> 100% Hak Milik Tanpa Bagi Hasil</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Garansi Resmi Mesin Pabrik</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Pendampingan Onsite Sampai Buka</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="#daftar-promo" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-cursor-fill" aria-hidden="true"></i> Klaim Promo Kemitraan
            </a>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Chat Konsultan Bisnis
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

        <!-- Floating Card 3 (Bottom Left): Suplai Pabrik Chemical -->
        <div class="cq-floating-card cq-float-bottom">
          <div class="cq-screen-avatar-img" style="width: 28px; height: 28px; background: #e0f2fe;">
            <i class="ri-flask-fill" style="color: var(--brand-deep); font-size: 16px;" aria-hidden="true"></i>
          </div>
          <div>
            <div style="font-size: 11px; font-weight: 700; color: var(--ink); line-height: 1.2;">Suplai Chemical Langsung Pabrik</div>
            <div style="font-size: 10px; color: var(--cq-text-muted);">PT Indotech Berkah Abadi &bull; <span style="color: var(--mint-cta); font-weight: 600;">Harga Grosir Termurah</span></div>
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
              <i class="ri-store-2-fill" aria-hidden="true"></i> Standar Outlet Kemitraan Cleanique Turnkey
            </div>
          </div>
        </div>
      </div>

      <!-- Dynamic Glass Countdown Card: Berakhir 31 Desember -->
      <div class="cq-promo-countdown-banner is-warning" data-countdown-deadline="2026-12-31T23:59:59+07:00" style="margin-top: var(--cq-sp-40);">
        <div class="cq-countdown-flex">
          <div class="cq-countdown-meta">
            <span class="cq-countdown-badge is-warning">
              <i class="ri-fire-fill" aria-hidden="true"></i> Promo Akhir Tahun Berakhir 31 Desember
            </span>
            <div class="cq-countdown-title">Subsidi Ongkir &amp; Bonus Lisensi POS 1 Tahun Penuh!</div>
            <p class="cq-countdown-subtitle">Klaim bonus chemical 100 Liter pertama &amp; pendampingan teknisi onsite hingga siap buka.</p>
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
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Peluang Emas Bisnis Primer</span>
        <h2 class="cq-section-title">Mengapa Bisnis Laundry Dikatakan "Tidak Ada Matinya"?</h2>
        <p class="cq-section-desc">
          Bukan bisnis musiman atau tren sesaat. Selama manusia masih mengenakan pakaian, kebutuhan mencuci akan selalu ada setiap hari tanpa memandang kondisi ekonomi.
        </p>
      </div>

      <div class="cq-peluang-grid-4">
        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-shirt-line"></i></div>
          <h3 class="cq-peluang-card-title">Kebutuhan Pokok Harian</h3>
          <p class="cq-peluang-card-desc">
            Pakaian kotor diproduksi setiap hari oleh setiap individu. Keluarga sibuk, mahasiswa, dan pekerja kantoran tidak sempat mencuci sendiri dan selalu membutuhkan jasa laundry.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-money-dollar-circle-line"></i></div>
          <h3 class="cq-peluang-card-title">Cash Flow Harian Nyata</h3>
          <p class="cq-peluang-card-desc">
            Bebas piutang macet berbulan-bulan. Pelanggan membayar lunas saat pakaian ditimbang atau diambil. Uang kas berputar cepat dan dapat Anda nikmati setiap hari.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-repeat-line"></i></div>
          <h3 class="cq-peluang-card-title">Tingkat Repeat Order 75%+</h3>
          <p class="cq-peluang-card-desc">
            Pelanggan mencuci secara rutin setiap 3 sampai 7 hari sekali. Begitu cocok dengan kebersihan dan keharuman outlet Anda, mereka menjadi pelanggan setia bertahun-tahun.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-percent-line"></i></div>
          <h3 class="cq-peluang-card-title">Margin Laba Bersih 50–65%</h3>
          <p class="cq-peluang-card-desc">
            Karena pasokan bahan kimia disuplai langsung dari pabrik PT Indotech Berkah Abadi tanpa perantara distributor, HPP cuci Anda sangat terjangkau dan profit bersih maksimal.
          </p>
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
        <span class="cq-badge-pill cq-badge-warning" style="margin-bottom: var(--cq-sp-12);">Hindari 4 Jebakan Fatal Pemula</span>
        <h2 class="cq-section-title">Mau Buka Sendiri Tapi Bingung &amp; Takut Gagal? Jangan Jadi Korban Trial &amp; Error!</h2>
        <p class="cq-section-desc">
          Banyak orang mencoba merintis laundry sendirian dari nol tanpa panduan. Akhirnya modal puluhan juta habis dalam 6 bulan pertama karena 4 kesalahan fatal ini:
        </p>
      </div>

      <div class="cq-grid-2">
        <div class="cq-peluang-pain-card">
          <div class="cq-peluang-pain-badge">
            <i class="ri-error-warning-fill" aria-hidden="true"></i> Risiko #1: Mesin Jebol
          </div>
          <h3 class="cq-peluang-pain-title">Tergiur Mesin Rumah Tangga Murahan (3 Bulan Jebol)</h3>
          <p class="cq-card-desc">
            Membeli mesin cuci rumahan biasa karena harganya tampak murah. Padahal mesin rumahan tidak dirancang berputar 12 jam/hari. Dalam 3 bulan dinamo terbakar, garansi hangus karena pemakaian komersial, dan outlet terpaksa tutup.
          </p>
        </div>

        <div class="cq-peluang-pain-card">
          <div class="cq-peluang-pain-badge">
            <i class="ri-error-warning-fill" aria-hidden="true"></i> Risiko #2: Chemical Abal-Abal
          </div>
          <h3 class="cq-peluang-pain-title">Trial &amp; Error Chemical Bertahun-Tahun (Baju Rusak)</h3>
          <p class="cq-card-desc">
            Mencoba meracik deterjen dan parfum sendiri atau membeli curah tanpa izin edar. Hasilnya: baju pelanggan apek saat musim hujan, serat kain sobek, atau luntur. Pelanggan komplain keras dan meminta ganti rugi.
          </p>
        </div>

        <div class="cq-peluang-pain-card">
          <div class="cq-peluang-pain-badge">
            <i class="ri-error-warning-fill" aria-hidden="true"></i> Risiko #3: Instalasi Amatir
          </div>
          <h3 class="cq-peluang-pain-title">Instalasi Pipa Amatir &amp; Bahaya Kebocoran Gas</h3>
          <p class="cq-card-desc">
            Menyuruh tukang bangunan umum memasang instalasi dryer konversi gas dan pompa air tanpa SOP sertifikasi. Tekanan air sering drop, mesin cepat berkerak, dan rawan bahaya kebakaran gas.
          </p>
        </div>

        <div class="cq-peluang-pain-card">
          <div class="cq-peluang-pain-badge">
            <i class="ri-error-warning-fill" aria-hidden="true"></i> Risiko #4: Royalti Membebani
          </div>
          <h3 class="cq-peluang-pain-title">Terjebak Franchise Lain dengan Royalty Fee Seumur Hidup</h3>
          <p class="cq-card-desc">
            Mengambil franchise merk lain yang memotong 5% - 10% omzet setiap bulan. Bekerja keras banting tulang setiap hari, tetapi sebagian besar keuntungan bersih habis disetor ke kantor pusat waralaba.
          </p>
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
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Solusi All-in-One Turnkey</span>
        <h2 class="cq-section-title">Bersama Cleanique, Anda Buka Laundry Tanpa Risiko Gagal</h2>
        <p class="cq-section-desc">
          Kami memberikan paket komplit siap buka (*Turnkey Business*) yang didukung langsung oleh produsen industri mesin dan pabrik chemical resmi PT Indotech Berkah Abadi.
        </p>
      </div>

      <div class="cq-grid-3">
        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-medal-line"></i></div>
          <h3 class="cq-peluang-card-title">100% Milik Anda (Tanpa Royalti)</h3>
          <p class="cq-peluang-card-desc">
            Cleanique adalah konsep kemitraan mandiri murni. Tidak ada biaya franchise tahunan, tidak ada potongan bagi hasil. Seluruh laba bersih dari keringat Anda 100% masuk ke kantong Anda sendiri.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-settings-4-line"></i></div>
          <h3 class="cq-peluang-card-title">Mesin Heavy Duty Bergaransi Resmi</h3>
          <p class="cq-peluang-card-desc">
            Unit washer dan dryer komersial berkualitas industri yang dirancang mampu bekerja maraton terus-menerus dengan konsumsi listrik dan gas hemat. Garansi servis dan spare part terjamin.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-community-line"></i></div>
          <h3 class="cq-peluang-card-title">Suplai Chemical Langsung Pabrik</h3>
          <p class="cq-peluang-card-desc">
            Diproduksi langsung oleh pabrik kami di Sleman. Deterjen rendah busa, pelembut &amp; parfum microcapsule wangi tahan 30 hari, serta penghilang noda darah/minyak/karat dengan harga grosir termurah.
          </p>
        </div>

        <div class="cq-peluang-solusi-card">
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-book-read-line"></i></div>
          <h3 class="cq-peluang-card-title">SOP Higienis &amp; Training Onsite</h3>
          <p class="cq-peluang-card-desc">
            Anda dan staf diajarkan teknik pencucian berbagai jenis kain, takaran chemical presisi, teknik setrika uap licin seketika, packing rapi, hingga pelayanan kasir prima sampai mandiri.
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
          <div class="cq-peluang-solusi-icon" aria-hidden="true"><i class="ri-compass-3-line"></i></div>
          <h3 class="cq-peluang-card-title">Pendampingan Sampai Hari Buka</h3>
          <p class="cq-peluang-card-desc">
            Tim teknisi dan konsultan kami mendampingi perancangan denah layout ruangan, setting pipa pembuangan, instalasi kelistrikan aman, hingga strategi promosi grand opening outlet Anda.
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
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Fasilitas &amp; Peralatan Kelas Industri</span>
        <h2 class="cq-section-title">Apa Saja yang Anda Dapatkan dalam Setiap Paket?</h2>
        <p class="cq-section-desc">Peralatan berkualitas tinggi dan siap pakai, dirakit dan diuji langsung oleh teknisi berpengalaman PT Indotech Berkah Abadi.</p>
      </div>

      <div class="cq-grid-4">
        <div class="cq-equip-card-modern">
          <div class="cq-equip-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-washer-dryer.jpg'); ?>" alt="Mesin Cuci dan Pengering Stack Komersial" loading="lazy">
          </div>
          <div class="cq-equip-body-modern">
            <h4 class="cq-equip-title-modern">Mesin Cuci &amp; Dryer Stack</h4>
            <p class="cq-equip-desc-modern">Heavy-duty drum stainless steel hemat listrik &amp; gas, kapasitas cuci sprei tebal dan bed cover.</p>
          </div>
        </div>

        <div class="cq-equip-card-modern">
          <div class="cq-equip-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-boiler-iron.jpg'); ?>" alt="Setrika Uap Boiler Gas Industri" loading="lazy">
          </div>
          <div class="cq-equip-body-modern">
            <h4 class="cq-equip-title-modern">Boiler Uap &amp; Meja Vakum</h4>
            <p class="cq-equip-desc-modern">Setrika uap licin seketika anti-gosong, lengkap dengan meja hisap uap berdaya sedot tinggi.</p>
          </div>
        </div>

        <div class="cq-equip-card-modern">
          <div class="cq-equip-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" alt="Suplai Chemical Pabrik Indotech Orchid Brand" loading="lazy">
          </div>
          <div class="cq-equip-body-modern">
            <h4 class="cq-equip-title-modern">Paket Chemical Pabrik</h4>
            <p class="cq-equip-desc-modern">Deterjen rendah busa, pelembut &amp; parfum microcapsule wangi tahan 30 hari dalam lemari.</p>
          </div>
        </div>

        <div class="cq-equip-card-modern">
          <div class="cq-equip-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>" alt="Pelatihan dan Instalasi Tim Indotech" loading="lazy">
          </div>
          <div class="cq-equip-body-modern">
            <h4 class="cq-equip-title-modern">Instalasi &amp; Training Onsite</h4>
            <p class="cq-equip-desc-modern">Pemasangan pipa standar aman dan pelatihan karyawan intensif hingga outlet siap buka mandiri.</p>
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
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Pilihan Investasi Kemitraan</span>
        <h2 class="cq-section-title">Paket Usaha Siap Buka Sesuai Budget Anda</h2>
        <p class="cq-section-desc">
          Pilih paket yang paling cocok dengan lokasi dan modal Anda. Amankan kuota subsidi ongkir &amp; bonus lisensi POS sebelum 31 Desember!
        </p>
      </div>

      <div class="cq-grid-3">
        <?php
        $paket_query = new WP_Query([
            'post_type'      => 'paket_usaha',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        ]);

        if ($paket_query->have_posts()) :
            while ($paket_query->have_posts()) : $paket_query->the_post();
                $price = get_post_meta(get_the_ID(), '_cq_paket_price', true);
                $badge = get_post_meta(get_the_ID(), '_cq_paket_badge', true);
                $featured = get_post_meta(get_the_ID(), '_cq_paket_featured', true);
                $specs_raw = get_post_meta(get_the_ID(), '_cq_paket_specs', true);
                $specs = !empty($specs_raw) ? array_filter(array_map('trim', explode("\n", $specs_raw))) : [];
        ?>
          <div class="cq-invest-card <?php echo $featured ? 'is-popular' : ''; ?>">
            <?php if (!empty($badge)) : ?>
              <div class="cq-invest-badge-pill"><?php echo esc_html($badge); ?></div>
            <?php endif; ?>
            <h3 class="cq-pricing-title"><?php the_title(); ?></h3>
            <p class="cq-card-desc"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
            <div class="cq-invest-price-val">
              <?php echo esc_html($price ?: 'Konsultasi'); ?> <small>/ modal awal</small>
            </div>
            <ul class="cq-pricing-list">
              <?php foreach ($specs as $spec) : ?>
                <li class="checked"><?php echo esc_html($spec); ?></li>
              <?php endforeach; ?>
            </ul>
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn <?php echo $featured ? 'cq-btn-primary' : 'cq-btn-outline'; ?> cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-cursor-fill" aria-hidden="true"></i> Klik Segera Daftar <?php the_title(); ?>
            </a>
          </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <!-- Fallback Default Paket 1: Starter UMKM -->
        <div class="cq-invest-card">
          <h3 class="cq-pricing-title">Paket Starter UMKM</h3>
          <p class="cq-card-desc">Cocok untuk usaha laundry pemula di area perumahan, indekos, atau kontrakan.</p>
          <div class="cq-invest-price-val">
            Rp 25 Juta-an <small>/ modal awal</small>
          </div>
          <ul class="cq-pricing-list">
            <li class="checked">1 Unit Mesin Cuci Front Load Komersial</li>
            <li class="checked">1 Unit Mesin Pengering (Dryer Konversi Gas)</li>
            <li class="checked">Paket Chemical Starter Indotech (Deterjen, Parfum, Softener)</li>
            <li class="checked">1 Set Meja Setrika Uap Boiler + Setrika</li>
            <li class="checked">Timbangan Digital + Keranjang Cucian</li>
            <li class="checked">Bahan Promosi (Spanduk, Brosur, Nota Fisik)</li>
            <li class="checked">Gratis Lisensi Aplikasi Kasir Cleanique 3 Bulan</li>
          </ul>
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
            <i class="ri-cursor-fill" aria-hidden="true"></i> Klik Segera Daftar Starter
          </a>
        </div>

        <!-- Fallback Default Paket 2: Commercial Pro (Featured) -->
        <div class="cq-invest-card is-popular">
          <div class="cq-invest-badge-pill">Paling Direkomendasikan</div>
          <h3 class="cq-pricing-title">Paket Commercial Pro</h3>
          <p class="cq-card-desc">Kapasitas menengah ideal untuk ruko strategis, pusat kampus, dan perumahan padat.</p>
          <div class="cq-invest-price-val">
            Rp 48 Juta-an <small>/ modal awal</small>
          </div>
          <ul class="cq-pricing-list">
            <li class="checked">2 Unit Mesin Cuci Front Loading Heavy Duty</li>
            <li class="checked">2 Unit Mesin Pengering Gas Komersial Stack</li>
            <li class="checked">1 Set Boiler Setrika Uap 15 Liter (2 Kepala Setrika)</li>
            <li class="checked">Paket Lengkap Chemical Orchid Brand / Cleanique (100 Liter)</li>
            <li class="checked">Kit Chemical Anti Noda Lengkap (Darah, Karat, Minyak)</li>
            <li class="checked">Instalasi Pipa Air, Filter &amp; Gas Standar Keselamatan</li>
            <li class="checked">Rak Display Laundry Besi Kokoh</li>
            <li class="checked">Gratis Lisensi Aplikasi Kasir Cleanique 1 Tahun Penuh</li>
            <li class="checked">Training Karyawan Onsite &amp; Pendampingan Buka</li>
          </ul>
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
            <i class="ri-cursor-fill" aria-hidden="true"></i> Klik Segera Daftar Commercial Pro
          </a>
        </div>

        <!-- Fallback Default Paket 3: Industrial Premium -->
        <div class="cq-invest-card">
          <h3 class="cq-pricing-title">Paket Industrial</h3>
          <p class="cq-card-desc">Untuk target pasar skala besar: hotel melati, kost eksklusif, guesthouse, dan multi-outlet.</p>
          <div class="cq-invest-price-val">
            Rp 85 Juta-an <small>/ modal awal</small>
          </div>
          <ul class="cq-pricing-list">
            <li class="checked">3+ Unit Mesin Cuci Kapasitas Besar (Bed Cover Ready)</li>
            <li class="checked">3+ Unit Mesin Pengering Kapasitas Besar</li>
            <li class="checked">Boiler Uap Industri 25 Liter + Meja Vacuum</li>
            <li class="checked">Pasokan Chemical Grosir Skala Pabrik Langsung</li>
            <li class="checked">Mesin Sealing / Packaging Otomatis</li>
            <li class="checked">Branding Interior &amp; Eksterior Lengkap (Neon Box, Meja Kasir)</li>
            <li class="checked">Sistem POS Laundry Multi-Cabang Seumur Hidup</li>
            <li class="checked">Konsultasi Bisnis Eksklusif langsung bersama Tim Ahli</li>
          </ul>
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
            <i class="ri-cursor-fill" aria-hidden="true"></i> Klik Segera Daftar Industrial
          </a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ========================================================
       8. SIMULASI PROFIT & BALIK MODAL (ROI FINTECH CALCULATOR)
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="kalkulator">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Simulasi Balik Modal (ROI)</span>
        <h2 class="cq-section-title">Hitung Potensi Keuntungan Usaha Laundry Anda</h2>
        <p class="cq-section-desc">Gunakan kalkulator interaktif di bawah ini untuk melihat proyeksi omzet bulanan dan estimasi balik modal.</p>
      </div>

      <div class="cq-calc-container">
        <!-- Preset quick buttons -->
        <div style="margin-bottom: var(--cq-sp-20);">
          <div style="font-size: var(--cq-fs-xs); font-weight: 700; color: var(--cq-text-muted); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Pilihan Cepat Target Cucian Harian:</div>
          <div class="cq-calc-preset-bar">
            <button type="button" class="cq-calc-preset-chip" data-kg="40">40 Kg / hari (Rumahan)</button>
            <button type="button" class="cq-calc-preset-chip is-active" data-kg="60">60 Kg / hari (Standar Ruko)</button>
            <button type="button" class="cq-calc-preset-chip" data-kg="100">100 Kg / hari (Ramai Kampus)</button>
            <button type="button" class="cq-calc-preset-chip" data-kg="150">150 Kg / hari (Super Outlet)</button>
          </div>
        </div>

        <div class="cq-roi-grid">
          <div>
            <div class="cq-form-group">
              <label for="calc-kg">Estimasi Cucian per Hari (Kg):</label>
              <input type="number" id="calc-kg" class="cq-input" value="60" min="10" max="500">
            </div>
            <div class="cq-form-group">
              <label for="calc-price">Tarif Laundry per Kg (Rp):</label>
              <input type="number" id="calc-price" class="cq-input" value="7000" step="500">
            </div>
            <div class="cq-form-group">
              <label for="calc-cost-pct">Estimasi Biaya Operasional (Chemical + Listrik + Gaji):</label>
              <select id="calc-cost-pct" class="cq-input">
                <option value="30">30% (Sangat Hemat - Pakai Chemical Pabrik Indotech)</option>
                <option value="35" selected>35% (Rata-rata Normal)</option>
                <option value="40">40% (Termasuk Alokasi Sewa Ruko)</option>
              </select>
            </div>
            <button type="button" id="cq-calc-btn" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block">
              <i class="ri-calculator-line" aria-hidden="true"></i> Hitung Ulang Estimasi
            </button>
          </div>

          <div class="cq-calc-result-card">
            <div class="cq-calc-result-badge">
              <i class="ri-time-line" aria-hidden="true"></i> Estimasi Balik Modal: 4 – 8 Bulan
            </div>

            <div class="cq-calc-metric-lbl">Proyeksi Omzet Bulanan (30 Hari)</div>
            <div id="calc-result-omzet" class="cq-calc-metric-val">
              Rp 12.600.000
            </div>

            <div class="cq-calc-metric-lbl">Estimasi Profit Bersih Bulanan</div>
            <div id="calc-result-profit" class="cq-calc-metric-val highlight-profit">
              Rp 8.190.000
            </div>

            <p style="font-size: 11px; color: #94A3B8; line-height: 1.5; margin: 0;">
              *Estimasi dihitung berdasarkan 30 hari operasional. Nilai riil di lapangan dapat bervariasi bergantung pada lokasi, kepadatan penduduk, dan efisiensi pengelolaan outlet Anda.
            </p>
          </div>
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
            <span class="cq-badge-pill cq-badge-warning" style="margin-bottom: 6px;">Batas Promo: 31 Desember</span>
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
            <label for="investor-paket">Pilihan Paket yang Diminati</label>
            <select id="investor-paket" class="cq-input">
              <option value="Paket Commercial Pro (Rp 48 Jt - Paling Populer)" selected>Paket Commercial Pro (Rp 48 Juta - Paling Populer)</option>
              <option value="Paket Starter UMKM (Rp 25 Jt)">Paket Starter UMKM (Rp 25 Juta)</option>
              <option value="Paket Industrial Premium (Rp 85 Jt)">Paket Industrial Premium (Rp 85 Juta)</option>
              <option value="Konsultasi Dulu Sesuai Budget">Konsultasi Dulu Sesuai Budget Saya</option>
            </select>
          </div>
          <button type="submit" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block cq-btn-lg">
            <i class="ri-cursor-fill" aria-hidden="true"></i> Klik Segera Daftar Promo Kemitraan
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
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">FAQ Kemitraan</span>
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
            Justru kemitraan Cleanique dirancang khusus untuk pemula agar tidak terjebak trial-error. Anda dan karyawan akan dilatih tuntas onsite mulai dari pengoperasian mesin, teknik spotting noda, takaran chemical, hingga SOP pelayanan pelanggan dan pembukuan kasir.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Bagaimana jaminan garansi mesin dan ketersediaan suku cadang?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Semua mesin komersial washer dan dryer mendapatkan garansi resmi serta dukungan teknisi berpengalaman dan ketersediaan suku cadang asli dari PT Indotech Berkah Abadi.
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
            <span>Bagaimana kelanjutan pasokan deterjen dan pewangi setelah buka?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Sebagai mitra resmi, Anda mendapatkan hak akses harga khusus pabrik termurah langsung dari pabrik PT Indotech Berkah Abadi di Sleman untuk deterjen, softener microcapsule, parfum, dan cairan anti-noda Orchid Brand.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       11. FINAL BANNER CTA (Promo Akhir Tahun)
       ======================================================== -->
  <section class="cq-section cq-section-dark cq-banner-cta-section">
    <div class="cq-container cq-section-header">
      <div class="cq-badge-pill cq-badge-warning" style="margin-bottom: var(--cq-sp-16);">
        <i class="ri-time-fill" aria-hidden="true"></i> Kuota Promo Kemitraan Berakhir 31 Desember
      </div>
      <h2 class="cq-banner-cta-title">
        Siap Membuka Usaha Laundry Sukses Anda?
      </h2>
      <p class="cq-banner-cta-desc">
        Jangan biarkan rasa takut gagal dan kebingungan menunda mimpi Anda. Bergabunglah bersama puluhan mitra sukses Cleanique dan PT Indotech Berkah Abadi hari ini.
      </p>
      <div class="cq-banner-cta-actions">
        <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-cursor-fill" aria-hidden="true"></i> Klik Segera Daftar via WhatsApp
        </a>
        <a href="#daftar-promo" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
          <i class="ri-file-text-line" aria-hidden="true"></i> Minta Brosur &amp; Proposal Lengkap
        </a>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
