<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main>
    <section class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="c-card c-hover--zoom">
          <div class="row g-5 u-mb-pc-32 u-mb-sp-32">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
              'post_type'      => 'news',
              'post_status'    => 'publish',
              'posts_per_page' => 9,
              'paged' => $paged,
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <div class="col-6 col-lg-3 u-mb-sp-0">
                  <article class="p-common-news --first">
                    <a href="<?= get_permalink(); ?>" class="c-hover__link">
                      <h2 class="ttl u-mb-pc-4 u-mb-sp-0 w-100">
                        <?= (wp_is_mobile()) ? wp_trim_words(get_the_title(), 16, '...') : wp_trim_words(get_the_title(), 32, '...'); ?>
                      </h2>
                      <figure class="c-image u-mb-pc-16 u-mb-sp-8">
                        <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                      </figure>
                      <time datetime="<?php the_time('Y-m-d'); ?>" class="date u-mb-pc-12 u-mb-sp-0"><?= the_time('Y.m.d') ?><?= (wmp_post_new(get_the_ID())) ? ' | update' : ''; ?></time>
                      <div class="read d-none d-lg-block">
                        <?= wp_trim_words(get_the_content(), 66, '...'); ?>
                      </div>
                    </a>
                  </article>
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
      <div class="c-after c-after__bc c-after__bc--8" style="--background-color-rgb: 242 242 242; clip-path: polygon(50% 0%, 80% 0%, 0% 100%, 0% 60%);"></div>
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