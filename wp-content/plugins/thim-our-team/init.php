<?php
/*
Plugin Name: Our Team By ThimPress
Plugin URI: http://thimpress.com
Description: A plugin that allows you to show off your our team.
Author: thimpress
Version: 1.0
Author URI: http://thimpress.com
*/
	
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !defined('THIM_OUR_TEAM_VERSION')) {
    define( 'THIM_OUR_TEAM_VERSION', '1.0' );
}

if( !defined('OUR_TEAM_PLUGIN_URL')) {
    define( 'OUR_TEAM_PLUGIN_URL', untrailingslashit( plugins_url( '/', __FILE__ ) ));
}

if( !defined('OUR_TEAM_PLUGIN_PATH')) {
    define( 'OUR_TEAM_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ));
}

//if( !defined('OUR_TEAM_JS_URL')) {
//    define( 'OUR_TEAM_JS_URL', untrailingslashit( plugins_url( '/', __FILE__ ) )."/assets/js/" );
//}
//
//if( !defined('OUR_TEAM_CSS_URL')) {
//    define( 'OUR_TEAM_CSS_URL', untrailingslashit( plugins_url( '/', __FILE__ ) )."/assets/css/" );
//}

require_once 'thim-our-team.php';