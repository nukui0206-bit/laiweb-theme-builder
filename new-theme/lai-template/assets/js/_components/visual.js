/**
 * デバイス判定
 */
let visual = () => {
  $(".c-visual .catchcopy").velocity(
    { opacity: [1, 0] },
    { delay: 1000, duration: 2000 }
  );
}

/**
 * 初期化
 */
let init = () => {
  visual();
}

export default { init, visual };
