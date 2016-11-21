<?php

// header Options
$header->addSubSection( array(
	'name'     => __( 'Sticky Menu', 'thim' ),
	'id'       => 'display_header_menu',
	'position' => 14,
) );

$header->createOption( array(
	'name'    => __( 'Sticky Menu on scroll', 'thim' ),
	'desc'    => __( 'Check to enable a fixed header when scrolling, uncheck to disable.', 'thim' ),
	'id'      => 'header_sticky',
	'type'    => 'checkbox',
	'default' => true
) );

$header->createOption( array(
	'name'    => __( 'Background color', 'thim' ),
	'id'      => 'sticky_bg_main_menu_color',
	'default' => '#ffffff',
	'type'    => 'color-opacity'
) );

$header->createOption( array(
	'name'    => __( 'Text color', 'thim' ),
	'id'      => 'sticky_main_menu_text_color',
	'default' => '#2a2a2a',
	'type'    => 'color-opacity'
) );

$header->createOption( array(
	'name'    => __( 'Text hover color', 'thim' ),
	'id'      => 'sticky_main_menu_text_hover_color',
	'default' => '#006fb2',
	'type'    => 'color-opacity'
) );