/**
 * TEL
 */
let tel = () => {
  $('[data-action=call]').each(function () {
    var $ele = $(this);
    $ele.wrap(
      '<a href="tel:' +
        $ele.data('tel') +
        "\" onClick=\"ga('send', 'event','tel', 'tap' ,'', 1);\" class=\"" +
        $ele.attr('class') +
        '"></a>'
    );
    $ele.removeClass($ele.attr('class'));
  });
};

/**
 * 初期化
 */
let init = () => {
  tel();
};

export default { init, tel };
