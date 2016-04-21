<?php 
	include(locate_template('variables.php'));
?>
<footer class="<?php echo $listClass ?>">
		<?php 
			wp_nav_menu( array(
			    'menu' => 'Footer Menu'
			) );
		?>
	</nav>
</footer>