<?php
/**
* Plugin Name: WooCommerce Token
* Plugin URI: https://decker.com/
* Description: An own plugin to create token for Decker Digial products.
* Version: 1.0
* Author: WordPress
* Author URI: https://decker.com/
* License: A "Slug" license name e.g. GPL12
*/
$token_plugin_url = WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) );

require_once dirname( __FILE__ ) . '/classes/classes.php';
require_once dirname( __FILE__ ) . '/includes/hooks.php';
//require_once dirname( __FILE__ ) . '/includes/widgets.php';
function wootokens_add_web_tokens( $data ) {
    global $web_tokens;
    $id = $web_tokens->add_web_tokens( $data );
    return $id;
}
function wootokens_get_web_tokens( $order_id = NULL ) {
    global $web_tokens;
    $tokens = $web_tokens->get_web_tokens( $order_id );
    return $tokens;
}
function wootokens_get_web_token( $order_id = NULL ) {
    global $web_tokens;
    $tokens = $web_tokens->get_web_token_by_id( $order_id );
    return $tokens;
}
function wootokens_get_import_user( $userid = NULL ) {
    global $wpdb;
    $sql = "select * from {$wpdb->prefix}web_import_users ";
    if(!is_null($userid))
    {
        $sql .= " where id = ". $userid;
    }
    $sql .= " ORDER BY id;";
    $web_tokens = $wpdb->get_row($sql);
    return $web_tokens;
}

?>