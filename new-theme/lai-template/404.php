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

    <section class="c-section c-section--trans">
      <div class="container">
        <div class="row justify-content-center align-items-center u-mb-pc-32 u-mb-sp-32 js-animate fly-in">
          <div class="col-12 col-lg-12">
            <div class="c-headline-leftbig">
              <div class="c-headline-compact u-mb-pc-12 u-mb-sp-12">
                <div class="c-headline-compact__ttl">NOT FOUND</div>
                <h2 class="c-headline-compact__sttl">404 - ページが見つかりません</h2>
              </div>
              <h3 class="c-headline-leftbig__ttl">
                404 - ページが見つかりません
              </h3>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-12">
            <div class="c-headline__type2">
              <h1 class="c-headline__type2-ttl text-center">あなたがアクセスしようとしたページは削除されたかURLが変更されています。</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="c-section c-section--trans">
      <div class="container container-min">
        <div class="row justify-content-center">
          <div class="col-12 col-md-12">
            <div class="c-headline__type2">
              <h1 class="c-headline__type2-ttl text-center">下記より希望のページに移動してください</h1>
            </div>
            <div class="c-sitemap">
              <ul>
                <?php //get_template_part('include/nav', null, 3); 
                ?>
                <?php //get_template_part('include/nav-sub'); 
                ?>
                <?php //get_template_part('include/nav-sub2'); 
                ?>
                <?php //get_template_part('include/snav'); 
                ?>

              </ul>
            </div>
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