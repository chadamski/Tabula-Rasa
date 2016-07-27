<?php 
wp_reset_query();
$templateDirectory = get_bloginfo('template_directory');
include(locate_template('parts/ui-footer.php'));
echo '</div>';
	echo '<script src="'.$templateDirectory.'/assets/js/vendor/jquery-3.1.0.min.js" type="text/javascript"></script>';
	echo '<script src="'.$templateDirectory.'/assets/js/vendor/modernizr.js" type="text/javascript"></script>';
	echo '<script src="'.$templateDirectory.'/assets/js/vendor/three.min.js" type="text/javascript"></script>';
	echo '<script src="'.$templateDirectory.'/assets/js/plugins.js" type="text/javascript"></script>';
	echo '<script src="'.$templateDirectory.'/assets/js/base.js" type="text/javascript"></script>'; ?>
	<?php wp_footer();
	echo '</body>';	
echo '</html>';
?>