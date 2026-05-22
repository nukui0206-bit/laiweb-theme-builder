<div class="g-pagetop">
  <a href="#">
    <i class="fas fa-angle-up"></i>
  </a>
</div>

<footer class="g-footer">
  <div class="g-footer__inner">
    <div class="container-fluid">
      <div class="row align-items-start">
        <div class="col-12 col-md">
          <div class="g-footer__about">
            <div class="g-footer__logo">
              <a href="<?= home_url(); ?>/">
                <img src="<?= get_field('logo_2', 'option'); ?>" alt="<?= get_field('company', 'option'); ?>">
              </a>
            </div>
            <div class="u-mb-pc-12 u-mb-sp-12">
              <a href="<?= wmp_get_link('recruits', ''); ?>" class="c-btn-solid-border u-font-pc-16 u-font-sp-16">
                <span class="c-btn-solid-border__txt">
                  <span class="c-btn-solid-border__txt-in text-white">RECRUIT</span>
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
            <p class="g-footer__copyright is-pc">&copy; <?= date('Y') ?> <?= get_field('company', 'option'); ?></p>
          </div>
        </div>
        <div class="col-12 col-md-8 position-static">
        </div>
      </div>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>