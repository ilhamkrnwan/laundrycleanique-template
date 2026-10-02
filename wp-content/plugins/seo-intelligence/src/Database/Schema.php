<?php

declare(strict_types=1);

namespace SeoIntelligence\Database;

/**
 * Database Table Definitions and Migration Manager.
 */
final class Schema
{
    public const DB_VERSION_OPTION = 'seoi_db_version';
    public const DB_VERSION = '1.0.0';

    /**
     * Run table migrations via dbDelta.
     */
    public static function createTables(): void
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        // 1. Table: Audits (Site-wide or single-page audit runs)
        $tableAudits = $wpdb->prefix . 'seoi_audits';
        $sqlAudits = "CREATE TABLE {$tableAudits} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            audit_type VARCHAR(32) NOT NULL DEFAULT 'page',
            status VARCHAR(32) NOT NULL DEFAULT 'completed',
            target_url VARCHAR(2048) NOT NULL,
            overall_score TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
            scores_json LONGTEXT NULL,
            total_pages INT(10) UNSIGNED NOT NULL DEFAULT 1,
            critical_count INT(10) UNSIGNED NOT NULL DEFAULT 0,
            error_count INT(10) UNSIGNED NOT NULL DEFAULT 0,
            warning_count INT(10) UNSIGNED NOT NULL DEFAULT 0,
            duration_seconds FLOAT NOT NULL DEFAULT 0,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            completed_at DATETIME NULL,
            PRIMARY KEY  (id),
            KEY idx_type_status (audit_type, status),
            KEY idx_created (created_at)
        ) {$charsetCollate};";
        dbDelta($sqlAudits);

        // 2. Table: Pages (Specific URLs audited)
        $tablePages = $wpdb->prefix . 'seoi_pages';
        $sqlPages = "CREATE TABLE {$tablePages} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            audit_id BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
            post_id BIGINT(20) UNSIGNED NULL,
            url VARCHAR(2048) NOT NULL,
            title VARCHAR(512) NOT NULL DEFAULT '',
            http_status SMALLINT(5) UNSIGNED NOT NULL DEFAULT 200,
            overall_score TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
            scores_json LONGTEXT NULL,
            critical_count INT(10) UNSIGNED NOT NULL DEFAULT 0,
            error_count INT(10) UNSIGNED NOT NULL DEFAULT 0,
            warning_count INT(10) UNSIGNED NOT NULL DEFAULT 0,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id),
            KEY idx_audit (audit_id),
            KEY idx_post (post_id),
            KEY idx_score (overall_score)
        ) {$charsetCollate};";
        dbDelta($sqlPages);

        // 3. Table: Findings (Structured issues and recommendations)
        $tableFindings = $wpdb->prefix . 'seoi_findings';
        $sqlFindings = "CREATE TABLE {$tableFindings} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            page_id BIGINT(20) UNSIGNED NOT NULL,
            analyzer_id VARCHAR(64) NOT NULL,
            finding_id VARCHAR(128) NOT NULL,
            severity VARCHAR(32) NOT NULL,
            title VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            why_it_matters TEXT NOT NULL,
            recommendation TEXT NOT NULL,
            location VARCHAR(255) NOT NULL DEFAULT 'document',
            metadata_json LONGTEXT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id),
            KEY idx_page (page_id),
            KEY idx_analyzer_severity (analyzer_id, severity),
            KEY idx_finding (finding_id)
        ) {$charsetCollate};";
        dbDelta($sqlFindings);

        // 4. Table: Assets (CSS, JS, Fonts, Images)
        $tableAssets = $wpdb->prefix . 'seoi_assets';
        $sqlAssets = "CREATE TABLE {$tableAssets} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            page_id BIGINT(20) UNSIGNED NOT NULL,
            asset_type VARCHAR(32) NOT NULL,
            url VARCHAR(2048) NOT NULL,
            file_size INT(10) UNSIGNED NOT NULL DEFAULT 0,
            is_blocking TINYINT(1) NOT NULL DEFAULT 0,
            is_third_party TINYINT(1) NOT NULL DEFAULT 0,
            metadata_json LONGTEXT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id),
            KEY idx_page_type (page_id, asset_type),
            KEY idx_blocking (is_blocking)
        ) {$charsetCollate};";
        dbDelta($sqlAssets);

        update_option(self::DB_VERSION_OPTION, self::DB_VERSION);
    }

    /**
     * Clean drop tables on complete uninstall.
     */
    public static function dropTables(): void
    {
        global $wpdb;

        $tables = [
            $wpdb->prefix . 'seoi_assets',
            $wpdb->prefix . 'seoi_findings',
            $wpdb->prefix . 'seoi_pages',
            $wpdb->prefix . 'seoi_audits',
        ];

        foreach ($tables as $table) {
            $wpdb->query("DROP TABLE IF EXISTS {$table}");
        }

        delete_option(self::DB_VERSION_OPTION);
    }
}
