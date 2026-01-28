<?php
/**
 * Template Name: Smart Building
 *
 * Smart Building Solutions (WashSlot) hizmetleri sayfası.
 * Vercel/Linear design estetiğinde tasarlanmıştır.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 1.0.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'home'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
	'calendar'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
	'smartphone' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>',
	'droplet'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>',
	'credit-card'=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>',
	'settings'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'sb_hero_tag' ) ?: 'Business Solutions';
$hero_subtitle = get_field( 'sb_hero_subtitle' ) ?: 'Intelligente Buchungssysteme für Gemeinschaftsräume und Waschküchen';

// Service 1
$service_1_icon_key = get_field( 'sb_service_1_icon' ) ?: 'droplet';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['droplet'],
	'title'       => get_field( 'sb_service_1_title' ) ?: 'WashSlot Waschküchen-Buchung',
	'description' => get_field( 'sb_service_1_description' ) ?: 'Digitales Buchungssystem für Waschküchen in Mehrfamilienhäusern. Schluss mit Konflikten und handschriftlichen Listen.',
	'features'    => array_filter( array(
		get_field( 'sb_service_1_feature_1' ) ?: 'Online-Buchung via App',
		get_field( 'sb_service_1_feature_2' ) ?: 'Automatische Erinnerungen',
		get_field( 'sb_service_1_feature_3' ) ?: 'Konfliktfreie Zeitslots',
		get_field( 'sb_service_1_feature_4' ) ?: 'Buchungshistorie',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'sb_service_2_icon' ) ?: 'home';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['home'],
	'title'       => get_field( 'sb_service_2_title' ) ?: 'Gemeinschaftsraum-Buchung',
	'description' => get_field( 'sb_service_2_description' ) ?: 'Einfache Reservierung von Gemeinschaftsräumen, Sitzungszimmern oder Hobbyräumen für alle Bewohner.',
	'features'    => array_filter( array(
		get_field( 'sb_service_2_feature_1' ) ?: 'Raumverwaltung',
		get_field( 'sb_service_2_feature_2' ) ?: 'Kapazitätsplanung',
		get_field( 'sb_service_2_feature_3' ) ?: 'Nutzungsregeln',
		get_field( 'sb_service_2_feature_4' ) ?: 'Verfügbarkeitsanzeige',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'sb_service_3_icon' ) ?: 'smartphone';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['smartphone'],
	'title'       => get_field( 'sb_service_3_title' ) ?: 'Mobile App & Benachrichtigungen',
	'description' => get_field( 'sb_service_3_description' ) ?: 'Benutzerfreundliche App für alle Bewohner mit Push-Benachrichtigungen und automatischen Erinnerungen.',
	'features'    => array_filter( array(
		get_field( 'sb_service_3_feature_1' ) ?: 'iOS & Android App',
		get_field( 'sb_service_3_feature_2' ) ?: 'Push-Benachrichtigungen',
		get_field( 'sb_service_3_feature_3' ) ?: 'Kalender-Integration',
		get_field( 'sb_service_3_feature_4' ) ?: 'Mehrsprachig',
	) ),
);

// Service 4
$service_4_icon_key = get_field( 'sb_service_4_icon' ) ?: 'settings';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['settings'],
	'title'       => get_field( 'sb_service_4_title' ) ?: 'Verwaltung & Abrechnung',
	'description' => get_field( 'sb_service_4_description' ) ?: 'Zentrale Verwaltungsoberfläche für Hauswarte und Immobilienverwaltungen mit Nutzungsstatistiken.',
	'features'    => array_filter( array(
		get_field( 'sb_service_4_feature_1' ) ?: 'Admin-Dashboard',
		get_field( 'sb_service_4_feature_2' ) ?: 'Nutzungsstatistiken',
		get_field( 'sb_service_4_feature_3' ) ?: 'Kostenumlage',
		get_field( 'sb_service_4_feature_4' ) ?: 'Multi-Liegenschaft',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

// CTA Section
$cta_title       = get_field( 'sb_cta_title' ) ?: 'Interesse an Smart Building Lösungen?';
$cta_description = get_field( 'sb_cta_description' ) ?: 'Wir beraten Sie gerne zu WashSlot und weiteren digitalen Lösungen für Ihre Liegenschaft.';
$cta_button_text = get_field( 'sb_cta_button_text' ) ?: 'Beratung anfordern';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
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
		<h2 id="services-heading" class="sr-only">Unsere Smart Building Lösungen</h2>
		<div class="feature-grid feature-grid--2col">
			<?php foreach ( $services as $service ) : ?>
				<?php
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => $service['icon'],
					'title'       => $service['title'],
					'description' => $service['description'],
					'features'    => $service['features'],
					'variant'     => 'it',
					'expandable'  => true,
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
