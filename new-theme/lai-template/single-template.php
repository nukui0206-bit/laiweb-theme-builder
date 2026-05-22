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
          <h1 class="c-headline__type3-ttl"><?= the_title(); ?></h1>
        </div>
      </div>
      <div class="c-after c-after__dots"></div>
    </div>

    <?php
    if (get_field('item', $post->ID)) :
      foreach (get_field('item', $post->ID) as $item) :
        remove_filter('the_content', 'wpautop');
        echo apply_filters('the_content', $item['contents']);
        $html = esc_html($item['contents']);
    ?>
        <div class="c-section c-section--black g-form">
          <div class="container">
            <textarea class="w-100" style="height:400px"><?= $html; ?></textarea>
          </div>
        </div>
    <?php
      endforeach;
    endif;
    ?>

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