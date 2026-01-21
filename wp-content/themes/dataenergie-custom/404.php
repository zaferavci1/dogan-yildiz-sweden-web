<?php
/**
 * 404 Template
 *
 * Sayfa bulunamadı hata sayfası.
 * Faz 3 - Sprint 3.1: Template Parçalama & Dinamikleştirme
 *
 * @package Dataenergie
 * @version 1.0.0
 */

get_header();
?>

<!-- ========================================
     404 ERROR PAGE
     ======================================== -->
<section class="error-404" aria-label="Hata Sayfası">
    <div class="container">
        <div class="error-404__content">

            <!-- Error Code -->
            <div class="error-404__code">
                <span class="error-number">404</span>
            </div>

            <!-- Error Message -->
            <h1 class="error-404__title">Seite nicht gefunden</h1>
            <p class="error-404__description">
                Die von Ihnen gesuchte Seite existiert leider nicht oder wurde verschoben.
                Bitte überprüfen Sie die URL oder kehren Sie zur Startseite zurück.
            </p>

            <!-- Action Buttons -->
            <div class="error-404__actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Zur Startseite
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary btn-lg">
                    Kontakt aufnehmen
                </a>
            </div>

            <!-- Search Form (opsiyonel) -->
            <div class="error-404__search">
                <p class="error-404__search-label">Oder suchen Sie nach etwas Bestimmtem:</p>
                <?php get_search_form(); ?>
            </div>

        </div>
    </div>
</section>

<?php
get_footer();
