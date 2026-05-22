import { gsap } from './gsap.min';
import { scrollTrigger } from './ScrollTrigger.min';
import ScrollHint from './scroll-hint';

gsap.config({
  //ターゲットがない場合はOFF
  nullTargetWarn: false,
});

import { counterup } from './jquery.counterup.min.js';

//import { Truncator } from './jquery.truncator.min';
//import { dsnGrid } from './dsn-grid.js';

import animate from './_components/animate';
//import loading from './_components/loading';
import slick from './_components/slick';
import preloader from './_components/preloader';
import deviceJudge from './_components/ua';
import lazy from './_components/lazy';
import tel from './_components/tel';
//import visual from './_components/visual';
//import pageSmooth from './_components/pageSmooth';
import pagetop from './_components/pagetop';
import parallax from './_components/parallax';
import smoothScroll from './_components/smoothScroll';
import close from './_components/close';
//import truncator from './_components/truncate';
import cursor from './_components/cursor';
//import instagramFeed from './_components/instagramFeed';

(function () {
  // スクロールトリガー
  animate.init();

  // デバイス判定
  deviceJudge.init();

  // ローダー
  preloader.init();

  // ローダー
  //loading.init();

  // slick
  slick.init();

  // TEL
  tel.init();

  // visual
  //visual.init();

  // pageSmooth
  /*
  if(deviceJudge.deviceJudge() == 'desktop') {
    pageSmooth.init();
    $('#viewport').addClass('g-viewport is-fixed');
  }
  */

  // lazy
  lazy.init();

  // pagetop
  pagetop.init();

  // parallax
  parallax.init();

  // smoothScroll
  smoothScroll.init();

  // close
  close.init();

  // truncate
  //truncator.init();

  // cursor
  cursor.init();

  // instagramFeed
  //instagramFeed.init();

  // scrollHint
  new ScrollHint('.js-scrollable');
})();
