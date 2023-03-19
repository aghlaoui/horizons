<?php
// logos section

$wp_customize->add_section('site_logos', array(
    'title'         => __('Site Logos & description', 'horizons'),
    'description'   => __('Upload the site logos (light and dark)', 'horizons'),
    'priority'      => 200
));

$wp_customize->add_setting('site_logo_light', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('site_logo_dark', array(
    'default' => '',
    'type'    => 'theme_mod'
));
$wp_customize->add_setting('site_description', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_logo_light', array(
    'label' => __('Light logo', 'horizon'),
    'section' => 'site_logos',
    'settings' => 'site_logo_light',
    'size' => 'siteLogos'
)));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_logo_dark', array(
    'label' => __('Dark logo', 'horizon'),
    'section' => 'site_logos',
    'settings' => 'site_logo_dark',
    'size' => 'siteLogos'
)));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'site_description', array(
    'label' => __('Site description', 'horizon'),
    'section' => 'site_logos',
    'settings' => 'site_description',
    'type' => 'textarea'
)));
