var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

/* Copyright 2008 Paul Bennett - http://paulicio.us
 * Scroller.js
 * Captures mouse wheel events and runs the ScrollSmoothly
 * function based on their output.
 * Aims to aid usability by allowing the user to scroll the 
 * page horizontally smoothly using only their mousewheel.
 * Mousewheel event capture by Adomas PaltanaviÄius at http://adomas.org/
 */

function handle(delta) {
        if (delta <0)
                ScrollSmoothly(10,10,'right');
        else if (delta >0)
                ScrollSmoothly(10,10,'left');
        else
        	;
}
 
function wheel(event){
        var delta = 0;
        if (!event) 
                event = window.event;
        if (event.wheelDelta) {
                delta = event.wheelDelta/120;
                if (window.opera)
                        delta = -delta;
        } else if (event.detail) {
                delta = -event.detail/3;
        }
        if (delta)
                handle(delta);
        if (event.preventDefault)
                event.preventDefault();
	event.returnValue = false;
}

var repeatCount = 0;

function ScrollSmoothly(scrollPos,repeatTimes, direction) {
	if(repeatCount < repeatTimes)
		if(direction == 'right')
			window.scrollBy(20,0);
		else
			window.scrollBy(-20,0);
	else
	{
		repeatCount = 0;
		clearTimeout(cTimeout);
		return;
	}
	repeatCount++;
	cTimeout = setTimeout("ScrollSmoothly('" + scrollPos + "','"+ repeatTimes +"','"+ direction +"')",10);
}
 
/* Initialization code. */
if (window.addEventListener)
        window.addEventListener('DOMMouseScroll', wheel, false);
window.onmousewheel = document.onmousewheel = wheel;
 

}
/*
     FILE ARCHIVED ON 07:56:38 Sep 27, 2010 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 19:52:18 Jan 23, 2021.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 208.323
  exclusion.robots: 0.128
  exclusion.robots.policy: 0.118
  RedisCDXSource: 1.702
  esindex: 0.007
  LoadShardBlock: 185.746 (3)
  PetaboxLoader3.datanode: 140.689 (4)
  CDXLines.iter: 18.218 (3)
  PetaboxLoader3.resolve: 54.615 (2)
  load_resource: 109.968
*/

$(function() {
	$('a.scroll-horizontal').bind('click',function(event){
		var $anchor = $(this);
		/*
		if you want to use one of the easing effects:
		$('html, body').stop().animate({
			scrollLeft: $($anchor.attr('href')).offset().left
		}, 1500,'easeInOutExpo');
		 */
		$('html, body').stop().animate({
			scrollLeft: $($anchor.attr('href')).offset().left
		}, 2000);
		event.preventDefault();
	});
});