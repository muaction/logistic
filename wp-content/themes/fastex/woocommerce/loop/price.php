<?php
/**
 * Loop Price
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<div class="product-price">
	<?php if ( $product->get_price_html() ) : ?>
		<span class="lable-price"><?php esc_html_e( 'Price:', 'thim' ); ?></span>
		<span class="price"><?php echo ent2ncr($product->get_price_html()); ?></span>
	<?php endif; ?>
</div>
