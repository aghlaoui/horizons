<?php get_header() ?>
<?php
pageBanner(null);
?>
<!-- Contact -->
<section class="contact section-padding">
    <div class="container">
        <div class="row mb-90">
            <div class="col-md-6 mb-60">
                <h3><?php echo get_field('desc_title') ?></h3>
                <p><?php echo get_field('description') ?></p>
                <div class="phone-call mb-30">
                    <div class="icon"><span class="flaticon-phone-call"></span></div>
                    <div class="text">
                        <p>N° de téléphone</p> <a href="tel:<?php echo sanitize_text_field(get_theme_mod('phone_number'))  ?>"><?php echo sanitize_text_field(get_theme_mod('phone_number')) ?></a>
                    </div>
                </div>
                <div class="phone-call mb-30">
                    <div class="icon"><span class="flaticon-message"></span></div>
                    <div class="text">
                        <p>Adresse e-mail</p> <a href="mailto:<?php echo sanitize_text_field(get_theme_mod('email_adress')) ?>"><?php echo sanitize_text_field(get_theme_mod('email_adress')) ?></a>
                    </div>
                </div>
                <div class="phone-call">
                    <div class="icon"><span class="flaticon-placeholder"></span></div>
                    <div class="text">
                        <p>Localisation</p>
                        <?php echo sanitize_text_field(get_theme_mod('office_adress')) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-30 offset-md-1">
                <div class="sidebar">
                    <div class="right-sidebar">
                        <div class="right-sidebar item">
                            <h2>Prenez contact avec nous</h2>
                            <div class="right-sidebar item-form contact__form">
                                <!-- form message -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                                    </div>
                                </div>
                                <!-- form elements -->
                                <?php echo do_shortcode('[contact-form-7 id="222" title="Contact us form"]') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Map Section -->
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                <iframe src="<?php echo esc_url(get_field('map_link')) ?>" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>