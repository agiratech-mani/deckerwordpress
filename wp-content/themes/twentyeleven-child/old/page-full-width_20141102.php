<?php
/*
Template Name: Full Width
*/
get_header();
?>

		<div id="primary" class="full-width">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				    <?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<style type="text/css">
#video-cti,
#video-dmtsm,
#video-next {
    position:relative;
    padding:20px 0 0 0;
}
#video-cti iframe,
#video-dmtsm iframe,
#video-next iframe {
    position:relative;
}
.video-overlay {
    position:absolute;
    top:20px;
    width:450px;
    height:252px;
    z-index:100;
    background-repeat:no-repeat;
    margin:0;
}
#video-cti .video-overlay {
    background-image:url(http://decker.com/wp-content/uploads/2014/09/video-overlay-hilary3.png);
}
#video-dmtsm .video-overlay {
    background-image:url(http://decker.com/wp-content/uploads/2014/09/video-overlay-bruce.png);
}
#video-next .video-overlay {
    background-image:url(http://decker.com/wp-content/uploads/2014/09/video-overlay-amelia.png);
}
</style>
<script type="text/javascript">
    $("#video-cti").on("click",function(){
        $('#video-cti .video-overlay').fadeOut(2000);
        $("#play-cti")[0].src += "&autoplay=1";
        ev.preventDefault();
    });
    $("#video-dmtsm").on("click",function(){
        $('#video-dmtsm .video-overlay').fadeOut(2000);
        $("#play-dmtsm")[0].src += "&autoplay=1";
        ev.preventDefault();
    });
    $("#video-next").on("click",function(){
        $('#video-next .video-overlay').fadeOut(2000);
        $("#play-next")[0].src += "&autoplay=1";
        ev.preventDefault();
    });
</script>

<?php get_footer(); ?>