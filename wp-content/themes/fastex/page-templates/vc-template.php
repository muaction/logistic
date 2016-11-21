<?php
/**
 * Template Name: VC Template
 *
 **/

while ( have_posts() ) : the_post();

	get_template_part( 'content', 'page' );

endwhile;
