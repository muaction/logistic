<?php
/* Set Default value when theme option not save at first time setup */
global $theme_options_data, $wp_query;
if ( is_page_template( 'page-templates/homepage.php' ) ) {
	$file = tp_template_path();
	include $file;
	return;
} else {
}
$file = tp_template_path();
get_header();
?>
	<div class="content-area">
		<?php
		// show top heading
		get_template_part( 'inc/templates/heading', 'top' );
		//show content
		do_action( 'thim_wrapper_loop_start' );
		include $file;
		do_action( 'thim_wrapper_loop_end' );
		?>
	</div>
<?php
get_footer();
?>