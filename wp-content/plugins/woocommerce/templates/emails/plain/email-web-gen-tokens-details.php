<?php
/**
 * Additional Course licence  Details (plain)
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/email-web-tokens-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates/Emails/Plain
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
echo strtoupper( __( 'Course licence details', 'woocommerce' ) ) . "\n\n";
echo "Product".","."Device Limit : ".$web_tokens->token_device_limit.", "."Expire : ".$web_tokens->token_expiry_date.", Course URL : ".$web_tokens->short_url. "\n";