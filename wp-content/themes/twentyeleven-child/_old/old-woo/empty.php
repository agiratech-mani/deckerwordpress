<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>

<p><?php _e('Your cart is currently empty.', 'woocommerce') ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a href="<?php echo get_permalink(163); ?>">> Return to <?php echo get_the_title(163);?></a></p>
<p><a href="<?php echo get_permalink(3989); ?>">> Return to <?php echo get_the_title(3989);?></a></p>