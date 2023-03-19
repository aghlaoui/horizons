<?php get_header() ?>

<?php
$page_id = get_option('page_for_posts');
pageBanner($page_id);
?>
<!-- Blog -->
<section class="blog section-padding bg-lightnav">
    <div class="container">
        <div class="row">
            <?php while (have_posts()) {
                the_post();
            ?>
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <div class="position-re o-hidden"><?php the_post_thumbnail('BlogThumb') ?>
                            <div class="date">
                                <a href="<?php the_permalink() ?>"><span><?php the_time('M') ?></span> <i><?php the_time('d') ?></i></a>
                            </div>
                        </div>
                        <div class="con">
                            <span class="category"><?php echo get_the_category_list(' ,') ?></span>
                            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo horizonsPagination() ?>
    </div>
</section>
<?php get_footer() ?>