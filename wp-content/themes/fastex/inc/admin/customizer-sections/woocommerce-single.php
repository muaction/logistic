<?php
$woocommerce->addSubSection( array(
	'name'     => __( 'Product Page', 'thim' ),
	'id'       => 'woo_single',
	'position' => 2,
) );


$woocommerce->createOption( array(
	'name'    => __( 'Select layout', 'thim' ),
	'id'      => 'woo_single_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'full-content'
) );

$woocommerce->createOption( array(
	'name'    => __( 'Hide breadcrumbs?', 'thim' ),
	'id'      => 'woo_single_hide_breadcrumbs',
	'type'    => 'checkbox',
	'desc'    => 'Check this box to hide/show Breadcrumbs',
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'    => __( 'Hide title', 'thim' ),
	'id'      => 'woo_single_hide_title',
	'type'    => 'checkbox',
	'desc'    => 'Check this box to hide/show title',
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'        => __( 'Top image', 'thim' ),
	'id'          => 'woo_single_top_image',
	'type'        => 'upload',
	'desc'        => 'Upload a top image file for header',
	'livepreview' => ''
) );

