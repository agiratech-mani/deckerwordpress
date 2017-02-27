<?php
function wp_lightbox_anchor_text_protected_s3_video_display($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
        /*
        extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
                'autoplay' = 'false',
	), $atts));
        */
	//Do some error checking on the name and bucket parameters
        $name = "";
        $bucket = "";
        if($atts['name'])
        {
            $name = $atts['name'];
            if (preg_match("/http/", $atts['name'])){
                    return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "name" field for your Protected S3 Video shortcode. You should only use the name of the video file in this field (Not the full URL of the file).</div>';	 
            }
        }
        else
        {
            return '<div class="wp_lightbox_error_message">Please specify the name of your S3 video in the "name" parameter</div>';
        }
        if($atts['bucket'])
        {
            $bucket = $atts['bucket'];
            if (preg_match("/http/", $atts['bucket'])){
                    return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "bucket" field for your Protected S3 Video shortcode. You should only use the name of the bucket in this field (Not the full URL).</div>';	 
            }
        }
        else
        {
            return '<div class="wp_lightbox_error_message">Please specify the name of your S3 bucket containing the video in the "bucket" parameter</div>';
        }
        $access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
	$secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
	$link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration'); 
	if(empty($access_key) || empty($secret_key)){
		return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
	}
	if(empty($link_duration) && $link_duration != '0'){
		$link_duration = '300';
	}
	$width = "";
	$height = "";
	$title = "";
	$text = $atts['text'];
	$autoplay = 'false';
	if($atts['width'] && $atts['height'])
	{
		$width = $atts['width'];
		$height = $atts['height'];	
	}
	else
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	if(isset($atts['title']) && $atts['title'] != "")
	{
		$title = $atts['title'];	
	}
	if(isset($atts['autoplay']) && $atts['autoplay'] != "")
	{
		$autoplay = 'true';	
	}
	$wp_lightbox_output = '';
	$start_div = "";
	$end_div = "";
        $class = "";
	if(isset($atts['class']) && $atts['class'] != "")
	{
            $class = $atts['class'];
            $start_div = '<div class="'.$class.'">';
            $end_div = '</div>';
	}
        $wp_lightbox_output = wp_lightbox_flowplayer_anchor_text_protected_s3_video_display($name,$bucket,$width,$height,$title,$autoplay,$text,$class,$atts);
        $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
        return $wp_lightbox_output;
}

function wp_lightbox_protected_s3_video_display($atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
        /*
        extract(shortcode_atts(array(
		'name' => '',
                'bucket' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
		'autoplay => 'false',
		'img_attributes' => '',
		'img_class' => 'alignnone',
		'img_styles' => '',
		'img_title' => '',
		'img_alt' => '',
		'img_width' => '',
		'img_height' => '',
	), $atts));
        */
	//Do some error checking on the name and bucket parameters
        $name = "";
        $bucket = "";
        if($atts['name'])
        {
            $name = $atts['name'];
            if (preg_match("/http/", $atts['name'])){
                    return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "name" field for your Protected S3 Video shortcode. You should only use the name of the video file in this field (Not the full URL of the file).</div>';	 
            }
        }
        else
        {
            return '<div class="wp_lightbox_error_message">Please specify the name of your S3 video in the "name" parameter</div>';
        }
        if($atts['bucket'])
        {
            $bucket = $atts['bucket'];
            if (preg_match("/http/", $atts['bucket'])){
                    return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "bucket" field for your Protected S3 Video shortcode. You should only use the name of the bucket in this field (Not the full URL).</div>';	 
            }
        }
        else
        {
            return '<div class="wp_lightbox_error_message">Please specify the name of your S3 bucket containing the video in the "bucket" parameter</div>';
        }
	$access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
	$secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
	$link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration'); 
	if(empty($access_key) || empty($secret_key)){
		return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
	}
	if(empty($link_duration) && $link_duration != '0'){
		$link_duration = '300';
	}
	$width = "";
	$height = "";
	$title = "";
	$img_code = wp_lightbox_get_html_image_embed_code($atts);
	$autoplay = 'false';
	if(isset($atts['width']) && $atts['width'] != "" && isset($atts['height']) && $atts['height'] != "")
	{
		$width = $atts['width'];
		$height = $atts['height'];	
	}
	else
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	if(isset($atts['title']) && $atts['title'] != "")
	{
		$title = $atts['title'];	
	}
	if(isset($atts['autoplay']) && $atts['autoplay'] != "")
	{
		$autoplay = 'true';	
	}
	$wp_lightbox_output = '';
	$start_div = "";
	$end_div = "";
        $class = "";
	if(isset($atts['class']) && $atts['class'] != "")
	{
            $class = $atts['class'];
            $start_div = '<div class="'.$class.'">';
            $end_div = '</div>';
	}
        $source = $atts['source'];
        $img_attributes = "";
        if(isset($atts['img_attributes']) && $atts['img_attributes'] != ""){
            $img_attributes = $atts['img_attributes'];
        }
        $wp_lightbox_output = wp_lightbox_flowplayer_protected_s3_video_display($name,$bucket,$width,$height,$title,$autoplay,$source,$class,$img_attributes,$atts);    
        $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
        return $wp_lightbox_output;
}

function wp_lightbox_embed_protected_s3_video_display($atts)
{
    /*
        extract(shortcode_atts(array(
            'name' => '',
            'bucket' =>'',
            'poster' => '',
            'width' => '',
            'height' => '',
            'class' => '',
    ), $atts));
     */
    $atts['anchor_type'] = "embed";
    $error_msg = wplu_validate_amazon_s3_parameter($atts);
    if(!empty($error_msg))
    {
        return $error_msg;
    }
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $class = "";
    $atts = wplu_get_media_dimensions($atts);
    $width = $atts['width'];
    $height =  $atts['height'];
    $name = $atts['name'];
    $bucket = $atts['bucket'];
    $link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration'); 
    if(empty($link_duration) && $link_duration!='0')
    {
        $link_duration = '300';
    }
    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;
    $autoplay_value = "";
    $is_splash = " is-splash";
    $preload = ' preload="none"'; // still forcing it so firefox does not load video data in the background.
    if($atts['autoplay'])
    {
        if($atts['autoplay']=="true"){
            $autoplay_value = " autoplay";
            $is_splash = "";  //disable splash when autoplay is enabled
            $preload = ""; //disable preload since it might affect autoplay option
        }
    }
    $ratio = wp_lightbox_calculate_flowplayer_data_ratio($width, $height);
    $video_ratio = ' data-ratio="'.$ratio.'"';
    
    $access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
    $secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
    $objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
    $link = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
    $link2 = str_replace('%2B', '%25252B',$link);
    $color = '';
    if($atts['poster']){
        $poster = $atts['poster'];
        $color = 'background: #000000 url('.$poster.');background-size: 100% auto;';
    }
    else{
        $color = 'background-color: #000000;';
    }
    
    $video_src = '<source type="video/mp4" src="'.$link.'">
        <source type="video/flash" src="'.$link2.'">';
    $path_parts = pathinfo($name);
    if($path_parts['extension']=="flv"){
        $video_src = '<source type="video/flash" src="'.$link2.'">';
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
        <div id="$player_id" class="flowplayer play-button{$is_splash}" data-engine="html5"{$video_ratio}>
            <video{$preload}{$autoplay_value}>
                $video_src   
            </video>
        </div>
    </div> 
    <style>
    #$player_id {
        max-width: {$width}px;
        max-height: auto;
        $color    
     }
    </style>
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_anchor_text_mp4_video_display($atts)
{
    /* Supported parameter
    extract(shortcode_atts(array(
            'link' => '',
            'width' => '',
            'height' => '',
            'title' => '',
            'text' => 'Click Me',
            'class' => '',
            'autoplay' = 'false',	
    ), $atts));
    */
    $link = $atts['link'];
    $width = "";
    $height = "";
    $title = "";
    $text = $atts['text'];
    $class = "";
    if(isset($atts['width']) && $atts['width'] != "" && isset($atts['height']) && $atts['height'] != "")
    {
            $width = $atts['width'];
            $height = $atts['height'];	
    }
    if(isset($atts['title']) && $atts['title'] != "")
    {
            $title = $atts['title'];	
    }
    if(isset($atts['class']) && $atts['class'] != ""){
        $class = $atts['class'];
    }
    $autoplay = "false";
    if(isset($atts['autoplay']) && $atts['autoplay'] != ""){
        $autoplay = $atts['autoplay'];
    }
    $wp_lightbox_output = wp_lightbox_flowplayer_anchor_text_video_display($link,$width,$height,$title,$autoplay,$text,$class,$atts);	
    return $wp_lightbox_output;
}

function wp_lightbox_mp4_video_display($atts)
{
    /* Supported parameter
    extract(shortcode_atts(array(
            'link' => '',
            'width' => '',
            'height' => '',
            'title' => '',
            'source' => '',
            'class' => '',
            'autoplay => 'false',
            'img_attributes' => '',
            'img_class' => 'alignnone',
            'img_styles' => '',
            'img_title' => '',
            'img_alt' => '',
            'img_width' => '',
            'img_height' => '',
    ), $atts));
    */
    $link = $atts['link'];
    $source = $atts['source'];
    $img_attr = "";
    $width = "";
    $height = "";
    $title = "";
    $class = "";
    if($atts['width'] && $atts['height'])
    {
        $width = $atts['width'];
        $height = $atts['height'];	
    }
    if(isset($atts['title']) && $atts['title'] != "")
    {
        $title = $atts['title'];	
    }
    if(isset($atts['class']) && $atts['class'] != ""){
        $class = $atts['class'];
    }
    if(isset($atts['img_attributes']) && $atts['img_attributes'] != ""){
        $img_attr = $atts['img_attributes']; 
    }
    $autoplay = "false";
    if(isset($atts['autoplay']) && $atts['autoplay'] != ""){
        $autoplay = $atts['autoplay'];
    }
    $wp_lightbox_output = wp_lightbox_flowplayer_video_display($link,$width,$height,$title,$autoplay,$source,$class,$img_attr,$atts);
    return $wp_lightbox_output;
}

function get_html5_video_embed_code($link,$poster,$width,$height,$anchor,$anchor_type,$class,$img_attributes)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	$unique_player_id = wp_lightbox_generate_unique_id();
	$poster_url = '';
	
	if(!empty($poster))
	{
		$poster_url = <<<EOT
		poster="$poster"
EOT;
	}
	
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	
	if($anchor_type=="text")
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id">$anchor</a>
	  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
			<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
				<source src="$link" type="video/mp4" />  
			</video>
	  </div> 
	  </div> 
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id"><img src="$anchor" alt="" $img_attributes /></a>
	  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
			<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
				<source src="$link" type="video/mp4" />  
			</video>
	  </div> 
	  </div> 
EOT;
	}

	return $wp_lightbox_output;	
}

function wp_lightbox_anchor_text_secure_s3_file_download_display($name,$bucket,$text,$class)
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

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link">$text</a>
	</div>
EOT;
	$wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
	return $wp_lightbox_output;	
}

function wp_lightbox_secure_s3_file_download_display($name,$bucket,$source,$class,$img_attributes)
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

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link"><img src="$source" $img_attributes /></a>
	</div>
EOT;
	$wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
	return $wp_lightbox_output;
}

function wp_lightbox_ultimate_fancy_gallery_display($class,$content)
{
	$wp_lightbox_output = 
	'<div class="'.$class.'">'.do_shortcode($content).'</div><div class="lightbox_ultimate_clear_float"></div>';
	$wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
	return $wp_lightbox_output;
}

function wp_lightbox_ultimate_s3_private_media_display($name,$media_type,$bucket,$width,$height,$title,$anchor_type,$text,$source,$class,$img_attributes)
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
	$wp_lightbox_output = "";
	if($media_type=="image" || $media_type=="swf")
	{
		$wp_lightbox_output = wp_lightbox_ultimate_fancybox_display_media($media_type,$link,$width,$height,$title,$anchor_type,$text,$source,$class,$img_attributes);
	}	
	$wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
	return $wp_lightbox_output;
}

function wp_lightbox_ultimate_youtube_video_embed_display($videoid,$playlist,$width,$height,$hd,$autoplay,$display_control,$fullscreen,$autohide,$theme,$show_suggested_video,$use_https,$enable_privacy,$show_logo,$showinfo,$auto_popup,$direct_embed,$anchor_type,$text,$source,$class,$img_attributes,$atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();		

    if($hd=="1")
    {
        if(!empty($playlist))
        {
            $youtube_link = "http://www.youtube.com/embed/videoseries?list=".$playlist."&wmode=transparent&";
        }
        else
        {
            $youtube_link = "http://www.youtube.com/v/".$videoid."?wmode=transparent&";
        }
    }
    else
    {
        if(!empty($playlist))
        {
            $youtube_link = "http://www.youtube.com/embed/videoseries?list=".$playlist."&wmode=transparent&";
        }
        else
        {
            $youtube_link = "http://www.youtube.com/embed/".$videoid."?wmode=transparent&";
        }
    }
    if($show_suggested_video=="1")
    {
        $show_suggested_video = "";
    }
    else
    {
        $show_suggested_video = "&rel=0";
    }
    if($use_https=="1")
    {
        $youtube_link = str_replace("http://","https://",$youtube_link);	
    }
    if($enable_privacy=="1")
    {
        $youtube_link = str_replace("youtube","youtube-nocookie",$youtube_link);
    }
    //show youtube logo or not
    if($show_logo=="1")
    {
        $show_logo = "";
    }
    else
    {
        $show_logo = "&modestbranding=1";
    }
    //show annotations or not
    $show_annotations = "3";  //do not show annotations
    if(isset($atts['show_annotations']))
    {     
        if($atts['show_annotations']=="1")
        {
            $show_annotations = "1";
        }
    }
    
    //start the video at the given number of seconds
    $start = "";
    if(isset($atts['start']) && $atts['start'] > 0)
    {     
        $start = "&start={$atts['start']}";
    }
    
    if(empty($width) || empty($height))
    {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    $anchor = "";
    if($anchor_type=="text")
    {
        $anchor = $text;
    }
    else
    {
        $anchor = '<img src="'.$source.'" '.$img_attributes.' />';
        if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
            $anchor .= wplu_get_play_button_code();
            $class .= ' '.wplu_get_play_button_class();
        }
    }
    $div_id = wp_lightbox_generate_unique_id();
    $youtube_src = $youtube_link."hd=$hd&autoplay=$autoplay&controls=$display_control&fs=$fullscreen&autohide=$autohide&theme=$theme"."$show_suggested_video"."$show_logo&showinfo=$showinfo&iv_load_policy=$show_annotations"."$start";
    
    if(!empty($direct_embed))
    {
        $wp_lightbox_output = <<<EOT
        <div id="$div_id" class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
                <iframe width="$width" height="$height" src="$youtube_src" frameborder="0"></iframe>   
        </div>
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                $("#$div_id").fitVids();    
            });
        });
        /* ]]> */
        </script>
EOT;
        return $wp_lightbox_output;
    }
    $wp_lightbox_fancybox_inline_rel = "wp_lightbox_fancybox_inline_rel_".$div_id;
    $autopop_paramenter = "";
    if($auto_popup=="1")
    {
        $autopop_paramenter = ".trigger('click')";	
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
    <a href="$youtube_src" class="$wp_lightbox_fancybox_inline_rel fancybox.iframe">$anchor</a>
    </div>	
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            $(window).load(function(){
                $(".$wp_lightbox_fancybox_inline_rel").fancybox({
                    padding	: 10,
                    width		: $width,
                    height		: $height,
                    aspectRatio: true,
                    scrolling   : 'no'
                })$autopop_paramenter;
            });    
        });
    });
    /* ]]> */
    </script>    
EOT;
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wp_lightbox_ultimate_embed_audio_display($url,$cover_image,$width,$height,$title,$autoplay,$direct_embed,$anchor_type,$text,$source,$class,$img_attributes,$atts)
{
 	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');
	}	
	$fancybox_options = wp_lightbox_get_fancybox_settings();
	$anchor = "";
	if($anchor_type=="text")
	{
		$anchor = $text;
	}
	else
	{
		$anchor = '<img src="'.$source.'" '.$img_attributes.' />';
                if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
                    $anchor .= wplu_get_play_button_code();
                    $class .= ' '.wplu_get_play_button_class();
                }
	}
	$coverimage = "";
	if(!empty($cover_image))
	{
            $coverimage = ' poster="'.$cover_image.'"';
	}
        $autoplay_value = "";
	if($autoplay=="true")
        {
            //$autoplay_value = ' autoplay="'.$autoplay.'"';
            $autoplay_value = 'mediaElement.play();';
        }
	$div_id = wp_lightbox_generate_unique_id();
	$player_id = 'player_'.$div_id;
	$wp_lightbox_audio_rel = "wp_lightbox_audio_rel_".$div_id;
	$flash_player_url = WP_LIGHTBOX_LIB_URL.'/mediaelement/flashmediaelement.swf';
        $embed_code = <<<EOT
        <audio id="$player_id"{$coverimage} controls="control"> 
            <source src="$url" type="audio/mp3" />
            <object type="application/x-shockwave-flash" data="$flash_player_url"> 
                <param name="movie" value="$flash_player_url" /> 
                <param name="flashvars" value="controls=true&amp;file=$url" /> 								 
            </object> 
	</audio>
EOT;
	if(!empty($direct_embed))
	{
            $wp_lightbox_return_value = <<<EOT
            <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
            $embed_code
            </div>
            <script type="text/javascript" charset="utf-8">
            /* <![CDATA[ */
            jQuery(document).ready(function($){
                $(function(){
                    $('#$player_id').mediaelementplayer({
                        enableAutosize: true,
                        alwaysShowControls: true,
                        audioWidth:$width,
                        audioHeight:$height,
                        success: function (mediaElement, domObject) {
                            $autoplay_value
                        }   
                    });
                });
            });
            /* ]]> */
            </script> 
EOT;
            return $wp_lightbox_return_value; 
	}
	$wp_lightbox_return_value = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
            <a href="#$div_id" rel="$wp_lightbox_audio_rel" title="$title">$anchor</a>
	</div>
        <div id="$div_id" style="display:none;">
            $embed_code
        </div>
        <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($){
            $(function(){
                var audioplayer_$div_id = "";
                var audio_$div_id = $('div#$div_id').html();
                $("a[rel=$wp_lightbox_audio_rel]").fancybox({
                    padding	: 10,
                    scrolling: 'no',    
                    beforeLoad: function () {
                        audioplayer_$div_id = new MediaElementPlayer('#$player_id',{
                            enableAutosize: true,
                            alwaysShowControls: true,
                            audioWidth:$width,
                            audioHeight:$height,
                            success: function (mediaElement, domObject) {
                                $autoplay_value
                            }  
                        });
                    },
                    afterClose: function () {
                        audioplayer_$div_id.remove();    
                        $('div#$div_id').empty();
                        $('div#$div_id').html(audio_$div_id);
                    }
                 });
            });
        });
        /* ]]> */
        </script>
EOT;
	$wp_lightbox_return_value = wp_lightbox_filter_shortcode_content($wp_lightbox_return_value);
	return $wp_lightbox_return_value;
}

function wp_lightbox_ultimate_inline_content_embed_display($div_id,$anchor_type,$title,$text,$source,$class,$img_attributes,$auto_popup)
{	
    $anchor = "";
    if($anchor_type=="text")
    {
            $anchor = $text;
    }
    else
    {
            $anchor = '<img src="'.$source.'" '.$img_attributes.' />';	
    }
    $autopop_paramenter = "";
    if($auto_popup=="true")
    {
            $autopop_paramenter = ".trigger('click')";
    }
    $wp_lightbox_fancybox_inline_rel = "wp_lightbox_fancybox_inline_rel_".$div_id;
    $wp_lightbox_return_value = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
    <a href="#$div_id" rel="$wp_lightbox_fancybox_inline_rel" title="$title">$anchor</a>
    </div>	
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(document).ready(function($){
        $(function(){
            $(window).load(function(){
                $("a[rel=$wp_lightbox_fancybox_inline_rel]").fancybox({
                    padding	: 10
                })$autopop_paramenter;
            });
        });
    });
    /* ]]> */
    </script>    
EOT;
    $wp_lightbox_return_value = wp_lightbox_filter_shortcode_content($wp_lightbox_return_value);
    return $wp_lightbox_return_value;
}

function wp_lightbox_ultimate_viddler_video_display($content,$width,$height,$autoplay,$anchor_type,$title,$text,$source,$class,$img_attributes,$auto_popup,$atts)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');
	}
	$anchor = "";
	if($anchor_type=="text")
	{
		$anchor = $text;
	}
	else
	{
		$anchor = '<img src="'.$source.'" '.$img_attributes.' />';
                if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
                    $anchor .= wplu_get_play_button_code();
                    $class .= ' '.wplu_get_play_button_class();
                }
	}
	$autopop_paramenter = "";
	if($auto_popup=="true")
	{
		$autopop_paramenter = ".trigger('click')";
	}
	$autoplay_parameter = "";
	if($autoplay=='true')
	{
		$autoplay_parameter = "1";
	}
	else
	{
		$autoplay_parameter = "0";
	}
	$div_id = wp_lightbox_generate_unique_id();
	$wp_lightbox_fancybox_inline_rel = "wp_lightbox_fancybox_inline_rel_".$div_id;
	$height_pattern = "/height=\"[0-9]*\"/";
	$content = preg_replace($height_pattern, 'height="'.$height.'"', $content);
	$width_pattern = "/width=\"[0-9]*\"/";
	$content = preg_replace($width_pattern, 'width="'.$width.'"', $content);
	//$autoplay_pattern = 
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="#$div_id" rel="$wp_lightbox_fancybox_inline_rel" title="$title">$anchor</a>
	</div>
        <div id='$div_id' style="display:none;">$content</div>	
	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery(document).ready(function($){
            $(function(){
                var Viddler_code = "";
                $(window).load(function(){
                    $("a[rel='$wp_lightbox_fancybox_inline_rel']").fancybox({
                        padding	: 10,
                        beforeShow:function(){
                            Viddler_code =  $('div#$div_id').html();
                            var iframe_div = $('div#$div_id').find('iframe');
                            iframe_div.attr('src',iframe_div.attr('src').replace(/autoplay=\d+/, 'autoplay=$autoplay_parameter'));
                        },
                        afterClose:function(){
                            $('div#$div_id').html(Viddler_code);
                            var iframe_div = $('div#$div_id').find('iframe');
                            var iframe_src = iframe_div.attr('src').replace(/autoplay=\d+/, 'autoplay=0');
                            iframe_div.attr('src',iframe_src);
                        }
                    })$autopop_paramenter;
                });
            });
	});
	/* ]]> */
	</script>    
EOT;
	$wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
	return $wp_lightbox_output;
}

function wp_lightbox_ultimate_amazon_s3_cloudfront_media_display($video,$domain,$width,$height,$title,$autoplay,$direct_embed,$anchor_type,$text,$source,$class,$img_attributes,$atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $wp_lightbox_error_msg = "";
    if(empty($width) || empty($height))
    {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    }
    if(empty($video))
    {
        $wp_lightbox_error_msg .= '<div class="wp_lightbox_error_message">';
        $wp_lightbox_error_msg .= 'You need to specify the name of your video';
        $wp_lightbox_error_msg .= '</div>';
        return $wp_lightbox_output;
    }
    if(empty($domain))
    {
        $wp_lightbox_error_msg .= '<div class="wp_lightbox_error_message">';
        $wp_lightbox_error_msg .= 'You need to specify the domain name of your cloudfront distribution';
        $wp_lightbox_error_msg .= '</div>';
        return $wp_lightbox_output;
    }

    $div_id = wp_lightbox_generate_unique_id();
    $player_id = 'player_'.$div_id;
    
    $rtmp_net_url = "rtmp://$domain/cfx/st";	
    if(isset($atts['poster']) && !empty($atts['poster'])){
        $poster = $atts['poster'];
        $color = 'background: #000000 url('.$poster.');background-size: 100% auto;';
    }
    else{
        $color = 'background-color: #000000;';
    }
    
    if(!empty($direct_embed))
    {
        $video_src = '<source type="video/flash" src="mp4:'.$video.'">';
        $path_parts = pathinfo($video);
        if($path_parts['extension']=="flv"){
            $video_src = '<source type="video/flash" src="flv:'.$video.'">';
        }
        $autoplay_value = "";
        if(isset($atts['autoplay']) && $atts['autoplay']=="true")
        {
            $autoplay_value = " autoplay";	
        }
        $ratio = wp_lightbox_calculate_flowplayer_data_ratio($width, $height);
        $video_ratio = ' data-ratio="'.$ratio.'"';
        
        $wp_lightbox_output = <<<EOT
        <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
            <div id="$player_id" class="flowplayer is-splash" data-engine="flash" data-rtmp="$rtmp_net_url"{$video_ratio}>
                <video preload="none"{$autoplay_value}>
                    $video_src   
                </video>
            </div>
        </div>
        <style>
        #$player_id {
            max-width: {$width}px;
            max-height: auto;
            $color    
         }
        </style>
EOT;
        $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);    
        return $wp_lightbox_output; 
    }
    //end of direct embed
    $anchor = "";
    if($anchor_type=="text"){
        $anchor = $text;
    }
    else{
        $anchor = '<img src="'.$source.'" '.$img_attributes.' />';
        if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
            $anchor .= wplu_get_play_button_code();
            $class .= ' '.wplu_get_play_button_class();
        }
    }
    $video_rel = "wplu_".$div_id;
    $unload_code = 'flowplayer("#'.$player_id.'").unload();';
    $autoplay_value = "";
    if($autoplay=="true")
    {
        $autoplay_value = 'flowplayer("#'.$player_id.'").play(0);';
    }    
    $ratio = wp_lightbox_calculate_flowplayer_data_ratio($width, $height);
    $ratio = 'ratio: '.$ratio.',';
    $window_width = $width+20;
    
    $video_file = '{ flash:   "mp4:'.$video.'" }';
    $path_parts = pathinfo($video);
    if($path_parts['extension']=="flv"){
        $video_file = '{ flash:   "flv:'.$video.'" }';
    }
    $wp_lightbox_output = <<<EOT
    <div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
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
                        engine: 'flash',
                        rtmp: "$rtmp_net_url",
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

function wp_lightbox_get_html_image_embed_code($atts)
{	
	$img_code = "";
	$source = $atts['source'];
	$img_class = "";
	$img_styles = "";
	$img_title = "";
	$img_alt = "";
	$img_width = "";
	$img_height = "";
	$img_attributes = "";
	if(isset($atts['img_class']) && $atts['img_class'] != "")
	{	
		$img_class = $atts['img_class'];	
	}
	else
	{
		$img_class = "alignnone";	
	}
	if(isset($atts['img_styles']) && $atts['img_styles'] != "")
	{
		$img_styles = $atts['img_styles'];	
		$img_styles = ' style="'.$img_styles.'"';	
	}
	if(isset($atts['img_title']) && $atts['img_title'] != "")
	{
		$img_title = $atts['img_title'];
		$img_title = ' title="'.$img_title.'"';	
	}
	if(isset($atts['img_alt']) && $atts['img_alt'] != "")
	{
		$img_alt = $atts['img_alt'];
		$img_alt = ' alt="'.$img_alt.'"';	
	}
	if(isset($atts['img_width']) && $atts['img_width'] != "")
	{
		$img_width = $atts['img_width'];
		$img_width = ' width="'.$img_width.'"';	
	}
	if(isset($atts['img_height']) && $atts['img_height'] != "")
	{
		$img_height = $atts['img_height'];
		$img_height = ' height="'.$img_height.'"';	
	}
	if(isset($atts['img_attributes']) && $atts['img_attributes'] != "")
	{
		$img_attributes = $atts['img_attributes'];
		$img_attributes = " $img_attributes ";	
	}
	$img_code = '<img class="'.$img_class.'"'.$img_styles.$img_title.$img_alt.' src="'.$source.'"'.$img_width.$img_height.$img_attributes.'/>';

	return $img_code;	
}

function wp_lightbox_enqueue_mp4_scripts()
{
    wp_register_script('html5box', WP_LIGHTBOX_LIB_URL.'/html5lightbox/html5lightbox.js', array('jquery'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('html5box');
}

function wp_lightbox_enqueue_misc_scripts()
{
    global $post;
    /*
    wp_register_style('wplu-slider', WP_LIGHTBOX_LIB_URL.'/nivo-slider/nivo-slider.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('wplu-slider');
    wp_register_style('wplu-slider-theme-bar', WP_LIGHTBOX_LIB_URL.'/nivo-slider/themes/bar/bar.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('wplu-slider-theme-bar');
    wp_register_style('wplu-slider-theme-dark', WP_LIGHTBOX_LIB_URL.'/nivo-slider/themes/dark/dark.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('wplu-slider-theme-dark');
    wp_register_style('wplu-slider-theme-default', WP_LIGHTBOX_LIB_URL.'/nivo-slider/themes/default/default.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('wplu-slider-theme-default');
    wp_register_style('wplu-slider-theme-light', WP_LIGHTBOX_LIB_URL.'/nivo-slider/themes/light/light.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('wplu-slider-theme-light');
    wp_register_script('wplu-slider', WP_LIGHTBOX_LIB_URL.'/nivo-slider/jquery.nivo.slider.pack.js', array('jquery'), WP_LIGHTBOX_VERSION);
    wp_enqueue_script('wplu-slider');
    */
    if(has_shortcode( $post->post_content, 'wp_lightbox_ultimate_youtube_video_embed')){
        wp_register_script('fitvidsjs', WP_LIGHTBOX_LIB_URL.'/js/jquery.fitvids.js', array('jquery'), WP_LIGHTBOX_VERSION);
        wp_enqueue_script('fitvidsjs');
    }
    wp_register_style('wplu', WP_LIGHTBOX_LIB_URL.'/css/wp_lightbox_ultimate.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('wplu');
    wp_register_style('wplucustom', WP_LIGHTBOX_PLUGIN_URL.'/wp_lightbox_ultimate_custom.css', false, WP_LIGHTBOX_VERSION);
    wp_enqueue_style('wplucustom');
}

function wplu_wrap_shortcode_content_with_class($atts, $content)
{
    $start_div = "";
    $end_div = "";
    $class = "";
    if(isset($atts['class']) && !empty($atts['class']))
    {
        $class .= $atts['class'];
    }
    if(isset($atts['show_play_button']) && !empty($atts['show_play_button'])){
        if(empty($class)){
            $class .= wplu_get_play_button_class();
        }
        else{
            $class .= ' '.wplu_get_play_button_class();
        }
    }
    if(!empty($class))
    {
        $start_div = '<div class="'.$class.'">';
        $end_div = '</div>';	
    }
    $final_content = <<<EOT
    $start_div
    $content
    $end_div
EOT;
    return $final_content;
}

function wplu_validate_parameter($atts)
{
    $error_msg = "";
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $width = $wp_lightbox_config->getValue('wp_lightbox_width');
    $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    if(empty($width) || empty($height))
    {
        $error_msg .= "<div>You need to specify a defult width and height for your media in the general settings</div>";
    }
    if(!$atts['link'])
    {
        $error_msg .= "<div>link parameter cannot be left empty</div>";
    }
    if($atts['anchor_type']=="text")
    {
        if(!$atts['text'])
        {
            $error_msg .= "<div>text parameter cannot be left empty</div>";
        }
    }
    else if($atts['anchor_type']=="image")
    {
        if(!$atts['source'])
        {
            $error_msg .= "<div>source parameter cannot be left empty</div>";
        }
    }
    else
    {
        $error_msg .= "<div>No anchor type specified</div>";
    }
    if(!empty($error_msg))
    {
        $error_msg = <<<EOT
        <div class="wp_lightbox_error_message">
            $error_msg
        </div>
EOT;
    }
    
    return $error_msg; 
}

function wplu_validate_amazon_s3_parameter($atts)
{
    $error_msg = "";
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    $width = $wp_lightbox_config->getValue('wp_lightbox_width');
    $height = $wp_lightbox_config->getValue('wp_lightbox_height');
    if(empty($width) || empty($height))
    {
        $error_msg .= "<div>You need to specify a default width and height for your media in the general settings</div>";
    }
    if($atts['name'])
    {
        if (preg_match("/http/", $atts['name']))
        {
            $error_msg .= '<div>You have entered a URL in the "name" field for your Protected S3 Video shortcode. You should only use the name of the video file in this field (Not the full URL of the file).</div>';	 
        }
    }
    else
    {
        $error_msg .=  '<div>Please specify the name of your S3 video in the "name" parameter</div>';
    }
    if($atts['bucket'])
    {
        if (preg_match("/http/", $atts['bucket']))
        {
            $error_msg .= '<div>You have entered a URL in the "bucket" field for your Protected S3 Video shortcode. You should only use the name of the bucket in this field (Not the full URL).</div>';	 
        }
    }
    else
    {
        $error_msg .= '<div>Please specify the name of your S3 bucket containing the video in the "bucket" parameter</div>';
    }
    $access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
    $secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
    if(empty($access_key) || empty($secret_key))
    {
        $error_msg .= '<div>You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the general settings menu</div>';
    }
    if($atts['anchor_type']=="text")
    {
        if(!$atts['text'])
        {
            $error_msg .= '<div>"text" parameter cannot be left empty</div>';
        }
    }
    else if($atts['anchor_type']=="image")
    {
        if(!$atts['source'])
        {
            $error_msg .= '<div>"source" parameter cannot be left empty</div>';
        }
    }
    else if($atts['anchor_type']=="embed")
    {
        
    }
    else
    {
        
        $error_msg .= "<div>No anchor type specified</div>";
    }
    if(!empty($error_msg))
    {
        $error_msg = <<<EOT
        <div class="wp_lightbox_error_message">
            $error_msg
        </div>
EOT;
    }
    
    return $error_msg; 
}

function wplu_youtube_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_enable_mp4_video_display')=='')
    {
        $wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have "Enable YouTube Video Display" checkbox enabled in the general settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    $error_msg = wplu_validate_parameter($atts);
    if(!empty($error_msg))
    {
        return $error_msg;
    }
    $browser = new WP_LIGHTBOX_CHECK_BROWSER();
    $device_name = $browser->getPlatform();
    $content = "";
    $atts['media_type'] = "youtube";
    if($device_name=="Android")
    {
        $atts['device'] = "Android";
        $shortcode_content = wplu_create_plain_link($atts);
        $content = <<<EOT
        $shortcode_content	
EOT;
    }
    else
    {
        $shortcode_content = wplu_create_responsive_link($atts);
        $content = <<<EOT
        $shortcode_content	
EOT;
    }
    $wp_lightbox_output = wplu_wrap_shortcode_content_with_class($atts, $content);
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wplu_vimeo_video_handler($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($wp_lightbox_config->getValue('wp_lightbox_enable_mp4_video_display')=='')
    {
        $wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
        $wp_lightbox_output .= 'You do not have "Enable Vimeo Video Display" checkbox enabled in the general settings';
        $wp_lightbox_output .= '</div>';
        return $wp_lightbox_output;
    }
    $error_msg = wplu_validate_parameter($atts);
    if(!empty($error_msg))
    {
        return $error_msg;
    }
    $browser = new WP_LIGHTBOX_CHECK_BROWSER();
    $device_name = $browser->getPlatform();
    $content = "";
    $atts['media_type'] = "vimeo";
    if($device_name=="Android")
    {
        $atts['device'] = "Android";
        $shortcode_content = wplu_create_plain_link($atts);
        $content = <<<EOT
        $shortcode_content	
EOT;
    }
    else
    {
        $shortcode_content = wplu_create_responsive_link($atts);
        $content = <<<EOT
        $shortcode_content	
EOT;
    }
    $wp_lightbox_output = wplu_wrap_shortcode_content_with_class($atts, $content);
    $wp_lightbox_output = wp_lightbox_filter_shortcode_content($wp_lightbox_output);
    return $wp_lightbox_output;
}

function wplu_create_responsive_link($atts)
{
    $title = "";
    $width = "";
    $height = "";
    $anchor = "";
    $autoplay = 'false';
    $type = "";
    if($atts['title'])
    {
        $title = $atts['title'];
    }
    if($atts['anchor_type']=="text")
    {
        $anchor = $atts['text'];;
    }
    if($atts['anchor_type']=="image")
    {
        $anchor = wp_lightbox_get_html_image_embed_code($atts);
    }
    if($atts['width'] && $atts['height'])
    {
        $width = $atts['width'];
        $height = $atts['height'];	
    }
    else
    {
        $width = $wp_lightbox_config->getValue('wp_lightbox_width');
        $height = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    if($atts['title'])
    {
        $title = $atts['title'];	
    }
    if($atts['autoplay'])
    {
        $autoplay = 'true';	
    }
    $atts = wplu_create_link_by_media_type($atts);
    $type = $atts['media_type'];
    $link = $atts['link'];
    
    $output = <<<EOT
    <a href="JavaScript:html5Lightbox.showLightbox($type, $autoplay, '$link', '$title', $width, $height);">$anchor</a>
EOT;
    
    return $output;
}

function wplu_create_plain_link($atts)
{
    $anchor = "";
    $link = $atts['link'];
    if($atts['anchor_type']=="text")
    {
        $anchor = $atts['text'];;
    }
    if($atts['anchor_type']=="image")
    {
        $anchor = wp_lightbox_get_html_image_embed_code($atts);
    }
    if($atts['device']=="Android")
    {
        if($atts['media_type']=="youtube")
        {
            $searched_parameter = 'watch?v=';
            $formatted_parameter = 'embed/';
            $link = str_replace($searched_parameter, $formatted_parameter, $link);
        }
        else if($atts['media_type']=="vimeo")
        {
            $searched_parameter = 'vimeo.com/';
            $formatted_parameter = 'player.vimeo.com/video/';
            $link = str_replace($searched_parameter, $formatted_parameter, $link);
        }
    }
    $output = <<<EOT
    <a href="$link">$anchor</a>
EOT;
    return $output;
}

function wplu_create_link_by_media_type($atts)
{
    if($atts['media_type']=="image")
    {
        $atts['media_type'] = "0";
    }
    else if($atts['media_type']=="swf")
    {
        $atts['media_type'] = "1";
    }
    else if($atts['media_type']=="mp4")
    {
        $atts['media_type'] = "2";
    }
    else if($atts['media_type']=="youtube")
    {
        $atts['media_type'] = "3";
        $link = $atts['link'];
        $searched_parameter = 'watch?v=';
        $formatted_parameter = 'embed/';
        $link = str_replace($searched_parameter,$formatted_parameter,$link);
        $atts['link'] = $link;
    }
    else if($atts['media_type']=="vimeo")
    {
        $atts['media_type'] = "4";
        $link = $atts['link'];
        $searched_parameter = 'vimeo.com/';
        $formatted_parameter = 'player.vimeo.com/video/';
        $link = str_replace($searched_parameter, $formatted_parameter, $link);
        $atts['link'] = $link;
    }
    else if($atts['media_type']=="pdf")
    {
        $atts['media_type'] = "5";
    }
    else if($atts['media_type']=="mp3")
    {
        $atts['media_type'] = "6";
    }
    else if($atts['media_type']=="flv")
    {
        $atts['media_type'] = "8";
    }
    else
    {
        $atts['media_type'] = "7";
    }
    return $atts;
}

function wplu_get_media_dimensions($atts)
{
    $wp_lightbox_config = WP_Lightbox_Config::getInstance();
    if($atts['width'] && $atts['height'])
    {
        //all good
    }
    else
    {
        $atts['width'] = $wp_lightbox_config->getValue('wp_lightbox_width');
        $atts['height'] = $wp_lightbox_config->getValue('wp_lightbox_height');	
    }
    return $atts; 
}

function wplu_get_play_button_code(){
    return '<div class="wplu_play_img_box"><img src="'.WP_LIGHTBOX_PLUGIN_URL.'/images/play.png"></div>';
}

function wplu_get_play_button_class(){
    return 'wplu_play_img_container';
}

function wplu_youtube_slider_display($atts)
{
    if(!isset($atts['id']) || empty($atts['id'])){
        $error_msg .= '<div class="wp_lightbox_error_message">';
        $error_msg .= 'You need to specify comma separated YouTube video ids in the <strong>id</strong> parameter';
        $error_msg .= '</div>';
        return $error_msg;
    }
    $theme = "default";
    if(isset($atts['theme']) || !empty($atts['theme'])){
        $theme = $atts['theme'];
    }
    $effect = "random";
    if(isset($atts['effect']) || !empty($atts['effect'])){
        $effect = $atts['effect'];
    }
    $slider_id = wp_lightbox_generate_unique_id();
    $video_ids = array_map('trim', explode(',', $atts['id']));
    $images = "";
    foreach($video_ids as $id){
        $images .= '<a href="http://www.youtube.com/watch?v='.$id.'?width=640&amp;height=480" rel="wp_lightbox_prettyPhoto"><img src="https://i1.ytimg.com/vi/'.$id.'/sddefault.jpg"></a>';
    }
    $output = <<<EOT
    <div class="slider-wrapper theme-{$theme}"> 
    <div class="ribbon"></div>    
    <div id="$slider_id" class="nivoSlider">
    $images
    </div> 
    </div>
    <script type="text/javascript" charset="utf-8">
    /* <![CDATA[ */
    jQuery(window).ready(function($){
        $(function(){
            $('#{$slider_id}').nivoSlider({
                effect: "$effect",
                slices:15,
                boxCols:8,
                boxRows:4,
                animSpeed:500,
                pauseTime:3000,
                startSlide:0,
                directionNav:true,
                controlNav:true,
                controlNavThumbs:false,
                pauseOnHover:true,
                manualAdvance:false    
            });
        });
    });
    /* ]]> */
    </script>    
EOT;
    return $output;
}

function wplu_gallery_shortcode($output,$attr)
{
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
            // 'ids' is explicitly ordered, unless you specify otherwise.
            if ( empty( $attr['orderby'] ) )
                    $attr['orderby'] = 'post__in';
            $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    /*
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
            return $output;
    */        
    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
            $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
            if ( !$attr['orderby'] )
                    unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
            'order'      => 'ASC',
            'orderby'    => 'menu_order ID',
            'id'         => $post ? $post->ID : 0,
            'itemtag'    => 'dl',
            'icontag'    => 'dt',
            'captiontag' => 'dd',
            'columns'    => 3,
            'size'       => 'thumbnail',
            'include'    => '',
            'exclude'    => '',
            'link'       => '',
            'wplu_rel'   => ''  //plugin specific parameter
    ), $attr, 'gallery'));

    $id = intval($id);
    if ( 'RAND' == $order )
            $orderby = 'none';

    if ( !empty($include) ) {
            $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

            $attachments = array();
            foreach ( $_attachments as $key => $val ) {
                    $attachments[$val->ID] = $_attachments[$key];
            }
    } elseif ( !empty($exclude) ) {
            $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
            $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
            return '';

    if ( is_feed() ) {
            $output = "\n";
            foreach ( $attachments as $att_id => $attachment )
                    $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
            return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
            $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
            $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
            $icontag = 'dt';

    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
            $gallery_style = "
            <style type='text/css'>
                    #{$selector} {
                            margin: auto;
                    }
                    #{$selector} .gallery-item {
                            float: {$float};
                            margin-top: 10px;
                            text-align: center;
                            width: {$itemwidth}%;
                    }
                    #{$selector} img {
                            border: 2px solid #cfcfcf;
                    }
                    #{$selector} .gallery-caption {
                            margin-left: 0;
                    }
                    /* see gallery_shortcode() in wp-includes/media.php */
            </style>";
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
            if ( ! empty( $link ) && 'file' === $link ){
                    $image_output = wp_get_attachment_link( $id, $size, false, false );
                    if(!empty($wplu_rel)){
                        $image_output = str_replace('<a href', '<a rel="'.$wplu_rel.'" href', $image_output);
                    }
            }        
            elseif ( ! empty( $link ) && 'none' === $link ){
                    $image_output = wp_get_attachment_image( $id, $size, false );
            }
            else{
                    $image_output = wp_get_attachment_link( $id, $size, true, false );
            }         
            $image_meta  = wp_get_attachment_metadata( $id );

            $orientation = '';
            if ( isset( $image_meta['height'], $image_meta['width'] ) )
                    $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

            $output .= "<{$itemtag} class='gallery-item'>";
            $output .= "
                    <{$icontag} class='gallery-icon {$orientation}'>
                            $image_output
                    </{$icontag}>";
            if ( $captiontag && trim($attachment->post_excerpt) ) {
                    $output .= "
                            <{$captiontag} class='wp-caption-text gallery-caption'>
                            " . wptexturize($attachment->post_excerpt) . "
                            </{$captiontag}>";
            }
            $output .= "</{$itemtag}>";
            if ( $columns > 0 && ++$i % $columns == 0 )
                    $output .= '<br style="clear: both" />';
    }

    $output .= "
                    <br style='clear: both;' />
            </div>\n";

    return $output;
}
