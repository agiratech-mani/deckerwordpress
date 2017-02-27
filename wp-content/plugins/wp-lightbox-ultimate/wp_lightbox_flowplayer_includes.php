<?php
define('WP_LIGHTBOX_FLOWPLAYER_SWF_PATH',WP_LIGHTBOX_LIB_URL.'/js/flowplayer-3.2.12.swf');
define('WP_LIGHTBOX_FLOWPLAYER_COMMERCIAL_SWF_PATH',WP_LIGHTBOX_LIB_URL.'/js/flowplayer.commercial-3.2.12.swf');
define('WP_LIGHTBOX_FLOWPLAYER_UNLIMITED_SWF_PATH',WP_LIGHTBOX_LIB_URL.'/js/flowplayer.unlimited-3.2.12.swf');
define('WP_LIGHTBOX_FLOWPLAYER_AUDIO_SWF_PATH',WP_LIGHTBOX_LIB_URL.'/js/flowplayer.audio-3.2.9.swf');
define('WP_LIGHTBOX_FLOWPLAYER_RTMP_SWF_PATH',WP_LIGHTBOX_LIB_URL.'/js/flowplayer.rtmp-3.2.11.swf');

function wp_lightbox_flowplayer_anchor_text_video_display($link,$width,$height,$title,$autoplay,$text,$class,$atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if(empty($width) || empty($height))
    {
            $width = $wp_lightbox_config->getValue('wp_lightbox_width');
            $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    $path_parts = pathinfo($link);
    $video_type = "mp4";
    if($path_parts['extension']=="flv"){
        $video_type = "flash";
    }

    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;
    $video_rel = "wplu_".$div_id;
    $unload_code = 'flowplayer("#'.$player_id.'").unload();';
    $autoplay_value = "";
    if($autoplay=="true")
    {
        $autoplay_value = 'flowplayer("#'.$player_id.'").play(0);';
    }
    $color = "";
    if(isset($atts['poster']) && $atts['poster'] != ""){
        $poster = $atts['poster'];
        $color = 'background: #000000 url('.$poster.');background-size: 100% auto;';
    }
    else{
        $color = 'background-color: #000000;';
    }
    $ratio = wp_lightbox_calculate_flowplayer_data_ratio($width, $height);
    $ratio = 'ratio: '.$ratio.',';
    $window_width = $width+20;
    $detect = new WP_LIGHTBOX_MOBILE_DETECT();
    if($detect->isMobile() && !$detect->isTablet())
    {
        $video_src = '<source type="video/mp4" src="'.$link.'">
        <source type="video/flash" src="'.$link.'">';
        $path_parts = pathinfo($link);
        if($path_parts['extension']=="flv"){
            $video_src = '<source type="video/flash" src="'.$link.'">';
        }
        $is_splash = " is-splash";
        $wp_lightbox_output = <<<EOT
        <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
        <a id="$div_id" href="javascript:;">$text</a>
        </div>
        <div id="$video_rel" style="display:none;">
            <div id="$player_id" class="flowplayer play-button{$is_splash}" data-engine="html5">
                <video>
                    $video_src   
                </video>
            </div>
        </div>
        <style>
        #$player_id {
            $color    
         }
        </style>
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                $("#$div_id").click(function() {
                    $("#$video_rel").toggle("slow");
                });
            });
        });
        /* ]]> */
        </script>
EOT;
        return $wp_lightbox_output; 
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
    <a href="#$div_id" class="$video_rel">$text</a>
    </div>	
    <style>
    #$player_id {
        $color
     }
     .fbwrap_$div_id{
        width: 80% !important;
        max-width: {$window_width}px !important;
    }
    </style>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            $('.$video_rel').fancybox({
                padding	: 10,
                tpl: {
                  wrap: '<div class="fancybox-wrap" tabIndex="-1">' +
                        '<div class="fancybox-skin">' +
                        '<div class="fancybox-outer">' +
                        '<div id="$player_id">' +
                        '</div></div></div></div>' 
                },
                beforeShow: function () {
                    $('.fancybox-wrap').addClass('fbwrap_$div_id');
                    $("#$player_id").flowplayer({
                        splash: true,
                        engine: 'html5',
                        $ratio
                        playlist: [
                          [
                            { $video_type:   "$link" }
                          ]
                        ]
                    })
                    $("#$player_id").addClass("play-button");
                    $autoplay_value
                },
                beforeClose: function () {
                    $unload_code
                }
             });
        });
    });
    /* ]]> */
    </script>    
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_flowplayer_video_display($link,$width,$height,$title,$autoplay,$source,$class,$img_attributes,$atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if(empty($width) || empty($height))
    {
            $width = $wp_lightbox_config->getValue('wp_lightbox_width');
            $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    $path_parts = pathinfo($link);
    $video_type = "mp4";
    if($path_parts['extension']=="flv"){
        $video_type = "flash";
    }

    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;
    $video_rel = "wplu_".$div_id;
    $unload_code = 'flowplayer("#'.$player_id.'").unload();';
    $autoplay_value = "";
    if($autoplay=="true")
    {
        $autoplay_value = 'flowplayer("#'.$player_id.'").play(0);';
    }
    $color = "";
    if(isset($atts['poster']) && $atts['poster'] != ""){
        $poster = $atts['poster'];
        $color = 'background: #000000 url('.$poster.');background-size: 100% auto;';
    }
    else{
        $color = 'background-color: #000000;';
    }
    $ratio = wp_lightbox_calculate_flowplayer_data_ratio($width, $height);
    $ratio = 'ratio: '.$ratio.',';
    $window_width = $width+20;
    $detect = new WP_LIGHTBOX_MOBILE_DETECT();
    $anchor = '<img src="'.$source.'" '.$img_attributes.' />';
    if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
        $anchor .= wplu_get_play_button_code();
        $class .= ' '.wplu_get_play_button_class();
    }
    if($detect->isMobile() && !$detect->isTablet())
    {
        $video_src = '<source type="video/mp4" src="'.$link.'">
        <source type="video/flash" src="'.$link.'">';
        $path_parts = pathinfo($link);
        if($path_parts['extension']=="flv"){
            $video_src = '<source type="video/flash" src="'.$link.'">';
        }
        $is_splash = " is-splash";
        $wp_lightbox_output = <<<EOT
        <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
        <a id="$div_id" href="javascript:;">$anchor</a>
        </div>
        <div id="$video_rel" style="display:none;">
            <div id="$player_id" class="flowplayer play-button{$is_splash}" data-engine="html5">
                <video>
                    $video_src   
                </video>
            </div>
        </div>
        <style>
        #$player_id {
            $color    
         }
        </style>
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                $("#$div_id").click(function() {
                    $("#$video_rel").toggle("slow");
                });
            });
        });
        /* ]]> */
        </script>
EOT;
        return $wp_lightbox_output; 
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
    <a href="#$div_id" class="$video_rel">$anchor</a>
    </div>
    <style>
    #$player_id {
        $color
     }
     .fbwrap_$div_id{
        width: 80% !important;
        max-width: {$window_width}px !important;
    }
    </style>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            $('.$video_rel').fancybox({
                padding	: 10,
                tpl: {
                  wrap: '<div class="fancybox-wrap" tabIndex="-1">' +
                        '<div class="fancybox-skin">' +
                        '<div class="fancybox-outer">' +
                        '<div id="$player_id">' +
                        '</div></div></div></div>' 
                },
                beforeShow: function () {
                    $('.fancybox-wrap').addClass('fbwrap_$div_id');
                    $("#$player_id").flowplayer({
                        splash: true,
                        engine: 'html5',
                        $ratio
                        playlist: [
                          [
                            { $video_type:   "$link" }
                          ]
                        ]
                    })
                    $("#$player_id").addClass("play-button");
                    $autoplay_value
                },
                beforeClose: function () {
                    $unload_code
                }
             });
        });
    });
    /* ]]> */
    </script> 	
       
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_flowplayer_anchor_text_protected_s3_video_display($name,$bucket,$width,$height,$title,$autoplay,$text,$class,$atts)
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

    if(empty($width) || empty($height))
    {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    $objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
    $file = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
    $file2 = str_replace('%2B', '%25252B',$file);

    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;
    $video_rel = "wplu_".$div_id;
    $unload_code = 'flowplayer("#'.$player_id.'").unload();';
    $autoplay_value = "";
    if($autoplay=="true")
    {
        $autoplay_value = 'flowplayer("#'.$player_id.'").play(0);';
    }
    $color = "";
    if(isset($atts['poster']) && $atts['poster'] != ""){
        $poster = $atts['poster'];
        $color = 'background: #000000 url('.$poster.');background-size: 100% auto;';
    }
    else{
        $color = 'background-color: #000000;';
    }
    $ratio = wp_lightbox_calculate_flowplayer_data_ratio($width, $height);
    $ratio = 'ratio: '.$ratio.',';
    $window_width = $width+20;
    
    $video_file = '{ mp4:   "'.$file.'" },
                            { flash:   "'.$file2.'" }';
    $path_parts = pathinfo($name);
    if($path_parts['extension']=="flv"){
        $video_file = '{ flash:   "'.$file2.'" }';
    }
    $detect = new WP_LIGHTBOX_MOBILE_DETECT();
    if($detect->isMobile() && !$detect->isTablet())
    {
        $video_src = '<source type="video/mp4" src="'.$file.'">
        <source type="video/flash" src="'.$file2.'">';
        $path_parts = pathinfo($name);
        if($path_parts['extension']=="flv"){
            $video_src = '<source type="video/flash" src="'.$file2.'">';
        }
        $is_splash = " is-splash";
        $wp_lightbox_output = <<<EOT
        <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
        <a id="$div_id" href="javascript:;">$text</a>
        </div>
        <div id="$video_rel" style="display:none;">
            <div id="$player_id" class="flowplayer play-button{$is_splash}" data-engine="html5">
                <video>
                    $video_src   
                </video>
            </div>
        </div>
        <style>
        #$player_id {
            $color    
         }
        </style>
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                $("#$div_id").click(function() {
                    $("#$video_rel").toggle("slow");
                });
            });
        });
        /* ]]> */
        </script>
EOT;
        return $wp_lightbox_output; 
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
    <a href="#$div_id" class="$video_rel">$text</a>
    </div>
    <style>
    #$player_id {
        $color
     }
     .fbwrap_$div_id{
        width: 80% !important;
        max-width: {$window_width}px !important;
    }
    </style>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            $('.$video_rel').fancybox({
                padding	: 10,
                tpl: {
                  wrap: '<div class="fancybox-wrap" tabIndex="-1">' +
                        '<div class="fancybox-skin">' +
                        '<div class="fancybox-outer">' +
                        '<div id="$player_id">' +
                        '</div></div></div></div>' 
                },
                beforeShow: function () {
                    $('.fancybox-wrap').addClass('fbwrap_$div_id');
                    $("#$player_id").flowplayer({
                        splash: true,
                        engine: 'html5',
                        $ratio
                        playlist: [
                          [
                            $video_file
                          ]
                        ]
                    })
                    $("#$player_id").addClass("play-button");
                    $autoplay_value
                },
                beforeClose: function () {
                    $unload_code
                }
             });
        });
    });
    /* ]]> */
    </script>   
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;	
	
}

function wp_lightbox_flowplayer_protected_s3_video_display($name,$bucket,$width,$height,$title,$autoplay,$source,$class,$img_attributes,$atts)
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

    if(empty($width) || empty($height))
    {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    $objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
    $file = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
    $file2 = str_replace('%2B', '%25252B',$file);

    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;
    $video_rel = "wplu_".$div_id;
    $unload_code = 'flowplayer("#'.$player_id.'").unload();';
    $autoplay_value = "";
    if($autoplay=="true")
    {
        $autoplay_value = 'flowplayer("#'.$player_id.'").play(0);';
    }
    $color = "";
    if(isset($atts['poster']) && $atts['poster'] != ""){
        $poster = $atts['poster'];
        $color = 'background: #000000 url('.$poster.');background-size: 100% auto;';
    }
    else{
        $color = 'background-color: #000000;';
    }
    $ratio = wp_lightbox_calculate_flowplayer_data_ratio($width, $height);
    $ratio = 'ratio: '.$ratio.',';
    $window_width = $width+20;
    
    $video_file = '{ mp4:   "'.$file.'" },
                            { flash:   "'.$file2.'" }';
    $path_parts = pathinfo($name);
    if($path_parts['extension']=="flv"){
        $video_file = '{ flash:   "'.$file2.'" }';
    }
    $detect = new WP_LIGHTBOX_MOBILE_DETECT();
    $anchor = '<img src="'.$source.'" '.$img_attributes.' />';
    if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
        $anchor .= wplu_get_play_button_code();
        $class .= ' '.wplu_get_play_button_class();
    }
    if($detect->isMobile() && !$detect->isTablet())
    {
        $video_src = '<source type="video/mp4" src="'.$file.'">
        <source type="video/flash" src="'.$file2.'">';
        $path_parts = pathinfo($name);
        if($path_parts['extension']=="flv"){
            $video_src = '<source type="video/flash" src="'.$file2.'">';
        }
        $is_splash = " is-splash";
        $wp_lightbox_output = <<<EOT
        <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
        <a id="$div_id" href="javascript:;">$anchor</a>
        </div>
        <div id="$video_rel" style="display:none;">
            <div id="$player_id" class="flowplayer play-button{$is_splash}" data-engine="html5">
                <video>
                    $video_src   
                </video>
            </div>
        </div>
        <style>
        #$player_id {
            $color    
         }
        </style>
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                $("#$div_id").click(function() {
                    $("#$video_rel").toggle("slow");
                });
            });
        });
        /* ]]> */
        </script>
EOT;
        return $wp_lightbox_output; 
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
    <a href="#$div_id" class="$video_rel">$anchor</a>
    </div>
    <style>
    #$player_id {
        $color
     }
     .fbwrap_$div_id{
        width: 80% !important;
        max-width: {$window_width}px !important;
    }
    </style>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            $('.$video_rel').fancybox({
                padding	: 10,
                tpl: {
                  wrap: '<div class="fancybox-wrap" tabIndex="-1">' +
                        '<div class="fancybox-skin">' +
                        '<div class="fancybox-outer">' +
                        '<div id="$player_id">' +
                        '</div></div></div></div>' 
                },
                beforeShow: function () {
                    $('.fancybox-wrap').addClass('fbwrap_$div_id');
                    $("#$player_id").flowplayer({
                        splash: true,
                        engine: 'html5',
                        $ratio
                        playlist: [
                          [
                            $video_file
                          ]
                        ]
                    })
                    $("#$player_id").addClass("play-button");
                    $autoplay_value
                },
                beforeClose: function () {
                    $unload_code
                }
             });
        });
    });
    /* ]]> */
    </script>    
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;	
}

function wp_lightbox_calculate_flowplayer_data_ratio($width, $height)
{
    $aspect_ratio = $height/$width;
    //$aspect_ratio = number_format($aspect_ratio, 2, '.', '');
    return $aspect_ratio; 
}

function wp_lightbox_get_flowplayer_ratio($ratio)
{
    $param = explode(":", $ratio);
    $width = $param[0];
    $height = $param[1];
    $ratio_text = 'ratio: '.$height.'/'.$width.',';
    return $ratio_text;
}

function wp_lightbox_enqueue_flowplayer_scripts()
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    //wp_register_script('jquery.tools', WP_LIGHTBOX_LIB_URL.'/js/jquery.tools.min.js');
    //wp_enqueue_script('jquery.tools');
    if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_license_key')){
        wp_register_script('flowplayer', 'https://releases.flowplayer.org/6.0.3/commercial/flowplayer.min.js', array('jquery'), WP_LIGHTBOX_VERSION);
    }
    else{
        wp_register_script('flowplayer', 'https://releases.flowplayer.org/6.0.3/flowplayer.min.js', array('jquery'), WP_LIGHTBOX_VERSION);
    }
    wp_enqueue_script('flowplayer');
    wp_register_style('flowplayer', 'https://releases.flowplayer.org/6.0.3/skin/minimalist.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('flowplayer');
}
