<?php get_header() ?>
<?php
$big_title = !empty(get_field('spb_big_title', 'option')) ? get_field('spb_big_title', 'option') : 'No title defined';
$small_title = !empty(get_field('spb_small_title', 'option')) ? get_field('spb_small_title', 'option') : 'No title defined';
$image = !empty(get_field('spb_image', 'option')['sizes']['PageBanner']) ? get_field('spb_image', 'option')['sizes']['PageBanner'] : 'https://placehold.jp/0a457c/ffffff/1650x750.png?text=No%20image%20defined';
pageBanner(null, array(
    'big_title' => $big_title,
    'small_title' => $small_title,
    'banner_img' => $image
)) ?>

?>
<?php
$rating = $_GET['hotel-rate'];
$destination = $_GET['hotel_destination'];

if (!empty($rating) && empty($destination)) {
    $the_query = new WP_Query(array(
        'post_type' => 'hotel',
        'meta_query' => array(
            array(
                'key' => 'hotel_note',
                'value' => $rating,
                'compare' => 'LIKE'
            )
        )
    ));
} else if (empty($rating) && !empty($destination)) {
    $the_query = new WP_Query(array(
        'post_type' => 'hotel',
        'tax_query' => array(
            array(
                'taxonomy' => 'cities',
                'terms' => $destination,
                'field' => 'name'
            )
        )
    ));
} else if (!empty($rating) && !empty($destination)) {
    $the_query = new WP_Query(array(
        'post_type' => 'hotel',
        'tax_query' => array(
            array(
                'taxonomy' => 'cities',
                'terms' => $destination,
                'field' => 'name'
            )
        ),
        'meta_query' => array(
            array(
                'key' => 'hotel_note',
                'value' => $rating,
                'compare' => 'LIKE'
            )
        )
    ));
} else {
    $the_query = new WP_Query(array());
}
?>
<div class="tours3 destination1 section-padding">
    <div class="container">
        <div class="row">

            <!-- Tour list -->
            <div class="col-md-8">
                <?php if (!$the_query->have_posts()) { ?>
                    <div class="alert alert-danger" style=" text-align: center;border-radius: 0;" role="alert">
                        <h1 class="alert-heading"><i class="ti-face-sad"></i></h1>
                        <p>Votre recherche ne correspond à aucun hôtel. <a href="<?php echo get_post_type_archive_link('hotel') ?>" class="alert-link">Vous pouvez voir tous les hôtels ici.</a> </p>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <?php
                        while ($the_query->have_posts()) {
                            $the_query->the_post();

                        ?>
                            <div class="col-md-6">
                                <div class="item">
                                    <div class="position-re o-hidden" data-overlay-dark="2"><?php the_post_thumbnail('VoyageThumbSecond') ?></div>
                                    <div class="con">
                                        <h5><a href="<?php the_permalink() ?>" style="font-size: 20px;"> <?php the_title() ?></a></h5>
                                        <div class="line"></div>
                                        <div class="row facilities">
                                            <div class="col col-md-8">
                                                <p><i class="ti-star"></i> <?php echo get_field('hotel_note') ?> stars</p>
                                            </div>
                                            <div class="col col-md-4 text-right">
                                                <div class="permalink"><a href="<?php the_permalink() ?>">Explorez <i class="ti-arrow-right"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php }
                wp_reset_postdata();
                horizonsPagination() ?>
            </div>
            <!-- Tour search -->
            <div class="col-md-4">
                <?php get_template_part('/template-parts/hotel-search-form', NULL, array('rating' => $rating)) ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>