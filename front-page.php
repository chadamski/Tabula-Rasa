<?php
	get_header(); ?>
	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( 'Latest Posts', 'Tablua Rasa' ); ?></h1>

			<?php get_template_part('loop'); ?>


		</section>
		<!-- /section -->
	</main>
	<?php get_footer(); 
?>