<?php
function wp_lightbox_generate_unique_id()
{
	$prefix = "wplu";
	$unique_id = $prefix.uniqid();
	return $unique_id;
}

function wp_lightbox_is_valid_url($url)
{
        $url = @parse_url($url);
        if ( ! $url) {
            return false;
        }
        $url = array_map('trim', $url);
        $url['port'] = (!isset($url['port'])) ? 80 : (int)$url['port'];
        $path = (isset($url['path'])) ? $url['path'] : '';
        if ($path == '')
        {
            $path = '/';
        }
        $path .= ( isset ( $url['query'] ) ) ? "?$url[query]" : '';
        if ( isset ( $url['host'] ) AND $url['host'] != gethostbyname ( $url['host'] ) )
        {
            if ( PHP_VERSION >= 5 )
            {
                $headers = get_headers("$url[scheme]://$url[host]:$url[port]$path");
            }
            else
            {
                $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30);
                if ( ! $fp )
                {
                    return false;
                }
                fputs($fp, "HEAD $path HTTP/1.1\r\nHost: $url[host]\r\n\r\n");
                $headers = fread ( $fp, 128 );
                fclose ( $fp );
            }
            $headers = ( is_array ( $headers ) ) ? implode ( "\n", $headers ) : $headers;
            return ( bool ) preg_match ( '#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers );
        }
        return false;
}

function wp_lightbox_modify_buffer($buffer)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	$scripts_to_be_removed = $wp_lightbox_config->getValue('wp_lightbox_removable_script_url');
	if(empty($scripts_to_be_removed))
	{
		return $buffer;
	}
	$intercepted_script = "";
	$replaced_with = ""; 
	$exploded_scripts = explode(",",$scripts_to_be_removed);
	foreach ($exploded_scripts as $intercepted_script)
	{
		if(!empty($intercepted_script))
		{
			$search_script = trim($intercepted_script);
			$buffer = str_replace($search_script, $replaced_with, $buffer);
		}
	}
	return $buffer;
}

function wp_lightbox_filter_shortcode_content($content)
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if($wp_lightbox_config->getValue('wp_lightbox_disable_shortcode_formatting'))
	{
		$content = trim(preg_replace('/\s+/', ' ', $content));
		$content = str_replace(array("\r", "\r\n", "\n"), '', $content);	
	}
	return $content;	
}

function wplu_is_video_type($url)
{
    if (strpos($url, 'youtube') > 0) 
    {
        return 'youtube';
    } 
    else if(strpos($url, 'youtu') > 0) 
    {
        return 'youtube';
    }
    else if(strpos($url, 'vimeo') > 0) 
    {
        return 'vimeo';
    } 
    else 
    {
        return 'unknown';
    }
}

function wplu_get_youtube_auto_thumb($atts)
{
    $video_id = $atts['video_id'];
    $pieces = explode("&", $video_id);
    $video_id = $pieces[0];

    $anchor_replacement = "";
    $anchor_replacement = '<div class="wplu_auto_thumb_box_wrapper"><div class="wplu_auto_thumb_box">';
    $anchor_replacement .= '<img src="http://img.youtube.com/vi/'.$video_id.'/0.jpg" class="wplu_auto_anchor_image" alt="" />';
    $anchor_replacement .= '<div class="wplu_auto_thumb_play"><img src="'.WP_LIGHTBOX_PLUGIN_URL.'/images/play_red.png" class="wplu_playbutton" /></div>';
    $anchor_replacement .= '</div></div>';

    return $anchor_replacement; 
}

function wplu_get_youtube_video_id($url)
{
    $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    preg_match($pattern, $url, $matches); 
    //preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=[0-9]\/)[^&\n]+|(?<=v=)[^&\n]+#", $url, $match);
    return $matches[1];
}

function wplu_get_vimeo_auto_thumb($atts)
{
    $video_id = $atts['video_id'];
    $pieces = explode("&", $video_id);
    $video_id = $pieces[0];
    $anchor_replacement = "";

    $VideoInfo = wplu_getVimeoInfo($video_id);
    $thumb = $VideoInfo['thumbnail_medium'];
    //print_r($VideoInfo);
    $anchor_replacement = '<div class="wplu_auto_thumb_box_wrapper"><div class="wplu_auto_thumb_box">';
    $anchor_replacement .= '<img src="'.$thumb.'" class="wplu_auto_anchor_image" alt="" />';
    $anchor_replacement .= '<div class="wplu_auto_thumb_play"><img src="'.WP_LIGHTBOX_PLUGIN_URL.'/images/play_red.png" class="wplu_playbutton" /></div>';
    $anchor_replacement .= '</div></div>';

    return $anchor_replacement;
}

function wplu_get_vimeo_video_id($url)
{
    preg_match('#https?://(player\.)?vimeo\.com(/video)?/(\d+)#i', $url, $match);
    return $match[3];
}

function wplu_getVimeoInfo($id) 
{
    if (!function_exists('curl_init')) die('CURL is not installed!');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://vimeo.com/api/v2/video/$id.php");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = unserialize(curl_exec($ch));
    $output = $output[0];
    curl_close($ch);
    return $output;
}
