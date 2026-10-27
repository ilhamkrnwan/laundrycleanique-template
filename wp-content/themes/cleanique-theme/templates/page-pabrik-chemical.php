<?php
/**
 * Template Name: Company Profile - Pabrik Chemical
 * Description: Halaman Fasilitas Manufaktur & Formulasi Chemical Laundry PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic
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

$wa_url = cleanique_get_whatsapp_url('chemical');
?>

<main id="main-content" class="cq-chemical-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Payno Modern Split Layout)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero" id="pabrik">
    <div class="cq-container">
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Fasilitas Manufaktur &amp; Formulasi &bull; Sleman, D.I. Yogyakarta
          </div>
          <h1 class="cq-payno-heading">
            Bahan Kimia Kualitas Pabrik, <span class="cq-text-blue">Dengan HPP Cuci Paling Hemat.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            Diproduksi langsung oleh <strong>PT Indotech Berkah Abadi</strong> (produsen home care *Orchid Brand* dan bahan kimia industri) di Sleman, D.I. Yogyakarta. Formulasi ramah lingkungan khusus mesin komersial yang memangkas biaya operasional cuci Anda hingga 35% dibandingkan harga eceran perantara.
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Formulasi Low Foam Aman Dinamo</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Microcapsule Wangi 30 Hari</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Harga Pabrik Tanpa Perantara</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Pesan Chemical via WhatsApp
            </a>
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-store-2-line" aria-hidden="true"></i> Termasuk di Paket Usaha
            </a>
          </div>
        </div>
      </div>

      <!-- Visual Showcase Stage with 3 Floating Glass Badges -->
      <div class="cq-peluang-stage" style="margin-top: var(--cq-sp-40);">
        <div class="cq-peluang-frame">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" 
               alt="Rangkaian Produk Chemical Laundry PT Indotech Berkah Abadi" 
               loading="lazy">
        </div>

        <div class="cq-peluang-float-card float-left" style="top: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(0, 119, 182, 0.12); color: var(--brand-deep);" aria-hidden="true">
            <i class="ri-settings-4-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 600; color: var(--ink);">Aman untuk Bearing Mesin</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">Busa Rendah (Low Foam)</div>
          </div>
        </div>

        <div class="cq-peluang-float-card float-right" style="bottom: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(16, 185, 129, 0.14); color: var(--mint-cta);" aria-hidden="true">
            <i class="ri-sparkling-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 600; color: var(--ink);">Microcapsule 30 Hari</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">Wangi Mewah Tahan Lama</div>
          </div>
        </div>

        <div class="cq-peluang-float-card float-left" style="bottom: 8%;">
          <div class="cq-peluang-float-icon" style="background: rgba(245, 158, 11, 0.14); color: #d97706;" aria-hidden="true">
            <i class="ri-leaf-fill"></i>
          </div>
          <div>
            <div style="font-size: 13px; font-weight: 600; color: var(--ink);">Ramah Serat &amp; Kulit</div>
            <div style="font-size: 11px; color: var(--cq-text-muted);">Biodegradable &amp; Lembut</div>
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
              <filter id="cq-chem-arch-blur-outer" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="7" />
              </filter>
              <filter id="cq-chem-arch-blur-mid" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5" />
              </filter>
              <filter id="cq-chem-arch-blur-core" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" />
              </filter>
            </defs>
            <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" filter="url(#cq-chem-arch-blur-outer)" />
            <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" filter="url(#cq-chem-arch-blur-mid)" />
            <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" filter="url(#cq-chem-arch-blur-core)" />
          </svg>
        </div>

        <h2 class="cq-statement-text">
          Formulasi Laboratorium Standar Industri.<br class="cq-hide-mobile">
          Menjamin Pakaian Bersih, Harum Mewah &amp; Serat Terawat,<br class="cq-hide-mobile">
          Sekaligus <span class="cq-text-blue">Menghemat HPP Operasional Cuci</span> Hingga 35%.
        </h2>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. 3 PILAR KEUNGGULAN FORMULASI
       ======================================================== -->
  <section class="cq-section" id="keunggulan">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Mengapa Memilih Chemical dari PT Indotech?</h2>
        <p class="cq-section-desc">Bukan sekadar sabun curah biasa, seluruh formulasi diriset secara presisi untuk efisiensi binatu profesional.</p>
      </div>

      <div class="cq-grid-3">
        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-settings-4-line"></i></div>
          <h3 class="cq-peluang-card-title">Aman untuk Dinamo Mesin</h3>
          <p class="cq-peluang-card-desc">
            Formula *low foam* (rendah busa) mencegah luapan busa masuk ke sistem bearing dan dinamo mesin cuci front-loading, memperpanjang usia pakai mesin komersial Anda.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-drop-line"></i></div>
          <h3 class="cq-peluang-card-title">Hemat Air &amp; Listrik Bilasan</h3>
          <p class="cq-peluang-card-desc">
            Busa cepat luruh hanya dalam 1–2 kali bilasan, memangkas durasi siklus cuci mesin, menghemat debit air, dan menurunkan tagihan listrik bulanan outlet.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-leaf-line"></i></div>
          <h3 class="cq-peluang-card-title">Ramah Serat Kain &amp; Kulit</h3>
          <p class="cq-peluang-card-desc">
            Kandungan biodegradable dengan pH terkontrol, tidak menyebabkan warna pakaian pudar atau memicu alergi gatal pada kulit sensitif pelanggan laundry Anda.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       4. KATALOG 6 PRODUK CHEMICAL UTAMA
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="katalog">
    <div class="cq-container">
      <div class="cq-section-header">
        <h2 class="cq-section-title">Rangkaian Chemical Laundry Lengkap Orchid Brand</h2>
        <p class="cq-section-desc">Tersedia dalam kemasan jerigen 5 Liter praktis dan drum industri untuk pasokan rutin outlet.</p>
      </div>

      <div class="cq-grid-3">
        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-water-flash-line"></i></div>
          <h3 class="cq-peluang-card-title">Deterjen Cair Low Foam</h3>
          <p class="cq-peluang-card-desc">
            Konsentrat pembersih noda minyak dan keringat dengan daya angkat kotoran tinggi. Busa minimalis khusus mesin cuci bukaan depan komersial.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-sparkling-2-line"></i></div>
          <h3 class="cq-peluang-card-title">Parfum Laundry Microcapsule</h3>
          <p class="cq-peluang-card-desc">
            Aroma mewah tahan hingga 30 hari dalam lemari/plastik kemasan. Varian favorit pelanggan: Snappy, Sakura, Ocean Fresh, Akasia, dan Lavender.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-windy-line"></i></div>
          <h3 class="cq-peluang-card-title">Pelicin &amp; Pewangi Setrika</h3>
          <p class="cq-peluang-card-desc">
            Formula pelicin setrika uap dan listrik. Pakaian langsung licin rapi seketika tanpa meninggalkan bercak putih pada kain gelap.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-flask-line"></i></div>
          <h3 class="cq-peluang-card-title">Spotting Khusus Karat &amp; Darah</h3>
          <p class="cq-peluang-card-desc">
            Cairan kimia *heavy-duty* penghilang noda darah kering, karat besi, minyak oli, dan getah pohon tanpa merusak benang kain.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-magic-line"></i></div>
          <h3 class="cq-peluang-card-title">Oxy Powder Booster Pencerah</h3>
          <p class="cq-peluang-card-desc">
            Bubuk oksigen aktif pencerah pakaian putih dan pelindung pakaian berwarna agar tidak kusam akibat pemakaian berulang.
          </p>
        </div>

        <div class="cq-peluang-card">
          <div class="cq-peluang-icon-wrap" aria-hidden="true"><i class="ri-bubble-chart-line"></i></div>
          <h3 class="cq-peluang-card-title">Pelembut Pakaian (Softener)</h3>
          <p class="cq-peluang-card-desc">
            Formula anti-statis yang membuat handuk, sprei, dan pakaian tebal menjadi luar biasa lembut serta sangat mudah disetrika.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. CLOSING BANNER CTA (Contained Section Card)
       ======================================================== -->
  <section class="cq-section cq-banner-cta-section">
    <div class="cq-container">
      <div class="cq-banner-cta-card">
        <h2 class="cq-banner-cta-title">
          Ingin Pasokan Chemical Rutin Langsung dari Pabrik?
        </h2>
        <p class="cq-banner-cta-desc">
          Kunjungi portal resmi kami di <strong>indotech.id</strong> atau hubungi tim distribusi <strong>PT Indotech Berkah Abadi</strong> untuk penawaran harga grosir khusus pengusaha laundry.
        </p>
        <div class="cq-banner-cta-actions">
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Pesan Chemical via WhatsApp
          </a>
          <a href="https://indotech.id" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
            <i class="ri-external-link-line" aria-hidden="true"></i> Kunjungi Situs Indotech.id
          </a>
          <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
            <i class="ri-store-2-line" aria-hidden="true"></i> Paket Usaha Laundry
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
