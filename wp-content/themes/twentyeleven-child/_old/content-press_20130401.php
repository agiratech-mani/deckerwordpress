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
    <div style="float:left;width:170px;margin:0 41px 0 0;">
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

		<div class="press-column" style="padding:0 32px 0 0">
		    <?php the_block("Press Items - Left Column");?>
		</div>
        <div class="press-column">
		    <?php the_block("Press Items - Right Column");?>
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
