<?php
if (!get_field('use_about_data')) {
    $pageID = 9;
    $status = false;
} else {
    $pageID = get_the_ID();
    $status = true;
}
?>
<section class="about cover section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                <div class="section-subtitle"><?php echo get_field('secondary-title') ?></div>
                <?php list($firstPart, $LastPart) = highlight_the_text(get_field('big_title'), 'first') ?>
                <div class="section-title"><span><?php echo $firstPart ?></span> <?php echo $LastPart ?></div>
                <?php echo get_field('agency-description', $pageID) ?>
                <?php if (have_rows('feautures', $pageID)) { ?>
                    <ul class="list-unstyled about-list mb-30">
                        <?php
                        while (have_rows('feautures', $pageID)) {
                            the_row();
                        ?>
                            <li>
                                <div class="about-list-icon"> <span class="ti-check"></span> </div>
                                <div class="about-list-text">
                                    <p><?php echo get_sub_field('list_item') ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="phone-call mb-30">
                    <div class="icon"><span class="flaticon-phone-call"></span></div>
                    <div class="text">
                        <!-- phone number -->
                        <p>Pour plus d'informations</p> <a href="tel:<?php echo get_theme_mod('phone_number') ?>"><?php echo get_theme_mod('phone_number') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1 animate-box" data-animate-effect="fadeInUp">
                <div class="img-exp">
                    <div class="about-img">
                        <div class="img">
                            <?php
                            if (!$status) {
                                $thumbnail_url = get_the_post_thumbnail_url($pageID, 'aboutUsImage');
                            ?>
                                <img src="<?php echo $thumbnail_url ?>" alt="" class="img-fluid">
                                <?php // the_post_thumbnail('aboutUsImage', array('class' => 'img-fluid')) 
                                ?>
                            <?php } else {
                            ?>
                                <img src="<?php echo get_field('image')['sizes']['aboutUsImage'] ?>" alt="" class="img-fluid">
                            <?php
                            } ?>
                        </div>
                        <div id="circle">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                                <defs>
                                    <path id="circlePath" d=" M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 " />
                                </defs>
                                <circle cx="150" cy="100" r="75" fill="none" />
                                <g>
                                    <use xlink:href="#circlePath" fill="none" />
                                    <text fill="#0f2454">
                                        <?php $siteName = get_bloginfo('name') ?>
                                        <textPath xlink:href="#circlePath"><?php echo '. ' . $siteName . ' . ' . $siteName ?></textPath>
                                    </text>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>