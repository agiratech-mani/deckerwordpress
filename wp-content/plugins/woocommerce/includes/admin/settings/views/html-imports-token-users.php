<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wrap">
	<?php if(!empty($error)) { ?>
	<div id="message" class="updated fade">
		<p><strong>The following fields are wrong:</strong></p>
		<?php foreach ($error as $err) { ?>
			<p><strong><?php echo $err; ?></strong></p>
		<?php } ?>
		
	</div>
	<?php } ?>
	<?php if(!empty($csverror)) { ?>
	<div id="message" class="updated fade">
		<p><strong>CSV upload except following rows:</strong></p>
		<?php foreach ($csverror as $err) { ?>
			<p><strong><?php echo $err; ?></strong></p>
		<?php } ?>
		
	</div>
	<?php } ?>
	<div>Please use this <a href="/wp-content/uploads/Bulk_Upload_Template.csv" download>Template</a>.</div>
	<form method="post" id="import-users" enctype="multipart/form-data">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="token_product"><?php _e( 'Product', 'woocommerce' ); ?></label>
					</th>
					<td class="forminp">
						<select name="token_product" id="token_product" t>
							<?php 
							foreach ($products as $key => $value) 
							{
							?>
								<option value="<?php echo $value->ID; ?>"><?php echo $value->post_title; ?></option>
							<?php
							}
							?>							
						</select>
						<small>(required)</small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="token_file"><?php _e( 'License Sheet', 'woocommerce' ); ?></label>
					</th>
					<td class="forminp">
						
						<input name="token_file" id="token_file" type="file" class="input-text regular-input" value="" accept=".csv,.xlsx,.xls"/>
						<small>(required) The import files type should csv.</small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="token_file"><?php _e( 'Send Email?', 'woocommerce' ); ?></label>
					</th>
					<td class="forminp">
						<input name="token_send_email" type="checkbox" id="token_send_email" value="1">
						<small>If checked email will be sent to imported user.</small>
					</td>
				</tr>
				<tr valign="top">
					<td colspan="2" scope="row" style="padding-left: 0;">
						<input type="submit" class="button button-primary button-large" name="save" id="import_users" accesskey="p" value="<?php esc_attr_e( 'Import Users', 'woocommerce' ); ?>" />
						<a style="color: #a00; text-decoration: none; margin-left: 10px;" href="admin.php?page=wc-tokens"><?php echo __( 'Cancel', 'woocommerce' ); ?></a>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<script type="text/javascript">
	
	jQuery( function ( $ ) {

	});
</script>