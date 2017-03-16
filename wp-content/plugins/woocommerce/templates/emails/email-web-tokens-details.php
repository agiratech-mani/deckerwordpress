<?php 
/**
 * Additional Course licence Details
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-web-tokens-details.php.
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

?>
<h2><?php _e( 'Course license details', 'woocommerce' ); ?></h2>
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
	<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
		<thead>
			<tr>
				<th class="td" scope="col" style="text-align:left;"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<?php /* <th class="td" scope="col" style="text-align:left;"><?php _e( 'Device Limit', 'woocommerce' ); ?></th> */ ?>
				<th class="td" scope="col" style="text-align:left;"><?php _e( 'Expiry Date', 'woocommerce' ); ?></th>
				<th class="td" scope="col" style="text-align:left;"><?php _e( 'Unique Course Link', 'woocommerce' ); ?></th>
			</tr>
		<thead>
		<tbody>
		    <?php foreach ( $web_tokens as $web_tokens ) : ?>
		    	<tr>
		    		<td class="td" style="text-align:left; vertical-align:middle; border: 1px solid #eee; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; word-wrap:break-word;"><?php echo $web_tokens->product; ?></td>
		    		<td class="td" style="text-align:left; vertical-align:middle; border: 1px solid #eee; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; word-wrap:break-word;"><?php echo ($web_tokens->token_expiry_date == '0000-00-00 00:00:00'?'Never':((new DateTime($web_tokens->token_expiry_date))->format('F d, Y'))); ?></td>
		    		<td class="td" style="text-align:left; vertical-align:middle; border: 1px solid #eee; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; word-wrap:break-word;"><a href="<?php echo $web_tokens->short_url; ?>" target="_blank"><?php echo $web_tokens->short_url; ?></a></td>
		    	</tr>
		    <?php endforeach; ?>
		</tbody>
    </table>
</div>
