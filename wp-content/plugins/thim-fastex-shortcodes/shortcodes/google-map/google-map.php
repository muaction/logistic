<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Google Map
 *
 * @param $atts
 *
 * @return string
 */
function ts_shortcode_google_map( $atts ) {

	wp_enqueue_script( 'ts-google-map', TS_URL . 'js/google-map.js', array( 'jquery' ), '', true );

	$google_map = shortcode_atts( array(
		'title'            => __( 'Our Address', 'thim-shortcodes' ),
		'map_center'       => '',
		'height'           => '',
		'zoom'             => '',
		'scroll_zoom'      => '',
		'draggable'        => '',
		'marker_at_center' => '',
		'marker_icon'      => '',
		'animation'        => '',
		'el_class'         => '',
	), $atts );

	$animation = thim_getCSSAnimation( $google_map['animation'] );

	// Get settings
	$id     = 'ob-map-canvas-' . md5( $google_map['map_center'] ) . '';
	$height = $google_map['height'] . 'px';
	$data   = 'data-address="' . $google_map['map_center'] . '" ';
	$data .= 'data-zoom="' . $google_map['zoom'] . '" ';
	$data .= 'data-scroll-zoom="' . $google_map['scroll_zoom'] . '" ';
	$data .= 'data-draggable="' . $google_map['draggable'] . '" ';
	$data .= 'data-marker-at-center="' . $google_map['marker_at_center'] . '" ';

	$icon = wp_get_attachment_image_src( $google_map['marker_icon'] ) ? wp_get_attachment_image_src( $google_map['marker_icon'] )[0] : '';
	$data .= 'data-marker-icon="' . $icon . '" ';

	$class = 'ob-google-map-canvas';

	$html = '<div class="' . $class . ' ' . $animation . ' ' . esc_attr($google_map['el_class']) . '" id="' . $id . '" style="height: ' . $height . ';" ' . $data . ' ></div>';
	return $html;
}

add_shortcode( 'thim-google-map', 'ts_shortcode_google_map' );

