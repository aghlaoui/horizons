<?php get_header() ?>

<!-- Slider -->
<?php get_template_part('template-parts/home/slider') ?>
<!-- Tour Search -->
<div class="booking-wrapper">
    <div class="container">
        <div class="tour-inner clearfix form-inline justify-content-center">
            <?php get_template_part('template-parts/home/search-form') ?>
        </div>
    </div>
</div>
<!-- About -->
<?php get_template_part('template-parts/home/about') ?>
<!-- Tours 1 -->
<?php get_template_part('template-parts/home/tours') ?>
<!-- Numbers -->
<?php get_template_part('template-parts/home/numbers') ?>
<!-- hotels -->
<?php get_template_part('template-parts/home/hotels') ?>
<!-- Blog -->
<?php get_template_part('template-parts/home/blog') ?>
<!-- Footer -->
<?php get_footer() ?>