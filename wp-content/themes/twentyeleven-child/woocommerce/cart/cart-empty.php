<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<p><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a href="<?php echo get_permalink(163); ?>">> Return to <?php echo get_the_title(163);?></a></p>
&nbsp;
<p><a href="<?php echo get_permalink(10313); ?>">> Return to <?php echo get_the_title(10313);?></a></p>
<p><a href="<?php echo get_permalink(10713); ?>">> Return to <?php echo get_the_title(10713);?></a></p>
&nbsp;
<p><a href="<?php echo get_permalink(3989); ?>">> Return to <?php echo get_the_title(3989);?></a></p>