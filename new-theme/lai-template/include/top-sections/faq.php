<?php
if (!function_exists('lai_template_can_show_content_module') || !lai_template_can_show_content_module('faq')) {
  return;
}

$faq_query = new WP_Query(array(
  'post_type'      => lai_template_content_module_post_type('faq'),
  'post_status'    => 'publish',
  'posts_per_page' => 5,
));

if (!$faq_query->have_posts()) {
  wp_reset_postdata();
  return;
}

$faq_count = 1;
?>

<section class="c-section c-section--wide c-section--trans c-faq u-pt-pc-120 u-pt-sp-64">
  <div class="container">
    <div class="row justify-content-center gx-4 gx-lg-5">
      <div class="col-12 col-lg-12 u-mb-pc-32 u-mb-sp-32 js-animate fly-in">
        <div class="c-headline-compact">
          <span class="c-headline-compact__ttl">FAQ</span>
          <h1 class="c-headline-compact__sttl">よくある質問</h1>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
        <div class="col-12 col-lg-12 d-flex js-animate fade-in<?= ($faq_count % 2 === 0) ? '2' : ''; ?>">
          <div class="c-faq__item p-common-texture">
            <div class="c-faq__item-header">
              <h2 class="c-faq__item-ttl">Q<?= esc_html($faq_count); ?> <?= esc_html(get_the_title()); ?></h2>
              <div class="c-faq__item-body">
                <div class="c-faq__item-body-txt">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
        $faq_count++;
      endwhile;
      ?>
    </div>
    <div class="row justify-content-center u-mt-pc-40 u-mt-sp-32 js-animate fly-in">
      <div class="col-12 col-lg-6">
        <a href="<?= esc_url(wmp_get_link('faq', '')); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--color: var(--kc); --border: var(--kc)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">すべてのよくある質問を見る</span>
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
