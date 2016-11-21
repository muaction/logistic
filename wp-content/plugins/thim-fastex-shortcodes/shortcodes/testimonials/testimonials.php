<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Testimonials
 *
 * @param $atts
 *
 * @return string
 */
function ts_shortcode_testimonials( $atts ) {
	$testimonials             = shortcode_atts( array(
		'number'        => '',
		'css_animation' => '',
		'el_class'      => '',
	), $atts );
	$css_animation = thim_getCSSAnimation( $testimonials['css_animation'] );
	$number        = 4;
	if ( $testimonials['number'] <> '' ) {
		$number = $testimonials['number'];
	}

	$testomonial_args = array(
		'post_type'      => 'testimonials',
		'posts_per_page' => $number
	);
	$data             = '';
	$lop_testimonial  = new WP_Query( $testomonial_args );
	if ( $lop_testimonial->have_posts() ) {
		$data .= '<div class="testimonials ' . $css_animation . ' ' . esc_attr($testimonials['el_class']) . '">
			<div id="owl-demo" class="owl-carousel owl-theme">';
				while ( $lop_testimonial->have_posts() ): $lop_testimonial->the_post();
					$data .= '<div class="item">';
						$data .= '<div class="testimonial_content">';
							$web_link =  get_post_meta( get_the_ID(), 'website_url', true );
							if($web_link){
								$web_link = 'href= "' . esc_url($web_link) . '"' ;
							}
							$data .= get_the_content();
						$data .= '</div>';
						$data .= '<div class="person">';
							if ( has_post_thumbnail() ) {
								$data .= '<div class="avatar-testimonial pull-left">';
								$data .= get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
								$data .= '</div>';
							}
							$data .= '<h3 class="client_name"><a ' . $web_link . '> ' . the_title( ' ', ' ', false ) . ' </a></h3>';
							$regency = get_post_meta( get_the_ID(), 'regency', true );
							if ( $regency <> '' ) {
								$data .= '<div class="regency">' . $regency . '</div>';
							}
							$data .= '<div class="clear"></div>';
						$data .= '</div>';
					$data .= '</div>';
				endwhile;
		$data .= '</div></div>';
	}
	wp_reset_postdata();

	return $data;
}

add_shortcode( 'thim-testimonials', 'ts_shortcode_testimonials' );