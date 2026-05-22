<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <div class="container js-animate" data-target="g-fixarea" data-offset="200" data-repeat="true">

    <div class="row justify-content-center align-items-start gx-3 gx-lg-5">
      <main class="col-12 col-lg-9">

        <section class="c-section c-section--trans">
          <div class="post-content">

            <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
            ?>

                <?php if (has_post_thumbnail()) : ?>
                  <div class="u-mb-pc-20 u-mb-sp-20">
                    <figure class="rounded-5 overflow-hidden" style="line-height:0">
                      <?php the_post_thumbnail('full'); ?>
                    </figure>
                  </div>
                <?php endif; ?>

                <table class="c-table u-mb-pc-64 u-mb-sp-32">
                  <tr>
                    <th>単価</th>
                    <td><span class="u-font-pc-20 u-font-sp-20 fw-bold u-font-kc"><?= the_field('単価'); ?></span></td>
                  </tr>
                  <tr>
                    <th>契約形態</th>
                    <td><?= the_field('契約形態'); ?></td>
                  </tr>
                  <tr>
                    <th>職種</th>
                    <td><?= the_field('職種'); ?></td>
                  </tr>
                  <tr>
                    <th>勤務地</th>
                    <td><?= the_field('勤務地'); ?></td>
                  </tr>
                  <tr>
                    <th>最寄り駅</th>
                    <td><?= the_field('最寄り駅'); ?></td>
                  </tr>
                  <tr>
                    <th>休暇・休日</th>
                    <td><?= the_field('休暇・休日'); ?></td>
                  </tr>
                </table>
                <dl class="c-dl text-left">
                  <dt>
                    <h2>仕事内容</h2>
                  </dt>
                  <dd class="u-mb-pc-64 u-mb-sp-32">
                    <?= the_field('仕事内容'); ?>
                  </dd>
                  <dt class="">
                    <h2>求めるスキル</h2>
                  </dt>
                  <dd class="u-mb-pc-64 u-mb-sp-32">
                    <?= the_field('求めるスキル'); ?>
                  </dd>
                  <dt>
                    <h2>待遇・福利厚生</h2>
                  </dt>
                  <dd class="u-mb-pc-64 u-mb-sp-32">
                    <?= the_field('待遇・福利厚生'); ?>
                  </dd>
                  <dt>
                    <h2>アピールポイント</h2>
                  </dt>
                  <dd class="u-mb-pc-64 u-mb-sp-32">
                    <?= the_field('アピールポイント'); ?>
                  </dd>
                </dl>
                <a href="<?= wmp_get_link('recruit-contact', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto u-mb-pc-64 u-mb-sp-32" style="--color: var(--ac); --border: var(--ac)">
                  <span class="c-btn-solid-border__txt">
                    <span class="c-btn-solid-border__txt-in">今すぐエントリー</span>
                  </span>
                  <span class="c-btn-solid-border__l"></span>
                  <span class="c-btn-solid-border__t"></span>
                  <span class="c-btn-solid-border__r"></span>
                  <span class="c-btn-solid-border__b"></span>
                  <span class="c-btn-solid-border__icon">
                    <i class="fas fa-angle-double-right"></i>
                  </span>
                </a>
                <div class="bg-light text-left p-5">
                  <?= get_field('company', 'option'); ?><br>
                  <?php
                  $branchs = current(get_field('branch', 'option'));
                  $zip = '';
                  $address = '';
                  foreach ($branchs as $key => $branch) :
                    $zip = $branch['zip'];
                    $address = $branch['addresss'];
                  ?>
                    〒<?= $zip; ?><br>
                    <?= $address; ?>
                  <?php
                    break;
                  endforeach;
                  ?>
                </div>

              <?php
              endwhile;
            else :
              ?>

              <p>投稿が見つかりません。</p>

            <?php
            endif;
            ?>

          </div>
        </section>

        <section class="c-section c-section--white c-section--wide">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-8">
                <div class="c-headline__type js-animate fly-in">
                  <h2 class="c-headline__type-sttl"><span class="u-font-kc">その他の求人募集</span></h2>
                </div>
              </div>
            </div>
            <div class="c-card-recruit c-hover--zoom">
              <div class="row u-mb-pc-32 u-mb-sp-32">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = [
                  'post_type'      => 'recruits',
                  'post_status'    => 'publish',
                  'posts_per_page' => 9,
                  'paged' => $paged,
                ];
                $the_query = new WP_Query($args);
                $pages = $the_query->max_num_pages;
                $wp_query->max_num_pages = $pages;

                if ($the_query->have_posts()) :
                  while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <div class="col-12 col-md-4 align-self-stretch u-mb-sp-32">
                    <a href="<?= get_permalink(); ?>" class="d-flex c-hover__link c-link js-animate fly-in<?= ($cnt > 1) ? $cnt : ''; ?>">
                      <div class="d-block w-100 text-left">
                        <figure class="c-image u-mb-sp-8">
                          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                        </figure>
                        <div class="py-md-4">
                          <h2 class="fw-bold u-lh-pc-2 u-lh-sp-2 u-mb-pc-12 u-mb-sp-12 text-start">
                            <?= the_title(); ?>
                          </h2>
                          <div class="lead text-start">
                            <ul>
                              <li>
                                <i class="fas fa-yen-sign"></i> <span class="price"><?= the_field('単価'); ?></span>
                              </li>
                              <li>
                                <i class="fas fa-user"></i> <?= the_field('契約形態'); ?>
                              </li>
                              <li>
                                <i i class="fa-solid fa-building"></i> <?= the_field('職種'); ?>
                              </li>
                              <li>
                                <i class="fas fa-map-marker-alt"></i> 勤務地：<?= the_field('勤務地'); ?>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>
                <?php
                  endwhile;
                endif;
                wp_reset_postdata();
                ?>
              </div>
            </div>

            <?php
            if (function_exists("pagination")) {
              pagination($max_num_page);
            }
            ?>

          </div>
        </section>

      </main>
    </div>

  </div>

  <?php get_template_part('include/common-news'); ?>

  <?php get_template_part('include/gmap'); ?>
  <?php get_template_part('include/cta'); ?>
  <?php get_template_part('include/bn'); ?>

</div>
<!-- ▲contents -->

<?php get_template_part('include/footer'); ?>
<?php get_template_part('include/content_append'); ?>
<?php get_template_part('include/fixarea'); ?>
<?php get_template_part('include/script'); ?>

</body>

<script>
  $(function() {
    $('#js-aside').height(function(index, h) {
      $(this).css('--height', h);
    })

  });
</script>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "JobPosting",
    "datePosted": "2022-01-01",
    "validThrough": "<?= date('Y-m-d', strtotime('+1 year')); ?>",
    "employmentType": "FULL_TIME",
    "title": "<?= the_title(); ?>",
    "description": "<?= the_field('仕事内容'); ?>",
    "baseSalary": {
      "@type": "MonetaryAmount",
      "currency": "JPY",
      "value": {
        "@type": "QuantitativeValue",
        "maxValue": <?= the_field('単価'); ?>,
        "unitText": "MONTH"
      }
    },
    "hiringOrganization": {
      "@type": "Organization",
      "name": "<?= get_field('company', 'option'); ?>",
      "logo": "<?= get_field('logo', 'option'); ?>"
    },
    "jobLocation": {
      "@type": "Place",
      "address": {
        "@type": "PostalAddress",
        "postalCode": "<?= $zip; ?>",
        "streetAddress": "<?= $address; ?>",
        <?php
        /*
        "addressLocality": "渋谷区",
        "addressRegion": "東京都",
        */
        ?>
        "addressCountry": "JP"
      }
    }
  }
</script>

</html>