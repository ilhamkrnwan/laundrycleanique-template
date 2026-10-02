<?php
/**
 * Template Name: Company Profile - Kontak Kami
 * Description: Halaman Kontak & Lokasi Kantor PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic & High-Converting Consultation Hub
 *
 * @package Cleanique
 */

get_header();
$wa_url = cleanique_get_whatsapp_url('general');
$office_addr = get_theme_mod('cleanique_office_address', 'PT Indotech Berkah Abadi - Sleman, D.I. Yogyakarta, Indonesia');
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
            <i class="ri-customer-service-2-line" style="color: var(--mint-cta); font-size: 15px;" aria-hidden="true"></i>
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
            <a href="#form-konsultasi" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-mail-send-line" aria-hidden="true"></i> Isi Form Konsultasi
            </a>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-accent cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Chat WhatsApp CS
            </a>
            <a href="https://maps.google.com/?q=PT+Indotech+Berkah+Abadi+Sleman" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill cq-btn-pill">
              <i class="ri-map-pin-line" aria-hidden="true"></i> Petunjuk Google Maps
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
          <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Informasi Resmi</span>
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
              <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">
                <i class="ri-flashlight-line" aria-hidden="true"></i> Fast Response Form
              </span>
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
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Akses &amp; Rute</span>
        <h2 class="cq-section-title">Lokasi Workshop &amp; Pusat Layanan Sleman</h2>
        <p class="cq-section-desc">
          Berada di lokasi strategis Sleman, D.I. Yogyakarta dengan kemudahan akses kendaraan roda empat, area parkir luas, dan fasilitas bongkar muat mesin.
        </p>
      </div>

      <div class="cq-peluang-stage" style="margin-top: 0;">
        <div class="cq-peluang-frame" style="aspect-ratio: 21/9; min-height: 280px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; position: relative;">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>" alt="Kantor &amp; Workshop PT Indotech Berkah Abadi Sleman" style="opacity: 0.85;">
          
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(15, 23, 42, 0.4) 0%, rgba(15, 23, 42, 0.8) 100%); display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px; text-align: center; color: #ffffff;">
            <div style="width: 56px; height: 56px; border-radius: 50%; background: var(--brand-deep); display: flex; align-items: center; justify-content: center; font-size: 26px; margin-bottom: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
              <i class="ri-map-pin-user-line" aria-hidden="true"></i>
            </div>
            <h3 style="font-family: var(--cq-font-heading); font-size: clamp(1.2rem, 1rem + 1vw, 1.8rem); font-weight: 800; margin-bottom: 8px;">
              PT Indotech Berkah Abadi — Sleman, Yogyakarta
            </h3>
            <p style="font-size: 14px; max-width: 540px; margin-bottom: 16px; color: #e2e8f0;">
              <?php echo esc_html($office_addr); ?>
            </p>
            <a href="https://maps.google.com/?q=PT+Indotech+Berkah+Abadi+Sleman" target="_blank" rel="noopener" class="cq-btn cq-btn-accent cq-btn-pill">
              <i class="ri-external-link-line" aria-hidden="true"></i> Buka Navigasi Google Maps
            </a>
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
        <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">Tanya Jawab</span>
        <h2 class="cq-section-title">Pertanyaan Umum Seputar Konsultasi</h2>
        <p class="cq-section-desc">Hal-hal yang sering ditanyakan oleh calon mitra sebelum berkunjung atau berdiskusi dengan tim kami.</p>
      </div>

      <div class="cq-accordion">
        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-header" aria-expanded="false">
            <span>Apakah saya perlu membuat janji temu sebelum berkunjung ke showroom?</span>
            <i class="ri-add-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-body">
            <p>Untuk memastikan tim teknisi dan konsultan kami siap mendampingi serta menyiapkan demonstrasi mesin yang Anda minati, kami sangat menyarankan untuk konfirmasi janji temu terlebih dahulu melalui WhatsApp minimal 1 hari sebelumnya.</p>
          </div>
        </div>

        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-header" aria-expanded="false">
            <span>Apakah konsultasi dan estimasi modal paket usaha dikenakan biaya?</span>
            <i class="ri-add-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-body">
            <p>Sama sekali <strong>gratis 100%</strong>. Anda bebas berdiskusi mengenai proyeksi balik modal (BEP), pemilihan set mesin, rekomendasi layout outlet, hingga takaran chemical tanpa kewajiban apapun.</p>
          </div>
        </div>

        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-header" aria-expanded="false">
            <span>Bagaimana jika lokasi usaha saya berada di luar D.I. Yogyakarta?</span>
            <i class="ri-add-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-body">
            <p>PT Indotech Berkah Abadi melayani pengiriman paket mesin, instalasi plumbing &amp; kelistrikan, serta pendampingan SOP ke seluruh wilayah Indonesia (Jawa, Sumatera, Kalimantan, Sulawesi, Bali, hingga Papua) dengan ekspedisi cargo terpercaya dan teknisi onsite.</p>
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
      <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.12); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.25);">
        <i class="ri-customer-service-2-line" aria-hidden="true"></i> Konsultasi Kemitraan Tanpa Royalti
      </div>
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
