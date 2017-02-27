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
if(!is_front_page()){
    include_once "left-sidebar.php";
}
?>

		<div id="primary" <?php echo $template_class;?>>
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				    <?php
				    if(is_front_page()){?>
				        <div id="home-block">
				            <img src="/wp-content/themes/twentyeleven-child/images/home-placeholder.jpg" alt="." width="735" height="725" />
				        </div>
				        <div id="home-right">
				            <?php the_content();?>
				        </div>

				        <?php
				    } else {
				        get_template_part( 'content', 'page' );
				    }
				    if($post->ID==6){
				        include_once "solution-matching.php";
				    }
				    ?>


					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php
if(!is_front_page() && !is_page_template( 'page-left-sidebar-only.php' )){
    get_sidebar();
}?>
<?php get_footer(); ?>