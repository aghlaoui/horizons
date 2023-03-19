<?php get_header() ?>
<?php pageBanner(null) ?>
<!-- About -->
<section class="about cover section-padding">
    <div class="container">
        <div class="hex-bg"></div>
        <div class="row">
            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                <?php echo get_field('agency-description') ?>
                <?php if (have_rows('feautures')) { ?>
                    <ul class="list-unstyled about-list mb-30">
                        <?php
                        while (have_rows('feautures')) {
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
                            <?php the_post_thumbnail('aboutUsImage', array('class' => 'img-fluid')) ?>
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
<!-- Team -->
<section class="team section-padding bg-navy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"><?php echo get_field('second_title') ?></div>
                <?php list($firstPart, $lastWord) = highlight_the_text(get_field('big_title')) ?>
                <div class="section-title"><?php echo $firstPart ?><span><?php echo $lastWord ?></span></div>
            </div>
        </div>
        <?php if (have_rows('guides')) { ?>
            <div class="row">
                <?php
                while (have_rows('guides')) {
                    the_row();
                ?>
                    <div class="col-md-4">
                        <div class="team-card mb-30">
                            <div class="team-img"><img src="<?php echo get_sub_field('guide_img')['sizes']['guidImage'] ?>" alt="" class="w-100"></div>
                            <div class="team-content">
                                <h3 class="team-title"><?php echo get_sub_field('name') ?><span><?php echo get_sub_field('job_title') ?></span></h3>
                                <p class="team-text"><?php echo get_sub_field('guide_desc') ?></p>
                                <?php if (have_rows('social_media')) { ?>
                                    <div class="social">
                                        <div class="full-width">
                                            <?php
                                            while (have_rows('social_media')) {
                                                the_row();
                                            ?>
                                                <a href="<?php echo esc_url(get_sub_field('link')) ?>"><i class="ti-<?php echo strtolower(sanitize_text_field(get_sub_field('plateforme'))) ?>"></i></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="title-box">
                                <h3 class="mb-0"><?php echo get_sub_field('name') ?><span><?php echo get_sub_field('job_title') ?></span></h3>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
<?php get_footer() ?>