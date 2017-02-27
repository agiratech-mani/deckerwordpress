<?php
// Add CSS to Visual Editor
add_editor_style('child-editor-style.css');

remove_action('wp_head', 'wp_generator');

//Turn links off for images by default
update_option('image_default_link_type','none');

//remove auto loading rel=next post link in header
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

function field_func($atts) {
   global $post;
   $name = $atts['name'];
   if (empty($name)) return;
   return do_shortcode(get_post_meta($post->ID, $name, true));
}
add_shortcode('field', 'field_func');


//change up the sidebars - add left sidebar to admin area
function decker_widgets_init() {

	register_widget( 'Twenty_Eleven_Ephemera_Widget' );

	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/*register_sidebar( array(
		'name' => __( 'Showcase Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/

	register_sidebar( array(
		'name' => __( 'Footer Area - Top', 'twentyeleven' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area - Left', 'twentyeleven' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area - Right', 'twentyeleven' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
remove_action( 'widgets_init', 'twentyeleven_widgets_init',10 );
add_action( 'widgets_init', 'decker_widgets_init',20 );




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


function enable_more_buttons($buttons) {
  $buttons[] = 'hr';

  /*
  Repeat with any other buttons you want to add, e.g.
	  $buttons[] = 'fontselect';
	  $buttons[] = 'sup';
  */

  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");




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
            <a href="/training-formats-programs/program-registration/">
            <p class="title '.$attr['class'].'">Grab a seat in an open class '.$arrow.'</p>
            <p>Register online now!</p>
            </a>';

    if($attr['class']=='ciacs'){
        $kindofprogram1 = 'a workshop for your team';
        $kindofprogram2 = 'workshop';
    } elseif($attr['class']=='ac'){
        $kindofprogram1 = 'coaching for<br />your big presentation';
        $kindofprogram2 = 'coaching';
    } elseif($attr['class']=='ec'){
        $kindofprogram1 = 'an executive coaching session';
        $kindofprogram2 = 'coaching';
    } else {
        $kindofprogram1 = 'a program for your team';
        $kindofprogram2 = 'program';
    }
    $cta_schedule = '
            <a href="'.$otherlink.'">
            <p class="title '.$attr['class'].'">Schedule '.$kindofprogram1.' '.$arrow.'</p>
            <p>'.$otherword.'</p>
            </a>';
    $cta_download = '
            <a href="'.$attr['pdflink'].'" target="_blank">
            <p class="title '.$attr['class'].'">Download the '.$kindofprogram2.' overview '.$arrow.'</p>
            <p>Get a printer-friendly<br />PDF with Agenda</p>
            </a>';

    if($attr['type']=='group'){
        if($attr['class']=='cti' || $attr['class']=='dmtsm'){
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
            $cta ='
    <div class="call-to-action group '.$attr['class'].'">
        <div class="cta1">
            '.$cta_schedule.'
        </div>
        <div class="cta3">
            '.$cta_download.'
        </div>
        <div style="clear:both;"></div>
    </div>';
        }
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
    echo '
    <p>
        <span>Posted by <a href="/about-us/our-team/">'.get_the_author().'</a></span>
            <span class="sep">|</span>
        '.esc_html( get_the_date() ).'
            <span class="sep">|</span>
        <a href="'.esc_url( get_permalink() ).'#comments">';
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


//woocommerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 30 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function custom_excerpt_length( $length ) {
	return 10000;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


add_action( 'after_setup_theme', 'my_child_theme_setup' );
function my_child_theme_setup() {
    remove_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20);

/*
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_product_excerpt', 35, 2);
if (!function_exists('woocommerce_product_excerpt')) {
    function woocommerce_product_excerpt() {
        global $product;
        if($product->virtual=='yes'){//program registration
            echo '<div class="pexcerpt">';
            the_excerpt();
            echo '</div>';
        }
    }
}*/
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_product_desc', 40, 2);
if (!function_exists('woocommerce_product_desc')) {
    function woocommerce_product_desc() {
        global $product;
        if($product->virtual=='no'){//books and dvds
            echo '<div class="pdesc">';
            the_excerpt();
            the_content();
            echo '</div>';
        }
    }
}

add_filter('add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text() {
    global $product;
    if($product->virtual=='yes'){//program registration
        return __('Register Now', 'woocommerce');
    } else {
        return __('Add to Cart', 'woocommerce');
    }
}

add_action( 'woocommerce_before_checkout_form', 'address_disclaimer', 20);
if (!function_exists('address_disclaimer')) {
    function address_disclaimer() {
        echo '<p>Our system uses billing address verification. Please use your credit card billing address.</p>';
    }
}