<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
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
$woocommerce_loop['loop'] ++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>

<?php
$grid_archive_page = array( 'col-md-4', 'col-sm-6', 'col-xs-6' );
$grid_single_page  = array( 'col-md-3', 'col-sm-4', 'col-xs-6' );
?>

<?php if ( is_archive() && get_post_type() == 'product' ) { ?>
<li <?php post_class( $grid_archive_page ); ?>>
	<?php } else { ?>
<li <?php post_class( $grid_single_page ); ?>>
	<?php } ?>

	<div class="item-product">

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<div class="product-image">

			<a href="<?php the_permalink(); ?>">

				<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
				?>

			</a>

		</div>

		<div class="product-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>

		<?php
		/**
		 * woocommerce_after_shop_loop_item_title hook
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>


		<div class="box-button hide-on-small-screen"
		     data-title="<?php esc_attr_e( 'VIEW CART', 'thim' ); ?>"
		     data-link="<?php
		     global $woocommerce;
		     echo esc_url( $woocommerce->cart->get_cart_url() );
		     ?>">

			<?php

			/**
			 * woocommerce_after_shop_loop_item hook
			 *
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );

			?>
		</div>
	</div>

</li>
