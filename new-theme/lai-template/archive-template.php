<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="sticky">
  <main>

    <section class="c-section">
      <div class="container">
        <div class="c-card c-hover--zoom">
          <div class="row u-mb-pc-32 u-mb-sp-32">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
              'post_type'      => 'template',
              'post_status'    => 'publish',
              'posts_per_page' => 10,
              'paged' => $paged,
            ];
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
          pagination($max_num_page);
        }
        ?>

      </div>
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