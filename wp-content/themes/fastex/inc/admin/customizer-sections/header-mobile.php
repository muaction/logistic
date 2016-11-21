<?php

// main menu

$header->addSubSection( array(
	'name'     => __( 'Mobile Menu', 'thim' ),
	'id'       => 'display_mobile_menu',
	'position' => 15,
) );


$header->createOption( array(
	'name'    => __( 'Background color', 'thim' ),
	'id'      => 'bg_mobile_menu_color',
	'default' => '#222222',
	'type'    => 'color-opacity'
) );


$header->createOption( array(
	'name'    => __( 'Text color', 'thim' ),
	'id'      => 'mobile_menu_text_color',
	'default' => '#d8d8d8',
	'type'    => 'color-opacity'
) );

$header->createOption( array(
	'name'    => __( 'Config Logo', 'thim' ),
	'desc'    => '',
	'id'      => 'config_logo_mobile',
	'options' => array(
		'default_logo' => __( 'Default', 'thim' ),
		'custom_logo'  => __( 'Custom', 'thim' )
	),
	'type'    => 'select',
	'default' => 'default_logo'
) );


$header->createOption( array(
	'name'    => __( 'Logo', 'thim' ),
	'id'      => 'logo_mobile',
	'type'    => 'upload',
	'default' => get_template_directory_uri() . '/images/logo.png',
) );

$header->createOption( array(
	'name'    => __( 'Sticky Logo', 'thim' ),
	'id'      => 'sticky_logo_mobile',
	'type'    => 'upload',
	'default' => get_template_directory_uri() . '/images/sticky-logo.png',
) );