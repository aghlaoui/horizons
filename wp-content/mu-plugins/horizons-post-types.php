<?php
function horizons_post_types()
{
    /******************** Voyage Post Type ******************/
    register_post_type('voyage', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'voyages'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-airplane',
        'labels' => array(
            'name' => 'Voyages',
            'add_new_item' => 'Ajouter un Voyage',
            'edit_item' => 'Modifier Voyage',
            'search_items' => 'Recherchez Voyages',
            'all_items' => 'Tous les Voyages',
            'singular_name' => 'Voyage',
            'new_item' => 'nouveau Voyage',
            'view_item' => 'Voir Voyage',
        ),
    ));

    /******************** Hotels Post Type ******************/
    register_post_type('hotel', array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
        'rewrite' => array('slug' => 'hotels'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-building',
        'labels' => array(
            'name' => 'Hotels',
            'add_new_item' => 'Ajouter un Hotel',
            'edit_item' => 'Modifier Hotel',
            'search_items' => 'Recherchez Hotels',
            'all_items' => 'Tous les Hotels',
            'singular_name' => 'Hotel',
            'new_item' => 'nouveau Hotel',
            'view_item' => 'Voir Hotel',
        ),
    ));

    /******************** Testimonial Post Type ******************/
    register_post_type('testimonial', array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
        'rewrite' => array('slug' => 'testimonials'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-testimonial',
        'labels' => array(
            'name' => 'testimonials',
            'add_new_item' => 'Ajouter un testimonial',
            'edit_item' => 'Modifier testimonial',
            'search_items' => 'Recherchez testimonials',
            'all_items' => 'Tous les testimonials',
            'singular_name' => 'testimonial',
            'new_item' => 'nouveau testimonial',
            'view_item' => 'Voir testimonial',
        ),
    ));
}

add_action('init', 'horizons_post_types', 15);
