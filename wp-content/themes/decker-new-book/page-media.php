<?php
/**
 * The template for displaying praise page.
 *
 * @package Decker New Book
 */
?>

<?php get_header(); ?>

<div id="media" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				// if ( comments_open() || get_comments_number() ) :
					// comments_template();
				// endif;
			?>
		<?php endwhile; // end of the loop. ?>
	</main><!-- #main -->	

	<div id="blue_section">
		<div class="container">
			<div id="mcontainer" class="js-masonry">
				<?php
					if(get_field('blue_section')) {
						while(has_sub_field('blue_section')) {
							$media_logo = get_sub_field('media_logo');
							$media_article = get_sub_field('media_article');
				?>
							<div class="article_item">
								<div class="article_property">
									<div class="plogo">
										<?php if (!empty($media_logo)) { ?>
											<img src="<?php echo $media_logo; ?>" />
										<?php } ?>
									</div>	
									<div class="pquote"><?php echo $media_article; ?></div>
								</div>
							</div>
				<?php				
						}	
					}	
				?>
			</div> <!--M Container-->
		</div> <!--BS Container 1-->
	</div>

	<div id="white_section">
		<div class="container">
			<div id="mcontainer" class="js-masonry">
				<?php
					if(get_field('white_section')) {
						while(has_sub_field('white_section')) {
							$media_logo = get_sub_field('media_logo');
							$media_article = get_sub_field('media_article');
				?>
							<div class="article_item">
								<div class="article_property">
									<div class="plogo">
										<?php if (!empty($media_logo)) { ?>
											<img src="<?php echo $media_logo; ?>" />
										<?php } ?>
									</div>
									<div class="pquote"><?php echo $media_article; ?></div>
								</div>
							</div>
				<?php				
						}	
					}	
					?>
			</div> <!--M Container-->
		</div> <!--BS Container 1-->
	</div>

	<div id="footer_section">
		<?php
			if(get_field('footer_section')) {
				$media_article = get_field('footer_section');
		?>
				<div class="">
					<?php echo $media_article; ?>
				</div>
		<?php				
			}	
		?>
	</div>

</div><!-- #praise -->

<script>
var container = document.querySelector('#mcontainer');
var msnry = new Masonry(container, {
  // options
  columnWidth: 200,
  itemSelector: '.article_item'
});

</script>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
