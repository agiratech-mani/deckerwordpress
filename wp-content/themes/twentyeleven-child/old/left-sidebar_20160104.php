<?php
if(!is_front_page() && !is_page_template( 'page-landing-page.php' )){
    echo '
    <div id="left-block">';

      if(!is_page_template( 'page-landing-page.php' )){
          echo '
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
            } elseif($top_id==105 || get_post_type($post->ID)=='product'){//continuous learning
                echo '<p class="parent-title">'.get_the_title(105).'</p>';
                $menuid = 8;
            } elseif((!is_front_page() && !is_page()) || $top_id==115){
	            echo '<p class="parent-title">'.get_the_title(115).'</p>';
	            $menuid = 33;
            } elseif(is_page(10969)){//training for Houston page
                echo '<p class="parent-title">'.get_the_title(93).'</p>';
                $menuid = 6;
            } else {//if(is_page && !is_front_page()){
                echo '<p class="parent-title">Home</p>';
                $menuid = 3;
	        }
            if($menuid){
                wp_nav_menu( array( 'menu' => $menuid, 'container' => false ) );
            }
            echo '
        </div>';
      }

		if((!is_front_page() && !is_page() && get_post_type($post->ID)!='product') || $post->ID==115){ // blog ?>
        <aside class="widget widget_search">
            <p class="subscribe left">
                <a href="http://feeds.feedburner.com/deckerblog" target="_blank"><img align="left" src="/wp-content/themes/twentyeleven-child/images/icon-rss2.png" width="24" height="24" alt="Decker Communications Blog RSS" /></a>
            </p>
            <p class="subscribe right">
                <a href="http://feeds.feedburner.com/deckerblog" target="_blank">Subscribe in a Reader</a>
            </p>
            <p class="subscribe clear"></p>

            <form Method="POST"  target='_newsub'  action="https://www.feedblitz.com/f/f.fbz?AddNewUserDirect">
                <input type="hidden" name="sub" value="52227">
                <input name="EMAIL" maxlength="64" type="text" value="" placeholder="Enter your email address">
                <input name="FEEDID" type="hidden" value="52227">
                <input name="PUBLISHER" type="hidden" value="491405">
                <input type="image" src="/wp-content/themes/twentyeleven-child/images/submit.jpg" width="36" height="18" alt="Go" />
            </form>
        </aside>
            <?php
		}
		if($post->ID==20){//about us
		    echo '
		    <div class="widgets simple video">
                '.do_shortcode('[wp_lightbox_prettyPhoto_video link="https://www.youtube.com/watch?v=zgpzhIPVRQU&amp;modestbranding&amp;amp;showinfo=0&amp;amp;theme=light&amp;amp;rel=0" source="/wp-content/uploads/2012/06/img_video_deckers.jpg" img_attributes="alt=\'image description\'"]').'
                <div class="textwidget">
                    <strong>Deckers on Decker</strong><br />
                    Ben and Bert talk about the Decker legacy and creating the communications experience.
                </div>
            </div>';
        } elseif($post->ID==40){//what we do


        //embedded iframe code for Osgood video
        //<iframe width="199" height="149" src="///www.youtube-nocookie.com/embed/-rvb135CmvI?modestbranding&amp;showinfo=0&amp;theme=light&amp;rel=0" frameborder="0" allowfullscreen></iframe>

        //Osgood video
        //'.do_shortcode('[wp_lightbox_flowplayer_video link="/wp-content/uploads/2012/07/flashvideo_osgood.flv" source="/wp-content/uploads/2012/07/img_video_blue_osgood.jpg" img_attributes="alt=\'Rick Osgood describes the Decker record and legacy\'"]').'

        //Brusseau video
        //'.do_shortcode('[wp_lightbox_flowplayer_video link="/wp-content/uploads/2012/07/flashvideo_brusseau.flv" source="/wp-content/uploads/2012/07/img_video_blue_brusseau.jpg" img_attributes="alt=\'Transforming Communications at Stryker\'"]').'
		    echo '
		    <div class="widgets simple video">
                '.do_shortcode('[wp_lightbox_prettyPhoto_video link="https://www.youtube.com/watch?v=-rvb135CmvI&amp;modestbranding&amp;amp;showinfo=0&amp;amp;theme=light&amp;amp;rel=0" description="Rick Osgood describes the Decker record and legacy" source="/wp-content/uploads/2012/07/img_video_blue_osgood.jpg" title="Rick Osgood describes the Decker record and legacy"]').'
                <div class="textwidget">
                    <strong>Decker Legacy</strong><br />
                    "The track record of Decker is extremely important. It\'s certainly the reason that we chose Decker."<br />
                    - Rick Osgood, Chairman, Pacific Growth Equities
                </div>
            </div>
            <div class="widgets simple video">
                    '.do_shortcode('[wp_lightbox_prettyPhoto_video link="https://www.youtube.com/watch?v=mjts35JNDDk&amp;modestbranding&amp;amp;showinfo=0&amp;amp;theme=light&amp;amp;rel=0" description="Transforming Communications at Stryker" source="/wp-content/uploads/2012/07/img_video_blue_brusseau.jpg" title="Transforming Communications at Stryker"]').'
                <div class="textwidget">
                    <strong>Transforming Communications</strong><br />
                    "I\'ve seen a personal transformation in our #1 rep...it\'s a very telling story of how powerful Decker is."<br />
                    - Seth Brusseau, West Regional Manager, Stryker
                </div>
            </div>';
        } elseif($post->ID==63){//The Decker Method
		    echo '
		    <div class="widgets simple video">
                '.do_shortcode('[wp_lightbox_prettyPhoto_video link="https://www.youtube.com/watch?v=ikQp_HSkjGQ&amp;modestbranding&amp;amp;showinfo=0&amp;amp;theme=light&amp;amp;rel=0" source="/wp-content/uploads/2012/07/img_video_blue_bert.jpg" img_attributes="alt=\'Coaching, Consulting and Feedback\'"]').'
                <div class="textwidget">
                    <strong>The 3x3 Rule</strong><br />
                    Bert Decker describes how to get continuous coaching for your communications skills.
                </div>
            </div>';
        } elseif($post->ID==103){//Results
		    echo '
		    <div class="widgets simple video">
                '.do_shortcode('[wp_lightbox_prettyPhoto_video link="https://www.youtube.com/watch?v=I6l5WCKj-ik&amp;modestbranding&amp;amp;showinfo=0&amp;amp;theme=light&amp;amp;rel=0" source="/wp-content/uploads/2012/07/img_video_blue_keim.jpg" img_attributes="alt=\'Improving Corporate Presentations\'"]').'
                <div class="textwidget">
                    <strong>Remarkable Change</strong><br />
                    "It gives people the level of confidence and presence like no other class I\'ve seen."<br />
                    - Katy Keim, Former EVP, Service Source
                </div>
            </div>';
        } elseif($post->ID==78){//Program Customization
		    echo '
		    <div class="widgets simple video">
                '.do_shortcode('[wp_lightbox_prettyPhoto_video link="https://www.youtube.com/watch?v=hBjD38d0JHw&amp;modestbranding&amp;amp;showinfo=0&amp;amp;theme=light&amp;amp;rel=0" source="/wp-content/uploads/2012/07/img_video_blue_nelson.jpg" img_attributes="alt=\'What is Unique about Decker Communications\'"]').'
                <div class="textwidget">
                    <strong>Communication is Essential</strong><br />
                    "People have said this is one of the best skills that they have had as employees of Wells Fargo Bank."<br />
                    - David Nelson, Senior Vice President, Wells Fargo
                </div>
            </div>';
        }

        if(is_page_template( 'page-landing-page.php' )){
            dynamic_sidebar( 'sidebar-1' );// press page uses same but further down sidebar
        }

        if((is_page() || get_post_type($post->ID)=='product')
         && $post->ID!=115 && $post->ID!=93 && $post->ID!=6 && $post->ID!=159
         && $post->ID!=99 && $post->ID!=101 && $post->ID!=176){//main training pages
           echo '
        <div id="sidebar-toolbox" class="left-widgets">
            <div class="aside-top"></div>
            <aside class="widget widget_text">
                <div class="textwidget">
                    <a href="/training-formats-programs/solution-matching-tool/">
                    <img class="toolbox-image" src="/wp-content/themes/twentyeleven-child/images/sidebar-which-training.png" width="136" height="81" alt="Communications Training, Speaker Training, Presentation Training, Sales Training, Personal Speech Coaching, Business Communications" title="Which Training?" /><br />

                        Use our interactive<br />
                        matching tool to<br />
                        determine the best<br />
                        program for you
                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-orange-grey.png" width="8" height="9" alt="Business Communications" />

                    </a>
                </div>
            </aside>
            <div class="aside-bottom"></div>
        </div>';
        }


        //if($post->ID==159) {//program feedback (Net Promoter)
            echo '
        <div class="left-widgets">';
            if ( is_active_sidebar( 'sidebar-2' ) ) :
                dynamic_sidebar( 'sidebar-2' );
            endif;
            echo '
        </div>';
        //}



        if(!is_front_page() && get_post_type($post->ID)!='product' && (!is_page() || $post->ID==115)) {//blog stuff

            echo '
        <div class="widgets simple">
            <h3>Decker Blog Contributors</h3>
            <div class="textwidget">
            ';
            $contributors['administrator'] = get_users('include=6');
            $contributors['editor'] = get_users('role=editor');
            $contributors['author'] = get_users('role=author');

            $link  = '';
            $class = '';
            $i = 1;
            foreach($contributors as $role => $contributor){
                foreach($contributor as $info){
                    if($info->ID!=1 && $info->ID!=11) {
                        if($i/3 == intval($i/3)){
                            $class = 'end';
                        }

                        elseif ((($i-1)/3 == intval(($i-1)/3)) || (($i-1)/3 == '0')) {
                            $class= 'start';

                        } else {
                            $class = '';
                        }
                        if($role=='editor' || $info->ID==6 || $info->ID==14){//Bert Decker, John Tarman
                            $link = 'leadership/';
                        } else {
                            $link = 'our-team/';
                        }
                        if($info->ID==8){
                            $info->user_nicename = 'jennifer-mcmahon';
                        }
                        echo '
                        <div class="contributors '.$class.'">
                            <a href="/about-us/'.$link.'#'.$info->user_nicename.'">
                            '.get_avatar( $info->ID, $size = '52').'
                            <br />'.$info->display_name.'</a>
                        </div>';
                        $i++;
                    }
                }
            }
                echo '
            </div>
        </div>

        <div class="widgets simple twitter">
            <div class="twitter-left">
                <img src="/wp-content/themes/twentyeleven-child/images/twitter-follow.jpg" alt="Follow DeckerComm on Twitter for Communications Tips" width="86" height="70" />
            </div>
            <div class="twitter-right">
                <a href="http://twitter.com/DeckerBen" target="_blank">@deckerben</a><br />
                <a href="http://twitter.com/KellyDecker" target="_blank">@kellydecker</a><br />
                <a href="http://twitter.com/BertDecker" target="_blank">@bertdecker</a><br />
                <a href="http://twitter.com/Deckercomm" target="_blank">@deckercomm</a>
            </div>
        </div>
            ';
        }

        if($post->ID==7544){//press page
            dynamic_sidebar( 'sidebar-1' );
        }

        echo '
    </div>';


}
?>