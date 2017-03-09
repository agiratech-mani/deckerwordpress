<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WC_Email_Generate_Tokens' ) ) :

/**
 * Cancelled Order Email.
 *
 * An email sent to the admin when an order is cancelled.
 *
 * @class       WC_Email_Cancelled_Order
 * @version     2.2.7
 * @package     WooCommerce/Classes/Emails
 * @author      WooThemes
 * @extends     WC_Email
 */
class WC_Email_Generate_Tokens extends WC_Email {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id               = 'token_generated';
		$this->customer_email = true;
		$this->title            = __( 'Token Generated', 'woocommerce' );
		$this->description      = __( 'Token Generated.', 'woocommerce' );
		$this->heading          = __( 'Token Generated', 'woocommerce' );
		$this->subject          = __( '[{site_title}] Token Generated', 'woocommerce' );
		$this->template_html    = 'emails/customer-user-tokens.php';
		$this->template_plain   = 'emails/plain/email-web-gen-tokens-details.php';

		// Triggers for this email
		add_action( 'woocommerce_token_generated_notification', array( $this, 'trigger' ) );

		// Call parent constructor
		parent::__construct();

		// Other settings
		$this->recipient = $this->get_option( 'recipient', get_option( 'admin_email' ) );
	}

	/**
	 * Trigger.
	 *
	 * @param int $order_id
	 */
	public function trigger( $token_id ) {
		if ( $token_id ) {
			$this->object = wootokens_get_web_token($token_id);

			if($this->object->order_type == "Order")
			{
				$recipient = get_post_meta($this->object->order_id,"_billing_email",true);
			}
			else
			{
				$importuser = wootokens_get_import_user($this->object->user_id);
				$recipient = $importuser->email;
			}

			$this->recipient = $recipient;
		}
		if ( ! $this->is_enabled() || ! $this->get_recipient() ) {
			return;
		}

		$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
	}

	/**
	 * Get content html.
	 *
	 * @access public
	 * @return string
	 */
	public function get_content_html() {
		return wc_get_template_html( $this->template_html, array(
			'token'         => $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => true,
			'plain_text'    => false,
			'email'			=> $this
		) );
	}

	/**
	 * Get content plain.
	 *
	 * @return string
	 */
	public function get_content_plain() {
		return wc_get_template_html( $this->template_plain, array(
			'order'         => $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => true,
			'plain_text'    => true,
			'email'			=> $this
		) );
	}

	/**
	 * Initialise settings form fields.
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title'         => __( 'Enable/Disable', 'woocommerce' ),
				'type'          => 'checkbox',
				'label'         => __( 'Enable this email notification', 'woocommerce' ),
				'default'       => 'yes'
			),
			'recipient' => array(
				'title'         => __( 'Recipient(s)', 'woocommerce' ),
				'type'          => 'text',
				'description'   => sprintf( __( 'Enter recipients (comma separated) for this email. Defaults to <code>%s</code>.', 'woocommerce' ), esc_attr( get_option('admin_email') ) ),
				'placeholder'   => '',
				'default'       => '',
				'desc_tip'      => true
			),
			'subject' => array(
				'title'         => __( 'Subject', 'woocommerce' ),
				'type'          => 'text',
				'description'   => sprintf( __( 'This controls the email subject line. Leave blank to use the default subject: <code>%s</code>.', 'woocommerce' ), $this->subject ),
				'placeholder'   => '',
				'default'       => '',
				'desc_tip'      => true
			),
			'heading' => array(
				'title'         => __( 'Email Heading', 'woocommerce' ),
				'type'          => 'text',
				'description'   => sprintf( __( 'This controls the main heading contained within the email notification. Leave blank to use the default heading: <code>%s</code>.', 'woocommerce' ), $this->heading ),
				'placeholder'   => '',
				'default'       => '',
				'desc_tip'      => true
			),
			'email_type' => array(
				'title'         => __( 'Email type', 'woocommerce' ),
				'type'          => 'select',
				'description'   => __( 'Choose which format of email to send.', 'woocommerce' ),
				'default'       => 'html',
				'class'         => 'email_type wc-enhanced-select',
				'options'       => $this->get_email_type_options(),
				'desc_tip'      => true
			)
		);
	}
}

endif;

return new WC_Email_Generate_Tokens();
