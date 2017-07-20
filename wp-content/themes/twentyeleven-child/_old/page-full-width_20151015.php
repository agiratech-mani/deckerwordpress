<?php
/*
Template Name: Full Width
*/
get_header();
?>

		<div id="primary" class="full-width">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				    <?php
                    if(is_page(10908)){
                        get_template_part( 'content', 'blocks' );
                    } else {
                        get_template_part( 'content', 'page' );
                    } ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

        <!-- see footer.php for jQuery and CSS for video overlays -->

<?php get_footer(); ?>