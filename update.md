# UPDATE KONTEN — Cleanique Laundry

**Sumber kebenaran:** `PROPOSAL_KEMITRAAN_CLEANIQUE.md`
**Status:** Tahap 1 — dokumen konten + prompt gambar. **Belum ada file PHP/DB yang diubah.**
**Ruang lingkup:** seluruh situs (bukan hanya halaman paket usaha).

---

## 1. Keputusan yang Sudah Disepakati

| # | Topik | Keputusan |
|:-:|:---|:---|
| 1 | Mesin cuci | Bukan washer-dryer bertingkat (stack). Pakai mesin cuci 1 kotak 1 unit: front load 7 kg + top load 9/12 kg (setara LG/Polytron). Hanya **visual** yang berubah, konteks teks tetap. |
| 2 | Bahan | Ganti narasi "chemical siap pakai" menjadi **biang sabun & paket bahan pekat** (DeterMat, Softsanse, Essenz) yang diencerkan sendiri → menekan **biaya operasional mitra**, bukan menurunkan harga jual paket. |
| 3 | Setrika | Visual diganti: **setrika uap tabung + meja setrika biasa**. Teks tetap mengikuti proposal ("setrika uap boiler" untuk paket Super/Premium). |
| 4 | Teknisi siaga | Dihapus dari seluruh situs. Diganti klaim yang benar-benar ada di proposal: surveyor lokasi, trainer onsite 5 hari 4 malam, konsultasi teknis tanpa batas waktu. |
| 5 | Harga | Mengikuti proposal: **Starter 45 jt · Super 75 jt · Premium 167 jt**. |
| 6 | Paket baru | **Paket Pelatihan Manajemen & Operasional — Rp 8.500.000** (tanpa mesin). |
| 7 | Paket BO | Semua paket BO **sudah termasuk pelatihan** (sesuai proposal). Paket 8,5 jt adalah opsi bagi yang belum membeli mesin. |
| 8 | Halal | Bahan kimia bersertifikat halal → jalur upgrade sertifikasi halal outlet & mitra bisnis syariah. **Teks saja, tanpa logo**, sampai nomor sertifikat tersedia. |

---

## 2. Struktur Paket Baru

| Paket | Harga | Ruang | Isi inti | Badge |
|:---|:---|:---|:---|:---|
| **Starter** | Rp 45.000.000 | 24 m² | 1× front load 7 kg, 1× top load 9 kg, 1× pengering box gas 10 kg, 2 setrika listrik, chemical awal, promo, POS 6 bulan | Hemat Pemula |
| **Super** | Rp 75.000.000 | 36 m² | 2× front load 7 kg, 1× top load 12 kg, 2× pengering box gas, setrika uap boiler 15 L, vertical steamer, tablet POS, voucher chemical 300 rb, POS 1 tahun | Paling Populer |
| **Premium** | Rp 167.000.000 | 72 m² | 4× front load 7 kg, 2× top load 12 kg, 4× pengering box gas, 2× boiler 20 L, vertical steamer, vacuum cleaner, PC + printer, voucher chemical 500 rb, POS 1,5 tahun | Skala Besar |
| **Pelatihan** | Rp 8.500.000 | — | 5 hari pelatihan manajemen + operasional + marketing lokal (kurikulum §12 proposal), tanpa mesin | Tanpa Mesin |

Catatan yang wajib tampil di section harga:
> Semua paket BO sudah termasuk pelatihan manajemen & operasional. Paket Pelatihan Rp 8.500.000 tersedia bagi yang belum membeli unit mesin.

### 2.1 Sinkronisasi data (masalah yang harus dibereskan lebih dulu)

- `post_type = paket_usaha` → **0 post**. Section harga di `/paket-usaha-laundry/` selama ini memakai 3 kartu hardcode 25/48/85 jt.
- `post_type = kemitraan` → 4 post: Starter 28,5 jt · Komersial Pro 48 jt · Industrial Express 85 jt · Self-Service 115 jt.
- Dua daftar ini saling bertentangan. **Rencana:** jadikan `kemitraan` satu-satunya sumber, ubah query di `page-paket-usaha.php:529` dari `paket_usaha` → `kemitraan`.

| Post ID | Judul sekarang | Aksi |
|:---|:---|:---|
| 30 | Paket Kiloan Starter (UMKM) | → **Paket Starter** · `Mulai Rp 45.000.000` |
| 31 | Paket Komersial Pro (Ruko) | → **Paket Super** · `Mulai Rp 75.000.000` |
| 32 | Paket Industrial Express | → **Paket Premium** · `Mulai Rp 167.000.000` |
| 33 | Paket Self-Service Laundromat | ⚠️ **Tidak ada di proposal** — lihat §8 item O1 |
| — | (baru) | **Paket Pelatihan Manajemen & Operasional** · `Rp 8.500.000` |

Spesifikasi (`_cq_kemitraan_specs`) tiap post harus ditulis ulang mengikuti tabel §9 proposal — bukan daftar lama.

---

## 3. Aturan Copy (berlaku di semua halaman)

**Dilarang:**
- ❌ "stack", "bertingkat", "washer-dryer stack", "double stack"
- ❌ "heavy-duty", "heavy duty", "tahan putaran non-stop", "bekerja maraton", "dirancang 12 jam/hari"
- ❌ "teknisi siaga", "teknisi 24/7", "kunjungan servis berkala", "cakupan wilayah teknisi"
- ❌ "mesin cuci rumahan cepat jebol" (bertabrakan dengan foto mesin rumahan)
- ❌ "chemical siap pakai" sebagai satu-satunya penawaran

**Wajib:**
- ✅ Sebut merek mesin secara netral: "mesin cuci front load 7 kg" / "top load 9–12 kg"
- ✅ Tekankan **biang sabun & paket bahan pekat** → hemat biaya operasional
- ✅ Ganti klaim purna jual menjadi: surveyor lokasi · trainer onsite 5H4M · konsultasi teknis tanpa batas waktu · garansi mesin *(lihat O2)*
- ✅ Sebut bahan **bersertifikat halal** dan jalur sertifikasi halal outlet

---

## 4. Perubahan Copy per File

### 4.1 `templates/page-paket-usaha.php`

| Baris | Sekarang | Menjadi |
|:-:|:---|:---|
| 46 | "mesin komersial heavy-duty bergaransi, formula chemical standar pabrik Orchid Brand" | "mesin cuci & pengering siap pakai, **biang sabun pekat** yang diencerkan sendiri, SOP tuntas, bonus sistem POS" |
| 52 | `Garansi Resmi Mesin Pabrik` | `Bahan Bersertifikat Halal` |
| 123–130 | "Subsidi Ongkir & Bonus Lisensi POS… bonus chemical 100 Liter pertama & pendampingan teknisi onsite" | Judul: `Subsidi Ongkir & Bonus Lisensi POS` — Sub: `Termasuk pelatihan trainer onsite 5 hari 4 malam hingga outlet siap buka.` |
| 285 | "mesin cuci rumahan biasa… dinamo terbakar, garansi hangus" | Ganti seluruh kartu risiko → "Beli mesin tanpa pendampingan instalasi & pelatihan" (risiko: salah kapasitas, alur kerja berantakan, buka outlet tanpa SOP) |
| 288 | "unit washer & dryer commercial heavy-duty bergaransi resmi pabrik" | "unit mesin cuci & pengering baru, dikirim dan dirakit sesuai kapasitas paket" |
| 324 | "disupervisi teknisi profesional bersertifikat" | "didampingi surveyor lokasi & trainer bersertifikat internal" |
| 376–378 | "Mesin Heavy Duty Bergaransi Resmi / bekerja maraton" | Judul: `Mesin Baru Sesuai Kapasitas Paket` — Desc: "Semua unit 100% baru, bukan bekas atau rekondisi. Kapasitas disesuaikan paket dan hasil survei lokasi." |
| 384–386 | "Suplai Chemical Langsung Pabrik / deterjen, pelembut, parfum…" | Judul: `Biang Sabun & Paket Bahan Pabrik` — Desc: "Biang sabun pekat, softener, dan parfum waterbase diencerkan sendiri di outlet. Biaya operasional turun dibanding beli sabun jadi, hasil tetap konsisten." |
| 410 | "Tim teknisi dan konsultan kami mendampingi…" | "Surveyor dan konsultan kami memetakan lokasi, daya listrik, sumber air, dan pembuangan limbah sebelum paket disusun." |
| 424 | "dirakit dan diuji langsung oleh teknisi berpengalaman" | "dirakit dan diuji di lokasi oleh tim instalasi PT Indotech Berkah Abadi" |

**Galeri fasilitas (baris 428–471)** — 6 kartu diganti jadi:

| Kartu | Judul | Deskripsi | Gambar |
|:-:|:---|:---|:---|
| 1 | Mesin Cuci Front & Top Load | Front load 7 kg + top load 9–12 kg. Cukup untuk volume kiloan harian tanpa makan tempat. | `equip-washer.jpg` |
| 2 | Pengering Box Konversi Gas | Pakaian kering tanpa bergantung cuaca, hemat karena memakai gas LPG. | `equip-dryer-box.jpg` |
| 3 | Setrika Uap Tabung & Meja Setrika | Uap stabil untuk hasil licin, ditambah setrika listrik untuk detailing. | `equip-ironing.jpg` |
| 4 | Biang Sabun & Paket Bahan | Bahan pekat (DeterMat, Softsanse, Essenz) diencerkan sendiri — biaya per kilo cucian lebih murah. | `bahan-biang-sabun.jpg` |
| 5 | Pelatihan Trainer Onsite | Trainer mendampingi 5 hari 4 malam: operasional, kasir, pembukuan, marketing lokal. | `trainer-onsite.jpg` |
| 6 | Media Promo & Branding | Akrilik billboard, neon box, x-banner, brosur, nota, kartu member. | `hero-outlet.jpg` |

**Kartu harga fallback (baris 567–632)** — ganti 3 kartu lama jadi 4 kartu sesuai §2 di atas (45/75/167/8,5). Harga di form selector (baris 844–885) ikut disesuaikan, termasuk tambahan radio `Paket Pelatihan (Rp 8,5 Jt)`.

### 4.2 `front-page.php`

| Baris | Sekarang | Menjadi |
|:-:|:---|:---|
| 67 | alt "Mesin Komersial Heavy Duty" | alt "Mesin cuci dan pengering laundry Cleanique" |
| 79 | "mesin cuci & pengering komersial heavy-duty bergaransi resmi pabrik…" | "mesin cuci front & top load, pengering box gas, biang sabun pekat, dan SOP operasional lengkap hingga grand opening" |
| 83 | "Mesin cuci front load & dryer komersial heavy-duty bergaransi resmi" | "Mesin cuci & pengering baru sesuai kapasitas paket" |
| 147,155,159 | label "Heavy Duty" | "Peralatan Siap Pakai" |
| 169 | "Mesin Komersial Heavy Duty, Tahan Putaran Non-Stop" | "Mesin Cuci & Pengering Baru, Siap Operasional" |
| 171 | "Bukan mesin cuci rumah tangga biasa yang cepat jebol…" | "Mesin yang kami kirim adalah unit baru, bukan bekas atau rekondisi. Kapasitasnya disesuaikan dengan paket dan hasil survei lokasi, lalu dirakit dan diuji di tempat." |
| 176 | "Putaran RPM Tinggi: Drum SUS304…" | "Kapasitas Sesuai Volume: front load 7 kg untuk cucian harian, top load 9–12 kg untuk sprei dan selimut." |
| 180 | "Pengering Gas Konversi: 45 menit…" | "Pengering Box Gas: tidak bergantung cuaca, lebih hemat dibanding pengering listrik." |
| 184 | "Garansi Servis Resmi: teknisi terlatih" | "Konsultasi Teknis Tanpa Batas: tanya jawab operasional via WhatsApp kapan pun dibutuhkan." *(lihat O2 soal garansi)* |
| 232 | blok "Pabrik Chemical Orchid Brand" | "Pabrik Biang Sabun & Paket Bahan" — tambahkan kalimat: "Bahan bersertifikat halal, siap difasilitasi untuk sertifikasi halal outlet." |
| 339 | komentar "SOP, Pelatihan & Teknisi Siaga" | "SOP, Pelatihan & Konsultasi Teknis" |
| 361 | "Standardisasi Alur Kerja, Pelatihan SOP & Teknisi Siaga" | "Standardisasi Alur Kerja, Pelatihan SOP & Konsultasi Teknis" |
| 376 | "Tim Teknisi Siaga Sleman: layanan pemeliharaan berkala…" | "Konsultasi Operasional Tanpa Batas: tanya jawab teknis dan manajemen laundry via WhatsApp tanpa batas waktu." |
| 404–474 | 3 kartu paket hardcode 28/48/85 jt + "Stack", "Heavy Duty", "Boiler + Meja Vacuum" | Tulis ulang jadi Starter 45 / Super 75 / Premium 167, isi sesuai §9 proposal, hapus kata stack/heavy duty. Tambah kartu ke-4 Pelatihan 8,5 jt atau arahkan ke katalog. |
| 1153–1157 | schema FAQ "garansi mesin dan ketersediaan teknisi… tim teknisi internal yang siaga" | Ganti pertanyaan → "Apakah unit mesin baru dan bagaimana pendampingannya?" Jawaban → "Semua unit 100% baru, bukan bekas. Pendampingan berupa survey lokasi, instalasi, pelatihan trainer onsite, dan konsultasi teknis tanpa batas waktu." *(lihat O2)* |

### 4.3 `templates/page-kemitraan.php`

| Baris | Sekarang | Menjadi |
|:-:|:---|:---|
| 53 | "mesin cuci & dryer komersial bergaransi resmi, chemical Orchid Brand harga tangan pertama" | "mesin cuci & pengering baru, biang sabun pekat harga tangan pertama dari pabrik Yogyakarta" |
| 61 | `Garansi Mesin & Teknisi Tersedia` | `Bahan Bersertifikat Halal` |
| 207 | "mesin komersial, formula chemical pabrik Orchid Brand" | "mesin cuci & pengering, biang sabun pabrik, dan sistem POS" |
| 242,285,328,371,414,457 | "Setup: 2x Washer Front Load + 2x Dryer Gas… Stack…" | Sesuaikan ke komposisi paket baru; hapus kata Stack/Heavy Duty |
| 280 | "Paket Double Stack Express" | "Paket Super" |
| 340 | testimoni "Mesin stack washer & dryer… bekerja maraton" | Ganti testimoni agar tidak mengklaim stack/maraton. Pakai testimoni §13 proposal (Pak Iwan, Pak Ismail) |
| 383 | "Dukungan teknisi Sleman luar biasa cepat" | "Pelatihan trainernya jelas, karyawan langsung paham alur kerja dan pembukuan." |
| 496–497 | statistik `12 Kota` / `Cakupan Wilayah Layanan Teknisi Siaga` | `35–45` / `Hari Kerja Persiapan Outlet Siap Buka` |
| 726 | "Gudang sparepart lengkap di Sleman menjamin ketersediaan onderdil" | "Konsultasi teknis operasional tanpa batas waktu via WhatsApp" |

### 4.4 `templates/page-tentang-kami.php`

| Baris | Sekarang | Menjadi |
|:-:|:---|:---|
| 254–256 | "Teknisi & Garansi Resmi … konsultasi operasional 24/7" | Judul: `Pendampingan Instalasi & Pelatihan` — Desc: "Tim instalasi merakit unit di lokasi, trainer mendampingi 5 hari 4 malam, dan konsultasi operasional tetap terbuka setelah outlet berjalan." |
| 260 | `Garansi Resmi & Servis 24/7` | `Konsultasi Teknis Tanpa Batas` |
| 401 | "kalibrasi putaran RPM, pengujian suhu panas dryer" | "perakitan unit, pengujian fungsi pengering, dan uji kebocoran gas sebelum diserahterimakan" |
| 554 | "mesin cuci & dryer komersial heavy-duty bergaransi resmi" | "mesin cuci & pengering baru, pasokan biang sabun awal" |

### 4.5 `templates/page-solusi-kami.php`

| Baris | Menjadi |
|:-:|:---|
| 43 | "mesin cuci & pengering siap pakai, biang sabun pekat langsung dari pabrik" |
| 115 | "Seluruh peralatan baru dan siap pakai, kapasitas disesuaikan hasil survei lokasi." |
| 119 | "Set mesin cuci front & top load + pengering box gas." |

### 4.6 `templates/page-kontak.php`

| Baris | Menjadi |
|:-:|:---|
| 139–140 | ganti gambar ke `equip-washer.jpg`, alt "Mesin cuci laundry Cleanique" |
| 146 | "melihat unit mesin cuci & pengering, mencoba formula biang sabun, dan demo aplikasi kasir" |
| 308 | "tim kami menyiapkan demonstrasi unit" (hapus "tim teknisi") |
| 328 | "instalasi plumbing & kelistrikan, serta pelatihan karyawan onsite" |
| 338 | "unit display mesin cuci & pengering, demo biang sabun, simulasi POS" (hapus "heavy duty (stack)") |

### 4.7 `templates/page-pabrik-chemical.php`

- Judul section 184 → `Rangkaian Biang Sabun & Bahan Laundry`
- Baris 43 → tambahkan: "Bahan bersertifikat halal sehingga outlet Anda siap diarahkan menuju sertifikasi halal."
- Tambah 1 blok penjelas "Biang sabun vs sabun jadi": bahan pekat diencerkan sendiri → biaya per kilo cucian lebih murah, ongkos kirim lebih ringan, stok lebih tahan lama.

### 4.8 `header.php`

| Baris | Menjadi |
|:-:|:---|
| 248 | placeholder: "…parfum laundry, biang sabun" |
| 256 | `Biang Sabun & Bahan Pabrik` (link `/?s=biang+sabun`) |
| 257 | `Mesin Cuci & Pengering` (link `/?s=mesin+cuci`) |

### 4.9 Section halal (baru, 3 titik)

1. **Trust chip** di hero paket-usaha + kemitraan: `Bahan Bersertifikat Halal`
2. **Blok di halaman chemical:** "Bahan bersertifikat halal [No. ……]. Mitra yang siap naik kelas dapat difasilitasi proses sertifikasi halal outlet, sehingga berpeluang masuk ekosistem mitra bisnis syariah."
3. **FAQ baru** di paket-usaha: "Apakah bahan laundry Cleanique halal?" → "Ya. Bahan yang kami suplai bersertifikat halal. Untuk outlet, kami mendampingi proses sertifikasi halal usaha Anda."

---

## 5. Klaim yang Dihapus (checklist hapus)

- [ ] `teknisi siaga` — front-page 339/361/376/1156, page-kemitraan 497
- [ ] `teknisi 24/7` / `servis 24/7` — page-tentang-kami 256/260
- [ ] `kunjungan servis berkala` — front-page 363/376
- [ ] `pendampingan teknisi onsite` — page-paket-usaha 130
- [ ] `disupervisi teknisi bersertifikat` — page-paket-usaha 324
- [ ] `stack / bertingkat / double stack` — 8 file (lihat §4)
- [ ] `heavy-duty / heavy duty` — front-page, paket-usaha, kemitraan, solusi-kami, kontak, tentang-kami
- [ ] `bekerja maraton / 12 jam/hari / non-stop` — front-page 171, paket-usaha 378, kemitraan 340
- [ ] `chemical 100 Liter` sebagai bonus — paket-usaha 130
- [ ] Harga lama 25/28/28,5/48/85/115 jt — template + DB

---

## 6. Kebutuhan Gambar + Prompt

### 6.1 Style guide global (tempel di setiap prompt)

```
Photorealistic editorial photograph for a laundry business website in Indonesia.
Natural daylight, soft shadows, clean and bright interior, neutral white and
light-grey palette with a subtle mint-green accent. Shot on 35mm lens, f/4,
eye-level, realistic proportions, sharp focus, high detail, no HDR, no filter.
```

**Negative prompt (semua gambar):**
```
text, letters, watermark, logo, brand name, signage with words, stacked washer
dryer, tower unit, front loader mounted on top of dryer, commercial industrial
laundry machinery, dirty or cluttered room, cartoon, illustration, 3d render,
oversaturated, distorted hands, extra fingers
```

### 6.2 Daftar gambar

| File tujuan | Rasio | Dipakai di | Prompt inti |
|:---|:-:|:---|:---|
| `equip-washer.jpg` | 4:3 | galeri paket-usaha, kontak | Satu mesin cuci front load putih 7 kg dan satu mesin cuci top load putih 12 kg berdampingan di lantai keramik outlet laundry kecil, selang dan stopkontak rapi, keranjang cucian di samping. |
| `equip-dryer-box.jpg` | 4:3 | galeri paket-usaha | Satu mesin pengering box (cabinet dryer) besar berwarna putih/abu di sudut outlet, pintu tertutup, tabung gas LPG di sampingnya dengan selang rapi, lantai bersih. |
| `equip-ironing.jpg` | 4:3 | galeri paket-usaha | Meja setrika kayu biasa dengan alas busa dan kain, satu setrika listrik modern, dan satu unit setrika uap tabung (steam boiler tabung kecil) di lantai sebelah meja, tumpukan handuk terlipat rapi. |
| `bahan-biang-sabun.jpg` | 4:3 | galeri paket-usaha, pabrik chemical | Deretan jerigen plastik putih 5–20 liter berisi cairan bening dan biru muda, beberapa botol kecil, dan kotak karton paket bahan, tersusun di rak besi, label polos tanpa tulisan. |
| `trainer-onsite.jpg` | 4:3 | galeri paket-usaha | Seorang trainer pria Indonesia berkaos polo mengajari dua karyawan wanita di depan mesin cuci, salah satunya memegang buku catatan, suasana outlet terang. |
| `hero-outlet.jpg` | 16:9 | hero paket-usaha, kemitraan | Interior outlet laundry kiloan Indonesia modern: deretan 3 mesin cuci di sisi kiri, meja kasir kayu, rak pakaian terlipat, jendela besar dengan cahaya siang, lantai bersih, tanpa orang. |

**Catatan produksi:**
- Simpan di `wp-content/themes/cleanique-theme/assets/images/`.
- Nama file lama yang digantikan: `equip-washer-dryer.jpg`, `equip-boiler-iron.jpg`, `chemical-products.jpg` → hapus setelah semua referensi dipindah.
- Alt text wajib ikut diperbarui (jangan biarkan alt lama menyebut "stack"/"heavy duty").
- Ukuran target: lebar 1600 px, WebP, < 250 KB.

---

## 7. Checklist Implementasi

- [x] **Fase 0** — Jawab item terbuka §8 (O1–O4).
- [x] **Fase 1** — Rename + update harga + tulis ulang `_cq_kemitraan_specs` untuk 3 post; buat post Paket Pelatihan. *(selesai — lihat §9)*
- [ ] **Fase 2** — `page-paket-usaha.php`: query → `kemitraan`, fallback 4 kartu, form selector, galeri, countdown, kartu risiko.
- [ ] **Fase 3** — `front-page.php`: hero, showcase mesin, section biang sabun, section SOP, 4 kartu paket, schema.
- [ ] **Fase 4** — `page-kemitraan.php`, `page-tentang-kami.php`, `page-solusi-kami.php`, `page-kontak.php`, `page-pabrik-chemical.php`, `header.php`.
- [ ] **Fase 5** — Section halal (3 titik) + FAQ baru.
- [ ] **Fase 6** — Ganti gambar, alt text, hapus file lama.
- [ ] **Fase 7** — `php -l` semua file, sapu regex `stack|heavy.?duty|teknisi siaga|24/7|maraton`, cek tampilan desktop + mobile.

---

## 8. Item Terbuka (blocker sebelum publish)

| ID | Pertanyaan | Dampak kalau salah |
|:-:|:---|:---|
| **O1** | Paket Self-Service Laundromat (115 jt, post 33) tidak ada di proposal. Dihapus, di-draft, atau tetap dijual dengan harga lama? | Halaman akan menampilkan paket yang tidak ada di proposal → salah info ke calon mitra. |
| **O2** | Proposal tidak menyebut **garansi mesin**. Situs sekarang menjanjikan "garansi resmi" di 36 titik (front-page, paket-usaha, kemitraan, tentang-kami, solusi-kami, kontak, single paket). Garansi tetap ada atau dihapus? | Menjanjikan hal yang tidak ada di kontrak. |
| **O3** | Nomor/lembaga sertifikat halal bahan. Sudah ada? | Tanpa nomor, klaim "bersertifikat halal" tidak bisa diverifikasi. |
| **O4** | Commitment Fee 5 jt dan skema 75%/25% mau ditampilkan di web, atau tetap hanya di proposal PDF? | Mempengaruhi section harga & FAQ. |

**Usulan default kalau tidak dijawab:**
- O1 → post 33 di-`draft`, tidak tampil.
- O2 → hapus semua klaim garansi, ganti "konsultasi teknis tanpa batas waktu" + "unit 100% baru".
- O3 → tulis `Bahan bersertifikat halal` tanpa nomor, tanpa logo, sampai nomor tersedia.
- O4 → tampilkan ringkas di FAQ (bukan di kartu harga).

**Status: O1–O4 dikunci ke default di atas.**

---

## 9. Log Eksekusi

### Fase 1 — SELESAI (database)

Script: `scratch/fase1_update_paket.php` (idempoten, ada self-check PASS/FAIL).

| Post | Judul | Harga | Badge | Specs |
|:-:|:---|:---|:---|:-:|
| 30 | Paket Starter | Mulai Rp 45.000.000 | Hemat Pemula | 9 baris |
| 31 | Paket Super | Mulai Rp 75.000.000 | Paling Populer | 9 baris |
| 32 | Paket Premium | Mulai Rp 167.000.000 | Skala Besar | 10 baris |
| 41 | Paket Pelatihan Manajemen dan Operasional *(baru)* | Rp 8.500.000 | Tanpa Mesin | 7 baris |
| 33 | Paket Self-Service Laundromat | — | — | **draft** (O1) |

Diverifikasi: `/kemitraan/` menampilkan 45/75/167/8,5 jt, 115 jt tidak muncul, ketiga halaman utama balas HTTP 200.

**Catatan Fase 1:**
- **Slug lama dipertahankan** (`paket-kiloan-starter`, `paket-komersial-pro-ruko`, `paket-industrial-express`) supaya tidak ada URL mati. Konsekuensinya URL tidak cocok dengan judul baru — kalau mau diganti, perlu redirect 301.
- `seed_kemitraan.php` masih berisi data lama. Jangan dijalankan lagi, atau isinya disamakan dulu.
- Post 33 masih menyimpan kata "Stack"/"Heavy Duty" di specs. Aman selama status draft; wajib dibersihkan sebelum dipublish ulang.
- **Blocker di luar rencana:** nomor WhatsApp masih default `6281234567890` (placeholder) di `functions.php:308`. Proposal menyebut **0856-0006-1005**. Semua CTA WhatsApp saat ini mengarah ke nomor palsu. Perlu diisi di Customizer atau ubah default-nya.
