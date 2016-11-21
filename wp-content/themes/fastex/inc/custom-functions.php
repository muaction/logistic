<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Sticky menu
 */
if ( !function_exists( 'thim_option_sticky_menu' ) ) {
	function thim_option_sticky_menu() {
		global $theme_options_data;
		if ( isset ( $theme_options_data['thim_header_sticky'] ) && $theme_options_data['thim_header_sticky'] == true ) {
			echo 'header_sticky';
		}
	}
}

add_filter( 'thim_option_sticky_menu', 'thim_option_sticky_menu' );

/**
 * Logo
 */

add_action( 'thim_logo', 'thim_logo' );
// logo
if ( !function_exists( 'thim_logo' ) ) :
	function thim_logo() {
		global $theme_options_data;
		if ( isset( $theme_options_data['thim_logo'] ) && $theme_options_data['thim_logo'] <> '' ) {
			$thim_logo     = $theme_options_data['thim_logo'];
			$thim_logo_src = $thim_logo; // For the default value
			if ( is_numeric( $thim_logo ) ) {
				$logo_attachment = wp_get_attachment_image_src( $thim_logo, 'full' );
				$thim_logo_src   = $logo_attachment[0];
			}
			if ( !$thim_logo_src ) {
				$thim_logo_src = get_template_directory_uri() . '/images/logo.png';
			}
			$thim_logo_size = @getimagesize( $thim_logo_src );
			$logo_size      = $thim_logo_size[3];
			$site_title     = esc_attr( get_bloginfo( 'name', 'display' ) );
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home"><img src="' . $thim_logo_src . '" alt="' . $site_title . '" ' . $logo_size . ' /></a>';
		} else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a>';
		}
	}
endif; // logo

add_action( 'thim_sticky_logo', 'thim_sticky_logo' );
// get sticky logo
if ( !function_exists( 'thim_sticky_logo' ) ) :
	function thim_sticky_logo() {
		global $theme_options_data;
		if ( isset( $theme_options_data['thim_sticky_logo'] ) && $theme_options_data['thim_sticky_logo'] <> '' ) {
			$thim_logo_stick_logo     = $theme_options_data['thim_sticky_logo'];
			$thim_logo_stick_logo_src = $thim_logo_stick_logo; // For the default value
			if ( is_numeric( $thim_logo_stick_logo ) ) {
				$logo_attachment          = wp_get_attachment_image_src( $thim_logo_stick_logo, 'full' );
				$thim_logo_stick_logo_src = $logo_attachment[0];
			}
			if ( !$thim_logo_stick_logo_src ) {
				$thim_logo_stick_logo_src = get_template_directory_uri() . '/images/sticky-logo.png';
			}
			$thim_logo_size = @getimagesize( $thim_logo_stick_logo_src );
			$logo_size      = $thim_logo_size[3];
			$site_title     = esc_attr( get_bloginfo( 'name', 'display' ) );
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">
					<img src="' . esc_url( $thim_logo_stick_logo_src ) . '" alt="' . $site_title . '" ' . $logo_size . ' /></a>';
		} elseif ( isset( $theme_options_data['thim_logo'] ) && $theme_options_data['thim_logo'] <> '' ) {
			$thim_logo     = $theme_options_data['thim_logo'];
			$thim_logo_src = $thim_logo; // For the default value
			if ( is_numeric( $thim_logo ) ) {
				$logo_attachment = wp_get_attachment_image_src( $thim_logo, 'full' );
				$thim_logo_src   = $logo_attachment[0];
			}
			$thim_logo_size = @getimagesize( $thim_logo_src );
			$logo_size      = $thim_logo_size[3];
			$site_title     = esc_attr( get_bloginfo( 'name', 'display' ) );
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">
				<img src="' . $thim_logo_src . '" alt="' . $site_title . '" ' . $logo_size . ' /></a>';
		}
		if ( isset ( $theme_options_data['thim_sticky_logo'] ) && $theme_options_data['thim_sticky_logo'] == '' && isset ( $theme_options_data['thim_logo'] ) && $theme_options_data['thim_logo'] == '' ) {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">
			' . esc_attr( get_bloginfo( 'name' ) ) . '</a>';;
		}
	}
endif; // thim_sticky_logo

function thim_hex2rgb( $hex ) {
	$hex = str_replace( "#", "", $hex );
	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );

	return $rgb; // returns an array with the rgb values
}

function thim_getExtraClass( $el_class ) {
	$output = '';
	if ( $el_class != '' ) {
		$output = " " . str_replace( ".", "", $el_class );
	}

	return $output;
}

function thim_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( $css_animation != '' ) {
		wp_enqueue_script( 'waypoints' );
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
	}

	return $output;
}

function excerpt( $limit ) {
	$content = get_the_excerpt();
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = explode( ' ', $content, $limit );
	array_pop( $content );
	$content = implode( " ", $content );

	return $content;
}

// function convert type int variable to string variable
function convertIntToString( $id ) {
	$src = '';
	if ( is_numeric( $id ) ) {
		$imageAttachment = wp_get_attachment_image_src( $id );
		$src             = $imageAttachment[0];
	}

	return $src;
}

/****************Breadcrumbs********************* */
if ( !function_exists( 'thim_breadcrumbs' ) ) {
	/**
	 * Breadcrumbs with microdata
	 */
	function thim_breadcrumbs() {

		// Do not display on the homepage
		if ( is_front_page() ) {
			return;
		}
		// Settings
		$id         = 'breadcrumbs';
		$class      = 'breadcrumbs';
		$home_title = __( 'Home', 'thim' );

		// Get the query & post information
		global $post;
		$category = get_the_category();

		// Build the breadcrums
		echo '<ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="' . $id . '" class="' . $class . '">';


		// Home page
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-home"><a itemprop="item" class="bread-link bread-home" href="' . esc_html( get_home_url() ) . '" title="' . esc_attr( $home_title ) . '"><span itemprop="name">' . esc_html( $home_title ) . '</span></a></li>';

		if ( is_home() ) {
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong itemprop="name" class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . esc_html__( 'Blog', 'thim' ) . '</strong></li>';
		}

		if ( is_single() ) {

			// Single post (Only display the first category)
			if ( isset( $category[0] ) ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a itemprop="item" class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '" title="' . esc_attr( $category[0]->cat_name ) . '"><span itemprop="name">' . esc_html( $category[0]->cat_name ) . '</span></a></li>';
			}
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong itemprop="name" class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</strong></li>';

		} else if ( is_category() ) {

			// Category page
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong itemprop="name" class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . esc_html( $category[0]->cat_name ) . '</strong></li>';

		} else if ( is_page() ) {

			// Standard page
			if ( $post->post_parent ) {

				// If child page, get parents
				$anc = get_post_ancestors( $post->ID );

				// Get parents in the right order
				$anc = array_reverse( $anc );

				// Parent page loop
				$parents = '';
				foreach ( $anc as $ancestor ) {
					echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-parent item-parent-' . $ancestor . '"><a itemprop="item" class="bread-parent bread-parent-' . $ancestor . '" href="' . esc_url( get_permalink( $ancestor ) ) . '" title="' . esc_attr( get_the_title( $ancestor ) ) . '"><span itemprop="name">' . esc_html( get_the_title( $ancestor ) ) . '</span></a></li>';
				}
				// Current page
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong itemprop="name" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</strong></li>';

			} else {

				// Just display current page if not parents
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong itemprop="name" class="bread-current bread-' . $post->ID . '"> ' . esc_html( get_the_title() ) . '</strong></li>';

			}

		} else if ( is_tag() ) {

			// Tag page

			// Get tag information
			$term_id  = get_query_var( 'tag_id' );
			$taxonomy = 'post_tag';
			$args     = 'include=' . $term_id;
			$terms    = get_terms( $taxonomy, $args );

			// Display the tag name
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong itemprop="name" class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . esc_html( $terms[0]->name ) . '</strong></li>';

		} elseif ( is_day() ) {

			// Day archive

			// Year link
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-year item-year-' . get_the_time( 'Y' ) . '"><a itemprop="item" class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '" title="' . esc_attr( get_the_time( 'Y' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'thim' ) . '</span></a></li>';

			// Month link
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-month item-month-' . get_the_time( 'm' ) . '"><a itemprop="item" class="bread-month bread-month-' . get_the_time( 'm' ) . '" href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '" title="' . esc_attr( get_the_time( 'M' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'thim' ) . '</span></a></li>';

			// Day display
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-' . get_the_time( 'j' ) . '"><strong itemprop="name" class="bread-current bread-' . get_the_time( 'j' ) . '"> ' . esc_html( get_the_time( 'jS' ) ) . ' ' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'thim' ) . '</strong></li>';

		} else if ( is_month() ) {

			// Month Archive

			// Year link
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-year item-year-' . get_the_time( 'Y' ) . '"><a itemprop="item" class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '" title="' . esc_attr( get_the_time( 'Y' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'thim' ) . '</span></a></li>';

			// Month display
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-month item-month-' . get_the_time( 'm' ) . '"><strong itemprop="name" class="bread-month bread-month-' . get_the_time( 'm' ) . '" title="' . esc_attr( get_the_time( 'M' ) ) . '">' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'thim' ) . '</strong></li>';

		} else if ( is_year() ) {

			// Display year archive
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-current-' . get_the_time( 'Y' ) . '"><strong itemprop="name" class="bread-current bread-current-' . get_the_time( 'Y' ) . '" title="' . esc_attr( get_the_time( 'Y' ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'thim' ) . '</strong></li>';

		} else if ( is_author() ) {

			// Auhor archive

			// Get the author information
			global $author;
			$userdata = get_userdata( $author );

			// Display author name
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-current-' . $userdata->user_nicename . '"><strong itemprop="name" class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . esc_attr( $userdata->display_name ) . '">' . esc_attr__( 'Author', 'thim' ) . ' ' . esc_html( $userdata->display_name ) . '</strong></li>';

		} else if ( get_query_var( 'paged' ) ) {

			// Paginated archives
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-current-' . get_query_var( 'paged' ) . '"><strong itemprop="name" class="bread-current bread-current-' . get_query_var( 'paged' ) . '" title="' . esc_attr__( 'Page', 'thim' ) . ' ' . get_query_var( 'paged' ) . '">' . esc_html__( 'Page', 'thim' ) . ' ' . esc_html( get_query_var( 'paged' ) ) . '</strong></li>';

		} else if ( is_search() ) {

			// Search results page
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="item-current item-current-' . get_search_query() . '"><strong itemprop="name" class="bread-current bread-current-' . get_search_query() . '" title="' . esc_attr__( 'Search results for:', 'thim' ) . ' ' . esc_attr( get_search_query() ) . '">' . esc_html__( 'Search results for:', 'thim' ) . ' ' . esc_html( get_search_query() ) . '</strong></li>';

		} elseif ( is_404() ) {

			// 404 page
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><strong itemprop="name">' . esc_html__( '404 Page', 'thim' ) . '</strong></li>';
		}

		echo '</ul>';
	}
}
/**********end Breadcrumbs****************/

/************ List Comment ***************/
if ( !function_exists( 'thim_comment' ) ) {
	function thim_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		//extract( $args, EXTR_SKIP );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_html( $tag ) ?><?php comment_class( 'description_comment' ) ?> id="comment-<?php comment_ID() ?>">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		}
		?>
		<div
			class="author"><?php printf( __( '<span class="author-name">%s</span>', 'thim' ), get_comment_author_link() ) ?></div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'thim' ) ?></em>
		<?php endif; ?>
		<div class="comment-extra-info">
			<div class="date"><?php printf( get_comment_date(), get_comment_time() ) ?></div>
			<?php comment_reply_link( array_merge( $args, array(
				'add_below' => $add_below,
				'depth'     => $depth,
				'max_depth' => $args['max_depth']
			) ) ) ?>
			<?php edit_comment_link( __( 'Edit', 'thim' ), '', '' ); ?>
		</div>
		<div class="message" itemprop="commentText">
			<?php comment_text() ?>
		</div>
		<div class="clear"></div>
		<?php
	}
}


/* Import/Export Customizer Setting */
if ( !function_exists( 'thim_cusomizer_upload_settings' ) ) :
	function thim_cusomizer_upload_settings() {
		WP_Filesystem();
		global $wp_filesystem;
		$file_name = $_FILES['thim-customizer-settings-upload']['name'];
		$file_ext  = pathinfo( $file_name, PATHINFO_EXTENSION );
		if ( $file_ext == 'json' ) {
			$encode_options = $wp_filesystem->get_contents( $_FILES['thim-customizer-settings-upload']['tmp_name'] );
			if ( !empty( $encode_options ) ) {
				echo esc_html( $encode_options );
				exit();
			}
		}
		exit( '-1' );
	}
endif;
add_action( 'wp_ajax_thim_cusomizer_upload_settings', 'thim_cusomizer_upload_settings' );
if ( !function_exists( 'thim_ajax_get_attachment_url' ) ) :
	function thim_ajax_get_attachment_url() {
		check_ajax_referer( 'thim_customize_attachment', 'nonce' );

		if ( !isset( $_POST['attachment_id'] ) ) {
			exit();
		}

		$attachment_id = $_POST['attachment_id'];

		echo wp_get_attachment_url( $attachment_id );
		exit();
	}
endif;
add_action( 'wp_ajax_thim_ajax_get_attachment_url', 'thim_ajax_get_attachment_url' );
add_action( 'wp_ajax_nopriv_thim_ajax_get_attachment_url', 'thim_ajax_get_attachment_url' );

/*
		 * Theme support woocommerce
		 */
add_theme_support( 'woocommerce' );

// Display recipe details

function thim_custom_excerpt_length( $length ) {
	return 10;
}

add_filter( 'excerpt_length', 'thim_custom_excerpt_length', 999 );

function thim_new_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'thim_new_excerpt_more' );

// Remove default breadcrumbs of WooCommerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

function thim_custom_wc_breadcrumbs() {
	return array(
		'delimiter'   => '',
		'wrap_before' => '<ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs" class="breadcrumbs">',
		'wrap_after'  => '</ul>',
		'before'      => '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">',
		'after'       => '</li>',
		'home'        => _x( 'Home', 'breadcrumb', 'thim' ),
	);
}

add_filter( 'woocommerce_breadcrumb_defaults', 'thim_custom_wc_breadcrumbs' );

function post_share() {
	global $theme_options_data;
	if ( ( isset( $theme_options_data['thim_sharing_facebook'] ) && $theme_options_data['thim_sharing_facebook'] == 1 ) ||
		( isset( $theme_options_data['thim_sharing_twitter'] ) && $theme_options_data['thim_sharing_twitter'] == 1 ) ||
		( isset( $theme_options_data['thim_sharing_pinterest'] ) && $theme_options_data['thim_sharing_pinterest'] ) == 1 ||
		( isset( $theme_options_data['thim_sharing_google'] ) && $theme_options_data['thim_sharing_google'] ) == 1
	) {
		echo '<ul class="social-share">';
		if ( $theme_options_data['thim_sharing_facebook'] == 1 ) {
			echo '<li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[url]=' . urlencode( get_permalink() ) . '&amp;p[images][0]=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" title="' . __( 'Facebook', 'thim' ) . '"><i class="fa fa-facebook"></i></a></li>';
		}
		if ( $theme_options_data['thim_sharing_twitter'] == 1 ) {
			echo '<li><a target="_blank" class="twitter" href="https://twitter.com/share?url=' . urlencode( get_permalink() ) . '&amp;text=' . esc_attr( get_the_title() ) . '" title="' . __( 'Twitter', 'thim' ) . '"><i class="fa fa-twitter"></i></a></li>';
		}
		if ( $theme_options_data['thim_sharing_google'] == 1 ) {
			echo '<li><a target="_blank" class="googleplus" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . esc_attr( get_the_title() ) . '" title="' . __( 'Google Plus', 'thim' ) . '" onclick=\'javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;\'><i class="fa fa-google"></i></a></li>';
		}
		if ( $theme_options_data['thim_sharing_pinterest'] == 1 ) {
			echo '<li><a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;description=' . get_the_excerpt() . '&media=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" onclick="window.open(this.href); return false;" title="' . __( 'Pinterest', 'thim' ) . '"><i class="fa fa-pinterest"></i></a></li>';
		}

		echo '</ul>';
	}

}

add_action( 'social_share', 'post_share' );

/**
 * Custom ajax loader contact form 7
 *
 * @return string
 */
function thim_custom_loader_contact_form() {
	return get_template_directory_uri() . '/images/loading.gif';
}

add_filter( 'wpcf7_ajax_loader', 'thim_custom_loader_contact_form' );

/**
 * Custom Shop title
 *
 * @return string|void
 */
function thim_custom_shop_title( $title ) {
	if ( is_post_type_archive( 'product' ) ) {
		$title = __( 'Shop', 'thim' );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'thim_custom_shop_title' );

// Remove stupid VC activation msg
setcookie( 'vchideactivationmsg', '1', strtotime( '+3 years' ), '/' );
setcookie( 'vchideactivationmsg', '1', strtotime( '+3 years' ), '/' );

function thim_html_schema() {
	$schema = 'http://schema.org/';

	// Is single post
	if ( is_single() ) {
		$type = 'Article';
	} // Is blog home, archive or category
	else if ( is_home() || is_archive() || is_category() ) {
		$type = "Blog";
	} // Is static front page
	else if ( is_front_page() ) {
		$type = "Website";
	} // Is a general page
	else {
		$type = 'WebPage';
	}

	echo 'itemtype="' . $schema . $type . '"';
}


function thim_change_preload_image_quickview_product() {
	return TP_THEME_URI . 'images/loading.gif';
}

add_filter( 'yith_quick_view_loader_gif', 'thim_change_preload_image_quickview_product', 10000 );

//thim_excerpt_length
function thim_excerpt_length() {
	global $theme_options_data;
	if ( isset( $theme_options_data['thim_archive_excerpt_length'] ) ) {
		$length = $theme_options_data['thim_archive_excerpt_length'];
	} else {
		$length = '50';
	}

	return $length;
}

add_filter( 'excerpt_length', 'thim_excerpt_length', 999 );
function thim_wp_new_excerpt( $text ) {
	if ( $text == '' ) {
		$text           = get_the_content( '' );
		$text           = strip_shortcodes( $text );
		$text           = apply_filters( 'the_content', $text );
		$text           = str_replace( ']]>', ']]>', $text );
		$text           = strip_tags( $text );
		$text           = nl2br( $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$words          = explode( ' ', $text, $excerpt_length + 1 );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			array_push( $words, '' );
			$text = implode( ' ', $words );
		}
	}

	return $text;
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'thim_wp_new_excerpt' );

function feature_images( $width, $height ) {
	global $post;
	if ( has_post_thumbnail() ) {
		$get_thumbnail = simplexml_load_string( get_the_post_thumbnail( $post->ID, 'full' ) );
		$thumbnail_src = $get_thumbnail->attributes()->src;
		$img_url       = $thumbnail_src;
		$data          = @getimagesize( $img_url );
		$width_data    = $data[0];
		$height_data   = $data[1];
		if ( !( $width_data > $width ) && !( $height_data > $height ) ) {
			return '<img src="' . $img_url[0] . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
		} else {
			$crop       = ( $height_data < $height ) ? false : true;
			$image_crop = aq_resize( $img_url[0], $width, $height, $crop );

			return '<img src="' . $image_crop . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
		}
	}
}

// Get Product in Cart
function thim_get_current_cart_info() {
	global $woocommerce;
	$items = count( $woocommerce->cart->get_cart() );

	return array(
		$items,
		get_woocommerce_currency_symbol()
	);
}

/**
 * String error in customize
 */
function thim_inline_script_string_error_customize() { ?>
	<script>
		var save_customize_failed = '<?php esc_html_e('Customize is not saved. Please check your file writing permissions.', 'thim'); ?>';
	</script>
	<?php
}

add_action( 'admin_print_scripts', 'thim_inline_script_string_error_customize', 0 );

/**
 * Enqueue custom javascript in customize
 */
function thim_enqueue_script_customize() {
	if ( class_exists( 'Less_Parser' ) ) {
		wp_enqueue_script( 'customize_script', get_template_directory_uri() . '/inc/admin/js/customize.js', array( 'jquery' ) );
	}
}

add_action( 'admin_enqueue_scripts', 'thim_enqueue_script_customize' );

/**
 * Filter wp_page_menu
 *
 * @param $menu
 * @param $args
 *
 * @return string
 */
function thim_filter_wp_page_menu( $menu, $args ) {
	$defaults = array(
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'menu',
		'echo'        => true,
		'link_before' => '',
		'link_after'  => ''
	);
	$args     = wp_parse_args( $args, $defaults );

	/**
	 * Filter the arguments used to generate a page-based menu.
	 *
	 * @since 2.7.0
	 *
	 * @see   wp_page_menu()
	 *
	 * @param array $args An array of page menu arguments.
	 */
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( !empty( $args['show_home'] ) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] ) {
			$text = __( 'Home', 'thim' );
		} else {
			$text = $args['show_home'];
		}
		$class = '';
		if ( is_front_page() && !is_paged() ) {
			$class = 'class="current_page_item"';
		}
		$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if ( get_option( 'show_on_front' ) == 'page' ) {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option( 'page_on_front' );
		}
	}

	$list_args['echo']     = false;
	$list_args['title_li'] = '';
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages( $list_args ) );

	if ( $menu ) {
		$menu = '<ul class="nav navbar-nav menu-main-menu">' . $menu . '</ul>';
	}

	if ( $args['echo'] ) {
		echo ent2ncr( $menu );
	} else {
		return $menu;
	}
}

;

add_filter( 'wp_page_menu', 'thim_filter_wp_page_menu', 1, 2 );
