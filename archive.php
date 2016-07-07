<?php get_header(); ?>
	<main role="main">
		<section>
			<h1><?php _e( 'Archives', 'Tablua Rasa' ); ?></h1>
			<?php get_template_part('loop'); ?>
		</section>
		<?php get_template_part('pagination'); ?>
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
