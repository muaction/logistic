<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package thim
 */
?>
<section class="error-404 not-found container">
	<div class="page-content">
		<div class="table">
			<div class="table-cell">
				<h1 class="page-title"><?php esc_html_e( 'Page Not Found!', 'thim' ); ?></h1>

				<p>
					<?php printf( wp_kses( __( 'Sorry, We couldn\'t find the page you\'re looking for. <br> Try returning to the <a href="%s">homepage</a>.', 'thim' ), array( 'a' => array( 'href' => array() ), 'br' => array() ) ), esc_url( home_url() ) ); ?>
				</p>
			</div>
			<div class="table-cell">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/404.png' ); ?>" alt="404 page" />
			</div>
		</div>
	</div>
	<!-- .page-content -->
</section>