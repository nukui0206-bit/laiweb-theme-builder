<?php
// グローバル変数
require(SLIB_DIR . '/lib/wmp-global.php');
?>
<section class="c-section c-section--wide c-section--white u-pt-pc-120 u-pb-pc-120 u-pt-sp-200">
  <div class="container">
    <div class="row justify-content-center align-items-center js-animate fly-in u-mb-pc-64 u-mb-sp-32">
      <div class="col-12 col-lg-6">
        <div class="c-headline-leftbig">
          <p class="c-headline-leftbig__sttl">WHTAT'S TOWN SUIDO</p>
          <h1 class="c-headline-leftbig__ttl u-font-pc-32 u-mb-pc-32">
            トイレ・給湯器・<br>
            お風呂・蛇口の「<span class="u-font-grad" style="--start: var(--kc); --end: var(--kcd);">交換</span>」を<br>
            <span class="u-font-grad" style="--start: var(--kc); --end: var(--kcd);">安心価格</span>で<span class="u-font-grad" style="--start: var(--kc); --end: var(--kcd);">解決!!</span><br>
            <span class="u-font-pc-28 u-font-sp-18"><?php if(is_page($gPages['slug'])): ?><?= wmp_get_lp_pref($gPages['slug']); ?>の<?php endif; ?>タウン水道センターにお任せ。</span>
          </h1>
          <p class="text-start u-font-fc u-mb-pc-20 u-mb-sp-20">
            <span class="u-font-pc-20 u-font-sp-12 fw-bold">－ 水廻りの交換・リフォームのプロ －</span><br>
            <br>
            日々の暮らしに欠かせない、トイレや浴室、キッチンなどの水廻り。<br>
            <br>
            タウン水道センターは、その<span class="c-em">「水廻り」のあらゆるトラブルに対応</span>し、<span class="c-em">お客様の快適な毎日を支えるプロ</span>として各種水道工事を行っています。<br>
          </p>
        </div>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1">
        <figure class="c-image js-parallax" data-y="30">
          <div class="c-image__src c-image__src --100 --cc">
            <img alt="トイレ・給湯器・お風呂・蛇口の「交換」を安心価格で解決!!" class="js-parallax" data-y="50" data-lazy-img="<?= get_thumb_url_medhia_id('full', 5993); ?>">
          </div>
        </figure>
      </div>
    </div>
    <div class="row justify-content-center gx-4 gx-lg-5">
      <div class="col-12 col-lg-12 u-mb-pc-32 u-mb-sp-32 js-animate fly-in">
        <h2 class="u-font-pc-34 u-font-pc-20 u-mb-pc-32 fw-bold">水廻りのリフォームで、<br class="is-sp">
          こんな<span class="u-font-pc-40 u-font-sp-24 c-marker js-animate">お困りごと</span>ありませんか？
        </h2>
      </div>
    </div>
    <div class="row justify-content-center gx-4 gx-lg-5">
      <div class="col-12 col-lg-4 u-mb-pc-32 u-mb-sp-32 d-flex flex-column js-animate fly-in">
        <div class="c-headline-grad u-mb-pc-20 u-mb-sp-20" style="--bg: #023389; --bg-dark: #021d4c;">
          <h2 class="c-headline-grad__ttl u-lh-pc-2 u-lh-sp-2 text-start" style="--color: #fff">トイレリフォームしたいけど<br>こんなに高いの！？</h2>
          <h3 class="c-headline-grad__sttl">TOILET</h3>
          <div class="c-after c-after__dig"></div>
        </div>
        <figure class="c-image u-mb-pc-12 u-mb-sp-12">
          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6001); ?>"></div>
        </figure>
        <p class="text-start">
          タウン水道センターでは、最新モデルのトイレを独自に仕入れることによって地域でも最安値でのご提供を実現！<br>
          納期は短く、工事はしっかりと納得の仕上がりにてご提供することができます！
        </p>
        <a href="<?= wmp_get_link('service/toilet', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto" style="--color: var(--ac); --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">トイレリフォームはこちら</span>
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
      <div class="col-12 col-lg-4 u-mb-pc-32 u-mb-sp-32 d-flex flex-column js-animate fly-in2">
        <div class="c-headline-grad u-mb-pc-20 u-mb-sp-20" style="--bg: #023389; --bg-dark: #021d4c;">
          <h2 class="c-headline-grad__ttl u-lh-pc-2 u-lh-sp-2 text-start" style="--color: #fff">給湯器が壊れたので<br>交換したいけど分からない</h2>
          <h3 class="c-headline-grad__sttl">WATER HEATER</h3>
          <div class="c-after c-after__dig"></div>
        </div>
        <figure class="c-image u-mb-pc-12 u-mb-sp-12">
          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6010); ?>"></div>
        </figure>
        <p class="text-start">
          専門のスタッフが対応いたしますので、あなたのご自宅にあった給湯器をご案内することが可能！<br>
          給湯器・工事費＋その他諸々は込みの料金となっているため安心。さらに施工保証と品質保証も行っているので万が一の場合でもしっかりと対応
        </p>
        <a href="<?= wmp_get_link('service/water-heater', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto" style="--color: var(--ac); --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">給湯器交換はこちら</span>
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
      <div class="col-12 col-lg-4 u-mb-pc-32 u-mb-sp-32 d-flex flex-column js-animate fly-in3">
        <div class="c-headline-grad u-mb-pc-20 u-mb-sp-20" style="--bg: #023389; --bg-dark: #021d4c;">
          <h2 class="c-headline-grad__ttl u-lh-pc-2 u-lh-sp-2 text-start" style="--color: #fff">お風呂リフォームをすると<br>節約なるって聞いたんだけど？</h2>
          <h3 class="c-headline-grad__sttl">BATH</h3>
          <div class="c-after c-after__dig"></div>
        </div>
        <figure class="c-image u-mb-pc-12 u-mb-sp-12">
          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6011); ?>"></div>
        </figure>
        <p class="text-start">
          お風呂のリフォームを行うことで、光熱費の節約につながることがあります。<br>
          保温性・断熱性・節水タイプの浴槽やシャワーなど、経験を詰んだスタッフがあなたにあったお風呂リフォームを提案します
        </p>
        <a href="<?= wmp_get_link('service/bath', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto" style="--color: var(--ac); --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">お風呂リフォームはこちら</span>
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
      <div class="col-12 col-lg-4 u-mb-pc-32 u-mb-sp-32 d-flex flex-column js-animate fly-in">
        <div class="c-headline-grad u-mb-pc-20 u-mb-sp-20" style="--bg: #023389; --bg-dark: #021d4c;">
          <h2 class="c-headline-grad__ttl u-lh-pc-2 u-lh-sp-2 text-start" style="--color: #fff">蛇口を閉めても水が垂れて<br>洗面台の下が湿っている！</h2>
          <h3 class="c-headline-grad__sttl">FAUCET</h3>
          <div class="c-after c-after__dig"></div>
        </div>
        <figure class="c-image u-mb-pc-12 u-mb-sp-12">
          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6004); ?>"></div>
        </figure>
        <p class="text-start">
          タウン水道センターに早急にご連絡ください。迅速丁寧な対応にてスピード対応！<br>
          修理・交換後のアフターケアも万全！各種保証・保険などもご用意しています！
        </p>
        <a href="<?= wmp_get_link('service/faucet', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto" style="--color: var(--ac); --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">蛇口交換はこちら</span>
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
      <div class="col-12 col-lg-4 u-mb-pc-32 u-mb-sp-32 d-flex flex-column js-animate fly-in2">
        <div class="c-headline-grad u-mb-pc-20 u-mb-sp-20" style="--bg: #023389; --bg-dark: #021d4c;">
          <h2 class="c-headline-grad__ttl u-lh-pc-2 u-lh-sp-2 text-start" style="--color: #fff">浅井戸ポンプが動かない！<br>ポンプが異常な音を発してる</h2>
          <h3 class="c-headline-grad__sttl">PUMP</h3>
          <div class="c-after c-after__dig"></div>
        </div>
        <figure class="c-image u-mb-pc-12 u-mb-sp-12">
          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 5999); ?>"></div>
        </figure>
        <p class="text-start">
        当社では一軒家はもちろん、ビルやマンションの給湯ポンプまで幅広く対応しております。<br>
        用途や井戸の状況によって対応する商品は異なりますので、最適なポンプを専門知識を持ったスタッフが丁寧にご案内させて頂きます。
        </p>
        <a href="<?= wmp_get_link('service/pump', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto" style="--color: var(--ac); --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">井戸ポンプの交換はこちら</span>
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
      <div class="col-12 col-lg-4 u-mb-pc-32 u-mb-sp-32 d-flex flex-column js-animate fly-in3">
        <div class="c-headline-grad u-mb-pc-20 u-mb-sp-20" style="--bg: #023389; --bg-dark: #021d4c;">
          <h2 class="c-headline-grad__ttl u-lh-pc-2 u-lh-sp-2 text-start" style="--color: #fff">水漏れで早急になんとかしたい！<br>すぐに来てくれますか？</h2>
          <h3 class="c-headline-grad__sttl">TROUBLE</h3>
          <div class="c-after c-after__dig"></div>
        </div>
        <figure class="c-image u-mb-pc-12 u-mb-sp-12">
          <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6012); ?>"></div>
        </figure>
        <p class="text-start">
          トイレ・キッチン・お風呂・洗面台・蛇口排水・その他水漏れ・つまりに関することなら何でもご相談下さい。<br>
          当社では電話・メールでお問い合わせ頂きましたらすぐにでも駆けつけて点検・修理を専門スタッフが対応致します
        </p>
        <a href="<?= wmp_get_link('service/trouble', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16 mt-auto" style="--color: var(--ac); --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">水廻りトラブル対応はこちら</span>
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
  <div class="c-after c-after__bc c-after__bc--8" style="--background-color-rgb: 234 247 255; clip-path: polygon(0 0, 0% 100%, 100% 0);"></div>
</section>

<section class="c-section c-section--wide c-hover --zoom" style="--z-index: 20">
  <div class="container">
    <div class="row justify-content-center u-mb-pc-32 u-mb-sp-32">
      <div class="col-12 col-lg-12">
        <h2 class="text-white u-font-pc-28 u-font-sp-18 fw-bold c-underline">そのお悩み、全て<br class="is-sp">
          <span class="u-font-pc-40 u-font-sp-24">タウン水道センター</span>が<br class="is-sp">解決します！
        </h2>
      </div>
    </div>
    <div class="row justify-content-center u-mb-pc-32 u-mb-sp-32">
      <div class="col-12 col-lg-12">
        <h3 class="u-font-pc-20 u-font-sp-16 fw-bold">アフターフォロー体制も充実しており、「安心して任せられる」とご好評いただいています。</h3>
      </div>
    </div>
    <div class="row gx-4 gx-lg-5">
      <div class="col-12 col-lg-4 u-mb-sp-32">
        <a href="<?= wmp_get_link('case', ''); ?>" class="c-hover__link">
          <figure class="c-image u-mb-pc-12 u-mb-sp-12">
            <div class="c-image__src c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6004); ?>"></div>
          </figure>
          <h2 class="text-left fw-bold text-white">お客様の事例</h2>
        </a>
      </div>
      <div class="col-12 col-lg-4 u-mb-sp-32">
        <a href="<?= wmp_get_link('flow', ''); ?>" class="c-hover__link">
          <figure class="c-image u-mb-pc-12 u-mb-sp-12">
            <div class="c-image__src c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6003); ?>"></div>
          </figure>
          <h2 class="text-left fw-bold text-white">ご相談から着工までの流れ</h2>
        </a>
      </div>
      <div class="col-12 col-lg-4">
        <a href="<?= wmp_get_link('faq', ''); ?>" class="c-hover__link">
          <figure class="c-image u-mb-pc-12 u-mb-sp-12">
            <div class="c-image__src c-image__src --16 c-hover__target" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6005); ?>"></div>
          </figure>
          <h2 class="text-left fw-bold text-white">よくある質問</h2>
        </a>
      </div>
    </div>
  </div>
  <div class="c-after c-after__ac"></div>
  <div class="c-triangle" style="--border-width: 60px 49.8vw 0 49.8vw; --bottom: -92px; --bottom-lg: -124px; --bc: var(--ac)"></div>
</section>

<?php get_template_part('include/common-center'); ?>
<?php get_template_part('include/common-cta'); ?>

<section class=" c-section c-section--wide c-section--trans c-hover --zoom p-common-card">
  <div class="container">
    <div class="row justify-content-center gx-4 gx-lg-5">
      <div class="col-12">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-lg-12">
            <div class="c-headline-leftbig">
              <div class="c-headline-compact u-mb-pc-12 u-mb-sp-12">
                <div class="c-headline-compact__ttl">INFORMATION</div>
                <h2 class="c-headline-compact__sttl">お知らせ</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center gx-4 gx-lg-5 u-mb-pc-40 u-mb-sp-20">
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $per = 4;
          if (wp_is_mobile()) {
            $per = 4;
          }
          $args = [
            'post_type'      => 'news',
            'post_status'    => 'publish',
            'posts_per_page' => $per,
            'paged' => $paged,
          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <div class="col-6 col-lg-3 u-mb-sp-12">
                <article class="">
                  <a href="<?= get_permalink(); ?>" class="c-hover__link">
                    <h2 class="ttl u-mb-pc-4 u-mb-sp-0 w-100 js-truncate" data-line="1">
                      <?= get_the_title(); ?>
                    </h2>
                    <figure class="c-image u-mb-pc-16 u-mb-sp-8">
                      <div class="c-image__src --16 c-hover__target" data-lazy-background="<?= wmp_get_the_catchimage(); ?>"></div>
                    </figure>
                    <time datetime="<?php the_time('Y-m-d'); ?>" class="date u-mb-pc-12 u-mb-sp-0"><?= the_time('Y.m.d') ?><?= (wmp_post_new(get_the_ID())) ? ' | update' : ''; ?></time>
                    <div class="read d-none d-lg-block">
                      <?= wp_trim_words(get_the_content(), 30, '...'); ?>
                    </div>
                  </a>
                </article>
              </div>
            <?php
            endwhile;
          else :
            ?>
            <div class="col-12 col-lg-6">
              <h2>まだ記事はありません</h2>
            </div>
          <?php
          endif;
          wp_reset_postdata();
          ?>
        </div>

        <?php
        if (function_exists("pagination")) {
          pagination($max_num_page);
        }
        ?>

      </div>
    </div>

  </div>
  <div class="c-after c-after__bc c-after__bc--8" style="--background-color-rgb: 234 247 255; clip-path: polygon(0 0, 0 100%, 100% 100%);"></div>
</section>

<section class="c-section c-section--wide c-section--trans">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-5 order-2 order-md-1">
        <div class="c-headline__type3 text-start u-mb-pc-24 u-mb-sp-20">
        <?php if(is_page($gPages['slug'])): ?>
          <h1 class="c-headline__type3-ttl"><?= wmp_get_lp_pref($gPages['slug']); ?>で水道工事を行う当社は実績が多数ありますので安心してお任せください</h1>
        <?php else: ?>
          <h1 class="c-headline__type3-ttl">茨城・関東甲信越で水道工事を行う当社は実績が多数ありますので安心してお任せください</h1>
        <?php endif; ?>
        </div>
        <?php if(is_page($gPages['slug'])): ?>
          <p class="c-section__body text-start u-mb-pc-24 u-mb-sp-24">
          <?= wmp_get_lp_pref($gPages['slug']); ?>で水道工事をはじめとし、水周りに関する様々な問題を解決する株式会社タウン水道センターは、各地域の作業拠点から、お客様をお待たせしないよう迅速に訪問いたしますのでぜひ安心してご連絡ください。<br>
            <br>
            また<?= wmp_get_lp_pref($gPages['slug']); ?>で水道工事を行う当社は、見積の提供やご相談を無料で行い、お客様が安心して当社にご依頼していただける環境で、明朗会計を心掛け、お客様の水周りに関する様々なお悩みを早期解決できるように、常に素早いレスポンスを心掛けて対応し、ご自宅まで状況を確認しにお伺いいたします。<br>
            <br>
            当社はこれまで、様々なご家庭の水周りに関するトラブルを解決しており、水周りに関する工事の実績が多数ございますので、信頼できる会社をお探しでしたらご相談ください。<br>
          </p>
        <?php else: ?>
          <p class="c-section__body text-start u-mb-pc-24 u-mb-sp-24">
            茨城・関東甲信越で水道工事をはじめとし、水周りに関する様々な問題を解決する株式会社タウン水道センターは、各地域の作業拠点から、お客様をお待たせしないよう迅速に訪問いたしますのでぜひ安心してご連絡ください。<br>
            <br>
            また茨城で水道工事を行う当社は、見積の提供やご相談を無料で行い、お客様が安心して当社にご依頼していただける環境で、明朗会計を心掛け、お客様の水周りに関する様々なお悩みを早期解決できるように、常に素早いレスポンスを心掛けて対応し、ご自宅まで状況を確認しにお伺いいたします。<br>
            <br>
            当社はこれまで、様々なご家庭の水周りに関するトラブルを解決しており、水周りに関する工事の実績が多数ございますので、信頼できる会社をお探しでしたらご相談ください。<br>
          </p>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-6 u-mb-sp-32 offset-md-1 order-1 order-md-2">
        <figure class="c-image w-100 mb-5 mb-md-5 js-animate fade-in">
          <div class="c-image__src --16" data-lazy-background="<?= get_thumb_url_medhia_id('full', 6000); ?>"></div>
        </figure>
        <a href="<?= wmp_get_link('company', ''); ?>" class="c-btn-solid-border --white u-font-pc-16 u-font-sp-16" style="--color: var(--ac); --border: var(--ac)">
          <span class="c-btn-solid-border__txt">
            <span class="c-btn-solid-border__txt-in">会社概要</span>
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
  <div class="c-after c-after__bc c-after__bc--8" style="--background-color-rgb: 234 247 255; clip-path: polygon(0 0, 0% 100%, 100% 0);"></div>
</section>
