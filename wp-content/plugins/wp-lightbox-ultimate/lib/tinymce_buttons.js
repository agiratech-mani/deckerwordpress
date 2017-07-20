(function() {
    tinymce.PluginManager.add('wplightboxultimate', function( editor, url ) {
        editor.addButton( 'wplightboxultimate', {
            //text: wplu_tinyMCE_object.button_name,
            title: wplu_tinyMCE_object.button_title, 
            icon: false,
            image: wplu_tinyMCE_object.button_img,
            onclick: function() {
                editor.windowManager.open( {
                    title: wplu_tinyMCE_object.window_title,
                    body: [
                        {
                            type   : 'listbox',
                            name   : 'listbox',
                            label  : '',
                            values : [
                                { text: 'PrettyPhoto - PopUp Image from the anchor text', value: '[wp_lightbox_prettyPhoto_anchor_text_image link="http://www.example.com/overlay-image.jpg" text="Click here to open the image" description="Image description goes here"]' },
                                { text: 'PrettyPhoto - PopUp Image from the embedded Image', value: '[wp_lightbox_prettyPhoto_image link="http://www.example.com/overlay-image.jpg" description="overlay image description goes here" source="http://www.example.com/anchor-image.jpg" title="overlay image title goes here"]' },
                                { text: 'PrettyPhoto - PopUp Youtube video from the anchor text', value: '[wp_lightbox_prettyPhoto_anchor_text_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" width="500" height="500" text="Click here to open the Youtube video" description="Video description goes here"]' },
                                { text: 'PrettyPhoto - PopUp Youtube video from the embedded Image', value: '[wp_lightbox_prettyPhoto_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" width="500" height="500" description="Video description goes here" source="http://www.example.com/anchor-image.jpg" title="Video title goes here"]' },
                                { text: 'PrettyPhoto - PopUp Vimeo video from the anchor text', value: '[wp_lightbox_prettyPhoto_anchor_text_video link="http://vimeo.com/15449281" width="500" height="500" text="Click here to open the Vimeo video" description="Video description goes here"]' },
                                { text: 'PrettyPhoto - PopUp Vimeo video from the embedded Image', value: '[wp_lightbox_prettyPhoto_video link="http://vimeo.com/15449281" width="500" height="500" description="video description goes here" source="http://www.example.com/anchor-image.jpg" title="video title goes here"]' },
                                { text: 'PrettyPhoto - PopUp flash video from the anchor text', value: '[wp_lightbox_prettyPhoto_anchor_text_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" width="500" height="500" text="Click here to open the Flash video" description="Video description goes here"]' },
                                { text: 'PrettyPhoto - PopUp flash video from the embedded Image', value: '[wp_lightbox_prettyPhoto_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" width="500" height="500" description="Video description goes here" source="http://www.example.com/anchor-image.jpg" title="Video title goes here"]' },
                                { text: 'PrettyPhoto - PopUp pdf file from the anchor text', value: '[wp_lightbox_prettyPhoto_anchor_text_pdf link="http://www.example.com/test-ebook.pdf" width="640" height="480" title="Title goes here" text="Click here to open the pdf file"]' },
                                { text: 'PrettyPhoto - PopUp pdf file from the embedded Image', value: '[wp_lightbox_prettyPhoto_pdf link="http://www.example.com/test-ebook.pdf" width="640" height="480" title="Title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'PopUp external page from the anchor text', value: '[wp_lightbox_anchor_text_display_external_page link="http://www.example.com/my-test-page" width="640" height="480" title="title goes here" text="click here to open the external page"]' },
                                { text: 'PopUp external page from the embedded Image', value: '[wp_lightbox_display_external_page link="http://www.example.com/my-test-page" width="640" height="480" title="title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Fancybox - PopUp Image from the anchor text', value: '[wp_lightbox_fancybox_anchor_text_image link="http://www.example.com/overlay-image.jpg" title="Image title goes here" text="Click here to open the image"]' },
                                { text: 'Fancybox - PopUp Image from the embedded Image', value: '[wp_lightbox_fancybox_image link="http://www.example.com/overlay-image.jpg" title="Image Title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Fancybox - PopUp Youtube video from the anchor text', value: '[wp_lightbox_fancybox_anchor_text_youtube_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" title="Video title goes here" text="Click here to open the Youtube video"]' },
                                { text: 'Fancybox - PopUp Youtube video from the embedded Image', value: '[wp_lightbox_fancybox_youtube_video link="http://www.youtube.com/watch?v=66TuSJo4dZM" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Fancybox - PopUp Vimeo video from the anchor text', value: '[wp_lightbox_fancybox_anchor_text_vimeo_video link="http://vimeo.com/15449281" title="Video title goes here" text="Click here to open the Vimeo Video"]' },
                                { text: 'Fancybox - PopUp Vimeo video from the embedded Image', value: '[wp_lightbox_fancybox_vimeo_video link="http://vimeo.com/15449281" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Fancybox - PopUp Flash video from the anchor text', value: '[wp_lightbox_fancybox_anchor_text_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" text="Click here to open the Flash video"]' },
                                { text: 'Fancybox - PopUp Flash video from the embedded Image', value: '[wp_lightbox_fancybox_flash_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Colorbox - PopUp Image from the anchor text', value: '[wp_lightbox_colorbox_anchor_text_image link="http://www.example.com/overlay-image.jpg" title="Image title goes here" text="Click here to open the image"]' },
                                { text: 'Colorbox - PopUp Image from the embedded image', value: '[wp_lightbox_colorbox_image link="http://www.example.com/overlay-image.jpg" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Colorbox - PopUp Youtube video from the anchor text', value: '[wp_lightbox_colorbox_anchor_text_video link="http://www.youtube.com/embed/66TuSJo4dZM" title="Video title goes here" text="Click here to open the Youtube video"]' },
                                { text: 'Colorbox - PopUp Youtube video from the embedded Image', value: '[wp_lightbox_colorbox_video link="http://www.youtube.com/embed/66TuSJo4dZM" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Colorbox - PopUp Vimeo video from the anchor text', value: '[wp_lightbox_colorbox_anchor_text_video link="http://player.vimeo.com/video/15449281" title="Video title goes here" text="Click here to open the Vimeo video "]' },
                                { text: 'Colorbox - PopUp Vimeo video from the embedded Image', value: '[wp_lightbox_colorbox_video link="http://player.vimeo.com/video/15449281" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Colorbox - PopUp Flash video from the anchor text', value: '[wp_lightbox_colorbox_anchor_text_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" title="Video title goes here" text="Click here to open the Flash video"]' },
                                { text: 'Colorbox - PopUp Flash video from the embedded Image', value: '[wp_lightbox_colorbox_video link="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf" title="Video title goes here" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'All browsers compatible MP4 video display - PopUp video from the anchor text', value: '[wp_lightbox_anchor_text_mp4_video link="http://www.example.com/h264-encoded-video.mp4" width="640" height="480" text="click here to open the video"]' },
                                { text: 'All browsers compatible MP4 video display - PopUp video from the embedded Image', value: '[wp_lightbox_mp4_video link="http://www.example.com/h264-encoded-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Flowplayer - PopUp MP4 video from the anchor text', value: '[wp_lightbox_flowplayer_anchor_text_video link="http://www.example.com/test-video.mp4" width="640" height="480" text="Click here to open the video"]' },
                                { text: 'Flowplayer - PopUp MP4 video from the embedded Image', value: '[wp_lightbox_flowplayer_video link="http://www.example.com/test-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]' },
                                //{ text: 'Flowplayer - PopUp S3 Protected FLV/MP4/MOV video from the anchor text', value: '[wp_lightbox_flowplayer_anchor_text_protected_s3_video link="https://s3.amazonaws.com/my-video-container/h264-encoded-video.mp4" width="640" height="480" text="click here to open the s3 protected video"]' },
                                //{ text: 'Flowplayer - PopUp S3 Protected FLV/MP4/MOV video from the embedded Image', value: '[wp_lightbox_flowplayer_protected_s3_video link="https://s3.amazonaws.com/my-video-container/h264-encoded-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]' },
                                //{ text: 'HTML5 - Popup video with HTML5 from the anchor text', value: '[wp_lightbox_anchor_text_html5_video link="http://www.example.com/test-video.mp4" width="640" height="480" text="Click here to open the video with HTML5"]' },
                                //{ text: 'HTML5 - Popup video with HTML5 from the embedded Image', value: '[wp_lightbox_html5_video link="http://www.example.com/test-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]' },
                                //{ text: 'HTML5 - PopUp S3 Protected video from the anchor text', value: '[wp_lightbox_html5_anchor_text_protected_s3_video link="https://s3.amazonaws.com/my-video-container/h264-encoded-video.mp4" width="640" height="480" text="click here to open the s3 protected video"]' },
                                //{ text: 'HTML5 - PopUp S3 Protected video from the embedded Image', value: '[wp_lightbox_html5_protected_s3_video link="https://s3.amazonaws.com/my-video-container/h264-encoded-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Amazon S3 - PopUp S3 Protected video from the anchor text', value: '[wp_lightbox_anchor_text_protected_s3_video link="https://s3.amazonaws.com/my-video-container/h264-encoded-video.mp4" width="640" height="480" text="click here to open the s3 protected video"]' },
                                { text: 'Amazon S3 - PopUp S3 Protected video from the embedded Image', value: '[wp_lightbox_protected_s3_video link="https://s3.amazonaws.com/my-video-container/h264-encoded-video.mp4" width="640" height="480" source="http://www.example.com/anchor-image.jpg"]' },
                                { text: 'Amazon S3 - Directly Embed S3 Protected video on a post/page', value: '[wp_lightbox_embed_protected_s3_video link="https://s3.amazonaws.com/my-video-container/h264-encoded-video.mp4" width="500" height="400"]' },
                                
                            ],
                            value : '[wp_lightbox_prettyPhoto_anchor_text_image link="http://www.example.com/overlay-image.jpg" text="Click here to open the image" description="Image description goes here"]' // Sets the default
                        }
                    ],
                    onsubmit: function( e ) {
                        editor.insertContent( e.data.listbox );
                    }
                });
            },
        });
    });
 
})();
