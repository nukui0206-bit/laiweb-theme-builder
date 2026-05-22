/**
 * デバイス判定
 */
let pagetop = () => {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
      $(".g-pagetop").addClass("is-active");
    } else {
      $(".g-pagetop").removeClass("is-active");
    }
  });
}

/**
 * 初期化
 */
let init = () => {
  pagetop();
}

export default { init, pagetop };
