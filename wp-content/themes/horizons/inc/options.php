<?php
add_action('acf/init', 'acf_options_creating');

function acf_options_creating()
{
    if (function_exists('acf_add_options_page')) {

        acf_add_options_sub_page(array(
            'page_title'     => 'Testimonials Parametres',
            'menu_title'    => 'paramètres',
            'parent_slug'    => 'edit.php?post_type=testimonial',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Search page',
            'menu_title'    => 'Search Settings',
            'parent_slug'    => 'options-general.php',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Voyage Page Settings',
            'menu_title'    => 'Page paramètres',
            'parent_slug'    => 'edit.php?post_type=voyage',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Hotels Page Settings',
            'menu_title'    => 'Hotels paramètres',
            'parent_slug'    => 'edit.php?post_type=hotel',
        ));
    }
}
