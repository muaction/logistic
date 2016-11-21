<?php

$footer->addSubSection( array(
	'name'     => __( 'Style', 'thim' ),
	'id'       => 'display_footer',
	'position' => 10,
) );

$footer->createOption( array(
	'name' => __( 'Background image', 'thim' ),
	'id'   => 'footer_background_img',
	'type' => 'upload',
	'desc' => __( 'Upload your background', 'thim' ),
) );

$footer->createOption( array(
	'name'    => __( 'Text color', 'thim' ),
	'id'      => 'footer_text_font_color',
	'type'    => 'color-opacity',
	'default' => '#a6a6a6',
) );

$footer->createOption( array(
	'name'        => __( 'Background color', 'thim' ),
	'id'          => 'footer_bg_color',
	'type'        => 'color-opacity',
	'default'     => '#111111',
	'livepreview' => '$("footer#colophon .footer").css("background-color", value);'
) );
