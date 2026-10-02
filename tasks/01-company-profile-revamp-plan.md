# Laporan & Rencana Implementasi: Revamp Company Profile Cleanique Laundry (PT Indotech Berkah Abadi)

**Spesifikasi Rekayasa Perangkat Lunak (The Matt Pocock Slice & Spec Methodology)**  
*Status: SELESAI DIIMPLEMENTASIKAN & DIVERIFIKASI*

---

## 📌 Ringkasan Hasil Eksekusi

Berdasarkan 9 poin permintaan pengguna dan sesi klarifikasi interaktif *Grill Me*, berikut adalah implementasi yang telah selesai dikerjakan:

1. **Navigasi Utama (Compro Header & Mobile Drawer):**
   - Standarisasi item menu menjadi: **Beranda**, **Tentang Kami**, **Berita**, **Kemitraan**, **Kontak**.
   - Helper logo dinamis `cleanique_get_site_logo()`: Membaca custom logo dari Customizer WordPress, jika kosong otomatis melakukan fallback ke file `/logo/laundry-cleanique.png` di folder root situs.
   - Sinkronisasi desktop navbar dan mobile navigation drawer dengan touch target ergonomis min 48px.

2. **Sistem Card Modern Korporat (Bento Architecture):**
   - Menggantikan kartu bertipe promo (`.cq-portal-gateway-card`, `.cq-peluang-card`) dengan sistem kartu korporat terpadu di `assets/css/compro.css`.
   - Menghadirkan: `.cq-corp-card`, `.cq-kemitraan-card`, `.cq-corp-article-card`, dan `.cq-corp-stat-card`.
   - Menggunakan border subtle `1px solid var(--cq-border-light)`, elevasi bayangan halus, dan mikro-interaksi hover yang elegan tanpa warna mencolok/neon sales pitch.

3. **Motion Engine GSAP & ScrollTrigger:**
   - Ditambahkan modul animasi khusus Company Profile di `assets/js/animations.js`:
     - Hero entrance timeline (Badge, headline, deskripsi, CTA button, dan dual gateway).
     - Staggered card reveal saat user scroll ke section Bento, Kemitraan, dan Berita.
     - Penyesuaian `prefers-reduced-motion` untuk aksesibilitas WCAG.

4. **Modul Kemitraan Laundry (CPT & Admin Settings):**
   - Dibuat Custom Post Type `kemitraan` (slug: `/kemitraan/`).
   - Custom Meta Box detail kemitraan: Rentang Biaya Modal, Label Badge, Estimasi Balik Modal (BEP), Rincian Fasilitas & Mesin, Link Brosur PDF, dan Kustom Pesan WhatsApp.
   - Halaman Pengaturan Admin di WP Admin: Menu **Kemitraan** -> **Pengaturan** untuk nomor hotline WhatsApp kemitraan, URL proposal global, dan syarat kemitraan.
   - Otomatisasi migrasi data dari `paket_usaha` ke `kemitraan`.
   - Dibuat template single page detail `single-kemitraan.php`.
   - Dibuat template katalog listing `archive-kemitraan.php` dan `templates/page-kemitraan.php`.

5. **Footer Khusus Company Profile:**
   - Pemisahan arsitektur footer di `footer.php`:
     - Jika berada di halaman landing page promo (`page-paket-usaha.php` atau `page-aplikasi-laundry.php`), tetap menggunakan footer promo (`cq-payno-footer`).
     - Jika berada di company profile, otomatis memuat **Footer Korporat Resmi** (`cq-corp-footer`).
   - Konten Footer Compro: Profil PT Indotech Berkah Abadi, legalitas resmi, 3 trust badges kredibilitas, menu navigasi compro resmi, lini solusi, alamat kantor & workshop Sleman, jam operasional, link peta arah, serta legal bar (tanpa watermark raksasa promo).

6. **Diferensiasi Desain Layout Frontend:**
   - Tampilan Beranda (`front-page.php`) dirombak total dari kesan promo aplikasi menjadi representasi holding & entitas manufaktur resmi terpercaya.
   - Layout lapang (*spacious whitespace*), tipografi berwibawa (Plus Jakarta Sans & Inter), dan integrasi gateway ganda yang proporsional.

7. **Perbaikan Overlay Search Modal:**
   - Pembedahan CSS modal ke `compro.css`.
   - Penataan z-index tertinggi (`z-index: 99999`) dan backdrop blur `rgba(15, 23, 42, 0.75)`.
   - Scroll locking `body` saat modal terbuka, fungsi tombol Close, klik backdrop, dan shortcut keyboard `ESC` maupun `Ctrl+K`.

8. **Perbaikan Mobile Drawer:**
   - Drawer panel dengan animasi smooth slide dari kanan (`z-index: 99998`).
   - Header drawer rapi dengan logo resmi dan tombol close.
   - Form pencarian yang pas di layar smartphone.
   - Menu drawer sinkron dengan 5 navigasi utama compro.

9. **Fokus Beranda Terpenuhi:**
   - `front-page.php` telah tuntas dibangun sebagai pondasi design system corporate Cleanique.

---

## 📋 Checklist Hasil Kerja

- [x] **Task 1.1 - Helper Logo Dinamis (`functions.php`)**
- [x] **Task 1.2 - Navigasi Header (`header.php`)**
- [x] **Task 1.3 - Perbaikan Mobile Drawer (`header.php` & `compro.css`)**
- [x] **Task 1.4 - Perbaikan Overlay Search Modal (`header.php` & `compro.css`)**
- [x] **Task 1.5 - Footer Khusus Company Profile (`footer.php`)**
- [x] **Task 1.6 - CPT Kemitraan & Admin Setting (`inc/post-types.php`)**
- [x] **Task 2.1 - Sistem Styling CSS Compro (`assets/css/compro.css`)**
- [x] **Task 2.2 - Hero Section Beranda Compro (`front-page.php`)**
- [x] **Task 2.3 - Bento Grid Profil PT Indotech Berkah Abadi (`front-page.php`)**
- [x] **Task 2.4 - Section Kemitraan Laundry Beranda (`front-page.php`)**
- [x] **Task 2.5 - Section Pabrik Chemical Orchid Brand (`front-page.php`)**
- [x] **Task 2.6 - Section Berita & Edukasi (`front-page.php`)**
- [x] **Task 2.7 - Animasi GSAP Compro (`assets/js/animations.js`)**
- [x] **Task 3.1 - Template Arsip/Listing Kemitraan (`archive-kemitraan.php` & `templates/page-kemitraan.php`)**
- [x] **Task 3.2 - Template Detail Kemitraan (`single-kemitraan.php`)**
- [x] **Task 4.1 - Uji Validasi Sintaks PHP (Semua file: Exit Code 0, No Errors)**
