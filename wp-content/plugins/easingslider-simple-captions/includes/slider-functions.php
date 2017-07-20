<?php

/**
 * Exit if accessed directly
 */
if ( ! defined('ABSPATH')) {
	exit;
}

/**
 * Loads assets
 *
 * @param  string $suffix
 * @return void
 */
function easingslider_sc_load_assets($suffix)
{
	wp_enqueue_style('easingslider-sc', EASINGSLIDER_SC_ASSETS_URL ."css/public{$suffix}.css", false, EASINGSLIDER_SC_VERSION);
	// wp_enqueue_script('easingslider-sc', EASINGSLIDER_SC_ASSETS_URL ."js/public{$suffix}.js", array('jquery', 'easingslider'), EASINGSLIDER_SC_VERSION);
}
add_action('easingslider_enqueue_assets', 'easingslider_sc_load_assets');

/**
 * Displays a slide caption
 * 
 * @param  object                             $slide
 * @param  \EasingSlider\Plugin\Models\Slider $slider
 * @return void
 */
function easingslider_sc_append_caption($slide, \EasingSlider\Plugin\Models\Slider $slider) {

	// Display the slide caption
	if ( ! empty($slide->caption)) {
		?>
			<div class="easingslider-caption">
				<p><?php echo $slide->caption;//echo esc_html($slide->caption); ?></p>
			</div>
		<?php
	}

}
add_action('easingslider_after_display_slide', 'easingslider_sc_append_caption', 10, 2);
