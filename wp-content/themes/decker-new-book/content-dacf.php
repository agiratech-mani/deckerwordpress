<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Decker New Book
 */
?>

<div id="tcontents">
<div class="container">

<?php if(get_field('title')) { ?>	
<div class="row">
	<?php
		$title = get_field('title');
		$description = get_field('description');
	?>
	<div id="tc_title" class="col-sm-12 text-center">
		<h2 class="dshadow"><?php echo $title; ?></h2>
	</div>
	<div id="tc_desc" class="col-sm-12 text-center">
		<?php echo $description; ?>
	</div>
</div>
<?php } ?>	


<?php if (is_page("training")) { ?>
	<div class="row">
	<div class="col-sm-12">	
	<div class="training_contents">
		<?php
		if(get_field('training_contents')) {
			while(has_sub_field('training_contents')) {
				$content = get_sub_field('training_content');
				$background = get_sub_field('training_background');
				$background_image = get_sub_field('background_image');
		?>
				<div class="content_item_col">
					<div class="content_item <?php echo $background; ?>" style="background-image:url('<?php echo $background_image; ?>');">
						<div class="training_content"><?php echo $content; ?></div>
					</div>
				</div>
		<?php
			}	
		}	 //training_contents
	?>
	</div>
	</div>
	</div> <!--row-->

<?php } else { ?>

	<div class="row">
		<?php
		if(get_field('contents')) {
			$ctr = 1;
			while(has_sub_field('contents')) {
				$title = get_sub_field('title');
				$description = get_sub_field('description');
				$background = get_sub_field('background');
				$background_image = get_sub_field('background_image');
		?>
				<div class="content_item_col col-sm-4">
					<div class="content_item <?php echo $background; ?>" style="background-image:url('<?php echo $background_image; ?>');">
						<div class="cnum">0<?php echo $ctr; ?>.</div>
						<div class="ctitle"><?php echo $title; ?></div>
						<div class="cdescription"><?php echo $description; ?></div>
					</div>
				</div>

	<?php
			$ctr++;
			}	
		}	 //contents
	?>
	</div> <!--row-->

<?php } ?>


</div>
</div>
