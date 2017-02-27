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

if(is_page_template( 'page-left-sidebar-only.php' )){//locations page
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

                        



				            <?php
                            if(wpmd_is_phone() || $_REQUEST['phone']==1){   
                                echo '
                                <header class="entry-header">
                                    <h1>Which Communications Solution<br />is Right For You?</h1>
                                </header>';
                            } else {
//                                echo do_shortcode('[portfolio_slideshow id=8341 target=current]');
                                echo do_shortcode('[portfolio_slideshow id=8341]');
                            }

				            $link = '';
				            $linkend = '';
				            $isiPad = strstr($_SERVER['HTTP_USER_AGENT'],'iPad');

				            if(!$isiPad){
				                $link = '<a href="#home-solution-matching">';
				                $linkend = '</a>' ;
				            }
				            ?>
				            <div id="home-solution-matching">
				                <div class="solution-match top">
                                    <p class="match" id="match-open">
                                        <?php echo $link;?><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-open.png" width="229" height="127" alt="Indivudual, Communications Training, Presentation, Public Speaking, Speaker, Sales Training, Engineering Training, Messaging, Storytelling, Influence, Workshop, Class, Training, Professional Development" title="Indivudual, Communications Training, Presentation, Public Speaking, Speaker, Sales Training, Engineering Training, Messaging, Storytelling, Influence, Workshop, Class, Training, Professional Development" /><?php echo $linkend;?>
                                    </p>
                                    <p class="match" id="match-group">
                                        <?php echo $link;?><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-group.png" width="229" height="127" alt="Group Training, Team Training, Sales Training, Communications Training, Messaging, Storytelling, Workshops, Customized Training, Corporate Group Training, Professional Development" title="Group Training, Team Training, Sales Training, Communications Training, Messaging, Storytelling, Workshops, Customized Training, Corporate Group Training, Professional Development" /><?php echo $linkend;?>
                                    </p>
                                    <p class="match end" id="match-coaching">
                                        <?php echo $link;?><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-coaching.png" width="228" height="127" alt="Executive Coaching, Executive Training, Presentation, Coaching, Executive Presence, Messaging, Storytelling, Professional Development" title="Executive Coaching, Executive Training, Presentation, Coaching, Executive Presence, Messaging, Storytelling, Professional Development" /><?php echo $linkend;?>
                                    </p>
                                </div>
                                <div class="solution-match bottom">
                                    <p class="match" id="match-keynote">
                                        <?php echo $link;?><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-keynotes.png" width="229" height="127" alt="Keynotes, Public Sepaking, Public Speaker, Kickoff, Speaker, Business Communication, Messaging, Delivery, Events" title="Keynotes, Public Sepaking, Public Speaker, Kickoff, Speaker, Business Communication, Messaging, Delivery, Events" /><?php echo $linkend;?>
                                    </p>
                                    <p class="match" id="match-customization">
                                        <?php echo $link;?><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-customization.png" width="229" height="127" alt="Customized Communications Training Solutions,  Presentation, Kickoff, Workshop, Sales, Coaching, Speaker, Keynotes, Custom, Class, Training, Professional Development" title="Customized Communications Training Solutions,  Presentation, Kickoff, Workshop, Sales, Coaching, Speaker, Keynotes, Custom, Class, Training, Professional Development" /><?php echo $linkend;?>
                                    </p>
                                    <p class="match end">
                                        <a href="/training-formats-programs/solution-matching-tool/"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-tool.png" width="228" height="127" alt="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" title="Still not sure?" /></a>
                                    </p>
                                </div>
				            </div>
				        </div>
                        <?php
                        if(wpmd_is_phone() || $_REQUEST['phone']==1){
                            //nothing yet
                        } else {?>
				        <div id="home-right">
				            <div class="home-content">
				                <?php the_content();?>
				            </div>

				            <div class="home-register">
				                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
	       	                    <?php endif; ?>

	       	                    <?php
	       	                    if(is_front_page()){
	       	                        if($_GET['nomtest']==1){
	       	                            echo '
                                        <style type="text/css">.gform_wrapper {margin:0 !important;}#home-right #text-text-11 .textwidget a {display:none;}</style>
                                        <div class="aside-top text-11"></div>
                                        <aside id="text-text-11" class="widget widget_text">
                                            <div class="textwidget">
                                                '.do_shortcode('[gravityform id="12" name="Nominate a Top 10 Communicator for 2014 " ajax="true"]').'
                                            </div>
                                        </aside>
                                        <div class="aside-bottom text-11"></div>';


	       	                        } else {
	       	                            dynamic_sidebar( 'sidebar-7' );
                                    }
                                }?>
		                    </div>
				        </div>
				        <?php
                        }
				    } else {
				        if($post->ID==7544){
				            get_template_part( 'content-press', 'page' );

				        } elseif($post->ID!=115){//blog
				            get_template_part( 'content', 'page' );
				        }


				        if($post->ID==115){
                            // make the blog page behave like a home page showing the most recent posts
                            /*$tmp_post = $post;
                            $args = array( 'numberposts' => 5);
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) : setup_postdata($post);
                                get_template_part( 'content', get_post_format() );
                            endforeach;
                            //we now return to our normally scheduled programming
                            $post = $tmp_post;*/
                            //moved to page-blog.php

				        } elseif($post->ID==93){//training overview
				            echo '
				            <div id="programs">
                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell open">
                                        <a href="/training-formats-programs/open-classes/">
                                        <img src="/wp-content/uploads/2012/06/training-open.png" width="97" height="113" alt="Indivudual, Communications Training, Presentation, Public Speaking, Speaker, Sales Training, Engineering Training, Messaging, Storytelling, Influence, Workshop, Class, Training" title="Indivudual, Communications Training, Presentation, Public Speaking, Speaker, Sales Training, Engineering Training, Messaging, Storytelling, Influence, Workshop, Class, Training" />
                                        <h2>'.get_post_meta($post->ID, 'open_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'open_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell group">
                                        <a href="/training-formats-programs/corporate-training-solutions/group-training/">
                                        <img src="/wp-content/uploads/2012/06/training-group.png" width="97" height="113" alt="Group Training, Messaging, Storytelling, Presentations, Kickoff, Sales, Team, Corporate Training, Public Speaking Class, Workshop, Seminar, Professional Development" title="Group Training, Messaging, Storytelling, Presentations, Kickoff, Sales, Team, Corporate Training, Public Speaking Class, Workshop, Seminar, Professional Development" />
                                        <h2>'.get_post_meta($post->ID, 'group_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'group_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell exec">
                                        <a href="/training-formats-programs/corporate-training-solutions/executive-coaching/">
                                        <img src="/wp-content/uploads/2012/06/training-coaching.png" width="85" height="83" alt="Executive Coaching, Executive Training, Presentation, Coaching, Executive Presence, Messaging, Storytelling, Professional Development" title="Executive Coaching, Executive Training, Presentation, Coaching, Executive Presence, Messaging, Storytelling, Professional Development" />
                                        <h2>'.get_post_meta($post->ID, 'exec_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'exec_text', true).'</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="middle three-across nextrow">
                                    <div class="cell keynote">
                                        <a href="/training-formats-programs/corporate-training-solutions/speaking-engagements/">
                                        <img src="/wp-content/uploads/2012/06/training-keynote.png" width="60" height="65" alt="Keynotes, Public Sepaking, Public Speaker, Kickoff, Speaker, Business Communication, Messaging, Delivery" title="Keynotes, Public Sepaking, Public Speaker, Kickoff, Speaker, Business Communication, Messaging, Delivery" />
                                        <h2>'.get_post_meta($post->ID, 'keynote_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'keynote_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell custom">
                                        <a href="/what-we-do/program-customization/">
                                        <img src="/wp-content/uploads/2012/06/training-custom.png" width="66" height="65" alt="Customized Communications Training Solutions,  Presentation, Kickoff, Workshop, Sales, Coaching, Speaker, Keynotes, Professional Development" title="Customized Communications Training Solutions,  Presentation, Kickoff, Workshop, Sales, Coaching, Speaker, Keynotes, Professional Development" />
                                        <h2>'.get_post_meta($post->ID, 'custom_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'custom_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell match">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" alt="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" alt="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" title="Still not sure? Use our interactive matching tool." /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="Better Messaging" /></p>
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
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/bkgrd-learning-followup.png" width="61" height="73" alt="Follow-up, Communications Help, Training, Presentation, Speaker, Public Speaking, Coaching, Professional Development" />
                                        </a>
                                    </div>
                                    <div class="cell self">
                                        <a href="/continuous-learning/self-directed-learning-resources/">
                                        <h2>'.get_post_meta($post->ID, 'self_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'self_text', true).'</p>
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/bkgrd-learning-self.png" width="71" height="76" alt="Self-directed Resources, Communications Resource, Business Communications, Business Communication Resources, Better Speaker, Presentation Resource" />
                                        </a>
                                    </div>
                                    <div class="cell reading">
                                        <a href="/continuous-learning/recommended-reading/">
                                        <h2>'.get_post_meta($post->ID, 'reading_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'reading_text', true).'</p>
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/bkgrd-learning-reading.png" width="75" height="57" alt="Recommended Reading, Communications Resources, Messaging, Public Speaking, Presence, Resources" />
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
                                        <img src="/wp-content/uploads/2012/06/training-group-small.png" width="78" height="90" alt="Group Training, Messaging, Storytelling, Presentations, Kickoff, Sales, Team, Corporate Training, Public Speaking Class, Workshop, Seminar, Professional Development" />
                                        <h2>'.get_post_meta($post->ID, 'group_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'group_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell exec">
                                        <a href="/training-formats-programs/corporate-training-solutions/executive-coaching/">
                                        <img src="/wp-content/uploads/2012/06/training-coaching.png" width="85" height="83" alt="Executive Coaching, Executive Training, Presentation, Coaching, Executive Presence, Messaging, Storytelling, Professional Development" />
                                        <h2>'.get_post_meta($post->ID, 'exec_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'exec_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell keynote">
                                        <a href="/training-formats-programs/corporate-training-solutions/speaking-engagements/">
                                        <img src="/wp-content/uploads/2012/06/training-keynote.png" width="60" height="65" alt="Keynotes, Public Sepaking, Public Speaker, Kickoff, Speaker, Business Communication, Messaging, Delivery" />
                                        <h2>'.get_post_meta($post->ID, 'keynote_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'keynote_text', true).'</p>
                                        </a>
                                    </div>
                                    <div class="cell custom">
                                        <a href="/what-we-do/program-customization/">
                                        <img src="/wp-content/uploads/2012/06/training-custom.png" width="66" height="65" alt="Customized Communications Training Solutions,  Presentation, Kickoff, Workshop, Sales, Coaching, Speaker, Keynotes, Custom, Class, Training" />
                                        <h2>'.get_post_meta($post->ID, 'custom_title', true).'</h2>
                                        <p>'.get_post_meta($post->ID, 'custom_text', true).'</p>
                                        </a>
                                    </div>
                                </div>

                                <p class="top"></p>
                                <div class="middle three-across">
                                    <div class="cell match full">
                                        <a href="/training-formats-programs/solution-matching-tool/">
                                        <img src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure-oneline.png" width="322" height="17" title="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" alt="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'&nbsp;
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="Better Messaging" title="Better Messaging" /></p>
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
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" title="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" alt="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="Better Presentations" /></p>
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
                                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" title="Still not sure?" alt="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" /><br />
                                        <p>'.get_post_meta($post->ID, 'match_text', true).'
                                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="Better Communications" /></p>
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
				    } elseif($post->ID==24){
				        //include_once "contact-form.php";
				        // replaced with Gravity form + Salesforce API
				    }
				    ?>


					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php
if(is_front_page()){?>
<script type="text/javascript">
$(document).ready(function() {
    var isiPad = navigator.userAgent.match(/iPad/i) != null;

    if(isiPad) {
        var count_open = 0;
        var count_group = 0;
        var count_coaching = 0;
        var count_keynote = 0;
        var count_customization = 0;

        $('#match-open').click(function(event) {
            count_open +=1;
            if(count_open==1){
                $(this).html('<a href="<?php echo get_permalink(99);?>"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-open-more.png" width="229" height="127" alt="Indivudual, Communications Training, Presentation, Public Speaking, Speaker, Sales Training, Engineering Training, Messaging, Storytelling, Influence, Workshop, Class, Training, Professional Development" /></a>');
            }
        });
        $('#match-group').click(function(event) {
            count_group +=1;
            if(count_group==1){
                $(this).html('<a href="<?php echo get_permalink(176);?>"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-group-more.png" width="229" height="127" alt="Group Training, Team Training, Sales Training, Communications Training, Messaging, Storytelling, Workshops, Customized Training, Corporate Group Training, Professional Development" /></a>');
            }
        });
        $('#match-coaching').click(function(event) {
            count_coaching +=1;
            if(count_coaching==1){
                $(this).html('<a href="<?php echo get_permalink(178);?>"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-coaching-more.png" width="228" height="127" alt="Executive Coaching, Executive Training, Executive Communications, Keynote" /></a>');
            }
        });
        $('#match-keynote').click(function(event) {
            count_keynote +=1;
            if(count_keynote==1){
                $(this).html('<a href="<?php echo get_permalink(180);?>"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-keynotes-more.png" width="229" height="127" alt="Keynote Speakers, Keynote Preparation, Keynote Presentation, Keynote Coaching, Business Meeting" /></a>');
            }
        });
        $('#match-customization').click(function(event) {
            count_customization +=1;
            if(count_customization==1){
                $(this).html('<a href="<?php echo get_permalink(78);?>"><img src="/wp-content/themes/twentyeleven-child/images/solution-matching-customization-more.png" width="229" height="127" alt="Customized Communications Training Solutions - Presentation, Kickoff, Workshop, Sales, Coaching, Speaker, Keynotes & More" /></a>');
            }
        });
    } else { //not an ipad
        var image_open = $('#match-open img').attr('src');
        $('#match-open').mouseenter(function() {
                $('#match-open a').attr('href',"<?php echo get_permalink(99);?>");
                $('#match-open img').attr('src',"/wp-content/themes/twentyeleven-child/images/solution-matching-open-more.png");
            }).mouseleave(function(){
                $('#match-open a').attr('href',"#");
                $('#match-open img').attr('src',image_open);
            });

        var image_group = $('#match-group img').attr('src');
        $('#match-group').mouseenter(function() {
                $('#match-group a').attr('href',"<?php echo get_permalink(176);?>");
                $('#match-group img').attr('src',"/wp-content/themes/twentyeleven-child/images/solution-matching-group-more.png");
            }).mouseleave(function(){
                $('#match-group a').attr('href',"#");
                $('#match-group img').attr('src',image_group);
            });

        var image_coaching = $('#match-coaching img').attr('src');
        $('#match-coaching').mouseenter(function() {
                $('#match-coaching a').attr('href',"<?php echo get_permalink(178);?>");
                $('#match-coaching img').attr('src',"/wp-content/themes/twentyeleven-child/images/solution-matching-coaching-more.png");
            }).mouseleave(function(){
                $('#match-coaching a').attr('href',"#");
                $('#match-coaching img').attr('src',image_coaching);
            });

        var image_keynote = $('#match-keynote img').attr('src');
        $('#match-keynote').mouseenter(function() {
                $('#match-keynote a').attr('href',"<?php echo get_permalink(180);?>");
                $('#match-keynote img').attr('src',"/wp-content/themes/twentyeleven-child/images/solution-matching-keynotes-more.png");
            }).mouseleave(function(){
                $('#match-keynote a').attr('href',"#");
                $('#match-keynote img').attr('src',image_keynote);
            });

        var image_customization = $('#match-customization img').attr('src');
        $('#match-customization').mouseenter(function() {
                $('#match-customization a').attr('href',"<?php echo get_permalink(78);?>");
                $('#match-customization img').attr('src',"/wp-content/themes/twentyeleven-child/images/solution-matching-customization-more.png");
            }).mouseleave(function(){
                $('#match-customization a').attr('href',"#");
                $('#match-customization img').attr('src',image_customization);
            });
    }
});
</script>
    <?php
}?>
<?php get_footer(); ?>