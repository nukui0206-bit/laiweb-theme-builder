<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php  get_template_part('include/visual-sub'); ?>
<?php // get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section id="contact" class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-12">
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