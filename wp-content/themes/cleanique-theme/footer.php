<?php
/**
 * Cleanique Footer Template
 * Harmonized with Landing Page (Payno Modern Light Card Architecture)
 *
 * @package Cleanique
 */

$is_paket_usaha = is_page_template('templates/page-paket-usaha.php') || is_page('paket-usaha-laundry');
$is_aplikasi_laundry = is_page_template('templates/page-aplikasi-laundry.php') || is_page('aplikasi-laundry');

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
?>

  <!-- ========================================================
       CLEANIQUE UNIFIED FOOTER (Payno Modern Light Card Architecture)
       Harmonized for Landing Page & Company Profile
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
              </div>
              <p class="cq-payno-footer-tagline">
                Solusi ekosistem bisnis laundry terpadu di bawah naungan <strong>PT Indotech Berkah Abadi</strong> (Sleman, D.I. Yogyakarta). Paket kemitraan 100% tanpa royalti, chemical pabrik, dan sistem kasir POS cerdas.
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

          <!-- Right Column: Navigation Links (3 Balanced Columns) -->
          <div class="cq-payno-footer-nav">
            <div class="cq-payno-nav-col">
              <h5 class="cq-payno-nav-title">LAYANAN &amp; PRODUK</h5>
              <ul class="cq-payno-nav-list">
                <li><a href="<?php echo esc_url(home_url('/kemitraan/')); ?>">Paket Kemitraan Turnkey</a></li>
                <li><a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">Aplikasi Kasir POS</a></li>
                <li><a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">Chemical &amp; Parfum Pabrik</a></li>
                <li><a href="<?php echo esc_url(home_url('/solusi-kami/')); ?>">Solusi Ekosistem Bisnis</a></li>
                <li><a href="https://indotech.id" target="_blank" rel="noopener">Portal Indotech.id <i class="ri-external-link-line" style="font-size: 11px;"></i></a></li>
              </ul>
            </div>

            <div class="cq-payno-nav-col">
              <h5 class="cq-payno-nav-title">PERUSAHAAN</h5>
              <ul class="cq-payno-nav-list">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a></li>
                <li><a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>">Tentang PT Indotech</a></li>
                <li><a href="<?php echo esc_url(home_url('/artikel/')); ?>">Pusat Artikel &amp; Edukasi</a></li>
                <li><a href="<?php echo esc_url(home_url('/kemitraan/')); ?>">Peluang Kemitraan</a></li>
                <li><a href="<?php echo esc_url(home_url('/kontak/')); ?>">Kontak &amp; Showroom</a></li>
              </ul>
            </div>

            <div class="cq-payno-nav-col">
              <h5 class="cq-payno-nav-title">BANTUAN &amp; LEGAL</h5>
              <ul class="cq-payno-nav-list">
                <li><a href="<?php echo esc_url(home_url('/aplikasi-laundry/#faq')); ?>">Pusat Bantuan &amp; FAQ</a></li>
                <li><a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener">Hotline WhatsApp Resmi</a></li>
                <li><a href="<?php echo esc_url(home_url('/kebijakan-privasi/')); ?>">Kebijakan Privasi</a></li>
                <li><a href="<?php echo esc_url(home_url('/syarat-ketentuan/')); ?>">Syarat &amp; Ketentuan</a></li>
                <li><a href="<?php echo esc_url(home_url('/kontak/')); ?>">Lokasi Sleman, DIY</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Horizontal Divider (Dotted) -->
        <div class="cq-payno-footer-hdiv" aria-hidden="true"></div>

        <!-- Subrow (Links + Copyright) -->
        <div class="cq-payno-footer-subrow">
          <div class="cq-payno-sub-legal">
            <a href="<?php echo esc_url(home_url('/kebijakan-privasi/')); ?>">Kebijakan Privasi</a>
            <a href="<?php echo esc_url(home_url('/syarat-ketentuan/')); ?>">Syarat &amp; Ketentuan</a>
            <a href="<?php echo esc_url(home_url('/kemitraan/')); ?>">Kemitraan 0% Royalty</a>
          </div>
          <div class="cq-payno-sub-copy">
            &copy; <?php echo date('Y'); ?> <strong>Cleanique Laundry</strong> &bull; PT Indotech Berkah Abadi. All rights reserved.
          </div>
        </div>

        <!-- Cleanique Giant Watermark Typography (Signature Payno Touch) -->
        <div class="cq-payno-footer-watermark-wrap" aria-hidden="true">
          <span class="cq-payno-footer-watermark">cleanique</span>
        </div>
      </div>
    </div>
  </footer>

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
