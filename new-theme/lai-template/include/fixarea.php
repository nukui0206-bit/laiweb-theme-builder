<div id="g-fixarea" class="g-fixarea">
<?php
  /*
  <div class="g-fixarea__contact">
    <div class="contact contact--1">
      <a href="https://www.isi-kaitai.net/">
        <span><small>公式サイトは</small><br>こちら</span>
      </a>
    </div>  
    <div class="contact contact--2">
      <a href="<?= wmp_get_link('contact', ''); ?>">
        <span><small>お急ぎの方</small><br>無料相談をする</span>
      </a>
    </div>
  </div>
*/
  ?>



<div class="g-fixarea-footer is-sp">
  <div class="container p-0">
    <div class="row">
      <div class="g-fixarea-footer__item col-6">
        <span class="number" data-action="call" data-tel="<?= get_field('tel_contact', 'option'); ?>">
          <i class="fas fa-phone-alt"></i> 電話相談
        </a>
      </div>
      <div class="g-fixarea-footer__item col-6">
        <a href="<?= wmp_get_link('contact', ''); ?>" target="">
          <i class="fas fa-envelope"></i> 無料相談
        </a>
      </div>

    </div>
  </div>
</div>
