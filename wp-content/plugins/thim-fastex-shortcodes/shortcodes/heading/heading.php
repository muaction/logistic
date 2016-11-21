<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Heading
 *
 * @param $atts
 *
 * @return string
 */
function ts_shortcode_heading( $atts ) {
	$heading       = shortcode_atts( array(
		'title'              => '',
		'heading_tag'        => 'h2',
		'title_color'        => '',
		'title_size'         => '',
		'title_weight'       => '',
		'title_style'        => '',
		'title_custom'       => '',
		'description'        => '',
		'description_color'  => '',
		'description_size'   => '',
		'description_weight' => '',
		'description_style'  => '',
		'description_custom' => '',
		'separator_color'    => '',
		'display'            => '',
		'css_animation'      => '',
		'el_class'           => '',
		'alignment'          => '',
	), $atts );
	$css_animation = thim_getCSSAnimation( $heading['css_animation'] );

	$alignment = '';
	if ( $heading['alignment'] ) {
		$alignment = 'style = text-align:' . $heading['alignment'] . '; ';
	}

	//title inline style
	$title_css = '';
	if ( $heading['title_color'] ) {
		$title_css .= 'color:' . $heading['title_color'] . '; ';
	}
	if ( $heading['title_size'] ) {
		$title_css .= 'font-size:' . $heading['title_size'] . 'px' . '; ';
	}
	if ( $heading['title_weight'] ) {
		$title_css .= 'font-weight:' . $heading['title_weight'] . '; ';
	}
	if ( $heading['title_style'] ) {
		$title_css .= 'font-style:' . $heading['title_style'] . '; ';
	}
	if ( $title_css )
		$title_css = ' style="' . $title_css . '"';

	//Spectator inline style
	$separator_css  = '';
	$separator_wrap = '';
	$clear_fix      = '';
	if ( $heading['display'] == 'yes' ) {
		$separator_wrap .= 'display: none; ';
	} else {
		$separator_wrap .= 'display: block; ';
	}
	if ( $heading['separator_color'] ) {
		$separator_css .= 'border-color:' . $heading['separator_color'] . '; ';
	}
	if ( $heading['alignment'] ) {
		if ( $heading['alignment'] == 'center' ) {
			$separator_css .= 'margin: auto; ';
			$separator_wrap .= 'padding-top:20px; ';
		} else {
			$separator_css .= 'float:' . $heading['alignment'] . '; ';
			$clear_fix .= '<div class="clear-fix"></div>';
		}
	}
	if ( $separator_css )
		$separator_css = ' style="' . $separator_css . '"';
	if ( $separator_wrap )
		$separator_wrap = ' style="' . $separator_wrap . '"';

	//Description inline style
	$des_css = '';
	if ( $heading['description_color'] ) {
		$des_css .= 'color:' . $heading['description_color'] . '; ';
	}
	if ( $heading['description_size'] ) {
		$des_css .= 'font-size:' . $heading['description_size'] . 'px' . '; ';
	}
	if ( $heading['description_weight'] ) {
		$des_css .= 'font-weight:' . $heading['description_weight'] . '; ';
	}
	if ( $heading['description_style'] ) {
		$des_css .= 'font-style:' . $heading['description_style'] . '; ';
	}
	if ( $des_css )
		$des_css = ' style="' . $des_css . '"';

	$descripton = '';
	if ( $heading['description'] ) {
		$descripton .= '<div class="des" ' . $des_css . '>' . esc_attr($heading['description']) . '</div>';
	}

	$html =
		'<div class="heading '.$css_animation.' '.esc_attr($heading['el_class']).'" '.$alignment.'>
			<'.$heading['heading_tag'].' '.$title_css.'>'.esc_attr($heading['title']).'</'.$heading['heading_tag'].'>
			<div '.$separator_wrap.'><div class="line" '.$separator_css.'></div></div>
			'.$clear_fix.'
			'.$descripton.'
		</div>';

	return $html;
}

add_shortcode( 'thim-heading', 'ts_shortcode_heading' );


