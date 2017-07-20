<?php
// Add CSS to Visual Editor
add_editor_style('child-editor-style.css');

remove_action('wp_head', 'wp_generator');

//Turn links off for images by default
update_option('image_default_link_type','none');

//remove auto loading rel=next post link in header
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// set default template to have a sidebar
add_filter('body_class', 'fix_body_class_for_sidebar', 20, 2);
function fix_body_class_for_sidebar($wp_classes, $extra_classes) {
    if( is_single() || is_page() ){
       if (in_array('singular',$wp_classes)){
            foreach($wp_classes as $key => $value) {
                if ($value == 'singular')
                    unset($wp_classes[$key]);
            }
        }
    }

    return array_merge($wp_classes, (array) $extra_classes);
}

// add a top and bottom image to sidebars
add_filter('dynamic_sidebar_params', 'sidebar_styling');
function sidebar_styling($params){
    if($params[0]['widget_id']=='text-3' || $params[0]['widget_id']=='text-6'){
        $params[0]['before_widget'] = '<div class="aside-top '.$params[0]['widget_id'].'"></div><aside id="text-'.@$params[0]['widget_id'].'" class="widget widget_text">';
        $params[0]['after_widget'] = '</aside><div class="aside-bottom '.$params[0]['widget_id'].'"></div>';
    }
    return $params;
}


function call_to_action($attr) {

    if($attr['class']=="dmtsm"){
        $arrow_color = 'orange';
    } else {
        $arrow_color = 'blue';
    }
    $arrow = '<img src="/wp-content/themes/twentyeleven-child/images/arrow-'.$arrow_color.'-large.jpg" width="8" height="9" alt="." />';

    $otherlink = '#';
    if($attr['type']=='group'){
        $otherword = 'Call 877.485.0700 or fill out our contact form to get started';
        $otherlink = '/contact/';

    } else { //type=open
        $otherword = 'Enroll a group in<br />'.$attr['classname'];

        if($attr['class']=='cti'){
            $otherlink = '/training-formats-programs/corporate-training-solutions/group-training/communicate-to-influence/';
        } elseif($attr['class']=='dmtsm'){
            $otherlink = '/training-formats-programs/corporate-training-solutions/group-training/decker-made-to-stick-messaging/';
        }
    }

    $cta_grab = '
            <a href="#">
            <p class="title '.$attr['class'].'">Grab a seat in an open class '.$arrow.'</p>
            <p>Register online now!</p>
            </a>';
    $cta_schedule = '
            <a href="'.$otherlink.'">
            <p class="title '.$attr['class'].'">Schedule a program for your team '.$arrow.'</p>
            <p>'.$otherword.'</p>
            </a>';
    $cta_download = '
            <a href="'.$attr['pdflink'].'">
            <p class="title '.$attr['class'].'">Download the program overview '.$arrow.'</p>
            <p>Get a printer-friendly<br />PDF with Agenda</p>
            </a>';

    if($attr['type']=='group'){
        $cta = '
    <div class="call-to-action group '.$attr['class'].'">
        <div class="cta1">
            '.$cta_schedule.'
        </div>
        <div class="cta2">
            '.$cta_grab.'
        </div>
        <div class="cta3">
            '.$cta_download.'
        </div>
        <div style="clear:both;"></div>
    </div>';
    } else {
        $cta = '
    <div class="call-to-action '.$attr['class'].'">
        <div class="cta1">
            '.$cta_grab.'
        </div>
        <div class="cta2">
            '.$cta_schedule.'
        </div>
        <div class="cta3">
            '.$cta_download.'
        </div>
        <div style="clear:both;"></div>
    </div>';
    }
    return $cta;
}
add_shortcode('call_to_action_block', 'call_to_action');


/*// change the placeholder wording in the search box
add_filter('get_search_form', 'my_search_form');
function my_search_form($text) {
     $text = str_replace('value="Search"', 'value="Search the blog"', $text);
     return $text;
}*/


// override default posted_on function
function twentyeleven_posted_on() {
    $author_id =  get_the_author_meta( 'ID' );
    echo get_avatar( $author_id, $size = '52');
    if($author_id==2){
        //echo '<img src="/wp-content/themes/twentyeleven-child/images/blog-ben-decker.jpg" alt="Ben Decker" width="52" height="53" />';
    }
    echo '
    <p>
        <span>Posted by <a href="/about-us/our-team/">'.get_the_author().'</a></span>
            <span class="sep">|</span>
        '.esc_html( get_the_date() ).'
            <span class="sep">|</span>
        <a href="'.esc_url( get_permalink() ).'#respond">';
        if(get_comments_number()==1){
            echo get_comments_number().' Comment';
        } else {
            echo get_comments_number().' Comments';
        }
        echo '</a>
            <span class="sep">|</span>
        <a href="http://twitter.com/home/?status=Reading%20'.esc_html(get_the_title()).'%20http://decker.com/blog/?p='.get_the_ID().'" target="_blank">Tweet this</a>
    </p>
    ';
}
