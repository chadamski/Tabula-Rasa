#Tabula Rasa

####A blank, customizable, SASSy WordPress theme with a great structure and lots of handy plugins

Brought to you by <a href="http://www.chadams.co/">Chadams Web Consulting.</a>

Here are the tools I use most frequently to make custom themes.

##UI Stuff

UI Icon Set:
http://www.entypo.com/

Favicon Generator: 
http://www.favicon-generator.org/


##JS Plugins & Stuff

Waypoints:
http://imakewebthings.com/waypoints/guides/getting-started/

Cycle 2: 
http://jquery.malsup.com/cycle2/

Anystretch:
https://github.com/danmillar/jquery-anystretch

Skrollr (for parallax-y stuffs):
https://github.com/Prinzhorn/skrollr

FitText:
http://fittextjs.com/

Unslider: 
http://unslider.com/

Particles: 

https://github.com/VincentGarreau/particles.js

http://vincentgarreau.com/particles.js/

Three.js: 

http://threejs.org/

##WordPress Plugins

I highly recommend: 

Advanced Custom Fields

Advanced Custom Fields Gallery

Advanced Custom Fields Repeater Field Add-On

Advanced Custom Fields Options Page


Repeater Field snippet:

``<?php
	if( have_rows('repeater_field_name') ):
		while ( have_rows('repeater_field_name') ) : the_row();
			the_sub_field('sub_field_name');
		endwhile;
	else :
	endif;
?>``