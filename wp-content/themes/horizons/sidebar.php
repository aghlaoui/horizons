<div class="col-md-4">
    <div class="blog2-sidebar row">
        <div class="col-md-12">
            <div class="widget search">
                <form>
                    <input type="text" name="search" placeholder="Type here ...">
                    <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Recent Posts</h6>
                </div>
                <ul class="recent">
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();

                    ?>
                        <li>
                            <div class="thum"> <?php the_post_thumbnail('PostImageThumbSm') ?> </div>
                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                        </li>
                    <?php }
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Categories</h6>
                </div>
                <ul>
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) {
                    ?>
                        <li><a href="<?php echo get_category_link($category) ?>"><i class="ti-angle-right"></i><?php echo $category->name ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
        $tags = get_tags();
        if ($tags) {
        ?>
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-title">
                        <h6>Tags</h6>
                    </div>
                    <ul class="tags">
                        <?php
                        foreach ($tags as $tag) {
                        ?>
                            <li><a href="<?php echo get_tag_link($tag) ?>"><?php echo $tag->name ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</div>