<?php if (get_field('clients_activation', 'option')) { ?>
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-7 owl-carousel owl-theme">
                    <?php
                    while (have_rows('clients', 'option')) {
                        the_row();
                    ?>
                        <div class="clients-logo">
                            <a href="<?php echo esc_url(get_sub_field('client_website')) ?>"><img width="136" height="68" src="<?php echo get_sub_field('client_logo')['sizes']['clientLogo'] ?>" alt=""></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>