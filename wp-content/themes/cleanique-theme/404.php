<?php
/**
 * 404 Error Page Template
 * Cleanique Laundry by PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic
 *
 * @package Cleanique
 */

get_header();
$wa_url = cleanique_get_whatsapp_url('general');
?>

<main id="main-content" class="cq-404-page">
  <div id="top"></div>

  <section class="cq-sky-canvas cq-blog-hero" style="min-height: 75vh; display: flex; align-items: center;">
    <div class="cq-container">
      <div class="cq-blog-hero-inner" style="max-width: 720px;">
        <!-- Concentric Arch Aura -->
        <div class="cq-payno-arch-glow" aria-hidden="true" style="margin-bottom: var(--cq-sp-16);">
          <svg width="120" height="75" viewBox="0 0 140 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" />
            <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" />
            <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" />
          </svg>
        </div>

        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
          <i class="ri-error-warning-line" style="color: #ef4444;" aria-hidden="true"></i>
          Error 404 &bull; Halaman Tidak Ditemukan
        </div>

        <h1 class="cq-blog-title" style="font-size: clamp(2.2rem, 1.8rem + 2vw, 3.5rem); margin-bottom: var(--cq-sp-16);">
          Halaman yang Anda Cari <span class="cq-text-blue">Tidak Ditemukan.</span>
        </h1>

        <p class="cq-blog-desc">
          Tautan yang Anda tuju mungkin sudah dipindahkan, kedaluwarsa, atau terdapat salah ketik pada URL. Jangan khawatir, silakan pilih salah satu layanan kami di bawah ini:
        </p>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; margin-top: var(--cq-sp-28);">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
            <i class="ri-home-4-line" aria-hidden="true"></i> Kembali ke Beranda
          </a>
          <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill">
            <i class="ri-store-2-line" aria-hidden="true"></i> Paket Usaha Laundry
          </a>
          <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill">
            <i class="ri-smartphone-line" aria-hidden="true"></i> Aplikasi POS (Trial 7 Hari)
          </a>
          <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill">
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Bantuan CS
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
