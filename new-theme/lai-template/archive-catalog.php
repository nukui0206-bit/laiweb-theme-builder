<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section class="c-section c-section--wide c-section--trans c-hover --zoom">
      <div class="container">
        <div class="row justify-content-start u-mb-pc-40 u-mb-sp-40 g-4 g-lg-5 js-animate fly-in">
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $per = 12;
          if (wp_is_mobile()) {
            $per = 12;
          }
          $args = [
            'post_type'      => 'catalog',
            'post_status'    => 'publish',
            'posts_per_page' => $per,
            'paged' => $paged,
          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <div class="col-6 col-lg-4 u-mb-sp-0">
                <article class="p-common-news --first">
                  <a href="<?= get_permalink(); ?>" class="c-hover__link">
                    <figure class="c-image">
                      <?php
                      /*
                      <h2 class="c-image__caption">
                        <?= get_the_title(); ?>
                      </h2>
                      */
                      ?>
                      <div class="c-image__src c-image__src --ratio c-hover__target" style="--ratio: 100% ; --ratio-lg: 100%;" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                    </figure>
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

          <?php if (function_exists("pagination")) : ?>
            <div class="col-12">
              <?= pagination($max_num_page); ?>
            </div>
          <?php endif; ?>
        </div>
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
<?php //get_template_part('include/fixarea'); 
?>
<?php get_template_part('include/script'); ?>

</body>

</html>