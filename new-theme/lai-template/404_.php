<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>

<!-- ▼contents -->
<div id="contents" class="sticky">
  <main>

    <?php
    $pages = get_page_by_path('top');
    if (get_field('item', $pages->ID)) :
      foreach (get_field('item', $pages->ID) as $item) :
      //echo apply_filters('the_content', $item['contents']);
      endforeach;
    endif;
    ?>

    <div class="c-section c-section--trans">
      <div class="container">
        <div class="c-headline__type3">
          <h1 class="c-headline__type3-ttl">404 - ページが見つかりません</h1>
          <div class="c-headline__type3-sttl">NOT FOUND</div>
        </div>
      </div>
    </div>

    <section class="c-section c-section--trans">
      <div class="container">
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
            <div class="post-content">
              <ul>
                <?php get_template_part('include/nav', null, 3); ?>
                <?php //get_template_part('include/nav-sub'); 
                ?>
                <?php //get_template_part('include/nav-sub2'); 
                ?>
                <?php get_template_part('include/snav'); ?>

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