# Transparent Scoring Formula & Methodology

> **Specification Source:** [READABLE.md](file:///c:/laragon/www/cleaniquelaundry/READABLE.md) — Section 22

---

## 1. Core Scoring Philosophy
1. **Never use black-box scores:** Every deduction must be traced to an observable finding with an exact DOM location and why it matters.
2. **Deterministic & Bounded:** Scores are strictly bounded from 0 to 100.
3. **Transparent Weighting:** Category contributions sum to 100%.

---

## 2. Severity Deductions

Each category starts with a base score of 100 points, then deductions are applied based on findings severity:

| Severity | Penalty Points | Description |
|---|---|---|
| **Critical** | -25 points | Severe violation (e.g. accidental `noindex`, missing `H1`, broken canonical). |
| **Error** | -15 points | Substantial issue (e.g. missing meta description, uncompressed 2MB image). |
| **Warning** | -8 points | Moderate optimization issue (e.g. skipped heading level, long paragraphs). |
| **Notice** | -3 points | Minor suggestion (e.g. meta description slightly long, missing image dimensions). |
| **Success** | +0 points | Confirmed adherence to best practice. |

Category scores cannot drop below 0:
$$\text{CategoryScore} = \max(0, 100 - \sum \text{Deductions})$$

---

## 3. Overall Weighted Score Calculation

$$\text{OverallScore} = \sum_{i=1}^{11} \left( \text{CategoryScore}_i \times \frac{\text{Weight}_i}{100} \right)$$

---

## 4. Customizing Weights

Weights can be adjusted via WordPress Admin (**SEO Intelligence > Pengaturan**) or via the WordPress filter:

```php
add_filter('seo_intelligence_score_weights', function(array $weights) {
    $weights['geo'] = 15;
    $weights['aeo'] = 15;
    $weights['seo'] = 10;
    return $weights;
});
```
