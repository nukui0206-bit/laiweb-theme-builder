<?php
$latest_post_modules = array(
  'news' => array(
    'en' => 'NEWS',
    'label' => 'お知らせ',
    'button' => 'すべてのお知らせを見る',
  ),
  'column' => array(
    'en' => 'COLUMN',
    'label' => 'コラム',
    'button' => 'すべてのコラムを見る',
  ),
  'case' => array(
    'en' => 'CASE',
    'label' => '制作実績',
    'button' => 'すべての制作実績を見る',
  ),
);

$enabled_latest_post_modules = function_exists('lai_template_enabled_latest_posts_modules') ? lai_template_enabled_latest_posts_modules() : array();
$enabled_latest_post_modules = array_intersect_key($latest_post_modules, array_flip($enabled_latest_post_modules));

if (empty($enabled_latest_post_modules)) {
  return;
}

$posts_per_module = function_exists('lai_template_latest_posts_count') ? lai_template_latest_posts_count() : 3;
?>

<section class="c-section c-section--white c-hover --flash p-common-news u-pt-pc-120 u-pt-sp-64 u-pb-pc-120 u-pb-sp-64">
  <div class="container">
    <div class="row justify-content-center u-mb-pc-64 u-mb-sp-40 js-animate fly-in">
      <div class="col-12">
        <div class="c-headline-compact">
          <span class="c-headline-compact__ttl">LATEST</span>
          <h1 class="c-headline-compact__sttl">新着一覧</h1>
        </div>
      </div>
    </div>
    <?php foreach ($enabled_latest_post_modules as $module_key => $module) :
      $post_type = lai_template_content_module_post_type($module_key);
    ?>
      <div class="row justify-content-center u-mb-pc-64 u-mb-sp-48 js-animate fly-in">
        <div class="col-12">
          <div class="d-flex align-items-end justify-content-between u-mb-pc-32 u-mb-sp-24">
            <div class="c-headline-compact">
              <span class="c-headline-compact__ttl"><?= esc_html($module['en']); ?></span>
              <h2 class="c-headline-compact__sttl"><?= esc_html($module['label']); ?></h2>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row g-4 g-lg-5">
            <?php
            $the_query = new WP_Query(array(
              'post_type'      => $post_type,
              'post_status'    => 'publish',
              'posts_per_page' => $posts_per_module,
            ));

            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <div class="col-12 col-md-6 col-lg-4">
                  <article class="h-100">
                    <a href="<?= esc_url(get_permalink()); ?>" class="c-hover__link d-block h-100">
                      <figure class="c-image u-mb-pc-16 u-mb-sp-12">
                        <div class="c-image__src --62 c-hover__target" data-lazy-background="<?= esc_url(wmp_get_the_catchimage()); ?>"></div>
                      </figure>
                      <time datetime="<?php the_time('Y-m-d'); ?>" class="date u-font-pc-14 u-font-sp-12"><?= the_time('Y.m.d') ?><?= (wmp_post_new(get_the_ID())) ? ' | update' : ''; ?></time>
                      <h3 class="ttl u-mt-pc-8 u-mt-sp-4 u-mb-pc-0 u-mb-sp-0"><?= esc_html(get_the_title()); ?></h3>
                    </a>
                  </article>
                </div>
              <?php
              endwhile;
            else :
              ?>
              <div class="col-12">
                <p>まだ記事はありません</p>
              </div>
            <?php
            endif;
            wp_reset_postdata();
            ?>
          </div>
        </div>
        <div class="col-12 col-lg-4 u-mt-pc-32 u-mt-sp-24">
          <a href="<?= esc_url(wmp_get_link($post_type, '')); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--color: var(--kc); --border: var(--kc)">
            <span class="c-btn-solid-border__txt">
              <span class="c-btn-solid-border__txt-in"><?= esc_html($module['button']); ?></span>
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
    <?php endforeach; ?>
  </div>
</section>
