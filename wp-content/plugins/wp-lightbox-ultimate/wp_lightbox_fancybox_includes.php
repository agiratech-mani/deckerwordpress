<?php

define('WP_LIGHTBOX_FANCYBOX_IMAGE_REL', 'wp_lightbox_fancybox_image');
define('WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL', 'wp_lightbox_fancybox_youtube_video');
define('WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL', 'wp_lightbox_fancybox_vimeo_video');
define('WP_LIGHTBOX_FANCYBOX_FLASH_VIDEO_REL', 'wp_lightbox_fancybox_flash_video');

function wp_lightbox_fancybox_anchor_text_image_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'title' => '',
      'text' => 'Click Me',
      'class' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "text";
    $atts['media_type'] = "image";
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_fancybox_anchor_text_youtube_video_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'title' => '',
      'text' => 'Click Me',
      'class' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "text";
    $atts['media_type'] = "youtube";
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_fancybox_anchor_text_vimeo_video_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'title' => '',
      'text' => 'Click Me',
      'class' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "text";
    $atts['media_type'] = "vimeo";
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_fancybox_anchor_text_flash_video_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'text' => 'Click Me',
      'class' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "text";
    $atts['media_type'] = "flash";
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_fancybox_image_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'title' => '',
      'source' => '',
      'class' => '',
      'img_attributes' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "image";
    $atts['media_type'] = "image";
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_fancybox_youtube_video_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'title' => '',
      'source' => '',
      'class' => '',
      'img_attributes' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "image";
    $atts['media_type'] = "youtube";
    if ($atts['auto_thumb']) {
        $wp_lightbox_fancybox_rel = WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL;
        $link = $atts['link'];
        $anchor = "";
        $title = "";
        if ($atts['title']) {
            $title = $atts['title'];
            $title = ' title="' . $title . '"';
        }
        if (wplu_is_video_type($link) == "youtube") {
            $atts['video_id'] = wplu_get_youtube_video_id($link);
            $anchor = wplu_get_youtube_auto_thumb($atts);
        }
        /*
          if(strstr($link,'watch?v='))
          {
          $wp_lightbox_youtube_searched_parameter = 'watch?v=';
          $wp_lightbox_youtube_formatted_parameter = 'v/';
          $link = str_replace($wp_lightbox_youtube_searched_parameter,$wp_lightbox_youtube_formatted_parameter,$link);
          }
         */
        $output = <<<EOT
        <a href="$link" rel="$wp_lightbox_fancybox_rel"{$title}>$anchor</a>
EOT;
        return $output;
    }
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_fancybox_vimeo_video_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'title' => '',
      'source' => '',
      'class' => '',
      'img_attributes' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "image";
    $atts['media_type'] = "vimeo";
    if ($atts['auto_thumb']) {
        $wp_lightbox_fancybox_rel = WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL;
        $link = $atts['link'];
        $anchor = "";
        $title = "";
        if ($atts['title']) {
            $title = $atts['title'];
            $title = ' title="' . $title . '"';
        }
        if (wplu_is_video_type($link) == "vimeo") {
            $atts['video_id'] = wplu_get_vimeo_video_id($link);
            $anchor = wplu_get_vimeo_auto_thumb($atts);
        }
        $output = <<<EOT
        <a href="$link" rel="$wp_lightbox_fancybox_rel"{$title}>$anchor</a>
EOT;
        return $output;
    }
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_fancybox_flash_video_display($atts) {
    /*
      extract(shortcode_atts(array(
      'link' => '',
      'source' => '',
      'class' => '',
      'img_attributes' => '',
      ), $atts));
     */
    $atts['anchor_type'] = "image";
    $atts['media_type'] = "flash";
    return wplu_parse_fancybox_shortcode_content($atts);
}

function wp_lightbox_ultimate_fancybox_display_media($media_type, $link, $width, $height, $title, $anchor_type, $text, $source, $class, $img_attributes) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    /*
      $wp_lightbox_fancybox_overlayopacity = $wp_lightbox_config->getValue('wp_lightbox_fancybox_overlayopacity');
      if(empty($wp_lightbox_fancybox_overlayopacity))
      {
      $wp_lightbox_fancybox_overlayopacity = 0.3;
      }
      $wp_lightbox_fancybox_show_title = $wp_lightbox_config->getValue('wp_lightbox_fancybox_show_title');
      if(empty($wp_lightbox_fancybox_show_title))
      {
      $wp_lightbox_fancybox_show_title = 'false';
      }
      $wp_lightbox_fancybox_titlePosition = $wp_lightbox_config->getValue('wp_lightbox_fancybox_titlePosition');
      if(empty($wp_lightbox_fancybox_titlePosition))
      {
      $wp_lightbox_fancybox_titlePosition = 'outside';
      }
      $wp_lightbox_fancybox_showCloseButton = $wp_lightbox_config->getValue('wp_lightbox_fancybox_showCloseButton');
      if(empty($wp_lightbox_fancybox_showCloseButton))
      {
      $wp_lightbox_fancybox_showCloseButton = 'false';
      }
      $wp_lightbox_fancybox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_fancybox_transition_type');
      if(empty($wp_lightbox_fancybox_transition_type))
      {
      $wp_lightbox_fancybox_transition_type = 'fade';
      }
     */
    $anchor = "";
    if ($anchor_type == "text") {
        $anchor = $text;
    } else if ($anchor_type == "image") {
        $anchor = '<img src="' . $source . '" ' . $img_attributes . ' />';
    } else {
        $wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'The anchor type you have specified is invalid. Please refer to the shortcode reference guide for a list of available parameters.';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    $unique_id = wp_lightbox_generate_unique_id();

    if ($media_type == "image") {
        $wp_lightbox_fancybox_image = "wp_lightbox_fancybox_image_rel_" . $unique_id;
        $wp_lightbox_output = <<<EOT
            <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
            <a href="$link" rel="$wp_lightbox_fancybox_image" title="$title">$anchor</a>
            </div>
            <script type="text/javascript" charset="utf-8">
            /* <![CDATA[ */
            jQuery(document).ready(function($){
                $(function(){
                    $("a[rel=$wp_lightbox_fancybox_image]").fancybox({
                        padding		: 10,
                        width		: "80%",
                        height		: "80%",
                        maxWidth	: $width,
                        maxHeight	: $height
                    });
                });
            });
            /* ]]> */
            </script>
EOT;
    } else if ($media_type == "swf") {
        $wp_lightbox_fancybox_swf = "wp_lightbox_fancybox_swf_rel_" . $unique_id;
        $wp_lightbox_output = <<<EOT
            <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
            <a href="$link" rel="$wp_lightbox_fancybox_swf" title="$title">$anchor</a>
            </div>		
            <script type="text/javascript" charset="utf-8">
            /* <![CDATA[ */
            jQuery(document).ready(function($){
                    $(function(){				
                            $("a[rel=$wp_lightbox_fancybox_swf]").fancybox({
                                padding		: 10,
                                width		: "80%",
                                height		: "80%",
                                maxWidth	: $width,
                                maxHeight	: $height
                            });
                    });
            });
            /* ]]> */
            </script>
EOT;
    }
    return $wp_lightbox_output;
}

function wp_lightbox_load_fancybox_js() {
    $wp_lightbox_fancybox_image_rel = WP_LIGHTBOX_FANCYBOX_IMAGE_REL;
    $wp_lightbox_fancybox_youtube_video_rel = WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL;
    $wp_lightbox_fancybox_vimeo_video_rel = WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL;
    $wp_lightbox_fancybox_flash_video = WP_LIGHTBOX_FANCYBOX_FLASH_VIDEO_REL;

    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
    $wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
    /*
      $wp_lightbox_fancybox_overlayopacity = $wp_lightbox_config->getValue('wp_lightbox_fancybox_overlayopacity');
      if(empty($wp_lightbox_fancybox_overlayopacity))
      {
      $wp_lightbox_fancybox_overlayopacity = 0.3;
      }
      $wp_lightbox_fancybox_show_title = $wp_lightbox_config->getValue('wp_lightbox_fancybox_show_title');
      if(empty($wp_lightbox_fancybox_show_title))
      {
      $wp_lightbox_fancybox_show_title = 'false';
      }
      $wp_lightbox_fancybox_titlePosition = $wp_lightbox_config->getValue('wp_lightbox_fancybox_titlePosition');
      if(empty($wp_lightbox_fancybox_titlePosition))
      {
      $wp_lightbox_fancybox_titlePosition = 'outside';
      }
      $wp_lightbox_fancybox_showCloseButton = $wp_lightbox_config->getValue('wp_lightbox_fancybox_showCloseButton');
      if(empty($wp_lightbox_fancybox_showCloseButton))
      {
      $wp_lightbox_fancybox_showCloseButton = 'false';
      }
      $wp_lightbox_fancybox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_fancybox_transition_type');
      if(empty($wp_lightbox_fancybox_transition_type))
      {
      $wp_lightbox_fancybox_transition_type = 'fade';
      }
     */
    $wp_lightbox_fancybox_output = <<<EOT
	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery(document).ready(function($){
		$(function(){
                    $("a[rel=$wp_lightbox_fancybox_image_rel]").fancybox({
                        padding         : 10
                    });
                    $("a[rel=$wp_lightbox_fancybox_youtube_video_rel]").fancybox({
                        padding		: 10,
                        width		: "80%",
                        height		: "80%",
                        maxWidth	: $wp_lightbox_width,
                        maxHeight	: $wp_lightbox_height,
                        autoPlay        : false,
                        helpers : {
                                media : {
                                    youtube : {
                                        params : {
                                            autoplay : 0
                                        }
                                    }
                                }
                        }
                    });
                    $("a[rel=$wp_lightbox_fancybox_vimeo_video_rel]").fancybox({
                        padding		: 10,
                        width		: "80%",
                        height		: "80%",
                        maxWidth	: $wp_lightbox_width,
                        maxHeight	: $wp_lightbox_height,
                        autoPlay        : false,
                        helpers : {
                                media : {
                                    vimeo : {
                                        params : {
                                            autoplay : 0
                                        }
                                    }
                                }
                        }
                    });
                    $("a[rel=$wp_lightbox_fancybox_flash_video]").fancybox({
                        padding		: 10,
                        width		: "80%",
                        height		: "80%",
                        maxWidth	: $wp_lightbox_width,
                        maxHeight	: $wp_lightbox_height
                    });
		});
	});
	/* ]]> */
	</script>
EOT;
    echo $wp_lightbox_fancybox_output;
}

function wp_lightbox_get_fancybox_settings() {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $fancybox_settings = array();
    $wp_lightbox_fancybox_overlayopacity = $wp_lightbox_config->getValue('wp_lightbox_fancybox_overlayopacity');
    if (empty($wp_lightbox_fancybox_overlayopacity)) {
        $wp_lightbox_fancybox_overlayopacity = '0.3';
    }
    $fancybox_settings['overlayopacity'] = $wp_lightbox_fancybox_overlayopacity;
    $wp_lightbox_fancybox_show_title = $wp_lightbox_config->getValue('wp_lightbox_fancybox_show_title');
    if (empty($wp_lightbox_fancybox_show_title)) {
        $wp_lightbox_fancybox_show_title = 'false';
    }
    $fancybox_settings['show_title'] = $wp_lightbox_fancybox_show_title;
    $wp_lightbox_fancybox_titlePosition = $wp_lightbox_config->getValue('wp_lightbox_fancybox_titlePosition');
    if (empty($wp_lightbox_fancybox_titlePosition)) {
        $wp_lightbox_fancybox_titlePosition = 'outside';
    }
    $fancybox_settings['titlePosition'] = $wp_lightbox_fancybox_titlePosition;
    $wp_lightbox_fancybox_showCloseButton = $wp_lightbox_config->getValue('wp_lightbox_fancybox_showCloseButton');
    if (empty($wp_lightbox_fancybox_showCloseButton)) {
        $wp_lightbox_fancybox_showCloseButton = 'false';
    }
    $fancybox_settings['showCloseButton'] = $wp_lightbox_fancybox_showCloseButton;
    $wp_lightbox_fancybox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_fancybox_transition_type');
    if (empty($wp_lightbox_fancybox_transition_type)) {
        $wp_lightbox_fancybox_transition_type = 'fade';
    }
    $fancybox_settings['transition_type'] = $wp_lightbox_fancybox_transition_type;
    return $fancybox_settings;
}

function wp_lightbox_enqueue_fancybox_scripts() {
    wp_register_script('fancybox-mousewheel', WP_LIGHTBOX_LIB_URL . '/fancybox/lib/jquery.mousewheel-3.0.6.pack.js', array('jquery'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('fancybox-mousewheel');
    wp_register_style('fancybox', WP_LIGHTBOX_LIB_URL . '/fancybox/source/jquery.fancybox.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('fancybox');
    wp_register_script('fancybox', WP_LIGHTBOX_LIB_URL . '/fancybox/source/jquery.fancybox.pack.js', array('jquery'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('fancybox');
    wp_register_style('fancybox-buttons', WP_LIGHTBOX_LIB_URL . '/fancybox/source/helpers/jquery.fancybox-buttons.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('fancybox-buttons');
    wp_register_script('fancybox-buttons', WP_LIGHTBOX_LIB_URL . '/fancybox/source/helpers/jquery.fancybox-buttons.js', array('fancybox'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('fancybox-buttons');
    wp_register_script('fancybox-media', WP_LIGHTBOX_LIB_URL . '/fancybox/source/helpers/jquery.fancybox-media.js', array('fancybox'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('fancybox-media');
    wp_register_style('fancybox-thumbs', WP_LIGHTBOX_LIB_URL . '/fancybox/source/helpers/jquery.fancybox-thumbs.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('fancybox-thumbs');
    wp_register_script('fancybox-thumbs', WP_LIGHTBOX_LIB_URL . '/fancybox/source/helpers/jquery.fancybox-thumbs.js', array('fancybox'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('fancybox-thumbs');
}

function wplu_fancybox_create_link($atts) {
    $link = $atts['link'];
    $title = "";
    $anchor = "";
    $wp_lightbox_fancybox_rel = "";
    if ($atts['title']) {
        $title = ' title="' . $title . '"';
    }
    if ($atts['anchor_type'] == "text") {
        $anchor = $atts['text'];
        ;
    }
    if ($atts['anchor_type'] == "image") {
        $anchor = wp_lightbox_get_html_image_embed_code($atts);
        if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
            $anchor .= wplu_get_play_button_code();
        }
    }
    if ($atts['media_type'] == "image") {
        $wp_lightbox_fancybox_rel = WP_LIGHTBOX_FANCYBOX_IMAGE_REL;
    }
    if ($atts['media_type'] == "youtube") {
        $wp_lightbox_fancybox_rel = WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL;
        /*
          if(strstr($link,'watch?v='))
          {
          $wp_lightbox_youtube_searched_parameter = 'watch?v=';
          $wp_lightbox_youtube_formatted_parameter = 'v/';
          $link = str_replace($wp_lightbox_youtube_searched_parameter,$wp_lightbox_youtube_formatted_parameter,$link);
          }
         */
    }
    if ($atts['media_type'] == "vimeo") {
        $wp_lightbox_fancybox_rel = WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL;
    }
    if ($atts['media_type'] == "flash") {
        $wp_lightbox_fancybox_rel = WP_LIGHTBOX_FANCYBOX_FLASH_VIDEO_REL;
    }

    $output = <<<EOT
    <a href="$link" rel="$wp_lightbox_fancybox_rel"{$title}>$anchor</a>
EOT;

    return $output;
}

function wplu_parse_fancybox_shortcode_content($atts) {
    $error_msg = wplu_validate_parameter($atts);
    if (!empty($error_msg)) {
        return $error_msg;
    }
    $shortcode_content = wplu_fancybox_create_link($atts);
    $content = <<<EOT
    $shortcode_content	
EOT;
    $wp_lightbox_output = wplu_wrap_shortcode_content_with_class($atts, $content);
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}
