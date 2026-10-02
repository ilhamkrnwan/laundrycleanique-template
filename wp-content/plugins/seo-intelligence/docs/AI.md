# AI Integration & Privacy Safeguards

> **Specification Source:** [READABLE.md](file:///c:/laragon/www/cleaniquelaundry/READABLE.md) — Section 24

---

## 1. Optional AI Philosophy
- **100% Functionality Without AI:** The plugin’s core static, technical, readability, GEO, AEO, and media analyzers function completely offline and without external API keys.
- **AI as Enhancement:** When configured, AI providers (Google Gemini, OpenAI, Anthropic Claude) provide rewrite suggestions for titles, meta descriptions, FAQ generation, and readability improvements.

## 2. Supported AI Providers
- **Google Gemini:** `gemini-1.5-flash` / `gemini-2.0-flash` (via official endpoint)
- **OpenAI:** `gpt-4o-mini` / `gpt-4o`
- **Anthropic Claude:** `claude-3-5-sonnet`

## 3. Privacy & Data Handling
- No user PII or customer database records are ever transmitted to AI models.
- Only the clean public content text of the target post/page being analyzed is sent.
