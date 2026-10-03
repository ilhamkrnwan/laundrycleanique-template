<?php
/**
 * Template Part: Pricing Section - Aplikasi Laundry (Payno Style)
 * Description: Header tengah, toggle switch Bulanan/Tahunan (Hemat 20%), 3 kartu (tengah Navy Card, kiri/kanan Glass Card).
 *
 * @package Cleanique
 */

$wa_trial_url = cleanique_get_whatsapp_url('aplikasi_trial');
?>

<section class="cq-section" id="pricing">
  <div class="cq-container">
    <div class="cq-section-header" style="text-align: center; max-width: 680px; margin: 0 auto var(--cq-sp-32);">
      <span class="cq-section-subtitle">Investasi Terjangkau</span>
      <h2 style="font-family: var(--cq-font-heading); font-weight: 300; font-size: clamp(2rem, 1.6rem + 1.8vw, 3.2rem); line-height: 1.15; letter-spacing: -0.03em; color: var(--ink); margin-bottom: var(--cq-sp-12);">
        Pilihan Paket Fleksibel<br>
        <span class="cq-text-blue">Untuk Semua Skala Laundry</span>
      </h2>
      <p class="cq-section-desc" style="margin: 0 auto;">
        Nikmati sistem kasir digital modern tanpa biaya setup tersembunyi. Bebas ganti paket atau batalkan kapan saja.
      </p>

      <!-- Monthly / Annual Toggle Switch -->
      <div class="cq-pricing-toggle-wrap">
        <div class="cq-pricing-switch" role="tablist" aria-label="Pilihan Durasi Langganan">
          <button type="button" class="cq-switch-btn is-active" id="cq-btn-monthly" role="tab" aria-selected="true">
            Bulanan
          </button>
          <button type="button" class="cq-switch-btn" id="cq-btn-yearly" role="tab" aria-selected="false">
            Tahunan
          </button>
        </div>
        <span class="cq-pricing-save-badge">
          Hemat 20%
        </span>
      </div>
    </div>

    <!-- 3 Pricing Cards Grid -->
    <div class="cq-payno-pricing-grid">
      <!-- Card 1: Starter Free Trial (Glass White) -->
      <div class="cq-glass-card" style="padding: var(--cq-sp-32); display: flex; flex-direction: column;">
        <span style="font-size: 11px; font-weight: 700; color: var(--cq-text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Starter Plan</span>
        <h3 class="cq-pricing-title" style="margin: 4px 0 var(--cq-sp-8); font-size: var(--cq-fs-2xl); font-weight: 700;">Free Trial</h3>
        <p class="cq-card-desc" style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); min-height: 48px;">
          Uji coba seluruh fitur kasir POS tanpa batasan untuk membuktikan kepraktisannya langsung di outlet Anda.
        </p>

        <div class="cq-pricing-price" style="margin: var(--cq-sp-16) 0;">
          Rp 0 <small style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted);">/ 7 hari pertama</small>
        </div>

        <a href="#trial-form" class="cq-btn cq-btn-white-pill cq-btn-block" style="margin-bottom: var(--cq-sp-24);">
          Coba Gratis 7 Hari
        </a>

        <div class="cq-pricing-sep">Fitur Unggulan</div>
        <ul class="cq-pricing-list" style="margin-top: var(--cq-sp-12);">
          <li class="checked">100% Fitur Terbuka Tanpa Batas</li>
          <li class="checked">Kasir POS Cepat Kiloan &amp; Satuan</li>
          <li class="checked">Kirim Notifikasi WhatsApp Otomatis</li>
          <li class="checked">Asisten AI Bisnis Aktif 24/7</li>
          <li class="checked">Laporan Kasir &amp; Omzet Harian</li>
          <li class="checked">Tanpa Perlu Kartu Kredit</li>
        </ul>
      </div>

      <!-- Card 2: Center Most Popular (Navy Dark Card - Payno Style) -->
      <div class="cq-pricing-card-navy">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
          <span style="font-size: 11px; font-weight: 700; color: var(--sky-200); text-transform: uppercase; letter-spacing: 0.05em;">Outlet Mandiri</span>
          <span class="cq-badge-pill cq-badge-accent" style="font-size: 10px; padding: 2px 10px; font-weight: 700;">
            Paling Diminati
          </span>
        </div>

        <h3 class="cq-pricing-title" style="font-size: var(--cq-fs-2xl); font-weight: 700; margin-bottom: var(--cq-sp-8);">Paket UMKM Pro</h3>
        <p class="cq-card-desc" style="font-size: var(--cq-fs-sm); min-height: 48px;">
          Pilihan terbaik bagi pemilik laundry yang ingin operasional rapi, bebas curang, dan terpantau otomatis.
        </p>

        <div class="cq-pricing-price" style="margin: var(--cq-sp-16) 0;">
          <span id="price-pro-val">Rp 60.000</span> <small id="price-pro-period">/ bulan</small>
        </div>

        <a href="#trial-form" class="cq-btn cq-btn-white-pill cq-btn-block" style="margin-bottom: var(--cq-sp-24);">
          Mulai Free Trial 7 Hari
        </a>

        <div class="cq-pricing-sep">Fitur Unggulan</div>
        <ul class="cq-pricing-list" style="margin-top: var(--cq-sp-12);">
          <li class="checked">Semua Fitur di Paket Trial</li>
          <li class="checked">Kasir POS Praktis Kiloan &amp; Satuan</li>
          <li class="checked">Notifikasi WhatsApp Pelanggan Otomatis</li>
          <li class="checked">Asisten AI Bisnis (Analisa Omzet &amp; Promo)</li>
          <li class="checked">Laporan Omzet Harian, Piutang &amp; Laba-Rugi</li>
          <li class="checked">Data Outlet Aman &amp; Terisolasi di Cloud</li>
          <li class="checked">Akses dari HP, Tablet, &amp; Laptop/PC</li>
          <li class="checked">Support Printer Thermal Bluetooth 58/80mm</li>
        </ul>
      </div>

      <!-- Card 3: Business Multi-Outlet (Glass White) -->
      <div class="cq-glass-card" style="padding: var(--cq-sp-32); display: flex; flex-direction: column;">
        <span style="font-size: 11px; font-weight: 700; color: var(--cq-text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Multi-Cabang</span>
        <h3 class="cq-pricing-title" style="margin: 4px 0 var(--cq-sp-8); font-size: var(--cq-fs-2xl); font-weight: 700;">Business Plan</h3>
        <p class="cq-card-desc" style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); min-height: 48px;">
          Solusi terintegrasi untuk pemilik usaha yang memiliki lebih dari satu outlet laundry atau cabang bertumbuh.
        </p>

        <div class="cq-pricing-price" style="margin: var(--cq-sp-16) 0;">
          <span id="price-biz-val">Rp 149.000</span> <small id="price-biz-period">/ bulan</small>
        </div>

        <a href="<?php echo esc_url($wa_trial_url); ?>" class="cq-btn cq-btn-white-pill cq-btn-block" style="margin-bottom: var(--cq-sp-24);" target="_blank" rel="noopener">
          Konsultasi Multi-Cabang
        </a>

        <div class="cq-pricing-sep">Fitur Unggulan</div>
        <ul class="cq-pricing-list" style="margin-top: var(--cq-sp-12);">
          <li class="checked">Semua Fitur di Paket UMKM Pro</li>
          <li class="checked">Multi-Outlet dalam 1 Dashboard Owner Terpusat</li>
          <li class="checked">Multi-Kasir dengan Hak Akses Bertingkat</li>
          <li class="checked">Bantuan Impor Data Pelanggan Lama</li>
          <li class="checked">Integrasi WhatsApp Gateway Multi-Nomor</li>
          <li class="checked">Prioritas Jalur Support CS 24/7</li>
        </ul>
      </div>
    </div>
  </div>
</section>
