<?php
/**
 * WooCommerce Tokens Table List
 *
 * @author   WooThemes
 * @category Admin
 * @package  WooCommerce/Admin
 * @version  2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class WC_Admin_Device_Histories_Table_List extends WP_List_Table {


	/** Class constructor */
	public function __construct() {

		parent::__construct( [
			'singular' => __( 'device_history', 'woocommerce' ), //singular name of the listed records
			'plural'   => __( 'device_histories', 'woocommerce' ), //plural name of the listed records
			'ajax'     => false //does this table support ajax?
		] );
	}
	/**
	 * Get list columns.
	 *
	 * @return array
	 */
	public function get_columns() {
		$columns =  array(
			'device_id' => __( 'Device ID', 'woocommerce' ),
			'access_ip'       => __( 'IP', 'woocommerce' ),
			'access_date' => __( 'Accessed Date', 'woocommerce' ),
		);
		return $columns;
	}

	/**
	 * Retrieve tokens data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_web_device_histories( $per_page = 5, $page_number = 1,$tid ) {

		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}web_device_history";
		$sql .=" where device_id = {$tid}";
		if ( ! empty( $_REQUEST['orderby'] ) ) {
			$sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
			$sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' desc';
		}
		else
		{
			$sql .= ' ORDER BY id desc';
		}

		$sql .= " LIMIT $per_page";
		$sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );

		return $result;
	}
	/**
	 * Delete a customer record.
	 *
	 * @param int $id web_token ID
	 */
	public static function delete_web_token( $id ) {
		global $wpdb;

		$wpdb->delete(
			"{$wpdb->prefix}web_tokens",
			[ 'id' => $id ],
			[ '%d' ]
		);
	}
	/**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public static function record_count($id) {
		global $wpdb;

		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}web_device_history";
		$sql .=" where device_id = {$id}";

		return $wpdb->get_var( $sql );
	}
	/** Text displayed when no customer data is available */
	public function no_items() {
		_e( 'No tokens avaliable.', 'sp' );
	}
	/**
	 * Render a column when no column specific method exist.
	 *
	 * @param array $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'id':
			default:
				return $item[ $column_name ];
				//return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}
	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
		);
	}
	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_name( $item ) {

		$delete_nonce = wp_create_nonce( 'sp_delete_customer' );

		$title = '<strong>' . $item['name'] . '</strong>';

		$actions = [
			'delete' => sprintf( '<a href="?page=%s&action=%s&token=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['ID'] ), $delete_nonce )
		];

		return $title . $this->row_actions( $actions );
	}
	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'order_id' => array( 'order_id', true ),
			'product_id' => array( 'product_id', false ),
			'short_url' => array( 'short_url', false ),
			'token' => array( 'id', false ),
			'token_device_limit' => array( 'token_device_limit', false ),
			'token_expiry_date' => array( 'token_expiry_date', false ),
		);
		return $sortable_columns;
	}
	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */
	/*public function get_bulk_actions() {
		$actions = [
			'bulk-delete' => 'Delete'
		];

		return $actions;
	}*/
	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {
		$device_id = $_GET['device_id'];
		$per_page = $this->get_items_per_page( 'token_devices_per_page', 10 );
		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();

		// Column headers
		$this->_column_headers = array( $columns, $hidden, $sortable );
		/** Process bulk action */
		//$this->process_bulk_action();

		
		$current_page = $this->get_pagenum();
		$total_items  = self::record_count($device_id);

		$this->items = self::get_web_device_histories( $per_page, $current_page,$device_id);
		$this->set_pagination_args( [
			'total_items' => $total_items, //WE have to calculate the total number of items
			'per_page'    => $per_page //WE have to determine how many items to show on a page
		] );
	}
	public function process_bulk_action() {
		//Detect when a bulk action is being triggered...
		if ( 'delete' === $this->current_action() ) {

			// In our file that handles the request, verify the nonce.
			$nonce = esc_attr( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'sp_delete_customer' ) ) {
				die( 'Go get a life script kiddies' );
			}
			else {
				self::delete_customer( absint( $_GET['customer'] ) );

		                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		                // add_query_arg() return the current url
		                wp_redirect( esc_url_raw(add_query_arg()) );
				exit;
			}

		}

		// If the delete bulk action is triggered
		if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
		     || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
		) {

			$delete_ids = esc_sql( $_POST['bulk-delete'] );

			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $id ) {
				self::delete_customer( $id );

			}

			// esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		        // add_query_arg() return the current url
		        wp_redirect( esc_url_raw(add_query_arg()) );
			exit;
		}
	}
}