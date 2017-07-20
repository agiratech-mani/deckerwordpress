<?php
/*
Template Name: Featured Press
*/
get_header();
?>

		<div id="primary" class="left-sidebar-only">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				    <?php get_template_part( 'content-press', 'page' );?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>