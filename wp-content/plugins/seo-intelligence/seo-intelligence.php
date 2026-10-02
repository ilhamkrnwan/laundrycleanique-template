<?php
/**
 * Plugin Name: SEO & AEO Intelligence
 * Plugin URI: https://indotech.id/seo-intelligence
 * Description: Production-grade SEO, GEO (Generative Engine Optimization), AEO (Answer Engine Optimization), Readability, and Accessibility Intelligence System for WordPress.
 * Version: 1.0.0
 * Author: PT Indotech Berkah Abadi
 * Author URI: https://indotech.id
 * Text Domain: seo-intelligence
 * Domain Path: /languages
 * Requires at least: 6.0
 * Requires PHP: 8.1
 * License: GPLv2 or later
 *
 * @package SeoIntelligence
 */

declare(strict_types=1);

namespace SeoIntelligence;

// Prevent direct script access.
if (!defined('ABSPATH')) {
    exit;
}

// Plugin constants definition.
define('SEOI_VERSION', '1.0.0');
define('SEOI_FILE', __FILE__);
define('SEOI_DIR', plugin_dir_path(__FILE__));
define('SEOI_URI', plugin_dir_url(__FILE__));
define('SEOI_BASENAME', plugin_basename(__FILE__));
define('SEOI_MIN_PHP_VERSION', '8.1.0');
define('SEOI_MIN_WP_VERSION', '6.0');

// Environment capability validation.
if (version_compare(PHP_VERSION, SEOI_MIN_PHP_VERSION, '<')) {
    add_action('admin_notices', function () {
        echo '<div class="notice notice-error"><p>' .
            sprintf(
                /* translators: %s: Minimum PHP version required */
                esc_html__('SEO & AEO Intelligence requires PHP %s or higher. Your server is running PHP %s. Please upgrade your PHP runtime.', 'seo-intelligence'),
                SEOI_MIN_PHP_VERSION,
                PHP_VERSION
            ) .
            '</p></div>';
    });
    return;
}

// Load Native PSR-4 Autoloader.
require_once SEOI_DIR . 'src/Core/Autoloader.php';
\SeoIntelligence\Core\Autoloader::register();

// Register activation and deactivation hooks.
register_activation_hook(__FILE__, [Core\Plugin::class, 'activate']);
register_deactivation_hook(__FILE__, [Core\Plugin::class, 'deactivate']);

// Boot the plugin instance on plugins_loaded.
add_action('plugins_loaded', function () {
    Core\Plugin::getInstance()->boot();
});
