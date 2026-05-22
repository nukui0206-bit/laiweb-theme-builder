/**
 * 閉じる
 */

let close = () => {
  const close = $('.js-close');
  $(close).each(function(index, element){
    $(element).find('.js-close__btn').on('click tap', function(e) {
//      close.fadeOut();
      close.collapse('hide');
    });
  });

  //画面外クリックで閉じる
  $(document).on('click', function(e) {
    if(!$(e.target).closest('.lower').length){
      close.collapse('hide');
    }
  });

}

/**
 * 初期化
 */
let init = () => {
  close();
}

export default { init, close };
