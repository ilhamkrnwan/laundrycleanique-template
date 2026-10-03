<?php
/**
 * Template Name: Company Profile - Kontak Kami
 * Description: Halaman Kontak & Lokasi Kantor PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic & High-Converting Consultation Hub
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
$office_addr = get_theme_mod('cleanique_office_address', 'Jalan Jongke Kidul Tengah No. 30, RT.01/RW.23, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285');
$wa_number = get_theme_mod('cleanique_wa_number', '6281234567890');
?>

<main id="main-content" class="cq-contact-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Payno Modern Split Layout)
       ======================================================== -->
  <section class="cq-sky-canvas cq-payno-hero" id="kontak">
    <div class="cq-container">
      <div class="cq-payno-hero-top">
        <div>
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Pusat Informasi &amp; Showroom Resmi &bull; Sleman, D.I. Yogyakarta
          </div>
          <h1 class="cq-payno-heading">
            Terhubung dengan Tim Ahli Kami, <span class="cq-text-blue">Mulai Usaha Laundry Tanpa Ragu.</span>
          </h1>
        </div>

        <div class="cq-payno-hero-right">
          <p class="cq-payno-hero-desc">
            Kantor pusat operasional, fasilitas formulasi chemical (*Orchid Brand*), dan showroom mesin laundry komersial <strong>PT Indotech Berkah Abadi</strong> terbuka lebar untuk kunjungan calon mitra. Konsultasikan rencana bisnis Anda, survei kelayakan lokasi, uji coba mesin langsung, atau aktivasi free trial aplikasi POS kasir kami.
          </p>

          <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Respon Cepat WhatsApp 24/7</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Konsultasi &amp; Estimasi Modal Gratis</span>
            <span>&bull;</span>
            <span><i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);" aria-hidden="true"></i> Showroom Buka Senin – Sabtu</span>
          </div>

          <div class="cq-payno-hero-actions">
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Chat WhatsApp CS
            </a>
            <a href="#form-konsultasi" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-mail-send-line" aria-hidden="true"></i> Isi Form Konsultasi
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. INTERACTIVE CONTACT DETAILS & WHATSAPP GENERATOR FORM
       ======================================================== -->
  <section class="cq-section" id="form-konsultasi" style="padding-top: var(--cq-sp-48);">
    <div class="cq-container">
      <div class="cq-grid-2" style="align-items: flex-start; gap: var(--cq-sp-40);">
        <!-- Kolom Kiri: Info Kantor & Workshop Sleman -->
        <div>
          <h2 style="font-family: var(--cq-font-heading); font-size: clamp(1.8rem, 1.4rem + 1vw, 2.4rem); font-weight: 800; color: var(--cq-dark-navy); margin-bottom: var(--cq-sp-20);">
            Kantor Operasional &amp; Showroom
          </h2>

          <!-- Card 1: Alamat Pabrik & Kantor -->
          <div class="cq-peluang-card" style="margin-bottom: var(--cq-sp-20); padding: var(--cq-sp-24);">
            <div class="cq-peluang-icon-wrap" style="background: rgba(0, 119, 182, 0.12); color: var(--brand-deep);" aria-hidden="true">
              <i class="ri-map-pin-2-fill"></i>
            </div>
            <h3 class="cq-peluang-card-title" style="font-size: 1.15rem; margin-bottom: 6px;">Alamat Kantor &amp; Showroom:</h3>
            <p style="font-size: 14px; font-weight: 700; color: var(--cq-dark-navy); margin-bottom: 4px;">
              PT Indotech Berkah Abadi
            </p>
            <p class="cq-peluang-card-desc" style="margin-bottom: var(--cq-sp-16);">
              <?php echo nl2br(esc_html($office_addr)); ?>
            </p>
            <div>
              <a href="https://maps.google.com/?q=PT+Indotech+Berkah+Abadi+Sleman" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-sm">
                <i class="ri-direction-line" aria-hidden="true"></i> Buka Rute di Google Maps
              </a>
            </div>
          </div>

          <!-- Card 2: WhatsApp & Jam Kerja (Grid 2 Kolom Mini) -->
          <div class="cq-grid-2" style="gap: var(--cq-sp-16); margin-bottom: var(--cq-sp-20);">
            <div class="cq-peluang-card" style="padding: var(--cq-sp-20);">
              <div class="cq-peluang-icon-wrap" style="background: rgba(16, 185, 129, 0.14); color: var(--mint-cta); width: 44px; height: 44px; font-size: 1.25rem;" aria-hidden="true">
                <i class="ri-whatsapp-fill"></i>
              </div>
              <h4 style="font-family: var(--cq-font-heading); font-size: 14px; font-weight: 800; color: var(--cq-dark-navy); margin-bottom: 4px;">
                WhatsApp Konsultan:
              </h4>
              <p style="font-size: 11px; color: var(--mint-cta); font-weight: 700; margin-bottom: 8px;">
                <i class="ri-checkbox-circle-fill"></i> Respon Cepat 24/7
              </p>
              <a href="<?php echo esc_url($wa_url); ?>" style="font-family: var(--cq-font-heading); font-weight: 800; color: var(--brand-deep); text-decoration: none; font-size: 14px;" target="_blank" rel="noopener">
                +<?php echo esc_html($wa_number); ?> <i class="ri-arrow-right-up-line"></i>
              </a>
            </div>

            <div class="cq-peluang-card" style="padding: var(--cq-sp-20);">
              <div class="cq-peluang-icon-wrap" style="background: rgba(245, 158, 11, 0.14); color: #d97706; width: 44px; height: 44px; font-size: 1.25rem;" aria-hidden="true">
                <i class="ri-time-fill"></i>
              </div>
              <h4 style="font-family: var(--cq-font-heading); font-size: 14px; font-weight: 800; color: var(--cq-dark-navy); margin-bottom: 4px;">
                Jam Operasional:
              </h4>
              <p style="font-size: 12px; color: var(--cq-text-muted); line-height: 1.5; margin: 0;">
                Senin – Sabtu<br>
                <strong>08.00 – 17.00 WIB</strong><br>
                (Minggu dengan Janji Temu)
              </p>
            </div>
          </div>

          <!-- Card 3: Uji Coba Showroom -->
          <div class="cq-peluang-card" style="background: linear-gradient(135deg, #f0fdf4 0%, #e0f2fe 100%); border-color: #bae6fd; padding: var(--cq-sp-24);">
            <div style="display: flex; gap: 14px; align-items: flex-start;">
              <i class="ri-store-2-line" style="font-size: 28px; color: var(--brand-deep); margin-top: 2px;" aria-hidden="true"></i>
              <div>
                <h4 style="font-family: var(--cq-font-heading); font-size: 15px; font-weight: 800; color: var(--cq-dark-navy); margin-bottom: 4px;">
                  Ingin Uji Coba Mesin Langsung di Showroom?
                </h4>
                <p style="font-size: 13px; color: #334155; line-height: 1.6; margin-bottom: 12px;">
                  Anda dapat melihat demonstrasi kerja mesin cuci komersial, mesin pengering konversi gas, serta aroma parfum laundry Orchid Brand langsung di tempat kami.
                </p>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-sm">
                  <i class="ri-calendar-check-line" aria-hidden="true"></i> Jadwalkan Kunjungan Showroom
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Kolom Kanan: Interactive WhatsApp Lead Capture Form Card -->
        <div>
          <div class="cq-peluang-card" style="border: 1.5px solid var(--cq-border-light); border-radius: 32px; box-shadow: 0 12px 40px -4px rgba(15, 23, 42, 0.08); padding: clamp(24px, 4vw, 36px);">
            <div style="margin-bottom: var(--cq-sp-20);">
              <h3 style="font-family: var(--cq-font-heading); font-size: 1.35rem; font-weight: 800; color: var(--cq-dark-navy); margin-bottom: 6px;">
                Formulir Konsultasi &amp; Penawaran
              </h3>
              <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.6; margin: 0;">
                Pilih topik kebutuhan Anda. Sistem kami akan otomatis merapikan data dan membuka WhatsApp untuk tersambung ke konsultan resmi kami.
              </p>
            </div>

            <form id="cq-contact-form" class="cq-form-trial">
              <div class="cq-form-group">
                <label for="contact-name">Nama Lengkap Anda *</label>
                <input type="text" id="contact-name" class="cq-input" placeholder="Contoh: Bpk. Hendra Pratama" required>
              </div>

              <div class="cq-form-group">
                <label for="contact-wa">Nomor WhatsApp Aktif *</label>
                <input type="tel" id="contact-wa" class="cq-input" placeholder="Contoh: 081234567890" required>
              </div>

              <div class="cq-form-group">
                <label for="contact-city">Kota / Kabupaten Domisili *</label>
                <input type="text" id="contact-city" class="cq-input" placeholder="Contoh: Sleman / Yogyakarta / Solo" required>
              </div>

              <div class="cq-form-group">
                <label for="contact-category">Topik yang Ingin Dikonsultasikan *</label>
                <select id="contact-category" class="cq-input" required>
                  <option value="Paket Usaha Laundry Siap Buka (Turnkey)">Paket Usaha Laundry Siap Buka (Turnkey Tanpa Royalti)</option>
                  <option value="Aplikasi Kasir POS (Trial 7 Hari)">Aplikasi Kasir POS Laundry (Free Trial 7 Hari)</option>
                  <option value="Pasokan Bahan Kimia & Parfum Pabrik">Pasokan Bahan Kimia &amp; Parfum Standar Pabrik (Orchid Brand)</option>
                  <option value="Jadwal Kunjungan Showroom & Uji Mesin">Jadwalkan Kunjungan Showroom &amp; Tes Mesin di Sleman</option>
                  <option value="Konsultasi Umum / Kerjasama">Konsultasi Umum / Rencana Usaha Lainnya</option>
                </select>
              </div>

              <div class="cq-form-group">
                <label for="contact-message">Catatan / Rencana Bisnis (Opsional)</label>
                <textarea id="contact-message" class="cq-input" rows="3" placeholder="Tuliskan estimasi modal, kondisi lokasi, atau pertanyaan khusus Anda..."></textarea>
              </div>

              <button type="submit" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-block cq-btn-lg" style="margin-top: var(--cq-sp-12);">
                <i class="ri-whatsapp-line" aria-hidden="true"></i> Kirim &amp; Buka WhatsApp Konsultan
              </button>

              <div style="font-size: 11px; color: var(--cq-text-muted); text-align: center; margin-top: 10px;">
                <i class="ri-lock-line" aria-hidden="true"></i> Data Anda aman dan hanya digunakan untuk keperluan konsultasi resmi Cleanique by PT Indotech Berkah Abadi.
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       3. PETUNJUK LOKASI & GOOGLE MAPS ACCESS
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="lokasi-workshop">
    <div class="cq-container">
      <div class="cq-section-header">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12); display: inline-flex; align-items: center; gap: 6px;">
          <i class="ri-map-pin-2-fill text-brand" aria-hidden="true"></i> Peta Lokasi Workshop &amp; Kantor Resmi
        </div>
        <h2 class="cq-section-title">Lokasi Workshop &amp; Pusat Layanan Sleman</h2>
        <p class="cq-section-desc">
          Kunjungi kantor pusat operasional dan fasilitas workshop PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta. Akses mudah dijangkau dengan kendaraan roda empat, area parkir luas, dan fasilitas bongkar muat mesin laundry.
        </p>
      </div>

      <div class="cq-maps-card" style="max-width: 1060px; margin: 0 auto; background: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 45px -12px rgba(15, 23, 42, 0.12), 0 0 0 1px rgba(226, 232, 240, 0.8);">
        
        <!-- Live Google Maps Embed Frame -->
        <div class="cq-maps-frame" style="position: relative; width: 100%; height: clamp(340px, 45vh, 480px); background: #f1f5f9;">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.308726526848!2d110.3658101!3d-7.7320403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDMnNTUuMyJTIDExMMKwMjInMDQuOCJF!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
            width="100%" 
            height="100%" 
            style="border: 0; display: block;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            title="Peta Google Maps PT Indotech Berkah Abadi Sleman">
          </iframe>
          
          <!-- Badge overlay di pojok peta -->
          <div style="position: absolute; top: 16px; left: 16px; background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(8px); padding: 8px 16px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.12); border: 1px solid rgba(226, 232, 240, 0.9); display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; color: var(--navy-900);">
            <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);"></span>
            PT Indotech Berkah Abadi — Sleman
          </div>
        </div>

        <!-- Detail Alamat & Tombol Aksi Langsung -->
        <div class="cq-maps-info" style="padding: clamp(20px, 3vw, 32px); border-top: 1px solid var(--sky-200); background: #ffffff;">
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; align-items: center;">
            
            <!-- Kolom Informasi Alamat -->
            <div>
              <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                <div style="width: 38px; height: 38px; border-radius: 10px; background: rgba(14, 165, 233, 0.12); color: var(--brand-deep); display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;">
                  <i class="ri-building-line" aria-hidden="true"></i>
                </div>
                <div>
                  <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--navy-900); margin: 0; line-height: 1.2;">
                    PT Indotech Berkah Abadi
                  </h3>
                  <span style="font-size: 12px; font-weight: 600; color: var(--brand-deep);">Kantor Pusat &amp; Workshop Pabrik Chemical (Orchid Brand)</span>
                </div>
              </div>

              <p style="font-size: 14px; line-height: 1.6; color: var(--navy-700); margin: 0 0 12px 0;">
                <i class="ri-map-pin-fill" style="color: var(--brand-deep); margin-right: 4px;" aria-hidden="true"></i>
                <?php echo esc_html($office_addr); ?>
              </p>

              <div style="display: flex; flex-wrap: wrap; gap: 12px; font-size: 13px; color: var(--navy-600);">
                <span style="display: inline-flex; align-items: center; gap: 5px;">
                  <i class="ri-time-line text-brand" aria-hidden="true"></i> <strong>Jam Buka:</strong> Sen – Sab, 08.00 – 17.00 WIB
                </span>
                <span style="display: inline-flex; align-items: center; gap: 5px;">
                  <i class="ri-parking-box-line text-brand" aria-hidden="true"></i> <strong>Akses:</strong> Parkir Mobil/Truk &amp; Bongkar Muat
                </span>
              </div>
            </div>

            <!-- Kolom Tombol Aksi Navigasi -->
            <div style="display: flex; flex-direction: column; gap: 10px; justify-content: center;">
              <a href="https://www.google.com/maps/dir/?api=1&destination=-7.7320403,110.3679988" target="_blank" rel="noopener" class="cq-btn cq-btn-accent cq-btn-pill" style="justify-content: center; padding: 12px 24px; font-weight: 700;">
                <i class="ri-navigation-fill" aria-hidden="true"></i> Petunjuk Arah Google Maps
              </a>
              
              <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 10px;">
                <a href="https://www.google.com/maps/search/?api=1&query=-7.7320403,110.3679988" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill" style="justify-content: center; padding: 10px 16px; font-size: 13px;">
                  <i class="ri-external-link-line" aria-hidden="true"></i> Buka Titik Maps
                </a>
                <a href="<?php echo esc_url($wa_url); ?>&text=Halo%20Admin%20Indotech%20Sleman%2C%20saya%20berencana%20berkunjung%20ke%20kantor%2Fworkshop.%20Apakah%20bisa%20buat%20janji%20temu%3F" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill" style="justify-content: center; padding: 10px 16px; font-size: 13px; color: #16a34a; border-color: #86efac; background: #f0fdf4;">
                  <i class="ri-whatsapp-line" aria-hidden="true"></i> Janji Kunjungan
                </a>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       4. FAQ SEPUTAR KONSULTASI & KUNJUNGAN
       ======================================================== -->
  <section class="cq-section" id="faq-kontak">
    <div class="cq-container">
      <div class="cq-section-header">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12); display: inline-flex; align-items: center; gap: 6px;">
          <i class="ri-question-line text-brand" aria-hidden="true"></i> Tanya Jawab Seputar Konsultasi
        </div>
        <h2 class="cq-section-title">Pertanyaan Umum Seputar Konsultasi &amp; Kunjungan</h2>
        <p class="cq-section-desc">Hal-hal yang sering ditanyakan oleh calon mitra sebelum berkunjung atau berdiskusi langsung dengan tim ahli kami.</p>
      </div>

      <div class="cq-accordion" style="max-width: 820px; margin: 0 auto;">
        <div class="cq-accordion-item is-open">
          <button type="button" class="cq-accordion-trigger" aria-expanded="true">
            <span>Apakah saya perlu membuat janji temu sebelum berkunjung ke showroom?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>Untuk memastikan tim teknisi dan konsultan bisnis kami siap mendampingi serta menyiapkan demonstrasi unit mesin yang Anda minati, kami sangat menyarankan untuk konfirmasi janji temu terlebih dahulu melalui WhatsApp minimal 1 hari sebelumnya.</p>
          </div>
        </div>

        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Apakah konsultasi dan estimasi modal paket usaha dikenakan biaya?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>Sama sekali <strong>gratis 100%</strong>. Anda bebas berdiskusi mengenai proyeksi balik modal (BEP), pemilihan paket mesin, rekomendasi layout outlet, hingga formula chemical tanpa kewajiban komitmen apapun.</p>
          </div>
        </div>

        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Bagaimana jika lokasi usaha saya berada di luar D.I. Yogyakarta?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>PT Indotech Berkah Abadi melayani pengiriman paket mesin lengkap, instalasi plumbing &amp; kelistrikan, serta pendampingan SOP ke seluruh wilayah Indonesia (Jawa, Sumatera, Kalimantan, Sulawesi, Bali, NTB/NTT, hingga Papua) dengan ekspedisi kargo terpercaya dan teknisi onsite berpengalaman.</p>
          </div>
        </div>

        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Fasilitas dan perlengkapan apa saja yang bisa dicoba langsung di showroom?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>Di showroom dan workshop Sleman, Anda dapat melihat unit display mesin cuci &amp; dryer komersial heavy duty (stack), menguji demo formula chemical pembersih &amp; parfum laundry Orchid Brand, simulasi operasional aplikasi POS kasir Cleanique, serta konsultasi blueprint denah instalasi outlet.</p>
          </div>
        </div>

        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Bagaimana prosedur pemesanan paket usaha setelah survei atau konsultasi?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>Setelah jenis paket usaha disepakati, tim kami akan menerbitkan invoice resmi dan perjanjian kemitraan mandiri (tanpa royalti). Mesin akan dipersiapkan untuk quality control (QC), dikirim ke lokasi Anda, dan tim teknisi kami akan menjadwalkan instalasi serta training tuntas di tempat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       5. CLOSING BANNER CTA
       ======================================================== -->
  <section class="cq-section cq-section-dark cq-banner-cta-section">
    <div class="cq-container cq-section-header">
      <h2 class="cq-banner-cta-title">
        Wujudkan Impian Memiliki Usaha Laundry Modern Mandiri
      </h2>
      <p class="cq-banner-cta-desc">
        Hubungi tim konsultan <strong>PT Indotech Berkah Abadi</strong> sekarang juga untuk mendapatkan katalog lengkap paket usaha dan aktivasi akun uji coba aplikasi kasir.
      </p>
      <div class="cq-banner-cta-actions">
        <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Chat WhatsApp Konsultan Kami
        </a>
        <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
          <i class="ri-store-2-line" aria-hidden="true"></i> Pelajari Paket Usaha
        </a>
        <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-lg">
          <i class="ri-smartphone-line" aria-hidden="true"></i> Coba Aplikasi Kasir POS
        </a>
      </div>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('#cq-contact-form');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.querySelector('#contact-name')?.value.trim() || '';
      const wa = document.querySelector('#contact-wa')?.value.trim() || '';
      const cat = document.querySelector('#contact-category')?.value || 'Konsultasi Umum';
      const city = document.querySelector('#contact-city')?.value.trim() || '';
      const msg = document.querySelector('#contact-message')?.value.trim() || '-';

      const waNumber = '<?php echo esc_js($wa_number); ?>';
      const textMsg = `Halo Tim Cleanique Laundry (PT Indotech Berkah Abadi),\n\nSaya ingin berkonsultasi mengenai: *${cat}*\n\n*Nama:* ${name}\n*No. WA:* ${wa}\n*Kota Domisili:* ${city}\n*Catatan Rencana Bisnis:* ${msg}\n\nMohon informasi dan panduan jadwal konsultasinya. Terima kasih!`;
      
      const encodedUrl = `https://api.whatsapp.com/send?phone=${waNumber}&text=${encodeURIComponent(textMsg)}`;
      window.open(encodedUrl, '_blank');
    });
  }
});
</script>

<?php
get_footer();
