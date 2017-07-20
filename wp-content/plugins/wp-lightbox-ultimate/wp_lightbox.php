<?php
/*
Plugin Name: WP Lightbox Ultimate
Version: 2.2.6
Plugin URI: http://www.tipsandtricks-hq.com
Author: Tips & Tricks HQ
Author URI:http://www.tipsandtricks-hq.com
Description: A simple lightbox plugin for WordPress
*/
define('WP_LIGHTBOX_VERSION', "2.2.6");
include_once('wp_lightbox1.php');

include_once('wp_lightbox_config.php');
$wp_lightbox_config = WP_Lightbox_Config::getInstance();

function wp_lightbox_ultimate_activation_handler ()
{
	require_once(dirname(__FILE__).'/wp_lightbox_installer.php');
	wp_lightbox_ultimate_run_activation();
}
register_activation_hook(__FILE__,'wp_lightbox_ultimate_activation_handler');

add_filter('plugin_action_links', 'wp_lightbox_add_settings_link', 10, 2 );
function wp_lightbox_add_settings_link($links, $file) 
{
	if ($file == plugin_basename(__FILE__)){
		$settings_link = '<a href="options-general.php?page=wp-lightbox-ultimate">Settings</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}
