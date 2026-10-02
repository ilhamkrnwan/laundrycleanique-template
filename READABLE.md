# Build a Production-Grade WordPress SEO/GEO/AEO Intelligence Plugin

You are a senior WordPress plugin architect, PHP engineer, SEO engineer, technical SEO specialist, accessibility specialist, web performance engineer, and information architecture expert.

Build a production-grade custom WordPress plugin whose purpose is to analyze and improve the overall quality of WordPress websites.

This is NOT a simple SEO score plugin.

The plugin must analyze:

1. Content
2. Readability
3. Headings
4. Images
5. Media assets
6. CSS
7. JavaScript
8. Fonts
9. Accessibility
10. Technical SEO
11. GEO — Generative Engine Optimization
12. AEO — Answer Engine Optimization
13. Structured data
14. Internal linking
15. Performance-related signals
16. Site-wide content health
17. AI-assisted recommendations

The system must be modular, extensible, explainable, and maintainable.

Do not create a monolithic plugin file.

---

# 1. CORE OBJECTIVE

Create a WordPress plugin that answers:

> "How healthy, understandable, accessible, indexable, answerable, and machine-readable is this website?"

The plugin should provide two primary analysis modes:

## Page Analysis

Analyze a single URL/post/page.

Example:

```text
Page Health
82 / 100

Content       87
Readability   91
SEO           88
GEO           74
AEO           81
Images        68
Accessibility 79
Assets        71
Performance   83
Schema        90
```

## Site Analysis

Analyze the entire WordPress website.

Example:

```text
Site Health

Pages analyzed: 127

Critical issues: 12
Warnings: 34
Suggestions: 81

SEO              84
Content          79
Readability      86
Images           71
Accessibility    77
GEO              68
AEO              73
Assets           69
Performance      82
Schema           88
```

Never rely on one opaque overall score.

Every score must be explainable through individual checks.

---

# 2. ENGINEERING PRINCIPLES

Follow these principles:

- WordPress-native architecture
- PHP 8.1+
- Modern PHP practices
- WordPress coding standards where practical
- Modular architecture
- Separation of concerns
- Dependency injection where useful
- No unnecessary framework dependency
- No unnecessary build system
- Secure by default
- Capability checks
- Nonce verification
- Sanitization
- Escaping
- Prepared SQL queries
- REST API authentication
- Graceful failure
- Extensible analyzer architecture
- Extensible scoring architecture
- Extensible AI provider architecture

Do NOT:

- modify WordPress core
- modify theme files automatically
- inject random SEO markup globally
- blindly rewrite content
- blindly generate schema
- automatically change user content without explicit confirmation
- depend on a specific theme
- depend on Elementor/Oxygen/Divi
- depend on Yoast
- depend on Rank Math

The plugin must work with custom themes and normal WordPress themes.

---

# 3. PLUGIN ARCHITECTURE

Use a structure similar to:

```text
seo-intelligence/
│
├── seo-intelligence.php
├── uninstall.php
├── readme.txt
├── composer.json
│
├── src/
│   │
│   ├── Core/
│   │   ├── Plugin.php
│   │   ├── Container.php
│   │   ├── Hooks.php
│   │   └── Config.php
│   │
│   ├── Analysis/
│   │   ├── AnalyzerInterface.php
│   │   ├── AnalysisManager.php
│   │   ├── AnalysisContext.php
│   │   ├── AnalysisResult.php
│   │   ├── Finding.php
│   │   └── Severity.php
│   │
│   ├── Analyzers/
│   │   ├── Content/
│   │   ├── Readability/
│   │   ├── Headings/
│   │   ├── Images/
│   │   ├── Assets/
│   │   ├── Accessibility/
│   │   ├── SEO/
│   │   ├── GEO/
│   │   ├── AEO/
│   │   ├── Schema/
│   │   ├── Links/
│   │   └── Performance/
│   │
│   ├── Scoring/
│   │   ├── ScoreCalculator.php
│   │   ├── ScoreCategory.php
│   │   └── ScoreWeights.php
│   │
│   ├── Crawler/
│   │   ├── SiteCrawler.php
│   │   ├── URLQueue.php
│   │   └── CrawlResult.php
│   │
│   ├── Media/
│   │   ├── ImageAnalyzer.php
│   │   └── AssetAnalyzer.php
│   │
│   ├── Schema/
│   │   ├── SchemaDetector.php
│   │   ├── SchemaValidator.php
│   │   └── SchemaTypes/
│   │
│   ├── AI/
│   │   ├── AIProviderInterface.php
│   │   ├── AIManager.php
│   │   └── Providers/
│   │
│   ├── REST/
│   │   ├── AnalysisController.php
│   │   ├── SiteAuditController.php
│   │   └── SettingsController.php
│   │
│   ├── Admin/
│   │   ├── AdminMenu.php
│   │   ├── Dashboard.php
│   │   ├── PageAudit.php
│   │   ├── SiteAudit.php
│   │   └── Settings.php
│   │
│   └── Database/
│       ├── Schema.php
│       └── Repository/
│
├── assets/
│   ├── css/
│   └── js/
│
├── templates/
│
└── tests/
```

Adjust this structure if there is a technically better architecture, but preserve the separation between:

- analysis
- scoring
- crawling
- presentation
- storage
- AI
- WordPress integration

---

# 4. ANALYZER ENGINE

Create a generic analyzer contract.

Conceptually:

```php
interface AnalyzerInterface
{
    public function getId(): string;

    public function getName(): string;

    public function getCategory(): string;

    public function analyze(AnalysisContext $context): AnalysisResult;
}
```

Each analyzer should return structured findings.

Example:

```json
{
  "id": "missing-image-alt",
  "severity": "warning",
  "score": 0,
  "title": "Image is missing alternative text",
  "description": "This image does not provide an alt attribute.",
  "recommendation": "Add descriptive alternative text.",
  "location": "content",
  "metadata": {}
}
```

Severity levels:

```text
critical
error
warning
notice
success
info
```

Every finding must explain:

- what is wrong
- why it matters
- where it occurs
- how to fix it

---

# 5. CONTENT ANALYZER

Analyze the actual page content.

Checks should include:

- word count
- paragraph count
- sentence count
- average sentence length
- average paragraph length
- content density
- content structure
- introduction quality
- conclusion quality
- CTA presence
- duplicated paragraphs
- thin content
- excessive repetition
- keyword/topic repetition
- topic coverage
- semantic relevance
- content completeness

Do not use simplistic keyword density as the primary measure.

Analyze the page as a document.

---

# 6. READABILITY ANALYZER

Create a dedicated readability engine.

Analyze:

- sentence length
- paragraph length
- word complexity
- excessive jargon
- passive constructions where detectable
- excessive subordinate clauses
- excessive punctuation
- excessive headings
- insufficient headings
- walls of text
- excessive list usage
- readability score

Support Indonesian content properly.

Do NOT assume English-only readability formulas.

The analyzer should be language-aware.

Example:

```text
Readability: 86

Good:
✓ Average paragraph length: 58 words
✓ Heading distribution is healthy

Warnings:
⚠ 7 sentences contain more than 30 words
⚠ Section "Layanan" contains a 280-word paragraph

Recommendation:
Break the paragraph into 3 smaller paragraphs.
```

---

# 7. HEADING ANALYZER

Analyze:

- H1 count
- H1 quality
- H2-H6 hierarchy
- skipped heading levels
- empty headings
- duplicate headings
- heading length
- heading descriptiveness
- heading semantic relevance
- headings that are only decorative
- heading structure relative to content

Build a visual hierarchy:

```text
H1
├── H2
│   ├── H3
│   └── H3
├── H2
│   └── H3
└── H2
```

Flag problems such as:

```text
H1
H3
H2
H4
```

But do not blindly treat every skipped level as catastrophic.

Explain the actual semantic problem.

---

# 8. IMAGE ANALYZER

This is a major component.

Analyze every relevant image.

For every image inspect:

- alt attribute
- alt quality
- title attribute where relevant
- filename
- file type
- MIME type
- width
- height
- aspect ratio
- file size
- compression
- WebP availability
- AVIF availability
- srcset
- sizes
- lazy loading
- width/height attributes
- loading behavior
- decoding
- fetchpriority
- image placement
- contextual relevance
- duplicate images
- oversized images
- potentially unused images
- LCP candidate images

Do NOT consider:

```text
alt="image"
alt="photo"
alt="img"
```

to be useful descriptions.

Analyze image context:

```text
Heading
+
paragraph surrounding image
+
alt
+
caption
+
filename
+
page topic
```

Then determine whether the image is semantically understandable.

Example:

```text
Image: IMG_1234.jpg

ALT:
"product"

Context:
"Mesin cuci industrial untuk kebutuhan laundry."

Finding:
ALT is technically present but semantically weak.

Suggestion:
"Mesin cuci industrial untuk usaha laundry"
```

Also identify:

```text
Hero image
Content image
Decorative image
Logo
Icon
Avatar
Background image
```

Do not require ALT for purely decorative images.

---

# 9. ASSET ANALYZER

Analyze all assets loaded by a page.

## CSS

Check:

- number of CSS files
- total CSS size
- individual CSS size
- duplicate CSS
- render-blocking CSS
- external CSS
- unused CSS where technically detectable
- CSS loaded globally but only needed on specific pages

## JavaScript

Check:

- number of JS files
- total JS size
- individual JS size
- duplicate JS
- blocking scripts
- defer
- async
- inline scripts
- third-party scripts
- scripts loaded globally
- potentially unnecessary scripts

## Fonts

Analyze:

- number of font families
- font formats
- font weights
- font styles
- font loading
- font-display
- preload
- external font providers

Flag unnecessary font weights.

## Icons

Detect:

- icon fonts
- SVG icons
- inline SVG
- image icons

## Third-party assets

Identify:

- analytics
- tracking
- advertisements
- chat widgets
- social embeds
- external libraries
- external fonts
- third-party scripts

Display a dependency overview.

Example:

```text
Assets

CSS: 8 files / 214 KB
JS: 17 files / 611 KB
Fonts: 5 files / 430 KB
Images: 31 / 2.8 MB

Third-party:
Google Analytics
Google Fonts
WhatsApp widget
Meta Pixel
```

---

# 10. ACCESSIBILITY ANALYZER

Analyze:

- image alt
- form labels
- button names
- link names
- heading hierarchy
- semantic HTML
- ARIA usage
- empty links
- empty buttons
- iframe titles
- input labels
- language attribute
- HTML lang
- contrast where technically possible
- keyboard-related structural issues

Do not claim that automated analysis can fully validate accessibility.

Clearly distinguish:

```text
Automatically detected
Potential issue
Requires manual verification
```

---

# 11. TECHNICAL SEO ANALYZER

Analyze:

- title
- meta description
- canonical
- robots meta
- robots.txt
- sitemap
- indexability
- noindex
- nofollow
- URL structure
- slug
- duplicate titles
- duplicate meta descriptions
- duplicate H1
- internal links
- external links
- broken links
- redirect chains where detectable
- image SEO
- structured data
- language
- Open Graph
- Twitter/X cards
- pagination
- breadcrumbs

Do not conflict destructively with Yoast or Rank Math.

Detect existing SEO plugins.

If another SEO plugin controls a feature, report it instead of blindly overriding it.

---

# 12. GEO ANALYZER

GEO means Generative Engine Optimization.

The objective is not "ranking higher because AI".

The objective is to make the content easier for generative systems to understand, contextualize, and retrieve.

Analyze:

## Entity clarity

Identify:

- organization
- business
- product
- service
- person
- location
- industry
- topic

Check whether important entities are clearly defined.

## Business information

Look for:

- business name
- address
- phone
- email
- opening hours
- service area
- official website
- social profiles

## Factual clarity

Detect important factual claims.

Check whether claims are:

- specific
- understandable
- contextualized
- supported by references where appropriate

## Content context

Analyze whether the page clearly answers:

```text
Who?
What?
Where?
When?
Why?
How?
```

## Machine readability

Check:

- semantic HTML
- structured data
- explicit entities
- clear definitions
- headings
- lists
- tables
- FAQs
- concise answer sections

Never claim that the plugin can guarantee inclusion or citation by ChatGPT, Google AI, Gemini, Perplexity, or other generative systems.

---

# 13. AEO ANALYZER

AEO means Answer Engine Optimization.

Analyze whether content provides direct answers.

Detect:

- questions
- FAQ sections
- definitions
- how-to sections
- numbered procedures
- concise answer paragraphs
- comparison tables
- bullet lists
- explicit answers

Example:

```text
Question detected:

"Berapa harga jasa pembuatan website?"

Current content:
The page discusses services but does not provide a direct answer.

Recommendation:
Create a concise answer section before the detailed explanation.
```

Analyze answer completeness.

Do not encourage spammy FAQ blocks.

Only recommend FAQ content when it naturally corresponds to the page topic.

---

# 14. STRUCTURED DATA ANALYZER

Detect existing JSON-LD.

Support detection for:

- Organization
- LocalBusiness
- WebSite
- WebPage
- Article
- BlogPosting
- Product
- Service
- FAQPage
- BreadcrumbList
- Person
- Event

Check:

- validity
- completeness
- consistency with visible content
- duplicate schema
- conflicting schema
- missing important properties

Do not generate false structured data.

Never create fake reviews, ratings, prices, addresses, or business information.

---

# 15. INTERNAL LINKING ANALYZER

Analyze:

- inbound links
- outbound internal links
- orphan pages
- anchor text
- contextual relevance
- excessive identical anchors
- important pages with few internal links
- pages with excessive internal links
- link depth

Generate a site graph conceptually:

```text
Homepage
 ├── Services
 │    ├── Service A
 │    └── Service B
 ├── About
 └── Blog
      ├── Article A
      └── Article B
```

Identify pages that are difficult to reach.

---

# 16. PERFORMANCE ANALYZER

Analyze what can be determined from WordPress/server/page HTML.

Check:

- HTML size
- CSS size
- JS size
- image size
- font size
- number of requests where detectable
- lazy loading
- preload
- preconnect
- render-blocking resources
- image dimensions
- LCP candidate
- CLS risks
- third-party resources

Do not pretend to measure Core Web Vitals accurately from static HTML alone.

Clearly separate:

```text
Static analysis
Runtime analysis
External measurement
```

Allow future integration with PageSpeed Insights / Lighthouse APIs.

---

# 17. SITE CRAWLER

Implement a site-wide analysis system.

It should discover URLs from:

- WordPress posts
- pages
- custom post types
- taxonomies
- menus
- internal links
- sitemap

Avoid uncontrolled recursive crawling.

Respect:

- WordPress permissions
- crawl limits
- timeouts
- memory limits

Use background processing for large websites.

Do not run a 5,000-page crawl inside one normal admin request.

Use queued/background jobs where appropriate.

Store crawl status:

```text
Queued
Running
Paused
Completed
Failed
```

Allow:

```text
Start Audit
Pause
Resume
Cancel
Re-run Failed
```

---

# 18. DATABASE

Do not store huge HTML documents unnecessarily.

Create appropriate tables for:

```text
audits
audit_pages
audit_findings
audit_assets
audit_links
audit_scores
```

Store normalized information where practical.

Use WordPress database APIs and prepared queries.

Provide cleanup/uninstall behavior.

---

# 19. SCORING SYSTEM

Scores must be transparent.

Example:

```text
SEO =

Technical SEO       30%
Content              20%
Links                15%
Metadata             15%
Schema               10%
Images               10%
```

But do not hard-code arbitrary weights everywhere.

Centralize weights.

Make the scoring engine configurable.

Every score must be traceable:

```text
SEO: 82

Technical SEO
████████████████░░ 84

Metadata
██████████████████ 91

Links
██████████████░░░░ 72

Schema
█████████████████░ 87
```

Do not use scores as the only output.

Always show findings.

---

# 20. ADMIN UI

Create a clean WordPress admin interface.

Primary navigation:

```text
SEO Intelligence

├── Dashboard
├── Page Audit
├── Site Audit
├── Issues
├── Images
├── Assets
├── Links
├── Schema
├── AI Recommendations
└── Settings
```

Dashboard should show:

```text
Site Health

SEO             84
GEO             71
AEO             78
Content         82
Readability     88
Images          69
Accessibility   77
Assets          73
Performance     81
Schema          90
```

Then:

```text
Critical Issues
Warnings
Quick Wins
Recent Audits
```

Use progressive disclosure.

Do not overwhelm the user with hundreds of findings immediately.

---

# 21. PAGE AUDIT UI

For every page display:

```text
Page title

Overall Health
82 / 100

SEO        88
GEO        74
AEO        81
Content    87
Images     68
Assets     71
```

Then:

```text
Critical
Warnings
Passed
Suggestions
```

Each finding should have:

```text
Problem
Why it matters
Location
Recommendation
```

Where possible, provide:

```text
View element
Copy suggestion
Open editor
```

Do not automatically modify content without confirmation.

---

# 22. IMAGE DASHBOARD

Create a dedicated image inventory.

Columns:

```text
Image
Filename
Dimensions
Size
Format
ALT
ALT Quality
Lazy
Responsive
Context
Issues
```

Filters:

```text
Missing ALT
Weak ALT
Large files
PNG
JPEG
No WebP
No AVIF
No dimensions
Potential LCP
Unused
Duplicate
```

---

# 23. ASSET DASHBOARD

Show:

```text
Asset
Type
Size
Source
Loaded on
Blocking?
Third-party?
Potential issue
```

Group by:

```text
CSS
JS
Fonts
Images
Third-party
```

---

# 24. AI LAYER

AI must be optional.

The plugin must work completely without AI.

Create:

```php
interface AIProviderInterface
{
    public function analyze(array $context): AIResponse;
}
```

Potential providers:

```text
OpenAI
Anthropic
Google
Custom OpenAI-compatible endpoint
```

Do not hard-code one provider.

AI should primarily be used for:

- semantic content analysis
- topic understanding
- heading suggestions
- readability suggestions
- GEO entity analysis
- AEO question detection
- image ALT suggestions
- content improvement suggestions

AI should NOT blindly modify content.

Provide:

```text
Current
Suggested
Reason
Apply
```

---

# 25. AI PRIVACY

Do not send content to an AI provider unless the user explicitly enables AI analysis.

Clearly display:

```text
This analysis may send page content to the configured AI provider.
```

Provide settings to disable AI.

Never send:

- passwords
- authentication tokens
- private user data
- unnecessary database data
- unpublished private information

unless explicitly required and authorized.

---

# 26. WORDPRESS INTEGRATION

Use WordPress hooks properly.

Support:

- posts
- pages
- custom post types
- taxonomies

Use:

```text
add_action
add_filter
register_rest_route
wp_enqueue_script
wp_enqueue_style
wp_remote_get
wp_get_attachment_metadata
wp_get_attachment_image_src
wp_get_attachment_image_url
```

where appropriate.

Do not use raw filesystem access when WordPress APIs are sufficient.

---

# 27. SECURITY

Treat all admin input as untrusted.

Implement:

- capability checks
- nonce checks
- escaping
- sanitization
- prepared SQL
- REST permission callbacks
- SSRF protection for external URL fetching
- rate limiting where appropriate
- safe background processing

Only administrators or explicitly authorized capabilities may run site-wide audits.

Do not expose audit data publicly.

---

# 28. PERFORMANCE

The plugin itself must not make WordPress slower.

Important rules:

- Do not analyze everything on every page request.
- Do not crawl synchronously.
- Do not load admin assets on every WordPress admin page.
- Do not run expensive DOM analysis repeatedly.
- Cache analysis results.
- Invalidate cache intelligently.
- Use background jobs for site audits.
- Analyze only when requested or when relevant content changes.

The plugin must remain lightweight when idle.

---

# 29. EXTENSIBILITY

Provide WordPress hooks for third-party extensions.

Examples:

```php
do_action(
    'seo_intelligence_before_analysis',
    $context
);
```

```php
apply_filters(
    'seo_intelligence_analyzers',
    $analyzers
);
```

```php
apply_filters(
    'seo_intelligence_score_weights',
    $weights
);
```

Allow future analyzers to be registered without modifying the core plugin.

---

# 30. DETECT OTHER SEO PLUGINS

Detect:

```text
Yoast SEO
Rank Math
All in One SEO
SEOPress
The SEO Framework
```

Do not automatically disable or override them.

Instead show:

```text
SEO Plugin Detected

Yoast SEO is active.

SEO Intelligence will perform analysis only
and will not override Yoast metadata unless explicitly configured.
```

Avoid duplicate meta tags and duplicate schema.

---

# 31. ACCESSIBILITY OF THE PLUGIN UI

The plugin's own admin interface must follow accessibility best practices.

Use:

- semantic HTML
- keyboard navigation
- accessible labels
- focus states
- ARIA only when necessary
- readable contrast
- screen-reader-friendly status messages

---

# 32. INTERNATIONALIZATION

Prepare the plugin for translation.

Use WordPress localization functions:

```php
__
_e
esc_html__
esc_attr__
```

Text domain:

```text
seo-intelligence
```

Initial language:

```text
English
```

Structure the plugin so Indonesian translation can be added later.

---

# 33. REST API

Create REST endpoints for:

```text
GET  /analysis/page/{id}
POST /analysis/page/{id}
POST /analysis/site/start
GET  /analysis/site/{id}
POST /analysis/site/{id}/pause
POST /analysis/site/{id}/resume
POST /analysis/site/{id}/cancel

GET /issues
GET /images
GET /assets
GET /schema
GET /settings
POST /settings
```

Use WordPress REST authentication and permission callbacks.

Do not expose sensitive data.

---

# 34. ERROR HANDLING

Every subsystem must fail gracefully.

Example:

If image metadata cannot be read:

```text
Image analysis unavailable for this image.
```

Do not crash the entire audit.

If AI fails:

```text
AI analysis unavailable.
Static analysis completed successfully.
```

If crawler fails:

```text
URL failed
Reason
Retry
```

---

# 35. TESTING

Create tests for:

## Unit tests

- heading parser
- image analyzer
- readability analyzer
- metadata analyzer
- schema detector
- scoring engine
- link analyzer

## Integration tests

- WordPress post analysis
- REST endpoints
- crawler
- database storage
- permissions

## Security tests

- nonce validation
- capability validation
- REST authorization
- SQL injection protection
- XSS prevention
- SSRF protection

---

# 36. SAMPLE FINDINGS

The plugin should produce findings similar to:

```text
ERROR

Missing H1

This page does not contain a clear primary heading.

Recommendation:
Add one descriptive H1 representing the main topic of the page.
```

```text
WARNING

Weak image ALT

Image:
IMG_8492.jpg

Current ALT:
"photo"

Recommendation:
Describe the meaningful subject of the image in context.
```

```text
WARNING

Large image

Image:
hero.jpg

Size:
1.8 MB

Recommendation:
Compress and serve an appropriately sized WebP or AVIF image.
```

```text
NOTICE

Long paragraph

Section:
"About Us"

Length:
327 words

Recommendation:
Split the section into smaller paragraphs or subsections.
```

```text
WARNING

Weak answerability

The page discusses pricing but does not provide a concise answer
to the detected pricing-related question.

Recommendation:
Add a direct answer followed by supporting details.
```

```text
WARNING

Entity ambiguity

The organization is mentioned several times but its identity,
location, and primary service are not clearly established.

Recommendation:
Provide a concise organization description and appropriate
structured data.
```

---

# 37. IMPORTANT: DO NOT FAKE ANALYSIS

Never create fake metrics.

If something cannot be reliably measured, say:

```text
Not available
Requires runtime testing
Requires manual verification
```

Do not pretend static PHP analysis can know:

- actual Core Web Vitals
- actual Google ranking
- whether Google AI will cite a page
- whether ChatGPT will recommend a page
- exact search volume
- exact search position

The plugin is an analysis and optimization assistant, not a search-engine oracle.

---

# 38. DEVELOPMENT PHASES

Implement in phases.

## Phase 1 — Foundation

Build:

- plugin bootstrap
- architecture
- analyzer interface
- analysis context
- finding system
- scoring system
- admin menu
- database schema

## Phase 2 — Content Engine

Implement:

- content analyzer
- readability analyzer
- heading analyzer

## Phase 3 — Media

Implement:

- image analyzer
- asset analyzer
- image dashboard
- asset dashboard

## Phase 4 — Technical SEO

Implement:

- metadata
- canonical
- robots
- sitemap detection
- links
- schema
- indexability

## Phase 5 — GEO/AEO

Implement:

- entity analysis
- contextual analysis
- question detection
- answerability
- structured information analysis

## Phase 6 — Site Audit

Implement:

- crawler
- queue
- background processing
- site-wide findings
- site dashboard

## Phase 7 — AI

Implement:

- provider abstraction
- AI settings
- AI suggestions
- semantic analysis

## Phase 8 — Polish

Implement:

- accessibility
- security hardening
- performance optimization
- tests
- documentation
- internationalization

Do not attempt to build every feature in one giant implementation.

---

# 39. DEVELOPMENT WORKFLOW

Before writing significant code:

1. Inspect the existing repository.
2. Understand the current WordPress version.
3. Inspect theme structure.
4. Inspect existing plugins.
5. Detect whether Yoast/Rank Math/etc. exists.
6. Inspect PHP version.
7. Inspect composer configuration.
8. Inspect build tooling.
9. Determine whether an existing plugin architecture exists.
10. Do not overwrite existing code blindly.

If this repository already contains code, preserve compatible existing functionality.

Before implementing each subsystem:

1. Explain the intended architecture.
2. Implement the subsystem.
3. Run static analysis/linting.
4. Run tests.
5. Fix errors.
6. Continue to the next subsystem.

Do not skip directly to a giant implementation.

---

# 40. CODE QUALITY

Prefer:

```text
small classes
single responsibility
typed properties
typed return values
clear interfaces
small methods
explicit dependencies
```

Avoid:

```text
God classes
global state
huge functions
duplicated logic
hard-coded configuration
raw SQL without preparation
inline JavaScript everywhere
```

Do not over-engineer.

The architecture should be professional but practical for a custom WordPress plugin.

---

# 41. DOCUMENTATION

Create:

```text
README.md
ARCHITECTURE.md
DEVELOPMENT.md
ANALYZERS.md
SCORING.md
SECURITY.md
AI.md
```

Document:

- installation
- architecture
- analyzer system
- scoring
- REST API
- database
- extension hooks
- AI providers
- security considerations
- development workflow

---

# 42. DEFINITION OF DONE

The project is considered complete only when:

- plugin activates successfully
- no PHP fatal errors
- admin dashboard works
- page audit works
- site audit architecture works
- analyzers return structured findings
- scoring is explainable
- images are analyzed
- assets are analyzed
- readability is analyzed
- headings are analyzed
- SEO is analyzed
- GEO is analyzed
- AEO is analyzed
- schema is analyzed
- accessibility is analyzed
- internal links are analyzed
- performance-related static signals are analyzed
- findings have severity
- recommendations explain the problem
- security checks exist
- REST API is protected
- large audits do not block normal requests
- AI is optional
- plugin works without AI
- existing SEO plugins are not destructively overridden
- documentation exists
- tests exist for the core analysis engine

---

# 43. FINAL PRODUCT PHILOSOPHY

The plugin should NOT feel like:

> "Another SEO score plugin."

It should feel like:

> "A technical and semantic quality-control system for WordPress websites."

Its core principle is:

```text
Understand the page
        ↓
Understand the content
        ↓
Understand the structure
        ↓
Understand the media
        ↓
Understand the assets
        ↓
Understand the entities
        ↓
Understand the answers
        ↓
Identify problems
        ↓
Explain why
        ↓
Recommend improvements
        ↓
Let the human decide whether to apply them
```

Build the system so that every recommendation can be traced back to an observable piece of the website.

Do not optimize for arbitrary scores.

Optimize for:

- human readability
- semantic clarity
- accessibility
- technical quality
- search-engine understanding
- machine understanding
- answerability
- maintainability
- performance
- trustworthy structured information

Start by inspecting the repository and producing a concise architecture assessment before implementing Phase 1.
