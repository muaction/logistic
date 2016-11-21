<?php
$custom_css = $titan->createThimCustomizerSection( array(
	'name'     => __( 'Custom CSS', 'thim' ),
	'position' => 85,
) );

/*
 * Archive Display Settings
 */
$custom_css->createOption( array(
	'id'      => 'custom_css',
	'type'    => 'textarea',
	'desc'    => __( 'Put your additional CSS rules here', 'thim' ),
	'is_code' => true,
) );
