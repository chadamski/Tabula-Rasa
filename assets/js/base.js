// site scripts
function init(){	
	$('body').addClass('complete');
	$('a').smoothScroll();
	var scrollbar = Scrollbar.init(document.getElementById('wrapper'), {
		speed: .7,
		damping: 0.1,
		renderByPixels: true,
		syncCallbacks: true,
		continuousScrolling: false,
		overscrollEffect: false
	});
} 
// fire init on initial load
$(document).ready(function(){
	$('body').addClass('init-load');
	init();

});
$(window).load(function(){	
	$('body').addClass('loaded');

});

