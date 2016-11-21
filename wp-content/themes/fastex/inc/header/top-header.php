
<?php if ( is_active_sidebar( 'toolbar' ) ) : ?>
	<div class="top-header">
		<div class="container">
			<div>
				<?php dynamic_sidebar( 'toolbar' ); ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!--End/div.top-->
<?php
endif;