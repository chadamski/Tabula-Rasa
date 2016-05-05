<?php 
	include(locate_template('variables.php'));
?>
<header class="<?php echo $listClass ?>">
	<a href="/" id="logo"><span>Company Name</span></a>
	<nav role="main">
		<?php 
			wp_nav_menu( array(
			    'menu' => 'Header Main'
			) );
		?>
	</nav>
</header>
<section id="hero">

</section>