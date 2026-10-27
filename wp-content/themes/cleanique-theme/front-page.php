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
       1. CORPORATE HERO SECTION (Split Visual & Dual Gateway)
       ======================================================== -->
  <section class="cq-corp-hero" id="beranda">
    <div class="cq-container">
      <!-- Top Row: Corporate Headline & Flagship Outlet Showcase -->
      <div class="cq-corp-hero-top">
        <div class="cq-corp-hero-content">
          <span class="cq-badge-clean">Kantor Pusat</span>
          
          <h1 class="cq-corp-hero-title cq-payno-heading">
            Kembangkan Bisnis Laundry, <span class="cq-text-accent cq-text-blue">Dengan Mesin Tangguh, Chemical Pabrik &amp; Sistem Cerdas.</span>
          </h1>

          <p class="cq-corp-hero-desc">
            <strong>Cleanique Laundry</strong> adalah ekosistem bisnis terpadu dari <strong>PT Indotech Berkah Abadi</strong>. Kami menyediakan paket usaha laundry mandiri siap beroperasi, pasokan bahan kimia standar industri langsung dari pabrik, serta aplikasi kasir digital Smart POS berbasis langganan untuk menunjang kelancaran bisnis Anda.
          </p>

          <div class="cq-corp-hero-actions">
            <a href="<?php echo esc_url($wa_kemitraan_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
            </a>
            <a href="#kemitraan" class="cq-btn cq-btn-outline cq-btn-pill">
              Pilihan Paket
            </a>
          </div>
        </div>

        <div class="cq-corp-hero-visual">
          <div class="cq-hero-visual-frame">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" 
                 alt="Standar Outlet Kemitraan Laundry Cleanique Modern &amp; Higienis" 
                 class="cq-hero-visual-img" 
                 loading="lazy">
            <div class="cq-hero-visual-caption">
              Standar Outlet
            </div>
          </div>
        </div>
      </div>

      <!-- 2 Modern Corporate Gateway Bento Cards (With Visual Images) -->
      <div class="cq-corp-gateway-grid">
        <!-- Gateway Card 1: Paket Penjualan Usaha Laundry Mandiri -->
        <div class="cq-corp-gateway-card">
          <div class="cq-gateway-thumb-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-washer-dryer.jpg'); ?>" 
                 alt="Paket Penjualan Usaha Laundry Mesin Komersial Heavy Duty" 
                 class="cq-gateway-thumb-img" 
                 loading="lazy">
          </div>
          <div class="cq-corp-gateway-header">
            <div>
              <span class="cq-corp-gateway-sub">Peluang Usaha</span>
              <h2 class="cq-corp-gateway-title">Paket Usaha Laundry Siap Buka</h2>
            </div>
          </div>

          <p class="cq-corp-card-desc">
            Paket investasi mandiri komplit dengan unit mesin cuci &amp; pengering komersial heavy-duty bergaransi resmi pabrik, instalasi pemipaan air &amp; gas standar keselamatan, pasokan awal chemical pabrik Orchid Brand, dan SOP operasional lengkap hingga grand opening. 100% kepemilikan aset &amp; keuntungan milik Anda tanpa potongan omzet bulanan.
          </p>

          <ul class="cq-corp-gateway-bullets">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Mesin cuci front load &amp; dryer komersial heavy-duty bergaransi resmi</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Pasokan chemical standar industri langsung dari pabrik Sleman</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> 100% kepemilikan aset mesin &amp; keuntungan harian milik Anda</li>
          </ul>

          <div class="cq-gateway-footer">
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block">
              Lihat Paket
            </a>
          </div>
        </div>

        <!-- Gateway Card 2: Smart Laundry Management System (POS Langganan) -->
        <div class="cq-corp-gateway-card">
          <div class="cq-gateway-thumb-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" 
                 alt="Aplikasi Smart Laundry Management Kasir POS WhatsApp" 
                 class="cq-gateway-thumb-img" 
                 loading="lazy">
          </div>
          <div class="cq-corp-gateway-header">
            <div>
              <span class="cq-corp-gateway-sub" style="color: #059669;">Sistem POS</span>
              <h2 class="cq-corp-gateway-title">Smart Laundry Management POS</h2>
            </div>
          </div>

          <p class="cq-corp-card-desc">
            Software manajemen kasir digital berbasis cloud dengan biaya langganan transparan. Menggantikan nota kertas manual yang rentan kecurangan dengan nota otomatis WhatsApp, pelacakan live status cucian mandiri oleh pelanggan, serta audit tutup shift kasir harian dari smartphone Anda.
          </p>

          <ul class="cq-corp-gateway-bullets">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Nota digital otomatis ke WhatsApp pelanggan tanpa printer kasir</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Link pelacakan mandiri status cucian secara real-time</li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Laporan arus kas, tutup shift &amp; rekap omzet di smartphone</li>
          </ul>

          <div class="cq-gateway-footer">
            <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-block">
              Detail Sistem
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. EKOSISTEM & SOLUSI TERPADU CLEANIQUE LAUNDRY
       (Alternating Zigzag Showcase: Kiri-Kanan Selang-Seling dengan Image)
       ======================================================== -->
  <section class="cq-showcase-section" id="ekosistem">
    <div class="cq-container">
      <div class="cq-showcase-header">
        <span class="cq-badge-clean">Ekosistem Terpadu</span>
        <h2 class="cq-showcase-header-title">
          Dukungan Lengkap dari Mesin, Chemical Pabrik, hingga Sistem Kasir
        </h2>
        <p class="cq-showcase-header-desc">
          Bukan sekadar penjual mesin lepasan atau waralaba konvensional dengan royalti memberatkan. Bersama PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta, Anda memperoleh kepemilikan aset 100% dan suplai industri terpadu.
        </p>
      </div>

      <div class="cq-showcase-list">
        <!-- Row 1: Mesin Cuci & Dryer Heavy Duty (Image Kiri, Konten Kanan) -->
        <div class="cq-showcase-row is-reversed" id="hardware-mesin">
          <div class="cq-showcase-visual">
            <div class="cq-showcase-window">
              <div class="cq-showcase-topbar">
                <div class="cq-showcase-dots">
                  <span></span><span></span><span></span>
                </div>
                <span class="cq-showcase-titlebar">Hardware Komersial &bull; Heavy Duty</span>
              </div>
              <div class="cq-showcase-img-box">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-washer-dryer.jpg'); ?>" 
                     alt="Set Mesin Cuci Front Load dan Pengering Gas Heavy Duty Cleanique Laundry" 
                     class="cq-showcase-img"
                     loading="lazy"
                     width="1200"
                     height="800">
              </div>
            </div>
          </div>
          <div class="cq-showcase-content">
            <span class="cq-badge-clean">Mesin Komersial</span>
            <h3 class="cq-showcase-title">Mesin Komersial Heavy Duty, Tahan Putaran Non-Stop</h3>
            <p class="cq-showcase-lead">
              Bukan mesin cuci rumah tangga biasa yang cepat jebol bila dipaksa bekerja maraton setiap hari. Cleanique menyuplai set mesin front-loading drum stainless steel SUS304 berdaya putar tinggi dan dryer konversi gas bergaransi resmi.
            </p>
            <ul class="cq-showcase-specs">
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Putaran RPM Tinggi:</strong> Drum SUS304 memeras air cucian hingga 70% lebih kering sebelum masuk dryer.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Pengering Gas Konversi:</strong> Pakaian kering 100% tuntas dalam 45 menit siap lipat tanpa perlu dijemur.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Garansi Servis Resmi:</strong> Didukung ketersediaan suku cadang dan teknisi terlatih PT Indotech.</span>
              </li>
            </ul>
            <div class="cq-showcase-action">
              <a href="#kemitraan" class="cq-btn cq-btn-primary cq-btn-pill">
                Lihat Paket
              </a>
            </div>
          </div>
        </div>

        <!-- Row 2: Pabrik Chemical Orchid Brand (Konten Kiri, Image Kanan) -->
        <div class="cq-showcase-row" id="pabrik-chemical">
          <div class="cq-showcase-content">
            <span class="cq-badge-clean">Pabrik Kimia</span>
            <h3 class="cq-showcase-title">Bahan Kimia Laundry Kualitas Pabrik dengan HPP Hemat</h3>
            <p class="cq-showcase-lead">
              Diproduksi langsung oleh PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta. Deterjen konsentrat rendah busa menjaga dinamo mesin cuci tetap awet dan hemat bilasan air, serta parfum microcapsule wangi tahan 30 hari di lemari.
            </p>
            <ul class="cq-showcase-specs">
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Harga Produsen Tangan Pertama:</strong> Memangkas HPP mencuci per kilogram sehingga margin laba outlet lebih tebal.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Higienis &amp; Ramah Lingkungan:</strong> Izin edar resmi, lulus uji laboratorium, dan lembut menjaga serat pakaian.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Spotting Noda Khusus:</strong> Formula penghilang noda membandel: darah, karat, jamur, dan oli mesin.</span>
              </li>
            </ul>
            <div class="cq-showcase-action">
              <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
                Pabrik Kimia
              </a>
            </div>
          </div>
          <div class="cq-showcase-visual">
            <div class="cq-showcase-window">
              <div class="cq-showcase-topbar">
                <div class="cq-showcase-dots">
                  <span></span><span></span><span></span>
                </div>
                <span class="cq-showcase-titlebar">Pabrik Chemical &bull; Orchid Brand</span>
              </div>
              <div class="cq-showcase-img-box">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" 
                     alt="Produksi Bahan Kimia Laundry Standar Pabrik PT Indotech Berkah Abadi" 
                     class="cq-showcase-img"
                     loading="lazy"
                     width="1200"
                     height="800">
              </div>
            </div>
          </div>
        </div>

        <!-- Row 3: Smart Laundry Management POS (Image Kiri, Konten Kanan) -->
        <div class="cq-showcase-row is-reversed" id="smart-pos">
          <div class="cq-showcase-visual">
            <div class="cq-showcase-window">
              <div class="cq-showcase-topbar">
                <div class="cq-showcase-dots">
                  <span></span><span></span><span></span>
                </div>
                <span class="cq-showcase-titlebar">Smart POS &bull; Cloud Dashboard</span>
              </div>
              <div class="cq-showcase-img-box">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" 
                     alt="Tampilan Dashboard Smart Laundry Management POS dan E-Nota WhatsApp" 
                     class="cq-showcase-img"
                     loading="lazy"
                     width="1200"
                     height="800">
              </div>
            </div>
          </div>
          <div class="cq-showcase-content">
            <span class="cq-badge-clean">Smart POS</span>
            <h3 class="cq-showcase-title">Dashboard Kasir Real-Time &amp; E-Nota WhatsApp Otomatis</h3>
            <p class="cq-showcase-lead">
              Tinggalkan pembukuan nota manual kertas yang rentan sobek, hilang, dan rawan kebocoran kasir. Software kasir POS berbasis cloud Cleanique dirancang khusus untuk operasional laundry kiloan maupun satuan dengan skema biaya langganan yang transparan.
            </p>
            <ul class="cq-showcase-specs">
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>E-Nota Digital WhatsApp:</strong> Nota otomatis terkirim langsung ke nomor WhatsApp pelanggan tanpa kertas printer.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Tracking Mandiri Pelanggan:</strong> Konsumen dapat memantau status cucian (proses cuci, kering, setrika, siap ambil).</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Audit Arus Kas &amp; Tutup Shift:</strong> Pantau saldo kasir, setoran kas laci, dan rekap omzet harian dari smartphone.</span>
              </li>
            </ul>
            <div class="cq-showcase-action">
              <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill">
                Lihat Fitur
              </a>
            </div>
          </div>
        </div>

        <!-- Row 4: Finishing Boiler Setrika Uap (Konten Kiri, Image Kanan) -->
        <div class="cq-showcase-row" id="boiler-setrika">
          <div class="cq-showcase-content">
            <span class="cq-badge-clean">Boiler Uap</span>
            <h3 class="cq-showcase-title">Boiler Setrika Uap Gas Otomatis, Bekerja 3x Lebih Cepat</h3>
            <p class="cq-showcase-lead">
              Kecepatan dan kerapian setrika adalah kunci utama kepuasan pelanggan laundry kiloan. Dengan uap kering bertekanan tinggi 3–4 bar, serat pakaian licin seketika hanya dengan sekali usap tanpa resiko gosong atau meninggalkan kilap pada kain.
            </p>
            <ul class="cq-showcase-specs">
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Uap Kering Bertekanan Tinggi:</strong> Menembus serat pakaian tebal seperti kemeja, sprei, dan bed cover seketika.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Meja Vacuum dengan Pedal:</strong> Menyedot sisa uap panas agar pakaian langsung dingin, rapi, dan siap di-packing.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Operasional Hemat Gas:</strong> Burner gas LPG otomatis dilengkapi katup pengaman tekanan (safety valve).</span>
              </li>
            </ul>
            <div class="cq-showcase-action">
              <a href="<?php echo esc_url($wa_kemitraan_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill">
                <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Boiler
              </a>
            </div>
          </div>
          <div class="cq-showcase-visual">
            <div class="cq-showcase-window">
              <div class="cq-showcase-topbar">
                <div class="cq-showcase-dots">
                  <span></span><span></span><span></span>
                </div>
                <span class="cq-showcase-titlebar">Finishing Unit &bull; Steam Boiler</span>
              </div>
              <div class="cq-showcase-img-box">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-boiler-iron.jpg'); ?>" 
                     alt="Boiler Setrika Uap Gas Otomatis dan Meja Vacuum Laundry Sleman Yogyakarta" 
                     class="cq-showcase-img"
                     loading="lazy"
                     width="1200"
                     height="800">
              </div>
            </div>
          </div>
        </div>

        <!-- Row 5: SOP, Pelatihan & Teknisi Siaga (Image Kiri, Konten Kanan) -->
        <div class="cq-showcase-row is-reversed" id="teknisi-sop">
          <div class="cq-showcase-visual">
            <div class="cq-showcase-window">
              <div class="cq-showcase-topbar">
                <div class="cq-showcase-dots">
                  <span></span><span></span><span></span>
                </div>
                <span class="cq-showcase-titlebar">PT Indotech &bull; Showroom &amp; Workshop</span>
              </div>
              <div class="cq-showcase-img-box">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>" 
                     alt="Pusat Layanan Teknis &amp; Workshop PT Indotech Berkah Abadi Yogyakarta" 
                     class="cq-showcase-img"
                     loading="lazy"
                     width="1200"
                     height="800">
              </div>
            </div>
          </div>
          <div class="cq-showcase-content">
            <span class="cq-badge-clean">Dukungan Teknis</span>
            <h3 class="cq-showcase-title">Standardisasi Alur Kerja, Pelatihan SOP &amp; Teknisi Siaga</h3>
            <p class="cq-showcase-lead">
              Anda tidak memulai bisnis ini sendirian. Insinyur mesin dan tim operasional PT Indotech Berkah Abadi mengawal mulai dari desain tata letak alur ruko higienis, instalasi pipa &amp; gas safety, hingga pelatihan karyawan dan kunjungan servis berkala.
            </p>
            <ul class="cq-showcase-specs">
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Blueprint Tata Letak Higienis:</strong> Gambar kerja 2D/3D pemisahan alur kerja cucian kotor dan bersih.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Pelatihan Karyawan Tuntas:</strong> Edukasi teknik mencuci, takaran chemical presisi, dan pelayanan kasir POS.</span>
              </li>
              <li class="cq-showcase-spec-item">
                <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                <span><strong>Tim Teknisi Siaga Sleman:</strong> Layanan pemeliharaan berkala, perbaikan mesin cepat, dan stok sparepart resmi.</span>
              </li>
            </ul>
            <div class="cq-showcase-action">
              <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
                Profil Perusahaan
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. PENJUALAN PAKET USAHA KEMITRAAN
       ======================================================== -->
  <section class="cq-section" id="kemitraan">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Pilihan Paket Usaha Laundry Siap Buka</h2>
        <p class="cq-section-desc">
          Investasi transparan sesuai lokasi dan modal usaha Anda. Seluruh paket sudah termasuk mesin komersial, instalasi plumbing aman, paket awal chemical pabrik, dan SOP tuntas tanpa potongan omzet bulanan.
        </p>
      </div>

      <div class="cq-bento-grid cq-bento-grid-3">
        <!-- Paket 1: Starter Kiloan -->
        <div class="cq-kemitraan-card">
          <div class="cq-kemitraan-header">
            <h3 class="cq-corp-card-title">Paket Kiloan Starter</h3>
            <p class="cq-corp-card-desc">Solusi hemat bagi pemula untuk membuka usaha laundry kiloan di perumahan atau area kos mahasiswa.</p>
          </div>
          <div class="cq-kemitraan-price-wrap">
            <div class="cq-kemitraan-price">Mulai Rp 28 Juta-an</div>
            <span class="cq-kemitraan-price-label">Estimasi modal investasi siap buka</span>
          </div>
          <ul class="cq-kemitraan-specs-list">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>1 Unit Mesin Cuci Front Load Komersial</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>1 Unit Mesin Pengering Gas Konversi 10.5 Kg</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Starter Kit Chemical Pabrik Orchid Brand 60 Liter</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Instalasi Plumbing &amp; SOP Operasional Karyawan</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Lisensi Aplikasi Kasir POS Cleanique Laundry</span></li>
          </ul>
          <div class="cq-kemitraan-actions">
            <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Pilih Starter
            </a>
          </div>
        </div>

        <!-- Paket 2: Komersial Pro (Featured) -->
        <div class="cq-kemitraan-card is-featured">
          <div class="cq-kemitraan-ribbon">Paling Populer</div>
          <div class="cq-kemitraan-header">
            <h3 class="cq-corp-card-title">Paket Komersial Pro (Ruko)</h3>
            <p class="cq-corp-card-desc">Kapasitas tinggi untuk lokasi ruko komersial strategis, melayani kiloan cepat dan bed cover tebal.</p>
          </div>
          <div class="cq-kemitraan-price-wrap">
            <div class="cq-kemitraan-price">Mulai Rp 48 Juta-an</div>
            <span class="cq-kemitraan-price-label">Estimasi modal investasi siap buka</span>
          </div>
          <ul class="cq-kemitraan-specs-list">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>2 Unit Mesin Cuci Komersial Front Load Stack</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>2 Unit Mesin Pengering Gas Heavy Duty 10.5 Kg</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Paket Chemical Pabrik Orchid Brand 120 Liter</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Boiler Setrika Uap 15 Liter + Meja Vacuum</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Pelatihan Karyawan &amp; SOP Higienis Onsite</span></li>
          </ul>
          <div class="cq-kemitraan-actions">
            <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Pilih Komersial
            </a>
          </div>
        </div>

        <!-- Paket 3: Industrial Express -->
        <div class="cq-kemitraan-card">
          <div class="cq-kemitraan-header">
            <h3 class="cq-corp-card-title">Paket Industrial Express</h3>
            <p class="cq-corp-card-desc">Spesifikasi mesin heavy-duty berkapasitas besar untuk sentra laundry hotel melati, asrama, dan guesthouse.</p>
          </div>
          <div class="cq-kemitraan-price-wrap">
            <div class="cq-kemitraan-price">Mulai Rp 85 Juta-an</div>
            <span class="cq-kemitraan-price-label">Estimasi modal investasi siap buka</span>
          </div>
          <ul class="cq-kemitraan-specs-list">
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Set Mesin Industri Washer &amp; Dryer Kapasitas Ekstra</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Sistem Boiler Uap Otomatis 25 Liter Multi-Kepala</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Pasokan Kimia Industri Skala Besar Harga Pabrik</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Aplikasi POS Multi-Kasir &amp; Laporan Cloud Terpusat</span></li>
            <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> <span>Pendampingan Manajemen &amp; Pemasaran Grand Opening</span></li>
          </ul>
          <div class="cq-kemitraan-actions">
            <a href="<?php echo esc_url(cleanique_get_whatsapp_url('kemitraan')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Pilih Industrial
            </a>
          </div>
        </div>
      </div>

      <div class="cq-kemitraan-catalog-action">
        <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
          Katalog Paket
        </a>
      </div>
    </div>
  </section>



  <!-- ========================================================
       7. 6 LANGKAH ALUR KEMITRAAN MENUJU GRAND OPENING
       Alur Jelas: Konsultasi - Survei - Perancangan - Setup - Pelatihan - Grand Opening
       ======================================================== -->
  <section class="cq-timeline-section" id="alur-kemitraan">
    <div class="cq-timeline-watermark" aria-hidden="true">ROADMAP</div>
    
    <div class="cq-container">
      <div style="text-align: center; max-width: 720px; margin: 0 auto; position: relative; z-index: 2;">
        <span class="cq-badge-clean" style="margin-bottom: var(--cq-sp-12);">Alur Kemitraan</span>
        <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-12);">
          6 Langkah Alur Kemitraan Menuju Pembukaan Outlet
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: #475569; line-height: 1.65; margin: 0;">
          Proses terstruktur dan terukur dari tahap evaluasi awal hingga outlet mandiri beroperasi dan menghasilkan profit secara berkelanjutan.
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
              Diskusi komprehensif bersama Senior Business Consultant mengenai rencana bisnis, estimasi modal investasi, target pasar (lingkungan kampus, perumahan, atau sentra komersial), serta penentuan paket usaha yang paling tepat dan efisien.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Analisis Anggaran Investasi</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Karakteristik Wilayah Pasar</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Rekomendasi Paket Usaha</span>
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
              Pengecekan teknis kelayakan tempat ruko, aksesibilitas pelanggan, uji kelayakan debit &amp; TDS air, audit daya listrik PLN (kVA), dan ventilasi buangan dryer gas agar aman dan memenuhi regulasi lingkungan.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Audit Kelistrikan PLN</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Uji TDS &amp; Debit Air</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Zonasi Strategis Ruko</span>
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
              Penyusunan denah alur kerja tata letak outlet 2D/3D untuk alur kerja cucian kotor-ke-bersih (anti-kontaminasi silang), instalasi pipa PVC tebal, manifold gas LPG otomatis, exhaust ducting uap, dan penempatan meja setrika uap ergonomis.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Alur Kerja Higienis 2D/3D</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Plumbing Air Masuk &amp; Keluar</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Safety Valve Gas Standar Industri</span>
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
              Pengiriman unit mesin washer &amp; dryer komersial dari workshop Sleman ke lokasi outlet mitra. Teknisi berpengalaman PT Indotech melakukan perakitan unit, kalibrasi putaran RPM, setting pembakar gas, dan pengujian operasional menyeluruh.
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
              Pelatihan intensif bagi staf kasir dan operator: teknik identifikasi kain, takaran chemical presisi dari pabrik Orchid Brand, teknik spotting noda membandel, teknik setrika uap cepat, serta pengoperasian sistem kasir POS Cleanique.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Modul Kimia Rendah Busa</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> SOP Kasir Ramah &amp; Cepat</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Dashboard Omzet di Smartphone Owner</span>
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
                <h3 class="cq-timeline-title">Grand Opening &amp; Pendampingan Berkelanjutan</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Pasca Buka: Pendampingan Seumur Hidup
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Peluncuran resmi outlet melayani konsumen dengan pendampingan strategi promosi opening (diskon kiloan perdana), pendaftaran titik lokasi Google Bisnis Profil (SEO lokal), dan ketersediaan pasokan chemical serta suku cadang seumur hidup.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Materi Promo Spanduk &amp; Flyer</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Setup Google Profil Bisnis</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Prioritas Pasokan Kimia Tangan Pertama</span>
            </div>
          </div>
        </div>
      </div>

      <div class="cq-timeline-cta-row">
        <a href="<?php echo esc_url($wa_kemitraan_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Sekarang
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       8. BUKTI NYATA KISAH SUKSES MITRA OUTLET
       ======================================================== -->
  <?php
  $index_testi_items = [
      [
          'name'       => 'Pak Hendro & Ibu Siska',
          'role'       => 'Owner Cleanique Express • Minomartani, Sleman',
          'quote'      => 'Awalnya ragu karena kami belum pernah bisnis laundry. Sangat terbantu dengan pendampingan teknisi Indotech dari perancangan pipa, kelistrikan sampai training takaran chemical. Deterjen dan parfumnya wangi tahan lama dan hemat karena suplai langsung pabrik. Dalam 6 bulan modal kami sudah balik!',
          'initial'    => 'H',
          'avatar_bg'  => '#0284C7',
          'avatar_img' => get_template_directory_uri() . '/assets/images/mitra-outlet-sleman.jpg',
          'badge'      => 'Balik Modal',
      ],
      [
          'name'       => 'Mas Dimas Pratama',
          'role'       => 'Owner Cleanique Laundry Solo • Jebres, Solo',
          'quote'      => 'Yang paling memuaskan adalah sistem aplikasi kasir Cleanique POS-nya. Nota langsung terkirim WhatsApp ke pelanggan, omzet harian bisa dipantau langsung dari HP sambil saya tetap bekerja kantor. 100% laba operasional masuk ke kantong sendiri tanpa royalti fee!',
          'initial'    => 'D',
          'avatar_bg'  => '#7C3AED',
          'avatar_img' => get_template_directory_uri() . '/assets/images/mitra-outlet-solo.jpg',
          'badge'      => 'Balik Modal',
      ],
      [
          'name'       => 'Ibu Hj. Nurul Hidayati',
          'role'       => 'Owner Cleanique Tembalang • Semarang',
          'quote'      => 'Mesin komersial stack washer & dryer Cleanique benar-benar bandel, bekerja maraton dari pagi sampai malam mesin tetap stabil dan hemat gas. Tim teknisi PT Indotech responsif saat instalasi. Sekarang kami sedang persiapan membuka cabang kedua.',
          'initial'    => 'N',
          'avatar_bg'  => '#059669',
          'avatar_img' => get_template_directory_uri() . '/assets/images/mitra-outlet-semarang.jpg',
          'badge'      => 'Ekspansi Cabang',
      ],
      [
          'name'       => 'dr. Maya Anggraini',
          'role'       => 'Owner Royal Laundromat • 4 Cabang, Bandung',
          'quote'      => 'Mengelola 4 cabang laundry kiloan dan satuan jadi sangat terkontrol dalam satu ekosistem Cleanique. Pasokan chemical pabrik Orchid Brand selalu ready tepat waktu, mesin komersial minim downtime, dan laporan laba rugi terpantau harian dari HP.',
          'initial'    => 'M',
          'avatar_bg'  => '#DB2777',
          'avatar_img' => '',
          'badge'      => 'Multi Outlet',
      ],
      [
          'name'       => 'Hendra Kusuma',
          'role'       => 'Owner Barokah Wash • Mertoyudan, Magelang',
          'quote'      => 'Paket Kemitraan Cleanique benar-benar tanpa embel-embel royalti seumur hidup. Suplai deterjen dan softener langsung dari pabrik Indotech membuat HPP cucian sangat murah dibanding beli eceran. Margin laba bersih outlet kami mencapai 45%.',
          'initial'    => 'H',
          'avatar_bg'  => '#2563EB',
          'avatar_img' => '',
          'badge'      => 'Margin 45%',
      ],
      [
          'name'       => 'Rina Wijayanti',
          'role'       => 'Owner Melati Wash Express • Sleman, Yogyakarta',
          'quote'      => 'Fitur notifikasi WhatsApp otomatis dan nota digital Cleanique membuat pelanggan loyal berlipat ganda. Tidak ada lagi drama nota hilang atau pakaian tertukar. Biaya cetak nota kertas ratusan ribu sebulan sekarang 100% jadi profit bersih!',
          'initial'    => 'R',
          'avatar_bg'  => '#7C3AED',
          'avatar_img' => '',
          'badge'      => 'Paperless',
      ],
      [
          'name'       => 'Budi Santoso',
          'role'       => 'Owner Smart Clean Laundromat • Bantul, Yogyakarta',
          'quote'      => 'Instalasi boiler setrika uap dan mesin dryer gas dari Indotech sangat rapi dan safety. Karyawan kami bisa bekerja 2x lebih cepat dan hemat tenaga. Layanan purna jual teknisinya sangat sigap saat kami butuh konsultasi sparepart.',
          'initial'    => 'B',
          'avatar_bg'  => '#0D9488',
          'avatar_img' => '',
          'badge'      => 'Mesin Safety',
      ],
      [
          'name'       => 'Siti Nurhaliza',
          'role'       => 'Owner Fresh Laundry & Setrika • Solo, Jawa Tengah',
          'quote'      => 'SOP kerja yang diberikan tim Cleanique sangat aplikatif untuk karyawan baru. Takaran chemical presisi menjaga serat kain pelanggan tetap awet dan wangi tahan lama. Outlet kami jadi laundry rujukan di kampus sekitar.',
          'initial'    => 'S',
          'avatar_bg'  => '#059669',
          'avatar_img' => '',
          'badge'      => 'Terverifikasi',
      ],
      [
          'name'       => 'I Wayan Gede',
          'role'       => 'Owner Dewata Clean Laundry • Denpasar, Bali',
          'quote'      => 'Banyak ekspatriat dan tamu villa langganan di tempat kami. Mereka suka sekali karena nota digital WhatsApp-nya rapi dan mendukung multi-payment QRIS. Kasir melayani antrean 2x lebih cepat dibanding pakai nota manual.',
          'initial'    => 'W',
          'avatar_bg'  => '#0891B2',
          'avatar_img' => '',
          'badge'      => 'Terverifikasi',
      ],
  ];

  // Merge with CPT testimoni if available
  $cpt_testi_query = new WP_Query([
      'post_type'      => 'testimoni',
      'posts_per_page' => 6,
      'post_status'    => 'publish',
  ]);
  if ($cpt_testi_query->have_posts()) {
      $cpt_items = [];
      while ($cpt_testi_query->have_posts()) {
          $cpt_testi_query->the_post();
          $city = get_post_meta(get_the_ID(), '_cq_testi_city', true);
          $biz = get_post_meta(get_the_ID(), '_cq_testi_business', true);
          $cpt_items[] = [
              'name'       => get_the_title(),
              'role'       => ($biz ?: 'Mitra Laundry') . ($city ? ' • ' . $city : ''),
              'quote'      => wp_strip_all_tags(get_the_content()),
              'initial'    => strtoupper(substr(get_the_title(), 0, 1)),
              'avatar_bg'  => '#0284C7',
              'avatar_img' => has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : '',
              'badge'      => 'Terverifikasi',
          ];
      }
      wp_reset_postdata();
      if (!empty($cpt_items)) {
          $index_testi_items = array_merge($cpt_items, $index_testi_items);
      }
  }
  ?>
  <section class="cq-payno-testi-section" id="testimoni">
    <div class="cq-container">
      <div class="cq-section-header" style="text-align: center; max-width: 780px; margin: 0 auto;">
        <span class="cq-section-subtitle">Kisah Sukses Mitra Laundry</span>
        <h2 style="font-family: var(--cq-font-heading); font-weight: 300; font-size: clamp(2.2rem, 1.8rem + 2vw, 3.4rem); line-height: 1.15; letter-spacing: -0.03em; color: var(--ink); margin: 0 auto var(--cq-sp-12);">
          Kisah Sukses Mitra Cleanique Laundry<br>
          <span class="cq-text-blue">Di Seluruh Indonesia</span>
        </h2>
        <p class="cq-section-desc" style="margin: 0 auto; color: #64748B;">
          Simak cerita langsung dari para mitra yang telah menjalankan outlet laundry mandiri mereka bersama ekosistem Cleanique Laundry dan pasokan resmi PT Indotech Berkah Abadi.
        </p>
      </div>
    </div>

    <!-- Continuous Infinite Carousel Track -->
    <div class="cq-payno-testi-track-wrap">
      <div class="cq-payno-testi-track">
        <!-- Group 1: Original Items -->
        <div class="cq-testi-group">
          <?php foreach ($index_testi_items as $item) : ?>
            <div class="cq-payno-testi-card">
              <div>
                <div class="cq-testi-card-header">
                  <div class="cq-testi-stars">
                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                  </div>
                  <span class="cq-testi-badge">
                    <?php echo esc_html($item['badge'] ?? 'Terverifikasi'); ?>
                  </span>
                </div>
                <p class="cq-testi-card-quote">
                  "<?php echo esc_html($item['quote']); ?>"
                </p>
              </div>
              <div class="cq-testi-card-user">
                <?php if (!empty($item['avatar_img'])) : ?>
                  <div class="cq-testi-card-avatar" style="overflow: hidden; background: #e2e8f0;">
                    <img src="<?php echo esc_url($item['avatar_img']); ?>" alt="<?php echo esc_attr($item['name']); ?>" loading="lazy">
                  </div>
                <?php else : ?>
                  <div class="cq-testi-card-avatar" style="background: <?php echo esc_attr($item['avatar_bg']); ?>;">
                    <?php echo esc_html($item['initial']); ?>
                  </div>
                <?php endif; ?>
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
          <?php foreach ($index_testi_items as $item) : ?>
            <div class="cq-payno-testi-card">
              <div>
                <div class="cq-testi-card-header">
                  <div class="cq-testi-stars">
                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                  </div>
                  <span class="cq-testi-badge">
                    <?php echo esc_html($item['badge'] ?? 'Terverifikasi'); ?>
                  </span>
                </div>
                <p class="cq-testi-card-quote">
                  "<?php echo esc_html($item['quote']); ?>"
                </p>
              </div>
              <div class="cq-testi-card-user">
                <?php if (!empty($item['avatar_img'])) : ?>
                  <div class="cq-testi-card-avatar" style="overflow: hidden; background: #e2e8f0;">
                    <img src="<?php echo esc_url($item['avatar_img']); ?>" alt="<?php echo esc_attr($item['name']); ?>" loading="lazy">
                  </div>
                <?php else : ?>
                  <div class="cq-testi-card-avatar" style="background: <?php echo esc_attr($item['avatar_bg']); ?>;">
                    <?php echo esc_html($item['initial']); ?>
                  </div>
                <?php endif; ?>
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

  <!-- ========================================================
       9. SHOWROOM & WORKSHOP SLEMAN, YOGYAKARTA
       ======================================================== -->
  <section class="cq-section" id="tentang-kami">
    <div class="cq-container">
      <div class="cq-visual-split" style="margin-bottom: var(--cq-sp-48);">
        <div class="cq-visual-split-img">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>"
               alt="Pusat Layanan Teknis &amp; Workshop PT Indotech Berkah Abadi Yogyakarta"
               loading="lazy">
        </div>
        <div class="cq-visual-split-content">
          <span class="cq-badge-clean">Pabrik Sleman</span>
          <h2 class="cq-section-title" style="margin-bottom: var(--cq-sp-16);">
            Didukung Pabrik Kimia Sendiri &amp; Tim Ahli di Sleman
          </h2>
          <p style="color: var(--cq-text-muted); line-height: 1.7; margin-bottom: var(--cq-sp-24);">
            <strong>PT Indotech Berkah Abadi</strong> menghadirkan standar mutu tinggi pada setiap produk: dari formulasi deterjen rendah busa dan parfum laundry microcapsule *Orchid Brand*, pemilihan mesin cuci heavy-duty komersial bergaransi, hingga perancangan aplikasi kasir berbasis cloud yang aman.
          </p>
          <div>
            <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
              Profil Perusahaan
            </a>
          </div>
        </div>
      </div>

      <!-- Showroom Box Sleman DIY -->
      <div class="cq-showroom-box">
        <div>
          <h2 class="cq-showroom-title">Ingin Melihat Mesin &amp; Coba Chemical Langsung?</h2>
          <p class="cq-showroom-desc">
            Pintu workshop dan showroom kami di Sleman, D.I. Yogyakarta terbuka lebar untuk calon mitra. Saksikan demo langsung kekuatan mesin cuci komersial, buktikan keharuman parfum Orchid Brand, dan diskusikan rencana bisnis Anda bersama konsultan kami.
          </p>

          <div class="cq-showroom-actions">
            <a href="<?php echo esc_url($wa_kemitraan_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill" target="_blank" rel="noopener">
              Kunjungan Showroom
            </a>
            <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill" style="color: #fff; border-color: rgba(255,255,255,0.35);">
              Peta Lokasi
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
       10. FAQ AKORDEON KOMPREHENSIF
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="faq">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Pertanyaan yang Sering Diajukan Calon Mitra</h2>
        <p class="cq-section-desc">Jawaban transparan seputar sistem kemitraan, mesin, pasokan chemical, dan sistem langganan POS.</p>
      </div>

      <div class="cq-accordion" style="max-width: 860px; margin: 0 auto;">
        <!-- FAQ 1 -->
        <div class="cq-accordion-item is-open">
          <button type="button" class="cq-accordion-trigger" aria-expanded="true">
            <span>Bagaimana konsep kemitraan usaha laundry di Cleanique?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Kemitraan Cleanique Laundry adalah sistem pembelian paket usaha mandiri komplit (Turnkey). Mesin, peralatan, dan seluruh aset outlet 100% menjadi hak milik Anda. Kami tidak memotong omzet atau memungut royalti fee bulanan. Model bisnis kami adalah sebagai produsen bahan kimia pabrik Orchid Brand dan penyedia mesin resmi.
            </p>
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Bagaimana skema biaya aplikasi kasir Smart Laundry POS?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Aplikasi kasir Smart Laundry POS menggunakan sistem berlangganan (subscription) berbasis cloud yang transparan dan terjangkau per bulan atau per tahun. Biaya langganan ini mencakup maintenance server, pengiriman nota WhatsApp otomatis tanpa batas, update fitur sistem, dan penyimpanan data transaksi yang aman.
            </p>
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Bagaimana jika saya belum memiliki lokasi atau ruko usaha?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Tim konsultan kami siap membantu melakukan evaluasi dan kriteria kelayakan lokasi seperti traffic keramaian, kepadatan pemukiman, kompetitor, serta ketersediaan air bersih dan daya listrik PLN sebelum Anda memutuskan menyewa tempat.
            </p>
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Berapa kapasitas daya listrik dan sumber air yang dibutuhkan?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Karena mesin pengering kami menggunakan sistem konversi gas LPG dan boiler setrika uap juga berbahan bakar gas, kebutuhan daya listrik relatif hemat. Untuk Paket Starter atau Komersial Pro, daya listrik 1.300 Watt hingga 2.200 Watt sudah sangat memadai untuk mengoperasikan mesin cuci, lampu, pompa air, dan kasir.
            </p>
          </div>
        </div>

        <!-- FAQ 5 -->
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

        <!-- FAQ 6 -->
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Apakah ada garansi mesin dan ketersediaan teknisi bila terjadi kendala?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>
              Setiap paket kemitraan dilengkapi garansi servis dan suku cadang mesin resmi selama 1 tahun. Tim teknisi internal PT Indotech siap melakukan kunjungan perawatan maupun perbaikan cepat agar operasional outlet Anda tidak terganggu.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       11. BANNER CTA PENUTUP (Corporate Hub - Contained Section Card)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section" id="kontak">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <h2 class="cq-banner-cta-title">
          Siap Memulai atau Mengembangkan Bisnis Laundry Anda?
        </h2>
        <p class="cq-banner-cta-desc">
          Kantor operasional &amp; showroom workshop: <strong><?php echo esc_html($office_addr); ?></strong>.<br>
          Konsultasikan rencana pembukaan outlet laundry, ketersediaan daya listrik ruko, atau instalasi mesin bersama konsultan resmi kami.
        </p>
        <div class="cq-banner-cta-actions">
          <a href="<?php echo esc_url($wa_kemitraan_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Hubungi Konsultan
          </a>
          <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
            Peta Lokasi
          </a>
        </div>
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
      "name": "Bagaimana konsep kemitraan usaha laundry di Cleanique?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Kemitraan Cleanique Laundry adalah sistem pembelian paket usaha mandiri komplit (Turnkey). Mesin, peralatan, dan seluruh aset outlet 100% menjadi hak milik Anda tanpa potongan royalti fee bulanan."
      }
    },
    {
      "@type": "Question",
      "name": "Bagaimana skema biaya aplikasi kasir Smart Laundry POS?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Aplikasi kasir Smart Laundry POS menggunakan sistem berlangganan (subscription) berbasis cloud yang transparan dan terjangkau per bulan atau per tahun."
      }
    },
    {
      "@type": "Question",
      "name": "Bagaimana jika saya belum memiliki lokasi atau ruko usaha?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Tim konsultan kami siap membantu melakukan evaluasi dan kriteria kelayakan lokasi seperti traffic keramaian, kepadatan pemukiman, kompetitor, serta ketersediaan air bersih dan daya listrik."
      }
    },
    {
      "@type": "Question",
      "name": "Berapa kapasitas daya listrik dan sumber air yang dibutuhkan?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Karena mesin pengering dan boiler setrika uap menggunakan sistem gas LPG, kebutuhan daya listrik hemat, hanya sekitar 1.300 - 2.200 Watt."
      }
    },
    {
      "@type": "Question",
      "name": "Bagaimana cara melakukan pemesanan ulang (repeat order) bahan kimia?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Mitra dapat memesan chemical secara langsung melalui admin rantai pasok pabrik kami dengan harga produsen tangan pertama."
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
