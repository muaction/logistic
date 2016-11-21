<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package agapi
 */

global $theme_options_data;
?>
<!DOCTYPE html>
<html <?php thim_html_schema(); ?> <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<div id="wrapper-container" class="wrapper-container">
	<!-- menu for mobile-->
	<nav class="visible-xs mobile-menu-container mobile-effect" itemscope
	     itemtype="http://schema.org/SiteNavigationElement">
		<?php get_template_part( 'inc/header/mobile-menu' ); ?>
	</nav>
	<div class="content-pusher">
		<header id="masthead"
		        class="site-header <?php echo esc_attr(apply_filters( 'thim_option_sticky_menu', '' )); ?> <?php echo isset( $theme_options_data['thim_header_style'] ) ? esc_attr( $theme_options_data['thim_header_style'] ) : ''; ?>"
		        itemscope itemtype="http://schema.org/WPHeader">
			<?php
			// show top header
			get_template_part( 'inc/header/top-header' );

			// Header Style
			if ( isset( $theme_options_data['thim_header_style'] ) && $theme_options_data['thim_header_style'] ) {
				get_template_part( 'inc/header/' . $theme_options_data['thim_header_style'] );
			} else {
				get_template_part( 'inc/header/header_v1' );
			}
			?>
		</header>
	</div>