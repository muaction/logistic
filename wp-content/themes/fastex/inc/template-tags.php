<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package thim
 */
if ( ! function_exists( 'thim_paging_nav' ) ) :

	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function thim_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );

		$query_args = array();
		$url_parts  = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $GLOBALS['wp_query']->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 2,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => __( 'Prev', 'thim' ),
			'next_text' => __( 'Next', 'thim' ),
			'type'      => 'list'
		) );

		if ( $links ) :
			?>
			<div class="pagination loop-pagination">
				<?php //echo '<span> Page </span>'
				?>
				<?php echo ent2ncr( $links ); ?>
			</div>
			<!-- .pagination -->
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'thim_post_nav' ) ) :

	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function thim_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'thim' ); ?></h1>

			<div class="nav-links">
				<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'thim' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link', 'thim' ) );
				?>
			</div>
			<!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}

endif;

if ( ! function_exists( 'thim_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function thim_entry_meta() {
		global $theme_options_data;
		if ( ! isset( $theme_options_data['thim_show_author'] ) ) {
			$theme_options_data['thim_show_author'] = 1;
		}

		if ( ! isset( $theme_options_data['thim_show_category'] ) ) {
			$theme_options_data['thim_show_category'] = 1;
		}
		if ( ! isset( $theme_options_data['thim_show_comment'] ) ) {
			$theme_options_data['thim_show_comment'] = 1;
		}

		?>
		<ul class="entry-meta">
			<?php
			if ( isset( $theme_options_data['thim_show_author'] ) && $theme_options_data['thim_show_author'] == 1 ) {
				?>
				<li class="author">
					<span><?php echo esc_html__( 'Post by', 'thim' ); ?></span>
					<?php printf( ' <a href="%1$s" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">%2$s</a>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_html( get_the_author() )
					); ?>
				</li>
				<?php
			}
			if ( isset( $theme_options_data['thim_show_category'] ) && $theme_options_data['thim_show_category'] == 1 && get_the_category() ) {
				?>
				<li>
					<?php
					if ( isset( $theme_options_data['thim_limit_cates'] ) && $theme_options_data['thim_limit_cates'] == 1 ) {
						?>
						<span><?php echo esc_html__( 'on', 'thim' ); ?></span> <?php thim_random_cats( 2, ', ' ); ?>
						<?php
					} else {
						?>
						<span><?php echo esc_html__( 'on', 'thim' ); ?></span> <?php the_category( ', ', '' ); ?>
						<?php
					}
					?>
				</li>
				<?php
			}

			if ( isset( $theme_options_data['thim_show_comment'] ) && $theme_options_data['thim_show_comment'] == 1 ) {
				?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) :
					?>
					<li class="comment-total">
						<?php comments_popup_link( __( '0 comment', 'thim' ), __( '1 comment', 'thim' ), __( '% comments', 'thim' ) ); ?>
					</li>
					<?php
				endif;
			}
			?>

		</ul>
		<?php
	}
endif;

if ( ! function_exists( 'thim_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function thim_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( 'Posted on %s', 'post date', 'thim' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			_x( 'by %s', 'post author', 'thim' ), '<span class="author vcard" itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		$byline = sprintf(
			_x( 'by %s', 'post author', 'thim' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
	}

endif;

if ( ! function_exists( 'thim_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function thim_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'thim' ) );
			if ( $categories_list && thim_categorized_blog() ) {
				printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'thim' ) . '</span>', $categories_list );
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'thim' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'thim' ) . '</span>', $tags_list );
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'thim' ), esc_html__( '1 Comment', 'thim' ), esc_html__( '% Comments', 'thim' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'thim' ), '<span class="edit-link">', '</span>' );
	}

endif;

if ( ! function_exists( 'thim_the_archive_title' ) ) :

	/**
	 * Shim for `the_archive_title()`.
	 *
	 * Display the archive title based on the queried object.
	 *
	 *
	 * @param string $before Optional. Content to prepend to the title. Default empty.
	 * @param string $after Optional. Content to append to the title. Default empty.
	 */
	function thim_the_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( '%s', 'thim' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( '%s', 'thim' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Author: %s', 'thim' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Year: %s', 'thim' ), get_the_date( _x( 'Y', 'yearly archives date format', 'thim' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Month: %s', 'thim' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'thim' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Day: %s', 'thim' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'thim' ) ) );
		} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'thim' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'thim' );
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'thim' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'thim' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} elseif ( is_search() ) {
			$title = sprintf( __( 'Search Results for: %s', 'thim' ), '<span>' . get_search_query() . '</span>' );
		} elseif ( is_404() ) {
			$title = __( '404 | Page Not Found', 'thim' );
		} elseif ( is_home() ) {
			$title = __( 'Blog', 'thim' );
		} else {
			$title = __( 'Archives', 'thim' );
		}
		/**
		 * Filter the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		$title = apply_filters( 'get_the_archive_title', $title );
		if ( ! empty( $title ) ) {
			return ent2ncr( $before . $title . $after );
		}
	}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :

	/**
	 * Shim for `the_archive_description()`.
	 *
	 * Display category, tag, or term description.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 *
	 * @param string $before Optional. Content to prepend to the description. Default empty.
	 * @param string $after Optional. Content to append to the description. Default empty.
	 */
	function the_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );

		if ( ! empty( $description ) ) {
			/**
			 * Filter the archive description.
			 *
			 * @see term_description()
			 *
			 * @param string $description Archive description to be displayed.
			 */
			echo ent2ncr($before . $description . $after);
		}
	}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function thim_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'thim_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'thim_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so thim_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so thim_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in thim_categorized_blog.
 */
function thim_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'thim_categories' );
}

add_action( 'edit_category', 'thim_category_transient_flusher' );
add_action( 'save_post', 'thim_category_transient_flusher' );

/**
 * Display favicon
 */
function thim_favicon() {
	if ( function_exists( 'wp_site_icon' ) ) {
		if ( function_exists( 'has_site_icon' ) ) {
			if ( ! has_site_icon() ) {
				// Icon default
				$thim_favicon_src = get_template_directory_uri() . "/images/favicon.png";
				echo '<link rel="shortcut icon" href="' . esc_url( $thim_favicon_src ) . '" type="image/x-icon" />';
				return;
			}
		}

		return;
	}

	/**
	 * Support WordPress < 4.3
	 */
	global $theme_options_data;
	$thim_favicon_src = '';
	if ( isset( $theme_options_data['thim_favicon'] ) ) {
		$thim_favicon       = $theme_options_data['thim_favicon'];
		$favicon_attachment = wp_get_attachment_image_src( $thim_favicon, 'full' );
		$thim_favicon_src   = $favicon_attachment[0];
	}
	if ( ! $thim_favicon_src ) {
		$thim_favicon_src = get_template_directory_uri() . "/images/favicon.png";
	}
	echo '<link rel="shortcut icon" href="' . esc_url( $thim_favicon_src ) . '" type="image/x-icon" />';
}

add_action( 'wp_head', 'thim_favicon' );