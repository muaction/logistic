<?php

/**
 * Create admin menu Import Demo
 *
 * Class TID_Admin_Menu
 */
class TID_Admin_Menu {

	/**
	 * Construct
	 */
	function __construct() {
		add_action( 'admin_menu', array( $this, 'create_admin_menu' ) );
		add_action( 'wp_ajax_tp_make_site', array( $this, 'make_site_callback' ) );
	}

	/**
	 * Create new option type: import
	 */
	function create_import_option() {
		require_once( TID_PATH . 'inc/class-option-import.php' );
	}

	/**
	 * Create admin menu
	 */
	function create_admin_menu() {
		add_menu_page(
			__( 'Import Demo', 'tid' ),
			__( 'Import Demo', 'tid' ),
			'manage_options',
			'tid',
			'tid_page_content',
			'dashicons-download'
		);

	}

	/**
	 * Ajax process for importing
	 */
	function make_site_callback() {
		if ( current_user_can( 'manage_options' ) ) {
			require_once( TID_PATH . 'inc/import/tp-import.php' );
			die;
		}
	}

}

new TID_Admin_Menu();
