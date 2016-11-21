<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Mapping shortcodes
 */
function ts_map_vc_shortcodes() {

	// Mapping shortcode Icon Box
	vc_map(
		array(
			'name'                    => __( 'Thim Icon Box', 'thim-shortcodes' ),
			'base'                    => 'thim-icon-box',
			'category'                => __( 'Thim Shortcodes', 'thim-shortcodes' ),
			'description'             => __( 'Display icon box with image or icon.', 'thim-shortcodes' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(

				array(
					'type'               => 'radioimage',
					'heading'            => __( 'Layout', 'thim-shortcodes' ),
					'class'              => 'icon-box-layout',
					'param_name'         => 'layout',
					'admin_label'        => true,
					'options'            => array(
						'top'  => TS_URL . 'images/image-top.jpg',
						'top2' => TS_URL . 'images/icon-top.jpg',
						'left' => TS_URL . 'images/icon-left.jpg'
					),
					'layout_description' => array(
						'top'  => __( 'Image on top', 'thim-shortcodes' ),
						'top2' => __( 'Icon on top', 'thim-shortcodes' ),
						'left' => __( 'Icon on left', 'thim-shortcodes' ),
					),
					'description'        => __( 'Choose the layout you want to display.', 'thim-shortcodes' ),
				),
				// Title
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Title', 'thim-shortcodes' ),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => __( 'This is an icon box.', 'thim-shortcodes' ),
					'description' => __( 'Provide the title for this icon box.', 'thim-shortcodes' ),
				),

				//Use custom or default title?
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Use custom or default title?', 'thim-shortcodes' ),
					'param_name'  => 'title_custom',
					'value'       => array(
						__( 'Default', 'thim-shortcodes' ) => '',
						__( 'Custom', 'thim-shortcodes' )  => 'custom',
					),
					'description' => __( 'If you select default you will use default title which customized in typography.', 'thim-shortcodes' )
				),
				//Heading
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Heading element', 'thim-shortcodes' ),
					'param_name'  => 'heading_tag',
					'value'       => array(
						'h3' => 'h3',
						'h2' => 'h2',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					),
					'description' => __( 'Choose heading type of the title.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title color
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => __( 'Title color ', 'thim-shortcodes' ),
					'param_name'  => 'title_color',
					'value'       => __( '', 'thim-shortcodes' ),
					'description' => __( 'Select the title color.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => __( 'Title size ', 'thim-shortcodes' ),
					'param_name'  => 'title_size',
					'min'         => 0,
					'value'       => '',
					'suffix'      => 'px',
					'description' => __( 'Select the title size.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title weight
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Title weight ', 'thim-shortcodes' ),
					'param_name'  => 'title_weight',
					'value'       => array(
						__( 'Choose the title font weight', 'thim-shortcodes' ) => '',
						__( 'Normal', 'thim-shortcodes' )                       => 'normal',
						__( 'Bold', 'thim-shortcodes' )                         => 'bold',
						__( 'Bolder', 'thim-shortcodes' )                       => 'bolder',
						__( 'Lighter', 'thim-shortcodes' )                      => 'lighter',
					),
					'description' => __( 'Select the title weight.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				//Title style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Title style ', 'thim-shortcodes' ),
					'param_name'  => 'title_style',
					'value'       => array(
						__( 'Choose the title font style', 'thim-shortcodes' ) => '',
						__( 'Italic', 'thim-shortcodes' )                      => 'italic',
						__( 'Oblique', 'thim-shortcodes' )                     => 'oblique',
						__( 'Initial', 'thim-shortcodes' )                     => 'initial',
						__( 'Inherit', 'thim-shortcodes' )                     => 'inherit',
					),
					'description' => __( 'Select the title style.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'title_custom',
						'value'   => 'custom',
					),
				),
				// Description
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => __( 'Description', 'thim-shortcodes' ),
					'param_name'  => 'description',
					'value'       => __( '', 'thim-shortcodes' ),
					'description' => __( 'Provide the description for this icon box.', 'thim-shortcodes' )
				),
				//Use custom or default description ?
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Use custom or default description?', 'thim-shortcodes' ),
					'param_name'  => 'description_custom',
					'value'       => array(
						__( 'Default', 'thim-shortcodes' ) => '',
						__( 'Custom', 'thim-shortcodes' )  => 'custom',
					),
					'description' => __( 'If you select default you will use default description which customized in typography.', 'thim-shortcodes' )
				),

				//Description color
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => __( 'Description color ', 'thim-shortcodes' ),
					'param_name'  => 'description_color',
					'value'       => __( '', 'thim-shortcodes' ),
					'description' => __( 'Select the description color.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => __( 'Description size ', 'thim-shortcodes' ),
					'param_name'  => 'description_size',
					'min'         => 0,
					'value'       => '',
					'suffix'      => 'px',
					'description' => __( 'Select the description size.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description weight
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Description weight ', 'thim-shortcodes' ),
					'param_name'  => 'description_weight',
					'value'       => array(
						__( 'Choose the description font weight', 'thim-shortcodes' ) => '',
						__( 'Normal', 'thim-shortcodes' )                             => 'normal',
						__( 'Bold', 'thim-shortcodes' )                               => 'bold',
						__( 'Bolder', 'thim-shortcodes' )                             => 'bolder',
						__( 'Lighter', 'thim-shortcodes' )                            => 'lighter',
					),
					'description' => __( 'Select the description weight.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				//Description style
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Description style ', 'thim-shortcodes' ),
					'param_name'  => 'description_style',
					'value'       => array(
						__( 'Choose the description font style', 'thim-shortcodes' ) => '',
						__( 'Italic', 'thim-shortcodes' )                            => 'italic',
						__( 'Oblique', 'thim-shortcodes' )                           => 'oblique',
						__( 'Initial', 'thim-shortcodes' )                           => 'initial',
						__( 'Inherit', 'thim-shortcodes' )                           => 'inherit',
					),
					'description' => __( 'Select the description style.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'description_custom',
						'value'   => 'custom',
					),
				),
				// Icon type
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Icon type', 'thim-shortcodes' ),
					'value'       => array(
						__( 'Choose icon type', 'thim-shortcodes' ) => '',
						__( 'Single Image', 'thim-shortcodes' )     => 'image',
						__( 'Font Awesome', 'thim-shortcodes' )     => 'fontawesome',
						__( 'Openiconic', 'thim-shortcodes' )       => 'openiconic',
						__( 'Typicons', 'thim-shortcodes' )         => 'typicons',
						__( 'Entypo', 'thim-shortcodes' )           => 'entypo',
						__( 'Linecons', 'thim-shortcodes' )         => 'linecons',
						__( 'Fastex Icon', 'thim-shortcodes' )      => 'fastex',
					),
					'admin_label' => true,
					'param_name'  => 'icon_type',
					'description' => __( 'Select icon type.', 'thim-shortcodes' ),
				),

				// Icon type: Image - Image picker
				array(
					'type'        => 'attach_image',
					'heading'     => __( 'Choose image', 'thim-shortcodes' ),
					'param_name'  => 'icon_image',
					'admin_label' => true,
					'value'       => '',
					'description' => __( 'Upload the custom image icon.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'image',
					),
				),
				//Image size
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Image size', 'thim-shortcodes' ),
					'param_name'  => 'image_size',
					'admin_label' => true,
					'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'thim-shortcodes' ),

					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'image',
					),
				),


				// Icon type: Fontawesome - Icon picker
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'thim-shortcodes' ),
					'param_name'  => 'icon_fontawesome',
					'value'       => 'fa fa-heart',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'fontawesome',
					),
					'description' => __( 'FontAwesome library.', 'thim-shortcodes' ),
				),

				// Icon type: Openiconic - Icon picker
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'thim-shortcodes' ),
					'param_name'  => 'icon_openiconic',
					'value'       => 'vc-oi vc-oi-dial',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'openiconic',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'openiconic',
					),
					'description' => __( 'Openiconic library.', 'thim-shortcodes' ),
				),

				// Icon type: Typicons - Icon picker
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'thim-shortcodes' ),
					'param_name'  => 'icon_typicons',
					'value'       => 'typcn typcn-adjust-brightness',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'typicons',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'typicons',
					),
					'description' => __( 'Typicons library.', 'thim-shortcodes' ),
				),

				// Icon type: Entypo - Icon picker
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'thim-shortcodes' ),
					'param_name'  => 'icon_entypo',
					'value'       => 'entypo-icon entypo-icon-note',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'entypo',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'entypo',
					),
					'description' => __( 'Entypo library.', 'thim-shortcodes' ),
				),

				// Icon type: Lincons - Icon picker
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'thim-shortcodes' ),
					'param_name'  => 'icon_linecons',
					'value'       => '',
					'settings'    => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 50,
						'type'         => 'linecons',
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'linecons',
					),
					'description' => __( 'Linecons library.', 'thim-shortcodes' ),
				),

				// Icon type: Fastex Icon - Icon picker
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
						'element' => 'icon_type',
						'value'   => 'fastex',
					),
					'description' => __( 'Fastex library.', 'thim-shortcodes' ),
				),

				//Icon size
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => __( 'Icon size', 'thim-shortcodes' ),
					'param_name'  => 'icon_size',
					'value'       => 40,
					'min'         => 16,
					'max'         => 100,
					'suffix'      => 'px',
					'description' => __( 'Select the icon size.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'fastex' ),
					),
				),

				//Icon color
				array(
					'type'        => 'colorpicker',
					'heading'     => __( 'Icon color', 'thim-shortcodes' ),
					'param_name'  => 'icon_color',
					'value'       => '#89BA49',
					'description' => __( 'Select the icon color.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons', 'fastex' ),
					),
				),
				//Display the button?
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Display the button?', 'thim-shortcodes' ),
					'param_name'  => 'button_display',
					'value'       => array( __( '', 'thim-shortcodes' ) => 'yes' ),
					'description' => __( 'Tick it to display the button.', 'thim-shortcodes' ),
				),
				//Button link
				array(
					'type'        => 'vc_link',
					'heading'     => __( 'Button link', 'thim-shortcodes' ),
					'param_name'  => 'button_link',
					'value'       => __( '', 'thim-shortcodes' ),
					'description' => __( 'Write the button link', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Button value
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => __( 'Button value', 'thim-shortcodes' ),
					'param_name'  => 'button_value',
					'value'       => __( '', 'thim-shortcodes' ),
					'description' => __( 'Write the button value', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'button_display',
						'value'   => 'yes',
					),
				),
				//Background color
				array(
					'type'        => 'colorpicker',
					'heading'     => __( 'Background color', 'thim-shortcodes' ),
					'param_name'  => 'background_color',
					'value'       => '',
					'description' => __( 'Select the background color.', 'thim-shortcodes' ),
				),
				//Text Alignment
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Text alignment', 'thim-shortcodes' ),
					'param_name'  => 'alignment',
					'value'       => array(
						__( 'Choose the text alignment', 'thim-shortcodes' ) => '',
						__( 'Text at left', 'thim-shortcodes' )              => 'left',
						__( 'Text at center', 'thim-shortcodes' )            => 'center',
						__( 'Text at right', 'thim-shortcodes' )             => 'right',
					),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Animation', 'thim-shortcodes' ),
					'param_name'  => 'css_animation',
					'value'       => array(
						__( 'No', 'thim-shortcodes' )                 => '',
						__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
						__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
						__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
						__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
						__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
					),
					'description' => __( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => __( 'Extra class', 'thim-shortcodes' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
				),
			)
		)
	);

	// Mapping shortcode Our Team
	vc_map( array(
		'name'        => __( 'Thim Our Team', 'thim-shortcodes' ),
		'base'        => 'thim-our-team',
		'category'    => __( 'Thim Shortcodes', 'thim-shortcodes' ),
		'description' => __( 'Display our team.', 'thim-shortcodes' ),
		'params'      => array(
			//Number of staffs
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => __( 'Number', 'thim-shortcodes' ),
				'param_name'  => 'number',
				'min'         => 0,
				'max'         => 20,
				'value'       => '',
				'description' => __( 'The number of staffs to show.', 'thim-shortcodes' )
			),
			//Number of column to show
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => __( 'Columns', 'thim-shortcodes' ),
				'param_name'  => 'column',
				'min'         => 1,
				'max'         => 4,
				'value'       => 4,
				'description' => __( 'The number of columns per row to show.', 'thim-shortcodes' )
			),
			//Animation
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Animation', 'thim-shortcodes' ),
				'param_name'  => 'css_animation',
				'admin_label' => true,
				'value'       => array(
					__( 'No', 'thim-shortcodes' )                 => '',
					__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
					__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
					__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
					__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
					__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
				),
				'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
			),
			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => __( 'Extra class', 'thim-shortcodes' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
			),
		)
	) );

	// Mapping shortcode Recent Posts
	vc_map( array(
		'name'        => __( 'Thim Recent Posts', 'thim-shortcodes' ),
		'base'        => 'thim-recent-posts',
		'class'       => '',
		'category'    => __( 'Thim Shortcodes', 'thim-shortcodes' ),
		'description' => __( 'Display recent posts.', 'thim-shortcodes' ),
		'params'      => array(
			// Number of posts
			array(
				'type'        => 'number',
				'value'       => 3,
				'min'         => 1,
				'admin_label' => true,
				'heading'     => __( 'Number', 'thim-shortcodes' ),
				'param_name'  => 'number',
				'description' => __( 'Enter number of posts to show.', 'thim-shortcodes' ),
			),

			// Filter by category
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Filter posts', 'thim-shortcodes' ),
				'param_name'  => 'cat',
				'admin_label' => true,
				'value'       => ts_get_categories(),
				'description' => __( 'Filter by categories. No filter will get all latest posts.', 'thim-shortcodes' )
			),


			// Title of blog page
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'value'       => '',
				'heading'     => __( 'Title', 'thim-shortcodes' ),
				'param_name'  => 'title',
				'description' => __( 'Title of blog page link. Leave empty to hide the link.', 'thim-shortcodes' ),
			),
			// Animation
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Animation', 'thim-shortcodes' ),
				'param_name'  => 'css_animation',
				'admin_label' => true,
				'value'       => array(
					__( 'No', 'thim-shortcodes' )                 => '',
					__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
					__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
					__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
					__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
					__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
				),
				'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
			),

			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => __( 'Extra class', 'thim-shortcodes' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
			),
		)
	) );

	// Mapping shortcode Heading
	vc_map( array(
		'name'        => __( 'Thim Heading', 'thim-shortcodes' ),
		'base'        => 'thim-heading',
		'category'    => __( 'Thim Shortcodes', 'thim-shortcodes' ),
		'description' => __( 'Display heading.', 'thim-shortcodes' ),
		'params'      => array(
			//Title
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => __( 'Title', 'thim-shortcodes' ),
				'param_name'  => 'title',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Write the title for the heading.', 'thim-shortcodes' )
			),
			//Use custom or default title?
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Use custom or default title?', 'thim-shortcodes' ),
				'param_name'  => 'title_custom',
				'value'       => array(
					__( 'Default', 'thim-shortcodes' ) => '',
					__( 'Custom', 'thim-shortcodes' )  => 'custom',
				),
				'description' => __( 'If you select default you will use default title which customized in typography.', 'thim-shortcodes' )
			),
			//Heading
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Heading tag', 'thim-shortcodes' ),
				'param_name'  => 'heading_tag',
				'value'       => array(
					'h2' => 'h2',
					'h3' => 'h3',
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',
				),
				'description' => __( 'Choose heading element.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title color
			array(
				'type'        => 'colorpicker',
				'admin_label' => true,
				'heading'     => __( 'Title color ', 'thim-shortcodes' ),
				'param_name'  => 'title_color',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Select the title color.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title size
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => __( 'Title size ', 'thim-shortcodes' ),
				'param_name'  => 'title_size',
				'min'         => 0,
				'value'       => '',
				'suffix'      => 'px',
				'description' => __( 'Select the title size.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title weight
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Title weight ', 'thim-shortcodes' ),
				'param_name'  => 'title_weight',
				'value'       => array(
					__( 'Choose the title font weight', 'thim-shortcodes' ) => '',
					__( 'Normal', 'thim-shortcodes' )                       => 'normal',
					__( 'Bold', 'thim-shortcodes' )                         => 'bold',
					__( 'Bolder', 'thim-shortcodes' )                       => 'bolder',
					__( 'Lighter', 'thim-shortcodes' )                      => 'lighter',
				),
				'description' => __( 'Select the title weight.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title style
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Title style ', 'thim-shortcodes' ),
				'param_name'  => 'title_style',
				'value'       => array(
					__( 'Choose the title font style', 'thim-shortcodes' ) => '',
					__( 'Italic', 'thim-shortcodes' )                      => 'italic',
					__( 'Oblique', 'thim-shortcodes' )                     => 'oblique',
					__( 'Initial', 'thim-shortcodes' )                     => 'initial',
					__( 'Inherit', 'thim-shortcodes' )                     => 'inherit',
				),
				'description' => __( 'Select the title style.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Display the separator?
			array(
				'type'        => 'checkbox',
				'admin_label' => true,
				'heading'     => __( 'Hide the separator?', 'thim-shortcodes' ),
				'param_name'  => 'display',
				'value'       => array( __( '', 'thim-shortcodes' ) => 'yes' ),
				'description' => __( 'Tick it to hide the separator between title and description.', 'thim-shortcodes' ),
			),
			//Separator color
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Separator color', 'thim-shortcodes' ),
				'param_name'  => 'separator_color',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Choose the separator color.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element'            => 'display',
					'value_not_equal_to' => 'yes',
				),
			),
			// Description
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Description', 'thim-shortcodes' ),
				'param_name'  => 'description',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Provide the description for this icon box.', 'thim-shortcodes' )
			),
			//Use custom or default description ?
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Use custom or default description?', 'thim-shortcodes' ),
				'param_name'  => 'description_custom',
				'value'       => array(
					__( 'Default', 'thim-shortcodes' ) => '',
					__( 'Custom', 'thim-shortcodes' )  => 'custom',
				),
				'description' => __( 'If you select default you will use default description which customized in typography.', 'thim-shortcodes' )
			),

			//Description color
			array(
				'type'        => 'colorpicker',
				'admin_label' => true,
				'heading'     => __( 'Description color ', 'thim-shortcodes' ),
				'param_name'  => 'description_color',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Select the description color.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			//Description size
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => __( 'Description size ', 'thim-shortcodes' ),
				'param_name'  => 'description_size',
				'min'         => 0,
				'value'       => '',
				'suffix'      => 'px',
				'description' => __( 'Select the description size.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			//Description weight
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Description weight ', 'thim-shortcodes' ),
				'param_name'  => 'Description_weight',
				'value'       => array(
					__( 'Choose the description font weight', 'thim-shortcodes' ) => '',
					__( 'Normal', 'thim-shortcodes' )                             => 'normal',
					__( 'Bold', 'thim-shortcodes' )                               => 'bold',
					__( 'Bolder', 'thim-shortcodes' )                             => 'bolder',
					__( 'Lighter', 'thim-shortcodes' )                            => 'lighter',
				),
				'description' => __( 'Select the description weight.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			//Description style
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Description style ', 'thim-shortcodes' ),
				'param_name'  => 'description_style',
				'value'       => array(
					__( 'Choose the description font style', 'thim-shortcodes' ) => '',
					__( 'Italic', 'thim-shortcodes' )                            => 'italic',
					__( 'Oblique', 'thim-shortcodes' )                           => 'oblique',
					__( 'Initial', 'thim-shortcodes' )                           => 'initial',
					__( 'Inherit', 'thim-shortcodes' )                           => 'inherit',
				),
				'description' => __( 'Select the description style.', 'thim-shortcodes' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			//Alignment
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Text alignment', 'thim-shortcodes' ),
				'param_name'  => 'alignment',
				'value'       => array(
					'Choose the text alignment'            => '',
					__( 'Text at left', 'thim-shortcodes' )   => 'left',
					__( 'Text at center', 'thim-shortcodes' ) => 'center',
					__( 'Text at right', 'thim-shortcodes' )  => 'right',
				),
			),
			//Animation
			array(
				"type"        => "dropdown",
				"heading"     => __( "Animation", "thim" ),
				"param_name"  => "css_animation",
				"admin_label" => true,
				"value"       => array( __( "No", "thim" ) => '', __( "Top to bottom", "thim" ) => "top-to-bottom", __( "Bottom to top", "thim" ) => "bottom-to-top", __( "Left to right", "thim" ) => "left-to-right", __( "Right to left", "thim" ) => "right-to-left", __( "Appear from center", "thim" ) => "appear" ),
				"description" => __( "Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "thim" )
			),
			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => __( 'Extra class', 'thim-shortcodes' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
			),
		)
	) );

	// Mapping shortcode Testimonials
	vc_map( array(
		'name'        => __( 'Thim Testimonials', 'thim-shortcodes' ),
		'base'        => 'thim-testimonials',
		'class'       => '',
		'category'    => __( 'Thim Shortcodes', 'thim-shortcodes' ),
		'description' => __( 'Display testimonials.', 'thim-shortcodes' ),
		'params'      => array(
			array(
				//Number of testimonials
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => __( 'Number of posts', 'thim-shortcodes' ),
				'param_name'  => 'number',
				'value'       => '',
				'min'         => 0,
				'max'         => 15,
				'description' => __( 'The number of testimonials you want to display.', 'thim-shortcodes' )
			),
			//Animation
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Animation', 'thim-shortcodes' ),
				'param_name'  => 'css_animation',
				'admin_label' => true,
				'value'       => array(
					__( 'No', 'thim-shortcodes' )                 => '',
					__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
					__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
					__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
					__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
					__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
				),
				'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
			),
			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => __( 'Extra class', 'thim-shortcodes' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
			),
		)
	) );


	// Mapping shortcode Child Pages
	vc_map( array(
		'name'        => __( 'Thim Child Pages', 'thim-shortcodes' ),
		'base'        => 'thim-child-pages',
		'class'       => '',
		'category'    => __( 'Thim Shortcodes', 'thim-shortcodes' ),
		'description' => __( 'Display all child pages of current page.', 'thim-shortcodes' ),
		'params'      => array(

			// Grid columns
			array(
				'type'        => 'number',
				'value'       => 2,
				'admin_label' => true,
				'min'         => 1,
				'max'         => 4,
				'heading'     => __( 'Number', 'thim-shortcodes' ),
				'param_name'  => 'columns',
				'description' => __( 'Enter number of grid columns.', 'thim-shortcodes' ),
			),
			// Animation
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => __( 'Animation', 'thim-shortcodes' ),
				'param_name'  => 'animation',
				'value'       => array(
					__( 'No', 'thim-shortcodes' )                 => '',
					__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
					__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
					__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
					__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
					__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
				),
				'description' => __( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
			),
			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => __( 'Extra class', 'thim-shortcodes' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
			),
		)
	) );

	// Mapping shortcode Counter Box
	vc_map( array(
		'name'        => __( 'Thim Counter Box', 'thim-shortcodes' ),
		'base'        => 'thim-counter-box',
		'class'       => '',
		'category'    => __( 'Thim Shortcodes', 'thim-shortcodes' ),
		'description' => __( 'Display counter box.', 'thim-shortcodes' ),
		'params'      => array(

			//Circle box color
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Circle color', 'thim-shortcodes' ),
				'param_name'  => 'b_color',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Select the circle box background color', 'thim-shortcodes' )
			),
			// Count to number
			array(
				'type'        => 'number',
				'admin_label' => true,
				'value'       => 10,
				'min'         => 0,
				'heading'     => __( 'Number', 'thim-shortcodes' ),
				'param_name'  => 'number',
				'description' => __( 'Enter number in box to count.', 'thim-shortcodes' ),
			),
			//Number color
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Number color', 'thim-shortcodes' ),
				'param_name'  => 'number_color',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Select the number color', 'thim-shortcodes' )
			),
			// Text
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Text', 'thim-shortcodes' ),
				'admin_label' => true,
				'param_name'  => 'text',
				'value'       => '',
				'description' => __( 'Short text in counter box.', 'thim-shortcodes' ),
			),
			//Text color
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Text color', 'thim-shortcodes' ),
				'param_name'  => 'text_color',
				'value'       => __( '', 'thim-shortcodes' ),
				'description' => __( 'Select the text color', 'thim-shortcodes' )
			),
			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => __( 'Extra class', 'thim-shortcodes' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
			),
		)
	) );

	// Mapping shortcode Google Map
	vc_map(
		array(
			'name'                    => __( 'Thim Google Map', 'thim-shortcodes' ),
			'base'                    => 'thim-google-map',
			'category'                => __( 'Thim Shortcodes', 'thim-shortcodes' ),
			'description'             => __( 'Display Google map.', 'thim-shortcodes' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(
				// Map center
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Map center', 'thim-shortcodes' ),
					'param_name'  => 'map_center',
					'admin_label' => true,
					'value'       => '',
					'description' => __( 'The name of a place, town, city, or even a country. Can be an exact address too.', 'thim-shortcodes' ),

				),
				// Map height
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => __( 'Height', 'thim-shortcodes' ),
					'param_name'  => 'height',
					'min'         => 0,
					'value'       => 480,
					'suffix'      => 'px',
					'description' => __( 'Height of the map.', 'thim-shortcodes' ),
				),

				// Zoom options
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => __( 'Zoom level', 'thim-shortcodes' ),
					'param_name'  => 'zoom',
					'min'         => 0,
					'max'         => 21,
					'value'       => 12,
					'description' => __( 'A value from 0 (the world) to 21 (street level).', 'thim-shortcodes' ),
				),

				// Show marker
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Marker', 'thim-shortcodes' ),
					'param_name'  => 'marker_at_center',
					'value'       => array( '' => 'true' ),
					'description' => __( 'Show marker at map center.', 'thim-shortcodes' ),
				),

				// Get marker
				array(
					'type'        => 'attach_image',
					'heading'     => __( 'Choose marker icon', 'thim-shortcodes' ),
					'param_name'  => 'marker_icon',
					'admin_label' => true,
					'value'       => '',
					'description' => __( 'Replaces the default map marker with your own image.', 'thim-shortcodes' ),
					'dependency'  => array( 'element' => 'marker_at_center', 'value' => array( 'true' ) )
				),

				// Other options
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Scroll to zoom', 'thim-shortcodes' ),
					'param_name'  => 'scroll_zoom',
					'value'       => array( '' => 'true' ),
					'description' => __( 'Allow scrolling over the map to zoom in or out.', 'thim-shortcodes' ),
				),

				// Other options
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Draggable', 'thim-shortcodes' ),
					'param_name'  => 'draggable',
					'value'       => array( '' => 'true' ),
					'description' => __( 'Allow dragging the map to move it around.', 'thim-shortcodes' ),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Animation', 'thim-shortcodes' ),
					'param_name'  => 'animation',
					'value'       => array(
						__( 'No', 'thim-shortcodes' )                 => '',
						__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
						__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
						__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
						__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
						__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
					),
					'description' => __( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => __( 'Extra class', 'thim-shortcodes' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
				),

			)
		)
	);

	// Mapping shortcode Gallery
	vc_map(
		array(
			'name'                    => __( 'Thim Gallery', 'thim-shortcodes' ),
			'base'                    => 'thim-gallery',
			'category'                => __( 'Thim Shortcodes', 'thim-shortcodes' ),
			'description'             => __( 'Display all format gallery.', 'thim-shortcodes' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(

				// Gallery grid columns
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => __( 'Number of columns', 'thim-shortcodes' ),
					'param_name'  => 'cell',
					'min'         => 1,
					'max'         => 4,
					'value'       => 3,
					'description' => __( 'Gallery shortcode supports maximum 4 columns.', 'thim-shortcodes' ),
				),

				// Image size
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => __( 'Image size', 'thim-shortcodes' ),
					'param_name'  => 'image_size',
					'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'thim-shortcodes' ),
				),

				// Layout
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Layout', 'thim-shortcodes' ),
					'param_name'  => 'layout',
					'value'       => array(
						__( 'Filter', 'thim-shortcodes' )    => 'filter',
						__( 'No filter', 'thim-shortcodes' ) => 'no-filter',
					),
					'description' => __( 'Choose layout.', 'thim-shortcodes' )
				),

				// Limit images
				array(
					'type'        => 'number',
					'min'         => 1,
					'value'       => 9,
					'admin_label' => true,
					'heading'     => __( 'Limit images', 'thim-shortcodes' ),
					'param_name'  => 'limit',
					'description' => __( 'Number of images in gallery to display.', 'thim-shortcodes' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => 'no-filter',
					),
				),

				// Using grid in small device
				array(
					'type'        => 'checkbox',
					'admin_label' => true,
					'heading'     => __( 'Using grid in super small device?', 'thim-shortcodes' ),
					'param_name'  => 'xs-grid',
					'value'       => '',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => 'no-filter',
					),
				),
				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Animation', 'thim-shortcodes' ),
					'param_name'  => 'animation',
					'value'       => array(
						__( 'No', 'thim-shortcodes' )                 => '',
						__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
						__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
						__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
						__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
						__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
					),
					'description' => __( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => __( 'Extra class', 'thim-shortcodes' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
				),
			)
		)
	);

	// Mapping shortcode Images
	vc_map(
		array(
			'name'                    => __( 'Thim Images', 'thim-shortcodes' ),
			'base'                    => 'thim-images',
			'category'                => __( 'Thim Shortcodes', 'thim-shortcodes' ),
			'description'             => __( 'Display images gallery.', 'thim-shortcodes' ),
			'controls'                => 'full',
			'show_settings_on_create' => true,
			'params'                  => array(

				// Get images
				array(
					'type'        => 'attach_images',
					'heading'     => __( 'Choose images', 'thim-shortcodes' ),
					'param_name'  => 'images',
					'admin_label' => true,
					'value'       => '',
					'description' => __( 'Choose images from media library.', 'thim-shortcodes' ),
				),

				// Images grid columns
				array(
					'type'        => 'number',
					'admin_label' => true,
					'heading'     => __( 'Number of columns', 'thim-shortcodes' ),
					'param_name'  => 'cell',
					'min'         => 1,
					'max'         => 12,
					'value'       => 5,
				),

				// Image size
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Image size', 'thim-shortcodes' ),
					'param_name'  => 'size',
					'admin_label' => true,
					'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'thim-shortcodes' ),
				),

				// Animation
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => __( 'Animation', 'thim-shortcodes' ),
					'param_name'  => 'animation',
					'value'       => array(
						__( 'No', 'thim-shortcodes' )                 => '',
						__( 'Top to bottom', 'thim-shortcodes' )      => 'top-to-bottom',
						__( 'Bottom to top', 'thim-shortcodes' )      => 'bottom-to-top',
						__( 'Left to right', 'thim-shortcodes' )      => 'left-to-right',
						__( 'Right to left', 'thim-shortcodes' )      => 'right-to-left',
						__( 'Appear from center', 'thim-shortcodes' ) => 'appear'
					),
					'description' => __( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'thim-shortcodes' )
				),
				// Extra class
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => __( 'Extra class', 'thim-shortcodes' ),
					'param_name'  => 'el_class',
					'value'       => '',
					'description' => __( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'thim-shortcodes' ),
				),
			)
		)
	);

}

add_action( 'vc_before_init', 'ts_map_vc_shortcodes' );
