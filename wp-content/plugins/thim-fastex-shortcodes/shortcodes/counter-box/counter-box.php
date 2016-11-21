<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Counter Box
 *
 * @param $atts
 *
 * @return string
 */
function ts_shortcode_counter_box( $atts ) {

	$counter_box = shortcode_atts( array(
		'number'       => '',
		'number_color' => '',
		'text'         => '',
		'text_color'   => '',
		'b_color'      => '',
		'el_class'     => '',
	), $atts );
	$html        = '';

	$circle_color = '';
	if ( $counter_box['b_color'] ) {
		$circle_color = 'style = background-color:' . $counter_box['b_color'] . '; ';
	}


	$number_color = '';
	if ( $counter_box['number_color'] ) {
		$number_color = 'style = color:' . $counter_box['number_color'] . '; ';
	}

	$text_color = '';
	if ( $counter_box['text_color'] ) {
		$text_color = 'style = color:' . $counter_box['text_color'] . '; ';
	}

	$html .=
		'<div class="circle '.esc_attr($counter_box['el_class']).'" '.$circle_color.'>
			<div class="content">
				<div class="number" '.$number_color.'><span class="counter-up" data-number="'.$counter_box['number'].'">0</span></div>
				<div class="text" '.$text_color.'>'.esc_attr($counter_box['text']).'</div>
			</div>
		</div>';

	return $html;
}

add_shortcode( 'thim-counter-box', 'ts_shortcode_counter_box' );
