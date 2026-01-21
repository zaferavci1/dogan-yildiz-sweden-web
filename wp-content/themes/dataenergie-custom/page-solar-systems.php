<?php
/**
 * Template Name: Solar Systems
 *
 * Modern SaaS Solar Sistemleri sayfası.
 * Vercel/Linear design estetiğinde tasarlanmıştır.
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
	'sun'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>',
	'battery' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="6" width="18" height="12" rx="2" ry="2"></rect><line x1="23" y1="13" x2="23" y2="11"></line><line x1="6" y1="10" x2="6" y2="14"></line><line x1="10" y1="10" x2="10" y2="14"></line></svg>',
	'zap'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'solar_sys_hero_tag' ) ?: 'Renewable Energy';
$hero_subtitle = get_field( 'solar_sys_hero_subtitle' ) ?: 'Nachhaltige Energielösungen für Ihre Zukunft';

// Service 1
$service_1_icon_key = get_field( 'solar_sys_service_1_icon' ) ?: 'sun';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['sun'],
	'title'       => get_field( 'solar_sys_service_1_title' ) ?: 'Photovoltaik Anlagen',
	'description' => get_field( 'solar_sys_service_1_description' ) ?: 'Produzieren Sie Ihren eigenen Strom. Wir planen und installieren Photovoltaikanlagen für Einfamilienhäuser, Gewerbe und Industrie.',
	'features'    => array_filter( array(
		get_field( 'solar_sys_service_1_feature_1' ) ?: 'Individuelle Planung & Auslegung',
		get_field( 'solar_sys_service_1_feature_2' ) ?: 'Hochleistungs-Module',
		get_field( 'solar_sys_service_1_feature_3' ) ?: 'Dachintegration & Aufdach',
		get_field( 'solar_sys_service_1_feature_4' ) ?: 'Schlüsselfertige Installation',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'solar_sys_service_2_icon' ) ?: 'battery';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['battery'],
	'title'       => get_field( 'solar_sys_service_2_title' ) ?: 'Stromspeicher',
	'description' => get_field( 'solar_sys_service_2_description' ) ?: 'Maximieren Sie Ihren Eigenverbrauch. Mit modernen Batteriespeichern nutzen Sie Ihren Solarstrom auch nachts oder bei schlechtem Wetter.',
	'features'    => array_filter( array(
		get_field( 'solar_sys_service_2_feature_1' ) ?: 'Lithium-Ionen Technologie',
		get_field( 'solar_sys_service_2_feature_2' ) ?: 'Notstromfähigkeit',
		get_field( 'solar_sys_service_2_feature_3' ) ?: 'Intelligentes Energiemanagement',
		get_field( 'solar_sys_service_2_feature_4' ) ?: 'Unabhängigkeit vom Stromnetz',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'solar_sys_service_3_icon' ) ?: 'zap';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['zap'],
	'title'       => get_field( 'solar_sys_service_3_title' ) ?: 'E-Mobilität',
	'description' => get_field( 'solar_sys_service_3_description' ) ?: 'Tanken Sie Sonne. Wir installieren Ladestationen (Wallboxen) für Ihr Elektroauto, perfekt integriert in Ihr Energiesystem.',
	'features'    => array_filter( array(
		get_field( 'solar_sys_service_3_feature_1' ) ?: 'Wallbox Installation',
		get_field( 'solar_sys_service_3_feature_2' ) ?: 'Intelligente Ladesteuerung',
		get_field( 'solar_sys_service_3_feature_3' ) ?: 'PV-Überschussladen',
		get_field( 'solar_sys_service_3_feature_4' ) ?: 'Lastmanagement',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3 );

// Projects Section
$projects_title       = get_field( 'solar_sys_projects_title' ) ?: 'Unsere Projekte';
$projects_description = get_field( 'solar_sys_projects_description' ) ?: 'Ausgewählte Photovoltaik-Projekte unserer Kunden';
$projects_count       = get_field( 'solar_sys_projects_count' ) ?: 3;

// CTA Section
$cta_title       = get_field( 'solar_sys_cta_title' ) ?: 'Interessiert an einer Solaranlage?';
$cta_description = get_field( 'solar_sys_cta_description' ) ?: 'Fordern Sie jetzt Ihre unverbindliche Offerte an.';
$cta_button_text = get_field( 'solar_sys_cta_button_text' ) ?: 'Offerte anfordern';
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
		<h2 id="services-heading" class="sr-only">Unsere Solar-Lösungen</h2>
		<div class="feature-grid feature-grid--3col">
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

<?php
// Projects Grid Section
get_template_part( 'template-parts/sections/projects-grid', null, array(
	'title'          => $projects_title,
	'description'    => $projects_description,
	'category'       => 'solar',
	'posts_per_page' => $projects_count,
) );
?>

<section class="page-content">
	<div class="container">
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
