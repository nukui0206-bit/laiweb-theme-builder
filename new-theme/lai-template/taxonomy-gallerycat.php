<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main>

    <section class="c-section c-section--non c-section--wide">
      <div class="container container-max">
        <ul class="row justify-content-center no-gutters u-pt-pc-32 u-pb-pc-32 u-pt-sp-32 u-pb-sp-32">
          <?php
          $terms = get_terms('gallerycat', 'hide_empty=0');
          foreach ($terms as $term) :
            if ($term->parent == 0) :
          ?>
              <li class="col-auto">
                <a href="<?= get_term_link($term); ?>" class="c-btn u-font-sp-10 mx-2">
                  <?= esc_html($term->name); ?>
                </a>
              </li>
          <?php endif;
          endforeach; ?>
        </ul>
      </div>
      <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 751); ?>"></div>
      <div class="c-after c-after__black c-after__black--8"></div>
    </section>
    <section class="c-section c-section--trans">
      <div class="container">
        <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
          <div class="col-12 col-md-6 order-1 order-md-1">
            <div class="c-headline__type3 text-left">
              <div class="c-headline__type3-sttl u-font-sc u-font-sp-14 u-mb-sp-4">思い出に残る出張撮影</div>
              <h1 class="c-headline__type3-ttl u-font-sp-20 u-mb-sp-24 u-lh-sp-1">ギャラリー</h1>
            </div>
          </div>
          <div class="col-12 col-md-6 order-2 order-md-2">
            <p class="text-left u-ml-pc-40 u-lh-pc-4 u-lh-sp-4 u-font-pc-14 u-font-sp-12">
              <span class="c-line c-line--white">日時や撮影枚数に決まりはありませんので、</span><br>
              <span class="c-line c-line--white">気楽に自由な記念撮影が行えます。</span>
            </p>
          </div>
        </div>
        <div class="c-card c-hover--zoom">
          <div class="row u-mb-pc-32 u-mb-sp-32">
            <?php
            $term_object = get_queried_object();
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
              'post_type'      => 'gallery',
              'post_status'    => 'publish',
              'posts_per_page' => 12,
              'taxonomy' => 'gallerycat',
              'term' => esc_html($term_object->slug),
              'paged' => $paged,
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
                $cat = get_the_category();
                $cat = $cat[0];
                $categories = current(get_the_terms($the_query->ID, 'gallerycat'));
            ?>

                <div class="col-12 col-md-4">
                  <div class="c-card__item c-card__item--none">
                    <a href="<?= get_permalink(); ?>" class="c-card__item-link c-hover__link">
                      <div class="c-card__item-figure c-image">
                        <div class="c-card__item-figure-src c-image__src c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                        <div class="c-card__item-date"><?= $categories->name; ?></div>
                      </div>
                      <div class="c-card__item-body">
                        <h2 class="c-card__item-ttl"><?= the_title(); ?></h2>
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

    <?php //get_template_part('include/common-center'); 
    ?>

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