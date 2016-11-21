<?php
$woocommerce->addSubSection( array(
	'name'     => __( 'Category Products', 'thim' ),
	'id'       => 'woo_archive',
	'position' => 1,
) );

$woocommerce->createOption( array(
	'name'    => __( 'Archive layout', 'thim' ),
	'id'      => 'woo_cate_layout',
	'type'    => 'radio-image',
	'options' => array(
		'full-content'  => $url . 'body-full.png',
		'sidebar-left'  => $url . 'sidebar-left.png',
		'sidebar-right' => $url . 'sidebar-right.png'
	),
	'default' => 'sidebar-left'
) );

$woocommerce->createOption( array(
	'name'    => __( 'Hide breadcrumbs?', 'thim' ),
	'id'      => 'woo_cate_hide_breadcrumbs',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/show Breadcrumbs",
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'    => __( 'Hide title', 'thim' ),
	'id'      => 'woo_cate_hide_title',
	'type'    => 'checkbox',
	"desc"    => "Check this box to hide/show title",
	'default' => false,
) );

$woocommerce->createOption( array(
	'name'        => __( 'Top image', 'thim' ),
	'id'          => 'woo_cate_top_image',
	'type'        => 'upload',
	'desc'        => 'Upload a top image file for header',
	'livepreview' => ''
) );
