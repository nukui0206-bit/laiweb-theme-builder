<header id="g-header" class="g-header-recruit">
  <div class="container-fluid p-0">
    <div class="row justify-content-between align-items-center">
      <div class="col">
        <div class="g-header-recruit__inner">
          <div class="row align-items-center">
            <div class="col-auto">
              <h1 class="g-header-recruit__logo">
                <a href="<?= home_url(); ?>" class="g-header-recruit__logo-link">
                  <?= get_thumb_url_medhia_id_svg('full', get_field('logo', 'option'), true); ?>
                </a>
              </h1>
            </div>
            <div class="col-auto">
              <span class="c-label --white">リクルート</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-auto">
        <div class="g-header-recruit__nav">
          <div class="row align-items-center">
            <div class="col-auto">
              <a href="<?= wmp_get_link('/', ''); ?>" class="c-label --white">応募する</a>
            </div>
            <div class="col-auto">
              <button class="navbar-toggler g-header-recruit__nav-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#g-nav-panel" aria-controls="g-nav-panel" aria-label="menu">
                <div></div>
                <div></div>
                <div></div>
                <span>menu</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>