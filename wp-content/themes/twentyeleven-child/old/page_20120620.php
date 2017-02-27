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

get_header();

if(!is_front_page()){
    echo '
    <div id="left-block">
        <div id="subnav">';
            $menuid = false;
            $parents = get_post_ancestors( $post->ID );
            /* Get the top Level page->ID count base 1, array base 0 so -1 */
	        $top_id = ($parents) ? $parents[count($parents)-1]: $post->ID;

            if($top_id==40){//what we do
                echo '<p class="parent-title">'.get_the_title(40).'</p>';
                $menuid = 5;
            } elseif($top_id==93){//training
                echo '<p class="parent-title">'.get_the_title(93).'</p>';
                $menuid = 6;
            } elseif($top_id==103){//results
                echo '<p class="parent-title">'.get_the_title(103).'</p>';
                $menuid = 7;
            } elseif($top_id==105){//continuous learning
                echo '<p class="parent-title">'.get_the_title(105).'</p>';
                $menuid = 8;
            } elseif(is_page && !is_front_page()){
                echo '<p class="parent-title">Home</p>';
                $menuid = 3;
            }
            if($menuid){
                wp_nav_menu( array( 'menu' => $menuid, 'container' => false ) );
            }
            echo '
        </div>
    </div>';
}
?>

		<div id="primary">
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
if(!is_front_page()){
    get_sidebar();
}?>
<?php get_footer(); ?>