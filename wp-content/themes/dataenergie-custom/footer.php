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
                    <div class="footer-logo">
                        Data<span class="logo-accent">energie</span>
                    </div>
                    <p>
                        Ihr zuverlässiger Partner für professionelle IT-Dienstleistungen und
                        nachhaltige Solar-Energielösungen. Wir verbinden technische Expertise
                        mit umweltbewusstem Handeln für eine bessere Zukunft.
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
                            <a href="<?php echo esc_url( home_url( '/uber-uns/' ) ); ?>">Über uns</a>
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
                        <a href="<?php echo esc_url( home_url( '/it-infrastructure/' ) ); ?>">IT Infrastructure</a>
                        <a href="<?php echo esc_url( home_url( '/cloud-solutions/' ) ); ?>">Cloud Solutions</a>
                        <a href="<?php echo esc_url( home_url( '/cybersecurity/' ) ); ?>">Cybersecurity</a>
                        <a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>">Photovoltaik</a>
                        <a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>">Energiespeicher</a>
                    </nav>
                </div>

                <!-- Column 4: Contact -->
                <div class="footer-section">
                    <h4>Kontakt</h4>
                    <div class="footer-contact">
                        <!-- Address -->
                        <div class="contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>
                                Gewerbestrasse 19<br>
                                8132 Egg bei Zürich<br>
                                Schweiz
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <a href="mailto:info@dataenergie.ch">info@dataenergie.ch</a>
                        </div>

                        <!-- Phone -->
                        <div class="contact-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <a href="tel:+41442344567">+41 44 234 45 67</a>
                        </div>
                    </div>
                </div>

            </div><!-- .footer-grid -->
        </div><!-- .container -->
    </div><!-- .footer-main -->

    <!-- Footer Bottom / Copyright -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <p class="copyright">
                    &copy; <?php echo date( 'Y' ); ?> Dataenergie GmbH. Alle Rechte vorbehalten.
                </p>
                <nav class="footer-legal-links">
                    <a href="<?php echo esc_url( home_url( '/impressum/' ) ); ?>">Impressum</a>
                    <a href="<?php echo esc_url( home_url( '/datenschutz/' ) ); ?>">Datenschutz</a>
                    <a href="<?php echo esc_url( home_url( '/agb/' ) ); ?>">AGB</a>
                </nav>
            </div>
        </div><!-- .container -->
    </div><!-- .footer-bottom -->

</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</body>
</html>
