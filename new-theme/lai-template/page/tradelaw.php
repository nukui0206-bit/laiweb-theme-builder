<?php get_template_part('include/config'); ?>
<?php get_template_part('include/doctype'); ?>
<?php get_template_part('include/header'); ?>
<?php get_template_part('include/content_prepend'); ?>
<?php get_template_part('include/visual-sub'); ?>
<?php get_template_part('include/pankuzu'); ?>

<!-- ▼contents -->
<div id="contents" class="js-animate" data-target="g-header" data-offset="-700" data-repeat="true">
  <main class="js-animate" data-target="g-fixarea" data-offset="600" data-repeat="true">



    <section class="c-section c-section--wide c-section--trans">
      <div class="container">
        <div class="row justify-content-center align-items-center js-animate fly-in u-mb-pc-64 u-mb-sp-32">
          <div class="col-12 col-lg-12">
            <div class="c-headline-leftbig">
              <p class="c-headline-leftbig__sttl">TRADELAW</p>
              <h1 class="c-headline-leftbig__ttl u-font-pc-32 u-mb-pc-32">
                特定商取引法に基づく表記
              </h1>
              <table class="c-table">
                <tbody>
                  <tr>
                    <th>販売業者名</th>
                    <td><?= get_field('company', 'option'); ?></td>
                  </tr>
                  <?php if(get_field('name', 'option')): ?>
                  <tr>
                    <th>代表責任者</th>
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
                  <tr>
                    <th>電話番号</th>
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
                      ※ご連絡はサポートLINE・お問い合わせフォームよりお願いいたします
                    </td>
                  </tr>
                  <tr>
                    <th>電話受付時間</th>
                    <td>
                      平日　10：00～19：00
                    </td>
                  </tr>
                  <tr>
                    <th>メール</th>
                    <td>
                      <ul class="c-list--inline row">
                        <li class="c-list__item col-auto">
                          <div class="p-index-about__number">
                            <span class="">support@laiweb.jp</span>
                          </div>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <th>販売価格（役務の対価）</th>
                    <td>
                      入会申込フォームに表示された額面（税込価格）
                    </td>
                  </tr>
                  <tr>
                    <th>引渡し時期</th>
                    <td>お支払い完了後即時で「サービス提供を受ける権利」を取得したこととなります。</td>
                  </tr>
                  <tr>
                    <th>決済方法</th>
                    <td>クレジットカ－ド決済<br>
                      口座振替
                    </td>
                  </tr>
                  <tr>
                    <th>商品代金以外の必要料金</th>
                    <td>会費のほか支払いに関わる手数料やサービス提供に関わるシステム利用料、サービス手数料等が別途発生する場合があります。発生する場合は入会申込フォームに表示いたします。</td>
                  </tr>
                  <tr>
                    <th>返金について</th>
                    <td>  サービスの性質上、返金はお受けしておりません。</td>
                  </tr>
                  <tr>
                    <th>中途解約について</th>
                    <td>契約期間満了月の前月25日15時までに更新拒絶の通知を行ってください。<br>
                    例：5月末日をもって解約したい場合は4月25日15時までに解約の手続きを行ってください。
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
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