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

$copy_right = 'http://www.thimpress.com';
$footer->createOption( array(
	'name'        => __( 'Copyright text', 'thim' ),
	'id'          => 'copyright_text',
	'type'        => 'textarea',
	'default'     => __( 'Designed by ', 'thim' ) . '<a href="' . esc_url($copy_right) . '">ThimPress.</a>' . __( ' Powered by', 'thim' ) . 'WordPress.',
	'livepreview' => '$("#powered").html(function(){return "<p>"+ value + "</p>";})'
) );