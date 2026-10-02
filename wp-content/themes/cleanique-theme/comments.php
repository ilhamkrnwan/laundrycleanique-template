<?php
/**
 * The template for displaying Comments on Single Articles
 * Modern Payno Fintech Aesthetic for Cleanique Laundry
 *
 * @package Cleanique
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="cq-comments-area">
  <?php if (have_comments()) : ?>
    <div class="cq-comments-header">
      <h3 class="cq-comments-title">
        <i class="ri-chat-3-line" aria-hidden="true"></i>
        Diskusi &amp; Komentar
        <span class="cq-comments-count-badge">
          <?php echo number_format_i18n(get_comments_number()); ?>
        </span>
      </h3>
      <p class="cq-comments-subtitle">
        Punya pertanyaan seputar panduan ini? Tanyakan langsung atau bagikan pengalaman bisnis laundry Anda di bawah.
      </p>
    </div>

    <ol class="cq-comment-list">
      <?php
      wp_list_comments([
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 48,
          'callback'    => 'cleanique_comment_callback',
      ]);
      ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav class="cq-comments-pagination" aria-label="Navigasi Komentar">
        <?php paginate_comments_links([
            'prev_text' => '<i class="ri-arrow-left-s-line"></i> Sebelumnya',
            'next_text' => 'Selanjutnya <i class="ri-arrow-right-s-line"></i>',
        ]); ?>
      </nav>
    <?php endif; ?>

  <?php else : ?>
    <div class="cq-comments-header">
      <h3 class="cq-comments-title">
        <i class="ri-chat-3-line" aria-hidden="true"></i>
        Diskusi &amp; Komentar
        <span class="cq-comments-count-badge">0</span>
      </h3>
      <p class="cq-comments-subtitle">
        Belum ada tanggapan untuk artikel ini. Jadilah yang pertama memberikan pandangan atau pertanyaan!
      </p>
    </div>
  <?php endif; ?>

  <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="cq-comments-closed">
      <i class="ri-lock-line" aria-hidden="true"></i> Kolom komentar untuk artikel ini telah ditutup.
    </div>
  <?php endif; ?>

  <?php
  $commenter = wp_get_current_commenter();
  $req = get_option('require_name_email');
  $aria_req = ($req ? " aria-required='true' required" : '');

  $fields = [
      'author' => '<div class="cq-form-group cq-form-col">
                    <label for="author" class="cq-form-label">Nama Lengkap ' . ($req ? '<span class="required">*</span>' : '') . '</label>
                    <div class="cq-input-wrap">
                      <i class="ri-user-line cq-input-icon"></i>
                      <input id="author" name="author" type="text" class="cq-form-input" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' placeholder="Contoh: Budi Santoso" />
                    </div>
                  </div>',
      'email'  => '<div class="cq-form-group cq-form-col">
                    <label for="email" class="cq-form-label">Alamat Email ' . ($req ? '<span class="required">*</span>' : '') . '</label>
                    <div class="cq-input-wrap">
                      <i class="ri-mail-line cq-input-icon"></i>
                      <input id="email" name="email" type="email" class="cq-form-input" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' placeholder="nama@email.com (tidak akan dipublikasikan)" />
                    </div>
                  </div>',
      'url'    => '<div class="cq-form-group cq-form-col-full">
                    <label for="url" class="cq-form-label">Situs Web / Nama Outlet Laundry (Opsional)</label>
                    <div class="cq-input-wrap">
                      <i class="ri-global-line cq-input-icon"></i>
                      <input id="url" name="url" type="url" class="cq-form-input" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="https://outletlaundryku.com" />
                    </div>
                  </div>',
      'cookies' => '<div class="cq-form-group cq-comment-cookies-consent">
                      <label class="cq-checkbox-label">
                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . (empty($commenter['comment_author_email']) ? '' : ' checked="checked"') . ' />
                        <span>Simpan nama, email, dan situs web saya pada peramban ini untuk komentar berikutnya.</span>
                      </label>
                    </div>',
  ];

  $comments_args = [
      'fields'               => $fields,
      'title_reply'          => '<span class="cq-comment-form-heading"><i class="ri-edit-2-line"></i> Tinggalkan Pertanyaan atau Tanggapan</span>',
      'title_reply_to'       => '<span class="cq-comment-form-heading"><i class="ri-reply-line"></i> Balas Komentar untuk %s</span>',
      'cancel_reply_link'    => __('Batalkan Balasan', 'cleanique'),
      'label_submit'         => __('Kirim Komentar', 'cleanique'),
      'class_submit'         => 'cq-btn cq-btn-primary cq-btn-pill',
      'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><i class="ri-send-plane-fill"></i> %4$s</button>',
      'comment_field'        => '<div class="cq-form-group cq-form-col-full">
                                  <label for="comment" class="cq-form-label">Komentar / Pertanyaan <span class="required">*</span></label>
                                  <div class="cq-textarea-wrap">
                                    <textarea id="comment" name="comment" class="cq-form-textarea" rows="4" required placeholder="Tuliskan pengalaman, pandangan, atau pertanyaan seputar artikel ini..."></textarea>
                                  </div>
                                </div>',
      'comment_notes_before' => '<p class="cq-comment-notes">Alamat email Anda aman dan tidak akan dipublikasikan. Kolom wajib bertanda <span class="required">*</span></p>',
      'comment_notes_after'  => '',
      'class_form'           => 'cq-comment-form',
  ];

  comment_form($comments_args);
  ?>
</div>
