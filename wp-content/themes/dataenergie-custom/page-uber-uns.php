<?php
/**
 * Template Name: Über Uns
 *
 * Modern SaaS Hakkımızda sayfası.
 * Vercel/Linear design estetiğinde tasarlanmıştır.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 3.0.0
 */

get_header();

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag        = get_field( 'about_hero_tag' ) ?: 'Über uns';
$hero_title      = get_field( 'about_hero_title' ) ?: 'Wer wir sind';
$hero_lead       = get_field( 'about_hero_lead' ) ?: 'Strukturierte IT, digitale Lösungen und nachhaltige Energie';
$hero_card_1     = get_field( 'about_hero_card_1' ) ?: 'DataEnergie begleitet Unternehmen und Immobilien mit gleichwertigem Fokus auf moderne IT-Services und nachhaltige Solarlösungen. Wir planen, realisieren und betreiben stabile IT-Infrastrukturen ebenso wie zukunftsfähige Solarsysteme.';
$hero_card_2     = get_field( 'about_hero_card_2' ) ?: 'Unser Anspruch ist es, Technologie und Energie ganzheitlich zu denken. Sicherheit, Verlässlichkeit und langfristige Wirtschaftlichkeit stehen dabei im Mittelpunkt.';

// Unsere Haltung
$haltung_title = get_field( 'about_haltung_title' ) ?: 'Klarheit statt Komplexität';
$haltung_text  = get_field( 'about_haltung_text' ) ?: 'In einer zunehmend digitalen und energiebezogenen Welt entstehen Risiken dort, wo Übersicht und Struktur fehlen. Unsere Arbeit zielt darauf ab, sowohl IT-Komplexität als auch energiebezogene Fragestellungen zu vereinfachen, Risiken transparent zu machen und fundierte, nachhaltige Entscheidungen zu ermöglichen.';
$haltung_note  = get_field( 'about_haltung_note' ) ?: 'Wir glauben nicht an Standardlösungen, sondern an passgenaue IT- und Energiekonzepte, die technisch sinnvoll, wirtschaftlich tragfähig und langfristig wirksam sind.';

// Was uns auszeichnet - IT Services
$auszeichnet_it = array(
	'Governance-orientierte IT-Beratung',
	'Microsoft 365 & Cloud-Expertise',
	'Sicherheits- und Compliance-Fokus',
	'Automatisierung und Prozessoptimierung',
	'Langfristige Partnerschaft statt Einzelprojekte',
);

// Was uns auszeichnet - Energielösungen (Solar)
$auszeichnet_solar = array(
	'Unabhängige und herstellerneutrale Photovoltaik-Planung',
	'Planung, Installation und Dokumentation aus einer Hand',
	'Erfahrung mit Flachdach-, Schrägdach-, Indach- und Fassadenanlagen',
	'Präzise technische Unterlagen für Bauverfahren und Bewilligungen',
	'Einsatz von Drohnenaufnahmen sowie 2D- und 3D-Modellen',
);

// Unsere Schwerpunkte
$schwerpunkte = array(
	array(
		'title'       => get_field( 'about_schwerpunkt_1_title' ) ?: 'IT Services',
		'description' => get_field( 'about_schwerpunkt_1_desc' ) ?: 'Governance-orientierte IT-Services mit Fokus auf Microsoft 365, Security, Cloud und Automatisierung.',
		'link'        => home_url( '/it-services/' ),
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
	),
	array(
		'title'       => get_field( 'about_schwerpunkt_2_title' ) ?: 'Digitale Lösungen',
		'description' => get_field( 'about_schwerpunkt_2_desc' ) ?: 'Eigene, modulare Lösungen wie Workforce Management & Zeiterfassung sowie Smart-Building-Anwendungen.',
		'link'        => home_url( '/workforce-management/' ),
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
	),
	array(
		'title'       => get_field( 'about_schwerpunkt_3_title' ) ?: 'Energielösungen',
		'description' => get_field( 'about_schwerpunkt_3_desc' ) ?: 'Planung und Umsetzung nachhaltiger Photovoltaik-Systeme für Unternehmen und Immobilien.',
		'link'        => home_url( '/solar-systems/' ),
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>',
	),
);

// Für wen wir arbeiten - IT Services & Digitale Lösungen
$zielgruppen_it = array(
	array(
		'title' => 'KMU',
		'desc'  => 'Kleine und mittlere Unternehmen',
	),
	array(
		'title' => 'Unternehmen mit Microsoft 365',
		'desc'  => 'Cloud-basierte Arbeitsumgebungen',
	),
	array(
		'title' => 'Organisationen mit Compliance-Anforderungen',
		'desc'  => 'Governance, Datenschutz, Sicherheit',
	),
	array(
		'title' => 'Startups und wachsende Unternehmen',
		'desc'  => 'Skalierbare IT-Infrastruktur',
	),
	array(
		'title' => 'Immobilienverwaltungen',
		'desc'  => 'Smart Building, Gebäudeautomation',
	),
);

// Für wen wir arbeiten - Energielösungen (Solar)
$zielgruppen_solar = array(
	array(
		'title' => 'Solarteure und Photovoltaik-Unternehmen',
		'desc'  => '',
	),
	array(
		'title' => 'Dachdeckerbetriebe',
		'desc'  => 'Flachdach, Schrägdach, Indach und Fassaden',
	),
	array(
		'title' => 'Elektroinstallationsbetriebe',
		'desc'  => 'AC-/DC-Schnittstellen, Elektroschemata',
	),
	array(
		'title' => 'Ingenieurbüros und Fachplaner',
		'desc'  => 'PV-Planung, Statik, Bauverfahren',
	),
	array(
		'title' => 'Architekturbüros',
		'desc'  => 'Integration von PV-Anlagen',
	),
	array(
		'title' => 'Immobilienverwaltungen und Investoren',
		'desc'  => 'Gewerbe- und Industrieobjekte',
	),
	array(
		'title' => 'Private Bauherren',
		'desc'  => 'Individuelle Beratung und Umsetzung',
	),
);

// Unsere Arbeitsweise
$arbeitsweise_title = get_field( 'about_arbeitsweise_title' ) ?: 'Strukturiert. Transparent. Verlässlich.';
$arbeitsweise_items = array(
	get_field( 'about_arbeitsweise_1' ) ?: 'Klare Zieldefinition',
	get_field( 'about_arbeitsweise_2' ) ?: 'Verständliche Kommunikation',
	get_field( 'about_arbeitsweise_3' ) ?: 'Nachvollziehbare Ergebnisse',
	get_field( 'about_arbeitsweise_4' ) ?: 'Saubere Dokumentation',
	get_field( 'about_arbeitsweise_5' ) ?: 'Langfristige Partnerschaften',
);
$arbeitsweise_note = get_field( 'about_arbeitsweise_note' ) ?: 'Unser Anspruch ist nicht, möglichst viel zu verkaufen – sondern sinnvolle und nachhaltige Lösungen zu liefern.';

// CTA Section
$cta_title       = get_field( 'about_cta_title' ) ?: 'Möchten Sie mehr über DataEnergie erfahren?';
$cta_description = get_field( 'about_cta_description' ) ?: 'Gerne stellen wir uns und unsere Arbeitsweise in einem unverbindlichen Gespräch vor.';
$cta_button_text = get_field( 'about_cta_button_text' ) ?: 'Erstgespräch anfragen';
?>

<!-- ========================================
     ABOUT HERO
     ======================================== -->
<section class="about-hero" role="banner" aria-labelledby="about-hero-title">
    <div class="about-hero__backdrop"></div>
    <div class="container">
        <div class="about-hero__wrapper">
            <!-- Left: Title Area -->
            <div class="about-hero__header">
                <span class="about-hero__tag"><?php echo esc_html( $hero_tag ); ?></span>
                <h1 id="about-hero-title" class="about-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
                <p class="about-hero__lead"><?php echo esc_html( $hero_lead ); ?></p>
            </div>

            <!-- Right: Content Cards -->
            <div class="about-hero__cards">
                <div class="about-hero__card">
                    <div class="about-hero__card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <p class="about-hero__card-text"><?php echo esc_html( $hero_card_1 ); ?></p>
                </div>
                <div class="about-hero__card">
                    <div class="about-hero__card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 6v6l4 2"></path>
                        </svg>
                    </div>
                    <p class="about-hero__card-text"><?php echo esc_html( $hero_card_2 ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     UNSERE HALTUNG
     ======================================== -->
<section class="about-haltung" aria-labelledby="haltung-title" style="padding: var(--spacing-xl) 0; background-color: var(--color-background-alt);">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <span class="section-tag">Unsere Haltung</span>
            <h2 id="haltung-title" style="font-size: 2rem; margin-top: var(--spacing-sm); margin-bottom: var(--spacing-md);">
                <?php echo esc_html( $haltung_title ); ?>
            </h2>
            <p style="font-size: 1.125rem; line-height: 1.8; color: var(--color-text-secondary); margin-bottom: var(--spacing-md);">
                <?php echo esc_html( $haltung_text ); ?>
            </p>
            <p style="font-size: 1rem; color: var(--color-primary); font-weight: 500; font-style: italic;">
                <?php echo esc_html( $haltung_note ); ?>
            </p>
        </div>
    </div>
</section>

<!-- ========================================
     WAS UNS AUSZEICHNET
     ======================================== -->
<section class="about-auszeichnet" aria-labelledby="auszeichnet-title" style="padding: var(--spacing-xl) 0;">
    <div class="container">
        <div class="section-header" style="margin-bottom: var(--spacing-lg);">
            <span class="section-tag">Differenzierung</span>
            <h2 id="auszeichnet-title" class="section-title">Was uns auszeichnet</h2>
        </div>

        <div class="about-zielgruppen__grid">
            <!-- IT Services -->
            <div>
                <h3 style="display: flex; align-items: center; gap: var(--spacing-sm); font-size: 1.125rem; margin-bottom: var(--spacing-md); color: var(--color-text-primary);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                    IT Services
                </h3>
                <div style="display: flex; flex-direction: column; gap: var(--spacing-sm);">
                    <?php foreach ( $auszeichnet_it as $item ) : ?>
                        <div style="display: flex; align-items: flex-start; gap: var(--spacing-sm); padding: var(--spacing-sm) var(--spacing-md); background: var(--color-background-alt); border-radius: var(--radius-md); border-left: 3px solid var(--color-primary);">
                            <div style="flex-shrink: 0; width: 20px; height: 20px; color: var(--color-primary); margin-top: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span style="color: var(--color-text-primary); font-weight: 500;"><?php echo esc_html( $item ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Energielösungen (Solar) -->
            <div>
                <h3 style="display: flex; align-items: center; gap: var(--spacing-sm); font-size: 1.125rem; margin-bottom: var(--spacing-md); color: var(--color-text-primary);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--color-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    Energielösungen
                </h3>
                <div style="display: flex; flex-direction: column; gap: var(--spacing-sm);">
                    <?php foreach ( $auszeichnet_solar as $item ) : ?>
                        <div style="display: flex; align-items: flex-start; gap: var(--spacing-sm); padding: var(--spacing-sm) var(--spacing-md); background: var(--color-background-alt); border-radius: var(--radius-md); border-left: 3px solid var(--color-secondary);">
                            <div style="flex-shrink: 0; width: 20px; height: 20px; color: var(--color-secondary); margin-top: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span style="color: var(--color-text-primary); font-weight: 500;"><?php echo esc_html( $item ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     UNSERE SCHWERPUNKTE
     ======================================== -->
<section class="about-schwerpunkte" aria-labelledby="schwerpunkte-title" style="padding: var(--spacing-xl) 0; background-color: var(--color-background-alt);">
    <div class="container">
        <div class="section-header" style="margin-bottom: var(--spacing-lg);">
            <span class="section-tag">Leistungsbereiche</span>
            <h2 id="schwerpunkte-title" class="section-title">Unsere Schwerpunkte</h2>
        </div>

        <div class="feature-grid feature-grid--3col">
            <?php foreach ( $schwerpunkte as $schwerpunkt ) : ?>
                <a href="<?php echo esc_url( $schwerpunkt['link'] ); ?>" class="service-card-mini service-card-mini--it" style="text-decoration: none;">
                    <div class="service-card-mini__icon">
                        <?php echo $schwerpunkt['icon']; ?>
                    </div>
                    <div class="service-card-mini__content">
                        <h3 class="service-card-mini__title"><?php echo esc_html( $schwerpunkt['title'] ); ?></h3>
                        <p class="service-card-mini__description"><?php echo esc_html( $schwerpunkt['description'] ); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================================
     FÜR WEN WIR ARBEITEN
     ======================================== -->
<section class="about-zielgruppen" aria-labelledby="zielgruppen-title" style="padding: var(--spacing-xl) 0;">
    <div class="container">
        <div class="section-header" style="margin-bottom: var(--spacing-lg); text-align: center;">
            <span class="section-tag">Zielgruppen</span>
            <h2 id="zielgruppen-title" class="section-title">Für wen wir arbeiten</h2>
        </div>

        <div class="about-zielgruppen__grid">
            <!-- IT Services & Digitale Lösungen -->
            <div>
                <h3 style="display: flex; align-items: center; gap: var(--spacing-sm); font-size: 1.25rem; margin-bottom: var(--spacing-md); color: var(--color-text-primary);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                    IT Services & Digitale Lösungen
                </h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--spacing-sm);">
                    <?php foreach ( $zielgruppen_it as $zielgruppe ) : ?>
                        <li style="display: flex; align-items: flex-start; gap: var(--spacing-sm); padding: var(--spacing-sm) var(--spacing-md); background: var(--color-background-alt); border-radius: var(--radius-md); border-left: 3px solid var(--color-primary);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 2px;">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <div>
                                <span style="color: var(--color-text-primary); font-weight: 600;"><?php echo esc_html( $zielgruppe['title'] ); ?></span>
                                <?php if ( ! empty( $zielgruppe['desc'] ) ) : ?>
                                    <span style="color: var(--color-text-secondary); font-weight: 400;"> (<?php echo esc_html( $zielgruppe['desc'] ); ?>)</span>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Energielösungen (Solar) -->
            <div>
                <h3 style="display: flex; align-items: center; gap: var(--spacing-sm); font-size: 1.25rem; margin-bottom: var(--spacing-md); color: var(--color-text-primary);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    Energielösungen
                </h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--spacing-sm);">
                    <?php foreach ( $zielgruppen_solar as $zielgruppe ) : ?>
                        <li style="display: flex; align-items: flex-start; gap: var(--spacing-sm); padding: var(--spacing-sm) var(--spacing-md); background: var(--color-background-alt); border-radius: var(--radius-md); border-left: 3px solid var(--color-secondary);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 2px;">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <div>
                                <span style="color: var(--color-text-primary); font-weight: 600;"><?php echo esc_html( $zielgruppe['title'] ); ?></span>
                                <?php if ( ! empty( $zielgruppe['desc'] ) ) : ?>
                                    <span style="color: var(--color-text-secondary); font-weight: 400;"> (<?php echo esc_html( $zielgruppe['desc'] ); ?>)</span>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     UNSERE ARBEITSWEISE
     ======================================== -->
<section class="about-arbeitsweise" aria-labelledby="arbeitsweise-title" style="padding: var(--spacing-xl) 0; background-color: var(--color-background-alt);">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <span class="section-tag">Methodik</span>
            <h2 id="arbeitsweise-title" style="font-size: 2rem; margin-top: var(--spacing-sm); margin-bottom: var(--spacing-lg);">
                Unsere Arbeitsweise
            </h2>

            <p style="font-size: 1.25rem; font-weight: 600; color: var(--color-primary); margin-bottom: var(--spacing-lg);">
                <?php echo esc_html( $arbeitsweise_title ); ?>
            </p>

            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: var(--spacing-sm); margin-bottom: var(--spacing-lg);">
                <?php foreach ( $arbeitsweise_items as $item ) : ?>
                    <span style="display: inline-flex; align-items: center; gap: 8px; padding: var(--spacing-sm) var(--spacing-md); background: var(--color-background); border-radius: var(--radius-full); border: 1px solid var(--color-border); font-weight: 500; color: var(--color-text-primary);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <?php echo esc_html( $item ); ?>
                    </span>
                <?php endforeach; ?>
            </div>

            <p style="font-size: 1rem; color: var(--color-text-secondary); font-style: italic; max-width: 600px; margin: 0 auto;">
                <?php echo esc_html( $arbeitsweise_note ); ?>
            </p>
        </div>
    </div>
</section>

<!-- ========================================
     CTA SECTION
     ======================================== -->
<section class="page-content">
    <div class="container">
        <?php
        get_template_part( 'template-parts/sections/cta-simple', null, array(
            'title'       => $cta_title,
            'description' => $cta_description,
            'button_text' => $cta_button_text,
        ) );
        ?>
    </div>
</section>

<?php get_footer(); ?>
