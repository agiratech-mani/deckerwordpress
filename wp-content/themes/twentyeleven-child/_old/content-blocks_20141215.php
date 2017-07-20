<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<style type="text/css">
.page-template-page-full-width-php #primary {
    margin:0;
}
.block-headliner {
    width:100%;
    max-width:100%;
    height:528px;
    margin:0 0 14px 0;
    color:#fff;
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
.arrow_box:after { top: 100%; left: 65px; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; border-color: rgba(255, 255, 255, 0); border-top-color: #ffffff; border-width: 20px; margin-left: -20px; }

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
.block .text-heading,
.block .text-secondary {
    padding:23px;
}
.size-fullwidthcontent .text-heading,
.size-twothirds .text-heading {
    padding:91px 23px 23px 56px;
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
.size-fullwidthcontent .text-third {
    width:50%;
    float:right;
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
                    <div class="text-heading">'.get_sub_field('heading').'</div>
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
                //print_r($photo_background);
                if($background=='photo'){
                    $class .= ' style="background-image:url('.$photo_background['url'].');"';
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
                        <div class="text-heading">'.get_sub_field('heading').'</div>
                        <div class="text-secondary">'.get_sub_field('secondary_text').'</div>
                    </a>';
                } else {
                    echo '
                        <div class="text-heading">'.get_sub_field('heading').'</div>
                        <div class="text-secondary">'.do_shortcode(get_sub_field('secondary_text')).'</div>';
                    if($type=='fullwidthcontent'){
                        echo '
                        <div class="text-third">'.do_shortcode(get_sub_field('next_column_content')).'</div>';
                    }
                }
                echo '
                </div>';
            endwhile;
            echo '
            </div>';
        endif;
        ?>
        <div style="clear:both;"></div>
		<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
