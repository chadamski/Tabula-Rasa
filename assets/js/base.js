// site scripts
var scrollbar; 

function init(){	
	$('body').addClass('complete');
	$('a').smoothScroll();

} 
// fire init on initial load
$(document).ready(function(){
/*
	Slick Next and Previous Classes
	$('.slider').each(function(){
		$(this).on('init', function(event, slick){
		    $(event.currentTarget).find('.slick-current').prevAll('.slide').addClass('prev');
		    $(event.currentTarget).find('.slick-current').nextAll('.slide').addClass('next');
		});	
		$(this).slick({ 
			centerMode: true,
			slide: '.slide',
			centerPadding: '0px',
			slidesToShow: 1,
			arrows : false,
			autoplay : false,
			infinite : false,
			fade : false,
			speed : 800,
			cssEase: 'cubic-bezier(0.455, 0.03, 0.515, 0.955)',

			
		});

		$(this).on('afterChange', function(currentSlide){
		    $(currentSlide.currentTarget).find('.slick-current').prevAll('.slide').addClass('prev');
		    $(currentSlide.currentTarget).find('.slick-current').nextAll('.slide').addClass('next');
		});
		$(this).on('beforeChange', function(currentSlide){
		    $(currentSlide.currentTarget).find('.slide').removeClass('prev next');
		});
		
	})
*/

	$('body').addClass('init-load');
	init();

});
$(window).load(function(){	
	$('body').addClass('loaded');

});

