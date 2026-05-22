<?php
/*
Template Name: 都道府県別LP用
*/
?>
<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/visual'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="600" data-repeat="true">

    <?php get_template_part('include/lppref'); ?>

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

<?php
/*
<?= get_css('/assets/js/bootstrap-datepicker.min.css'); ?>
<?= get_js('/assets/js/bootstrap-datepicker.min.js'); ?>
<?= get_js('/assets/js/bootstrap-datepicker.ja.min.js'); ?>

<script>
  $(function() {
    $('#date_start').datepicker({
      language: 'ja'
    });

  });
</script>
*/
?>

</body>

</html>