<?php
/**
 * Cleanique Laundry Theme Functions & Definitions
 *
 * @package Cleanique
 * @author PT Indotech Berkah Abadi
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('CLEANIQUE_VERSION', '1.5.3');
define('CLEANIQUE_DIR', get_template_directory());
define('CLEANIQUE_URI', get_template_directory_uri());

// Require modular files
require_once CLEANIQUE_DIR . '/inc/post-types.php';

/**
 * Setup tema: support & fitur dasar WordPress
 */
function cleanique_theme_setup() {
    // Terjemahan & teks domain
    load_theme_textdomain('cleanique', CLEANIQUE_DIR . '/languages');

    // Tag judul otomatis oleh WordPress
    add_theme_support('title-tag');

    // Featured image / Thumbnail artikel
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 450, true);
    add_image_size('cleanique-card', 600, 360, true);

    // Support HTML5 semantik
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // Custom Logo
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 260,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Registrasi Menu Navigasi
    register_nav_menus([
        'primary' => __('Menu Utama (Header)', 'cleanique'),
        'footer'  => __('Menu Footer', 'cleanique'),
    ]);
}
add_action('after_setup_theme', 'cleanique_theme_setup');

/**
 * Helper: Ambil logo situs Cleanique Laundry
 * Default utama menggunakan logo/laundry-cleanique-outline.png (transparan tanpa background putih)
 *
 * @param string $extra_class Class tambahan untuk tag img/span
 * @return string HTML tag logo
 */
function cleanique_get_site_logo($extra_class = '') {
    // 1. Prioritas utama & default: Logo outline transparan (logo/laundry-cleanique-outline.png)
    $outline_logo_rel  = 'logo/laundry-cleanique-outline.png';
    $outline_logo_path = ABSPATH . $outline_logo_rel;
    $outline_logo_url  = home_url('/' . $outline_logo_rel);

    if (file_exists($outline_logo_path)) {
        return sprintf(
            '<img src="%s" alt="%s" class="cq-brand-logo-img %s" height="42" loading="eager" decoding="async">',
            esc_url($outline_logo_url),
            esc_attr(get_bloginfo('name') . ' - Cleanique Laundry'),
            esc_attr($extra_class)
        );
    }

    // 2. Custom logo dari WordPress Customizer (jika outline tidak tersedia)
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($logo_data) {
            $alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true) ?: get_bloginfo('name');
            return sprintf(
                '<img src="%s" alt="%s" class="cq-brand-logo-img %s" width="%d" height="%d">',
                esc_url($logo_data[0]),
                esc_attr($alt),
                esc_attr($extra_class),
                $logo_data[1] ? intval($logo_data[1]) : 240,
                $logo_data[2] ? intval($logo_data[2]) : 60
            );
        }
    }

    // 3. Fallback ke icon logo transparan /logo/logo.png
    $fallback_logo_path = ABSPATH . 'logo/logo.png';
    if (file_exists($fallback_logo_path)) {
        return sprintf(
            '<img src="%s" alt="%s" class="cq-brand-logo-img %s" height="42">',
            esc_url(home_url('/logo/logo.png')),
            esc_attr(get_bloginfo('name')),
            esc_attr($extra_class)
        );
    }

    // 4. Default text fallback jika tidak ada gambar
    return '<span class="cq-brand-logo-text ' . esc_attr($extra_class) . '">Cleanique<span class="cq-brand-accent">Laundry</span></span>';
}

/**
 * Filter atribut link nav menu WordPress agar menggunakan class .cq-nav-link
 */
function cleanique_nav_menu_link_attributes($atts, $item, $args) {
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        $classes = isset($atts['class']) ? explode(' ', $atts['class']) : [];
        if (!in_array('cq-nav-link', $classes, true)) {
            $classes[] = 'cq-nav-link';
        }
        if (in_array('current-menu-item', (array) $item->classes, true) || in_array('current_page_item', (array) $item->classes, true)) {
            $classes[] = 'active';
        }
        $atts['class'] = trim(implode(' ', $classes));
        $atts['role'] = 'menuitem';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'cleanique_nav_menu_link_attributes', 10, 3);

/**
 * Preconnect ke Google Fonts CDN untuk optimasi LCP/FCP
 */
function cleanique_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = [
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        ];
        $urls[] = [
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
        $urls[] = [
            'href'        => 'https://cdn.jsdelivr.net',
            'crossorigin' => 'anonymous',
        ];
    }
    return $urls;
}
add_filter('wp_resource_hints', 'cleanique_resource_hints', 10, 2);

/**
 * Enqueue style modular dan script tema
 */
function cleanique_enqueue_assets() {
    // 1. Google Fonts: Plus Jakarta Sans & Inter (dengan display=swap)
    wp_enqueue_style(
        'cleanique-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );

    // 2. Remix Icon (Universal Modern Icon Library - https://remixicon.com)
    wp_enqueue_style(
        'cleanique-remixicon',
        'https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css',
        [],
        '4.3.0'
    );

    // 3. Main Stylesheet (Design Tokens, Reset, Base Typography, Grid, Layout)
    wp_enqueue_style(
        'cleanique-main-style',
        CLEANIQUE_URI . '/assets/css/main.css',
        ['cleanique-fonts', 'cleanique-remixicon'],
        CLEANIQUE_VERSION
    );

    // 3. Components Stylesheet (Button, Badge, Form, Accordion, Floating)
    wp_enqueue_style(
        'cleanique-components-style',
        CLEANIQUE_URI . '/assets/css/components.css',
        ['cleanique-main-style'],
        CLEANIQUE_VERSION
    );

    // 4. Unified Card System Stylesheet (All Card Foundations, Equal Heights, Flex Actions)
    wp_enqueue_style(
        'cleanique-cards-style',
        CLEANIQUE_URI . '/assets/css/cards.css',
        ['cleanique-components-style'],
        CLEANIQUE_VERSION
    );

    // 5. Vertical Roadmap SOP & Timeline Stylesheet
    wp_enqueue_style(
        'cleanique-timeline-style',
        CLEANIQUE_URI . '/assets/css/timeline.css',
        ['cleanique-cards-style'],
        CLEANIQUE_VERSION
    );

    // 6. ROI & Financial Turnover Simulator Stylesheet
    wp_enqueue_style(
        'cleanique-calculator-style',
        CLEANIQUE_URI . '/assets/css/calculator.css',
        ['cleanique-cards-style'],
        CLEANIQUE_VERSION
    );

    // 7. Kemitraan Catalog & Comparison Matrix Stylesheet
    wp_enqueue_style(
        'cleanique-kemitraan-style',
        CLEANIQUE_URI . '/assets/css/kemitraan.css',
        ['cleanique-cards-style'],
        CLEANIQUE_VERSION
    );

    // 8. Company Profile & Bento Grid Stylesheet
    wp_enqueue_style(
        'cleanique-compro-style',
        CLEANIQUE_URI . '/assets/css/compro.css',
        ['cleanique-cards-style'],
        CLEANIQUE_VERSION
    );

    // 9. Blog, Articles & Knowledge Hub Stylesheet
    wp_enqueue_style(
        'cleanique-blog-style',
        CLEANIQUE_URI . '/assets/css/blog.css',
        ['cleanique-cards-style'],
        CLEANIQUE_VERSION
    );

    // 10. Landing Pages Stylesheet
    wp_enqueue_style(
        'cleanique-landing-style',
        CLEANIQUE_URI . '/assets/css/landing-pages.css',
        ['cleanique-compro-style'],
        CLEANIQUE_VERSION
    );

    // 5. Main JavaScript (Vanilla)
    wp_enqueue_script(
        'cleanique-main-script',
        CLEANIQUE_URI . '/assets/js/main.js',
        [],
        CLEANIQUE_VERSION,
        true
    );

    // 6. GSAP 3.12.5 Core & ScrollTrigger (High-Performance Motion Engine)
    wp_enqueue_script(
        'cleanique-gsap',
        CLEANIQUE_URI . '/assets/js/vendor/gsap.min.js',
        [],
        '3.12.5',
        true
    );

    wp_enqueue_script(
        'cleanique-scrolltrigger',
        CLEANIQUE_URI . '/assets/js/vendor/ScrollTrigger.min.js',
        ['cleanique-gsap'],
        '3.12.5',
        true
    );

    // 7. Payno Fintech Motion Design & Interactions
    wp_enqueue_script(
        'cleanique-animations',
        CLEANIQUE_URI . '/assets/js/animations.js',
        ['cleanique-gsap', 'cleanique-scrolltrigger', 'cleanique-main-script'],
        CLEANIQUE_VERSION,
        true
    );

    // Kirim konfigurasi ke JS
    $wa_number = get_theme_mod('cleanique_wa_number', '6281234567890');
    wp_localize_script('cleanique-main-script', 'CleaniqueConfig', [
        'ajaxUrl'   => admin_url('admin-ajax.php'),
        'waNumber'  => esc_js($wa_number),
        'siteUrl'   => site_url(),
        'nonce'     => wp_create_nonce('cleanique_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'cleanique_enqueue_assets');

/**
 * Customizer WordPress: Pengaturan kontak & konfigurasi Cleanique
 */
function cleanique_customize_register($wp_customize) {
    // Section Cleanique Settings
    $wp_customize->add_section('cleanique_settings_section', [
        'title'       => __('Pengaturan Cleanique & Indotech', 'cleanique'),
        'priority'    => 30,
        'description' => __('Atur nomor WhatsApp resmi, alamat kantor, dan link trial aplikasi laundry.', 'cleanique'),
    ]);

    // No WhatsApp CS
    $wp_customize->add_setting('cleanique_wa_number', [
        'default'           => '6281234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cleanique_wa_number', [
        'label'       => __('Nomor WhatsApp CS (Format: 628xxx)', 'cleanique'),
        'section'     => 'cleanique_settings_section',
        'type'        => 'text',
    ]);

    // Alamat Kantor / Pabrik Indotech
    $wp_customize->add_setting('cleanique_office_address', [
        'default'           => 'Jalan Jongke Kidul Tengah No. 30, RT.01/RW.23, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cleanique_office_address', [
        'label'       => __('Alamat Kantor / Pabrik', 'cleanique'),
        'section'     => 'cleanique_settings_section',
        'type'        => 'textarea',
    ]);

    // Link Aplikasi / Web App Portal
    $wp_customize->add_setting('cleanique_app_url', [
        'default'           => '#trial-form',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('cleanique_app_url', [
        'label'       => __('URL Registrasi / Dashboard Aplikasi', 'cleanique'),
        'section'     => 'cleanique_settings_section',
        'type'        => 'url',
    ]);
}
add_action('customize_register', 'cleanique_customize_register');

/**
 * Helper: Generate Link WhatsApp Terarah berdasarkan konteks
 *
 * @param string $context 'paket_usaha' | 'aplikasi_trial' | 'general'
 * @return string WhatsApp URL
 */
function cleanique_get_whatsapp_url($context = 'general') {
    $wa_number = get_theme_mod('cleanique_wa_number', '6281234567890');
    $wa_number = preg_replace('/[^0-9]/', '', $wa_number);

    switch ($context) {
        case 'kemitraan':
            $custom_wa = get_option('cleanique_kemitraan_wa');
            if (!empty($custom_wa)) {
                $wa_number = preg_replace('/[^0-9]/', '', $custom_wa);
            }
            $message = "Halo Tim Kemitraan Cleanique Laundry (PT Indotech Berkah Abadi), saya tertarik membuka bisnis kemitraan laundry. Boleh minta katalog rincian paket, estimasi balik modal (BEP), dan jadwal konsultasi?";
            break;
        case 'paket_usaha':
            $message = "Halo Tim Cleanique Laundry (PT Indotech Berkah Abadi), saya tertarik konsultasi Paket Usaha Laundry. Boleh minta katalog rincian modal dan jadwal konsultasi?";
            break;
        case 'aplikasi_trial':
            $message = "Halo CS Cleanique Laundry, saya ingin mengaktifkan Free Trial 7 Hari Aplikasi Kasir & Sistem Laundry Digital untuk usaha saya. Bagaimana langkah aktivasinya?";
            break;
        case 'chemical':
            $message = "Halo Indotech, saya ingin info pemesanan chemical laundry (deterjen/parfum/softener) langsung dari pabrik.";
            break;
        default:
            $message = "Halo Cleanique Laundry by PT Indotech Berkah Abadi, saya ingin bertanya seputar layanan laundry dan kemitraan.";
            break;
    }

    return 'https://api.whatsapp.com/send?phone=' . $wa_number . '&text=' . rawurlencode($message);
}

/**
 * Helper: Link WhatsApp khusus untuk single/detail paket kemitraan tertentu
 */
function cleanique_get_kemitraan_whatsapp_url($post_id = 0) {
    $wa_number = get_option('cleanique_kemitraan_wa') ?: get_theme_mod('cleanique_wa_number', '6281234567890');
    $wa_number = preg_replace('/[^0-9]/', '', $wa_number);

    if ($post_id) {
        $custom_msg = get_post_meta($post_id, '_cq_kemitraan_wa_msg', true);
        if (!empty($custom_msg)) {
            $message = $custom_msg;
        } else {
            $title = get_the_title($post_id);
            $price = get_post_meta($post_id, '_cq_kemitraan_price', true);
            $message = "Halo Tim Kemitraan Cleanique Laundry (PT Indotech Berkah Abadi), saya tertarik konsultasi " . $title . ($price ? " (" . $price . ")" : "") . ". Boleh minta rincian spesifikasi mesin dan jadwal konsultasi?";
        }
    } else {
        $message = "Halo Tim Kemitraan Cleanique Laundry, saya ingin berkonsultasi seputar program kemitraan laundry siap buka.";
    }

    return 'https://api.whatsapp.com/send?phone=' . $wa_number . '&text=' . rawurlencode($message);
}

/**
 * Filter Read More Text untuk Kutipan Artikel
 */
function cleanique_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cleanique_excerpt_more');

/**
 * Nonaktifkan emoji sistem WordPress bawaan (mengurangi bloat JS/CSS & PageSpeed boost)
 */
function cleanique_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', function($plugins) {
        return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
    });
}
add_action('init', 'cleanique_disable_emojis');

/**
 * Helper: Estimasi Waktu Baca Artikel
 */
function cleanique_get_reading_time($post_id = null) {
    $content = get_post_field('post_content', $post_id ?: get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $minutes = max(1, ceil($word_count / 200));
    return $minutes . ' mnt baca';
}

/**
 * Custom Comment Callback for Modern Payno Style Comments
 */
function cleanique_comment_callback($comment, $args, $depth) {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    $is_by_post_author = false;
    if (!empty($comment->user_id) && !empty($args['post_author'])) {
        $is_by_post_author = ($comment->user_id === $args['post_author']);
    }
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? 'cq-comment-item' : 'cq-comment-item parent'); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="cq-comment-body">
            <header class="cq-comment-meta">
                <div class="cq-comment-author-avatar">
                    <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size'], '', '', ['class' => 'cq-avatar-img']); ?>
                </div>
                <div class="cq-comment-author-info">
                    <span class="cq-comment-author-name">
                        <?php echo get_comment_author_link($comment); ?>
                        <?php if ($is_by_post_author) : ?>
                            <span class="cq-comment-badge-author"><i class="ri-shield-check-fill"></i> Penulis</span>
                        <?php endif; ?>
                    </span>
                    <time class="cq-comment-date" datetime="<?php comment_time('c'); ?>">
                        <i class="ri-time-line"></i> <?php printf(__('%1$s pukul %2$s', 'cleanique'), get_comment_date('', $comment), get_comment_time()); ?>
                    </time>
                </div>
                <div class="cq-comment-reply-action">
                    <?php
                    comment_reply_link(array_merge($args, [
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<span class="cq-reply-link-wrap">',
                        'after'     => '</span>',
                        'reply_text'=> '<i class="ri-reply-line"></i> Balas',
                    ]));
                    ?>
                </div>
            </header>

            <?php if ('0' == $comment->comment_approved) : ?>
                <div class="cq-comment-awaiting-moderation">
                    <i class="ri-information-line"></i> Komentar Anda sedang menunggu peninjauan oleh moderator.
                </div>
            <?php endif; ?>

            <div class="cq-comment-content">
                <?php comment_text(); ?>
            </div>
        </article>
    <?php
}

/**
 * Helper: Ekstrak Daftar Isi (TOC) otomatis dari Heading H2 & H3 dan sematkan ID jika belum ada
 */
function cleanique_process_content_and_toc($content) {
    if (empty($content)) {
        return ['toc' => [], 'content' => ''];
    }

    $toc = [];
    $index = 1;

    // Pattern untuk menemukan H2 dan H3
    $pattern = '/<h([2-3])([^>]*)>(.*?)<\/h\1>/i';

    $processed_content = preg_replace_callback($pattern, function($matches) use (&$toc, &$index) {
        $level = intval($matches[1]);
        $attrs = $matches[2];
        $text = strip_tags($matches[3]);
        
        // Cek apakah sudah ada id di atribut
        if (preg_match('/id=["\']([^"\']+)["\']/i', $attrs, $id_match)) {
            $id = $id_match[1];
        } else {
            $slug = sanitize_title($text);
            $id = !empty($slug) ? $slug : 'section-' . $index;
            $attrs .= ' id="' . esc_attr($id) . '"';
        }

        $toc[] = [
            'level' => $level,
            'title' => $text,
            'id'    => $id,
        ];
        $index++;

        return "<h{$level}{$attrs}>{$matches[3]}</h{$level}>";
    }, $content);

    return [
        'toc'     => $toc,
        'content' => $processed_content,
    ];
}

/**
 * Redirect otomatis /berita/ ke halaman kanonik /artikel/
 */
add_action('template_redirect', function() {
    $path = trim(wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
    if ($path === 'cleaniquelaundry/berita' || $path === 'berita') {
        wp_safe_redirect(home_url('/artikel/'), 301);
        exit;
    }
});


