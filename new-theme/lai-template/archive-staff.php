<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <?php get_template_part('include/common-staff'); ?>

    <?php
    /*
    <section class="c-section c-section--wide c-hover c-hover--flash u-pt-pc-120 u-pt-sp-120">
      <div class="container">
        <div class="row justify-content-center align-items-center u-mb-pc-80 u-mb-sp-40 js-animate fly-in">
          <div class="col-12 col-lg-6">
            <div class="c-headline-leftbig">
              <p class="c-headline-leftbig__sttl">STAFF</p>
              <h1 class="c-headline-leftbig__ttl u-font-sp-24">
                私たちスタイリストが<br>
                責任を持って担当いたします<br>
              </h1>
            </div>
          </div>
          <div class="col-12 col-lg-5 offset-lg-1">
            <p class="text-start fw-bold u-font-fc">
              数店舗で修行を積み､コンテスト入賞､<br>
              ヨーロッパ研修経験もあるスタイリストが代表を務めております。<br>
            </p>
          </div>
        </div>
        <div class="row u-mb-pc-32 u-mb-sp-32">
          <?php
          $args = [
            'post_type'      => 'staff',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            $cnt = 1;
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <div class="col-6 col-md-4 u-mb-pc-32 u-mb-sp-32">
                <a href="<?= get_permalink(); ?>" class="c-card__item-link c-hover__link bg-white">
                  <div class="c-card__item-figure c-image">
                    <div class="c-card__item-figure-src c-image__src --100 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                  </div>
                  <h2 class="c-card__item-ttl"><?= the_title(); ?></h2>
                </a>
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
    */
    ?>

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