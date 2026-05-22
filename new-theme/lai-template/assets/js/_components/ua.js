/**
 * デバイス判定
 */
let deviceJudge = () => {
  //64em 1024px
  //48em 768px
  const breakpoint_desktop = window.matchMedia('(min-width: 64em)');
  const breakpoint_tablet = window.matchMedia('(min-width: 48em)');
  const ua = navigator.userAgent;
  if (breakpoint_desktop.matches) {
    //console.log('desktop');
    return 'desktop';
  } else if (breakpoint_tablet.matches) {
    //console.log('tablet');
    return 'tablet';
  } else {
    //console.log('mobile');
    return 'mobile';
  }
}

/**
 * 初期化
 */
let init = () => {
  deviceJudge();
  window.addEventListener('resize', function() {deviceJudge();}, false );
}

export default { init, deviceJudge };
