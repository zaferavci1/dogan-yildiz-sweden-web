<?php
/**
 * Template Name: Wartung
 *
 * Wartungsservice (Bakım Hizmetleri) sayfası - Modern SaaS tasarım.
 * Solar panel bakım ve izleme hizmetleri.
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
	'tool'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
	'search'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
	'activity'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>',
	'settings'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'wartung_hero_tag' ) ?: 'Wartung';
$hero_subtitle = get_field( 'wartung_hero_subtitle' ) ?: 'Professionelle Wartung für maximale Leistung Ihrer Solaranlage';

// Service 1 - Regelmässige Wartung
$service_1_icon_key = get_field( 'wartung_service_1_icon' ) ?: 'tool';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['tool'],
	'title'       => get_field( 'wartung_service_1_title' ) ?: '',
	'description' => get_field( 'wartung_service_1_description' ) ?: 'Planmässige Wartungsarbeiten für optimale Anlagenleistung.',
	'features'    => array_filter( array(
		get_field( 'wartung_service_1_feature_1' ) ?: 'Jährliche Inspektion',
		get_field( 'wartung_service_1_feature_2' ) ?: 'Komponententest',
		get_field( 'wartung_service_1_feature_3' ) ?: 'Sicherheitsprüfung',
		get_field( 'wartung_service_1_feature_4' ) ?: 'Dokumentation',
	) ),
);

// Service 2 - Anlageninspektion
$service_2_icon_key = get_field( 'wartung_service_2_icon' ) ?: 'search';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['search'],
	'title'       => get_field( 'wartung_service_2_title' ) ?: 'Anlageninspektion',
	'description' => get_field( 'wartung_service_2_description' ) ?: 'Gründliche Überprüfung aller Komponenten.',
	'features'    => array_filter( array(
		get_field( 'wartung_service_2_feature_1' ) ?: 'Thermografie',
		get_field( 'wartung_service_2_feature_2' ) ?: 'Kabelprüfung',
		get_field( 'wartung_service_2_feature_3' ) ?: 'Modulinspektion',
		get_field( 'wartung_service_2_feature_4' ) ?: 'Wechselrichtertest',
	) ),
);

// Service 3 - Leistungsüberwachung
$service_3_icon_key = get_field( 'wartung_service_3_icon' ) ?: 'activity';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['activity'],
	'title'       => get_field( 'wartung_service_3_title' ) ?: 'Leistungsüberwachung',
	'description' => get_field( 'wartung_service_3_description' ) ?: 'Kontinuierliches Monitoring Ihrer Solaranlage.',
	'features'    => array_filter( array(
		get_field( 'wartung_service_3_feature_1' ) ?: 'Echtzeit-Monitoring',
		get_field( 'wartung_service_3_feature_2' ) ?: 'Ertragsanalyse',
		get_field( 'wartung_service_3_feature_3' ) ?: 'Störungsmeldung',
		get_field( 'wartung_service_3_feature_4' ) ?: 'Leistungsberichte',
	) ),
);

// Service 4 - Reparatur & Austausch
$service_4_icon_key = get_field( 'wartung_service_4_icon' ) ?: 'settings';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['settings'],
	'title'       => get_field( 'wartung_service_4_title' ) ?: 'Reparatur & Austausch',
	'description' => get_field( 'wartung_service_4_description' ) ?: 'Schnelle Reparaturen und Ersatzteilservice.',
	'features'    => array_filter( array(
		get_field( 'wartung_service_4_feature_1' ) ?: 'Modulaustausch',
		get_field( 'wartung_service_4_feature_2' ) ?: 'Wechselrichtertausch',
		get_field( 'wartung_service_4_feature_3' ) ?: 'Kabelreparatur',
		get_field( 'wartung_service_4_feature_4' ) ?: 'Schnellservice',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

// CTA Section
$cta_title       = get_field( 'wartung_cta_title' ) ?: 'Maximale Leistung, minimale Ausfälle';
$cta_description = get_field( 'wartung_cta_description' ) ?: 'Kontaktieren Sie uns für einen Wartungsvertrag.';
$cta_button_text = get_field( 'wartung_cta_button_text' ) ?: 'Wartung anfragen';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
	'variant'  => 'default',
) );
?>

<section class="page-content" aria-labelledby="services-heading">
	<div class="container">

		<!-- Intro -->
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

		<!-- Services Grid -->
		<h2 id="services-heading" class="sr-only">Unsere Wartungsdienstleistungen</h2>
		<div class="feature-grid feature-grid--4col">
			<?php foreach ( $services as $service ) : ?>
				<?php
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => $service['icon'],
					'title'       => $service['title'],
					'description' => $service['description'],
					'features'    => $service['features'],
					'variant'     => 'solar',
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
