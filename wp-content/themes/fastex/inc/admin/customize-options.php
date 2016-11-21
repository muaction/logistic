<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customizer-options
 *
 * @author Tuannv
 */
require_once "generate-less-to-css.php";

class Customize_Options {

	function __construct() {
		add_action( 'tf_create_options', array( $this, 'create_customizer_options' ) );
		add_action( 'customize_save_after', array( $this, 'generate_to_css' ) );

		/* Unregister Default Customizer Section */
		add_action( 'customize_register', array( $this, 'unregister' ) );
	}

	function unregister( $wp_customize ) {

		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );

	}

	function create_customizer_options() {
		$titan = TitanFramework::getInstance( 'thim' );

		/* Register Customizer Sections */
		// include logo
		include TP_THEME_DIR . "/inc/admin/customizer-sections/logo.php";

		// include heading
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-mainmenu.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-mobile.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/header-stickymenu.php";

		// include styling
		include TP_THEME_DIR . "/inc/admin/customizer-sections/color.php";


		// include typography
		include TP_THEME_DIR . "/inc/admin/customizer-sections/typography.php";

		// include footer
		include TP_THEME_DIR . "/inc/admin/customizer-sections/footer.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/footer-copyright.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/footer-options.php";

		// include Custom CSS
		include TP_THEME_DIR . "/inc/admin/customizer-sections/custom-css.php";

		// include display setting
		include TP_THEME_DIR . "/inc/admin/customizer-sections/display.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/display-archive.php";
		include TP_THEME_DIR . "/inc/admin/customizer-sections/display-postpage.php";

		// include WooCommerce setting
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce-archive.php";
			include TP_THEME_DIR . "/inc/admin/customizer-sections/woocommerce-single.php";
		}

		// include post sharing
		include TP_THEME_DIR . "/inc/admin/customizer-sections/social-sharing.php";

		// include import export feature
		include TP_THEME_DIR . "/inc/admin/customizer-sections/import-export.php";


	}

	function generate_to_css() {
		$options = get_theme_mods();
		themeoptions_variation( $options );
		generate( TP_THEME_DIR . 'style', '.css', $options );
	}
}

new customize_options();