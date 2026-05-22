<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <div class="container js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">
    <div class="row align-items-start gx-3 gx-lg-5">
      <main class="l-main col-12 col-lg-9">

<section class="c-section c-section--trans p-common-card">
  <div class="container">
    <div class="row gx-3 gx-lg-5 u-mb-pc-32 u-mb-sp-32 js-animate fly-in">
      <div class="col-12">
        <div class="c-headline-compact --gray">
          <h1 class="c-headline-compact__ttl">CASE</h1>
          <p class="c-headline-compact__sttl">制作実績</p>
        </div>
      </div>
    </div>
    <div class="c-card c-hover--zoom">
      <div class="row gx-3 gx-lg-5 u-mb-pc-32 u-mb-sp-32">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = [
                  'post_type'      => 'case',
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
                  $categories = current(get_the_terms($the_query->ID, 'case'));
                ?>
          <div class="col-6 col-lg-4 u-mb-pc-32 u-mb-sp-12">
            <div class="c-card__item">
              <a href="<?= get_permalink(); ?>" class="c-card__item-link c-hover__link">
                <div class="c-card__item-figure c-image">
                  <div class="c-card__item-figure-src c-image__src c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                  <time datetime="<?php the_time('Y-m-d'); ?>" class="c-card__item-date"><?= the_time('Y.m.d') ?></time>
                </div>
                <div class="c-card__item-body">
                  <h2 class="c-card__item-ttl"><?= the_title(); ?></h2>
                  <p class="c-card__item-txt"><?= wp_trim_words(get_the_content(), 66, '…'); ?></p>
                  <div class="lead text-start">
                    <ul>
                      <li>
                        <i class="fas fa-yen-sign"></i> <span class="price"><?= the_field('プラン'); ?></span>
                      </li>
                      <li>
                        <i class="fa-solid fa-building"></i> <?= the_field('業種'); ?>
                      </li>
                    </ul>
                  </div>
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
  </div>
</section>



      </main>

      <aside class="l-aside col-12 col-lg-3 sticky-lg-top c-sticky" id="js-aside">
        <?php get_template_part('include/sidebar-case'); ?>
      </aside>
    </div>
  </div>


    <?php get_template_part('include/cta-compact'); ?>

  <?php //get_template_part('include/gmap'); ?>
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