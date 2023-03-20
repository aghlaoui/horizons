<!-- Testimonials -->
<?php get_template_part('template-parts/footer/testimonials') ?>
<!-- Clients -->
<?php get_template_part('template-parts/footer/clients') ?>
<!-- Footer -->
<footer class="footer clearfix">
    <div class="container">
        <!-- First footer -->
        <div class="first-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="links dark footer-contact-links">
                        <div class="footer-contact-links-wrapper">
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <div class="icon-footer"> <i class="flaticon-phone-call"></i> </div>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Appelez-nous</h6>
                                    <p><?php echo get_theme_mod('phone_number') ?></p>
                                </div>
                            </div>
                            <div class="footer-contact-links-divider"></div>
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <div class="icon-footer"> <i class="flaticon-message"></i> </div>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Écrivez-nous</h6>
                                    <p><?php echo sanitize_text_field(get_theme_mod('email_adress')) ?></p>
                                </div>
                            </div>
                            <div class="footer-contact-links-divider"></div>
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <div class="icon-footer"> <i class="flaticon-placeholder"></i> </div>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Adresse</h6>
                                    <p><?php echo sanitize_text_field(get_theme_mod('office_adress')) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second footer -->
        <div class="second-footer">
            <div class="row">
                <!-- about & social icons -->
                <div class="col-md-4 widget-area">
                    <div class="widget clearfix">
                        <div class="footer-logo">
                            <?php $footer_logo = (is_ssl()) ? str_replace('http://', 'https://', get_theme_mod('site_logo_light')) : get_theme_mod('site_logo_light') ?>
                            <img class="img-fluid" src="<?php echo $footer_logo ?>" alt="">
                        </div>
                        <div class="widget-text">
                            <p><?php echo sanitize_textarea_field(get_theme_mod('site_description')) ?></p>
                            <div class="social-icons">
                                <ul class="list-inline">
                                    <?php
                                    $facebook = get_theme_mod('facebook_url');
                                    $twitter = get_theme_mod('twitter_url');
                                    $instagram = get_theme_mod('instagram_url');
                                    $youtube = get_theme_mod('youtube_url');
                                    if ($instagram) {
                                    ?>
                                        <li><a href="<?php echo esc_url($instagram) ?>"><i class="ti-instagram"></i></a></li>
                                    <?php }
                                    if ($twitter) {
                                    ?>
                                        <li><a href="<?php echo esc_url($twitter) ?>"><i class="ti-twitter"></i></a></li>
                                    <?php }
                                    if ($facebook) {
                                    ?>
                                        <li><a href="<?php echo esc_url($facebook) ?>"><i class="ti-facebook"></i></a></li>
                                    <?php }
                                    if ($youtube) {
                                    ?>
                                        <li><a href="<?php echo esc_url($youtube) ?>"><i class="ti-youtube"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- quick links -->
                <div class="col-md-3 offset-md-1 widget-area">
                    <div class="widget clearfix usful-links">
                        <h3 class="widget-title">Liens utiles</h3>
                        <ul>
                            <li><a href="<?php echo site_url('abou-us') ?>">A propos</a></li>
                            <li><a href="<?php get_post_type_archive_link('voyage') ?>">Voyages</a></li>
                            <li><a href="<?php echo get_post_type_archive_link('hotel') ?>">Hotels</a></li>
                            <li><a href="<?php echo site_url('blog') ?>">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <!-- subscribe -->
                <?php
                global $wp;
                echo do_shortcode('[newsletter_form form="1" confirmation_url="' . home_url($wp->request) . '"]');
                ?>
            </div>
        </div>
        <!-- Bottom footer -->
        <div class="bottom-footer-text">
            <div class="row copyright">
                <div class="col-md-12">
                    <p class="mb-0">©<?php echo date('Y'); ?> <a href="<?php echo home_url() ?>"><?php echo bloginfo('name') ?></a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<?php wp_footer() ?>
</body>

</html>