<?php
$footer->addSubSection( array(
	'name'     => __( 'Copyright', 'thim' ),
	'id'       => 'display_copyright',
	'position' => 12,
) );

$footer->createOption( array(
	'name'    => __( 'Back to top', 'thim' ),
	'id'      => 'show_to_top',
	'type'    => 'checkbox',
	'des'     => 'show or hide back to top',
	'default' => true,
) );

$copy_right = 'http://logistic.local/';
$footer->createOption( array(
	'name'        => __( 'Copyright text', 'thim' ),
	'id'          => 'copyright_text',
	'type'        => 'textarea',
	'default'     => __( '© Copyright ', 'thim' ) . date("Y") . '<a href="' . esc_url($copy_right) . '"> Toàn Phát.</a>' . __( ' All rights reserved.', 'thim' ),
	'livepreview' => '$("#powered").html(function(){return "<p>"+ value + "</p>";})'
) );
