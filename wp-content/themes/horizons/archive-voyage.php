<?php get_header() ?>
<?php
$banner = get_field('voyage_banner', 'option');
$banner_big_title = !empty($banner['big_title']) ? $banner['big_title'] : 'No Title Defined';
$banner_secondary_title = !empty($banner['secondary_title']) ? $banner['secondary_title'] : 'No Title Defined';
$banner_image = !empty($banner['photo']) ? $banner['photo']['sizes']['PageBanner'] : 'https://placehold.jp/0a457c/ffffff/1650x750.png?text=No%20image%20defined';
pageBanner(null, array(
    'big_title' => sanitize_text_field($banner_big_title),
    'small_title' => sanitize_text_field($banner_secondary_title),
    'banner_img' => esc_url($banner_image)
));

?>
<section class="tours1 section-padding bg-lightnav" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $section = get_field('voyages_section', 'option');
                $section_big_title = !empty($section['big_title']) ? $section['big_title'] : 'No Title Defined';
                $secion_secondary_title = !empty($section['secondary_title']) ? $section['secondary_title'] : 'No Title Defined';
                list($firstPart, $lastPart) = highlight_the_text($section_big_title);
                ?>
                <div class="section-subtitle"><span><?php echo sanitize_text_field($secion_secondary_title) ?></span></div>
                <div class="section-title"><?php echo sanitize_text_field($firstPart) ?> <span><?php echo sanitize_text_field($lastPart) ?></span></div>
            </div>
        </div>
        <div class="row">
            <?php
            $voyages = new WP_Query(array(
                'post_type' => 'voyage',
                'posts_per_page' => 5,
                'meta_key' => 'departure_time',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'departure_time',
                        'compare' => '>',
                        'value' => date('Ymd')
                    )
                )
            ));
            $count = 1;
            while ($voyages->have_posts()) {
                $voyages->the_post();
                $imgstyle = '';
                $class = 'col-md-4';
                if ($count == 1) {
                    $class = 'col-md-8';
                    $imgSize = 'VoyageThumb';
                } else if ($count == 2) {
                    $imgSize = 'VoyageThumbSecond';
                    $imgstyle = 'height: 514px;';
                } else {
                    $imgSize = 'VoyageThumbRegular';
                }
            ?>
                <div class="<?php echo $class ?>">
                    <div class="item">
                        <div class="position-re o-hidden">
                            <?php the_post_thumbnail($imgSize, array('style' => $imgstyle)) ?>
                        </div>
                        <span class="category">
                            <a href="#0"><?php echo (!get_field('discount_price')) ? get_field('original_price') : get_field('discount_price') ?> MAD</a>
                        </span>
                        <div class="con">
                            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12">
                                    <ul>
                                        <?php
                                        $startDate = new DateTime(get_field('departure_time'));
                                        $returnDate = new DateTime(get_field('return_time'));
                                        $difference = $startDate->diff($returnDate);
                                        $days = $difference->format('%a');
                                        ?>
                                        <li><i class="ti-time"></i> <?php echo $days ?> Days</li>
                                        <li><i class="ti-location-pin"></i> <?php echo get_field('destination')->name ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $count++;
            }
            ?>
        </div>
    </div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button class="butn-dark"><a href="<?php echo site_url('destination') ?>"><span>Voir tous les voyages</span></a></button>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>