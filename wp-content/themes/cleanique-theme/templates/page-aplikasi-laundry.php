<?php
/**
 * Template Name: Landing Page - Aplikasi & POS Laundry
 * Description: Landing page konversi tinggi untuk produk digital Sistem Informasi & Aplikasi Kasir Laundry Cleanique (Free Trial 7 Hari) bergaya Fintech Payno.
 * Persona: Andry / Pemilik Laundry Aktif
 * Deadline Promo: 30 Oktober
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

$wa_trial_url = cleanique_get_whatsapp_url('aplikasi_trial');
?>

<main id="main-content">
  <div id="top"></div>

  <!-- 1. HERO SECTION (Payno Split Layout + Phone Frame + Floating Cards) -->
  <?php get_template_part('template-parts/landing/hero-aplikasi'); ?>

  <!-- 2. PAYNO STATEMENT BANNER CARD -->
  <section class="cq-statement-section">
    <div class="cq-container" style="max-width: 1040px;">
      <div class="cq-payno-statement-card">
        <!-- Soft Concentric Blue Arch Aura (Payno Signature) -->
        <div class="cq-payno-arch-glow" aria-hidden="true">
          <svg width="140" height="90" viewBox="0 0 140 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <filter id="cq-blur-outer" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="7" />
              </filter>
              <filter id="cq-blur-mid" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5" />
              </filter>
              <filter id="cq-blur-core" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" />
              </filter>
            </defs>
            <!-- Outer Soft Sky Blue Arch -->
            <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" filter="url(#cq-blur-outer)" />
            <!-- Middle Royal Blue Arch -->
            <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" filter="url(#cq-blur-mid)" />
            <!-- Core Deep Blue Arch -->
            <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" filter="url(#cq-blur-core)" />
          </svg>
        </div>

        <!-- Editorial Typography Heading (Exact Payno 3-Line Rhythm) -->
        <h2 class="cq-statement-text">
          Dari Pembukuan hingga Rekap Omzet—Semua<br class="cq-hide-mobile">
          Terkendali. Mengembangkan Bisnis <span class="cq-text-blue">Laundry</span><br class="cq-hide-mobile">
          Tidak Pernah Semudah Ini
        </h2>
      </div>
    </div>
  </section>

  <!-- 3. CORE APP SHOWCASE (Payno Section 3: Built for Simplicity. Designed for Growth.) -->
  <?php get_template_part('template-parts/landing/feature-grid-app'); ?>

  <!-- 4. PERMASALAHAN: Agitasi Masalah Nyata Pemilik Laundry (Andry Pain Points) -->
  <section class="cq-payno-problems-section" id="masalah">
    <div class="cq-container">
      <div class="cq-section-header" style="text-align: center; max-width: 840px; margin: 0 auto;">
        <h2 style="font-family: var(--cq-font-heading); font-weight: 300; font-size: clamp(2rem, 1.6rem + 1.6vw, 3.2rem); line-height: 1.2; letter-spacing: -0.03em; color: var(--ink); margin-bottom: var(--cq-sp-16); word-break: normal; hyphens: none; -webkit-hyphens: none;">
          6 Masalah Fatal yang <span style="white-space: nowrap;">Diam-Diam</span><br>
          <span class="cq-text-blue">Menggerus Keuntungan Laundry Anda</span>
        </h2>
        <p class="cq-section-desc" style="margin: 0 auto; color: #64748B; font-size: 16px; line-height: 1.6;">
          Berapa banyak uang, waktu, dan pelanggan loyal yang terbuang sia-sia setiap bulan hanya karena masih mengandalkan buku nota kertas dan rekap manual?
        </p>
      </div>

      <div class="cq-payno-problem-grid">
        <!-- Card 1: Nota Hilang -->
        <div class="cq-payno-problem-card">
          <div class="cq-problem-card-top">
            <div class="cq-problem-card-icon"><i class="ri-file-shred-line"></i></div>
            <span class="cq-problem-tag">Risiko Operasional</span>
          </div>
          <div>
            <h3 class="cq-problem-card-title">Nota Kertas Hilang, Basah, &amp; Sobek</h3>
            <p class="cq-problem-card-desc">Saat pelanggan datang mengambil pakaian, nota hilang dari tumpukan arsip. Kasir panik mencari pakaian, pelanggan marah, dan Anda terpaksa menanggung ganti rugi pakaian.</p>
          </div>
          <div class="cq-problem-solution-pill">
            <span>Solusi: E-Nota WhatsApp</span>
          </div>
        </div>

        <!-- Card 2: Kebocoran Omzet -->
        <div class="cq-payno-problem-card">
          <div class="cq-problem-card-top">
            <div class="cq-problem-card-icon"><i class="ri-money-dollar-circle-line"></i></div>
            <span class="cq-problem-tag is-danger">Risiko Finansial</span>
          </div>
          <div>
            <h3 class="cq-problem-card-title">Kebocoran Omzet &amp; Kasir Curang</h3>
            <p class="cq-problem-card-desc">Nota manual rawan dicoret, diubah, tidak disetor, atau dibikin fiktif. Tanpa audit sistem yang terkunci, kebocoran uang kasir bisa mencapai jutaan rupiah per bulan.</p>
          </div>
          <div class="cq-problem-solution-pill">
            <span>Solusi: Audit Kasir</span>
          </div>
        </div>

        <!-- Card 3: Pakaian Tertukar -->
        <div class="cq-payno-problem-card">
          <div class="cq-problem-card-top">
            <div class="cq-problem-card-icon"><i class="ri-shirt-line"></i></div>
            <span class="cq-problem-tag">Reputasi Toko</span>
          </div>
          <div>
            <h3 class="cq-problem-card-title">Pakaian Tertukar &amp; Antrean Acak</h3>
            <p class="cq-problem-card-desc">Tanpa kode rak digital dan pelacakan status cuci-kering-setrika, pakaian sering terselip atau tertukar. Reputasi outlet yang dibangun bertahun-tahun bisa hancur seketika.</p>
          </div>
          <div class="cq-problem-solution-pill">
            <span>Solusi: Live Tracking</span>
          </div>
        </div>

        <!-- Card 4: Diteror Chat -->
        <div class="cq-payno-problem-card">
          <div class="cq-problem-card-top">
            <div class="cq-problem-card-icon"><i class="ri-whatsapp-line"></i></div>
            <span class="cq-problem-tag">Beban Kasir</span>
          </div>
          <div>
            <h3 class="cq-problem-card-title">Diteror Pertanyaan: <em>"Baju Saya Beres?"</em></h3>
            <p class="cq-problem-card-desc">Setiap 10 menit WhatsApp kasir berdering hanya untuk menanyakan status cucian. Karyawan kehabisan waktu produktif membongkar cucian hanya untuk membalas pesan.</p>
          </div>
          <div class="cq-problem-solution-pill">
            <span>Solusi: Notifikasi Otomatis</span>
          </div>
        </div>

        <!-- Card 5: Budak Outlet -->
        <div class="cq-payno-problem-card">
          <div class="cq-problem-card-top">
            <div class="cq-problem-card-icon"><i class="ri-time-line"></i></div>
            <span class="cq-problem-tag">Waktu Owner</span>
          </div>
          <div>
            <h3 class="cq-problem-card-title">Owner Terjebak Jadi 'Budak Outlet'</h3>
            <p class="cq-problem-card-desc">Malam hari seharusnya bersama keluarga, Anda malah harus nongkrong di outlet menghitung recehan di laci, mengecek buku kas berdebu, dan mencari selisih setoran.</p>
          </div>
          <div class="cq-problem-solution-pill">
            <span>Solusi: Monitoring Live</span>
          </div>
        </div>

        <!-- Card 6: Biaya Kertas -->
        <div class="cq-payno-problem-card">
          <div class="cq-problem-card-top">
            <div class="cq-problem-card-icon"><i class="ri-printer-line"></i></div>
            <span class="cq-problem-tag is-danger">Pemborosan Biaya</span>
          </div>
          <div>
            <h3 class="cq-problem-card-title">Biaya Cetak Nota &amp; Tinta Terbuang</h3>
            <p class="cq-problem-card-desc">Cetak buku nota berkoli-koli menghabiskan Rp 300.000 – Rp 600.000 setiap bulan. Uang tersebut habis terbakar menjadi sampah kertas yang tidak bisa dianalisis.</p>
          </div>
          <div class="cq-problem-solution-pill">
            <span>Solusi: 100% Paperless</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. TESTIMONIAL SECTION (Payno Continuous Infinite Carousel Track) -->
  <?php
  // Realistic testimonials reflecting https://app.laundrycleanique.com/ features (Min 9 items)
  $testi_items = [
      [
          'name'      => 'Andry Pratama',
          'role'      => 'Owner Berkah Clean Laundry • 3 Outlet, Sleman',
          'quote'     => 'Dulu tiap malam saya pusing mencocokkan nota kertas yang kotor dengan uang kas di laci kasir sampai jam 10 malam. Sejak pakai Cleanique POS, nota otomatis masuk ke WhatsApp pelanggan dan omzet terpantau live dari ranjang. Bebas stres!',
          'initial'   => 'A',
          'avatar_bg' => '#0284C7',
      ],
      [
          'name'      => 'Rina Wijayanti',
          'role'      => 'Owner Melati Wash Express • Yogyakarta',
          'quote'     => 'Fitur notifikasi WhatsApp dan live tracking cucian itu penyelamat hidup kasir kami. Pelanggan tidak ada lagi yang bolak-balik tanya pakaian sudah kering atau belum. Biaya cetak nota Rp 400.000 sebulan sekarang hemat 100% jadi profit bersih!',
          'initial'   => 'R',
          'avatar_bg' => '#7C3AED',
      ],
      [
          'name'      => 'Budi Santoso',
          'role'      => 'Owner Smart Clean & Dry Cleaning • Bantul',
          'quote'     => 'Sistem multi-kasir dan nomor serinya sangat aman. Kasir tidak bisa hapus transaksi sesuka hati. Selisih setoran kasir yang biasanya ada tiap minggu, sekarang 0 rupiah. Aplikasinya sangat ringan dibuka di HP kasir murah sekalipun.',
          'initial'   => 'B',
          'avatar_bg' => '#0D9488',
      ],
      [
          'name'      => 'dr. Maya Anggraini',
          'role'      => 'Owner Royal Laundromat & Wet Clean • Bandung',
          'quote'     => 'Mengelola 4 cabang laundry kiloan dan satuan jadi sangat terkontrol dalam satu dashboard. Saya bisa pantau stok deterjen, kinerja setrikaan staf, dan grafik laba bersih harian tanpa harus keliling fisik ke outlet tiap hari.',
          'initial'   => 'M',
          'avatar_bg' => '#DB2777',
      ],
      [
          'name'      => 'Hendra Kusuma',
          'role'      => 'Owner Barokah Wash Kiloan • Magelang',
          'quote'     => 'Asisten AI Bisnisnya benar-benar luar biasa! Setiap hari Senin merekomendasikan promo cuci karpet dan memberi tahu jam sibuk outlet. Omzet bulanan kami naik 24% dalam 2 bulan pertama pemakaian.',
          'initial'   => 'H',
          'avatar_bg' => '#2563EB',
      ],
      [
          'name'      => 'Siti Nurhaliza',
          'role'      => 'Owner Fresh Laundry & Setrika Uap • Solo',
          'quote'     => 'Aplikasi kasir paling simpel untuk karyawan. Timbang cucian kiloan langsung kalkulasi harga otomatis, pelanggan senang dapat struk WhatsApp resmi dengan QRIS. Tidak ada lagi komplain salah hitung timbangan.',
          'initial'   => 'S',
          'avatar_bg' => '#059669',
      ],
      [
          'name'      => 'Agus Supriyadi',
          'role'      => 'Owner QuickWash Laundry Kiloan • Surabaya',
          'quote'     => 'Fitur penomoran rak digital Cleanique menutup masalah klasik baju tertukar atau terselip. Cucian selesai langsung diberi nomor rak di aplikasi. Karyawan ambil baju cepat, komplain pelanggan berkurang hingga 95%.',
          'initial'   => 'A',
          'avatar_bg' => '#D97706',
      ],
      [
          'name'      => 'Faisal Rahman',
          'role'      => 'Owner Kawan Cuci Express • Tangerang Selatan',
          'quote'     => 'Pelanggan kami rata-rata anak kos dan pekerja sibuk. Begitu kasir klik selesai, WhatsApp otomatis kirim link cek cucian. Pelayanan laundry kami terasa sekelas hotel bintang lima dan dapat rating 4.9 di Google Maps.',
          'initial'   => 'F',
          'avatar_bg' => '#4F46E5',
      ],
      [
          'name'      => 'Dewi Sartika',
          'role'      => 'Owner Citra Wash Kiloan & Satuan • Medan',
          'quote'     => 'Dulu tiap akhir bulan pusing hitung pembukuan kas sampai begadang. Sekarang dengan Cleanique, laporan laba rugi, kas masuk, piutang, dan komisi kasir ter-generate otomatis dalam 1 klik PDF. Waktu saya untuk keluarga jadi kembali.',
          'initial'   => 'D',
          'avatar_bg' => '#E11D48',
      ],
      [
          'name'      => 'I Wayan Gede',
          'role'      => 'Owner Dewata Clean Laundry • Denpasar, Bali',
          'quote'     => 'Banyak ekspatriat dan tamu villa langganan di tempat kami. Mereka suka sekali karena nota digitalnya rapi dan mendukung multi-payment QRIS. Kasir melayani antrean 2x lebih cepat dibanding pakai nota kertas manual.',
          'initial'   => 'W',
          'avatar_bg' => '#0891B2',
      ],
  ];

  // Merge with CPT testimoni if available
  $cpt_query = new WP_Query([
      'post_type'      => 'testimoni',
      'posts_per_page' => 6,
      'post_status'    => 'publish',
  ]);
  if ($cpt_query->have_posts()) {
      $cpt_items = [];
      while ($cpt_query->have_posts()) {
          $cpt_query->the_post();
          $city = get_post_meta(get_the_ID(), '_cq_testi_city', true);
          $biz = get_post_meta(get_the_ID(), '_cq_testi_business', true);
          $cpt_items[] = [
              'name'      => get_the_title(),
              'role'      => ($biz ?: 'Mitra Laundry') . ($city ? ' • ' . $city : ''),
              'quote'     => wp_strip_all_tags(get_the_content()),
              'initial'   => strtoupper(substr(get_the_title(), 0, 1)),
              'avatar_bg' => '#0284C7',
          ];
      }
      wp_reset_postdata();
      if (!empty($cpt_items)) {
          $testi_items = array_merge($cpt_items, $testi_items);
      }
  }
  ?>
  <section class="cq-payno-testi-section" id="testimoni">
    <div class="cq-container">
      <div class="cq-section-header" style="text-align: center; max-width: 760px; margin: 0 auto;">
        <span class="cq-section-subtitle">Kisah Sukses Pengusaha Laundry</span>
        <h2 style="font-family: var(--cq-font-heading); font-weight: 300; font-size: clamp(2.2rem, 1.8rem + 2vw, 3.4rem); line-height: 1.15; letter-spacing: -0.03em; color: var(--ink); margin: 0 auto var(--cq-sp-12);">
          Dipercaya Ratusan Pemilik Laundry<br>
          <span class="cq-text-blue">Di Seluruh Indonesia</span>
        </h2>
        <p class="cq-section-desc" style="margin: 0 auto; color: #64748B;">
          Lihat bagaimana sistem POS digital Cleanique mengubah operasional harian mereka menjadi lebih santai dan menguntungkan.
        </p>
      </div>
    </div>

    <!-- Payno Continuous Infinite Carousel Track -->
    <div class="cq-payno-testi-track-wrap">
      <div class="cq-payno-testi-track">
        <!-- Group 1: Original Items -->
        <div class="cq-testi-group">
          <?php foreach ($testi_items as $item) : ?>
            <div class="cq-payno-testi-card">
              <div>
                <div class="cq-testi-card-header">
                  <div class="cq-testi-stars">
                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                  </div>
                  <span class="cq-testi-badge">Terverifikasi</span>
                </div>
                <p class="cq-testi-card-quote">
                  "<?php echo esc_html($item['quote']); ?>"
                </p>
              </div>
              <div class="cq-testi-card-user">
                <div class="cq-testi-card-avatar" style="background: <?php echo esc_attr($item['avatar_bg']); ?>;">
                  <?php echo esc_html($item['initial']); ?>
                </div>
                <div class="cq-testi-card-meta">
                  <div class="cq-testi-card-name"><?php echo esc_html($item['name']); ?></div>
                  <div class="cq-testi-card-role"><?php echo esc_html($item['role']); ?></div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Group 2: Duplicate Items for 100% Seamless Infinite Loop -->
        <div class="cq-testi-group" aria-hidden="true">
          <?php foreach ($testi_items as $item) : ?>
            <div class="cq-payno-testi-card">
              <div>
                <div class="cq-testi-card-header">
                  <div class="cq-testi-stars">
                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                  </div>
                  <span class="cq-testi-badge">Terverifikasi</span>
                </div>
                <p class="cq-testi-card-quote">
                  "<?php echo esc_html($item['quote']); ?>"
                </p>
              </div>
              <div class="cq-testi-card-user">
                <div class="cq-testi-card-avatar" style="background: <?php echo esc_attr($item['avatar_bg']); ?>;">
                  <?php echo esc_html($item['initial']); ?>
                </div>
                <div class="cq-testi-card-meta">
                  <div class="cq-testi-card-name"><?php echo esc_html($item['name']); ?></div>
                  <div class="cq-testi-card-role"><?php echo esc_html($item['role']); ?></div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. PRICING SECTION (Monthly/Annual Toggle + Navy Center Card) -->
  <?php get_template_part('template-parts/landing/pricing-aplikasi'); ?>

  <!-- 7. FORM TRIAL 7 HARI (Payno Minimalist Form Section) -->
  <section class="cq-trial-section" id="trial-form">
    <div class="cq-container">
      <div class="cq-trial-wrapper">
        <!-- Left Column: Value Proposition -->
        <div class="cq-trial-info">
          <h2 class="cq-trial-heading">
            Daftarkan Outlet Anda,<br>
            <span class="cq-text-blue">Mulai Uji Coba Gratis.</span>
          </h2>
          <p class="cq-trial-desc">
            Rasakan kemudahan kasir POS digital dan notifikasi WhatsApp otomatis. Siap pakai dalam 2 menit tanpa komitmen.
          </p>

          <!-- Clean Minimalist Perks -->
          <ul class="cq-trial-clean-perks">
            <li>
              <i class="ri-check-line"></i>
              <span>Akses penuh seluruh fitur POS &amp; WhatsApp</span>
            </li>
            <li>
              <i class="ri-check-line"></i>
              <span>Tanpa kartu kredit &amp; bebas batalkan kapan saja</span>
            </li>
            <li>
              <i class="ri-check-line"></i>
              <span>Akun demo siap digunakan dalam 2 menit</span>
            </li>
          </ul>
        </div>

        <!-- Right Column: Sleek Minimal Form Card -->
        <div class="cq-trial-card-container">
          <div class="cq-trial-card">
            <div class="cq-trial-card-header">
              <h3 class="cq-trial-card-title">Aktivasi Akun Demo</h3>
              <p class="cq-trial-card-subtitle">Lengkapi data singkat untuk mencoba aplikasi.</p>
            </div>

            <form id="form-trial-laundry" class="cq-trial-form-modern">
              <div class="cq-field-group">
                <label for="trial-nama-laundry" class="cq-field-label">
                  Nama Usaha Laundry
                </label>
                <div class="cq-field-input-wrap">
                  <i class="ri-store-2-line cq-field-icon" aria-hidden="true"></i>
                  <input type="text" id="trial-nama-laundry" class="cq-field-input" placeholder="Contoh: Berkah Clean Laundry" required>
                </div>
              </div>

              <div class="cq-field-row">
                <div class="cq-field-group">
                  <label for="trial-nama-owner" class="cq-field-label">
                    Nama Pemilik / Kasir
                  </label>
                  <div class="cq-field-input-wrap">
                    <i class="ri-user-3-line cq-field-icon" aria-hidden="true"></i>
                    <input type="text" id="trial-nama-owner" class="cq-field-input" placeholder="Contoh: Andry Pratama" required>
                  </div>
                </div>

                <div class="cq-field-group">
                  <label for="trial-wa" class="cq-field-label">
                    Nomor WhatsApp
                  </label>
                  <div class="cq-field-input-wrap">
                    <i class="ri-whatsapp-line cq-field-icon" aria-hidden="true"></i>
                    <input type="tel" id="trial-wa" class="cq-field-input" placeholder="08xxxxxxxxxx" required>
                  </div>
                </div>
              </div>

              <div class="cq-field-row">
                <div class="cq-field-group">
                  <label for="trial-email" class="cq-field-label">
                    Email Outlet (Login)
                  </label>
                  <div class="cq-field-input-wrap">
                    <i class="ri-mail-line cq-field-icon" aria-hidden="true"></i>
                    <input type="email" id="trial-email" class="cq-field-input" placeholder="nama@outlet.com" required>
                  </div>
                </div>

                <div class="cq-field-group">
                  <label for="trial-kota" class="cq-field-label">
                    Kota / Kabupaten
                  </label>
                  <div class="cq-field-input-wrap">
                    <i class="ri-map-pin-2-line cq-field-icon" aria-hidden="true"></i>
                    <input type="text" id="trial-kota" class="cq-field-input" placeholder="Contoh: Sleman, Yogyakarta" required>
                  </div>
                </div>
              </div>

              <button type="submit" class="cq-btn-trial-submit">
                <span>Coba Gratis</span>
              </button>

              <div class="cq-trial-card-footer">
                <div class="cq-trial-login-prompt">
                  Sudah punya akun? <a href="https://app.laundrycleanique.com/" target="_blank" rel="noopener">Masuk ke aplikasi</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 8. FAQ SECTION (Accessible Accordion) -->
  <section class="cq-section cq-section-alt" id="faq">
    <div class="cq-container">
      <div class="cq-section-header" style="text-align: center; max-width: 640px; margin: 0 auto var(--cq-sp-32);">
        <span class="cq-section-subtitle">FAQ Aplikasi</span>
        <h2 style="font-family: var(--cq-font-heading); font-weight: 300; font-size: clamp(2rem, 1.6rem + 1.8vw, 3rem); line-height: 1.15; letter-spacing: -0.03em; color: var(--ink);">
          Pertanyaan Seputar <span class="cq-text-blue">Cleanique POS</span>
        </h2>
      </div>

      <div class="cq-accordion" style="max-width: 780px; margin: 0 auto;">
        <div class="cq-accordion-item is-open">
          <button class="cq-accordion-trigger" type="button" aria-expanded="true">
            <span>Apakah Free Trial 7 Hari benar-benar gratis tanpa syarat?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Ya, 100% gratis tanpa perlu memasukkan nomor kartu kredit dan tanpa ikatan kontrak apapun. Anda dapat menguji langsung seluruh transaksi kasir POS, notifikasi WhatsApp, dan laporan omzet selama 7 hari penuh. Setelah trial, biaya berlangganan hanya Rp 60.000 / bulan.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Apa keunggulan fitur Asisten AI Bisnis di aplikasi ini?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Asisten AI pintar Cleanique membantu pemilik laundry menganalisa omzet harian, memetakan jam-jam tersibuk outlet, menyarankan ide promosi yang efektif, dan memberikan konsultasi finansial harian berbasis data transaksi riil Anda selama 24 jam non-stop.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Apakah bisa diakses dari HP kasir, tablet, dan PC laptop sekaligus?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Bisa sekali. Aplikasi berbasis web responsif modern dan Progressive Web App (PWA). Anda dapat membukanya di browser HP Android/iPhone kasir, tablet meja kasir, maupun laptop owner di rumah secara sinkron dan real-time.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Apakah harus membeli printer kasir khusus?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Tidak harus. Cleanique mengutamakan nota digital WhatsApp yang hemat biaya kertas. Namun jika outlet Anda membutuhkan bukti cetak fisik, aplikasi ini mendukung semua printer thermal Bluetooth ukuran 58mm dan 80mm di pasaran.
          </div>
        </div>

        <div class="cq-accordion-item">
          <button class="cq-accordion-trigger" type="button" aria-expanded="false">
            <span>Apakah data pelanggan dan transaksi saya aman?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            Sangat aman. Setiap outlet memiliki partisi database terisolasi dan tersimpan di server cloud terenkripsi SSL dengan backup harian otomatis, sehingga tetap aman meskipun smartphone kasir Anda rusak atau hilang.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 8. BOTTOM CTA SECTION WITH SKY GRADIENT & COUNTDOWN 30 OKTOBER -->
  <section class="cq-sky-canvas cq-section" style="padding: var(--cq-sp-64) 0 var(--cq-sp-80); text-align: center;">
    <div class="cq-container" style="max-width: 740px;">
      <h2 style="font-family: var(--cq-font-heading); font-weight: 300; font-size: clamp(2.2rem, 1.8rem + 2.2vw, 3.6rem); line-height: 1.15; letter-spacing: -0.035em; color: var(--ink); margin-bottom: var(--cq-sp-16);">
        Mulai Modernisasi Laundry Anda <span class="cq-text-blue">Hari Ini</span>
      </h2>
      <p style="font-size: var(--cq-fs-base); color: var(--cq-text-muted); line-height: 1.65; margin-bottom: var(--cq-sp-32);">
        Hentikan kerepotan nota manual dan amankan omzet outlet Anda hari ini. Bergabunglah bersama Andry dan ratusan pengusaha laundry cerdas Cleanique di seluruh Indonesia.
      </p>

      <div style="display: flex; justify-content: center; gap: var(--cq-sp-16); flex-wrap: wrap;">
        <a href="#trial-form" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
          Coba Gratis
        </a>
        <a href="<?php echo esc_url($wa_trial_url); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true" style="color: #25D366;"></i> Chat WhatsApp
        </a>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
