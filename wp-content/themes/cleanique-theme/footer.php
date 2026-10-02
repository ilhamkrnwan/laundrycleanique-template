<?php
/**
 * Cleanique Footer Template
 * Mendukung Company Profile Corporate Footer & Landing Page Promo Footer
 *
 * @package Cleanique
 */

$is_paket_usaha = is_page_template('templates/page-paket-usaha.php') || is_page('paket-usaha-laundry');
$is_aplikasi_laundry = is_page_template('templates/page-aplikasi-laundry.php') || is_page('aplikasi-laundry');
$is_landing_page = $is_paket_usaha || $is_aplikasi_laundry;

if ($is_paket_usaha) {
    $wa_url = cleanique_get_whatsapp_url('paket_usaha');
    $wa_label = 'Tanya Paket Usaha';
} elseif ($is_aplikasi_laundry) {
    $wa_url = cleanique_get_whatsapp_url('aplikasi_trial');
    $wa_label = 'Tanya CS Trial';
} elseif (is_post_type_archive('kemitraan') || is_singular('kemitraan') || is_page('kemitraan')) {
    $wa_url = cleanique_get_whatsapp_url('kemitraan');
    $wa_label = 'Konsultasi Kemitraan';
} else {
    $wa_url = cleanique_get_whatsapp_url('general');
    $wa_label = 'Konsultasi Resmi';
}

$office_addr = get_theme_mod('cleanique_office_address', 'PT Indotech Berkah Abadi - Sleman, D.I. Yogyakarta, Indonesia');
?>

<?php if ($is_landing_page) : ?>
  <!-- ========================================================
       PROMO LANDING PAGE FOOTER (Payno Style)
       ======================================================== -->
  <footer class="cq-payno-footer" role="contentinfo">
    <div class="cq-container">
      <div class="cq-payno-footer-card">
        <div class="cq-payno-footer-main">
          <!-- Left Column: Bio & Newsletter -->
          <div class="cq-payno-footer-left">
            <div class="cq-payno-footer-bio">
              <div class="cq-payno-footer-brand">
                <?php echo cleanique_get_site_logo(); ?>
                <span class="cq-payno-brand-sub">by Indotech.id</span>
              </div>
              <p class="cq-payno-footer-tagline">
                Ekosistem bisnis laundry terpadu di bawah naungan <strong>PT Indotech Berkah Abadi</strong> (Sleman, D.I. Yogyakarta). Menyediakan paket kemitraan siap buka 100% tanpa royalti, pasokan bahan kimia standar pabrik, dan aplikasi kasir POS laundry cerdas.
              </p>
            </div>

            <div class="cq-payno-footer-newsletter">
              <div class="cq-payno-newsletter-label">Dapatkan Info Promo &amp; Panduan Bisnis</div>
              <form class="cq-payno-newsletter-form" onsubmit="event.preventDefault(); alert('Terima kasih! Email Anda telah terdaftar.');">
                <div class="cq-payno-newsletter-pill">
                  <i class="ri-mail-line cq-newsletter-icon"></i>
                  <input type="email" placeholder="Masukkan Alamat Email Anda" required class="cq-newsletter-input">
                  <button type="submit" class="cq-newsletter-btn">
                    Langganan <i class="ri-arrow-right-up-line"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- Vertical Divider (Dotted) -->
          <div class="cq-payno-footer-vdiv" aria-hidden="true"></div>

          <!-- Right Column: Navigation Links -->
          <div class="cq-payno-footer-nav">
            <div class="cq-payno-nav-col">
              <h5 class="cq-payno-nav-title">LAYANAN &amp; PRODUK</h5>
              <ul class="cq-payno-nav-list">
                <li><a href="<?php echo esc_url(home_url('/kemitraan/')); ?>">Paket Kemitraan Turnkey</a></li>
                <li><a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">Aplikasi Kasir POS (Trial)</a></li>
                <li><a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">Chemical &amp; Parfum Pabrik</a></li>
                <li><a href="<?php echo esc_url(home_url('/solusi-kami/')); ?>">Solusi Ekosistem Bisnis</a></li>
              </ul>
            </div>

            <div class="cq-payno-nav-col">
              <h5 class="cq-payno-nav-title">PERUSAHAAN</h5>
              <ul class="cq-payno-nav-list">
                <li><a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>">Tentang PT Indotech</a></li>
                <li><a href="<?php echo esc_url(home_url('/berita/')); ?>">Berita &amp; Artikel</a></li>
                <li><a href="<?php echo esc_url(home_url('/kemitraan/')); ?>">Peluang Kemitraan</a></li>
                <li><a href="<?php echo esc_url(home_url('/kontak/')); ?>">Kontak &amp; Showroom</a></li>
              </ul>
            </div>

            <div class="cq-payno-nav-col">
              <h5 class="cq-payno-nav-title">BANTUAN &amp; LEGAL</h5>
              <ul class="cq-payno-nav-list">
                <li><a href="<?php echo esc_url(home_url('/aplikasi-laundry/#faq')); ?>">Pusat Bantuan &amp; FAQ</a></li>
                <li><a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener">Konsultasi WhatsApp</a></li>
                <li><a href="<?php echo esc_url(home_url('/kebijakan-privasi/')); ?>">Kebijakan Privasi</a></li>
                <li><a href="<?php echo esc_url(home_url('/syarat-ketentuan/')); ?>">Syarat &amp; Ketentuan</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="cq-payno-footer-hdiv"></div>

        <div class="cq-payno-footer-subrow">
          <div class="cq-payno-sub-legal">
            <a href="<?php echo esc_url(home_url('/kebijakan-privasi/')); ?>">Kebijakan Privasi</a>
            <a href="<?php echo esc_url(home_url('/syarat-ketentuan/')); ?>">Syarat &amp; Ketentuan</a>
          </div>
          <div class="cq-payno-sub-copy">
            &copy; Cleanique <?php echo date('Y'); ?> &bull; PT Indotech Berkah Abadi.
          </div>
        </div>

        <!-- Giant Watermark Typography -->
        <div class="cq-payno-footer-watermark-wrap" aria-hidden="true">
          <span class="cq-payno-footer-watermark">cleanique</span>
        </div>
      </div>
    </div>
  </footer>

<?php else : ?>
  <!-- ========================================================
       OFFICIAL COMPANY PROFILE (COMPRO) CORPORATE FOOTER
       Clean, Authoritative, B2B Trust, PT Indotech Berkah Abadi
       ======================================================== -->
  <footer class="cq-corp-footer" role="contentinfo">
    <div class="cq-container">
      <!-- Top Credentials Bar -->
      <div class="cq-corp-footer-credentials">
        <div class="cq-corp-cred-item">
          <div class="cq-corp-cred-icon"><i class="ri-shield-check-line"></i></div>
          <div class="cq-corp-cred-text">
            <strong>Badan Hukum Resmi PT</strong>
            <span>PT Indotech Berkah Abadi (Sleman, DIY)</span>
          </div>
        </div>
        <div class="cq-corp-cred-item">
          <div class="cq-corp-cred-icon"><i class="ri-factory-line"></i></div>
          <div class="cq-corp-cred-text">
            <strong>Pabrik Chemical Mandiri</strong>
            <span>Formulasi Resmi Orchid Brand Bersertifikasi</span>
          </div>
        </div>
        <div class="cq-corp-cred-item">
          <div class="cq-corp-cred-icon"><i class="ri-hand-coin-line"></i></div>
          <div class="cq-corp-cred-text">
            <strong>Kemitraan Tanpa Royalti</strong>
            <span>100% Keuntungan Milik Mitra Sepenuhnya</span>
          </div>
        </div>
      </div>

      <!-- Main Corporate 4-Column Grid -->
      <div class="cq-corp-footer-grid">
        <!-- Col 1: Brand & Indotech Company Profile -->
        <div class="cq-corp-footer-col cq-corp-footer-col-about">
          <div class="cq-corp-footer-brand">
            <?php echo cleanique_get_site_logo('cq-footer-logo'); ?>
          </div>
          <p class="cq-corp-footer-desc">
            <strong>Cleanique Laundry</strong> merupakan ekosistem terpadu dari <strong>PT Indotech Berkah Abadi</strong> yang menggabungkan lini produksi bahan kimia industri, penyediaan paket kemitraan usaha laundry turnkey, serta software kasir digital POS berbasis cloud.
          </p>
          <div class="cq-corp-footer-contact-quick">
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-corp-quick-link">
              <i class="ri-whatsapp-line"></i> Hotline WhatsApp Resmi
            </a>
            <a href="mailto:info@indotech.id" class="cq-corp-quick-link">
              <i class="ri-mail-line"></i> info@indotech.id
            </a>
          </div>
        </div>

        <!-- Col 2: Navigasi Compro -->
        <div class="cq-corp-footer-col">
          <h4 class="cq-corp-footer-heading">Navigasi Utama</h4>
          <ul class="cq-corp-footer-menu">
            <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="ri-arrow-right-s-line"></i> Beranda</a></li>
            <li><a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>"><i class="ri-arrow-right-s-line"></i> Tentang Kami</a></li>
            <li><a href="<?php echo esc_url(home_url('/berita/')); ?>"><i class="ri-arrow-right-s-line"></i> Berita &amp; Artikel</a></li>
            <li><a href="<?php echo esc_url(home_url('/kemitraan/')); ?>"><i class="ri-arrow-right-s-line"></i> Peluang Kemitraan</a></li>
            <li><a href="<?php echo esc_url(home_url('/kontak/')); ?>"><i class="ri-arrow-right-s-line"></i> Kontak &amp; Showroom</a></li>
          </ul>
        </div>

        <!-- Col 3: Ekosistem Bisnis -->
        <div class="cq-corp-footer-col">
          <h4 class="cq-corp-footer-heading">Lini Bisnis &amp; Solusi</h4>
          <ul class="cq-corp-footer-menu">
            <li><a href="<?php echo esc_url(home_url('/kemitraan/')); ?>"><i class="ri-arrow-right-s-line"></i> Paket Kemitraan Turnkey</a></li>
            <li><a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>"><i class="ri-arrow-right-s-line"></i> Pabrik Chemical Orchid Brand</a></li>
            <li><a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>"><i class="ri-arrow-right-s-line"></i> Aplikasi Kasir POS (Trial 7 Hari)</a></li>
            <li><a href="<?php echo esc_url(home_url('/solusi-kami/')); ?>"><i class="ri-arrow-right-s-line"></i> Solusi Mesin Komersial</a></li>
            <li><a href="https://indotech.id" target="_blank" rel="noopener"><i class="ri-external-link-line"></i> Portal Indotech.id</a></li>
          </ul>
        </div>

        <!-- Col 4: Kantor & Workshop Sleman -->
        <div class="cq-corp-footer-col">
          <h4 class="cq-corp-footer-heading">Kantor &amp; Workshop</h4>
          <div class="cq-corp-footer-address">
            <p>
              <i class="ri-map-pin-2-line"></i>
              <span><strong>PT Indotech Berkah Abadi</strong><br><?php echo esc_html($office_addr); ?></span>
            </p>
            <p>
              <i class="ri-time-line"></i>
              <span>Senin – Sabtu: 08.00 – 17.00 WIB<br><small style="color: #64748b;">Minggu &amp; Libur Nasional tutup</small></span>
            </p>
          </div>
          <div style="margin-top: 16px;">
            <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="cq-btn cq-btn-outline cq-btn-sm" style="color: #ffffff; border-color: rgba(255,255,255,0.25);">
              <i class="ri-navigation-line"></i> Petunjuk Arah &amp; Maps
            </a>
          </div>
        </div>
      </div>

      <!-- Corporate Sub-Footer / Legal Bar -->
      <div class="cq-corp-footer-bottom">
        <div class="cq-corp-footer-copy">
          &copy; <?php echo date('Y'); ?> <strong>Cleanique Laundry</strong>. Unit bisnis resmi dari <strong>PT Indotech Berkah Abadi</strong>. Hak cipta dilindungi undang-undang.
        </div>
        <div class="cq-corp-footer-legal-links">
          <a href="<?php echo esc_url(home_url('/kebijakan-privasi/')); ?>">Kebijakan Privasi</a>
          <span class="cq-corp-legal-sep">&bull;</span>
          <a href="<?php echo esc_url(home_url('/syarat-ketentuan/')); ?>">Syarat &amp; Ketentuan</a>
          <span class="cq-corp-legal-sep">&bull;</span>
          <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>">Kemitraan 0% Royalty</a>
        </div>
      </div>
    </div>
  </footer>
<?php endif; ?>

<!-- Floating WhatsApp Widget with Safe Area Inset -->
<aside class="cq-floating-wa-wrapper" aria-label="Kontak Cepat">
  <a href="<?php echo esc_url($wa_url); ?>" class="cq-floating-wa" target="_blank" rel="noopener" aria-label="<?php echo esc_attr($wa_label); ?> via WhatsApp">
    <i class="ri-whatsapp-fill cq-floating-wa-icon" aria-hidden="true"></i>
    <span class="cq-floating-wa-text"><?php echo esc_html($wa_label); ?></span>
  </a>
</aside>

<?php wp_footer(); ?>
</body>
</html>
