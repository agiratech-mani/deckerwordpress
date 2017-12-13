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
<h2><?php _e( 'Welcome to Decker Digital: Communicate to Influence', 'woocommerce' ); ?></h2>
<div>
	Let’s go!
	<br>
	<br>
	Copy and paste your <span style="color:#D22735;font-weight:bold;">Unique Course Link</span> below into your <b>Chrome</b> or <b>Internet Explorer 11</b> browser. 
	<br>
	<br>
	Be sure to bookmark this link, and keep it handy so that you can return to the course at any time. And don’t worry, we’ll save your place. 
	<br>
	<br>
	Tips on getting set up: Decker Digital asks you to record yourself using your computer’s webcam and microphone (headset recommended). <br> 	
	1) Please quit any other program that might be using the webcam before launching Decker Digital.<br> 
	2) If your laptop is docked with a workstation that has an external webcam, we recommend undocking the laptop to default to its built-in webcam.<br>
	3) The course also uses the Flash plug-in from Adobe. If you encounter problems getting into the course, your computer may not have Flash fully configured. <a href="https://decker.com/decker-digital-setup-troubleshooting" target="_blank">This page</a> offers helpful tips on getting Flash properly set up.<br> 
	4) We don’t yet support a proxy server to cross a corporate firewall; if you find you cannot get set up to record with the webcam in Module 1, this may be the problem. To solve it, disconnect from your corporate network, perhaps using wi-fi at home.
	<br>
	<br>
	Happy communicating!
	<br>
	<br>
	<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
		<thead>
			<tr>
				<th class="td" scope="col" style="text-align:left;"><?php _e( 'Course', 'woocommerce' ); ?></th>
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
