<?php
/**
 * Plugin Name: Easing Slider - Simple Captions
 * Plugin URI: http://easingslider.com/
 * Description: Add captions to your sliders with ease.
 * Version: 1.0.0
 * Author: Matthew Ruddy
 * Author URI: http://matthewruddy.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: easingslider-sc
 * 
 * @package Easing Slider - Simple Captions
 * @author Matthew Ruddy
 */

/**
 * Exit if accessed directly
 */
if ( ! defined('ABSPATH')) {
	exit;
}

// Define constants
define('EASINGSLIDER_SC_VERSION', '1.0.0');
define('EASINGSLIDER_SC_NAME', 'Simple Captions');
define('EASINGSLIDER_SC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('EASINGSLIDER_SC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('EASINGSLIDER_SC_PLUGIN_FILE', __FILE__);
define('EASINGSLIDER_SC_ASSETS_DIR', EASINGSLIDER_SC_PLUGIN_DIR .'assets/');
define('EASINGSLIDER_SC_ASSETS_URL', EASINGSLIDER_SC_PLUGIN_URL .'assets/');
define('EASINGSLIDER_SC_RESOURCES_DIR', EASINGSLIDER_SC_PLUGIN_DIR .'resources/');
define('EASINGSLIDER_SC_RESOURCES_URL', EASINGSLIDER_SC_PLUGIN_URL .'resources/');

// Load includes
require_once dirname(__FILE__) . '/includes/slider-functions.php';

// Load admin
if (is_admin()) {
	require_once dirname(__FILE__) . '/includes/admin-functions.php';
}

/**
 * Loads plugin textdomain
 *
 * @return void
 */
function easingslider_sc_load_textdomain()
{
	load_plugin_textdomain('easingslider-sc', false, plugin_basename(EASINGSLIDER_SC_PLUGIN_FILE) . '/languages/');
}
add_action('init', 'easingslider_sc_load_textdomain');

/**
 * Registers the addon
 *
 * @return void
 */
function easingslider_sc_register_addon()
{
	if (function_exists('easingslider_register_addon')) {
		easingslider_register_addon(
			EASINGSLIDER_SC_NAME,
			plugin_basename(EASINGSLIDER_SC_PLUGIN_FILE),
			EASINGSLIDER_SC_VERSION
		);
	}
}
add_action('init', 'easingslider_sc_register_addon');
