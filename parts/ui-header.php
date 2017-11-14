<?php include(locate_template('variables.php')); ?>
<?php if( get_field('sitewide_banner_text','options') ): ?>
	<div class="global-announcement">
		<?php if( get_field('sitewide_banner_link','options') ): ?>
			<a href="<?php the_field('sitewide_banner_link','options'); ?>">
		<?php endif; ?>
			<p><?php the_field('sitewide_banner_text','options'); ?></p>
		<?php if( get_field('sitewide_banner_link','options') ): ?>
			</a>
		<?php endif; ?>
	</div>
<?php endif; ?>
<header class="<?php echo $listClass ?> <?php if( get_field('sitewide_banner_text','options') ): ?>banner<?php endif; ?>">
	<a href="<?php echo site_url(); ?>" id="logo"><h1><?php bloginfo( 'name' ); ?></h1></a>
	<nav class="main">
		<?php 
			wp_nav_menu( array(
			    'menu' => 'Main'
			) );
		?>
	</nav>
	<nav class="shop">
		<?php 
			wp_nav_menu( array(
			    'menu' => 'Store Menu'
			) );
		?>
	</nav>
</header>