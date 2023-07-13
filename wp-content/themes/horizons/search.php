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

<?php
$cherche = isset($_GET['s']) ? trim($_GET['s']) : '';
$destination = isset($_GET['sd']) ? trim($_GET['sd']) : '';
$date = isset($_GET['dur']) ? trim($_GET['dur']) : '';


$the_date = strtotime($date);
$new_date = date('Ymd', $the_date);

$searchType = ($cherche != 'both') ? $cherche : array('voyage', 'hotel');
$destinationSearch = (!empty($destination)) ? array(array('taxonomy' => 'cities', 'terms' => $destination, 'field' => 'name')) : '';
$dateSearch = (!empty($new_date)) ? array(array('key' => 'departure_time', 'compare' => '>=', 'value' => $new_date, 'type' => 'NUMERIC')) : '';


$query = new WP_Query(
    array(
        'post_type' => $searchType,
        'posts_per_page' => -1,
        'meta_query' => $dateSearch,
        'tax_query' => $destinationSearch,
    )
);

?>
<section class="destination1 section-padding bg-lightnav">
    <div class="container">
        <div class="row">
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    get_template_part('/template-parts/search/search', get_post_type());
                }
            } else {
            ?>
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="alert alert-danger w-100" style=" text-align: center;border-radius: 0;" role="alert">
                        <h1 class="alert-heading"><i class="ti-face-sad"></i></h1>
                        <p>Votre recherche ne correspond à aucun term. Essayez de chercher autre chose. </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="tour-inner clearfix form-inline justify-content-center">
                    <?php get_template_part('template-parts/home/search-form', null, array(
                        'cherche' => $cherche,
                        'destination' => $destination,
                        'duration' => $date
                    )) ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>