<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="product <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';
	?>">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<div class="product-top">
        <?php do_action('woocommerce_before_shop_loop_item_title'); ?>

        <h3><?php the_title(); ?></h3>

		<?php
		if(stripos($_SERVER['SCRIPT_URL'],'/program-registration/')!==false
		  || stripos($_SERVER['SCRIPT_URL'],'/self-directed-learning-resources/')!==false){
            the_content();
		}
		?>

		<?php
		if($product->manage_stock=='yes' && ($product->stock_status=='outofstock' || $product->stock==0)){
		    echo '<span class="soldout">SOLD OUT</span>';
		} else {
		    do_action('woocommerce_after_shop_loop_item_title');
		}?>
    </div>

    <?php //do_action('woocommerce_after_shop_loop_item'); ?>


</li>