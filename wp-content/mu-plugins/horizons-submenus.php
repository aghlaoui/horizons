<?php
//admin_menu callback function
add_action('admin_menu', 'add_tutorial_cpt_submenu_example');
function add_tutorial_cpt_submenu_example()
{

    $voyageSubmenu =  add_submenu_page(
        'edit.php?post_type=voyage', //$parent_slug
        'Page des paramètres de voyage',  //$page_title
        'Paramètres',        //$menu_title
        'manage_options',           //$capability
        'Voyage_settings_page', //$menu_slug
        'Voyage_settings_form' //$function
    );

    $hotelSubmenu =  add_submenu_page(
        'edit.php?post_type=hotel', //$parent_slug
        'Page des paramètres de hotel',  //$page_title
        'Paramètres',        //$menu_title
        'manage_options',           //$capability
        'hotel_settings_page', //$menu_slug
        'hotel_settings_form' //$function
    );
    add_action("load-{$voyageSubmenu}", 'submenuScripts_custom');
    add_action("load-{$hotelSubmenu}", 'submenuScripts_custom');
}
/**************** Voyage submenu details **********************/

function my_enqueue_media()
{
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'my_enqueue_media');


function submenuScripts_custom()
{
    wp_enqueue_script('the_voyage_submenu_scripts', get_theme_file_uri('/js/image-uploader.js'), array('jquery'), '1.0');
}
//add_submenu_page callback function
function handleform()
{
    if (wp_verify_nonce($_POST['theNonce'], 'saveVoyageSettings') && current_user_can('manage_options')) {
        $voyage_pbs_big_title = sanitize_text_field($_POST['voyage_pbs_big_title']);
        $voyage_pbs_small_title = sanitize_text_field($_POST['voyage_pbs_small_title']);
        $voyage_pbs_image_id = sanitize_text_field($_POST['voyage_pbs_image_id']);

        $voyage_pbs_image = wp_get_attachment_image_src($voyage_pbs_image_id, 'PageBanner')[0];

        update_option('voyage_pbs_big_title', $voyage_pbs_big_title);
        update_option('voyage_pbs_small_title', $voyage_pbs_small_title);
        update_option('voyage_pbs_image', $voyage_pbs_image);
        update_option('voyage_pbs_image_id', $voyage_pbs_image_id);
?>
        <div class="updated">
            <p>Les paramètres ont été enregistrés avec succès</p>
        </div>
    <?php
    } else {
    ?>
        <div class="error">
            <p>Désolé, vous n'avez pas la permission d'effectuer cette action.</p>
        </div>
    <?php
    }
}
function Voyage_settings_form()
{ ?>
    <div class="wrap">
        <h1>Paramètres de la page Voyages</h1>
        <?php if (isset($_POST['justsubmitted']) == "true") handleform() ?>
        <?php acf_form(); ?>
        <form method="POST">
            <input type="hidden" name="justsubmitted" value="true">
            <?php wp_nonce_field('saveVoyageSettings', 'theNonce') ?>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="voyage_pbs_big_title">Titre principal</label>
                        </th>
                        <td>
                            <input value="<?php echo get_option('voyage_pbs_big_title') ?>" type="text" name="voyage_pbs_big_title" id="voyage_pbs_big_title" class="regular-text" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="voyage_pbs_small_title">Titre secondaire</label>
                        </th>
                        <td>
                            <input value="<?php echo get_option('voyage_pbs_small_title') ?>" type="text" name="voyage_pbs_small_title" id="voyage_pbs_small_title" class="regular-text" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="voyage_pbs_image">Photo</label>
                        </th>
                        <td>
                            <input type="hidden" name="voyage_pbs_image" id="voyage_pbs_image" class="regular-text" value="<?php echo get_option('voyage_pbs_image'); ?>">
                            <input type="hidden" name="voyage_pbs_image_id" id="voyage_pbs_image_id" value="<?php echo get_option('voyage_pbs_image_id') ?>">
                            <button type="button" class="button button-secondary" id="voyage_pbs_image_button">Select Image</button>
                            <?php if (get_option('voyage_pbs_image')) {
                            ?>
                                <br><br> <img id="voyage_pbs_image_preview" src="<?php echo get_option('voyage_pbs_image') ?>" style="max-height: 190px;">
                            <?php
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Sauvegarder">
            </p>
        </form>
    </div>
    <?php

}


/**************** hotel submenu details **********************/

function handleHotelForm()
{
    if (wp_verify_nonce($_POST['theNonce'], 'saveHotelettings') && current_user_can('manage_options')) {
        $hotel_pbs_big_title = sanitize_text_field($_POST['hotel_pbs_big_title']);
        $hotel_pbs_small_title = sanitize_text_field($_POST['hotel_pbs_small_title']);
        $hotel_pbs_image_id = sanitize_text_field($_POST['hotel_pbs_image_id']);

        $hotel_pbs_image = wp_get_attachment_image_src($hotel_pbs_image_id, 'PageBanner')[0];

        update_option('hotel_pbs_big_title', $hotel_pbs_big_title);
        update_option('hotel_pbs_small_title', $hotel_pbs_small_title);
        update_option('hotel_pbs_image', $hotel_pbs_image);
        update_option('hotel_pbs_image_id', $hotel_pbs_image_id);
    ?>
        <div class="updated">
            <p>Les paramètres ont été enregistrés avec succès</p>
        </div>
    <?php
    } else {
    ?>
        <div class="error">
            <p>Désolé, vous n'avez pas la permission d'effectuer cette action.</p>
        </div>
    <?php
    }
}

function hotel_settings_form()
{
    ?>
    <div class="wrap">
        <h1>Paramètres de la page des hôtels</h1>
        <?php if (isset($_POST['justsubmitted']) == "true") handleHotelForm() ?>
        <form method="POST">
            <input type="hidden" name="justsubmitted" value="true">
            <?php wp_nonce_field('saveHotelettings', 'theNonce') ?>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="hotel_pbs_big_title">Titre principal</label>
                        </th>
                        <td>
                            <input value="<?php echo get_option('hotel_pbs_big_title') ?>" type="text" name="hotel_pbs_big_title" id="hotel_pbs_big_title" class="regular-text" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="hotel_pbs_small_title">Titre secondaire</label>
                        </th>
                        <td>
                            <input value="<?php echo get_option('hotel_pbs_small_title') ?>" type="text" name="hotel_pbs_small_title" id="hotel_pbs_small_title" class="regular-text" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="hotel_pbs_image">Photo</label>
                        </th>
                        <td>
                            <input type="hidden" name="hotel_pbs_image" id="hotel_pbs_image" class="regular-text" value="<?php echo get_option('hotel_pbs_image'); ?>">
                            <input type="hidden" name="hotel_pbs_image_id" id="hotel_pbs_image_id" value="<?php echo get_option('hotel_pbs_image_id') ?>">
                            <button type="button" class="button button-secondary" id="hotel_pbs_image_button">Select Image</button>
                            <?php if (get_option('hotel_pbs_image')) {
                            ?>
                                <br><br> <img id="hotel_pbs_image_preview" src="<?php echo get_option('hotel_pbs_image') ?>" style="max-height: 190px;">
                            <?php
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Sauvegarder">
            </p>
        </form>
    </div>
<?php
}
