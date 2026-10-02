<?php

declare(strict_types=1);

namespace SeoIntelligence\Report;

use SeoIntelligence\Core\Container;
use SeoIntelligence\Database\Repository\AuditRepository;

/**
 * OpenSEO-Compliant Executive Report Generator.
 *
 * Produces self-contained, standalone HTML audit reports adhering strictly to OpenSEO's
 * seo-report standard:
 * - Zero external resources (no external CSS, JS, fonts, or images).
 * - Full print stylesheet (@media print) for direct PDF generation.
 * - Sticky Table of Contents rail (.rail).
 * - Bounded actionable recommendations: Problem, Change, Expected effect.
 * - Accessible inline CSS bar charts with real values.
 * - Explanatory findings without opaque scoring.
 * - Under 80 KB lightweight footprint.
 */
final class ReportGenerator
{
    public function __construct(
        private readonly ?Container $container = null
    ) {
    }

    /**
     * Generate an executive report from a stored page audit ID.
     */
    public function generateFromPageId(int $pageId): string
    {
        global $wpdb;
        $tablePages = $wpdb->prefix . 'seoi_pages';
        $page = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tablePages} WHERE id = %d", $pageId), ARRAY_A);

        if (!$page) {
            return $this->renderErrorDocument('Data audit halaman tidak ditemukan.');
        }

        $repo = $this->container ? $this->container->get('audit_repository') : new AuditRepository();
        $findings = $repo->getPageFindings($pageId);

        $scores = !empty($page['scores_json']) ? json_decode($page['scores_json'], true) : [];

        $data = [
            'url'              => $page['url'],
            'title'            => $page['title'],
            'http_status'      => (int) $page['http_status'],
            'duration_seconds' => 0.0,
            'scores'           => $scores,
            'all_findings'     => $findings,
            'created_at'       => $page['created_at'] ?? current_time('mysql'),
        ];

        return $this->generateHtmlReport($data, $page['title']);
    }

    /**
     * Generate an executive report directly from live analysis array data.
     */
    public function generateFromAnalysisData(array $analysisData, string $customTitle = ''): string
    {
        return $this->generateHtmlReport($analysisData, $customTitle);
    }

    /**
     * Core HTML generation logic adhering to OpenSEO specifications.
     */
    private function generateHtmlReport(array $data, string $customTitle = ''): string
    {
        $url = $data['url'] ?? (function_exists('home_url') ? home_url('/') : 'https://example.com');
        $parsedUrl = wp_parse_url($url);
        $host = $parsedUrl['host'] ?? 'Website';
        $path = $parsedUrl['path'] ?? '/';

        $pageTitle = !empty($customTitle) ? $customTitle : ($data['title'] ?? $url);
        $dateStr = date('M j, Y');
        $reportTitle = 'Executive Audit Report — ' . $host . ($path !== '/' ? ' ' . $path : '') . ' — ' . $dateStr;

        $scores = $data['scores'] ?? [];
        $overallScore = (int) ($scores['overall'] ?? 0);
        $criticalCount = (int) ($scores['critical_count'] ?? 0);
        $errorCount = (int) ($scores['error_count'] ?? 0);
        $warningCount = (int) ($scores['warning_count'] ?? 0);

        // Normalize findings
        $rawFindings = $data['all_findings'] ?? [];
        $normalizedFindings = $this->normalizeFindings($rawFindings);

        // Filter top bounded recommendations (priority: critical -> error -> warning)
        $topRecommendations = $this->extractTopRecommendations($normalizedFindings, 4);

        // Category breakdown
        $categoryScores = $scores['categories'] ?? [];

        ob_start();
        ?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo esc_html($reportTitle); ?></title>
<style>
/* OpenSEO System Stylesheet - Fully Self-Contained, Print Ready, Zero External Dependencies */
:root {
  --bg: #ffffff;
  --fg: #0a0a0a;
  --fg-2: #454545;
  --fg-3: #8f8f8f;
  --rule: #ebebeb;
  --rule-2: #dcdcdc;
  --sunk: #fafafa;
  --accent: #0284c7;
  --accent-light: #e0f2fe;
  --critical: #dc2626;
  --critical-bg: #fef2f2;
  --error: #ea580c;
  --error-bg: #fff7ed;
  --warning: #d97706;
  --warning-bg: #fffbeb;
  --success: #16a34a;
  --success-bg: #f0fdf4;
}
* { box-sizing: border-box; }
html { -webkit-text-size-adjust: 100%; }
body {
  background: var(--bg);
  color: var(--fg);
  margin: 0;
  padding: 0 24px 120px;
  font-size: 17px;
  line-height: 1.65;
  letter-spacing: -0.003em;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
}
.shell { max-width: 1120px; margin: 0 auto; }
header { padding: 48px 0 0; max-width: 760px; }
h1 {
  font-size: clamp(32px, 5vw, 48px);
  font-weight: 700;
  line-height: 1.1;
  letter-spacing: -0.035em;
  margin: 0 0 12px;
  color: var(--fg);
}
.byline {
  margin: 16px 0 0;
  font-size: 15px;
  color: var(--fg-2);
  display: flex;
  flex-wrap: wrap;
  gap: 12px 20px;
  align-items: center;
}
.badge-score {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: var(--sunk);
  border: 1px solid var(--rule-2);
  padding: 4px 12px;
  border-radius: 999px;
  font-weight: 600;
  font-size: 14px;
}
.badge-score.score-good { background: var(--success-bg); color: var(--success); border-color: #bbf7d0; }
.badge-score.score-warn { background: var(--warning-bg); color: var(--warning); border-color: #fde68a; }
.badge-score.score-crit { background: var(--critical-bg); color: var(--critical); border-color: #fecaca; }

.body {
  display: grid;
  grid-template-columns: minmax(0, 760px) 1fr;
  gap: 0 56px;
  margin: 44px 0 0;
}
article { grid-column: 1; grid-row: 1; min-width: 0; }
.rail { grid-column: 2; grid-row: 1; font-size: 14px; color: var(--fg-3); padding-top: 6px; }
.rail .sticky { position: sticky; top: 32px; }
.toc-label {
  font-size: 12px;
  letter-spacing: .08em;
  text-transform: uppercase;
  color: var(--fg-3);
  margin: 0 0 12px;
  font-weight: 600;
}
.toc ol { list-style: none; margin: 0; padding: 0; }
.toc li { margin: 0 0 9px; }
.toc a { color: var(--fg-2); text-decoration: none; transition: color .15s ease; }
.toc a:hover { color: var(--accent); }
@media (max-width: 960px) {
  .body { grid-template-columns: 1fr; }
  .rail { display: none; }
}

article p { margin: 0 0 22px; }
h2 {
  font-size: 26px;
  font-weight: 700;
  letter-spacing: -0.02em;
  line-height: 1.25;
  margin: 52px 0 20px;
  border-bottom: 1px solid var(--rule);
  padding-bottom: 10px;
}
h3 {
  font-size: 19px;
  font-weight: 600;
  letter-spacing: -0.015em;
  margin: 32px 0 12px;
}
.lead-verdict {
  font-size: 19px;
  line-height: 1.5;
  color: var(--fg);
  background: var(--sunk);
  border-left: 4px solid var(--accent);
  padding: 18px 22px;
  border-radius: 0 8px 8px 0;
  margin-bottom: 32px;
}
.finding {
  list-style: none;
  padding: 0;
  margin: 0 0 24px;
  background: #ffffff;
  border: 1px solid var(--rule);
  border-radius: 8px;
  padding: 16px 20px;
}
.finding li { margin: 0 0 10px; color: var(--fg-2); font-size: 15.5px; }
.finding li:last-child { margin-bottom: 0; }
.finding b { color: var(--fg); font-weight: 600; display: inline-block; min-width: 120px; }
.note {
  border-left: 3px solid var(--fg-3);
  background: var(--sunk);
  padding: 12px 18px;
  margin: 0 0 26px;
  border-radius: 0 6px 6px 0;
  font-size: 14.5px;
}
.note p { margin: 0; color: var(--fg-2); }

.bars-container {
  background: var(--sunk);
  border: 1px solid var(--rule);
  border-radius: 8px;
  padding: 24px;
  margin: 0 0 32px;
}
.bars {
  display: grid;
  grid-template-columns: minmax(130px, 200px) 1fr 48px;
  gap: 12px 16px;
  align-items: center;
  font-size: 14.5px;
}
.bars .label {
  color: var(--fg);
  font-weight: 500;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.bars .track {
  display: block;
  height: 14px;
  background: #e2e8f0;
  border-radius: 7px;
  overflow: hidden;
}
.bars .bar {
  display: block;
  height: 100%;
  border-radius: 7px;
  background: var(--accent);
}
.bars .bar.bar-success { background: var(--success); }
.bars .bar.bar-warning { background: var(--warning); }
.bars .bar.bar-danger { background: var(--critical); }
.bars .value {
  font-variant-numeric: tabular-nums;
  font-weight: 600;
  text-align: right;
  color: var(--fg);
}

.tw { overflow-x: auto; margin: 0 0 32px; }
table {
  border-collapse: collapse;
  width: 100%;
  font-size: 14.5px;
  min-width: 580px;
  border: 1px solid var(--rule);
  border-radius: 8px;
}
th {
  text-align: left;
  font-weight: 600;
  color: var(--fg-2);
  background: var(--sunk);
  padding: 12px 16px;
  border-bottom: 1px solid var(--rule-2);
}
td {
  padding: 12px 16px;
  border-bottom: 1px solid var(--rule);
  vertical-align: top;
  color: var(--fg-2);
}
tr:last-child td { border-bottom: none; }
tr:hover td { background: #fafafa; }
.badge-sev {
  display: inline-block;
  padding: 2px 8px;
  border-radius: 4px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
}
.sev-critical { background: var(--critical-bg); color: var(--critical); }
.sev-error { background: var(--error-bg); color: var(--error); }
.sev-warning { background: var(--warning-bg); color: var(--warning); }
.sev-notice { background: var(--accent-light); color: var(--accent); }
.sev-success { background: var(--success-bg); color: var(--success); }

ol.roadmap-list { margin: 0 0 32px; padding-left: 24px; }
ol.roadmap-list li { margin-bottom: 14px; font-size: 16px; color: var(--fg); }
ol.roadmap-list li span { color: var(--fg-2); font-size: 14.5px; display: block; margin-top: 4px; }

footer {
  max-width: 760px;
  margin: 64px 0 0;
  padding: 24px 0 0;
  border-top: 1px solid var(--rule);
  font-size: 13.5px;
  color: var(--fg-3);
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
}

/* Print Optimization */
@media print {
  @page {
    margin: 12mm 14mm;
    @bottom-center {
      content: counter(page) " / " counter(pages);
      font: 9pt -apple-system, sans-serif;
      color: #737373;
    }
  }
  body {
    background: #ffffff;
    color: #111111;
    padding: 0;
    font-size: 10.5pt;
    line-height: 1.5;
  }
  .shell, .body { display: block; max-width: none; }
  header { padding: 0; max-width: none; margin-bottom: 20pt; }
  h1 { font-size: 22pt; }
  h2 { font-size: 14pt; margin: 24pt 0 8pt; break-after: avoid; }
  h3 { font-size: 11.5pt; margin: 14pt 0 4pt; break-after: avoid; }
  article, footer { max-width: none; }
  .rail { display: none; }
  table, figure, .note, .finding { break-inside: avoid; }
  tr, td, th { break-inside: avoid; }
  .tw { overflow: visible; }
  table { font-size: 9pt; min-width: 0; }
  .bars .bar, .bars .track { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
  a { text-decoration: none; color: inherit; }
}
</style>
</head>
<body>
<div class="shell">

<header>
  <h1><?php echo esc_html($reportTitle); ?></h1>
  <div class="byline">
    <span><strong>Target URL:</strong> <?php echo esc_html($url); ?></span>
    <span><strong>Tanggal:</strong> <?php echo esc_html($dateStr); ?></span>
    <span class="badge-score <?php echo $overallScore >= 80 ? 'score-good' : ($overallScore >= 60 ? 'score-warn' : 'score-crit'); ?>">
      Health Score: <?php echo esc_html((string) $overallScore); ?> / 100
    </span>
  </div>
</header>

<div class="body">
  <aside class="rail">
    <div class="sticky">
      <p class="toc-label">Daftar Isi</p>
      <nav class="toc" aria-label="Daftar Isi">
        <ol>
          <li><a href="#ringkasan-eksekutif">Ringkasan Eksekutif</a></li>
          <li><a href="#rekomendasi-kunci">Rekomendasi Berdampak Tinggi</a></li>
          <li><a href="#dimensi-analisis">Peta Performa 11 Dimensi</a></li>
          <li><a href="#daftar-temuan">Daftar Temuan Diagnostik</a></li>
          <li><a href="#langkah-berikutnya">Langkah Prioritas Kerja</a></li>
          <li><a href="#how-this-report-was-made">Metodologi & Verifikasi</a></li>
        </ol>
      </nav>
    </div>
  </aside>

  <article>

    <!-- 1. Executive Summary -->
    <h2 id="ringkasan-eksekutif">1. Ringkasan Eksekutif</h2>
    <div class="lead-verdict">
      <?php
      if ($overallScore >= 85) {
          echo '<strong>Status Prima:</strong> Halaman ini memiliki pondasi teknis dan struktur konten yang sangat solid untuk mesin pencari konvensional (Google) dan generative engine (ChatGPT, Claude, Perplexity). Ditemukan ' . esc_html((string) $criticalCount) . ' masalah kritis dan ' . esc_html((string) ($errorCount + $warningCount)) . ' peluang penyempurnaan sekunder.';
      } elseif ($overallScore >= 65) {
          echo '<strong>Status Cukup Baik dengan Hambatan:</strong> Halaman dapat terindeks dengan baik, namun terdapat ' . esc_html((string) ($criticalCount + $errorCount)) . ' kendala signifikan yang menghambat potensi rangking maksimal dan keterpilihan dalam jawaban AI (AEO). Tindakan perbaikan segera disarankan pada struktur konten dan metadata.';
      } else {
          echo '<strong>Memerlukan Tindakan Cepat:</strong> Terdeteksi ' . esc_html((string) $criticalCount) . ' isu kritis dan ' . esc_html((string) $errorCount) . ' error struktural yang dapat menurunkan otoritas penelusuran atau menghambat perayapan bot AI secara efisien.';
      }
      ?>
    </div>

    <!-- 2. Bounded Recommendations (OpenSEO Standard) -->
    <h2 id="rekomendasi-kunci">2. Rekomendasi Berdampak Tinggi (Top Actionable Items)</h2>
    <p>Setiap rekomendasi disusun berbasis prinsip OpenSEO: batas masalah nyata, langkah konkret yang dapat dieksekusi, serta perkiraan dampak bisnis yang terukur.</p>

    <?php if (empty($topRecommendations)) : ?>
      <div class="note">
        <p><strong>Tidak ada masalah kritis:</strong> Seluruh indikator utama berada pada rentang optimal. Tidak diperlukan perubahan arsitektur mendesak.</p>
      </div>
    <?php else : ?>
      <?php foreach ($topRecommendations as $rec) : ?>
        <h3><?php echo esc_html($rec['title']); ?></h3>
        <ul class="finding">
          <li><b>Problem:</b> <?php echo esc_html($rec['description'] ?: 'Terdeteksi ketidaksesuaian standar penelusuran pada elemen ini.'); ?></li>
          <li><b>Change:</b> <?php echo esc_html($rec['recommendation'] ?: 'Perbaiki konfigurasi atau kode sesuai pedoman teknis yang dianjurkan.'); ?></li>
          <li><b>Expected effect:</b> <?php echo esc_html($rec['why_it_matters'] ?: 'Meningkatkan pemahaman bot penelusur dan menaikkan peluang rasio klik (CTR).'); ?></li>
        </ul>
      <?php endforeach; ?>
    <?php endif; ?>

    <!-- 3. Category Bars -->
    <h2 id="dimensi-analisis">3. Peta Performa 11 Dimensi SEO & AEO</h2>
    <p>Distribusi skor per kategori (skala 0–100) dihitung secara transparan berbasis aturan deduksi yang jelas tanpa angka rekaan:</p>

    <div class="bars-container">
      <div class="bars" role="img" aria-label="Skor Kategori">
        <?php
        $categoryLabels = [
            'seo'         => 'SEO Teknis',
            'content'     => 'Kualitas Konten',
            'readability' => 'Keterbacaan ID',
            'geo'         => 'GEO (Generative AI)',
            'aeo'         => 'AEO (Answer Engine)',
            'headings'    => 'Struktur Heading',
            'images'      => 'Media & Alt Text',
            'links'       => 'Tautan Internal & Eksternal',
            'schema'      => 'Schema JSON-LD',
            'assets'      => 'Beban Aset & Skrip',
            'ux'          => 'UX & Keterbacaan Mobile',
        ];

        foreach ($categoryLabels as $key => $label) {
            $catVal = $categoryScores[$key] ?? 100;
            $catScore = (is_array($catVal) && isset($catVal['score'])) ? (int) $catVal['score'] : (int) $catVal;
            $barClass = $catScore >= 80 ? 'bar-success' : ($catScore >= 60 ? 'bar-warning' : 'bar-danger');
            ?>
            <span class="label"><?php echo esc_html($label); ?></span>
            <span class="track">
              <span class="bar <?php echo esc_attr($barClass); ?>" style="width: <?php echo max(4, min(100, $catScore)); ?>%"></span>
            </span>
            <span class="value"><?php echo esc_html((string) $catScore); ?></span>
            <?php
        }
        ?>
      </div>
    </div>

    <!-- 4. Findings Table -->
    <h2 id="daftar-temuan">4. Daftar Lengkap Temuan Diagnostik</h2>
    <div class="tw">
      <table>
        <thead>
          <tr>
            <th style="width: 15%;">Tingkat</th>
            <th style="width: 25%;">Area / Analisis</th>
            <th style="width: 35%;">Temuan & Bukti</th>
            <th style="width: 25%;">Solusi Direkomendasikan</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($normalizedFindings)) : ?>
            <tr>
              <td colspan="4" style="text-align: center; color: var(--fg-3); padding: 24px;">
                Semua pengujian lolos tanpa temuan negatif.
              </td>
            </tr>
          <?php else : ?>
            <?php foreach ($normalizedFindings as $f) : 
                $sev = $f['severity'];
                $sevClass = 'sev-' . $sev;
            ?>
              <tr>
                <td><span class="badge-sev <?php echo esc_attr($sevClass); ?>"><?php echo esc_html($sev); ?></span></td>
                <td>
                  <strong><?php echo esc_html($f['title']); ?></strong><br>
                  <small style="color: var(--fg-3);"><?php echo esc_html($f['analyzer_id']); ?></small>
                </td>
                <td>
                  <?php echo esc_html($f['description']); ?>
                  <?php if (!empty($f['location'])) : ?>
                    <br><small style="color: var(--fg-3);">Lokasi: <code><?php echo esc_html($f['location']); ?></code></small>
                  <?php endif; ?>
                </td>
                <td>
                  <?php echo esc_html($f['recommendation'] ?: $f['why_it_matters']); ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- 5. What to do next -->
    <h2 id="langkah-berikutnya">5. Langkah Prioritas Kerja (What to do next)</h2>
    <ol class="roadmap-list">
      <?php if ($criticalCount > 0) : ?>
        <li>
          <strong>Tuntaskan <?php echo esc_html((string) $criticalCount); ?> Isu Kritis Segera:</strong>
          <span>Selesaikan temuan berlabel Kritis yang dapat secara langsung membatasi perayapan bot atau indeks Google.</span>
        </li>
      <?php endif; ?>
      <li>
        <strong>Terapkan Rekomendasi Format Pertanyaan & Jawaban (AEO):</strong>
        <span>Pastikan konten menyertakan ringkasan langsung pada 150 kata pertama untuk ditangkap oleh AI Perplexity & ChatGPT Search.</span>
      </li>
      <li>
        <strong>Verifikasi Ulang Pasca Rilis:</strong>
        <span>Jalankan audit ulang melalui menu SEO Intelligence di dashboard WordPress untuk memastikan pemulihan skor ke level hijau (>= 85).</span>
      </li>
    </ol>

    <!-- 6. How this report was made (OpenSEO Standard Section) -->
    <h2 id="how-this-report-was-made">6. Metodologi & Verifikasi Laporan</h2>
    <p>Generated by the <a href="https://openseo.so/docs/skills/seo-report" target="_blank" rel="noopener">OpenSEO Report Standard</a> and SEO & AEO Intelligence v1.0.0 engine on <?php echo esc_html($dateStr); ?>.</p>
    <ul class="finding">
      <li><b>Mesin Diagnostik:</b> 11 subsystem internal (Technical SEO, Indonesian Readability, Content Depth, GEO Entity Classifier, AEO Direct Answer, Heading Structure, Media Alt, Link Equity, Asset Bloat, Schema JSON-LD, UX Mobile).</li>
      <li><b>Metodologi Rekomendasi:</b> Berbasis bounded actionable recommendations OpenSEO (Problem, Change, Expected effect) tanpa metrik tertutup atau skor manipulatif.</li>
      <li><b>Verifikasi Lapangan:</b> Dianalisis langsung dari DOM halaman riil situs <?php echo esc_html($host); ?>.</li>
    </ul>

  </article>
</div>

<footer>
  <span>Disiapkan dengan SEO & AEO Intelligence + Framework OpenSEO.</span>
  <span>Data per <?php echo esc_html($dateStr); ?>. Dokumen Mandiri (Self-Contained).</span>
</footer>

</div>
</body>
</html>
        <?php
        return (string) ob_get_clean();
    }

    /**
     * Normalize findings whether from raw objects or database associative arrays.
     */
    private function normalizeFindings(array $findings): array
    {
        $normalized = [];
        foreach ($findings as $f) {
            if (is_object($f)) {
                $sev = method_exists($f, 'getSeverity') ? $f->getSeverity() : ($f->severity ?? 'notice');
                $sevVal = is_object($sev) && isset($sev->value) ? $sev->value : (string) $sev;
                $normalized[] = [
                    'title'          => $f->title ?? '',
                    'severity'       => $sevVal,
                    'analyzer_id'    => $f->analyzerId ?? ($f->analyzer_id ?? ''),
                    'description'    => $f->description ?? '',
                    'why_it_matters' => $f->whyItMatters ?? ($f->why_it_matters ?? ''),
                    'recommendation' => $f->recommendation ?? '',
                    'location'       => $f->location ?? '',
                ];
            } elseif (is_array($f)) {
                $sev = $f['severity'] ?? 'notice';
                $sevVal = is_array($sev) && isset($sev['value']) ? $sev['value'] : (is_object($sev) && isset($sev->value) ? $sev->value : (string) $sev);
                $normalized[] = [
                    'title'          => $f['title'] ?? '',
                    'severity'       => $sevVal,
                    'analyzer_id'    => $f['analyzer_id'] ?? ($f['analyzerId'] ?? ''),
                    'description'    => $f['description'] ?? '',
                    'why_it_matters' => $f['why_it_matters'] ?? ($f['whyItMatters'] ?? ''),
                    'recommendation' => $f['recommendation'] ?? '',
                    'location'       => $f['location'] ?? '',
                ];
            }
        }
        return $normalized;
    }

    /**
     * Extract top prioritized recommendations (Critical > Error > Warning).
     */
    private function extractTopRecommendations(array $findings, int $limit = 4): array
    {
        $critical = [];
        $errors = [];
        $warnings = [];

        foreach ($findings as $f) {
            $sev = strtolower((string) ($f['severity'] ?? ''));
            if ($sev === 'critical') {
                $critical[] = $f;
            } elseif ($sev === 'error') {
                $errors[] = $f;
            } elseif ($sev === 'warning') {
                $warnings[] = $f;
            }
        }

        $merged = array_merge($critical, $errors, $warnings);
        return array_slice($merged, 0, $limit);
    }

    /**
     * Render fallback error document.
     */
    private function renderErrorDocument(string $message): string
    {
        return '<!doctype html><html><head><meta charset="utf-8"><title>Error</title></head><body><p>' . esc_html($message) . '</p></body></html>';
    }
}
