<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading); ?>

<p><?php printf( __( "Hi there! You’ll find your course license details below, and we bet you’re anxious to get started…", 'woocommerce' )); ?></p>

<h2><?php _e( 'Welcome to Decker Digital: Communicate to Influence', 'woocommerce' ); ?></h2>
<div>
	Let’s go!
	<br>
	<br>
	Copy and paste your <span style="color:#D22735;font-weight:bold;">Unique Course Link</span> below into your <b>Chrome browser</b>. 
	<br>
	<br>
	Be sure to bookmark this link, and keep it handy so that you can return to the course at any time. And don’t worry, we’ll save your place. 
	<br>
	<br>
	Happy communicating!
	<br>
	<br>
</div>
<?php
do_action( 'woocommerce_email_generate_tokens', $token, $sent_to_admin, $plain_text, $email );
/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
//do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
_e("Need help? Email us at <a href='mailto:support@decker.com'>support@decker.com</a> or give us a call at (844) 897-2389.");

do_action( 'woocommerce_email_footer', $email );
