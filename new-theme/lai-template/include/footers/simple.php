<div class="g-pagetop">
  <a href="#">
    <i class="fas fa-angle-up"></i>
  </a>
</div>

<footer class="g-footer">
  <div class="container py-5">
    <div class="row justify-content-between align-items-center g-4">
      <div class="col-12 col-lg-5 text-center text-lg-start">
        <a href="<?= esc_url(home_url('/')); ?>" class="d-inline-block">
          <img src="<?= esc_url(get_field('logo_2', 'option')); ?>" alt="<?= esc_attr(get_field('company', 'option')); ?>" class="c-image" width="240" height="47">
        </a>
        <p class="u-mt-pc-16 u-mt-sp-12 u-mb-pc-0 u-mb-sp-0">&copy; <?= esc_html(date('Y')); ?> <?= esc_html(get_field('company', 'option')); ?></p>
      </div>
      <div class="col-12 col-lg-7">
        <ul class="row gx-4 gx-lg-5 justify-content-center justify-content-lg-end">
          <?php get_template_part('include/nav', null, 'footer'); ?>
          <?php get_template_part('include/snav', null, 'footer'); ?>
        </ul>
      </div>
    </div>
  </div>
</footer>
