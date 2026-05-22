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
  <main class="js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <section class="c-section c-section--wide c-section--white p-recruit-list u-pt-pc-120 u-pt-sp-120">
      <div class="container container-min">
        <div class="c-headline__type2 u-mb-pc-32 u-mb-sp-32">
          <h2 class="c-headline__type2-ttl text-center" data-title="SEARCH">求人募集一覧</h2>
        </div>
        <div class="row">
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $labels = get_taxonomy($taxonomy);
          $args = array(
            'post_type' => 'recruits',
            'posts_per_page' => 12,
            'paged' => $paged,
            'tax_query' => array(
              array(
                'taxonomy' => $labels->name,
                'field' => 'slug',
                'terms' => $term,
              )
            )
          );
          $the_query = get_posts($args);
          $pages = $the_query->max_num_pages;
          $wp_query->max_num_pages = $pages;
          foreach ($the_query as $post) : setup_postdata($post);
            $cat = get_the_category();
            $cat = $cat[0];
            $cat_name = $cat->cat_name;
          ?>
            <div class="col-12 col-md-4 align-self-stretch u-mb-sp-32">
              <a href="<?= get_permalink(); ?>" class="d-flex c-hover__link c-link js-animate fly-in<?= ($cnt > 1) ? $cnt : ''; ?>">
                <div class="d-block w-100 text-left">
                  <figure class="c-image u-mb-sp-8">
                    <div class="c-image__src c-image__src--16 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                  </figure>
                  <div class="py-md-4">
                    <h2 class="font-weight-bold u-lh-pc-2 u-lh-sp-2 u-mb-pc-12 u-mb-sp-12">
                      <?php if (post_date_new($post->ID)) : ?>
                        <span class="c-label u-font-pc-10 u-font-sp-10">NEW</span>
                      <?php endif; ?>
                      <?= the_title(); ?>
                    </h2>
                    <div class="lead">
                      <ul>
                        <li>
                          <i class="fas fa-yen-sign"></i> <span class="price"><?= the_field('単価'); ?></span>円／月
                        </li>
                        <li>
                          <i class="fas fa-user"></i> <?= the_field('契約形態'); ?>
                        </li>
                        <li>
                          <i class="fas fa-code"></i>
                          <?php
                          $a = get_field('この会社が扱う技術');
                          foreach ($a['言語'] as $key => $val) {
                            $term = get_term($val);
                            echo urldecode($term->name);
                            if ($key == count($a['言語']) - 1) {
                            } else {
                              echo ', ';
                            }
                          }
                          ?>
                        </li>
                        <li>
                          <i class="fas fa-map-marker-alt"></i> <?= the_field('最寄り駅'); ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php
          endforeach;
          wp_reset_postdata();
          if (function_exists("pagination")) {
            pagination($max_num_page);
          }
          ?>
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