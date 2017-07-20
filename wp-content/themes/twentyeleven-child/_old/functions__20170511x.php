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


/* Change the "Proceed to PayPal" button text in the WooCommerce checkout screen */
add_filter( 'gettext', 'custom_paypal_button_text', 20, 3 );
function custom_paypal_button_text( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Proceed to PayPal' :
			$translated_text = __( 'Proceed to Payment', 'woocommerce' );
			break;
	}
	return $translated_text;
}


// Callback function to insert 'styleselect' into the $buttons array for visual editor
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Light Gray Text',
			'inline' => 'span',
			'classes' => 'text-gray-light',
			'wrapper' => true,

		),
		array(
			'title' => 'Blue Text',
			'inline' => 'span',
			'classes' => 'text-blue',
			'wrapper' => true,
		)
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



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
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

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

	register_sidebar( array(
		'name' => __( 'Landing Page Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-6',
		'description' => __( 'The sidebar for the landing page', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Home Page Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-7',
		'description' => __( 'The bottom right square on the home page', 'twentyeleven' ),
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
    if($params[0]['widget_id']=='text-3' || $params[0]['widget_id']=='text-6' || $params[0]['widget_id']=='text-8'
       || $params[0]['widget_id']=='text-11'){
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
    $arrow = '<img src="/wp-content/themes/twentyeleven-child/images/arrow-'.$arrow_color.'-large.jpg" width="8" height="9" alt="Communications Solutions" title="Communications Solutions" />';

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


function call_to_action_city_cti($attr) {

    $arrow = '<img src="/wp-content/themes/twentyeleven-child/images/arrow-blue-large.jpg" width="8" height="9" alt="Communications Solutions" title="Communications Solutions" />';

    $cta_enroll = '
            <a href="'.$attr['classlink'].'">
            <p class="title cti">Enroll in '.$attr['classlocation'].'<br />on '.$attr['classdates']. ' ' .$arrow.'</p>
            <p>'.$attr['registerby'].'</p>
            </a>';

    $cta_download = '
        <a href="'.$attr['pdflink'].'" target="_blank">
        <p class="title '.$attr['class'].'">Download the<br />program overview '.$arrow.'</p>
        <p>to learn exactly what you\'ll get</p>
        </a>';

    $cta ='
        <div class="call-to-action group cti">
            <div class="cta-left">
                '.$cta_enroll.'
            </div>
            <div class="cta-right">
                '.$cta_download.'
            </div>
            <div style="clear:both;"></div>
        </div>';

    return $cta;
}
add_shortcode('call_to_action_block_city_cti', 'call_to_action_city_cti');


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
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
function custom_excerpt_length() {
    global $myExcerptLength;

    if ($myExcerptLength) {
        return $myExcerptLength;
    } else {
        return 10000; //default value
    }
}
add_filter('excerpt_length', 'custom_excerpt_length');*/


add_action( 'after_setup_theme', 'my_child_theme_setup' );

function my_child_theme_setup() {
    remove_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );
}

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Rearrange where the Add to Cart shows up on this page:
// https://decker.com/continuous-learning/self-directed-learning-resources/
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
    if ( $product->is_virtual() ) { //program registration
        return __('Sign Up', 'woocommerce');
    } else {
        return __('Add to Cart', 'woocommerce');
    }
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom2_cart_button_text' );
function woo_custom2_cart_button_text() {
    global $product;
     if ( $product->is_virtual() ) {
        return __('Sign Up', 'woocommerce');
    } else {
        return __('Add to cart', 'woocommerce');
    }

}

add_action( 'woocommerce_before_checkout_form', 'address_disclaimer', 20);
if (!function_exists('address_disclaimer')) {
    function address_disclaimer() {
        echo '<p>Our system uses billing address verification. Please use your credit card billing address.</p>';
    }
}


function infoblock(){
    global $post;

    $infoblock = false;
    $explore_title = get_post_meta($post->ID, 'explore_title', true);
    $explore_text = get_post_meta($post->ID, 'explore_text', true);
    $match_text = get_post_meta($post->ID, 'match_text', true);

    if($explore_title || $explore_text || $match_text){
        $infoblock = '
        <div id="programs">
            <p class="top"></p>
            <div class="middle three-across">
                <div class="cell two-thirds">
                    <h2>'.$explore_title.'</h2>
                    <p>'.$explore_text.'</p>
                </div>
                <div class="cell match">
                    <a href="/training-formats-programs/solution-matching-tool/">
                        <img class="title-image" src="/wp-content/themes/twentyeleven-child/images/programs-still-not-sure.png" width="134" height="68" title="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" alt="Communications Training, Workshop, Keynote, Kickoff, Presentation, Storytelling, Messaging, Speech, Public Speaking, Video, Class, Individual, Group, Corporate, Communications, Influence, Solution, Tool, Program" /><br />
                        <p>'.$match_text.'
                        <img src="/wp-content/themes/twentyeleven-child/images/arrow-white-on-green.png" width="8" height="9" alt="Better Presentations" /></p>
                    </a>
                </div>
            </div>
            <p class="bottom"></p>
        </div>';
    }
    return $infoblock;
}
add_shortcode('infoblock', 'infoblock');



add_filter( 'pre_get_posts', 'ja_search_filter' );
/**
 * Exclude press category from search results.
 *
 * @since ?.?.?
 * @author Jared Atchison
 * @link https://gist.github.com/1300302
 *
 * @param WP_Query $query Existing query object
 * @return WP_Query Amended query object
 */
function ja_search_filter( $query ) {

    if (($query->is_search && !is_admin()) || ($query->is_feed && !$query->query['category_name'])){

        // $query->set( 'cat','-1531' );//exclude the press posts
        // $query->set('post_type', 'post');// only return posts

        //$query->set( 'cat','-1531' );//exclude the press posts
        //$query->set('post_type', array('post', 'page'));// return posts and pages
        // $query->set('post__in', array('10908', '12570', '12566', '12572', '266', '180'));

        $query->set('meta_key', 'display_in_blog_search_results');
        $query->set('meta_value', 1);

    }
    return $query;

}


function twentyeleven_press_nav( $html_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older press', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer press <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

//apply_filters('gravityforms_add_to_cart_text', apply_filters('variable_add_to_cart_text', __('Sign Up', 'wc_gf_addons')));


//if(current_user_can( 'manage_options' ) || $_SERVER['REMOTE_ADDR']=='70.178.122.202' || $_SERVER['REMOTE_ADDR']=='81.56.223.186'){
//if (current_user_can( 'manage_options' )) { // show if an admin
/**
 * Add the field to the checkout
 **/
add_action('woocommerce_after_order_notes', 'wt_attendee_details');
function wt_attendee_details( $checkout ) {
    global $woocommerce;

    //$attendee_count = wt_count_attendees();
    if(sizeof($woocommerce->cart->cart_contents) > 0){
    //if($attendee_count > 0) {

        foreach ($woocommerce->cart->get_cart() as $item_id => $values) {
            $_product = $values['data'];
            if ($_product->exists() && $values['quantity']>0) {
            //if (get_post_meta($_product->id, '_tribe_wooticket_for_event') > 0)
                $countthis = false;
                $categories = array();

                $terms = wp_get_post_terms( $_product->id, 'product_cat' );
                foreach ( $terms as $term ){
                    $categories[] = $term->term_id;
                }
                //if in a course category
               if ( in_array( 2036, $categories ) || in_array( 1377, $categories ) || in_array( 1379, $categories )     //new york courses
                   || in_array( 2048, $categories ) || in_array( 1378, $categories ) || in_array( 1376, $categories ) //san francisco courses
                    || in_array( 1379, $categories ) ) {  //courses outside NY & SF

                    $countthis = true;
                }
                if($countthis){
                    echo "</div></div>"; //close the Billing Address section to create new group of fields
                    echo "<div id='attendee_details'><div>"; //automatically be closed from 2 Billing Address's div - </div></div>
                    echo '<h3 style="clear: both; float: left; width: 100%;">
                    '.__('Please list course attendees\' names, email addresses, and job titles below.').'</h3>';

                    echo '<p style="clear: both; float: left; width: 100%;text-decoration:underline;"><strong>'.get_the_title($_product->id).'</strong></p>';
                    for($n = 1; $n <= $values['quantity']; $n++ ) {
                        woocommerce_form_field( 'attendee_name_first_'.$_product->id.'_'.$n, array(
                            'type'          => 'text',
                            'class'         => array('form-row form-row-first'),
                            'label'         => __('<strong>Attendee '.$n.'</strong> First Name'),
                            'placeholder'   => __('first name'),
                            'required'      => true,
                        ),
                        $checkout->get_value( 'attendee_name_first_'.$_product->id.'_'.$n ));
                        woocommerce_form_field( 'attendee_name_last_'.$_product->id.'_'.$n, array(
                            'type'          => 'text',
                            'class'         => array('form-row'),
//                            'label'         => __('Attendee '.$n.' Last Name'),
                            'label'         => __('Last Name'),
                            'placeholder'   => __('last name'),
                            'required'      => true,
                        ),
                        $checkout->get_value( 'attendee_name_last_'.$_product->id.'_'.$n ));
                        woocommerce_form_field( 'attendee_email_'.$_product->id.'_'.$n, array(
                            'type'          => 'text',
                            'class'         => array('form-row validate-email'),
//                            'label'         => __('Attendee  '.$n.' Email'),
                            'label'         => __('Email'),
                            'placeholder'       => __('email'),
                            'required'      => true,
                        ),
                        $checkout->get_value( 'attendee_title_'.$_product->id.'_'.$n ));
                        woocommerce_form_field( 'attendee_title_'.$_product->id.'_'.$n, array(
                            'type'          => 'text',
                            'class'         => array('form-row form-row-last'),
//                            'label'         => __('Attendee  '.$n.' Title'),
                            'label'         => __('Title'),
                            'placeholder'       => __('title'),
                            'required'      => false,
                        ),
                        $checkout->get_value( 'attendee_title_'.$_product->id.'_'.$n ));
                    }
                }
            }
        }
        echo "<style type='text/css'>
                    #attendee_details .form-row {
                        float: left;
/*                        margin-right: 2%;*/
                        margin-right: 0;
                        padding-right: 2px;
                        padding-left: 0px;
/*                        width: 31%;*/
                        width: 24%;
                    }
                    #attendee_details .form-row-last {
                        margin-right: 0;
                    }
                </style>";
    }
    //echo "Attendees: " . $attendee_count;
//}
}


/**
 * Process the checkout
 **/
add_action('woocommerce_checkout_process', 'wt_attendee_fields_process');
function wt_attendee_fields_process() {
    global $woocommerce;

    foreach ($woocommerce->cart->get_cart() as $item_id => $values) {
        $_product = $values['data'];

        $attendee_count = wt_count_attendees($_product->id);
        for($n = 1; $n <= $attendee_count; $n++ ) {
            if (!$_POST['attendee_email_'.$_product->id.'_'.$n] || !$_POST['attendee_name_first_'.$_product->id.'_'.$n] || !$_POST['attendee_name_last_'.$_product->id.'_'.$n]){
                $error = true;
                break;
            }
        }
    }
    if($error) {
        $woocommerce->add_error( __('Please enter each course attendee\'s first and last name and email address.') );
    }

}

/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'wt_attendee_update_order_meta');

function wt_attendee_update_order_meta( $order_id ) {
    global $woocommerce;

    foreach ($woocommerce->cart->get_cart() as $item_id => $values) {
        $_product = $values['data'];

        $attendee_count = wt_count_attendees($_product->id);
        for($n = 1; $n <= $attendee_count; $n++ ) {
            if ($_POST['attendee_name_first_'.$_product->id.'_'.$n]) update_post_meta( $order_id, $_product->post->post_title .' Attendee '.$n.' First Name', esc_attr($_POST['attendee_name_first_'.$_product->id.'_'.$n]));
            if ($_POST['attendee_name_last_'.$_product->id.'_'.$n]) update_post_meta( $order_id, $_product->post->post_title .' Attendee '.$n.' Last Name', esc_attr($_POST['attendee_name_last_'.$_product->id.'_'.$n]));
            if ($_POST['attendee_email_'.$_product->id.'_'.$n]) update_post_meta( $order_id, $_product->post->post_title .' Attendee '.$n.' Email', esc_attr($_POST['attendee_email_'.$_product->id.'_'.$n]));
            if ($_POST['attendee_title_'.$_product->id.'_'.$n]) update_post_meta( $order_id, $_product->post->post_title .' Attendee '.$n.' Title', esc_attr($_POST['attendee_title_'.$_product->id.'_'.$n]));
        }
    }
}
function wt_count_attendees($count_this_product) {
    global $woocommerce;
    $attendee_count = 0;

    if (sizeof($woocommerce->cart->get_cart())>0) :
        foreach ($woocommerce->cart->get_cart() as $item_id => $values) :
            $_product = $values['data'];
            if ($_product->exists() && $values['quantity']>0) :
            //if (get_post_meta($_product->id, '_tribe_wooticket_for_event') > 0)
                $countthis = false;
                $categories = array();
                if(!$count_this_product || (intval($count_this_product) > 0 && $count_this_product==$_product->id)){

                    $terms = wp_get_post_terms( $_product->id, 'product_cat' );
                    foreach ( $terms as $term ){
                        $categories[] = $term->term_id;
                    }
                    // if in a New York category
//                    if ( in_array( 2036, $categories ) || in_array( 1377, $categories ) || in_array( 1379, $categories )  || in_array( 2058, $categories ) ) {
              if ( in_array( 2036, $categories ) || in_array( 1377, $categories ) || in_array( 1379, $categories )     //new york courses
                   || in_array( 2048, $categories ) || in_array( 1378, $categories ) || in_array( 1376, $categories ) //san francisco courses
                    || in_array( 1379, $categories ) ) {  //courses outside NY & SF

                        $countthis = true;
                    }
                    if($countthis){
                        $attendee_count += $values['quantity'];
                    }
                }
            endif;
        endforeach;
    endif;

    return $attendee_count;
}
add_action('woocommerce_checkout_update_order_meta', 'wt_tokens_update_order_meta');

function wt_tokens_update_order_meta( $order_id ) 
{
    global $woocommerce;
    $current_user = wp_get_current_user();
    $bitly_login = get_option( 'woocommerce_bitly_login', '' );
    $bitly_api_key = get_option( 'woocommerce_bitly_api_key', '' );
    foreach ($woocommerce->cart->get_cart() as $item_id => $values) 
    {
         $_product = $values['data'];
        if($_product->product_type == "course")
        {
           
            $product_id = $_product->id;
            $courseurl = $_product->get_course_url();
            $devices_limit = $_product->get_devices_limit();
            $token_expiry = $_product->get_token_expiry();
            $product_type = $_product->get_type();
            //$attendee_count = wt_count_attendees($_product);
            $dateobj = new DateTime();
            $createdate = $dateobj->format('Y-m-d H:i:s');
            if($token_expiry != '' && $token_expiry > 0)
            {
                $dateobj->add(new DateInterval('P'.$token_expiry.'D'));
                $expirydate = $dateobj->format('Y-m-d H:i:s');
            }
            else
            {
                $expirydate = '';
            }
            
            if ($_product->exists() && $values['quantity'] > 0 && $product_type == "course")
            {   
                $terms = wp_get_post_terms( $_product->id, 'product_cat' );
                foreach ( $terms as $term ){
                    $categories[] = $term->term_id;
                }
                if ( in_array(2448,$categories ))
                {
                    //update_post_meta( $order_id, $_product->post->post_title .' Tokens '.$n.' Title', uniqid());
                    for($p = 0;$p < $values['quantity'];$p++)
                    {
                       $token = uniqid();
                       $long_url = $courseurl.'?token='.$token;
                       $short_url = get_bitly_short_url($long_url,$bitly_login,$bitly_api_key);
                       $banner_data = array(
                            'order_id'              => $order_id,
                            'user_id'               => $current_user->ID,
                            'product_id'            => $product_id,
                            'token'                 => $token,
                            'short_url'             => trim($short_url),
                            'long_url'              => $long_url,
                            'token_device_limit'    => $devices_limit,
                            'token_created_date'    => $createdate,
                            'token_expiry_date'     => $expirydate,
                            'token_last_accessed'   => '',
                            'token_last_device'     => ''
                        );
                        wootokens_add_web_tokens($banner_data);
                        /*$to = "mani@securenext.net";
                        $subject = "Tokens";
                        $message = print_r($banner_data,true);
                        wp_mail( $to, $subject, $message);*/
                    }
                    
                }
            }
        }
    }
}
function get_bitly_short_url($url,$login,$appkey,$format='txt') {
    $connectURL = 'http://api.bit.ly/v3/shorten?login='.$login.'&apiKey='.$appkey.'&uri='.urlencode($url).'&format='.$format;
    return curl_get_result($connectURL);
}

/* returns expanded url */
function get_bitly_long_url($url,$login,$appkey,$format='txt') {
    $connectURL = 'http://api.bit.ly/v3/expand?login='.$login.'&apiKey='.$appkey.'&shortUrl='.urlencode($url).'&format='.$format;
    return curl_get_result($connectURL);
}

/* returns a result form url */
function curl_get_result($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function wt_count_tokens($count_this_product) 
{
    global $woocommerce;

}


 // Change who gets the automatic WP update emails
function change_auto_update_email( $email ) {
     $email['to'] = 'support@redearthdesign.com';
     return $email;
}

add_filter( 'auto_core_update_email', 'change_auto_update_email', 1 );

//add_action('woocommerce_before_cart_table', 'adjust_coupons');
add_action( 'woocommerce_applied_coupon', 'adjust_coupons' );
function adjust_coupons( ) {
    //global $woocommerce;
    $coupon_codes = array('ceciliasummer','debrasummer','joesummer','jwsummer','marcsummer','scottsummer',
        'sunnysummer','susansummer','terrysummer',
        'bicti','bidmtsm',        
        'aspencti');
    // make sure both coupon codes have the 'exclude sale items' unchecked

    if(sizeof(WC()->cart->get_cart())>0){
        if(is_array($coupon_codes)){
            foreach($coupon_codes as $coupon_code){
                $coupon_code_new = $coupon_code.'-earlybird'; //echo $coupon_code_new;echo '<pre>';print_r($woocommerce->cart);echo '</pre>';

                // if they have an early bird version of the coupon code
                if(WC()->cart->has_discount(sanitize_text_field($coupon_code_new))){
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		                if ( function_exists( 'get_product') ){
                	        $product = get_product( $cart_item['product_id'] );
		                } else {
                            $product = new WC_Product( $cart_item['product_id'] );
                        }
                        if ( !$product->is_on_sale()) {// if the course is not on sale
                            // remove the earlybird version of the coupon code from their cart
			                if (WC()->cart->remove_coupons( sanitize_text_field( $coupon_code_new ))) {
                                //WC()->show_messages();
                            }
                            WC()->cart->calculate_totals();
                        }
                    }
                }
                //if the customer uses a summer coupon code
                if(WC()->cart->has_discount(sanitize_text_field($coupon_code))){
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		                if ( function_exists( 'get_product') ){
                	        $product = get_product( $cart_item['product_id'] );
		                } else {
                            $product = new WC_Product( $cart_item['product_id'] );
                        }
                        if ( $product->is_on_sale()) {// if the course is on sale
                            // remove the main version of the coupon code from their cart
			                if (WC()->cart->remove_coupons( sanitize_text_field( $coupon_code ))) {
                                //$woocommerce->show_messages();
                            }
                            // and replace with the early bird version of the coupon
                            if (!WC()->cart->add_discount( sanitize_text_field( $coupon_code_new ))) {
                                WC()->show_messages();
                            }
                            WC()->cart->calculate_totals();
                        }
                    }
                }
            }
        }
    }
}

//[link-button link="#fancyboxID-1" text="Talk to a Person" class="fancybox red"]
function get_button($attr) {
    $link = strip_tags($attr['link']);
    $class = strip_tags($attr['class']);
    if($attr['small']){
        $textsml = '<span class="small">'.strip_tags($attr['small']).'</span><br />';
    }
    $text = strip_tags($attr['text']);

    $button = '<a href="'.$link.'" target="_blank" class="link-button '.$class.'">'.$textsml.$text.'</a>';
    return $button;
}
add_shortcode('link-button', 'get_button');


// ACF edit style of editor
add_action('admin_head', 'admin_custom_styles');
function admin_custom_styles() {
  echo '
	<style>
    .acf-field.acf-field-57ce379c9e86a .wp-editor-area {
			height: 120px !important;
		} 
  </style>';
}

function get_video($attr) {
    $vid = strip_tags($attr['vid']);
    $type = strip_tags($attr['type']);

    if($type=="digital"){
        $width = '830';
        $height = '467';
    }
    $video = '
    <div id="video-'.$type.'">
        <iframe id="play-digital" src="https://www.youtube.com/embed/'.$vid.'?modestbranding&amp;showinfo=0&amp;theme=light&amp;rel=0" width="'.$width.'" height="'.$height.'" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
        <div class="video-overlay"></div>
    </div>';
    return $video;
}
add_shortcode('video', 'get_video');

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


// Woocommerce customize email notification
// Recipients: finance@decker.com, celeste@decker.com, courtney@decker.com
add_action('woocommerce_email_after_order_table', 'add_order_email_instructions', 10, 2);
function add_order_email_instructions($order, $sent_to_admin) {
	if (!$sent_to_admin) {
		global $woocommerce;
		
		$order_id = $order->id;
		$items = $order->get_items();
		$_add_customer_term = get_post_meta($order_id,"_add_customer_term",true);
		
		if(!$_add_customer_term) {
			update_post_meta($order_id,"_add_customer_term",1);
			
			foreach ($items as $key => $item) {
				$_product_id = $item['item_meta']['_product_id'][0];
				$terms = get_the_terms($_product_id, 'product_cat');
				
				foreach ($terms as $term) {
					$_categoryid = $term->term_id;
					if(($_categoryid === 2448)) {
						// Message that goes out in admin's order notes
						$order->add_order_note("Customer agreed with the terms and conditions");
					}
				}
			}
		}
		echo "<br/>";
		echo "This receipt also verifies that you have read and accepted the <a href='https://decker.com/terms-and-conditions'>Terms and Conditions</a>";
	}
}
