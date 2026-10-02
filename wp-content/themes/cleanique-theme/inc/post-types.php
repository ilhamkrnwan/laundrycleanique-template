<?php
/**
 * Custom Post Types, Meta Boxes & Admin Settings for Cleanique Laundry
 *
 * @package Cleanique
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Registrasi Custom Post Types
 */
function cleanique_register_custom_post_types() {
    // 1.1 CPT Kemitraan Laundry (Utama untuk Company Profile)
    register_post_type('kemitraan', [
        'labels' => [
            'name'                  => __('Kemitraan Laundry', 'cleanique'),
            'singular_name'         => __('Paket Kemitraan', 'cleanique'),
            'add_new'               => __('Tambah Paket Kemitraan', 'cleanique'),
            'add_new_item'          => __('Tambah Paket Kemitraan Baru', 'cleanique'),
            'edit_item'             => __('Edit Paket Kemitraan', 'cleanique'),
            'new_item'              => __('Paket Kemitraan Baru', 'cleanique'),
            'view_item'             => __('Lihat Kemitraan', 'cleanique'),
            'search_items'          => __('Cari Paket Kemitraan', 'cleanique'),
            'not_found'             => __('Belum ada paket kemitraan', 'cleanique'),
            'not_found_in_trash'    => __('Tidak ada paket kemitraan di kotak sampah', 'cleanique'),
            'menu_name'             => __('Kemitraan', 'cleanique'),
        ],
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'kemitraan', 'with_front' => false],
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'          => 'dashicons-groups',
        'show_in_rest'       => true,
        'capability_type'    => 'post',
        'map_meta_cap'       => true,
    ]);

    // 1.2 CPT: Paket Usaha Laundry (Legacy support / Landing Page compatibility)
    register_post_type('paket_usaha', [
        'labels' => [
            'name'               => __('Paket Usaha (Legacy)', 'cleanique'),
            'singular_name'      => __('Paket Usaha', 'cleanique'),
            'add_new'            => __('Tambah Paket Baru', 'cleanique'),
            'add_new_item'       => __('Tambah Paket Usaha Baru', 'cleanique'),
            'edit_item'          => __('Edit Paket Usaha', 'cleanique'),
            'new_item'           => __('Paket Usaha Baru', 'cleanique'),
            'view_item'          => __('Lihat Paket Usaha', 'cleanique'),
            'search_items'       => __('Cari Paket Usaha', 'cleanique'),
            'not_found'          => __('Tidak ada paket usaha ditemukan', 'cleanique'),
            'menu_name'          => __('Paket Usaha (Legacy)', 'cleanique'),
        ],
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'paket-usaha'],
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'          => 'dashicons-store',
        'show_in_rest'       => true,
    ]);

    // 1.3 CPT: Testimoni Mitra
    register_post_type('testimoni', [
        'labels' => [
            'name'               => __('Testimoni Mitra', 'cleanique'),
            'singular_name'      => __('Testimoni', 'cleanique'),
            'add_new'            => __('Tambah Testimoni', 'cleanique'),
            'add_new_item'       => __('Tambah Testimoni Baru', 'cleanique'),
            'edit_item'          => __('Edit Testimoni', 'cleanique'),
            'menu_name'          => __('Testimoni Mitra', 'cleanique'),
        ],
        'public'             => false,
        'show_ui'            => true,
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_icon'          => 'dashicons-testimonial',
        'show_in_rest'       => true,
    ]);

    // 1.4 CPT: Fitur Aplikasi POS
    register_post_type('fitur_app', [
        'labels' => [
            'name'               => __('Fitur Aplikasi', 'cleanique'),
            'singular_name'      => __('Fitur Aplikasi', 'cleanique'),
            'add_new'            => __('Tambah Fitur', 'cleanique'),
            'add_new_item'       => __('Tambah Fitur Baru', 'cleanique'),
            'edit_item'          => __('Edit Fitur', 'cleanique'),
            'menu_name'          => __('Fitur Aplikasi', 'cleanique'),
        ],
        'public'             => false,
        'show_ui'            => true,
        'supports'           => ['title', 'editor'],
        'menu_icon'          => 'dashicons-smartphone',
        'show_in_rest'       => true,
    ]);
}
add_action('init', 'cleanique_register_custom_post_types');

/**
 * 2. Meta Box untuk Paket Kemitraan (CPT 'kemitraan')
 */
function cleanique_add_kemitraan_meta_box() {
    add_meta_box(
        'cleanique_kemitraan_details',
        __('Detail Investasi & Spesifikasi Kemitraan', 'cleanique'),
        'cleanique_render_kemitraan_meta_box',
        'kemitraan',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cleanique_add_kemitraan_meta_box');

function cleanique_render_kemitraan_meta_box($post) {
    wp_nonce_field('cleanique_save_kemitraan_meta', 'cleanique_kemitraan_nonce');
    $price       = get_post_meta($post->ID, '_cq_kemitraan_price', true);
    $badge       = get_post_meta($post->ID, '_cq_kemitraan_badge', true);
    $roi         = get_post_meta($post->ID, '_cq_kemitraan_roi', true);
    $is_featured = get_post_meta($post->ID, '_cq_kemitraan_featured', true);
    $brochure    = get_post_meta($post->ID, '_cq_kemitraan_brochure', true);
    $specs       = get_post_meta($post->ID, '_cq_kemitraan_specs', true);
    $wa_msg      = get_post_meta($post->ID, '_cq_kemitraan_wa_msg', true);
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
        <div>
            <label for="cq_kemitraan_price"><strong>Rentang Modal / Biaya Paket:</strong></label><br>
            <input type="text" id="cq_kemitraan_price" name="cq_kemitraan_price" value="<?php echo esc_attr($price); ?>" style="width: 100%;" placeholder="Contoh: Mulai Rp 28 Juta-an">
            <p class="description">Tampilkan estimasi modal investasi awal.</p>
        </div>
        <div>
            <label for="cq_kemitraan_roi"><strong>Estimasi Balik Modal (BEP):</strong></label><br>
            <input type="text" id="cq_kemitraan_roi" name="cq_kemitraan_roi" value="<?php echo esc_attr($roi); ?>" style="width: 100%;" placeholder="Contoh: 4 – 8 Bulan">
            <p class="description">Periode proyeksi balik modal.</p>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
        <div>
            <label for="cq_kemitraan_badge"><strong>Label Badge / Sorotan:</strong></label><br>
            <input type="text" id="cq_kemitraan_badge" name="cq_kemitraan_badge" value="<?php echo esc_attr($badge); ?>" style="width: 100%;" placeholder="Contoh: Paling Laris / Rekomendasi Ruko">
        </div>
        <div>
            <label for="cq_kemitraan_brochure"><strong>URL File Proposal / Brosur PDF:</strong></label><br>
            <input type="url" id="cq_kemitraan_brochure" name="cq_kemitraan_brochure" value="<?php echo esc_url($brochure); ?>" style="width: 100%;" placeholder="https://.../proposal-kemitraan.pdf">
            <p class="description">Bisa diisi link media WordPress atau dokumen Google Drive.</p>
        </div>
    </div>

    <div style="margin-bottom: 16px;">
        <label>
            <input type="checkbox" name="cq_kemitraan_featured" value="1" <?php checked($is_featured, '1'); ?>>
            <strong>Tandai Sebagai Paket Unggulan (Highlighted Card di Beranda & Listing)</strong>
        </label>
    </div>

    <div style="margin-bottom: 16px;">
        <label for="cq_kemitraan_specs"><strong>Daftar Fasilitas, Mesin &amp; Benefit (1 baris per poin):</strong></label><br>
        <textarea id="cq_kemitraan_specs" name="cq_kemitraan_specs" rows="6" style="width: 100%; font-family: monospace;"><?php echo esc_textarea($specs); ?></textarea>
        <p class="description">Tulis tiap poin di baris baru. Contoh:<br>
        1 Unit Mesin Cuci Front Load Heavy Duty 10.5 Kg<br>
        1 Unit Mesin Pengering Gas Komersial 10.5 Kg Konversi<br>
        Starter Kit Chemical Pabrik Orchid Brand 100 Liter<br>
        Instalasi Plumbing Air, Gas &amp; Listrik Ruko Bergaransi<br>
        Gratis Lisensi Aplikasi Kasir POS Cleanique Laundry</p>
    </div>

    <div style="margin-bottom: 16px;">
        <label for="cq_kemitraan_wa_msg"><strong>Custom Template Pesan WhatsApp:</strong></label><br>
        <input type="text" id="cq_kemitraan_wa_msg" name="cq_kemitraan_wa_msg" value="<?php echo esc_attr($wa_msg); ?>" style="width: 100%;" placeholder="Halo tim Cleanique, saya tertarik konsultasi Paket Kemitraan [Nama Paket]...">
    </div>
    <?php
}

function cleanique_save_kemitraan_meta($post_id) {
    if (!isset($_POST['cleanique_kemitraan_nonce']) || !wp_verify_nonce($_POST['cleanique_kemitraan_nonce'], 'cleanique_save_kemitraan_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = [
        'cq_kemitraan_price'    => 'sanitize_text_field',
        'cq_kemitraan_badge'    => 'sanitize_text_field',
        'cq_kemitraan_roi'      => 'sanitize_text_field',
        'cq_kemitraan_brochure' => 'esc_url_raw',
        'cq_kemitraan_specs'    => 'sanitize_textarea_field',
        'cq_kemitraan_wa_msg'   => 'sanitize_text_field',
    ];

    foreach ($fields as $field => $sanitizer) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, call_user_func($sanitizer, $_POST[$field]));
        }
    }

    update_post_meta($post_id, '_cq_kemitraan_featured', isset($_POST['cq_kemitraan_featured']) ? '1' : '0');
}
add_action('save_post_kemitraan', 'cleanique_save_kemitraan_meta');

/**
 * 3. Halaman Admin Settings: Pengaturan Kemitraan di Dashboard WP
 */
function cleanique_register_kemitraan_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=kemitraan',
        __('Pengaturan Kemitraan', 'cleanique'),
        __('Pengaturan', 'cleanique'),
        'manage_options',
        'cleanique-kemitraan-settings',
        'cleanique_render_kemitraan_settings_page'
    );
}
add_action('admin_menu', 'cleanique_register_kemitraan_admin_menu');

function cleanique_register_kemitraan_settings() {
    register_setting('cleanique_kemitraan_group', 'cleanique_kemitraan_wa');
    register_setting('cleanique_kemitraan_group', 'cleanique_kemitraan_proposal_url');
    register_setting('cleanique_kemitraan_group', 'cleanique_kemitraan_headline');
    register_setting('cleanique_kemitraan_group', 'cleanique_kemitraan_terms');
}
add_action('admin_init', 'cleanique_register_kemitraan_settings');

function cleanique_render_kemitraan_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Pengaturan Program Kemitraan Cleanique Laundry', 'cleanique'); ?></h1>
        <p><?php _e('Kelola kontak konsultasi, tautan proposal umum, dan syarat kemitraan yang tampil di situs resmi.', 'cleanique'); ?></p>

        <?php settings_errors(); ?>

        <form method="post" action="options.php" style="max-width: 800px; background: #fff; padding: 24px; border: 1px solid #ccd0d4; border-radius: 8px; margin-top: 16px;">
            <?php settings_fields('cleanique_kemitraan_group'); ?>
            
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="cleanique_kemitraan_wa"><?php _e('Nomor WhatsApp Hotline Kemitraan', 'cleanique'); ?></label></th>
                    <td>
                        <input name="cleanique_kemitraan_wa" type="text" id="cleanique_kemitraan_wa" value="<?php echo esc_attr(get_option('cleanique_kemitraan_wa', '6281234567890')); ?>" class="regular-text">
                        <p class="description"><?php _e('Format internasional diawali dengan 62 (contoh: 6281234567890).', 'cleanique'); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="cleanique_kemitraan_proposal_url"><?php _e('Link Unduh Proposal Global (PDF)', 'cleanique'); ?></label></th>
                    <td>
                        <input name="cleanique_kemitraan_proposal_url" type="url" id="cleanique_kemitraan_proposal_url" value="<?php echo esc_url(get_option('cleanique_kemitraan_proposal_url', '')); ?>" class="large-text" placeholder="https://.../katalog-kemitraan-indotech.pdf">
                        <p class="description"><?php _e('Tautan file brosur/proposal PDF lengkap untuk tombol unduh proposal kemitraan.', 'cleanique'); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="cleanique_kemitraan_headline"><?php _e('Headline Tagline Kemitraan', 'cleanique'); ?></label></th>
                    <td>
                        <input name="cleanique_kemitraan_headline" type="text" id="cleanique_kemitraan_headline" value="<?php echo esc_attr(get_option('cleanique_kemitraan_headline', 'Peluang Bisnis Laundry Siap Operasi 100% Hak Milik Tanpa Royalti')); ?>" class="large-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="cleanique_kemitraan_terms"><?php _e('Ringkasan Ketentuan Kemitraan', 'cleanique'); ?></label></th>
                    <td>
                        <textarea name="cleanique_kemitraan_terms" id="cleanique_kemitraan_terms" rows="5" class="large-text"><?php echo esc_textarea(get_option('cleanique_kemitraan_terms', "1. Tidak ada bagi hasil omzet bulanan (Royalty Fee 0%).\n2. Mesin, peralatan, dan instalasi 100% menjadi aset milik mitra.\n3. Suplai chemical langsung dari pabrik PT Indotech Berkah Abadi.\n4. SOP tuntas, training operasional, dan garansi mesin resmi.")); ?></textarea>
                    </td>
                </tr>
            </table>

            <?php submit_button(__('Simpan Pengaturan Kemitraan', 'cleanique')); ?>
        </form>
    </div>
    <?php
}

/**
 * 4. Helper & Auto-Migration dari paket_usaha ke kemitraan
 */
function cleanique_maybe_migrate_paket_usaha_to_kemitraan() {
    if (get_option('cleanique_kemitraan_migrated')) {
        return;
    }

    $existing_kemitraan = get_posts([
        'post_type'      => 'kemitraan',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ]);

    if (!empty($existing_kemitraan)) {
        update_option('cleanique_kemitraan_migrated', '1');
        return;
    }

    $legacy_posts = get_posts([
        'post_type'      => 'paket_usaha',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]);

    if (!empty($legacy_posts)) {
        foreach ($legacy_posts as $post) {
            $new_post_id = wp_insert_post([
                'post_title'   => $post->post_title,
                'post_content' => $post->post_content,
                'post_excerpt' => $post->post_excerpt,
                'post_status'  => 'publish',
                'post_type'    => 'kemitraan',
                'post_name'    => $post->post_name,
            ]);

            if ($new_post_id && !is_wp_error($new_post_id)) {
                $price       = get_post_meta($post->ID, '_cq_paket_price', true);
                $badge       = get_post_meta($post->ID, '_cq_paket_badge', true);
                $is_featured = get_post_meta($post->ID, '_cq_paket_featured', true);
                $specs       = get_post_meta($post->ID, '_cq_paket_specs', true);

                if ($price) update_post_meta($new_post_id, '_cq_kemitraan_price', $price);
                if ($badge) update_post_meta($new_post_id, '_cq_kemitraan_badge', $badge);
                if ($is_featured) update_post_meta($new_post_id, '_cq_kemitraan_featured', $is_featured);
                if ($specs) update_post_meta($new_post_id, '_cq_kemitraan_specs', $specs);

                $thumb_id = get_post_thumbnail_id($post->ID);
                if ($thumb_id) {
                    set_post_thumbnail($new_post_id, $thumb_id);
                }
            }
        }
        update_option('cleanique_kemitraan_migrated', '1');
    }
}
add_action('admin_init', 'cleanique_maybe_migrate_paket_usaha_to_kemitraan');

/**
 * 5. Meta Box untuk Testimoni Mitra
 */
function cleanique_add_testimoni_meta_box() {
    add_meta_box(
        'cleanique_testi_details',
        __('Informasi Mitra', 'cleanique'),
        'cleanique_render_testi_meta_box',
        'testimoni',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cleanique_add_testimoni_meta_box');

function cleanique_render_testi_meta_box($post) {
    wp_nonce_field('cleanique_save_testi_meta', 'cleanique_testi_nonce');
    $city = get_post_meta($post->ID, '_cq_testi_city', true);
    $business = get_post_meta($post->ID, '_cq_testi_business', true);
    ?>
    <div style="margin-bottom: 14px;">
        <label for="cq_testi_business"><strong>Nama Usaha / Jabatan:</strong></label><br>
        <input type="text" id="cq_testi_business" name="cq_testi_business" value="<?php echo esc_attr($business); ?>" style="width: 100%; max-width: 400px;" placeholder="Contoh: Owner Berkah Clean Laundry">
    </div>

    <div style="margin-bottom: 14px;">
        <label for="cq_testi_city"><strong>Kota / Lokasi:</strong></label><br>
        <input type="text" id="cq_testi_city" name="cq_testi_city" value="<?php echo esc_attr($city); ?>" style="width: 100%; max-width: 400px;" placeholder="Contoh: Sleman, Yogyakarta">
    </div>
    <?php
}

function cleanique_save_testi_meta($post_id) {
    if (!isset($_POST['cleanique_testi_nonce']) || !wp_verify_nonce($_POST['cleanique_testi_nonce'], 'cleanique_save_testi_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['cq_testi_business'])) {
        update_post_meta($post_id, '_cq_testi_business', sanitize_text_field($_POST['cq_testi_business']));
    }
    if (isset($_POST['cq_testi_city'])) {
        update_post_meta($post_id, '_cq_testi_city', sanitize_text_field($_POST['cq_testi_city']));
    }
}
add_action('save_post_testimoni', 'cleanique_save_testi_meta');
