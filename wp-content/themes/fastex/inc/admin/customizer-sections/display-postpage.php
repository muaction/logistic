<?php
/*
 * Post and Page Display Settings
 */
$display->addSubSection( array(
	'name'     => __( 'Singular', 'thim' ),
	'id'       => 'display_postpage',
	'position' => 3,
) );

$display->createOption( array(
	'name'    => __( 'Layout', 'thim' ),
	'id'      => 'archive_single_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'sidebar-right'
) );

$display->createOption( array(
	'name'    => __( 'Hide breadcrumbs?', 'thim' ),
	'id'      => 'archive_single_hide_breadcrumbs',
	'type'    => 'checkbox',
	'desc'    => __( 'Check this box to hide/show Breadcrumbs', 'thim' ),
	'default' => false,
) );

$display->createOption( array(
	'name'    => __( 'Hide title', 'thim' ),
	'id'      => 'archive_single_hide_title',
	'type'    => 'checkbox',
	'desc'    => __( 'Check this box to hide/show title', 'thim' ),
	'default' => false,
) );

$display->createOption( array(
	'name'        => __( 'Top image', 'thim' ),
	'id'          => 'archive_single_top_image',
	'type'        => 'upload',
	'desc'        => __( 'Upload a top image file for header', 'thim' ),
	'livepreview' => ''
) );
