<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php wp_enqueue_script( 'thim-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '', false ); ?>

<div class="row">
	<div class="col-md-12">
		<?php
		/**
		 * woocommerce_before_single_product hook
		 *
		 * @hooked wc_print_notices - 10
		 */
		do_action( 'woocommerce_before_single_product' );

		if ( post_password_required() ) {
			echo get_the_password_form();

			return;
		}
		?>
	</div>

	<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>"
	     id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!--		<div class="col-md-6 col-sm-12 thumbnail-product ">-->
		<?php
		global $product;
		$attachment_ids = $product->get_gallery_attachment_ids();
		if ( $attachment_ids ) {
			echo '<div class="col-md-6 col-sm-12 thumbnail-product ">';
			echo '<div class="flexslider">';
			echo '<ul class="slides">';
			foreach ( $attachment_ids as $attachment_id ) {
				$thumbnail_image_url = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' )[0];
				$full_image_url      = wp_get_attachment_image_src( $attachment_id, 'shop_single' )[0];
				echo sprintf( '
					<li data-thumb="%s">
						<img src="%s" alt="gallery-image-product">
					</li>',
					$thumbnail_image_url,
					$full_image_url );
			}
			echo '</ul>';
			echo '</div>';
			echo '</div>';
		} else {
			woocommerce_show_product_images();
			woocommerce_show_product_sale_flash();

		}
		?>
		<!--		</div>-->
		<div class="col-md-6 col-sm-12 col-xs-12 ">
			<div class="product-summary">

				<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>

				<?php do_action( 'social_share' ); ?>

			</div>
			<!-- .summary -->
		</div>

		<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>

		<meta itemprop="url" content="<?php the_permalink(); ?>"/>
	</div>

	<?php do_action( 'woocommerce_after_single_product' ); ?>

</div><!-- #product-<?php the_ID(); ?> -->