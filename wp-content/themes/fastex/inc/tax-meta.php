<?php
require_once get_template_directory() . '/framework/libs/tax-meta-class/Tax-meta-class.php';

if ( is_admin() ) {
	/*
	   * prefix of meta keys, optional
	   */
	$prefix = 'thim_';
	/*
	   * configure your meta box
	   */
	$config = array(
		'id'             => 'category_meta_box', // meta box id, unique per meta box
		'title'          => 'Category Meta Box', // meta box title
		'pages'          => array( 'category' ), // taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal', // where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(), // list of meta fields (can be added by field arrays)
		'local_images'   => false, // Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	/*
	   * Initiate your meta box
	   */
	$my_meta = new Tax_Meta_Class( $config );

	/*
   * Add fields to your meta box
   */
	/* category */
	$my_meta->addSelect(
		$prefix . 'layout',
		array(
			''              => __( 'Using in Theme Option', 'thim' ),
			'no-sidebar'    => __( 'No Sidebar', 'thim' ),
			'left-sidebar'  => __( 'Left Sidebar', 'thim' ),
			'right-sidebar' => __( 'Right Sidebar', 'thim' )
		),
		array(
			'name' => __( 'Custom Layout ', 'thim' ),
			'std'  => array( '' )
		)
	);

	$my_meta->addColor( $prefix . 'cat_bg_header_color', array( 'name' => __( 'Background Heading', 'thim' ) ) );
	$my_meta->addColor( $prefix . 'cat_text_header_color', array( 'name' => __( 'Text Color Heading', 'thim' ) ) );
	$my_meta->Finish();
}
