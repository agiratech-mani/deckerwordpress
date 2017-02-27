<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<?php if ($product->is_on_sale()) : ?>

	<?php
	if(stripos($_SERVER['SCRIPT_URL'],'/program-registration/')!==false
      || stripos($_SERVER['SCRIPT_URL'],'/self-directed-learning-resources/')!==false){
        echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__('Early Bird', 'woocommerce').'</span>', $post, $product);
    }?>

<?php endif; ?>