<?php
/**
 * Template Name: Solar Installation
 *
 * Solar Kurulum sayfası - Modern SaaS tasarım.
 * Vercel/Linear design estetiğinde.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 2.1.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'tool'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
	'shield' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'check'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
	'clock'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'install_hero_tag' ) ?: 'Solar Installation';
$hero_subtitle = get_field( 'install_hero_subtitle' ) ?: 'Professionelle Montage durch zertifizierte Experten';

// Stats
$stats = array(
	array(
		'number' => get_field( 'install_stat_1_number' ) ?: '500+',
		'label'  => get_field( 'install_stat_1_label' ) ?: 'Installationen',
	),
	array(
		'number' => get_field( 'install_stat_2_number' ) ?: '15+',
		'label'  => get_field( 'install_stat_2_label' ) ?: 'Jahre Erfahrung',
	),
	array(
		'number' => get_field( 'install_stat_3_number' ) ?: '100%',
		'label'  => get_field( 'install_stat_3_label' ) ?: 'Kundenzufriedenheit',
	),
	array(
		'number' => get_field( 'install_stat_4_number' ) ?: '48h',
		'label'  => get_field( 'install_stat_4_label' ) ?: 'Durchschnittliche Montagezeit',
	),
);

// Services Section
$services_title = get_field( 'install_services_title' ) ?: 'Komplettservice für Ihre Solaranlage';
$services_desc  = get_field( 'install_services_description' ) ?: 'Von der Planung bis zur Inbetriebnahme – professionell und zuverlässig.';

// Service 1
$service_1_icon_key = get_field( 'install_service_1_icon' ) ?: 'tool';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['tool'],
	'title'       => get_field( 'install_service_1_title' ) ?: 'Professionelle Montage',
	'description' => get_field( 'install_service_1_description' ) ?: 'Unsere zertifizierten Installateure montieren Ihre Anlage fachgerecht und sicher.',
	'features'    => array_filter( array(
		get_field( 'install_service_1_feature_1' ) ?: 'Aufdach & Indach-Systeme',
		get_field( 'install_service_1_feature_2' ) ?: 'Flachdach-Lösungen',
		get_field( 'install_service_1_feature_3' ) ?: 'Fassadeninstallation',
		get_field( 'install_service_1_feature_4' ) ?: 'Carport & Terrassenüberdachung',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'install_service_2_icon' ) ?: 'shield';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['shield'],
	'title'       => get_field( 'install_service_2_title' ) ?: 'Qualitätsgarantie',
	'description' => get_field( 'install_service_2_description' ) ?: 'Wir verwenden nur hochwertige Komponenten namhafter Hersteller.',
	'features'    => array_filter( array(
		get_field( 'install_service_2_feature_1' ) ?: 'Premium-Solarmodule',
		get_field( 'install_service_2_feature_2' ) ?: 'Hochwertige Wechselrichter',
		get_field( 'install_service_2_feature_3' ) ?: '25 Jahre Modulgarantie',
		get_field( 'install_service_2_feature_4' ) ?: '10 Jahre Installationsgarantie',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'install_service_3_icon' ) ?: 'check';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['check'],
	'title'       => get_field( 'install_service_3_title' ) ?: 'Schlüsselfertige Übergabe',
	'description' => get_field( 'install_service_3_description' ) ?: 'Von der Bewilligung bis zur Inbetriebnahme – alles aus einer Hand.',
	'features'    => array_filter( array(
		get_field( 'install_service_3_feature_1' ) ?: 'Baubewilligung',
		get_field( 'install_service_3_feature_2' ) ?: 'Netzanschluss',
		get_field( 'install_service_3_feature_3' ) ?: 'Anmeldung beim EVU',
		get_field( 'install_service_3_feature_4' ) ?: 'Inbetriebnahme & Einweisung',
	) ),
);

// Service 4
$service_4_icon_key = get_field( 'install_service_4_icon' ) ?: 'clock';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['clock'],
	'title'       => get_field( 'install_service_4_title' ) ?: 'Schnelle Umsetzung',
	'description' => get_field( 'install_service_4_description' ) ?: 'Effiziente Projektabwicklung für eine zeitnahe Inbetriebnahme.',
	'features'    => array_filter( array(
		get_field( 'install_service_4_feature_1' ) ?: 'Kurze Planungszeit',
		get_field( 'install_service_4_feature_2' ) ?: 'Termingerechte Montage',
		get_field( 'install_service_4_feature_3' ) ?: 'Minimale Bauzeit',
		get_field( 'install_service_4_feature_4' ) ?: 'Sofortige Stromproduktion',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

// Timeline
$timeline_title = get_field( 'install_timeline_title' ) ?: 'Ihre Installation in 5 Schritten';
$timeline_items = array(
	array(
		'title' => get_field( 'install_timeline_1_title' ) ?: 'Beratung & Planung',
		'text'  => get_field( 'install_timeline_1_text' ) ?: 'Individuelle Beratung und detaillierte Anlagenplanung.',
	),
	array(
		'title' => get_field( 'install_timeline_2_title' ) ?: 'Bewilligung',
		'text'  => get_field( 'install_timeline_2_text' ) ?: 'Wir kümmern uns um alle notwendigen Bewilligungen.',
	),
	array(
		'title' => get_field( 'install_timeline_3_title' ) ?: 'Materiallieferung',
		'text'  => get_field( 'install_timeline_3_text' ) ?: 'Termingerechte Lieferung aller Komponenten.',
	),
	array(
		'title' => get_field( 'install_timeline_4_title' ) ?: 'Montage',
		'text'  => get_field( 'install_timeline_4_text' ) ?: 'Professionelle Installation durch unser Expertenteam.',
	),
	array(
		'title' => get_field( 'install_timeline_5_title' ) ?: 'Inbetriebnahme',
		'text'  => get_field( 'install_timeline_5_text' ) ?: 'Netzanschluss, Tests und Übergabe an Sie.',
	),
);

// CTA Section
$cta_title       = get_field( 'install_cta_title' ) ?: 'Bereit für die Installation?';
$cta_description = get_field( 'install_cta_description' ) ?: 'Kontaktieren Sie uns für ein unverbindliches Angebot.';
$cta_button_text = get_field( 'install_cta_button_text' ) ?: 'Offerte anfordern';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
	'variant'  => 'solar',
) );
?>

<!-- Stats Section -->
<section class="solar-stats">
	<div class="container">
		<div class="stats-grid">
			<?php foreach ( $stats as $stat ) : ?>
				<div class="stat-card">
					<span class="stat-card__number"><?php echo esc_html( $stat['number'] ); ?></span>
					<span class="stat-card__label"><?php echo esc_html( $stat['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Services Grid -->
<section class="solar-services" aria-labelledby="services-heading">
	<div class="container">
		<div class="section-header">
			<span class="section-tag section-tag--solar">Unsere Leistungen</span>
			<h2 id="services-heading" class="section-title"><?php echo esc_html( $services_title ); ?></h2>
			<p class="section-description"><?php echo esc_html( $services_desc ); ?></p>
		</div>

		<div class="feature-grid feature-grid--2col">
			<?php foreach ( $services as $service ) : ?>
				<?php
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => $service['icon'],
					'title'       => $service['title'],
					'description' => $service['description'],
					'features'    => $service['features'],
					'variant'     => 'default',
				) );
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Timeline Section -->
<section class="solar-timeline" aria-labelledby="timeline-heading">
	<div class="container">
		<div class="section-header">
			<span class="section-tag section-tag--solar">Ablauf</span>
			<h2 id="timeline-heading" class="section-title"><?php echo esc_html( $timeline_title ); ?></h2>
		</div>

		<div class="timeline">
			<?php foreach ( $timeline_items as $index => $item ) : ?>
				<div class="timeline__item">
					<div class="timeline__marker"><?php echo esc_html( $index + 1 ); ?></div>
					<div class="timeline__content">
						<h3 class="timeline__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="timeline__text"><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="solar-cta">
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
