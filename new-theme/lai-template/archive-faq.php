<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">


    <section class="c-section c-section--wide c-section--trans c-faq u-pt-pc-120 u-pt-sp-64">
      <div class="container">
        <div class="row justify-content-center gx-4 gx-lg-5">
          <div class="col-12 col-lg-12 u-mb-pc-32 u-mb-sp-32 js-animate fly-in">
            <h2 class="u-font-pc-34 u-font-pc-20 u-mb-pc-32 fw-bold">
              <span class="u-font-pc-40 u-font-sp-24 c-marker js-animate">よくある質問</span>
            </h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <?php
          $args = [
            'post_type'      => 'faq',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
          ];
          $the_query = new WP_Query($args);
          $cnt = 1;
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <div class="col-12 col-lg-12 d-flex js-animate fade-in<?= ($cnt % 2 == 0) ? '2' : ''; ?>">
                <div class="c-faq__item p-common-texture">
                  <div class="c-faq__item-header">
                    <h2 class="c-faq__item-ttl">Q<?= $cnt; ?> <?= the_title(); ?></h2>
                    <div class="c-faq__item-body">
                      <div class="c-faq__item-body-txt">
                        <?= the_content(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
              $cnt++;
            endwhile;
          endif;
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </section>

    <?php get_template_part('include/area', null, 'common'); ?>
    <?php get_template_part('include/cta-compact'); ?>    


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