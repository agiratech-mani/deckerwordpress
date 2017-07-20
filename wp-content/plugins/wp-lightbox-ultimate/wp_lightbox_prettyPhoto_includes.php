<?php

function wp_lightbox_prettyPhoto_anchor_text_image_display($link, $text, $description, $gallery_group, $class) {
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    if (!empty($gallery_group)) {

        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel . '[' . $gallery_group . ']';
    } else {
        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    }

    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a title="$description" href="$link" rel="$wp_lightbox_prettyPhoto_rel">$text</a>
	</div>	
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_anchor_text_video_display($link, $width, $height, $text, $description, $gallery_group, $class) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    if(empty($width) || empty($height))
    {
            $width = $wp_lightbox_config->getValue('wp_lightbox_width');
            $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    if (!empty($gallery_group)) {

        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel . '[' . $gallery_group . ']';
    } else {
        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    }
    $id = uniqid();
    $aspect_ratio = $height/$width;
    $link = add_query_arg( array(
        'width' => $width,
        'height' => $height
    ), $link);
    //$link = esc_url($link);
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
    <a id="$id" title="$description" href="$link" rel="$wp_lightbox_prettyPhoto_rel">$text</a>
    </div>
    <script>
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            var width = $(window).innerWidth();
            var setwidth = $width;
            var ratio = $aspect_ratio;
            var height = $height;
            var link = '$link';
            if(width < setwidth)
            {
                height = Math.floor(width * $aspect_ratio);
                //console.log("device width "+width+", set width "+$width+", ratio "+$aspect_ratio+", new height "+ height);
                var new_url = wplu_paramReplace('width', link, width);
                var new_url = wplu_paramReplace('height', new_url, height);
                $("a#$id").attr('href', new_url);
                //console.log(new_url);
            }    
        });
    });
    /* ]]> */
    </script>         
EOT;
    
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_anchor_text_flash_video_display($link, $width, $height, $text, $description, $gallery_group, $class) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    if(empty($width) || empty($height))
    {
            $width = $wp_lightbox_config->getValue('wp_lightbox_width');
            $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    if (!empty($gallery_group)) {

        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel . '[' . $gallery_group . ']';
    } else {
        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    }
    $id = uniqid();
    $aspect_ratio = $height/$width;
    $link = add_query_arg( array(
        'width' => $width,
        'height' => $height
    ), $link);
    
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
    <a id="$id" title="$description" href="$link" rel="$wp_lightbox_prettyPhoto_rel">$text</a>	
    </div>
    <script>
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            var width = $(window).innerWidth();
            var setwidth = $width;
            var ratio = $aspect_ratio;
            var height = $height;
            var link = '$link';
            if(width < setwidth)
            {
                height = Math.floor(width * $aspect_ratio);
                //console.log("device width "+width+", set width "+$width+", ratio "+$aspect_ratio+", new height "+ height);
                var new_url = wplu_paramReplace('width', link, width);
                var new_url = wplu_paramReplace('height', new_url, height);
                $("a#$id").attr('href', new_url);
                //console.log(new_url);
            }    
        });
    });
    /* ]]> */
    </script>        
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_image_display($link, $description, $source, $title, $gallery_group, $class, $img_attributes) {
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    if (!empty($gallery_group)) {

        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel . '[' . $gallery_group . ']';
    } else {
        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    }

    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_prettyPhoto_rel" title="$description"><img src="$source" alt="$title" $img_attributes /></a>
	</div>	
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_video_display($link, $width, $height, $description, $source, $title, $gallery_group, $class, $img_attributes, $atts = '') {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    if (!empty($gallery_group)) {

        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel . '[' . $gallery_group . ']';
    } else {
        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    }
    $anchor = '<img src="' . $source . '" alt="' . $title . '" ' . $img_attributes . ' />';
    if (isset($atts['auto_thumb'])) {
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
    $id = uniqid();
    $aspect_ratio = $height/$width;
    $link = add_query_arg( array(
        'width' => $width,
        'height' => $height
    ), $link);
    //$link = esc_url($link);
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
    <a id="$id" title="$description" href="$link" rel="$wp_lightbox_prettyPhoto_rel">$anchor</a>    
    </div>	
    <script>
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            var width = $(window).innerWidth();
            var setwidth = $width;
            var ratio = $aspect_ratio;
            var height = $height;
            var link = '$link';
            if(width < setwidth)
            {
                height = Math.floor(width * $aspect_ratio);
                //console.log("device width "+width+", set width "+$width+", ratio "+$aspect_ratio+", new height "+ height);
                var new_url = wplu_paramReplace('width', link, width);
                var new_url = wplu_paramReplace('height', new_url, height);
                $("a#$id").attr('href', new_url);
                //console.log(new_url);
            }    
        });
    });
    /* ]]> */
    </script>        
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_flash_video_display($link, $width, $height, $description, $source, $title, $gallery_group, $class, $img_attributes) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    if (!empty($gallery_group)) {
        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel . '[' . $gallery_group . ']';
    } else {
        $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    }
    $anchor = '<img src="'.$source.'" alt="'.$title.'" '.$img_attributes.' />';
    if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
        $anchor .= wplu_get_play_button_code();
        $class .= ' '.wplu_get_play_button_class();
    }
    $id = uniqid();
    $aspect_ratio = $height/$width;
    $link = add_query_arg( array(
        'width' => $width,
        'height' => $height
    ), $link);
    
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
    <a id="$id" title="$description" href="$link" rel="$wp_lightbox_prettyPhoto_rel">$anchor</a>
    </div>
    <script>
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            var width = $(window).innerWidth();
            var setwidth = $width;
            var ratio = $aspect_ratio;
            var height = $height;
            var link = '$link';
            if(width < setwidth)
            {
                height = Math.floor(width * $aspect_ratio);
                //console.log("device width "+width+", set width "+$width+", ratio "+$aspect_ratio+", new height "+ height);
                var new_url = wplu_paramReplace('width', link, width);
                var new_url = wplu_paramReplace('height', new_url, height);
                $("a#$id").attr('href', new_url);
                //console.log(new_url);
            }    
        });
    });
    /* ]]> */
    </script>        
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_anchor_text_pdf_display($link, $width, $height, $title, $text, $class) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    $browser = new WP_LIGHTBOX_CHECK_BROWSER();
    $browser_name = $browser->getBrowser();
    $detect = new WP_LIGHTBOX_MOBILE_DETECT();
    $doc_view = false;
    $wp_lightbox_output = '';
    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    if ($browser_name == "Safari") {
        $doc_view = true;
    }
    if ($detect->isMobile()) {
        $doc_view = true;
    }
    if ($doc_view) {
        $link = urlencode($link);
        $link = "https://docs.google.com/viewer?url=$link&embedded=true";
        $wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a title="$title" href="$link&iframe=true&amp;width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>	
		</div>
EOT;
        return $wp_lightbox_output;
    }
    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a title="$title" href="$link?iframe=true&width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>	
	</div>
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_prettyPhoto_pdf_display($link, $width, $height, $title, $source, $class, $img_attributes) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    $browser = new WP_LIGHTBOX_CHECK_BROWSER();
    $browser_name = $browser->getBrowser();
    $detect = new WP_LIGHTBOX_MOBILE_DETECT();
    $doc_view = false;
    $wp_lightbox_output = '';
    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    if ($browser_name == "Safari") {
        $doc_view = true;
    }
    if ($detect->isMobile()) {
        $doc_view = true;
    }
    $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    if ($doc_view) {
        $link = urlencode($link);
        $link = "https://docs.google.com/viewer?url=$link&embedded=true";
        $wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a title="$title" href="$link&iframe=true&amp;width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" $img_attributes /></a>
		</div>	
EOT;
        return $wp_lightbox_output;
    }
    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a title="$title" href="$link?iframe=true&width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" $img_attributes /></a>
	</div>	
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_anchor_text_display_external_page_display($link, $width, $height, $title, $text, $class) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $div_id = wp_lightbox_generate_unique_id();
    $rel = "wplu_extpage" . $div_id;
    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    $wp_lightbox_output = <<<EOT
        <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
        <a href="$link" rel="$rel">$text</a>
        </div>    
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                $("a[rel=$rel]").fancybox({
                    type        : 'iframe',
                    padding	: 10,
                    maxWidth	: $width,
                    maxHeight	: $height,
                    width	: '95%',
                    height	: '95%'    
                });
            });
        });
        /* ]]> */
        </script>     
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_display_external_page_display($link, $width, $height, $title, $source, $class, $img_attributes) {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $div_id = wp_lightbox_generate_unique_id();
    $rel = "wplu_extpage" . $div_id;
    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    $wp_lightbox_output = <<<EOT
        <div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
        <a href="$link" rel="$rel"><img src="$source" $img_attributes /></a>
        </div>    
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                $("a[rel=$rel]").fancybox({
                    type        : 'iframe',
                    padding	: 10,
                    maxWidth	: $width,
                    maxHeight	: $height,
                    width	: '95%',
                    height	: '95%'
                });
            });
        });
        /* ]]> */
        </script>     
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_anchor_text_secure_s3_pdf_file_display($atts) 
{
    /*
    extract(shortcode_atts(array(
            'name' => '',
            'bucket' =>'',
            'width' => '',
            'height' => '',
            'title' => '',
            'text' => '',
            'class' => '',
    ), $atts));
    */
    if(isset($atts['link']) && !empty($atts['link'])){
        //Check if PHP version is >= 5.5.0
        if (version_compare(PHP_VERSION, '5.5.0', '<')) {
            return '<div class="wp_lightbox_error_message">Minimun PHP 5.5.0 required for Amazon S3 API to work. You are running ' . PHP_VERSION . '. Request your hosting provider to upgrade your PHP version to a more recent version then try again.</div>';
        }
        //Check if we have OpenSSL extension enabeld
        if (!extension_loaded('openssl')) {
            return '<div class="wp_lightbox_error_message">The amazon S3 API communication needs OpenSSL PHP extension installed. Request your hosting provider to install the OpenSSL PHP exention then try again.</div>';
        }
    }
    $name = (isset($atts['name']) && !empty($atts['name'])) ? $atts['name'] : "";
    $bucket = (isset($atts['bucket']) && !empty($atts['bucket'])) ? $atts['bucket'] : "";
    $width = (isset($atts['width']) && !empty($atts['width'])) ? $atts['width'] : "";
    $height = (isset($atts['height']) && !empty($atts['height'])) ? $atts['height'] : "";
    $title = (isset($atts['title']) && !empty($atts['title'])) ? $atts['title'] : "";
    $text = (isset($atts['text']) && !empty($atts['text'])) ? $atts['text'] : "Click Me";
    $class = (isset($atts['class']) && !empty($atts['class'])) ? $atts['class'] : "";
    
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    $access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
    $secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
    $link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration');

    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    if (empty($access_key) || empty($secret_key)) {
        return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
    }
    if (empty($link_duration) && $link_duration != '0') {
        $link_duration = '300';
    }
    $file = '';
    if(isset($atts['link']) && !empty($atts['link'])){ //use Amazon S3 Signature version 4
        require_once(WP_LIGHTBOX_PLUGIN_PATH.'/lib/aws/aws-autoloader.php');
        $link = $atts['link'];
        $s3_request = wp_lightbox_s3_url_request($link);       
        if(isset($s3_request['error']) && !empty($s3_request['error'])){
            return $s3_request['error'];
        }
        if(isset($s3_request['link']) && !empty($s3_request['link'])){
            $file = $s3_request['link'];
        }
    }
    else{
        $objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
        $file = $objS3->getAuthenticatedURL($bucket, $name, $link_duration);
    }
    $file = add_query_arg( array(
        'iframe' => 'true',
        'width' => $width,
        'height' => $height
    ), $file);
    $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a title="$title" href="$file" rel="$wp_lightbox_prettyPhoto_rel">$text</a>
	</div>	
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_secure_s3_pdf_file_display($atts) 
{
    /*
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
    */
    if(isset($atts['link']) && !empty($atts['link'])){
        //Check if PHP version is >= 5.5.0
        if (version_compare(PHP_VERSION, '5.5.0', '<')) {
            return '<div class="wp_lightbox_error_message">Minimun PHP 5.5.0 required for Amazon S3 API to work. You are running ' . PHP_VERSION . '. Request your hosting provider to upgrade your PHP version to a more recent version then try again.</div>';
        }
        //Check if we have OpenSSL extension enabeld
        if (!extension_loaded('openssl')) {
            return '<div class="wp_lightbox_error_message">The amazon S3 API communication needs OpenSSL PHP extension installed. Request your hosting provider to install the OpenSSL PHP exention then try again.</div>';
        }
    }
    $name = (isset($atts['name']) && !empty($atts['name'])) ? $atts['name'] : "";
    $bucket = (isset($atts['bucket']) && !empty($atts['bucket'])) ? $atts['bucket'] : "";
    $width = (isset($atts['width']) && !empty($atts['width'])) ? $atts['width'] : "";
    $height = (isset($atts['height']) && !empty($atts['height'])) ? $atts['height'] : "";
    $title = (isset($atts['title']) && !empty($atts['title'])) ? $atts['title'] : "";
    $source = (isset($atts['source']) && !empty($atts['source'])) ? $atts['source'] : "";
    $class = (isset($atts['class']) && !empty($atts['class'])) ? $atts['class'] : "";
    $img_attributes = (isset($atts['img_attributes']) && !empty($atts['img_attributes'])) ? $atts['img_attributes'] : "";
    
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    $access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
    $secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
    $link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration');

    if (empty($width) || empty($height)) {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    if (empty($access_key) || empty($secret_key)) {
        return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
    }
    if (empty($link_duration) && $link_duration != '0') {
        $link_duration = '300';
    }
    $file = '';
    if(isset($atts['link']) && !empty($atts['link'])){ //use Amazon S3 Signature version 4
        require_once(WP_LIGHTBOX_PLUGIN_PATH.'/lib/aws/aws-autoloader.php');
        $link = $atts['link'];
        $s3_request = wp_lightbox_s3_url_request($link);
        if(isset($s3_request['error']) && !empty($s3_request['error'])){
            return $s3_request['error'];
        }
        if(isset($s3_request['link']) && !empty($s3_request['link'])){
            $file = $s3_request['link'];
        }
    }
    else{
        $objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
        $file = $objS3->getAuthenticatedURL($bucket, $name, $link_duration);
    }
    $file = add_query_arg( array(
        'iframe' => 'true',
        'width' => $width,
        'height' => $height
    ), $file);
    $wp_lightbox_prettyPhoto_rel = $prettyPhoto_rel;
    $wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a title="$title" href="$file" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" $img_attributes /></a>
	</div>	
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_load_prettyPhoto_js() {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $prettyPhoto_rel = WP_LIGHTBOX_PRETTYPHOTO_REL;
    $wp_lightbox_prettyPhoto_hook_value = 'rel'; /* the attribute tag to use for prettyPhoto hooks. default: 'rel'. For HTML5, use "data-rel" or similar. */
    $wp_lightbox_prettyPhoto_animation_speed_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_animation_speed');
    if (empty($wp_lightbox_prettyPhoto_animation_speed_value)) {
        $wp_lightbox_prettyPhoto_animation_speed_value = 'fast'; /* fast/slow/normal */
    }
    $wp_lightbox_prettyPhoto_ajax_callback_value = 'function() {}';
    $wp_lightbox_prettyPhoto_slideshow_value = 'false'; /* false OR interval time in ms */
    $wp_lightbox_prettyPhoto_autoplay_slideshow_value = 'false'; /* true/false */
    $wp_lightbox_prettyPhoto_opacity_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_opacity');
    if (empty($wp_lightbox_prettyPhoto_opacity_value)) {
        $wp_lightbox_prettyPhoto_opacity_value = '0.80'; /* Value between 0 and 1 */
    }
    $wp_lightbox_prettyPhoto_show_title = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_show_title');
    if (empty($wp_lightbox_prettyPhoto_show_title)) {
        $wp_lightbox_prettyPhoto_show_title = 'false'; /* true/false */
    }
    $allow_resize = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_allow_resize_window');
    if (empty($allow_resize)) {
        $wp_lightbox_prettyPhoto_allow_resize_value = 'false';
    } else {
        $wp_lightbox_prettyPhoto_allow_resize_value = 'true'; /* Resize the photos bigger than viewport. true/false */
    }
    $allow_expand = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_allow_resized_image_expansion');
    if (empty($allow_expand)) {
        $wp_lightbox_prettyPhoto_allow_expand_value = 'false';
    } else {
        $wp_lightbox_prettyPhoto_allow_expand_value = 'true'; /* Allow the user to expand a resized image. true/false */
    }
    $wp_lightbox_prettyPhoto_default_width_value = '500';
    $wp_lightbox_prettyPhoto_default_height_value = '344';
    $wp_lightbox_prettyPhoto_counter_separator_label_value = '/'; /* The separator for the gallery counter 1 "of" 2 */
    $wp_lightbox_prettyPhoto_theme_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_theme');
    if (empty($wp_lightbox_prettyPhoto_theme_value)) {
        $wp_lightbox_prettyPhoto_theme_value = 'pp_default'; /* light_rounded / dark_rounded / light_square / dark_square / facebook */
    }
    $wp_lightbox_prettyPhoto_horizontal_padding = '20'; /* The padding on each side of the picture */
    $wp_lightbox_prettyPhoto_hideflash_value = 'false'; /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
    $wp_lightbox_prettyPhoto_wmode_value = 'opaque'; /* Set the flash wmode attribute */
    $wp_lightbox_prettyPhoto_autoplay_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_autoplay');
    if (empty($wp_lightbox_prettyPhoto_autoplay_value)) {
        $wp_lightbox_prettyPhoto_autoplay_value = 'false'; /* Automatically start videos: True/false */
    }
    $wp_lightbox_prettyPhoto_modal_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_modal');
    if (empty($wp_lightbox_prettyPhoto_modal_value)) {
        $wp_lightbox_prettyPhoto_modal_value = 'false'; /* If set to true, only the close button will close the window */
    }
    $wp_lightbox_prettyPhoto_deeplinking = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_enable_deeplinking');
    if (empty($wp_lightbox_prettyPhoto_deeplinking)) {
        $wp_lightbox_prettyPhoto_deeplinking = 'false'; /* Allow prettyPhoto to update the url to enable deeplinking. */
    }
    $wp_lightbox_prettyPhoto_overlay_gallery_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_display_overlay_thrumbnail_gallery');
    if (empty($wp_lightbox_prettyPhoto_overlay_gallery_value)) {
        $wp_lightbox_prettyPhoto_overlay_gallery_value = 'false'; /* If set to true, a gallery will overlay the fullscreen image on mouse over */
    }
    $overlay_gallery_max_value = '30'; /* Maximum number of pictures in the overlay gallery */
    $wp_lightbox_prettyPhoto_keyboard_shortcuts_value = 'true'; /* Set to false if you open forms inside prettyPhoto */
    $wp_lightbox_prettyPhoto_changepicturecallback_value = 'function(){}'; /* Called everytime an item is shown/changed */
    $wp_lightbox_prettyPhoto_callback_value = 'function(){}'; /* Called when prettyPhoto is closed */
    $wp_lightbox_prettyPhoto_ie6_fallback = 'true';
    $wp_lightbox_prettyPhoto_markup_value = '<div class="pp_pic_holder"> \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
							<div class="pp_right"> \
								<div class="pp_content"> \
									<div class="pp_loaderIcon"></div> \
									<div class="pp_fade"> \
										<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
										<div class="pp_hoverContainer"> \
											<a class="pp_next" href="#">next</a> \
											<a class="pp_previous" href="#">previous</a> \
										</div> \
										<div id="pp_full_res"></div> \
										<div class="pp_details"> \
											<div class="pp_nav"> \
												<a href="#" class="pp_arrow_previous">Previous</a> \
												<p class="currentTextHolder">0/0</p> \
												<a href="#" class="pp_arrow_next">Next</a> \
											</div> \
											<p class="pp_description"></p> \
											<div class="pp_social">{pp_social}</div> \
											<a class="pp_close" href="#">Close</a> \
										</div> \
									</div> \
								</div> \
							</div> \
							</div> \
						</div> \
						<div class="pp_bottom"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
					</div> \
					<div class="pp_overlay"></div>';
    $wp_lightbox_prettyPhoto_gallery_markup_value = '<div class="pp_gallery"> \
								<a href="#" class="pp_arrow_previous">Previous</a> \
								<div> \
									<ul> \
										{gallery} \
									</ul> \
								</div> \
								<a href="#" class="pp_arrow_next">Next</a> \
							</div>';
    $wp_lightbox_prettyPhoto_image_markup_value = '<img id="fullResImage" src="{path}" />';
    $wp_lightbox_prettyPhoto_flash_markup_value = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>';
    $wp_lightbox_prettyPhoto_quicktime_markup_value = '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>';
    $wp_lightbox_prettyPhoto_iframe_markup_value = '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>';
    $wp_lightbox_prettyPhoto_inline_markup_value = '<div class="pp_inline">{content}</div>';
    $wp_lightbox_prettyPhoto_custom_markup_value = '';
    $wp_lightbox_prettyPhoto_social_tools = 'false'; /* html or false to disable */

    $wp_lightbox_prettyPhoto_output = <<<EOT
	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery(document).ready(function($){
		$(function(){
			$("a[rel^='$prettyPhoto_rel']").prettyPhoto({
                            hook: '$wp_lightbox_prettyPhoto_hook_value',
                            animation_speed: '$wp_lightbox_prettyPhoto_animation_speed_value',
                            ajaxcallback: $wp_lightbox_prettyPhoto_ajax_callback_value,
                            slideshow: $wp_lightbox_prettyPhoto_slideshow_value,
                            autoplay_slideshow: $wp_lightbox_prettyPhoto_autoplay_slideshow_value,
                            opacity: $wp_lightbox_prettyPhoto_opacity_value, 
                            show_title: $wp_lightbox_prettyPhoto_show_title, 
                            allow_resize: $wp_lightbox_prettyPhoto_allow_resize_value,
                            allow_expand: $wp_lightbox_prettyPhoto_allow_expand_value,
                            default_width: $wp_lightbox_prettyPhoto_default_width_value,
                            default_height: $wp_lightbox_prettyPhoto_default_height_value,
                            counter_separator_label: '$wp_lightbox_prettyPhoto_counter_separator_label_value', 
                            theme: '$wp_lightbox_prettyPhoto_theme_value',
                            horizontal_padding: $wp_lightbox_prettyPhoto_horizontal_padding,
                            hideflash: $wp_lightbox_prettyPhoto_hideflash_value,
                            wmode: '$wp_lightbox_prettyPhoto_wmode_value', 
                            autoplay: $wp_lightbox_prettyPhoto_autoplay_value,
                            modal: $wp_lightbox_prettyPhoto_modal_value,
                            deeplinking: $wp_lightbox_prettyPhoto_deeplinking,
                            overlay_gallery: $wp_lightbox_prettyPhoto_overlay_gallery_value,
                            overlay_gallery_max: $overlay_gallery_max_value,
                            keyboard_shortcuts: $wp_lightbox_prettyPhoto_keyboard_shortcuts_value,
                            changepicturecallback: $wp_lightbox_prettyPhoto_changepicturecallback_value,
                            callback: $wp_lightbox_prettyPhoto_callback_value,
                            ie6_fallback: $wp_lightbox_prettyPhoto_ie6_fallback,
                            markup: '$wp_lightbox_prettyPhoto_markup_value',
                            gallery_markup: '$wp_lightbox_prettyPhoto_gallery_markup_value',
                            image_markup: '$wp_lightbox_prettyPhoto_image_markup_value',
                            flash_markup: '$wp_lightbox_prettyPhoto_flash_markup_value',
                            quicktime_markup: '$wp_lightbox_prettyPhoto_quicktime_markup_value',
                            iframe_markup: '$wp_lightbox_prettyPhoto_iframe_markup_value',
                            inline_markup: '$wp_lightbox_prettyPhoto_inline_markup_value',
                            custom_markup: '$wp_lightbox_prettyPhoto_custom_markup_value',
                            social_tools: $wp_lightbox_prettyPhoto_social_tools
                        });
		});
	});
	/* ]]> */
	</script>
EOT;
    echo $wp_lightbox_prettyPhoto_output;
}

function wp_lightbox_enqueue_prettyPhoto_scripts() {
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $default_width = $wp_lightbox_config->getValue('wp_lightbox_width');
    if (empty($default_width)) {
        $default_width = "640";
    }
    $default_height = $wp_lightbox_config->getValue('wp_lightbox_height');
    if (empty($default_height)) {
        $default_height = "480";
    }
    wp_register_script('prettyphoto', WP_LIGHTBOX_LIB_URL . '/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('prettyphoto');
    wp_register_script('wplu-prettyphoto', WP_LIGHTBOX_LIB_URL . '/prettyPhoto/js/wplu_prettyPhoto.js', array('prettyphoto'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('wplu-prettyphoto');
    wp_register_style('prettyphoto', WP_LIGHTBOX_LIB_URL . '/prettyPhoto/css/prettyPhoto.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('prettyphoto');
    include_once('class/class-prettyphoto.php');
    $wplu_prettyPhoto = WPLU_prettyPhoto::get_instance();
    wp_localize_script('wplu-prettyphoto', 'wplupp_vars', array(
        'prettyPhoto_rel' => WP_LIGHTBOX_PRETTYPHOTO_REL,
        'animation_speed' => $wplu_prettyPhoto->animation_speed,
        'slideshow' => $wplu_prettyPhoto->slideshow,
        'autoplay_slideshow' => $wplu_prettyPhoto->autoplay_slideshow,
        'opacity' => $wplu_prettyPhoto->opacity,
        'show_title' => $wplu_prettyPhoto->show_title,
        'allow_resize' => $wplu_prettyPhoto->allow_resize,
        'allow_expand' => $wplu_prettyPhoto->allow_expand,
        'default_width' => $default_width,
        'default_height' => $default_height,
        'counter_separator_label' => $wplu_prettyPhoto->counter_separator_label,
        'theme' => $wplu_prettyPhoto->theme,
        'horizontal_padding' => $wplu_prettyPhoto->horizontal_padding,
        'hideflash' => $wplu_prettyPhoto->hideflash,
        'wmode' => $wplu_prettyPhoto->wmode,
        'autoplay' => $wplu_prettyPhoto->autoplay,
        'modal' => $wplu_prettyPhoto->modal,
        'deeplinking' => $wplu_prettyPhoto->deeplinking,
        'overlay_gallery' => $wplu_prettyPhoto->overlay_gallery,
        'overlay_gallery_max' => $wplu_prettyPhoto->overlay_gallery_max,
        'keyboard_shortcuts' => $wplu_prettyPhoto->keyboard_shortcuts,
        'ie6_fallback' => $wplu_prettyPhoto->ie6_fallback
            )
    );
}
