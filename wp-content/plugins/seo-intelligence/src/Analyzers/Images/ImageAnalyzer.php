<?php

declare(strict_types=1);

namespace SeoIntelligence\Analyzers\Images;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisResult;
use SeoIntelligence\Analysis\AnalyzerInterface;
use SeoIntelligence\Analysis\Finding;
use SeoIntelligence\Analysis\Severity;
use SeoIntelligence\Scoring\ScoreCategory;

/**
 * Image & Media Quality Analyzer.
 * Validates alt attribute quality, missing dimensions (CLS risk), modern formats, and LCP hero candidate optimization.
 */
final class ImageAnalyzer implements AnalyzerInterface
{
    private const GENERIC_ALT_PATTERNS = [
        'image', 'img', 'foto', 'gambar', 'picture', 'photo', 'screenshot',
        'untitled', 'dsc_', 'screenshot_', 'whatsapp', 'banner', 'logo'
    ];

    public function getId(): string
    {
        return 'images';
    }

    public function getName(): string
    {
        return __('Media, Alt Text & Diagnosa CLS', 'seo-intelligence');
    }

    public function getCategory(): ScoreCategory
    {
        return ScoreCategory::IMAGES;
    }

    public function getDescription(): string
    {
        return __('Mengevaluasi kelengkapan teks alternatif (Alt), rasio dimensi width/height pencegah layout shift, dan format modern.', 'seo-intelligence');
    }

    public function analyze(AnalysisContext $context): AnalysisResult
    {
        $findings = [];
        $xpath = $context->getXPath();
        $images = $xpath->query('//img');

        if (!$images || $images->length === 0) {
            $findings[] = Finding::issue(
                id: 'image-none-found',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Halaman Tidak Memuat Elemen Gambar',
                description: 'Tidak ada gambar visual yang terdeteksi pada konten halaman ini.',
                whyItMatters: 'Gambar yang relevan meningkatkan keterlibatan visual dan membuka peluang trafik dari Google Images.',
                recommendation: 'Tambahkan setidaknya 1 gambar ilustrasi atau diagram yang diperkaya atribut Alt relevan.',
                location: 'body'
            );

            return new AnalysisResult($this->getId(), $this->getCategory(), $findings);
        }

        $totalImages = $images->length;
        $missingAlt = 0;
        $genericAlt = 0;
        $missingDimensions = 0;
        $legacyFormatCount = 0;
        $heroImageLazyLoaded = false;
        $index = 0;

        foreach ($images as $img) {
            /** @var \DOMElement $img */
            $index++;
            $src = $img->getAttribute('src');
            $hasAltAttr = $img->hasAttribute('alt');
            $altText = trim($img->getAttribute('alt'));
            $width = $img->getAttribute('width');
            $height = $img->getAttribute('height');
            $loading = strtolower($img->getAttribute('loading'));

            // 1. Alt check
            if (!$hasAltAttr || $altText === '') {
                $missingAlt++;
            } else {
                $lowerAlt = strtolower($altText);
                foreach (self::GENERIC_ALT_PATTERNS as $pattern) {
                    if ($lowerAlt === $pattern || preg_match('/^' . preg_quote($pattern, '/') . '[\-_0-9]*/i', $lowerAlt)) {
                        $genericAlt++;
                        break;
                    }
                }
            }

            // 2. Explicit Dimensions check (CLS)
            if (empty($width) || empty($height)) {
                $missingDimensions++;
            }

            // 3. Format Check
            $ext = strtolower(pathinfo((string) parse_url($src, PHP_URL_PATH), PATHINFO_EXTENSION));
            if (in_array($ext, ['bmp', 'tiff', 'gif'], true)) {
                $legacyFormatCount++;
            }

            // 4. Hero Candidate (First image in page)
            if ($index === 1 && $loading === 'lazy') {
                $heroImageLazyLoaded = true;
            }
        }

        // Findings generation:
        // Alt Missing
        if ($missingAlt > 0) {
            $findings[] = Finding::issue(
                id: 'image-missing-alt',
                analyzerId: $this->getId(),
                severity: $missingAlt > 3 ? Severity::ERROR : Severity::WARNING,
                title: sprintf('Ditemukan %d Gambar Tanpa Atribut Alt', $missingAlt),
                description: sprintf('Dari %d gambar, %d di antaranya tidak memiliki deskripsi alt text.', $totalImages, $missingAlt),
                whyItMatters: 'Google Images dan bot AI tidak dapat memahami konteks visual tanpa atribut Alt. Ini juga merupakan pelanggaran aksesibilitas WCAG 2.1.',
                recommendation: 'Tambahkan alt text deskriptif yang menerangkan objek atau fungsi gambar dalam Bahasa Indonesia yang alami.',
                location: 'img'
            );
        } else {
            $findings[] = Finding::success(
                id: 'image-alt-complete',
                analyzerId: $this->getId(),
                title: 'Semua Gambar Dilengkapi Atribut Alt',
                description: sprintf('Seluruh %d gambar pada halaman memiliki atribut teks alternatif.', $totalImages),
                location: 'img'
            );
        }

        // Generic Alt
        if ($genericAlt > 0) {
            $findings[] = Finding::issue(
                id: 'image-generic-alt',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: sprintf('%d Gambar Menggunakan Alt Text Generik / Nama Berkas', $genericAlt),
                description: 'Ditemukan teks alt seperti "image", "foto", atau nama berkas bawaan kamera.',
                whyItMatters: 'Alt generik tidak memberikan nilai informasi bagi mesin pencari maupun pengguna tunanetra.',
                recommendation: 'Ganti alt generik dengan kalimat deskriptif konkret (misal: "Mesin cuci komersial Maytag 15kg di Cleanique Laundry").',
                location: 'img'
            );
        }

        // Missing Dimensions (CLS Core Web Vital)
        if ($missingDimensions > 0) {
            $findings[] = Finding::issue(
                id: 'image-missing-dimensions',
                analyzerId: $this->getId(),
                severity: Severity::WARNING,
                title: sprintf('%d Gambar Tanpa Atribut Width & Height (Risiko CLS)', $missingDimensions),
                description: 'Gambar tidak menyertakan dimensi piksel width dan height eksplisit pada tag HTML.',
                whyItMatters: 'Browser tidak dapat memesan ruang layout sebelum gambar terunduh, menyebabkan lonjakan konten (Cumulative Layout Shift) yang merusak skor Core Web Vitals.',
                recommendation: 'Sertakan atribut width dan height pada setiap tag <img> (misal: width="800" height="600") atau gunakan CSS aspect-ratio.',
                location: 'img'
            );
        } else {
            $findings[] = Finding::success(
                id: 'image-dimensions-valid',
                analyzerId: $this->getId(),
                title: 'Dimensi Gambar Eksplisit Terpasang (Bebas Risiko CLS)',
                description: 'Seluruh gambar memiliki atribut lebar dan tinggi untuk perataan visual stabil.',
                location: 'img'
            );
        }

        // Hero image lazy loading check
        if ($heroImageLazyLoaded) {
            $findings[] = Finding::issue(
                id: 'image-hero-lazy-loaded',
                analyzerId: $this->getId(),
                severity: Severity::NOTICE,
                title: 'Gambar Pertama / Hero Menggunakan loading="lazy"',
                description: 'Gambar paling atas yang berpotensi menjadi LCP (Largest Contentful Paint) dimuat secara tertunda (lazy).',
                whyItMatters: 'Lazy loading pada gambar di atas lipatan layar (above the fold) dapat memperlambat munculnya elemen LCP hingga beberapa ratus milidetik.',
                recommendation: 'Hapus loading="lazy" pada gambar hero pertama dan tambahkan fetchpriority="high".',
                location: 'img:first-of-type'
            );
        }

        return new AnalysisResult(
            analyzerId: $this->getId(),
            category: $this->getCategory(),
            findings: $findings
        );
    }
}
