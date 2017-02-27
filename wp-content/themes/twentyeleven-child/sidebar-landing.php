<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ('content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area landing" role="complementary">
		    <?php

		        dynamic_sidebar( 'sidebar-6' );

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
        ?>


		</div><!-- #secondary .widget-area -->
<?php endif; ?>