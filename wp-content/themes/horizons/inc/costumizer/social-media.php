<?php
//section
$wp_customize->add_section('social_media_links', array(
    'title'         => __('Liens de médias sociaux', 'horizons'),
    'priority'      => 200
));
//settings
$wp_customize->add_setting('facebook_url', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('twitter_url', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('youtube_url', array(
    'default' => '',
    'type'    => 'theme_mod'
));

$wp_customize->add_setting('instagram_url', array(
    'default' => '',
    'type'    => 'theme_mod'
));
//controls

$wp_customize->add_control('facebook_url', array(
    'label' => __('Facebook', 'horizons'),
    'section' => 'social_media_links',
    'input_attrs' => array(
        'placeholder' => 'https://www.facebook.com/xyz',
    ),
));
$wp_customize->add_control('twitter_url', array(
    'label' => __('Twitter', 'logistics'),
    'section' => 'social_media_links',
    'input_attrs' => array(
        'placeholder' => 'https://twitter.com/FabrizioRomano',
    ),
));
$wp_customize->add_control('instagram_url', array(
    'label' => __('Instagram', 'logistics'),
    'section' => 'social_media_links',
    'input_attrs' => array(
        'placeholder' => 'https://www.instagram.com/example-Here',
    ),
));
$wp_customize->add_control('youtube_url', array(
    'label' => __('Youtube', 'logistics'),
    'section' => 'social_media_links',
    'input_attrs' => array(
        'placeholder' => 'https://www.youtube.com/@your-tag',
    ),
));
