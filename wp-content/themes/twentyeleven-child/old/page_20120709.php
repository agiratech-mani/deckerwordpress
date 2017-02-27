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

				<?php while ( have_posts() ) : the_post(); ?>

				    <?php
				    if(is_front_page()){?>
				        <div id="home-block">
				            <?php echo do_shortcode('[portfolio_slideshow id=3834 target=current]');?>
				            <div id="home-solution-matching">
				                <div class="solution-match top">
                                    <p class="match" id="match-open">
                                        <img src="/wp-content/themes/twentyeleven-child/images/solution-matching-open.png" width="229" height="127" alt="Open Enrollment" />
                                    </p>
                                    <p class="match" id="match-group">
                                        <img src="/wp-content/themes/twentyeleven-child/images/solution-matching-group.png" width="229" height="127" alt="Group Training" />
                                    </p>
                                    <p class="match end" id="match-coaching">
                                        <img src="/wp-content/themes/twentyeleven-child/images/solution-matching-coaching.png" width="228" height="127" alt="Executive Coaching" />
                                    </p>
                                </div>
                                <div class="solution-match bottom">
                                    <p class="match" id="match-keynote">
                                        <img src="/wp-content/themes/twentyeleven-child/images/solution-matching-keynotes.png" width="229" height="127" alt="Keynotes and Events" />
                                    </p>
                                    <p class="match" id="match-customization">
                                        <img src="/wp-content/themes/twentyeleven-child/images/solution-matching-customization.png" width="229" height="127" alt="Program Customization" />
                                    </p>
                                    <p class="match end">
                                        <a href="/training-formats-programs/solution-matching-tool/"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-tool.png" width="228" height="127" alt="Solution Matching Tool" /></a>
                                    </p>
                                </div>
				            </div>
				        </div>
				        <div id="home-right">
				            <div class="home-content">
				                <?php the_content();?>
				            </div>

				            <div class="home-register">
				                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
	       	                    <?php endif; ?>
		                    </div>

				        </div>

				        <?php
				    } else {
				        if($post->ID!=115){//blog
				            get_template_part( 'content', 'page' );
				        }


				        if($post->ID==115){
                            // make the blog page behave like a home page showing the most recent posts
                            $tmp_post = $post;
                            $args = array( 'numberposts' => 5);
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) : setup_postdata($post);
                                get_template_part( 'content', get_post_format() );
                            endforeach;
                            //we now return to our normally scheduled programming
                            $post = $tmp_post;

				        } elseif($post->ID==93){
				            echo '
				            <div id="programs">
                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell open">
                                        <a href="/training-formats-programs/open-classes/">
                                        <h2>'.get_post_meta($post->ID, 'open_title', true).'</h2>
                                        '.get_post_meta($post->ID, 'open_text', true).'
                                        </a>
                                    </div>
                                    <div class="cell group">
                                        <a href="/training-formats-programs/corporate-training-solutions/group-training/">
                                        <h2>'.get_post_meta($post->ID, 'group_title', true).'</h2>
                                        '.get_post_meta($post->ID, 'group_text', true).'
                                        </a>
                                    </div>
                                    <div class="cell match">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" alt="Still not sure?" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-green-grey.png" width="8" height="9" alt="." /></p>
                                        </a>
                                    </div>
                                </div>
                                <p class="bottom"></p>
                            </div>';
				        } elseif($post->ID==105){//continuous learning
				            echo '
				            <div id="programs">
                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell followup">
                                        <a href="/continuous-learning/follow-up-training/">
                                        <h2>'.get_post_meta($post->ID, 'followup_title', true).'</h2>
                                        '.get_post_meta($post->ID, 'followup_text', true).'
                                        </a>
                                    </div>
                                    <div class="cell self">
                                        <a href="/continuous-learning/self-directed-learning-resources/">
                                        <h2>'.get_post_meta($post->ID, 'self_title', true).'</h2>
                                        '.get_post_meta($post->ID, 'self_text', true).'
                                        </a>
                                    </div>
                                    <div class="cell reading">
                                        <a href="/continuous-learning/recommended-reading/">
                                        <h2>'.get_post_meta($post->ID, 'reading_title', true).'</h2>
                                        '.get_post_meta($post->ID, 'reading_text', true).'
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
if(is_front_page()){?>
<script type="text/javascript">
$(function( ){
    var count_open = 0;
    var count_group = 0;
    var count_coaching = 0;
    var count_keynote = 0;
    var count_customization = 0;

    $('#match-open').click(function(event) {
        count_open +=1;
        if(count_open==1){
            //var original = $(this).html().split('"')[1].split('.png')[0];
            //$(this).html('<a href="/training-formats-programs/open-classes/"><img src="'+original+'-more.png" height="127" /></a>');
            $(this).html('<a href="/training-formats-programs/open-classes/"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-open-more.png" width="229" height="127" alt="Open Enrollment" /></a>');
        }
    });
    $('#match-group').click(function(event) {
        count_group +=1;
        if(count_group==1){
            $(this).html('<a href="/training-formats-programs/corporate-training-solutions/group-training/"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-group-more.png" width="229" height="127" alt="Group Training" /></a>');
        }
    });
    $('#match-coaching').click(function(event) {
        count_coaching +=1;
        if(count_coaching==1){
            $(this).html('<a href="/training-formats-programs/corporate-training-solutions/executive-coaching/"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-coaching-more.png" width="228" height="127" alt="Executive Coaching" /></a>');
        }
    });
    $('#match-keynote').click(function(event) {
        count_keynote +=1;
        if(count_keynote==1){
            $(this).html('<a href="/training-formats-programs/corporate-training-solutions/keynotes-events/"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-keynotes-more.png" width="229" height="127" alt="Keynotes and Events" /></a>');
        }
    });
    $('#match-customization').click(function(event) {
        count_customization +=1;
        if(count_customization==1){
            $(this).html('<a href="/what-we-do/program-customization/"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-customization-more.png" width="229" height="127" alt="Program Customization" /></a>');
        }
    });
});
</script>
    <?php
}?>
<?php get_footer(); ?>