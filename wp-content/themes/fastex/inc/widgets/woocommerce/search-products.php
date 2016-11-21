<?php
/**
 * Class Thim_Search_Products
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Thim_Search_Products extends WP_Widget {

	// constructor
	function __construct() {
		parent::__construct(
			'thim_wc_search',
			__( 'Thim: Search Products', 'thim' ),
			array( 'description' => __( 'Product Search for thim site.', 'thim' ) )
		);
	}

	function widget( $args, $instance ) {
		extract( $args );
		$form_title = $instance['form_title'];
		if ( $form_title ) {
			echo '<h3 class="widget-title">' . esc_html( $form_title ) . '</h3>';
		}
		echo '<form class="woocommerce-product-search" method="get" action="' . esc_url( get_site_url() ) . '">';

		echo '<div class="ps_container">';
		echo '<input class="search-field-product" type="search" name="s" placeholder="' . esc_attr__( 'Search product...', 'thim' ) . '" autocomplete="off">';
		echo '<button class="icon-search-product" onclick="' . esc_js( "jQuery(this).closest(\'form\').submit();" ) . '"><i class="fa fa-search"></i></button>';
		echo '<input type="hidden" name="post_type" value="product">';
		echo '<input type="hidden" name="product_cat" value="">';
		echo '<ul class="product_results woocommerce"></ul>';
		echo '</div>';
		echo '</form>';
	}

	/**
	 * update function.
	 *
	 * @see    WP_Widget->update
	 * @access public
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance               = $new_instance;
		$instance['form_title'] = $new_instance['form_title'];
		return $instance;
	}

	/**
	 * form function.
	 *
	 * @see    WP_Widget->form
	 * @access public
	 *
	 * @param array $instance
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$form_title = !empty( $instance['form_title'] ) ? $instance['form_title'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'form_title' )); ?>"><?php esc_html_e( 'Title:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'form_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'form_title' )); ?>" type="text" value="<?php echo esc_attr( $form_title ); ?>">
		</p>
		<?php
	}

}

// Register and load the widget
function thim_register_widget_search_products() {
	register_widget( 'Thim_Search_Products' );
}

add_action( 'widgets_init', 'thim_register_widget_search_products' );

