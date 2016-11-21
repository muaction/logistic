<?php

/**
 * Class Thim_Top_Sale_Products
 */
class Thim_Top_Sale_Products extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'thim_top_sale_products', // Base ID
			__( 'Thim: Top Sale Products', 'thim' ), // Name
			array(
				'description' => __( 'Get Woocommerce top sale products.', 'thim' ),
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		global $post;

		if ( !empty( $instance['number_products'] ) ) {
			$number_products = apply_filters( 'widget_title', $instance['number_products'] );
		} else {
			return;
		}


		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $number_products,
			'meta_key'            => 'total_sales',
			'orderby'             => 'meta_value_num',
			'meta_query'          => WC()->query->get_meta_query()
		);
		$loop = new WP_Query( $args );

		?>
		<div class="wc-top-sale-products">

			<h3 class="widget-title"><?php esc_html_e( 'Top Sale Products', 'thim' ); ?></h3>

			<?php
			while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<div class="row top-product">
					<div class="col-xs-6">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ) ); ?></a>
					</div>
					<div class="col-xs-6">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="product-name"><?php echo esc_attr(get_the_title()); ?></a><br />
						<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
					</div>
				</div>
				<?php

			endwhile;
			?>
		</div>
		<?php
		wp_reset_postdata();
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$number_products = !empty( $instance['number_products'] ) ? $instance['number_products'] : ''
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number_products' )); ?>"><?php esc_html_e( 'Number products:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_products' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_products' )); ?>" type="number" value="<?php echo esc_attr( $number_products ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                    = array();
		$instance['number_products'] = ( !empty( $new_instance['number_products'] ) ) ? strip_tags( $new_instance['number_products'] ) : '';
		return $instance;
	}

} // class Thim_Top_Sale_Products_Widget

// register Thim_Top_Sale_Products_Widget
function thim_register_top_sale_products_widget() {
	register_widget( 'Thim_Top_Sale_Products' );
}

add_action( 'widgets_init', 'thim_register_top_sale_products_widget' );