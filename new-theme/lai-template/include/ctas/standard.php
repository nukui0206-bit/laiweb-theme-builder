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
          <span class="number" data-action="call" data-tel="<?= esc_attr(get_field('tel_contact', 'option')); ?>">
            <i class="fas fa-phone-alt text-white"></i>
            <span class="text-white"><?= esc_html(get_field('tel_contact', 'option')); ?></span>
          </span>
          <span class="small text-white">お気軽にお問い合わせください</span>
        </div>
      </div>
      <div class="col-10 col-lg-4">
        <div class="p-common-cta__contact">
          <a href="<?= esc_url(wmp_get_link('contact', '')); ?>" class="btn"><i class="fas fa-envelope"></i>メールでお問い合わせ</a>
        </div>
      </div>
    </div>
  </div>
  <div class="c-after c-after__wire" style="--z-index: 3"></div>
  <div class="c-after c-after__grad-kc"></div>
</section>
