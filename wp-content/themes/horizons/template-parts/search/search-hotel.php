<div class="col-md-4">
    <div class="item">
        <span class="category" style="background: #0f2454!important;font-size: 15px;">HOTEL</span>
        <div class="position-re o-hidden"><?php the_post_thumbnail('VoyageThumbSecond') ?></div>
        <div class="con">
            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
            <div class="line"></div>
            <div class="row facilities">
                <div class="col col-md-8">
                    <p><i class="ti-star"></i> <?php echo get_field('hotel_note') ?> stars</p>
                </div>
                <div class="col col-md-4 text-right">
                    <div class="permalink"><a href="<?php the_permalink() ?>">Explore <i class="ti-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>