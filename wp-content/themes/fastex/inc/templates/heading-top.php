<?php

global $theme_options_data;

// Init
$prefix = $style = $title = $breadcrumbs = $show_heading = '';

// Get heading top setting
if ( is_page() || is_single() ) {
	$prefix = 'thim_archive_single_';
	if ( get_post_type() == 'product' ) {
		$prefix = 'thim_woo_single_';
	}
	$id           = get_the_ID();
	$show_heading = '1';

	// If using custom heading
	if ( get_post_meta( $id, 'thim_mtb_using_custom_heading', true ) ) {

		// Title showed
		if ( !get_post_meta( $id, 'thim_mtb_hide_title_and_subtitle', true ) ) {
			$title = get_post_meta( $id, 'thim_mtb_custom_title', true ) ? '<h2>' . get_post_meta( $id, 'thim_mtb_custom_title', true ) . '</h2>' : '<h2>' . get_the_title() . '</h2>';
			$title .= get_post_meta( $id, 'thim_subtitle', true ) ? '<p>' . get_post_meta( $id, 'thim_subtitle', true ) . '</p>' : '';
		}

		// Breadcrumbs showed
		if ( !get_post_meta( $id, 'thim_mtb_hide_breadcrumbs', true ) ) {
			$breadcrumbs = '1';
		}

		// Get other style
		$style = '';
		if ( get_post_meta( $id, 'thim_mtb_top_image', true ) ) {
			$top_image = wp_get_attachment_image_src( get_post_meta( $id, 'thim_mtb_top_image', true ), 'full' );
			if ( $top_image ) {
				$style .= 'background-image: url(' . $top_image[0] . ');';
			} else {
				$style .= 'background-image: url(' . get_template_directory_uri() . '/images/bg_header.jpg);"';
			}
		}
		if ( get_post_meta( $id, 'thim_mtb_bg_color', true ) ) {
			$style .= 'background-color: ' . get_post_meta( $id, 'thim_mtb_bg_color', true ) . ';';

		}
		if ( get_post_meta( $id, 'thim_mtb_text_color', true ) ) {
			$style .= 'color: ' . get_post_meta( $id, 'thim_mtb_text_color', true ) . ';';
		}
		if ( get_post_meta( $id, 'thim_mtb_height_heading', true ) ) {
			$style .= 'height: ' . get_post_meta( $id, 'thim_mtb_height_heading', true ) . 'px;';
		}
		if ( $style ) {
			$style = 'style="' . $style . '"';
		}

		// Hide heading top when
		if ( !$title && !$breadcrumbs && !$style ) {
			$show_heading = '';
		}
	} else {
		// Title showed
		if ( isset( $theme_options_data[$prefix . 'hide_title'] ) && !$theme_options_data[$prefix . 'hide_title'] ) {
			$title = '<h2>' . get_the_title() . '</h2>';
		}

		// Breadcrumbs showed
		if ( isset( $theme_options_data[$prefix . 'hide_breadcrumbs'] ) && !$theme_options_data[$prefix . 'hide_breadcrumbs'] ) {
			$breadcrumbs = '1';
		}

		// Get top image
		if ( isset( $theme_options_data[$prefix . 'top_image'] ) ) {
			$top_image = wp_get_attachment_image_src( $theme_options_data[$prefix . 'top_image'], 'full' );
			if ( $top_image ) {
				$style = 'style="background-image: url(' . $top_image[0] . ');"';
			} else {
				$style = 'style="background-image: url(' . get_template_directory_uri() . '/images/bg_header.jpg);"';
			}
		}
	}


} elseif ( is_archive() || is_home() || is_404() ) {
	$prefix = 'thim_archive_cate_';
	if ( get_post_type() == 'product' ) {
		$prefix = 'thim_woo_cate_';
	}
	$show_heading = '1';

	// Title showed
	if ( isset( $theme_options_data[$prefix . 'hide_title'] ) && !$theme_options_data[$prefix . 'hide_title'] ) {
		$title = '<h1>' . thim_the_archive_title() . '</h1>';
	}

	// Breadcrumbs showed
	if ( isset( $theme_options_data[$prefix . 'hide_breadcrumbs'] ) && !$theme_options_data[$prefix . 'hide_breadcrumbs'] ) {
		$breadcrumbs = '1';
	}

	// Get top image
	if ( isset( $theme_options_data[$prefix . 'top_image'] ) ) {
		$top_image = wp_get_attachment_image_src( $theme_options_data[$prefix . 'top_image'], 'full' );
		if ( $top_image ) {
			$style = 'style="background-image: url(' . $top_image[0] . ');"';
		} else {
			$style = 'style="background-image: url(' . get_template_directory_uri() . '/images/bg_header.jpg);"';
		}
	}
}

if ( is_front_page() ) {
	$breadcrumbs = '';
}


?>

<?php if ( $show_heading == '1' ) : ?>
	<div class="heading-top" <?php echo ent2ncr($style); ?>>
		<div class="container">
			<div class="table-cell">
				<?php echo ent2ncr($title); ?>
			</div>
		</div>
	</div>
	<?php if ( $breadcrumbs == '1' ) : ?>
		<div class="breadcrumbs-container">
			<div class="container">
				<?php
				if ( get_post_type() == 'product' ) {
					woocommerce_breadcrumb();
				} else {
					thim_breadcrumbs();
				}
				?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
