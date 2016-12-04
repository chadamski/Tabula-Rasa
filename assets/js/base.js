// site scripts
function init(){	
	$('body').addClass('complete');
} 
// fire init on initial load
$(document).ready(function(){
	$('body').addClass('init-load');
	init();
});
$(window).on('load', function(){	
	$('body').addClass('loaded');
});

