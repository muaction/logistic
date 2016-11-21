<?php
$styling = $titan->createThimCustomizerSection(array(
    'name' => __('Color', 'thim'),
    'position' => 60,
    'id' => 'styling_color'
));

$styling->createOption(array(
    'name' => __('Body background color', 'thim'),
    'id' => 'body_bg_color',
    'type' => 'color-opacity',
    'default' => '#ffffff',
    'livepreview' => '$("body").css("background-color", value);'
));

$styling->createOption(array(
    'name' => __('Primary color', 'thim'),
    'id' => 'body_primary_color',
    'type' => 'color-opacity',
    'default' => '#006fb2',
));

$styling->createOption(array(
    'name' => __('Secondary color', 'thim'),
    'id' => 'body_secondary_color',
    'type' => 'color-opacity',
    'default' => '#ddea2e',
));