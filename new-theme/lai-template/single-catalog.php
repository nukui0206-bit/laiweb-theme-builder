<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate p-common-staff" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        $selling_point = get_field('selling-point', $post->ID);
        $comment = get_field('comment', $post->ID);
        $photos = get_field('photos', $post->ID);
    ?>
        <section class="c-section c-section--wide c-section--trans p-common-service p-common-intro">
          <div class="container js-slider c-slider">
            <div class="row justify-content-center u-mb-pc-32 u-mb-sp-32 g-5">
              <div class="col-12 col-lg-6">

                <h2 class="p-common-intro__ttl mb-5">
                  <?= $selling_point; ?>
                </h2>

                <div id="js-sticky" class="sticky-lg-top c-sticky" style="--top: 120px">
                  <div class="row u-mb-pc-32 u-mb-sp-20 js-slider__target c-slider__main">
                    <?php
                    foreach ($photos as $val) {
                      $photo = $val['photo'];
                    ?>
                      <div class="col-12 col-lg-4">
                        <figure class="c-image">
                          <div class="c-image__src c-image__src --ratio c-hover__target" data-lazy-background="<?= $photo; ?>" style="--ratio: 120% ; --ratio-lg: 120%;"></div>
                        </figure>
                      </div>
                    <?php
                    }
                    ?>
                  </div>

                  <div class="u-mb-pc-32 u-mb-sp-32 js-slider__thum c-slider__thum">
                    <?php
                    foreach ($photos as $val) {
                      $photo = $val['photo'];
                    ?>
                      <figure class="c-image rounded-0">
                        <div class="c-image__src c-image__src --4 c-hover__target" data-lazy-background="<?= $photo; ?>"></div>
                      </figure>
                    <?php
                    }
                    ?>
                  </div>

                  <?php
                  /*
                <div class="c-postmeta">
                  <div class="c-postmeta__item"><time class="c-postmeta__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time></div>
                  <div class="c-postmeta__item">
                    <?php
                    $terms = wp_get_object_terms($post->ID, 'category');
                    foreach ($terms as $term) :
                    ?>
                      <a href="<?= get_term_link($term) ?>"><span class="c-postmeta__cat"><?php echo $term->name; ?></span></a>
                    <?php endforeach; ?>
                  </div>
                  <div class="c-postmeta__item">
                    <?php
                    $terms = wp_get_object_terms($post->ID, 'post_tag');
                    foreach ($terms as $term) :
                    ?>
                      <a href="<?= get_term_link($term) ?>"><span class="c-postmeta__tag"><?php echo $term->name; ?></span></a>
                    <?php endforeach; ?>
                  </div>
                </div>
                */ ?>

                </div>

              </div>
              <div class="col-12 col-lg-6">
                <div class="u-mb-pc-48 u-mb-sp-32">

                  <?php if (have_rows('data')) : ?>
                    <div class="u-mb-pc-48 u-mb-sp-32">
                      <div class="c-headline-compact --gray">
                        <p class="c-headline-compact__ttl">STYLE DATA</p>
                        <h2 class="c-headline-compact__sttl">スタイルデータ</h2>
                      </div>
                      <table class="c-table --nores">
                        <?php while (have_rows('data')) : the_row(); ?>
                          <tr>
                            <th><?php the_sub_field('title'); ?></th>
                            <td><?php the_sub_field('body'); ?></td>
                          </tr>
                        <?php endwhile; ?>
                      </table>
                    </div>
                  <?php endif; ?>

                </div>

                <div class="u-mb-pc-48 u-mb-sp-32">
                  <div class="c-headline-compact --gray u-mb-pc-20 u-mb-sp-20">
                    <p class="c-headline-compact__ttl">STYLIST COMMENT</p>
                    <h2 class="c-headline-compact__sttl">スタイリストコメント</h2>
                  </div>
                  <div class="text-start">
                    <?= $comment; ?>
                  </div>
                </div>

                <div class="row justify-content-end u-mb-pc-40 u-mb-sp-40">
                  <div class="col-12 u-mb-pc-12 u-mb-sp-12">
                    <a href="https://beauty.hotpepper.jp/slnH000419385/" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--color: var(--sc); --border: var(--sc)" target="_blank">
                      <span class="c-btn-solid-border__txt">
                        <span class="c-btn-solid-border__txt-in"><i class="fas fa-cut"></i> ネット予約</span>
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
                  <div class="col-12 u-mb-pc-12 u-mb-sp-12">
                    <a href="https://www.instagram.com/rhythm.takasaki8/" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--color: var(--sc); --border: var(--sc)" target="_blank">
                      <span class="c-btn-solid-border__txt">
                        <span class="c-btn-solid-border__txt-in"><i class="fab fa-instagram"></i> instagramで予約</span>
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
                  <div class="col-12">
                    <span class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" data-action="call" data-tel="<?= get_field('tel_contact', 'option'); ?>" style="--color: var(--sc); --border: var(--sc)">
                      <span class="c-btn-solid-border__txt">
                        <span class="c-btn-solid-border__txt-in"><i class="fas fa-phone-square-alt"></i> 電話で予約</span>
                      </span>
                      <span class="c-btn-solid-border__l"></span>
                      <span class="c-btn-solid-border__t"></span>
                      <span class="c-btn-solid-border__r"></span>
                      <span class="c-btn-solid-border__b"></span>
                      <span class="c-btn-solid-border__icon">
                        <i class="fas fa-angle-double-right"></i>
                      </span>
                    </span>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>

    <section class="c-section c-section--wide c-section--trans c-hover --zoom">
      <div class="container">
        <div class="row justify-content-center align-items-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
          <div class="col-12 col-lg-12">
            <div class="c-headline-leftbig">
              <p class="c-headline-leftbig__sttl">CATALOG</p>
              <h2 class="c-headline-leftbig__ttl">
                ヘアカタログ
              </h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-start u-mb-pc-40 u-mb-sp-40 g-4 g-lg-5 js-animate fly-in">
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $per = 12;
          if (wp_is_mobile()) {
            $per = 12;
          }
          $args = [
            'post_type'      => 'catalog',
            'post_status'    => 'publish',
            'posts_per_page' => $per,
            'paged' => $paged,
          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <div class="col-6 col-lg-4 u-mb-sp-0">
                <article class="p-common-news --first">
                  <a href="<?= get_permalink(); ?>" class="c-hover__link">
                    <figure class="c-image">
                      <h2 class="c-image__caption">
                        <?= get_the_title(); ?>
                      </h2>
                      <div class="c-image__src c-image__src --ratio c-hover__target" style="--ratio: 100% ; --ratio-lg: 100%;" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                    </figure>
                  </a>
                </article>
              </div>
            <?php
            endwhile;
          else :
            ?>
            <div class="col-12 col-lg-6">
              <h2>まだ記事はありません</h2>
            </div>
          <?php
          endif;
          wp_reset_postdata();
          ?>

          <?php if (function_exists("pagination")) : ?>
            <div class="col-12">
              <?= pagination($max_num_page); ?>
            </div>
          <?php endif; ?>
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
<?php //get_template_part('include/fixarea'); 
?>
<?php get_template_part('include/script'); ?>

</body>

<script>
  $(function() {
    $(window).on('load', function() {
      $('#js-sticky').height(function(index, h) {
        $(this).css('--height', h + 'px');
      })
    });
  });
</script>

</html>