<?php

function wp_lightbox_anchor_text_html5_video_display($link,$poster,$width,$height,$text,$class)
{		
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $poster_url = '';	
    if(!empty($poster))
    {
            $poster_url = ' poster="'.$poster.'"';
    }

    if(empty($width) || empty($height))
    {
            $width = $wp_lightbox_config->getValue('wp_lightbox_width');
            $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    $flash_player_url = WP_LIGHTBOX_LIB_URL.'/mediaelement/flashmediaelement.swf';
    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;

    $video_rel = "wp_lightbox_html5_video_rel_".$div_id;
    $embed_code = wp_lightbox_get_html5_lightbox_embed_code($player_id, $link, $width, $height, $poster_url, $flash_player_url);
    $atts = array();
    $atts['div_id'] = $div_id;
    $atts['player_id'] = $player_id;
    $atts['rel'] = $video_rel;
    $atts['width'] = $width;
    $popup_code = wp_lightbox_get_html5_lightbox_popup_code($atts);   
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
        <a href="#$div_id" rel="$video_rel">$text</a>
    </div>
    <div id="$div_id" style="display:none;">
        $embed_code
    </div>
    $popup_code   
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_html5_video_display($link,$poster,$width,$height,$source,$class,$img_attributes,$atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $poster_url = '';
    if(!empty($poster))
    {
            $poster_url = ' poster="'.$poster.'"';
    }

    if(empty($width) || empty($height))
    {
            $width = $wp_lightbox_config->getValue('wp_lightbox_width');
            $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    $flash_player_url = WP_LIGHTBOX_LIB_URL.'/mediaelement/flashmediaelement.swf';
    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;

    $video_rel = "wp_lightbox_html5_video_rel_".$div_id;
    $embed_code = wp_lightbox_get_html5_lightbox_embed_code($player_id, $link, $width, $height, $poster_url, $flash_player_url);
    $atts = array();
    $atts['div_id'] = $div_id;
    $atts['player_id'] = $player_id;
    $atts['rel'] = $video_rel;
    $atts['width'] = $width;
    $popup_code = wp_lightbox_get_html5_lightbox_popup_code($atts); 
    $anchor = '<img src="'.$source.'" '.$img_attributes.' />';
    if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
        $anchor .= wplu_get_play_button_code();
        $class .= ' '.wplu_get_play_button_class();
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
        <a href="#$div_id" rel="$video_rel">$anchor</a>
    </div>
    <div id="$div_id" style="display:none;">
        $embed_code
    </div>
    $popup_code   
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_html5_anchor_text_protected_s3_video_display($name,$bucket,$poster,$width,$height,$title,$text,$class)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    //Do some error checking on the name and bucket parameters
    if (preg_match("/http/", $name)){
            return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "name" field for your Protected S3 Video shortcode. You should only use the name of the video file in this field (Not the full URL of the file).</div>';	 
    }
    if (preg_match("/http/", $bucket)){
            return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "bucket" field for your Protected S3 Video shortcode. You should only use the name of the bucket in this field (Not the full URL).</div>';	 
    }
    $access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
    $secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
    $link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration'); 
    if(empty($access_key) || empty($secret_key)){
            return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
    }
    if(empty($link_duration) && $link_duration!='0'){
            $link_duration = '300';
    }		
    $objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
    $link = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
    $wp_lightbox_output = wp_lightbox_anchor_text_html5_video_display($link,$poster,$width,$height,$text,$class);
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_html5_protected_s3_video_display($name,$bucket,$poster,$width,$height,$title,$source,$class,$img_attributes,$atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();	
    //Do some error checking on the name and bucket parameters
    if (preg_match("/http/", $name)){
            return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "name" field for your Protected S3 Video shortcode. You should only use the name of the video file in this field (Not the full URL of the file).</div>';	 
    }
    if (preg_match("/http/", $bucket)){
            return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "bucket" field for your Protected S3 Video shortcode. You should only use the name of the bucket in this field (Not the full URL).</div>';	 
    }
    $access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
    $secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
    $link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration');
    if(empty($access_key) || empty($secret_key)){
            return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
    }
    if(empty($link_duration) && $link_duration!='0'){
            $link_duration = '300';
    }		
    $objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
    $link = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
    $wp_lightbox_output .= wp_lightbox_html5_video_display($link,$poster,$width,$height,$source,$class,$img_attributes,$atts);
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_embed_code_html5($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $autoplay = "";
    $link = $atts['link'];
    $width = $atts['width'];
    $height = $atts['height'];
    if($atts['autoplay'])
    {
        $autoplay = ' autoplay="autoplay"';
    }
    if($atts['poster'])
    {
        $poster = ' poster="'.$atts['poster'].'"';
    }
    $unique_player_id = wp_lightbox_generate_unique_id();
    $wp_lightbox_output = <<<EOT
    <video id="$unique_player_id" width="$width" height="$height"{$poster} controls="control"{$autoplay} preload="none"> 
        <source src="$link" type="video/mp4" /> 
    </video>
EOT;
    return $wp_lightbox_output;
}

function wp_lightbox_get_html5_lightbox_embed_code($video_id, $link, $width, $height, $poster_url, $flash_player_url)
{
    $embed_code = <<<EOT
    <video id="$video_id" controls="control" width="$width" height="$height"{$poster_url} preload="metadata"> 
        <source src="$link" type="video/mp4">
        <object width="$width" height="$height" type="application/x-shockwave-flash" data="$flash_player_url"> 
            <param name="movie" value="$flash_player_url"> 
            <param name="flashvars" value="controls=true&amp;file=$link"> 								 
        </object> 
    </video>
EOT;
    return $embed_code; 	
}

function wp_lightbox_get_html5_lightbox_popup_code($atts)
{
    $div_id = $atts['div_id'];
    $player_id = $atts['player_id'];
    $video_rel = $atts['rel'];
    $width = $atts['width'];
    $popup_code = <<<EOT
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            var videoplayer_$div_id = "";
            var video_$div_id = $('div#$div_id').html();
            $("a[rel=$video_rel]").fancybox({
                padding	: 10,
                scrolling: 'no',  
                beforeLoad: function () {
                        videoplayer_$div_id = new MediaElementPlayer('#$player_id',{
                        enableAutosize: true,
                        alwaysShowControls: true,
                        success: function (mediaElement, domObject) { 
                            mediaElement.addEventListener('loadeddata', function(e) {
                                //data loaded
                            }, false);
                            mediaElement.addEventListener('loadedmetadata', function(e) {
                                //metadata loaded
                            }, false);
                            
                        },
                        // fires when a problem is detected
                        error: function () { 

                        }
                    });        
                },
                afterClose: function () {
                    videoplayer_$div_id.remove();
                    $('div#$div_id').empty();
                    $('div#$div_id').html(video_$div_id);
                }
             });
        });
    });
    /* ]]> */
    </script> 
EOT;
    
    return $popup_code; 	
}

function wp_lightbox_enqueue_html5_scripts()
{
    //wp_register_script('jquery.tools', WP_LIGHTBOX_LIB_URL.'/js/jquery.tools.min.js');
    //wp_enqueue_script('jquery.tools');	    	
    wp_register_script('mediaelement', WP_LIGHTBOX_LIB_URL.'/mediaelement/mediaelement-and-player.min.js', array('jquery'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('mediaelement');
    wp_register_style('mediaelement', WP_LIGHTBOX_LIB_URL.'/mediaelement/mediaelementplayer.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('mediaelement');
}
