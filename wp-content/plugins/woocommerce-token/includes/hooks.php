<?php
add_action( 'init', 'web_token_init' );

function web_token_init() {
    global $wpdb, $web_tokens,$web_token_devices;

    $web_tokens = new WooCommerce_Token();

    $wpdb->web_tokens = $wpdb->prefix . 'web_tokens';
    /*if ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) {
       if ( get_user_option( 'rich_editing' ) == 'true' ) {
          add_filter( 'mce_external_plugins', 'ubm_add_plugin' );
          add_filter( 'mce_buttons', 'ubm_register_button' );
       }
    }*/
}

add_action( 'rest_api_init', 'web_tokens_routes' );

function web_tokens_routes() 
{
	register_rest_route( 'wt/v1', '/verifytoken', array(
		'methods' => 'POST',
		'callback' => "verify_tokens",
		'permission_callback' => function(){ return true; }
	) );
}
function verify_tokens(WP_REST_Request $request) {

	global $wpdb, $web_tokens;
	$web_tokens = new WooCommerce_Token();
	$params = $request->get_params();
    $type = $params['type'];
    if($type == "verify_tokens")
    {
    	return $web_tokens->verify_tokens($request);
    }
    elseif($type == "add_new")
    {
    	return $web_tokens->add_new($request);
    }
	
}

?>