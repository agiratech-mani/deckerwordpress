<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="press-top-left">
		<h1 class="block-title"><?php the_title(); ?></h1>
		<?php
        if ( has_post_thumbnail() ) { // featured image
            the_post_thumbnail();
        }
	    ?>
	</div>
	<div class="entry-content-top">
	   <?php the_content(); ?>
	</div>

	<div class="entry-content">
	    <div class="press-subtitle">
            <?php the_block("Press Items - Title");?>
        </div>

		<div style="clear:both;"></div>

		<?php
            $args = array(
                'cat' => '1531', // press posts
                'posts_per_page' => '-1'
            );
            query_posts($args);
            /*if (have_posts()) {
                $i=0;
                while (have_posts()) : the_post(); $i++;
                    $sideclass = false;
                    if($i/2 == intval($i/2)){
                        $sideclass = 'right';//even
                    }
                    echo '
                    <div class="press '.$sideclass.'">';
                        if(has_post_thumbnail()){
                            echo '<p>'.get_the_post_thumbnail($post->ID,'full').'</p>';
                        }
                        echo '<p>
                        <span class="text-blue">'.get_the_title().'</span><br />
                        <span class="text-gray-light">'.get_the_date().'</span><br />
                        '.nl2br(get_the_content()).'
                        </p>
                    </div>';
                endwhile;
            }*/
            $press = array();
            if (have_posts()) {
                $i=0;
                while (have_posts()) : the_post(); $i++;
                    $sideclass = false;
                    if($i/2 == intval($i/2)){
                        //$sideclass = 'right';//even
                    }
                    $press[$i] = '
                    <div class="press">';
                        if(has_post_thumbnail()){
                            $press[$i] .= '<p>'.get_the_post_thumbnail($post->ID,'full').'</p>';
                        }
                        $press[$i] .= '<p>
                        <span class="text-blue">'.get_the_title().'</span><br />
                        <span class="text-gray-light">'.get_the_date().'</span><br />
                        '.nl2br(get_the_content()).'
                        </p>
                    </div>';
                endwhile;
            }
            wp_reset_query();

            $press_left = false;
            $press_right = false;
            if(is_array($press)){
                foreach($press as $key=>$item){
                    if($key/2 == intval($key/2)){
                        $press_right .= $item;
                    } else {
                        $press_left .= $item;
                    }
                }
            }
            ?>
        <div class="press-column" style="padding:0 27px 0 15px">
		    <?php echo $press_left;?>
		</div>
        <div class="press-column">
		    <?php echo $press_right;?>
		</div>

		<div style="clear:both;"></div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
