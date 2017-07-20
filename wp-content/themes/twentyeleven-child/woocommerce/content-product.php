<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li <?php post_class( $classes ); ?>>

	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );?>
    <div class="product-top">
        <?php
        if(is_page_template( 'page-locations.php' ) || is_page_template( 'page-full-width.php' )){//locations page, NY pages
					echo '
					<div class="coursecolumn coursesale">';
						if ($product->is_on_sale()){
							echo '<ins class="earlybird">Early Bird</ins>';
						}
						echo '&nbsp;
					</div>
					<div class="coursecolumn coursetitle">
							'; the_title(); echo '';
							if ($price_html = $product->get_price_html()){
								if($product->manage_stock=='yes' && ($product->stock_status=='outofstock' || $product->stock==0)){
									// sold out
								} else {
									echo '<span class="price">'.$price_html.'</span>';
								}
							}
							// if($product->get_type() == "course")
							// {
							// 	$device_limit = ($product->get_devices_limit() == ''?"Unlimited":$product->get_devices_limit());
							// 	$token_expiry = ($product->get_token_expiry() == ''?"Never":$product->get_token_expiry().'(Days)');
							// 	//echo '<span class=" price"> Devices : '.$device_limit.'</span>';
							// 	echo '<span class=" price"> Validity : '.$token_expiry.'</span>';
							// }
							echo '
					</div>
					<div class="coursecolumn courseregister">';
						if($product->manage_stock=='yes' && ($product->stock_status=='outofstock' || $product->stock==0)){
							echo '<span class="soldout">SOLD OUT</span>';
						} else {
							echo woocommerce_template_loop_add_to_cart();
						}
						echo '
					</div>';

        } else { ?>

			<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
				do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

				<h3><?php the_title(); ?></h3>

				<?php
		    if(stripos($_SERVER['REQUEST_URI'],'/self-directed-learning-resources/') !== false || stripos($_SERVER['REQUEST_URI'],'/decker-digital-learning-resources') !== false){
					// || stripos($_SERVER['SCRIPT_URL'],'/program-registration/')!==false

					/**
					* woocommerce_after_shop_loop_item_title hook.
					*
					* @hooked woocommerce_template_loop_rating - 5
					* @hooked woocommerce_template_loop_price - 10
					*/
					//do_action( 'woocommerce_after_shop_loop_item_title' );

					/**
					* woocommerce_after_shop_loop_item hook.
					*
					* @hooked woocommerce_template_loop_product_link_close - 5
					* @hooked woocommerce_template_loop_add_to_cart - 10
					*/
					do_action( 'woocommerce_after_shop_loop_item' );
		    }
		    ?>

		    <?php
		    if($product->manage_stock=='yes' && ($product->stock_status=='outofstock' || $product->stock==0)){
    		    echo '<span class="soldout">SOLD OUT</span>';
				} else {
		        /**
			     * woocommerce_after_shop_loop_item_title hook
			     *
			     * @hooked woocommerce_template_loop_price - 10
			     */
			     do_action( 'woocommerce_after_shop_loop_item_title' );
					}
			}

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>

</li>
