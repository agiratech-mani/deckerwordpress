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

				        } elseif($post->ID==93){//training overview
				            echo '
				            <div id="programs">
                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell open">
                                        <a href="/training-formats-programs/open-classes/">
                                        <img src="/wp-content/uploads/2012/06/training-open.png" width="97" height="113" alt="Open Enrollment" />
                                        <h2>'.get_post_meta($post->ID, 'open_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'open_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell group">
                                        <a href="/training-formats-programs/corporate-training-solutions/group-training/">
                                        <img src="/wp-content/uploads/2012/06/training-group.png" width="97" height="113" alt="Group Training" />
                                        <h2>'.get_post_meta($post->ID, 'group_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'group_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell exec">
                                        <a href="/training-formats-programs/corporate-training-solutions/executive-coaching/">
                                        <img src="/wp-content/uploads/2012/06/training-coaching.png" width="85" height="83" alt="Executive Coaching" />
                                        <h2>'.get_post_meta($post->ID, 'exec_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'exec_text', true).'</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="middle three-across nextrow">
                                    <div class="cell keynote">
                                        <a href="/training-formats-programs/corporate-training-solutions/speaking-engagements/">
                                        <img src="/wp-content/uploads/2012/06/training-keynote.png" width="60" height="65" alt="Keynotes and Speaking Engagements" />
                                        <h2>'.get_post_meta($post->ID, 'keynote_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'keynote_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell custom">
                                        <a href="/what-we-do/program-customization/">
                                        <img src="/wp-content/uploads/2012/06/training-custom.png" width="66" height="65" alt="Program Customization" />
                                        <h2>'.get_post_meta($post->ID, 'custom_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'custom_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell match">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" alt="Still not sure?" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="." /></p>
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
                                        <p>'.get_post_meta($post->ID, 'followup_text', true).'</p>
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/bkgrd-learning-followup.png" width="61" height="73" alt="Follow-up" />
                                        </a>
                                    </div>
                                    <div class="cell self">
                                        <a href="/continuous-learning/self-directed-learning-resources/">
                                        <h2>'.get_post_meta($post->ID, 'self_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'self_text', true).'</p>
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/bkgrd-learning-self.png" width="71" height="76" alt="Self-directed Resources" />
                                        </a>
                                    </div>
                                    <div class="cell reading">
                                        <a href="/continuous-learning/recommended-reading/">
                                        <h2>'.get_post_meta($post->ID, 'reading_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'reading_text', true).'</p>
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/bkgrd-learning-reading.png" width="75" height="57" alt="Recommended Reading" />
                                        </a>
                                    </div>
                                </div>
                                <p class="bottom"></p>
                            </div>';
				        } elseif($post->ID==101){//corporate training
				            echo '
				            <div id="programs">
                                <div class="middle four-across">
                                    <div class="cell group">
                                        <a href="/training-formats-programs/corporate-training-solutions/group-training/">
                                        <img src="/wp-content/uploads/2012/06/training-group.png" width="97" height="113" alt="Group Training" />
                                        <h2>'.get_post_meta($post->ID, 'group_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'group_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell exec">
                                        <a href="/training-formats-programs/corporate-training-solutions/executive-coaching/">
                                        <img src="/wp-content/uploads/2012/06/training-coaching.png" width="85" height="83" alt="Executive Coaching" />
                                        <h2>'.get_post_meta($post->ID, 'exec_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'exec_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell keynote">
                                        <a href="/training-formats-programs/corporate-training-solutions/speaking-engagements/">
                                        <img src="/wp-content/uploads/2012/06/training-keynote.png" width="60" height="65" alt="Keynotes and Speaking Engagements" />
                                        <h2>'.get_post_meta($post->ID, 'keynote_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'keynote_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell custom">
                                        <a href="/what-we-do/program-customization/">
                                        <img src="/wp-content/uploads/2012/06/training-custom.png" width="66" height="65" alt="Program Customization" />
                                        <h2>'.get_post_meta($post->ID, 'custom_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'custom_text', true).'</p>
                                        </a>
                                    </div>
                                </div>

                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell match full">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure-oneline.png" width="322" height="17" alt="Still not sure?" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'&nbsp;
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="." /></p>
                                        </a>
                                    </div>
                                </div>
                                <p class="bottom"></p>
                            </div>
                            ';
				        } elseif($post->ID==99){//open classes
				            echo '
				            <div id="programs">
                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell two-thirds">
                                        <h2>'.get_post_meta($post->ID, 'explore_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'explore_text', true).'</p>
                                    </div>
                                    <div class="cell match">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" alt="Still not sure?" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="." /></p>
                                        </a>
                                    </div>
                                </div>
                                <p class="bottom"></p>
                            </div>

                            <p>'.get_post_meta($post->ID, 'after', true).'</p>
                            ';
				        } elseif($post->ID==176){//group training
				            echo '
				            <div id="programs">
                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell two-thirds">
                                        <h2>'.get_post_meta($post->ID, 'explore_title', true).'</h2>
                                        <p class="left">'.get_post_meta($post->ID, 'explore_text_left', true).'</p>
                                        <p class="right">'.get_post_meta($post->ID, 'explore_text_right', true).'</p>
                                    </div>
                                    <div class="cell match">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" alt="Still not sure?" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="." /></p>
                                        </a>
                                    </div>
                                </div>
                                <p class="bottom"></p>
                            </div>
                            ';
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