<?php
/*
<div class="c-section">
  <div class="container">
    <div class="c-headline__type3 js-animate fly-in">
      <h1 class="c-headline__type3-ttl">お客様満足度98.4%!!<br>多くのお客様に満足頂いています</h1>
    </div>
  </div>
  <div class="c-after c-after__dots"></div>
</div>

<section class="c-section">
  <div class="container">
    <div class="row justify-content-center u-mb-pc-32 u-mb-sp-32">
      <?php
      $args = [
        'post_type'      => 'voice',
        'post_status'    => 'publish',
        'posts_per_page' => 3,
      ];
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
      ?>
          <div class="col-12 col-md-4 d-flex justify-content-center flex-column">
            <figure class="c-image c-image--small">
              <div class="c-image__src c-image__src--ci c-image__src--100" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
            </figure>
            <div class="py-md-4">
              <h3 class=""><?= the_title(); ?></h3>
              <p class="lead text-left"><?= wp_trim_words(get_the_content(), 66, '…'); ?></p>
            </div>
          </div>
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <a href="<?= home_url(); ?>/voice/" class="c-btn">お客様の声を見る<i class="fas fa-angle-right"></i></a>
      </div>
    </div>
  </div>
</section>
*/