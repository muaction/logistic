<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Recent Posts
 *
 * @param $atts
 *
 * @return string
 */
function ts_shortcode_recent_posts( $atts ) {

	$recent = shortcode_atts( array(
		'number'        => '3',
		'cat'           => '',
		'title'         => '',
		'css_animation' => '',
		'el_class'      => ''
	), $atts );

	$css_animation = thim_getCSSAnimation( $recent['css_animation'] );
	$args          = array(
		'posts_per_page' => intval( $recent['number'] ),
		'order'          => 'date',

	);

	if ( $recent['cat'] ) {
		$args['cat'] = $recent['cat'];
	}

	$loop = new WP_Query( $args );

	$posts_page_id = get_option( 'page_for_posts' );
	if ( 0 != $posts_page_id ) {
		$link_posts_page = get_page_link( $posts_page_id );
	} else {
		$link_posts_page = esc_url( home_url( '/' ) );
	}

	$output = '<div class="' . $css_animation . ' ' . esc_attr($recent['el_class']) . '">';

	while ( $loop->have_posts() ) : $loop->the_post();
		$output .=
			'<div class="recent-posts">
				<div class="row">
					<div class="col-xs-3 post-on">
						<div class="day-post">' . get_the_time( 'd', get_the_ID() ) . '</div>
						<div class="month-post">' . get_the_time( 'M', get_the_ID() ) . '</div>
					</div>
					<div class="col-xs-9">
						<a href="' . esc_url( get_permalink() ) . '" class="title-post">' . esc_attr(get_the_title()) . '</a>
						<div class="excerpt-post">' . ts_get_the_excerpt( 50 ) . '</div>
					</div>
				</div>
 			</div>';

	endwhile;

	if ( $recent['title'] ) {
		$output .=
			'<div class="read-all-news-link">
				<div class="thim-button-link"><a href="' . esc_url( $link_posts_page ) . '">' . esc_attr($recent['title']) . '</a></div>
			</div>';
	}
	wp_reset_postdata();
	$output .= '</div>';
	return $output;


}

add_shortcode( 'thim-recent-posts', 'ts_shortcode_recent_posts' );