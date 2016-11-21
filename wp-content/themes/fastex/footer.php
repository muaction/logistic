<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package thim
 */
?>
<footer id="footer" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<?php global $theme_options_data; ?>
	<?php if ( is_active_sidebar( 'footer-left' ) || is_active_sidebar( 'footer-mid-1' ) || is_active_sidebar( 'footer-mid-2' ) || is_active_sidebar( 'footer-right' ) ) : ?>
		<div class="footer-sidebars ">
			<div class="wrap_content">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
								<?php dynamic_sidebar( 'footer-left' ); ?>
							<?php endif; ?>
						</div>
						<div class="col-sm-2">
							<?php if ( is_active_sidebar( 'footer-mid-1' ) ) : ?>
								<?php dynamic_sidebar( 'footer-mid-1' ); ?>
							<?php endif; ?>
						</div>
						<div class="col-sm-2">
							<?php if ( is_active_sidebar( 'footer-mid-2' ) ) : ?>
								<?php dynamic_sidebar( 'footer-mid-2' ); ?>
							<?php endif; ?>
						</div>
						<div class="col-sm-4">
							<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
								<?php dynamic_sidebar( 'footer-right' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!--==============================powered=====================================-->
	<?php if ( isset( $theme_options_data['thim_copyright_text'] ) || is_active_sidebar( 'copyright' ) ) { ?>
		<div id="powered">
			<div class="container">
				<div class="bottom-footer">
					<div class="row">
						<div class="col-sm-6 copyright">
							<?php
							if ( isset( $theme_options_data['thim_copyright_text'] ) ) {
								echo wp_kses(
									$theme_options_data['thim_copyright_text'],
									array(
										'a' => array(
											'href'  => array(),
											'title' => array()
										)
									) );
							}
							?>
						</div>

						<div class="bottom-footer-widgets col-sm-6">
							<?php if ( has_nav_menu( 'secondary' ) ) : ?>
								<?php
								wp_nav_menu( array(
									'theme_location' => 'secondary',
									'container'      => false,
								) );
								?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</footer><!-- #colophon -->

</div>

<!-- .box-area -->
<?php if ( isset( $theme_options_data['thim_show_to_top'] ) && $theme_options_data['thim_show_to_top'] == 1 ) { ?>
	<a href="#" id="back-to-top"><i class="fa fa-chevron-up"></i></a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>

