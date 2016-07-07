<?php include(locate_template('variables.php')); ?>
<header class="<?php echo $listClass ?>">
	<a href="<?php site_url(); ?>" id="logo"><?php bloginfo( 'name' ); ?></a>
	<nav role="main">
		<?php 
			wp_nav_menu( array(
			    'menu' => 'Main'
			) );
		?>
	</nav>
</header>