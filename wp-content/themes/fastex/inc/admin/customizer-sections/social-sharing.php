<?php

$social_sharing = $titan->createThemeCustomizerSection( array(
	'name'     => __( 'Social Sharing', 'thim' ),
	'position' => 80,
	'desc'     => __( 'Choose the social networks which you want to share blog posts.', 'thim' ),
) );

$social_sharing->createOption( array(
	'name'    => 'Facebook',
	'id'      => 'sharing_facebook',
	'type'    => 'checkbox',
	'default' => true,
) );

$social_sharing->createOption( array(
	'name'    => 'Twitter',
	'id'      => 'sharing_twitter',
	'type'    => 'checkbox',
	'default' => true,
) );


$social_sharing->createOption( array(
	'name'    => 'Google Plus',
	'id'      => 'sharing_google',
	'type'    => 'checkbox',
	'default' => true,
) );

$social_sharing->createOption( array(
	'name'    => 'Pinterest',
	'id'      => 'sharing_pinterest',
	'type'    => 'checkbox',
	'default' => false,
) );

