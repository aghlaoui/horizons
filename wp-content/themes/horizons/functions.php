<?php

require get_theme_file_path('/inc/stylesAndJs.php');
require get_theme_file_path('/inc/costumizer/costumizer.php');
require get_theme_file_path('/inc/myFunctions.php');
require get_theme_file_path('/inc/gutenberg/gutenberg.php');
require get_theme_file_path('/inc/options.php');





add_action('after_setup_theme', 'horizons_features');

function horizons_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('category-thumbnails');
    add_theme_support('widgets');
    add_theme_support('html5', array('comment-list', 'comment-form',));

    /*          images sizes            */
    add_image_size('siteLogos', 300, 100);
    add_image_size('BlogThumb', 510, 725, true);

    add_image_size('PageBanner', 1650, 750, true);
    add_image_size('PageBanner700w', 768, 750, true);
    add_image_size('PageBanner991w', 991, 750, true);


    add_image_size('PostImage', 730, 510, true);
    add_image_size('PostImageThumbSm', 90, 65, true);
    add_image_size('VoyageThumb', 750, 530, true);
    add_image_size('VoyageThumbSecond', 516, 725, true);
    add_image_size('VoyageThumbRegular', 510, 340, true);
    add_image_size('VoyageSliderImg', 1520, 755, true);
    add_image_size('galleryImage', 475, 680, true);
    add_image_size('aboutUsImage', 465, 580, true);
    add_image_size('guidImage', 510, 627, true);
    add_image_size('blogHomeThumb', 350, 500, true);
    add_image_size('testimonialImg', 65, 65, true);
    add_image_size('clientLogo', 136, 68, true);
}
add_filter('show_admin_bar', '__return_false');


/****************** Adding meta_key to main query  **************/
function custom_tax_archive_order($query)
{
    if (!is_admin() && $query->is_main_query() && is_tax('destination')) {
        $query->set('meta_key', 'departure_time');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'DESC');
    }
}
add_action('pre_get_posts', 'custom_tax_archive_order');


/*********** Remove the ability to get to single for custom post type *********/
add_action('template_redirect', 'disable_custom_post_type_single');

function disable_custom_post_type_single()
{
    if (is_singular('testimonial') || is_404()) {
        wp_redirect(home_url(), 301);
        exit();
    }
}


/*******************         Custom comments labels     *********************/
function custom_comment_form_defaults($defaults)
{
    $defaults['title_reply'] = 'Laisser un commentaire';
    $defaults['comment_notes_before'] = 'tee';
    $defaults['comment_notes_after'] = '';
    $defaults['label_submit'] = 'Envoyer un message';
    return $defaults;
}
add_filter('comment_form_defaults', 'custom_comment_form_defaults');
