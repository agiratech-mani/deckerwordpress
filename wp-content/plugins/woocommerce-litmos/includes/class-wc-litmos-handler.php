<?php
/**
 * WooCommerce Litmos
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Litmos to newer
 * versions in the future. If you wish to customize WooCommerce Litmos for your
 * needs please refer to http://docs.woothemes.com/document/litmos/ for more information.
 *
 * @package     WC-Litmos/Handler
 * @author      SkyVerge
 * @copyright   Copyright (c) 2013-2016, SkyVerge, Inc.
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

/**
 * Litmos Handler class
 *
 * Handles the majority of order export actions for single / multi instance purchases
 *
 * @since 1.0
 */
class WC_Litmos_Handler {

	/** @var \WC_Order */
	private $order;


	/**
	 * Setup handler
	 *
	 * @since 1.2
	 * @param int $order_id
	 */
	public function __construct( $order_id ) {

		$this->order = wc_get_order( $order_id );
	}


	/**
	 * Exports order to Litmos
	 *
	 * @since 1.0
	 */
	public function export() {

		// get order items as array
		$order_items = $this->order->get_items();

		// blank array to hold litmos-enabled products & quantity
		$courses = array();

		// loop thru items in order
		foreach ( $order_items as $order_item ) {

			$product = $this->order->get_product_from_item( $order_item );

			// Get Litmos course ID if it exists
			$course_id = get_post_meta( ( ! empty( $product->variation_id ) ) ? $product->variation_id : $product->id, '_wc_litmos_course_id', true );

			// Add course ID & quantity to array
			if ( $course_id ) {
				$courses[ $course_id ] = (int) $order_item['qty'];
			}
		}

		if ( ! empty( $courses ) ) {

			// multiple courses with 1 quantity per course
			if ( count( $courses) == array_sum( $courses ) ) {

				$this->create_single_user( array_keys( $courses ) );

			} else {

				// TODO: implement when Litmos provides better multi-user handing
			}
		}
	}


	/**
	* Creates a single user in Litmos and assigns purchased courses
	*
	* @since 1.0
	* @param array $courses array of course IDs to assign to created user
	* @throws Exception Errors
	*/
	private function create_single_user( $courses ) {

		// Use email as username, but sanitize as Litmos is picky about what it accepts (eg: '+' is not a valid email character according to Litmos)
		$username = sanitize_user( $this->order->billing_email, true );

		// Build user array
		$user = apply_filters( 'wc_litmos_single_user_properties',
		  array(
			'UserName'        => $username,
			'FirstName'       => $this->order->billing_first_name,
			'LastName'        => $this->order->billing_last_name,
			'CompanyName'     => $this->order->billing_company,
			'PhoneWork'       => $this->order->billing_phone,
			'Street1'         => $this->order->billing_address_1,
			'Street2'         => $this->order->billing_address_2,
			'City'            => $this->order->billing_city,
			'State'           => $this->order->billing_state,
			'PostalCode'      => $this->order->billing_postcode,
			'Country'         => $this->order->billing_country,
			'DisableMessages' => ( 'yes' == get_option( 'wc_litmos_disable_messages' ) ) ? true : false,
			'SkipFirstLogin'  => ( 'yes' == get_option( 'wc_litmos_skip_first_login' ) ) ? true : false
		  ), $this->order
		);

		try {

			// Check if logged in user already has a Litmos ID and use it for assigning courses
			if ( $this->order->user_id > 0 ) {
				$litmos_user_id = get_user_meta( $this->order->user_id, '_wc_litmos_user_id', true );
			}

			// Check if username already exists in Litmos
			if ( empty( $litmos_user_id ) ) {
				$litmos_user_id = wc_litmos()->get_api()->get_user_id( $username );
			}

			// No Litmos User ID, create a new one
			if ( empty( $litmos_user_id ) || ! $litmos_user_id ) {

				// Create user in Litmos
				$litmos_user = wc_litmos()->get_api()->create_user( $user );

				// set 'litmos user created' order note
				$this->order->add_order_note( __( 'Litmos account created for customer', 'woocommerce-litmos' ) );

				$litmos_user_id = $litmos_user['Id'];
			}

			// Set User ID Meta (only for logged in users)
			if ( $this->order->user_id > 0 ) {

				if ( ! update_user_meta( $this->order->user_id, '_wc_litmos_user_id', $litmos_user_id ) ) {
					throw new Exception( __( 'Could not set Litmos user ID as user meta', 'woocommerce-litmos' ) );
				}
			}

			// reset the course results for user if purchasing the same course as before
			if ( 'yes' == get_option( 'wc_litmos_reset_course_duplicate_purchase' ) ) {

				// get courses for user
				$litmos_courses = wc_litmos()->get_api()->get_courses_assigned_to_user( $litmos_user_id );

				// check if any courses currently assigned are being purchased again & reset the results
				foreach ( $litmos_courses as $litmos_course ) {

					if ( in_array( $litmos_course['Id'], $courses ) ) {
						wc_litmos()->get_api()->reset_course_results( $litmos_user_id, $litmos_course['Id'] );
					}
				}
			}

			// Assign purchased course(s) to user
			wc_litmos()->get_api()->assign_courses_to_user( $litmos_user_id, $courses );

			// set 'Customer Assigned to Course...' order note(s)
			foreach ( $courses as $course_id ) {

				$course_info = wc_litmos()->get_api()->get_course_by_id( $course_id );

				/* translators: Placeholders: %s - course name */
				$this->order->add_order_note( sprintf( __( 'Customer assigned to course: %s', 'woocommerce-litmos' ), $course_info['Name'] ) );
			}

		}

		catch( Exception $e ) {

			// Log error as order note
			$this->order->add_order_note( $e->getMessage() );
		}
	}


}
