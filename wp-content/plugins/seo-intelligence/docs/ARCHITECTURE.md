# Architecture & Engineering Design

> **Plugin Name:** SEO & AEO Intelligence  
> **Package:** `SeoIntelligence`  
> **Source Specification:** [READABLE.md](file:///c:/laragon/www/cleaniquelaundry/READABLE.md)

---

## 1. System Overview

SEO & AEO Intelligence is an enterprise-grade technical and semantic audit system for WordPress. It provides explainable, multi-dimensional analysis without monolithic bloat or black-box scores.

```
                           +------------------------+
                           |  Plugin Bootstrap File |
                           |  (seo-intelligence)   |
                           +-----------+------------+
                                       |
                   +-------------------+-------------------+
                   |                                       |
        +----------v-----------+               +-----------v----------+
        | Dependency Container |               | PSR-4 Autoloader     |
        +----------+-----------+               +----------------------+
                   |
     +-------------+-------------+-------------+-------------+
     |             |             |             |             |
+----v----+   +----v----+   +----v----+   +----v----+   +----v----+
| Analysis|   | Sitemap |   | Robots  |   | Frontend|   |  Admin  |
| Manager |   | Manager |   | Manager |   |  Meta   |   |   UI    |
+----+----+   +---------+   +---------+   +---------+   +----+----+
     |                                                       |
+----v----+                                             +----v----+
|11 Core  |                                             | 6 Admin |
|Analyzers|                                             | Screens |
+---------+                                             +---------+
```

---

## 2. Core Subsystems

### A. Modular Analyzers Pipeline (`src/Analysis/`)
- **`AnalyzerInterface`**: Strict contract for every analyzer (`getId()`, `getName()`, `getCategory()`, `analyze()`).
- **`AnalysisContext`**: Reusable immutable container holding raw HTML, cached DOMDocument, DOMXPath, and metadata. Analyzers do not re-parse DOM repeatedly.
- **`AnalysisManager`**: Executes analyzers sequentially with try/catch isolation so a single syntax or parsing anomaly never crashes the whole audit.
- **`Finding`**: Standardized finding model with `id`, `severity` (Critical, Error, Warning, Notice, Success), `location`, `whyItMatters`, and actionable `recommendation`.

### B. Transparent Scoring Engine (`src/Scoring/`)
- Rejects opaque single scores.
- Aggregates findings mathematically across 11 dimensions using transparent, configurable weights that sum precisely to 100%.

### C. XML Sitemap Generator (`src/Sitemap/`)
- Native high-performance XML sitemap index (`sitemap.xml`) with sub-sitemaps for Posts, Pages, Custom Post Types (`paket_usaha`, `kemitraan`), and Taxonomies.
- Includes Google Image Sitemap tags (`<image:image>`) for visual traffic.
- Styled with human-friendly responsive XSL stylesheet (`sitemap.xsl`).

### D. Robots.txt & Bot Crawling Suite (`src/Robots/`)
- Manages traditional search bots (Googlebot, Bingbot, Yandex, DuckDuckGo) alongside modern Answer Engine (AEO) and Generative Engine (GEO) AI bots (`GPTBot`, `ChatGPT-User`, `ClaudeBot`, `anthropic-ai`, `PerplexityBot`, `Applebot`, `Google-Extended`).

### E. Frontend Metadata & Third-Party Compatibility (`src/Frontend/`, `src/Core/SeoPluginDetector.php`)
- Injects canonical URL, meta description, meta robots, OpenGraph, Twitter Cards, Webmaster verification, and JSON-LD Schema.
- Automatically detects Yoast SEO, Rank Math, All in One SEO, SEOPress, and The SEO Framework (Section 30 of READABLE.md) and switches to non-colliding compatibility mode.

### F. OpenSEO Executive Report Generator (`src/Report/ReportGenerator.php`)
- Implements the [OpenSEO `seo-report` standard](file:///c:/laragon/www/cleaniquelaundry/.agents/skills/seo-report/SKILL.md) for generating self-contained, standalone HTML executive reports.
- **Key Characteristics:**
  - **Zero External Dependencies:** No external stylesheets, scripts, web fonts, or CDN assets; total size kept strictly under 80 KB.
  - **Print & PDF Ready:** Full print stylesheet (`@media print`) with page numbering and clean page-break avoidance.
  - **Bounded Recommendations:** Translates diagnostic findings into actionable executive directives following the *Problem / Change / Expected effect* tri-part framework.
  - **11-Dimension Visual Bars:** Inline accessible CSS bars illustrating category scores with exact numerical values.
  - **Full Diagnostic Evidence Table:** Complete tabular findings with severity indicators and code snippet references.
  - **Direct Export & REST Integration:** Downloadable via `admin-post.php?action=seoi_export_report` or consumed programmatically via REST API `/seo-intelligence/v1/report/(?P<id>\d+)`.

