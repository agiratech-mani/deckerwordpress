<?php
/*
Template Name: Landing Page (Right Sidebar Only)
*/
get_header();
?>

		<div id="primary" class="right-sidebar-only">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				    <?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>