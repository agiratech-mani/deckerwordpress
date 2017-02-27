<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

if(is_page_template( 'page-left-sidebar-only.php' ) ){//locations page
    $template_class = 'class="left-sidebar-only"';
} else {
    $template_class = '';
}

get_header();
?>

		<div id="primary" <?php echo $template_class;?>>
			<div id="content" role="main">

				<?php
				// get most recent Post info
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'cat' => '-1531', // don't show press posts in blog
                    'posts_per_page' => 5,
                    'paged' => $paged
                );
                query_posts($args);

                if (have_posts()) : ?>

                <?php $i=0; while (have_posts()) : the_post(); $i++;

                    //get_template_part( 'content', get_post_format() );
                    if($i==1){
                        get_template_part( 'content', 'blog-full');
                    } else {
                        get_template_part( 'content', 'blog');
                    }

    		    endwhile; ?>

                <?php twentyeleven_content_nav( 'nav-below' ); ?>

            <?php endif; ?>
            <?php
            // Reset Query
            wp_reset_query();?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>