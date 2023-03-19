<?php get_header() ?>
<?php
while (have_posts()) {
    the_post()

?>
    <!-- Tour Page Slider -->
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            <?php
            $allFieldsGroup = acf_get_fields_by_id(74);
            $fieldsCount = count($allFieldsGroup);
            $count = 1;
            while ($count <= $fieldsCount) {
                $currentItem = 'slider_' . $count;
                if (!empty(get_field($currentItem))) {
            ?>
                    <div class="text-center item bg-img" data-overlay-dark="4" data-background="<?php echo get_field($currentItem)['sizes']['VoyageSliderImg'] ?>"></div>
            <?php
                }
                $count++;
            } ?>
        </div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </header>
    <!-- Tour Content -->
    <section class="tour-page section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-30">
                    <div class="section-subtitle"><?php echo bloginfo() ?></div>
                    <?php
                    list($firstpart, $lastWord)  = highlight_the_text(get_the_title());
                    ?>
                    <div class="section-title mb-0"><?php echo $firstpart ?> <span><?php echo $lastWord ?></span></div>
                    <!-- <div class="rating mb-30"> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i>
                        <div class="reviews-count color-2">(2 Reviews)</div>
                    </div> -->
                    <div class="tour-page head-icon">
                        <?php
                        $startDate = new DateTime(get_field('departure_time'));
                        $returnDate = new DateTime(get_field('return_time'));
                        $difference = $startDate->diff($returnDate);
                        $days = $difference->format('%a');
                        ?>
                        <p><i class="ti-time"></i> <?php echo $days . ' jours et ' . $days - 1 . ' nuits' ?></p>
                        <!-- <p><i class="ti-user"></i> Group: 5 - 10 People</p> -->
                        <p><i class="ti-location-pin"></i> <?php echo get_field('destination')->name ?></p>
                        <!-- <p><i class="ti-face-smile"></i> 9.3 Superb</p> -->
                    </div>
                    <h6>Information</h6>
                    <?php the_content() ?>
                    <!-- tour-page time-table -->
                    <div class="tour-page time-table"> <span>Départ</span>
                        <p><?php echo get_field('departure') ?></p>
                    </div>
                    <div class="tour-page time-table"> <span>Horaire de départ</span>
                        <p><?php echo $startDate->format('d - M') . ' à ' . get_field('departure_hour') ?></p>
                    </div>
                    <div class="tour-page time-table"> <span>Horaire de retour</span>
                        <p><?php echo $returnDate->format('d - M') . ' à ' . get_field('return_hour') ?></p>
                    </div>
                    <div class="tour-page time-table"> <span>Règles d'habillage</span>
                        <p><?php echo get_field('dress_code') ?></p>
                    </div>
                    <div class="tour-page time-table-price"> <span>Le prix inclut</span>
                        <ul class="tour-page time-table-price-include">
                            <?php
                            $textArea = get_field('price_includes');
                            $icon = 'ti-check';
                            echo wrap_textField($textArea, $icon);
                            ?>
                        </ul>
                    </div>
                    <div class="tour-page time-table-price"> <span>Le prix n'inclut pas</span>
                        <ul class="tour-page time-table-price-exclude">
                            <?php
                            $textArea = get_field('price_excludes');
                            $icon = 'ti-close';
                            echo wrap_textField($textArea, $icon);
                            ?>
                        </ul>
                    </div>
                    <br>
                    <br>
                    <?php get_template_part('/template-parts/additional-details') ?>
                </div>
                <!-- sidebar -->
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="right-sidebar">
                            <div class="right-sidebar item">
                                <h3>
                                    <span class="right-sidebar item__from"><?php echo (get_field('discount_price')) ? 'De' : '' ?></span>
                                    <span class="right-sidebar item__sale"><?php echo (get_field('discount_price')) ? get_field('original_price') . 'MAD' : '' ?></span>
                                    <span><?php echo (get_field('discount_price')) ? 'à' : 'seulement à' ?></span>
                                    <?php echo (get_field('discount_price')) ? get_field('discount_price') : get_field('original_price') ?>MAD
                                </h3>
                                <?php echo do_shortcode('[contact-form-7 id="118" title="Contact form 1" html_class="right-sidebar item-form"]') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer() ?>