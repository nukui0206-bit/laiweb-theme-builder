<?php get_template_part('include/doctype-recruit'); ?>
<?php get_template_part('include/header-recruit'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-recruit-sub'); ?>
<?php get_template_part('include/pankuzu-recruit'); ?>

<?php
$name = get_field('name', $post->ID);
?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate p-interview" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <?php
    $getTitles = get_field('title', $post->ID);
    $name = get_field('name', $post->ID);
    $profile = get_field('profile', $post->ID);
    $photo = get_field('photo', $post->ID);
    $join = get_field('join', $post->ID);
    $job = get_field('job', $post->ID);
    ?>

    <section class="c-section c-section--image c-section--wide d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center align-items-center flex-column">
          <div class="col-12 col-md-10">
            <div class="p-interview__box">
              <p class="job u-mb-pc-12 u-mb-sp-12">株式会社SEシェア<br><?= $job; ?></p>
              <p class="name"><?= $name; ?></p>
              <p class="join"><?= $join; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="c-after c-after__image --1" data-lazy-background="<?= $photo; ?>"></div>
    </section>

    <section class="c-section c-section--wide u-pt-pc-120 u-pt-sp-120">
      <div class="container container-min">
        <div class="u-mb-pc-32 u-mb-sp-32">
          <h1 class="u-font-pc-32 u-font-sp-18 text-center u-font-kc" data-title="">
            <?php
            $getTitle = explode("\n", $getTitles);
            ?>
            <?php foreach ($getTitle as $title) : ?>
              <?= $title; ?><br>
            <?php endforeach; ?>
          </h1>
        </div>
        <div class="row d-flex u-mb-pc-32 u-mb-sp-32">
          <div class="post-content c-box">

            <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
            ?>

                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full'); ?>
                <?php endif; ?>

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
        <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            <a href="<?= wmp_get_link('recruit/entry', ''); ?>" class="c-btn-solid"><span class="c-btn-solid__txt">今すぐエントリー</span><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </section>


  </main>

  <div class="p-recruit-repeat"></div>

</div>
<!-- ▲contents -->

<?php get_template_part('include/footer-recruit'); ?>
<?php get_template_part('include/content_append'); ?>
<?php get_template_part('include/fixarea-recruit'); ?>
<?php get_template_part('include/script'); ?>

<script>
  $(function() {
    const nav = $('.js-nav-recruit');
    $(nav).each(function(index, element) {
      $(element).find('.js-nav-recruit__btn').on('click tap', function(e) {
        $(element).find('.js-nav-recruit__panel').toggleClass("is-active");
      });
    });
  });
</script>

</body>

</html>