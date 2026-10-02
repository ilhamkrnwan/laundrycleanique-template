<?php

declare(strict_types=1);

namespace SeoIntelligence\AI;

use SeoIntelligence\Analysis\Finding;

/**
 * Anthropic Claude Provider (Claude 3.5 Sonnet).
 */
final class ClaudeProvider implements ProviderInterface
{
    private const API_ENDPOINT = 'https://api.anthropic.com/v1/messages';

    public function __construct(
        private readonly string $apiKey
    ) {
    }

    public function getId(): string
    {
        return 'claude';
    }

    public function getName(): string
    {
        return 'Anthropic Claude';
    }

    public function isConfigured(): bool
    {
        return !empty(trim($this->apiKey));
    }

    public function suggestFix(Finding $finding, string $pageContext): string
    {
        if (!$this->isConfigured()) {
            return 'API Key Claude belum dikonfigurasi di menu Pengaturan.';
        }

        $prompt = "Kamu adalah pakar SEO & AEO WordPress Indonesia.\n" .
            "Bantu buatkan draf solusi konkret untuk masalah audit berikut:\n" .
            "Judul: {$finding->title}\n" .
            "Deskripsi: {$finding->description}\n" .
            "Rekomendasi: {$finding->recommendation}\n" .
            "Konteks: " . mb_strimwidth($pageContext, 0, 500, '...');

        $response = wp_remote_post(self::API_ENDPOINT, [
            'timeout' => 25,
            'headers' => [
                'Content-Type'      => 'application/json',
                'x-api-key'         => $this->apiKey,
                'anthropic-version' => '2023-06-01',
            ],
            'body'    => wp_json_encode([
                'model'      => 'claude-3-5-sonnet-20241022',
                'max_tokens' => 1024,
                'messages'   => [
                    ['role' => 'user', 'content' => $prompt]
                ],
            ]),
        ]);

        if (is_wp_error($response)) {
            return 'Gagal menghubungi Claude: ' . $response->get_error_message();
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        return $data['content'][0]['text'] ?? 'Tidak ada respons dari Claude.';
    }

    public function generateFaqPairs(string $content): array
    {
        if (!$this->isConfigured()) {
            return [];
        }

        $prompt = "Hasilkan 3 pasangan FAQ AEO dalam format JSON array murni: [{\"question\": \"...\", \"answer\": \"...\"}].\n" .
            "Konten:\n" . mb_strimwidth($content, 0, 1500, '...');

        $response = wp_remote_post(self::API_ENDPOINT, [
            'timeout' => 25,
            'headers' => [
                'Content-Type'      => 'application/json',
                'x-api-key'         => $this->apiKey,
                'anthropic-version' => '2023-06-01',
            ],
            'body'    => wp_json_encode([
                'model'      => 'claude-3-5-sonnet-20241022',
                'max_tokens' => 1024,
                'messages'   => [
                    ['role' => 'user', 'content' => $prompt]
                ],
            ]),
        ]);

        if (is_wp_error($response)) {
            return [];
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        $text = $data['content'][0]['text'] ?? '';

        if (preg_match('/\[.*\]/s', $text, $matches)) {
            $parsed = json_decode($matches[0], true);
            if (is_array($parsed)) {
                return $parsed;
            }
        }

        return [];
    }
}
