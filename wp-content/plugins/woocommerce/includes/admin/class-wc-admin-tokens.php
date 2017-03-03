<?php
/**
 * Token Page
 *
 * @author   WooThemes
 * @category Admin
 * @package  WooCommerce/Admin
 * @version  2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_Admin_Tokens Class.
 */
class WC_Admin_Tokens {
	/**
	 * Handles output of the addons page in admin.
	**/
	public static function output() {
		self::table_list_output();
		//include_once( 'views/html-admin-page-coupons.php' );
	}
	private static function table_list_output() {
		echo '<h2>' . __( 'Web Tokens', 'woocommerce' ) . '</h2>';

		$tokens_table_list = new WC_Admin_Tokens_Table_List();
		$tokens_table_list->prepare_items();

		echo '<input type="hidden" name="page" value="wc-tokens" />';
		echo '<input type="hidden" name="section" value="tokens" />';

		$tokens_table_list->views();
		//$tokens_table_list->search_box( __( 'Search Token', 'woocommerce' ), '	token' );
		$tokens_table_list->display();
	}
}
