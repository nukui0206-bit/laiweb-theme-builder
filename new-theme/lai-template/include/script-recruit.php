<?= get_js('/assets/js/slick.min.js'); ?>

<?= get_js('/assets/js/jquery.truncator.min.js'); ?>

<?= get_js('/assets/js/jquery.common.min.js'); ?>

<?= get_js('/assets/js/bootstrap.min.js'); ?>

<link rel="preload" as="style" data-lazy-link="//use.fontawesome.com/releases/v5.15.4/css/all.css" onload="this.onload=null;this.rel='stylesheet'" />

<script>
  // google fontsを非同期で読み込み
  window.WebFontConfig = {
    google: {
      families: ['Nunito+Sans:400;700']
    },
    active: function() {
      sessionStorage.fonts = true;
    },
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = '//ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
</script>

<?php if (get_field('link_disabled', 'option')) : ?>
  <script>
    $('a[href]:not([href ^= "javascript:void(0)"],[href ^= "#"],[href ^= "tel:"],[class ^= gallery],[class ^= ok])').attr("href", "/");
  </script>
<?php endif; ?>