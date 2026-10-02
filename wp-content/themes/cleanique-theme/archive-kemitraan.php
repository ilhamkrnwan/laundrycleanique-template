<?php
/**
 * Archive Template for Custom Post Type: Kemitraan (archive-kemitraan.php)
 * Description: Katalog resmi seluruh paket kemitraan usaha laundry PT Indotech Berkah Abadi.
 *
 * @package Cleanique
 */

get_header();

$wa_url           = cleanique_get_whatsapp_url('kemitraan');
$proposal_pdf_url = get_option('cleanique_kemitraan_proposal_url');
$headline         = get_option('cleanique_kemitraan_headline', 'Peluang Bisnis Laundry Siap Operasi 100% Hak Milik Tanpa Royalti');
$terms            = get_option('cleanique_kemitraan_terms');
?>

<main id="main-content" style="padding-top: clamp(100px, 12vw, 130px); padding-bottom: clamp(60px, 8vw, 90px); background: #f8fafc;">
  <!-- Header Banner -->
  <section class="cq-container" style="margin-bottom: clamp(40px, 6vw, 64px);">
    <div style="text-align: center; max-width: 860px; margin: 0 auto;">
      <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16);">
        <i class="ri-store-2-fill" aria-hidden="true"></i> Program Kemitraan Resmi PT Indotech Berkah Abadi
      </div>
      <h1 style="font-family: var(--cq-font-heading); font-size: clamp(2.2rem, 1.8rem + 2vw, 3.2rem); font-weight: 800; color: var(--cq-dark-navy); line-height: 1.15; margin-bottom: var(--cq-sp-16);">
        <?php echo esc_html($headline); ?>
      </h1>
      <p style="font-size: clamp(1rem, 0.95rem + 0.3vw, 1.15rem); color: var(--cq-text-muted); line-height: 1.7; margin-bottom: var(--cq-sp-24);">
        Mulai bisnis laundry komersial dengan risiko terukur. Dapatkan paket turnkey lengkap: mesin cuci &amp; dryer heavy-duty bergaransi pabrik, pasokan chemical Orchid Brand harga tangan pertama, instalasi pipa &amp; kelistrikan, serta pelatihan karyawan tuntas sampai grand opening.
      </p>

      <div style="display: flex; gap: var(--cq-sp-12); justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line"></i> Konsultasi Tim Ahli via WhatsApp
        </a>
        <?php if (!empty($proposal_pdf_url)) : ?>
          <a href="<?php echo esc_url($proposal_pdf_url); ?>" class="cq-btn cq-btn-outline cq-btn-pill" target="_blank" rel="noopener">
            <i class="ri-file-download-line"></i> Unduh Brosur Proposal (PDF)
          </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- 4 Key Advantages Bar -->
    <div class="cq-corp-stats-row" style="margin-top: clamp(32px, 5vw, 48px);">
      <div class="cq-corp-stat-card">
        <div class="cq-corp-stat-val">0%</div>
        <div class="cq-corp-stat-label">Royalty Fee &bull; 100% Hak Milik Mitra</div>
      </div>
      <div class="cq-corp-stat-card">
        <div class="cq-corp-stat-val">Pabrik</div>
        <div class="cq-corp-stat-label">Chemical Langsung dari Sleman DIY</div>
      </div>
      <div class="cq-corp-stat-card">
        <div class="cq-corp-stat-val">Resmi</div>
        <div class="cq-corp-stat-label">Garansi Servis &amp; Suku Cadang Mesin</div>
      </div>
      <div class="cq-corp-stat-card">
        <div class="cq-corp-stat-val">Bonus</div>
        <div class="cq-corp-stat-label">Lisensi Aplikasi Kasir POS Cleanique</div>
      </div>
    </div>
  </section>

  <!-- Catalog Grid -->
  <section class="cq-container">
    <div class="cq-bento-grid cq-bento-grid-3">
      <?php
      if (have_posts()) :
          while (have_posts()) : the_post();
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
            <h2 class="cq-corp-card-title"><?php the_title(); ?></h2>
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
            <a href="<?php echo esc_url($item_wa); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Konsultasi Paket Ini
            </a>
            <a href="<?php the_permalink(); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-block">
              Rincian Spesifikasi Mesin
            </a>
          </div>
        </div>
      <?php
          endwhile;
      else :
      ?>
        <!-- Default Package 1 -->
        <div class="cq-kemitraan-card">
          <div class="cq-kemitraan-header">
            <h2 class="cq-corp-card-title">Paket Kiloan Starter</h2>
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
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Konsultasi Paket Starter
            </a>
          </div>
        </div>

        <!-- Default Package 2 -->
        <div class="cq-kemitraan-card is-featured">
          <div class="cq-kemitraan-ribbon">Paling Populer</div>
          <div class="cq-kemitraan-header">
            <h2 class="cq-corp-card-title">Paket Komersial Pro (Ruko)</h2>
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
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Konsultasi Paket Komersial
            </a>
          </div>
        </div>

        <!-- Default Package 3 -->
        <div class="cq-kemitraan-card">
          <div class="cq-kemitraan-header">
            <h2 class="cq-corp-card-title">Paket Industrial Express</h2>
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
            <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
              <i class="ri-whatsapp-line"></i> Konsultasi Paket Industrial
            </a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- 4 Step Onboarding Flow -->
  <section class="cq-container" style="margin-top: clamp(60px, 8vw, 80px);">
    <div style="background: #ffffff; border: 1px solid var(--cq-border-light); border-radius: 24px; padding: clamp(28px, 4vw, 48px); box-shadow: 0 4px 20px -6px rgba(15, 23, 42, 0.05);">
      <div style="text-align: center; max-width: 640px; margin: 0 auto clamp(32px, 4vw, 40px);">
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Alur Kemitraan</span>
        <h2 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-2xl); font-weight: 800; color: var(--cq-dark-navy);">
          4 Langkah Mudah Membuka Outlet Laundry Cleanique
        </h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px;">
        <div style="text-align: center;">
          <div style="width: 52px; height: 52px; border-radius: 50%; background: var(--cq-primary-subtle); color: var(--cq-primary-dark); font-weight: 800; font-size: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">1</div>
          <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-base); font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 8px;">Konsultasi &amp; Lokasi</h3>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.6; margin: 0;">Diskusikan potensi lokasi ruko, ketersediaan daya listrik, sumber air, dan pilihan paket yang tepat.</p>
        </div>

        <div style="text-align: center;">
          <div style="width: 52px; height: 52px; border-radius: 50%; background: var(--cq-primary-subtle); color: var(--cq-primary-dark); font-weight: 800; font-size: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">2</div>
          <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-base); font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 8px;">Denah &amp; Kesepakatan</h3>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.6; margin: 0;">Tim teknisi merancang denah layout outlet, instalasi plumbing, dan penandatanganan kemitraan 0% royalty.</p>
        </div>

        <div style="text-align: center;">
          <div style="width: 52px; height: 52px; border-radius: 50%; background: var(--cq-primary-subtle); color: var(--cq-primary-dark); font-weight: 800; font-size: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">3</div>
          <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-base); font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 8px;">Instalasi &amp; Suplai</h3>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.6; margin: 0;">Pemasangan set mesin komersial, instalasi saluran pipa &amp; gas bergaransi, serta pengiriman chemical pabrik.</p>
        </div>

        <div style="text-align: center;">
          <div style="width: 52px; height: 52px; border-radius: 50%; background: var(--cq-primary-subtle); color: var(--cq-primary-dark); font-weight: 800; font-size: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">4</div>
          <h3 style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-base); font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 8px;">Training &amp; Grand Opening</h3>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.6; margin: 0;">Pelatihan SOP mencuci higienis, pengoperasian software kasir POS, dan pendampingan buka outlet pertama.</p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
