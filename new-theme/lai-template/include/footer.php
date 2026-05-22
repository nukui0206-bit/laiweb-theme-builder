<div class="g-pagetop">
  <a href="#">
    <i class="fas fa-angle-up"></i>
  </a>
</div>

<footer class="c-section c-section--trans">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-lg-4 u-mb-sp-24 text-start px-4">
        <div class="logo">
          <img src="<?= get_field('logo_2', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>" class="c-image" width="300" height="59">
          <?= get_thumb_url_medhia_id_svg('full', get_field('logo', 'option'), true); ?>
          </a>
        </div>
        <a href="https://laide.co.jp/" class="company-link text-white" target="_blank">
          <span class="company"><?= get_field('company', 'option'); ?></span>
          <i class="fas fa-external-link-alt"></i> <!-- 外部リンクアイコンの追加 -->
        </a>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= wmp_get_link('web', ''); ?>" class="text-white">
              HP制作＆運用代行
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('case', ''); ?>" class="text-white">
              制作実績
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('meomap', ''); ?>" class="text-white">
              MEO対策＆運用代行
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('flow', ''); ?>" class="text-white">
              ご利用の流れ
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= wmp_get_link('web/simple', ''); ?>" class="text-white">
              シンプルプラン
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('web/basic', ''); ?>" class="text-white">
              ベーシックプラン
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('web/standard', ''); ?>" class="text-white">
              スタンダードプラン
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('web/premium', ''); ?>" class="text-white">
              プレミアムプラン
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= wmp_get_link('faq', ''); ?>" class="text-white">
              よくある質問
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('news', ''); ?>" class="text-white">
              お知らせ
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('column', ''); ?>" class="text-white">
              お役立ちコラム
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('download', ''); ?>" class="text-white">
              資料ダウンロード
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= wmp_get_link('terms', ''); ?>" class="text-white">
              利用規約
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('privacy', ''); ?>" class="text-white">
              プライバシーポリシー
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('tradelaw', ''); ?>" class="text-white">
              特定商取引法
            </a>
          </li>
          <li>
            <a href="<?= wmp_get_link('sitemap', ''); ?>" class="text-white">
              サイトマップ
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="c-after c-after__black --9"></div>
  <div class="c-after c-after__image c-after__fixed" style="" data-lazy-background="<?= get_thumb_url_medhia_id('full', 5994); ?>"></div>
</footer>

<footer class="g-footer">
  <div class="container py-0 p-lg-4 d-lg-none"> <!-- d-lg-noneを追加して、大きなディスプレイで非表示に -->
    <ul class="row gx-4 gx-lg-5">
      <?php get_template_part('include/nav', null, 'footer'); ?> <!-- この要素はPCでは非表示 -->
      <?php get_template_part('include/snav', null, 'footer'); ?> <!-- この要素はPCでは非表示 -->
    </ul>
  </div>
</footer>


<?php if (is_home() || is_front_page()) : ?>
  <div class="preloader">
    <div class="preloader-after"></div>
    <div class="preloader-before"></div>
    <div class="preloader-block">
      <div class="title"><img src="<?= get_field('logo_2', 'option'); ?>" alt="" class=""></div>
      <div class="percent en">0</div>
      <div class="loading en">LOADING</div>
    </div>
    <div class="preloader-bar">
      <div class="preloader-progress"></div>
    </div>
  </div>

  <?php
  /*
  <div id="g-loading-svg" class="g-loading-svg">
    <div class="g-loading-svg__inner">
      <div class="g-loading-svg__logo">
        <?= get_thumb_url_medhia_id_svg('full', 92); ?>
      </div>
    </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/vivus@latest/dist/vivus.min.js"></script>
  <script>
    var stroke;
    stroke = new Vivus('loading-mask', { //アニメーションをするIDの指定
        start: 'manual', //自動再生をせずスタートをマニュアルに
        type: 'scenario-sync', // アニメーションのタイプを設定
        duration: 100, //アニメーションの時間設定。数字が小さくなるほど速い
        forceRender: false, //パスが更新された場合に再レンダリングさせない
        animTimingFunction: Vivus.EASE, //動きの加速減速設定
      },
      function() {
        $("#loading-mask").attr("class", "done"); //描画が終わったら
      }
    );

    $(window).on('load', function() {
      $("#g-loading-svg").delay(3000).fadeOut('slow'); //ローディング画面を3秒（3000ms）待機してからフェイドアウト
      $("#g-loading-svg .g-loading-svg__logo").delay(3000).fadeOut('slow'); //ロゴを3秒（3000ms）待機してからフェイドアウト
      stroke.play(); //SVGアニメーションの実行
    });
  </script>

  <div id="loading" class="g-loading-border">
    <div class="g-loading-border__inner">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div class="preloader">
    <div class="preloader-after"></div>
    <div class="preloader-before"></div>
    <div class="preloader-block">
      <div class="title"><img src="<?= get_field('logo_2', 'option'); ?>" alt=""></div>
      <div class="percent en">0</div>
      <div class="loading en">LOADING</div>
    </div>
    <div class="preloader-bar">
      <div class="preloader-progress"></div>
    </div>
  </div>
*/
  ?>

<?php endif; ?>

<?php wp_footer(); ?>