/**
 * slick
 */
let slick = () => {
  $("#visual-slick").on("init", function () {
    $('.slick-slide[data-slick-index="0"] .c-image__src').addClass("add-animation");
  })
  .slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 8000,
    infinite: true,
    fade: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    speed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  })
  .on({
    // スライドが移動する前に発生するイベント
    beforeChange: function (event, slick, currentSlide, nextSlide) {
      // 表示されているスライドに"add-animation"のclassをつける
      $(".c-image__src", this).eq(nextSlide).addClass("add-animation");
      // あとで"add-animation"のclassを消すための"remove-animation"classを付ける
      $(".c-image__src", this).eq(currentSlide).addClass("remove-animation");
    },
    // スライドが移動した後に発生するイベント
    afterChange: function () {
      // 表示していないスライドはアニメーションのclassを外す
      $(".remove-animation", this).removeClass(
        "remove-animation add-animation"
      );
    },
  });

  $("#js-visual-news__ticker").slick({
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 4000,
    centerMode: true,
    centerPadding: '0',
    infinite: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  const slick = $('.js-slick');
  $(slick).each(function(index, element){
    const target = $(element).find('.js-slick__target');
    const show = target.attr('data-show') ? target.data('show') : '3';
    const showsp = target.attr('data-showsp') ? target.data('showsp') : '1';
    const rtl = target.attr('data-rtl') ? target.data('rtl') : false;
    target.slick({
      adaptiveHeight: true, // 高さ可変
      arrows: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 4000,
      centerMode: true,
      centerPadding: '30px',
      infinite: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      speed: 500,
      slidesToShow: show,
      slidesToScroll: 1,
      prevArrow: '<span class="c-slick-photo__prev"><i class="fas fa-angle-left"></i></span>',
      nextArrow: '<span class="c-slick-photo__next"><i class="fas fa-angle-right"></i></span>',
      rtl: rtl,
      responsive: [{
        breakpoint: 768,
        settings: {
          centerMode: false,
          centerPadding: 0,
          slidesToShow: showsp,
        }
      }]
    });
  });

  const slider = $('.js-slider');
  $(slider).each(function(index, el){
    const target = $(el).find('.js-slider__target');
    const thum = $(el).find('.js-slider__thum');
    target.slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.c-slider__thum' //サムネイルのクラス名
    });
    thum.slick({
      infinite: true,
      centerMode: true,
      centerPadding: '30px',
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.c-slider__main', //スライダー本体のクラス名
      focusOnSelect: true,
      prevArrow: '<span class="c-slider__arrow c-slider__prev"><i class="fas fa-angle-left"></i></span>',
      nextArrow: '<span class="c-slider__arrow c-slider__next"><i class="fas fa-angle-right"></i></span>',
      responsive: [{
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
        }
      }]
    });
  });

  //サムネイルをスライドさせないで並べたい
  const sliderGrid = $('.js-slider-grid');
  $(sliderGrid).each(function(index, el){
    const target = $(el).find('.js-slider__target');
    const thum = $(el).find('.js-slider__thum');
    //画像の枚数を入れる必要がある
    const show = target.attr('data-show') ? target.data('show') : '5';
    target.slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: true,
      asNavFor: '.c-slider__thum', //サムネイルのクラス名
      prevArrow: '<span class="c-slider__arrow c-slider__prev"><i class="fas fa-angle-left"></i></span>',
      nextArrow: '<span class="c-slider__arrow c-slider__next"><i class="fas fa-angle-right"></i></span>',
    });
    thum.slick({
      infinite: true,
      centerMode: true,
      centerPadding: 0,
      slidesToShow: show,
      slidesToScroll: 1,
      asNavFor: '.c-slider__main', //スライダー本体のクラス名
      focusOnSelect: true,
      arrows: false,
      responsive: [{
        breakpoint: 768,
        settings: {
        }
      }]
    });
    //サムネイルをスライドさせずに連動して変更させる設定。
    target.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
      var index = nextSlide; //次のスライド番号
      //サムネイルのslick-currentを削除し次のスライド要素にslick-currentを追加
      thum.find(".slick-slide").removeClass("slick-current").eq(index).addClass("slick-current");
    });
  });


  const service = $('.js-slick-service');
  $(service).each(function(index, element){
    const target = $(element).find('.js-slick__target');
    const show = target.attr('data-show') ? target.data('show') : '3';
    const showsp = target.attr('data-showsp') ? target.data('showsp') : '1';
    target.slick({
      adaptiveHeight: true, // 高さ可変
      arrows: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 4000,
      centerMode: true,
      centerPadding: 0,
      infinite: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      speed: 500,
      slidesToShow: show,
      slidesToScroll: 1,
      prevArrow: '<span class="c-slick-photo__prev"><i class="fas fa-angle-left"></i></span>',
      nextArrow: '<span class="c-slick-photo__next"><i class="fas fa-angle-right"></i></span>',
      responsive: [{
        breakpoint: 768,
        settings: {
          //centerMode: false,
          //centerPadding: 0,
          slidesToShow: showsp,
        }
      }]
    });
  });

}

/**
 * 初期化
 */
let init = () => {
  slick();
}

export default { init, slick };
