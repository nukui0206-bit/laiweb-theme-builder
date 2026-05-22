<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section id="contact" class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center gx-4 gx-lg-5">
          <div class="col-12 col-lg-12 u-mb-pc-32 u-mb-sp-32 js-animate fly-in">
            <h1 class="text-center u-font-pc-40 u-font-sp-24 fw-bold u-lh-pc-2 u-lh-sp-2 u-mb-pc-32 u-mb-sp-12">資料ダウンロード</h1>
            <h2 class="text-center u-font-pc-32 u-font-sp-20 fw-bold u-lh-pc-2 u-lh-sp-2 u-mb-pc-32 u-mb-sp-12"><br><span class="u-font-grad u-font-pc-40 u-font-sp-24" style="--start: var(--sc); --end: var(--scd);"></span></h2>
            <h3 class="text-center u-font-pc-24 u-font-sp-12 fw-bold u-mb-pc-12 u-mb-sp-12"></h3>
            <p class="text-start text-lg-center u-mb-pc-64 u-mb-sp-32">
              Laiwebのサービス概要をお伝えする資料を幅広くご用意しております。
            </p>
          </div>
        </div>
    <div class="row justify-content-center">
      <div class="col-12 col-lg-12">
        <div class="c-box-border u-mb-pc-32 u-mb-sp-16" style="--border: 3px solid var(--ac);">
          <h2 class="fw-bold my-4 u-font-pc-24 u-font-sp-20 u-font-sc fw-bold">下記内容が分かります</h2>
          <div class="row justify-content-start u-mb-pc-24 u-mb-sp-18">
            <div class="col-12 col-md-6">
              <h2 class="u-font-pc-24 u-font-sp-18 u-font-rc fw-bold text-start"><i class="fas fa-check-circle"></i>Laiwebについて</h2>
            </div>
            <div class="col-12 col-md-6">
              <h2 class="u-font-pc-24 u-font-sp-18 u-font-rc fw-bold text-start"><i class="fas fa-check-circle"></i>ホームページ制作について</h2>
            </div>
          </div>
          <div class="row justify-content-start u-mb-pc-24 u-mb-sp-18">
            <div class="col-12 col-md-6">
              <h2 class="u-font-pc-24 u-font-sp-18 u-font-rc fw-bold text-start"><i class="fas fa-check-circle"></i>運用代行について</h2>
            </div>
            <div class="col-12 col-md-6">
              <h2 class="u-font-pc-24 u-font-sp-18 u-font-rc fw-bold text-start"><i class="fas fa-check-circle"></i>制作事例</h2>
            </div>
          </div>
          <div class="row justify-content-start u-mb-pc-24 u-mb-sp-18">
            <div class="col-12 col-md-6">
              <h2 class="u-font-pc-24 u-font-sp-18 u-font-rc fw-bold text-start"><i class="fas fa-check-circle"></i>お申込みの流れ</h2>
            </div>
            <div class="col-12 col-md-6">
              <h2 class="u-font-pc-24 u-font-sp-18 u-font-rc fw-bold text-start"><i class="fas fa-check-circle"></i>お支払方法について</h2>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section id="contact" class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-12">
            <div class="post-content">
              <?= do_shortcode('[mwform_formkey key="6311"]'); ?>
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

<script type="text/javascript" src="//ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>

<script type="text/javascript">
(function() {
  var zipInput = document.querySelector('input[name="zip"]');

  zipInput.addEventListener('keyup', function(e) {
    AjaxZip3.zip2addr(this, '', 'address', 'address');
  });

  //数字のみ入力、全角は半角に直す
  document.querySelectorAll('.input_numeric').forEach(function(element) {
    element.addEventListener('input', function(e) {
      let value = e.currentTarget.value;
      value = value
        .replace(/[０-９]/g, function(s) {
          return String.fromCharCode(s.charCodeAt(0) - 65248);
        })
        .replace(/[^0-9]/g, '');
      e.currentTarget.value = value;
    });
  });
})();
</script>

</html>