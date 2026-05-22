/**
 * 遅延読込
 */
let lazy = () => {

  gsap.utils.toArray("[data-lazy-background]").forEach((el, index) => {
    gsap.from(el, {
      scrollTrigger: {
        trigger: el,
        start: 'top bottom',
        end: 'bottom top',
        toggleActions: 'play none none none',
        once: true,
        //markers: true,
        onEnter: () => {
          el.style.backgroundImage = 'url(' + el.dataset.lazyBackground + ')';
          delete el.dataset.lazyBackground;
        }
      },
    });
  });

  gsap.utils.toArray("[data-lazy-img]").forEach((el, index) => {
    gsap.from(el, {
      scrollTrigger: {
        trigger: el,
        start: 'top bottom',
        end: 'bottom top',
        toggleActions: 'play none none none',
        once: true,
        //markers: true,
        onEnter: () => {
          el.setAttribute('src', el.dataset.lazyImg);
          delete el.dataset.lazyImg;
        }
      },
    });
  });

  gsap.utils.toArray("[data-lazy-src]").forEach((el, index) => {
    gsap.from(el, {
      scrollTrigger: {
        trigger: el,
        start: 'top bottom',
        end: 'bottom top',
        toggleActions: 'play none none none',
        once: true,
        //markers: true,
        onEnter: () => {
          el.setAttribute('src', el.dataset.lazySrc);
          delete el.dataset.lazySrc;
        }
      },
    });
  });
  
  $(window).on('load', function() {
    // Lazy Load Link
    $('[data-lazy-link]').each(function() {
      $(this).attr('href', $(this).data('lazy-link'));
    });
  
    // Lazy Load Script
    $('[data-lazy-script]').each(function() {
      $(this).attr('src', $(this).data('lazy-script'));
    });
  });

}

/**
 * 初期化
 */
let init = () => {
  lazy();
}

export default { init, lazy };

/*
$(window).on('load resize scroll', function() {
  // Lazy Load Background
  $('[data-lazy-background]').each(function() {
    if ($(window).scrollTop() + $(window).height() > $(this).offset().top) {
      $(this).css('background-image', 'url('+$(this).data('lazy-background')+')');
      $(this).removeAttr('data-lazy-background');
    }
  });

  // Lazy Load Img
  $('[data-lazy-img]').each(function() {
    if ($(window).scrollTop() + $(window).height() > $(this).offset().top) {
      $(this).attr('src', $(this).data('lazy-img'));
      $(this).removeAttr('data-lazy-img');
    }
  });
});
  
$(window).on('load', function() {

  // Lazy Load Link
  $('[data-lazy-link]').each(function() {
    $(this).attr('href', $(this).data('lazy-link'));
  });

  // Lazy Load Script
  $('[data-lazy-script]').each(function() {
    $(this).attr('src', $(this).data('lazy-script'));
  });

  $('[data-lazy-iframe]').each(function() {
    $(this).attr('src', $(this).data('lazy-script'));
  });

});
*/