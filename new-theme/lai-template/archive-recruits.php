<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section class="c-section c-section--wide">
      <div class="container js-animate fly-in">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8">
            <h1 class="text-center u-font-pc-32 u-font-sp-24 fw-bold u-lh-sp-2 u-mb-sp-12">ともに成長し、ともに働きませんか？</h1>
            <h2 class="text-center u-font-pc-24 u-font-sp-14 fw-bold u-mb-pc-12 u-mb-sp-12">お客様の快適な暮らしをサポートする仲間を募集しています。</h2>
            <p class="text-start text-lg-center u-mb-pc-20 u-mb-sp-20">
              当社では水道工事や設備の販売・取り付け・修理など、<br>
              幅広い業務を行っています。<br>
              <br>
              経験と知識を持ち、専門的な技術や知識を活かして<br>
              仕事に取り組むことができる人材を求めています。<br>
              <br>
              私たちと共に成長し、お客様の快適な暮らしをサポートする仲間を募集しています。<br>
              もし私たちの仕事に共感し、意欲を持って取り組める方であれば、<br>
              ぜひご応募ください。<br>
              <br>
              私たちはあなたの才能と情熱を歓迎します。
            </p>
          </div>
        </div>
      </div>
      <div class="c-after c-after__grad-fade"></div>
      <div class="c-after c-after__white --3"></div>
      <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6068); ?>"></div>
    </section>

    <section class="c-section c-section--wide c-section--white p-recruit-list u-pt-pc-120 u-pt-sp-120">
      <div class="container container-min">
        <div class="c-headline__type2 u-mb-pc-32 u-mb-sp-32">
          <h2 class="c-headline__type2-ttl text-center" data-title="SEARCH">求人募集一覧</h2>
        </div>
        <div class="row">
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $args = array(
            'post_type' => 'recruits',
            'posts_per_page' => 12,
            'paged' => $paged,
          );
          $the_query = new WP_Query($args);
          $pages = $the_query->max_num_pages;
          $wp_query->max_num_pages = $pages;

          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();

              $cat = get_the_category();
              $cat = $cat[0];
              $cat_name = $cat->cat_name;
          ?>
              <div class="col-12 col-md-4 align-self-stretch u-mb-sp-32">
                <a href="<?= get_permalink(); ?>" class="d-flex c-hover__link c-link js-animate fly-in<?= ($cnt > 1) ? $cnt : ''; ?>">
                  <div class="d-block w-100 text-left">
                    <figure class="c-image u-mb-sp-8">
                      <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                    </figure>
                    <div class="py-md-4">
                      <h2 class="fw-bold u-lh-pc-2 u-lh-sp-2 u-mb-pc-12 u-mb-sp-12 text-start">
                        <?= the_title(); ?>
                      </h2>
                      <div class="lead text-start">
                        <ul>
                          <li>
                            <i class="fas fa-yen-sign"></i> <span class="price"><?= the_field('単価'); ?></span>
                          </li>
                          <li>
                            <i class="fas fa-user"></i> <?= the_field('契約形態'); ?>
                          </li>
                          <li>
                            <i i class="fa-solid fa-building"></i> <?= the_field('職種'); ?>
                          </li>
                          <li>
                            <i class="fas fa-map-marker-alt"></i> 勤務地：<?= the_field('勤務地'); ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
          <?php
            endwhile;
          endif;
          wp_reset_postdata();
          if (function_exists("pagination")) {
            pagination($max_num_page);
          }
          ?>
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