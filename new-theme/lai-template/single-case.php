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

        <section class="c-section c-section--trans pt-0">
          <div class="container">
            <div class="row">
              <div class="col-12">

            <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
            ?>



                <table class="c-table u-mb-pc-64 u-mb-sp-32">
                  <tr>
                    <th>会社名</th>
                    <td><span class="u-font-pc-20 u-font-sp-20 fw-bold u-font-kc"><?= the_field('会社名'); ?></span></td>
                  </tr>
                  <tr>
                    <th>プラン</th>
                    <td><?= the_field('プラン'); ?></td>
                  </tr>
                  <tr>
                    <th>URL</th>
                    <td><a href="<?= the_field('ホームページ'); ?>" target="_blank"><?= the_field('ホームページ'); ?> <i class="fas fa-external-link-alt"></i></a></td>
                  </tr>
                  <tr>
                    <th>状況</th>
                    <td><?= the_field('状況'); ?></td>
                  </tr>
                  <tr>
                    <th>業種</th>
                    <td><?= the_field('業種'); ?></td>
                  </tr>
                  <tr>
                    <th>地域</th>
                    <td><?= the_field('地域'); ?></td>
                  </tr>
                  <tr>
                    <th>目的</th>
                    <td><?= the_field('目的'); ?></td>
                  </tr>
                </table>
                 <?php
            $gallery = get_field('photos');
            if ($gallery) :
            ?>
              <div class="photo-gallery u-mb-pc-40 u-mb-sp-24">
                <?php foreach ($gallery as $ga) : ?>
                  <div class="photo-gallery__item">
                    <figure class="c-image u-mb-pc-0 u-mb-sp-0">
                      <div class="c-image__caption text-light bg-dark"><?= $ga['caption']; ?></div>
                      <?php $sizes = wmp_get_image_width_and_height($ga['photo']); ?>
                      <img src="<?= $ga['photo']; ?>" alt="<?= $ga['caption']; ?>" width="<?= $sizes['width']; ?>" height="<?= $sizes['height']; ?>">
                    </figure>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php 
            endif;
            ?>
                <a href="<?= wmp_get_link('contact', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto u-mb-pc-64 u-mb-sp-32" style="--color: var(--ac); --border: var(--ac)">
                  <span class="c-btn-solid-border__txt">
                    <span class="c-btn-solid-border__txt-in">無料相談する</span>
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

              <?php
              endwhile;
            else :
              ?>

              <p>投稿が見つかりません。</p>

            <?php
            endif;
            ?>

          </div>
        </section>




      </main>

      <aside class="l-aside col-12 col-lg-3 sticky-lg-top c-sticky" id="js-aside">
        <?php get_template_part('include/sidebar-case'); ?>
      </aside>
    </div>
  </div>


<section class="c-section c-section--wide c-section--trans p-common-recruit">
  <div class="container">
    <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
      <div class="col-12 col-lg-12">
        <div class="c-headline-compact --gray">
          <h1 class="c-headline-compact__ttl">CASE</h1>
          <p class="c-headline-compact__sttl">その他の制作実績</p>
        </div>
      </div>
    </div>
  </div>
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