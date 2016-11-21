<?php

/**
 * Get content layout
 *
 * @return string
 */
function thim_wrapper_layout() {
	// Global theme options
	global $theme_options_data;

	// Default layout
	$wrapper_layout = $content_cell = 'col-sm-9 alignleft';

	if ( is_page() || is_single() ) {
		$prefix = 'thim_archive_single_';
		if ( get_post_type() == 'product' ) {
			$prefix = 'thim_woo_single_';
		}
		// If using custom layout
		if ( get_post_meta( get_the_ID(), 'thim_mtb_custom_layout', true ) ) {
			$wrapper_layout = get_post_meta( get_the_ID(), 'thim_mtb_layout', true );
		} else {
			if ( isset( $theme_options_data[$prefix . 'layout'] ) ) {
				$wrapper_layout = $theme_options_data[$prefix . 'layout'];
			}
		}
	}

	if ( is_archive() ) {
		$prefix = 'thim_archive_cate_';
		if ( get_post_type() == 'product' ) {
			$prefix = 'thim_woo_cate_';
		}
		if ( isset( $theme_options_data[$prefix . 'layout'] ) ) {
			$wrapper_layout = $theme_options_data[$prefix . 'layout'];
		}
	}

	if ( $wrapper_layout == 'full-content' ) {
		$content_cell = 'col-sm-12 full-width';
	}
	if ( $wrapper_layout == 'sidebar-right' ) {
		$content_cell = 'col-sm-9 alignleft';
	}
	if ( $wrapper_layout == 'sidebar-left' ) {
		$content_cell = 'col-sm-9 alignright';
	}
	return $content_cell;
}

/**
 * Hooked in wrapper start
 */
function thim_wrapper_loop_start() {
	if ( is_404() ) {
		return;
	}
	printf(
		'<div id="primary" class="content-area">
				<div class="container site-content">
					<div class="row">
       					 <main id="main" class="site-main %s">',
		thim_wrapper_layout()
	);
}

add_action( 'thim_wrapper_loop_start', 'thim_wrapper_loop_start' );

/**
 * Hooked in wrapper end
 */
function thim_wrapper_loop_end() {
	if ( is_404() ) {
		return;
	}
	echo '</main>';
	if ( thim_wrapper_layout() != 'col-sm-12 full-width' ) {
		get_sidebar();
	}
	echo '</div></div></div>';


}

add_action( 'thim_wrapper_loop_end', 'thim_wrapper_loop_end' );
