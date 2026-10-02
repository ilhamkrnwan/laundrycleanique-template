<?php

declare(strict_types=1);

namespace SeoIntelligence\AI;

/**
 * AI Provider Manager & Resolver.
 */
final class AiManager
{
    /**
     * Get the currently active and configured AI provider.
     */
    public static function getActiveProvider(): ProviderInterface
    {
        $config = get_option('seoi_ai_config', [
            'provider'       => 'gemini',
            'gemini_api_key' => '',
            'openai_api_key' => '',
            'claude_api_key' => '',
        ]);

        $providerId = $config['provider'] ?? 'gemini';

        return match ($providerId) {
            'openai' => new OpenAiProvider((string) ($config['openai_api_key'] ?? '')),
            'claude' => new ClaudeProvider((string) ($config['claude_api_key'] ?? '')),
            default  => new GeminiProvider((string) ($config['gemini_api_key'] ?? '')),
        };
    }
}
