</main><!-- .site-main -->

<!-- ========================================
     FOOTER
     ======================================== -->
<footer class="site-footer">

    <!-- Footer Main Content -->
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">

                <!-- Column 1: About -->
                <div class="footer-section footer-about">
                    <?php
                    $footer_logo_text   = dataenergie_get_option( 'footer_logo_text', 'Data' );
                    $footer_logo_accent = dataenergie_get_option( 'footer_logo_accent', 'energie' );
                    $footer_description = dataenergie_get_option( 'footer_description', 'Ihr zuverlässiger Partner für professionelle IT-Dienstleistungen und nachhaltige Solar-Energielösungen. Wir verbinden technische Expertise mit umweltbewusstem Handeln für eine bessere Zukunft.' );
                    ?>
                    <div class="footer-logo">
                        <?php echo esc_html( $footer_logo_text ); ?><span class="logo-accent"><?php echo esc_html( $footer_logo_accent ); ?></span>
                    </div>
                    <p>
                        <?php echo esc_html( $footer_description ); ?>
                    </p>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <nav class="footer-links" aria-label="Footer Navigation">
                        <?php
                        if ( has_nav_menu( 'footer-menu' ) ) {
                            wp_nav_menu( array(
                                'theme_location' => 'footer-menu',
                                'container'      => false,
                                'menu_class'     => '',
                                'fallback_cb'    => false,
                                'depth'          => 1,
                            ) );
                        } else {
                            // Fallback statik linkler
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                            <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>">IT Services</a>
                            <a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>">Solar Systems</a>
                            <a href="<?php echo esc_url( home_url( '/ueber-uns/' ) ); ?>">Über uns</a>
                            <a href="<?php echo esc_url( home_url( '/loesungen/' ) ); ?>">Lösungen</a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Kontakt</a>
                            <?php
                        }
                        ?>
                    </nav>
                </div>

                <!-- Column 3: Services -->
                <div class="footer-section">
                    <h4>Services</h4>
                    <nav class="footer-links">
                        <?php
                        if ( has_nav_menu( 'footer-services' ) ) {
                            wp_nav_menu( array(
                                'theme_location' => 'footer-services',
                                'container'      => false,
                                'menu_class'     => '',
                                'fallback_cb'    => false,
                                'depth'          => 1,
                            ) );
                        } else {
                            // Fallback statik linkler
                            ?>
                            <a href="<?php echo esc_url( home_url( '/cloud-solutions/' ) ); ?>">Cloud Solutions</a>
                            <a href="<?php echo esc_url( home_url( '/cybersecurity/' ) ); ?>">Cybersecurity</a>
                            <a href="<?php echo esc_url( home_url( '/solar-systems/planung/' ) ); ?>">Planung & Engineering</a>
                            <a href="<?php echo esc_url( home_url( '/drohnenaufnahmen/' ) ); ?>">Drohnenaufnahmen</a>
                            <?php
                        }
                        ?>
                    </nav>
                </div>

                <!-- Column: Lösungen -->
                <div class="footer-section">
                    <h4>Lösungen</h4>
                    <nav class="footer-links">
                        <?php
                        if ( has_nav_menu( 'footer-solutions' ) ) {
                            wp_nav_menu( array(
                                'theme_location' => 'footer-solutions',
                                'container'      => false,
                                'menu_class'     => '',
                                'fallback_cb'    => false,
                                'depth'          => 1,
                            ) );
                        } else {
                            // Fallback statik linkler
                            ?>
                            <a href="<?php echo esc_url( home_url( '/workforce-management/' ) ); ?>">Workforce Management</a>
                            <a href="<?php echo esc_url( home_url( '/smart-building/' ) ); ?>">Smart Building</a>
                            <a href="<?php echo esc_url( home_url( '/beratung-analyse/' ) ); ?>">IT Governance & Risk Assessment</a>
                            <?php
                        }
                        ?>
                    </nav>
                </div>

                <!-- Column 4: Contact -->
                <?php
                $phone   = dataenergie_get_option( 'phone_number', '044 501 73 73' );
                $mobile  = dataenergie_get_option( 'mobile_number', '076 216 27 73' );
                $email   = dataenergie_get_option( 'email_address', 'info@dataenergie.ch' );
                $address = dataenergie_get_option( 'address_text', "Dataenergie GmbH\nGewerbestrasse 19\n6314 Unterägeri\nSchweiz" );
                ?>
                <div class="footer-section">
                    <h4>Kontakt</h4>
                    <div class="footer-contact">
                        <!-- Address -->
                        <div class="contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span><?php echo nl2br( esc_html( $address ) ); ?></span>
                        </div>

                        <!-- Email -->
                        <div class="contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                        </div>

                        <!-- Phone -->
                        <div class="contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <a href="tel:<?php echo esc_attr( dataenergie_clean_phone( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                        </div>

                        <?php if ( $mobile ) : ?>
                        <!-- Mobile -->
                        <div class="contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                            </svg>
                            <a href="tel:<?php echo esc_attr( dataenergie_clean_phone( $mobile ) ); ?>"><?php echo esc_html( $mobile ); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div><!-- .footer-grid -->
        </div><!-- .container -->
    </div><!-- .footer-main -->

    <!-- Footer Bottom / Copyright -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <?php
                $footer_copyright = dataenergie_get_option( 'footer_copyright', '© {year} Dataenergie GmbH. Alle Rechte vorbehalten.' );
                $footer_copyright = str_replace( '{year}', date( 'Y' ), $footer_copyright );
                ?>
                <p class="copyright">
                    <?php echo esc_html( $footer_copyright ); ?>
                </p>
                <nav class="footer-legal-links">
                    <?php
                    if ( has_nav_menu( 'footer-legal' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'footer-legal',
                            'container'      => false,
                            'menu_class'     => '',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ) );
                    } else {
                        // Fallback statik linkler
                        ?>
                        <a href="<?php echo esc_url( home_url( '/impressum/' ) ); ?>">Impressum</a>
                        <a href="<?php echo esc_url( home_url( '/datenschutz/' ) ); ?>">Datenschutz</a>
                        <a href="<?php echo esc_url( home_url( '/agb/' ) ); ?>">AGB</a>
                        <?php
                    }
                    ?>
                </nav>
            </div>
        </div><!-- .container -->
    </div><!-- .footer-bottom -->

</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</body>
</html>
