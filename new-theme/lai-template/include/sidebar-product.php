<section class="c-section c-section--trans u-pb-pc-32 u-pb-sp-32 category">
  <div class="container">
    <div class="row">
      <div class="col-12 col-mb-12">
        <div class="">
          <h3 class="title"><i class="fas fa-folder-open"></i>カテゴリ</h3>
          <ul>
            <?php
            $terms = get_terms(
              [
                'taxonomy'   => 'productcat',
                'hide_empty' => false,
              ]
            );
            foreach ($terms as $term) {
              echo  '<li><a href="' . get_term_link($term) . '"><i class="fas fa-angle-right"></i>' . esc_html($term->name) . '（' . $term->count . '）</a></li>'; // タームタイトル
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="c-section c-section--trans u-pb-pc-32 u-pb-sp-32">
  <div class="container">
    <div class="row">
      <div class="col-12 col-mb-12">
        <div class="c-hover --zoom">
          <h3 class="title"><i class="fas fa-file"></i>その他商品</h3>
          <div class="row g-5 u-mb-pc-32 u-mb-sp-32">
            <?php
            $args = [
              'post_type'      => 'product',
              'post_status'    => 'publish',
              'posts_per_page' => 5,
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <article class="col-12 col-md-12">
                  <a href="<?= get_permalink(); ?>" class="c-hover__link row">
                    <div class="col-8 col-lg-9 order-2">
                      <h4 class="u-font-pc-12 u-font-sp-12 text-start u-lh-pc-3 u-lh-sp-3"><?= the_title(); ?></h4>
                    </div>
                    <div class="col-4 col-lg-3 order-1">
                      <figure class="c-image">
                        <div class="c-image__src --100 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                      </figure>
                    </div>
                  </a>
                </article>
            <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
/*
<section class="c-section c-section--trans u-pb-pc-32 u-pb-sp-32 popular">
  <div class="container">
    <div class="row">
      <div class="col-12 col-mb-12">
        <div class="c-box">
          <h3 class="title"><i class="fas fa-file"></i>その他事例</h3>
          <?php echo do_shortcode('[wpp range="last30days" thumbnail_width=80 thumbnail_height=80 limit=5 stats_views=0]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>


*/
?>