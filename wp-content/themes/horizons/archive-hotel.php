<?php get_header() ?>
<?php
$banner = get_field('hotel_banner', 'option');
$banner_big_title = !empty($banner['big_title']) ? $banner['big_title'] : 'No Title Defined';
$banner_secondary_title = !empty($banner['secondary_title']) ? $banner['secondary_title'] : 'No Title Defined';
$banner_image = !empty($banner['photo']) ? $banner['photo']['sizes']['PageBanner'] : 'https://placehold.jp/0a457c/ffffff/1650x750.png?text=No%20image%20defined';
pageBanner(null, array(
    'big_title' => sanitize_text_field($banner_big_title),
    'small_title' => sanitize_text_field($banner_secondary_title),
    'banner_img' => esc_url($banner_image)
)) ?>
<div class="tours3 destination1 section-padding">
    <div class="container">
        <div class="row">
            <!-- Tour list -->
            <div class="col-md-8">
                <div class="row">
                    <?php
                    while (have_posts()) {
                        the_post();

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
                <?php horizonsPagination() ?>
            </div>
            <!-- Tour search -->
            <div class="col-md-4">
                <?php get_template_part('/template-parts/hotel-search-form') ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>