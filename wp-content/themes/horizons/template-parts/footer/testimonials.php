<?php if (get_field('testimonials_activation', 'option')) { ?>
    <section class="testimonials">
        <?php
        if (get_field('testimonials_background_img', 'option')) {
            $background_img_url = get_field('testimonials_background_img', 'option')['sizes']['PageBanner'];
        } else {
            $background_img_url = 'https://placehold.jp/3d4070/ffffff/1650x750.jpg?text=No%20image%20is%20attached%20to%20this%20section';
        }

        ?>
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="<?php echo $background_img_url ?>" data-overlay-dark="5">
            <div class="container">
                <div class="row">
                    <!-- Call Now  -->
                    <?php $leftSection = get_field('left_section', 'option') ?>
                    <div class="col-md-5 mb-30 mt-30">
                        <h5><?php echo $leftSection['big_text'] ?></h5>
                        <div class="phone-call mb-10">
                            <div class="icon color-1"><span class="flaticon-phone-call"></span></div>
                            <div class="text">
                                <p class="color-1">Appeler maintenant</p>
                                <a class="color-1" href="tel:<?php echo get_theme_mod('phone_number') ?>">
                                    <?php echo get_theme_mod('phone_number') ?>
                                </a>
                            </div>
                        </div>
                        <p><i class="ti-check"></i><small><?php echo $leftSection['small_text'] ?></small></p>
                    </div>
                    <!-- Testimonials -->
                    <?php $testimonials_box = get_field('testimoials_box', 'option') ?>
                    <div class="col-md-5 offset-md-2">
                        <div class="testimonials-box">
                            <div class="head-box">
                                <h6><?php echo $testimonials_box['secondary_title'] ?></h6>
                                <h4><?php echo $testimonials_box['big_title'] ?></h4>
                            </div>
                            <div class="owl-carousel owl-theme">
                                <?php
                                $query = new WP_Query(array(
                                    'post_type' => 'testimonial',
                                    'posts_per_page' => 3
                                ));

                                while ($query->have_posts()) {
                                    $query->the_post();

                                ?>
                                    <div class="item">
                                        <p><?php echo get_field('the_testimonial') ?></p>
                                        <div class="info">
                                            <div class="author-img"><?php the_post_thumbnail('testimonialImg') ?> </div>
                                            <div class="cont">
                                                <div class="rating">
                                                    <?php
                                                    $starsCount = intval(get_field('rating'));
                                                    $count = 1;
                                                    while ($count <= $starsCount) {
                                                    ?>
                                                        <i class="star active"></i>
                                                    <?php
                                                        $count++;
                                                    }
                                                    ?>
                                                </div>
                                                <h6><?php echo get_field('full_name') ?></h6> <span><?php echo get_field('testimonial_post') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>