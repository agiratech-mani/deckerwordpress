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

				        if($post->ID==93){
				            echo '
				            <div id="programs">
                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell open">
                                        <a href="/training-formats-programs/open-classes/">
                                        <h2>Open-Enrollment<br />Classes</h2>
                                        Enroll in a communications training program for <strong>individuals</strong> that covers the key elements of the Decker Method&trade;
                                        </a>
                                    </div>
                                    <div class="cell group">
                                        <a href="/training-formats-programs/corporate-training-solutions/group-training/">
                                        <h2>Group Training</h2>
                                        Deliver customizable training programs for <strong>business groups</strong> that cover the key elements of the Decker Method&trade;
                                        </a>
                                    </div>
                                    <div class="cell match">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" alt="Still not sure?" /><br />
                                        <p>Use our interactive matching tool to determine the best program for you
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-green-grey.png" width="8" height="9" alt="." /></p>
                                        </a>
                                    </div>
                                </div>
                                <p class="bottom"></p>
                            </div>';
				        }
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