<li class="nav-item col-12 col-md-auto is-nonav">
  <a href="<?= wmp_get_link('/', ''); ?>" class="nav-link is-active" data-title="TOP">トップ</a>
</li>
<li class="nav-item col-12 col-md-auto">
  <a href="<?= wmp_get_link('web', ''); ?>" class="nav-link" data-title="WEB">ホームページ制作</a>
</li>
<?php if ($args == 'footer' || $args == 'hamburger') : ?>
  <li class="nav-item col-12 col-md-auto">
    <a href="<?= wmp_get_link('web', ''); ?>" class="nav-link" data-title="PRICE">料金プラン</a>
  </li>
<?php else : ?>
  <li class="nav-item col-12 col-md-auto">
    <a href="#web<?= $args; ?>" class="nav-link js-nomove is-none--footer" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="web" data-title="PRICE">料金プラン <i class="fas fa-angle-down"></i></a>
    <div class="collapse lower js-close" id="web<?= $args; ?>">
      <button class="js-close__btn js-nomove"><i class="fas fa-times"></i></button>
      <div class="container">
        <ul class="row row-cols-5">
          <li class="nav-item col-12 col-lg">
            <a href="<?= wmp_get_link('web/basic', ''); ?>" class="nav-link">
              <figure class="c-image u-mb-pc-12">
                <div class="c-image__src --16" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6501); ?>"></div>
              </figure>
              <div class="item">
                <div class="sttl">BASIC</div>
                <h3 class="ttl">ベーシックプラン</h3>
                <p class="read">月額9,800のリーズナブルなホームページ</p>
              </div>
            </a>
          </li>
          <li class="nav-item col-12 col-lg">
            <a href="<?= wmp_get_link('web/standard', ''); ?>" class="nav-link">
              <figure class="c-image u-mb-pc-12">
                <div class="c-image__src --16" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6302); ?>"></div>
              </figure>
              <div class="item">
                <div class="sttl">STANDARD</div>
                <h3 class="ttl">スタンダードプラン</h3>
                <p class="read">月額14,800円の標準的なホームページ</p>
              </div>
            </a>
          </li>
          <li class="nav-item col-12 col-lg">
            <a href="<?= wmp_get_link('web/premium', ''); ?>" class="nav-link">
              <figure class="c-image u-mb-pc-12">
                <div class="c-image__src --16" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6304); ?>"></div>
              </figure>
              <div class="item">
                <div class="sttl">PREMIUM</div>
                <h3 class="ttl">プレミアムプラン</h3>
                <p class="read">月額19,800円の本格的なホームページ</p>
              </div>
            </a>
          </li>          
        </ul>
      </div>
    </div>
  </li>
<?php endif; ?>
<li class="nav-item col-12 col-md-auto">
  <a href="<?= wmp_get_link('meomap', ''); ?>" class="nav-link" data-title="MEO">MEO対策</a>
</li>
<li class="nav-item col-12 col-md-auto">
  <a href="<?= wmp_get_link('flow', ''); ?>" class="nav-link" data-title="FLOW">ご利用の流れ</a>
</li>
<li class="nav-item col-12 col-md-auto">
  <a href="<?= wmp_get_link('case', ''); ?>" class="nav-link" data-title="CASE">制作実績</a>
</li>
<li class="nav-item col-12 col-md-auto">
  <a href="<?= wmp_get_link('faq', ''); ?>" class="nav-link" data-title="FAQ">よくある質問</a>
</li>
<li class="nav-item col-12 col-md-auto">
  <a href="<?= wmp_get_link('column', ''); ?>" class="nav-link" data-title="COLUMN">お役立ちコラム</a>
</li>
<li class="nav-item col-12 col-md-auto is-nonav">
  <a href="<?= wmp_get_link('download', ''); ?>" class="nav-link" data-title="DOWNLOAD">資料ダウンロード</a>
</li>
<li class="nav-item col-12 col-md-auto is-nonav">
  <a href="<?= wmp_get_link('contact', ''); ?>" class="nav-link" data-title="CONTACT">お問合せ</a>
</li>
    <?php
    /*

<?php if ($args == 'footer' || $args == 'hamburger') : ?>
  <li class="nav-item col-12 col-md-auto">
    <a href="<?= wmp_get_link('web', ''); ?>" class="nav-link" data-title="web">ホームページ制作</a>
  </li>
<?php else : ?>
  <li class="nav-item col-12 col-md-auto">
    <a href="#web<?= $args; ?>" class="nav-link js-nomove is-none--footer" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="web" data-title="SERVICE">ホームページ制作 <i class="fas fa-angle-down"></i></a>
    <div class="collapse lower js-close" id="web<?= $args; ?>">
      <button class="js-close__btn js-nomove"><i class="fas fa-times"></i></button>
      <div class="container">
        <ul class="row row-cols-5">
          <li class="nav-item col-12 col-lg">
            <a href="<?= wmp_get_link('web/memento', ''); ?>" class="nav-link">
              <figure class="c-image u-mb-pc-12">
                <div class="c-image__src --16" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6352); ?>"></div>
              </figure>
              <div class="item">
                <div class="sttl">web</div>
                <h3 class="ttl">料金プラン</h3>
                <p class="read">月額9,800円のテキストテキストテキストテキストテキストテキスト</p>
              </div>
            </a>
          </li>
          <li class="nav-item col-12 col-lg">
            <a href="<?= wmp_get_link('web/special', ''); ?>" class="nav-link">
              <figure class="c-image u-mb-pc-12">
                <div class="c-image__src --16" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6354); ?>"></div>
              </figure>
              <div class="item">
                <div class="sttl">CASE</div>
                <h3 class="ttl">制作実績</h3>
                <p class="read">月額14,800円のテキストテキストテキストテキストテキストテキスト</p>
              </div>
            </a>
          </li>
          <li class="nav-item col-12 col-lg">
            <a href="<?= wmp_get_link('web/reform', ''); ?>" class="nav-link">
              <figure class="c-image u-mb-pc-12">
                <div class="c-image__src --16" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6353); ?>"></div>
              </figure>
              <div class="item">
                <div class="sttl">FLOW</div>
                <h3 class="ttl">ご利用の流れ</h3>
                <p class="read">月額19,800円のテキストテキストテキストテキストテキストテキストテキスト </p>
              </div>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </li>
<?php endif; ?>
    */
    ?>    