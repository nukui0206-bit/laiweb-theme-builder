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

        <section class="c-section c-section--trans">
          <div class="post-content">

            <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
            ?>

              <h1><?php the_title(); ?></h1>
                  <div class="c-postmeta__item"><time class="c-postmeta__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time></div>
                <?php if (has_post_thumbnail()) : ?>
                  <div class="u-mb-pc-20 u-mb-sp-20">
                    <figure class="overflow-hidden" style="line-height:0">
                      <?php the_post_thumbnail('full'); ?>
                    </figure>
                  </div>
                <?php endif; ?>

                <div class="c-postmeta">

                  <div class="c-postmeta__item">
                    <?php
                    $terms = wp_get_object_terms($post->ID, '');
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

                <?= the_content(); ?>

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
        <?php get_template_part('include/sidebar-column'); ?>
      </aside>
    </div>

  </div>


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

<script>
  $(function() {
    $('#js-aside').height(function(index, h) {
      $(this).css('--height', h);
    })

  });
</script>

</html>