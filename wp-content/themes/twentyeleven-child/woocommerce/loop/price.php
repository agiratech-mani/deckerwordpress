<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
?>
<?php
if($product->get_type() == "course")
{
  $device_limit = ($product->get_devices_limit() == ''?"Unlimited":$product->get_devices_limit());
  $token_expiry = ($product->get_token_expiry() == ''?"Never":$product->get_token_expiry()).'(Days)';
  echo '<span class=" price"> Devices : '.$device_limit.'</span>';
  echo '<span class=" price">Expiry : '.$token_expiry.'</span>';
}
?>
<?php if ($price_html = $product->get_price_html()) : ?>
	<span class="price"><?php echo $price_html; ?>
	<?php
	if(stripos($_SERVER['SCRIPT_URL'],'/program-registration/')===false
      && stripos($_SERVER['SCRIPT_URL'],'/self-directed-learning-resources/')===false){
          if ($product->is_on_sale()){
              echo '<ins class="earlybird">Early Bird</ins>';
          }
    }
    ?>
    </span>
<?php endif; ?>