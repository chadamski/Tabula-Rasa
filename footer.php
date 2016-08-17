<?php 
wp_reset_query();
$templateDirectory = get_bloginfo('template_directory');
include(locate_template('parts/ui-footer.php'));
echo '</div>';
wp_footer();
echo '</body>';	
echo '</html>';
?>