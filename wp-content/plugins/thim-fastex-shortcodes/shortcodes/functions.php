<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Generate param type "number"
 *
 * @param $settings
 * @param $value
 *
 * @return string
 */

function ts_number_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );
	$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$min        = isset( $settings['min'] ) ? $settings['min'] : '';
	$max        = isset( $settings['max'] ) ? $settings['max'] : '';
	$suffix     = isset( $settings['suffix'] ) ? $settings['suffix'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$output     = '<input type="number" min="' . $min . '" max="' . $max . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" style="max-width:100px; margin-right: 10px;" />' . $suffix;
	return $output;
}

add_shortcode_param( 'number', 'ts_number_settings_field' );

/**
 * Generate param type "radioimage"
 *
 * @param $settings
 * @param $value
 *
 * @return string
 */
function ts_radioimage_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );
	$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$radios     = isset( $settings['options'] ) ? $settings['options'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$output     = '<input type="hidden" name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '_field ' . $class . '" value="' . $value . '"  ' . $dependency . ' />';
	$output .= '<div id="' . $param_name . '_wrap" class="icon_style_wrap ' . $class . '" >';
	$description = isset( $settings['layout_description'] ) ? $settings['layout_description'] : '';
	if ( $radios != '' && is_array( $radios ) ) {
		$i = 0;
		foreach ( $radios as $key => $image_url ) {
			$class   = ( $key == $value ) ? ' class="selected" ' : '';
			$image   = '<img title="' . $description[$key] . '"id="' . $param_name . $i . '_img' . $key . '" src="' . $image_url . '" ' . $class . '/>';
			$checked = ( $key == $value ) ? ' checked="checked" ' : '';
			$output .= '<input name="' . $param_name . '_option" id="' . $param_name . $i . '" value="' . $key . '" type="radio" '
				. 'onchange="document.getElementById(\'' . $param_name . '\').value=this.value;'
				. 'jQuery(\'#' . $param_name . '_wrap img\').removeClass(\'selected\');'
				. 'jQuery(\'#' . $param_name . $i . '_img' . $key . '\').addClass(\'selected\');" '
				. $checked . ' style="display:none;" />';
			$output .= '<label for="' . $param_name . $i . '">' . $image . '</label>';
			$i ++;
		}
	}
	$output .= '</div>';

	return $output;
}

add_shortcode_param( 'radioimage', 'ts_radioimage_settings_field' );

/**
 * Generate param type "preview"
 *
 * @param $settings
 * @param $value
 *
 * @return string
 */

function ts_preview_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );
	return ' <div class="images_preview" ><img src="' . $value . '" width="300px" height="250px" />
  		<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field"  type="hidden" value="' . $value . '" ' . $dependency . '/></div>';
}

add_shortcode_param( 'preview', 'ts_preview_settings_field' );


//Add fastex font icon
add_filter( 'vc_iconpicker-type-fastex', 'vc_iconpicker_type_fastex' );
function vc_iconpicker_type_fastex( $icons ) {
	$fastex_icons = array(
		array( 'fastexicon-2440' => __( '2440', 'thim-shortcodes' ) ),
		array( 'fastexicon-2441' => __( '2441', 'thim-shortcodes' ) ),
		array( 'fastexicon-2442' => __( '2442', 'thim-shortcodes' ) ),
		array( 'fastexicon-air6' => __( 'Air6', 'thim-shortcodes' ) ),
		array( 'fastexicon-airplane66' => __( 'Airplane66', 'thim-shortcodes' ) ),
		array( 'fastexicon-airplane67' => __( 'Airplane67', 'thim-shortcodes' ) ),
		array( 'fastexicon-airplane68' => __( 'Airplane68', 'thim-shortcodes' ) ),
		array( 'fastexicon-airplane7' => __( 'Airplane7', 'thim-shortcodes' ) ),
		array( 'fastexicon-barscode' => __( 'Barscode', 'thim-shortcodes' ) ),
		array( 'fastexicon-baskets3' => __( 'Baskets3', 'thim-shortcodes' ) ),
		array( 'fastexicon-black330' => __( 'Black330', 'thim-shortcodes' ) ),
		array( 'fastexicon-black331' => __( 'Black331', 'thim-shortcodes' ) ),
		array( 'fastexicon-boat17' => __( 'Boat17', 'thim-shortcodes' ) ),
		array( 'fastexicon-box107' => __( 'Box107', 'thim-shortcodes' ) ),
		array( 'fastexicon-box109' => __( 'Box109', 'thim-shortcodes' ) ),
		array( 'fastexicon-box49' => __( 'Box49', 'thim-shortcodes' ) ),
		array( 'fastexicon-boxes1' => __( 'Boxes1', 'thim-shortcodes' ) ),
		array( 'fastexicon-boxes16' => __( 'Boxes16', 'thim-shortcodes' ) ),
		array( 'fastexicon-boxes18' => __( 'Boxes18', 'thim-shortcodes' ) ),
		array( 'fastexicon-boxes2' => __( 'Boxes2', 'thim-shortcodes' ) ),
		array( 'fastexicon-calendar30' => __( 'Calendar30', 'thim-shortcodes' ) ),
		array( 'fastexicon-call36' => __( 'Call36', 'thim-shortcodes' ) ),
		array( 'fastexicon-call37' => __( 'call37', 'thim-shortcodes' ) ),
		array( 'fastexicon-cargo6' => __( 'Cargo6', 'thim-shortcodes' ) ),
		array( 'fastexicon-check23' => __( 'Check23', 'thim-shortcodes' ) ),
		array( 'fastexicon-chronometer10' => __( 'Chronometer10', 'thim-shortcodes' ) ),
		array( 'fastexicon-clipboard52' => __( 'Clipboard52', 'thim-shortcodes' ) ),
		array( 'fastexicon-clock214' => __( 'Clock214', 'thim-shortcodes' ) ),
		array( 'fastexicon-commercial15' => __( 'Commercial15', 'thim-shortcodes' ) ),
		array( 'fastexicon-container5' => __( 'Container5', 'thim-shortcodes' ) ),
		array( 'fastexicon-container6' => __( 'Container6', 'thim-shortcodes' ) ),
		array( 'fastexicon-containers' => __( 'Containers', 'thim-shortcodes' ) ),
		array( 'fastexicon-crane6' => __( 'Crane6', 'thim-shortcodes' ) ),
		array( 'fastexicon-crane7' => __( 'Crane7', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivered' => __( 'Delivered', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery' => __( 'Delivery', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery16' => __( 'Delivery16', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery17' => __( 'Delivery17', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery19' => __( 'Delivery19', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery20' => __( 'Delivery20', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery21' => __( 'Delivery21', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery22' => __( 'Delivery22', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery23' => __( 'Delivery23', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery24' => __( 'Delivery24', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery25' => __( 'Delivery25', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery26' => __( 'Delivery26', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery27' => __( 'Delivery27', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery28' => __( 'Delivery28', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery29' => __( 'Delivery29', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery30' => __( 'Delivery30', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery31' => __( 'Delivery31', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery32' => __( 'Delivery32', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery33' => __( 'Delivery33', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery34' => __( 'Delivery34', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery35' => __( 'Delivery35', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery36' => __( 'Delivery36', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery37' => __( 'Delivery37', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery38' => __( 'Delivery38', 'thim-shortcodes' ) ),
		array( 'fastexicon-delivery39' => __( 'Delivery39', 'thim-shortcodes' ) ),
		array( 'fastexicon-direction105' => __( 'Direction105', 'thim-shortcodes' ) ),
		array( 'fastexicon-factories1' => __( 'Factories1', 'thim-shortcodes' ) ),
		array( 'fastexicon-factory' => __( 'Factory', 'thim-shortcodes' ) ),
		array( 'fastexicon-flying6' => __( 'Flying6', 'thim-shortcodes' ) ),
		array( 'fastexicon-fragile' => __( 'Fragile', 'thim-shortcodes' ) ),
		array( 'fastexicon-free6' => __( 'Free6', 'thim-shortcodes' ) ),
		array( 'fastexicon-frontal19' => __( 'Frontal19', 'thim-shortcodes' ) ),
		array( 'fastexicon-glasses41' => __( 'Glasses41', 'thim-shortcodes' ) ),
		array( 'fastexicon-grid17' => __( 'Grid17', 'thim-shortcodes' ) ),
		array( 'fastexicon-identification4' => __( 'Identification4', 'thim-shortcodes' ) ),
		array( 'fastexicon-international11' => __( 'International11', 'thim-shortcodes' ) ),
		array( 'fastexicon-international12' => __( 'International12', 'thim-shortcodes' ) ),
		array( 'fastexicon-international13' => __( 'International13', 'thim-shortcodes' ) ),
		array( 'fastexicon-international14' => __( 'International14', 'thim-shortcodes' ) ),
		array( 'fastexicon-international15' => __( 'International15', 'thim-shortcodes' ) ),
		array( 'fastexicon-laptop28' => __( 'Laptop28', 'thim-shortcodes' ) ),
		array( 'fastexicon-loaded-truck' => __( 'Loaded truck', 'thim-shortcodes' ) ),
		array( 'fastexicon-localization2' => __( 'Localization2', 'thim-shortcodes' ) ),
		array( 'fastexicon-lock18' => __( 'Lock18', 'thim-shortcodes' ) ),
		array( 'fastexicon-locked14' => __( 'Locked14', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics-delivery' => __( 'Logistics delivery', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics' => __( 'Logistics', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics1' => __( 'Logistics1', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics2' => __( 'Logistics2', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics3' => __( 'Logistics3', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics4' => __( 'Logistics4', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics5' => __( 'Logistics5', 'thim-shortcodes' ) ),
		array( 'fastexicon-logistics53' => __( 'Logistics53', 'thim-shortcodes' ) ),
		array( 'fastexicon-logisticsdelivery' => __( 'Logisticsdelivery', 'thim-shortcodes' ) ),
		array( 'fastexicon-lorry' => __( 'Lorry', 'thim-shortcodes' ) ),
		array( 'fastexicon-lorry1' => __( 'Lorry1', 'thim-shortcodes' ) ),
		array( 'fastexicon-lorry3' => __( 'Lorry3', 'thim-shortcodes' ) ),
		array( 'fastexicon-man236' => __( 'Man236', 'thim-shortcodes' ) ),
		array( 'fastexicon-map19' => __( 'Map19', 'thim-shortcodes' ) ),
		array( 'fastexicon-notepad2' => __( 'Notepad2', 'thim-shortcodes' ) ),
		array( 'fastexicon-ocean3' => __( 'Ocean3', 'thim-shortcodes' ) ),
		array( 'fastexicon-oil' => __( 'Oil', 'thim-shortcodes' ) ),
		array( 'fastexicon-package10' => __( 'Package10', 'thim-shortcodes' ) ),
		array( 'fastexicon-package11' => __( 'Package11', 'thim-shortcodes' ) ),
		array( 'fastexicon-package12' => __( 'Package12', 'thim-shortcodes' ) ),
		array( 'fastexicon-package13' => __( 'Package13', 'thim-shortcodes' ) ),
		array( 'fastexicon-package7' => __( 'Package7', 'thim-shortcodes' ) ),
		array( 'fastexicon-package8' => __( 'Package8', 'thim-shortcodes' ) ),
		array( 'fastexicon-package9' => __( 'Package9', 'thim-shortcodes' ) ),
		array( 'fastexicon-packages1' => __( 'Packages1', 'thim-shortcodes' ) ),
		array( 'fastexicon-packages2' => __( 'Packages2', 'thim-shortcodes' ) ),
		array( 'fastexicon-padlock94' => __( 'Padlock94', 'thim-shortcodes' ) ),
		array( 'fastexicon-person279' => __( 'Person279', 'thim-shortcodes' ) ),
		array( 'fastexicon-petrol3' => __( 'Petrol3', 'thim-shortcodes' ) ),
		array( 'fastexicon-phone322' => __( 'Phone322', 'thim-shortcodes' ) ),
		array( 'fastexicon-phone323' => __( 'Phone323', 'thim-shortcodes' ) ),
		array( 'fastexicon-placeholder8' => __( 'Placeholder8', 'thim-shortcodes' ) ),
		array( 'fastexicon-protection3' => __( 'Protection3', 'thim-shortcodes' ) ),
		array( 'fastexicon-sea35' => __( 'Sea35', 'thim-shortcodes' ) ),
		array( 'fastexicon-sea8' => __( 'Sea8', 'thim-shortcodes' ) ),
		array( 'fastexicon-sea9' => __( 'Sea9', 'thim-shortcodes' ) ),
		array( 'fastexicon-search51' => __( 'Search51', 'thim-shortcodes' ) ),
		array( 'fastexicon-sign47' => __( 'Sign47', 'thim-shortcodes' ) ),
		array( 'fastexicon-stopwatch12' => __( 'Stopwatch12', 'thim-shortcodes' ) ),
		array( 'fastexicon-storage17' => __( 'Storage17', 'thim-shortcodes' ) ),
		array( 'fastexicon-talking2' => __( 'Talking2', 'thim-shortcodes' ) ),
		array( 'fastexicon-telephone50' => __( 'Telephone50', 'thim-shortcodes' ) ),
		array( 'fastexicon-telephone90' => __( 'Telephone90', 'thim-shortcodes' ) ),
		array( 'fastexicon-telephone91' => __( 'Telephone91', 'thim-shortcodes' ) ),
		array( 'fastexicon-three110' => __( 'Three110', 'thim-shortcodes' ) ),
		array( 'fastexicon-thumb5' => __( 'Thumb5', 'thim-shortcodes' ) ),
		array( 'fastexicon-time74' => __( 'Time74', 'thim-shortcodes' ) ),
		array( 'fastexicon-train20' => __( 'Train20', 'thim-shortcodes' ) ),
		array( 'fastexicon-transport17' => __( 'Transport17', 'thim-shortcodes' ) ),
		array( 'fastexicon-transport18' => __( 'Transport18', 'thim-shortcodes' ) ),
		array( 'fastexicon-transport2' => __( 'Transport2', 'thim-shortcodes' ) ),
		array( 'fastexicon-transport75' => __( 'Transport75', 'thim-shortcodes' ) ),
		array( 'fastexicon-triangular42' => __( 'Triangular42', 'thim-shortcodes' ) ),
		array( 'fastexicon-truck6' => __( 'Truck6', 'thim-shortcodes' ) ),
		array( 'fastexicon-umbrella4' => __( 'Umbrella4', 'thim-shortcodes' ) ),
		array( 'fastexicon-up72' => __( 'Up72', 'thim-shortcodes' ) ),
		array( 'fastexicon-uparrow55' => __( 'Uparrow55', 'thim-shortcodes' ) ),
		array( 'fastexicon-upload19' => __( 'Upload19', 'thim-shortcodes' ) ),
		array( 'fastexicon-upload21' => __( 'Upload21', 'thim-shortcodes' ) ),
		array( 'fastexicon-vehicle43' => __( 'Vehicle43', 'thim-shortcodes' ) ),
		array( 'fastexicon-vehicle43' => __( 'Vehicle43', 'thim-shortcodes' ) ),
		array( 'fastexicon-view10' => __( 'View10', 'thim-shortcodes' ) ),
		array( 'fastexicon-weight10' => __( 'Weight10', 'thim-shortcodes' ) ),
		array( 'fastexicon-weight11' => __( 'Weight11', 'thim-shortcodes' ) ),
		array( 'fastexicon-weight3' => __( 'Weight3', 'thim-shortcodes' ) ),
		array( 'fastexicon-weights8' => __( 'Weights8', 'thim-shortcodes' ) ),
		array( 'fastexicon-woman16' => __( 'Woman16', 'thim-shortcodes' ) ),
		array( 'fastexicon-woman93' => __( 'Woman93', 'thim-shortcodes' ) ),
		array( 'fastexicon-wood5' => __( 'Wood5', 'thim-shortcodes' ) ),
		array( 'fastexicon-world77' => __( 'World77', 'thim-shortcodes' ) ),
		array( 'fastexicon-zoom9' => __( 'Zoom9', 'thim-shortcodes' ) ),
	);
	return array_merge( $icons, $fastex_icons );
}


/**
 * Register scripts
 */
function ts_register_backend_scripts() {
	wp_register_style( 'vc_fastex', TS_URL . 'css/font-icon/fastex-icon/fastexicon.css', false, 'screen' );
	wp_register_style( 'thim_iconbox', TS_URL . 'css/icon-box/icon-box.css', false, 'screen' );
}

add_action( 'vc_base_register_front_css', 'ts_register_backend_scripts' );
add_action( 'vc_base_register_admin_css', 'ts_register_backend_scripts' );


/**
 * Include backend scripts
 */
function ts_enqueue_backend_scripts() {
	wp_enqueue_style( 'vc_fastex' );
	wp_enqueue_style( 'thim_iconbox' );
}

add_action( 'vc_backend_editor_enqueue_js_css', 'ts_enqueue_backend_scripts' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'ts_enqueue_backend_scripts' );

/**
 * Enqueue fastex font
 *
 * @param $font
 */
function ts_enqueue_fastex_font( $font ) {
	if ( $font == 'fastex' ) {
		wp_enqueue_style( 'vc_fastex' );
	}
}

add_action( 'vc_enqueue_font_icon_element', 'ts_enqueue_fastex_font' );

/**
 * Get post categories array
 *
 * @return array
 */
function ts_get_categories() {
	$args       = array(
		'type'   => 'post',
		'parent' => 0,
	);
	$categories = get_categories( $args );
	$filter     = array(
		__( 'No filter', 'thim-shortcodes' ) => '',
	);
	foreach ( $categories as $category ) {
		$filter[$category->name] = $category->term_id;
	}
	return $filter;
}

/**
 * Custom excerpt
 *
 * @param $length
 *
 * @return string
 */
function ts_get_the_excerpt( $length ) {
	$excerpt = get_the_excerpt();

	if ( !$excerpt ) {
		$excerpt = __( 'Sometimes, a picture is worth a thousand words.', 'thim-shortcodes' );
	} else {
		$words   = explode( ' ', $excerpt );
		$excerpt = '';

		foreach ( $words as $word ) {
			if ( strlen( $excerpt ) < $length ) {
				$excerpt .= $word . ' ';
			} else {
				break;
			}
		}
	}
	return $excerpt . '...';
}

