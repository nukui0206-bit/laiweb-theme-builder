/**
 * スクロール トリガー
 */
let animate = () => {
  gsap.utils.toArray('.js-animate').forEach((el, index) => {
    const offset = el.dataset.offset ? el.dataset.offset : '70%';
    const repeat = el.dataset.repeat ? el.dataset.repeat : false;
    const target = el.dataset.target ? document.getElementById(el.dataset.target) : el;
    gsap.from(el, {
      scrollTrigger: {
        trigger: el,
        start: 'top ' + offset,
        end: () => `+=${document.body.offsetHeight}`,
        toggleClass: { targets: target, className: 'is-active' },
        id: 'js-animate-' + index,
        toggleActions: 'play none none none',
        once: repeat === false ? true : false,
        //markers: true,
      },
    });
  });

  //グループ
  gsap.utils.toArray('.js-animate-set').forEach((el, index) => {
    const offset = el.dataset.offset ? el.dataset.offset : '70%';
    const repeat = el.dataset.repeat ? el.dataset.repeat : false;
    const targets = el.querySelectorAll('.js-animate-set__target');

    if (el.classList.contains('js-flyupin')) {
      gsap.to(targets, {
        y: 0,
        opacity: 1,
        duration: 0.5,
        stagger: {
          each: 0.2,
          from: 'start',
        },
        scrollTrigger: {
          trigger: targets,
          start: 'top ' + offset,
          //end: 'bottom top',
          id: 'js-animate-set-flyupin-' + index,
          toggleActions: 'play none none reset',
          once: repeat === false ? true : false,
          //markers: true,
          //id: 'box',
          //scrub: true,
        },
      });
    }

    if (el.classList.contains('js-fadein')) {
      //フェードイン
      gsap.to(targets, {
        opacity: 1,
        duration: 0.5,
        stagger: {
          amount: 1,
          from: 'start',
        },
        scrollTrigger: {
          trigger: targets,
          start: 'top ' + offset,
          //end: 'bottom top',
          id: 'js-animate-set-fadein-' + index,
          toggleActions: 'play none none reset',
          once: repeat === false ? true : false,
          //markers: true,
          //id: 'box',
          //scrub: true,
        },
      });
    }
  });
};

/**
 * 初期化
 */
let init = () => {
  animate();
};

export default { init, animate };
