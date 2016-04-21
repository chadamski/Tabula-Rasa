// site scripts
function init(){	
	$('.stretched').anystretch();	
	$('body').addClass('complete');
/*
	var waypoint = new Waypoint({
		element: document.getElementById('menu'),
		handler: function() {
			$('#waypoint-element').toggleClass('toggled');
		},
		offset: 200
	})
*/
	$('a').smoothScroll();
} 
// fire init on initial load
$(document).ready(function(){
	$('body').addClass('init-load');
	init();
	

});
$(window).load(function(){	
	$('body').addClass('loaded');

	// add atributes to image for scroll fx
// 	$('#hero #hero-image img').attr('data-0','transform:scale(1)').attr('data-700','transform:scale(1.1)');
	// Scale banner image with scroll
/*
	skrollr.init({
		forceHeight: false,
		smoothScrolling: false,
		mobileDeceleration: 0.004
	});
*/
});

