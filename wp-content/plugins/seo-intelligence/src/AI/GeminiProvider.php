<?php

declare(strict_types=1);

namespace SeoIntelligence\AI;

use SeoIntelligence\Analysis\Finding;

/**
 * Google Gemini Provider.
 * Fast, cost-efficient, native Indonesian-fluent LLM provider.
 */
final class GeminiProvider implements ProviderInterface
{
    private const API_ENDPOINT = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent';

    public function __construct(
        private readonly string $apiKey
    ) {
    }

    public function getId(): string
    {
        return 'gemini';
    }

    public function getName(): string
    {
        return 'Google Gemini';
    }

    public function isConfigured(): bool
    {
        return !empty(trim($this->apiKey));
    }

    public function suggestFix(Finding $finding, string $pageContext): string
    {
        if (!$this->isConfigured()) {
            return 'API Key Gemini belum dikonfigurasi di menu Pengaturan.';
        }

        $prompt = "Kamu adalah pakar SEO & AEO WordPress Indonesia.\n" .
            "Bantu buatkan draf solusi konkret untuk masalah audit berikut:\n" .
            "Judul Isu: {$finding->title}\n" .
            "Deskripsi: {$finding->description}\n" .
            "Rekomendasi Awal: {$finding->recommendation}\n" .
            "Konteks Konten Singkat: " . mb_strimwidth($pageContext, 0, 500, '...') . "\n\n" .
            "Tuliskan draf teks perbaikan langsung yang siap disalin oleh pemilik website dalam Bahasa Indonesia yang profesional dan menarik.";

        $response = wp_remote_post(self::API_ENDPOINT . '?key=' . urlencode($this->apiKey), [
            'timeout' => 20,
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => wp_json_encode([
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]),
        ]);

        if (is_wp_error($response)) {
            return 'Gagal menghubungi Gemini API: ' . $response->get_error_message();
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Tidak ada respons teks yang dihasilkan.';
    }

    public function generateFaqPairs(string $content): array
    {
        if (!$this->isConfigured()) {
            return [];
        }

        $prompt = "Berdasarkan materi konten website bisnis laundry berikut, hasilkan 3 pasangan Tanya Jawab (FAQ) yang ramah Answer Engine Optimization (AEO) dan Featured Snippets dalam format JSON valid.\n" .
            "Kriteria: Pertanyaan diawali kata tanya (Berapa, Bagaimana, Apa), dan Jawaban to-the-point sepanjang 40-50 kata.\n" .
            "Konten:\n" . mb_strimwidth($content, 0, 1500, '...') . "\n\n" .
            "Format JSON:\n" .
            "[{\"question\": \"...\", \"answer\": \"...\"}]";

        $response = wp_remote_post(self::API_ENDPOINT . '?key=' . urlencode($this->apiKey), [
            'timeout' => 25,
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => wp_json_encode([
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]),
        ]);

        if (is_wp_error($response)) {
            return [];
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

        // Extract JSON block
        if (preg_match('/\[.*\]/s', $text, $matches)) {
            $parsed = json_decode($matches[0], true);
            if (is_array($parsed)) {
                return $parsed;
            }
        }

        return [];
    }
}
