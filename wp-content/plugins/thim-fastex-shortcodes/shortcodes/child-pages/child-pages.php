<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Child Pages
 *
 * @param $atts
 *
 * @return string
 */
function ts_shortcode_child_pages( $atts ) {

	if ( ! is_page() ) {
		return '';
	}
	// Query child pages
	$query = new WP_Query( array(
		'post_parent'        => get_the_ID(),
		'post_type'          => 'page',
		'post_status'        => 'publish',
		'ignore_sticky_post' => 1
	) );
	if ( ! $query->post_count ) {
		return '';
	}

	$child_pages   = shortcode_atts( array(
		'columns'   => '',
		'el_class'  => '',
		'animation' => '',
	), $atts );
	$grid          = 12 / $child_pages['columns'];
	$css_animation = thim_getCSSAnimation( $child_pages['animation'] );

	$html = '';
	$html .= '<div class="pages-container row child-pages">';

	// The Loop
	while ( $query->have_posts() ) {
		$query->the_post();
		$html .=
			'<div class="col-xs-12 col-md-' . $grid . ' ' . $css_animation . ' ' . esc_attr($child_pages['el_class']) . '">
				<div class="page-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</div>
				<div class="page-content">
					<h3><a href="' . esc_url( get_permalink() ) . '">' . esc_attr(get_the_title()) . '</a></h3>
					<p>' . ts_get_the_excerpt( 50 ) . '</p>
				</div>
			</div>';
	}
	// Restore original Post Data
	wp_reset_postdata();

	$html .= '</div>';

	return $html;
}

add_shortcode( 'thim-child-pages', 'ts_shortcode_child_pages' );
