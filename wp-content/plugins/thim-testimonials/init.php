<?php
/*
Plugin Name: Testimonials By ThimPress
Plugin URI: http://thimpress.com
Description: A plugin that allows you to show off your testimonials.
Author: thimpress
Version: 1.0
Author URI: http://thimpress.com
*/
	
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !defined('THIM_TESTIMONIALS_VERSION')) {
    define( 'THIM_TESTIMONIALS_VERSION', '1.0' );
}

if( !defined('TESTIMONIALS_PLUGIN_URL')) {
    define( 'TESTIMONIALS_PLUGIN_URL', untrailingslashit( plugins_url( '/', __FILE__ ) ));
}

if( !defined('TESTIMONIALS_PLUGIN_PATH')) {
    define( 'TESTIMONIALS_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ));
}

//if( !defined('TESTIMONIALS_JS_URL')) {
//    define( 'TESTIMONIALS_JS_URL', untrailingslashit( plugins_url( '/', __FILE__ ) )."/assets/js/" );
//}
//
//if( !defined('TESTIMONIALS_CSS_URL')) {
//    define( 'TESTIMONIALS_CSS_URL', untrailingslashit( plugins_url( '/', __FILE__ ) )."/assets/css/" );
//}

require_once 'thim-testimonials.php';