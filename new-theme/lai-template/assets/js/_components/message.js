/* message */

var msgInput = $('#message-input');
var msgBtn = $('.message-line-textarea button');

msgInput.focus(function() {
  $(this).addClass('active');
});

/*
msgInput.focus(function() {
  $(this).addClass('active');
}).blur(function() {
  $(this).removeClass('active');
});
*/

msgInput.on("keydown keyup keypress change", function() {
  if ($(this).val().length < 1) {
    msgBtn.prop("disabled", true);
    msgBtn.removeClass("active");
  } else {
    msgBtn.prop("disabled", false);
    msgBtn.addClass("active");
    // @ バリデーション
    if($(this).val().match(/(@|＠)/)) {
      msgBtn.attr('data-toggle','modal');
      msgBtn.attr('data-target','#dialogValidation');
      console.log('xxxx');
    }else{
      msgBtn.attr('data-toggle','');
      msgBtn.attr('data-target','');
      console.log('OK');
    }
  }
});
