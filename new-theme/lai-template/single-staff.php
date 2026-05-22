<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate p-common-staff" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <?php
    $getTitles = get_field('title', $post->ID);
    $name = get_field('name', $post->ID);
    $profile = get_field('profile', $post->ID);
    $photo = get_field('photo', $post->ID);
    $join = get_field('join', $post->ID);
    $job = get_field('job', $post->ID);
    ?>

    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>

        <section class="c-section c-section--image c-section--wide d-flex align-items-center">
          <div class="container">
            <div class="row justify-content-center align-items-center flex-column">
              <div class="col-12 col-md-10">
                <div class="p-common-staff__box">
                  <p class="job u-mb-pc-12 u-mb-sp-12"><?= get_field('company', 'option'); ?><br><?= $job; ?></p>
                  <p class="name"><?= the_title(); ?></p>
                  <?php /* <p class="join">aaa</p> */ ?>
                </div>
              </div>
            </div>
          </div>
          <div class="c-after c-after__image --1" data-lazy-background="<?= get_thumb_url_medhia_id('full', 213); ?>"></div>
        </section>

        <section class="c-section c-section--wide c-section--trans">
          <div class="container">
            <div class="row u-mb-sp-32 gx-4 gx-lg-5">
              <div class="col-12 col-lg-6">
                <?php if (has_post_thumbnail()) : ?>
                  <figure class="c-image u-mb-sp-32 js-animate curtain">
                    <div class="c-image__src c-image__src --ratio" style="--ratio: 100% ; --ratio-lg: 100%; --position: top center" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                  </figure>
                <?php endif; ?>
              </div>
              <div class="col-12 col-lg-6 text-start">
                <?= the_content(); ?>
              </div>
            </div>
          </div>
        </section>
    <?php
      endwhile;
    endif;
    ?>

    <?php get_template_part('include/common-staff'); ?>

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

</html>