<?php
/**
 * Template Part: Section 3 - Core App Showcase (Payno Style)
 * Description: Phone mockup di dalam container gradient langit di kiri, judul 'Built for Simplicity. Designed for Growth.' dan 2x2 feature cards di kanan.
 *
 * @package Cleanique
 */
?>

<section class="cq-section" id="fitur">
  <div class="cq-container">
    <div class="cq-payno-showcase-grid">
      <!-- Left Column: Smartphone Mockup in Sky Atmosphere Box -->
      <div class="cq-payno-showcase-phone-box">
        <div class="cq-phone-device" style="max-width: 300px; margin-bottom: -32px;" aria-label="Mockup Kasir POS Cleanique">
          <!-- Dynamic Island Notch -->
          <div class="cq-phone-notch">
            <div class="cq-phone-camera"></div>
          </div>

          <!-- Phone Screen UI -->
          <div class="cq-phone-screen">
            <!-- App Bar with Navigation -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; padding: 2px 2px 0;">
              <div style="width: 28px; height: 28px; border-radius: 50%; background: #F1F5F9; display: flex; align-items: center; justify-content: center; font-size: 14px; color: #334155;">
                <i class="ri-arrow-left-s-line"></i>
              </div>
              <span style="font-size: 13px; font-weight: 700; color: #0F172A; letter-spacing: -0.01em;">Kasir POS Cleanique</span>
              <div style="width: 28px; height: 28px; border-radius: 50%; background: #F1F5F9; display: flex; align-items: center; justify-content: center; font-size: 13px; color: #334155; position: relative;">
                <i class="ri-notification-3-line"></i>
                <span style="position: absolute; top: 6px; right: 6px; width: 6px; height: 6px; background: #EF4444; border-radius: 50%;"></span>
              </div>
            </div>

            <!-- Recent Customers / Pelanggan Terakhir (Horizontal Avatar List) -->
            <div style="margin-bottom: 12px;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <span style="font-size: 10px; font-weight: 700; color: #64748B; text-transform: uppercase; letter-spacing: 0.04em;">Pelanggan Terakhir</span>
                <span style="font-size: 9.5px; font-weight: 600; color: #0284C7;">Semua</span>
              </div>
              <div class="cq-screen-recipients-row">
                <!-- Customer 1 -->
                <div class="cq-screen-recip-item">
                  <div class="cq-screen-recip-avatar" style="background: linear-gradient(135deg, #0284C7, #0369A1); color: #fff;">
                    MP
                  </div>
                  <span>Ibu Melani</span>
                </div>
                <!-- Customer 2 -->
                <div class="cq-screen-recip-item">
                  <div class="cq-screen-recip-avatar" style="background: linear-gradient(135deg, #3B82F6, #1D4ED8); color: #fff;">
                    AP
                  </div>
                  <span>Pak Andry</span>
                </div>
                <!-- Customer 3 -->
                <div class="cq-screen-recip-item">
                  <div class="cq-screen-recip-avatar" style="background: linear-gradient(135deg, #10B981, #047857); color: #fff;">
                    RW
                  </div>
                  <span>Rina W.</span>
                </div>
                <!-- Customer 4: Add New -->
                <div class="cq-screen-recip-item">
                  <div class="cq-screen-recip-avatar cq-screen-recip-add">
                    <i class="ri-add-line"></i>
                  </div>
                  <span>Baru</span>
                </div>
              </div>
            </div>

            <!-- Two-Tier Transaction Card (Exact Payno Centerpiece) -->
            <div class="cq-screen-tx-box">
              <!-- Tier 1: Service & Weight Input -->
              <div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                  <span style="font-size: 9.5px; color: #64748B; font-weight: 600;">Berat Cucian</span>
                  <div class="cq-screen-tx-badge">
                    <span>Kiloan Komplit</span>
                    <i class="ri-arrow-down-s-line" style="font-size: 11px;"></i>
                  </div>
                </div>
                <div class="cq-screen-tx-val">
                  5.5 <span style="font-size: 13px; font-weight: 600; color: #64748B;">Kg</span>
                </div>
              </div>

              <div class="cq-screen-tx-divider"></div>

              <!-- Tier 2: Calculated Amount & Status -->
              <div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                  <span style="font-size: 9.5px; color: #64748B; font-weight: 600;">Total Pembayaran</span>
                  <span style="font-size: 9px; font-weight: 700; background: #DCFCE7; color: #166534; padding: 2px 7px; border-radius: 6px;">
                    Lunas QRIS
                  </span>
                </div>
                <div class="cq-screen-tx-val" style="color: #0284C7;">
                  Rp 38.500
                </div>
              </div>

              <!-- Rate Sub-Pill -->
              <div class="cq-screen-tx-rate">
                <span>Tarif: Rp 7.000 / Kg</span>
                <span style="color: #10B981; font-weight: 700;">Tanpa Biaya Admin</span>
              </div>
            </div>

            <!-- Tracking & Special Notes -->
            <div style="background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 14px; padding: 9px 11px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; font-size: 9.5px;">
              <span style="color: #334155; font-weight: 600;">Parfum: Sakura • Rak B-04</span>
              <span style="color: #10B981; font-weight: 700; display: inline-flex; align-items: center; gap: 3px;">
                <i class="ri-checkbox-circle-fill"></i> Siap Ambil
              </span>
            </div>

            <!-- WhatsApp 1-Click Action Button -->
            <div style="background: #25D366; color: #ffffff; text-align: center; padding: 9px 12px; border-radius: var(--cq-rad-pill); font-size: 10px; font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 6px; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.35);">
              <i class="ri-whatsapp-fill" style="font-size: 13px;"></i> Kirim Nota WhatsApp (1 Klik)
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Heading, Subtitle & 2x2 Feature Cards -->
      <div class="cq-payno-showcase-content">
        <h2 class="cq-payno-showcase-heading">
          Built for Simplicity.<br>
          <span class="cq-text-blue">Designed for Growth.</span>
        </h2>
        <p class="cq-payno-showcase-desc">
          Cleanique POS memadukan kasir cepat, notifikasi WhatsApp otomatis, dan asisten AI pintar ke dalam satu sistem elegan yang membantu Anda mengelola bisnis laundry dengan percaya diri setiap hari.
        </p>

        <!-- 2x2 Grid of 4 Feature Cards -->
        <div class="cq-payno-cards-grid">
          <!-- Card 1: Real-Time Analytics -->
          <div class="cq-payno-feature-box">
            <div class="cq-payno-box-icon">
              <i class="ri-bar-chart-2-line" aria-hidden="true"></i>
            </div>
            <h3 class="cq-payno-box-title">Real-Time Analytics</h3>
            <p class="cq-payno-box-desc">
              Pantau transaksi, omzet harian, dan grafik laba bersih seketika dengan wawasan akurat untuk keputusan bisnis lebih tepat.
            </p>
          </div>

          <!-- Card 2: Secure Cloud Sync -->
          <div class="cq-payno-feature-box">
            <div class="cq-payno-box-icon">
              <i class="ri-cloud-line" aria-hidden="true"></i>
            </div>
            <h3 class="cq-payno-box-title">Secure Cloud Sync</h3>
            <p class="cq-payno-box-desc">
              Data transaksi, pelanggan, &amp; stok aman di cloud. Tersinkronisasi mulus di HP, tablet, maupun PC kasir tanpa risiko data hilang.
            </p>
          </div>

          <!-- Card 3: Smart Budget Alerts / WhatsApp Notifications -->
          <div class="cq-payno-feature-box">
            <div class="cq-payno-box-icon">
              <i class="ri-notification-3-line" aria-hidden="true"></i>
            </div>
            <h3 class="cq-payno-box-title">Smart Auto Alerts</h3>
            <p class="cq-payno-box-desc">
              Notifikasi nota digital dan pengingat otomatis cucian siap ambil terkirim langsung ke WhatsApp pelanggan tanpa biaya SMS.
            </p>
          </div>

          <!-- Card 4: Fast Bank / QRIS Integration -->
          <div class="cq-payno-feature-box">
            <div class="cq-payno-box-icon">
              <i class="ri-bank-line" aria-hidden="true"></i>
            </div>
            <h3 class="cq-payno-box-title">Fast Payment Sync</h3>
            <p class="cq-payno-box-desc">
              Terima pembayaran QRIS instan di kasir dan rekonsiliasi kas laci secara otomatis tanpa selisih setoran di akhir shift.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- 3 Langkah Memulai Operasional (Onboarding dari laundry.indotechbot.my.id) -->
    <div style="margin-top: var(--cq-sp-64); background: #ffffff; border-radius: var(--cq-rad-24); border: 1px solid var(--sky-200); padding: clamp(24px, 4vw, 48px); box-shadow: 0 10px 30px -10px rgba(0, 119, 182, 0.08);">
      <div style="text-align: center; max-width: 620px; margin: 0 auto var(--cq-sp-32);">
        <span class="cq-section-subtitle">Proses Cepat &amp; Praktis</span>
        <h3 style="font-family: var(--cq-font-heading); font-weight: 300; font-size: clamp(1.6rem, 1.3rem + 1.2vw, 2.4rem); letter-spacing: -0.02em; color: var(--ink); margin-bottom: 6px;">
          3 Langkah Mudah <span class="cq-text-blue">Mulai Operasional</span>
        </h3>
        <p style="font-size: var(--cq-fs-sm); color: var(--cq-text-muted); margin: 0;">
          Daftarkan outlet Anda dalam 2 menit. Nikmati kasir modern, notifikasi WhatsApp, dan laporan keuangan terpadu.
        </p>
      </div>

      <div class="cq-grid-3" style="gap: var(--cq-sp-24);">
        <!-- Step 1 -->
        <div style="background: var(--sky-50); border: 1px solid var(--sky-200); border-radius: 18px; padding: var(--cq-sp-24); text-align: center;">
          <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--brand); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 18px; margin: 0 auto var(--cq-sp-16);">
            1
          </div>
          <h4 style="font-size: var(--cq-fs-base); font-weight: 700; color: var(--ink); margin-bottom: 8px;">Kirim Formulir Pendaftaran</h4>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.5; margin: 0;">
            Isi nama outlet, nama pemilik, dan nomor WhatsApp toko Anda. Akses free trial langsung aktif dalam 2 menit.
          </p>
        </div>

        <!-- Step 2 -->
        <div style="background: var(--sky-50); border: 1px solid var(--sky-200); border-radius: 18px; padding: var(--cq-sp-24); text-align: center;">
          <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--brand-deep); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 18px; margin: 0 auto var(--cq-sp-16);">
            2
          </div>
          <h4 style="font-size: var(--cq-fs-base); font-weight: 700; color: var(--ink); margin-bottom: 8px;">Scan WhatsApp Outlet</h4>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.5; margin: 0;">
            Hubungkan nomor WhatsApp resmi outlet Anda melalui scan QR code praktis di menu pengaturan aplikasi.
          </p>
        </div>

        <!-- Step 3 -->
        <div style="background: var(--sky-50); border: 1px solid var(--sky-200); border-radius: 18px; padding: var(--cq-sp-24); text-align: center;">
          <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--mint-cta); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 18px; margin: 0 auto var(--cq-sp-16);">
            3
          </div>
          <h4 style="font-size: var(--cq-fs-base); font-weight: 700; color: var(--ink); margin-bottom: 8px;">Mulai Terima Order Perdana</h4>
          <p style="font-size: var(--cq-fs-xs); color: var(--cq-text-muted); line-height: 1.5; margin: 0;">
            Atur daftar tarif kiloan/satuan, timbang pakaian pelanggan, dan kirim nota digital perdana secara otomatis.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
