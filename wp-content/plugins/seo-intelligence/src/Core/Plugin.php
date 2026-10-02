<?php

declare(strict_types=1);

namespace SeoIntelligence\Core;

use SeoIntelligence\Analysis\AnalysisManager;
use SeoIntelligence\Database\Repository\AuditRepository;
use SeoIntelligence\Database\Schema;
use SeoIntelligence\Admin\AdminMenu;
use SeoIntelligence\REST\AnalysisController;
use SeoIntelligence\REST\SiteAuditController;
use SeoIntelligence\Sitemap\SitemapManager;
use SeoIntelligence\Robots\RobotsManager;
use SeoIntelligence\Frontend\FrontendMetaManager;

/**
 * Master Plugin Lifecycle Orchestrator.
 */
final class Plugin
{
    private static ?self $instance = null;
    private Container $container;
    private bool $booted = false;

    private function __construct()
    {
        $this->container = new Container();
        $this->registerServices();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * Register core services in the container.
     */
    private function registerServices(): void
    {
        $this->container->set('config', new Config());
        $this->container->set('analysis_manager', new AnalysisManager());
        $this->container->set('audit_repository', new AuditRepository());
        $this->container->set('admin_menu', new AdminMenu($this->container));
        $this->container->set('rest_analysis', new AnalysisController($this->container));
        $this->container->set('rest_crawler', new SiteAuditController($this->container));
        $this->container->set('sitemap_manager', new SitemapManager());
        $this->container->set('robots_manager', new RobotsManager());
        $this->container->set('frontend_meta', new FrontendMetaManager());
    }

    /**
     * Boot all systems and register WordPress action hooks.
     */
    public function boot(): void
    {
        if ($this->booted) {
            return;
        }
        $this->booted = true;

        // Register default analyzers
        $this->registerAnalyzers();

        // Register XML Sitemap, Robots.txt & Frontend Metadata managers
        /** @var SitemapManager $sitemapManager */
        $sitemapManager = $this->container->get('sitemap_manager');
        $sitemapManager->register();

        /** @var RobotsManager $robotsManager */
        $robotsManager = $this->container->get('robots_manager');
        $robotsManager->register();

        /** @var FrontendMetaManager $frontendMeta */
        $frontendMeta = $this->container->get('frontend_meta');
        $frontendMeta->register();

        // Register Admin Menu & Assets
        if (is_admin()) {
            /** @var AdminMenu $adminMenu */
            $adminMenu = $this->container->get('admin_menu');
            $adminMenu->register();

            add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
        }

        // Register REST API Endpoints
        add_action('rest_api_init', function () {
            /** @var AnalysisController $restAnalysis */
            $restAnalysis = $this->container->get('rest_analysis');
            $restAnalysis->registerRoutes();

            /** @var SiteAuditController $restCrawler */
            $restCrawler = $this->container->get('rest_crawler');
            $restCrawler->registerRoutes();
        });
    }

    /**
     * Register core analyzer instances into AnalysisManager.
     */
    private function registerAnalyzers(): void
    {
        /** @var AnalysisManager $manager */
        $manager = $this->container->get('analysis_manager');

        // 1. Content & Readability Subsystem
        $manager->register(new \SeoIntelligence\Analyzers\Content\ContentAnalyzer());
        $manager->register(new \SeoIntelligence\Analyzers\Readability\ReadabilityAnalyzer());
        $manager->register(new \SeoIntelligence\Analyzers\Headings\HeadingAnalyzer());

        // 2. Media & Assets Subsystem
        $manager->register(new \SeoIntelligence\Analyzers\Images\ImageAnalyzer());
        $manager->register(new \SeoIntelligence\Analyzers\Assets\AssetAnalyzer());

        // 3. Technical SEO & Schema Subsystem
        $manager->register(new \SeoIntelligence\Analyzers\SEO\TechnicalSeoAnalyzer());
        $manager->register(new \SeoIntelligence\Analyzers\Schema\SchemaAnalyzer());
        $manager->register(new \SeoIntelligence\Analyzers\Links\LinkAnalyzer());

        // 4. GEO & AEO Intelligence Subsystem
        $manager->register(new \SeoIntelligence\Analyzers\GEO\GeoAnalyzer());
        $manager->register(new \SeoIntelligence\Analyzers\AEO\AeoAnalyzer());

        // 5. UX & Mobile Subsystem
        $manager->register(new \SeoIntelligence\Analyzers\UX\UxMobileAnalyzer());

        // Allow third-party or custom extension hooks
        do_action('seoi_register_analyzers', $manager);
    }

    /**
     * Enqueue Admin CSS & JS strictly on SEO Intelligence screens.
     */
    public function enqueueAdminAssets(string $hookSuffix): void
    {
        // Only load on our plugin pages to prevent admin bloat
        if (!str_contains($hookSuffix, 'seo-intelligence')) {
            return;
        }

        // Remix Icon CDN for crisp icons
        wp_enqueue_style(
            'seoi-remixicon',
            'https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css',
            [],
            '4.3.0'
        );

        // Main Admin Stylesheet
        wp_enqueue_style(
            'seoi-admin-style',
            SEOI_URI . 'assets/css/admin.css',
            ['seoi-remixicon'],
            SEOI_VERSION
        );

        // Main Admin JavaScript
        wp_enqueue_script(
            'seoi-admin-script',
            SEOI_URI . 'assets/js/admin.js',
            ['jquery'],
            SEOI_VERSION,
            true
        );

        // Pass localized configuration to JS
        wp_localize_script('seoi-admin-script', 'SeoIntelligenceConfig', [
            'restUrl' => esc_url_raw(rest_url('seo-intelligence/v1/')),
            'nonce'   => wp_create_nonce('wp_rest'),
            'i18n'    => [
                'analyzing'       => esc_html__('Sedang menganalisis halaman...', 'seo-intelligence'),
                'complete'        => esc_html__('Analisis Selesai', 'seo-intelligence'),
                'error'           => esc_html__('Terjadi kesalahan saat memproses data.', 'seo-intelligence'),
                'confirmCrawling' => esc_html__('Mulai audit menyeluruh seluruh website?', 'seo-intelligence'),
            ],
        ]);
    }

    /**
     * Activation callback.
     */
    public static function activate(): void
    {
        Schema::createTables();
        (new SitemapManager())->flushRules();
    }

    /**
     * Deactivation callback.
     */
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}
