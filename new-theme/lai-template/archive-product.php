<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">

<section class="c-section c-section--wide">
  <div class="container js-animate fly-in">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <h1 class="text-center u-font-pc-32 u-font-sp-20 fw-bold u-lh-sp-2 u-mb-sp-12">水まわりからお客様の安心と安全を守る</h1>
        <p class="text-start text-lg-center u-mb-pc-20 u-mb-sp-20">
          水まわりからお客様の安心と安全を守るタウン水道センターで行っている<br>
          施工内容をご紹介させていただきます。<br>
          幅広いお悩みに対応していますのでぜひご参考ください。
        </p>
      </div>
    </div>
  </div>
  <div class="c-after c-after__grad-fade"></div>
  <div class="c-after c-after__white --3"></div>
  <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6004); ?>"></div>
</section>

  <div class="container js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">
    <div class="row align-items-start gx-3 gx-lg-5">
      <main class="l-main col-12 col-lg-9 pt-0">

        <section class="c-section c-section--trans p-common-card">
          <div class="">
            <div class="c-card c-hover --zoom">
              <div class="row gx-3 gx-lg-5 u-mb-pc-32 u-mb-sp-32">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = [
                  'post_type'      => 'product',
                  'post_status'    => 'publish',
                  'posts_per_page' => 9,
                  'paged' => $paged,
                ];
                $the_query = new WP_Query($args);
                $pages = $the_query->max_num_pages;
                $wp_query->max_num_pages = $pages;

                if ($the_query->have_posts()) :
                  while ($the_query->have_posts()) : $the_query->the_post();

                  $cat = get_the_category();
                  $cat = $cat[0];
                  $categories = current(get_the_terms($the_query->ID, 'productcat'));
                ?>
                  <div class="col-6 col-lg-4 u-mb-pc-32 u-mb-sp-12">
                    <article class="js-animate-set js-fadein">
                      <a href="<?= get_permalink(); ?>" class="c-hover__link">
                        <h2 class="ttl u-mb-pc-4 u-mb-sp-0 w-100 js-truncate" data-line="1">
                          <?= get_the_title(); ?>
                        </h2>
                        <figure class="c-image u-mb-pc-16 u-mb-sp-8">
                          <div class="c-image__src --100 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                          <div class="c-image__caption" style="--bc: var(--rc)"><?= $categories->name; ?></div>
                        </figure>
                        <time datetime="<?php the_time('Y-m-d'); ?>" class="date u-mb-pc-12 u-mb-sp-0"><?= the_time('Y.m.d') ?><?= (wmp_post_new(get_the_ID())) ? ' | update' : ''; ?></time>
                        <div class="read d-none d-lg-block">
                          <?= wp_trim_words(get_the_content(), 30, '...'); ?>
                        </div>
                      </a>
                    </article>
                  </div>
                <?php
                  $cnt++;
                  endwhile;
                endif;
                wp_reset_postdata();
                ?>
              </div>
            </div>

            <?php
            if (function_exists("pagination")) {
              pagination($max_num_page);
            }
            ?>

          </div>
        </section>

      </main>

      <aside class="l-aside col-12 col-lg-3 sticky-lg-top c-sticky" id="js-aside">
        <?php get_template_part('include/sidebar-product'); ?>
      </aside>
    </div>
  </div>

  <?php get_template_part('include/common-center'); ?>
  <?php get_template_part('include/common-cta'); ?>

  <?php get_template_part('include/gmap'); ?>
  <?php get_template_part('include/cta'); ?>
  <?php get_template_part('include/bn'); ?>

</div>
<!-- ▲contents -->

<?php get_template_part('include/footer'); ?>
<?php get_template_part('include/content_append'); ?>
<?php get_template_part('include/fixarea'); ?>
<?php get_template_part('include/script'); ?>

</body>

</html>