<?php
/**
 * Default Page Template (Kebijakan Privasi, Syarat & Ketentuan, etc.)
 * Cleanique Laundry by PT Indotech Berkah Abadi
 * Modern Payno Fintech Aesthetic
 *
 * @package Cleanique
 */

get_header();
?>

<main id="main-content" class="cq-default-page">
  <div id="top"></div>

  <?php while (have_posts()) : the_post(); ?>
    <!-- Header Hero -->
    <header class="cq-sky-canvas cq-single-hero" style="padding: clamp(48px, 6vw, 72px) 0 clamp(32px, 4vw, 48px);">
      <div class="cq-container">
        <div class="cq-single-hero-inner">
          <div class="cq-badge-pill cq-badge-accent" style="margin-bottom: var(--cq-sp-16); background: rgba(255, 255, 255, 0.9); border: 1px solid var(--sky-200);">
            Informasi Resmi
          </div>
          <h1 class="cq-single-title">
            <?php the_title(); ?>
          </h1>
          <p style="font-size: 13px; color: var(--cq-text-muted); margin: 0;">
            Pembaruan Terakhir: <?php echo get_the_modified_date(); ?>
          </p>
        </div>
      </div>
    </header>

    <!-- Page Content Container -->
    <div class="cq-section" style="padding-top: var(--cq-sp-40);">
      <div class="cq-container" style="max-width: 920px;">
        <article class="cq-peluang-card" style="padding: clamp(28px, 5vw, 48px); border-radius: 28px;">
          <div class="cq-single-prose">
            <?php the_content(); ?>
          </div>
        </article>
      </div>
    </div>
  <?php endwhile; ?>
</main>

<?php
get_footer();
