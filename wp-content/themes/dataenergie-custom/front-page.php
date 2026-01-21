<?php
/**
 * Front Page Template
 *
 * Ana sayfa için özel şablon.
 * Faz 2 - Sprint 2.2: Ana Sayfa Mimarisi
 * Faz 3 - Sprint 3.2: ACF Entegrasyonu
 *
 * @package Dataenergie
 * @version 1.1.0
 */

get_header();

// ACF Alanlarını Al
$hero_title_it    = get_field( 'hero_title_it' ) ?: 'Professionelle IT-Lösungen';
$hero_title_solar = get_field( 'hero_title_solar' ) ?: 'Nachhaltige Solarenergie';
$hero_image_it    = get_field( 'hero_image_it' );
$hero_image_solar = get_field( 'hero_image_solar' );
$about_teaser     = get_field( 'about_teaser_text' );

// Varsayılan görseller (ACF'de görsel yoksa)
$default_it_image    = get_template_directory_uri() . '/assets/images/hero-it.jpg';
$default_solar_image = get_template_directory_uri() . '/assets/images/hero-solar.jpg';

// Görsel URL'lerini belirle
$it_image_url    = $hero_image_it ? $hero_image_it['url'] : $default_it_image;
$solar_image_url = $hero_image_solar ? $hero_image_solar['url'] : $default_solar_image;
?>

<!-- ========================================
     SECTION 1: HERO - SPLIT SCREEN
     ======================================== -->
<section class="hero-split" aria-label="Ana Tanıtım Alanı">

    <!-- IT Services (Sol Taraf) -->
    <div class="hero-panel hero-panel--it">
        <div class="hero-panel__overlay"></div>
        <div class="hero-panel__content">
            <span class="hero-panel__tag">IT Solutions</span>
            <h1 class="hero-panel__title"><?php echo esc_html( $hero_title_it ); ?></h1>
            <p class="hero-panel__subtitle">Microsoft 365, Cloud-Systeme & IT-Infrastruktur für Ihr Unternehmen</p>
            <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>" class="btn btn-outline btn-light">
                Mehr erfahren
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
        <!-- Background Image -->
        <img src="<?php echo esc_url( $it_image_url ); ?>" alt="" class="hero-panel__bg" aria-hidden="true">
    </div>

    <!-- Solar Systems (Sağ Taraf) -->
    <div class="hero-panel hero-panel--solar">
        <div class="hero-panel__overlay"></div>
        <div class="hero-panel__content">
            <span class="hero-panel__tag">Solar Energy</span>
            <h2 class="hero-panel__title"><?php echo esc_html( $hero_title_solar ); ?></h2>
            <p class="hero-panel__subtitle">Photovoltaik-Anlagen für Privathaushalte und Unternehmen</p>
            <a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>" class="btn btn-primary">
                Angebot anfordern
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
        <!-- Background Image -->
        <img src="<?php echo esc_url( $solar_image_url ); ?>" alt="" class="hero-panel__bg" aria-hidden="true">
    </div>

</section>

<!-- ========================================
     SECTION 2: ABOUT TEASER
     ======================================== -->
<?php
// Varsayılan about metni
$default_about = 'Wir verbinden Technologie und Energie. Als Schweizer Unternehmen bieten wir professionelle IT-Infrastruktur und nachhaltige erneuerbare Energielösungen nach höchsten Qualitätsstandards. Unser erfahrenes Team begleitet Sie von der Beratung bis zur Umsetzung.';
$about_text = $about_teaser ?: $default_about;
?>
<section class="section-about" aria-labelledby="about-heading">
    <div class="container">
        <div class="about-teaser">
            <span class="section-tag">Über uns</span>
            <h2 id="about-heading" class="about-teaser__title">Dataenergie GmbH</h2>
            <p class="about-teaser__text">
                <?php echo esc_html( $about_text ); ?>
            </p>
            <div class="about-teaser__stats">
                <div class="stat-item">
                    <span class="stat-item__number">15+</span>
                    <span class="stat-item__label">Jahre Erfahrung</span>
                </div>
                <div class="stat-item">
                    <span class="stat-item__number">500+</span>
                    <span class="stat-item__label">Zufriedene Kunden</span>
                </div>
                <div class="stat-item">
                    <span class="stat-item__number">100%</span>
                    <span class="stat-item__label">Swiss Quality</span>
                </div>
            </div>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-secondary">
                Mehr über uns
            </a>
        </div>
    </div>
</section>

<!-- ========================================
     SECTION 3: SERVICES GRID
     ======================================== -->
<section class="section-services" aria-labelledby="services-heading">
    <div class="container">

        <!-- Section Header -->
        <div class="section-header">
            <span class="section-tag">Unsere Dienstleistungen</span>
            <h2 id="services-heading" class="section-title">Was wir anbieten</h2>
            <p class="section-description">
                Von IT-Infrastruktur bis zur Solarenergie - wir bieten umfassende Lösungen für Ihr Unternehmen.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="services-grid">

            <!-- Service Card 1: Microsoft 365 -->
            <article class="service-card">
                <div class="service-card__icon service-card__icon--it">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h3 class="service-card__title">Microsoft 365</h3>
                <p class="service-card__description">
                    Vollständige Microsoft 365 Integration, Exchange Online, SharePoint und Teams für moderne Zusammenarbeit.
                </p>
                <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>" class="service-card__link">
                    Mehr erfahren
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </article>

            <!-- Service Card 2: Network & Security -->
            <article class="service-card">
                <div class="service-card__icon service-card__icon--it">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3 class="service-card__title">Network & Security</h3>
                <p class="service-card__description">
                    Professionelle Netzwerkinfrastruktur, Firewall-Lösungen und Cybersecurity für maximalen Schutz.
                </p>
                <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>" class="service-card__link">
                    Mehr erfahren
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </article>

            <!-- Service Card 3: Photovoltaik -->
            <article class="service-card">
                <div class="service-card__icon service-card__icon--solar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </div>
                <h3 class="service-card__title">Photovoltaik</h3>
                <p class="service-card__description">
                    Hochwertige Solaranlagen für Privathaushalte und Unternehmen. Planung, Installation und Wartung.
                </p>
                <a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>" class="service-card__link">
                    Mehr erfahren
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </article>

            <!-- Service Card 4: Cloud Solutions -->
            <article class="service-card">
                <div class="service-card__icon service-card__icon--it">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>
                    </svg>
                </div>
                <h3 class="service-card__title">Cloud Solutions</h3>
                <p class="service-card__description">
                    Sichere Cloud-Migration, Azure-Integration und hybride Infrastrukturen für flexible Arbeitsmodelle.
                </p>
                <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>" class="service-card__link">
                    Mehr erfahren
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </article>

            <!-- Service Card 5: Energiespeicher -->
            <article class="service-card">
                <div class="service-card__icon service-card__icon--solar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="22" y1="11" x2="22" y2="13"></line>
                        <line x1="6" y1="11" x2="6" y2="17"></line>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                        <line x1="18" y1="11" x2="18" y2="17"></line>
                    </svg>
                </div>
                <h3 class="service-card__title">Energiespeicher</h3>
                <p class="service-card__description">
                    Moderne Batteriespeicher für maximale Eigenverbrauchsoptimierung und Energieunabhängigkeit.
                </p>
                <a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>" class="service-card__link">
                    Mehr erfahren
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </article>

            <!-- Service Card 6: IT Support -->
            <article class="service-card">
                <div class="service-card__icon service-card__icon--it">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </div>
                <h3 class="service-card__title">IT Support</h3>
                <p class="service-card__description">
                    Zuverlässiger IT-Support, Fernwartung und schnelle Problemlösung durch unser Expertenteam.
                </p>
                <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>" class="service-card__link">
                    Mehr erfahren
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </article>

        </div><!-- .services-grid -->

    </div><!-- .container -->
</section>

<!-- ========================================
     SECTION 4: CTA BANNER
     ======================================== -->
<section class="section-cta" aria-label="Kontakt Aufforderung">
    <div class="container">
        <div class="cta-banner">
            <div class="cta-banner__content">
                <h2 class="cta-banner__title">Bereit für die Zukunft?</h2>
                <p class="cta-banner__text">
                    Kontaktieren Sie uns für eine unverbindliche Beratung zu IT-Lösungen oder Solarenergie.
                </p>
            </div>
            <div class="cta-banner__actions">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary btn-lg">
                    Kontakt aufnehmen
                </a>
                <a href="tel:+41442344567" class="btn btn-outline btn-light btn-lg">
                    +41 44 234 45 67
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
