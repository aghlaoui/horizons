<?php get_header() ?>
<?php while (have_posts()) {
    the_post();
?>
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            <?php
            $slider_field = acf_get_fields_by_id(74);
            $field_items_count = count($slider_field);
            $count = 1;
            while ($count <= $field_items_count) {
                $current_item = 'slider_' . $count;
                if (!empty(get_field($current_item))) {
            ?>
                    <div class="text-center item bg-img" data-overlay-dark="2" data-background="<?php echo get_field($current_item)['sizes']['VoyageSliderImg'] ?>"></div>
            <?php

                }
                $count++;
            }
            ?>
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
                    list($firstPart, $lastWord) =  highlight_the_text(get_the_title())
                    ?>
                    <div class="section-title mb-0"><?php echo $firstPart ?> <span><?php echo $lastWord ?></span></div>
                    <div class="rating mb-30">
                        <!-- <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"></i> <i class="star active"> -->
                        <?php
                        $note = get_field('hotel_note');
                        $count = 1;
                        while ($count <= $note) {
                        ?>
                            <i class="star active"></i>
                        <?php
                            $count++;
                        }
                        ?>
                    </div>
                    <div class="tour-page head-icon">
                        <p><i class="ti-location-pin"></i> <?php echo get_field('h_destination')->name ?></p>
                        <p><i class="ti-money"></i><?php echo get_field('hotel_price') ?> MAD / personne</p>
                    </div>
                    <!-- tour-page time-table -->
                    <?php if (get_field('rooms_type')) { ?>
                        <div class="tour-page time-table"> <span>Type de chambres</span>
                            <p><?php echo get_field('rooms_type') ?></p>
                        </div>
                    <?php } ?>

                    <?php if (get_field('room_view')) { ?>
                        <div class="tour-page time-table"> <span>Vue des chambres</span>
                            <p><?php echo get_field('room_view') ?></p>
                        </div>
                    <?php } ?>

                    <?php if (get_field('pet_policies')) { ?>
                        <div class="tour-page time-table"> <span>Politique relative aux animaux de compagnie</span>
                            <p><?php echo get_field('pet_policies') ?></p>
                        </div>
                    <?php } ?>

                    <?php if (get_field('method_payment')) { ?>
                        <div class="tour-page time-table"> <span>Mode de paiement</span>
                            <p><?php echo get_field('method_payment') ?></p>
                        </div>
                    <?php } ?>

                    <?php if (get_field('hotel_equipement')) { ?>
                        <div class="tour-page time-table-price"> <span>Equipments</span>
                            <ul class="tour-page time-table-price-include">
                                <?php
                                $equipmentList = get_field('hotel_equipement');
                                $icon = 'ti-check';
                                echo wrap_textField($equipmentList, $icon);
                                ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php if (get_field('rooms_equipment')) { ?>
                        <div class="tour-page time-table-price"> <span>Equipement des chambres</span>
                            <ul class="tour-page time-table-price-include">
                                <?php
                                $roomEquipment = get_field('rooms_equipment');
                                $icon = 'ti-check';
                                echo wrap_textField($roomEquipment, $icon);
                                ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <br>
                    <br>
                    <?php get_template_part('/template-parts/additional-details') ?>


                </div>
                <!-- sidebar -->
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="right-sidebar">
                            <div class="right-sidebar item">
                                <h3><span class="right-sidebar item__from">a partir de </span> <?php echo get_field('hotel_price') ?> MAD</h3>
                                <?php echo do_shortcode('[contact-form-7 id="118" title="Hotel Reservation form" html_class="right-sidebar item-form"]') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer() ?>