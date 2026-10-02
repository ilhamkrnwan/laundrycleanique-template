<?php
/**
 * The Front Page template (Homepage Portal & Company Profile)
 * Cleanique Laundry by PT Indotech Berkah Abadi
 * Modern Corporate & Bento Grid Architecture
 *
 * @package Cleanique
 */

get_header();

$wa_kemitraan_url = cleanique_get_whatsapp_url('kemitraan');
$office_addr      = get_theme_mod('cleanique_office_address', 'PT Indotech Berkah Abadi - Sleman, D.I. Yogyakarta, Indonesia');
$proposal_pdf_url = get_option('cleanique_kemitraan_proposal_url');
?>

<main id="main-content">
  <div id="top"></div>

  <!-- ========================================================
       1. CORPORATE HERO SECTION (Modern Bento Architecture)
       ======================================================== -->
  <section class="cq-corp-hero" id="beranda">
    <div class="cq-container">
      <!-- Top Row: Corporate Headline & Authority Copy -->
      <div class="cq-corp-hero-top">
        <div>
          <div class="cq-corp-hero-badge">
            <i class="ri-shield-check-fill" style="color: var(--mint-cta); font-size: 16px;" aria-hidden="true"></i>
            <span>PT Indotech Berkah Abadi &bull; Ekosistem Bisnis Laundry Terpadu</span>
          </div>
          <h1 class="cq-corp-hero-title">
            Kembangkan Bisnis Laundry, <span class="cq-text-accent">Dengan Mesin Tangguh, Chemical Pabrik &amp; Sistem Cerdas.</span>
          </h1>
        </div>

        <div>
          <p class="cq-corp-hero-desc">
            <strong>Cleanique Laundry</strong> adalah lini ekosistem dan rantai pasok terintegrasi dari <strong>PT Indotech Berkah Abadi</strong> (produsen bahan kimia industri, *Orchid Brand*, dan penyedia mesin laundry komersial di Sleman, D.I. Yogyakarta). Kami menyediakan program kemitraan siap buka 100% tanpa royalti, pasokan bahan kimia standar pabrik, serta aplikasi kasir digital POS dengan free trial 7 hari.
          </p>

          <div class="cq-corp-hero-actions">
            <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-shake-hands-line" aria-hidden="true"></i> Peluang Kemitraan Laundry
            </a>
            <a href="<?php echo esc_url($wa_kemitraan_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Tim Ahli
            </a>
            <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill">
              <i class="ri-building-line" aria-hidden="true"></i> Tentang PT Indotech
            </a>
          </div>
        </div>
      </div>

      <!-- 2 Modern Corporate Gateway Bento Cards -->
      <div class="cq-corp-gateway-grid">
        <!-- Gateway Card 1: Paket Kemitraan Laundry Turnkey -->
        <div class="cq-corp-gateway-card">
          <div class="cq-corp-gateway-header">
            <div class="cq-corp-gateway-icon" aria-hidden="true">
              <i class="ri-store-2-fill"></i>
            </div>
            <div>
              <span class="cq-corp-gateway-sub">Program Kemitraan Turnkey</span>
              <h2 class="cq-corp-gateway-title">Ingin Buka Bisnis Laundry Baru?</h2>
            </div>
          </div>

          <p class="cq-corp-card-desc">
            Solusi kemitraan siap operasi tanpa royalti fee. Lengkap dengan set mesin cuci &amp; dryer komersial heavy-duty bergaransi, instalasi pipa &amp; gas, pasokan awal chemical pabrik Orchid Brand, dan SOP tuntas sampai grand opening.
          </p>

          <ul class="cq-corp-gateway-bullets">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> 100% Hak Milik Mitra &bull; Tanpa Bagi Hasil Bulanan (0% Royalty)</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Set Mesin Cuci &amp; Pengering Komersial Heavy Duty Bergaransi Resmi</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Pasokan Bahan Kimia Standar Pabrik Langsung (Harga Produsen)</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Bonus Lisensi Aplikasi Kasir POS Cleanique Laundry</li>
          </ul>

          <div style="margin-top: auto; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-sm">
              Lihat Paket Kemitraan <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-sm" style="font-size: 11px;">
              Buka Katalog Detail
            </a>
          </div>
        </div>

        <!-- Gateway Card 2: Aplikasi Kasir & POS Laundry Digital -->
        <div class="cq-corp-gateway-card">
          <div class="cq-corp-gateway-header">
            <div class="cq-corp-gateway-icon icon-accent" aria-hidden="true">
              <i class="ri-smartphone-fill"></i>
            </div>
            <div>
              <span class="cq-corp-gateway-sub" style="color: #059669;">Sistem POS &amp; Cloud Management</span>
              <h2 class="cq-corp-gateway-title">Sudah Punya Laundry? Digitalisasi Sekarang!</h2>
            </div>
          </div>

          <p class="cq-corp-card-desc">
            Tinggalkan nota kertas manual yang rentan kecurangan. Nikmati nota otomatis ke WhatsApp pelanggan, link live tracking status pakaian, laporan omzet real-time, serta pengawasan kas laci kasir dari smartphone Anda.
          </p>

          <ul class="cq-corp-gateway-bullets">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Nota Digital Otomatis ke WhatsApp Pelanggan Seketika</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Pelacakan Live Status Cucian Mandiri oleh Pelanggan</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Laporan Arus Kas, Tutup Shift &amp; Audit Anti-Kecurangan</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Coba Gratis (Free Trial) 7 Hari Pertama Tanpa Syarat</li>
          </ul>

          <div style="margin-top: auto; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-sm">
              Coba Gratis 7 Hari <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
            <span style="font-size: 11px; font-weight: 700; color: var(--cq-dark-soft);">
              Mulai Puluhan Ribu/Bln
            </span>
          </div>
        </div>
      </div>

      <!-- 4-Column Stats Bento Row -->
      <div class="cq-corp-stats-row">
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">150+</div>
          <div class="cq-corp-stat-label">Outlet Mitra &amp; Klien Aktif</div>
        </div>
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">50.000+</div>
          <div class="cq-corp-stat-label">Liter Chemical Terdistribusi / Bln</div>
        </div>
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">0%</div>
          <div class="cq-corp-stat-label">Royalty Fee &bull; 100% Keuntungan Milik Anda</div>
        </div>
        <div class="cq-corp-stat-card">
          <div class="cq-corp-stat-val">10+ Thn</div>
          <div class="cq-corp-stat-label">Riset &amp; Manufaktur Kimia di Sleman</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. TENTANG PT INDOTECH BERKAH ABADI (Bento Grid Profile)
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="tentang-kami">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Profil &amp; Kredibilitas Resmi</span>
        <h2 class="cq-section-title">Mitra Strategis Wirausaha Laundry Modern Indonesia</h2>
        <p class="cq-section-desc">
          Berbadan hukum resmi PT dengan pabrik mandiri di Sleman, D.I. Yogyakarta. Kami mendedikasikan keahlian industri untuk mendampingi pengusaha laundry meraih kemandirian finansial.
        </p>
      </div>

      <!-- Visual Split: Tim/Showroom + Penjelasan Kredibilitas -->
      <div class="cq-visual-split" style="margin-bottom: var(--cq-sp-48);">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>"
               alt="Pusat Layanan Teknis &amp; Workshop PT Indotech Berkah Abadi Yogyakarta"
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Integritas &amp; Legalitas</span>
          <h3 style="font-family: var(--cq-font-heading); font-size: clamp(1.6rem, 1.3rem + 1vw, 2.2rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.25; margin-bottom: var(--cq-sp-16);">
            Bukan Makelar, Kami Adalah Produsen &amp; Pengembang Langsung
          </h3>
          <p style="color: var(--cq-text-muted); line-height: 1.7; margin-bottom: var(--cq-sp-16);">
            <strong>PT Indotech Berkah Abadi</strong> menghadirkan standar mutu tinggi pada setiap produk: dari formulasi deterjen rendah busa dan parfum laundry microcapsule *Orchid Brand*, pemilihan mesin cuci heavy-duty komersial bergaransi, hingga perancangan aplikasi kasir berbasis cloud yang aman.
          </p>
          <div class="cq-stat-chips-row">
            <span class="cq-stat-chip"><i class="ri-factory-line" aria-hidden="true"></i> Pabrik Kimia Sendiri Sleman</span>
            <span class="cq-stat-chip"><i class="ri-verified-badge-line" aria-hidden="true"></i> Izin Edar &amp; Legalitas PT</span>
            <span class="cq-stat-chip"><i class="ri-hand-coin-line" aria-hidden="true"></i> 100% Hak Milik Tanpa Royalti</span>
            <span class="cq-stat-chip"><i class="ri-customer-service-2-line" aria-hidden="true"></i> Teknisi &amp; Servis Resmi</span>
          </div>
          <div style="margin-top: var(--cq-sp-24);">
            <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-building-line" aria-hidden="true"></i> Profil Lengkap Perusahaan <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- 4 Pillars of Credibility Cards -->
      <div class="cq-bento-grid cq-bento-grid-4">
        <div class="cq-corp-card">
          <div class="cq-corp-card-icon" aria-hidden="true"><i class="ri-factory-line"></i></div>
          <h3 class="cq-corp-card-title">Pabrik &amp; Formulasi Sendiri</h3>
          <p class="cq-corp-card-desc">
            Formulasi deterjen, softener, dan parfum diproduksi di fasilitas pabrik kami di Sleman DIY guna menjamin mutu konsisten dan harga HPP tangan pertama.
          </p>
        </div>

        <div class="cq-corp-card">
          <div class="cq-corp-card-icon icon-accent" aria-hidden="true"><i class="ri-hand-coin-line"></i></div>
          <h3 class="cq-corp-card-title">Kemitraan Tanpa Royalti</h3>
          <p class="cq-corp-card-desc">
            Prinsip kemitraan adil dan transparan. 100% omzet dan keuntungan bersih outlet menjadi hak milik Anda tanpa beban royalti bulanan atau franchise fee tahunan.
          </p>
        </div>

        <div class="cq-corp-card">
          <div class="cq-corp-card-icon" aria-hidden="true"><i class="ri-code-box-line"></i></div>
          <h3 class="cq-corp-card-title">Riset Teknologi In-House</h3>
          <p class="cq-corp-card-desc">
            Software kasir POS Cleanique dikembangkan langsung oleh tim engineering kami, menjamin pembaruan fitur berkelanjutan dan kestabilan server cloud.
          </p>
        </div>

        <div class="cq-corp-card">
          <div class="cq-corp-card-icon icon-navy" aria-hidden="true"><i class="ri-shield-check-line"></i></div>
          <h3 class="cq-corp-card-title">Legalitas &amp; Garansi Resmi</h3>
          <p class="cq-corp-card-desc">
            Berbadan hukum resmi PT dengan garansi servis dan suku cadang mesin, ketersediaan pasokan chemical berizin edar, serta pendampingan teknisi profesional.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. PROGRAM KEMITRAAN UNGGULAN (Data dari CPT 'kemitraan')
       ======================================================== -->
  <section class="cq-section" id="kemitraan">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Peluang Usaha Siap Operasi</span>
        <h2 class="cq-section-title">Program Kemitraan Laundry Cleanique</h2>
        <p class="cq-section-desc">
          Pilih paket kemitraan yang paling sesuai dengan lokasi, target pasar, dan modal investasi Anda. Seluruh paket sudah termasuk mesin, chemical awal, instalasi, dan SOP tuntas.
        </p>
      </div>

      <div class="cq-bento-grid cq-bento-grid-3">
        <?php
        $kemitraan_query = new WP_Query([
            'post_type'      => 'kemitraan',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'meta_key'       => '_cq_kemitraan_featured',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
        ]);

        if ($kemitraan_query->have_posts()) :
            while ($kemitraan_query->have_posts()) : $kemitraan_query->the_post();
                $price       = get_post_meta(get_the_ID(), '_cq_kemitraan_price', true);
                $badge       = get_post_meta(get_the_ID(), '_cq_kemitraan_badge', true);
                $roi         = get_post_meta(get_the_ID(), '_cq_kemitraan_roi', true);
                $is_featured = get_post_meta(get_the_ID(), '_cq_kemitraan_featured', true);
                $specs       = get_post_meta(get_the_ID(), '_cq_kemitraan_specs', true);
                $wa_url      = cleanique_get_kemitraan_whatsapp_url(get_the_ID());
        ?>
          <div class="cq-kemitraan-card <?php echo ($is_featured === '1') ? 'is-featured' : ''; ?>">
            <?php if (!empty($badge)) : ?>
              <div class="cq-kemitraan-ribbon"><?php echo esc_html($badge); ?></div>
            <?php endif; ?>

            <div class="cq-kemitraan-header">
              <h3 class="cq-corp-card-title"><?php the_title(); ?></h3>
              <p class="cq-corp-card-desc"><?php echo wp_trim_words(get_the_excerpt(), 14, '...'); ?></p>
            </div>

            <div class="cq-kemitraan-price-wrap">
              <div class="cq-kemitraan-price"><?php echo esc_html($price ?: 'Konsultasi'); ?></div>
              <span class="cq-kemitraan-price-label">Estimasi modal investasi siap buka</span>
              <?php if (!empty($roi)) : ?>
                <div class="cq-kemitraan-roi-chip">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi BEP: <?php echo esc_html($roi); ?>
                </div>
              <?php endif; ?>
            </div>

            <?php if (!empty($specs)) : 
                $spec_items = array_filter(array_map('trim', explode("\n", $specs)));
            ?>
              <ul class="cq-kemitraan-specs-list">
                <?php foreach (array_slice($spec_items, 0, 5) as $item) : ?>
                  <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span><?php echo esc_html($item); ?></span></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line"></i> Konsultasi Paket Ini
              </a>
              <a href="<?php the_permalink(); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Rincian &amp; Spesifikasi Mesin
              </a>
            </div>
          </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
          <!-- Default Corporate Packages Showcase -->
          <div class="cq-kemitraan-card">
            <div class="cq-kemitraan-header">
              <h3 class="cq-corp-card-title">Paket Kiloan Starter</h3>
              <p class="cq-corp-card-desc">Solusi hemat bagi pemula untuk membuka usaha laundry kiloan di perumahan atau kos-kosan.</p>
            </div>
            <div class="cq-kemitraan-price-wrap">
              <div class="cq-kemitraan-price">Mulai Rp 28 Juta-an</div>
              <span class="cq-kemitraan-price-label">Estimasi modal investasi siap buka</span>
              <div class="cq-kemitraan-roi-chip"><i class="ri-time-line"></i> Estimasi BEP: 4 – 6 Bulan</div>
            </div>
            <ul class="cq-kemitraan-specs-list">
              <li><i class="ri-checkbox-circle-fill"></i> <span>1 Unit Mesin Cuci Front Load Komersial</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>1 Unit Mesin Pengering Gas Konversi 10.5 Kg</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Starter Kit Chemical Pabrik Orchid Brand 60 Liter</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Instalasi Plumbing &amp; SOP Operasional Karyawan</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Gratis Lisensi Aplikasi Kasir POS Cleanique</span></li>
            </ul>
            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line"></i> Konsultasi Paket Starter
              </a>
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Detail Spesifikasi
              </a>
            </div>
          </div>

          <div class="cq-kemitraan-card is-featured">
            <div class="cq-kemitraan-ribbon">Paling Populer</div>
            <div class="cq-kemitraan-header">
              <h3 class="cq-corp-card-title">Paket Komersial Pro (Ruko)</h3>
              <p class="cq-corp-card-desc">Kapasitas tinggi untuk lokasi ruko komersial, melayani kiloan cepat dan bed cover tebal.</p>
            </div>
            <div class="cq-kemitraan-price-wrap">
              <div class="cq-kemitraan-price">Mulai Rp 48 Juta-an</div>
              <span class="cq-kemitraan-price-label">Estimasi modal investasi siap buka</span>
              <div class="cq-kemitraan-roi-chip"><i class="ri-time-line"></i> Estimasi BEP: 5 – 8 Bulan</div>
            </div>
            <ul class="cq-kemitraan-specs-list">
              <li><i class="ri-checkbox-circle-fill"></i> <span>2 Unit Mesin Cuci Komersial Front Load Stack</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>2 Unit Mesin Pengering Gas Heavy Duty 10.5 Kg</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Paket Chemical Pabrik Orchid Brand 120 Liter</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Boiler Setrika Uap 15 Liter + Meja Vacuum</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Pelatihan Karyawan &amp; SOP Higienis Onsite</span></li>
            </ul>
            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line"></i> Konsultasi Paket Komersial
              </a>
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Detail Spesifikasi
              </a>
            </div>
          </div>

          <div class="cq-kemitraan-card">
            <div class="cq-kemitraan-header">
              <h3 class="cq-corp-card-title">Paket Industrial Express</h3>
              <p class="cq-corp-card-desc">Spesifikasi mesin heavy-duty berkapasitas besar untuk sentra laundry hotel, asrama, dan garment.</p>
            </div>
            <div class="cq-kemitraan-price-wrap">
              <div class="cq-kemitraan-price">Mulai Rp 85 Juta-an</div>
              <span class="cq-kemitraan-price-label">Estimasi modal investasi siap buka</span>
              <div class="cq-kemitraan-roi-chip"><i class="ri-time-line"></i> Estimasi BEP: 6 – 10 Bulan</div>
            </div>
            <ul class="cq-kemitraan-specs-list">
              <li><i class="ri-checkbox-circle-fill"></i> <span>Set Mesin Industri Washer &amp; Dryer Kapasitas Ekstra</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Sistem Boiler Uap Otomatis 25 Liter Multi-Kepala</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Pasokan Kimia Industri Skala Besar Harga Pabrik</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Aplikasi POS Multi-Kasir &amp; Laporan Cloud Terpusat</span></li>
              <li><i class="ri-checkbox-circle-fill"></i> <span>Pendampingan Manajemen &amp; Pemasaran Grand Opening</span></li>
            </ul>
            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line"></i> Konsultasi Paket Industrial
              </a>
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Detail Spesifikasi
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <div class="cq-section-action-center" style="display: flex; gap: var(--cq-sp-16); justify-content: center; flex-wrap: wrap; margin-top: var(--cq-sp-36);">
        <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
          <i class="ri-store-2-line" aria-hidden="true"></i> Lihat Seluruh Katalog Kemitraan <i class="ri-arrow-right-line" aria-hidden="true"></i>
        </a>
        <?php if (!empty($proposal_pdf_url)) : ?>
          <a href="<?php echo esc_url($proposal_pdf_url); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
            <i class="ri-file-download-line" aria-hidden="true"></i> Unduh Proposal Kemitraan (PDF)
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ========================================================
       4. PABRIK CHEMICAL ORCHID BRAND (Industrial Credibility)
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="pabrik-chemical">
    <div class="cq-container">
      <div class="cq-visual-split is-reversed" style="margin-bottom: var(--cq-sp-48);">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" 
               alt="Produksi Bahan Kimia Laundry Standar Pabrik PT Indotech Berkah Abadi" 
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Manufaktur &amp; Rantai Pasok Kimia</span>
          <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.4rem + 1.5vw, 2.6rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.2; margin-bottom: var(--cq-sp-16);">
            Bahan Kimia Laundry Kualitas Pabrik dengan HPP Paling Efisien
          </h2>
          <p style="color: var(--cq-text-muted); line-height: 1.7; margin-bottom: var(--cq-sp-16);">
            Formulasi kimia ramah lingkungan standar industri produksi <strong>PT Indotech Berkah Abadi</strong>. Menjamin pakaian pelanggan bersih higienis, serat kain terawat, aroma mewah bertahan hingga 30 hari di lemari, sekaligus menekan HPP operasional mencuci outlet Anda hingga 35%.
          </p>
          <div class="cq-stat-chips-row">
            <span class="cq-stat-chip"><i class="ri-flask-line" aria-hidden="true"></i> Formulasi Low Foam</span>
            <span class="cq-stat-chip"><i class="ri-sparkling-2-line" aria-hidden="true"></i> Microcapsule 30 Hari</span>
            <span class="cq-stat-chip"><i class="ri-leaf-line" aria-hidden="true"></i> Ramah Lingkungan</span>
            <span class="cq-stat-chip"><i class="ri-price-tag-3-line" aria-hidden="true"></i> Harga Pabrik Langsung</span>
          </div>
          <div style="margin-top: var(--cq-sp-24);">
            <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-flask-line" aria-hidden="true"></i> Fasilitas Pabrik &amp; Katalog Chemical <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="cq-bento-grid cq-bento-grid-3">
        <div class="cq-corp-card">
          <div class="cq-corp-card-icon" aria-hidden="true"><i class="ri-water-flash-line"></i></div>
          <h3 class="cq-corp-card-title">Deterjen Rendah Busa (Low Foam)</h3>
          <p class="cq-corp-card-desc">
            Diformulasikan khusus untuk mesin front-loading komersial agar dinamo mesin lebih awet, hemat air bilasan, dan mengangkat noda lemak serta keringat secara maksimal.
          </p>
        </div>

        <div class="cq-corp-card">
          <div class="cq-corp-card-icon icon-accent" aria-hidden="true"><i class="ri-sparkling-2-line"></i></div>
          <h3 class="cq-corp-card-title">Parfum Laundry Microcapsule</h3>
          <p class="cq-corp-card-desc">
            Teknologi microcapsule wangi tahan hingga 30 hari di dalam lemari. Pilihan aroma mewah populer (Snappy, Sakura, Ocean Fresh, Akasia) yang sangat disukai pelanggan laundry.
          </p>
        </div>

        <div class="cq-corp-card">
          <div class="cq-corp-card-icon icon-navy" aria-hidden="true"><i class="ri-flask-line"></i></div>
          <h3 class="cq-corp-card-title">Spotting Chemical Khusus Noda</h3>
          <p class="cq-corp-card-desc">
            Cairan kimia khusus untuk mengatasi noda membandel: noda karat, darah, jamur pakaian, dan minyak oli mesin yang tidak dapat diangkat oleh deterjen biasa.
          </p>
        </div>
      </div>

      <div class="cq-section-action-center" style="display: flex; gap: var(--cq-sp-16); justify-content: center; flex-wrap: wrap; margin-top: var(--cq-sp-36);">
        <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
          <i class="ri-flask-line" aria-hidden="true"></i> Seluruh Produk Chemical Orchid Brand <i class="ri-arrow-right-line" aria-hidden="true"></i>
        </a>
        <a href="https://indotech.id" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
          <i class="ri-external-link-line" aria-hidden="true"></i> Kunjungi Portal Resmi Indotech.id
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. PUSAT BERITA & EDUKASI BISNIS LAUNDRY
       ======================================================== -->
  <section class="cq-section" id="berita">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Berita &amp; Wawasan Industri</span>
        <h2 class="cq-section-title">Artikel &amp; Panduan Sukses Bisnis Laundry</h2>
        <p class="cq-section-desc">Pelajari tips praktis operasional, strategi pemasaran digital, dan manajemen keuangan laundry dari para praktisi kami.</p>
      </div>

      <div class="cq-bento-grid cq-bento-grid-3">
        <?php
        $latest_posts = new WP_Query([
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        ]);

        if ($latest_posts->have_posts()) :
            while ($latest_posts->have_posts()) : $latest_posts->the_post();
        ?>
          <article class="cq-corp-article-card">
            <div class="cq-corp-article-thumb-wrap">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('cleanique-card', ['class' => 'cq-corp-article-thumb', 'alt' => get_the_title()]); ?>
                </a>
              <?php else : ?>
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="<?php the_title_attribute(); ?>" class="cq-corp-article-thumb" loading="lazy">
                </a>
              <?php endif; ?>
            </div>

            <div class="cq-corp-article-body">
              <div class="cq-corp-article-meta">
                <span><i class="ri-calendar-line"></i> <?php echo get_the_date(); ?></span> &bull; 
                <span><i class="ri-user-line"></i> <?php the_author(); ?></span>
              </div>
              <h3 class="cq-corp-article-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <p class="cq-corp-article-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
              </p>
              <a href="<?php the_permalink(); ?>" class="cq-corp-article-link">
                Baca Selengkapnya <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </a>
            </div>
          </article>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
          <!-- Default Article Cards -->
          <article class="cq-corp-article-card">
            <div class="cq-corp-article-thumb-wrap">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="Panduan Usaha Laundry Kiloan" class="cq-corp-article-thumb" loading="lazy">
            </div>
            <div class="cq-corp-article-body">
              <div class="cq-corp-article-meta">Panduan Bisnis &bull; PT Indotech</div>
              <h3 class="cq-corp-article-title">
                <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>">
                  Panduan Memulai Usaha Laundry Kiloan Modal Hemat untuk Pemula
                </a>
              </h3>
              <p class="cq-corp-article-excerpt">
                Langkah demi langkah menentukan lokasi strategis, pemilihan mesin komersial yang tepat, dan perhitungan HPP chemical laundry.
              </p>
              <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-corp-article-link">
                Baca Panduan <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          <article class="cq-corp-article-card">
            <div class="cq-corp-article-thumb-wrap">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" alt="Digitalisasi Aplikasi Kasir Laundry" class="cq-corp-article-thumb" loading="lazy">
            </div>
            <div class="cq-corp-article-body">
              <div class="cq-corp-article-meta">Digitalisasi &bull; POS Laundry</div>
              <h3 class="cq-corp-article-title">
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">
                  Cara Mengurangi Risiko Kecurangan Kasir Laundry dengan Nota WhatsApp
                </a>
              </h3>
              <p class="cq-corp-article-excerpt">
                Mengapa nota kertas manual berbahaya bagi keuangan laundry dan bagaimana sistem digital otomatisasi nota mengamankan omzet Anda.
              </p>
              <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-corp-article-link">
                Baca Panduan <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </a>
            </div>
          </article>

          <article class="cq-corp-article-card">
            <div class="cq-corp-article-thumb-wrap">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" alt="Tips Chemical Pabrik Laundry" class="cq-corp-article-thumb" loading="lazy">
            </div>
            <div class="cq-corp-article-body">
              <div class="cq-corp-article-meta">Formulasi &bull; Orchid Brand</div>
              <h3 class="cq-corp-article-title">
                <a href="https://indotech.id" target="_blank" rel="noopener">
                  Rahasia Pakaian Wangi Tahan Lama: Takaran Tepat Parfum &amp; Pelicin Setrika
                </a>
              </h3>
              <p class="cq-corp-article-excerpt">
                Formula khusus dari laboratorium PT Indotech Berkah Abadi agar pakaian pelanggan tidak apek dan wangi segar tahan berhari-hari.
              </p>
              <a href="https://indotech.id" target="_blank" rel="noopener" class="cq-corp-article-link">
                Pelajari Chemical <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </a>
            </div>
          </article>
        <?php endif; ?>
      </div>

      <div class="cq-section-action-center" style="margin-top: var(--cq-sp-36);">
        <a href="<?php echo esc_url(home_url('/berita/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
          Lihat Semua Berita &amp; Artikel <i class="ri-arrow-right-line" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       6. KONTAK & SHOWROOM WORKSHOP SLEMAN (Corporate Hub)
       ======================================================== -->
  <section class="cq-section cq-section-dark cq-banner-cta-section" id="kontak">
    <div class="cq-container cq-section-header">
      <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.12); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.25);">
        <i class="ri-customer-service-2-line" aria-hidden="true"></i> Pusat Informasi &amp; Kemitraan Resmi
      </div>
      <h2 class="cq-banner-cta-title">
        Siap Memulai atau Mengembangkan Bisnis Laundry Anda?
      </h2>
      <p class="cq-banner-cta-desc">
        Kantor operasional &amp; showroom workshop: <strong><?php echo esc_html($office_addr); ?></strong>.<br>
        Konsultasikan rencana pembukaan outlet laundry, ketersediaan daya listrik ruko, atau instalasi mesin bersama konsultan resmi kami.
      </p>
      <div class="cq-banner-cta-actions">
        <a href="<?php echo esc_url($wa_kemitraan_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Hubungi Konsultan Kemitraan
        </a>
        <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-secondary cq-btn-pill cq-btn-lg">
          <i class="ri-map-pin-line" aria-hidden="true"></i> Peta Lokasi &amp; Showroom Sleman
        </a>
        <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg" style="color: #fff; border-color: rgba(255,255,255,0.4);">
          Katalog Paket Kemitraan
        </a>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
