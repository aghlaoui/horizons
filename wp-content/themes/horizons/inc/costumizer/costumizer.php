<?php
add_action('customize_register', 'logistics_customize_rigister');
function logistics_customize_rigister($wp_customize)
{
    /**************************          Logo section        **********************************/
    require get_theme_file_path('inc/costumizer/logo.php', array('wp_customize' => $wp_customize));
    /**************************      social media section        ******************************/
    require get_theme_file_path('inc/costumizer/social-media.php', array('wp_customize' => $wp_customize));
    /**************************           contact details         ******************************/
    require get_theme_file_path('inc/costumizer/contact-details.php', array('wp_customize' => $wp_customize));
}
