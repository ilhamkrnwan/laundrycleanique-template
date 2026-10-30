<?php
/**
 * Template Name: Company Profile - Tentang Kami
 * Description: Halaman Profil Perusahaan PT Indotech Berkah Abadi (Cleanique Laundry)
 * Modern Payno Fintech Aesthetic & High-Credibility Layout
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
$proposal_pdf_url = get_option('cleanique_kemitraan_proposal_url');
$office_addr = get_theme_mod('cleanique_office_address', 'Jalan Jongke Kidul Tengah No. 30, RT.01/RW.23, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285');
$wa_number = get_theme_mod('cleanique_wa_number', '6285600061005');
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
            Profil Perusahaan
          </div>
          <h1 class="cq-payno-heading">
            Membangun Ekosistem Laundry Mandiri, <span class="cq-text-blue">Dengan Riset Pabrik, Mesin Tangguh &amp; Kasir Cerdas.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            <strong>Cleanique Laundry</strong> adalah produk inovasi dan unit bisnis terpadu dari <strong>PT Indotech Berkah Abadi</strong> (manufaktur biang sabun dan paket bahan laundry, serta penyedia mesin laundry di Sleman, D.I. Yogyakarta). Kami mendedikasikan fasilitas riset, bengkel rekayasa mesin, dan tim IT in-house untuk melahirkan ribuan pengusaha laundry yang mandiri, efisien, dan 100% bebas dari royalti bulanan.
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Pabrik Biang Sabun &amp; Bahan</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Bahan Bersertifikat Halal</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Legalitas Resmi PT</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> 100% Tanpa Royalti</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Showroom Sleman DIY</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
            </a>
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill">
              Pilihan Paket
            </a>
          </div>
        </div>
      </div>

      <!-- Visual Showcase Stage with 3 Floating Glass Badges -->
      <div class="cq-peluang-stage" style="margin-top: var(--cq-sp-40);">
        <div class="cq-peluang-frame">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/09-pabrik-kimia-sendiri-sleman.webp'); ?>" 
               alt="Pusat Layanan Teknis, Showroom Mesin, dan Tim Konsultan PT Indotech Berkah Abadi Sleman" 
               loading="lazy">
        </div>

        <!-- Floating Glass Card 1 (Top Left) -->
        <div class="cq-peluang-float-card float-left" style="top: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(0, 119, 182, 0.12); color: var(--brand-deep);" aria-hidden="true">
            <i class="ri-flask-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 600; color: var(--ink);">Pabrik Biang Sabun Sendiri</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">Formula Pekat, Bersertifikat Halal</div>
          </div>
        </div>

        <!-- Floating Glass Card 2 (Bottom Right) -->
        <div class="cq-peluang-float-card float-right" style="bottom: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(16, 185, 129, 0.14); color: var(--mint-cta);" aria-hidden="true">
            <i class="ri-shield-check-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 600; color: var(--ink);">Badan Hukum Resmi PT</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">PT Indotech Berkah Abadi Sleman</div>
          </div>
        </div>

        <!-- Floating Glass Card 3 (Bottom Left) -->
        <div class="cq-peluang-float-card float-left" style="bottom: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(245, 158, 11, 0.14); color: #d97706;" aria-hidden="true">
            <i class="ri-hand-coin-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 600; color: var(--ink);">100% Hak Milik Mitra</div>
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
        <h2 class="cq-section-title">Mengapa Bermitra dengan <span class="cq-text-blue">Cleanique Laundry?</span></h2>
        <p class="cq-section-desc">
          Kami memegang teguh prinsip kemitraan yang jujur, saling menguntungkan, dan mengutamakan ketahanan bisnis jangka panjang mitra.
        </p>
      </div>

      <div class="cq-peluang-grid-4">
        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-blue" aria-hidden="true"><i class="ri-hand-coin-line"></i></div>
          <h3 class="cq-peluang-card-title">Amanah &amp; Bebas Royalti</h3>
          <p class="cq-peluang-card-desc">
            Sistem kepemilikan 100% mandiri milik Anda. Tidak ada potongan bagi hasil omzet bulanan, iuran franchise berkala, atau ikatan yang membebani mitra.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
            <span>100% Hak Milik Mitra</span>
          </div>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-teal" aria-hidden="true"><i class="ri-flask-line"></i></div>
          <h3 class="cq-peluang-card-title">Pabrik &amp; Formulasi Sendiri</h3>
          <p class="cq-peluang-card-desc">
            Bukan perantara. Didukung langsung oleh pabrik biang sabun PT Indotech Berkah Abadi di Sleman, DIY sehingga suplai bahan dan parfum selalu stabil dengan harga termurah. Bahan bersertifikat halal.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
            <span>Suplai Langsung Pabrik Sleman</span>
          </div>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-indigo" aria-hidden="true"><i class="ri-code-box-line"></i></div>
          <h3 class="cq-peluang-card-title">Teknologi POS In-House</h3>
          <p class="cq-peluang-card-desc">
            Aplikasi kasir laundry Cleanique dirancang langsung oleh tim pengembang kami, dilengkapi pengiriman nota otomatis WhatsApp 1 detik dan pelacakan live status.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
            <span>Nota WA Otomatis &amp; Real-time</span>
          </div>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap is-amber" aria-hidden="true"><i class="ri-tools-line"></i></div>
          <h3 class="cq-peluang-card-title">Surveyor, Trainer &amp; Instalasi</h3>
          <p class="cq-peluang-card-desc">
            Pendampingan surveyor untuk survei kelayakan lokasi, tim instalasi pipa &amp; kelistrikan, pelatihan trainer onsite 5 hari 4 malam, serta konsultasi teknis tanpa batas waktu.
          </p>
          <div class="cq-peluang-card-meta">
            <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
            <span>Unit Baru &amp; Konsultasi Teknis</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. STANDARDISASI ALUR PENDAMPINGAN & SOP KEMITRAAN (Vertical Timeline)
       ======================================================== -->
  <section class="cq-timeline-section" id="alur-pendampingan">
    <div class="cq-timeline-watermark" aria-hidden="true">SOP ROADMAP</div>
    
    <div class="cq-container">
      <div style="text-align: center; max-width: 720px; margin: 0 auto; position: relative; z-index: 2;">
        <span class="cq-badge-clean" style="margin-bottom: var(--cq-sp-12);">Metodologi SOP</span>
        <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-12);">
          Alur Pendampingan Kemitraan Menuju Outlet Mandiri
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: #475569; line-height: 1.65; margin: 0;">
          Anda tidak memulai bisnis sendirian. Tim insinyur mesin, ahli kimia deterjen, dan pelatih operasional PT Indotech Berkah Abadi mengawal setiap tahap secara terukur.
        </p>
      </div>

      <div class="cq-timeline-wrap">
        <div class="cq-timeline-track" aria-hidden="true"></div>

        <!-- Langkah 1: Konsultasi -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot"></span> Tahap 01
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box">
                <i class="ri-chat-smile-3-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Konsultasi Rencana Bisnis &amp; Rekomendasi Paket</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 1 – 2 Hari
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Diskusi menyeluruh bersama konsultan bisnis mengenai rencana usaha, analisis modal investasi, karakteristik target pelanggan di sekitar calon ruko, serta pemilihan paket mesin yang paling menguntungkan.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Analisis Anggaran Investasi</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Karakteristik Wilayah Pasar</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Rekomendasi Paket Mesin</span>
            </div>
          </div>
        </div>

        <!-- Langkah 2: Survei -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot dot-mint"></span> Tahap 02
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #059669; color: #059669;">
                <i class="ri-map-pin-user-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Survei Lokasi, Kelistrikan &amp; Uji Kualitas Air</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 2 – 4 Hari Kerja
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Audit teknis lokasi ruko/kios: uji kelayakan tekanan debit air, kadar mineral TDS air tanah/PAM, daya listrik PLN (kVA), dan jalur pembuangan ventilasi dryer gas agar ramah lingkungan dan memenuhi standar keselamatan.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Audit Kelistrikan PLN</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Uji TDS &amp; Debit Air</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Zonasi Ruko &amp; Parkir</span>
            </div>
          </div>
        </div>

        <!-- Langkah 3: Perancangan -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot dot-blue"></span> Tahap 03
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #0284c7; color: #0284c7;">
                <i class="ri-layout-masonry-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Perancangan Blueprint Tata Letak Higienis &amp; Plumbing</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 3 – 5 Hari Kerja
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Pembuatan denah kerja tata letak outlet 2D/3D (pemisahan alur kerja cucian kotor dan bersih higienis), skema plumbing pipa PVC tebal, manifold gas LPG otomatis dengan safety valve, dan penataan area setrika uap ergonomis.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Desain Alur Kerja Higienis</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Plumbing Anti-Bocor Terpadu</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Manifold Gas Standar Industri</span>
            </div>
          </div>
        </div>

        <!-- Langkah 4: Setup -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot" style="background: #0284c7;"></span> Tahap 04
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #0284c7; color: #0284c7;">
                <i class="ri-truck-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Pengiriman Mesin, Instalasi &amp; Commissioning Test</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 5 – 7 Hari Kerja
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Ekspedisi mesin cuci dan pengering ke lokasi mitra. Tim instalasi PT Indotech melakukan perakitan unit, pengujian fungsi, pengujian suhu panas pengering, serta uji kebocoran gas menyeluruh sebelum diserahterimakan.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Ekspedisi Berasuransi Penuh</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Kalibrasi Mesin &amp; Boiler Uap</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Sertifikat Uji Laik Operasi</span>
            </div>
          </div>
        </div>

        <!-- Langkah 5: Pelatihan -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot" style="background: #8b5cf6;"></span> Tahap 05
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #7c3aed; color: #7c3aed;">
                <i class="ri-user-star-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Pelatihan Karyawan, SOP Pencucian &amp; Setup Kasir POS</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 2 – 3 Hari Onsite
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Pelatihan intensif bagi operator dan owner: teknik identifikasi serat kain, takaran bahan presisi, teknik spotting noda membandel (darah, minyak, jamur), teknik setrika uap cepat, serta pengoperasian sistem POS Cleanique.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Modul Kimia &amp; Penghilang Noda</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> SOP Pelayanan Kasir Ramah</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Dashboard Keuangan di Smartphone Owner</span>
            </div>
          </div>
        </div>

        <!-- Langkah 6: Grand Opening -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot" style="background: #10b981;"></span> Tahap 06
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #059669; color: #059669;">
                <i class="ri-rocket-2-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Grand Opening &amp; Pendampingan Pemasaran Berkelanjutan</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Pasca Buka: Pendampingan Seumur Hidup
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Peluncuran promosi opening (diskon kiloan / promo cuci gratis perdana), setup titik Google Bisnis Profil (SEO lokal), serta pemantauan operasional hingga outlet stabil menghasilkan laba bersih mandiri.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Desain Spanduk &amp; Flyer Promo</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Setup Google Profil Bisnis (SEO Lokal)</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Konsultasi Tim Helpdesk Seumur Hidup</span>
            </div>
          </div>
        </div>
      </div>

      <div class="cq-timeline-cta-row">
        <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Kemitraan
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       6. LEGALITAS BADAN HUKUM & KANTOR PUSAT SLEMAN
       ======================================================== -->
  <section class="cq-section" id="legalitas">
    <div class="cq-container">
      <div class="cq-visual-split" style="align-items: center;">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/05-bahan-kimia-laundry-kualitas-pabrik.webp'); ?>"
               alt="Laboratorium dan Produk Pabrik PT Indotech Berkah Abadi Sleman"
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-16);">
            Badan Hukum Resmi, Aman &amp; Berkelanjutan
          </h2>
          <p style="color: var(--cq-text-muted); line-height: 1.7; margin-bottom: var(--cq-sp-20);">
            Bisnis kami beroperasi secara legal dan transparan di bawah payung hukum <strong>PT Indotech Berkah Abadi</strong>. Seluruh kontrak kemitraan paket usaha, faktur pengadaan mesin komersial, dan lisensi software kasir memiliki dasar hukum yang sah untuk memberikan rasa aman dan ketenangan bagi investasi masa depan Anda.
          </p>

          <div style="background: var(--sky-50); border: 1.5px solid var(--sky-200); border-radius: 20px; padding: var(--cq-sp-20); margin-bottom: var(--cq-sp-24);">
            <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--brand-deep); letter-spacing: 0.05em; margin-bottom: 4px;">
              Entitas Hukum Resmi Terdaftar:
            </div>
            <div style="font-family: var(--cq-font-heading); font-size: 1.15rem; font-weight: 500; color: var(--cq-dark-navy); margin-bottom: 6px;">
              PT Indotech Berkah Abadi
            </div>
            <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.6;">
              <i class="ri-map-pin-line" style="color: var(--brand-deep);" aria-hidden="true"></i> <?php echo nl2br(esc_html($office_addr)); ?>
            </p>
          </div>

          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
              Kontak Workshop
            </a>
            <a href="https://indotech.id" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              Situs Induk
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
        <h2 class="cq-section-title">Pilih Solusi yang Sesuai dengan Kebutuhan Anda</h2>
        <p class="cq-section-desc">Mulai usaha laundry baru atau digitalisasikan operasional outlet yang sudah berjalan bersama Cleanique.</p>
      </div>

      <div class="cq-portal-gateway-grid">
        <!-- Gateway Card 1 -->
        <div class="cq-portal-gateway-card" onclick="location.href='<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>'" role="button" tabindex="0" onkeypress="if(event.key==='Enter')location.href='<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>'">
          <div class="cq-portal-gateway-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/02-paket-usaha-laundry-siap-buka.webp'); ?>" alt="Paket Usaha Laundry Siap Operasi" loading="lazy">
            <div class="cq-portal-gateway-tag is-primary">
              Peluang Usaha
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
              Solusi paket lengkap mulai dari mesin cuci &amp; pengering baru, pasokan biang sabun pabrik, hingga pelatihan trainer onsite 5 hari 4 malam sampai tuntas.
            </p>
            <div class="cq-portal-gateway-action-row">
              <span class="cq-btn cq-btn-primary cq-btn-pill cq-btn-sm">
                Lihat Paket
              </span>
            </div>
          </div>
        </div>

        <!-- Gateway Card 2 -->
        <div class="cq-portal-gateway-card" onclick="location.href='<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>'" role="button" tabindex="0" onkeypress="if(event.key==='Enter')location.href='<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>'">
          <div class="cq-portal-gateway-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/03-smart-laundry-management-pos.webp'); ?>" alt="Aplikasi Kasir POS Laundry Cleanique" loading="lazy">
            <div class="cq-portal-gateway-tag is-accent">
              Smart POS
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
                Coba Gratis
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- ========================================================
       7. CLOSING BANNER CTA (Corporate Showcase Bento)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section" id="kontak-cta">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <div class="cq-banner-cta-grid">

          <!-- Left Column: Value Prop & Actions -->
          <div class="cq-banner-cta-left">
            <div class="cq-banner-cta-badges">
              <span class="cq-badge-pill cq-badge-accent">
                Legalitas Resmi PT
              </span>
              <span class="cq-badge-pill cq-badge-success">
                Pabrik Sleman
              </span>
            </div>

            <h2 class="cq-banner-cta-title">
              Siap Bermitra dengan Cleanique Laundry?
            </h2>

            <p class="cq-banner-cta-desc">
              Diskusikan potensi lokasi, analisis kebutuhan mesin, dan survei workshop kami bersama tim ahli PT Indotech Berkah Abadi.
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
              <span><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Badan Hukum PT Resmi</span>
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
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/09-pabrik-kimia-sendiri-sleman.webp'); ?>" 
                   alt="Pabrik dan Showroom Cleanique PT Indotech Berkah Abadi" 
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

<?php
get_footer();
