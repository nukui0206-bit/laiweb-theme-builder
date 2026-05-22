import { truncate } from '../jquery.truncator.min';

/**
 * 文字丸める
 */

let trunc = () => {
  $('.js-truncate').each(function() {
    const num = $(this).data('line') ? $(this).data('line') : 2;
    truncate($(this), $(this).text(), { line: parseInt(num), ellipsis: '...' });
  });
}

/**
 * 初期化
 */
let init = () => {
  trunc();
}

export default { init, trunc };
