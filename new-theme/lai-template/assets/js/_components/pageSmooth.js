let pageSmooth = () => {

    $(window).on('load resize', function() {
      const container = document.querySelector('#js-scroll-container');
      const height = container.clientHeight; //コンテンツの高さを取得
      document.body.style.height = `${height}px`; //bodyタグにスタイル付与
    
      gsap.to(container, {
        y: () => `-=${(height - document.documentElement.clientHeight)}`, //ページ内要素の高さ - ウインドウの高さ
        ease: 'none',
        scrollTrigger: {
          trigger: () => document.body,
          start: 'top top',
          end: 'bottom bottom',
          scrub: 1,
        },
      });
    });

}

/**
 * 初期化
 */
let init = () => {
  pageSmooth();
}

export default { init, pageSmooth };