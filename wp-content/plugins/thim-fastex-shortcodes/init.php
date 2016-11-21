<?php
/*
Plugin Name: FastEx Shortcodes for Visual Composer
Plugin URI: thimpress.com
Description: Shortcodes come from ThimPress theme for Visual Composer
Author: ThimPress
Author URI: thimpress.com
Version: 1.1
Text Domain: fastex_shortcodes
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TS_PATH', plugin_dir_path( __FILE__ ) );
define( 'TS_URL', plugin_dir_url( __FILE__ ) );

/**
 * Translations
 */
function ts_init() {
	
	// Depend on Visual Composer
	if ( !class_exists( 'Vc_Manager' ) ) {
		return;
	}

	// Prepare translation
	$locale        = apply_filters( 'plugin_locale', get_locale(), 'thim-shortcodes' );
	$lang_dir      = TS_PATH . 'languages/';
	$mofile        = sprintf( '%s.mo', $locale );
	$mofile_local  = $lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/plugins/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		load_textdomain( 'thim-shortcodes', $mofile_global );
	} else {
		load_textdomain( 'thim-shortcodes', $mofile_local );
	}

	// Map shortcodes to Visual Composer
	require_once( TS_PATH . 'shortcodes/vc-map.php' );

	// Register new parameters for shortcodes
	require_once( TS_PATH . 'shortcodes/functions.php' );

	// Embed stuff for Visual Composer
	require_once( TS_PATH . 'shortcodes/vc-embed.php' );

	// Register shortcodes
	require_once( TS_PATH . 'shortcodes/heading/heading.php' );
	require_once( TS_PATH . 'shortcodes/icon-box/icon-box.php' );
	require_once( TS_PATH . 'shortcodes/our-team/our-team.php' );
	require_once( TS_PATH . 'shortcodes/recent-posts/recent-posts.php' );
	require_once( TS_PATH . 'shortcodes/testimonials/testimonials.php' );
	require_once( TS_PATH . 'shortcodes/child-pages/child-pages.php' );
	require_once( TS_PATH . 'shortcodes/counter-box/counter-box.php' );
	require_once( TS_PATH . 'shortcodes/google-map/google-map.php' );
	require_once( TS_PATH . 'shortcodes/gallery/gallery.php' );
	require_once( TS_PATH . 'shortcodes/images/images.php' );
}

add_action( 'plugins_loaded', 'ts_init' );

