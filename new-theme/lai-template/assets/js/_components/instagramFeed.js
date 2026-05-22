/**
 * デバイス判定
 */
let instagramFeed = () => {
  $.instagramFeed({
    'username': '_as1101_',
    'container': "#instagram_feed",
    'display_profile': false,
    'display_biography': false,
    'display_gallery': true,
    'display_captions': false,
    'callback': null,
    'styling': true,
    'items': 12,
    'items_per_row': 4,
    'margin': 0.25
  });
}

/**
 * 初期化
 */
let init = () => {
  instagramFeed();
}

export default { init, instagramFeed };
