<?php
/**
 * Single Product Price, including microdata for SEO
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
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p class="price price-in-single"><?php echo ent2ncr( $product->get_price_html() ); ?></p>

	<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<?php if ( $product->is_in_stock() ) : ?>
		<link itemprop="availability" href="http://schema.org/InStock" />
	<?php else : ?>
		<link itemprop="availability" href="http://schema.org/OutOfStock" />
	<?php endif; ?>
</div>
