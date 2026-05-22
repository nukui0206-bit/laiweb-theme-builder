<?php
/*
<section class="c-section c-section--trans p-common-cta">
  <div class="container">
    <div class="row justify-content-center align-items-center js-animate fly-in">
      <div class="col-12 col-lg-4">
        <div class="p-common-cta__headline">
          <h1 class="ttl text-white">CONTACT</h1>
          <h2 class="sttl text-white">お問い合わせ</h2>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="p-common-cta__tel">
          <span class="number" data-action="call" data-tel="03-xxxx-xxxx">
            <i class="fas fa-phone-alt text-white"></i>
            <span class="text-white">03-xxxx-xxxx</span>
          </span>
          <span class="small text-white">月-金 9:00-18:00(祝祭日・夏季・冬季休暇除く)</span>
        </div>
      </div>
      <div class="col-10 col-lg-4">
        <div class="p-common-cta__contact">
          <a href="<?= wmp_get_link('contact', ''); ?>" class="btn"><i class="fas fa-envelope"></i>メールでお問い合わせ</a>
        </div>
      </div>
    </div>
  </div>
  <div class="c-after c-after__wire" style="--z-index: 3"></div>
  <div class="c-after c-after__grad-kc"></div>
</section>

<section class="c-section c-section--wide c-section--trans p-common-company p-common-youtube c-hover">
  <div class="container">
    <div class="row justify-content-center js-animate fly-in">
      <div class="col-12 col-lg-7 u-mb-sp-24">
        <h4 class="logo">
          <img src="<?= get_field('logo_2', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>">
          <?= get_thumb_url_medhia_id_svg('full', get_field('logo', 'option'), true); ?>
        </h4>
        <span class="company"><?= get_field('company', 'option'); ?></span>
        <p class="detail">
          <?php
          $branchs = current(get_field('branch', 'option'));
          foreach ($branchs as $key => $branch) :
          ?>
            〒<?= $branch['zip']; ?><br>
            <?= $branch['addresss']; ?><br>
            <?= $branch['tel_company']; ?><br>
            </li>
          <?php
          endforeach;
          ?>
        </p>
      </div>
      <div class="col-12 col-lg-5">
        <a class="js-nomove c-hover__link" data-bs-toggle="modal" href="#js-modal" role="button">
          <figure class="c-image p-common-youtube__image">
            <div class="p-common-youtube__ttl">
              <i class="fas fa-play-circle"></i>
              <h2>youtube VIDEO</h2>
            </div>
            <div class="c-image__src --ratio --ratiosp c-hover__target" style="--ratio: 200px; --ratiosp: 30%" data-lazy-background="<?= get_thumb_url_medhia_id('full', 60); ?>"></div>
          </figure>
        </a>
      </div>
    </div>
  </div>
  <div class="c-after c-after__black c-after__black--9"></div>
</section>
*/
?>

<?php
/*
<section class="g-cta text-white">
  <div class="g-cta__inner">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="g-cta__sttl u-lh-pc-3 u-lh-sp-3 u-mb-pc-32 u-mb-sp-32">カンボジアの投資物件情報<br>あなたに合った物件を探します</div>
          <div class="g-cta__mail">
            <div class="row justify-content-center align-items-center flex-column u-mb-pc-32 u-mb-sp-32">
              <div class="col-6 col-md-2 c-hover--zoom">
                <figure class="c-image w-100 u-mb-pc-12 u-mb-sp-12 js-animate fade-in">
                  <div class="c-image__src --100 --ci c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('medium', 346); ?>"></div>
                </figure>
              </div>
              <div class="col-12 col-md-6 u-font-pc-18 u-font-sp-14">
                <?php
                $branchs = current(get_field('branch', 'option'));
                foreach ($branchs as $key => $branch) :
                ?>
                  〒<?= $branch['zip']; ?> <?= $branch['addresss']; ?><br>
                <?php
                endforeach;
                ?>
                <span class="number" data-action="call" data-tel="<?= get_field('tel_contact', 'option'); ?>">
                  <i class="fas fa-phone-alt text-white"></i>
                  <span class="u-font-pc-24 u-font-sp-18 text-white"><?= get_field('tel_contact', 'option'); ?></span><br>
                </span>
              </div>
            </div>
            <div class="g-cta__mail-ttl">
              まずはお気軽にお問い合わせください。
            </div>
            <div class="g-cta__mail-contact row justify-content-center u-mb-pc-20 u-mb-sp-20">
              <div class="col-12 col-md-4">
                <a href="<?= wmp_get_link('contact', ''); ?>" class="g-cta__mail-contact-btn" target="">お問合せはこちら</a>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-6 col-lg-2">
                <a href="<?= wmp_get_link('partner', ''); ?>" target="" class="u-font-pc-14 u-font-sp-12 text-white"><i class="fa-solid fa-caret-right"></i> 代理店募集</a>
              </div>
              <div class="col-6 col-lg-2">
                <a href="<?= wmp_get_link('outsourcing', ''); ?>" target="" class="u-font-pc-14 u-font-sp-12 text-white"><i class="fa-solid fa-caret-right"></i> 業務委託</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="c-after c-after__black c-after__black--9"></div>
  <div class="c-after c-after__image c-after__fixed" style="" data-lazy-background="<?= get_thumb_url_medhia_id('full', 346); ?>"></div>
</section>
*/