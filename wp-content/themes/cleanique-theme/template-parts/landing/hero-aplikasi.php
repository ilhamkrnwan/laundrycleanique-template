<?php
/**
 * Template Part: Hero Section - Aplikasi Laundry (Payno Style)
 * Description: Hero split dengan headline tipis elegan, CSS smartphone mockup, dan 3 floating glass cards.
 *
 * @package Cleanique
 */

$wa_trial_url = cleanique_get_whatsapp_url('aplikasi_trial');
?>

<section class="cq-sky-canvas cq-payno-hero">
  <div class="cq-container">
    <!-- Top Row: Split Headline (Left) & Paragraph + Action (Right) -->
    <div class="cq-payno-hero-top">
      <div>
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.85); border: 1px solid var(--sky-200);">
          Simple to Use. Built to Perform.
        </div>
        <h1 class="cq-payno-heading">
          Kelola Mudah, <span class="cq-text-blue">Tumbuh Lebih Terarah.</span>
        </h1>
      </div>

      <div class="cq-payno-hero-right">
        <p class="cq-payno-hero-desc">
          Solusi <strong>kasir POS praktis, notifikasi WhatsApp, laporan omzet harian</strong>, dan <strong>asisten AI pintar</strong> dalam satu sistem yang ringkas. Tinggalkan nota kertas, kendalikan outlet Anda dari mana saja.
        </p>
        <div style="font-size: var(--cq-fs-xs); color: var(--ink); font-weight: 600; margin-bottom: var(--cq-sp-16); display: flex; align-items: center; gap: 6px;">
          <i class="ri-checkbox-circle-fill" style="color: var(--mint-cta); font-size: 15px;"></i>
          <span>Data outlet aman &amp; terisolasi &bull; Akses dari HP, tablet, &amp; PC</span>
        </div>
        <div class="cq-payno-hero-actions">
          <a href="#trial-form" class="cq-btn cq-btn-primary cq-btn-pill">
            <i class="ri-rocket-2-line" aria-hidden="true"></i> Mulai Trial 7 Hari Gratis
          </a>
          <a href="https://laundry.indotechbot.my.id/" target="_blank" rel="noopener" class="cq-btn cq-btn-white-pill">
            <i class="ri-login-box-line" aria-hidden="true"></i> Masuk ke Aplikasi
          </a>
        </div>
      </div>
    </div>

    <!-- Center Stage: CSS Smartphone Mockup & 3 Floating Glass Cards -->
    <div class="cq-payno-stage">
      <!-- Floating Card 1 (Left): Live Omzet & Mini Chart -->
      <div class="cq-floating-card cq-float-left">
        <span style="font-size: 10px; color: var(--cq-text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; display: block;">Laporan &amp; Keuangan</span>
        <div style="font-family: var(--cq-font-heading); font-size: 19px; font-weight: 800; color: var(--ink); margin: 3px 0 2px;">
          Rp 1.450.000 <span style="font-size: 11px; color: var(--mint-cta); font-weight: 700;">+18% <i class="ri-arrow-right-up-line"></i></span>
        </div>
        <div style="font-size: 11px; color: var(--brand-deep); display: flex; align-items: center; gap: 4px; font-weight: 600;">
          <i class="ri-checkbox-circle-fill" style="color: var(--mint-cta);"></i> 42 Transaksi Hari Ini
        </div>
      </div>

      <!-- Floating Card 2 (Right): Asisten AI Bisnis (Indotechbot App Core Feature) -->
      <div class="cq-floating-card cq-float-right" style="max-width: 250px;">
        <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 2px;">
          <span class="cq-badge-pill cq-badge-accent" style="font-size: 9px; padding: 2px 8px;">
            Asisten AI Bisnis
          </span>
          <span style="font-size: 9px; color: var(--mint-cta); font-weight: 700;">Aktif 24/7</span>
        </div>
        <div style="font-size: 11px; font-weight: 600; color: var(--ink); line-height: 1.35; margin: 3px 0;">
          "Omzet naik 18%! Rekomendasi: kirim promo cuci sprei via WA ke 35 pelanggan lama."
        </div>
        <div style="font-size: 9.5px; color: var(--brand-deep); font-weight: 700;">
          Konsultasi finansial &amp; ide promo
        </div>
      </div>

      <!-- Floating Card 3 (Bottom Left): Notifikasi WhatsApp Otomatis -->
      <div class="cq-floating-card cq-float-bottom">
        <div class="cq-screen-avatar-img" style="width: 28px; height: 28px; background: #e8f5e9;">
          <i class="ri-whatsapp-fill" style="color: #25D366; font-size: 16px;"></i>
        </div>
        <div>
          <div style="font-size: 11px; font-weight: 700; color: var(--ink); line-height: 1.2;">Notifikasi WhatsApp Otomatis</div>
          <div style="font-size: 10px; color: var(--cq-text-muted);">Nota &amp; info cucian siap ambil &bull; <span style="color: var(--mint-cta); font-weight: 600;">Terkirim</span></div>
        </div>
      </div>

      <!-- CSS Phone Mockup Device -->
      <div class="cq-phone-device" aria-label="Mockup Aplikasi Kasir Cleanique POS">
        <!-- Dynamic Island Notch -->
        <div class="cq-phone-notch">
          <div class="cq-phone-camera"></div>
        </div>

        <!-- Phone Screen Content -->
        <div class="cq-phone-screen">
          <!-- Screen Header -->
          <div class="cq-screen-header">
            <div class="cq-screen-avatar">
              <div class="cq-screen-avatar-img">CL</div>
              <div>
                <div style="font-size: 11px; font-weight: 700; color: var(--ink); line-height: 1.1;">Berkah Clean</div>
                <div style="font-size: 9px; color: var(--cq-text-muted);">Sistem Kasir POS &bull; Outlet 01</div>
              </div>
            </div>
            <span class="cq-screen-badge-live">&bull; Online</span>
          </div>

          <!-- Screen Balance Card -->
          <div class="cq-screen-card-balance">
            <span class="cq-screen-balance-lbl">Omzet Harian Outlet</span>
            <div class="cq-screen-balance-val">
              Rp 1.450.000
            </div>
            <div style="margin-top: 4px; font-size: 10px; color: var(--cq-text-muted); display: flex; justify-content: space-between;">
              <span>42 Nota Diproses</span>
              <span class="cq-screen-balance-growth"><i class="ri-arrow-up-line"></i> +18% hari ini</span>
            </div>
          </div>

          <!-- Quick Actions: 4 Pillars of Indotechbot App -->
          <div class="cq-screen-actions-row">
            <div class="cq-screen-action-btn">
              <i class="ri-scales-3-line"></i>
              <span>Kasir POS</span>
            </div>
            <div class="cq-screen-action-btn">
              <i class="ri-whatsapp-line"></i>
              <span>Notif WA</span>
            </div>
            <div class="cq-screen-action-btn">
              <i class="ri-robot-2-line"></i>
              <span>Asisten AI</span>
            </div>
          </div>

          <!-- Recent Laundry Transactions List -->
          <div>
            <div class="cq-screen-recent-header" style="margin-bottom: 8px;">
              <span>Pesanan Pelanggan</span>
              <span style="color: var(--brand-deep); font-size: 10px; font-weight: 600;">Lihat Semua</span>
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px;">
              <div class="cq-screen-trans-item">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Rina W. (Kiloan)</div>
                  <div style="font-size: 9px; color: var(--cq-text-muted);">3.5 Kg &bull; Cuci Kering Setrika</div>
                </div>
                <div style="text-align: right;">
                  <div style="font-weight: 700; color: var(--brand-deep);">Rp 24.500</div>
                  <span style="font-size: 9px; color: var(--mint-cta); font-weight: 600;">WA Terkirim</span>
                </div>
              </div>
              <div class="cq-screen-trans-item">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Pak Budi (Satuan)</div>
                  <div style="font-size: 9px; color: var(--cq-text-muted);">1 Bed Cover &bull; Siap Ambil</div>
                </div>
                <div style="text-align: right;">
                  <div style="font-weight: 700; color: var(--brand-deep);">Rp 35.000</div>
                  <span style="font-size: 9px; color: var(--mint-cta); font-weight: 600;">Siap Diambil</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sleek Payno Glass Countdown Card (Batas 30 Oktober) -->
    <div class="cq-hero-countdown-wrap" data-countdown-deadline="2026-10-30T23:59:59+07:00">
      <div class="cq-glass-card cq-payno-countdown-card">
        <div class="cq-countdown-meta">
          <span class="cq-countdown-badge is-mint" style="margin-bottom: 6px;">
            Promo Kuartal Berakhir 30 Oktober
          </span>
          <div style="font-family: var(--cq-font-heading); font-size: var(--cq-fs-base); font-weight: 700; color: var(--ink); line-height: 1.3;">
            Free Trial 7 Hari (Rp 0) &bull; Setelahnya Hanya Rp 60.000/bln
          </div>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); margin-bottom: 0; line-height: 1.5;">
            100% fitur terbuka: Kasir POS, notifikasi WhatsApp, laporan omzet, &amp; asisten AI tanpa kartu kredit.
          </p>
        </div>

        <div class="cq-countdown-timer">
          <div class="cq-countdown-box" style="background: rgba(255, 255, 255, 0.9); border-color: var(--sky-200);">
            <span class="cq-countdown-val cq-cd-days" style="color: var(--brand-deep);">00</span>
            <span class="cq-countdown-lbl" style="color: var(--cq-text-muted);">Hari</span>
          </div>
          <span class="cq-countdown-sep" style="color: var(--brand-deep); font-weight: 700;">:</span>
          <div class="cq-countdown-box" style="background: rgba(255, 255, 255, 0.9); border-color: var(--sky-200);">
            <span class="cq-countdown-val cq-cd-hours" style="color: var(--brand-deep);">00</span>
            <span class="cq-countdown-lbl" style="color: var(--cq-text-muted);">Jam</span>
          </div>
          <span class="cq-countdown-sep" style="color: var(--brand-deep); font-weight: 700;">:</span>
          <div class="cq-countdown-box" style="background: rgba(255, 255, 255, 0.9); border-color: var(--sky-200);">
            <span class="cq-countdown-val cq-cd-mins" style="color: var(--brand-deep);">00</span>
            <span class="cq-countdown-lbl" style="color: var(--cq-text-muted);">Menit</span>
          </div>
          <span class="cq-countdown-sep" style="color: var(--brand-deep); font-weight: 700;">:</span>
          <div class="cq-countdown-box" style="background: rgba(255, 255, 255, 0.9); border-color: var(--sky-200);">
            <span class="cq-countdown-val cq-cd-secs" style="color: var(--brand-deep);">00</span>
            <span class="cq-countdown-lbl" style="color: var(--cq-text-muted);">Detik</span>
          </div>
        </div>

        <div>
          <a href="#trial-form" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-sm">
            <i class="ri-rocket-2-line" aria-hidden="true"></i> Ambil Promo Trial <i class="ri-arrow-down-line" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
