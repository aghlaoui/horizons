<?php get_header() ?>
<?php

?>
<?php
while (have_posts()) {
    the_post();
    pageBanner(7, array(
        'small_title' => 'LIRE LE BLOG SUR LES VOYAGES',
    ));
?>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php the_post_thumbnail('PostImage', array('class' => 'mb-30')) ?>
                    <h2><?php the_title() ?></h2>
                    <?php the_content() ?>
                <?php } ?>
                <!-- Comments -->
                <?php comments_template(); ?>
                </div>
                <!-- Sidebar -->
                <?php get_sidebar() ?>
            </div>
        </div>
    </section>
    <?php get_footer() ?>