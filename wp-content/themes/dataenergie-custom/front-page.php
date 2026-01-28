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
                Mehr erfahren
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
            <a href="<?php echo esc_url( home_url( '/ueber-uns/' ) ); ?>" class="btn btn-secondary">
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

        <!-- Services Split Container -->
        <div class="services-split">

            <!-- IT Services Container -->
            <div class="services-container services-container--it">
                <div class="services-container__header">
                    <div class="services-container__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <h3 class="services-container__title">IT Solutions</h3>
                </div>
                <div class="services-container__grid services-container__grid--2x2">
                    <?php
                    // Varsayılan değerler (ACF boşsa gösterilecek)
                    $defaults = array(
                        1 => array(
                            'title' => 'Microsoft 365 & Modern Workplace',
                            'url'   => '/microsoft-365/',
                            'desc'  => 'Effiziente Zusammenarbeit beginnt mit der richtigen Plattform. Wir konzipieren, implementieren und betreiben Microsoft-365-Umgebungen, die Sicherheit, Governance und Benutzerfreundlichkeit vereinen.',
                            'features' => array(
                                'Tenant-Design & Migration',
                                'Microsoft Teams & SharePoint Strukturen',
                                'Entra ID, Conditional Access & MFA',
                                'Governance & Zugriffskonzepte'
                            )
                        ),
                        2 => array(
                            'title' => 'Security & Zero Trust',
                            'url'   => '/cybersecurity/',
                            'desc'  => 'IT-Sicherheit beginnt bei Identitäten. Wir entwickeln ganzheitliche Sicherheitskonzepte nach dem Zero-Trust-Prinzip und schützen Benutzer, Daten und Systeme vor modernen Bedrohungen.',
                            'features' => array(
                                'Zero-Trust Architektur',
                                'MFA & Passwordless Authentication',
                                'Privileged Access & Admin-Sicherheit',
                                'Guest- & External-User-Management'
                            )
                        ),
                        3 => array(
                            'title' => 'IT Governance & Risk Assessment',
                            'url'   => '/beratung-analyse/',
                            'desc'  => 'Transparenz über Risiken ist die Basis guter Entscheidungen. Mit strukturierten IT-Governance- und Security-Assessments identifizieren wir Risiken, Sicherheitslücken und Optimierungspotenziale.',
                            'features' => array(
                                'Management-Report (PDF)',
                                'Risiko-Score & Prioritäten',
                                'Konkrete Handlungsempfehlungen',
                                'Compliance- & Sicherheitsübersicht'
                            )
                        ),
                        4 => array(
                            'title' => 'Cloud & Hybrid IT',
                            'url'   => '/cloud-solutions/',
                            'desc'  => 'Cloud-Lösungen, die zu Ihrer Realität passen. Wir planen und betreiben Azure- und Hybrid-Infrastrukturen, die bestehende Systeme nahtlos integrieren und zukunftssicher skalierbar sind.',
                            'features' => array(
                                'Azure Architektur & Landing Zones',
                                'Hybrid AD / Entra ID',
                                'Backup & Disaster Recovery',
                                'Kosten- & Sicherheitsoptimierung'
                            )
                        ),
                        5 => array(
                            'title' => 'Automation & IT Efficiency',
                            'url'   => '/it-services/',
                            'desc'  => 'Weniger manuelle Arbeit. Mehr Kontrolle. Durch gezielte Automatisierung reduzieren wir Fehler, beschleunigen Prozesse und erhöhen die Betriebssicherheit Ihrer IT.',
                            'features' => array(
                                'Benutzer- & Zugriffsautomatisierung',
                                'Microsoft 365 Provisioning',
                                'Security Checks & Reports',
                                'Skript- & Prozessautomatisierung'
                            )
                        ),
                        6 => array(
                            'title' => 'IT Support & Managed Services',
                            'url'   => '/it-outsourcing/',
                            'desc'  => 'Zuverlässiger IT-Betrieb ohne Komplexität. Wir übernehmen den stabilen Betrieb Ihrer IT-Umgebung – strukturiert, transparent und mit klaren Zuständigkeiten.',
                            'features' => array(
                                '1st & 2nd Level Support',
                                'Monitoring & Wartung',
                                'Incident- & Problem-Management',
                                'SLA-basierte Services'
                            )
                        ),
                    );

                    // IT Services kartlarını ACF'den çek veya varsayılan değerleri kullan (Ana sayfada sadece ilk 4)
                    for ( $i = 1; $i <= 4; $i++ ) :
                        // ACF'den değerleri al, yoksa varsayılanları kullan
                        $service_title   = get_field( "it_service_{$i}_title" ) ?: $defaults[$i]['title'];
                        $service_url     = get_field( "it_service_{$i}_url" ) ?: $defaults[$i]['url'];
                        $service_desc    = get_field( "it_service_{$i}_description" ) ?: $defaults[$i]['desc'];
                        $service_feat_1  = get_field( "it_service_{$i}_feature_1" ) ?: $defaults[$i]['features'][0];
                        $service_feat_2  = get_field( "it_service_{$i}_feature_2" ) ?: $defaults[$i]['features'][1];
                        $service_feat_3  = get_field( "it_service_{$i}_feature_3" ) ?: $defaults[$i]['features'][2];
                        $service_feat_4  = get_field( "it_service_{$i}_feature_4" ) ?: $defaults[$i]['features'][3];

                        // URL'yi tam URL'ye çevir
                        if ( ! empty( $service_url ) ) {
                            // Eğer URL "/" ile başlıyorsa home_url ekle
                            if ( strpos( $service_url, '/' ) === 0 ) {
                                $service_url = home_url( $service_url );
                            }
                        }

                        // İkon belirleme (her kart için farklı ikon)
                        $icons = array(
                            1 => '<rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line>',
                            2 => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>',
                            3 => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>',
                            4 => '<path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>',
                            5 => '<circle cx="12" cy="12" r="3"></circle><path d="M12 1v6m0 6v6m5.2-13.2l-4.2 4.2m0 6l4.2 4.2M23 12h-6m-6 0H1m18.2-5.2l-4.2 4.2m0 6l4.2 4.2"></path>',
                            6 => '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>',
                        );
                        $icon_svg = isset( $icons[ $i ] ) ? $icons[ $i ] : $icons[1];
                    ?>
                    <!-- Service Card <?php echo $i; ?>: <?php echo esc_html( $service_title ); ?> -->
                    <div class="service-card-mini service-card-mini--it service-card-mini--detailed service-card-mini--expandable" data-href="<?php echo esc_url( $service_url ); ?>">
                        <div class="service-card-mini__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <?php echo $icon_svg; ?>
                            </svg>
                        </div>
                        <div class="service-card-mini__content">
                            <h4 class="service-card-mini__title"><?php echo esc_html( $service_title ); ?></h4>
                            <!-- Kısaltılmış açıklama (varsayılan görünür) -->
                            <p class="service-card-mini__description service-card-mini__description--short"><?php echo esc_html( $service_desc ); ?></p>
                            <!-- Tam açıklama (genişletilince görünür) -->
                            <p class="service-card-mini__description service-card-mini__description--full" hidden><?php echo esc_html( $service_desc ); ?></p>
                            <?php if ( ! empty( $service_feat_1 ) || ! empty( $service_feat_2 ) || ! empty( $service_feat_3 ) || ! empty( $service_feat_4 ) ) : ?>
                            <ul class="service-card-mini__features" hidden>
                                <?php if ( ! empty( $service_feat_1 ) ) : ?><li><?php echo esc_html( $service_feat_1 ); ?></li><?php endif; ?>
                                <?php if ( ! empty( $service_feat_2 ) ) : ?><li><?php echo esc_html( $service_feat_2 ); ?></li><?php endif; ?>
                                <?php if ( ! empty( $service_feat_3 ) ) : ?><li><?php echo esc_html( $service_feat_3 ); ?></li><?php endif; ?>
                                <?php if ( ! empty( $service_feat_4 ) ) : ?><li><?php echo esc_html( $service_feat_4 ); ?></li><?php endif; ?>
                            </ul>
                            <?php endif; ?>
                            <!-- Mehr anzeigen butonu -->
                            <button class="service-card-mini__toggle" aria-expanded="false" type="button">
                                <span class="toggle-text">Mehr anzeigen</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
                <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>" class="services-container__link">
                    Alle IT-Dienstleistungen
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>

            <!-- Solar Services Container -->
            <div class="services-container services-container--solar">
                <div class="services-container__header">
                    <div class="services-container__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    <h3 class="services-container__title">Solar Energy</h3>
                </div>
                <div class="services-container__grid">
                    <!-- Service Card: Photovoltaik -->
                    <a href="<?php echo esc_url( home_url( '/solar-systems/installation/' ) ); ?>" class="service-card-mini service-card-mini--solar">
                        <div class="service-card-mini__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <div class="service-card-mini__content">
                            <h4 class="service-card-mini__title">Photovoltaik</h4>
                            <p class="service-card-mini__description">Solaranlagen für Privathaushalte und Unternehmen.</p>
                        </div>
                    </a>

                    <!-- Service Card: Energiespeicher -->
                    <a href="<?php echo esc_url( home_url( '/solar-systems/energiespeicher/' ) ); ?>" class="service-card-mini service-card-mini--solar">
                        <div class="service-card-mini__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="22" y1="11" x2="22" y2="13"></line>
                                <line x1="6" y1="11" x2="6" y2="17"></line>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                <line x1="18" y1="11" x2="18" y2="17"></line>
                            </svg>
                        </div>
                        <div class="service-card-mini__content">
                            <h4 class="service-card-mini__title">Energiespeicher</h4>
                            <p class="service-card-mini__description">Batteriespeicher für Eigenverbrauchsoptimierung.</p>
                        </div>
                    </a>

                    <!-- Service Card: Wartung -->
                    <a href="<?php echo esc_url( home_url( '/solar-systems/wartung/' ) ); ?>" class="service-card-mini service-card-mini--solar">
                        <div class="service-card-mini__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                            </svg>
                        </div>
                        <div class="service-card-mini__content">
                            <h4 class="service-card-mini__title">Wartung & Service</h4>
                            <p class="service-card-mini__description">Professionelle Anlagenwartung und Reinigung.</p>
                        </div>
                    </a>

                    <!-- Service Card: Beratung -->
                    <a href="<?php echo esc_url( home_url( '/solar-systems/beratung/' ) ); ?>" class="service-card-mini service-card-mini--solar">
                        <div class="service-card-mini__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <div class="service-card-mini__content">
                            <h4 class="service-card-mini__title">Beratung</h4>
                            <p class="service-card-mini__description">Individuelle Energieberatung und Planung.</p>
                        </div>
                    </a>
                </div>
                <a href="<?php echo esc_url( home_url( '/solar-systems/' ) ); ?>" class="services-container__link">
                    Alle Solar-Dienstleistungen
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>

        </div><!-- .services-split -->

        <!-- Business Solutions Section -->
        <div class="services-container services-container--business" style="margin-top: var(--spacing-lg);">
            <div class="services-container__header">
                <div class="services-container__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                </div>
                <h3 class="services-container__title">Business Solutions</h3>
            </div>
            <div class="services-container__grid">
                <!-- Service Card: Workforce Management -->
                <a href="<?php echo esc_url( home_url( '/workforce-management/' ) ); ?>" class="service-card-mini service-card-mini--it">
                    <div class="service-card-mini__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="service-card-mini__content">
                        <h4 class="service-card-mini__title">Workforce Management & Zeiterfassung</h4>
                        <p class="service-card-mini__description">Digitale Zeiterfassung, Absenzen- und Personalplanung für Ihr Unternehmen.</p>
                    </div>
                </a>

                <!-- Service Card: Smart Building -->
                <a href="<?php echo esc_url( home_url( '/smart-building/' ) ); ?>" class="service-card-mini service-card-mini--it">
                    <div class="service-card-mini__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <div class="service-card-mini__content">
                        <h4 class="service-card-mini__title">Smart Building Solutions</h4>
                        <p class="service-card-mini__description">WashSlot Waschküchen-Buchung und intelligente Gebäudelösungen.</p>
                    </div>
                </a>

                <!-- Service Card: IT Governance & Risk Assessment -->
                <a href="<?php echo esc_url( home_url( '/beratung-analyse/' ) ); ?>" class="service-card-mini service-card-mini--it">
                    <div class="service-card-mini__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="service-card-mini__content">
                        <h4 class="service-card-mini__title">IT Governance &amp; Risk Assessment</h4>
                        <p class="service-card-mini__description">Transparenz, Sicherheit und Kontrolle über Ihre IT-Umgebung.</p>
                    </div>
                </a>
            </div>
        </div>

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
