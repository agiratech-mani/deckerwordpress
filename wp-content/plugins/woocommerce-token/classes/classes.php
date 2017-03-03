<?php
class WooCommerce_Token 
{
	static private $tokens         = array();

    public function add_web_tokens($data) {
        global $wpdb;
        $web_tokens_data = array(
            'order_id'				=> $data['order_id'],
            'user_id'				=> $data['user_id'],
            'product_id'			=> $data['product_id'],
            'token'					=> $data['token'],
            'short_url'				=> $data['short_url'],
            'token_device_limit'	=> $data['token_device_limit'],
            'token_created_date'	=> $data['token_created_date'],
            'token_expiry_date'		=> $data['token_expiry_date'],
            'token_last_accessed'	=> $data['token_last_accessed'],
            'token_last_device'		=> $data['token_last_device']
        );

        $wpdb->insert( $wpdb->web_tokens, $data );

        $id = $wpdb->insert_id;
        return $id;
    }
    public function get_web_tokens($order_id = NULL) {
        global $wpdb;
        $sql = "SELECT tokens.*,posts.post_title as product FROM " . $wpdb->web_tokens." as tokens ";
        $sql .= "LEFT JOIN ".$wpdb->posts." as posts on posts.id = tokens.`product_id`";
        if(!is_null($order_id))
        {
            $sql .= " where order_id = ". $order_id;
        }
        $sql .= " ORDER BY id;";
        $web_tokens = $wpdb->get_results($sql);
        return $web_tokens;
    }
}