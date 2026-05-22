<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/fixarea'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php //get_template_part('include/visual-sub'); 
?>
<?php get_template_part('include/pankuzu'); ?>

<div id="contents">
  <div id="intro" class="sticky section-intro layout-2col">
    <div class="container container-min">
      <div class="row">
        <main id="main" <?php post_class('col-12 col-md-12'); ?>>
          <section class="">
            <div class="headcopy-type waypoint fade-in">
              <h1 class="title"><span>お知らせ</span></h1>
              <div class="subtitle">NEWS</div>
            </div>
            <ul class="nav nav-tabs waypoint fade-in">
              <?php
              //現在のターム名
              $now = $term;
              $terms = get_terms('newscat');
              foreach ($terms as $term) :
              ?>
                <li class="nav-item">
                  <a href="#<?= esc_html($term->slug); ?>" class="nav-link notmove <?= $term->slug == $now ? 'active' : ''; ?>" data-toggle="tab"><span><?= esc_html($term->name); ?></span></a>
                </li>
              <?php endforeach; ?>
            </ul>

            <div class="tab-content">
              <?php foreach ($terms as $term) : ?>
                <div id="<?= esc_html($term->slug); ?>" class="tab-pane <?= $term->slug == $now ? 'active' : ''; ?>">
                  <ul class="list-article-horizontal">
                    <?php
                    $args = array(
                      'post_type' => array('news'),
                      'taxonomy' => 'newscat',
                      'term' => esc_html($term->slug),
                      'posts_per_page' => -1,
                    );
                    $the_query = query_posts($args);
                    ?>
                    <?php foreach ($the_query as $post) : setup_postdata($post); ?>
                      <li class="list-article-horizontal-inner">
                        <article>
                          <a href="<?= get_permalink(); ?>">
                            <div class="date">
                              <time class="time"><?= the_time('y/m/d') ?></time>
                            </div>
                            <div class="text">
                              <div class="title"><?= the_title(); ?></div>
                            </div>
                          </a>
                        </article>
                      </li>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>

                  </ul>
                </div>
              <?php endforeach; ?>
            </div>

            <?php
            if (function_exists("pagination")) {
              pagination($additional_loop->max_num_pages);
            }
            ?>

          </section>

        </main>
      </div>
    </div>
  </div>

  <?php get_template_part('include/common-footer'); ?>

  <?php get_template_part('include/cta'); ?>
  <?php get_template_part('include/gmap'); ?>
  <?php get_template_part('include/bn'); ?>

</div>

<?php get_template_part('include/footer'); ?>
<?php get_template_part('include/content_append'); ?>
<?php get_template_part('include/script'); ?>

</body>

</html>