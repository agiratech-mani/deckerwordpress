<?php

/**
 * Exit if accessed directly
 */
if ( ! defined('ABSPATH')) {
	exit;
}

/**
 * Loads admin assets
 *
 * @param  string $suffix
 * @return void
 */
function easingslider_sc_admin_load_assets($suffix)
{
	wp_enqueue_style('easingslider-admin-sc', EASINGSLIDER_SC_ASSETS_URL ."css/admin{$suffix}.css", false, EASINGSLIDER_SC_VERSION);
	// wp_enqueue_script('easingslider-admin-sc', EASINGSLIDER_SC_ASSETS_URL ."js/admin{$suffix}.js", array('jquery', 'easingslider-admin'), EASINGSLIDER_SC_VERSION);
}
add_action('easingslider_admin_enqueue_assets', 'easingslider_sc_admin_load_assets');

/**
 * Adds the caption fields to a slide editor
 * 
 * @return void
 */
function easingslider_sc_admin_add_fields()
{
	// Print the setting (this is part of a backbone template)
	?>
		<div class="settings">
			<h3><?php _e('Caption Settings', 'easingslider-sc'); ?></h3>

			<label class="setting caption">
				<span class="name"><?php _e('Caption', 'easingslider-sc'); ?></span>
				<input type="text" data-setting="caption">
			</label>
		</div>
	<?php

}
add_action('easingslider_print_edit_slide_settings', 'easingslider_sc_admin_add_fields', 9999);
