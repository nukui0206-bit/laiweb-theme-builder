<?php get_template_part('include/doctype-recruit'); ?>
<?php get_template_part('include/header-recruit'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-recruit'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section class="c-section c-section--wide u-pt-pc-120 u-pt-sp-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8">
            <div class="c-headline__type2 u-mb-pc-48 u-mb-sp-48 js-animate fly-in">
              <h2 class="c-headline__type2-ttl text-center" data-title="PROJECT">プロジェクト紹介</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center c-hover c-hover--blend">
          <?php
          $args = [
            'post_type'      => 'project',
            'post_status'    => 'publish',
            'posts_per_page' => 8,
          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
              $getBn = get_field('bn');
          ?>
              <div class="col-12 col-md-6 text-left u-mb-pc-64 u-mb-sp-64">
                <a href="<?= get_permalink(); ?>" class="c-btn-bn c-link c-hover__link">
                  <figure class="c-image w-100 mb-5 mb-md-3 js-animate fade-in">
                    <div class="c-image__src c-image__src--25 c-image__blend c-hover__target" data-lazy-background="<?= $getBn; ?>"></div>
                  </figure>
                  <h3 class="u-lh-pc-3 u-lh-sp-3"><?= the_title(); ?></h3>
                </a>
              </div>
          <?php
            endwhile;
          endif;
          wp_reset_postdata();
          ?>
        </div>
      </div>
      <div class="c-after c-after__yc"></div>
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