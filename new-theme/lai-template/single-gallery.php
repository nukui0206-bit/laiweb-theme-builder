<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="sticky">
  <main>

    <section class="c-section c-section--trans">
      <div class="container container-min">
        <div class="post-content">

          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
          ?>
              <img src="<?= wmp_get_the_catchimage(); ?>">

              <?= the_content(); ?>

              <?php foreach (get_field('photos') as $cnt => $photos) : ?>
                <?php if ($cnt == 0) continue; ?>
                <figure class="c-image u-mb-pc-32 u-mb-sp-32">
                  <img data-lazy-img="<?= $photos['photo']; ?>">
                  <p><?= $photos['caption']; ?></p>
                </figure>
              <?php endforeach; ?>

            <?php
            endwhile;
          else :
            ?>

            <p>投稿が見つかりません。</p>

          <?php
          endif;
          ?>

        </div>
      </div>
    </section>

    <section class="c-section c-section--trans">
      <div class="container">
        <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
          <div class="col-12 col-md-6 order-1 order-md-1">
            <div class="c-headline__type3 text-left">
              <div class="c-headline__type3-sttl u-font-sc u-font-sp-14 u-mb-sp-4">GALLERY</div>
              <h1 class="c-headline__type3-ttl u-font-sp-20 u-mb-sp-24 u-lh-sp-1">その他のギャラリー</h1>
            </div>
          </div>
          <div class="col-12 col-md-6 order-2 order-md-2">
            <p class="text-left u-ml-pc-40 u-lh-pc-4 u-lh-sp-4 u-font-pc-14 u-font-sp-12">
            </p>
          </div>
        </div>
        <div class="c-card c-hover--zoom">
          <div class="row u-mb-pc-32 u-mb-sp-32">
            <?php
            $args = [
              'post_type'      => 'gallery',
              'post_status'    => 'publish',
              'posts_per_page' => 9,
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