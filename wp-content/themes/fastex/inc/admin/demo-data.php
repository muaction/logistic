<?php

defined( 'DS' ) OR define( 'DS', DIRECTORY_SEPARATOR );

$demo_datas_dir = TP_THEME_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'data';

$demo_datas = array(
	'demo-01' => array( 'data_dir' => $demo_datas_dir . DS . 'demo-01', 'thumbnail_url' => get_template_directory_uri().'/inc/admin/data/demo-01/demo-01.jpg', 'title' => 'Demo 01' ),
	'demo-02' => array( 'data_dir' => $demo_datas_dir . DS . 'demo-02', 'thumbnail_url' => get_template_directory_uri().'/inc/admin/data/demo-02/demo-02.jpg', 'title' => 'Demo 02' ),
	'demo-03' => array( 'data_dir' => $demo_datas_dir . DS . 'demo-03', 'thumbnail_url' => get_template_directory_uri().'/inc/admin/data/demo-03/demo-03.jpg', 'title' => 'Demo 03' ),
);
