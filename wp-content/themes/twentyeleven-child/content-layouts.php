<?php
/**
 * The template used for displaying page content in Decker Digital full width layouts
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<style type="text/css">
@keyframes flip {
  from {
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    animation-timing-function: ease-in;
    opacity: 0;
  }
  40% {
    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    animation-timing-function: ease-in;
  }
  60% {
    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    opacity: 1;
  }
  80% {
    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }
  to {
    transform: perspective(400px);
  }
}

.page-template-page-full-width-layouts .entry-content {
    padding:0;
    width:100%;
}

.page-template-page-full-width-layouts .section {
    padding:55px 20px;
    color:#16618b;
    font-size:20px;
    line-height:1.4em;
    text-align:center;
}
.page-template-page-full-width-layouts .section.no-bottom-padding {
    padding:55px 20px 0 20px;
}
.page-template-page-full-width-layouts .section.header {
	background-image:url(/wp-content/themes/twentyeleven-child/images/deckerdigital-bg-header-seamless.png);
	background-position:center top;
	background-repeat: repeat;
	background-size: initial;
	padding:15px 0;
}
.page-template-page-full-width-layouts .section.big-image {
	padding: 0 0 55px 0;
	
}
.page-template-page-full-width-layouts .section.big-image img {
	width: 100%;
	height: 100% !important;
}

.page-template-page-full-width-layouts .inner-section {
    width:100%;
    max-width:1044px;
    margin:0 auto;
}
.page-template-page-full-width-layouts .entry-content .section h1,
.page-template-page-full-width-layouts .entry-content .section h2 {
    font-family: 'felt_tip_romanregular' !important;
    text-align:center;
    margin:0 auto;
    font-size:53px;
    line-height:1.52em;
    font-weight:normal;
    color:#16618b;
}
.page-template-page-full-width-layouts .entry-content .section h2.title-size53 {font-size:53px;}
.page-template-page-full-width-layouts .entry-content .section h2.title-size36 {font-size:36px;}

.page-template-page-full-width-layouts .section h3 {
    text-align:center;
    font-weight:normal;
    font-size:22px;
    color:#16618b;
    font-family:"Benton Sans Cond Book",Arial,sans-serif;
    line-height:1.4em;
    max-width:800px;
    margin:0 auto;
}
.page-template-page-full-width-layouts .section h3.subtitle-size22 {font-size:22px;}
.page-template-page-full-width-layouts .section h3.subtitle-size26 {font-size:26px;}
.page-template-page-full-width-layouts .section h3.subtitle-size28 {font-size:28px;}

.page-template-page-full-width-layouts .section.bg-blue_dark h1,
.page-template-page-full-width-layouts .section.bg-blue_dark h2,
.page-template-page-full-width-layouts .bg-blue_dark h3,
.page-template-page-full-width-layouts .section.bg-red h1,
.page-template-page-full-width-layouts .section.bg-red h2,
.page-template-page-full-width-layouts .section.bg-red h3 {
	color:#ffffff;
}
.page-template-page-full-width-layouts .section,
.page-template-page-full-width-layouts .section.bg-white { background-color:#ffffff; }
.page-template-page-full-width-layouts .icon_middle.bg-white { border-color:#ffffff;}

.section.bg-red, .module .bg-red { background-color:#c83d44; color:#ffffff; }
.icon_middle.bg-red { border-color:#c83d44;}
.section.header.bg-red { background-color:#c53b43;}

.section.bg-blue_dark { background-color:#2f8abc; color:#ffffff; }
.module .bg-blue_dark { background-color:#145F89; color:#ffffff; }
.icon_middle.bg-blue_dark { border-color:#2f8abc; }

.section.bg-blue_med { background-color:#bde7fb; color:#ffffff; }
.module .bg-blue_med { background-color:#2f8abc; color:#ffffff; }
.icon_middle.bg-blue_med { border-color:#bde7fb; }

.module .bg-orange { background-color:#F79625; color:#ffffff; }

.section.bg-blue_light { background-color:#e2f6ff; }
.icon_middle.bg-blue_light { border-color:#e2f6ff; }

.section.bg-gray_light { background-color:#f6f6f6; }
.icon_middle.bg-gray_light { border-color:#f6f6f6; }

.flip_side.bg-red { color:#c83d44; }
.flip_side.bg-blue_dark { color:#145F89; }
.flip_side.bg-blue_med { color:#2f8abc; }
.flip_side.bg-orange { color:#F79625; }

.section.header .heading {
	display:flex;
}
.page-template-page-full-width-layouts .heading-right {
	padding:20px 0 0 0;
    min-height:178px;
}
.page-template-page-full-width-layouts-php #main .entry-content .heading-right table,
.page-template-page-full-width-layouts-php #main .entry-content .heading-right td {
    width:auto;
    border-bottom:0;
    text-align:center;
}
.page-template-page-full-width-layouts-php #main .entry-content .heading-right td {
    max-width:90px;
    padding:5px;
}
.page-template-page-full-width-layouts .section.header.bg-red .heading-right a {
    text-decoration:none;
}
.page-template-page-full-width-layouts .section.header.bg-red .heading-right a span {
    color:#ffffff;
    font-family: 'felt_tip_romanregular';
    display:none;
}
.page-template-page-full-width-layouts .section.header.bg-red .heading-right a:hover span {
    display:block;
    text-decoration:none;
}
.section.header.bg-red .heading-right a img,
.section.header.bg-red .heading-right a:hover img {
    border-color:#c53b43;
    height: auto;
	width: 80px;
    border-style: solid;
    border-width: 5px;
    border-radius:82px;
    -moz-box-shadow: 3px 3px 5px #333;
    -webkit-box-shadow: 3px 3px 5px #333;
    box-shadow: 3px 3px 5px #333;
}
.section.header.bg-red .heading-right a:hover img {
    opacity:.65;
}

/*.page-template-page-full-width-layouts :target:before {
    content:"";
    display:block;
    height:60px;
    margin:-120px 0 0px;
}
.page-template-page-full-width-layouts.admin-bar :target:before {
    margin:-88px 0 0px;
} */
@media only screen and (max-width:1023px) {
    .page-template-page-full-width-layouts .heading-right {
        min-height:60px;
    }
    .page-template-page-full-width-layouts .section.header.bg-red .heading-right a:hover span {
        display:none;
    }
}
@media only screen and (max-width:480px) {
    .page-template-page-full-width-layouts-php #main .entry-content .heading-right td {
        display: inline-block;
        max-width: 58px;
        /*min-height: 150px;
        overflow-wrap: break-word;*/
    }
    .section.header.bg-red .heading-right a img,
    .section.header.bg-red .heading-right a:hover img {
        width:48px;
    }
}


sup {
	bottom:1em;
}
.inner-section p {
	text-align:left;
	max-width:840px;
	width:100%;
    font-family:"Benton Sans Cond Book",Arial,sans-serif;
}
.full .inner-section p {
    max-width:100%;
}
.section.no-bottom-padding p:last-child {
    margin-bottom:0;
}
.inner-section p,
.inner-section img.aligncenter {
	margin-left:auto;
	margin-right:auto;
}
.inner-section .statement_detail p {
	max-width:100%;
	margin-left: 12px;
}
.entry-content .section img {
	max-width:100%;
	height:auto;
}
.inner-section .statement {
	width:100%;
	text-align:left;
	font-weight:bold;
	font-size:18px;
	margin:0 5px 1em 0;
	cursor: pointer;
    font-family:"Benton Sans Cond Book",Arial,sans-serif;
}
.inner-section .statement_detail a {
	color: #C83D44;
}
.inner-section .statement::before {
	font-family: "FontAwesome";
	content: "\f0da";
	margin-right: 10px;
}
.inner-section .statement_detail {
	margin:0 0 2em 12px;
}

.section-content {
	display: -webkit-flex;
	display: flex;
	-webkit-flex-wrap: wrap;
	flex-wrap: wrap;
	margin-top: 20px;/*50px;*/
	-webkit-justify-content: center;
	justify-content: center;
}

.full .section-content {
    display:block; /* flex breaks the slideshow */
}
.easingslider-next, .easingslider-prev {
    height:40px;
    background-size:40px;
}
.section-content .easingslider-prev {
    background-image:url(/wp-content/themes/twentyeleven-child/images/slideshow-arrows-red-prev.png);
}
.section-content .easingslider-next {
    background-image:url(/wp-content/themes/twentyeleven-child/images/slideshow-arrows-red-next.png);
}
.easingslider-caption {
    background-image:none;
    top:0;
    bottom:auto;
    padding:13px 0 !important;
    max-width:800px;
    margin:0 auto;
}
.easingslider-item.active .easingslider-caption p {
    color:#16618b;
    text-align:center;
    font-family:"Benton Sans Cond", Arial, sans-serif;
    font-weight:normal;
    font-size:21px;
    letter-spacing:.015em;
}

@media (max-width: 768px) {
    .easingslider-container, .easingslider-container .easingslider-wrapper {
        height: auto !important;
    }
    .easingslider-item {
        height: auto !important;
    }
    .easingslider-caption {
        position:relative;
    }
    .easingslider-caption br {
        float:left;
    }
}
.section-content ol li {
	text-align: left;
}
.big-image .section-content {
	margin-top:0;
}

.heading-left, .heading-right {
    width:50%;
}
.iwant-left, .iwant-right {
    width:32%;
    padding:0 2%;
    margin:0 0 -50px 0;
}

@media (max-width: 639px) {
    .section.header {
        padding:15px 0 0 0;
        margin:0 0 20px 0;
    }
    .section.header .heading {
        display:block;
    }
    .heading-left, .heading-right {
        width:100%;
    }
    .heading-right {
        padding:0;
        /*margin:0 0 16% 0;*/
    }

    .iwant-left, .iwant-right {
        width:100%;
        padding:0%;
        margin:0;
    }
    .iwant-right {
        margin:0 0 -50px 0;
    }
}
.magic {
    width:33%;
    -webkit-align-self:center;
    align-self:center;
}
@media (max-width: 767px) {
    .magic {
        width:100%;
    }
}
.section .magic img {
    max-width:129px;
}
.section .magic.middle img {
    width:100%;
    max-width:326px;
}

.section .magic p {
    font-size:16px;
    max-width:200px;
    text-align:center;
}

.module {
	width: 23%;
	height: 200px;
	margin: 10px 5px;
	padding: 5px;
	display: -webkit-flex;
	display: flex;
	cursor: pointer;
}
.module_inner {
	height: 90%;
	width: 100%;
	border-radius: 5px;
	padding: 15px;
}
.section-content .module:nth-child(8) > .module_inner {
	-webkit-display: flex;
	display: flex;
	-webkit-align-items: center;
	align-items: center;
}

.module .over {
	font-size:22px;
	margin: 0 auto;
	padding-top: 20%;
}
.module .over p {
	text-align: center;
}
.module .under {
	font-size: 18px;
	text-align: left;
	display: none;
	background-size: 100% 100%;
	background-position: 0 0;
	background-repeat: no-repeat;
	height: 210px;
	width: 80%;
	border-radius: 5px;
	padding: 0 20px;
	-webkit-align-items: center;
	align-items: center;
}
.section-content .module:nth-child(8) > .module_inner .under {
	width: 100%;
}

.flip_side {
	backface-visibility: visible !important;
	/* animation-name: flip;
	animation-duration: 1500ms;
	animation-fill-mode: both; */
	background-color: #fff !important;
	border: 1px solid #ccc;
}
.under ul {
	margin: 0 0 18px 0;
}
.under ul li {
	font-size: 16px;
	margin: 0 0 10px;
	line-height: normal;
	width: 120%;
	font-family: "Benton Sans Cond Book",Arial,sans-serif;
}
.section-content .statement_detail {
	display: none;
}
.statement_detail .red {
	color: #C83D44;
}
.statement.accordion_open::before {
	content: "\f0d7";
	margin-right: 6px;
}

.section a.link-button {
	display:inline-block;
	background-color: #c83d44;
	border-radius: 4px;
	font-family: felt_tip_romanregular;
	font-size: 26px;
	padding: 13px 20px;
	margin:15px;
	color:#ffffff;
    text-decoration:none;
}
.section a.link-button:hover {
	text-decoration:none;
	cursor:pointer;
}
.section a.link-button .small {
    font-size:22px;
}
.section a.link-button.blue {
    background-color:#2f8abc;
}

.icon_middle {
	background-size: initial;
	background-repeat: no-repeat;
	height: 80px;
	width: 80px;
	margin: -85px auto 0;
    border-style: solid;
    border-width: 5px;
    border-color:#ffffff;
    border-radius:82px;
}

.section a.link-button:hover {
	opacity: 0.6;
	-webkit-transition: opacity 500ms ease-in-out;
	-moz-transition: opacity 500ms ease-in-out;
	-ms-transition: opacity 500ms ease-in-out;
	-o-transition: opacity 500ms ease-in-out;
	transition: opacity 500ms ease-in-out;	
	background-color: #888 !important;
}

#video-digital p {
    max-width:830px;
}

@media only screen and (max-width:768px) {
	#branding #hgroup #header-left img {
		margin: 26px 0 0 15px;
	}
	#branding #hgroup #header-right {
		margin: 0 0 0 -10px !important;
	}

	.module {
		width: 40%;
	}
	.under ul li {
		width: 100%;
		font-size: 14px;
	}

	.entry-content img.aligncenter {
		width: auto;
		height: auto;
	}
	.section.no-bottom-padding {
		padding: 55px 50px 0 50px;
	}

	#video-digital .video-overlay {
		/*background-image: url(/wp-content/uploads/2016/08/promo-video.png);*/
		/*background-size: 105% 100% !important;*/
		background-size:cover !important;
		/*background-position-x: -15px;*/
		background-position:center center;
		width: 100% !important;
		height: 100% !important;
		z-index: 10;
		top:0 !important;
	}
	#video-digital iframe {
		/*margin: 0 !important;
		width: 100% !important;
		height: 395px !important;*/
	}

.easingslider-next, .easingslider-prev {
		margin-top: -50px;
	}
	.easingslider .easingslider-controls .easingslider-prev {
		left: -15px !important;
	}		
	.easingslider .easingslider-controls .easingslider-next {
		right: -15px !important;
	}

	#footer-bottom {
		margin: 15px !important;
	}
	
}

@media only screen and (max-width:640px) {
    #video-digital iframe {
		height: 338px !important;
	}
}

@media only screen and (max-width:639px) {
	/*.page-template-page-full-width-layouts .section.header .heading {
		height: 270px;
	}
	.page-template-page-full-width-layouts .heading-right {
		margin: 5% 0 -16% 0;
	} */

}

@media only screen and (max-width:480px) {
	.module {
		width: 50%;
	}
	.under ul li {
		font-size: 12px;
		width: 90%;
	}	
	
	/*.page-template-page-full-width-layouts .section.header .heading {
		height: 200px;
	}
	.page-template-page-full-width-layouts .heading-right {
		margin: 5% 0 -16% 0;
	} */
	
	#video-digital iframe {
		height: 247px !important;
	}
	#video-digital .video-overlay {
		/*height: 240px !important;
		background-size: 100% !important;
		background-position-x: 0 !important;*/
	}
	.full .inner-section p {
		margin: 50px 0 0 0;
	}	
	.icon_middle {
		background-size: 70px;
		background-repeat: no-repeat;
		height: 70px;
		width: 70px;
		margin: -85px auto 0;
        border-radius:72px;
	}	
}
@media only screen and (max-width:479px) {
	.module {
		width: 80%;
	}
}

@media only screen and (max-width:360px) {
	.full .inner-section p {
		margin: 0;
	}
	#video-digital iframe {
		height: 180px !important;
	}
	/*.page-template-page-full-width-layouts .section.header .heading {
		height: 155px;
	} */

}

@media only screen and (max-width:320px) {
	.under ul li {
		width: 150%;
	}
	#video-digital iframe {
		height: 160px !important;
	}
	/*.page-template-page-full-width-layouts .section.header .heading {
		height: 135px;
	}*/
	
} 

/* iPhone 4 5 6 */
@media only screen and (min-device-width: 320px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait) { 
	.module {
		width: 80%;
		display: block;
		align-items: unset;
	}
	.under ul li {
		width: 90%;
	}

} 


/* iPhone 6s */
@media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) { 
	#branding #hgroup #header-left img {
		margin: 26px 0 0 0;
	}

	.full .inner-section p {
		margin: 15px 0 0 0;
	}

	/*.page-template-page-full-width-layouts .section.header .heading {
		height: 175px;
	}*/
	.heading .heading-right img {
		margin: 25px 0 0 0;
	}

}


/* iPad */
@media only screen and (min-device-width:768px) and (max-device-width:1024px) and (-webkit-min-device-pixel-ratio: 2) {
	.heading-left, .heading-right {
		width: 100%;
	}
	.magic {
		width: 100%;
	}	
	
}


/* Samsung Galaxy S7 */
@media only screen and (device-width:360px) and (device-height:640px) and (-webkit-min-device-pixel-ratio:4) and (-webkit-device-pixel-ratio:4) and (orientation:portrait) {
	#branding #hgroup #header-left img {
		margin: 26px 0 0 -2px;
	}
	.section.big-image img {
		width: 100%;
		height: 100%;
	}
	
	.page-template-page-full-width-layouts .section.no-bottom-padding {
		padding: 55px 50px 0 !important;
	}
	
}

/* Note: Video player styling with image over video editable in footer.php */
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
        the_content();

        if( have_rows('section') ):
            while ( have_rows('section') ) : the_row();
                $moreclass = false;
                $background_color = get_sub_field('background_color');
                if($background_color){
                    $moreclass = ' bg-'.$background_color;
                }
                $style = false;
                /*if($background=='image'){
                    $background_image = get_sub_field('background_image');
                    $style = ' style="background-image:url('.$background_image['url'].');"';
                }*/
                if(strip_tags(get_sub_field('no_bottom_padding'))){
                    $moreclass .= ' no-bottom-padding';
                }

                $title = false;
                $subtitle = false;
                $title_size = intval(get_sub_field('title_size'));
                $display = false;
                $content_type = get_sub_field('content_type');

                if($content_type!="heading" && $content_type!="images"){
                    if(get_sub_field('title')){
                        $title = '<h2 class="title-size'.$title_size.'">'.get_sub_field('title').'</h2>';
                    }
                    $subtitle_size = intval(get_sub_field('subtitle_size'));
                    if(get_sub_field('subtitle')){
                        $subtitle = '<h3 class="subtitle-size'.$subtitle_size.'">'.get_sub_field('subtitle').'</h3>';
                    }
                }

                if($content_type=="heading"){
                    $moreclass .= ' header';
                    $display =
                    '<div class="heading">
                        <div class="heading-left">
                            '.get_sub_field('heading_left').'
                        </div>
                        <div class="heading-right">
                            '.get_sub_field('heading_right').'
                        </div>
                    </div>';

                } elseif($content_type=="general"){
                    $moreclass .= ' '.strip_tags(get_sub_field('content_width'));
                    $display = get_sub_field('general_content');

                } elseif($content_type=="image"){
                    $big_image = get_sub_field('big_image');//echo '<pre>';print_r($big_image);echo '</pre>';
                    $moreclass .= ' big-image';
                    $display = '<img src="'.$big_image['url'].'" alt="'.$big_image['alt'].'" width="'.$big_image['sizes']['large-feature-width'].'" />';

                } elseif($content_type=="magic"){
                    $magicimage = array();
                    for($i==1;$i<=4;$i++){
                        $magicimage[$i] = get_sub_field('the_magic_slot_'.$i.'_image');
                        $image[$i] = '<img src="'.$magicimage[$i]['sizes']['medium'].'" alt="'.$magicimage[$i]['alt'].'" width="258" />';
                    }
                    $magicimagemiddle = get_sub_field('the_magic_in_the_middle');
                    $middleimage = '<img src="'.$magicimagemiddle['sizes']['large'].'" alt="'.$magicimagemiddle['alt'].'" width="349" />';
                    $display = '
                    <div class="magic">
                        '.$image[1].'
                        <p>'.get_sub_field('the_magic_slot_1_text').'</p>
                        '.$image[2].'
                        <p>'.get_sub_field('the_magic_slot_2_text').'</p>
                    </div>
                    <div class="magic middle">
                        '.$middleimage.'
                    </div>
                    <div class="magic">
                        '.$image[3].'
                        <p>'.get_sub_field('the_magic_slot_3_text').'</p>
                        '.$image[4].'
                        <p>'.get_sub_field('the_magic_slot_4_text').'</p>
                    </div>';

                } elseif($content_type=="modules") {
                    if( have_rows('lab_module') ):
											while ( have_rows('lab_module') ) : the_row();
												$module_color = get_sub_field('module_color');
												$background_image = get_sub_field('background_image');
												$show_number = get_sub_field('show_number');
												$dnumber = "";
												$dpadding = "";

											if ($show_number == 1) {
												$dnumber = '<strong>'.get_sub_field('module_number').'</strong><br />';
											} else {
												$dpadding = "style='padding:15px 0'";
											}

											$display .=
											'<div class="module">
													<div class="module_inner bg-'.$module_color.'" '.$dpadding.'>
														<div class="over">'
															. $dnumber . get_sub_field('module_title') .
													'</div>
													<div class="under" style="background-image:url('.$background_image.')">
															'.get_sub_field('module_text').'
													</div>
												</div>
											</div>';
											endwhile;
										endif;

                } elseif($content_type=="accordion"){
                    if( have_rows('expandcollapse') ):
                        while ( have_rows('expandcollapse') ) : the_row();
                            $display .=
                            '<div class="statement">
                              '.get_sub_field('question_or_statement').'
                            </div>
                            <div class="statement_detail">
                              '.get_sub_field('expanded_detail').'
                            </div>';
                        endwhile;
                    endif;
                }


				$icon = get_sub_field('icon');
				$icon_border = get_sub_field('icon_border_color');
                $icon_div = false;
                if($icon){
                    $icon_div = '<div class="icon_middle bg-'.$icon_border.'" style="background-image:url('.$icon.');"></div>';
                }
                $pattern = array("/ /","/[^0-9A-Za-z]/");
                $replace = array("","");
                $internalname = 'section-'.strtolower(preg_replace($pattern,$replace,get_sub_field('internal_name')));

                echo '
                <div id="'.$internalname.'" class="section '.$moreclass.'" '.$style.'>
				    '.$icon_div.'
                    <div class="inner-section">
                        '.$title.'
                        '.$subtitle.'
                        <div class="section-content">
						    '.$display.'
                        </div>
                    </div>
                </div>';

            endwhile;

            echo do_shortcode(get_field('html_code'));

        endif;

        ?>
        <div style="clear:both;"></div>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<script type="text/javascript">
(function($) {
$(function() {
	
// Engine for the modules flip box
$(".module_inner").mouseenter(function() {
	$(this).addClass("flip_side");
	$(this).find(".over").hide();
	$(this).find(".under").css({"display":"-webkit-flex", "display":"flex"});
});
$(".module").mouseleave(function() {
	$(".flip_side").removeClass("flip_side");
	$(this).find(".over").show();
	$(this).find(".under").hide();
});
	
	
// Engine for the FAQ section
$(".section-content .statement").click(function() {
	$(this).next().slideToggle(100);
	$(this).toggleClass("accordion_open");
});




});
})(jQuery);
</script>
