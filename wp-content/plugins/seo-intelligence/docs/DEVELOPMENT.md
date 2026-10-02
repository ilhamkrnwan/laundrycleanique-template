# Developer Workflow & Testing Guide

> **Specification Source:** [READABLE.md](file:///c:/laragon/www/cleaniquelaundry/READABLE.md) — Sections 35 & 39

---

## 1. Running Tests
The plugin includes a zero-dependency CLI test runner:

```bash
php wp-content/plugins/seo-intelligence/tests/run-tests.php
```

This validates:
- Score weights normalization to 100%
- Transparent calculation engine
- Heading hierarchy parser
- Readability formulas
- Robots.txt and AI bot crawling directives
- Third-party SEO conflict detector

## 2. Coding Standards
- Strictly typed PHP 8.1+ (`declare(strict_types=1);`)
- Typed properties and return types on all functions
- Zero raw SQL without `$wpdb->prepare()`
- PSR-4 compliant autoloader in `src/Core/Autoloader.php`
