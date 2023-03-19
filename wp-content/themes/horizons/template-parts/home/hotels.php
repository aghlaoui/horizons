<?php if (get_field('hotels_activation')) { ?>
    <section class="destination1 section-padding bg-lightnav">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle"><?php echo get_field('hs_secondary-title') ?></div>
                    <?php
                    list($firstPart, $lastPart) = highlight_the_text(get_field('hs_big_title'), 'first');
                    ?>
                    <div class="section-title"><span><?php echo $firstPart ?></span> <?php echo $lastPart ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $query = new WP_Query(array(
                            'post_type' => 'hotel',
                            'post_per_page' => 6,

                        ));

                        while ($query->have_posts()) {
                            $query->the_post();
                        ?>
                            <div class="item">
                                <div class="position-re o-hidden"><?php the_post_thumbnail('VoyageThumbSecond') ?></div>
                                <div class="con">
                                    <h5><a href="<?php the_permalink() ?>"><i class="ti-location-pin"></i> <?php the_title() ?></a></h5>
                                    <div class="line"></div>
                                    <div class="row facilities">
                                        <div class="col col-md-8">
                                            <p><i class="ti-star"></i> <?php echo get_field('hotel_note') ?> stars</p>
                                        </div>
                                        <div class="col col-md-4 text-right">
                                            <div class="permalink"><a href="<?php the_permalink() ?>">Explore <i class="ti-arrow-right"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>