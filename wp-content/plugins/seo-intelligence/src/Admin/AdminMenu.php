<?php

declare(strict_types=1);

namespace SeoIntelligence\Admin;

use SeoIntelligence\Core\Container;

/**
 * Registers WordPress Admin Navigation Menus.
 */
final class AdminMenu
{
    public function __construct(
        private readonly Container $container
    ) {
    }

    public function register(): void
    {
        add_action('admin_menu', [$this, 'addMenuPages']);
    }

    public function addMenuPages(): void
    {
        $capability = 'manage_options';

        // 1. Top-Level Menu
        add_menu_page(
            page_title: __('SEO & AEO Intelligence', 'seo-intelligence'),
            menu_title: __('SEO Intelligence', 'seo-intelligence'),
            capability: $capability,
            menu_slug: 'seo-intelligence',
            callback: [$this, 'renderDashboard'],
            icon_url: 'dashicons-chart-area',
            position: 30
        );

        // 2. Submenu: Dashboard (Duplicate of top-level for clean naming)
        add_submenu_page(
            parent_slug: 'seo-intelligence',
            page_title: __('Ringkasan Kesehatan Website — SEO Intelligence', 'seo-intelligence'),
            menu_title: __('Dashboard', 'seo-intelligence'),
            capability: $capability,
            menu_slug: 'seo-intelligence',
            callback: [$this, 'renderDashboard']
        );

        // 3. Submenu: Page Audit (Audit Halaman Tunggal)
        add_submenu_page(
            parent_slug: 'seo-intelligence',
            page_title: __('Audit Halaman Individual — SEO Intelligence', 'seo-intelligence'),
            menu_title: __('Audit Halaman', 'seo-intelligence'),
            capability: $capability,
            menu_slug: 'seo-intelligence-page-audit',
            callback: [$this, 'renderPageAudit']
        );

        // 4. Submenu: Site Audit (Audit Keseluruhan Website)
        add_submenu_page(
            parent_slug: 'seo-intelligence',
            page_title: __('Audit Menyeluruh Website — SEO Intelligence', 'seo-intelligence'),
            menu_title: __('Audit Website', 'seo-intelligence'),
            capability: $capability,
            menu_slug: 'seo-intelligence-site-audit',
            callback: [$this, 'renderSiteAudit']
        );

        // 5. Submenu: Image Inventory
        add_submenu_page(
            parent_slug: 'seo-intelligence',
            page_title: __('Inventaris & Diagnosa Gambar — SEO Intelligence', 'seo-intelligence'),
            menu_title: __('Inventaris Gambar', 'seo-intelligence'),
            capability: $capability,
            menu_slug: 'seo-intelligence-images',
            callback: [$this, 'renderImages']
        );

        // 6. Submenu: Sitemap & Robots
        add_submenu_page(
            parent_slug: 'seo-intelligence',
            page_title: __('Sitemap XML & Robots.txt — SEO Intelligence', 'seo-intelligence'),
            menu_title: __('Sitemap & Robots', 'seo-intelligence'),
            capability: $capability,
            menu_slug: 'seo-intelligence-sitemap-robots',
            callback: [$this, 'renderSitemapRobots']
        );

        // 7. Submenu: Settings
        add_submenu_page(
            parent_slug: 'seo-intelligence',
            page_title: __('Pengaturan & Bobot Skor — SEO Intelligence', 'seo-intelligence'),
            menu_title: __('Pengaturan', 'seo-intelligence'),
            capability: $capability,
            menu_slug: 'seo-intelligence-settings',
            callback: [$this, 'renderSettings']
        );
    }

    public function renderDashboard(): void
    {
        (new DashboardPage($this->container))->render();
    }

    public function renderPageAudit(): void
    {
        (new PageAuditPage($this->container))->render();
    }

    public function renderSiteAudit(): void
    {
        (new SiteAuditPage($this->container))->render();
    }

    public function renderImages(): void
    {
        (new ImageInventoryPage($this->container))->render();
    }

    public function renderSitemapRobots(): void
    {
        (new SitemapRobotsPage($this->container))->render();
    }

    public function renderSettings(): void
    {
        (new SettingsPage($this->container))->render();
    }
}
