# Security Architecture & Safeguards

> **Specification Source:** [READABLE.md](file:///c:/laragon/www/cleaniquelaundry/READABLE.md) — Section 27

---

## Security Principles

1. **Strict Capability Checks:** All REST API endpoints and admin pages require `manage_options` capability. Regular subscribers or authors cannot view full site audit reports.
2. **Nonce Verification:** Every AJAX request and form submission verifies a cryptographic nonce (`wp_verify_nonce`).
3. **SQL Injection Protection:** All database interactions use `$wpdb->prepare()`. No raw SQL strings are concatenated with user input.
4. **XSS Prevention:** All outputs are strictly escaped with `esc_html()`, `esc_attr()`, and `esc_url()`.
5. **SSRF Protection:** When crawling or auditing internal URLs, only HTTP/HTTPS protocols within the authorized site domain are accepted. Loopbacks and internal intranet IPs are rejected.
6. **Isolated Execution:** DOM parsing disables external entity loading (`libxml_disable_entity_loader`) to prevent XXE attacks.
