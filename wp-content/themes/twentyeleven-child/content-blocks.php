<?php
/**
 * The template used for displaying page content in page.php for SEM landing pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<style type="text/css">

.bentonsanscondensedmedium {
    font-family: "Benton Sans Cond Medium";
    font-style: normal;
    font-weight: normal;
}

.page-template-page-full-width-blocks-php #primary {
    margin:0;
}
.block-headliner {
    width:100%;
    max-width:100%;
    height:528px;
    margin:0 0 14px 0;
    color:#fff;
}
@media (max-width: 767px) {
    .block-headliner {
        padding:0 10px 10px 10px;
    }
}
.blocks {
    clear:both;
    width:100%;
    max-width:1044px;
    margin:0 auto;
}
.block {
    position:relative;
    float:left;
    display:block;
    color:#fff;
    margin:0 0 13px 0;
}
.size-fullwidthcontent {
    width:100%;
    max-width:1044px;
}
.size-twothirds {
    clear:both;
    margin:0 12px 13px 0;
}
.size-twothirds, .size-twothirds a {
    width:100%;
    max-width:692px;
    min-height:459px;
}
.size-onethird, .size-onethird a {
    width:340px;
    height:223px;
}
.size-onethird.middle {
    margin:0 12px 13px 12px;
}
.size-fullwidthcontent .left,
.size-fullwidthcontent .right {
    width:48%;
    float:left;
}
@media (max-width: 767px) {
    .size-onethird.middle {
        margin:0 0px 13px 0px;
    }
    .size-fullwidthcontent .left,
    .size-fullwidthcontent .right {
        width:100%;
        float:none;
    }
}

.bg-photo {
     background-repeat:no-repeat;
     background-position:center center;
}
.bg-gray {
    background-color:#777777;
}
.bg-blue {
    background-color:#2e8bbd;
}
.bg-orange {
    background-color:#e47904;
}
.bg-green {
    background-color:#3b900c;
}
.blocks a {
    display:block;
}
.blocks a:hover {
    text-decoration:none;
}
.arrow_box { position: relative; background: #ffffff; }
.arrow_box:after {
    top: 100%;
    left: 60px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(255, 255, 255, 0);
    border-top-color: #ffffff;
    border-width: 27px;
    /*margin-left: -27px;*/
}

.text-heading {
    color:#fff;
    font-size:2.7em;
    line-height:1.4em;
}
.text-secondary {
    color:#fff;
    font-size:1.86em;
    line-height:1.23em;
}
.block-headliner .text-heading {
    padding:177px 0 45px 0;
}
@media (max-width: 767px) {
    .block-headliner .text-heading {
        padding:157px 0 45px 0;
    }
    .block-headliner .text-secondary {
        font-size:1.36em;
    }

}
.block .text-heading,
.block .text-secondary {
    padding:23px;
}
.size-fullwidthcontent .text-heading,
.size-twothirds .text-heading {
    padding:91px 23px 23px 56px;
}
@media (max-width: 639px) {
    .size-fullwidthcontent .text-heading {
        padding:56px 23px 23px 56px;
    }
}
.size-fullwidthcontent .text-secondary,
.size-twothirds .text-secondary {
    padding:23px 23px 23px 56px;
}
.size-onethird .text-heading,
.size-onethird .text-secondary {
    text-transform:uppercase;
    font-size:1.57em;
    font-weight:500;
}
.size-onethird .text-secondary {
    position:absolute;
    bottom:0px;
}

.size-fullwidthcontent .right .gform_wrapper {
    padding:31px 0 31px 30%;
}
@media (max-width: 767px) {
    .size-fullwidthcontent .right .gform_wrapper {
        padding:31px 1% 31px 1%;
        margin-left: 10px;
        margin-right: 25px;
    }
}
.gform_wrapper .gfield_label_hidden.gfield_contains_required .ginput_container input[type="text"], .gform_wrapper .gfield_label_hidden.gfield_contains_required .ginput_container input[type="password"], .gform_wrapper .gfield_label_hidden.gfield_contains_required .ginput_container input[type="url"], .gform_wrapper .gfield_label_hidden.gfield_contains_required .ginput_container input[type="tel"], .gform_wrapper .gfield_label_hidden.gfield_contains_required .ginput_container input[type="email"], .gform_wrapper .gfield_label_hidden.gfield_contains_required .ginput_container textarea, .gform_wrapper .gfield_label_hidden.gfield_contains_required .ginput_container select[multiple] {
    padding-right:.5em !important
}
.gform_wrapper input[type="text"], .gform_wrapper input[type="url"], .gform_wrapper input[type="email"], .gform_wrapper input[type="tel"], .gform_wrapper input[type="number"], .gform_wrapper input[type="password"], .gform_wrapper textarea, .gform_wrapper select {
    padding-left:10px !important;
}

.size-fullwidthcontent .text-third input[type="text"],
.size-fullwidthcontent .text-third input[type="password"],
.size-fullwidthcontent .text-third input[type="email"],
.size-fullwidthcontent .text-third input[type="tel"],
.size-fullwidthcontent .text-third textarea {
    background:transparent;
    border-radius:5px;
    border: 1px solid #fff !important;
    color:#fff;
    font-size:13px;
}
.size-fullwidthcontent .text-third .gform_wrapper .top_label .gfield_label {
    /*position:absolute;
    margin:6px 0 4px 14px;*/
}
::-webkit-input-placeholder {
   color: #fff;
   font-weight:bold;
   opacity:1;
}

:-moz-placeholder { /* Firefox 18- */
   color: #fff;
   font-weight:bold;
   opacity:1;
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #fff;
   font-weight:bold;
   opacity:1;
}

:-ms-input-placeholder {
   color: #fff;
   font-weight:bold;
   opacity:1;
}
/*.block .gform_wrapper .gfield_required {
    color:#fff;
}*/
/*.block .gform_wrapper ul.gfield_checkbox {
    padding:30px 0 0 0;
} */
.block .gfield_checkbox li {
    float:left;
}
.gform_wrapper ul.gfield_checkbox li, .gform_wrapper ul.gfield_radio li {
    margin: 0 1em 8px 0 !important;
}

.block .gform_wrapper ul.gfield_checkbox li input[type="checkbox"] {

}
.block .gform_wrapper .gform_footer {
    padding:0;
}
#content .block input.button {
    background:#00afec !important;
    border-radius:5px !important;
}

.block.size-fullwidthcontent:last-child {
    min-height:459px;
    background-size:cover;
}
.block.size-fullwidthcontent:last-child .arrow_box {
    display:none;
}
.size-fullwidthcontent .text-secondary.bottomnav {
    padding:23px 23px 23px 20px;
}

.nav-icons {
    float:left;
    width:100%;
    max-width:166px;
    text-align:center;
}
@media (max-width: 639px) {
    .nav-icons {
        max-width:130px;
    }

}
.nav-icons p, .nav-icons a {
    text-transform:uppercase;
    font-size:18px;
    color:#fff;
    line-height:1.3em;
}
.nav-icon img {
    padding:12px 10px 17px 10px;
    margin:0 0 15px 0;
}
.nav-icon img:hover {
    border:2px solid #fff;
    border-radius:50%;
    padding:10px 10px 15px 10px;
}

/* centering onethird blocks on mobile */
@media (max-width: 650px) {
    .block.size-onethird {
        margin: 0 auto 13px;
        clear: both;
    }
    .block {
        float: none;
    }
    .block.size-fullwidthcontent {
        float: left;
    }
}

</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php //the_content();
        if( have_rows('block_headliner') ):
            while ( have_rows('block_headliner') ) : the_row();
                $background = get_sub_field('background');
                $class = 'class="block-headliner bg-'.$background.'"';
                $photo_background = get_sub_field('photo_background');
                //print_r($photo_background);
                if($background=='photo'){
                    $class .= ' style="background-image:url('.$photo_background['url'].');"';
                }
                echo '
                <div '.$class.'>
                    <div class="text-heading bentonsanscondensedmedium">'.get_sub_field('heading').'</div>
                    <div class="text-secondary">'.get_sub_field('secondary_text').'</div>
                </div>';

            endwhile;
        endif;

        if( have_rows('block') ):
            echo '
            <div class="blocks">';
            while ( have_rows('block') ) : the_row();

                $type = get_sub_field('type');
                if($type=='onethird' && get_sub_field('middle_small_block')=='yes'){
                    $type .= ' middle';
                }
                $background = get_sub_field('background');
                $class = 'class="block size-'.$type.' bg-'.$background.'"';

                $photo_background = get_sub_field('photo_background');
                $photo_background_mobile = get_sub_field('photo_background_mobile');
                //print_r($photo_background);
                if($background=='photo'){
                    if((wpmd_is_device() || $_GET['device']==1) && $photo_background_mobile){
                        $class .= ' style="background-image:url('.$photo_background_mobile['url'].');"';
                    } else {
                        $class .= ' style="background-image:url('.$photo_background['url'].');"';
                    }
                }

                $id = get_sub_field('id');
                if($id){
                    echo '
                <div '.$class.' id="'.$id.'">';
                } else {
                    echo '
                <div '.$class.'>';
                }
                if($type=='twothirds' || $type=='fullwidthcontent'){
                    echo '
                    <div class="arrow_box"></div>';
                }
                $link = get_sub_field('link');
                if($link){
                    $link_type = get_sub_field('link_type');
                    if($link_type=='video'){
                        $linkcode = '<a title="'.strip_tags(get_sub_field('secondary_text')).'" href="'.$link.'&amp;modestbranding&amp;amp;showinfo=0&amp;amp;theme=light&amp;amp;rel=0" rel="wp_lightbox_prettyPhoto">';
                    } elseif($link_type=='external'){
                        $linkcode = '<a href="'.$link.'" target="_blank">';
                    } else {
                        $linkcode = '<a href="'.$link.'">';
                    }
                    echo '
                    '.$linkcode.'
                        <div class="text-heading bentonsanscondensedmedium">'.get_sub_field('heading').'</div>
                        <div class="text-secondary">'.get_sub_field('secondary_text').'</div>
                    </a>';
                } else {
                    if($type=='fullwidthcontent'){
                        $nextcolumn = get_sub_field('next_column_content');
                        $bottomnav  = get_sub_field('bottom_navigation');
                        if($nextcolumn){
                            echo '
                            <div class="left">
                                <div class="text-heading bentonsanscondensedmedium">'.get_sub_field('heading').'</div>
                                <div class="text-secondary">'.do_shortcode(get_sub_field('secondary_text')).'</div>
                            </div>
                            <div class="right">
                                <div class="text-third">'.do_shortcode($nextcolumn).'</div>
                            </div>';
                        } elseif($bottomnav=='yes') {
                            echo '
                            <div class="text-heading bentonsanscondensedmedium">'.get_sub_field('heading').'</div>
                            <div class="text-secondary bottomnav">';
                                if( have_rows('navigation') ):
                                    while ( have_rows('navigation') ) : the_row();
                                        echo '
                                        <div class="nav-icons">';
                                        $navurl = get_sub_field('navurl');
                                        if($navurl){
                                            echo '
                                            <a class="nav-icon" href="'.$navurl.'"><img src="'.get_sub_field('navicon').'" alt="'.get_sub_field('navtitle').'" /></a>
                                            <p><a href="'.$navurl.'">'.get_sub_field('navtitle').'</a></p>';
                                        } else {
                                            echo '
                                            <a class="nav-icon" href="#"><img src="'.get_sub_field('navicon').'" alt="'.get_sub_field('navtitle').'" /></a>
                                            <p>'.get_sub_field('navtitle').'</p>';
                                        }
                                        echo '
                                        </div>';
                                    endwhile;
                                endif;
                                echo '
                            </div>';
                        } else {
                            echo '
                            <div class="text-heading bentonsanscondensedmedium">'.get_sub_field('heading').'</div>
                            <div class="text-secondary">'.do_shortcode(get_sub_field('secondary_text')).'</div>';
                        }
                    } else {
                        echo '
                        <div class="text-heading bentonsanscondensedmedium">'.get_sub_field('heading').'</div>
                        <div class="text-secondary">'.do_shortcode(get_sub_field('secondary_text')).'</div>';
                    }
                }
                echo '
                </div>';
            endwhile;
            echo '
            </div>';//blocks
        endif;
        ?>
        <div style="clear:both;"></div>
		<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
