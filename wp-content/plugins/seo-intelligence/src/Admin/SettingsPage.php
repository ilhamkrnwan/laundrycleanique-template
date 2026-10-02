<?php

declare(strict_types=1);

namespace SeoIntelligence\Admin;

use SeoIntelligence\Core\Config;
use SeoIntelligence\Core\Container;
use SeoIntelligence\Scoring\ScoreCategory;
use SeoIntelligence\Scoring\ScoreWeights;

/**
 * Settings and Scoring Weights Configuration Page.
 */
final class SettingsPage
{
    public function __construct(
        private readonly Container $container
    ) {
    }

    public function render(): void
    {
        $saved = false;

        // Handle settings save
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' &&
            isset($_POST['seoi_settings_nonce']) &&
            wp_verify_nonce((string) $_POST['seoi_settings_nonce'], 'seoi_save_settings')
        ) {
            $weights = [];
            foreach (ScoreCategory::cases() as $category) {
                $field = 'weight_' . $category->value;
                if (isset($_POST[$field])) {
                    $weights[$category->value] = (int) $_POST[$field];
                }
            }
            update_option('seoi_score_weights', $weights);

            // AI Providers settings
            $aiConfig = [
                'provider'       => sanitize_text_field((string) ($_POST['ai_provider'] ?? 'gemini')),
                'gemini_api_key' => sanitize_text_field((string) ($_POST['gemini_api_key'] ?? '')),
                'openai_api_key' => sanitize_text_field((string) ($_POST['openai_api_key'] ?? '')),
                'claude_api_key' => sanitize_text_field((string) ($_POST['claude_api_key'] ?? '')),
            ];
            update_option('seoi_ai_config', $aiConfig);

            // Readability thresholds
            $thresholds = [
                'max_sentence_words' => (int) ($_POST['max_sentence_words'] ?? 20),
                'min_article_words'  => (int) ($_POST['min_article_words'] ?? 600),
            ];
            update_option('seoi_thresholds', $thresholds);

            $saved = true;
        }

        $currentWeights = ScoreWeights::getWeights();
        $aiConfig = get_option('seoi_ai_config', [
            'provider'       => 'gemini',
            'gemini_api_key' => '',
            'openai_api_key' => '',
            'claude_api_key' => '',
        ]);
        $thresholds = get_option('seoi_thresholds', [
            'max_sentence_words' => 20,
            'min_article_words'  => 600,
        ]);
        ?>
        <div class="wrap seoi-wrap">
            <div class="seoi-header">
                <div class="seoi-header-left">
                    <div class="seoi-badge-brand">
                        <i class="ri-settings-4-line"></i> <?php esc_html_e('Pengaturan & Konfigurasi', 'seo-intelligence'); ?>
                    </div>
                    <h1 class="seoi-title"><?php esc_html_e('Pengaturan Bobot Skor & AI Assistant', 'seo-intelligence'); ?></h1>
                    <p class="seoi-subtitle"><?php esc_html_e('Sesuaikan formula bobot penilaian 11 dimensi, ambang batas keterbacaan Bahasa Indonesia, dan integrasi AI opsional.', 'seo-intelligence'); ?></p>
                </div>
            </div>

            <?php if ($saved) : ?>
                <div class="seoi-alert seoi-alert-success">
                    <i class="ri-checkbox-circle-line"></i>
                    <span><?php esc_html_e('Pengaturan berhasil disimpan dan langsung diterapkan ke sistem audit.', 'seo-intelligence'); ?></span>
                </div>
            <?php endif; ?>

            <form method="post" action="" class="seoi-settings-form">
                <?php wp_nonce_field('seoi_save_settings', 'seoi_settings_nonce'); ?>

                <!-- Scoring Weights Section -->
                <div class="seoi-card">
                    <div class="seoi-card-header">
                        <h2><i class="ri-scales-3-line"></i> <?php esc_html_e('Bobot Penilaian 11 Dimensi (Total 100%)', 'seo-intelligence'); ?></h2>
                    </div>
                    <p class="seoi-help-text">
                        <?php esc_html_e('Formula transparan: skor akhir merupakan akumulasi berbobot dari 11 dimensi berikut sesuai standar READABLE.md.', 'seo-intelligence'); ?>
                    </p>

                    <div class="seoi-weights-grid">
                        <?php foreach (ScoreCategory::cases() as $cat) : 
                            $val = $currentWeights[$cat->value] ?? 10;
                        ?>
                            <div class="seoi-weight-item">
                                <label for="weight_<?php echo esc_attr($cat->value); ?>">
                                    <i class="<?php echo esc_attr($cat->getRemixIcon()); ?>"></i>
                                    <?php echo esc_html($cat->getLabel()); ?>
                                </label>
                                <div class="seoi-weight-input-wrap">
                                    <input type="number" id="weight_<?php echo esc_attr($cat->value); ?>" 
                                           name="weight_<?php echo esc_attr($cat->value); ?>" 
                                           value="<?php echo esc_attr((string) $val); ?>" 
                                           min="0" max="100" class="seoi-input-number weight-input" />
                                    <span class="seoi-input-suffix">%</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="seoi-weights-total-bar">
                        <span><?php esc_html_e('Total Bobot Saat Ini:', 'seo-intelligence'); ?></span>
                        <strong id="seoi-weights-sum"><?php echo esc_html((string) array_sum($currentWeights)); ?>%</strong>
                    </div>
                </div>

                <!-- Readability Thresholds -->
                <div class="seoi-card">
                    <div class="seoi-card-header">
                        <h2><i class="ri-book-read-line"></i> <?php esc_html_e('Ambang Batas Keterbacaan Bahasa Indonesia', 'seo-intelligence'); ?></h2>
                    </div>
                    <div class="seoi-form-row">
                        <div class="seoi-form-col">
                            <label class="seoi-form-label" for="max_sentence_words">
                                <?php esc_html_e('Maksimal Kata Per Kalimat (Rekomendasi ID: 18 - 22 kata):', 'seo-intelligence'); ?>
                            </label>
                            <input type="number" id="max_sentence_words" name="max_sentence_words" 
                                   value="<?php echo esc_attr((string) $thresholds['max_sentence_words']); ?>" 
                                   min="10" max="40" class="seoi-input-number" />
                            <p class="seoi-field-desc"><?php esc_html_e('Kalimat dalam Bahasa Indonesia yang melebihi batas ini akan ditandai berisiko sulit dipahami pembaca umum.', 'seo-intelligence'); ?></p>
                        </div>
                        <div class="seoi-form-col">
                            <label class="seoi-form-label" for="min_article_words">
                                <?php esc_html_e('Target Minimal Kata Artikel Lengkap (Rekomendasi: 600 kata):', 'seo-intelligence'); ?>
                            </label>
                            <input type="number" id="min_article_words" name="min_article_words" 
                                   value="<?php echo esc_attr((string) $thresholds['min_article_words']); ?>" 
                                   min="200" max="3000" class="seoi-input-number" />
                            <p class="seoi-field-desc"><?php esc_html_e('Artikel atau pilar page di bawah jumlah ini berisiko dikategorikan "thin content" oleh mesin perayap.', 'seo-intelligence'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- AI Assistant Multi-Provider Configuration -->
                <div class="seoi-card">
                    <div class="seoi-card-header">
                        <h2><i class="ri-robot-2-line"></i> <?php esc_html_e('Integrasi Asisten AI (Opsional)', 'seo-intelligence'); ?></h2>
                    </div>
                    <p class="seoi-help-text">
                        <?php esc_html_e('Digunakan untuk menghasilkan rekomendasi draft perbaikan kalimat dan saran FAQ AEO otomatis saat requested oleh pengguna.', 'seo-intelligence'); ?>
                    </p>

                    <div class="seoi-form-col">
                        <label class="seoi-form-label" for="ai_provider"><?php esc_html_e('Pilih Provider AI:', 'seo-intelligence'); ?></label>
                        <select id="ai_provider" name="ai_provider" class="seoi-select">
                            <option value="gemini" <?php selected($aiConfig['provider'], 'gemini'); ?>>Google Gemini (Disarankan: Cepat & Hemat)</option>
                            <option value="openai" <?php selected($aiConfig['provider'], 'openai'); ?>>OpenAI (GPT-4o / GPT-4o-mini)</option>
                            <option value="claude" <?php selected($aiConfig['provider'], 'claude'); ?>>Anthropic Claude (Claude 3.5 Sonnet)</option>
                        </select>
                    </div>

                    <div class="seoi-form-col" style="margin-top: 15px;">
                        <label class="seoi-form-label" for="gemini_api_key"><?php esc_html_e('Google Gemini API Key:', 'seo-intelligence'); ?></label>
                        <input type="password" id="gemini_api_key" name="gemini_api_key" 
                               value="<?php echo esc_attr($aiConfig['gemini_api_key']); ?>" 
                               class="seoi-input-text" placeholder="AIzaSy..." autocomplete="off" />
                    </div>

                    <div class="seoi-form-col" style="margin-top: 15px;">
                        <label class="seoi-form-label" for="openai_api_key"><?php esc_html_e('OpenAI API Key:', 'seo-intelligence'); ?></label>
                        <input type="password" id="openai_api_key" name="openai_api_key" 
                               value="<?php echo esc_attr($aiConfig['openai_api_key']); ?>" 
                               class="seoi-input-text" placeholder="sk-..." autocomplete="off" />
                    </div>

                    <div class="seoi-form-col" style="margin-top: 15px;">
                        <label class="seoi-form-label" for="claude_api_key"><?php esc_html_e('Anthropic Claude API Key:', 'seo-intelligence'); ?></label>
                        <input type="password" id="claude_api_key" name="claude_api_key" 
                               value="<?php echo esc_attr($aiConfig['claude_api_key']); ?>" 
                               class="seoi-input-text" placeholder="sk-ant-..." autocomplete="off" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="seoi-form-actions">
                    <button type="submit" class="seoi-btn seoi-btn-primary seoi-btn-lg">
                        <i class="ri-save-line"></i> <?php esc_html_e('Simpan Semua Pengaturan', 'seo-intelligence'); ?>
                    </button>
                </div>
            </form>
        </div>
        <?php
    }
}
