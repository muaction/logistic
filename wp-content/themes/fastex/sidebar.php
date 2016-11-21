<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package thim
 */
if ( !is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="sidebar" class="widget-area col-sm-3" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php
	if ( get_post_type() == 'product' ) {
		dynamic_sidebar( 'sidebar-shop' );
	} else {
		dynamic_sidebar( 'sidebar-1' );
	}
	?>
</div><!-- #secondary -->
