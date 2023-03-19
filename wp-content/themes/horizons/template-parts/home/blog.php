<?php if (get_field('blog_activation')) { ?>
    <section class="blog section-padding bg-navy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle"><span><?php echo get_field('bs_secondary_title') ?></span></div>
                    <?php list($firstPart, $lastPart) = highlight_the_text(get_field('bs_big_title'), 'first') ?>
                    <div class="section-title"><span><?php echo $firstPart ?></span> <?php echo $lastPart ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 6
                        ));
                        while ($query->have_posts()) {
                            $query->the_post();
                        ?>
                            <div class="item">
                                <div class="position-re o-hidden">
                                    <?php the_post_thumbnail('blogHomeThumb') ?>
                                    <div class="date">
                                        <a href="<?php the_permalink() ?>"><span><?php the_time('M') ?></span> <i><?php the_time('d') ?></i></a>
                                    </div>
                                </div>
                                <div class="con"> <span class="category">
                                        <span class="category"><?php echo get_the_category_list(' ,') ?></span>
                                    </span>
                                    <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
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