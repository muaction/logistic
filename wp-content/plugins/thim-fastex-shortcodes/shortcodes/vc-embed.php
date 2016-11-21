<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Embed custom Fastex Icon for Visual Composer system
 */
function ts_embed_icon() {

	// Embed to shortcode VC Icon
	global $vc_add_css_animation;
	$settings = array(
		'params' => array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Icon library', 'js_composer' ),
				'value'       => array(
					__( 'Font Awesome', 'js_composer' )  => 'fontawesome',
					__( 'Open Iconic', 'js_composer' )   => 'openiconic',
					__( 'Typicons', 'js_composer' )      => 'typicons',
					__( 'Entypo', 'js_composer' )        => 'entypo',
					__( 'Linecons', 'js_composer' )      => 'linecons',
					__( 'Fastex Icons', 'thim-shortcodes' ) => 'fastex',
				),
				'admin_label' => true,
				'param_name'  => 'type',
				'description' => __( 'Select icon library.', 'js_composer' ),
			),

			// Fastex Icon
			array(
				'type'        => 'iconpicker',
				'heading'     => __( 'Icon', 'thim-shortcodes' ),
				'param_name'  => 'icon_fastex',
				'value'       => 'fastexicon-delivery22',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 50,
					'type'         => 'fastex',
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'fastex',
				),
				'description' => __( 'Select icon from library.', 'thim-shortcodes' ),
			),

			array(
				'type'        => 'iconpicker',
				'heading'     => __( 'Icon', 'js_composer' ),
				'param_name'  => 'icon_fontawesome',
				'value'       => 'fa fa-adjust', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'fontawesome',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type'        => 'iconpicker',
				'heading'     => __( 'Icon', 'js_composer' ),
				'param_name'  => 'icon_openiconic',
				'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'openiconic',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'openiconic',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type'        => 'iconpicker',
				'heading'     => __( 'Icon', 'js_composer' ),
				'param_name'  => 'icon_typicons',
				'value'       => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'typicons',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'typicons',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_entypo',
				'value'      => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
				'settings'   => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'entypo',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value'   => 'entypo',
				),
			),
			array(
				'type'        => 'iconpicker',
				'heading'     => __( 'Icon', 'js_composer' ),
				'param_name'  => 'icon_linecons',
				'value'       => 'vc_li vc_li-heart', // default value to backend editor admin_label
				'settings'    => array(
					'emptyIcon'    => false, // default true, display an "EMPTY" icon?
					'type'         => 'linecons',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'type',
					'value'   => 'linecons',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type'               => 'dropdown',
				'heading'            => __( 'Icon color', 'js_composer' ),
				'param_name'         => 'color',
				'value'              => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'js_composer' ) => 'custom' ) ),
				'description'        => __( 'Select icon color.', 'js_composer' ),
				'param_holder_class' => 'vc_colored-dropdown',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Custom color', 'js_composer' ),
				'param_name'  => 'custom_color',
				'description' => __( 'Select custom icon color.', 'js_composer' ),
				'dependency'  => array(
					'element' => 'color',
					'value'   => 'custom',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Background shape', 'js_composer' ),
				'param_name'  => 'background_style',
				'value'       => array(
					__( 'None', 'js_composer' )            => '',
					__( 'Circle', 'js_composer' )          => 'rounded',
					__( 'Square', 'js_composer' )          => 'boxed',
					__( 'Rounded', 'js_composer' )         => 'rounded-less',
					__( 'Outline Circle', 'js_composer' )  => 'rounded-outline',
					__( 'Outline Square', 'js_composer' )  => 'boxed-outline',
					__( 'Outline Rounded', 'js_composer' ) => 'rounded-less-outline',
				),
				'description' => __( 'Select background shape and style for icon.', 'js_composer' )
			),
			array(
				'type'               => 'dropdown',
				'heading'            => __( 'Background color', 'js_composer' ),
				'param_name'         => 'background_color',
				'value'              => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'js_composer' ) => 'custom' ) ),
				'std'                => 'grey',
				'description'        => __( 'Select background color for icon.', 'js_composer' ),
				'param_holder_class' => 'vc_colored-dropdown',
				'dependency'         => array(
					'element'   => 'background_style',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Custom background color', 'js_composer' ),
				'param_name'  => 'custom_background_color',
				'description' => __( 'Select custom icon background color.', 'js_composer' ),
				'dependency'  => array(
					'element' => 'background_color',
					'value'   => 'custom',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Size', 'js_composer' ),
				'param_name'  => 'size',
				'value'       => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
				'std'         => 'md',
				'description' => __( 'Icon size.', 'js_composer' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Icon alignment', 'js_composer' ),
				'param_name'  => 'align',
				'value'       => array(
					__( 'Left', 'js_composer' )   => 'left',
					__( 'Right', 'js_composer' )  => 'right',
					__( 'Center', 'js_composer' ) => 'center',
				),
				'description' => __( 'Select icon alignment.', 'js_composer' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => __( 'URL (Link)', 'js_composer' ),
				'param_name'  => 'link',
				'description' => __( 'Add link to icon.', 'js_composer' )
			),
			$vc_add_css_animation,
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'js_composer' ),
				'param_name'  => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
			),

		),
	);
	vc_map_update( 'vc_icon', $settings );

	// Embed to shortcode VC section (of tab)
	$new_icon_params = vc_map_integrate_shortcode(
		'vc_icon',
		'i_',
		'',
		array(
			'include_only_regex' => '/^(type|icon_\w*)/',
		), array(
			'element' => 'add_icon',
			'value'   => 'true',
		)
	);
	$settings        = array(
		'params' => array_merge( array(
			array(
				'type'        => 'textfield',
				'param_name'  => 'title',
				'heading'     => __( 'Title', 'js_composer' ),
				'description' => __( 'Enter section title (Note: you can leave it empty).', 'js_composer' ),
			),
			array(
				'type'        => 'el_id',
				'param_name'  => 'tab_id',
				'settings'    => array(
					'auto_generate' => true,
				),
				'heading'     => __( 'Section ID', 'js_composer' ),
				'description' => __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'add_icon',
				'heading'     => __( 'Add icon?', 'js_composer' ),
				'description' => __( 'Add icon next to section title.', 'js_composer' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'i_position',
				'value'       => array(
					__( 'Before title', 'js_composer' ) => 'left',
					__( 'After title', 'js_composer' )  => 'right',
				),
				'dependency'  => array(
					'element' => 'add_icon',
					'value'   => 'true',
				),
				'heading'     => __( 'Icon position', 'js_composer' ),
				'description' => __( 'Select icon position.', 'js_composer' ),
			),
		),
			$new_icon_params,
			array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
				)
			)
		),
	);
	vc_map_update( 'vc_tta_section', $settings );

}

add_action( 'init', 'ts_embed_icon' );