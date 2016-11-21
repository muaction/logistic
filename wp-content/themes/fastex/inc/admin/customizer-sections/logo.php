<?php
/*
 * Creating a logo Options
 */

$logo = $titan->createThemeCustomizerSection( array(
	'name'     => 'title_tagline',
	'position' => 1,
) );


$logo->createOption( array(
	'name'    => __( 'Header logo', 'thim' ),
	'id'      => 'logo',
	'type'    => 'upload',
	'desc'    => __( 'Upload your logo', 'thim' ),
	'default' => get_template_directory_uri() . '/images/logo.png',
) );

$logo->createOption( array(
	'name'    => __( 'Sticky logo', 'thim' ),
	'id'      => 'sticky_logo',
	'type'    => 'upload',
	'desc'    => __( 'Upload your sticky logo', 'thim' ),
	'default' => get_template_directory_uri() . '/images/sticky-logo.png',
) );

/**
 * Support favicon for WordPress < 4.3
 */
if ( ! function_exists( 'wp_site_icon' ) ) {
	$logo->createOption( array(
		'name'    => __( 'Favicon', 'thim' ),
		'id'      => 'favicon',
		'type'    => 'upload',
		'desc'    => __( 'Upload your favicon', 'thim' ),
		'default' => get_template_directory_uri() . '/images/favicon.png',
	) );
}