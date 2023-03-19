<!-- FAQ's -->
<?php if (have_rows('voyage_details')) { ?>
    <h6><?php echo get_field('details_title') ?></h6>
    <ul class="accordion-box clearfix">
        <?php
        while (have_rows('voyage_details')) {
            the_row();

        ?>
            <li class="accordion block">
                <div class="acc-btn"><?php echo get_sub_field('title') ?></div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text"><?php echo get_sub_field('desctiption') ?></div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
<br>
<br>
<!-- Gallery -->
<?php
$images = get_field('images_gallery');
if ($images) {
?>
    <h6 class="mb-0"><?php echo get_field('gallery_title') ?></h6>
    <div class="row">
        <?php
        foreach ($images as $image) {
        ?>
            <div class="col-md-4 gallery-item">
                <a href="<?php echo $image['url'] ?>" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="<?php echo $image['sizes']['galleryImage'] ?>" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>