<?php
if (!function_exists('lai_template_can_show_content_module') || !lai_template_can_show_content_module('voice')) {
  return;
}

$voice_query = new WP_Query(array(
  'post_type'      => lai_template_content_module_post_type('voice'),
  'post_status'    => 'publish',
  'posts_per_page' => 3,
));

if (!$voice_query->have_posts()) {
  wp_reset_postdata();
  return;
}
?>

<section class="c-section c-section--wide c-section--trans c-hover --flash p-common-voice">
  <div class="container">
    <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
      <div class="col-12 col-lg-12">
        <div class="c-headline-compact">
          <span class="c-headline-compact__ttl">VOICE</span>
          <h1 class="c-headline-compact__sttl">お客様の声</h1>
        </div>
      </div>
    </div>
    <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 g-4 g-lg-5">
      <?php while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
        <div class="col-12 col-md-4 d-flex flex-column js-animate fly-in">
          <a href="<?= esc_url(get_permalink()); ?>" class="c-hover__link">
            <figure class="c-image u-mb-pc-16 u-mb-sp-12">
              <div class="c-image__src --100 c-hover__target" data-lazy-background="<?= esc_url(wmp_get_the_catchimage()); ?>"></div>
            </figure>
            <h2 class="ttl u-font-pc-20 u-font-sp-18 fw-bold u-mb-pc-12 u-mb-sp-8">
              <?= esc_html(get_the_title()); ?>
            </h2>
            <p class="text-start">
              <?= esc_html(wp_trim_words(get_the_content(), 66, '...')); ?>
            </p>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="row justify-content-center js-animate fly-in">
      <div class="col-12 col-lg-6">
        <a href="<?= esc_url(wmp_get_link('voice', '')); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--color: var(--kc); --border: var(--kc)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">すべてのお客様の声を見る</span>
          </span>
          <span class="c-btn-solid-border__l"></span>
          <span class="c-btn-solid-border__t"></span>
          <span class="c-btn-solid-border__r"></span>
          <span class="c-btn-solid-border__b"></span>
          <span class="c-btn-solid-border__icon">
            <i class="fas fa-angle-double-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>
<?php wp_reset_postdata(); ?>
