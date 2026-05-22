<?php
/*
<section class="c-section c-section--trans u-pb-pc-32 u-pb-sp-32 popular">
  <div class="container">
    <div class="row">
      <div class="col-12 col-mb-12">
        <div class="c-box">
          <h3 class="title"><i class="fas fa-file"></i>人気のある記事</h3>
          <?php echo do_shortcode('[wpp range="last30days" thumbnail_width=80 thumbnail_height=80 limit=5 stats_views=0]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
*/
?>

<section class="c-section c-section--trans u-pb-pc-32 u-pb-sp-32 category">
  <div class="container">
    <div class="row">
      <div class="col-12 col-mb-12">
        <div class="c-box">
          <h3 class="title"><i class="fas fa-folder-open"></i>カテゴリ</h3>
          <ul>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
              echo '<li><a href="' . get_category_link($category->term_id) . '"><i class="fas fa-angle-right"></i>' . $category->name . '</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="c-section c-section--trans u-pt-pc-0 u-pt-sp-0 u-pb-pc-32 u-pb-sp-32 category">
  <div class="container">
    <div class="row">
      <div class="col-12 col-mb-12">
        <div class="c-box">
          <h3 class="title"><i class="fas fa-folder-open"></i>タグ</h3>
          <ul>
            <?php
            $term_list = get_terms('post_tag', array('number' => 20));
            foreach ($term_list as $term) {
              $link = (get_term_link($term, 'post_tag'));
              echo '<li><a href="' . $link . '"><i class="fas fa-angle-right"></i>' . $term->name . '</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="c-section c-section--trans u-pb-pc-32 u-pb-sp-32 archive">
  <div class="container">
    <div class="row">
      <div class="col-12 col-mb-12">
        <div class="c-box">
          <h3><i class="fas fa-file"></i>過去の記事</h3>
          <?php foreach (wmp_list_archives('post') as $year => $article) { ?>
            <h4 class="year"><?= $year; ?></h4>
            <ul>
              <?php foreach ($article as $month => $count) { ?>
                <li>
                  <a href="<?= home_url(); ?>/date/<?= $year; ?>/<?= $month; ?>/">
                    <?= $month; ?>月 <span class="count"><?= $count; ?></span>
                  </a>
                </li>
              <?php } ?>
            </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>