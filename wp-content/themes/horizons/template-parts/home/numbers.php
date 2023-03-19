<?php
if (get_field('numbers_activation')) {
?>
    <section class="numbers">
        <div class="section-padding bg-img bg-fixed back-position-center" data-background="<?php echo get_field('background_image')['sizes']['PageBanner'] ?>" data-overlay-dark="6">
            <div class="container">
                <?php if (have_rows('items')) { ?>
                    <div class="row">
                        <?php
                        $count = 0;
                        $fieldsCount = count(get_field('items'));
                        while (have_rows('items')) {
                            the_row();
                            $icon = get_sub_field('icon');
                        ?>
                            <div class="col-md-3">
                                <div class="item text-center">
                                    <?php if ($count < $fieldsCount - 1) { ?>
                                        <img src="<?php echo get_theme_file_uri('src/img/arrow1.png') ?>" <?php echo ($count % 2 == 0) ? 'class="tobotm"' : '' ?> alt="">
                                    <?php } ?>
                                    <span class="icon">
                                        <i class="front flaticon-<?php echo $icon ?>"></i>
                                        <i class="back flaticon-<?php echo $icon ?>"></i>
                                    </span>
                                    <h3 class="count"><?php echo get_sub_field('number') ?></h3>
                                    <h6><?php echo get_sub_field('decs_text') ?></h6>
                                </div>
                            </div>
                        <?php $count++;
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>