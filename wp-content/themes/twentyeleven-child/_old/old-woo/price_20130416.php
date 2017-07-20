<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product;
?>

<?php if ($price_html = $product->get_price_html()) : ?>
	<span class="price"><?php echo $price_html; ?>
	<?php
	if(stripos($_SERVER['SCRIPT_URL'],'/program-registration/')===false
      && stripos($_SERVER['SCRIPT_URL'],'/self-directed-learning-resources/')===false){
          if ($product->is_on_sale()){
              echo '<ins style="color:#3C910D;">Early Bird</ins>';
          }
    }
    ?>
    </span>
<?php endif; ?>