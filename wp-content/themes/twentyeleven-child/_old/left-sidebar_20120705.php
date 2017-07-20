<?php
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
            } elseif($top_id==105 || get_post_type($post->ID)=='product'){//continuous learning
                echo '<p class="parent-title">'.get_the_title(105).'</p>';
                $menuid = 8;
            } elseif((!is_front_page() && !is_page()) || $top_id==115){
	            echo '<p class="parent-title">'.get_the_title(115).'</p>';
	            $menuid = 33;
            } else {//if(is_page && !is_front_page()){
                echo '<p class="parent-title">Home</p>';
                $menuid = 3;
	        }
            if($menuid){
                wp_nav_menu( array( 'menu' => $menuid, 'container' => false ) );
            }
            echo '
        </div>';

		if((!is_front_page() && !is_page() && get_post_type($post->ID)!='product') || $post->ID==115){ // blog ?>
        <aside class="widget widget_search">
            <p class="subscribe left">
                <a href="http://feeds.feedburner.com/deckerblog" target="_blank"><img align="left" src="/wp-content/themes/twentyeleven-child/images/icon-rss2.png" width="24" height="24" alt="RSS" /></a>
            </p>
            <p class="subscribe right">
                <a href="http://feeds.feedburner.com/deckerblog" target="_blank">Subscribe in a Reader</a>
            </p>
            <p class="subscribe clear"></p>

            <form Method="POST"  target='_newsub'  action="http://www.feedblitz.com/f/f.fbz?AddNewUserDirect">
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
                '.do_shortcode('[wp_lightbox_flowplayer_video link="http://decker.com.s149383.gridserver.com/wp-content/uploads/2012/06/flashvideo_decker.flv" source="http://decker.com.s149383.gridserver.com/wp-content/uploads/2012/06/img_video_deckers.jpg"]').'
                <div class="textwidget">
                    <strong>Deckers on Decker</strong><br />
                    Ben and Bert talk about the Decker legacy and creating the communications experience.
                </div>
            </div>';
        }

        if((is_page() || get_post_type($post->ID)=='product')
         && $post->ID!=115 && $post->ID!=93 && $post->ID!=6 && $post->ID!=159){
           echo '
        <div id="sidebar-toolbox" class="left-widgets">
            <div class="aside-top"></div>
            <aside class="widget widget_text">
                <div class="textwidget">
                    <a href="/training-formats-programs/solution-matching-tool/">
                    <img class="toolbox-image" src="/wp-content/themes/twentyeleven-child/images/sidebar-which-training.png" width="136" height="62" alt="Which training?" /><br />

                        Use our interactive<br />
                        matching tool to<br />
                        determine the best<br />
                        program for you
                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-orange-grey.png" width="8" height="9" alt="." />

                    </a>
                </div>
            </aside>
            <div class="aside-bottom"></div>
        </div>';
        }
        if($post->ID==159) {//program feedback
            echo '
        <div class="left-widgets">
            <aside class="widget widget_text">
                <div class="textwidget">
                    <img src="/wp-content/uploads/2012/07/NPS_logo.png" width="140" alt="Net Promoter" />
                    <p>Net Promoter is a discipline by which companies profitably grow by focusing on their customers.<br />
                    <a href="http://www.netpromoter.com/" target="_blank">Learn more</a>
                    </p>

                    <p><strong>We pride ourselves on our Net Promoter Score (NPS):<br />
                    90.8%</strong></p>

                    <p>We ask all program participants to rate the following statement on a scale from 1 (strongly disagree) through 10 (strongly agree):</p>

                    <p><em>I\'m going to recommend the Decker Program to others.</em></p>

                    <p>An overwhelming majority provide a rating of 9 or 10, boosting our NPS above 90% - and far above customer-centric companies like Amazon (73%), Apple (66%) and Southwest (51%).</p>

                    <p><a href="/wp-content/uploads/2012/07/decker_net-promoter.pdf" target="_blank">Download a PDF to learn more</a></p>
                    <p><a href="http://www.netpromoter.com/" target="_blank">Visit the Net Promoter website</a></p>
                </div>
            </aside>

        </div>';
        }



        if(!is_front_page() && get_post_type($post->ID)!='product' && (!is_page() || $post->ID==115)) {//blog stuff

            echo '
        <div class="widgets simple">
            <h3>Decker Blog Contributors</h3>
            <div class="textwidget">
                <div class="contributors">
                    <a href="/about-us/leadership/#ben-decker">
                    <img src="/wp-content/themes/twentyeleven-child/images/blog-ben-decker.jpg" alt="Ben Decker" width="52" height="53" />
                    <br />Ben Decker</a>
                </div>
                <div class="contributors">
                    <a href="/about-us/leadership/#kelly-decker">
                    <img src="/wp-content/themes/twentyeleven-child/images/blog-kelly-decker.jpg" alt="Kelly Decker" width="52" height="53" />
                    <br />Kelly Decker</a>
                </div>
                <div class="contributors end">
                    <a href="/about-us/leadership/#bert-decker">
                    <img src="/wp-content/themes/twentyeleven-child/images/blog-bert-decker.jpg" alt="Bert Decker" width="52" height="53" />
                    <br />Bert Decker</a>
                </div>
                <div style="clear:both;"></div>
                <div class="contributors">
                    <a href="/about-us/our-team/#amelia-mccormick">
                    <img src="/wp-content/themes/twentyeleven-child/images/blog-amelia-mccormick.jpg" alt="Amelia McCormick" width="52" height="53" />
                    <br />Amelia<br />McCormick</a>
                </div>
                <div class="contributors">
                    <a href="/about-us/our-team/#susan-taylor">
                    <img src="/wp-content/themes/twentyeleven-child/images/blog-susan-taylor.jpg" alt="Susan Taylor" width="52" height="53" />
                    <br />Susan Taylor</a>
                </div>
            </div>
        </div>

        <div class="widgets simple twitter">
            <div class="twitter-left">
                <img src="/wp-content/themes/twentyeleven-child/images/twitter-follow.jpg" alt="Follow us on Twitter" width="86" height="70" />
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
        echo '
    </div>';
}
?>