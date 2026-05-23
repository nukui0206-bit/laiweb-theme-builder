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

$module_count = count($enabled_latest_post_modules);
$column_class = 'col-12 col-lg-4';

if ($module_count === 1) {
  $column_class = 'col-12 col-lg-6';
} elseif ($module_count === 2) {
  $column_class = 'col-12 col-lg-6';
}

$posts_per_module = function_exists('lai_template_latest_posts_count') ? lai_template_latest_posts_count() : 3;
?>

<section class="c-section c-section--wide c-section--white c-hover --flash p-common-news u-pt-pc-120 u-pt-sp-64">
  <div class="container">
    <div class="row justify-content-center gx-4 gx-lg-5">
      <?php
      $module_index = 0;
      foreach ($enabled_latest_post_modules as $module_key => $module) :
        $post_type = lai_template_content_module_post_type($module_key);
        $module_column_class = $column_class;

        if ($module_count >= 3 && $module_index === 1) {
          $module_column_class .= ' border-start-1 border-end-1';
        }
      ?>
        <div class="<?= esc_attr($module_column_class); ?>">
          <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
            <div class="col-12 col-lg-12">
              <div class="c-headline-compact">
                <span class="c-headline-compact__ttl"><?= esc_html($module['en']); ?></span>
                <h1 class="c-headline-compact__sttl"><?= esc_html($module['label']); ?></h1>
              </div>
            </div>
          </div>
          <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 g-4 g-lg-5 js-animate fly-in">
            <?php
            $per = wp_is_mobile() ? min(2, $posts_per_module) : $posts_per_module;
            $the_query = new WP_Query(array(
              'post_type'      => $post_type,
              'post_status'    => 'publish',
              'posts_per_page' => $per,
            ));

            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <div class="col-6 col-lg-12 u-mb-sp-0">
                  <article>
                    <a href="<?= esc_url(get_permalink()); ?>" class="c-hover__link row">
                      <div class="col-12 col-lg-8 order-2">
                        <h2 class="ttl u-mb-pc-4 u-mb-sp-0">
                          <?= esc_html(get_the_title()); ?>
                        </h2>
                        <time datetime="<?php the_time('Y-m-d'); ?>" class="date u-font-pc-12 u-font-sp-12"><?= the_time('Y.m.d') ?><?= (wmp_post_new(get_the_ID())) ? ' | update' : ''; ?></time>
                      </div>
                      <div class="col-12 col-lg-4 order-1">
                        <figure class="c-image u-mb-sp-8">
                          <div class="c-image__src --100 c-hover__target" data-lazy-background="<?= esc_url(wmp_get_the_catchimage()); ?>"></div>
                        </figure>
                      </div>
                    </a>
                  </article>
                </div>
              <?php
              endwhile;
            else :
              ?>
              <div class="col-12 col-lg-6">
                <h2>まだ記事はありません</h2>
              </div>
            <?php
            endif;
            wp_reset_postdata();
            ?>
          </div>
          <div class="row justify-content-end u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
            <div class="col-12 col-lg-12">
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
        </div>
      <?php
        $module_index++;
      endforeach;
      ?>
    </div>
  </div>
  <div class="c-after c-after__bc --8" style="--bc-rgb: 234 247 255; clip-path: polygon(85% 0%, 100% 50%, 85% 100%, 0% 100%, 15% 50%, 0% 0%);"></div>
</section>
