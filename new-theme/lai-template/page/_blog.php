<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main>

    <section class="c-section">
      <div class="container">
        <div class="c-card c-hover--zoom">
          <div class="row u-mb-pc-32 u-mb-sp-32">
            <?php
            $args = [
              'post_type'      => 'post',
              'post_status'    => 'publish',
              'posts_per_page' => 9,
            ];
            if (wp_is_mobile()) {
              $args = [
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 6,
              ];
            }

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <div class="col-12 col-md-4">
                  <div class="c-card__item">
                    <a href="<?= get_permalink(); ?>" class="c-card__item-link c-hover__link">
                      <div class="c-card__item-figure c-image">
                        <div class="c-card__item-figure-src c-image__src c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                        <time datetime="<?php the_time('Y-m-d'); ?>" class="c-card__item-date"><?= the_time('Y.m.d') ?></time>
                      </div>
                      <div class="c-card__item-body">
                        <h2 class="c-card__item-ttl"><?= the_title(); ?></h2>
                        <p class="c-card__item-txt"><?= wp_trim_words(get_the_content(), 66, '…'); ?></p>
                      </div>
                    </a>
                  </div>
                </div>
            <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>
          </div>
        </div>

        <?php
        if (function_exists("pagination")) {
          pagination($additional_loop->max_num_pages);
        }
        ?>

      </div>
    </section>

    <section class="c-section">
      <div class="container">
        <div class="c-headline__type">
          <h1 class="c-headline__type-sttl">
            <i class="c-headline__type-icon"><img src="<?= get_thumb_url_medhia_id('full', 119); ?>"></i>
            SNS
          </h1>
        </div>
        <div class="row justify-content-center">
          <div class="col-4 col-md-2 d-flex align-self-stretch u-mb-pc-0 u-mb-sp-12">
            <figure class="c-image u-mb-pc-0 u-mb-sp-12">
              <a href=""><i class="c-image__icon c-image__icon--ig fab fa-instagram"></i></a>
            </figure>
          </div>
          <div class="col-4 col-md-2 d-flex align-self-stretch u-mb-pc-0 u-mb-sp-12">
            <figure class="c-image u-mb-pc-0 u-mb-sp-12">
              <a href=""><i class="c-image__icon c-image__icon--fb fab fa-facebook-f"></i></a>
            </figure>
          </div>
          <div class="col-4 col-md-2 d-flex align-self-stretch u-mb-pc-0 u-mb-sp-12">
            <figure class="c-image u-mb-pc-0 u-mb-sp-12">
              <a href=""><i class="c-image__icon c-image__icon--yt fab fa-youtube"></i></a>
            </figure>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php get_template_part('include/cta'); ?>
  <?php get_template_part('include/gmap'); ?>
  <?php get_template_part('include/bn'); ?>

</div>
<!-- ▲contents -->

<?php get_template_part('include/footer'); ?>
<?php get_template_part('include/content_append'); ?>
<?php get_template_part('include/fixarea'); ?>
<?php get_template_part('include/script'); ?>

</body>

</html>