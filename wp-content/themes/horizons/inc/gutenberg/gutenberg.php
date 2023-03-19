<?php

/*                  Gutenberg editor remover from a post stype              */

add_filter('use_block_editor_for_post_type', 'disable_gutenberg_editor', 10, 2);
function disable_gutenberg_editor($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'hotel' || $post_type === 'voyage') return false;
    return $current_status;
}

/*                  Gutenberg editor remover from a post type page              */
function disable_gutenberg_for_page($is_enabled, $post_type)
{
    if ($post_type === 'page') {
        $about_us_page_id = 9;
        $home_page_id = 5;
        $contact_page_id = 216;
        if (get_the_ID() === $about_us_page_id || get_the_ID() === $home_page_id || get_the_ID() == $contact_page_id) {
            $is_enabled = false;
        }
    }
    return $is_enabled;
}

add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_page', 10, 2);

/*                  Full editor remover from a page                  */

function remove_editor_from_specific_page()
{
    global $pagenow;
    $about_us_page_id = 9;
    $home_page_id = 5;
    $contact_page_id = 216;
    if (!('post.php' == $pagenow && isset($_GET['post']) && ($about_us_page_id == $_GET['post'] || $home_page_id == $_GET['post'] || $contact_page_id == $_GET['post'])))
        return;
    remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor_from_specific_page');
