<?php

function wp_lightbox_plugin_options() 
{
    $wplu_plugin_tabs = array(
        'wp-lightbox-ultimate' => 'General Settings',
        'wp-lightbox-ultimate&action=library' => 'Library Settings'
    );
    echo '<div class="wrap"><h1>WP Lightbox Ultimate v'.WP_LIGHTBOX_VERSION.'</h1>';
    echo '<div id="poststuff"><div id="post-body">';  
    
    if(isset($_GET['page'])){
        $current = $_GET['page'];
        if(isset($_GET['action'])){
            $current .= "&action=".$_GET['action'];
        }
    }
    $content = '';
    $content .= '<h2 class="nav-tab-wrapper">';
    foreach($wplu_plugin_tabs as $location => $tabname)
    {
        if($current == $location){
            $class = ' nav-tab-active';
        } else{
            $class = '';    
        }
        $content .= '<a class="nav-tab'.$class.'" href="?page='.$location.'">'.$tabname.'</a>';
    }
    $content .= '</h2>';
    echo $content;

   if(isset($_GET['action']))
   { 
        switch ($_GET['action'])
        {
             case 'library':
                 wp_lightbox_add_library_menu();
                 break;
             case 'admin-function':
                 wp_lightbox_add_admin_functions_menu();
                 break;
        }
   }
   else
   {
       wp_lightbox_add_general_settings_menu();
   }
  
  echo '</div></div>';
  echo '</div>';

}

function wp_lightbox_add_general_settings_menu()
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if (isset($_POST['wp_lightbox_general_settings_update']))
	{
		$wp_lightbox_config->setValue('wp_lightbox_enable_jquery_checkbox', isset($_POST["wp_lightbox_enable_jquery_checkbox"])?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_disable_shortcode_formatting', isset($_POST["wp_lightbox_disable_shortcode_formatting"])?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_width', sanitize_text_field($_POST["wp_lightbox_width"]));
		$wp_lightbox_config->setValue('wp_lightbox_height', sanitize_text_field($_POST["wp_lightbox_height"]));
		
		$wp_lightbox_config->setValue('wp_lightbox_enable_mp4_video_display', isset($_POST["wp_lightbox_enable_mp4_video_display"])?1:'');
		
                $wp_lightbox_config->setValue('wp_lightbox_enable_amazon_s3_video_display', isset($_POST["wp_lightbox_enable_amazon_s3_video_display"])?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_amazon_s3_access_key', sanitize_text_field($_POST["wp_lightbox_amazon_s3_access_key"]));
		$wp_lightbox_config->setValue('wp_lightbox_amazon_s3_secret_key', sanitize_text_field($_POST["wp_lightbox_amazon_s3_secret_key"]));
		$wp_lightbox_config->setValue('wp_lightbox_amazon_s3_link_duration', sanitize_text_field($_POST["wp_lightbox_amazon_s3_link_duration"]));		

        echo '<div id="message" class="updated fade"><p>';                
        echo '<strong>Options Updated!';        
        echo '</strong></p></div>';  
        $wp_lightbox_config->saveConfig();     		
	}
	?>
	<div class="wrap">	
            
	<div id="poststuff">
	<div id="post-body">
	
	<div class="postbox">
	<h3 class="hndle"><label for="title">Quick Usage Guide</label></h3>
	<div class="inside">

	<p>1. Please use the appropriate shortcode to display your media with lightbox effect. All the shortcodes can be found on the <a href="http://www.tipsandtricks-hq.com/?p=3163#lightbox_ultimate_usage" target="_blank">plugin usage area</a>.</p>
    <p>2. You can customize the settings to change the way your media pops up. Please go through the settings tabs and configure your settings.</p>
    <p><strong>Note:</strong> If you are having any issues with this plugin please post it on our customer only support forum with the following two details:
    <br />a) URL of the page where you are using the shortcode.
    <br />b) The exact shortcode that you are using on that page.
    </p>
	
    </div></div>
		
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">    

    <div class="postbox">
    <h3 class="hndle"><label for="title">General Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable jQuery
	    </td><td align="left">
	    <input name="wp_lightbox_enable_jquery_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_enable_jquery_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use the jQuery JavaScript library with Lightbox Ultimate (Recommended).</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Disable Shortcode Formatting
	    </td><td align="left">
	    <input name="wp_lightbox_disable_shortcode_formatting" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_disable_shortcode_formatting')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this option to prevent your theme or a plugin from formatting Lightbox Ultimate shortcodes.</i><br /><br />
	    </td></tr>
		
		<tr valign="top"><td width="25%" align="left">
	    Width
	    </td><td align="left">
	    <input name="wp_lightbox_width" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_width'); ?>"/>
	    <br /><i>This is the width of the pop over video.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    height
	    </td><td align="left">
	    <input name="wp_lightbox_height" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_height'); ?>"/>
	    <br /><i>This is the height of the pop over video.</i><br /><br />
	    </td></tr>
	             	          
		</table>	    
	</div></div>
	
	<div class="postbox">
    <h3 class="hndle"><label for="title">MP4 Video Display Settings</label></h3>
	<div class="inside">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
	<tr valign="top"><td width="25%" align="left">
        Enable MP4 Video Display
        </td><td align="left">
        <input name="wp_lightbox_enable_mp4_video_display" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_enable_mp4_video_display')!='') echo ' checked="checked"';?> value="1"/>
        <br /><i>Check this box if you want to display mp4 video in lightbox.</i><br /><br />
        </td></tr>
	    
	</table>    
	</div></div>
	
	<div class="postbox">
        <h3 class="hndle"><label for="title">Amazon Web Services(AWS) Simple Storage Service (S3) Related Settings</label></h3>
	<div class="inside">
	
	<strong><i>You only need to use this section if you are trying to embed the private/protected videos stored on your Amazon S3 account.</i></strong>
	<br /><br />
	
	<table width="100%" border="0" cellspacing="0" cellpadding="6">
            
        <tr valign="top"><td width="25%" align="left">
        Enable Amazon S3 Video Display
        </td><td align="left">
        <input name="wp_lightbox_enable_amazon_s3_video_display" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_enable_amazon_s3_video_display')!='') echo ' checked="checked"';?> value="1"/>
        <br /><i>Check this box if you want to display your Amazon S3 private video in lightbox.</i><br /><br />
        </td></tr>
		
	<tr valign="top"><td width="25%" align="left">
        AWS Access Key ID
        </td><td align="left">
        <input name="wp_lightbox_amazon_s3_access_key" type="text" size="60" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key'); ?>"/>
        <br /><i>Your 20 character AWS Access Key ID.</i><br /><br />
        </td></tr>
	    
        <tr valign="top"><td width="25%" align="left">
        AWS Secret Access Key
        </td><td align="left">
        <input name="wp_lightbox_amazon_s3_secret_key" type="text" size="80" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key'); ?>"/>
        <br /><i>Your 40 character AWS Secret Access Key.</i><br /><br />
        </td></tr>
	    
        <tr valign="top"><td width="25%" align="left">
        AWS S3 Video URL Expiry Time After Page Load
        </td><td align="left">
        <input name="wp_lightbox_amazon_s3_link_duration" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration'); ?>"/>
        <br /><i>Number of seconds before the protected video URL expires after a page loads (example value: 300). The protected embedded video is available for access for this specified amount of time after the page loads.</i><br /><br />
        </td></tr>
	    
	</table>    
	</div></div>
		
    <div class="submit">
    <input type="submit" name="wp_lightbox_general_settings_update" class="button button-primary" value="<?php _e('Update options'); ?> &raquo;" />	    
    </div>		
	</form>
	
	</div></div>
	</div>	
	<?php 
}

function wp_lightbox_add_library_menu()
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
        include_once('class/class-prettyphoto.php');
        $wplu_prettyPhoto = WPLU_prettyPhoto::get_instance();
	if (isset($_POST['wp_lightbox_library_settings_update']))
	{
            $wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_checkbox',($_POST["wp_lightbox_prettyPhoto_checkbox"]=='1')?1:'');
            $wplu_prettyPhoto->animation_speed = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_animation_speed"]);
            $wplu_prettyPhoto->slideshow = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_slideshow"]);
            $wplu_prettyPhoto->autoplay_slideshow = isset($_POST["wp_lightbox_prettyPhoto_autoplay_slideshow"])?'true':'false';
            $wplu_prettyPhoto->opacity = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_opacity"]);
            $wplu_prettyPhoto->show_title = isset($_POST["wp_lightbox_prettyPhoto_show_title"])?'true':'false';
            $wplu_prettyPhoto->allow_resize = isset($_POST["wp_lightbox_prettyPhoto_allow_resize_window"])?'true':'false';
            $wplu_prettyPhoto->allow_expand = isset($_POST["wp_lightbox_prettyPhoto_allow_resized_image_expansion"])?'true':'false';
            $wplu_prettyPhoto->counter_separator_label = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_counter_separator_label"]);
            $wplu_prettyPhoto->theme = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_theme"]);
            $wplu_prettyPhoto->horizontal_padding = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_horizontal_padding"]);
            $wplu_prettyPhoto->hideflash = isset($_POST["wp_lightbox_prettyPhoto_hide_flash"])?'true':'false';
            $wplu_prettyPhoto->wmode = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_wmode"]);
            $wplu_prettyPhoto->autoplay = isset($_POST["wp_lightbox_prettyPhoto_autoplay"])?'true':'false';
            $wplu_prettyPhoto->modal = isset($_POST["wp_lightbox_prettyPhoto_modal"])?'true':'false';
            $wplu_prettyPhoto->deeplinking = isset($_POST["wp_lightbox_prettyPhoto_enable_deeplinking"])?'true':'false';
            $wplu_prettyPhoto->overlay_gallery = isset($_POST["wp_lightbox_prettyPhoto_display_overlay_thrumbnail_gallery"])?'true':'false';
            $wplu_prettyPhoto->overlay_gallery_max = sanitize_text_field($_POST["wp_lightbox_prettyPhoto_overlay_gallery_max"]);
            $wplu_prettyPhoto->keyboard_shortcuts = isset($_POST["wp_lightbox_prettyPhoto_keyboard_shortcuts"])?'true':'false';
            $wplu_prettyPhoto->ie6_fallback = isset($_POST["wp_lightbox_prettyPhoto_ie6_fallback"])?'true':'false';

            $wp_lightbox_config->setValue('wp_lightbox_fancybox_checkbox', isset($_POST["wp_lightbox_fancybox_checkbox"])?1:'');

            $wp_lightbox_config->setValue('wp_lightbox_colorbox_checkbox', isset($_POST["wp_lightbox_colorbox_checkbox"])?1:'');
            $wp_lightbox_config->setValue('wp_lightbox_colorbox_transition_type', sanitize_text_field($_POST["wp_lightbox_colorbox_transition_type"]));
            $wp_lightbox_config->setValue('wp_lightbox_colorbox_opacity', sanitize_text_field($_POST["wp_lightbox_colorbox_opacity"]));
            $wp_lightbox_config->setValue('wp_lightbox_colorbox_overlayclose', isset($_POST["wp_lightbox_colorbox_overlayclose"])?1:'');

            $wp_lightbox_config->setValue('wp_lightbox_flowplayer_checkbox', isset($_POST["wp_lightbox_flowplayer_checkbox"])?1:'');
            //$wp_lightbox_config->setValue('wp_lightbox_flowplayer_autoplay',($_POST["wp_lightbox_flowplayer_autoplay"]=='1')?1:'');
            //$wp_lightbox_config->setValue('wp_lightbox_use_flowplayer_unlimited_checkbox',($_POST["wp_lightbox_use_flowplayer_unlimited_checkbox"]=='1')?1:'');
            $wp_lightbox_config->setValue('wp_lightbox_flowplayer_commercial_license_key', sanitize_text_field($_POST["wp_lightbox_flowplayer_commercial_license_key"]));
            $wp_lightbox_config->setValue('wp_lightbox_flowplayer_commercial_logo', sanitize_text_field($_POST["wp_lightbox_flowplayer_commercial_logo"]));
            //$wp_lightbox_config->setValue('wp_lightbox_flowplayer_commercial_play_button',trim($_POST["wp_lightbox_flowplayer_commercial_play_button"]));
            //$wp_lightbox_config->setValue('wp_lightbox_flowplayer_commercial_play_button_width',trim($_POST["wp_lightbox_flowplayer_commercial_play_button_width"]));
            //$wp_lightbox_config->setValue('wp_lightbox_flowplayer_commercial_play_button_height',trim($_POST["wp_lightbox_flowplayer_commercial_play_button_height"]));

            $wp_lightbox_config->setValue('wp_lightbox_html5_checkbox', isset($_POST["wp_lightbox_html5_checkbox"])?1:'');
            $wp_lightbox_config->setValue('wp_lightbox_html5_autoplay', isset($_POST["wp_lightbox_html5_autoplay"])?1:'');
		
            WPLU_prettyPhoto::save_object($wplu_prettyPhoto);
            $wp_lightbox_config->saveConfig(); 
            echo '<div id="message" class="updated fade"><p>';                
            echo '<strong>Options Updated!';        
            echo '</strong></p></div>';  
            		
	}
	?>
	<div class="wrap">
	
	<div id="poststuff">
	<div id="post-body">
		
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">    

    <div class="postbox">
    <h3 class="hndle"><label for="title">PrettyPhoto Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
            <tr valign="top"><td width="25%" align="left">
            Enable PrettyPhoto
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use prettyPhoto lightbox effect</i><br /><br />
	    </td></tr>
		    
	    <tr valign="top"><td width="25%" align="left">
	    Animation speed
	    </td><td align="left">
	    <?php $wp_lightbox_animation_speed_temp = $wplu_prettyPhoto->animation_speed;?>
            <select name="wp_lightbox_prettyPhoto_animation_speed" >
                    <option <?php echo ($wp_lightbox_animation_speed_temp==='fast')?'selected="selected"':'';?> value="fast">Fast</option>
                    <option <?php echo ($wp_lightbox_animation_speed_temp==='slow')?'selected="selected"':'';?> value="slow">Slow</option>
                    <option <?php echo ($wp_lightbox_animation_speed_temp==='normal')?'selected="selected"':'';?> value="normal">Normal</option>
            </select>
	    <br /><i>Animation speed of the popover window [default: fast].</i><br /><br />
	    </td></tr> 
            
            <tr valign="top"><td width="25%" align="left">
	    Slideshow
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_slideshow" type="text" size="10" value="<?php echo $wplu_prettyPhoto->slideshow; ?>"/>
	    <br /><i>To enable slideshow enter the interval time in ms [default: 5000]. To disable it enter false</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Autoplay slideshow
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_autoplay_slideshow" type="checkbox"  <?php if($wplu_prettyPhoto->autoplay_slideshow=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Enable this option to automatically play slideshow [default: unchecked]</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Opacity
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_opacity" type="text" size="10" value="<?php echo $wplu_prettyPhoto->opacity; ?>"/>
	    <br /><i>This is the opacity of the popover window [default: 0.80]. Enter a value between 0 and 1.</i><br /><br />
	    </td></tr>
    
	    <tr valign="top"><td width="25%" align="left">
	    Show Title
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_show_title" type="checkbox"  <?php if($wplu_prettyPhoto->show_title=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Enable this option if you want to show the title</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Resize Window
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_allow_resize_window" type="checkbox" <?php if($wplu_prettyPhoto->allow_resize=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Once checked the overlay window will be automatically resized to fit in the viewport</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Allow Image Expansion
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_allow_resized_image_expansion" type="checkbox" <?php if($wplu_prettyPhoto->allow_expand=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Once checked user will be able to expand a resized image (only available if <strong>Resize Window</strong> option is checked).</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Counter separator label
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_counter_separator_label" type="text" size="10" value="<?php echo $wplu_prettyPhoto->counter_separator_label; ?>"/>
	    <br /><i>The separator for the gallery counter in lightbox [default: /].</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Theme
	    </td><td align="left">
	    <?php $wp_lightbox_theme_temp = $wplu_prettyPhoto->theme;?>
            <select name="wp_lightbox_prettyPhoto_theme" >
                    <option <?php echo ($wp_lightbox_theme_temp==='pp_default')?'selected="selected"':'';?> value="pp_default">PrettyPhoto default</option>
                    <option <?php echo ($wp_lightbox_theme_temp==='light_rounded')?'selected="selected"':'';?> value="light_rounded">Light Rounded</option>
                    <option <?php echo ($wp_lightbox_theme_temp==='dark_rounded')?'selected="selected"':'';?> value="dark_rounded">Dark Rounded</option>
                    <option <?php echo ($wp_lightbox_theme_temp==='light_square')?'selected="selected"':'';?> value="light_square">Light Square</option>
                    <option <?php echo ($wp_lightbox_theme_temp==='dark_square')?'selected="selected"':'';?> value="dark_square">Dark Square</option>
                    <option <?php echo ($wp_lightbox_theme_temp==='facebook')?'selected="selected"':'';?> value="facebook">Facebook</option>
            </select>
	    <br /><i>Select the theme you want to use</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Horizontal padding
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_horizontal_padding" type="text" size="10" value="<?php echo $wplu_prettyPhoto->horizontal_padding; ?>"/>
	    <br /><i>The padding on each side of the picture [default: 20].</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Hide Flash
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_hide_flash" type="checkbox" <?php if($wplu_prettyPhoto->hideflash=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Hides all the flash objects on a page. Enable this option if flash appears over prettyPhoto [default: unchecked]</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    wmode
	    </td><td align="left">
	    <?php $wp_lightbox_pp_wmode = $wplu_prettyPhoto->wmode;?>
            <select name="wp_lightbox_prettyPhoto_wmode" >
                    <option <?php echo ($wp_lightbox_pp_wmode==='opaque')?'selected="selected"':'';?> value="opaque">opaque</option>
            </select>
	    <br /><i>Set the flash wmode attribute [default: opaque]</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Autoplay
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_autoplay" type="checkbox" <?php if($wplu_prettyPhoto->autoplay=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to automatically start a video on overlay</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Modal
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_modal" type="checkbox" <?php if($wplu_prettyPhoto->modal=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Once checked only the close button will close the popover window</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Enable Deeplinking
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_enable_deeplinking" type="checkbox" <?php if($wplu_prettyPhoto->deeplinking=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this option if you want to enable deeplinking (The URL of the adddress bar will be automatically updated when the lightbox window pops up).</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Display Thumbnails in Overlay
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_display_overlay_thrumbnail_gallery" type="checkbox" <?php if($wplu_prettyPhoto->overlay_gallery=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Once checked a gallery of thumbnails will be displayed in the overlay window on mouse over (Only available if you are using the gallery option).</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Overlay gallery max
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_overlay_gallery_max" type="text" size="10" value="<?php echo $wplu_prettyPhoto->overlay_gallery_max; ?>"/>
	    <br /><i>Maximum number of pictures in the overlay gallery [default: 30].</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    Keyboard shortcuts
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_keyboard_shortcuts" type="checkbox" <?php if($wplu_prettyPhoto->keyboard_shortcuts=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Disable this option if you open forms inside prettyPhoto [default: checked].</i><br /><br />
	    </td></tr>
            
            <tr valign="top"><td width="25%" align="left">
	    IE6 fallback
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_ie6_fallback" type="checkbox" <?php if($wplu_prettyPhoto->ie6_fallback=='true') echo ' checked="checked"';?> value="1"/>
	    <br /><i>compatibility fallback for IE6 [default: checked].</i><br /><br />
	    </td></tr>
	           	          
            </table>	    
	</div></div>
	
	 <div class="postbox">
    <h3 class="hndle"><label for="title">Fancybox Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable Fancybox
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use fancybox lightbox effect</i><br /><br />
	    </td></tr>
                
            <!--    
	    
	    <tr valign="top"><td width="25%" align="left">
	    Overlay Opacity
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_overlayopacity" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_fancybox_overlayopacity'); ?>"/>
	    <br /><i>This is the opacity of the overlay. Enter a value between 0 and 1.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Show Title
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_show_title" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_fancybox_show_title')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to show the title</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Title Position
	    </td><td align="left">
	    <?php $wp_lightbox_fancybox_titlePosition = $wp_lightbox_config->getValue('wp_lightbox_fancybox_titlePosition');?>
    	<select name="wp_lightbox_fancybox_titlePosition" >
    		<option <?php echo ($wp_lightbox_fancybox_titlePosition==='outside')?'selected="selected"':'';?> value="outside">Outside</option>
    		<option <?php echo ($wp_lightbox_fancybox_titlePosition==='inside')?'selected="selected"':'';?> value="inside">Inside</option>
    		<option <?php echo ($wp_lightbox_fancybox_titlePosition==='over')?'selected="selected"':'';?> value="over">Over</option>
    	</select>
	    <br /><i>Select the position of the title. Can be set to 'outside', 'inside' or 'over'.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Show Close Button
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_showCloseButton" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_fancybox_showCloseButton')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to show close button</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Transition Type
	    </td><td align="left">
	    <?php $wp_lightbox_fancybox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_fancybox_transition_type');?>
    	<select name="wp_lightbox_fancybox_transition_type" >
    		<option <?php echo ($wp_lightbox_fancybox_transition_type==='elastic')?'selected="selected"':'';?> value="elastic">Elastic</option>
    		<option <?php echo ($wp_lightbox_fancybox_transition_type==='fade')?'selected="selected"':'';?> value="fade">Fade</option>
    		<option <?php echo ($wp_lightbox_fancybox_transition_type==='none')?'selected="selected"':'';?> value="none">None</option>
    	</select>
	    <br /><i>Select transition type. Can be set to 'elastic', 'fade' or 'none'.</i><br /><br />
	    </td></tr>
            
            -->
	             	          
		</table>	    
	</div></div>
	
	<div class="postbox">
    <h3 class="hndle"><label for="title">ColorBox Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable Colorbox
	    </td><td align="left">
	    <input name="wp_lightbox_colorbox_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use ColorBox lightbox effect</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Transition Type
	    </td><td align="left">
	    <?php $wp_lightbox_colorbox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_colorbox_transition_type');?>
    	<select name="wp_lightbox_colorbox_transition_type" >
    		<option <?php echo ($wp_lightbox_colorbox_transition_type==='elastic')?'selected="selected"':'';?> value="elastic">Elastic</option>
    		<option <?php echo ($wp_lightbox_colorbox_transition_type==='fade')?'selected="selected"':'';?> value="fade">Fade</option>
    		<option <?php echo ($wp_lightbox_colorbox_transition_type==='none')?'selected="selected"':'';?> value="none">None</option>
    	</select>
	    <br /><i>Select the transition type of the popover window.</i><br /><br />
	    </td></tr>
	    
	   	<tr valign="top"><td width="25%" align="left">
	    Opacity
	    </td><td align="left">
	    <input name="wp_lightbox_colorbox_opacity" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_colorbox_opacity'); ?>"/>
	    <br /><i>This is the opacity of the overlay. Enter a value between 0 and 1.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Close Overlay
	    </td><td align="left">
	    <input name="wp_lightbox_colorbox_overlayclose" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_colorbox_overlayclose')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Once checked only the close button will close the overlay</i><br /><br />
	    </td></tr>
	             	          
		</table>	    
	</div></div>
	
	<div class="postbox">
    <h3 class="hndle"><label for="title">Flowplayer Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable Flowplayer
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use overlay display with Flowplayer</i><br /><br />
	    </td></tr>
	    <!--
	    <tr valign="top"><td width="25%" align="left">
		Autoplay
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_autoplay" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_autoplay')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to automatically start the videos on overlay</i><br /><br />
	    </td></tr>
	    -->	    
	 	</table>    
	</div></div>
	
	<div class="postbox">
    <h3 class="hndle"><label for="title">Flowplayer Commercial Settings <i>(Additionally these settings will be applied if you have a valid Flowplayer License Key)</i></label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
				
		<tr valign="top"><td width="25%" align="left">
	    Flowplayer License Key
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_commercial_license_key" type="text" size="60" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_license_key'); ?>"/>
	    <br /><i>Enter your Flowplayer commercial license key if you have one. You can get a Flowplayer license key from <a href="http://flowplayer.org/download/" target="_blank">flowplayer site</a></i>. Please note that only a license key issued for the new Flowplayer HTML5 will work with this plugin. A key issued for the old Flowplayer flash will not work. 
	    <br />
            <!--
            <br /><input name="wp_lightbox_use_flowplayer_unlimited_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_use_flowplayer_unlimited_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    Use Lightbox Ultimate Specific Flowplayer Key
	    <br /><i>Check this option if you are using a flowplayer key that you purchased from us.</i>
	    <br /><br />-->
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Custom Logo
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_commercial_logo" type="text" size="80" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_logo'); ?>"/>
	    <br /><i>The URL of the logo that you want to use for branding (e.g. http://flowplayer.org/media/img/mylogo.png)</i><br /><br />
	    </td></tr>
	    <!--
	    <tr valign="top"><td width="25%" align="left">
	    Custom Play Button
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_commercial_play_button" type="text" size="80" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_play_button'); ?>"/>
	    <br /><i>The URL of the play button (this can be a JPG, PNG or SWF file).</i><br /><br />
	    </td></tr>
	     
	    <tr valign="top"><td width="25%" align="left">
	    Play Button Width
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_commercial_play_button_width" type="text" size="40" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_play_button_width'); ?>"/>
	    <br /><i>The width of the play button (percentage value). For example - 15%.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Play Button Height
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_commercial_play_button_height" type="text" size="40" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_flowplayer_commercial_play_button_height'); ?>"/>
	    <br /><i>The height of the play button (percentage value). For example - 15%.</i><br /><br />
	    </td></tr>
	    --> 	    
            </table>    
	</div></div>
	
	<div class="postbox">
    <h3 class="hndle"><label for="title">HTML5 Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable HTML5
	    </td><td align="left">
	    <input name="wp_lightbox_html5_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use overlay display with HTML5</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Autoplay
	    </td><td align="left">
	    <input name="wp_lightbox_html5_autoplay" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_html5_autoplay')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to automatically start the videos on overlay</i><br /><br />
	    </td></tr>
	    	    
	 	</table>    
	</div></div>	
	
    <div class="submit">
    <input type="submit" name="wp_lightbox_library_settings_update" class="button button-primary" value="<?php _e('Update options'); ?> &raquo;" />	    
    </div>		
	</form>
	
	</div></div>
	</div>	
	<?php
}

function wp_lightbox_add_admin_functions_menu()
{
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	if (isset($_POST['wp_lightbox_block_script_settings_update']))
	{
		$update_option = true;
		$script_url = stripslashes($_POST["wp_lightbox_removable_script_url"]);
		$script_url = trim($script_url);
		if(!empty($script_url))
		{
			$script_start_found = strstr($script_url,"<script");
			$script_end_found = strstr($script_url,"</script>");
			$error_message = "Your URL doesn't seem right.";
			if(!$script_start_found || !$script_end_found)
			{
				$error_message .= " Each URL must be enclosed with &lt;script&gt; and &lt;/script&gt; tag.";
				echo '<div id="message" class="updated fade"><p>';                
	        	echo '<strong>'.$error_message;        
	        	echo '</strong></p></div>';
	        	$update_option = false;			
			}
		}
		if($update_option)
		{
			$wp_lightbox_config->setValue('wp_lightbox_removable_script_url',$script_url);
	        echo '<div id="message" class="updated fade"><p>';                
	        echo '<strong>Options Updated!';        
	        echo '</strong></p></div>';  
	        $wp_lightbox_config->saveConfig();
		}     		
	}
	?>
	<div class="wrap">
	<br />
	<h3>WP Lightbox - Admin Functions v<?php echo WP_LIGHTBOX_VERSION; ?></h3>	
	<div class="lbu_yellow_box">
	<p>Usually you don't have to use this section. Only use it if you are having an issue whereby the lightbox isn't working when the anchor text/image is clicked.
	<br />A detailed example of this type of issue is explained <a href="http://www.tipsandtricks-hq.com/forum/topic/lightbox-ultimate-clicking-on-the-anchor-does-not-display-any-overlay" target="_blank">here</a></p>
	</div>
	
	<div id="poststuff">
	<div id="post-body">
	<div class="postbox">
	<h3 class="hndle"><label for="title">Quick Usage Guide</label></h3>
	<div class="inside">

	<p>1. Please enter the URL of the script(s) you don't want to include when the page loads.</p>
	<p>   For example: <strong>&lt;script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'&gt;&lt;/script&gt;</strong></p>
    <p>2. If there are multiple scripts you can separate them with commas.</p>
    <p>   For example: <strong>&lt;script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'&gt;&lt;/script&gt;,&lt;script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2'&gt;&lt;/script&gt;</strong></p>

    </div></div>	
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">    

    <div class="postbox">
    <h3 class="hndle"><label for="title">Block Conflicting Script(s)</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
	    URL of the script(s)
	    </td><td align="left">
	    <textarea name="wp_lightbox_removable_script_url" rows="10" cols="70"><?php echo $wp_lightbox_config->getValue('wp_lightbox_removable_script_url'); ?></textarea>
	    <br /><i>This script will not be included when the page loads.</i><br /><br />
	    </td></tr>
	             	          
		</table>	    
	</div></div>	
	
    <div class="submit">
    <input type="submit" name="wp_lightbox_block_script_settings_update" value="<?php _e('Update options'); ?> &raquo;" />	    
    </div>		
	</form>
	
	</div></div>
	</div>
	<?php	
}
