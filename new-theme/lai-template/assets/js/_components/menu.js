/* メニュー */

  var scrollPosition = 0;
  var scrollPosition2 = 0;

  // スマホの場合メニュートグルはタップできない
  if(ua() != 'desktop') {
    $('#header .mypage-dropdown-toggle').addClass('disabled');
  }

  $('#menu').on('click tap',function(){
  	var target = "menu";
  	var now = $("body").attr("data-status");
  	//iosの背景も一緒にスクロールされてしまうバグにも対応
      //↓これだと ios がタップ時にスクロールを取得してくれない
      //scrollPosition = $('html,body').scrollTop();
      //↓こーすると良い
  	var doc = document.documentElement;
      scrollPosition = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
      if(scrollPosition == 0) {
          scrollPosition = scrollPosition2;
      }
  	if( target == now ) {
  		$("body").attr("data-status", "");
          $('.front').css({'position':'static','top':'0'});
          $('html,body').scrollTop(scrollPosition);
  	} else {
  		$("body").attr("data-status", target);
          $('.front').css({'position':'fixed','top':-scrollPosition});
          scrollPosition2 = scrollPosition;
  	}
    $("#header").toggleClass('active');
    $("#nav").toggleClass('active');
//    $(".fa-bars").toggleClass('active');
//    $(".fa-times").toggleClass('active');
    $("#menu-back").toggleClass('active');
  });
