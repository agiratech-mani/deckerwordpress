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

if (!is_page_template( 'page-landing-page.php' ) && 'content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area" role="complementary">
		    <?php
		    if((!is_front_page() && !is_page() && get_post_type($post->ID)!='product') || $post->ID==115){ // blog ?>
            <aside id="search-2" class="widget widget_search">
                <form method="get" id="searchform" action="/">
                <label for="s" class="assistive-text">Search</label>
                <input type="text" class="field" name="s" id="s" placeholder="Search the blog" />
                <input type="image" src="/wp-content/themes/twentyeleven-child/images/submit.jpg" width="36" height="18" alt="Go" />
                </form>
            </aside>
            <?php
			}
			if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<?php endif; // end sidebar widget area ?>

			<?php
			if((!is_front_page() && !is_page() && get_post_type($post->ID)!='product') || $post->ID==115){ // blog ?>
            <aside id="recent-posts-2" class="widget widget_recent_entries">
                <h3 class="widget-title">Recent Posts</h3>
                <?php
                $args = array(
                    //'numberposts' => 10,
                    'post_status' => 'publish');
                $recent_posts = wp_get_recent_posts($args);
	            foreach( $recent_posts as $recent ){
                    echo '
                    <p><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></p>';
                }?>
            </aside>

            <aside id="categories-2" class="widget widget_categories">
                <h3 class="widget-title">Categories</h3>
                <ul>
                <?php
                $args = array(
                    'style'              => 'list',
                    'hide_empty'         => 0,
                    'use_desc_for_title' => 0,
                    'hierarchical'       => true,
                    'title_li'           => __( '' ),
                    'number'             => NULL,
                    'exclude'            => 1531 //press category not listed in blog
                );
                wp_list_categories( $args ); ?>
                </ul>
            </aside>

            <?php
			}?>


		</div><!-- #secondary .widget-area -->
<?php endif; ?>