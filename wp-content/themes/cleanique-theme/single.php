<?php
/**
 * Single Post Template - Comprehensive 12-Section Architecture
 * Cleanique Laundry by PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic & High-Converting Readability
 *
 * @package Cleanique
 */

get_header();

$wa_url = cleanique_get_whatsapp_url('general');
$current_id = get_the_ID();
$current_title = get_the_title();
$current_url = get_permalink();
$share_wa_text = rawurlencode($current_title . ' - ' . $current_url);
$share_wa_url = 'https://api.whatsapp.com/send?text=' . $share_wa_text;
$share_fb_url = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($current_url);
$share_x_url = 'https://twitter.com/intent/tweet?text=' . rawurlencode($current_title) . '&url=' . rawurlencode($current_url);
$share_li_url = 'https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode($current_url);
$share_tg_url = 'https://t.me/share/url?url=' . rawurlencode($current_url) . '&text=' . rawurlencode($current_title);

// Kategori artikel saat ini
$post_categories = get_the_category();
$cat_id = !empty($post_categories) ? $post_categories[0]->term_id : 0;
$cat_name = !empty($post_categories) ? $post_categories[0]->name : 'Edukasi';
$cat_url = !empty($post_categories) ? get_category_link($cat_id) : home_url('/artikel/');

// Tags artikel
$post_tags = get_the_tags();

// Tanggal publikasi dan tanggal perbaruan
$published_date = get_the_date('j F Y');
$published_iso = get_the_date('c');
$modified_date = get_the_modified_date('j F Y');
$modified_iso = get_the_modified_date('c');
$is_updated = (get_the_modified_time('U') > get_the_time('U') + 86400);

// Reading time
$reading_time = cleanique_get_reading_time($current_id);
?>

<main id="main-content" class="cq-single-article-page" itemscope itemtype="https://schema.org/BlogPosting">
  <meta itemprop="mainEntityOfPage" content="<?php echo esc_url($current_url); ?>">
  <meta itemprop="datePublished" content="<?php echo esc_attr($published_iso); ?>">
  <meta itemprop="dateModified" content="<?php echo esc_attr($modified_iso); ?>">

  <?php while (have_posts()) : the_post(); ?>

    <!-- ========================================================
         SECTION 2: BREADCRUMBS
         ======================================================== -->
    <div class="cq-breadcrumb-strip">
      <div class="cq-container">
        <nav class="cq-single-breadcrumbs" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
          <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item">
              <i class="ri-home-4-line" aria-hidden="true"></i> <span itemprop="name">Beranda</span>
            </a>
            <meta itemprop="position" content="1" />
          </span>
          <i class="ri-arrow-right-s-line cq-bc-sep" aria-hidden="true"></i>
          <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/artikel/')); ?>" itemprop="item">
              <span itemprop="name">Artikel &amp; Edukasi</span>
            </a>
            <meta itemprop="position" content="2" />
          </span>
          <i class="ri-arrow-right-s-line cq-bc-sep" aria-hidden="true"></i>
          <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo esc_url($cat_url); ?>" itemprop="item">
              <span itemprop="name"><?php echo esc_html($cat_name); ?></span>
            </a>
            <meta itemprop="position" content="3" />
          </span>
          <i class="ri-arrow-right-s-line cq-bc-sep" aria-hidden="true"></i>
          <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span class="cq-breadcrumb-current" itemprop="name" aria-current="page"><?php the_title(); ?></span>
            <meta itemprop="position" content="4" />
          </span>
        </nav>
      </div>
    </div>

    <!-- ========================================================
         SECTION 3: ARTICLE HEADER
         ======================================================== -->
    <header class="cq-sky-canvas cq-single-hero">
      <div class="cq-container">
        <div class="cq-single-hero-inner">
          <!-- Category Pill -->
          <div class="cq-badge-pill cq-badge-accent cq-hero-cat-badge">
            <i class="ri-price-tag-3-line" aria-hidden="true"></i>
            <a href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
          </div>

          <!-- H1 / Article Title -->
          <h1 class="cq-single-title" itemprop="headline">
            <?php the_title(); ?>
          </h1>

          <!-- Excerpt / Summary -->
          <?php if (has_excerpt()) : ?>
            <div class="cq-single-excerpt" itemprop="description">
              <?php the_excerpt(); ?>
            </div>
          <?php else : ?>
            <p class="cq-single-excerpt" itemprop="description">
              Panduan mendalam operasional, perhitungan HPP, strategi pemilihan mesin laundry komersial, dan sistem digitalisasi outlet dari tim ahli PT Indotech Berkah Abadi.
            </p>
          <?php endif; ?>

          <!-- Meta Row: Author, Dates, Reading Time -->
          <div class="cq-single-meta-row">
            <div class="cq-single-author-badge" itemprop="author" itemscope itemtype="https://schema.org/Person">
              <div class="cq-author-mini-avatar" aria-hidden="true">
                <i class="ri-user-star-line"></i>
              </div>
              <div class="cq-author-mini-info">
                <span class="cq-author-name" itemprop="name"><?php the_author(); ?></span>
                <span class="cq-author-role">Tim Ahli PT Indotech Berkah Abadi</span>
              </div>
            </div>

            <span class="cq-meta-divider" aria-hidden="true">&bull;</span>

            <span class="cq-single-meta-item" title="Tanggal Publikasi">
              <i class="ri-calendar-line" aria-hidden="true"></i>
              <span>Dipublikasi: <?php echo esc_html($published_date); ?></span>
            </span>

            <?php if ($is_updated) : ?>
              <span class="cq-single-meta-item cq-meta-updated" title="Pembaruan Terakhir">
                <i class="ri-refresh-line" aria-hidden="true"></i>
                <span>Diperbarui: <?php echo esc_html($modified_date); ?></span>
              </span>
            <?php endif; ?>

            <span class="cq-meta-divider" aria-hidden="true">&bull;</span>

            <span class="cq-single-meta-item" title="Estimasi Waktu Baca">
              <i class="ri-time-line" aria-hidden="true"></i>
              <span><?php echo esc_html($reading_time); ?></span>
            </span>
          </div>

          <!-- Header Share Actions Quick Bar -->
          <div class="cq-hero-share-actions">
            <span class="cq-hero-share-title">Bagikan:</span>
            <a href="<?php echo esc_url($share_wa_url); ?>" target="_blank" rel="noopener" class="cq-mini-share-btn is-wa" title="WhatsApp" aria-label="Bagikan via WhatsApp">
              <i class="ri-whatsapp-line"></i>
            </a>
            <a href="<?php echo esc_url($share_fb_url); ?>" target="_blank" rel="noopener" class="cq-mini-share-btn is-fb" title="Facebook" aria-label="Bagikan via Facebook">
              <i class="ri-facebook-fill"></i>
            </a>
            <a href="<?php echo esc_url($share_x_url); ?>" target="_blank" rel="noopener" class="cq-mini-share-btn is-x" title="Twitter / X" aria-label="Bagikan via X">
              <i class="ri-twitter-x-line"></i>
            </a>
            <a href="<?php echo esc_url($share_li_url); ?>" target="_blank" rel="noopener" class="cq-mini-share-btn is-li" title="LinkedIn" aria-label="Bagikan via LinkedIn">
              <i class="ri-linkedin-fill"></i>
            </a>
            <button type="button" class="cq-mini-share-btn is-copy cq-copy-link-btn" title="Salin Tautan" aria-label="Salin Tautan Artikel" data-url="<?php echo esc_url($current_url); ?>">
              <i class="ri-links-line"></i>
            </button>
          </div>
        </div>

        <!-- Featured Image Container -->
        <figure class="cq-single-featured-wrap" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large', [
                'loading'  => 'eager',
                'alt'      => get_the_title(),
                'itemprop' => 'url',
            ]); ?>
          <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="<?php the_title_attribute(); ?>" loading="eager" itemprop="url">
          <?php endif; ?>
          <figcaption class="cq-featured-caption">
            <i class="ri-camera-lens-line" aria-hidden="true"></i> Operasional Mesin Komersial &amp; Standar Outlet Cleanique Laundry (PT Indotech Berkah Abadi)
          </figcaption>
        </figure>
      </div>
    </header>

    <!-- Reading Progress Bar -->
    <div class="cq-reading-progress" id="cq-reading-progress" aria-hidden="true"></div>

    <!-- ========================================================
         MAIN ARTICLE LAYOUT: Prose + Sticky Interactive Sidebar
         ======================================================== -->
    <div class="cq-container cq-article-body-container">
      <div class="cq-single-layout">

        <!-- ========================================================
             SECTION 4: ARTICLE CONTENT
             ======================================================== -->
        <article class="cq-single-main" itemprop="articleBody">

          <?php
          $raw_content = get_the_content();
          $processed = cleanique_process_content_and_toc($raw_content);
          $has_db_content = !empty(trim(strip_tags($raw_content)));
          ?>

          <!-- Table of Contents (TOC) Component -->
          <?php if ($has_db_content && !empty($processed['toc'])) : ?>
            <aside class="cq-toc-card" aria-label="Daftar Isi Artikel">
              <div class="cq-toc-header">
                <div class="cq-toc-title">
                  <i class="ri-list-check-2 cq-toc-icon" aria-hidden="true"></i>
                  <span>Daftar Isi Panduan</span>
                </div>
                <button type="button" class="cq-toc-toggle" id="cq-toc-toggle" aria-expanded="true" aria-controls="cq-toc-list">
                  <span class="cq-toc-toggle-text">Sembunyikan</span>
                  <i class="ri-arrow-up-s-line" aria-hidden="true"></i>
                </button>
              </div>
              <nav id="cq-toc-list" class="cq-toc-nav">
                <ol class="cq-toc-ordered">
                  <?php foreach ($processed['toc'] as $item) : ?>
                    <li class="cq-toc-item cq-toc-lvl-<?php echo esc_attr($item['level']); ?>">
                      <a href="#<?php echo esc_attr($item['id']); ?>" class="cq-toc-link">
                        <?php echo esc_html($item['title']); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ol>
              </nav>
            </aside>
          <?php endif; ?>

          <div class="cq-single-prose">
            <?php if ($has_db_content) : ?>
              <!-- Output actual post content from WordPress Editor -->
              <?php echo apply_filters('the_content', $processed['content']); ?>
            <?php else : ?>

              <!-- ========================================================
                   FALLBACK RICH ARTICLE CONTENT SHOWCASE
                   (Introduction, TOC, H2, H3, Paragraph, Image, Caption,
                    Figure, Quote, List, Ordered List, Table, Code Block,
                    Video/Embed, Callout, CTA, Conclusion)
                   ======================================================== -->

              <!-- 4.1 Introduction -->
              <p class="cq-prose-lead">
                Industri laundry kiloan dan komersial di Indonesia terus menunjukkan pertumbuhan signifikan di atas 14,2% per tahun. Peningkatan mobilitas masyarakat perkotaan, pekerja kantoran, serta mahasiswa mendorong permintaan jasa cuci yang higienis, cepat, dan profesional. Namun, membangun bisnis laundry yang stabil, menguntungkan, dan berkelanjutan memerlukan fondasi teknis yang solid: mulai dari pemilihan mesin komersial tahan uji, formulasi chemical berstandar pabrik, hingga digitalisasi operasional outlet.
              </p>

              <!-- 4.2 Interactive Table of Contents for Demo -->
              <aside class="cq-toc-card" aria-label="Daftar Isi Artikel">
                <div class="cq-toc-header">
                  <div class="cq-toc-title">
                    <i class="ri-list-check-2 cq-toc-icon" aria-hidden="true"></i>
                    <span>Daftar Isi Panduan Ini</span>
                  </div>
                  <button type="button" class="cq-toc-toggle" id="cq-toc-toggle" aria-expanded="true" aria-controls="cq-toc-list">
                    <span class="cq-toc-toggle-text">Sembunyikan</span>
                    <i class="ri-arrow-up-s-line" aria-hidden="true"></i>
                  </button>
                </div>
                <nav id="cq-toc-list" class="cq-toc-nav">
                  <ol class="cq-toc-ordered">
                    <li class="cq-toc-item cq-toc-lvl-2">
                      <a href="#analisis-beban-mesin" class="cq-toc-link">1. Analisis Beban Kerja dan Pemilihan Mesin Heavy-Duty</a>
                      <ol class="cq-toc-sublist">
                        <li class="cq-toc-item cq-toc-lvl-3">
                          <a href="#mesin-komersial-vs-domestik" class="cq-toc-link">1.1 Perbedaan Mesin Komersial vs Mesin Domestik Rumah Tangga</a>
                        </li>
                        <li class="cq-toc-item cq-toc-lvl-3">
                          <a href="#keunggulan-mesin-stack" class="cq-toc-link">1.2 Keunggulan Konstruksi Stack Washer-Dryer Indotech</a>
                        </li>
                      </ol>
                    </li>
                    <li class="cq-toc-item cq-toc-lvl-2">
                      <a href="#efisiensi-bahan-kimia" class="cq-toc-link">2. Efisiensi Bahan Kimia dan HPP Cuci Per Kilogram</a>
                    </li>
                    <li class="cq-toc-item cq-toc-lvl-2">
                      <a href="#matriks-perbandingan-mesin" class="cq-toc-link">3. Tabel Perbandingan Teknis &amp; Spesifikasi Mesin</a>
                    </li>
                    <li class="cq-toc-item cq-toc-lvl-2">
                      <a href="#standar-operasional-prosedur" class="cq-toc-link">4. Standar Operasional Prosedur (SOP) 5 Langkah Cuci Higienis</a>
                    </li>
                    <li class="cq-toc-item cq-toc-lvl-2">
                      <a href="#digitalisasi-kasir-pos" class="cq-toc-link">5. Amankan Omzet dengan Aplikasi Kasir POS &amp; Nota WhatsApp</a>
                    </li>
                    <li class="cq-toc-item cq-toc-lvl-2">
                      <a href="#kesimpulan-rekomendasi" class="cq-toc-link">6. Ringkasan Eksekutif &amp; Kesimpulan Praktis</a>
                    </li>
                  </ol>
                </nav>
              </aside>

              <!-- 4.3 H2 & Paragraph -->
              <h2 id="analisis-beban-mesin">1. Analisis Beban Kerja dan Pemilihan Mesin Heavy-Duty</h2>
              <p>
                Salah satu kekeliruan paling fatal yang sering dilakukan pengusaha pemula adalah menggunakan mesin cuci domestik (rumah tangga) untuk outlet laundry komersial. Mesin rumah tangga dirancang hanya untuk 1 hingga 2 siklus pencucian per hari dengan komponen bearing plastik, sedangkan operasional outlet laundry profesional rata-rata membutuhkan 8 hingga 14 siklus cuci setiap harinya tanpa henti.
              </p>

              <!-- 4.4 H3 Subsection -->
              <h3 id="mesin-komersial-vs-domestik">1.1 Perbedaan Mesin Komersial vs Mesin Domestik Rumah Tangga</h3>
              <p>
                Mesin komersial heavy-duty dibuat dengan drum baja tahan karat (stainless steel AISI 304), motor induksi berdaya tahan tinggi, serta sistem suspensi industri yang meminimalisir getaran. Penggunaan mesin komersial mempersingkat waktu cuci dari 60 menit menjadi hanya 35–40 menit per siklus, meningkatkan kapasitas omzet harian outlet hingga 250%.
              </p>

              <!-- Callout: Tip Box -->
              <div class="cq-callout-card is-tip">
                <i class="ri-lightbulb-flash-line cq-callout-icon" aria-hidden="true"></i>
                <div class="cq-callout-body">
                  <strong>Tips Teknis dari PT Indotech:</strong>
                  Pastikan tekanan suplai air outlet stabil pada minimal 1,5–2,0 bar menggunakan booster pump otomatis. Air dengan tekanan ideal mempercepat pengisian tabung dan memastikan deterjen cair terdistribusi sempurna ke serat kain tanpa meninggalkan residu.
                </div>
              </div>

              <h3 id="keunggulan-mesin-stack">1.2 Keunggulan Konstruksi Stack Washer-Dryer Indotech</h3>
              <p>
                Untuk outlet dengan keterbatasan luas lantai (misalnya ruko 3x6 meter), konfigurasi <em>Stack Washer-Dryer</em> (mesin pengering bertumpuk di atas mesin cuci) adalah solusi terbaik. Konfigurasi ini menghemat 50% ruang lantai, memungkinkan Anda menempatkan 4–6 unit mesin dalam ruangan yang sama tanpa mengorbankan alur sirkulasi kerja staf.
              </p>

              <!-- Figure: Image + Image Caption -->
              <figure class="cq-prose-figure">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="Penataan Mesin Stack Washer Dryer di Outlet Cleanique Laundry" loading="lazy">
                <figcaption class="cq-figure-caption">
                  <i class="ri-information-line" aria-hidden="true"></i> Gambar 1: Penataan instalasi mesin stack komersial heavy-duty Cleanique Laundry dengan sistem plumbing air bersih dan pembuangan uap dryer terintegrasi.
                </figcaption>
              </figure>

              <!-- Quote: Pullquote with Citation -->
              <blockquote class="cq-prose-quote">
                <p>
                  "Kualitas deterjen dan akurasi dosis kimia menentukan 70% kepuasan repeat order pelanggan laundry. Jika pakaian bersih cemerlang, serat kain lembut, dan wanginya bertahan hingga 30 hari di lemari, pelanggan tidak akan pernah berpindah ke kompetitor."
                </p>
                <cite class="cq-quote-cite">
                  <span class="cq-cite-author">— Ir. Hendra Gunawan, S.T.</span>
                  <span class="cq-cite-title">Kepala Riset Formulasi Kimia Industri, PT Indotech Berkah Abadi</span>
                </cite>
              </blockquote>

              <!-- 4.5 H2 & Chemical Section -->
              <h2 id="efisiensi-bahan-kimia">2. Efisiensi Bahan Kimia dan HPP Cuci Per Kilogram</h2>
              <p>
                Beban biaya chemical (deterjen cair konsentrat, softener, oxy-bleach, pelicin setrika, dan parfum laundry) menyumbang sekitar 15% hingga 25% dari total Harga Pokok Penjualan (HPP) per kilogram cucian. Jika pemilik laundry membeli bahan kimia eceran dari toko perantara, margin laba bersih akan tergerus drastis.
              </p>
              <p>
                Dengan bermitra dalam ekosistem <strong>PT Indotech Berkah Abadi</strong> (produsen resmi bahan kimia industri <em>Orchid Brand</em> di Sleman, D.I. Yogyakarta), mitra Cleanique mendapatkan pasokan kimia langsung dari pabrik (factory-direct pricing). Hal ini menghemat biaya operasional hingga 35% sekaligus menjamin formula ramah lingkungan dan aman bagi serat kain sensitif.
              </p>

              <!-- List: Unordered List with Custom Icon -->
              <div class="cq-prose-checklist-box">
                <h4 class="cq-checklist-heading"><i class="ri-shield-check-line"></i> Standar Formula Kimia Ramah Serat Indotech:</h4>
                <ul class="cq-prose-checklist">
                  <li><strong>pH Seimbang (Neutral 7.0–7.5):</strong> Tidak merusak serat katun, sutra, maupun pakaian berbahan sintetis.</li>
                  <li><strong>Active Bio-Enzymes:</strong> Mengurai noda darah, minyak, kopi, dan saus membandel tanpa perlu menyikat kasar.</li>
                  <li><strong>Microcapsule Fragrance Technology:</strong> Butiran parfum pecah perlahan saat pakaian bergesekan, wangi segar bertahan hingga 30 hari.</li>
                  <li><strong>Anti-Bacterial Agent:</strong> Menghilangkan kuman serta bau apek meskipun dijemur di ruang tertutup pada musim hujan.</li>
                </ul>
              </div>

              <!-- 4.6 Table: Comparison Specs Table -->
              <h2 id="matriks-perbandingan-mesin">3. Tabel Perbandingan Teknis &amp; Spesifikasi Mesin</h2>
              <p>
                Berikut adalah perbandingan performa teknis antara mesin rumah tangga konvensional dengan mesin komersial heavy-duty standar Cleanique Laundry:
              </p>

              <div class="cq-table-responsive">
                <table class="cq-prose-table">
                  <thead>
                    <tr>
                      <th scope="col">Parameter Teknis</th>
                      <th scope="col">Mesin Domestik (Rumah Tangga)</th>
                      <th scope="col" class="is-highlight">Mesin Komersial Stack Cleanique</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>Kapasitas Harian</strong></td>
                      <td>Maksimal 2–3 siklus / hari (15 kg)</td>
                      <td class="is-highlight"><strong>10–14 siklus / hari (100–140 kg)</strong></td>
                    </tr>
                    <tr>
                      <td><strong>Durasi Cuci per Siklus</strong></td>
                      <td>55 – 70 Menit</td>
                      <td class="is-highlight"><span class="cq-table-pill is-green">35 – 40 Menit (Hemat 40%)</span></td>
                    </tr>
                    <tr>
                      <td><strong>Material Drum &amp; Bearing</strong></td>
                      <td>Plastik / Mild Steel</td>
                      <td class="is-highlight">Heavy-Duty Stainless Steel AISI 304</td>
                    </tr>
                    <tr>
                      <td><strong>Konsumsi Air Bilas</strong></td>
                      <td>65 – 80 Liter / Siklus</td>
                      <td class="is-highlight">38 – 45 Liter / Siklus (Eco-System)</td>
                    </tr>
                    <tr>
                      <td><strong>Garansi &amp; Layanan Servis</strong></td>
                      <td>Garansi personal (tidak berlaku komersial)</td>
                      <td class="is-highlight"><strong>Garansi Resmi Pabrik + Ketersediaan Sparepart 100%</strong></td>
                    </tr>
                    <tr>
                      <td><strong>Estimasi Usia Pakai (Lifespan)</strong></td>
                      <td>6 – 12 Bulan (di lingkungan komersial)</td>
                      <td class="is-highlight"><strong>5 – 8 Tahun Pemakaian Intensif</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- 4.7 Code Block: Formula / Webhook Snippet -->
              <div class="cq-code-block-wrap">
                <div class="cq-code-header">
                  <span class="cq-code-lang"><i class="ri-code-s-slash-line"></i> Rumus Simulasi HPP Chemical Laundry</span>
                  <button type="button" class="cq-code-copy-btn" onclick="navigator.clipboard.writeText('HPP_Chemical = (Deterjen_ml * Harga_ml) + (Softener_ml * Harga_ml) + (Parfum_ml * Harga_ml) + Plastik_Packing;\n// Standar Indotech: HPP Chemical Kiloan = Rp 450 - Rp 650 / kg cucian'); alert('Kode rumus HPP berhasil disalin!');">
                    <i class="ri-file-copy-line"></i> Salin Rumus
                  </button>
                </div>
                <pre class="cq-code-pre"><code>// Formula Standar Perhitungan HPP Bahan Kimia per Kilogram Cucian (Cleanique Standard)
HPP_Chemical = (Deterjen_ml * Harga_ml) + (Softener_ml * Harga_ml) + (Parfum_ml * Harga_ml) + Biaya_Plastik;

// Benchmark Pabrik PT Indotech Berkah Abadi:
// Pasokan Pabrik Indotech: HPP = Rp 450 - Rp 650 / kg
// Pasokan Toko Eceran Luar: HPP = Rp 1.100 - Rp 1.500 / kg (Selisih Pemborosan Rp 700 / kg!)</code></pre>
              </div>

              <!-- 4.8 Ordered List: 5 Steps SOP -->
              <h2 id="standar-operasional-prosedur">4. Standar Operasional Prosedur (SOP) 5 Langkah Cuci Higienis</h2>
              <p>
                Untuk menghasilkan cucian bermutu tinggi dan bebas dari komplain pakaian tertukar atau luntur, tim operasional wajib menerapkan alur SOP 5 langkah berikut:
              </p>

              <ol class="cq-prose-ordered-steps">
                <li>
                  <div class="cq-step-number">01</div>
                  <div class="cq-step-content">
                    <strong>Pemeriksaan &amp; Sortir (Tagging &amp; Sorting):</strong>
                    Periksa saku pakaian dari benda tajam atau logam, periksa label kain sensitif, dan pisahkan pakaian putih dari pakaian berwarna pekat yang berpotensi luntur.
                  </div>
                </li>
                <li>
                  <div class="cq-step-number">02</div>
                  <div class="cq-step-content">
                    <strong>Pre-Treatment / Spotting Noda Khusus:</strong>
                    Oleskan cairan <em>Spotting Agent</em> Indotech pada area kerah, ketiak, atau bercak noda membandel 5 menit sebelum dimasukkan ke dalam tabung pencuci.
                  </div>
                </li>
                <li>
                  <div class="cq-step-number">03</div>
                  <div class="cq-step-content">
                    <strong>Pencucian Utama dengan Dosis Terukur:</strong>
                    Masukkan deterjen cair konsentrat sesuai tabel takaran per kilogram. Hindari takaran berlebih yang dapat menyebabkan busa meluap dan merusak sensor motor.
                  </div>
                </li>
                <li>
                  <div class="cq-step-number">04</div>
                  <div class="cq-step-content">
                    <strong>Pengeringan Cepat Mesin Dryer (Zero Dampness):</strong>
                    Keringkan menggunakan mesin pengering gas komersial dengan suhu 65°C–70°C selama 35 menit hingga pakaian benar-benar kering tanpa perlu dijemur sinar matahari.
                  </div>
                </li>
                <li>
                  <div class="cq-step-number">05</div>
                  <div class="cq-step-content">
                    <strong>Finishing Parfum Microcapsule &amp; Packaging Kedap Udara:</strong>
                    Semprotkan parfum laundry secara merata dari jarak 25 cm, lipat rapi, dan kemas dalam plastik tebal tersegel untuk mempertahankan aroma harum higienis.
                  </div>
                </li>
              </ol>

              <!-- Responsive Video / Media Embed Container -->
              <div class="cq-video-embed-card">
                <div class="cq-video-embed-header">
                  <i class="ri-video-line"></i>
                  <span>Simulasi Video: Alur Kerja Mesin Stack &amp; SOP Kasir Cleanique</span>
                </div>
                <div class="cq-responsive-video-wrap">
                  <!-- Video placeholder or clean embed container -->
                  <div class="cq-video-placeholder" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
                    <div class="cq-video-play-btn" onclick="alert('Video simulasi operasional outlet dapat disaksikan langsung saat kunjungan showroom PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta.');">
                      <i class="ri-play-fill"></i>
                    </div>
                    <span class="cq-video-play-label">Tonton Video Tur Operasional Outlet &amp; SOP Karyawan (4:20)</span>
                  </div>
                </div>
              </div>

              <!-- Callout: Warning Box -->
              <div class="cq-callout-card is-warning">
                <i class="ri-error-warning-line cq-callout-icon" aria-hidden="true"></i>
                <div class="cq-callout-body">
                  <strong>Peringatan Pencegahan Noda Luntur:</strong>
                  Jangan pernah mencampur pakaian berbahan jeans gelap atau kain batik baru dengan pakaian berbahan katun putih pada temperatur air di atas 40°C tanpa uji kelunturan awal. Komplain pelanggan akibat pakaian luntur dapat menurunkan reputasi Google Review outlet Anda.
                </div>
              </div>

              <!-- 4.9 H2 & POS Digitalization -->
              <h2 id="digitalisasi-kasir-pos">5. Amankan Omzet dengan Aplikasi Kasir POS &amp; Nota WhatsApp</h2>
              <p>
                Sistem pencatatan manual menggunakan nota kertas bertingkat dua adalah titik lemah paling rawan dalam bisnis laundry kiloan. Nota kertas rentan robek, basah, hilang, dan membuka celah manipulasi kasir nakal (seperti transaksi tidak dicatat, diskon fiktif, atau nota titipan pribadi).
              </p>
              <p>
                Dengan mengadopsi <strong>Aplikasi Kasir POS Cleanique</strong>, setiap kali pelanggan memasukkan pakaian, sistem secara otomatis mengirimkan nota digital langsung ke WhatsApp pelanggan dalam waktu 1 detik lengkap dengan tautan live tracking status cucian (<em>Diterima &rarr; Dicuci &rarr; Dikeringkan &rarr; Disetrika &rarr; Siap Diambil</em>). Pemilik bisnis dapat memantau grafik omzet, sisa kas, dan kinerja karyawan secara real-time dari smartphone kapan saja.
              </p>

              <!-- In-Content High-Converting Payno CTA -->
              <div class="cq-in-content-cta">
                <div class="cq-in-content-cta-body">
                  <span class="cq-in-content-cta-tag">
                    <i class="ri-shield-flash-line" aria-hidden="true"></i> Ekosistem Resmi Indotech
                  </span>
                  <h3 class="cq-in-content-cta-title">
                    Siap Membangun Bisnis Laundry Menguntungkan Tanpa Frustrasi?
                  </h3>
                  <p class="cq-in-content-cta-desc">
                    Mulai dari paket usaha turnkey lengkap mesin komersial, pasokan bahan kimia harga pabrik, hingga aplikasi kasir digital anti curang — semua didukung langsung oleh <strong>PT Indotech Berkah Abadi</strong>.
                  </p>
                  <div class="cq-in-content-cta-actions">
                    <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill" target="_blank" rel="noopener">
                      <i class="ri-whatsapp-line" aria-hidden="true"></i> Konsultasi Tim Ahli via WhatsApp
                    </a>
                    <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill">
                      <i class="ri-store-2-line" aria-hidden="true"></i> Brosur Paket Usaha
                    </a>
                    <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill">
                      <i class="ri-smartphone-line" aria-hidden="true"></i> Free Trial POS (7 Hari)
                    </a>
                  </div>
                </div>
              </div>

              <!-- 4.10 Conclusion Box (Executive Summary) -->
              <div class="cq-conclusion-card" id="kesimpulan-rekomendasi">
                <div class="cq-conclusion-header">
                  <i class="ri-checkbox-circle-fill cq-conclusion-icon" aria-hidden="true"></i>
                  <h3 class="cq-conclusion-title">Ringkasan Eksekutif &amp; Kesimpulan</h3>
                </div>
                <div class="cq-conclusion-body">
                  <p>
                    Keberhasilan jangka panjang bisnis laundry ditentukan oleh 3 pilar utama: <strong>keandalan mesin komersial</strong> yang mampu beroperasi tanpa kendala teknis berulang, <strong>efisiensi HPP kimia</strong> langsung dari pabrik terpercaya, dan <strong>transparansi pembukuan kasir digital</strong>. Investasi cerdas pada ketiga pilar ini akan mempercepat Break Even Point (BEP) menjadi hanya 6–9 bulan dan menjamin loyalitas repeat order pelanggan seumur hidup.
                  </p>
                </div>
              </div>

            <?php endif; ?>
          </div>

          <!-- ========================================================
               SECTION 5: ARTICLE INFORMATION (Author Box, Freshness, Tags)
               ======================================================== -->
          <div class="cq-article-info-section">
            <!-- Detailed Author Card -->
            <div class="cq-single-author-card">
              <div class="cq-author-avatar-wrap" aria-hidden="true">
                <i class="ri-building-line"></i>
              </div>
              <div class="cq-author-info-body">
                <div class="cq-author-header-line">
                  <h4 class="cq-author-heading-name">Tim Riset &amp; Edukasi PT Indotech Berkah Abadi</h4>
                  <span class="cq-badge-pill cq-badge-verified">
                    <i class="ri-verified-badge-fill" aria-hidden="true"></i> Verified Industry Expert
                  </span>
                </div>
                <p class="cq-author-bio">
                  Divisi riset formulasi kimia industri, kurasi mesin komersial, dan arsitektur sistem POS kasir Cleanique Laundry. Berpengalaman lebih dari 10 tahun membina dan mendampingi ratusan outlet kemitraan laundry di Sleman, D.I. Yogyakarta, dan kota-kota besar Indonesia.
                </p>
                <div class="cq-author-contact-actions">
                  <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-author-link">
                    <i class="ri-whatsapp-line"></i> Hubungi Konsultan
                  </a>
                  <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>" class="cq-author-link">
                    <i class="ri-external-link-line"></i> Profil PT Indotech
                  </a>
                </div>
              </div>
            </div>

            <!-- Metadata Freshness Grid -->
            <div class="cq-meta-freshness-grid">
              <div class="cq-freshness-item">
                <span class="cq-freshness-label"><i class="ri-calendar-check-line"></i> Tanggal Publikasi</span>
                <span class="cq-freshness-val"><?php echo esc_html($published_date); ?></span>
              </div>
              <div class="cq-freshness-item">
                <span class="cq-freshness-label"><i class="ri-refresh-line"></i> Terakhir Diperbarui</span>
                <span class="cq-freshness-val"><?php echo esc_html($modified_date); ?></span>
              </div>
              <div class="cq-freshness-item">
                <span class="cq-freshness-label"><i class="ri-time-line"></i> Waktu Baca</span>
                <span class="cq-freshness-val"><?php echo esc_html($reading_time); ?></span>
              </div>
              <div class="cq-freshness-item">
                <span class="cq-freshness-label"><i class="ri-shield-check-line"></i> Standar Konten</span>
                <span class="cq-freshness-val">Verified Indotech QA</span>
              </div>
            </div>

            <!-- Categories & Tags Cloud -->
            <div class="cq-article-taxonomies">
              <div class="cq-taxonomy-row">
                <span class="cq-tax-label"><i class="ri-folder-2-line"></i> Kategori:</span>
                <div class="cq-tax-pills">
                  <?php if (!empty($post_categories)) : ?>
                    <?php foreach ($post_categories as $c) : ?>
                      <a href="<?php echo esc_url(get_category_link($c->term_id)); ?>" class="cq-tax-badge is-cat">
                        <?php echo esc_html($c->name); ?>
                      </a>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/artikel/')); ?>" class="cq-tax-badge is-cat">Edukasi Bisnis</a>
                  <?php endif; ?>
                </div>
              </div>

              <?php if (!empty($post_tags)) : ?>
                <div class="cq-taxonomy-row">
                  <span class="cq-tax-label"><i class="ri-price-tag-3-line"></i> Topik / Tags:</span>
                  <div class="cq-tax-pills">
                    <?php foreach ($post_tags as $tag) : ?>
                      <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="cq-tax-badge is-tag">
                        #<?php echo esc_html($tag->name); ?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php else : ?>
                <div class="cq-taxonomy-row">
                  <span class="cq-tax-label"><i class="ri-price-tag-3-line"></i> Topik Terkait:</span>
                  <div class="cq-tax-pills">
                    <a href="<?php echo esc_url(home_url('/?s=mesin+laundry')); ?>" class="cq-tax-badge is-tag">#MesinLaundryKomersial</a>
                    <a href="<?php echo esc_url(home_url('/?s=chemical+pabrik')); ?>" class="cq-tax-badge is-tag">#ChemicalIndotech</a>
                    <a href="<?php echo esc_url(home_url('/?s=sop+laundry')); ?>" class="cq-tax-badge is-tag">#SOPKaryawan</a>
                    <a href="<?php echo esc_url(home_url('/?s=aplikasi+kasir')); ?>" class="cq-tax-badge is-tag">#KasirPOSDigital</a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- ========================================================
               SECTION 6: SOURCES / REFERENCES
               ======================================================== -->
          <section class="cq-references-card" aria-label="Referensi dan Sumber Riset">
            <div class="cq-references-header">
              <div class="cq-ref-title-wrap">
                <i class="ri-book-read-line cq-ref-icon" aria-hidden="true"></i>
                <h3 class="cq-ref-title">Sumber Riset &amp; Referensi Standar Industri</h3>
              </div>
              <button type="button" class="cq-ref-toggle-btn" id="cq-ref-toggle-btn" aria-expanded="true" aria-controls="cq-ref-content">
                <span class="cq-ref-toggle-text">Tutup Referensi</span>
                <i class="ri-arrow-up-s-line" aria-hidden="true"></i>
              </button>
            </div>
            <div class="cq-references-body" id="cq-ref-content">
              <p class="cq-ref-note">
                Artikel dan materi edukasi ini disusun berdasarkan regulasi standar nasional, kajian laboratorium kimia detergen, serta uji lapangan mesin komersial:
              </p>
              <ul class="cq-references-list">
                <li class="cq-ref-item">
                  <span class="cq-ref-num">[1]</span>
                  <div class="cq-ref-text">
                    <strong>Badan Standardisasi Nasional (BSN):</strong>
                    <em>SNI 06-4075-1996 - Standar Mutu Deterjen Cuci Sintetis Cair dan Bubuk untuk Penggunaan Komersial &amp; Rumah Tangga</em>.
                    <a href="https://bsn.go.id" target="_blank" rel="noopener noreferrer nofollow" class="cq-ref-link">
                      Katalog SNI BSN <i class="ri-external-link-line"></i>
                    </a>
                  </div>
                </li>
                <li class="cq-ref-item">
                  <span class="cq-ref-num">[2]</span>
                  <div class="cq-ref-text">
                    <strong>Kementerian Kesehatan Republik Indonesia:</strong>
                    <em>Peraturan Menteri Kesehatan No. 7 Tahun 2019 tentang Standar Baku Mutu Kesehatan Lingkungan dan Pengendalian Higienitas Linen Rumah Sakit &amp; Komersial</em>.
                    <a href="https://kemkes.go.id" target="_blank" rel="noopener noreferrer nofollow" class="cq-ref-link">
                      Portal Regulasi Kemkes <i class="ri-external-link-line"></i>
                    </a>
                  </div>
                </li>
                <li class="cq-ref-item">
                  <span class="cq-ref-num">[3]</span>
                  <div class="cq-ref-text">
                    <strong>PT Indotech Berkah Abadi R&amp;D Lab (2025):</strong>
                    <em>Whitepaper Analisis Komparasi Daya Cuci Surfaktan Biodegradable dan Retensi Aroma Microcapsule 30 Hari pada Serat Kain Katun</em>. Sleman, D.I. Yogyakarta.
                  </div>
                </li>
                <li class="cq-ref-item">
                  <span class="cq-ref-num">[4]</span>
                  <div class="cq-ref-text">
                    <strong>Drycleaning &amp; Laundry Institute International (DLI):</strong>
                    <em>Commercial Laundry Energy Efficiency &amp; Water Recovery Guidelines</em>.
                    <a href="https://dlionline.org" target="_blank" rel="noopener noreferrer nofollow" class="cq-ref-link">
                      DLI Guidelines <i class="ri-external-link-line"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </section>

          <!-- ========================================================
               SECTION 7: ARTICLE ACTIONS (Share, Copy, Print, Bookmark, Helpfulness)
               ======================================================== -->
          <div class="cq-article-actions-panel">
            <div class="cq-actions-toolbar">
              <span class="cq-actions-toolbar-label">
                <i class="ri-share-forward-fill" aria-hidden="true"></i> Bagikan Artikel:
              </span>
              <div class="cq-actions-social-btns">
                <a href="<?php echo esc_url($share_wa_url); ?>" target="_blank" rel="noopener" class="cq-action-btn is-wa" title="Bagikan via WhatsApp" aria-label="Bagikan via WhatsApp">
                  <i class="ri-whatsapp-line"></i> <span>WhatsApp</span>
                </a>
                <a href="<?php echo esc_url($share_fb_url); ?>" target="_blank" rel="noopener" class="cq-action-btn is-fb" title="Bagikan via Facebook" aria-label="Bagikan via Facebook">
                  <i class="ri-facebook-fill"></i> <span>Facebook</span>
                </a>
                <a href="<?php echo esc_url($share_x_url); ?>" target="_blank" rel="noopener" class="cq-action-btn is-x" title="Bagikan via X" aria-label="Bagikan via X">
                  <i class="ri-twitter-x-line"></i> <span>X</span>
                </a>
                <a href="<?php echo esc_url($share_tg_url); ?>" target="_blank" rel="noopener" class="cq-action-btn is-tg" title="Bagikan via Telegram" aria-label="Bagikan via Telegram">
                  <i class="ri-telegram-line"></i> <span>Telegram</span>
                </a>
              </div>

              <div class="cq-actions-utility-btns">
                <button type="button" class="cq-utility-btn cq-copy-link-btn" data-url="<?php echo esc_url($current_url); ?>" title="Salin Tautan" aria-label="Salin Tautan">
                  <i class="ri-links-line"></i> <span>Salin Tautan</span>
                </button>
                <button type="button" class="cq-utility-btn" onclick="window.print();" title="Cetak Artikel" aria-label="Cetak Panduan">
                  <i class="ri-printer-line"></i> <span>Cetak</span>
                </button>
                <button type="button" class="cq-utility-btn cq-bookmark-btn" id="cq-bookmark-btn" data-post-id="<?php echo esc_attr($current_id); ?>" title="Simpan Artikel" aria-label="Simpan Artikel">
                  <i class="ri-bookmark-line"></i> <span class="cq-bookmark-text">Simpan</span>
                </button>
                <a href="mailto:support@indotech.id?subject=Masukan%20Artikel%20Cleanique%20<?php echo rawurlencode($current_title); ?>" class="cq-utility-btn" title="Laporkan / Beri Masukan">
                  <i class="ri-flag-line"></i> <span>Lapor / Masukan</span>
                </a>
              </div>
            </div>

            <!-- Helpfulness Rating Micro-Widget -->
            <div class="cq-helpfulness-widget" id="cq-helpfulness-box">
              <span class="cq-helpfulness-question">
                <i class="ri-thumb-up-line" style="color: var(--mint-cta);"></i> Apakah panduan ini membantu Anda?
              </span>
              <div class="cq-helpfulness-buttons" id="cq-helpfulness-btns">
                <button type="button" class="cq-helpfulness-btn is-yes" onclick="cleaniqueVoteHelpful(true)">
                  <i class="ri-thumb-up-fill"></i> Ya, Sangat Membantu
                </button>
                <button type="button" class="cq-helpfulness-btn is-no" onclick="cleaniqueVoteHelpful(false)">
                  <i class="ri-thumb-down-line"></i> Belum Membantu
                </button>
              </div>
              <div class="cq-helpfulness-thankyou" id="cq-helpfulness-thanks" style="display: none;">
                <i class="ri-checkbox-circle-fill" style="color: #059669;"></i> Terima kasih atas tanggapan Anda! Masukan Anda membantu tim riset kami terus meningkatkan kualitas panduan.
              </div>
            </div>
          </div>

          <!-- ========================================================
               SECTION 8: ARTICLE NAVIGATION (Prev / Next)
               ======================================================== -->
          <?php
          $prev_post = get_previous_post();
          $next_post = get_next_post();
          ?>
          <nav class="cq-article-nav" aria-label="Navigasi Artikel Sebelumnya dan Selanjutnya">
            <div class="cq-post-nav-grid">
              <?php if (!empty($prev_post)) : ?>
                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="cq-post-nav-item is-prev">
                  <div class="cq-post-nav-header">
                    <i class="ri-arrow-left-line" aria-hidden="true"></i>
                    <span>Artikel Sebelumnya</span>
                  </div>
                  <div class="cq-post-nav-content">
                    <?php if (has_post_thumbnail($prev_post->ID)) : ?>
                      <?php echo get_the_post_thumbnail($prev_post->ID, [56, 56], ['class' => 'cq-post-nav-thumb', 'alt' => get_the_title($prev_post->ID)]); ?>
                    <?php endif; ?>
                    <span class="cq-post-nav-title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
                  </div>
                </a>
              <?php else : ?>
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-post-nav-item is-prev">
                  <div class="cq-post-nav-header">
                    <i class="ri-arrow-left-line" aria-hidden="true"></i>
                    <span>Peluang Usaha</span>
                  </div>
                  <div class="cq-post-nav-content">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" class="cq-post-nav-thumb" alt="Paket Usaha Siap Buka" loading="lazy">
                    <span class="cq-post-nav-title">Pelajari Paket Usaha Kemitraan Laundry Siap Buka 100% Hak Milik</span>
                  </div>
                </a>
              <?php endif; ?>

              <?php if (!empty($next_post)) : ?>
                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="cq-post-nav-item is-next">
                  <div class="cq-post-nav-header">
                    <span>Artikel Selanjutnya</span>
                    <i class="ri-arrow-right-line" aria-hidden="true"></i>
                  </div>
                  <div class="cq-post-nav-content">
                    <span class="cq-post-nav-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                    <?php if (has_post_thumbnail($next_post->ID)) : ?>
                      <?php echo get_the_post_thumbnail($next_post->ID, [56, 56], ['class' => 'cq-post-nav-thumb', 'alt' => get_the_title($next_post->ID)]); ?>
                    <?php endif; ?>
                  </div>
                </a>
              <?php else : ?>
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-post-nav-item is-next">
                  <div class="cq-post-nav-header">
                    <span>Digitalisasi POS</span>
                    <i class="ri-arrow-right-line" aria-hidden="true"></i>
                  </div>
                  <div class="cq-post-nav-content">
                    <span class="cq-post-nav-title">Coba Gratis 7 Hari Aplikasi Kasir &amp; Nota WhatsApp Otomatis</span>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" class="cq-post-nav-thumb" alt="Aplikasi POS Laundry" loading="lazy">
                  </div>
                </a>
              <?php endif; ?>
            </div>
          </nav>

          <!-- ========================================================
               SECTION 10: COMMENTS
               ======================================================== -->
          <section class="cq-comments-section" id="article-comments">
            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
          </section>

        </article>

        <!-- ========================================================
             STICKY SIDEBAR (Interactive Table of Contents, Promo Cards, Recent Posts)
             ======================================================== -->
        <aside class="cq-single-sidebar" aria-label="Sidebar Informasi Tambahan">

          <!-- Sidebar TOC Widget for Desktop (Scrollspy synchronized) -->
          <div class="cq-sidebar-card is-sidebar-toc">
            <h3 class="cq-sidebar-title">
              <i class="ri-compass-3-line" style="color: var(--mint-cta);" aria-hidden="true"></i>
              Navigasi Halaman
            </h3>
            <div class="cq-sidebar-toc-container" id="cq-sidebar-toc-nav">
              <ul class="cq-sidebar-toc-list">
                <li><a href="#analisis-beban-mesin" class="cq-stoc-link">1. Analisis Beban Mesin</a></li>
                <li><a href="#efisiensi-bahan-kimia" class="cq-stoc-link">2. Efisiensi Bahan Kimia</a></li>
                <li><a href="#matriks-perbandingan-mesin" class="cq-stoc-link">3. Tabel Perbandingan Mesin</a></li>
                <li><a href="#standar-operasional-prosedur" class="cq-stoc-link">4. SOP 5 Langkah Cuci</a></li>
                <li><a href="#digitalisasi-kasir-pos" class="cq-stoc-link">5. Kasir Digital POS</a></li>
                <li><a href="#kesimpulan-rekomendasi" class="cq-stoc-link">6. Ringkasan Eksekutif</a></li>
                <li><a href="#article-comments" class="cq-stoc-link">7. Diskusi &amp; Komentar</a></li>
              </ul>
            </div>
          </div>

          <!-- Promo Widget 1: Free Trial POS Promo Card -->
          <div class="cq-sidebar-card is-promo-pos">
            <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12); font-size: 11px;">
              <i class="ri-flashlight-line" aria-hidden="true"></i> Free Trial 7 Hari
            </span>
            <h3 class="cq-sidebar-title">
              <i class="ri-smartphone-line" style="color: var(--mint-cta);" aria-hidden="true"></i>
              Aplikasi Kasir POS Cleanique
            </h3>
            <p class="cq-sidebar-desc">
              Tinggalkan nota kertas manual! Kirim nota digital otomatis ke WhatsApp pelanggan dalam 1 detik dan pantau omzet dari mana saja.
            </p>
            <ul class="cq-sidebar-bullets">
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Nota WhatsApp otomatis 1 detik</li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Live tracking status pakaian pelanggan</li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Proteksi audit kasir &amp; anti curang</li>
              <li><i class="ri-checkbox-circle-fill" aria-hidden="true"></i> Asisten AI konsultasi laundry 24/7</li>
            </ul>
            <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-btn cq-btn-accent cq-btn-pill cq-btn-block">
              Coba Gratis 7 Hari <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
          </div>

          <!-- Promo Widget 2: Paket Usaha Turnkey -->
          <div class="cq-sidebar-card is-promo-paket">
            <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12); font-size: 11px; background: rgba(0, 119, 182, 0.12); color: var(--brand-deep); border-color: rgba(0, 119, 182, 0.25);">
              <i class="ri-store-2-line" aria-hidden="true"></i> 100% Hak Milik
            </span>
            <h3 class="cq-sidebar-title">
              <i class="ri-store-2-fill" style="color: var(--brand-deep);" aria-hidden="true"></i>
              Paket Usaha Laundry Siap Buka
            </h3>
            <p class="cq-sidebar-desc">
              Kemitraan laundry turnkey lengkap tanpa biaya royalti. Mesin komersial bergaransi resmi, pasokan kimia awal, dan SOP grand opening.
            </p>
            <ul class="cq-sidebar-bullets">
              <li><i class="ri-checkbox-circle-fill" style="color: var(--brand-deep);" aria-hidden="true"></i> Set Mesin Stack Heavy-Duty</li>
              <li><i class="ri-checkbox-circle-fill" style="color: var(--brand-deep);" aria-hidden="true"></i> Pasokan Kimia Pabrik Sendiri</li>
              <li><i class="ri-checkbox-circle-fill" style="color: var(--brand-deep);" aria-hidden="true"></i> Termasuk Lisensi Kasir POS</li>
              <li><i class="ri-checkbox-circle-fill" style="color: var(--brand-deep);" aria-hidden="true"></i> Pelatihan Karyawan Onsite</li>
            </ul>
            <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block">
              Detail Paket Usaha <i class="ri-arrow-right-line" aria-hidden="true"></i>
            </a>
          </div>

          <!-- Promo Widget 3: Fast WhatsApp Consultation -->
          <div class="cq-sidebar-card">
            <h3 class="cq-sidebar-title">
              <i class="ri-customer-service-2-line" style="color: var(--mint-cta);" aria-hidden="true"></i>
              Konsultasi Langsung Tim Ahli
            </h3>
            <p class="cq-sidebar-desc">
              Ingin mendiskusikan kelayakan lokasi outlet, racikan kimia noda membandel, atau simulasi modal paket usaha? Tim konsultan kami siap berdiskusi.
            </p>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block">
              <i class="ri-whatsapp-line" aria-hidden="true"></i> Chat WhatsApp Tim Ahli
            </a>
          </div>

          <!-- Promo Widget 4: Recent Posts -->
          <div class="cq-sidebar-card">
            <h3 class="cq-sidebar-title">
              <i class="ri-article-line" style="color: var(--brand-deep);" aria-hidden="true"></i>
              Artikel Edukasi Terbaru
            </h3>
            <div class="cq-sidebar-recent-list">
              <?php
              $sidebar_query = new WP_Query([
                  'posts_per_page' => 4,
                  'post__not_in'   => [$current_id],
                  'post_status'    => 'publish',
              ]);

              if ($sidebar_query->have_posts()) :
                  while ($sidebar_query->have_posts()) : $sidebar_query->the_post();
              ?>
                <a href="<?php the_permalink(); ?>" class="cq-sidebar-recent-item">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail([64, 64], ['class' => 'cq-sidebar-recent-thumb', 'alt' => get_the_title()]); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" class="cq-sidebar-recent-thumb" alt="<?php the_title_attribute(); ?>" loading="lazy">
                  <?php endif; ?>
                  <div class="cq-sidebar-recent-info">
                    <span class="cq-sidebar-recent-title"><?php the_title(); ?></span>
                    <span class="cq-sidebar-recent-date"><i class="ri-calendar-line" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
                  </div>
                </a>
              <?php
                  endwhile;
                  wp_reset_postdata();
              else :
              ?>
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-sidebar-recent-item">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" class="cq-sidebar-recent-thumb" alt="Panduan Memulai Usaha" loading="lazy">
                  <div class="cq-sidebar-recent-info">
                    <span class="cq-sidebar-recent-title">Panduan Memulai Usaha Laundry Kiloan Modal Hemat</span>
                    <span class="cq-sidebar-recent-date"><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                  </div>
                </a>
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-sidebar-recent-item">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" class="cq-sidebar-recent-thumb" alt="Kecurangan Kasir" loading="lazy">
                  <div class="cq-sidebar-recent-info">
                    <span class="cq-sidebar-recent-title">Cara Mengurangi Risiko Kasir Curang dengan Nota WhatsApp</span>
                    <span class="cq-sidebar-recent-date"><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                  </div>
                </a>
                <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-sidebar-recent-item">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" class="cq-sidebar-recent-thumb" alt="Parfum Microcapsule" loading="lazy">
                  <div class="cq-sidebar-recent-info">
                    <span class="cq-sidebar-recent-title">Rahasia Formulasi Parfum Microcapsule Tahan 30 Hari</span>
                    <span class="cq-sidebar-recent-date"><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                  </div>
                </a>
              <?php endif; ?>
            </div>
          </div>

        </aside>
      </div>
    </div>
  <?php endwhile; ?>

  <!-- ========================================================
       SECTION 9: RELATED CONTENT (3 Cards + Category Button)
       ======================================================== -->
  <section class="cq-section cq-section-alt cq-related-section" aria-labelledby="related-articles-title">
    <div class="cq-container">
      <div class="cq-section-header">
        <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12);">
          <i class="ri-compass-line"></i> Rekomendasi Terkait
        </div>
        <h2 id="related-articles-title" class="cq-section-title">Artikel &amp; Panduan Pilihan Lainnya</h2>
        <p class="cq-section-desc">Perluas pengetahuan operasional dan strategi pertumbuhan bisnis laundry Anda melalui artikel pilihan redaksi Indotech.</p>
      </div>

      <div class="cq-grid-3">
        <?php
        $related_query = new WP_Query([
            'posts_per_page'      => 3,
            'post__not_in'        => [$current_id],
            'cat'                 => $cat_id,
            'ignore_sticky_posts' => 1,
            'post_status'         => 'publish',
        ]);

        if (!$related_query->have_posts() || $related_query->post_count < 3) {
            $related_query = new WP_Query([
                'posts_per_page'      => 3,
                'post__not_in'        => [$current_id],
                'ignore_sticky_posts' => 1,
                'post_status'         => 'publish',
            ]);
        }

        if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
        ?>
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('cleanique-card', ['loading' => 'lazy', 'alt' => get_the_title()]); ?>
                <?php else : ?>
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                <?php endif; ?>
              </a>
              <span class="cq-article-card-tag">
                <i class="ri-price-tag-3-line" aria-hidden="true"></i>
                <?php
                $rel_cats = get_the_category();
                echo !empty($rel_cats) ? esc_html($rel_cats[0]->name) : 'Edukasi';
                ?>
              </span>
            </div>

            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> <?php echo cleanique_get_reading_time(); ?></span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);">
                  <i class="ri-building-line" aria-hidden="true"></i> Indotech Hub
                </span>
                <a href="<?php the_permalink(); ?>" class="cq-article-card-link-v2">
                  Baca Panduan <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
          <!-- Demo Fallback Cards -->
          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-outlet.jpg'); ?>" alt="Panduan Usaha Laundry Kiloan Modal Hemat" loading="lazy">
              </a>
              <span class="cq-article-card-tag"><i class="ri-price-tag-3-line" aria-hidden="true"></i> Panduan Usaha</span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 5 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>">Panduan Lengkap Memulai Usaha Laundry Kiloan Modal Hemat</a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Strategi menentukan lokasi potensial, kalkulasi kebutuhan mesin komersial, serta simulasi BEP 6–9 bulan.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);"><i class="ri-user-line" aria-hidden="true"></i> Tim Indotech</span>
                <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-article-card-link-v2">
                  Pelajari Paket <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>

          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-pos-app.jpg'); ?>" alt="Nota WhatsApp Anti Curang" loading="lazy">
              </a>
              <span class="cq-article-card-tag" style="color: #059669; border-color: rgba(5, 150, 105, 0.25);"><i class="ri-smartphone-line" aria-hidden="true"></i> Digitalisasi POS</span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 4 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>">Cara Mengurangi Risiko Kasir Curang dengan Nota WhatsApp</a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Mengapa nota kertas manual berbahaya dan bagaimana nota WhatsApp otomatis melindungi omzet outlet Anda.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);"><i class="ri-shield-check-line" aria-hidden="true"></i> POS Kasir</span>
                <a href="<?php echo esc_url(home_url('/aplikasi-laundry/')); ?>" class="cq-article-card-link-v2">
                  Coba Trial POS <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>

          <article class="cq-article-card-v2">
            <div class="cq-article-card-thumb-wrap">
              <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/chemical-products.jpg'); ?>" alt="Parfum Laundry Tahan 30 Hari" loading="lazy">
              </a>
              <span class="cq-article-card-tag" style="color: #d97706; border-color: rgba(217, 119, 6, 0.25);"><i class="ri-flask-line" aria-hidden="true"></i> Chemical Pabrik</span>
            </div>
            <div class="cq-article-card-body-v2">
              <div class="cq-article-card-meta-v2">
                <span><i class="ri-calendar-line" aria-hidden="true"></i> Update 2026</span>
                <span>&bull;</span>
                <span><i class="ri-time-line" aria-hidden="true"></i> 6 mnt baca</span>
              </div>
              <h3 class="cq-article-card-title-v2">
                <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>">Rahasia Parfum Microcapsule Tahan 30 Hari di Lemari</a>
              </h3>
              <p class="cq-article-card-excerpt-v2">
                Teknologi butiran mikro pewangi yang menekan biaya chemical tanpa mengurangi aroma mewah kesukaan pelanggan.
              </p>
              <div class="cq-article-card-footer-v2">
                <span style="font-size: 11px; font-weight: 600; color: var(--cq-text-muted);"><i class="ri-flask-line" aria-hidden="true"></i> Lab Indotech</span>
                <a href="<?php echo esc_url(home_url('/pabrik-chemical/')); ?>" class="cq-article-card-link-v2">
                  Katalog Kimia <i class="ri-arrow-right-line" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </article>
        <?php endif; ?>
      </div>

      <!-- More from Category Button -->
      <div class="cq-related-more-row">
        <a href="<?php echo esc_url($cat_url); ?>" class="cq-btn cq-btn-outline cq-btn-pill">
          Lihat Semua Artikel di Kategori "<?php echo esc_html($cat_name); ?>" <i class="ri-arrow-right-line"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================================
       SECTION 11: NEWSLETTER / CONVERSION CTA
       ======================================================== -->
  <section class="cq-section cq-section-newsletter-cta" aria-labelledby="newsletter-cta-title">
    <div class="cq-container">
      <div class="cq-newsletter-card">
        <div class="cq-newsletter-grid">
          <!-- Left: E-Book & Guide Offer -->
          <div class="cq-newsletter-offer">
            <span class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-12); background: rgba(255, 255, 255, 0.2); color: #ffffff; border-color: rgba(255, 255, 255, 0.3);">
              <i class="ri-download-cloud-line"></i> Free E-Book &amp; Kalkulator Excel
            </span>
            <h2 id="newsletter-cta-title" class="cq-newsletter-title">
              Unduh SOP Lengkap Outlet Laundry &amp; Kalkulator Simulasi BEP
            </h2>
            <p class="cq-newsletter-desc">
              Dapatkan panduan operasional 45 halaman, checklist maintenance mesin bulanan, dan template Excel kalkulasi HPP chemical langsung ke inbox email Anda. 100% gratis.
            </p>
            <form class="cq-newsletter-subscribe-form" onsubmit="event.preventDefault(); alert('Terima kasih! Panduan SOP dan file Excel BEP telah dikirim ke email Anda.');">
              <div class="cq-newsletter-subscribe-wrap">
                <i class="ri-mail-send-line cq-newsletter-input-icon"></i>
                <input type="email" class="cq-newsletter-input-field" placeholder="Masukkan alamat email aktif Anda" required />
                <button type="submit" class="cq-btn cq-btn-accent cq-btn-pill">
                  <i class="ri-download-2-line"></i> Unduh Sekarang
                </button>
              </div>
              <span class="cq-newsletter-privacy-note">
                <i class="ri-lock-line"></i> Kami menghargai privasi Anda. Tanpa spam, bebas unsubscribe kapan saja.
              </span>
            </form>
          </div>

          <!-- Right: Fast WhatsApp Consultation Card -->
          <div class="cq-newsletter-wa-card">
            <div class="cq-wa-card-badge">
              <i class="ri-customer-service-2-fill"></i> Layanan Konsultasi Cepat
            </div>
            <h3 class="cq-wa-card-heading">Punya Rencana Buka Outlet Bulan Ini?</h3>
            <p class="cq-wa-card-text">
              Diskusikan kebutuhan kapasitas mesin, ketersediaan daya listrik ruko, dan estimasi modal awal bersama konsultan resmi kami.
            </p>
            <div class="cq-wa-card-actions">
              <a href="<?php echo esc_url($wa_url); ?>" class="cq-btn cq-btn-primary cq-btn-pill cq-btn-block" target="_blank" rel="noopener">
                <i class="ri-whatsapp-line"></i> Chat WhatsApp Konsultan
              </a>
              <a href="<?php echo esc_url(home_url('/paket-usaha-laundry/')); ?>" class="cq-btn cq-btn-white-pill cq-btn-pill cq-btn-block">
                <i class="ri-store-2-line"></i> Pelajari Paket Usaha
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- Floating Toast Container for Copy Link Feedback -->
<div id="cq-toast-notification" class="cq-toast" aria-live="polite" aria-hidden="true">
  <i class="ri-checkbox-circle-fill"></i>
  <span id="cq-toast-message">Tautan artikel berhasil disalin!</span>
</div>

<?php
// SECTION 12: FOOTER
get_footer();
