<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section class=" c-section c-section--wide c-section--trans c-hover --zoom p-common-card">
      <div class="container">
        <div class="row justify-content-center gx-4 gx-lg-5">
          <div class="col-12">
            <div class="row justify-content-center align-items-center">
              <div class="col-12 col-lg-12">
                <div class="c-headline-leftbig">
                  <div class="c-headline-compact u-mb-pc-12 u-mb-sp-12">
                    <div class="c-headline-compact__ttl">NEWS</div>
                    <h2 class="c-headline-compact__sttl">お知らせ</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center gx-4 gx-lg-5 u-mb-pc-40 u-mb-sp-20">
              <?php
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;
              $per = 4;
              if (wp_is_mobile()) {
                $per = 4;
              }
              $args = [
                'post_type'      => 'news',
                'post_status'    => 'publish',
                'posts_per_page' => $per,
                'paged' => $paged,
              ];
              $the_query = new WP_Query($args);
              if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
              ?>
                  <div class="col-6 col-lg-3 u-mb-sp-12">
                    <article class="">
                      <a href="<?= get_permalink(); ?>" class="c-hover__link">
                        <h2 class="ttl u-mb-pc-4 u-mb-sp-0 w-100 js-truncate" data-line="1">
                          <?= get_the_title(); ?>
                        </h2>
                        <figure class="c-image u-mb-pc-16 u-mb-sp-8">
                          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                        </figure>
                        <time datetime="<?php the_time('Y-m-d'); ?>" class="date u-mb-pc-12 u-mb-sp-0"><?= the_time('Y.m.d') ?><?= (wmp_post_new(get_the_ID())) ? ' | update' : ''; ?></time>
                        <div class="read d-none d-lg-block">
                          <?= wp_trim_words(get_the_content(), 30, '...'); ?>
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

            <?php
            if (function_exists("pagination")) {
              pagination($max_num_page);
            }
            ?>

          </div>
        </div>

      </div>
      <?php /* <div class="c-after c-after__dig"></div>*/ ?>
    </section>

  </main>

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