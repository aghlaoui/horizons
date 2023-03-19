<?php
function horizons_styles()
{
    wp_enqueue_style('Styles', get_theme_file_uri('/BUILD/css/styles.css'));
    wp_enqueue_style('fontAwesomeStyle', '//fonts.googleapis.com/css2?family=Barlow:wght@300;400;500&amp;family=Poppins:wght@300;400;500;600;700&amp;display=swap');
}
add_action('wp_enqueue_scripts', 'horizons_styles');
function horizons_scripts()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_theme_file_uri('src/javascript/js/jquery.js'));
    wp_enqueue_script('jquery', false, array(), false, false);

    wp_register_script('jquery_migrate', get_theme_file_uri('src/javascript/js/jquery-migrate-3.0.0.min.js'));
    wp_enqueue_script('jquery_migrate', false, array(), false, true);

    wp_register_script('modernizr', get_theme_file_uri('src/javascript/js/modernizr-2.6.2.min.js'));
    wp_enqueue_script('modernizr', false, array(), false, true);

    wp_register_script('popper', get_theme_file_uri('src/javascript/js/popper.min.js'));
    wp_enqueue_script('popper', false, array(), false, true);

    wp_register_script('bootstrap', get_theme_file_uri('src/javascript/js/bootstrap.min.js'));
    wp_enqueue_script('bootstrap', false, array(), false, true);

    wp_register_script('scripts', get_theme_file_uri('/BUILD/scripts.js'));
    wp_enqueue_script('scripts', false, array(), '1.0', true);

    wp_register_script('testScripts', get_theme_file_uri('/BUILD/main.js'));
    wp_enqueue_script('testScripts', false, array(), '1.0', true);

    wp_localize_script('testScripts', 'horizonsData', array(
        'light_logo' => get_theme_mod('site_logo_light'),
        'dark_logo' => get_theme_mod('site_logo_dark'),
    ));
}
add_action('wp_enqueue_scripts', 'horizons_scripts');

add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');


add_action('wp_enqueue_scripts', 'load_wpcf7_scripts');
function load_wpcf7_scripts()
{
    if (is_page('contact-us') || is_singular()) {
        if (function_exists('wpcf7_enqueue_scripts')) {
            wpcf7_enqueue_scripts();
        }
        if (function_exists('wpcf7_enqueue_styles')) {
            wpcf7_enqueue_styles();
        }
    }
}

// function load_cf7_scripts()
// {
//     if (is_singular() || is_page('about')) {
//         wp_enqueue_script('contact-form-7');
//         wp_enqueue_style('contact-form-7');
//     }
// }
// add_action('wp_enqueue_scripts', 'load_cf7_scripts');
