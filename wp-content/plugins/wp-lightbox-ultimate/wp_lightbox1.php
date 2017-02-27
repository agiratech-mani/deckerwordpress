<?php
define('WP_LIGHTBOX_PLUGIN_URL', plugins_url('',__FILE__));
define('WP_LIGHTBOX_LIB_URL',WP_LIGHTBOX_PLUGIN_URL.'/lib');
define('WP_LIGHTBOX_IMAGE_URL',WP_LIGHTBOX_PLUGIN_URL.'/images');

include_once('wp_lightbox_prettyPhoto_includes.php');
include_once('wp_lightbox_fancybox_includes.php');
include_once('wp_lightbox_ColorBox_includes.php');
include_once('wp_lightbox_utility_functions.php');
include_once('wp_lightbox_ultimate_amazon_s3_class.php');
include_once('wp_lightbox_flowplayer_includes.php');
include_once('wp_lightbox_html5_includes.php');
include_once('wp_lightbox_misc_functions.php');
include_once('wp_lightbox_check_browser_class.php');
include_once('wp_lightbox_mobile_detect.php');

add_shortcode('wp_lightbox_ultimate_embed_content','wp_lightbox_ultimate_embed_content_handler');

add_shortcode('wp_lightbox_prettyPhoto_anchor_text_image','wp_lightbox_prettyPhoto_anchor_text_image_handler' );
add_shortcode('wp_lightbox_prettyPhoto_anchor_text_video','wp_lightbox_prettyPhoto_anchor_text_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_anchor_text_flash_video','wp_lightbox_prettyPhoto_anchor_text_flash_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_image','wp_lightbox_prettyPhoto_image_handler' );
add_shortcode('wp_lightbox_prettyPhoto_video','wp_lightbox_prettyPhoto_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_flash_video','wp_lightbox_prettyPhoto_flash_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_anchor_text_pdf','wp_lightbox_prettyPhoto_anchor_text_pdf_handler' );
add_shortcode('wp_lightbox_prettyPhoto_pdf','wp_lightbox_prettyPhoto_pdf_handler' );
add_shortcode('wp_lightbox_anchor_text_display_external_page','wp_lightbox_anchor_text_display_external_page_handler');
add_shortcode('wp_lightbox_display_external_page','wp_lightbox_display_external_page_handler');

add_shortcode('wp_lightbox_fancybox_anchor_text_image','wp_lightbox_fancybox_anchor_text_image_handler' );
add_shortcode('wp_lightbox_fancybox_anchor_text_youtube_video','wp_lightbox_fancybox_anchor_text_youtube_video_handler' );
add_shortcode('wp_lightbox_fancybox_anchor_text_vimeo_video','wp_lightbox_fancybox_anchor_text_vimeo_video_handler' );
add_shortcode('wp_lightbox_fancybox_anchor_text_flash_video','wp_lightbox_fancybox_anchor_text_flash_video_handler' );
add_shortcode('wp_lightbox_fancybox_image','wp_lightbox_fancybox_image_handler' );
add_shortcode('wp_lightbox_fancybox_youtube_video','wp_lightbox_fancybox_youtube_video_handler' );
add_shortcode('wp_lightbox_fancybox_vimeo_video','wp_lightbox_fancybox_vimeo_video_handler');
add_shortcode('wp_lightbox_fancybox_flash_video','wp_lightbox_fancybox_flash_video_handler');

add_shortcode('wp_lightbox_colorbox_anchor_text_image','wp_lightbox_colorbox_anchor_text_image_handler' );
add_shortcode('wp_lightbox_colorbox_anchor_text_video','wp_lightbox_colorbox_anchor_text_video_handler' );
add_shortcode('wp_lightbox_colorbox_image','wp_lightbox_colorbox_image_handler' );
add_shortcode('wp_lightbox_colorbox_video','wp_lightbox_colorbox_video_handler' );

add_shortcode('wp_lightbox_flowplayer_anchor_text_video','wp_lightbox_flowplayer_anchor_text_video_handler' );
add_shortcode('wp_lightbox_flowplayer_video','wp_lightbox_flowplayer_video_handler' );

add_shortcode('wp_lightbox_flowplayer_anchor_text_protected_s3_video','wp_lightbox_flowplayer_anchor_text_protected_s3_video_handler');
add_shortcode('wp_lightbox_flowplayer_protected_s3_video','wp_lightbox_flowplayer_protected_s3_video_handler');

add_shortcode('wp_lightbox_anchor_text_html5_video','wp_lightbox_anchor_text_html5_video_handler');
add_shortcode('wp_lightbox_html5_video','wp_lightbox_html5_video_handler');

add_shortcode('wp_lightbox_html5_anchor_text_protected_s3_video','wp_lightbox_html5_anchor_text_protected_s3_video_handler');
add_shortcode('wp_lightbox_html5_protected_s3_video','wp_lightbox_html5_protected_s3_video_handler');

add_shortcode('wp_lightbox_anchor_text_protected_s3_video','wp_lightbox_anchor_text_protected_s3_video_handler');
add_shortcode('wp_lightbox_protected_s3_video','wp_lightbox_protected_s3_video_handler');
add_shortcode('wp_lightbox_embed_protected_s3_video','wp_lightbox_embed_protected_s3_video_handler');
add_shortcode('wp_lightbox_anchor_text_mp4_video','wp_lightbox_anchor_text_mp4_video_handler');
add_shortcode('wp_lightbox_mp4_video','wp_lightbox_mp4_video_handler');
add_shortcode('wp_lightbox_anchor_text_secure_s3_file_download','wp_lightbox_anchor_text_secure_s3_file_download_handler');
add_shortcode('wp_lightbox_secure_s3_file_download','wp_lightbox_secure_s3_file_download_handler');
add_shortcode('wp_lightbox_anchor_text_secure_s3_pdf_file','wp_lightbox_anchor_text_secure_s3_pdf_file_handler');
add_shortcode('wp_lightbox_secure_s3_pdf_file','wp_lightbox_secure_s3_pdf_file_handler');
add_shortcode('wp_lightbox_ultimate_youtube_video_embed','wp_lightbox_ultimate_youtube_video_embed_handler');
add_shortcode('wp_lightbox_ultimate_s3_private_media','wp_lightbox_ultimate_s3_private_media_handler' );
add_shortcode('wp_lightbox_ultimate_embed_audio','wp_lightbox_ultimate_embed_audio_handler');
add_shortcode('wp_lightbox_ultimate_inline_content_embed','wp_lightbox_ultimate_inline_content_embed_handler');
add_shortcode('wp_lightbox_ultimate_viddler_video','wp_lightbox_ultimate_viddler_video_handler');
add_shortcode('wp_lightbox_ultimate_amazon_s3_cloudfront','wp_lightbox_ultimate_amazon_s3_cloudfront_handler');
add_shortcode('wplu_youtube_slider','wplu_youtube_slider_display');

add_shortcode('wp_lightbox_ultimate_fancy_gallery','wp_lightbox_ultimate_fancy_gallery_handler');
add_shortcode('wp_lightbox_ultimate_clear_float','wp_lightbox_ultimate_clear_float_handler');
add_shortcode('wplu_youtube_video','wplu_youtube_video_handler');
add_shortcode('wplu_vimeo_video','wplu_vimeo_video_handler');

add_action('init', 'wp_lightbox_init');
add_action('init', 'wp_lightbox_ultimate_tinyMCE_addbutton');
add_action('wp_head', 'wp_lightbox_header');
add_action('wp_footer', 'wp_lightbox_footer');
add_action('wp_enqueue_scripts', 'wp_lightbox_enqueue_scripts');
add_action('admin_menu', 'wp_lightbox_menu');

add_filter('post_gallery', 'wplu_gallery_shortcode', 10, 2 );

if (!is_admin())
{
	add_filter('widget_text', 'do_shortcode');
	add_filter('the_excerpt', 'do_shortcode',11);
	add_filter('the_content', 'do_shortcode',11);
}

function wp_lightbox_menu() 
{
	if(is_admin())
	{
		require_once(dirname(__FILE__).'/wp_lightbox_settings.php');
		add_options_page('WP Lightbox Settings', 'WP Lightbox', 'manage_options', 'wp-lightbox-ultimate', 'wp_lightbox_plugin_options');
	} 
}

function wp_lightbox_ultimate_tinyMCE_addbutton() 
{
	// check user permission
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
	return;	
	// Add only in Rich Editor mode
	if (get_user_option('rich_editing') == 'true') 
	{
		add_filter("mce_external_plugins", "wp_lightbox_ultimate_tinyMCE_load");
		add_filter('mce_buttons', 'wp_lightbox_ultimate_tinyMCE_register_button');
	}
}
function wp_lightbox_ultimate_tinyMCE_load($plugin_array) 
{
	$plug = WP_LIGHTBOX_LIB_URL . '/wp_lightbox_ultimate_tiny_mce_plugin.js';
	$plugin_array['wplightboxultimate'] = $plug;
	return $plugin_array;
}
function wp_lightbox_ultimate_tinyMCE_register_button($buttons) 
{
   array_push($buttons, "separator", "WpLightboxUltimateButton");
   return $buttons;	
}

function wp_lightbox_ultimate_clear_float_handler($atts)
{
    return '<div class="lightbox_ultimate_clear_float"></div>';
}

function wp_lightbox_ultimate_embed_content_handler($atts,$content=null)
{
	extract(shortcode_atts(array(
		'div_id' => '',
	), $atts));
	$content = do_shortcode($content);
	$wp_lightbox_output = <<<EOT
	<div style='display:none'>
	    <div id='$div_id' style='padding:10px; background:#fff;'>$content</div>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_anchor_text_image_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'text' => 'Click Me',
		'description' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_anchor_text_image_display($link,$text,$description,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_anchor_text_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'description' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_anchor_text_video_display($link,$width,$height,$text,$description,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_anchor_text_flash_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'description' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_prettyPhoto_anchor_text_flash_video_display($link,$width,$height,$text,$description,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_image_handler($atts){
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'description' => '',
		'source' => '',
		'title' => '',
		'gallery_group' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_image_display($link,$description,$source,$title,$gallery_group,$class,$img_attributes);
}

function wp_lightbox_prettyPhoto_video_handler($atts){
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'description' => '',
		'source' => '',
		'title' => '',
		'gallery_group' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_video_display($link,$width,$height,$description,$source,$title,$gallery_group,$class,$img_attributes,$atts);
}

function wp_lightbox_prettyPhoto_flash_video_handler($atts){
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'description' => '',
		'source' => '',
		'title' => '',
		'gallery_group' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_flash_video_display($link,$width,$height,$description,$source,$title,$gallery_group,$class,$img_attributes);
}

function wp_lightbox_prettyPhoto_anchor_text_pdf_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_anchor_text_pdf_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_prettyPhoto_pdf_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_pdf_display($link,$width,$height,$title,$source,$class,$img_attributes);
}

function wp_lightbox_ultimate_s3_private_media_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'media_type' => '',
		'bucket' =>'',
		'width' => '',
		'height' => '',
		'title' => '',
		'anchor_type' => 'text',
		'text' => 'Click here',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_ultimate_s3_private_media_display($name,$media_type,$bucket,$width,$height,$title,$anchor_type,$text,$source,$class,$img_attributes);
}

function wp_lightbox_anchor_text_display_external_page_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
        if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
        {
            $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
            $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
            $wp_lightbox_output .= '</div>';
            return $wp_lightbox_output;
        }
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_display_external_page_display($link,$width,$height,$title,$text,$class);	
}

function wp_lightbox_display_external_page_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
        {
            $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
            $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
            $wp_lightbox_output .= '</div>';
            return $wp_lightbox_output;
        }
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_display_external_page_display($link,$width,$height,$title,$source,$class,$img_attributes);
}

function wp_lightbox_fancybox_anchor_text_image_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_anchor_text_image_display($atts);
}

function wp_lightbox_fancybox_anchor_text_youtube_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_anchor_text_youtube_video_display($atts);
}

function wp_lightbox_fancybox_anchor_text_vimeo_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_anchor_text_vimeo_video_display($atts);
}

function wp_lightbox_fancybox_anchor_text_flash_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_anchor_text_flash_video_display($atts);
}

function wp_lightbox_fancybox_image_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_image_display($atts);
}

function wp_lightbox_fancybox_youtube_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_youtube_video_display($atts);
}

function wp_lightbox_fancybox_vimeo_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_vimeo_video_display($atts);
}

function wp_lightbox_fancybox_flash_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_fancybox_flash_video_display($atts);
}

function wp_lightbox_colorbox_anchor_text_image_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_colorbox_anchor_text_image_display($link,$title,$text,$class);
}

function wp_lightbox_colorbox_anchor_text_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_colorbox_anchor_text_video_display($link,$title,$text,$class);
}

function wp_lightbox_colorbox_image_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	
	return wp_lightbox_colorbox_image_display($link,$source,$class,$img_attributes);
}

function wp_lightbox_colorbox_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	
	return wp_lightbox_colorbox_video_display($link,$title,$source,$class,$img_attributes,$atts);
}

function wp_lightbox_flowplayer_anchor_text_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    extract(shortcode_atts(array(
            'link' => '',
            'width' => '',
            'height' => '',
            'title' => '',
            'autoplay' => 'false',
            'text' => 'Click Me',
            'class' => '',
    ), $atts));
    return wp_lightbox_flowplayer_anchor_text_video_display($link,$width,$height,$title,$autoplay,$text,$class,$atts);
}

function wp_lightbox_flowplayer_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
                'autoplay' => 'false',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_flowplayer_video_display($link,$width,$height,$title,$autoplay,$source,$class,$img_attributes,$atts);	
}

function wp_lightbox_flowplayer_anchor_text_protected_s3_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' => '',
		'width' => '',
		'height' => '',
		'title' => '',
                'autoplay' => 'false',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_flowplayer_anchor_text_protected_s3_video_display($name,$bucket,$width,$height,$title,$autoplay,$text,$class,$atts);
}

function wp_lightbox_flowplayer_protected_s3_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' => '',
		'width' => '',
		'height' => '',
		'title' => '',
                'autoplay' => 'false',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_flowplayer_protected_s3_video_display($name,$bucket,$width,$height,$title,$autoplay,$source,$class,$img_attributes,$atts);	
}

function wp_lightbox_anchor_text_html5_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'poster' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_html5_video_display($link,$poster,$width,$height,$text,$class);
}

function wp_lightbox_html5_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'poster' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	
	return wp_lightbox_html5_video_display($link,$poster,$width,$height,$source,$class,$img_attributes,$atts);
}
//TODO
function wp_lightbox_html5_anchor_text_protected_s3_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'poster' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_html5_anchor_text_protected_s3_video_display($name,$bucket,$poster,$width,$height,$title,$text,$class);
}

function wp_lightbox_html5_protected_s3_video_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'poster' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_html5_protected_s3_video_display($name,$bucket,$poster,$width,$height,$title,$source,$class,$img_attributes,$atts);
}

function wp_lightbox_anchor_text_protected_s3_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_enable_amazon_s3_video_display')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have "Enable Amazon S3 Video Display" checkbox enabled in the general settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_anchor_text_protected_s3_video_display($atts);
}

function wp_lightbox_protected_s3_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_enable_amazon_s3_video_display')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have "Enable Amazon S3 Video Display" checkbox enabled in the general settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_protected_s3_video_display($atts);
}

function wp_lightbox_embed_protected_s3_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
    {
            $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
            $wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
            $wp_lightbox_output .= '</div>';
            return $wp_lightbox_output;
    }
    return wp_lightbox_embed_protected_s3_video_display($atts);
}

function wp_lightbox_anchor_text_mp4_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_enable_mp4_video_display')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have "Enable MP4 Video Display" checkbox enabled in the general settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_anchor_text_mp4_video_display($atts);	
}

function wp_lightbox_mp4_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_enable_mp4_video_display')=='')
    {
        $wp_lightbox_output = '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have "Enable MP4 Video Display" checkbox enabled in the general settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    return wp_lightbox_mp4_video_display($atts);
}

function wp_lightbox_anchor_text_secure_s3_file_download_handler($atts)
{
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'text' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_secure_s3_file_download_display($name,$bucket,$text,$class);
} 

function wp_lightbox_secure_s3_file_download_handler($atts)
{
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_secure_s3_file_download_display($name,$bucket,$source,$class,$img_attributes);
}

function wp_lightbox_anchor_text_secure_s3_pdf_file_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_secure_s3_pdf_file_display($name,$bucket,$width,$height,$title,$text,$class);
}

function wp_lightbox_secure_s3_pdf_file_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_secure_s3_pdf_file_display($name,$bucket,$width,$height,$title,$source,$class,$img_attributes);
}

function wp_lightbox_ultimate_fancy_gallery_handler($atts,$content=null,$code="")
{
	extract(shortcode_atts(array(
		'class' => 'lightbox_fancy_grid_view_gallery',
	), $atts));
	return wp_lightbox_ultimate_fancy_gallery_display($class,$content);	
}

function wp_lightbox_ultimate_youtube_video_embed_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'videoid' => '',
		'playlist' => '',
		'width' => '',
		'height' => '',
		'hd' => '0',
		'autoplay' => '0',
		'display_control' => '1',
		'fullscreen' => '1',
		'autohide' => '2',
		'theme' => 'dark',
		'show_suggested_video' => '',
		'use_https' => '',
		'enable_privacy' => '',
		'show_logo' => '1',
		'showinfo' => '1',
		'auto_popup' => '',
		'direct_embed' => '',
		'anchor_type' => 'text',
		'text' => 'click here',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_ultimate_youtube_video_embed_display($videoid,$playlist,$width,$height,$hd,$autoplay,$display_control,$fullscreen,$autohide,$theme,$show_suggested_video,$use_https,$enable_privacy,$show_logo,$showinfo,$auto_popup,$direct_embed,$anchor_type,$text,$source,$class,$img_attributes,$atts);		
}

function wp_lightbox_ultimate_embed_audio_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'url' => '',
		'cover_image' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'autoplay' => 'false',
		'direct_embed' => '',
		'anchor_type' => 'text',
		'text' => 'click here',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_ultimate_embed_audio_display($url,$cover_image,$width,$height,$title,$autoplay,$direct_embed,$anchor_type,$text,$source,$class,$img_attributes,$atts);
}

function wp_lightbox_ultimate_inline_content_embed_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'div_id' => '',
		'anchor_type' => 'text',
		'title' => '',
		'text' => 'Click Me',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
		'auto_popup' => 'false',
	), $atts));
	
	return wp_lightbox_ultimate_inline_content_embed_display($div_id,$anchor_type,$title,$text,$source,$class,$img_attributes,$auto_popup);
}

function wp_lightbox_ultimate_viddler_video_handler($atts,$content=null)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'width' => '',
		'height' => '',
		'autoplay' => 'false',
		'anchor_type' => 'text',
		'title' => '',
		'text' => 'click here',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
		'auto_popup' => 'false',
	), $atts));
	//$content = do_shortcode($content);
	$content = preg_replace('/<br \/>/iU', '', $content);
	return wp_lightbox_ultimate_viddler_video_display($content,$width,$height,$autoplay,$anchor_type,$title,$text,$source,$class,$img_attributes,$auto_popup,$atts);	
}

function wp_lightbox_ultimate_amazon_s3_cloudfront_handler($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output = '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'video' => '',
		'domain' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'autoplay' => 'false',
		'direct_embed' => '',
		'anchor_type' => 'text',
		'text' => 'click here',
		'source' => '',
		'class' => '',
		'img_attributes' => '',
	), $atts));
	return wp_lightbox_ultimate_amazon_s3_cloudfront_media_display($video,$domain,$width,$height,$title,$autoplay,$direct_embed,$anchor_type,$text,$source,$class,$img_attributes,$atts);	
}

function wp_lightbox_init() 
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if (!is_admin()) 
    {
    	//ob_start('wp_lightbox_modify_buffer');
    	//wp_register_script('jwplayer', WP_LIGHTBOX_LIB_URL.'/js/jwplayer.js');
        //wp_enqueue_script('jwplayer');
        $prettyPhoto_rel = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_enable_deeplinking');
        if(empty($prettyPhoto_rel)){
                $prettyPhoto_rel = "wp_lightbox_prettyPhoto";
        }
        else{
                $prettyPhoto_rel = "prettyPhoto";
        }
        define('WP_LIGHTBOX_PRETTYPHOTO_REL',$prettyPhoto_rel);
    }
}

function wp_lightbox_enqueue_scripts()
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if (!is_admin()) 
    {
    	if($wp_lightbox_config->getValue('wp_lightbox_enable_jquery_checkbox'))
        {
            //wp_deregister_script('jquery');
            //wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
            wp_enqueue_script('jquery');
        }
    	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox'))
    	{
            wp_lightbox_enqueue_prettyPhoto_scripts();
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox'))
    	{
            wp_lightbox_enqueue_fancybox_scripts();
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox'))
    	{
            wp_lightbox_enqueue_colorbox_scripts();
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox'))
    	{
            wp_lightbox_enqueue_flowplayer_scripts();
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox'))
    	{
            wp_lightbox_enqueue_html5_scripts();
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_enable_mp4_video_display'))
    	{
            //wp_lightbox_enqueue_mp4_scripts();
            wp_lightbox_enqueue_flowplayer_scripts();
            wp_lightbox_enqueue_fancybox_scripts();
    	}
        if($wp_lightbox_config->getValue('wp_lightbox_enable_amazon_s3_video_display'))
    	{
            //wp_lightbox_enqueue_mp4_scripts();
            wp_lightbox_enqueue_flowplayer_scripts();
            wp_lightbox_enqueue_fancybox_scripts();
    	}
        wp_lightbox_enqueue_misc_scripts();
    }
}

function wp_lightbox_header()
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if (!is_admin())
    {
        // Add javascript values in the page
        $flowplayer_code = "";
        if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')){
            $flowplayer_code = 'flowplayer.conf.embed = false;';
            $flowplayer_code .= 'flowplayer.conf.keyboard = false;';
            $flowplayer_key = $wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_license_key');
            if($flowplayer_key){
                $flowplayer_code .= 'flowplayer.conf.key = "'.$flowplayer_key.'";';
                $logo = $wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_logo');
                if($logo){
                    $flowplayer_code .= 'flowplayer.conf.logo = "'.$logo.'";';
                }

            }
        }
        $custom_function = <<<EOT
        function wplu_paramReplace(name, string, value) {
            // Find the param with regex
            // Grab the first character in the returned string (should be ? or &)
            // Replace our href string with our new value, passing on the name and delimeter

            var re = new RegExp("[\\?&]" + name + "=([^&#]*)");
            var matches = re.exec(string);
            var newString;

            if (matches === null) {
                // if there are no params, append the parameter
                newString = string + '?' + name + '=' + value;
            } else {
                var delimeter = matches[0].charAt(0);
                newString = string.replace(re, delimeter + name + "=" + value);
            }
            return newString;
        }
EOT;
        
        echo '<script type="text/javascript">
        WP_LIGHTBOX_VERSION="'.WP_LIGHTBOX_VERSION.'";
        WP_LIGHTBOX_PLUGIN_URL="'.WP_LIGHTBOX_PLUGIN_URL.'";
        '.$flowplayer_code.'
        '.$custom_function.'
        </script>';
    }
	
}

function wp_lightbox_footer()
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if (!is_admin())
    {
        if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox'))
        {
                //wp_lightbox_load_prettyPhoto_js();
        }
        if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox'))
        {
                wp_lightbox_load_fancybox_js();
        }
        if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox'))
        {
                wp_lightbox_load_colorbox_js();
        }
        if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox'))
        {
                //wp_lightbox_load_flowplayer_js();
        }
        if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox'))
        {
                //wp_lightbox_load_html5_js();
        }
        //ob_end_flush();
    }
}
