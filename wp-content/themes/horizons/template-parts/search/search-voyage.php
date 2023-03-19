<?php
$date_str = get_field('departure_time');
$date = DateTime::createFromFormat('Ymd', $date_str);
$formatted_date = $date->format('d/m/Y');

if ($date < new DateTime()) {
    $status = 'EXP';
}
?>
<div class="col-md-4">
    <div class="item">
        <span class="category" style="background: #2095ae!important;font-size: 15px;">VOYAGE<?php echo (isset($status)) ? '(' . $status . ')' : '' ?></span>
        <div class="position-re o-hidden"><?php the_post_thumbnail('VoyageThumbSecond') ?></div>
        <div class="con">
            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
            <div class="line"></div>
            <div class="row facilities">
                <div class="col col-md-8">
                    <p><?php echo $formatted_date ?></p>
                </div>
                <div class="col col-md-4 text-right">
                    <div class="permalink"><a href="<?php the_permalink() ?>">Explore <i class="ti-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>