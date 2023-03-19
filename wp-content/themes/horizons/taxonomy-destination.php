<?php get_header() ?>
<?php
$region = get_queried_object();
$image = get_field('destination_image_banner', $region);

if ($image) {
    $image_url = $image['sizes']['PageBanner'];
} else {
    $image_url = 'https://via.placeholder.com/1650x750';
}
pageBanner(null, array(
    'big_title' => get_queried_object()->name,
    'small_title' => get_queried_object()->description,
    'banner_img' => $image_url


)) ?>
<div class="tours3 section-padding">
    <div class="container">
        <div class="row">
            <!-- Tour list -->
            <div class="col-md-8">
                <?php
                if (!have_posts()) {
                ?>
                    <div class="alert alert-danger" style=" text-align: center;border-radius: 0; color: #000000; background-color: #C2E0E9; border-color: #C2E0E9;" role="alert">
                        <h1 class="alert-heading"><i class="ti-face-sad"></i></h1>
                        <p style="color: #000000;">Désolé, il n'y a pas de voyages disponibles pour le moment. Veuillez vérifier plus tard.<br>
                            <a style="color: #0B3D91;" href="<?php echo site_url('destination') ?>" class="alert-link">Vous pouvez voir tous les les voyages ici.</a>
                        </p>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row">
                        <?php
                        while (have_posts()) {
                            the_post();
                        ?>
                            <div class="col-md-6">
                                <div class="square-flip">
                                    <div class="square bg-img" data-overlay-dark="3" data-background="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'VoyageThumbSecond') ?>">
                                        <?php
                                        $startDate = new DateTime(get_field('departure_time'));
                                        if ($startDate->format('Ymd') < date('Ymd')) {
                                        ?>
                                            <span class="category" style="background: #E91E63!important;font-size: 15px;">expiré</span>
                                        <?php
                                        }
                                        ?>

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
                        <?php } ?>
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