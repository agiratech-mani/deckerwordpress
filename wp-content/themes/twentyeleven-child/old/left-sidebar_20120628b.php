<?php
if(!is_front_page()){
    echo '
    <div id="left-block">
        <div id="subnav">';
            $menuid = false;
            $parents = get_post_ancestors( $post->ID );
            /* Get the top Level page->ID count base 1, array base 0 so -1 */
	        $top_id = ($parents) ? $parents[count($parents)-1]: $post->ID;

	        if((!is_front_page() && !is_page()) || $top_id==115){
	            echo '<p class="parent-title">'.get_the_title(115).'</p>';
	            $menuid = 33;
	        } elseif($top_id==40){//what we do
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

        <div id="sidebar-toolbox" class="left-widgets">
            <div class="aside-top"></div>
            <aside class="widget widget_text">
                <div class="textwidget">
                    <img src="/wp-content/themes/twentyeleven-child/images/sidebar-which-training.png" width="136" height="62" alt="Which training?" /><br />
                    <p>
                        Use our interactive<br />
                        matching tool to<br />
                        determine the best<br />
                        program for you
                        <a href="/training-formats-programs/solution-matching-tool/"><img src="/wp-content/themes/twentyeleven-child/images/arrow-orange-grey.png" width="8" height="9" alt="." /></a>
                    </p>
                </div>
            </aside>
            <div class="aside-bottom"></div>
        </div>

        <!--
        <div class="aside-top"></div>
        <aside class="widget widget_text">
            <h3 class="widget-title">Register for an Upcoming Open-Enrollment Program</h3>
            <div class="textwidget"><a href="#" class="signup">Sign up early and save $100</a></div>
		</aside>
		<div class="aside-bottom"></div>
		-->

    </div>';
}
?>