<?php

declare(strict_types=1);

namespace SeoIntelligence\Database\Repository;

use SeoIntelligence\Analysis\Finding;

/**
 * Data Access Repository for Audits and Pages.
 */
final class AuditRepository
{
    /**
     * Save a completed page analysis result to database.
     *
     * @param array $analysisData Output from AnalysisManager::analyze()
     * @param string $pageTitle Document title
     * @return int Inserted page ID
     */
    public function savePageAudit(array $analysisData, string $pageTitle = ''): int
    {
        global $wpdb;

        $tableAudits = $wpdb->prefix . 'seoi_audits';
        $tablePages  = $wpdb->prefix . 'seoi_pages';
        $tableFindings = $wpdb->prefix . 'seoi_findings';

        $scores = $analysisData['scores'] ?? [];
        $overall = (int) ($scores['overall'] ?? 0);
        $critical = (int) ($scores['critical_count'] ?? 0);
        $error = (int) ($scores['error_count'] ?? 0);
        $warning = (int) ($scores['warning_count'] ?? 0);
        $url = (string) ($analysisData['url'] ?? '');
        $postId = $analysisData['post_id'] ? (int) $analysisData['post_id'] : null;
        $duration = (float) ($analysisData['duration_seconds'] ?? 0);

        // 1. Insert master audit record
        $wpdb->insert($tableAudits, [
            'audit_type'       => 'page',
            'status'           => 'completed',
            'target_url'       => $url,
            'overall_score'    => $overall,
            'scores_json'      => wp_json_encode($scores),
            'total_pages'      => 1,
            'critical_count'   => $critical,
            'error_count'      => $error,
            'warning_count'    => $warning,
            'duration_seconds' => $duration,
            'completed_at'     => current_time('mysql'),
        ], ['%s', '%s', '%s', '%d', '%s', '%d', '%d', '%d', '%d', '%f', '%s']);

        $auditId = (int) $wpdb->insert_id;

        // 2. Insert page record
        $wpdb->insert($tablePages, [
            'audit_id'       => $auditId,
            'post_id'        => $postId,
            'url'            => $url,
            'title'          => !empty($pageTitle) ? $pageTitle : $url,
            'http_status'    => (int) ($analysisData['http_status'] ?? 200),
            'overall_score'  => $overall,
            'scores_json'    => wp_json_encode($scores),
            'critical_count' => $critical,
            'error_count'    => $error,
            'warning_count'  => $warning,
        ], ['%d', '%d', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%d']);

        $pageId = (int) $wpdb->insert_id;

        // 3. Batch insert structured findings
        /** @var array<Finding> $findings */
        $findings = $analysisData['all_findings'] ?? [];
        foreach ($findings as $finding) {
            $wpdb->insert($tableFindings, [
                'page_id'        => $pageId,
                'analyzer_id'    => $finding->analyzerId,
                'finding_id'     => $finding->id,
                'severity'       => $finding->severity->value,
                'title'          => $finding->title,
                'description'    => $finding->description,
                'why_it_matters' => $finding->whyItMatters,
                'recommendation' => $finding->recommendation,
                'location'       => $finding->location,
                'metadata_json'  => !empty($finding->metadata) ? wp_json_encode($finding->metadata) : null,
            ], ['%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s']);
        }

        return $pageId;
    }

    /**
     * Get the most recent audit record.
     */
    public function getLatestAudit(): ?array
    {
        global $wpdb;
        $tableAudits = $wpdb->prefix . 'seoi_audits';
        $row = $wpdb->get_row("SELECT * FROM {$tableAudits} ORDER BY id DESC LIMIT 1", ARRAY_A);
        if ($row && !empty($row['scores_json'])) {
            $row['scores_data'] = json_decode($row['scores_json'], true);
        }
        return $row;
    }

    /**
     * Get recent audits.
     *
     * @param int $limit
     * @return array
     */
    public function getRecentAudits(int $limit = 10): array
    {
        global $wpdb;
        $tableAudits = $wpdb->prefix . 'seoi_audits';
        $rows = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM {$tableAudits} ORDER BY id DESC LIMIT %d", $limit),
            ARRAY_A
        );

        foreach ($rows as &$row) {
            if (!empty($row['scores_json'])) {
                $row['scores_data'] = json_decode($row['scores_json'], true);
            }
        }

        return $rows;
    }

    /**
     * Get aggregate statistics across all audits.
     */
    public function getGlobalStats(): array
    {
        global $wpdb;
        $tablePages = $wpdb->prefix . 'seoi_pages';
        $tableFindings = $wpdb->prefix . 'seoi_findings';

        $pageStats = $wpdb->get_row(
            "SELECT 
                COUNT(*) as total_pages, 
                AVG(overall_score) as avg_score,
                SUM(critical_count) as total_critical,
                SUM(error_count) as total_error,
                SUM(warning_count) as total_warning
            FROM {$tablePages}",
            ARRAY_A
        );

        $severityBreakdown = $wpdb->get_results(
            "SELECT severity, COUNT(*) as count 
             FROM {$tableFindings} 
             GROUP BY severity",
            ARRAY_A
        );

        $breakdownMap = [
            'critical' => 0,
            'error'    => 0,
            'warning'  => 0,
            'notice'   => 0,
            'success'  => 0,
        ];
        foreach ($severityBreakdown as $sb) {
            if (isset($breakdownMap[$sb['severity']])) {
                $breakdownMap[$sb['severity']] = (int) $sb['count'];
            }
        }

        return [
            'total_pages'    => (int) ($pageStats['total_pages'] ?? 0),
            'avg_score'      => (int) round((float) ($pageStats['avg_score'] ?? 0)),
            'total_critical' => (int) ($pageStats['total_critical'] ?? 0),
            'total_error'    => (int) ($pageStats['total_error'] ?? 0),
            'total_warning'  => (int) ($pageStats['total_warning'] ?? 0),
            'severity_map'   => $breakdownMap,
        ];
    }

    /**
     * Get all audited pages with pagination.
     */
    public function getAuditedPages(int $limit = 50, int $offset = 0): array
    {
        global $wpdb;
        $tablePages = $wpdb->prefix . 'seoi_pages';
        $rows = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM {$tablePages} ORDER BY id DESC LIMIT %d OFFSET %d",
                $limit,
                $offset
            ),
            ARRAY_A
        );

        foreach ($rows as &$row) {
            if (!empty($row['scores_json'])) {
                $row['scores_data'] = json_decode($row['scores_json'], true);
            }
        }

        return $rows;
    }

    /**
     * Save an asset diagnostic entry.
     */
    public function saveAsset(int $pageId, string $assetType, string $url, int $fileSize, bool $isBlocking, bool $isThirdParty, array $meta = []): int
    {
        global $wpdb;
        $tableAssets = $wpdb->prefix . 'seoi_assets';

        $wpdb->insert($tableAssets, [
            'page_id'        => $pageId,
            'asset_type'     => $assetType,
            'url'            => $url,
            'file_size'      => $fileSize,
            'is_blocking'    => $isBlocking ? 1 : 0,
            'is_third_party' => $isThirdParty ? 1 : 0,
            'metadata_json'  => !empty($meta) ? wp_json_encode($meta) : null,
        ], ['%d', '%s', '%s', '%d', '%d', '%d', '%s']);

        return (int) $wpdb->insert_id;
    }

    /**
     * Get image inventory list.
     */
    public function getImageAssets(int $limit = 100, int $offset = 0): array
    {
        global $wpdb;
        $tableAssets = $wpdb->prefix . 'seoi_assets';
        $tablePages  = $wpdb->prefix . 'seoi_pages';

        $rows = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT a.*, p.url as page_url, p.title as page_title 
                 FROM {$tableAssets} a 
                 JOIN {$tablePages} p ON a.page_id = p.id 
                 WHERE a.asset_type = 'image' 
                 ORDER BY a.file_size DESC 
                 LIMIT %d OFFSET %d",
                $limit,
                $offset
            ),
            ARRAY_A
        );

        foreach ($rows as &$row) {
            if (!empty($row['metadata_json'])) {
                $row['metadata'] = json_decode($row['metadata_json'], true);
            }
        }

        return $rows;
    }

    /**
     * Create master site audit.
     */
    public function createSiteAudit(string $targetUrl, int $totalPages): int
    {
        global $wpdb;
        $tableAudits = $wpdb->prefix . 'seoi_audits';

        $wpdb->insert($tableAudits, [
            'audit_type'       => 'site',
            'status'           => 'running',
            'target_url'       => $targetUrl,
            'overall_score'    => 0,
            'scores_json'      => null,
            'total_pages'      => $totalPages,
            'critical_count'   => 0,
            'error_count'      => 0,
            'warning_count'    => 0,
            'duration_seconds' => 0.0,
        ], ['%s', '%s', '%s', '%d', '%s', '%d', '%d', '%d', '%d', '%f']);

        return (int) $wpdb->insert_id;
    }

    /**
     * Finish site audit.
     */
    public function finishSiteAudit(
        int $auditId,
        int $overallScore,
        array $scores,
        int $critical,
        int $error,
        int $warning,
        float $duration
    ): void {
        global $wpdb;
        $tableAudits = $wpdb->prefix . 'seoi_audits';

        $wpdb->update($tableAudits, [
            'status'           => 'completed',
            'overall_score'    => $overallScore,
            'scores_json'      => wp_json_encode($scores),
            'critical_count'   => $critical,
            'error_count'      => $error,
            'warning_count'    => $warning,
            'duration_seconds' => $duration,
            'completed_at'     => current_time('mysql'),
        ], ['id' => $auditId], ['%s', '%d', '%s', '%d', '%d', '%d', '%f', '%s'], ['%d']);
    }

    /**
     * Get latest page audit by URL or Post ID.
     */
    public function getLatestPageAudit(string $url): ?array
    {
        global $wpdb;
        $tablePages = $wpdb->prefix . 'seoi_pages';
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$tablePages} WHERE url = %s ORDER BY id DESC LIMIT 1", $url),
            ARRAY_A
        );
        if ($row && !empty($row['scores_json'])) {
            $row['scores_data'] = json_decode($row['scores_json'], true);
        }
        return $row;
    }

    /**
     * Get findings for a specific page audit ID.
     */
    public function getPageFindings(int $pageId): array
    {
        global $wpdb;
        $tableFindings = $wpdb->prefix . 'seoi_findings';
        $rows = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM {$tableFindings} WHERE page_id = %d ORDER BY id ASC", $pageId),
            ARRAY_A
        );

        foreach ($rows as &$row) {
            if (!empty($row['metadata_json'])) {
                $row['metadata'] = json_decode($row['metadata_json'], true);
            }
        }

        return $rows;
    }
}
