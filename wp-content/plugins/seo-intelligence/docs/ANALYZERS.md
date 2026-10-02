# Analyzers Reference & Dimension Guide

> **Specification Source:** [READABLE.md](file:///c:/laragon/www/cleaniquelaundry/READABLE.md) — Sections 4 to 16

---

## The 11 Core Analyzers

| # | Analyzer | Class | Category | Weight | Description |
|---|---|---|---|---|---|
| 1 | **Technical SEO** | `TechnicalSeoAnalyzer` | `seo` | 14% | Validates `<title>`, meta description, canonical link, robots directives, OpenGraph. |
| 2 | **Content Quality** | `ContentAnalyzer` | `content` | 12% | Checks word count, paragraph length, text repetition, and thin content penalties. |
| 3 | **Readability (ID)** | `ReadabilityAnalyzer` | `readability` | 12% | Evaluates sentence lengths, transition words, and Indonesian reading difficulty formulas. |
| 4 | **GEO (Generative Engine)** | `GeoAnalyzer` | `geo` | 10% | Assesses entity clarity, factual claim backing, and machine-readability for LLMs. |
| 5 | **AEO (Answer Engine)** | `AeoAnalyzer` | `aeo` | 10% | Detects FAQ structure, direct question answering, pricing transparency, and how-tos. |
| 6 | **Headings Structure** | `HeadingAnalyzer` | `headings` | 8% | Enforces single H1, validates hierarchical order without skipped levels (e.g. H2 to H4). |
| 7 | **Images & Visual** | `ImageAnalyzer` | `images` | 8% | Audits ALT text quality, file weights (<200KB), WebP/AVIF format, dimension attributes. |
| 8 | **Internal & Outbound Links**| `LinkAnalyzer` | `links` | 8% | Evaluates internal link depth, anchor text clarity, orphan pages, broken links. |
| 9 | **Structured Data (Schema)** | `SchemaAnalyzer` | `schema` | 6% | Validates JSON-LD syntax, schema types (Organization, WebSite, Article, LocalBusiness). |
| 10| **Assets & Scripts** | `AssetAnalyzer` | `assets` | 6% | Counts CSS/JS files, detects render-blocking scripts, web font performance. |
| 11| **UX & Mobile Readiness** | `UxMobileAnalyzer` | `ux` | 6% | Checks viewport meta tag, touch target spacing, accessibility ARIA landmarks. |

---

## Adding Custom Analyzers

You can register third-party analyzers using the `seo_intelligence_analyzers` filter:

```php
add_filter('seo_intelligence_analyzers', function(array $analyzers) {
    $analyzers['custom_checker'] = new MyCustomAnalyzer();
    return $analyzers;
});
```
