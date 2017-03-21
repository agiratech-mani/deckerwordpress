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

<p><?php printf( __( "Hi there! Your Decker Digital order has been completed and you’re set to go!", 'woocommerce' )); ?></p>
<h2><?php printf( __( 'Course license details', 'woocommerce' )); ?></h2>
<div>
	You have purchased a license to access Decker Digital: Communicate To Influence for one year, on a single computer. Please note your expiry date below.
	<br>
	<br>
	To get started, copy and paste your Unique Course Link into your Chrome browser. You’ll want to bookmark this link and keep it handy so that you can return to the course at any time. And don’t worry, we’ll save your place.
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
do_action( 'woocommerce_email_footer', $email );
