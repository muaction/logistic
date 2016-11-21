<?php
// main menu
$header->addSubSection( array(
	'name'     => __( 'Main Menu', 'thim' ),
	'id'       => 'display_main_menu',
	'position' => 5,
) );

$header->createOption( array(
	'name'    => __( 'Background color', 'thim' ),
	'id'      => 'bg_main_menu_color',
	'default' => '#ffffff',
	'type'    => 'color-opacity',
) );

$header->createOption( array(
	'name'    => __( 'Text color', 'thim' ),
	'id'      => 'main_menu_text_color',
	'default' => '#2a2a2a',
	'type'    => 'color-opacity'
) );

$header->createOption( array(
	'name'    => __( 'Text hover color', 'thim' ),
	'id'      => 'main_menu_text_hover_color',
	'default' => '#006fb2',
	'type'    => 'color-opacity'
) );
