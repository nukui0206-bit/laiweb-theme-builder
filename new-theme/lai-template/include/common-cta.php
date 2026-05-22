<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<section class="c-section c-section--wide c-section--non c-section--image c-section--trans d-flex justify-content-center align-items-center p-common-cta">
  <div class="container">
    <div class="row justify-content-center u-mb-pc-40 u-mb-sp-40 align-items-center js-animate fly-in">
      <div class="col-12 col-lg-6">
        <?php if(is_page($gPages['slug']) && $gPages['parent-slug'] == 'lp'): ?>
          <p class="p-common-cta__pref"><?= wmp_get_lp_pref($gPages['slug']); ?>版</p>
        <?php endif; ?>
        <h2 class="u-mb-pc-12 u-mb-sp-12 u-lh-pc-2 u-lh-sp-2"><span class="u-font-pc-48 u-font-sp-32">CONTACT</span></h2>
        <p class="u-font-pc-40 u-font-sp-24 fw-bold">まずはご相談ください。</p>
        <p class="u-font-pc-24 u-font-sp-18 fw-bold">お急ぎの方は電話で相談<small class="fw-normal u-font-pc-12"> (24時間受付中)</small></p>
      </div>
    </div>
    <div class="row justify-content-center align-items-center js-animate fly-in">
      <div class="col-10 col-lg-4">
        <span class="number fw-bold u-font-pc-24 u-font-sp-24 u-font-ac" data-action="call" data-tel="<?= get_field('tel_contact', 'option'); ?>">
          <i class="fa-solid fa-square-phone"></i>
          <span class=""><?= get_field('tel_contact', 'option'); ?></span><br>
        </span>
      </div>
      <div class="col-10 col-lg-4">
        <a href="" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--bc: var(--line); --color: #fff; --border: var(--line)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">LINEで無料相談をする</span>
          </span>
          <span class="c-btn-solid-border__l"></span>
          <span class="c-btn-solid-border__t"></span>
          <span class="c-btn-solid-border__r"></span>
          <span class="c-btn-solid-border__b"></span>
          <span class="c-btn-solid-border__icon">
            <i class="fas fa-angle-double-right"></i>
          </span>
        </a>
      </div>
      <div class="col-10 col-lg-4">
        <a href="<?= wmp_get_link('contact', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--bc: var(--ac); --color: #fff; --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">メールで無料相談をする</span>
          </span>
          <span class="c-btn-solid-border__l"></span>
          <span class="c-btn-solid-border__t"></span>
          <span class="c-btn-solid-border__r"></span>
          <span class="c-btn-solid-border__b"></span>
          <span class="c-btn-solid-border__icon">
            <i class="fas fa-angle-double-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
  <div class="c-after c-after__white --5"></div>
  <div class="c-after c-after__image" data-lazy-background="<?= get_thumb_url_medhia_id('full', 5992); ?>"></div>
</section>