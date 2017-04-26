<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wrap">
	<?php if(!empty($error)) { ?>
	<div id="message" class="updated fade">
		<p><strong>Errors:</strong></p>
		<?php foreach ($error as $err) { ?>
			<p><strong><?php echo $err; ?></strong></p>
		<?php } ?>
		
	</div>
	<?php } ?>
	<?php if(!empty($csverror)) { ?>
	<div id="message" class="updated fade">
		<!-- <p><strong>CSV upload except following rows:</strong></p> -->
		<?php foreach ($csverror as $err) { ?>
			<p><strong><?php echo $err; ?></strong></p>
		<?php } ?>
		
	</div>
	<?php } ?>
	
	<form method="post" id="export-users" enctype="submultipart/form-data">
		<table class="form-table">
			<tbody>
				
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="token_from_date"><?php _e( 'From Date', 'woocommerce' ); ?></label>
					</th>
					<td class="forminp">
						<input name="token_from_date" type="date" id="token_from_date">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="token_to_date"><?php _e( 'To Date', 'woocommerce' ); ?></label>
					</th>
					<td class="forminp">
						<input name="token_to_date" type="date" id="token_to_date">
					</td>
				</tr>
				<tr valign="top">
					<td colspan="2" scope="row" style="padding-left: 0;">
						<input type="submit" class="button button-primary button-large" name="submit" id="export_users" accesskey="p" value="<?php esc_attr_e( 'Export Users', 'woocommerce' ); ?>" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>