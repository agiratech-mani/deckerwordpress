<?php
/**
 * REST API Tokens controller
 *
 * Handles requests to the /tokens endpoint.
 *
 * @author   WooThemes
 * @category API
 * @package  WooCommerce/API
 * @since    2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * REST API Webhooks controller class.
 *
 * @package WooCommerce/API
 * @extends WC_REST_Posts_Controller
 */
class WC_REST_Tokens_Controller extends WC_REST_Posts_Controller {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'wc/v1';

	/**
	 * Route base.
	 *
	 * @var string
	 */
	protected $rest_base = 'tokens';

	/**
	 * Post type.
	 *
	 * @var string
	 */
	protected $post_type = 'tokens';

	/**
	 * Initialize Webhooks actions.
	 */
	public function __construct() {
		add_filter( "woocommerce_rest_{$this->post_type}_query", array( $this, 'query_args' ), 10, 2 );
	}

	/**
	 * Register the routes for webhooks.
	 */
	public function register_routes() {
		register_rest_route( $this->namespace, '/' . $this->rest_base, array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_tokens' ),
				'permission_callback' => array( $this, 'get_tokens_permissions_check' ),
				//'args'                => $this->get_collection_params(),
			),
			//'schema' => array( $this, 'get_public_item_schema' ),
		) );
	}
	public function get_tokens_permissions_check( $request ) {
		return true;
	}
	public function get_tokens( $request ) 
	{
		$data = array( 'some', 'response', 'data' );

		// Create the response object
		$response = new WP_REST_Response( $data );

		// Add a custom status code
		$response->set_status( 201 );

		// Add a custom header
		$response->header( 'Location', 'http://example.com/' );

		return $response;
	}

}
