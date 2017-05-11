<?php include(locate_template('variables.php')); ?>
<header class="<?php echo $listClass ?>">
	<a href="<?php echo site_url(); ?>" id="logo"><h1><?php bloginfo( 'name' ); ?></h1></a>
	<nav role="main">
		<?php 
			wp_nav_menu( array(
			    'menu' => 'Main'
			) );
		?>
	</nav>
	<div class="social">
		<span class="connect">Connect</span>
		<?php if( get_field('facebook_link','options') ): ?>
			<a href="<?php the_field('facebook_link','options'); ?>" target="_blank"><svg class="icon facebook">
			    <use xlink:href="#facebook"/>
			</svg></a>
		<?php endif; ?>
		<?php if( get_field('twitter_link','options') ): ?>
			<a href="<?php the_field('twitter_link','options'); ?>" target="_blank"><svg class="icon twitter">
			    <use xlink:href="#twitter"/>
			</svg></a>
		<?php endif; ?>
		<?php if( get_field('linkedin_link','options') ): ?>
			<a href="<?php the_field('linkedin_link','options'); ?>" target="_blank"><svg class="icon linkedin">
			    <use xlink:href="#linkedin"/>
			</svg></a>
		<?php endif; ?>
		<?php if( get_field('youtube_link','options') ): ?>
			<a href="<?php the_field('youtube_link','options'); ?>" target="_blank"><svg class="icon youtube">
			    <use xlink:href="#youtube-2"/>
			</svg></a>
		<?php endif; ?>
	</div>
</header>