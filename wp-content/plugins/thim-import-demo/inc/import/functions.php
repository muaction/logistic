<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


/**
 * Import Demo page content
 */
function tid_page_content() {
	#TODO: show list of demo to import
	/**
	 * include file list of demo data
	 */
	$demo_data_file_path = TP_THEME_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'demo-data.php';
	$demo_data_dir_path  = TP_THEME_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'data';
	if ( is_file( $demo_data_file_path ) ) {
		require $demo_data_file_path;
	} else {
		// create demo data
		$demo_datas = array();
	}
	$demo_data_file = TP_THEME_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'demo-data.php';
	if ( is_file( $demo_data_file ) ) {
		require TP_THEME_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'demo-data.php';
	}
//		echo json_encode($demo_datas);
	wp_enqueue_script( 'tp-import', TID_URL . 'js/tp-import.js', array(), false, true );

	$memory_limit       = ini_get( 'memory_limit' );
	$max_execution_time = ini_get( 'max_execution_time' );
	?>
	<script>
		var tp_url_site = '<?php echo esc_url(home_url( '/' )); ?>';
		var tp_url_dashboard = '<?php echo esc_url(get_admin_url()); ?>';
	</script>
	<table class="wc_status_table widefat" id="status" cellspacing="0">
		<thead>
		<tr>
			<th colspan="3"
			    data-export-label="Server Environment"><?php esc_html_e( 'Server Environment', 'tid' ) ?></th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php esc_html_e( 'PHP Memory Limit:', 'tid' ); ?></td>
			<td><?php
				if ( intval( $memory_limit ) < 64 ) {
					echo '<span style="color:#ff0000;font-weight: bold;">' . $memory_limit . '</span>';
				} else {
					echo '<span style="color:#008000;font-weight: bold;">' . $memory_limit . '</span>';
				}
				?></td>
			<td><?php
				if ( intval( $memory_limit ) < 64 ) {
					esc_html_e( 'Memory limit < 64M can be make importing errors', 'tid' );
				}
				?></td>
		</tr>
		<tr>
			<td><?php esc_html_e( 'PHP Execution Time:', 'tid' ); ?></td>
			<td>
				<?php
				if ( intval( $max_execution_time ) < 64 ) {
					echo '<span style="color:#ff0000;font-weight: bold;">' . $max_execution_time . '</span>';
				} else {
					echo '<span style="color:#008000;font-weight: bold;">' . $max_execution_time . '</span>';
				}
				?>
			</td>
			<td>
				<?php
				if ( intval( $max_execution_time ) < 60 ) {
					esc_html_e( 'Execution Time < 60 can be make importing errors', 'tid' );
				}
				?>
			</td>
		</tr>
		</tbody>
	</table>
	<p class='submit'>
		<?php
		if ( is_file( $demo_data_file ) ) {
			?>
			<img width="300" style="display: none;" id="demodata-thumbnail" src="http://placehold.it/300x200"/>
			<br/>
			<select id="demodata-selecter">
				<option value=""><?php esc_html_e( 'Select demo data', 'tid' ); ?></option>
				<?php
				foreach ( $demo_datas as $key => $item ) {
					echo '<option value="' . $key . '" data-thumbnail-url="' . $item['thumbnail_url'] . '" >' . $item['title'] . '</option>';
				}
				?>
			</select>
			<?php
		}
		if ( ! is_file( $demo_data_file ) && ! is_dir( $demo_data_dir_path ) ) {
			?>
			<?php esc_html_e( 'Demo data not available!' ); ?>
			<?php
		} else {
		?>
		<button class="button button-primary tp-import-action" disabled>
			<?php esc_html_e( 'Import Demo', 'tid' ) ?>
		</button>
		<br/>
		<br/>
	<div>
		<?php esc_html_e( 'Warning: You must import the sample data file before customizing your theme. If you customize your theme, and later import a sample data file, all current contents entered in your site will be overwritten to the default settings of the file you are uploading! Please proceed with the utmost care, after exporting all current data! Note: If you get errors, please be sure that your server configured Memory Limit >=64MB and Execution Time >=60.', 'tid' );
		?>
		<div>
			<?php
			}
			?>
		</div>
		<div class="tp_process_bar" style="display:none;">
			<div class="tpimport_download" style="display: none;">
			<span
				class="text_note tp_process_title"><?php esc_html_e( 'Download demo data package...', 'tid' ); ?></span>

				<div class="meter">
					<span style="width: 0"></span>
				</div>
				<div class="tp_process_messase"></div>
			</div>
			<div class="tpimport_extract" style="display: none;">
				<span class="text_note"><?php esc_html_e( 'Extract demo data package...', 'tid' ); ?></span>

				<div class="meter">
					<span style="width: 0"></span>
				</div>
				<div class="tp_process_messase"></div>
			</div>
			<div class="tpimport_core" style="display: none;">
				<span class="text_note"><?php esc_html_e( 'Import Pages, Ports, Categories...', 'tid' ); ?></span>

				<div class="meter">
					<span style="width: 0"></span>
				</div>
				<div class="tp_process_messase"></div>
			</div>
			<div class="tpimport_widgets" style="display: none;">
				<span class="text_note"><?php esc_html_e( 'Add widgets...', 'tid' ); ?></span>

				<div class="meter">
					<span style="width: 0"></span>
				</div>
				<div class="tp_process_messase"></div>
			</div>
			<div class="tpimport_setting" style="display: none;">
				<span class="text_note"><?php esc_html_e( 'Reset theme options...', 'tid' ); ?></span>

				<div class="meter">
					<span style="width: 0"></span>
				</div>
				<div class="tp_process_messase"></div>
			</div>
			<div class="tpimport_menus" style="display: none;">
				<span class="text_note"><?php esc_html_e( 'Setup menus...', 'tid' ); ?></span>

				<div class="meter">
					<span style="width: 0"></span>
				</div>
				<div class="tp_process_messase"></div>
			</div>
			<?php if ( class_exists( 'RevSlider' ) ) { ?>
				<div class="tpimport_slider" style="display: none;">
					<span class="text_note"><?php esc_html_e( 'Setup slider...', 'tid' ); ?></span>

					<div class="meter">
						<span style="width: 0"></span>
					</div>
				<span class="text_note"><?php printf( wp_kses( __( 'If import slider don\'t finish you can import manual, please view at <a
							href="%s" target="_blank">here</a>', 'thim' ), array(
						'a' => array(
							'href'   => array(),
							'target' => array()
						)
					) ), esc_url( 'http://thimpress.com/knowledge-base/import-revolution-sliders/' ) ); ?>
				</span>

					<div class="tp_process_messase"></div>
				</div>
			<?php } ?>
			<div id="tp_process_error_messase"></div>
		</div>

		<table class='form-table'>
			<tbody>
	<?php
}

/**
 * Process front page displays settings importing
 *
 * @param $post_id
 * @param $key
 * @param $value
 */
function tid_import_front_page_displays_settings( $post_id, $key, $value ) {
	if ( in_array( $key, array( 'thim_page_for_posts', 'thim_page_on_front' ) ) ) {
		$meta_value = get_post_meta( $post_id, $key, true );
		if ( $meta_value && $meta_value == $value ) {
			if ( $key == 'thim_page_for_posts' ) {
				update_option( 'page_for_posts', $post_id );
			} else {
				update_option( 'page_on_front', $post_id );
			}
		}
	}

}

add_action( 'import_post_meta', 'tid_import_front_page_displays_settings', 10, 3 );
