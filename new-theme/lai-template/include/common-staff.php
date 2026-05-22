<section class="c-section c-section--wide c-section--trans js-slick-service c-slick-service">
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
    <div class="row justify-content-center u-mb-sp-40">
      <div class="col-12">
        <div class="u-mb-pc-32 u-mb-sp-32 js-slick__target" data-show="5" data-showsp="3">
          <?php
          $staffArgs = [
            'post_type'      => 'staff',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
          ];
          $the_query = new WP_Query($staffArgs);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
              $cat = get_the_category();
              $cat = $cat[0];
          ?>

              <div class="">
                <a href="<?= get_permalink(); ?>" class="c-hover__link js-slick__link">
                  <figure class="c-image u-mb-pc-12 u-mb-sp-12">
                    <div class="c-image__src c-image__src --ratio --ci c-hover__target" style="--ratio: 100% ; --ratio-lg: 100%; --position: top center" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                  </figure>
                  <h2 class="text-left fw-bold js-truncate" data-line="1"><?= the_title(); ?></h2>
                </a>
              </div>
            <?php
            endwhile;
          endif;
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
              $cat = get_the_category();
              $cat = $cat[0];
            ?>

              <div class="">
                <a href="<?= get_permalink(); ?>" class="c-hover__link js-slick__link">
                  <figure class="c-image u-mb-pc-12 u-mb-sp-12">
                    <div class="c-image__src c-image__src --ratio --ci c-hover__target" style="--ratio: 100% ; --ratio-lg: 100%; --position: top center" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                  </figure>
                  <h2 class="text-left fw-bold js-truncate" data-line="1"><?= the_title(); ?></h2>
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
    <?php if ($args == 'top') : ?>
      <div class="row justify-content-end">
        <div class="col-12 col-md-4 js-animate fly-in">
          <a href="<?= wmp_get_link('staff', ''); ?>" class="c-btn-solid-border u-font-pc-16 u-font-sp-16" style="--color: var(--ac); --border: var(--ac)">
            <span class="c-btn-solid-border__txt">
              <span class="c-btn-solid-border__txt-in">スタッフを見る</span>
            </span>
            <span class="c-btn-solid-border__l"></span>
            <span class="c-btn-solid-border__t"></span>
            <span class="c-btn-solid-border__r"></span>
            <span class="c-btn-solid-border__b"></span>
            <span class="c-btn-solid-border__icon">
              <i class="fas fa-angle-double-right"></i>
            </span>
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>