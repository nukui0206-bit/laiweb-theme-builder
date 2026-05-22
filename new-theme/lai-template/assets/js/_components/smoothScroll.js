let smoothScroll = () => {

  //遷移位置
  const urlHeaderHight = 80;
  //URLのハッシュ値を取得
  const urlHash = location.hash;
  //ハッシュ値があればページ内スクロール
  if(urlHash) {
    //スクロールを0に戻す
    $('body,html').stop().scrollTop(0);
    setTimeout(function () {
      //ロード時の処理を待ち、時間差でスクロール実行
      scrollToAnker(urlHash,urlHeaderHight) ;
    }, 100);
  }

  //通常のクリック時
  $('a[href ^= "#"]:not([class *= js-nomove])').on('click', function() {
    //遷移位置
    const headerHight = 65;
    //ページ内リンク先を取得
    const href= $(this).attr("href");
    //リンク先が#か空だったらhtmlに
    const hash = href == "#" || href == "" ? 'html' : href;
    //スクロール実行
    scrollToAnker(hash,headerHight);
    //リンク無効化
    return false;
  });

  // 関数：スムーススクロール
  // 指定したアンカー(#ID)へアニメーションでスクロール
  let scrollToAnker = (hash,headerHight) => {
  	const speed = 400;
    const target = $(hash);
  	const position = target.offset().top - headerHight;
  	$('body,html').stop().animate({scrollTop:position}, speed, 'swing');
  }

}

/**
 * 初期化
 */
let init = () => {
  smoothScroll();
}

export default { init, smoothScroll };