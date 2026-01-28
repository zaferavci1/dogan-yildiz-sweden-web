<?php
/**
 * Template Name: Workforce Management
 *
 * Workforce Management & Zeiterfassung hizmetleri sayfası.
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
	'clock'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
	'users'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'calendar'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
	'clipboard'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
	'bar-chart'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
	'smartphone' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'wfm_hero_tag' ) ?: 'Business Solutions';
$hero_subtitle = get_field( 'wfm_hero_subtitle' ) ?: 'Digitale Zeiterfassung und Mitarbeiterverwaltung für Ihr Unternehmen';

// Service 1
$service_1_icon_key = get_field( 'wfm_service_1_icon' ) ?: 'clock';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['clock'],
	'title'       => get_field( 'wfm_service_1_title' ) ?: 'Digitale Zeiterfassung',
	'description' => get_field( 'wfm_service_1_description' ) ?: 'Moderne und rechtskonforme Zeiterfassung für alle Mitarbeiter. Einfache Bedienung via Web, Terminal oder mobiler App.',
	'features'    => array_filter( array(
		get_field( 'wfm_service_1_feature_1' ) ?: 'Web-basierte Stempeluhr',
		get_field( 'wfm_service_1_feature_2' ) ?: 'Mobile App für Aussendienst',
		get_field( 'wfm_service_1_feature_3' ) ?: 'Hardware-Terminals',
		get_field( 'wfm_service_1_feature_4' ) ?: 'Gesetzeskonforme Erfassung',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'wfm_service_2_icon' ) ?: 'calendar';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['calendar'],
	'title'       => get_field( 'wfm_service_2_title' ) ?: 'Absenzen & Ferien',
	'description' => get_field( 'wfm_service_2_description' ) ?: 'Übersichtliche Verwaltung von Ferien, Krankheit und anderen Abwesenheiten mit automatischen Genehmigungsworkflows.',
	'features'    => array_filter( array(
		get_field( 'wfm_service_2_feature_1' ) ?: 'Ferienplanung & Anträge',
		get_field( 'wfm_service_2_feature_2' ) ?: 'Krankheitsmeldungen',
		get_field( 'wfm_service_2_feature_3' ) ?: 'Genehmigungsworkflows',
		get_field( 'wfm_service_2_feature_4' ) ?: 'Saldo-Übersicht',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'wfm_service_3_icon' ) ?: 'users';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['users'],
	'title'       => get_field( 'wfm_service_3_title' ) ?: 'Personalplanung',
	'description' => get_field( 'wfm_service_3_description' ) ?: 'Effiziente Schicht- und Einsatzplanung. Ressourcen optimal einsetzen und Engpässe frühzeitig erkennen.',
	'features'    => array_filter( array(
		get_field( 'wfm_service_3_feature_1' ) ?: 'Schichtplanung',
		get_field( 'wfm_service_3_feature_2' ) ?: 'Ressourcenübersicht',
		get_field( 'wfm_service_3_feature_3' ) ?: 'Skill-Management',
		get_field( 'wfm_service_3_feature_4' ) ?: 'Kapazitätsplanung',
	) ),
);

// Service 4
$service_4_icon_key = get_field( 'wfm_service_4_icon' ) ?: 'bar-chart';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['bar-chart'],
	'title'       => get_field( 'wfm_service_4_title' ) ?: 'Reporting & Analytics',
	'description' => get_field( 'wfm_service_4_description' ) ?: 'Detaillierte Auswertungen und Berichte für bessere Entscheidungen. Export für Lohnbuchhaltung und Controlling.',
	'features'    => array_filter( array(
		get_field( 'wfm_service_4_feature_1' ) ?: 'Arbeitszeit-Reports',
		get_field( 'wfm_service_4_feature_2' ) ?: 'Überstunden-Analyse',
		get_field( 'wfm_service_4_feature_3' ) ?: 'Lohnexport-Schnittstelle',
		get_field( 'wfm_service_4_feature_4' ) ?: 'Dashboard & KPIs',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

// CTA Section
$cta_title       = get_field( 'wfm_cta_title' ) ?: 'Bereit für effizientes Workforce Management?';
$cta_description = get_field( 'wfm_cta_description' ) ?: 'Wir zeigen Ihnen, wie Sie Zeiterfassung und Personalplanung digitalisieren können.';
$cta_button_text = get_field( 'wfm_cta_button_text' ) ?: 'Demo anfordern';
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
		<h2 id="services-heading" class="sr-only">Unsere Workforce Management Lösungen</h2>
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
