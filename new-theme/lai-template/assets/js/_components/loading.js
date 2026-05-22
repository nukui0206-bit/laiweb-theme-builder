/**
 * ローダー
 */
let loading = () => {

  window.addEventListener( 'load', () => {
    $("#loading").fadeOut(1000);
  }, false );

  setTimeout(stopload(), 10000);
}

/**
 * 時間かかりすぎ
 */
let stopload = () => {
  $("#loading").delay(600).fadeOut(1000);
}

/**
 * 初期化
 */
let init = () => {
  loading();
}

export default { init, loading, stopload };
