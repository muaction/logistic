<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package thim
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 *
 * @return array
 */
function thim_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

add_filter( 'wp_page_menu_args', 'thim_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function thim_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}

add_filter( 'body_class', 'thim_body_classes' );


/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function thim_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}

add_action( 'wp', 'thim_setup_author' );

/**
 * Update nav attributes
 *
 * @param $atts
 * @param $item
 * @param $args
 *
 * @return mixed
 */
function thim_update_nav_attributes( $atts, $item, $args ) {
	$atts['itemprop'] = 'url';
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'thim_update_nav_attributes', 10, 3 );

function thim_exclude_gallery_format( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {

		$exclude = array( 0 );
		$gallery = get_posts( array(
			'post_type'      => 'post',
			'meta_query'     => array(
				array(
					'key'     => 'thim_hide',
					'value'   => '1',
					'compare' => '==',
				),
			),
			'posts_per_page' => - 1
		) );
		if ( $gallery ) {
			foreach ( $gallery as $hide ) {
				$exclude[] = $hide->ID;
			}
		}

		$query->set( 'post__not_in', $exclude );
	}
}

add_action( 'pre_get_posts', 'thim_exclude_gallery_format' );


/**
 * Add more option for gallery post
 *
 * @param $obj
 */
function thim_add_gallery_meta( $obj ) {

	$metabox = $obj->owner;

	if ( $metabox->settings['id'] == 'thim-meta-boxes-post-format-gallery' ) {

		remove_action( 'tf_create_option_thim', 'thim_add_gallery_meta' );

		$metabox->createOption(
			array(
				'name'    => __( 'Display', 'thim' ),
				'id'      => 'hide',
				'type'    => 'checkbox',
				'default' => true,
				'desc'    => __( 'Hide this post in Blog page?', 'thim' ),
			)
		);
	}

}

add_action( 'tf_create_option_thim', 'thim_add_gallery_meta' );