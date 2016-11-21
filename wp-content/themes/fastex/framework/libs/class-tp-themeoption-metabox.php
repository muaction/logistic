<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class-tp-import-update
 *
 * @author Tuannv
 */
class Thim_ThemeOption_And_Metabox {
	function __construct() {
		add_action('tf_create_options', array($this, 'create_theme_option'));
	}
	function create_theme_option()
	{
		$titan = TitanFramework::getInstance( 'thim' );

		// Post Format
		include ('meta-box/post-format.php');
		// Display Setting
		include ('meta-box/setting.php');
		
	}
}
new Thim_ThemeOption_And_Metabox();

