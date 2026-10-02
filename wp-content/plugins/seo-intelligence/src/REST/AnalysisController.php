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
 * REST API Controller for On-Demand Single Page and Batch Analysis.
 */
final class AnalysisController extends WP_REST_Controller
{
    protected $namespace = 'seo-intelligence/v1';
    protected $rest_base = 'analyze';

    public function __construct(
        private readonly Container $container
    ) {
    }

    /**
     * Register REST routes.
     */
    public function registerRoutes(): void
    {
        // 1. POST /seo-intelligence/v1/analyze
        register_rest_route($this->namespace, '/' . $this->rest_base, [
            [
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => [$this, 'handleAnalyze'],
                'permission_callback' => [$this, 'checkPermission'],
                'args'                => [
                    'url'     => [
                        'type'              => 'string',
                        'required'          => false,
                        'sanitize_callback' => 'esc_url_raw',
                    ],
                    'post_id' => [
                        'type'              => 'integer',
                        'required'          => false,
                        'sanitize_callback' => 'absint',
                    ],
                ],
            ],
        ]);

        // 2. GET /seo-intelligence/v1/latest
        register_rest_route($this->namespace, '/latest', [
            [
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => [$this, 'handleGetLatest'],
                'permission_callback' => [$this, 'checkPermission'],
            ],
        ]);

        // 3. GET /seo-intelligence/v1/pages
        register_rest_route($this->namespace, '/pages', [
            [
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => [$this, 'handleGetPages'],
                'permission_callback' => [$this, 'checkPermission'],
            ],
        ]);

        // 4. GET /seo-intelligence/v1/page/(?P<id>\d+)
        register_rest_route($this->namespace, '/page/(?P<id>\d+)', [
            [
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => [$this, 'handleGetPageFindings'],
                'permission_callback' => [$this, 'checkPermission'],
            ],
        ]);

        // 5. GET /seo-intelligence/v1/report/(?P<id>\d+)
        register_rest_route($this->namespace, '/report/(?P<id>\d+)', [
            [
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => [$this, 'handleGetReport'],
                'permission_callback' => [$this, 'checkPermission'],
            ],
        ]);
    }

    /**
     * Permission check: Only users who can manage options (admins/editors with capability).
     */
    public function checkPermission(WP_REST_Request $request): bool
    {
        return current_user_can('manage_options');
    }

    /**
     * Handle single page analysis request.
     */
    public function handleAnalyze(WP_REST_Request $request): WP_REST_Response|WP_Error
    {
        $url    = (string) $request->get_param('url');
        $postId = (int) $request->get_param('post_id');

        if (empty($url) && empty($postId)) {
            return new WP_Error('missing_param', __('URL atau Post ID diperlukan.', 'seo-intelligence'), ['status' => 400]);
        }

        try {
            if ($postId > 0) {
                $context = AnalysisContext::fromPostId($postId);
            } else {
                $context = AnalysisContext::fromUrl($url);
            }

            /** @var AnalysisManager $manager */
            $manager = $this->container->get('analysis_manager');
            $analysisData = $manager->analyze($context);

            // Extract page title from DOM
            $xpath = $context->getXPath();
            $titleNode = $xpath->query('//title')->item(0);
            $pageTitle = $titleNode ? trim($titleNode->textContent) : ($context->post ? $context->post->post_title : $context->url);

            /** @var AuditRepository $repo */
            $repo = $this->container->get('audit_repository');
            $pageId = $repo->savePageAudit($analysisData, $pageTitle);

            // Scan and record images into inventory
            $this->recordDiscoveredImages($context, $pageId, $repo);

            return new WP_REST_Response([
                'success' => true,
                'page_id' => $pageId,
                'data'    => $analysisData,
            ], 200);
        } catch (\Throwable $e) {
            return new WP_Error('analysis_failed', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Get the latest completed audit summary.
     */
    public function handleGetLatest(WP_REST_Request $request): WP_REST_Response
    {
        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');
        $latest = $repo->getLatestAudit();
        $stats = $repo->getGlobalStats();

        return new WP_REST_Response([
            'success' => true,
            'latest'  => $latest,
            'stats'   => $stats,
        ], 200);
    }

    /**
     * Get list of audited pages.
     */
    public function handleGetPages(WP_REST_Request $request): WP_REST_Response
    {
        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');
        $limit = max(1, min(100, (int) ($request->get_param('limit') ?: 50)));
        $offset = max(0, (int) ($request->get_param('offset') ?: 0));

        $pages = $repo->getAuditedPages($limit, $offset);

        return new WP_REST_Response([
            'success' => true,
            'pages'   => $pages,
        ], 200);
    }

    /**
     * Get findings for a specific page audit.
     */
    public function handleGetPageFindings(WP_REST_Request $request): WP_REST_Response
    {
        $pageId = (int) $request->get_param('id');
        /** @var AuditRepository $repo */
        $repo = $this->container->get('audit_repository');

        $findings = $repo->getPageFindings($pageId);

        return new WP_REST_Response([
            'success'  => true,
            'page_id'  => $pageId,
            'findings' => $findings,
        ], 200);
    }

    /**
     * Get standalone OpenSEO-compliant Executive HTML report for a specific page audit.
     */
    public function handleGetReport(WP_REST_Request $request): WP_REST_Response
    {
        $pageId = (int) $request->get_param('id');
        /** @var \SeoIntelligence\Report\ReportGenerator $generator */
        $generator = $this->container->get('report_generator');
        $html = $generator->generateFromPageId($pageId);

        return new WP_REST_Response([
            'success'  => true,
            'page_id'  => $pageId,
            'html'     => $html,
            'filename' => 'seo-audit-report-page-' . $pageId . '-' . date('Y-m-d') . '.html',
        ], 200);
    }

    /**
     * Helper to discover and record images in the document into seoi_assets table.
     */
    private function recordDiscoveredImages(AnalysisContext $context, int $pageId, AuditRepository $repo): void
    {
        $xpath = $context->getXPath();
        $imgNodes = $xpath->query('//img');
        if (!$imgNodes) {
            return;
        }

        $homeHost = wp_parse_url(home_url(), PHP_URL_HOST);

        foreach ($imgNodes as $img) {
            /** @var \DOMElement $img */
            $src = $img->getAttribute('src');
            if (empty($src) || str_starts_with($src, 'data:')) {
                continue;
            }

            $imgHost = wp_parse_url($src, PHP_URL_HOST);
            $isThirdParty = !empty($imgHost) && $imgHost !== $homeHost;
            $alt = $img->getAttribute('alt');
            $width = $img->getAttribute('width');
            $height = $img->getAttribute('height');
            $loading = $img->getAttribute('loading');

            $meta = [
                'alt'     => $alt,
                'width'   => $width ?: null,
                'height'  => $height ?: null,
                'loading' => $loading ?: null,
            ];

            $repo->saveAsset(
                pageId: $pageId,
                assetType: 'image',
                url: $src,
                fileSize: 0,
                isBlocking: false,
                isThirdParty: $isThirdParty,
                meta: $meta
            );
        }
    }
}
