<a href="tel:<?= get_field('tel_contact', 'option'); ?>" class="c-btn --line c-btn--contact">
  <i>
    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48px" height="48px"> <!-- 電話アイコンのSVG -->
      <path d="M6.62,10.79a15.561,15.561,0,0,0,6.59,6.59l2.2-2.2a1,1,0,0,1,1.11-.23,11.36,11.36,0,0,0,3.58.57,1,1,0,0,1,1,1v3.48a1,1,0,0,1-1,1A16.89,16.89,0,0,1,3.49,4a1,1,0,0,1,1-1H8.08a1,1,0,0,1,1,1,11.36,11.36,0,0,0,.57,3.58,1,1,0,0,1-.23,1.11Z"/>
    </svg>
  </i>
  <div class="c-btn__body">
    <span class="c-btn__sttl">
      ＼電話で無料相談はこちら／
    </span>
    <span class="c-btn__ttl">
      TEL:<?= get_field('tel_contact', 'option'); ?>
    </span>
  </div>
</a>
