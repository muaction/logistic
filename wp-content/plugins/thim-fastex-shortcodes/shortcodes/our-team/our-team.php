<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Shortcode Our Team
 *
 * @param $atts
 */
function ts_shortcode_our_team( $atts ) {
	$our_team      = shortcode_atts( array(
		'number'        => '',
		'column'        => '',
		'css_animation' => '',
		'el_class'      => '',
	), $atts );
	$columns       = 12 / $our_team['column'];
	$el_class      = ' ' . esc_attr($our_team['el_class']);
	$css_animation = thim_getCSSAnimation( $our_team['css_animation'] );
	$args_team     = array(
		'posts_per_page' => $our_team['number'],
		'post_type'      => 'our_team'
	);

	$our_team = new WP_Query( $args_team );

	if ( $our_team->have_posts() ) {
		echo '<div class="wrapper-lists-our-team ' . $css_animation . $el_class . '"><ul>';
		while ( $our_team->have_posts() ): $our_team->the_post();
			$regency      = get_post_meta( get_the_ID(), 'regency', true );
			$image_id  = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image( $image_id, 'our_team', false, array( 'alt' => esc_attr(get_the_title()), 'title' => esc_attr(get_the_title()) ) );
			echo '<li class="col-sm-' . $columns . '"><div class="content-list-our-team">';
			echo '<div class="our-team-image"><div class="wrap-image bg-color-primary">' . $image_url . '</div></div>';
			echo '<div class="content-team">
								<h4>' . get_the_title() . '</h4>';

			if ( $regency <> '' ) {
				echo '<div class = "regency">' . $regency . '</div>';
			}
			echo '</a>';

			echo '</div><div class="clear"></div>';
			echo '</div></li>';
		endwhile;
		echo '</ul></div>';
	}
	wp_reset_postdata();

}

add_shortcode( 'thim-our-team', 'ts_shortcode_our_team' );