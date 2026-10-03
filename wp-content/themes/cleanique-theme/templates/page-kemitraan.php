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
       1. HERO SECTION (Kemitraan Official PT Indotech)
       ======================================================== -->
  <section class="cq-kemitraan-hero" id="kemitraan-hero">
    <div class="cq-container">
      <div class="cq-kemitraan-hero-content">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16);">
          Program Kemitraan Resmi PT Indotech Berkah Abadi
        </div>
        <h1 class="cq-kemitraan-hero-title">
          <?php echo esc_html($headline); ?>
        </h1>
        <p class="cq-kemitraan-hero-desc">
          Mulai usaha laundry komersial dengan risiko terukur. Dapatkan paket turnkey siap jalan: mesin cuci &amp; dryer komersial bergaransi resmi, pasokan chemical Orchid Brand harga tangan pertama dari pabrik Yogyakarta, instalasi plumbing &amp; kelistrikan berstandar industri, serta pelatihan SOP tuntas sampai grand opening.
        </p>

        <div class="cq-kemitraan-pills-bar">
          <div class="cq-kemitraan-pill">
            <i class="ri-shield-check-fill" aria-hidden="true"></i>
            <span>0% Royalty Fee &bull; 100% Keuntungan Mitra</span>
          </div>
          <div class="cq-kemitraan-pill">
            <i class="ri-flask-fill" aria-hidden="true"></i>
            <span>Chemical Langsung Pabrik Sleman DIY</span>
          </div>
          <div class="cq-kemitraan-pill">
            <i class="ri-tools-fill" aria-hidden="true"></i>
            <span>Garansi Mesin &amp; Teknisi Tersedia</span>
          </div>
          <div class="cq-kemitraan-pill">
            <i class="ri-smartphone-fill" aria-hidden="true"></i>
            <span>Gratis Software POS Kasir Cleanique</span>
          </div>
        </div>

        <div style="display: flex; gap: var(--cq-sp-12); justify-content: center; flex-wrap: wrap;">
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Tim Ahli via WhatsApp
          </a>
          <a href="#katalog-paket" class="cq-btn cq-btn-outline cq-btn-pill">
            <i class="ri-arrow-down-line" aria-hidden="true"></i> Lihat 4 Pilihan Paket Usaha
          </a>
        </div>
      </div>

      <!-- 4 Stats Counter Row -->
      <div class="cq-corp-stats-row" style="margin-top: clamp(36px, 5vw, 54px);">
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
       2. KATALOG PAKET KEMITRAAN (CPT Kemitraan Query)
       ======================================================== -->
  <section class="cq-section" id="katalog-paket" style="padding: clamp(60px, 8vw, 90px) 0; background: #f8fafc;">
    <div class="cq-container">
      <div style="text-align: center; max-width: 720px; margin: 0 auto clamp(32px, 5vw, 48px);">
        <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.5rem + 1vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-12);">
          Pilihan Paket Kemitraan Sesuai Skala Bisnis Anda
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); line-height: 1.65; margin: 0;">
          Semua paket sudah termasuk paket komplit: set mesin siap jalan, instalasi plumbing pipa gas, paket kimia pabrik awal, lisensi kasir, dan pendampingan grand opening.
        </p>
      </div>

      <div class="cq-kemitraan-grid">
        <?php
        $kemitraan_query = new WP_Query([
            'post_type'      => 'kemitraan',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        ]);

        if ($kemitraan_query->have_posts()) :
            while ($kemitraan_query->have_posts()) : $kemitraan_query->the_post();
                $post_id     = get_the_ID();
                $price       = get_post_meta($post_id, '_cq_kemitraan_price', true);
                $badge       = get_post_meta($post_id, '_cq_kemitraan_badge', true);
                $roi         = get_post_meta($post_id, '_cq_kemitraan_roi', true);
                $is_featured = get_post_meta($post_id, '_cq_kemitraan_featured', true);
                $specs       = get_post_meta($post_id, '_cq_kemitraan_specs', true);
                $item_wa     = cleanique_get_kemitraan_whatsapp_url($post_id);
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
              <div class="cq-kemitraan-price">
                <?php
                if (!empty($price) && stripos($price, 'Mulai') !== false) {
                    $clean_price = trim(str_ireplace('Mulai', '', $price));
                    echo '<span class="cq-price-prefix">Mulai</span> <span class="cq-price-num">' . esc_html($clean_price) . '</span>';
                } else {
                    echo '<span class="cq-price-num">' . esc_html($price ?: 'Konsultasi') . '</span>';
                }
                ?>
              </div>
              <span class="cq-kemitraan-price-label">Modal investasi siap buka</span>
              <?php if (!empty($roi)) : ?>
                <div class="cq-kemitraan-roi-chip">
                  <i class="ri-time-line" aria-hidden="true"></i> BEP: <?php echo esc_html($roi); ?>
                </div>
              <?php endif; ?>
            </div>

            <?php if (!empty($specs)) : 
                $spec_items = array_filter(array_map('trim', explode("\n", $specs)));
            ?>
              <ul class="cq-kemitraan-specs-list">
                <?php foreach (array_slice($spec_items, 0, 5) as $item) : ?>
                  <li>
                    <i class="ri-checkbox-circle-fill" aria-hidden="true"></i>
                    <span><?php echo esc_html($item); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <div class="cq-kemitraan-actions">
              <a href="<?php echo esc_url($item_wa); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line" aria-hidden="true"></i> Ambil Paket Ini
              </a>
              <a href="<?php the_permalink(); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
                Detail Spesifikasi
              </a>
            </div>
          </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
          <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #ffffff; border-radius: 16px;">
            <p style="color: var(--cq-text-muted);">Paket kemitraan sedang diperbarui oleh tim admin Cleanique.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. ROADMAP SOP PELATIHAN & AKREDITASI (Vertical Timeline Component)
       ======================================================== -->
  <section class="cq-timeline-section" id="alur-kemitraan">
    <div class="cq-timeline-watermark" aria-hidden="true">SOP ROADMAP</div>
    
    <div class="cq-container">
      <div style="text-align: center; max-width: 680px; margin: 0 auto; position: relative; z-index: 2;">
        <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.5rem + 1vw, 2.5rem); font-weight: 800; color: #0f172a; margin-bottom: var(--cq-sp-12);">
          5 Tahap Pendampingan Menuju Outlet Sukses
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: #475569; line-height: 1.65; margin: 0;">
          Anda tidak dilepas sendiri. Tim insinyur mesin, ahli kimia, dan pelatih operasional PT Indotech mengawal setiap langkah secara sistematis.
        </p>
      </div>

      <div class="cq-timeline-wrap">
        <div class="cq-timeline-track" aria-hidden="true"></div>

        <!-- Milestone 1 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot"></span> Tahap 01 &bull; Due Diligence
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box">
                <i class="ri-map-pin-user-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Survei Lokasi &amp; Kelayakan Infrastruktur</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 2 – 4 Hari Kerja
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Analisis zonasi calon lokasi ruko/kios, densitas perumahan &amp; mahasiswa, uji kelayakan tekanan debit air, daya listrik PLN (kVA), dan ventilasi buangan dryer gas agar aman dan memenuhi regulasi lingkungan.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Analisis Demografi Pasar</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Uji Kualitas &amp; Debit Air</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Audit Kelistrikan &amp; Jalur Gas</span>
            </div>
          </div>
        </div>

        <!-- Milestone 2 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring" style="border-color: #10b981;"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot dot-mint"></span> Tahap 02 &bull; Engineering Layout
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #059669; color: #059669;">
                <i class="ri-layout-masonry-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Perancangan Blueprint Tata Letak &amp; Plumbing</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 3 – 5 Hari Kerja
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Penyusunan gambar kerja 2D/3D tata ruang outlet untuk alur kerja cucian kotor-ke-bersih (anti-kontaminasi silang), instalasi pipa PVC tebal, manifold gas otomatis, exhaust ducting, dan penempatan meja setrika uap ergonomis.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Desain Alur Kerja Higienis</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Plumbing Anti-Bocor Terpadu</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Safety Valve Gas Standar Industri</span>
            </div>
          </div>
        </div>

        <!-- Milestone 3 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring" style="border-color: #0284c7;"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot dot-blue"></span> Tahap 03 &bull; Machinery Setup
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #0284c7; color: #0284c7;">
                <i class="ri-truck-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Pengiriman Mesin, Instalasi &amp; Commisioning Test</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 5 – 7 Hari Kerja
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Ekspedisi mesin cuci &amp; dryer komersial ke lokasi mitra. Teknisi berpengalaman PT Indotech melakukan perakitan unit, kalibrasi putaran RPM, pengujian suhu panas dryer, serta uji kebocoran gas menyeluruh.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Ekspedisi Berasuransi Penuh</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Kalibrasi Mesin &amp; Boiler Uap</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Sertifikat Uji Laik Operasi</span>
            </div>
          </div>
        </div>

        <!-- Milestone 4 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring" style="border-color: #8b5cf6;"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot" style="background: #8b5cf6;"></span> Tahap 04 &bull; Training &amp; SOP
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #7c3aed; color: #7c3aed;">
                <i class="ri-user-star-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Pelatihan Karyawan &amp; Implementasi POS Kasir</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 2 – 3 Hari Onsite
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Pelatihan intensif bagi staf kasir dan operator: teknik identifikasi jenis kain, takaran bahan kimia anti-luntur, teknik setrika uap cepat, serta pengoperasian aplikasi POS Cleanique (cetak struk Bluetooth &amp; notifikasi WhatsApp pelanggan).
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Modul Kimia &amp; Penghilang Noda</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> SOP Pelayanan Kasir Ramah</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Dashboard Keuangan di Smartphone Owner</span>
            </div>
          </div>
        </div>

        <!-- Milestone 5 -->
        <div class="cq-timeline-item">
          <div class="cq-timeline-node" aria-hidden="true">
            <div class="cq-timeline-node-inner"></div>
            <div class="cq-timeline-accent-ring" style="border-color: #ef4444;"></div>
          </div>
          <div class="cq-timeline-badge-pill">
            <span class="cq-timeline-dot" style="background: #ef4444;"></span> Tahap 05 &bull; Grand Opening
          </div>
          <div class="cq-timeline-card">
            <div class="cq-timeline-card-header">
              <div class="cq-timeline-icon-box" style="border-color: #dc2626; color: #dc2626;">
                <i class="ri-rocket-2-line" aria-hidden="true"></i>
              </div>
              <div>
                <h3 class="cq-timeline-title">Grand Opening &amp; Pendampingan Pemasaran Lokal</h3>
                <div class="cq-timeline-meta">
                  <i class="ri-time-line" aria-hidden="true"></i> Pendampingan Pasca Buka: Berkelanjutan
                </div>
              </div>
            </div>
            <p class="cq-timeline-card-desc">
              Peluncuran promosi opening (diskon kiloan / cuci gratis perdana), optimasi Google Maps bisnis lokal sekitar ruko, dan pemantauan performa harian hingga outlet stabil menghasilkan laba bersih.
            </p>
            <div class="cq-timeline-tags-row">
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Desain Spanduk &amp; Flyer Promo</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Setup Google Profil Bisnis (SEO Lokal)</span>
              <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Konsultasi Tim Helpdesk Seumur Hidup</span>
            </div>
          </div>
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
        <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.5rem + 1vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-12);">
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
              <td><strong>Harga Pasokan Chemical Deterjen</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> Harga Tangan Pertama dari Pabrik Sleman</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Harga Distributor (Sudah Dimarkup Tinggi)</span></td>
            </tr>
            <tr>
              <td><strong>Biaya Lisensi Software Kasir POS</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> Gratis Termasuk di Paket Usaha</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Biaya Langganan Bulanan/Tahunan</span></td>
            </tr>
            <tr>
              <td><strong>Garansi Servis &amp; Akses Suku Cadang</strong></td>
              <td class="col-highlight"><span class="cq-compare-check"><i class="ri-checkbox-circle-fill"></i> Teknisi &amp; Gudang Sparepart Lengkap DIY</span></td>
              <td><span class="cq-compare-cross"><i class="ri-close-circle-fill"></i> Antri Teknisi Luar Kota / Pihak Ketiga</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. SIMULASI KALKULATOR BEP & ROI (Modern Fintech Box)
       ======================================================== -->
  <section class="cq-section" style="padding: clamp(60px, 8vw, 90px) 0; background: #f8fafc;" id="kalkulator-roi">
    <div class="cq-container">
      <div style="text-align: center; max-width: 680px; margin: 0 auto clamp(32px, 5vw, 44px);">
        <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.5rem + 1vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-12);">
          Simulasi Balik Modal (BEP) Usaha Laundry
        </h2>
        <p style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); line-height: 1.65; margin: 0;">
          Geser slider volume cucian harian untuk melihat proyeksi omzet kotor, margin laba bersih setelah biaya chemical pabrik, dan estimasi waktu balik modal.
        </p>
      </div>

      <div class="cq-calc-container">
        <!-- Preset Quick Chips -->
        <div class="cq-calc-preset-bar">
          <span class="cq-calc-preset-label">Pilih Preset Usaha:</span>
          <button type="button" class="cq-calc-preset-chip is-active" data-kg="40" data-price="7000" data-modal="28500000">
            Starter (40 Kg/hari)
          </button>
          <button type="button" class="cq-calc-preset-chip" data-kg="75" data-price="8000" data-modal="48000000">
            Komersial Ruko (75 Kg/hari)
          </button>
          <button type="button" class="cq-calc-preset-chip" data-kg="150" data-price="9000" data-modal="85000000">
            Industrial Express (150 Kg/hari)
          </button>
        </div>

        <div class="cq-calc-grid">
          <!-- Left: Input Sliders -->
          <div class="cq-calc-inputs">
            <div class="cq-calc-field-group">
              <div class="cq-calc-field-header">
                <label for="cq-calc-kg" class="cq-calc-label">
                  <i class="ri-t-shirt-line" style="color: var(--cq-primary);"></i> Volume Cucian per Hari
                </label>
                <span class="cq-calc-current-val" id="cq-calc-kg-val">40 Kg / Hari</span>
              </div>
              <input type="range" id="cq-calc-kg" class="cq-calc-slider" min="20" max="250" step="5" value="40">
              <div class="cq-calc-range-hints">
                <span>20 Kg (Minimal)</span>
                <span>125 Kg (Optimal)</span>
                <span>250 Kg (Komersial Besar)</span>
              </div>
            </div>

            <div class="cq-calc-field-group">
              <div class="cq-calc-field-header">
                <label for="cq-calc-price" class="cq-calc-label">
                  <i class="ri-price-tag-3-line" style="color: var(--cq-primary);"></i> Tarif Jasa Cuci Kering Setrika
                </label>
                <span class="cq-calc-current-val" id="cq-calc-price-val">Rp 7.000 / Kg</span>
              </div>
              <input type="range" id="cq-calc-price" class="cq-calc-slider" min="5000" max="15000" step="500" value="7000">
              <div class="cq-calc-range-hints">
                <span>Rp 5.000 (UMKM)</span>
                <span>Rp 8.000 (Standar Ruko)</span>
                <span>Rp 15.000 (Express Premium)</span>
              </div>
            </div>

            <div style="background: var(--cq-bg-subtle); border-radius: 14px; padding: 14px 18px; border: 1px solid var(--cq-border-light);">
              <div style="font-size: 12px; font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 4px;">
                <i class="ri-information-line" style="color: var(--cq-primary);"></i> Biaya Operasional Efisien
              </div>
              <div style="font-size: 11px; color: var(--cq-text-muted); line-height: 1.55;">
                Dengan chemical Orchid Brand langsung dari pabrik, biaya deterjen, softener, dan gas rata-rata hanya <strong>12% – 15% dari omzet</strong>. Sisa margin laba kotor 55% – 60% sebelum biaya karyawan dan sewa tempat.
              </div>
            </div>
          </div>

          <!-- Right: Result Card -->
          <div class="cq-calc-result-card">
            <div class="cq-calc-result-badge">
              Proyeksi Finansial Bulanan
            </div>

            <div class="cq-calc-metric-group">
              <div class="cq-calc-metric-lbl">Estimasi Omzet Kotor / Bulan (30 Hari)</div>
              <div class="cq-calc-metric-val" id="cq-calc-omzet">Rp 8.400.000</div>
            </div>

            <div class="cq-calc-metric-group">
              <div class="cq-calc-metric-lbl">Estimasi Laba Bersih Mitra / Bulan</div>
              <div class="cq-calc-metric-val highlight-profit" id="cq-calc-profit">Rp 4.620.000</div>
            </div>

            <div class="cq-calc-metric-group">
              <div class="cq-calc-metric-lbl">Perkiraan Balik Modal (BEP)</div>
              <div class="cq-calc-bep-val" id="cq-calc-bep">~ 6.2 Bulan</div>
            </div>

            <div class="cq-calc-disclaimer">
              *Proyeksi simulasi berdasarkan rata-rata performa 300+ outlet mitra aktif Cleanique di Pulau Jawa. Biaya sewa tempat dan upah karyawan riil disesuaikan dengan UMR wilayah masing-masing.
            </div>

            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-calc-cta-btn" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Konsultasi Rencana Bisnis Saya
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       6. 6 KEUNGGULAN KEMITRAAN BERSAMA PT INDOTECH (Benefit Bento)
       ======================================================== -->
  <section class="cq-section" style="padding: clamp(60px, 8vw, 90px) 0; background: #ffffff;">
    <div class="cq-container">
      <div style="text-align: center; max-width: 720px; margin: 0 auto clamp(32px, 5vw, 48px);">
        <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.5rem + 1vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-12);">
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
          <h3 class="cq-kemitraan-benefit-title">Pabrik Chemical Mandiri</h3>
          <p class="cq-kemitraan-benefit-desc">
            Mitra Cleanique mendapatkan prioritas suplai deterjen cair, softener microcapsule, pelicin setrika, dan anti-noda darah/lemak langsung dari tangki produksi pabrik.
          </p>
        </div>

        <div class="cq-kemitraan-benefit-card">
          <div class="cq-kemitraan-benefit-icon">
            <i class="ri-shield-check-fill" aria-hidden="true"></i>
          </div>
          <h3 class="cq-kemitraan-benefit-title">Garansi Resmi &amp; Servis Cepat</h3>
          <p class="cq-kemitraan-benefit-desc">
            Mesin cuci dan pengering gas dilindungi garansi pabrik. Gudang sparepart lengkap di Sleman menjamin ketersediaan onderdil tanpa harus menunggu impor lama.
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
          <h3 class="cq-kemitraan-benefit-title">Pendampingan Teknis Seumur Hidup</h3>
          <p class="cq-kemitraan-benefit-desc">
            Grup konsultasi WhatsApp eksklusif bersama tim teknisi, formulator kimia, dan konsultan bisnis siap membantu memecahkan kendala teknis harian outlet Anda.
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
        <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.5rem + 1vw, 2.5rem); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-12);">
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
            <span>Bagaimana jika mesin cuci atau dryer mengalami kerusakan teknis?</span>
            <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
          </summary>
          <div class="cq-accordion-content">
            <p>Seluruh mesin bergaransi resmi. PT Indotech memiliki tim mekanik in-house dan gudang onderdil/suku cadang terlengkap di Sleman, DIY. Anda akan terhubung langsung ke hotline teknis prioritas via WhatsApp untuk video call diagnosa dan pengiriman teknisi ke lokasi atau pengiriman sparepart pengganti pada hari yang sama.</p>
          </div>
        </details>

        <details class="cq-accordion-item">
          <summary class="cq-accordion-trigger">
            <span>Apakah pasokan deterjen dan pewangi wajib dibeli dari pabrik Cleanique?</span>
            <i class="ri-arrow-down-s-line" aria-hidden="true"></i>
          </summary>
          <div class="cq-accordion-content">
            <p>Kami sangat menyarankan mitra menggunakan chemical <em>Orchid Brand</em> dari pabrik kami karena diformulasikan khusus dengan busa rendah (low foam) yang melindungi bearing mesin cuci dan wangi parfum microcapsule yang tahan hingga 30 hari. Selain itu, sebagai mitra Cleanique, Anda mendapatkan diskon harga pabrik langsung tangan pertama yang jauh lebih hemat dari pasokan toko grosir biasa.</p>
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
       8. BOTTOM CONSULTATION CTA BOX
       ======================================================== -->
  <section class="cq-container" style="padding-bottom: clamp(60px, 8vw, 100px);">
    <div class="cq-kemitraan-cta-box">
      <h2 class="cq-kemitraan-cta-title">
        Siap Membuka Usaha Laundry Menguntungkan Tanpa Potongan Royalti?
      </h2>
      <p class="cq-kemitraan-cta-desc">
        Diskusikan potensi lokasi ruko, ketersediaan daya listrik, dan simulasi paket investasi yang paling cocok dengan anggaran Anda bersama Senior Business Consultant PT Indotech Berkah Abadi.
      </p>
      <div class="cq-kemitraan-cta-actions">
        <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Hubungi Tim Konsultan via WhatsApp
        </a>
        <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
          <i class="ri-map-pin-line" aria-hidden="true"></i> Kunjungi Showroom Sleman DIY
        </a>
      </div>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const kgSlider = document.getElementById('cq-calc-kg');
  const priceSlider = document.getElementById('cq-calc-price');
  const kgVal = document.getElementById('cq-calc-kg-val');
  const priceVal = document.getElementById('cq-calc-price-val');
  const omzetVal = document.getElementById('cq-calc-omzet');
  const profitVal = document.getElementById('cq-calc-profit');
  const bepVal = document.getElementById('cq-calc-bep');
  const presetChips = document.querySelectorAll('.cq-calc-preset-chip');

  let currentModal = 28500000;

  function formatRupiah(num) {
    return 'Rp ' + Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function recalculate() {
    if (!kgSlider || !priceSlider) return;
    const kg = parseInt(kgSlider.value, 10);
    const price = parseInt(priceSlider.value, 10);

    kgVal.textContent = kg + ' Kg / Hari';
    priceVal.textContent = formatRupiah(price) + ' / Kg';

    // Omzet bulanan (30 hari)
    const omzetMonth = kg * price * 30;
    
    // Margin laba bersih rata-rata kemitraan mandiri (55% setelah chemical pabrik, gas, listrik, staf)
    const profitMonth = omzetMonth * 0.55;

    // Balik modal (bulan)
    const bepMonth = (profitMonth > 0) ? (currentModal / profitMonth).toFixed(1) : 0;

    omzetVal.textContent = formatRupiah(omzetMonth);
    profitVal.textContent = formatRupiah(profitMonth);
    bepVal.textContent = '~ ' + bepMonth + ' Bulan';
  }

  if (kgSlider && priceSlider) {
    kgSlider.addEventListener('input', recalculate);
    priceSlider.addEventListener('input', recalculate);

    presetChips.forEach(chip => {
      chip.addEventListener('click', function() {
        presetChips.forEach(c => c.classList.remove('is-active'));
        this.classList.add('is-active');

        kgSlider.value = this.dataset.kg;
        priceSlider.value = this.dataset.price;
        currentModal = parseInt(this.dataset.modal, 10);
        recalculate();
      });
    });

    recalculate();
  }
});
</script>

<?php
get_footer();
