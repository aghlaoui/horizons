<?php
if (get_field('tours_activate')) {
?>
    <section class="tours1 section-padding bg-lightnav" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle"><span><?php echo get_field('secondary_title') ?></span></div>
                    <?php
                    list($firstPart, $lastPart) = highlight_the_text(get_field('big_title'), 'last')
                    ?>
                    <div class="section-title"><?php echo $firstPart ?> <span><?php echo $lastPart ?></span></div>
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
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
<?php } ?>