<?php
/**
 * Template Name: Beratung & Analyse
 *
 * IT-Beratung und Analyse Dienstleistungen Seite.
 * Modern SaaS Design (Vercel/Linear Ästhetik).
 * ACF Free kompatibel mit Fallback-Werten.
 *
 * @package Dataenergie
 * @version 2.1.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'clipboard'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
	'search'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
	'target'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
	'compass'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>',
	'check-circle' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
	'bar-chart'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
	'shield'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'cloud'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>',
	'dollar-sign' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>',
	'users'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'award'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>',
);

// =============================================================================
// ACF DATEN MIT FALLBACK - ACF FREE KOMPATIBEL
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'beratung_hero_tag' ) ?: 'Beratung & Analyse';
$hero_subtitle = get_field( 'beratung_hero_subtitle' ) ?: 'Strategische IT-Beratung für nachhaltigen Unternehmenserfolg';

// Prozessschritte
$process_steps = array(
	array(
		'number' => '01',
		'icon'   => $icon_svgs['clipboard'],
		'title'  => get_field( 'beratung_step_1_title' ) ?: 'Anfrage & Erstgespräch',
		'desc'   => get_field( 'beratung_step_1_desc' ) ?: 'Erstes Kennenlernen und Erfassung Ihrer Anforderungen und Ziele in einem unverbindlichen Beratungsgespräch.',
	),
	array(
		'number' => '02',
		'icon'   => $icon_svgs['search'],
		'title'  => get_field( 'beratung_step_2_title' ) ?: 'Ist-Analyse',
		'desc'   => get_field( 'beratung_step_2_desc' ) ?: 'Detaillierte Analyse Ihrer bestehenden IT-Infrastruktur, Prozesse und Systeme.',
	),
	array(
		'number' => '03',
		'icon'   => $icon_svgs['compass'],
		'title'  => get_field( 'beratung_step_3_title' ) ?: 'Strategieentwicklung',
		'desc'   => get_field( 'beratung_step_3_desc' ) ?: 'Entwicklung einer massgeschneiderten IT-Strategie mit konkreten Handlungsempfehlungen.',
	),
	array(
		'number' => '04',
		'icon'   => $icon_svgs['check-circle'],
		'title'  => get_field( 'beratung_step_4_title' ) ?: 'Implementierung',
		'desc'   => get_field( 'beratung_step_4_desc' ) ?: 'Begleitung bei der Umsetzung und kontinuierliche Optimierung Ihrer IT-Landschaft.',
	),
);

// Beratungsleistungen
$services = array(
	array(
		'icon'        => $icon_svgs['target'],
		'title'       => get_field( 'beratung_service_1_title' ) ?: 'IT-Strategie Beratung',
		'description' => get_field( 'beratung_service_1_desc' ) ?: 'Entwicklung einer zukunftssicheren IT-Strategie, die Ihre Geschäftsziele optimal unterstützt.',
		'features'    => array_filter( array(
			get_field( 'beratung_service_1_f1' ) ?: 'Strategische IT-Roadmap',
			get_field( 'beratung_service_1_f2' ) ?: 'Technology Assessment',
			get_field( 'beratung_service_1_f3' ) ?: 'Vendor-unabhängige Beratung',
			get_field( 'beratung_service_1_f4' ) ?: 'ROI-Analyse',
		) ),
	),
	array(
		'icon'        => $icon_svgs['bar-chart'],
		'title'       => get_field( 'beratung_service_2_title' ) ?: 'Infrastruktur-Analyse',
		'description' => get_field( 'beratung_service_2_desc' ) ?: 'Umfassende Analyse Ihrer IT-Infrastruktur mit konkreten Optimierungsvorschlägen.',
		'features'    => array_filter( array(
			get_field( 'beratung_service_2_f1' ) ?: 'Netzwerk-Assessment',
			get_field( 'beratung_service_2_f2' ) ?: 'Server & Storage Analyse',
			get_field( 'beratung_service_2_f3' ) ?: 'Performance-Monitoring',
			get_field( 'beratung_service_2_f4' ) ?: 'Kapazitätsplanung',
		) ),
	),
	array(
		'icon'        => $icon_svgs['shield'],
		'title'       => get_field( 'beratung_service_3_title' ) ?: 'Security Assessment',
		'description' => get_field( 'beratung_service_3_desc' ) ?: 'Identifikation von Sicherheitslücken und Entwicklung einer robusten Security-Strategie.',
		'features'    => array_filter( array(
			get_field( 'beratung_service_3_f1' ) ?: 'Schwachstellen-Analyse',
			get_field( 'beratung_service_3_f2' ) ?: 'Penetrationstests',
			get_field( 'beratung_service_3_f3' ) ?: 'Compliance-Check',
			get_field( 'beratung_service_3_f4' ) ?: 'Security-Roadmap',
		) ),
	),
	array(
		'icon'        => $icon_svgs['cloud'],
		'title'       => get_field( 'beratung_service_4_title' ) ?: 'Cloud-Readiness Assessment',
		'description' => get_field( 'beratung_service_4_desc' ) ?: 'Analyse Ihrer Cloud-Bereitschaft und Entwicklung einer optimalen Migrationsstrategie.',
		'features'    => array_filter( array(
			get_field( 'beratung_service_4_f1' ) ?: 'Workload-Analyse',
			get_field( 'beratung_service_4_f2' ) ?: 'TCO-Berechnung',
			get_field( 'beratung_service_4_f3' ) ?: 'Migrations-Roadmap',
			get_field( 'beratung_service_4_f4' ) ?: 'Hybrid-Cloud Strategie',
		) ),
	),
	array(
		'icon'        => $icon_svgs['trending-up'],
		'title'       => get_field( 'beratung_service_5_title' ) ?: 'Digitale Transformation',
		'description' => get_field( 'beratung_service_5_desc' ) ?: 'Begleitung Ihres Unternehmens auf dem Weg zur digitalen Exzellenz.',
		'features'    => array_filter( array(
			get_field( 'beratung_service_5_f1' ) ?: 'Prozessoptimierung',
			get_field( 'beratung_service_5_f2' ) ?: 'Automatisierung',
			get_field( 'beratung_service_5_f3' ) ?: 'Change Management',
			get_field( 'beratung_service_5_f4' ) ?: 'Schulung & Enablement',
		) ),
	),
	array(
		'icon'        => $icon_svgs['dollar-sign'],
		'title'       => get_field( 'beratung_service_6_title' ) ?: 'IT-Kosten Optimierung',
		'description' => get_field( 'beratung_service_6_desc' ) ?: 'Identifikation von Einsparpotenzialen ohne Kompromisse bei Qualität und Leistung.',
		'features'    => array_filter( array(
			get_field( 'beratung_service_6_f1' ) ?: 'Lizenz-Optimierung',
			get_field( 'beratung_service_6_f2' ) ?: 'Vertragsverhandlungen',
			get_field( 'beratung_service_6_f3' ) ?: 'Konsolidierung',
			get_field( 'beratung_service_6_f4' ) ?: 'Kostencontrolling',
		) ),
	),
);

// Vorteile
$advantages = array(
	array(
		'icon'  => $icon_svgs['users'],
		'title' => 'Erfahrenes Expertenteam',
		'desc'  => 'Zertifizierte IT-Berater mit langjähriger Praxiserfahrung.',
	),
	array(
		'icon'  => $icon_svgs['target'],
		'title' => 'Massgeschneiderte Lösungen',
		'desc'  => 'Individuelle Strategien statt Standard-Konzepte.',
	),
	array(
		'icon'  => $icon_svgs['award'],
		'title' => 'Vendor-unabhängig',
		'desc'  => 'Objektive Beratung ohne versteckte Interessen.',
	),
);

// CTA Section
$cta_title       = get_field( 'beratung_cta_title' ) ?: 'Bereit für die Zukunft?';
$cta_description = get_field( 'beratung_cta_desc' ) ?: 'Vereinbaren Sie jetzt ein unverbindliches Erstgespräch und entdecken Sie Ihr IT-Potenzial.';
$cta_button_text = get_field( 'beratung_cta_button' ) ?: 'Kostenlose Erstberatung';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="beratung-services-heading">
	<div class="container">

		<!-- Intro Content -->
		<div class="page-intro">
			<div class="page-intro__content entry-content">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
				?>
			</div>
		</div>

		<!-- Process Steps -->
		<div class="process-section" aria-labelledby="process-heading">
			<h2 id="process-heading" class="section-title text-center">Unser Beratungsprozess</h2>
			<p class="section-description text-center mb-xl">In vier Schritten zu Ihrer optimalen IT-Strategie</p>

			<div class="process-steps">
				<?php foreach ( $process_steps as $index => $step ) : ?>
					<article class="process-step">
						<div class="process-step__number" aria-hidden="true"><?php echo esc_html( $step['number'] ); ?></div>
						<div class="process-step__icon" aria-hidden="true">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized above
							echo $step['icon'];
							?>
						</div>
						<h3 class="process-step__title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="process-step__desc"><?php echo esc_html( $step['desc'] ); ?></p>
						<?php if ( $index < count( $process_steps ) - 1 ) : ?>
							<div class="process-step__connector" aria-hidden="true"></div>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Advantages -->
		<div class="advantages-section">
			<div class="advantages-grid">
				<?php foreach ( $advantages as $advantage ) : ?>
					<div class="advantage-card">
						<div class="advantage-card__icon" aria-hidden="true">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized above
							echo $advantage['icon'];
							?>
						</div>
						<div class="advantage-card__content">
							<h3 class="advantage-card__title"><?php echo esc_html( $advantage['title'] ); ?></h3>
							<p class="advantage-card__text"><?php echo esc_html( $advantage['desc'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Services Grid -->
		<h2 id="beratung-services-heading" class="section-title text-center mt-xl">Unsere Beratungsleistungen</h2>
		<p class="section-description text-center mb-xl">Umfassende IT-Beratung für Ihren Erfolg</p>

		<div class="feature-grid feature-grid--3col">
			<?php foreach ( $services as $service ) : ?>
				<?php
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => $service['icon'],
					'title'       => $service['title'],
					'description' => $service['description'],
					'features'    => $service['features'],
					'variant'     => 'it',
				) );
				?>
			<?php endforeach; ?>
		</div>

		<!-- CTA -->
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
