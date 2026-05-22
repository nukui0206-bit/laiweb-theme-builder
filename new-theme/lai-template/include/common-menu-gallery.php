<?php
$page = get_post(get_the_ID());
$slug = $page->post_name;
?>
<section class="c-section c-section--trans js-slick p-menu-gallery">
  <div class="container">
    <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
      <div class="col-12 col-md-6 order-1 order-md-1">
        <div class="c-headline__type3 text-left">
          <div class="c-headline__type3-sttl u-font-sc u-font-sp-14 u-mb-sp-4">思い出に残る出張撮影</div>
          <h1 class="c-headline__type3-ttl u-font-sp-20 u-mb-sp-24 u-lh-sp-1">【<?= $page->post_title; ?>】ギャラリー</h1>
        </div>
      </div>
      <div class="col-12 col-md-6 order-2 order-md-2">
        <p class="text-left u-ml-pc-40 u-lh-pc-4 u-lh-sp-4 u-font-pc-14 u-font-sp-12">
          <span class="c-line c-line--white">日時や撮影枚数に決まりはありませんので、</span><br>
          <span class="c-line c-line--white">気楽に自由な記念撮影が行えます。</span>
        </p>
      </div>
    </div>
    <div class="c-hover--zoom" id="lightgallery">
      <div class="row u-mb-pc-32 u-mb-sp-32 js-slick__target">
        <?php
        $args = [
          'post_type'      => 'gallery',
          'post_status'    => 'publish',
          'posts_per_page' => 10,
          'tax_query' => [
            [
              'taxonomy' => 'gallerycat',
              'field' => 'slug',
              'terms' => $slug
            ]
          ]
        ];
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post();
        ?>

            <div class="col-12 col-md-4">
              <a href="<?= wmp_get_the_catchimage(); ?>" class="c-card__item-link c-hover__link" data-fancybox="gallery">
                <figure class="c-image">
                  <div class="c-image__src c-image__src--100 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                </figure>
              </a>
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