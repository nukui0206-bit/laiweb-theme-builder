<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="600" data-repeat="true">

    <section class="c-section c-section--wide">
      <div class="container js-animate fly-in">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 text-white">
            <h1 class="text-center u-font-pc-32 u-font-sp-24 fw-bold u-lh-sp-2 u-mb-sp-12">株式会社タウン水道センター</h1>
            <h2 class="text-center u-font-pc-24 u-font-sp-14 fw-bold u-mb-pc-12 u-mb-sp-12">ホームページをご覧頂きありがとうございます</h2>
            <p class="text-start text-lg-center u-mb-pc-20 u-mb-sp-20">
              弊社、タウン水道センターは、茨城県全域で水廻りのトラブルに迅速に対応しています。水道工事に限らず、水廻り機器の販売から取り付け・設置まで幅広くサポートしています。当社では蛇口、トイレ、給湯器、ポンプなど、さまざまな商品を取り扱っております。<br>
              <br>
              また、茨城県だけでなく、東京、栃木、群馬、福島、長野の各営業所や横浜トイレ問屋、各サービスセンターでも地域に合わせた対応を行っております。<br>
              <br>
              サイト内に掲載されていない商品もございますので、お気軽にお問い合わせください。
            </p>
          </div>
        </div>
      </div>
      <div class="c-after c-after__black --5"></div>
      <div class="c-after c-after__image --center" data-lazy-background="<?= get_thumb_url_medhia_id('full', 5992); ?>"></div>
    </section>

    <?php get_template_part('include/common-center'); ?>

    <section class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center align-items-center js-animate fly-in u-mb-pc-64 u-mb-sp-32">
          <div class="col-12 col-lg-6 order-2 order-lg-1">
            <div class="c-headline-leftbig">
              <p class="c-headline-leftbig__sttl">COMPANY</p>
              <h1 class="c-headline-leftbig__ttl u-font-pc-32 u-mb-pc-32">
                会社概要
              </h1>
              <table class="c-table">
                <tbody>
                  <tr>
                    <th>会社名</th>
                    <td><?= get_field('company', 'option'); ?></td>
                  </tr>
                  <?php if(get_field('name', 'option')): ?>
                  <tr>
                    <th>代表取締役</th>
                    <td><?= get_field('name', 'option'); ?></td>
                  </tr>
                  <?php endif; ?>
                  <tr>
                    <th>所在地</th>
                    <td>
                      <ul class="c-list--inline row">
                        <?php
                        $branchs = current(get_field('branch', 'option'));
                        foreach ($branchs as $key => $branch) :
                        ?>
                          <li class="c-list__item col-auto">
                            <?php
                            /*
                            ＜<?= $branch['branch_name']; ?>＞<br>
                            */ ?>
                            〒<?= $branch['zip']; ?><br>
                            <?= $branch['addresss']; ?>
                          </li>
                        <?php
                        endforeach;
                        ?>
                        <?php /* <li class="c-list__item col-auto"><a class="c-btn" href="#gmap">地図を見る</a></li> */ ?>
                      </ul>
                    </td>
                  </tr>
                  <?php
                  /*
                  <tr>
                    <th>フリーダイヤル</th>
                    <td>
                      <ul class="c-list--inline row">
                        <li class="c-list__item col-auto">
                          <div class="p-index-about__number">
                            <span class="number" data-action="call" data-tel="<?= get_field('tel_contact', 'option'); ?>">
                              <i class="fas fa-phone-square-alt"></i>
                              <span class=""><?= get_field('tel_contact', 'option'); ?></span>
                            </span>
                          </div>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <th>FAX</th>
                    <td>
                      <ul class="c-list--inline row">
                        <li class="c-list__item col-auto">
                          <div class="p-index-about__number">
                            <span class=""><?= get_field('fax_contact', 'option'); ?></span>
                          </div>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <th>メール</th>
                    <td>
                      <ul class="c-list--inline row">
                        <li class="c-list__item col-auto">
                          <div class="p-index-about__number">
                            <span class="">contact@se-share.com</span>
                          </div>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  */ ?>
                  <tr>
                    <th>URL</th>
                    <td>
                      <ul class="c-list--inline row">
                        <li class="c-list__item col-auto">
                          <div class="p-index-about__number">
                            <a href="<?= home_url(); ?>"><?= home_url(); ?></a>
                          </div>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  <?php
                  $etcs = get_field('etc', 'option');
                  foreach ($etcs as $key => $etc) :
                  ?>
                    <tr>
                      <th><?= $etc['etc_title']; ?></th>
                      <td>
                        <?= $etc['etc_body']; ?><br>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-12 col-lg-6 order-1 order-lg-2">
            <figure class="c-image">
              <div class="c-image__src">
                <img alt="<?= get_field('company', 'option'); ?>" data-lazy-img="<?= get_thumb_url_medhia_id('full', 5986); ?>">
              </div>
            </figure>
          </div>
        </div>
      </div>
      <div class="c-after c-after__bc c-after__bc--8" style="--background-color-rgb: 234 247 255; clip-path: polygon(0 0, 0 100%, 100% 100%);"></div>
    </section>


    <?php //get_template_part('include/common-center'); 
    ?>

  </main>

  <?php //get_template_part('include/gmap'); 
  ?>
  <?php get_template_part('include/cta'); ?>
  <?php get_template_part('include/bn'); ?>

</div>
<!-- ▲contents -->

<?php get_template_part('include/footer'); ?>
<?php get_template_part('include/content_append'); ?>
<?php get_template_part('include/fixarea'); ?>
<?php get_template_part('include/script'); ?>

</body>

</html>