<?php
/**
 * The template for displaying praise page.
 *
 * @package Decker New Book
 */
?>

<?php get_header(); ?>

<div id="praise" class="content-area">

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


	<div class="top_praise">
		<div class="container">
			<div class="row">
				<?php
					if(get_field('top_praise')) {
						$top_praise = get_field('top_praise');
				?>	
						<div class="col-sm-12">
							<div class="dquote">
								<?php echo $top_praise; ?>	
							</div>
						</div>
				<?php
					}
				?>
			</div>	
		</div>
	</div>

	<div class="container">
		<div id="mcontainer" class="js-masonry">
			<?php
				if(get_field('standard_praises')) {
					$ctr = 1;
					while(has_sub_field('standard_praises')) {
						$quote = get_sub_field('praise_quote');
						$name = get_sub_field('praise_name');
						$company = get_sub_field('praise_company');
			?>
						<?php if ($ctr <= 6) { ?>
							<div class="praise_item">
								<div class="praise_property">
									<div class="pquote"><?php echo $quote; ?></div>
									<div class="pperson">
										<div class="pname"><?php echo $name; ?></div>
										<div class="pcompany"><?php echo $company; ?></div>
									</div>
								</div>
							</div>
						<?php 
						} else {
							reset_rows();
							break;
						} 
					$ctr++;
					}	
				}	
			?>
		</div> <!--M Container-->
	</div> <!--BS Container 1-->


	<div class="orange_praise">
		<div class="container">
			<div class="row">
				<?php
					if(get_field('orange_praise')) {
						$orange_praise = get_field('orange_praise');
				?>	
						<div class="col-sm-12">
							<div class="dquote">
								<?php echo $orange_praise; ?>	
							</div>
						</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>


	<div class="container">
		<div id="mcontainer" class="js-masonry">
			<?php
				if(get_field('standard_praises')) {
					$ctr = 1;
					while(has_sub_field('standard_praises')) {
						$quote = get_sub_field('praise_quote');
						$name = get_sub_field('praise_name');
						$company = get_sub_field('praise_company');
			?>
						<?php if ($ctr > 6 && $ctr <= 12) { ?>
							<div class="praise_item">
								<div class="praise_property">
									<div class="pquote"><?php echo $quote; ?></div>
									<div class="pperson">
										<div class="pname"><?php echo $name; ?></div>
										<div class="pcompany"><?php echo $company; ?></div>
									</div>
								</div>
							</div>
						<?php 
						} else if ($ctr > 12) {
							reset_rows();
							break;
						} 
					$ctr++;
					}	
				}	
			?>
		</div> <!--M Container-->
	</div> <!--BS Container 2-->


	<div class="blue_praise">
		<div class="container">
			<div class="row">
				<?php
					if(get_field('blue_praise')) {
						$blue_praise = get_field('blue_praise');
				?>	
						<div class="col-sm-12">
							<div class="dquote">
								<?php echo $blue_praise; ?>	
							</div>
						</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>


	<div class="container">
		<div id="mcontainer" class="js-masonry">
			<?php
				if(get_field('standard_praises')) {
					$ctr = 1;
					while(has_sub_field('standard_praises')) {
						$quote = get_sub_field('praise_quote');
						$name = get_sub_field('praise_name');
						$company = get_sub_field('praise_company');
			?>
						<?php if ($ctr > 12) { ?>
							<div class="praise_item">
								<div class="praise_property">
									<div class="pquote"><?php echo $quote; ?></div>
									<div class="pperson">
										<div class="pname"><?php echo $name; ?></div>
										<div class="pcompany"><?php echo $company; ?></div>
									</div>
								</div>
							</div>
						<?php 
						} else {
							// reset_rows();
							// break;
						} 
					$ctr++;
					}	
				}	
			?>
		</div> <!--M Container-->
	</div> <!--BS Container 3-->

<div class="container">
<div class="row">	
	<div class="col-sm-12">
	&nbsp;
	<center>
	<h1>Available At</h1>
	<ul class="avail_at">
		<li><a href="http://www.indiebound.org/book/9780071839839" target="_blank"><img src="/wp-content/themes/decker-new-book/images/btn_indiebound.png" alt="icn" width="68px"/></a></li>
		<li><a href="http://www.barnesandnoble.com/w/communicate-to-influence-ben-decker/1120691337?ean=9780071839839" target="_blank"><img src="/wp-content/themes/decker-new-book/images/btn_bn.jpg" alt="icn" width="75px" /></a></li>
		<li><a href="http://www.amazon.com/Communicate-Influence-Inspire-Audience-Action/dp/0071839836" target="_blank"><img src="/wp-content/themes/decker-new-book/images/btn_Amazon.jpg" alt="icn" width="75px" /></a></li>
		<li><a href="#" target="_blank"><img src="/wp-content/themes/decker-new-book/images/btn_iTunes.jpg" alt="icn" width="75px" /></a></li>
		<li><a href="http://800ceoread.com/products/communicate-to-influence-ben-decker-kelly-decker-english?selected=183871 " target="_blank"><img src="/wp-content/themes/decker-new-book/images/btn_800ceoread.png" alt="icn" width="68px" /></a></li>
	</ul>
	</center>
	</div>
	<div class="col-sm-12">
	<br/>	
	<br/>	
	<center>
		<img alt="button" src="/wp-content/themes/decker-new-book/images/img_match.png">
	</center>
	<br/>
	<br/>
	</div>
</div>
</div>


</div><!-- #praise -->

<script>
var container = document.querySelector('#mcontainer');
var msnry = new Masonry(container, {
  // options
  columnWidth: 200,
  itemSelector: '.praise_item'
});

</script>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
