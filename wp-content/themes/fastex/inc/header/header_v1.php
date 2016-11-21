<div class="wrapper-logo">
	<div class="container">
		<div class="table-cell sm-logo">
			<?php do_action( 'thim_logo' ); ?>
		</div>
		<?php if ( is_active_sidebar( 'header_right' ) ) : ?>
			<div class="table-cell table-right">
				<div class="header-right">
					<?php dynamic_sidebar( 'header_right' ); ?>
				</div>
			</div><!-- col-sm-6 -->
		<?php endif; ?>
	</div>
	<!--end container tm-table-->
</div>
<!--end wrapper-logo-->

<div class="navigation affix-top">
	<div class="container">
		<div class="tm-table">
			<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</div>

			<div class="table-cell sm-logo-affix logo-effect">
				<?php do_action( 'thim_sticky_logo' ); ?>
			</div>

			<nav class="table-cell navbar-primary" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php get_template_part( 'inc/header/main-menu' ); ?>
			</nav>
			<?php if ( is_active_sidebar( 'toolbar-2' ) ) : ?>
				<?php dynamic_sidebar( 'toolbar-2' ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>



