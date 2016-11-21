<?php
$url         = TP_THEME_URI . 'images/admin/layout/';
$woocommerce = $titan->createThimCustomizerSection( array(
	'name'     => __( 'WooCommerce', 'thim' ),
	'position' => 75,
	'id'       => 'woocommerce',
) );