<header class="header slider-fade">
    <div class="owl-carousel owl-theme">
        <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
        <?php
        while (have_rows('sliders')) {
            the_row();
        ?>
            <div class="text-center item" data-overlay-dark="5">
                <picture>
                    <source media="(min-width: 991px)" srcset="<?php echo get_sub_field('image')['sizes']['PageBanner'] ?>" alt="">
                    <source media="(min-width: 768px)" srcset="<?php echo get_sub_field('image')['sizes']['PageBanner991w'] ?>" alt="">
                    <source media="(min-width: 576px)" srcset="<?php echo get_sub_field('image')['sizes']['PageBanner700w'] ?>" alt="">
                    <img class="item bg-img" src="<?php echo get_sub_field('image')['sizes']['PageBanner576w'] ?>" alt="">
                </picture>
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h4><?php echo get_sub_field('second_title') ?></h4>
                                <?php
                                $big_title = get_sub_field('big_title');
                                $wordToHollow = get_sub_field('hollow_word');
                                list($firstPart, $lastPart) = highlight_the_text($big_title, $wordToHollow)
                                ?>
                                <?php if ($wordToHollow == 'last') { ?>
                                    <h1><?php echo $firstPart ?> <span><?php echo $lastPart ?></span></h1>
                                <?php } else {
                                ?>
                                    <h1> <span><?php echo $firstPart ?></span><?php echo $lastPart ?></h1>
                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</header>