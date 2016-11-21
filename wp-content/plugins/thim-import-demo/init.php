<?php
/*
Plugin Name: Thim Import Demo Data
Plugin URI: thimpress.com
Description: Supported one click install demo data from ThimPress themes.
Author: ThimPress
Author URI: thimpress.com
Version: 1.0
Text Domain: tid
Domain Path: /languages
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TID_PATH', plugin_dir_path( __FILE__ ) );
define( 'TID_URL', plugin_dir_url( __FILE__ ) );

/**
 * Init
 */
function tid_init() {
	// Prepare translation
	$locale        = apply_filters( 'plugin_locale', get_locale(), 'tid' );
	$lang_dir      = TID_PATH . 'languages/';
	$mofile        = sprintf( '%s.mo', $locale );
	$mofile_local  = $lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/plugins/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		load_textdomain( 'tid', $mofile_global );
	} else {
		load_textdomain( 'tid', $mofile_local );
	}
}

add_action( 'plugins_loaded', 'tid_init' );

// Require other processes
require_once( TID_PATH . 'inc/class-import-demo.php' );
require_once( TID_PATH . 'inc/import/functions.php' );
