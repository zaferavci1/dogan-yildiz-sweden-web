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

// Hero
$hero_subtitle = get_field( 'about_hero_subtitle' ) ?: 'DataEnergie – Strukturierte IT, digitale Lösungen und nachhaltige Energie';

// Unsere Haltung
$haltung_title = get_field( 'about_haltung_title' ) ?: 'Klarheit statt Komplexität';
$haltung_text  = get_field( 'about_haltung_text' ) ?: 'In einer zunehmend digitalen Welt entstehen Risiken oft dort, wo Übersicht fehlt. Unsere Arbeit zielt darauf ab, Komplexität zu reduzieren, Risiken sichtbar zu machen und tragfähige Entscheidungen zu ermöglichen.';
$haltung_note  = get_field( 'about_haltung_note' ) ?: 'Wir glauben nicht an Standardlösungen, sondern an passende Lösungen.';

// Was uns auszeichnet
$auszeichnet_items = array(
	get_field( 'about_auszeichnet_1' ) ?: 'Strukturierte Vorgehensweise statt Ad-hoc-IT',
	get_field( 'about_auszeichnet_2' ) ?: 'Fokus auf Microsoft 365, Security & Governance',
	get_field( 'about_auszeichnet_3' ) ?: 'Eigene digitale Lösungen mit klar definiertem Nutzen',
	get_field( 'about_auszeichnet_4' ) ?: 'Kombination aus Beratung, Umsetzung und Betrieb',
	get_field( 'about_auszeichnet_5' ) ?: 'Verständnis für technische und geschäftliche Anforderungen',
	get_field( 'about_auszeichnet_6' ) ?: 'Ausrichtung auf den Schweizer Markt',
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

// Für wen wir arbeiten
$zielgruppen = array(
	get_field( 'about_zielgruppe_1' ) ?: 'KMU und Organisationen',
	get_field( 'about_zielgruppe_2' ) ?: 'IT-Leitungen und Geschäftsführungen',
	get_field( 'about_zielgruppe_3' ) ?: 'HR- und Verwaltungsabteilungen',
	get_field( 'about_zielgruppe_4' ) ?: 'Immobilienverwaltungen',
	get_field( 'about_zielgruppe_5' ) ?: 'Unternehmen mit hohen Anforderungen an Sicherheit und Struktur',
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
    <div class="container">
        <div class="about-hero__content">
            <span class="about-hero__tag">Über uns</span>
            <h1 id="about-hero-title" class="about-hero__title">Wer wir sind</h1>
            <p class="about-hero__subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
            <p class="about-hero__intro" style="margin-top: var(--spacing-md); max-width: 700px; color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; line-height: 1.7;">
                DataEnergie unterstützt Unternehmen und Immobilien mit klar strukturierten IT-Services, eigenen digitalen Lösungen und nachhaltigen Energiekonzepten. Unser Fokus liegt auf Sicherheit, Transparenz und langfristiger Betriebssicherheit.
            </p>
            <p style="margin-top: var(--spacing-sm); color: rgba(255, 255, 255, 0.7); font-style: italic;">
                Wir verbinden technisches Know-how mit unternehmerischem Denken – pragmatisch, verständlich und lösungsorientiert.
            </p>
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

        <div class="feature-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--spacing-md); max-width: 1000px; margin: 0 auto;">
            <?php foreach ( $auszeichnet_items as $item ) : ?>
                <div class="feature-list__item" style="display: flex; align-items: flex-start; gap: var(--spacing-sm); padding: var(--spacing-md); background: var(--color-background-alt); border-radius: var(--radius-md);">
                    <div style="flex-shrink: 0; width: 24px; height: 24px; color: var(--color-primary);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span style="color: var(--color-text-primary); font-weight: 500;"><?php echo esc_html( $item ); ?></span>
                </div>
            <?php endforeach; ?>
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
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="section-header" style="margin-bottom: var(--spacing-lg);">
                <span class="section-tag">Zielgruppen</span>
                <h2 id="zielgruppen-title" class="section-title">Für wen wir arbeiten</h2>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--spacing-sm);">
                <?php foreach ( $zielgruppen as $zielgruppe ) : ?>
                    <li style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm) var(--spacing-md); background: var(--color-background-alt); border-radius: var(--radius-md); border-left: 3px solid var(--color-primary);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span style="color: var(--color-text-primary); font-weight: 500;"><?php echo esc_html( $zielgruppe ); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
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
