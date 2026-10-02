<?php

declare(strict_types=1);

namespace SeoIntelligence\Analysis;

/**
 * Encapsulated Context for Page Analysis.
 * Parses and holds DOMDocument, DOMXPath, and metadata once so analyzers do not repeatedly parse HTML.
 */
final class AnalysisContext
{
    private ?\DOMDocument $dom = null;
    private ?\DOMXPath $xpath = null;
    private ?string $cleanText = null;

    /**
     * @param string $url Target page URL.
     * @param string $rawHtml Complete rendered HTML of the page.
     * @param int|null $postId WordPress Post ID (if internal post/page).
     * @param \WP_Post|null $post WordPress post object.
     * @param string $language Detected or configured language (e.g. 'id_ID').
     * @param int $httpStatus HTTP response code.
     * @param float $responseDurationSeconds Request round-trip duration.
     */
    public function __construct(
        public readonly string $url,
        public readonly string $rawHtml,
        public readonly ?int $postId = null,
        public readonly ?\WP_Post $post = null,
        public readonly string $language = 'id_ID',
        public readonly int $httpStatus = 200,
        public readonly float $responseDurationSeconds = 0.0
    ) {
    }

    /**
     * Factory: Create from an internal WordPress Post ID.
     */
    public static function fromPostId(int $postId): self
    {
        $post = get_post($postId);
        if (!$post instanceof \WP_Post) {
            throw new \InvalidArgumentException(sprintf('Post with ID %d not found.', $postId));
        }

        $url = get_permalink($postId) ?: home_url('/');

        // Fetch rendered HTML or render content
        $rawHtml = self::renderPostHtml($post, $url);

        return new self(
            url: $url,
            rawHtml: $rawHtml,
            postId: $postId,
            post: $post,
            language: get_locale(),
            httpStatus: 200,
            responseDurationSeconds: 0.0
        );
    }

    /**
     * Factory: Create from a URL.
     */
    public static function fromUrl(string $url): self
    {
        $start = microtime(true);
        $response = wp_remote_get($url, [
            'timeout'    => 15,
            'user-agent' => 'SeoIntelligence/1.0.0; +' . home_url('/'),
            'sslverify'  => false, // Useful for local Laragon certificates
        ]);

        $duration = microtime(true) - $start;

        // Try to match internal post ID from URL
        $postId = url_to_postid($url) ?: null;
        if (!$postId && ($url === home_url('/') || $url === home_url(''))) {
            $frontId = (int) get_option('page_on_front');
            if ($frontId > 0) {
                $postId = $frontId;
            }
        }
        $post = $postId ? get_post($postId) : null;

        if (is_wp_error($response)) {
            // Graceful internal fallback if loopback HTTP is blocked on local environment
            if ($post instanceof \WP_Post) {
                $html = self::renderPostHtml($post, $url);
                return new self(
                    url: $url,
                    rawHtml: $html,
                    postId: $postId,
                    post: $post,
                    language: get_locale(),
                    httpStatus: 200,
                    responseDurationSeconds: $duration
                );
            }

            $html = '<!DOCTYPE html><html><head><title>Error</title></head><body>' .
                esc_html($response->get_error_message()) .
                '</body></html>';
            return new self(
                url: $url,
                rawHtml: $html,
                postId: null,
                post: null,
                language: get_locale(),
                httpStatus: 500,
                responseDurationSeconds: $duration
            );
        }

        $status = wp_remote_retrieve_response_code($response) ?: 200;
        $html = wp_remote_retrieve_body($response);

        return new self(
            url: $url,
            rawHtml: $html,
            postId: $postId,
            post: $post instanceof \WP_Post ? $post : null,
            language: get_locale(),
            httpStatus: (int) $status,
            responseDurationSeconds: $duration
        );
    }

    /**
     * Internal rendering fallback for draft or local posts.
     */
    private static function renderPostHtml(\WP_Post $post, string $url): string
    {
        $title = esc_html($post->post_title ?: get_bloginfo('name'));
        $content = apply_filters('the_content', $post->post_content);
        $excerpt = esc_attr(wp_strip_all_tags($post->post_excerpt ?: mb_strimwidth($content, 0, 150, '...')));

        return "<!DOCTYPE html>
<html lang=\"" . esc_attr(get_locale()) . "\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{$title}</title>
    <meta name=\"description\" content=\"{$excerpt}\">
    <link rel=\"canonical\" href=\"" . esc_url($url) . "\">
    <meta property=\"og:title\" content=\"{$title}\">
    <meta property=\"og:description\" content=\"{$excerpt}\">
</head>
<body>
    <header>
        <h1>{$title}</h1>
    </header>
    <main>
        {$content}
    </main>
</body>
</html>";
    }

    /**
     * Get shared DOMDocument instance.
     */
    public function getDom(): \DOMDocument
    {
        if ($this->dom === null) {
            $this->dom = new \DOMDocument('1.0', 'UTF-8');
            // Suppress HTML5 parsing warnings
            libxml_use_internal_errors(true);
            if (!empty($this->rawHtml)) {
                $encodedHtml = mb_encode_numericentity($this->rawHtml, [0x80, 0x10FFFF, 0, 0x1FFFFF], 'UTF-8');
                $this->dom->loadHTML($encodedHtml);
            }
            libxml_clear_errors();
        }

        return $this->dom;
    }

    /**
     * Get shared DOMXPath instance.
     */
    public function getXPath(): \DOMXPath
    {
        if ($this->xpath === null) {
            $this->xpath = new \DOMXPath($this->getDom());
        }

        return $this->xpath;
    }

    /**
     * Extract clean document body text without scripts, styles, or tags.
     */
    public function getCleanText(): string
    {
        if ($this->cleanText === null) {
            // Remove script and style contents
            $clean = preg_replace('/<(script|style|noscript)\b[^>]*>(.*?)<\/\1>/is', ' ', $this->rawHtml);
            $clean = strip_tags((string) $clean);
            $clean = html_entity_decode((string) $clean, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $this->cleanText = trim(preg_replace('/\s+/', ' ', (string) $clean) ?? '');
        }

        return $this->cleanText;
    }
}
