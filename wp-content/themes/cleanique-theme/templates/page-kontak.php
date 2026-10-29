<?php
/**
 * Template Name: Company Profile - Kontak Kami
 * Description: Halaman Kontak & Lokasi Kantor PT Indotech Berkah Abadi
 * Modern Corporate Bento Architecture & High-Converting Consultation Hub
 *
 * @package Cleanique
 */

get_header();

if (have_posts()) {
    the_post();
}

$wa_url = cleanique_get_whatsapp_url('general');
$office_addr = get_theme_mod('cleanique_office_address', 'Jalan Jongke Kidul Tengah No. 30, RT.01/RW.23, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285');
$wa_number = get_theme_mod('cleanique_wa_number', '6285600061005');
?>

<main id="main-content" class="cq-contact-page">
  <div id="top"></div>

  <!-- ========================================================
       1. HERO SECTION (Corporate Split Layout with Visual Support)
       ======================================================== -->
  <section class="cq-corp-hero cq-contact-hero" id="kontak">
    <div class="cq-container">
      <div class="cq-corp-hero-top">
        <div class="cq-corp-hero-content">
          <span class="cq-badge-clean">Kantor Pusat</span>
          
          <h1 class="cq-corp-hero-title cq-payno-heading">
            Terhubung Langsung dengan Tim Ahli Kami, <span class="cq-text-accent cq-text-blue">Mulai Bisnis Laundry Terarah.</span>
          </h1>

          <p class="cq-corp-hero-desc">
            Kantor operasional, fasilitas produksi bahan kimia <em>Orchid Brand</em>, dan showroom perangkat keras laundry komersial <strong>PT Indotech Berkah Abadi</strong> terbuka lebar untuk kunjungan calon mitra. Konsultasikan rencana bisnis, survei kelayakan lokasi, uji coba mesin langsung, serta sistem aplikasi kasir Smart POS kami.
          </p>

          <div class="cq-contact-quick-bullets">
            <span class="cq-contact-bullet-item"><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Respon Cepat WhatsApp Konsultan</span>
            <span class="cq-contact-bullet-item"><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Pendampingan Rencana &amp; Survei Lokasi</span>
            <span class="cq-contact-bullet-item"><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Showroom &amp; Workshop Buka Senin – Sabtu</span>
          </div>

          <div class="cq-corp-hero-actions">
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi
            </a>
            <a href="#form-konsultasi" class="cq-btn cq-btn-outline cq-btn-pill">
              Formulir Konsultasi
            </a>
          </div>
        </div>

        <div class="cq-corp-hero-visual">
          <div class="cq-hero-visual-frame">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" 
                 alt="Showroom dan Outlet Standar Kemitraan Cleanique Laundry Sleman" 
                 class="cq-hero-visual-img" 
                 loading="lazy">
            <div class="cq-hero-visual-caption">
              Showroom Sleman
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================
       2. KANTOR OPERASIONAL, WORKSHOP & FORMULIR KONSULTASI
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="form-konsultasi">
    <div class="cq-container">
      
      <!-- Unified Section Header Across Container (Prevents Header Clipping) -->
      <div class="cq-section-header cq-contact-section-header">
        <span class="cq-badge-clean">Konsultasi Resmi</span>
        <h2 class="cq-section-title">Kantor Operasional &amp; Showroom Resmi</h2>
        <p class="cq-section-desc">
          Kunjungi workshop peralatan kami di Sleman untuk melihat langsung unit mesin komersial, atau kirimkan rincian rencana usaha Anda melalui formulir konsultasi terintegrasi WhatsApp di bawah ini.
        </p>
      </div>

      <div class="cq-grid-2 cq-contact-grid">
        <!-- Kolom Kiri: Info Kantor, Workshop Sleman & Showcase -->
        <div class="cq-contact-left-col">
          
          <!-- Card 1: Workshop & Showroom Showcase Card (Real Team & Facility Image) -->
          <div class="cq-contact-info-card">
            <div class="cq-gateway-thumb-wrap">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/indotech-team.jpg'); ?>" 
                   alt="Fasilitas Workshop &amp; Tim Teknis PT Indotech Berkah Abadi Sleman" 
                   class="cq-gateway-thumb-img" 
                   loading="lazy">
            </div>
            
            <div class="cq-contact-info-body">
              <span class="cq-badge-clean">Kantor Resmi</span>
              <h3 class="cq-contact-info-title">PT Indotech Berkah Abadi</h3>
              <p class="cq-contact-info-addr">
                <i class="ri-map-pin-2-fill" aria-hidden="true"></i>
                <?php echo nl2br(esc_html($office_addr)); ?>
              </p>
              <div>
                <a href="https://maps.google.com/?q=PT+Indotech+Berkah+Abadi+Sleman" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-sm">
                  Buka Rute
                </a>
              </div>
            </div>
          </div>

          <!-- Card 2: WhatsApp Hotline & Jam Kerja (2 Kolom Mini) -->
          <div class="cq-contact-subgrid">
            <div class="cq-contact-mini-card">
              <span class="cq-pos-sub-badge">Respon Cepat</span>
              <h4 class="cq-contact-mini-title">WhatsApp Hotline:</h4>
              <a href="<?php echo esc_url($wa_url); ?>" class="cq-contact-mini-link" target="_blank" rel="noopener">
                +<?php echo esc_html($wa_number); ?> <i class="ri-arrow-right-up-line" aria-hidden="true"></i>
              </a>
              <span class="cq-contact-mini-note">Konsultasi Bisnis &amp; Mesin</span>
            </div>

            <div class="cq-contact-mini-card">
              <span class="cq-badge-clean">Jam Operasional</span>
              <h4 class="cq-contact-mini-title">Jadwal Kunjungan:</h4>
              <p class="cq-contact-mini-text">
                Senin – Sabtu: <strong>08.00 – 17.00 WIB</strong><br>
                <span style="color: #64748b; font-size: 11.5px;">(Minggu dengan Janji Temu)</span>
              </p>
            </div>
          </div>

          <!-- Card 3: Live Test Drive & Demo Showroom (With Equipment Image) -->
          <div class="cq-contact-demo-card">
            <div class="cq-contact-demo-thumb">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/equip-washer-dryer.jpg'); ?>" 
                   alt="Mesin Cuci Komersial dan Dryer Heavy Duty Cleanique" 
                   loading="lazy">
            </div>
            <div class="cq-contact-demo-content">
              <h4 class="cq-contact-demo-title">Uji Coba Mesin &amp; Cek Chemical Langsung</h4>
              <p class="cq-contact-demo-desc">
                Saksikan demonstrasi kerja mesin cuci komersial, kecepatan dryer gas, dan aroma tahan lama parfum Orchid Brand langsung di Sleman.
              </p>
              <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-sm">
                Jadwalkan Kunjungan
              </a>
            </div>
          </div>
        </div>

        <!-- Kolom Kanan: Interactive WhatsApp Lead Capture Form Card -->
        <div class="cq-contact-right-col">
          <div class="cq-contact-form-card">
            <div class="cq-contact-form-header">
              <span class="cq-badge-clean is-mint">Responsif</span>
              <h3 class="cq-contact-form-title">
                Formulir Konsultasi &amp; Penawaran
              </h3>
              <p class="cq-contact-form-subtitle">
                Pilih topik kebutuhan Anda. Sistem kami akan otomatis merapikan data dan membuka WhatsApp untuk tersambung langsung ke konsultan resmi kami.
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
                <input type="text" id="contact-city" class="cq-input" placeholder="Contoh: Sleman / Yogyakarta / Solo / Semarang" required>
              </div>

              <div class="cq-form-group">
                <label for="contact-category">Topik yang Ingin Dikonsultasikan *</label>
                <select id="contact-category" class="cq-input" required>
                  <option value="Paket Usaha Laundry Kiloan Starter">Paket Usaha Kiloan Starter (Mulai Rp 28 Jt-an)</option>
                  <option value="Paket Usaha Komersial Pro (Ruko)">Paket Usaha Komersial Pro Ruko (Mulai Rp 48 Jt-an)</option>
                  <option value="Paket Usaha Industrial Express">Paket Usaha Industrial Express (Mulai Rp 85 Jt-an)</option>
                  <option value="Aplikasi Smart POS Laundry (Langganan Cloud)">Aplikasi Kasir Smart POS (Sistem Langganan Bulanan/Tahunan)</option>
                  <option value="Pasokan Bahan Kimia Pabrik Orchid Brand">Pasokan Kimia &amp; Parfum Standar Pabrik (Orchid Brand)</option>
                  <option value="Pembelian Unit Mesin & Boiler Satuan">Pembelian Unit Mesin Cuci/Dryer &amp; Boiler Satuan</option>
                  <option value="Jadwal Kunjungan Showroom & Uji Mesin">Jadwalkan Kunjungan Showroom &amp; Tes Mesin di Sleman</option>
                  <option value="Konsultasi Umum Rencana Bisnis">Konsultasi Rencana Bisnis Laundry Lainnya</option>
                </select>
              </div>

              <div class="cq-form-group">
                <label for="contact-message">Catatan / Rencana Bisnis (Opsional)</label>
                <textarea id="contact-message" class="cq-input" rows="3" placeholder="Tuliskan estimasi modal, kondisi lokasi ruko, atau pertanyaan khusus Anda..."></textarea>
              </div>

              <button type="submit" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-block cq-btn-lg" style="margin-top: 14px; min-height: 50px;">
                <i class="ri-whatsapp-line" aria-hidden="true"></i> Kirim Pesan
              </button>

              <div class="cq-contact-form-disclaimer">
                Data Anda aman dan hanya digunakan untuk keperluan konsultasi resmi Cleanique by PT Indotech Berkah Abadi.
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
  <section class="cq-section" id="lokasi-workshop">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-clean">Peta Lokasi</span>
        <h2 class="cq-section-title">Lokasi Workshop &amp; Pusat Layanan Sleman</h2>
        <p class="cq-section-desc">
          Kunjungi kantor pusat operasional dan fasilitas workshop PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta. Akses mudah dijangkau dengan kendaraan roda empat, area parkir luas, dan fasilitas bongkar muat mesin laundry.
        </p>
      </div>

      <div class="cq-maps-card" style="max-width: 1060px; margin: 0 auto; background: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 40px -10px rgba(15, 23, 42, 0.08); border: 1px solid #e2e8f0;">
        
        <!-- Live Google Maps Embed Frame -->
        <div class="cq-maps-frame" style="position: relative; width: 100%; height: clamp(340px, 45vh, 460px); background: #f1f5f9;">
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
          
          <!-- Badge overlay di pojok peta (Clean text) -->
          <div style="position: absolute; top: 16px; left: 16px; background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(8px); padding: 6px 14px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 1px solid rgba(226, 232, 240, 0.9); font-size: 12px; font-weight: 700; color: #0f172a;">
            Kantor Pusat
          </div>
        </div>

        <!-- Detail Alamat & Tombol Aksi Langsung -->
        <div class="cq-maps-info" style="padding: clamp(24px, 3.5vw, 36px); border-top: 1px solid #e2e8f0; background: #ffffff;">
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; align-items: center;">
            
            <!-- Kolom Informasi Alamat -->
            <div>
              <div style="margin-bottom: 8px;">
                <h3 style="font-size: 1.2rem; font-weight: 500; color: #0f172a; margin: 0 0 4px 0; line-height: 1.2;">
                  PT Indotech Berkah Abadi
                </h3>
                <span style="font-size: 12.5px; font-weight: 600; color: #0284c7;">Kantor Pusat &amp; Workshop Pabrik Chemical (Orchid Brand)</span>
              </div>

              <p style="font-size: 13.5px; line-height: 1.6; color: #475569; margin: 0 0 14px 0;">
                <i class="ri-map-pin-fill" style="color: #0284c7; margin-right: 4px;" aria-hidden="true"></i>
                <?php echo esc_html($office_addr); ?>
              </p>

              <div style="display: flex; flex-wrap: wrap; gap: 14px; font-size: 12.5px; color: #64748b;">
                <span><strong>Jam Buka:</strong> Senin – Sabtu, 08.00 – 17.00 WIB</span>
                <span>&bull;</span>
                <span><strong>Akses:</strong> Parkir Mobil/Truk &amp; Bongkar Muat</span>
              </div>
            </div>

            <!-- Kolom Tombol Aksi Tunggal (Clean, No Multi-Button Clutter) -->
            <div style="display: flex; justify-content: flex-end;">
              <a href="https://www.google.com/maps/dir/?api=1&destination=-7.7320403,110.3679988" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-lg">
                Petunjuk Arah
              </a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================
       4. FAQ SEPUTAR KONSULTASI & KUNJUNGAN
       ======================================================== -->
  <section class="cq-section cq-section-alt" id="faq-kontak">
    <div class="cq-container">
      <div class="cq-section-header">
        <span class="cq-badge-clean">FAQ Konsultasi</span>
        <h2 class="cq-section-title">Pertanyaan Umum Seputar Kemitraan &amp; Kunjungan</h2>
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
            <span>Bagaimana proses konsultasi rencana usaha dan estimasi modal?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>Konsultasi dilakukan secara menyeluruh dan transparan. Anda dapat berdiskusi mengenai proyeksi modal, pemilihan kapasitas mesin sesuai target pasar (perumahan, kos mahasiswa, atau hotel), skema instalasi pipa &amp; exhaust, hingga formula chemical pabrik Orchid Brand tanpa komitmen sepihak.</p>
          </div>
        </div>

        <div class="cq-accordion-item">
          <button type="button" class="cq-accordion-trigger" aria-expanded="false">
            <span>Bagaimana jika lokasi usaha saya berada di luar D.I. Yogyakarta?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>PT Indotech Berkah Abadi melayani pengiriman paket mesin lengkap, instalasi plumbing &amp; kelistrikan, serta pelatihan karyawan onsite ke seluruh wilayah Indonesia (Jawa, Sumatera, Kalimantan, Sulawesi, Bali, hingga Papua) menggunakan armada ekspedisi terpercaya dan teknisi resmi kami.</p>
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
            <span>Bagaimana tahapan alur kemitraan dari awal hingga outlet siap beroperasi?</span>
            <i class="ri-arrow-down-s-line cq-accordion-icon" aria-hidden="true"></i>
          </button>
          <div class="cq-accordion-content">
            <p>Alur kerja kami terstruktur dalam 6 langkah pasti: <strong>1. Konsultasi</strong> (analisis kebutuhan &amp; paket) &rarr; <strong>2. Survei</strong> (kelayakan lokasi, daya listrik &amp; air) &rarr; <strong>3. Perancangan</strong> (denah layout &amp; plumbing) &rarr; <strong>4. Setup</strong> (pengiriman unit &amp; instalasi) &rarr; <strong>5. Pelatihan</strong> (SOP cuci, chemical &amp; sistem POS) &rarr; <strong>6. Grand Opening</strong> (outlet resmi buka dengan pendampingan promosi).</p>
          </div>
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
          Wujudkan Bisnis Laundry Tangguh &amp; Mandiri
        </h2>
        <p class="cq-banner-cta-desc">
          Hubungi tim konsultan <strong>PT Indotech Berkah Abadi</strong> sekarang untuk mendapatkan rincian paket usaha siap buka, pasokan chemical standar pabrik, dan sistem Smart POS.
        </p>
        <div class="cq-banner-cta-actions">
          <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-lg" target="_blank" rel="noopener">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Hubungi Konsultan
          </a>
          <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-outline cq-btn-pill cq-btn-lg">
            Pilihan Paket
          </a>
        </div>
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
