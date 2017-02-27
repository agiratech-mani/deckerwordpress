<?php

define('WP_LIGHTBOX_COLORBOX_IMAGE_REL', 'wp_lightbox_colorbox_image');
define('WP_LIGHTBOX_COLORBOX_VIDEO_REL', 'wp_lightbox_colorbox_video');

function wp_lightbox_colorbox_anchor_text_image_display($link, $title, $text, $class) {
    $wp_lightbox_colorbox_image = WP_LIGHTBOX_COLORBOX_IMAGE_REL;

    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_image" title="$title">$text</a>
	</div>
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_colorbox_anchor_text_video_display($link, $title, $text, $class) {
    $wp_lightbox_colorbox_video = WP_LIGHTBOX_COLORBOX_VIDEO_REL;

    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_video" title="$title">$text</a>
	</div>
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_colorbox_image_display($link, $source, $class, $img_attributes) {
    $wp_lightbox_colorbox_image = WP_LIGHTBOX_COLORBOX_IMAGE_REL;

    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_image"><img src="$source" $img_attributes /></a>
	</div>
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_colorbox_video_display($link, $title, $source, $class, $img_attributes, $atts = '') {
    $wp_lightbox_colorbox_video = WP_LIGHTBOX_COLORBOX_VIDEO_REL;
    $anchor = '<img src="' . $source . '" ' . $img_attributes . ' />';
    if ($atts['auto_thumb']) {
        if (wplu_is_video_type($link) == "youtube") {
            $atts['video_id'] = wplu_get_youtube_video_id($link);
            $anchor = wplu_get_youtube_auto_thumb($atts);
        } else if (wplu_is_video_type($link) == "vimeo") {
            $atts['video_id'] = wplu_get_vimeo_video_id($link);
            $anchor = wplu_get_vimeo_auto_thumb($atts);
        }
    }
    if (isset($atts['show_play_button']) && !empty($atts['show_play_button'])) {
        $anchor .= wplu_get_play_button_code();
        $class .= ' ' . wplu_get_play_button_class();
    }
    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_video" title="$title">$anchor</a>
	</div>
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_load_colorbox_js() {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
    $wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');

    $wp_lightbox_colorbox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_colorbox_transition_type');
    if (empty($wp_lightbox_colorbox_transition_type)) {
        $wp_lightbox_colorbox_transition_type = 'elastic';
    }
    $wp_lightbox_colorbox_opacity = $wp_lightbox_config->getValue('wp_lightbox_colorbox_opacity');
    if (empty($wp_lightbox_colorbox_opacity)) {
        $wp_lightbox_colorbox_opacity = 0.85;
    }
    $wp_lightbox_colorbox_overlayclose = $wp_lightbox_config->getValue('wp_lightbox_colorbox_overlayclose');
    if (empty($wp_lightbox_colorbox_overlayclose)) {
        $wp_lightbox_colorbox_overlayclose = 'true';
    } else {
        $wp_lightbox_colorbox_overlayclose = 'false';
    }

    $wp_lightbox_colorbox_image = WP_LIGHTBOX_COLORBOX_IMAGE_REL;
    $wp_lightbox_colorbox_video = WP_LIGHTBOX_COLORBOX_VIDEO_REL;

    $wp_lightbox_colorbox_output = <<<EOT
	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery(document).ready(function($){
		$(function(){
			$("a[rel='$wp_lightbox_colorbox_image']").colorbox({
				width:$wp_lightbox_width, 
				height:$wp_lightbox_height,
				transition: "$wp_lightbox_colorbox_transition_type", 
				opacity: $wp_lightbox_colorbox_opacity, 
				overlayClose: $wp_lightbox_colorbox_overlayclose
			});
			$("a[rel='$wp_lightbox_colorbox_video']").colorbox({
				iframe:true, 
				width:$wp_lightbox_width, 
				height:$wp_lightbox_height, 
				transition: "$wp_lightbox_colorbox_transition_type", 
				opacity: $wp_lightbox_colorbox_opacity,
				current:"video {current} of {total}", 
				overlayClose: $wp_lightbox_colorbox_overlayclose
			});
		});
	});
	/* ]]> */
	</script>
EOT;
    echo $wp_lightbox_colorbox_output;
}

function wp_lightbox_enqueue_colorbox_scripts() {
    wp_register_script('colorbox', WP_LIGHTBOX_LIB_URL . '/colorbox/colorbox.js', array('jquery'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('colorbox');
    wp_register_style('colorbox', WP_LIGHTBOX_LIB_URL . '/colorbox/example1/colorbox.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('colorbox');
}
