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
     HEADER
     ======================================== -->
<header class="site-header">
    <div class="container">
        <div class="header-inner">

            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> - Ana Sayfa">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpeg" alt="Dataenergie GmbH" class="logo-image">
            </a>

            <!-- Main Navigation (Desktop) -->
            <nav class="main-nav" aria-label="Ana Navigasyon">
                <?php
                if ( has_nav_menu( 'main-menu' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => false,
                        'depth'          => 2,
                    ) );
                } else {
                    // Fallback statik menü
                    ?>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="active">Home</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>">IT Services</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>">Solar Systems</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
                    </ul>
                    <?php
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

    <!-- Mobile Navigation -->
    <nav id="mobile-nav" class="mobile-nav" aria-label="Mobil Navigasyon">
        <div class="container">
            <?php
            if ( has_nav_menu( 'main-menu' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => false,
                    'depth'          => 2,
                ) );
            } else {
                // Fallback statik menü
                ?>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>">IT Services</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>">Solar Systems</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
                </ul>
                <?php
            }
            ?>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary">
                Angebot anfordern
            </a>
        </div>
    </nav>

</header><!-- .site-header -->

<!-- Main Content Wrapper -->
<main id="main-content" class="site-main">
