/* パララックス */

let parallax = () => {
  gsap.utils.toArray('.js-parallax').forEach((el) => {
    const y = el.getAttribute('data-y') || -50;
    const start = el.getAttribute('data-start') || 'start bottom';
    
    gsap.to(el, {
      y: y,    
      scrollTrigger: {
        trigger: el,
        start: start,
        end: 'bottom top',
        scrub: 1,
        //markers: true
      }
    })
  });
}

/**
 * 初期化
 */
let init = () => {
  parallax();
}

export default { init, parallax };
