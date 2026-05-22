<?php

// [***_post] を含むアーカイブの時は、
// [***] にリダイレクトさせたいです。

$post_type = get_post_type();

if(preg_match("/_post$/", $post_type)) {
  $post_type_page = substr($post_type, 0, -5);

  header('Location: '.home_url().'/'.$post_type_page.'/');
  exit;
}

// それ以外の時は普通に表示

get_header('new'); ?>

<div class="l-main">

<?php get_template_part( 'compornent/headline' ); ?>

<?php get_template_part( 'compornent/nav' ); ?>

  <?php breadcrumbs(); ?>

  <div class="l-blog">

    <main class="l-blog-main">

      <?php if (have_posts()) : ?>

        <div class="c-articles-grid-col2 js-grid-col">

          <?php
            while (have_posts()) :
              the_post();

              $category = get_the_category();

              if( $category ) {
                $cat_id   = $category[0]->cat_ID;
                $cat_name = $category[0]->cat_name;
                $cat_slug = $category[0]->category_nicename;
              }

              include 'compornent/post-hint.php';

            endwhile;
          ?>
        </div>

        <?php
          if (function_exists("pagination")) {
            pagination($wp_query->max_num_pages);
          }
          ?>

      <?php else : ?>
        <p class="c-articles-null">表示する記事はありませんでした。</p>

      <?php
        endif;
        wp_reset_postdata();
        wp_reset_query();
      ?>

    </main><!-- /.l-blog-main -->

    <aside class="l-blog-side">

      <?php get_sidebar('hint'); ?>

    </aside><!-- /.l-blog-side -->

  </div><!-- /.l-blog -->

  <?php get_template_part( 'compornent/cta' ); ?>

</div><!-- /.l-main -->

<?php get_footer(); ?>
