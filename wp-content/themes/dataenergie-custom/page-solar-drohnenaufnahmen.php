<?php
/**
 * Template Name: Solar Drohnenaufnahmen
 *
 * Drohnenaufnahmen sayfası - Modern SaaS tasarım.
 * Vercel/Linear design estetiğinde.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 2.1.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP (Feather Icons)
// =============================================================================
$icon_svgs = array(
	'map'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>',
	'thermometer'=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"></path></svg>',
	'box'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
	'clipboard'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'drohnen_hero_tag' ) ?: 'Drohnenaufnahmen';
$hero_subtitle = get_field( 'drohnen_hero_subtitle' ) ?: 'Präzise Dachvermessung und Anlageninspektion aus der Luft';

// Stats
$stats = array(
	array(
		'number' => get_field( 'drohnen_stat_1_number' ) ?: '200+',
		'label'  => get_field( 'drohnen_stat_1_label' ) ?: 'Drohnenflüge',
	),
	array(
		'number' => get_field( 'drohnen_stat_2_number' ) ?: '50\'000+',
		'label'  => get_field( 'drohnen_stat_2_label' ) ?: 'm² vermessen',
	),
	array(
		'number' => get_field( 'drohnen_stat_3_number' ) ?: '±2cm',
		'label'  => get_field( 'drohnen_stat_3_label' ) ?: 'Messgenauigkeit',
	),
	array(
		'number' => get_field( 'drohnen_stat_4_number' ) ?: '24h',
		'label'  => get_field( 'drohnen_stat_4_label' ) ?: 'Datenlieferung',
	),
);

// Services Section
$services_title = get_field( 'drohnen_services_title' ) ?: 'Modernste Drohnentechnologie';
$services_desc  = get_field( 'drohnen_services_description' ) ?: 'Hochauflösende Aufnahmen und präzise Vermessung für optimale Anlagenplanung.';

// Service 1 - Dachvermessung
$service_1_icon_key = get_field( 'drohnen_service_1_icon' ) ?: 'map';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['map'],
	'title'       => get_field( 'drohnen_service_1_title' ) ?: 'Dachvermessung',
	'description' => get_field( 'drohnen_service_1_description' ) ?: 'Exakte Vermessung Ihrer Dachfläche für präzise Anlagenplanung.',
	'features'    => array_filter( array(
		get_field( 'drohnen_service_1_feature_1' ) ?: 'Flächenberechnung',
		get_field( 'drohnen_service_1_feature_2' ) ?: 'Neigungswinkel',
		get_field( 'drohnen_service_1_feature_3' ) ?: 'Himmelsrichtung',
		get_field( 'drohnen_service_1_feature_4' ) ?: 'Hinderniserkennung',
	) ),
);

// Service 2 - Thermografie
$service_2_icon_key = get_field( 'drohnen_service_2_icon' ) ?: 'thermometer';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['thermometer'],
	'title'       => get_field( 'drohnen_service_2_title' ) ?: 'Thermografie',
	'description' => get_field( 'drohnen_service_2_description' ) ?: 'Wärmebildaufnahmen zur Erkennung von Defekten und Leistungsverlusten.',
	'features'    => array_filter( array(
		get_field( 'drohnen_service_2_feature_1' ) ?: 'Wärmebildaufnahmen',
		get_field( 'drohnen_service_2_feature_2' ) ?: 'Moduldefekte erkennen',
		get_field( 'drohnen_service_2_feature_3' ) ?: 'Hotspot-Erkennung',
		get_field( 'drohnen_service_2_feature_4' ) ?: 'Leistungscheck',
	) ),
);

// Service 3 - 3D-Modellierung
$service_3_icon_key = get_field( 'drohnen_service_3_icon' ) ?: 'box';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['box'],
	'title'       => get_field( 'drohnen_service_3_title' ) ?: '3D-Modellierung',
	'description' => get_field( 'drohnen_service_3_description' ) ?: 'Detaillierte 3D-Modelle für Visualisierung und Simulation.',
	'features'    => array_filter( array(
		get_field( 'drohnen_service_3_feature_1' ) ?: 'Punktwolken-Erstellung',
		get_field( 'drohnen_service_3_feature_2' ) ?: 'CAD-Export',
		get_field( 'drohnen_service_3_feature_3' ) ?: 'Verschattungsanalyse',
		get_field( 'drohnen_service_3_feature_4' ) ?: 'Ertragssimulation',
	) ),
);

// Service 4 - Dokumentation
$service_4_icon_key = get_field( 'drohnen_service_4_icon' ) ?: 'clipboard';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['clipboard'],
	'title'       => get_field( 'drohnen_service_4_title' ) ?: 'Dokumentation',
	'description' => get_field( 'drohnen_service_4_description' ) ?: 'Umfassende Dokumentation für Planung und Wartung.',
	'features'    => array_filter( array(
		get_field( 'drohnen_service_4_feature_1' ) ?: 'HD-Aufnahmen',
		get_field( 'drohnen_service_4_feature_2' ) ?: 'Schadensprotokoll',
		get_field( 'drohnen_service_4_feature_3' ) ?: 'Zustandsbericht',
		get_field( 'drohnen_service_4_feature_4' ) ?: 'Digitales Archiv',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

// Timeline
$timeline_title = get_field( 'drohnen_timeline_title' ) ?: 'So läuft Ihr Drohnenflug ab';
$timeline_items = array(
	array(
		'title' => get_field( 'drohnen_timeline_1_title' ) ?: 'Terminplanung',
		'text'  => get_field( 'drohnen_timeline_1_text' ) ?: 'Abstimmung des optimalen Flugtermins und Wetterbedingungen.',
	),
	array(
		'title' => get_field( 'drohnen_timeline_2_title' ) ?: 'Drohnenflug',
		'text'  => get_field( 'drohnen_timeline_2_text' ) ?: 'Professioneller Überflug mit zertifizierten Piloten.',
	),
	array(
		'title' => get_field( 'drohnen_timeline_3_title' ) ?: 'Datenaufnahme',
		'text'  => get_field( 'drohnen_timeline_3_text' ) ?: 'Hochauflösende Foto- und Videoaufnahmen.',
	),
	array(
		'title' => get_field( 'drohnen_timeline_4_title' ) ?: 'Auswertung',
		'text'  => get_field( 'drohnen_timeline_4_text' ) ?: 'Analyse der Aufnahmen und Erstellung der 3D-Modelle.',
	),
	array(
		'title' => get_field( 'drohnen_timeline_5_title' ) ?: 'Berichterstattung',
		'text'  => get_field( 'drohnen_timeline_5_text' ) ?: 'Übergabe aller Daten und detaillierter Bericht.',
	),
);

// CTA Section
$cta_title       = get_field( 'drohnen_cta_title' ) ?: 'Drohnenflug buchen';
$cta_description = get_field( 'drohnen_cta_description' ) ?: 'Kontaktieren Sie uns für präzise Dachvermessung und Inspektion.';
$cta_button_text = get_field( 'drohnen_cta_button_text' ) ?: 'Termin anfragen';
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
