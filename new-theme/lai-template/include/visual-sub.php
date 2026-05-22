<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<?php if (is_post_type_archive('news')) : ?>
  <?php if (is_date()) : ?>
    <div class="c-visual-sub">
      <div class="c-visual-sub__inner">
        <div class="container">
          <div class="row js-animate fly-in">
            <div class="col-12">
              <div class="c-visual-sub__headline">
                <h1 class="c-visual-sub__ttl text-white" data-title="ARCHIVE">
                  <?= $gPages['title']; ?> - <?= get_query_var('year'); ?> / <?= get_query_var('monthnum'); ?>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
    </div>
  <?php else : ?>
    <div class="c-visual-sub">
      <div class="c-visual-sub__inner">
        <div class="container">
          <div class="row js-animate fly-in">
            <div class="col-12">
              <div class="c-visual-sub__headline">
                <h1 class="c-visual-sub__ttl text-white" data-title="NEWS">
                  お知らせ
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
    </div>
  <?php endif; ?>
<?php elseif (is_singular('news')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="NEWS">
                <?= the_title(); ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
    <?php
    /*
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', get_post_thumbnail_id($post->ID)); ?>"></div>
    */
    ?>
  </div>
<?php elseif (is_post_type_archive('gallery')) : ?>
  <div id="visual-sub" class="c-visual-sub">
    <figure class="c-image">
      <div class="c-visual-sub__catchcopy">
        <h2 class="c-visual-sub__ttl text-white">
          ギャラリー
        </h2>
        <h3 class="c-visual-sub__sttl">
          GALLERY
        </h3>
      </div>
      <div class="c-image__src --ratio" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
    </figure>
  </div>
<?php elseif (is_singular('gallery')) : ?>
  <div id="visual-sub" class="c-visual-sub">
    <figure class="c-image">
      <div class="c-visual-sub__catchcopy">
        <h2 class="c-visual-sub__ttl text-white">
          <?= the_title(); ?>
        </h2>
        <h3 class="c-visual-sub__sttl">
          GALLERY
        </h3>
      </div>
      <div class="c-image__src --ratio" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
    </figure>
  </div>
<?php elseif (is_404()) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="NOT FOUND">
                404 - ページが見つかりません
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_post_type_archive('property') || is_singular('property')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="PROPERTY">
                カンボジア物件情報
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_post_type_archive('seminar') || is_singular('seminar')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="SEMINAR">
                セミナー情報
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_post_type_archive('case') || is_singular('case')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="CASE">
                お客様の事例
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_post_type_archive('voice') || is_singular('voice')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="VOICE">
                お客様の声
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_post_type_archive('faq') || is_singular('faq')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="FAQ">
                よくある質問
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_singular('post')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="BLOG">
                <?= the_title(); ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_post_type_archive('column') || is_singular('column')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="COLUMN">
                お役立ちコラム
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_post_type_archive('recruits') || is_singular('recruits')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="RECRUIT">
                採用情報
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_date()) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="ARCHIVE">
                <?= $gPages['title']; ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', get_post_thumbnail_id($post->ID)); ?>"></div>
  </div>
<?php elseif (is_tag()) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="TAG">
                <?= single_tag_title("", false); ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
  <?php elseif (is_tax()) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="<?= $gPages['slug']; ?>">
                <?= $gPages['title']; ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6235); ?>"></div>
  </div>
<?php elseif (is_page('system') || is_page('beauty') || is_page('esthetic')) : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="SERVICE">
                サービス
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', get_post_thumbnail_id($post->ID)); ?>"></div>
  </div>
<?php else : ?>
  <div class="c-visual-sub">
    <div class="c-visual-sub__inner">
      <div class="container">
        <div class="row js-animate fly-in">
          <div class="col-12">
            <div class="c-visual-sub__headline">
              <h1 class="c-visual-sub__ttl text-white" data-title="<?= $gPages['slug']; ?>">
                <?= $gPages['title']; ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', get_post_thumbnail_id($post->ID)); ?>"></div>
  </div>
<?php endif; ?>