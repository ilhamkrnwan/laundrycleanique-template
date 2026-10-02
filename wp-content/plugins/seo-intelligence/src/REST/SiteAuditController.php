<?php

declare(strict_types=1);

namespace SeoIntelligence\REST;

use SeoIntelligence\Analysis\AnalysisContext;
use SeoIntelligence\Analysis\AnalysisManager;
use SeoIntelligence\Core\Container;
use SeoIntelligence\Database\Repository\AuditRepository;
use WP_Error;
use WP_REST_Controller;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

/**
 * REST API Controller for Sequential Site-Wide Crawling and Auditing.
 */
final class SiteAuditController extends WP_REST_Controller
{
    protected $namespace = 'seo-intelligence/v1';
    protected $rest_base = 'crawler';

    public function __construct(
        private readonly Container $container
    ) {
    }

    public function registerRoutes(): void
    {
        // 1. POST /seo-intelligence/v1/crawler/start
        register_rest_route($this->namespace, '/' . $this->rest_base . '/start', [
            [
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => [$this, 'handleStart'],
                'permission_callback' => [$this, 'checkPermission'],
            ],
        ]);

        // 2. POST /seo-intelligence/v1/crawler/process-item
        register_rest_route($this->namespace, '/' . $this->rest_base . '/process-item', [
            [
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => [$this, 'handleProcessItem'],
                'permission_callback' => [$this, 'checkPermission'],
                'args'                => [
                    'audit_id' => [
                        'type'              => 'integer',
                        'required'          => true,
                        'sanitize_callback' => 'absint',
                    ],
                    'url'      => [
                        'type'              => 'string',
                        'required'          => true,
                        'sanitize_callback' => 'esc_url_raw',
                    ],
                    'post_id'  => [
                        'type'              => 'integer',
                        'required'          => false,
                        'sanitize_callback' => 'absint',
                    ],
                ],
            ],
        ]);

        // 3. POST /seo-intelligence/v1/crawler/finish
        register_rest_route($this->namespace, '/' . $this->rest_base . '/finish', [
            [
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => [$this, 'handleFinish'],
                'permission_callback' => [$this, 'checkPermission'],
                'args'                => [
                    'audit_id'         => [
                        'type'              => 'integer',
                        'required'          => true,
                        'sanitize_callback' => 'absint',
                    ],
                    'duration_seconds' => [
                        'type'     => 'number',
                        'required' => false,
                    ],
                ],
            ],
        ]);
    }

    public function checkPermission(WP_REST_Request $request): bool
    {
        return current_user_can('manage_options');
    }

    /**
     * Start a site audit run: discover all public pages and return initial queue.
     */
    public function handleStart(WP_REST_Request $request): WP_REST_Response|WP_Error
    {
        $queue = $this->discoverPublicUrls();

        if (empty($queue)) {
            return new WP_Error('no_urls', __('Tidak ada URL publik yang ditemukan untuk diaudit.', 'seo-intelligence'), ['status' => 400]);
        }

        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');
        $auditId = $repo->createSiteAudit(home_url('/'), count($queue));

        return new WP_REST_Response([
            'success'     => true,
            'audit_id'    => $auditId,
            'total_items' => count($queue),
            'queue'       => $queue,
        ], 200);
    }

    /**
     * Process a single URL item in the client-driven sequential loop.
     */
    public function handleProcessItem(WP_REST_Request $request): WP_REST_Response|WP_Error
    {
        $auditId = (int) $request->get_param('audit_id');
        $url     = (string) $request->get_param('url');
        $postId  = (int) $request->get_param('post_id');

        try {
            if ($postId > 0) {
                $context = AnalysisContext::fromPostId($postId);
            } else {
                $context = AnalysisContext::fromUrl($url);
            }

            /** @var AnalysisManager $manager */
            $manager = $this->container->get('analysis_manager');
            $analysisData = $manager->analyze($context);

            $xpath = $context->getXPath();
            $titleNode = $xpath->query('//title')->item(0);
            $pageTitle = $titleNode ? trim($titleNode->textContent) : ($context->post ? $context->post->post_title : $url);

            // Record into database
            global $wpdb;
            $tablePages = $wpdb->prefix . 'seoi_pages';
            $tableFindings = $wpdb->prefix . 'seoi_findings';

            $scores = $analysisData['scores'] ?? [];
            $overall = (int) ($scores['overall'] ?? 0);
            $critical = (int) ($scores['critical_count'] ?? 0);
            $error = (int) ($scores['error_count'] ?? 0);
            $warning = (int) ($scores['warning_count'] ?? 0);

            $wpdb->insert($tablePages, [
                'audit_id'       => $auditId,
                'post_id'        => $postId ?: null,
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

            // Batch insert findings
            /** @var array<\SeoIntelligence\Analysis\Finding> $findings */
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

            return new WP_REST_Response([
                'success'        => true,
                'audit_id'       => $auditId,
                'page_id'        => $pageId,
                'url'            => $url,
                'title'          => $pageTitle,
                'score'          => $overall,
                'critical_count' => $critical,
                'error_count'    => $error,
                'warning_count'  => $warning,
            ], 200);
        } catch (\Throwable $e) {
            return new WP_Error('crawl_item_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Finish site audit and aggregate statistics.
     */
    public function handleFinish(WP_REST_Request $request): WP_REST_Response|WP_Error
    {
        $auditId = (int) $request->get_param('audit_id');
        $duration = (float) ($request->get_param('duration_seconds') ?: 0.0);

        global $wpdb;
        $tablePages = $wpdb->prefix . 'seoi_pages';

        $aggregated = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT 
                    COUNT(*) as total_audited,
                    AVG(overall_score) as avg_score,
                    SUM(critical_count) as total_critical,
                    SUM(error_count) as total_error,
                    SUM(warning_count) as total_warning
                 FROM {$tablePages} 
                 WHERE audit_id = %d",
                $auditId
            ),
            ARRAY_A
        );

        $avgScore = (int) round((float) ($aggregated['avg_score'] ?? 0));
        $critical = (int) ($aggregated['total_critical'] ?? 0);
        $error    = (int) ($aggregated['total_error'] ?? 0);
        $warning  = (int) ($aggregated['total_warning'] ?? 0);

        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');
        $repo->finishSiteAudit(
            auditId: $auditId,
            overallScore: $avgScore,
            scores: ['overall' => $avgScore],
            critical: $critical,
            error: $error,
            warning: $warning,
            duration: $duration
        );

        return new WP_REST_Response([
            'success'        => true,
            'audit_id'       => $auditId,
            'overall_score'  => $avgScore,
            'total_audited'  => (int) ($aggregated['total_audited'] ?? 0),
            'critical_count' => $critical,
            'error_count'    => $error,
            'warning_count'  => $warning,
            'duration'       => $duration,
        ], 200);
    }

    /**
     * Discovers all published pages and posts for auditing.
     *
     * @return array<int, array{url: string, title: string, post_id: int}>
     */
    private function discoverPublicUrls(): array
    {
        $queue = [];
        $seenUrls = [];

        // 1. Homepage
        $homeUrl = home_url('/');
        $queue[] = [
            'url'     => $homeUrl,
            'title'   => get_bloginfo('name') . ' (Beranda)',
            'post_id' => 0,
        ];
        $seenUrls[$homeUrl] = true;

        // 2. Published Pages & Posts
        $posts = get_posts([
            'post_type'      => ['page', 'post'],
            'post_status'    => 'publish',
            'posts_per_page' => 200,
            'orderby'        => 'post_date',
            'order'          => 'DESC',
        ]);

        foreach ($posts as $post) {
            $url = get_permalink($post->ID);
            if ($url && !isset($seenUrls[$url])) {
                $seenUrls[$url] = true;
                $queue[] = [
                    'url'     => $url,
                    'title'   => $post->post_title ?: '(Tanpa Judul)',
                    'post_id' => $post->ID,
                ];
            }
        }

        return $queue;
    }
}
