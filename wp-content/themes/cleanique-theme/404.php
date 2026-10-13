<?php
/**
 * Standalone 404 Error Page Template (Tanpa Layout Header & Footer)
 * Cleanique Laundry
 *
 * @package Cleanique
 */

$wa_url = function_exists('cleanique_get_whatsapp_url') ? cleanique_get_whatsapp_url('general') : 'https://wa.me/6281234567890';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
  <style>
    /* Standalone 404 Page (Minimalist Clean Design) */
    html, body {
      height: 100%;
    }

    body.cq-standalone-404 {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      background: radial-gradient(120% 80% at 50% -10%, #e0f2fe 0%, #f0f9ff 45%, #ffffff 100%);
      font-family: var(--cq-font-body, 'Inter', -apple-system, BlinkMacSystemFont, sans-serif);
      color: var(--cq-dark-ink, #0f172a);
      overflow-x: hidden;
      box-sizing: border-box;
    }

    .cq-404-topbar {
      padding: 18px 20px 0;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      flex-shrink: 0;
    }

    .cq-404-brand {
      display: inline-flex;
      align-items: center;
      text-decoration: none;
      transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .cq-404-brand:hover {
      transform: translateY(-2px);
    }

    .cq-404-brand .cq-brand-logo-img {
      height: 44px;
      width: auto;
      object-fit: contain;
    }

    .cq-404-wrapper {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 16px;
    }

    .cq-404-card {
      max-width: 560px;
      width: 100%;
      text-align: center;
      background: rgba(255, 255, 255, 0.94);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(226, 232, 240, 0.95);
      border-radius: 28px;
      padding: clamp(28px, 4vw, 40px) clamp(20px, 4vw, 40px);
      box-shadow: 0 25px 60px -15px rgba(2, 132, 199, 0.12), 0 8px 24px -8px rgba(15, 23, 42, 0.05);
      position: relative;
    }

    .cq-payno-arch-glow {
      margin-bottom: 8px;
    }

    .cq-404-number {
      font-family: var(--cq-font-heading, 'Plus Jakarta Sans', sans-serif);
      font-size: clamp(3.2rem, 5vw, 4.4rem);
      font-weight: 900;
      line-height: 1;
      letter-spacing: -0.04em;
      background: linear-gradient(135deg, #0284c7 0%, #2563eb 50%, #1d4ed8 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
      user-select: none;
    }

    .cq-404-title {
      font-family: var(--cq-font-heading, 'Plus Jakarta Sans', sans-serif);
      font-size: clamp(1.3rem, 2.2vw, 1.75rem);
      font-weight: 300;
      line-height: 1.3;
      color: #0f172a;
      margin: 0 0 10px;
    }

    .cq-404-title strong,
    .cq-404-title b {
      font-weight: 500;
    }

    .cq-404-title .cq-text-blue {
      color: #0284c7;
    }

    .cq-404-desc {
      font-size: clamp(0.875rem, 1.1vw, 0.95rem);
      line-height: 1.6;
      color: #64748b;
      margin: 0 auto 24px;
      max-width: 440px;
    }

    .cq-404-actions {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 12px;
    }

    .cq-404-actions .cq-btn {
      min-width: 170px;
      padding: 11px 22px;
    }

    .cq-404-footer-copy {
      padding: 8px 20px 14px;
      text-align: center;
      font-size: 0.775rem;
      color: #94a3b8;
      flex-shrink: 0;
    }
  </style>
</head>
<body <?php body_class('cq-standalone-404'); ?>>
<?php wp_body_open(); ?>

  <!-- Top Minimal Brand Logo (No 'by Indotech', Default Outline Logo) -->
  <header class="cq-404-topbar" role="banner">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-404-brand" aria-label="Kembali ke Beranda Cleanique Laundry">
      <?php echo cleanique_get_site_logo(); ?>
    </a>
  </header>

  <!-- Central Standalone Error Card -->
  <main id="main-content" class="cq-404-wrapper">
    <div class="cq-404-card">
      <!-- Concentric Arch Aura -->
      <div class="cq-payno-arch-glow" aria-hidden="true">
        <svg width="80" height="46" viewBox="0 0 140 90" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M 18 82 A 52 52 0 0 1 122 82" stroke="#93C5FD" stroke-width="16" stroke-linecap="round" opacity="0.6" />
          <path d="M 35 82 A 35 35 0 0 1 105 82" stroke="#3B82F6" stroke-width="16" stroke-linecap="round" opacity="0.8" />
          <path d="M 52 82 A 18 18 0 0 1 88 82" stroke="#1D4ED8" stroke-width="16" stroke-linecap="round" opacity="0.95" />
        </svg>
      </div>

      <div class="cq-404-number" aria-hidden="true">404</div>

      <h1 class="cq-404-title">
        Halaman yang Anda Cari <span class="cq-text-blue">Tidak Ditemukan.</span>
      </h1>

      <p class="cq-404-desc">
        Tautan yang Anda tuju mungkin sudah dipindahkan, kedaluwarsa, atau terdapat salah ketik pada URL. Silakan kembali ke beranda atau hubungi tim bantuan kami.
      </p>

      <div class="cq-404-actions">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill">
          <i class="ri-home-4-line" aria-hidden="true"></i> Kembali ke Beranda
        </a>
        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-outline cq-btn-pill">
          <i class="ri-whatsapp-line" aria-hidden="true"></i> Kontak CS
        </a>
      </div>
    </div>
  </main>

  <!-- Minimal Copyright Footer -->
  <footer class="cq-404-footer-copy" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <strong>Cleanique Laundry</strong>. All rights reserved.
  </footer>

<?php wp_footer(); ?>
</body>
</html>
