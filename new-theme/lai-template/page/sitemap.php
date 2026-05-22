<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <?php
    $pages = get_page_by_path('top');
    if (get_field('item', $pages->ID)) :
      foreach (get_field('item', $pages->ID) as $item) :
      //echo apply_filters('the_content', $item['contents']);
      endforeach;
    endif;
    ?>

    <section class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <div class="c-sitemap">

              <ul>
                <?php get_template_part('include/nav', null, 2); ?>
                <?php //get_template_part('include/nav-sub'); 
                ?>
                <?php //get_template_part('include/nav-sub2'); 
                ?>
                <?php get_template_part('include/snav'); ?>
              </ul>

            </div>
            <div class="post-content">
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php //get_template_part('include/gmap'); 
  ?>
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