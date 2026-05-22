/* waypoint */
$(window).on("load", function(){
  var offset = ($(this).data("offset")) ? $(this).data("offset") : "95%";
  var waypoints = $('.waypoint').waypoint({
    handler: function(direction) {
		if (direction == 'down') { $(this.element).addClass('active'); }
//    		else if(direction == 'up'){ $(this.element).removeClass('active'); }
    },
    offset: offset
  });
});