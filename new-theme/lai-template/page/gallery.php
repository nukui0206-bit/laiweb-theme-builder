<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main>

    <section class="c-section c-section--wide c-section--trans">
      <div class="container container-min">
        <div class="row justify-content-center js-animate fly-in">
          <div class="col-12 col-md-12">
            <div class="text-center">
              <h1 class="u-font-pc-32 u-font-sp-20 u-mb-sp-24 u-lh-pc-2 u-lh-sp-1 font-weight-bold">いいね・フォローお願いします</h1>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-12">
            <?php get_template_part('include/common-instagram'); ?>
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
<?php //get_template_part('include/fixarea'); 
?>
<?php get_template_part('include/script'); ?>

<script type="text/javascript" src="//ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>

</body>

</html>