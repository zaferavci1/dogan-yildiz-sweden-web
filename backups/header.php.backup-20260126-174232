<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ========================================
     HEADER - Mega Menu Navigation
     ======================================== -->
<header class="site-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <nav class="top-bar-nav" aria-label="Sekundäre Navigation">
                <ul class="top-bar-menu">
                    <li><a href="<?php echo esc_url( home_url( '/ueber-uns/' ) ); ?>">Über uns</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Header -->
    <div class="header-main">
        <div class="container">
            <div class="header-inner">

                <!-- Logo -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> - Startseite">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpeg" alt="Dataenergie GmbH" class="logo-image">
                </a>

                <!-- Primary Navigation (Desktop) -->
                <nav class="nav-primary" aria-label="Hauptnavigation">
                    <?php
                    if ( has_nav_menu( 'main-menu' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'menu-primary',
                            'walker'         => new Dataenergie_Mega_Menu_Walker(),
                            'fallback_cb'    => false,
                            'depth'          => 3,
                        ) );
                    } else {
                        echo '<p style="color:red;">Menu not assigned!</p>';
                    }
                    ?>
                </nav>

                <!-- Header CTA Button (Desktop) -->
                <div class="header-cta">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary">
                        Angebot anfordern
                    </a>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" aria-label="Menü" aria-expanded="false" aria-controls="mobile-nav">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div><!-- .header-inner -->
        </div><!-- .container -->
    </div><!-- .header-main -->

    <!-- Mobile Navigation -->
    <nav id="mobile-nav" class="mobile-nav" aria-label="Mobile Navigation">
        <div class="mobile-nav-inner">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => 'mobile-menu',
                'walker'         => new Dataenergie_Mobile_Menu_Walker(),
                'fallback_cb'    => false,
            ) );
            ?>

            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary mobile-cta">
                Angebot anfordern
            </a>
        </div>
    </nav>

</header><!-- .site-header -->

<!-- Main Content Wrapper -->
<main id="main-content" class="site-main">
