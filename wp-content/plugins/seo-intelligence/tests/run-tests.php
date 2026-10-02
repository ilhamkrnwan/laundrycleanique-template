<?php

declare(strict_types=1);

/**
 * Lightweight Standalone Test Runner for SEO & AEO Intelligence.
 * Verifies core engines, analyzers, scoring formulas, and third-party conflict detection.
 */

// Define basic constants to simulate environment
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__, 4) . '/');
}
if (!defined('SEOI_DIR')) {
    define('SEOI_DIR', dirname(__DIR__) . '/');
}

require_once SEOI_DIR . 'src/Core/Autoloader.php';
\SeoIntelligence\Core\Autoloader::register();

// Mock minimal WordPress functions if running standalone CLI
if (!function_exists('__')) {
    function __(string $text, string $domain = 'default'): string { return $text; }
}
if (!function_exists('esc_html__')) {
    function esc_html__(string $text, string $domain = 'default'): string { return $text; }
}
if (!function_exists('esc_attr')) {
    function esc_attr(string $text): string { return htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); }
}
if (!function_exists('esc_html')) {
    function esc_html(string $text): string { return htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); }
}
if (!function_exists('esc_url')) {
    function esc_url(string $url): string { return $url; }
}
if (!function_exists('esc_url_raw')) {
    function esc_url_raw(string $url): string { return $url; }
}
if (!function_exists('apply_filters')) {
    function apply_filters(string $hook, mixed $value, ...$args): mixed { return $value; }
}
if (!function_exists('do_action')) {
    function do_action(string $hook, ...$args): void {}
}
if (!function_exists('get_option')) {
    function get_option(string $key, mixed $default = false): mixed { return $default; }
}
if (!function_exists('home_url')) {
    function home_url(string $path = ''): string { return 'https://cleaniquelaundry.com' . $path; }
}
if (!function_exists('untrailingslashit')) {
    function untrailingslashit(string $string): string { return rtrim($string, '/\\'); }
}

$passed = 0;
$failed = 0;

function assertTest(string $name, bool $condition, string $detail = ''): void {
    global $passed, $failed;
    if ($condition) {
        echo "  [PASS] {$name}\n";
        $passed++;
    } else {
        echo "  [FAIL] {$name}: {$detail}\n";
        $failed++;
    }
}

echo "=== Running SEO & AEO Intelligence Test Suite ===\n\n";

// 1. Test Scoring Engine & Score Weights
echo "1. Testing Scoring System & Weights:\n";
$weights = \SeoIntelligence\Scoring\ScoreWeights::getWeights();
$totalWeights = array_sum($weights);
assertTest("Total scoring weights sum to 100", $totalWeights === 100, "Current sum: {$totalWeights}");

// Test transparent score calculation
$mockFindings = [
    \SeoIntelligence\Analysis\Finding::issue(
        id: 'test-crit',
        analyzerId: 'seo',
        severity: \SeoIntelligence\Analysis\Severity::CRITICAL,
        title: 'Critical Issue',
        description: 'Testing critical',
        whyItMatters: 'Important',
        recommendation: 'Fix it'
    ),
    \SeoIntelligence\Analysis\Finding::success(
        id: 'test-success',
        analyzerId: 'seo',
        title: 'Optimal Title',
        description: 'Title is good'
    )
];

$calcResults = \SeoIntelligence\Scoring\ScoreCalculator::calculate([
    'seo' => new \SeoIntelligence\Analysis\AnalysisResult(
        analyzerId: 'seo',
        category: \SeoIntelligence\Scoring\ScoreCategory::SEO,
        findings: $mockFindings
    )
]);
assertTest("Score summary calculated", isset($calcResults['overall']));
assertTest("Overall score is bounded between 0 and 100", $calcResults['overall'] >= 0 && $calcResults['overall'] <= 100, "Score: {$calcResults['overall']}");
assertTest("Critical count is captured", $calcResults['critical_count'] === 1);

// 2. Test Heading Hierarchy Parser
echo "\n2. Testing Heading Hierarchy Analyzer:\n";
$html = <<<HTML
<!DOCTYPE html>
<html>
<head><title>Test Page</title></head>
<body>
    <h1>Cleanique Laundry - Peluang Usaha Terbaik</h1>
    <h2>Kenapa Memilih Kami?</h2>
    <p>Penjelasan fasilitas.</p>
    <h4>Langsung H4 (Skipped H3 Level)</h4>
</body>
</html>
HTML;
$context = new \SeoIntelligence\Analysis\AnalysisContext(
    url: 'https://cleaniquelaundry.com/paket-usaha',
    rawHtml: $html
);
$headingAnalyzer = new \SeoIntelligence\Analyzers\Headings\HeadingAnalyzer();
$headingResult = $headingAnalyzer->analyze($context);
$findingIds = array_map(fn($f) => $f->id, $headingResult->findings);
assertTest("Detected skipped heading level (H2 directly to H4)", in_array('heading-skipped-level-1', $findingIds, true));
assertTest("Detected valid single H1", in_array('heading-single-h1-valid', $findingIds, true));

// 3. Test Readability Analyzer (Indonesian formulas)
echo "\n3. Testing Readability Analyzer:\n";
$readabilityAnalyzer = new \SeoIntelligence\Analyzers\Readability\ReadabilityAnalyzer();
$readResult = $readabilityAnalyzer->analyze($context);
assertTest("Readability analyzer completes without error", count($readResult->findings) > 0);

// 4. Test Robots & Bot Crawling Manager
echo "\n4. Testing Robots.txt & Bot Crawling Manager:\n";
$robotsManager = new \SeoIntelligence\Robots\RobotsManager();
$robotsTxt = $robotsManager->getGeneratedRobotsTxt();
assertTest("Robots.txt contains Googlebot directive", str_contains($robotsTxt, 'User-agent: Googlebot'));
assertTest("Robots.txt contains AI Crawler (GPTBot)", str_contains($robotsTxt, 'User-agent: GPTBot'));
assertTest("Robots.txt contains Answer Engine (PerplexityBot)", str_contains($robotsTxt, 'User-agent: PerplexityBot'));
assertTest("Robots.txt contains Sitemap URL reference", str_contains($robotsTxt, 'Sitemap: https://cleaniquelaundry.com/sitemap.xml'));

// 5. Test Third-Party SEO Plugin Detector (Section 30 of READABLE.md)
echo "\n5. Testing Third-Party SEO Plugin Detector:\n";
$isThirdParty = \SeoIntelligence\Core\SeoPluginDetector::isThirdPartySeoActive();
assertTest("Correctly detects no third-party SEO in clean test environment", !$isThirdParty);

echo "\n==================================================\n";
echo "Results: {$passed} Passed, {$failed} Failed\n";
echo "==================================================\n";

exit($failed > 0 ? 1 : 0);
