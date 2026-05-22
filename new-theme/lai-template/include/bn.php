<?php if (get_option('posttype_bn_custom')) : ?>
  <section id="bn" class="section section-bn">
    <div class="section-bn__inner">
      <ul class="section-bn__list hover-zoom">
        <?php
        $args = array(
          'post_type' => 'bn',
          'posts_per_page' => 1,
        );
        $the_query = get_posts($args);

        foreach ($the_query as $key => $post) : setup_postdata($post);
          $bns = get_field('loopbn', $post->ID);
          foreach ($bns as $bn) :
        ?>
            <li class="section-bn__list-item">
              <a href="<?= $bn['link']; ?>">
                <div class="image">
                  <div class="src lazyload" data-bg="<?= $bn['image']; ?>">
                  </div>
                  <div class="text">
                    <span><?= $bn['bn-title']; ?></span>
                  </div>
                </div>
              </a>
            </li>

        <?php
          endforeach;
        endforeach;
        ?>
      </ul>
    </div>
  </section>

<?php endif;
