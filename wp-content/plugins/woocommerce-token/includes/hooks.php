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

?>