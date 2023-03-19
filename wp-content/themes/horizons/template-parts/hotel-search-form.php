<div class="sidebar">
    <div class="right-sidebar">
        <div class="right-sidebar item">
            <h3><span class="right-sidebar">Recherche les hôtels</span></h3>
            <form method="GET" class="right-sidebar item-form" action="<?php echo esc_url(home_url('/hotel-search')) ?>">
                <div class="row">
                    <div class="col-md-12 form-group select1_inner">
                        <select class="select2 select" name="hotel-rate">
                            <?php
                            $rating = $_GET['hotel-rate'];
                            $destination = $_GET['hotel_destination'];
                            $postsIDS = get_posts(array(
                                'post_type' => 'hotel',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'fields' => 'ids'
                            ));
                            $field = get_field_object('hotel_note', $postsIDS[0]);
                            $options = $field['choices'];
                            ?>
                            <option value="0" style="display:none;" selected>Hotel note</option>
                            <?php foreach ($options as $option) { ?>
                                <option value="<?php echo $option ?>" <?php echo ($rating == $option) ? 'selected' : '' ?>><?php echo $option ?> étoiles</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group select1_inner">
                        <select class="select2 select" name="hotel_destination">
                            <option value="0" style="display:none;" selected>Destinations</option>

                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'cities',
                                'hide_empty' => false,
                            ));
                            foreach ($terms as $term) {
                            ?>
                                <option value="<?php echo $term->name ?>" <?php echo ($destination == $term->name) ? 'selected' : '' ?>><?php echo $term->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Rechercher" class="butn-dark" style="cursor: pointer;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>