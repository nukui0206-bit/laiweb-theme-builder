<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main>

    <div class="c-section">
      <div class="container">
        <div class="c-headline__type3">
          <h1 class="c-headline__type3-ttl"><?= the_title(); ?></h1>
        </div>
      </div>
      <div class="c-after c-after__dots"></div>
    </div>

    <section class="c-section">
      <div class="container container-min">
        <div class="post-content">

          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
          ?>

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