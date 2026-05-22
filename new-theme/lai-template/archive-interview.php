<?php get_template_part('include/doctype-recruit'); ?>
<?php get_template_part('include/header-recruit'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-recruit-sub'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section class="c-section c-section--wide c-hover c-hover--flash u-pt-pc-120 u-pt-sp-120">
      <div class="container container-min">
        <div class="c-headline__type2 u-mb-pc-32 u-mb-sp-32">
          <h2 class="c-headline__type2-ttl text-center" data-title="INTERVIEW">SEシェアで働く社員インタビュー</h2>
        </div>
        <div class="row d-flex u-mb-pc-32 u-mb-sp-32">
          <?php
          $args = [
            'post_type'      => 'interview',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            $cnt = 1;
            while ($the_query->have_posts()) : $the_query->the_post();
              $name = get_field('name', $post->ID);
              $profile = get_field('profile', $post->ID);
          ?>
              <div class="col-12 col-md-3 align-self-stretch u-mb-sp-32">
                <a href="<?= get_permalink(); ?>" class="d-flex c-hover__link c-link js-animate fly-in<?= ($cnt > 1) ? $cnt : ''; ?>">
                  <div class="d-block w-100 text-left">
                    <figure class="c-image u-mb-sp-8">
                      <div class="c-image__src c-image__src--16 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                    </figure>
                    <div class="py-md-4">
                      <p class="lead"><?= $name; ?></p>
                      <p class="lead"><?= wp_trim_words($profile, 66, '…'); ?></p>
                    </div>
                  </div>
                </a>
              </div>
          <?php
              $cnt++;
            endwhile;
          endif;
          wp_reset_postdata();
          ?>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            <a href="<?= wmp_get_link('recruit/entry', ''); ?>" class="c-btn-solid"><span class="c-btn-solid__txt">今すぐエントリー</span><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <div class="p-recruit-repeat"></div>

</div>
<!-- ▲contents -->

<?php get_template_part('include/footer-recruit'); ?>
<?php get_template_part('include/content_append'); ?>
<?php get_template_part('include/fixarea-recruit'); ?>
<?php get_template_part('include/script'); ?>

<script>
  $(function() {
    const nav = $('.js-nav-recruit');
    $(nav).each(function(index, element) {
      $(element).find('.js-nav-recruit__btn').on('click tap', function(e) {
        $(element).find('.js-nav-recruit__panel').toggleClass("is-active");
      });
    });
  });
</script>

</body>

</html>