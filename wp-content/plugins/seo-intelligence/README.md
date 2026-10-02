# SEO Intelligence (WordPress Plugin)
**Platform Audit & Optimasi Holistik: Technical SEO, GEO, AEO, Struktur Heading & Keterbacaan Bahasa Indonesia**

[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://php.net)
[![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-0073aa.svg)](https://wordpress.org)
[![License: GPL-2.0-or-later](https://img.shields.io/badge/License-GPLv2%2B-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

---

## 🌟 Filosofi Utama (Sesuai `READABLE.md`)
1. **Explainable Diagnosis, Tanpa Skor Gelap (No Opaque Scores)**: Setiap masalah tidak hanya memberikan angka pengurangan, melainkan menyertakan empat komponen wajib:
   - **Apa Masalahnya** (Problem statement)
   - **Kenapa Berpengaruh** (Impact on Googlebot, LLM AI, or user UX)
   - **Lokasi Elemen** (Exact tag, selector, or line)
   - **Solusi & Rekomendasi Konkret** (Actionable fix)
2. **Indonesian-First Readability Engine**: Formula keterbacaan yang disesuaikan secara khusus dengan morfologi Bahasa Indonesia (panjang kalimat 14–18 kata, kata penghubung transisi, struktur kalimat majemuk, dan deteksi "wall of text").
3. **Generative Engine Optimization (GEO)**: Pengoptimalan sinyal entitas bisnis lokal, format kalimat deklaratif ("adalah/merupakan"), kepadatan fakta dan angka terukur, serta sinyal NAP (Name, Address, Phone) agar mudah disarikan oleh Google Gemini, Perplexity, dan ChatGPT Search.
4. **Answer Engine Optimization (AEO)**: Memverifikasi kehadiran heading berbasis pertanyaan 5W+1H (*Apa, Bagaimana, Berapa, Mengapa, Siapa, Dimana*) yang langsung diikuti oleh paragraf jawaban padat (30–65 kata) untuk memenangkan Google Featured Snippets dan Voice Search.
5. **Zero-Dependency Native Autoloader**: Menggunakan autoloader internal PSR-4 tanpa membutuhkan Composer CLI eksternal di server.
6. **Crawler Sekuensial Berbasis REST**: Pemindaian seluruh website dijalankan secara terukur dari sisi klien (client-driven sequential worker) dengan live progress bar, tombol jeda/lanjut, dan aman dari batas waktu eksekusi server (timeout-safe).

---

## 🏗️ 11 Dimensi Penilaian & Bobot Default (Total 100%)

| No | Dimensi | Slug Kategori | Bobot | Deskripsi Indikator |
|---|---|---|---|---|
| 1 | **SEO Teknis & Meta** | `seo` | 14% | Panjang `<title>` (35–60 char), `<meta name="description">` (120–155 char), canonical tag, robots noindex, OpenGraph. |
| 2 | **Kualitas & Kedalaman Konten** | `content` | 12% | Total kata artikel (min 300–600 kata), deteksi konten tipis (*thin content*), dan blok paragraf melebihi 120 kata. |
| 3 | **Keterbacaan Bahasa Indonesia** | `readability` | 12% | Rata-rata panjang kalimat (maks 22 kata), rasio kata penghubung/transisi (min 15%), dan penggunaan list/bullet points. |
| 4 | **GEO (Generative Engine)** | `geo` | 10% | Kejelasan definisi entitas brand, kepadatan data statistik/harga numerik, dan sinyal kontak lokal E-E-A-T. |
| 5 | **AEO (Answer Engine)** | `aeo` | 10% | Subjudul pertanyaan 5W+1H dan paragraf jawaban langsung (*direct answers*) 30–70 kata untuk Featured Snippet. |
| 6 | **Struktur Heading (H1–H6)** | `headings` | 8% | Aturan H1 tunggal, keteraturan hierarki tanpa lompatan level (misal H2 ke H4), heading kosong, dan heading kepanjangan. |
| 7 | **Media, Alt Text & CLS** | `images` | 8% | Kelengkapan atribut Alt deskriptif, dimensi eksplisit `width` & `height` pencegah lonjakan layout (CLS), dan format modern WebP. |
| 8 | **Distribusi Tautan & Anchor** | `links` | 8% | Rasio tautan internal, deteksi teks jangkar generik ("klik di sini"), tautan kosong (`href="#"`), dan keamanan `target="_blank"`. |
| 9 | **Data Terstruktur (Schema)** | `schema` | 6% | Keberadaan schema JSON-LD, deteksi tipe `LocalBusiness` / `DryCleaningOrLaundry`, `FAQPage`, dan validasi sintaks. |
| 10 | **Aset Web & Beban Script** | `assets` | 6% | Deteksi script pemblokir perenderan (*render-blocking*) di `<head>` dan optimasi `preconnect` Google Fonts. |
| 11 | **UX & Responsivitas Mobile** | `ux` | 6% | Tag meta viewport responsif mobile, izin zoom aksesibilitas, dan deklarasi bahasa dokumen `<html lang="id">`. |

*Seluruh bobot di atas dapat disesuaikan secara dinamis oleh administrator melalui menu Pengaturan.*

---

## 📂 Struktur Arsitektur Plugin

```
seo-intelligence/
├── assets/
│   ├── css/
│   │   └── admin.css               # Desain modern, responsive, badge severity, progress bar
│   └── js/
│       └── admin.js                # AJAX single audit, filter severity, dan crawler sekuensial
├── src/
│   ├── Admin/
│   │   ├── AdminMenu.php           # Registrasi 5 submenu WordPress
│   │   ├── DashboardPage.php       # Ringkasan statistik kesehatan website & audit kilat
│   │   ├── PageAuditPage.php       # Antarmuka audit halaman tunggal interaktif
│   │   ├── SiteAuditPage.php       # Runner crawler sekuensial seluruh website
│   │   ├── ImageInventoryPage.php  # Inventaris gambar & diagnosa CLS
│   │   └── SettingsPage.php        # Form konfigurasi bobot skor, ambang batas & AI key
│   ├── AI/
│   │   ├── ProviderInterface.php   # Kontrak modul AI
│   │   ├── GeminiProvider.php      # Integrasi Google Gemini 1.5 Flash
│   │   ├── OpenAiProvider.php      # Integrasi OpenAI GPT-4o-mini
│   │   ├── ClaudeProvider.php      # Integrasi Anthropic Claude 3.5 Sonnet
│   │   └── AiManager.php           # Resolver provider aktif
│   ├── Analysis/
│   │   ├── AnalysisContext.php     # Parser DOMDocument & DOMXPath tunggal (efisien)
│   │   ├── AnalysisManager.php     # Pipeline runner dengan isolasi kegagalan per analyzer
│   │   ├── AnalysisResult.php      # Model sub-skor & metadata eksekusi
│   │   ├── AnalyzerInterface.php   # Kontrak modular analyzer
│   │   ├── Finding.php             # Model temuan transparan (problem, why, fix, location)
│   │   └── Severity.php            # Enum severity & bobot penalti
│   ├── Analyzers/
│   │   ├── AEO/AeoAnalyzer.php
│   │   ├── Assets/AssetAnalyzer.php
│   │   ├── Content/ContentAnalyzer.php
│   │   ├── GEO/GeoAnalyzer.php
│   │   ├── Headings/HeadingAnalyzer.php
│   │   ├── Images/ImageAnalyzer.php
│   │   ├── Links/LinkAnalyzer.php
│   │   ├── Readability/ReadabilityAnalyzer.php
│   │   ├── Schema/SchemaAnalyzer.php
│   │   ├── SEO/TechnicalSeoAnalyzer.php
│   │   └── UX/UxMobileAnalyzer.php
│   ├── Core/
│   │   ├── Autoloader.php          # Native PSR-4 autoloader
│   │   ├── Config.php              # Nilai default & opsi konfigurasi
│   │   ├── Container.php           # Dependency injection container ringan
│   │   └── Plugin.php              # Master lifecycle orchestrator
│   ├── Database/
│   │   ├── Schema.php              # Definisi tabel migrasi dbDelta
│   │   └── Repository/
│   │       └── AuditRepository.php # Data access layer untuk audits, pages, findings, assets
│   └── REST/
│       ├── AnalysisController.php  # Endpoint /analyze, /latest, /pages, /page/{id}
│       └── SiteAuditController.php  # Endpoint /crawler/start, /process-item, /finish
├── seo-intelligence.php            # Bootstrap file utama plugin
└── README.md
```

---

## 🗄️ Skema Database Custom
Plugin ini membuat 4 tabel khusus berindeks cepat menggunakan `dbDelta()`:
1. `wp_seoi_audits`: Menyimpan riwayat audit induk (tipe halaman/site-wide, total halaman, durasi, dan ringkasan skor).
2. `wp_seoi_pages`: Menyimpan data audit tiap URL spesifik, judul halaman, status HTTP, dan skor keseluruhan.
3. `wp_seoi_findings`: Menyimpan setiap temuan masalah yang terstruktur lengkap dengan severity, judul, penjelasan dampak, rekomendasi, lokasi elemen, dan metadata teknis.
4. `wp_seoi_assets`: Menyimpan inventaris aset media (gambar), status alt text, dimensi piksel, dan tipe berkas untuk audit CLS.

---

## 🚀 Endpoint REST API

| Method | Endpoint | Deskripsi |
|---|---|---|
| `POST` | `/wp-json/seo-intelligence/v1/analyze` | Menjalankan audit on-demand untuk 1 URL atau Post ID. |
| `GET` | `/wp-json/seo-intelligence/v1/latest` | Mengambil data audit terbaru beserta statistik global website. |
| `GET` | `/wp-json/seo-intelligence/v1/pages` | Mengambil daftar riwayat halaman yang telah diaudit (dengan paginasi). |
| `GET` | `/wp-json/seo-intelligence/v1/page/{id}` | Mengambil temuan detail (*findings*) untuk satu riwayat audit halaman tertentu. |
| `POST` | `/wp-json/seo-intelligence/v1/crawler/start` | Menginisialisasi audit website menyeluruh dan mengembalikan antrean URL publik. |
| `POST` | `/wp-json/seo-intelligence/v1/crawler/process-item` | Memproses audit satu item URL dalam antrean sekuensial. |
| `POST` | `/wp-json/seo-intelligence/v1/crawler/finish` | Mengagregasi skor akhir dan menandai audit website selesai. |

---

## 💡 Cara Penggunaan

1. **Aktivasi Plugin**:
   Buka **Plugins > Installed Plugins** di admin WordPress, lalu aktifkan **SEO Intelligence**.
2. **Dashboard Kesehatan**:
   Buka menu **SEO Intelligence > Dashboard** untuk melihat skor rata-rata, masalah kritis, dan pintasan audit kilat halaman utama.
3. **Audit Halaman**:
   Buka menu **Audit Halaman**, pilih halaman dari dropdown atau ketik URL target, lalu klik **Mulai Audit Halaman**. Hasil diagnosis 11 dimensi dan tab filter temuan akan muncul secara instan.
4. **Audit Menyeluruh Website**:
   Buka menu **Audit Website**, lalu klik **Mulai Audit Website Sekarang**. Amati bilah kemajuan (*live progress bar*) memindai setiap halaman satu demi satu.
5. **Inventaris Gambar**:
   Buka menu **Inventaris Gambar** untuk mengidentifikasi gambar yang belum memiliki Alt Text atau belum memiliki atribut `width`/`height` pemicu CLS.
6. **Kustomisasi Bobot**:
   Buka menu **Pengaturan** untuk menyesuaikan bobot persentase dari 11 dimensi penilaian dan memasukkan API Key AI jika diinginkan.
