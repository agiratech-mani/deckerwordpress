<?php
function wp_lightbox_ultimate_run_activation()
{
	include_once('wp_lightbox_config.php');
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	//global $wp_lightbox_config;
	
	/*** Start of Add Default Options ***/
	$wp_lightbox_config->addValue('wp_lightbox_enable_jquery_checkbox','1');
	$wp_lightbox_config->addValue('wp_lightbox_width','640');
	$wp_lightbox_config->addValue('wp_lightbox_height','480');
        $wp_lightbox_config->addValue('wp_lightbox_enable_mp4_video_display','1');
        $wp_lightbox_config->addValue('wp_lightbox_enable_amazon_s3_video_display','1');
        
        //initialize prettyPhoto options
        $wp_lightbox_config->addValue('wp_lightbox_prettyPhoto_checkbox', '1');
        include_once('class/class-prettyphoto.php');
        $wplu_prettyPhoto = get_option('wplu_prettyphoto_options');
        if($wplu_prettyPhoto)  //not a new install
        {
            //no need to set default options
        }
        else   //new install so initialize default options. Also migrate if prettyPhoto options are already configured using the old method
        {
            $wplu_prettyPhoto = WPLU_prettyPhoto::get_instance();
            $pp_animation_speed = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_animation_speed');
            if(!empty($pp_animation_speed)){
                $wplu_prettyPhoto->animation_speed = $pp_animation_speed;
            }
            $pp_opacity = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_opacity');
            if(!empty($pp_opacity)){
                $wplu_prettyPhoto->opacity = $pp_opacity;
            }
            $pp_show_title = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_show_title');
            if(empty($pp_show_title)){
                $wplu_prettyPhoto->show_title = 'false';
            }
            $pp_theme = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_theme');
            if(!empty($pp_theme)){
                $wplu_prettyPhoto->theme = $pp_theme;
            }
            $pp_autoplay = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_autoplay');
            if(!empty($pp_autoplay)){
                $wplu_prettyPhoto->autoplay = 'true';
            }
            $pp_modal = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_modal');
            if(!empty($pp_modal)){
                $wplu_prettyPhoto->modal = 'true';
            }
            $pp_allow_resize = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_allow_resize_window');
            if(empty($pp_allow_resize)){
                $wplu_prettyPhoto->allow_resize = 'false';
            }
            $pp_allow_expansion = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_allow_resized_image_expansion');
            if(empty($pp_allow_expansion)){
                $wplu_prettyPhoto->allow_expand = 'false';
            }
            $pp_overlay_gallery = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_display_overlay_thrumbnail_gallery');
            if(empty($pp_overlay_gallery)){
                $wplu_prettyPhoto->overlay_gallery = 'false';
            }
            $pp_deeplinking = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_enable_deeplinking');
            if(!empty($pp_deeplinking)){
                $wplu_prettyPhoto->deeplinking = 'true';
            }
            WPLU_prettyPhoto::save_object($wplu_prettyPhoto);
        }
        //	
	
	$wp_lightbox_config->addValue('wp_lightbox_colorbox_transition_type','elastic');
	$wp_lightbox_config->addValue('wp_lightbox_colorbox_opacity','0.85');	
	
	$wp_lightbox_config->saveConfig();
	/*** End of Add Default Options ***/
}
