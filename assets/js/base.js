// site scripts
function init(){	
	$('body').addClass('complete');
	$('a').smoothScroll();
} 
// fire init on initial load
$(document).ready(function(){
	$('body').addClass('init-load');
	init();

});
$(window).load(function(){	
	$('body').addClass('loaded');

});

