<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php wp_head() ?>
    <title>Travol Agency</title>

</head>

<body>
    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper navbar-brand valign">
                <a href="<?php echo home_url() ?>">
                    <?php $the_logo = (is_ssl()) ? str_replace('http://', 'https://', get_theme_mod('site_logo_light')) : get_theme_mod('site_logo_light') ?>
                    <div class="logo"> <img height="46" width="140" src="<?php echo $the_logo ?>" class="logo-img" alt=""> </div>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><i class="ti-line-double"></i></span> </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link <?php echo is_front_page() ? 'active' : '' ?>" href="<?php echo home_url() ?>">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (is_post_type_archive('voyage') || (get_post_type() == 'voyage') && is_single()) ? 'active' : '' ?>" href="<?php echo site_url('voyages') ?>">Voyages</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (is_tax('destination') || is_page('destination') || is_page('destinations-search')) ? 'active' : '' ?>" href="<?php echo site_url('destination') ?>">Destinations</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (is_post_type_archive('hotel') || get_post_type() == 'hotel' || is_page('hotel-search')) ? 'active' : '' ?>" href="<?php echo get_post_type_archive_link('hotel') ?>">Hôtels</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (is_home() && !is_front_page() || is_singular('post')) ? 'active' : '' ?>" href="<?php echo site_url('blog') ?>">Blog</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo is_page('about-us') ? 'active' : '' ?>" href="<?php echo site_url('about-us') ?>">A propos</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo (is_page('contact-us')) ? 'active' : '' ?>" href="<?php echo site_url('contact-us') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>