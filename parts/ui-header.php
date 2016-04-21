<?php 
	include(locate_template('variables.php'));
?>
<header class="<?php echo $listClass ?>">
	<a href="/" id="logo"><?php echo file_get_contents($templateDirectory.'/assets/images/ui/logo.svg'); ?><span>Company Name</span></a>
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