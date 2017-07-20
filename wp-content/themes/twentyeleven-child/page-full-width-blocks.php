<?php
/*
Template Name: Full Width with Blocks
*/
get_header();
?>

		<div id="primary" class="full-width">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				    <?php get_template_part( 'content', 'blocks' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

        <!-- see footer.php for jQuery and CSS for video overlays -->

<?php get_footer(); ?>