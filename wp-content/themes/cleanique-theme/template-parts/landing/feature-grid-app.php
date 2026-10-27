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
                Siap Ambil
              </span>
            </div>

            <!-- WhatsApp 1-Click Action Button -->
            <div style="background: #25D366; color: #ffffff; text-align: center; padding: 9px 12px; border-radius: var(--cq-rad-pill); font-size: 10px; font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 6px; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.35);">
              <i class="ri-whatsapp-fill" style="font-size: 13px;"></i> Kirim Nota
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

    <!-- 3 Langkah Memulai Operasional (Split Layout: Poin Garis Kiri & Image Kanan) -->
    <div class="cq-onboarding-section-wrap">
      <div class="cq-onboarding-header">
        <span class="cq-badge-clean" style="margin-bottom: var(--cq-sp-12);">Proses Cepat</span>
        <h3 class="cq-onboarding-title">
          3 Langkah Mudah <span class="cq-text-blue">Mulai Operasional</span>
        </h3>
        <p class="cq-onboarding-desc">
          Daftarkan outlet Anda dalam beberapa menit. Nikmati kasir modern berbasis cloud, notifikasi WhatsApp otomatis, dan laporan keuangan terpadu.
        </p>
      </div>

      <div class="cq-onboarding-split">
        <!-- Kolom Kiri: Poin-poin dengan Garis Vertikal (Timeline Style Kemitraan) -->
        <div class="cq-onboarding-timeline">
          <div class="cq-timeline-track" aria-hidden="true"></div>

          <!-- Langkah 01 -->
          <div class="cq-timeline-item">
            <div class="cq-timeline-node" aria-hidden="true">
              <div class="cq-timeline-node-inner" style="background: #0284c7;"></div>
            </div>
            <div class="cq-timeline-badge-pill">
              <span class="cq-timeline-dot dot-blue"></span> Tahap 01
            </div>
            <div class="cq-timeline-card">
              <div class="cq-timeline-card-header">
                <div class="cq-timeline-icon-box" style="border-color: #0284c7; color: #0284c7;">
                  <i class="ri-user-add-line" aria-hidden="true"></i>
                </div>
                <div>
                  <h4 class="cq-timeline-title">Pendaftaran &amp; Setup Outlet</h4>
                  <div class="cq-timeline-meta">
                    <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 2 – 3 Menit
                  </div>
                </div>
              </div>
              <p class="cq-timeline-card-desc">
                Daftarkan data outlet, identitas bisnis, dan pilih paket langganan Smart POS Cleanique. Akses kasir berbasis cloud langsung aktif dan siap dikonfigurasi tanpa beban instalasi server rumit.
              </p>
              <div class="cq-timeline-tags-row">
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Setup Cloud Instan</span>
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Multi-User Kasir &amp; Owner</span>
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Database Terenkripsi Aman</span>
              </div>
            </div>
          </div>

          <!-- Langkah 02 -->
          <div class="cq-timeline-item">
            <div class="cq-timeline-node" aria-hidden="true">
              <div class="cq-timeline-node-inner" style="background: #10b981;"></div>
            </div>
            <div class="cq-timeline-badge-pill">
              <span class="cq-timeline-dot dot-mint"></span> Tahap 02
            </div>
            <div class="cq-timeline-card">
              <div class="cq-timeline-card-header">
                <div class="cq-timeline-icon-box" style="border-color: #059669; color: #059669;">
                  <i class="ri-whatsapp-line" aria-hidden="true"></i>
                </div>
                <div>
                  <h4 class="cq-timeline-title">Scan WhatsApp Resmi Outlet</h4>
                  <div class="cq-timeline-meta">
                    <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 1 – 2 Menit
                  </div>
                </div>
              </div>
              <p class="cq-timeline-card-desc">
                Hubungkan nomor WhatsApp resmi outlet Anda melalui scan QR code ringkas pada menu pengaturan aplikasi. Sistem otomatis terhubung untuk pengiriman nota digital &amp; status cucian real-time.
              </p>
              <div class="cq-timeline-tags-row">
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Scan QR Sekali Klik</span>
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Nomor WhatsApp Toko Sendiri</span>
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> E-Nota Digital Otomatis</span>
              </div>
            </div>
          </div>

          <!-- Langkah 03 -->
          <div class="cq-timeline-item">
            <div class="cq-timeline-node" aria-hidden="true">
              <div class="cq-timeline-node-inner" style="background: #0077b6;"></div>
            </div>
            <div class="cq-timeline-badge-pill">
              <span class="cq-timeline-dot dot-blue"></span> Tahap 03
            </div>
            <div class="cq-timeline-card">
              <div class="cq-timeline-card-header">
                <div class="cq-timeline-icon-box" style="border-color: #0077b6; color: #0077b6;">
                  <i class="ri-store-2-line" aria-hidden="true"></i>
                </div>
                <div>
                  <h4 class="cq-timeline-title">Input Layanan &amp; Mulai Transaksi</h4>
                  <div class="cq-timeline-meta">
                    <i class="ri-time-line" aria-hidden="true"></i> Estimasi Waktu: 5 Menit
                  </div>
                </div>
              </div>
              <p class="cq-timeline-card-desc">
                Atur daftar tarif kiloan dan satuan outlet Anda. Timbang cucian pelanggan, terima pesanan perdana, kirim e-nota langsung ke WhatsApp pelanggan, dan pantau rekap keuangan kasir secara rapi.
              </p>
              <div class="cq-timeline-tags-row">
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Kasir Kiloan &amp; Satuan</span>
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Cetak Thermal &amp; Nota WA</span>
                <span class="cq-timeline-tag-item"><i class="ri-check-line"></i> Rekap Kas &amp; Laporan Harian</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Kolom Kanan: Image Pendukung (Mockup Tablet POS & E-Nota) -->
        <div class="cq-onboarding-visual-col">
          <div class="cq-onboarding-visual-sticky">
            <div class="cq-onboarding-visual-card">
              <div class="cq-onboarding-visual-topbar">
                <div class="cq-onboarding-visual-dots">
                  <span></span><span></span><span></span>
                </div>
                <div class="cq-onboarding-visual-badge">
                  <span class="cq-onboarding-pulse-dot"></span> POS Cloud
                </div>
              </div>
              <div class="cq-onboarding-img-wrapper">
                <img 
                  src="<?php echo esc_url(CLEANIQUE_URI . '/assets/images/hero-pos-app.jpg'); ?>" 
                  alt="Tampilan Antarmuka POS Cleanique dan Nota Digital WhatsApp" 
                  class="cq-onboarding-img"
                  loading="lazy"
                  width="1280"
                  height="720"
                />
              </div>
              <div class="cq-onboarding-visual-caption">
                <div class="cq-onboarding-caption-item">
                  <i class="ri-smartphone-line" aria-hidden="true"></i>
                  <div>
                    <strong>Multi-Device</strong>
                    <span>Akses dari Tablet, HP, &amp; Laptop</span>
                  </div>
                </div>
                <div class="cq-onboarding-caption-item">
                  <i class="ri-shield-check-line" aria-hidden="true"></i>
                  <div>
                    <strong>Sistem Cloud Terpadu</strong>
                    <span>Sinkronisasi Otomatis &amp; Real-Time</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
