<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 js-animate fly-in">
          <div class="col-12 col-md-12">
            <div class="text-center">
              <p class="u-font-kc u-font-pc-20 u-font-sp-14 u-mb-pc-8 u-mb-sp-4 font-weight-bold">準備中</p>
              <h2 class="u-font-pc-32 u-font-sp-20 u-mb-sp-24 u-lh-pc-2 u-lh-sp-1 font-weight-bold">COMMING SOON</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center gx-4 gx-lg-5 u-mb-pc-32">
          <div class="col-12 col-lg-4 u-mb-pc-32 u-mb-sp-32 js-animate fly-in">

          </div>
        </div>
      </div>
      <div class="c-after c-after__bc c-after__bc--8" style="--background-color-rgb: 242 242 242; clip-path: polygon(50% 0%, 80% 0%, 0% 100%, 0% 60%);"></div>
    </section>

    <section class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center gx-4 gx-lg-5">
          <div class="col-12 col-md-12">

          </div>
        </div>
      </div>
      <div class="c-after c-after__bc c-after__bc--8" style="--background-color-rgb: 242 242 242; clip-path: polygon(0 0, 0 100%, 100% 100%);"></div>
    </section>

    <?php //get_template_part('include/common-center'); 
    ?>

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