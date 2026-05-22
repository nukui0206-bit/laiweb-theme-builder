<?php
wp_reset_query();
$ctas = wmp_get_cta($post->ID);
if($ctas !== false) :
$image = (isset($ctas['image']) && $ctas['image'] !== '') ? $ctas['image'] : "";
?>
            <section class="section post-cta texture" style="background-image: url(<? home_url(); ?>/assets/img/texture/gplay.png),url(<? home_url(); ?>/assets/img/top/visual03.jpg)">
              <div class="inner">
                <h4 class="title"><?= $ctas['title']; ?></h4>
                <div class="image">
                  <?= $image; ?>
                </div>
                <div class="text">
                  <div class="description">
                    <?= $ctas['content']; ?>
                  </div>
                </div>
                <p class="link parts-btn-layout3">
                  <a href="<?= $ctas['select_button_url']; ?>"><?= $ctas['select_button']; ?></a>
                </p>
              </div>
            </section>
<?php
endif;
