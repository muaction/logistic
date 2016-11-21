<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Gallery
 *
 * @param $atts
 *
 * @return string
 */
function ts_shortcode_gallery( $atts ) {
	// Include library
	require_once( TS_PATH . 'lib/aq_resizer.php' );

	$gallery   = shortcode_atts( array(
		'cell'       => 3,
		'image_size' => 'thumbnail',
		'layout'     => 'filter',
		'xs-grid'    => '',
		'limit'      => 9,
		'animation'  => '',
		'el_class'   => '',
	), $atts );
	$animation = thim_getCSSAnimation( $gallery['animation'] );
	// Get grid
	$cell       = floor( 12 / $gallery['cell'] );
	$grid_class = 'col-sm-' . $cell . '';

	// Get images amount
	$args = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => array( 'post-format-gallery' ),
			),
		),
	);

	if ( $gallery['layout'] == 'no-filter' ) {
		$grid_class = 'col-xs-' . $cell . '';
	}

	$the_query = new WP_Query( $args );

	// Get image size
	$image_size = 'thumbnail';
	if ( $gallery['image_size'] ) {
		if ( in_array( $gallery['image_size'], array( 'medium', 'large', 'full' ) ) ) {
			$image_size = $gallery['image_size'];
		}
		preg_match_all( '/\d+/', $gallery['image_size'], $size_matches );
		if ( $size_matches[0] ) {
			if ( isset ( $size_matches[0][0] ) && isset ( $size_matches[0][1] ) ) {
				$image_size = array( $size_matches[0][0], $size_matches[0][1] );
			} else {
				$image_size = array( 100, 100 );
			}
		}
	}
	if ( is_array( $image_size ) ) {
		$resize = $image_size;
		if ( $image_size[0] <= get_option( 'thumbnail_size_w' ) ) {
			$image_size = 'thumbnail';
		} elseif ( $image_size[0] <= get_option( 'medium_size_w' ) ) {
			$image_size = 'medium';
		} elseif ( $image_size[0] <= get_option( 'large_size_w' ) ) {
			$image_size = 'large';
		} else {
			$image_size = 'full';
		}
	} else {
		$resize = 0;
	}

	// html output
	$html = '';

	if ( $the_query->have_posts() ) {
		$limit      = 1;
		$filter     = '<a class="filter active" data-rel="all" href="javascript:;">' . __( 'All', 'thim-shortcodes' ) . '</a>';
		$image_html = '';

		while ( $the_query->have_posts() ) : $the_query->the_post();

			$images = thim_meta( 'thim_gallery', array(
				'type'   => 'image',
				'single' => 'false',
				'size'   => $image_size
			) );

			$full_size_images = thim_meta( 'thim_gallery', array(
				'type'   => 'image',
				'single' => 'false',
				'size'   => 'full'
			) );

			if ( empty( $images ) ) {
				break;
			} else {
				$filter .= '<a class="filter" href="javascript:;" data-rel ="filter-gallery-' . get_the_ID() . '" >' . esc_attr(get_the_title( get_the_ID() )) . '</a>';
			}

			for ( $i = 0; $i < count( $images ); $i ++ ) {
				if ( $limit > $gallery['limit'] && $gallery['layout'] == 'no-filter' ) {
					break;
				}
				if ( ! empty ( $images[$i]['url'] ) ) {
					if ( $resize ) {
						$image_crop = aq_resize( $images[$i]['url'], $resize[0], $resize[1], 1 );
						$image_html .= '<a class="' . $grid_class . ' fancybox" data-fancybox-group="gallery" data-filter="filter-gallery-' . get_the_ID() . '" href="' . esc_url( $full_size_images[$i]['url'] ) . '"><img src="' . esc_url($image_crop) . '" alt= "' . esc_attr(get_the_title()) . '" title = "' . esc_attr( get_the_title() ) . '" /></a>';
					} else {
						$image_html .= '<a class="' . $grid_class . ' fancybox" data-fancybox-group="gallery" data-filter="filter-gallery-' . get_the_ID() . '" href="' . esc_url( $full_size_images[$i]['url'] ) . '"><img src="' . esc_url($images[$i]['url']) . '" alt= "' . esc_attr(get_the_title()) . '" title = "' . esc_attr( get_the_title() ) . '" /></a>';
					}
					$limit ++;
				}
			}

		endwhile;

		if ( $gallery['layout'] == 'filter' ) {
			$html .= '<div class="wrapper-filter-controls ' . $animation . ' ' . esc_attr($gallery['el_class']) . '"><div class="filter-controls">' . $filter . '</div></div>';
		}

		$html .= '<div class="wrapper-gallery-filter row ' . $animation . ' ' . esc_attr($gallery['el_class']) . '" itemscope itemtype = "http://schema.org/ItemList">' . $image_html . '</div>';

	}

	wp_reset_postdata();

	return $html;
}

add_shortcode( 'thim-gallery', 'ts_shortcode_gallery' );

