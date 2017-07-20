<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Decker New Book
 */
?>
		
<?php if(!is_front_page()) { ?>		
	<?php
		$subheading = get_field('subheading');
	?>	
	<div id="asubheading">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $subheading; ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'decker-new-book' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'decker-new-book' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
