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
          <img src="<?= esc_url(get_field('logo_2', 'option')); ?>" alt="<?= esc_attr(get_field('company', 'option')); ?>" class="c-image" width="300" height="59">
          <?= get_thumb_url_medhia_id_svg('full', get_field('logo', 'option'), true); ?>
        </div>
        <a href="https://laide.co.jp/" class="company-link text-white" target="_blank">
          <span class="company"><?= esc_html(get_field('company', 'option')); ?></span>
          <i class="fas fa-external-link-alt"></i>
        </a>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= esc_url(wmp_get_link('web', '')); ?>" class="text-white">
              HP制作＆運用代行
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('case', '')); ?>" class="text-white">
              制作実績
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('meomap', '')); ?>" class="text-white">
              MEO対策＆運用代行
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('flow', '')); ?>" class="text-white">
              ご利用の流れ
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= esc_url(wmp_get_link('web/simple', '')); ?>" class="text-white">
              シンプルプラン
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('web/basic', '')); ?>" class="text-white">
              ベーシックプラン
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('web/standard', '')); ?>" class="text-white">
              スタンダードプラン
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('web/premium', '')); ?>" class="text-white">
              プレミアムプラン
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= esc_url(wmp_get_link('faq', '')); ?>" class="text-white">
              よくある質問
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('news', '')); ?>" class="text-white">
              お知らせ
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('column', '')); ?>" class="text-white">
              お役立ちコラム
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('download', '')); ?>" class="text-white">
              資料ダウンロード
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-2 d-flex flex-column h-100 d-none d-lg-block">
        <ul class="list text-start">
          <li>
            <a href="<?= esc_url(wmp_get_link('terms', '')); ?>" class="text-white">
              利用規約
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('privacy', '')); ?>" class="text-white">
              プライバシーポリシー
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('tradelaw', '')); ?>" class="text-white">
              特定商取引法
            </a>
          </li>
          <li>
            <a href="<?= esc_url(wmp_get_link('sitemap', '')); ?>" class="text-white">
              サイトマップ
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="c-after c-after__black --9"></div>
  <div class="c-after c-after__image c-after__fixed" data-lazy-background="<?= esc_url(get_thumb_url_medhia_id('full', 5994)); ?>"></div>
</footer>

<footer class="g-footer">
  <div class="container py-0 p-lg-4 d-lg-none">
    <ul class="row gx-4 gx-lg-5">
      <?php get_template_part('include/nav', null, 'footer'); ?>
      <?php get_template_part('include/snav', null, 'footer'); ?>
    </ul>
  </div>
</footer>
