<?php get_header() ?>
<?php
if (is_author()) {
    $author = get_queried_object_id();
    $title = 'Posts posted by: ' . get_the_author();
    $image = get_field('user_archive_banner', 'user_' . $author);
} else {
    $category = get_queried_object();
    $image = get_field('archive_banner_img', $category);
    $title = single_cat_title('', false);
}

if ($image) {
    $image_url = $image['sizes']['PageBanner'];
} else {
    $image_url = 'https://via.placeholder.com/1650x750';
}

pageBanner(null, array(
    'big_title' => $title,
    'banner_img' => $image_url,

)) ?>
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