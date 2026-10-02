<?php

declare(strict_types=1);

namespace SeoIntelligence\AI;

use SeoIntelligence\Analysis\Finding;

/**
 * OpenAI Provider (GPT-4o-mini).
 */
final class OpenAiProvider implements ProviderInterface
{
    private const API_ENDPOINT = 'https://api.openai.com/v1/chat/completions';

    public function __construct(
        private readonly string $apiKey
    ) {
    }

    public function getId(): string
    {
        return 'openai';
    }

    public function getName(): string
    {
        return 'OpenAI (GPT-4o-mini)';
    }

    public function isConfigured(): bool
    {
        return !empty(trim($this->apiKey));
    }

    public function suggestFix(Finding $finding, string $pageContext): string
    {
        if (!$this->isConfigured()) {
            return 'API Key OpenAI belum dikonfigurasi di menu Pengaturan.';
        }

        $prompt = "Kamu adalah pakar SEO & AEO WordPress Indonesia.\n" .
            "Bantu buatkan draf solusi konkret untuk masalah audit berikut:\n" .
            "Judul: {$finding->title}\n" .
            "Deskripsi: {$finding->description}\n" .
            "Rekomendasi: {$finding->recommendation}\n" .
            "Konteks: " . mb_strimwidth($pageContext, 0, 500, '...');

        $response = wp_remote_post(self::API_ENDPOINT, [
            'timeout' => 20,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'body'    => wp_json_encode([
                'model'    => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'Kamu adalah asisten optimasi SEO web profesional.'],
                    ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.5,
            ]),
        ]);

        if (is_wp_error($response)) {
            return 'Gagal menghubungi OpenAI: ' . $response->get_error_message();
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        return $data['choices'][0]['message']['content'] ?? 'Tidak ada respons dari OpenAI.';
    }

    public function generateFaqPairs(string $content): array
    {
        if (!$this->isConfigured()) {
            return [];
        }

        $prompt = "Hasilkan 3 pasangan FAQ AEO dalam format JSON murni array: [{\"question\": \"...\", \"answer\": \"...\"}].\n" .
            "Materi: " . mb_strimwidth($content, 0, 1500, '...');

        $response = wp_remote_post(self::API_ENDPOINT, [
            'timeout' => 25,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'body'    => wp_json_encode([
                'model'           => 'gpt-4o-mini',
                'response_format' => ['type' => 'json_object'],
                'messages'        => [
                    ['role' => 'system', 'content' => 'Return JSON only with a key "faqs" containing an array of question and answer objects.'],
                    ['role' => 'user', 'content' => $prompt]
                ],
            ]),
        ]);

        if (is_wp_error($response)) {
            return [];
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        $jsonStr = $data['choices'][0]['message']['content'] ?? '';
        $parsed = json_decode($jsonStr, true);

        return $parsed['faqs'] ?? [];
    }
}
