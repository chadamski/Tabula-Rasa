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
</header>