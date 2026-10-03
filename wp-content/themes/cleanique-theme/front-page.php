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
$office_addr      = get_theme_mod('cleanique_office_address', 'Jalan Jongke Kidul Tengah No. 30, RT.01/RW.23, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285');
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
            <a href="#kemitraan" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-shake-hands-line" aria-hidden="true"></i> Peluang Kemitraan Laundry
            </a>
            <a href="<?php echo esc_url($wa_kemitraan_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Tim Ahli
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
       2. ARSITEKTUR EKOSISTEM 360° BISNIS LAUNDRY
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="ekosistem">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Empat Pilar Ekosistem Cleanique Laundry</h2>
        <p class="cq-section-desc">
          Bukan sekadar penjual mesin lepasan atau waralaba konvensional dengan royalti memberatkan. Bersama PT Indotech Berkah Abadi, Anda memperoleh dukungan industri hulu-ke-hilir yang saling terintegrasi demi kelancaran operasional outlet Anda.
        </p>
      </div>

      <div class="cq-eco-grid">
        <!-- Pilar 1 -->
        <div class="cq-eco-card">
          <span class="cq-eco-card-num">01</span>
          <div class="cq-eco-card-icon" aria-hidden="true">
            <i class="ri-settings-5-fill"></i>
          </div>
          <h3 class="cq-eco-card-title">Mesin Komersial Heavy Duty</h3>
          <p class="cq-eco-card-desc">
            Mesin cuci front load bersuspensi kokoh dan dryer konversi gas kapasitas 10.5 hingga 20 Kg. Dirancang tahan putaran tinggi non-stop tanpa mudah overheat.
          </p>
          <ul class="cq-eco-card-bullets">
            <li><i class="ri-check-line" aria-hidden="true"></i> Drum Stainless Steel SUS304</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Pengeringan 100% dalam 45 Menit</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Garansi Servis &amp; Ketersediaan Sparepart</li>
          </ul>
        </div>

        <!-- Pilar 2 -->
        <div class="cq-eco-card">
          <span class="cq-eco-card-num">02</span>
          <div class="cq-eco-card-icon icon-mint" aria-hidden="true">
            <i class="ri-flask-fill"></i>
          </div>
          <h3 class="cq-eco-card-title">Pabrik Chemical Orchid Brand</h3>
          <p class="cq-eco-card-desc">
            Formulasi deterjen rendah busa (low foam), softener ultra-soft, dan parfum microcapsule tahan 30 hari. Pasokan langsung harga produsen tangan pertama.
          </p>
          <ul class="cq-eco-card-bullets">
            <li><i class="ri-check-line" aria-hidden="true"></i> Efisiensi HPP Mencuci hingga 35%</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Izin Edar &amp; Uji Laboratorium Higienis</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Spotting Penghilang Noda Darah &amp; Karat</li>
          </ul>
        </div>

        <!-- Pilar 3 -->
        <div class="cq-eco-card">
          <span class="cq-eco-card-num">03</span>
          <div class="cq-eco-card-icon icon-navy" aria-hidden="true">
            <i class="ri-smartphone-line"></i>
          </div>
          <h3 class="cq-eco-card-title">Software Kasir POS Cloud</h3>
          <p class="cq-eco-card-desc">
            Aplikasi manajemen kasir digital multi-outlet. Kirim nota otomatis via WhatsApp tanpa printer kasir, live tracking cucian pelanggan, dan laporan kas anti-bocor.
          </p>
          <ul class="cq-eco-card-bullets">
            <li><i class="ri-check-line" aria-hidden="true"></i> Nota Digital WhatsApp Otomatis</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Pelacakan Status Cucian Real-Time</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Laporan Omzet &amp; Shift Kasir di HP</li>
          </ul>
        </div>

        <!-- Pilar 4 -->
        <div class="cq-eco-card">
          <span class="cq-eco-card-num">04</span>
          <div class="cq-eco-card-icon icon-amber" aria-hidden="true">
            <i class="ri-customer-service-2-fill"></i>
          </div>
          <h3 class="cq-eco-card-title">SOP, Training &amp; Teknisi Siaga</h3>
          <p class="cq-eco-card-desc">
            Panduan operasional standar penanganan pakaian luntur, takaran chemical, instalasi plumbing &amp; gas safety, serta pendampingan langsung hingga grand opening.
          </p>
          <ul class="cq-eco-card-bullets">
            <li><i class="ri-check-line" aria-hidden="true"></i> Desain Layout Ruko &amp; Jalur Plumbing</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Pelatihan Karyawan &amp; SOP Pelayanan</li>
            <li><i class="ri-check-line" aria-hidden="true"></i> Tim Teknisi Siaga Kunjungan Servis</li>
          </ul>
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
       4. SIMULASI OMZET & KALKULATOR ROI INTERAKTIF
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="kalkulator">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Hitung Potensi Keuntungan Outlet Laundry Anda</h2>
        <p class="cq-section-desc">
          Berapa pendapatan kotor dan laba bersih yang bisa Anda peroleh setiap bulan? Masukkan estimasi beban cuci harian dan tarif per kilogram untuk melihat simulasinya secara real-time.
        </p>
      </div>

      <div class="cq-calc-container" style="max-width: 960px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: 1fr; gap: var(--cq-sp-32);" class="cq-bento-grid-2">
          <!-- Kolom Input Kalkulator -->
          <div>
            <div style="margin-bottom: var(--cq-sp-16);">
              <span class="cq-search-sug-label">Pilih Target Kapasitas Harian Cepat:</span>
              <div class="cq-calc-preset-bar">
                <button type="button" class="cq-calc-preset-chip" data-kg="40">40 Kg / Hari</button>
                <button type="button" class="cq-calc-preset-chip is-active" data-kg="60">60 Kg / Hari</button>
                <button type="button" class="cq-calc-preset-chip" data-kg="100">100 Kg / Hari</button>
                <button type="button" class="cq-calc-preset-chip" data-kg="150">150 Kg / Hari</button>
              </div>
            </div>

            <div class="cq-form-group" style="margin-bottom: var(--cq-sp-16);">
              <label for="calc-kg" style="font-weight: 700; font-size: var(--cq-fs-sm); color: var(--cq-dark-navy);">
                Volume Cucian Rata-Rata per Hari (Kg):
              </label>
              <input type="number" id="calc-kg" class="cq-input" value="60" min="10" max="500" step="5" style="font-size: 1.1rem; font-weight: 700;">
              <small style="color: var(--cq-text-muted); font-size: 11px;">Rata-rata outlet perumahan 50-80 kg/hari, lokasi ruko komersial 100-150 kg/hari.</small>
            </div>

            <div class="cq-form-group" style="margin-bottom: var(--cq-sp-16);">
              <label for="calc-price" style="font-weight: 700; font-size: var(--cq-fs-sm); color: var(--cq-dark-navy);">
                Tarif Cuci Komplit per Kg (Rp):
              </label>
              <input type="number" id="calc-price" class="cq-input" value="7000" min="4000" max="25000" step="500" style="font-size: 1.1rem; font-weight: 700;">
              <small style="color: var(--cq-text-muted); font-size: 11px;">Tarif pasaran umum: Rp 6.000 - Rp 10.000 / Kg cuci komplit setrika.</small>
            </div>

            <div class="cq-form-group" style="margin-bottom: var(--cq-sp-20);">
              <label for="calc-cost-pct" style="font-weight: 700; font-size: var(--cq-fs-sm); color: var(--cq-dark-navy);">
                Estimasi Biaya Operasional (% dari Omzet):
              </label>
              <input type="number" id="calc-cost-pct" class="cq-input" value="35" min="20" max="60" step="5">
              <small style="color: var(--cq-text-muted); font-size: 11px;">Mencakup chemical pabrik Orchid Brand (~10%), listrik/gas/air (~10%), &amp; gaji karyawan (~15%).</small>
            </div>

            <button type="button" id="cq-calc-btn" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block">
              <i class="ri-refresh-line" aria-hidden="true"></i> Perbarui Perhitungan
            </button>
          </div>

          <!-- Kolom Output Hasil Finansial -->
          <div class="cq-calc-result-card">
            <div class="cq-calc-result-badge">
              0% Royalty &bull; 100% Hak Milik Mitra
            </div>

            <div class="cq-calc-metric-lbl">Proyeksi Omzet Kotor Bulanan</div>
            <div class="cq-calc-metric-val" id="calc-result-omzet">Rp 12.600.000</div>

            <div class="cq-calc-metric-lbl">Estimasi Laba Bersih Bulanan (Take Home Pay)</div>
            <div class="cq-calc-metric-val highlight-profit" id="calc-result-profit">Rp 8.190.000</div>

            <p style="font-size: var(--cq-fs-xs); color: #94a3b8; line-height: 1.6; margin-bottom: var(--cq-sp-20);">
              *Perhitungan di atas adalah estimasi berbasis operasional 30 hari kalender. Tanpa potongan royalti fee franchise bulanan, seluruh margin keuntungan bersih langsung masuk ke rekening pribadi Anda.
            </p>

            <a href="<?php echo esc_url($wa_kemitraan_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasikan Simulasi Ini
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. HARDWARE & MESIN KOMERSIAL HEAVY DUTY
       ======================================================== -->
  <section class="cq-section" id="mesin-peralatan">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Mesin Tangguh untuk Kerja Non-Stop 12–16 Jam</h2>
        <p class="cq-section-desc">
          Banyak pemula gagal karena tergiur mesin cuci rumah tangga murah yang cepat rontok bila dipakai mencuci terus-menerus. Cleanique menyuplai perangkat keras komersial berstandar industri dengan proteksi komponen terbaik.
        </p>
      </div>

      <div class="cq-machinery-grid">
        <!-- Mesin 1: Washer & Dryer Komersial -->
        <div class="cq-machinery-card">
          <div class="cq-machinery-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-washer-dryer.jpg'); ?>" 
                 alt="Mesin Cuci Front Load Komersial dan Dryer Gas Heavy Duty Cleanique Laundry"
                 loading="lazy">
            <span class="cq-machinery-tag">
              Commercial Front Load &amp; Gas Dryer
            </span>
          </div>
          <div class="cq-machinery-body">
            <h3 class="cq-machinery-title">Set Mesin Cuci Front Load &amp; Dryer Gas Heavy Duty</h3>
            <p class="cq-machinery-desc">
              Kombinasi drum stainless steel berdaya putar tinggi (G-force tinggi) yang memeras air pakaian hingga 70% lebih kering sebelum masuk ke dryer pengering gas. Kering 100% tanpa dijemur dalam 45 menit siap lipat.
            </p>

            <div class="cq-machinery-specs-grid">
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Kapasitas Tabung</span>
                <span class="cq-machinery-spec-val">10.5 Kg – 20 Kg Bed Cover</span>
              </div>
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Sumber Panas</span>
                <span class="cq-machinery-spec-val">Gas LPG Safety Valve Konversi</span>
              </div>
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Konsumsi Listrik</span>
                <span class="cq-machinery-spec-val">Hemat Listrik (150 - 450 Watt)</span>
              </div>
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Garansi Resmi</span>
                <span class="cq-machinery-spec-val">1 Tahun Servis &amp; Sparepart</span>
              </div>
            </div>

            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
              Lihat Spesifikasi Lengkap Mesin Cuci &amp; Dryer
            </a>
          </div>
        </div>

        <!-- Mesin 2: Boiler Setrika Uap -->
        <div class="cq-machinery-card">
          <div class="cq-machinery-img-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-boiler-iron.jpg'); ?>" 
                 alt="Boiler Setrika Uap Gas Otomatis dan Meja Vacuum Laundry Sleman Yogyakarta"
                 loading="lazy">
            <span class="cq-machinery-tag">
              Boiler Steam 15L - 25L &amp; Vacuum Table
            </span>
          </div>
          <div class="cq-machinery-body">
            <h3 class="cq-machinery-title">Boiler Setrika Uap Gas Otomatis &amp; Meja Vacuum</h3>
            <p class="cq-machinery-desc">
              Finishing pakaian licin seketika hanya dengan sekali usap. Uap kering bertekanan tinggi 3-4 bar tidak meninggalkan bekas gosong atau kilap pada pakaian pelanggan, bekerja 3x lebih cepat dibanding setrika listrik rumah tangga.
            </p>

            <div class="cq-machinery-specs-grid">
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Tekanan Uap</span>
                <span class="cq-machinery-spec-val">3 – 4 Bar Dry Steam Kering</span>
              </div>
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Kapasitas Tangki</span>
                <span class="cq-machinery-spec-val">15 Liter / 25 Liter Otomatis</span>
              </div>
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Kecepatan Setrika</span>
                <span class="cq-machinery-spec-val">3x Lebih Cepat dari Listrik</span>
              </div>
              <div class="cq-machinery-spec-item">
                <span class="cq-machinery-spec-lbl">Perawatan</span>
                <span class="cq-machinery-spec-val">Katup Pengaman Safety Valve</span>
              </div>
            </div>

            <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Tanya Ketersediaan Boiler &amp; Meja Setrika
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       6. PABRIK CHEMICAL ORCHID BRAND (Industrial Credibility)
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
       7. MATRIKS PERBANDINGAN BERANI: CLEANIQUE VS LAINNYA
       ======================================================== -->
  <section class="cq-section" id="perbandingan">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Bandingkan Bersama Cleanique Laundry</h2>
        <p class="cq-section-desc">
          Kami mengutamakan kejujuran tanpa klausul tersembunyi. Simak perbandingan model bisnis kemitraan Cleanique bersama PT Indotech Berkah Abadi terhadap opsi lainnya.
        </p>
      </div>

      <div class="cq-compare-wrap">
        <table class="cq-compare-table">
          <thead>
            <tr>
              <th style="width: 32%;">Parameter Kemitraan</th>
              <th class="col-cleanique" style="width: 28%;">
                Cleanique Laundry<br>
                <span style="font-size: 11px; font-weight: 600; color: var(--brand-deep);">PT Indotech Berkah Abadi</span>
              </th>
              <th style="width: 20%;">Franchise Laundry Lain</th>
              <th style="width: 20%;">Buka Sendiri Tanpa SOP</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <span class="cq-compare-param">Biaya Royalti Bulanan (Royalty Fee)</span>
                <span class="cq-compare-sub">Potongan dari total omzet kotor setiap bulan</span>
              </td>
              <td class="col-cleanique">
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> 0% (Gratis Selamanya)</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> 5% - 10% Omzet</span>
              </td>
              <td>
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> 0% Tanpa Royalti</span>
              </td>
            </tr>

            <tr>
              <td>
                <span class="cq-compare-param">Status Kepemilikan Mesin &amp; Outlet</span>
                <span class="cq-compare-sub">Hak atas aset fisik setelah investasi modal</span>
              </td>
              <td class="col-cleanique">
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> 100% Hak Milik Mitra</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Sistem Sewa / Hak Pakai</span>
              </td>
              <td>
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> Hak Milik Pribadi</span>
              </td>
            </tr>

            <tr>
              <td>
                <span class="cq-compare-param">Sumber Pasokan Bahan Kimia (Chemical)</span>
                <span class="cq-compare-sub">Deterjen, softener, pelicin setrika &amp; parfum</span>
              </td>
              <td class="col-cleanique">
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> Harga Pabrik Produsen</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Wajib Beli Mark-Up Mahal</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Beli Eceran Tak Terstandar</span>
              </td>
            </tr>

            <tr>
              <td>
                <span class="cq-compare-param">Sistem Kasir Digital &amp; Nota WhatsApp</span>
                <span class="cq-compare-sub">Aplikasi POS cloud anti-kebocoran kasir</span>
              </td>
              <td class="col-cleanique">
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> Termasuk Free POS Cloud</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Biaya Software Bulanan</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Nota Manual Rawan Curang</span>
              </td>
            </tr>

            <tr>
              <td>
                <span class="cq-compare-param">Standar Operasional (SOP) &amp; Pelatihan</span>
                <span class="cq-compare-sub">Training karyawan menangani pakaian luntur &amp; noda</span>
              </td>
              <td class="col-cleanique">
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> SOP Higienis Teruji Lengkap</span>
              </td>
              <td>
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> Ada SOP (Banyak Denda)</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Tanpa Panduan / Trial-Error</span>
              </td>
            </tr>

            <tr>
              <td>
                <span class="cq-compare-param">Dukungan Teknisi &amp; Sparepart Mesin</span>
                <span class="cq-compare-sub">Kecepatan penanganan saat mesin cuci atau dryer error</span>
              </td>
              <td class="col-cleanique">
                <span class="cq-compare-val-pos"><i class="ri-checkbox-circle-fill"></i> Teknisi Resmi PT Indotech</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Pihak Ketiga Lambat</span>
              </td>
              <td>
                <span class="cq-compare-val-neg"><i class="ri-close-circle-fill"></i> Sulit Cari Teknisi Ahli</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ========================================================
       8. 5 LANGKAH ROADMAP MENUJU GRAND OPENING
       ======================================================== -->
  <!-- ========================================================
       8. ROADMAP KEMITRAAN & KURIKULUM PELATIHAN SOP RESMI
       (Komponen Timeline Vertikal & Akreditasi SOP - Matches User Design)
       ======================================================== -->
  <section class="cq-timeline-section" id="alur-kemitraan">
    <!-- Giant Outlined Typography Background (as in screenshot) -->
    <div class="cq-timeline-watermark" aria-hidden="true">
      PELATIHAN &bull; SOP AKREDITASI &bull; ROADMAP
    </div>

    <div class="cq-container">
      <div class="cq-section-header" style="position: relative; z-index: 2;">
        <h2 class="cq-section-title">Roadmap Menuju Sukses Pembukaan Outlet</h2>
        <p class="cq-section-desc">
          Dari survey kelayakan ruko, pengiriman unit mesin resmi Sleman, pelatihan SOP cuci higienis, hingga grand opening dan pasokan chemical berkelanjutan.
        </p>
      </div>

      <div class="cq-timeline-wrap">
        <!-- Connecting Vertical Axis Track -->
        <div class="cq-timeline-track" aria-hidden="true"></div>

        <!-- Milestone 1 -->
        <div class="cq-timeline-item">
          <!-- Concentric Double-Ring Milestone Node -->
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring"></div>
          </div>

          <!-- Floating Pill Badge -->
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot"></span> TAHAP 01 &bull; PERSIAPAN
          </div>

          <!-- Technical Card -->
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" aria-hidden="true">
                <i class="ri-survey-line"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Konsultasi Lokasi &amp; Rancangan Kapasitas Mesin</h3>
                <div class="cq-timeline-meta">
                  <span>HARI 1–3</span> &bull; <span>EVALUASI PASAR &amp; KELISTRIKAN</span>
                </div>
              </div>
            </div>

            <p class="cq-timeline-card-desc">
              Diskusi komprehensif bersama tim konsultan mengenai target segmen pelanggan sekitar ruko (mahasiswa, keluarga perumahan, atau asrama), analisis daya listrik (1.300 - 2.200 VA), ketersediaan debit air bersih, serta pemilihan paket investasi yang paling tepat tanpa beban royalti.
            </p>

            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Analisis Kelayakan Ruko</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Kalkulasi Modal Awal</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> 0% Royalty Fee Selamanya</span>
            </div>
          </div>
        </div>

        <!-- Milestone 2 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring"></div>
          </div>

          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot dot-blue"></span> TAHAP 02 &bull; ENGINEERING
          </div>

          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" aria-hidden="true">
                <i class="ri-layout-masonry-line"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Perancangan Layout 3D &amp; Instalasi Plumbing Air-Gas</h3>
                <div class="cq-timeline-meta">
                  <span>HARI 4–7</span> &bull; <span>TATA RUANG HIGIENIS &amp; SAFETY</span>
                </div>
              </div>
            </div>

            <p class="cq-timeline-card-desc">
              Penyusunan denah alur kerja cucian agar pakaian kotor dan bersih tidak bersilangan (hygienic workflow). Dilengkapi gambar kerja detail instalasi pipa pembuangan air, booster pump, exhaust ducting pembuangan uap panas dryer, serta manifold gas LPG berstandar keselamatan tinggi.
            </p>

            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Desain Layout Ruko Higienis</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Pipa Tembaga Gas Standar SNI</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Exhaust Pembuangan Panas</span>
            </div>
          </div>
        </div>

        <!-- Milestone 3 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring"></div>
          </div>

          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot dot-mint"></span> TAHAP 03 &bull; INSTALASI MESIN
          </div>

          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" aria-hidden="true">
                <i class="ri-truck-line"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Pengiriman Unit Mesin &amp; Kalibrasi Teknisi Sleman</h3>
                <div class="cq-timeline-meta">
                  <span>HARI 8–14</span> &bull; <span>RUNNING TEST &amp; KALIBRASI RESMI</span>
                </div>
              </div>
            </div>

            <p class="cq-timeline-card-desc">
              Mesin cuci front load komersial, dryer konversi gas heavy-duty, dan boiler setrika uap otomatis dikirim langsung dari workshop PT Indotech Berkah Abadi Sleman. Teknisi resmi internal kami melakukan pemasangan fisik, kalibrasi putaran dinamo, uji kebocoran gas, dan running test 100% sampai siap pakai.
            </p>

            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Garansi Resmi Servis 1 Tahun</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Teknisi Internal PT Indotech</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Uji Running Test Onsite</span>
            </div>
          </div>
        </div>

        <!-- Milestone 4 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring"></div>
          </div>

          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot"></span> TAHAP 04 &bull; PELATIHAN &amp; AKREDITASI
          </div>

          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" aria-hidden="true">
                <i class="ri-award-line"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Pelatihan SOP Operasional &amp; Sertifikasi Kasir POS</h3>
                <div class="cq-timeline-meta">
                  <span>HARI 15–18</span> &bull; <span>HANDS-ON PRAKTEK KARYAWAN &amp; OWNER</span>
                </div>
              </div>
            </div>

            <p class="cq-timeline-card-desc">
              Pelatihan intensif bagi staf kasir dan operator: teknik pemisahan jenis kain, takaran deterjen low foam Oxy-Brite Orchid Brand, teknik spotting noda karat dan minyak, teknik setrika uap 3x lebih cepat, serta operasional software kasir POS Cloud Cleanique untuk kirim nota WhatsApp otomatis.
            </p>

            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> SOP Chemical Orchid Brand</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Finishing Uap Standar Hotel</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Aplikasi Kasir POS WhatsApp</span>
            </div>
          </div>
        </div>

        <!-- Milestone 5 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring"></div>
          </div>

          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot dot-mint"></span> TAHAP 05 &bull; GO-LIVE &amp; OUTLET RESMI
          </div>

          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" aria-hidden="true">
                <i class="ri-rocket-2-line"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Grand Opening Outlet &amp; Rantai Pasok Berkelanjutan</h3>
                <div class="cq-timeline-meta">
                  <span>HARI 20+</span> &bull; <span>100% SIAP LAYANI PELANGGAN</span>
                </div>
              </div>
            </div>

            <p class="cq-timeline-card-desc">
              Outlet resmi dibuka untuk masyarakat luas dengan panduan promosi opening (kupon diskon perdana, optimasi titik Google Maps bisnis lokal). Pasokan deterjen, softener, dan parfum laundry Orchid Brand terjamin aman langsung dari pabrik dengan harga tangan pertama selamanya.
            </p>

            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Pasokan Chemical Harga Pabrik</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> Promosi Grand Opening</span>
              <span class="cq-timeline-tag-item"><i class="ri-checkbox-circle-line"></i> 100% Hak Milik Keuntungan Anda</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       9. BUKTI NYATA & TESTIMONI MITRA OUTLET
       ======================================================== -->
  <section class="cq-section" id="testimoni">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Kisah Sukses Mitra Cleanique Laundry</h2>
        <p class="cq-section-desc">
          Ratusan wirausaha telah membuktikan kemandirian finansial bersama ekosistem Cleanique Laundry dan pasokan chemical PT Indotech Berkah Abadi.
        </p>
      </div>

      <div class="cq-testi-grid">
        <!-- Testimoni 1 -->
        <div class="cq-testi-card">
          <div class="cq-testi-quote-icon" aria-hidden="true">
            <i class="ri-double-quotes-l"></i>
          </div>
          <p class="cq-testi-text">
            "Awalnya ragu karena banyak franchise minta royalti 10%. Di Cleanique beneran 0% royalti selamanya! Omzet outlet saya di dekat kampus tembus Rp 28 - 32 juta per bulan. Wangi parfum Orchid Brand varian Akasia dan Snappy jadi favorit langganan mahasiswa."
          </p>
          <div class="cq-testi-author-row">
            <div class="cq-testi-avatar">JS</div>
            <div class="cq-testi-meta">
              <strong>Mas Joko Susanto</strong>
              <span>Mitra Outlet Sleman &bull; Paket Komersial Pro Ruko</span>
              <span class="cq-testi-badge">Buka Sejak 2022</span>
            </div>
          </div>
        </div>

        <!-- Testimoni 2 -->
        <div class="cq-testi-card">
          <div class="cq-testi-quote-icon" aria-hidden="true">
            <i class="ri-double-quotes-l"></i>
          </div>
          <p class="cq-testi-text">
            "Sebelumnya pakai mesin cuci rumah tangga sering rusak dinamonya. Begitu beralih ke paket mesin komersial Cleanique, cuci bed cover tebal cepat selesai dan dryer gasnya bikin cucian kering 100% dalam 45 menit tanpa perlu dijemur di halaman ruko."
          </p>
          <div class="cq-testi-author-row">
            <div class="cq-testi-avatar">RW</div>
            <div class="cq-testi-meta">
              <strong>Ibu Rina Wardani</strong>
              <span>Mitra Outlet Solo &bull; Paket Starter Kiloan</span>
              <span class="cq-testi-badge">Buka Sejak 2023</span>
            </div>
          </div>
        </div>

        <!-- Testimoni 3 -->
        <div class="cq-testi-card">
          <div class="cq-testi-quote-icon" aria-hidden="true">
            <i class="ri-double-quotes-l"></i>
          </div>
          <p class="cq-testi-text">
            "Sistem kasir POS WhatsApp-nya sangat membantu saya yang punya kesibukan lain. Saya bisa pantau arus kas harian dan tutup shift kasir lewat HP dari mana saja. Pelanggan juga senang karena ada link pelacakan cucian langsung di WA mereka."
          </p>
          <div class="cq-testi-author-row">
            <div class="cq-testi-avatar">HK</div>
            <div class="cq-testi-meta">
              <strong>Bpk. H. Hendra K.</strong>
              <span>Mitra Outlet Magelang &bull; Paket Industrial Express</span>
              <span class="cq-testi-badge">Buka Sejak 2021</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       10. SHOWROOM & WORKSHOP SLEMAN, YOGYAKARTA (Kredibilitas)
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="tentang-kami">
    <div class="cq-container">
      <div class="cq-visual-split" style="margin-bottom: var(--cq-sp-48);">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>"
               alt="Pusat Layanan Teknis &amp; Workshop PT Indotech Berkah Abadi Yogyakarta"
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <h3 style="font-family: var(--cq-font-heading); font-size: clamp(1.6rem, 1.3rem + 1vw, 2.2rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.25; margin-bottom: var(--cq-sp-16);">
            Bukan Makelar, Kami Adalah Produsen &amp; Pengembang Langsung
          </h3>
          <p style="color: var(--cq-text-muted); line-height: 1.7; margin-bottom: var(--cq-sp-16);">
            <strong>PT Indotech Berkah Abadi</strong> menghadirkan standar mutu tinggi pada setiap produk: dari formulasi deterjen rendah busa dan parfum laundry microcapsule *Orchid Brand*, pemilihan mesin cuci heavy-duty komersial bergaransi, hingga perancangan aplikasi kasir berbasis cloud yang aman.
          </p>
          <div class="cq-stat-chips-row">
            <span class="cq-stat-chip"><i class="ri-flask-line" aria-hidden="true"></i> Pabrik Kimia Sendiri Sleman</span>
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

      <!-- Showroom Box Sleman DIY -->
      <div class="cq-showroom-box">
        <div>
          <h2 class="cq-showroom-title">Ingin Melihat Mesin &amp; Coba Chemical Langsung?</h2>
          <p class="cq-showroom-desc">
            Pintu workshop dan showroom kami di Sleman, D.I. Yogyakarta terbuka lebar untuk calon mitra. Saksikan demo langsung kekuatan mesin cuci komersial, rasakan aroma mewah parfum Orchid Brand, dan diskusikan rencana bisnis Anda bersama konsultan kami.
          </p>

          <div class="cq-showroom-features">
            <div class="cq-showroom-feat-item">
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Demo Unit Mesin Cuci &amp; Dryer Aktif
            </div>
            <div class="cq-showroom-feat-item">
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Uji Coba Kualitas Chemical Pabrik
            </div>
            <div class="cq-showroom-feat-item">
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Konsultasi Layout Plumbing &amp; Gas
            </div>
            <div class="cq-showroom-feat-item">
              <i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Buka Setiap Senin – Sabtu
            </div>
          </div>

          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="<?php echo esc_url($wa_kemitraan_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill" target="_blank" rel="noopener">
              <i class="ri-calendar-check-line" aria-hidden="true"></i> Jadwalkan Kunjungan Showroom
            </a>
            <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill" style="color: #fff; border-color: rgba(255,255,255,0.35);">
              <i class="ri-map-pin-line" aria-hidden="true"></i> Peta Lokasi Sleman
            </a>
          </div>
        </div>

        <div class="cq-showroom-card-right">
          <div class="cq-showroom-contact-row">
            <div class="cq-showroom-contact-item">
              <i class="ri-building-4-fill" aria-hidden="true"></i>
              <div>
                <strong>Kantor &amp; Workshop Resmi</strong>
                <p><?php echo esc_html($office_addr); ?></p>
              </div>
            </div>

            <div class="cq-showroom-contact-item">
              <i class="ri-time-fill" aria-hidden="true"></i>
              <div>
                <strong>Jam Operasional Kunjungan</strong>
                <p>Senin – Sabtu: 08.00 – 17.00 WIB<br>(Minggu &amp; Hari Libur Nasional tutup)</p>
              </div>
            </div>

            <div class="cq-showroom-contact-item">
              <i class="ri-phone-fill" aria-hidden="true"></i>
              <div>
                <strong>Hotline Konsultasi Kemitraan</strong>
                <p>WhatsApp: 0812-3456-7890<br>Telepon: (0274) 889-1234</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       11. ARTIKEL & EDUKASI BISNIS LAUNDRY TERBARU
       ======================================================== -->
  <section class="cq-section" id="berita">
    <div class="cq-container">
      <div class="cq-section-header">
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
                <span><i class="ri-calendar-line" aria-hidden="true"></i> <?php echo get_the_date(); ?></span> &bull; 
                <span><i class="ri-user-line" aria-hidden="true"></i> <?php echo esc_html(get_the_author() ?: 'Tim Indotech'); ?></span>
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
        <a href="<?php echo esc_url(home_url('/artikel/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
          Lihat Semua Artikel &amp; Panduan <i class="ri-arrow-right-line" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       12. FAQ AKORDEON KOMPREHENSIF
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="faq">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Pertanyaan yang Sering Diajukan Calon Mitra</h2>
        <p class="cq-section-desc">Jawaban transparan seputar sistem kemitraan, mesin, pasokan chemical, dan dukungan teknis kami.</p>
      </div>

      <div class="cq-accordion" style="max-width: 860px; margin: 0 auto;">
        <!-- FAQ 1 -->
        <div class="cq-accordion-item is-open">
          <button type="button" class="cq-accordion-trigger" aria-expanded="true">
            <span>Apakah benar kemitraan Cleanique Laundry tanpa royalti fee selamanya?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              <strong>Ya, 100% benar.</strong> Kami tidak memungut royalty fee bulanan, profit sharing, maupun franchise fee tahunan. Seluruh pendapatan kotor dan keuntungan bersih operasional outlet menjadi hak penuh Anda sebagai pemilik usaha. Model bisnis kami murni sebagai produsen chemical Orchid Brand dan penyedia mesin resmi.
            </p>
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Bagaimana jika saya belum memiliki lokasi atau ruko usaha?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Tim konsultan kami siap membantu melakukan evaluasi dan kriteria kelayakan lokasi (traffic, kepadatan penduduk, kompetitor, ketersediaan air bersih dan daya listrik). Anda dapat berkonsultasi terlebih dahulu mengenai kriteria ruko ideal sebelum menandatangani sewa tempat.
            </p>
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Berapa kapasitas daya listrik dan sumber air yang dibutuhkan?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Karena mesin pengering kami menggunakan sistem konversi gas LPG dan boiler setrika uap juga berbahan bakar gas, kebutuhan daya listrik relatif hemat. Untuk Paket Starter atau Komersial Pro, daya listrik 1.300 Watt hingga 2.200 Watt sudah sangat memadai untuk menghidupkan mesin cuci, lampu, pompa air, dan komputer kasir.
            </p>
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Bagaimana cara melakukan pemesanan ulang (repeat order) bahan kimia?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Mitra dapat memesan chemical secara langsung melalui admin rantai pasok pabrik kami atau lewat sistem kasir Cleanique. Pengiriman dilakukan langsung dari pabrik PT Indotech Berkah Abadi di Sleman atau cabang stockist terdekat dengan harga produsen tangan pertama.
            </p>
          </div>
        </div>

        <!-- FAQ 5 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Apakah karyawan kami akan dilatih sampai benar-benar mahir?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Pasti. Kami memberikan training komprehensif mencakup standar operasional pemisahan jenis kain, takaran deterjen low foam dan pelembut, teknik setrika uap cepat anti kusut, penanganan komplain pakaian, hingga pengoperasian aplikasi kasir POS WhatsApp.
            </p>
          </div>
        </div>

        <!-- FAQ 6 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Apakah ada garansi mesin dan ketersediaan teknisi bila terjadi kendala?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Setiap paket kemitraan dilengkapi garansi servis dan suku cadang mesin resmi selama 1 tahun. Tim teknisi internal PT Indotech siap melakukan kunjungan perawatan maupun perbaikan cepat agar operasional outlet Anda tidak terhenti.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       13. KONTAK & SHOWROOM WORKSHOP SLEMAN (Corporate Hub)
       ======================================================== -->
  <section class="cq-section cq-section-dark cq-banner-cta-section" id="kontak">
    <div class="cq-container cq-section-header">
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

<!-- Schema.org FAQPage Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Apakah benar kemitraan Cleanique Laundry tanpa royalti fee selamanya?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ya, 100% benar. Kami tidak memungut royalty fee bulanan, profit sharing, maupun franchise fee tahunan. Seluruh pendapatan kotor dan keuntungan bersih operasional outlet menjadi hak penuh Anda sebagai pemilik usaha."
      }
    },
    {
      "@type": "Question",
      "name": "Bagaimana jika saya belum memiliki lokasi atau ruko usaha?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Tim konsultan kami siap membantu melakukan evaluasi dan kriteria kelayakan lokasi seperti traffic, kepadatan penduduk, kompetitor, ketersediaan air bersih dan daya listrik."
      }
    },
    {
      "@type": "Question",
      "name": "Berapa kapasitas daya listrik dan sumber air yang dibutuhkan?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Karena mesin pengering menggunakan sistem konversi gas LPG dan boiler setrika uap berbahan bakar gas, kebutuhan daya listrik hanya 1.300 - 2.200 Watt."
      }
    },
    {
      "@type": "Question",
      "name": "Bagaimana cara melakukan pemesanan ulang (repeat order) bahan kimia?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Mitra dapat memesan chemical secara langsung melalui admin rantai pasok pabrik kami atau lewat sistem kasir Cleanique dengan harga produsen tangan pertama."
      }
    },
    {
      "@type": "Question",
      "name": "Apakah karyawan kami akan dilatih sampai benar-benar mahir?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pasti. Kami memberikan training komprehensif mencakup standar operasional pemisahan jenis kain, takaran chemical, teknik setrika uap, dan pengoperasian POS kasir digital."
      }
    },
    {
      "@type": "Question",
      "name": "Apakah ada garansi mesin dan ketersediaan teknisi bila terjadi kendala?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Setiap paket kemitraan dilengkapi garansi servis dan suku cadang mesin resmi selama 1 tahun dengan tim teknisi internal PT Indotech yang siaga."
      }
    }
  ]
}
</script>

<?php
get_footer();
