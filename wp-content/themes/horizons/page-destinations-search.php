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
$city = trim(sanitize_text_field($_GET['city_select']));
$date = trim(sanitize_text_field($_GET['travel_date']));
$minPrice =  trim(sanitize_text_field($_GET['min_price']));
$maxPrice = trim(sanitize_text_field($_GET['max_price']));



$the_date = strtotime($date);
$new_date = date('Ymd', $the_date);
$post_type = 'voyage';
if (!empty($city)) {
    if (!empty($date)) {
        if (!empty($minPrice) && !empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        } else if (!empty($minPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        } else if (!empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        } else {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        }
    } else {
        if (!empty($minPrice) && !empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        } else if (!empty($minPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        } else if (!empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        } else {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cities',
                        'terms' => $city,
                        'field' => 'name'
                    )
                )
            ));
        }
    }
} else if (empty($city)) {
    if (!empty($date)) {
        if (!empty($minPrice) && !empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
            ));
        } else if (!empty($minPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
            ));
        } else if (!empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
            ));
        } else {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => $new_date
                    )
                ),
            ));
        }
    } else {
        if (!empty($minPrice) && !empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                ),
            ));
        } else if (!empty($minPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '>=',
                        'value' => $minPrice,
                        'type' => 'NUMERIC'
                    ),
                ),
            ));
        } else if (!empty($maxPrice)) {
            $the_query = new WP_Query(array(
                'post_type' => $post_type,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'original_price',
                        'compare' => '<=',
                        'value' => $maxPrice,
                        'type' => 'NUMERIC'
                    ),
                ),
            ));
        } else {
            $the_query = new WP_Query(array());
        }
    }
} else {
    $the_query = new WP_Query(array());
}

?>
<div class="tours3 section-padding">
    <div class="container">
        <div class="row">
            <!-- Tour list -->
            <div class="col-md-8">
                <?php if (!$the_query->have_posts()) {
                ?>
                    <div class="alert alert-danger" style=" text-align: center;border-radius: 0; color: #000000; background-color: #C2E0E9; border-color: #C2E0E9;" role="alert">
                        <h1 class="alert-heading"><i class="ti-face-sad"></i></h1>
                        <p style="color: #000000;">Votre recherche ne correspond à aucun voyage. <a style="color: #0B3D91;" href="<?php echo get_post_type_archive_link('voyage') ?>" class="alert-link">Vous pouvez voir tous les voyages ici.</a> </p>
                    </div>
                <?php
                } else { ?>
                    <div class="row">
                        <?php while ($the_query->have_posts()) {
                            $the_query->the_post();
                        ?>
                            <div class="col-md-6">
                                <div class="square-flip">
                                    <div class="square bg-img" data-background="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'VoyageThumbSecond') ?>">
                                        <?php
                                        $startDate = new DateTime(get_field('departure_time'));
                                        if ($startDate->format('Ymd') < date('Ymd')) {
                                        ?>
                                            <span class="category" style="background: #E91E63!important;font-size: 15px;">expiré</span>
                                        <?php
                                        } ?>
                                        <div class="square-container d-flex align-items-end justify-content-end">
                                            <div class="box-title">
                                                <h4><?php the_title() ?></h4>
                                                <h6><?php echo (!get_field('discount_price')) ? get_field('original_price') : get_field('discount_price') ?> MAD / par personne</h6>
                                            </div>
                                        </div>
                                        <div class="flip-overlay"></div>
                                    </div>
                                    <div class="square2">
                                        <div class="square-container2">
                                            <h4><?php echo get_field('destination')->name . ', ' . get_field('Region')->name ?></h4>
                                            <h6><?php echo (!get_field('discount_price')) ? get_field('original_price') : get_field('discount_price') ?> MAD / par personne</h6>
                                            <p><?php echo substr(get_the_content(), 0, 120) ?></p>
                                            <div class="row tour-list mb-30">
                                                <div class="col col-md-6">
                                                    <ul>
                                                        <?php

                                                        $returnDate = new DateTime(get_field('return_time'));
                                                        $difference = $startDate->diff($returnDate);
                                                        $days = $difference->format('%a');
                                                        ?>
                                                        <li><i class="ti-time"></i> <?php echo $days ?> Jours</li>
                                                    </ul>

                                                </div>
                                                <div class="col col-md-6">
                                                    <ul>
                                                        <li><i class="ti-location-pin"></i> <?php echo get_field('destination')->name ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="btn-line"><a href="<?php the_permalink() ?>">Détails du voyage</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>
                <?php } ?>
                <!-- Pagination -->
                <?php echo horizonsPagination() ?>
            </div>
            <!-- Tour search -->
            <div class="col-md-4">
                <?php get_template_part('/template-parts/voyage-search-form') ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>