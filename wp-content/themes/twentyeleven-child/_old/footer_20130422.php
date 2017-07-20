<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
if(!is_front_page() && !is_page_template( 'page-left-sidebar-only.php' )
  && !is_page_template( 'page-press.php' )){
    get_sidebar();
}
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

	   <!--
        <div id="footer-top" <?php //twentyeleven_footer_sidebar_class(); ?>>
            <div id="first" class="widget-area" role="complementary">
                <?php //dynamic_sidebar( 'sidebar-3' ); ?>
                <div class="icon">
                    <img src="/wp-content/themes/twentyeleven-child/images/icon-d.png" width="28" height="31" alt="Decker Communications, Messaging, Storytelling, Leadership, Keynote, Kickoff, Corporate, Communications, Presentations, Solutions, Professional Development" title="Decker Communications" />
                </div>
                <div class="right">
                    <form method='post' enctype='multipart/form-data'  id='gform_5'  action='/continuous-learning/download-our-exclusive-white-paper/'>
                        <input name='input_1' id='input_5_1' type='text' value=" Enter your name" onfocus="value=''" maxlength="64"  tabindex='1' />

                        <input name='input_2' id='input_5_2' type='text' value=" Enter a valid email address" onfocus="value=''" maxlength="64" tabindex='2'   />

                        <input type='image' src='/wp-content/themes/twentyeleven-child/images/submit.jpg'  width="36" height="18" alt="Go" tabindex='3' />

                        <input type='hidden' class='gform_hidden' name='is_submit_5' value='1' />
                        <input type='hidden' class='gform_hidden' name='gform_submit' value='5' />
                        <input type='hidden' class='gform_hidden' name='gform_unique_id' value='4ff2debd8bcc3' />
                        <input type='hidden' class='gform_hidden' name='state_5' value='YToyOntpOjA7czo2OiJhOjA6e30iO2k6MTtzOjMyOiJlNzM4NTgxNDJlNWIxMDc0MTE1MzQwNjMyMTFlN2I5NCI7fQ==' />
                        <input type='hidden' class='gform_hidden' name='gform_target_page_number_5' id='gform_target_page_number_5' value='0' />
                        <input type='hidden' class='gform_hidden' name='gform_source_page_number_5' id='gform_source_page_number_5' value='1' />
                        <input type='hidden' name='gform_field_values' value='' />
                    </form>
                </div>
		    </div>
	    </div>-->

	    <!-- split to 5 column footer -->

        <div id="footer-bottom">
	        <!--<div id="second" class="widget-area" role="complementary">-->
	        <div class="footer-menu" id="footer-left">
                <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-4' ); ?>
		        <?php endif; ?>

		        <a href="/feed/" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-rss-grey.png" width="42" height="20" alt="Decker Communications Blog RSS" title="Decker Communications Blog RSS" /></a>
                <a href="http://twitter.com/deckercomm" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-twitter-grey.png" width="18" height="20" alt="Decker Communications on Twitter" title="Decker Communications on Twitter" /></a>
                <a href="http://www.facebook.com/pages/San-Francisco-CA/Decker-Communications-Inc/132432471240" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-fb-grey.png" width="17" height="20" alt="Decker Communications on Facebook" title="Decker Communications on Facebook" /></a>
                <a href="http://www.linkedin.com/companies/37380" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-linkedin-grey.png" width="18" height="20" alt="Decker Communications on LinkedIn" title="Decker Communications on LinkedIn" /></a>
                <a href="http://www.youtube.com/user/DeckerComm" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-youtube-grey.png" width="50" height="20" alt="Decker Communications on YouTube" title="Decker Communications on YouTube" /></a>
            </div><!-- #second .widget-area -->


	        <div class="footer-menu">
	            <p class="footer-menu-title"><a href="<?php echo get_permalink(40); ?>"><?php echo get_the_title(40);?></a></p>
        	    <?php wp_nav_menu( array( 'menu' => 5, 'container' => false, 'depth' => 1 ) );?>
    	    </div>
    	    <div class="footer-menu" id="short-title">
                <p class="footer-menu-title"><a href="<?php echo get_permalink(93); ?>"><?php echo get_the_title(93);?></a></p>
        	    <?php wp_nav_menu( array( 'menu' => 6, 'container' => false, 'depth' => 1 ) );?>
    	    </div>
    	    <div class="footer-menu">
	            <p class="footer-menu-title"><a href="<?php echo get_permalink(103); ?>"><?php echo get_the_title(103);?></a></p>
        	    <?php wp_nav_menu( array( 'menu' => 7, 'container' => false, 'depth' => 1 ) );?>
    	    </div>
    	    <div class="footer-menu">
	            <p class="footer-menu-title"><a href="<?php echo get_permalink(105); ?>"><?php echo get_the_title(105);?></a></p>
        	    <?php wp_nav_menu( array( 'menu' => 8, 'container' => false, 'depth' => 1 ) );?>
    	    </div>


            <!--<div id="third" class="widget-area" role="complementary">-->
            <div class="footer-menu footer-right">
                <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-5' ); ?>
		        <?php endif; ?>
		    </div>

		    <div class="footer-menu left" id="footer-horizontal">
    	        <?php wp_nav_menu( array( 'menu' => 1530, 'container' => false, 'depth' => 1 ) );?>
    	    </div>
    	    <div class="footer-menu footer-right">
		        <div class="site-credits">
                    Copyright &copy; <?php echo date('Y');?> Decker Communications.<br />
		            All rights reserved.<br />
		            Site design by <a href="http://avenue4design.com" target="_blank">Avenue 4</a>
		        </div>
            </div><!-- #third .widget-area -->
        </div>


		<div id="site-generator">
			<?php do_action( 'twentyeleven_credits' ); ?>
		      	<!--<?php printf( __( 'Proudly powered by %s', 'twentyeleven' ), 'WordPress' ); ?>-->
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>