<div id="visual" class="c-visual" style="--background-color: #fff">
  <div id="visual-slick" class="c-visual__slick">
    <?php
    $args = [
      'post_type' => 'kv',
      'posts_per_page' => 1,
    ];
    $the_query = new WP_Query($args);
    $cnt = 1;
    if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();
        $kvset = get_field('kvset', $post->ID);
        foreach ($kvset as $kv) :
          $type = $kv['type'];
          $youtube = $kv['youtube'];
          if ($type == '画像') :
    ?>
            <figure class="c-image">
              <div class="c-visual__catchcopy">
                <h2 class="c-visual__ttl">
                  <?= $kv['title']; ?>
                </h2>
                <h3 class="c-visual__sttl">
                  <?= $kv['body']; ?>
                </h3>
              </div>
              <div class="c-image__src --ratio js-parallax" data-y="50" style="--ratio: 500px ; --ratio-lg: 700px;" data-lazy-background="<?= $kv['photo']; ?>"></div>
            </figure>
          <?php
          elseif ($type == '動画') :
          ?>
            <div class="c-visual__catchcopy">
              <h2 class="c-visual__ttl">
                <?= $kv['title']; ?>
              </h2>
              <h3 class="c-visual__sttl">
                <?= $kv['body']; ?>
              </h3>
            </div>
            <div id="youtube<?= $cnt; ?>" class="iframe"></div>
          <?php
            $cnt++;
          endif;
          ?>
    <?php
        endforeach;
      endwhile;
      wp_reset_query();
    endif;
    ?>
  </div>
  <div class="c-visual__copyright">
    © 2023 <?= get_field('company', 'option'); ?>.
  </div>

  <div class="c-visual__message">
    <p class="c-visual__message-ttl">
      <span class="main">定</span><span class="main">額</span><span class="main">制</span>
    </p>
    <p class="c-visual__message-sttl">
      <span class="read">月額9,800円～<br>サブスクリプション型ホームページ</span>
    </p>
    <p class="c-visual__message-read text-center">
      <span class="">
        ハイクオリティなホームページを低コストで実現<br>
        ホームページの面倒な更新もまるっとお任せ<br>
        <span class="c-em c-marker js-animate u-font-pc-32 u-font-sp-16">ホームページ制作</span>＆<span class="c-em c-marker js-animate u-font-pc-32 u-font-sp-16">運用代行</span>        
      </span>
    </p>

<!-- ボタンを追加 -->
<div class="row justify-content-center mt-4">
  <div class="col-12 col-md-6 col-lg-3 mb-2 mb-lg-0 text-center">
    <a href="<?= wmp_get_link('contact', ''); ?>" target="" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16 text-center w-100" style="--color: #fff; --bc: var(--line); --border: transparent; --border2: transparent; --radius: 5px; padding: 15px;">
      <span class="c-btn-solid-border__txt">
        <span class="c-btn-solid-border__txt-in">
          <i class="fas fa-envelope"></i> 無料相談する
        </span>
      </span>
      <span class="c-btn-solid-border__l"></span>
      <span class="c-btn-solid-border__t"></span>
      <span class="c-btn-solid-border__r"></span>
      <span class="c-btn-solid-border__b"></span>
      <span class="c-btn-solid-border__icon">
        
      </span>
    </a>
  </div>
  <div class="col-12 col-md-6 col-lg-3 text-center">
    <a href="tel:<?= get_field('tel_contact', 'option'); ?>" target="" class="c-btn-solid-border --white --small c-border u-font-pc-16 u-font-sp-16 text-center w-100" style="--color: #fff; --bc: #ff7e00; --border: transparent; --border2: transparent; --radius: 5px; padding: 15px;">
      <span class="c-btn-solid-border__txt">
        <span class="c-btn-solid-border__txt-in">
          <i class="fa-solid fa-phone-volume"></i> <?= get_field('tel_contact', 'option'); ?>
        </span>
      </span>
      <span class="c-btn-solid-border__l"></span>
      <span class="c-btn-solid-border__t"></span>
      <span class="c-btn-solid-border__r"></span>
      <span class="c-btn-solid-border__b"></span>
      <span class="c-btn-solid-border__icon">
        
      </span>
    </a>
  </div>
</div>


  </div>

  <div class="c-visual__bullet">
    <div class="row gx-0 gx-lg-4">
      <div class="col-4">
        <div class="c-visual__bullet-body" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6139); ?>">
          <div class="c-visual__bullet-body-item">
            <span class="ttl">初期費用0円</span>
            <span class="sttl">制作費<span class="wf-rubik">0</span>円</span>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="c-visual__bullet-body" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6139); ?>">
          <div class="c-visual__bullet-body-item">
            <span class="ttl">お客様満足度</span>
            <span class="sttl"><span class="wf-rubik">98.7</span><small>%</small></span>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="c-visual__bullet-body" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6139); ?>">
          <div class="c-visual__bullet-body-item">
            <span class="ttl">制作実績</span>
            <span class="sttl"><span class="wf-rubik">500</span>件<small>以上</small></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="c-visual__svg">
    <?= get_thumb_url_medhia_id_svg('full', 241); ?>
  </div>

  <figure class="c-visual__image c-image d-none d-md-block">
    <img class="" data-lazy-img="<?= get_thumb_url_medhia_id('full', 6251); ?>">
  </figure>
</div>
