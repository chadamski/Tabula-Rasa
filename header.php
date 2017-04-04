<?php
include(locate_template('variables.php'));
echo '<!DOCTYPE html >';
echo '<html class="no-js">';
echo '<head>';
	echo '<meta charset="utf-8">';
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
	echo '<meta http-equiv="cleartype" content="on">';
	echo '<meta name="HandheldFriendly" content="True">';
	echo '<meta name="MobileOptimized" content="320">';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">'; ?>
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@ USER NAME HERE">
	<meta name="twitter:creator" content="@ USER NAME HERE">
	<meta name="twitter:title" content="<?php echo wp_title( '|', true, 'right' ); bloginfo('name'); ?>">
	<meta name="twitter:url" content="<?php echo get_permalink(); ?>">
	<meta name="twitter:description" content="<?php get_the_excerpt(); ?>">
	<meta name="twitter:image" content="<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); echo $image; ?>" alt="" width="800" height="600" />
	<?php echo '<title>';
	wp_title( '|', true, 'right' );
	bloginfo('name');
	echo '</title>';	
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_url').'">';
	include(locate_template('parts/head-favicon.php'));
	echo '<script src="'.get_bloginfo('template_directory').'/assets/js/vendor/modernizr.js"></script>';
	echo '<script type="text/javascript">$templateDirectory="'.$templateDirectory.'";</script>';
	echo '<script type="text/javascript">$homeURL="'.$homeURL.'";</script>';
	include(locate_template('parts/head-google-analytics.php'));
	wp_head(); 
	echo '</head>';
	echo '<body ';
	body_class();
	echo '>';
	echo '<div id="wrapper">';
	include(locate_template('parts/ui-header.php'));
	include(locate_template('parts/icon-spritesheet.svg'));
?>
