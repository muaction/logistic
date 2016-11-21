<?php
if ( has_nav_menu( 'primary' ) ) {
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'      => false,
		'items_wrap'     => '<ul class="nav navbar-nav menu-main-menu">%3$s</ul>'
	) );
} else {
	wp_nav_menu( array(
		'theme_location' => '',
		'container'      => false,
		'items_wrap'     => '<ul class="nav navbar-nav menu-main-menu">%3$s</ul>'
	) );
}
?>

<?php if ( is_post_type_archive( 'product' ) ) : ?>
	<ul id="mini-cart" class="nav navbar-nav">
		<li>
			<?php dynamic_sidebar( 'widget-navigation' ); ?>
		</li>
	</ul>
<?php endif; ?>