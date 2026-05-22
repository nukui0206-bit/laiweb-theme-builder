/* フッター制御 */
if(ua() == 'desktop') {
  var page_size = {
    w : $(window).width()
   ,h : $(window).height()
  };
  function getHeight(){
    var browser_size = {
      w: document.body.clientWidth
     ,h: document.body.clientHeight
    };
    if(page_size.h > browser_size.h) {
      $('#footer').css('position', 'fixed');
      $('#footer').css('bottom', '0px');
      $('#footer').css('width', '100%');
    }
  }

  getHeight();

  $('#btn-resist-next').on('click tap',function(){
  	$('#footer').css('position', 'relative');
  });
}
