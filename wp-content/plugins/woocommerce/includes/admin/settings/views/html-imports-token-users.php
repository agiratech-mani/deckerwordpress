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
	<div>Please use this <a href="/wp-content/uploads/Bulk_Upload_Template.xlsx" download>Template</a>.</div>
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
						<small>(required) The import files type should .csv,.xlsx,.xls.</small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="token_to_date"><?php _e( 'Token Start Date', 'woocommerce' ); ?></label>
					</th>
					<td class="forminp">
						<input name="token_start_date" type="date" id="token_start_date">
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
					<th scope="row" class="titledesc">
						<label for="token_report_email"><?php _e( 'Send Report to Email', 'woocommerce' ); ?></label>
					</th>
					<td class="forminp">
						<input name="token_report_email" type="text" id="token_report_email" value="">
						<small>If fields not blank generated license details will be sent specified mail.</small>
					</td>
				</tr>
				<tr valign="top">
					<td colspan="2" scope="row" style="padding-left: 0;">
						<input type="submit" class="button button-primary button-large" name="save" id="import_users" accesskey="p" value="<?php esc_attr_e( 'Import Users', 'woocommerce' ); ?>" />
						<a class="button button-link button-large" style="color: #a00; text-decoration: none; margin-left: 10px;" href="admin.php?page=wc-tokens"><?php echo __( 'Cancel', 'woocommerce' ); ?></a>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
<?php 
  if(!empty($tokens)):
?>
	<br>
	<h2>Imported Licenses</h2>
	<table class="wp-list-table widefat fixed striped">
    <thead>
      <tr>
      	<th>S.No	</th>
      	<th>Token	</th>
      	<th>First Name	</th>
      	<th>Last Name	</th>
      	<th>Email	</th>
      	<th>Short Url	</th>
      	<th>Long Url	</th>
      	<th>Created Date	</th>
      	<th>Expiry Date	</th>
      	<th>Company</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    	if(!empty($tokens)): 
    		foreach($tokens as $token):
    	?>
    		<tr>
	        <td><?php echo $token['sno']; ?></td>
	        <td><?php echo $token['token']; ?></td>
	        <td><?php echo $token['first_name']; ?></td>
	        <td><?php echo $token['last_name']; ?></td>
	        <td><?php echo $token['email']; ?></td>
	        <td><?php echo $token['short_url']; ?></td>
	        <td><?php echo $token['long_url']; ?></td>
	        <td><?php echo $token['created_date']; ?></td>
	        <td><?php echo $token['expiry_date']; ?></td>
	        <td><?php echo $token['company']; ?></td>
	      </tr>
    	<?php 
    		endforeach;
    	endif; 
    	?>
    </tbody>
  </table>
  <?php
  	endif; 
  ?>
</div>
<script type="text/javascript">
	
	jQuery( function ( $ ) {

	});
</script>