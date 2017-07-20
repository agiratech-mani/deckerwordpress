<?php
/* Finding the path to the wp-admin folder */
$iswin = preg_match('/:\\\/', dirname(__file__));
$slash = ($iswin) ? "\\" : "/";

$wp_path = preg_split('/(?=((\\\|\/)wp-content)).*/', dirname(__file__));
$wp_path = (isset($wp_path[0]) && $wp_path[0] != "") ? $wp_path[0] : $_SERVER["DOCUMENT_ROOT"];

/** Load WordPress Administration Bootstrap */
require_once($wp_path . $slash . 'wp-load.php');
require_once($wp_path . $slash . 'wp-admin' . $slash . 'admin.php');


// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__( "You are not allowed to be here", 'post-snippets' ));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>WP Lightbox Ultimate Shortcodes</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
    <style type="text/css">
    .shortcode_list{
    text-align:center;
    }
    #eStore_shortcodes_slct{
    font-size:13px;
    }
    </style>	
    	
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
	
	function insert_wp_lightbox_ultimate_shortcode() 
	{

		var insertString;
		var selected_option_text = document.getElementById("wp_lightbox_ultimate_shortcodes_slct").value;

//		if(selected_option_text=='[wp_lightbox_prettyPhoto_anchor_text_image link="#" text="#" description="#"]')
//		{
//			var pos = selected_option_text.indexOf('#');
//			var prod_id = prompt("WP Lightbox Ultimate Shortcode", "Enter the URL of the Image you want to popup");
//			selected_option_text = selected_option_text.replace('#',prod_id);
//			pos = selected_option_text.indexOf('#');
//			prod_id = prompt("WP Lightbox Ultimate Shortcode", "Enter the anchor text for the Image");
//			selected_option_text = selected_option_text.replace('#',prod_id);
//			pos = selected_option_text.indexOf('#');
//			prod_id = prompt("WP Lightbox Ultimate Shortcode", "Enter the description for the image");
//			selected_option_text = selected_option_text.replace('#',prod_id);
//		}
		
		insertString = selected_option_text;
		//alert(selected_option_text);
		//alert("test");
				
		if(window.tinyMCE) {
			//window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, insertString);
			tinyMCEPopup.execCommand("mceBeginUndoLevel");
			tinyMCEPopup.execCommand('mceInsertContent', false, insertString);
			tinyMCEPopup.execCommand("mceEndUndoLevel");
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		return;
	}
	</script>
	<base target="_self" />
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none">

<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="wp_lightbox_ultimate_shortcode_popup" action="#">

	<div class="shortcode_list">
		<p><strong>Please select a shortcode that you wish to use then hit the insert button</strong></p>
		
		<select name="wp_lightbox_ultimate_shortcodes_slct" id="wp_lightbox_ultimate_shortcodes_slct">
			<option value='[wp_lightbox_prettyPhoto_anchor_text_image link="http://www.example.com/overlay-image.jpg" text="Click here to open the image" description="Image description goes here"]'>PrettyPhoto - PopUp Image from the anchor text</option>
			<option value='[wp_lightbox_prettyPhoto_image link="http://www.example.com/overlay-image.jpg" description="overlay image description goes here" source="http://www.example.com/anchor-image.jpg" title="overlay image title goes here"]'>PrettyPhoto - PopUp Image from the embedded Image</option>
			<option value='[wp_lightbox_prettyPhoto_anchor_text_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" width="500" height="500" text="Click here to open the Youtube video" description="Video description goes here"]'>PrettyPhoto - PopUp Youtube video from the anchor text</option>
			<option value='[wp_lightbox_prettyPhoto_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" width="500" height="500" description="Video description goes here" source="http://www.example.com/anchor-image.jpg" title="Video title goes here"]'>PrettyPhoto - PopUp Youtube video from the embedded Image</option>
			<option value='[wp_lightbox_prettyPhoto_anchor_text_video link="http://vimeo.com/15449281" width="500" height="500" text="Click here to open the Vimeo video" description="Video description goes here"]'>PrettyPhoto - PopUp Vimeo video from the anchor text</option>						
			<option value='[wp_lightbox_prettyPhoto_video link="http://vimeo.com/15449281" width="500" height="500" description="video description goes here" source="http://www.example.com/anchor-image.jpg" title="video title goes here"]'>PrettyPhoto - PopUp Vimeo video from the embedded Image</option>						
			<option value='[wp_lightbox_prettyPhoto_anchor_text_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" width="500" height="500" text="Click here to open the Flash video" description="Video description goes here"]'>PrettyPhoto - PopUp flash video from the anchor text</option>						
			<option value='[wp_lightbox_prettyPhoto_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" width="500" height="500" description="Video description goes here" source="http://www.example.com/anchor-image.jpg" title="Video title goes here"]'>PrettyPhoto - PopUp flash video from the embedded Image</option>
			<option value='[wp_lightbox_prettyPhoto_anchor_text_pdf link="http://www.example.com/test-ebook.pdf" width="640" height="480" title="Title goes here" text="Click here to open the pdf file"]'>PrettyPhoto - PopUp pdf file from the anchor text</option>
			<option value='[wp_lightbox_prettyPhoto_pdf link="http://www.example.com/test-ebook.pdf" width="640" height="480" title="Title goes here" source="http://www.example.com/anchor-image.jpg"]'>PrettyPhoto - PopUp pdf file from the embedded Image</option>
			<option value='[wp_lightbox_anchor_text_display_external_page link="http://www.example.com/my-test-page" width="640" height="480" title="title goes here" text="click here to open the external page"]'>PopUp external page from the anchor text</option>
			<option value='[wp_lightbox_display_external_page link="http://www.example.com/my-test-page" width="640" height="480" title="title goes here" source="http://www.example.com/anchor-image.jpg"]'>PopUp external page from the embedded Image</option>						
			<option value='[wp_lightbox_fancybox_anchor_text_image link="http://www.example.com/overlay-image.jpg" title="Image title goes here" text="Click here to open the image"]'>Fancybox - PopUp Image from the anchor text</option>						
			<option value='[wp_lightbox_fancybox_image link="http://www.example.com/overlay-image.jpg" title="Image Title goes here" source="http://www.example.com/anchor-image.jpg"]'>Fancybox - PopUp Image from the embedded Image</option>						
			<option value='[wp_lightbox_fancybox_anchor_text_youtube_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" title="Video title goes here" text="Click here to open the Youtube video"]'>Fancybox - PopUp Youtube video from the anchor text</option>						
			<option value='[wp_lightbox_fancybox_youtube_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]'>Fancybox - PopUp Youtube video from the embedded Image</option>						
			<option value='[wp_lightbox_fancybox_anchor_text_vimeo_video link="http://vimeo.com/15449281" title="Video title goes here" text="Click here to open the Vimeo Video"]'>Fancybox - PopUp Vimeo video from the anchor text</option>						
			<option value='[wp_lightbox_fancybox_vimeo_video link="http://vimeo.com/15449281" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]'>Fancybox - PopUp Vimeo video from the embedded Image</option>	
			<option value='[wp_lightbox_fancybox_anchor_text_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" text="Click here to open the Flash video"]'>Fancybox - PopUp Flash video from the anchor text</option>								
			<option value='[wp_lightbox_fancybox_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" source="http://www.example.com/anchor-image.jpg"]'>Fancybox - PopUp Flash video from the embedded Image</option>						
			<option value='[wp_lightbox_colorbox_anchor_text_image link="http://www.example.com/overlay-image.jpg" title="Image title goes here" text="Click here to open the image"]'>Colorbox - PopUp Image from the anchor text</option>						
			<option value='[wp_lightbox_colorbox_image link="http://www.example.com/overlay-image.jpg" source="http://www.example.com/anchor-image.jpg"]'>Colorbox - PopUp Image from the embedded image</option>						
			<option value='[wp_lightbox_colorbox_anchor_text_video link="http://www.youtube.com/embed/66TuSJo4dZM" title="Video title goes here" text="Click here to open the Youtube video"]'>Colorbox - PopUp Youtube video from the anchor text</option>						
			<option value='[wp_lightbox_colorbox_video link="http://www.youtube.com/embed/66TuSJo4dZM" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]'>Colorbox - PopUp Youtube video from the embedded Image</option>
			<option value='[wp_lightbox_colorbox_anchor_text_video link="http://player.vimeo.com/video/15449281" title="Video title goes here" text="Click here to open the Vimeo video "] '>Colorbox - PopUp Vimeo video from the anchor text</option>						
			<option value='[wp_lightbox_colorbox_video link="http://player.vimeo.com/video/15449281" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]'>Colorbox - PopUp Vimeo video from the embedded Image</option>
			<option value='[wp_lightbox_colorbox_anchor_text_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" title="Video title goes here" text="Click here to open the Flash video"]'>Colorbox - PopUp Flash video from the anchor text</option>						
			<option value='[wp_lightbox_colorbox_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]'>Colorbox - PopUp Flash video from the embedded Image</option>
			<option value='[wp_lightbox_anchor_text_mp4_video link="http://www.example.com/h264-encoded-video.mp4" width="640" height="480" text="click here to open the video"]'>All browsers compatible MP4 video display - PopUp video from the anchor text</option>	
			<option value='[wp_lightbox_mp4_video link="http://www.example.com/h264-encoded-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]'>All browsers compatible MP4 video display - PopUp video from the embedded Image</option>
			<option value='[wp_lightbox_flowplayer_anchor_text_video link="http://www.example.com/test-video.mp4" width="640" height="480" text="Click here to open the video"]'>Flowplayer - PopUp FLV/MP4 video from the anchor text</option>	
			<option value='[wp_lightbox_flowplayer_video link="http://www.example.com/test-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]'>Flowplayer - PopUp FLV/MP4 video from the embedded Image</option>
			<!--
			<option value='[wp_lightbox_flowplayer_anchor_text_protected_s3_video name="test-video.mp4" bucket="your S3 bucket name" width="640" height="480" text="click here to open the s3 protected video"]'>Flowplayer - PopUp S3 Protected FLV/MP4/MOV video from the anchor text</option>
			<option value='[wp_lightbox_flowplayer_protected_s3_video name="test-video.mp4" bucket="your S3 bucket name" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]'>Flowplayer - PopUp S3 Protected FLV/MP4/MOV video from the embedded Image</option>

			<option value='[wp_lightbox_anchor_text_html5_video link="http://www.example.com/test-video.mp4" width="640" height="480" text="Click here to open the video with HTML5"]'>HTML5 - Popup video with HTML5 from the anchor text</option>
			<option value='[wp_lightbox_html5_video link="http://www.example.com/test-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]'>HTML5 - Popup video with HTML5 from the embedded Image</option>
 
			<option value='[wp_lightbox_html5_anchor_text_protected_s3_video name="test-video.mp4" bucket="my-video-container" width="640" height="480" text="click here to open the s3 protected video"]'>HTML5 - PopUp S3 Protected video from the anchor text</option>
			<option value='[wp_lightbox_html5_protected_s3_video name="test-video.mp4" bucket="my-video-container" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]'>HTML5 - PopUp S3 Protected video from the embedded Image</option>
			-->
			<option value='[wp_lightbox_anchor_text_protected_s3_video name="h264-encoded-video.mp4" bucket="my-video-container" width="640" height="480" text="click here to open the s3 protected video"]'>Amazon S3 - PopUp S3 Protected video from the anchor text</option>
			<option value='[wp_lightbox_protected_s3_video name="h264-encoded-video.mp4" bucket="my-video-container" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]'>Amazon S3 - PopUp S3 Protected video from the embedded Image</option>
			<option value='[wp_lightbox_embed_protected_s3_video name="h264-encoded-video.mp4" bucket="my-video-container" width="500" height="400"]'>Amazon S3 - Directly Embed S3 Protected video on a post/page</option>
		</select>
		
		<div class="mceActionPanel">
				<input type="submit" class="button button-primary" id="lightbox_ult_insert" name="insert" value="Insert" onclick="insert_wp_lightbox_ultimate_shortcode();" />
				<input type="button" class="button" id="lightbox_ult_cancel" name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" />			
		</div>
		
	</div>

	<br /><i>The full list of Shortcodes and their descriptions can be found on plugin page <a href="http://www.tipsandtricks-hq.com/?p=3163" target="_blank"><strong>here</strong></a></i>
	
</form>

</body>
</html>
