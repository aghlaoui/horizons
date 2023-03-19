<?php get_header() ?>
<?php pageBanner(get_the_ID()) ?>
<?php
// Get all terms for your custom taxonomy
$terms = get_terms(array(
    'taxonomy' => 'destination',
    'hide_empty' => false,
    'number' => 6
));


?>
<section class="destination1 section-padding">
    <div class="container">
        <div class="row">
            <?php
            foreach ($terms as $term) {
                $image_id = get_field('destinations_thumb', $term);
                if ($image_id) {
                    $image_url = $image_id['sizes']['VoyageThumbSecond'];
                } else {
                    $image_url = 'https://via.placeholder.com/516x725';
                }

            ?>
                <div class="col-md-4">
                    <div class="item">
                        <div class="position-re o-hidden" data-overlay-dark="2">
                            <img src="<?php echo $image_url ?>" alt="">
                        </div>
                        <div class="con">
                            <h5><a href="<?php echo get_term_link($term) ?>"><i class="ti-location-pin"></i> <?php echo $term->name ?></a></h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-8">
                                    <p><?php echo $term->count ?>+ Voyages organisés</p>
                                </div>
                                <div class="col col-md-4 text-right">
                                    <div class="permalink"><a href="<?php echo get_term_link($term) ?>">explorer <i class="ti-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer() ?>