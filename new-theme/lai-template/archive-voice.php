<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="sticky">
  <main>

    <div class="c-section">
      <div class="container">
        <div class="c-headline__type3">
          <h1 class="c-headline__type3-ttl">お客様満足度98.4%!!<br>多くのお客様に満足頂いています</h1>
        </div>
      </div>
      <div class="c-after c-after__dots"></div>
    </div>

    <section class="c-section">
      <div class="container">
        <div class="row justify-flex-start">
          <?php
          $args = [
            'post_type'      => 'voice',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <div class="col-12 col-md-4 d-flex justify-content-center flex-column u-mb-pc-32 u-mb-sp-32">
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
      </div>
    </section>

    <div class="c-section">
      <div class="container">
        <div class="c-headline__type3">
          <h1 class="c-headline__type3-ttl">親切・丁寧・お値打ちにお客様想いの工事をします！<br>- 解体工事・外構工事・新設プレハブ工事 -</h1>
        </div>
      </div>
      <div class="c-after c-after__dots"></div>
    </div>

    <section class="c-section">
      <div class="container">
        <div class="c-card c-hover--zoom">
          <div class="row u-mb-pc-32 u-mb-sp-32">
            <?php
            $args = [
              'post_type'      => 'case',
              'post_status'    => 'publish',
              'posts_per_page' => 3,
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