<?php
/**
 * Template Name: Company Profile - Tentang Kami
 * Description: Halaman Profil Perusahaan PT Indotech Berkah Abadi (Cleanique Laundry)
 * Modern Payno Fintech Aesthetic & High-Credibility Layout
 *
 * @package Cleanique
 */

get_header();
$wa_url = cleanique_get_whatsapp_url('general');
$office_addr = get_theme_mod('cleanique_office_address', 'PT Indotech Berkah Abadi - Sleman, D.I. Yogyakarta, Indonesia');
$wa_number = get_theme_mod('cleanique_wa_number', '6281234567890');
?>

<main id="main-content" class="cq-about-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Payno Modern Split Layout)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero" id="profil">
    <div class="cq-container">
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            <i class="ri-building-line" style="color: var(--mint-cta); font-size: 15px;" aria-hidden="true"></i>
            Profil Perusahaan &bull; PT Indotech Berkah Abadi
          </div>
          <h1 class="cq-payno-heading">
            Membangun Ekosistem Laundry Mandiri, <span class="cq-text-blue">Dengan Riset Pabrik, Mesin Tangguh &amp; Kasir Cerdas.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            <strong>Cleanique Laundry</strong> adalah produk inovasi dan unit bisnis terpadu dari <strong>PT Indotech Berkah Abadi</strong> (manufaktur bahan kimia industri, *Orchid Brand*, dan penyedia mesin laundry terkemuka di Sleman, D.I. Yogyakarta). Kami mendedikasikan fasilitas riset, bengkel rekayasa mesin, dan tim IT in-house untuk melahirkan ribuan pengusaha laundry yang mandiri, efisien, dan 100% bebas dari royalti bulanan.
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Pabrik Chemical Sendiri</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Legalitas Resmi PT</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> 100% Tanpa Royalti</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Showroom Sleman DIY</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Tim Ahli
            </a>
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-store-2-line" aria-hidden="true"></i> Paket Usaha Siap Buka
            </a>
            <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill">
              <i class="ri-map-pin-line" aria-hidden="true"></i> Lokasi Kantor &amp; Showroom
            </a>
          </div>
        </div>
      </div>

      <!-- Visual Showcase Stage with 3 Floating Glass Badges -->
      <div class="cq-peluang-stage" style="margin-top: var(--cq-sp-40);">
        <div class="cq-peluang-frame">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>" 
               alt="Pusat Layanan Teknis, Showroom Mesin, dan Tim Konsultan PT Indotech Berkah Abadi Yogyakarta" 
               loading="lazy">
        </div>

        <!-- Floating Glass Card 1 (Top Left) -->
        <div class="cq-peluang-float-card float-left" style="top: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(0, 119, 182, 0.12); color: var(--brand-deep);" aria-hidden="true">
            <i class="ri-factory-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 800; color: var(--ink);">Pabrik Chemical Sendiri</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">Formulasi Standar Orchid Brand</div>
          </div>
        </div>

        <!-- Floating Glass Card 2 (Bottom Right) -->
        <div class="cq-peluang-float-card float-right" style="bottom: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(16, 185, 129, 0.14); color: var(--mint-cta);" aria-hidden="true">
            <i class="ri-shield-check-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 800; color: var(--ink);">Badan Hukum Resmi PT</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">PT Indotech Berkah Abadi Sleman</div>
          </div>
        </div>

        <!-- Floating Glass Card 3 (Bottom Left) -->
        <div class="cq-peluang-float-card float-left" style="bottom: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(245, 158, 11, 0.14); color: #d97706;" aria-hidden="true">
            <i class="ri-hand-coin-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 800; color: var(--ink);">100% Hak Milik Mitra</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">Bebas Royalti &amp; Franchise Fee</div>
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
              <filter id="cq-about-arch-blur-outer" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="7" />
              </filter>
              <filter id="cq-about-arch-blur-mid" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5" />
              </filter>
              <filter id="cq-about-arch-blur-core" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" />
              </filter>
            </defs>
            <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" filter="url(#cq-about-arch-blur-outer)" />
            <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" filter="url(#cq-about-arch-blur-mid)" />
            <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" filter="url(#cq-about-arch-blur-core)" />
          </svg>
        </div>

        <h2 class="cq-statement-text">
          Kemitraan yang Adil &amp; Berkelanjutan.<br class="cq-hide-mobile">
          Keberhasilan Mitra Adalah <span class="cq-text-blue">Prioritas Utama Kami</span>—<br class="cq-hide-mobile">
          Tanpa Potongan Bagi Hasil Bulanan, 100% Keuntungan Milik Anda.
        </h2>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. VISI & MISI PERUSAHAAN (Payno Modern 2-Grid)
       ======================================================== -->
  <section class="cq-section" id="visi-misi">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Arah &amp; Tujuan Kami</span>
        <h2 class="cq-section-title">Visi &amp; Misi PT Indotech Berkah Abadi</h2>
        <p class="cq-section-desc">
          Landasan komitmen kami untuk menghadirkan solusi rantai pasok dan teknologi laundry yang tangguh bagi wirausahawan binatu di seluruh Indonesia.
        </p>
      </div>

      <div class="cq-grid-2">
        <!-- Visi Card -->
        <div class="cq-peluang-card" style="border-top: 4px solid var(--cq-primary); padding: clamp(28px, 4vw, 36px);">
          <div class="cq-peluang-icon-wrap" style="background: rgba(0, 119, 182, 0.12); color: var(--brand-deep);" aria-hidden="true">
            <i class="ri-focus-3-line"></i>
          </div>
          <h3 class="cq-peluang-card-title" style="font-size: var(--cq-fs-xl);">Visi Perusahaan</h3>
          <p class="cq-peluang-card-desc" style="font-size: 1.05rem; line-height: 1.8; color: var(--ink);">
            Menjadi ekosistem penyedia solusi bisnis laundry paling terpercaya, inovatif, dan berkeadilan di Indonesia, yang mampu melahirkan wirausahawan binatu mandiri, berdaya saing tinggi, dan berkelanjutan di setiap pelosok nusantara.
          </p>
          <div style="margin-top: var(--cq-sp-20); padding-top: var(--cq-sp-16); border-top: 1px solid var(--cq-border-light); font-size: 12px; font-weight: 700; color: var(--brand-deep); display: flex; align-items: center; gap: 6px;">
            <i class="ri-compass-3-line" aria-hidden="true"></i> Panduan Jangka Panjang 2026–2030
          </div>
        </div>

        <!-- Misi Card -->
        <div class="cq-peluang-card" style="border-top: 4px solid var(--cq-accent); padding: clamp(28px, 4vw, 36px);">
          <div class="cq-peluang-icon-wrap" style="background: rgba(16, 185, 129, 0.14); color: var(--mint-cta);" aria-hidden="true">
            <i class="ri-rocket-2-line"></i>
          </div>
          <h3 class="cq-peluang-card-title" style="font-size: var(--cq-fs-xl);">Misi Perusahaan</h3>
          <ul class="cq-portal-gateway-bullets" style="margin: 0; gap: 12px;">
            <li>
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
              <div><strong>Membuka Akses Bisnis:</strong> Memfasilitasi pemula memiliki paket usaha laundry siap beroperasi dengan modal transparan dan 100% tanpa royalti fee.</div>
            </li>
            <li>
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
              <div><strong>Efisiensi HPP Pabrikan:</strong> Menyediakan pasokan deterjen, pelembut, dan parfum standar industri berkualitas tinggi langsung dari fasilitas pabrik Sleman.</div>
            </li>
            <li>
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
              <div><strong>Digitalisasi UMKM:</strong> Menghadirkan aplikasi kasir POS cloud cerdas yang otomatis mengirim nota WhatsApp dan melacak cucian real-time.</div>
            </li>
            <li>
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
              <div><strong>Edukasi Berkelanjutan:</strong> Mendampingi mitra melalui SOP teknis pencucian, pelatihan karyawan, dan manajemen keuangan hingga outlet mandiri.</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       4. 4 PILAR NILAI & KREDIBILITAS KEMITRAAN
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="nilai-perusahaan">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Nilai &amp; Komitmen</span>
        <h2 class="cq-section-title">Mengapa Bermitra dengan Cleanique by Indotech?</h2>
        <p class="cq-section-desc">
          Kami memegang teguh prinsip kemitraan yang jujur, saling menguntungkan, dan mengutamakan ketahanan bisnis jangka panjang mitra.
        </p>
      </div>

      <div class="cq-peluang-grid-4">
        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-hand-coin-line"></i></div>
          <h3 class="cq-peluang-card-title">Amanah &amp; Bebas Royalti</h3>
          <p class="cq-peluang-card-desc">
            Sistem kepemilikan 100% mandiri milik Anda. Tidak ada potongan bagi hasil omzet bulanan, iuran franchise berkala, atau ikatan yang membebani mitra.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-factory-line"></i></div>
          <h3 class="cq-peluang-card-title">Pabrik &amp; Formulasi Sendiri</h3>
          <p class="cq-peluang-card-desc">
            Bukan perantara. Didukung langsung oleh pabrik chemical PT Indotech Berkah Abadi di Sleman, DIY sehingga suplai deterjen dan parfum selalu stabil dengan harga termurah.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-code-box-line"></i></div>
          <h3 class="cq-peluang-card-title">Teknologi POS In-House</h3>
          <p class="cq-peluang-card-desc">
            Aplikasi kasir laundry Cleanique dirancang langsung oleh tim pengembang kami, dilengkapi pengiriman nota otomatis WhatsApp 1 detik dan pelacakan live status.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-tools-line"></i></div>
          <h3 class="cq-peluang-card-title">Teknisi &amp; Garansi Resmi</h3>
          <p class="cq-peluang-card-desc">
            Dukungan teknisi ahli berpengalaman untuk survei lokasi, instalasi pipa &amp; kelistrikan, garansi suku cadang mesin komersial, dan konsultasi operasional 24/7.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. LEGALITAS BADAN HUKUM & KANTOR PUSAT SLEMAN
       ======================================================== -->
  <section class="cq-section" id="legalitas">
    <div class="cq-container">
      <div class="cq-visual-split" style="align-items: center;">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>"
               alt="Laboratorium dan Produk Pabrik PT Indotech Berkah Abadi Sleman"
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Kepastian Hukum &amp; Legalitas</span>
          <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.4rem + 1.5vw, 2.6rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.2; margin-bottom: var(--cq-sp-16);">
            Badan Hukum Resmi, Aman &amp; Berkelanjutan
          </h2>
          <p style="color: var(--cq-text-muted); line-height: 1.7; margin-bottom: var(--cq-sp-20);">
            Bisnis kami beroperasi secara legal dan transparan di bawah payung hukum <strong>PT Indotech Berkah Abadi</strong>. Seluruh kontrak kemitraan paket usaha, faktur pengadaan mesin komersial, dan lisensi software kasir memiliki dasar hukum yang sah untuk memberikan rasa aman dan ketenangan bagi investasi masa depan Anda.
          </p>

          <div style="background: var(--sky-50); border: 1.5px solid var(--sky-200); border-radius: 20px; padding: var(--cq-sp-20); margin-bottom: var(--cq-sp-24);">
            <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--brand-deep); letter-spacing: 0.05em; margin-bottom: 4px;">
              Entitas Hukum Resmi Terdaftar:
            </div>
            <div style="font-family: var(--cq-font-heading); font-size: 1.15rem; font-weight: 800; color: var(--cq-dark-navy); margin-bottom: 6px;">
              PT Indotech Berkah Abadi
            </div>
            <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.6;">
              <i class="ri-map-pin-line" style="color: var(--brand-deep);" aria-hidden="true"></i> <?php echo nl2br(esc_html($office_addr)); ?>
            </p>
          </div>

          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-map-pin-line" aria-hidden="true"></i> Kontak &amp; Lokasi Workshop
            </a>
            <a href="https://indotech.id" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-external-link-line" aria-hidden="true"></i> Situs Induk Indotech.id
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       6. DUAL GATEWAY TO SERVICES (Paket Usaha vs POS App)
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="layanan-kami">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">2 Layanan Utama</span>
        <h2 class="cq-section-title">Pilih Solusi yang Sesuai dengan Kebutuhan Anda</h2>
        <p class="cq-section-desc">Mulai usaha laundry baru atau digitalisasikan operasional outlet yang sudah berjalan bersama Cleanique.</p>
      </div>

      <div class="cq-portal-gateway-grid">
        <!-- Gateway Card 1 -->
        <div class="cq-portal-gateway-card" onclick="location.href='<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>'" role="button" tabindex="0" onkeypress="if(event.key==='Enter')location.href='<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>'">
          <div class="cq-portal-gateway-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="Paket Usaha Laundry Siap Operasi" loading="lazy">
            <div class="cq-portal-gateway-tag is-primary">
              <i class="ri-store-2-line" aria-hidden="true"></i> Peluang Usaha Turnkey &bull; 100% Milik Anda
            </div>
          </div>
          <div class="cq-portal-gateway-body">
            <div class="cq-portal-gateway-header-row">
              <div class="cq-portal-gateway-icon icon-primary" aria-hidden="true"><i class="ri-store-2-fill"></i></div>
              <div>
                <h3 class="cq-portal-gateway-title">Paket Usaha Laundry Siap Buka</h3>
                <span style="font-size: 11px; color: var(--brand-deep); font-weight: 700;">Tanpa Royalti Fee Bulanan</span>
              </div>
            </div>
            <p class="cq-portal-gateway-desc">
              Solusi paket lengkap mulai dari mesin cuci &amp; dryer komersial heavy-duty bergaransi resmi, pasokan deterjen pabrik awal, hingga pelatihan SOP karyawan onsite sampai tuntas.
            </p>
            <div class="cq-portal-gateway-action-row">
              <span class="cq-btn cq-btn-primary cq-btn-pill cq-btn-sm">
                Lihat Detail Paket Usaha <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>

        <!-- Gateway Card 2 -->
        <div class="cq-portal-gateway-card" onclick="location.href='<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>'" role="button" tabindex="0" onkeypress="if(event.key==='Enter')location.href='<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>'">
          <div class="cq-portal-gateway-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" alt="Aplikasi Kasir POS Laundry Cleanique" loading="lazy">
            <div class="cq-portal-gateway-tag is-accent">
              <i class="ri-smartphone-line" aria-hidden="true"></i> Digitalisasi POS &bull; Free Trial 7 Hari
            </div>
          </div>
          <div class="cq-portal-gateway-body">
            <div class="cq-portal-gateway-header-row">
              <div class="cq-portal-gateway-icon icon-accent" aria-hidden="true"><i class="ri-smartphone-fill"></i></div>
              <div>
                <h3 class="cq-portal-gateway-title">Software Kasir POS Laundry Cloud</h3>
                <span style="font-size: 11px; color: #059669; font-weight: 700;">Nota WhatsApp Otomatis &bull; Anti Kasir Curang</span>
              </div>
            </div>
            <p class="cq-portal-gateway-desc">
              Tinggalkan nota manual! Kirim nota digital otomatis ke WhatsApp pelanggan, berikan link live tracking status cucian, dan pantau omzet dari smartphone kapan saja.
            </p>
            <div class="cq-portal-gateway-action-row">
              <span class="cq-btn cq-btn-accent cq-btn-pill cq-btn-sm">
                Coba Gratis 7 Hari <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       7. CLOSING BANNER CTA
       ======================================================== -->
  <section class="cq-section cq-section-dark cq-banner-cta-section" id="kontak-cta">
    <div class="cq-container cq-section-header">
      <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.12); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.25);">
        <i class="ri-customer-service-2-line" aria-hidden="true"></i> Pusat Informasi &amp; Kemitraan Resmi
      </div>
      <h2 class="cq-banner-cta-title">
        Siap Membuka Usaha Laundry Mandiri Bersama Kami?
      </h2>
      <p class="cq-banner-cta-desc">
        Diskusikan potensi lokasi, kalkulasi modal, dan paket mesin terbaik bersama tim konsultan resmi <strong>PT Indotech Berkah Abadi</strong> di Sleman, D.I. Yogyakarta.
      </p>
      <div class="cq-banner-cta-actions">
        <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Chat WhatsApp Konsultan Kami
        </a>
        <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
          <i class="ri-map-pin-line" aria-hidden="true"></i> Kunjungi Showroom Sleman DIY
        </a>
        <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
          Pelajari Paket Usaha
        </a>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
