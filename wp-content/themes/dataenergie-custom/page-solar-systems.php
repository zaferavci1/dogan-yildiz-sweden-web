<?php
/**
 * Template Name: Solar Systems
 *
 * Modern SaaS Solar Sistemleri sayfası.
 * Vercel/Linear design estetiğinde tasarlanmıştır.
 * ACF Free uyumlu - Tüm içerikler ACF ile yönetilebilir.
 *
 * @package Dataenergie
 * @version 3.0.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'clipboard' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>',
	'tool'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
	'camera'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>',
	'droplet'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>',
);

// =============================================================================
// ACF VERİLERİNİ AL (FALLBACK İLE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'solar_sys_hero_tag' ) ?: 'Solar Services';
$hero_subtitle = get_field( 'solar_sys_hero_subtitle' ) ?: 'Von der Planung bis zur Wartung – Ihr Partner für Photovoltaik';

// Service 1 - Planung & Engineering
$service_1_icon = get_field( 'solar_sys_service_1_icon' ) ?: 'clipboard';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon ] ?? $icon_svgs['clipboard'],
	'title'       => get_field( 'solar_sys_service_1_title' ) ?: 'Planung & Engineering',
	'description' => get_field( 'solar_sys_service_1_description' ) ?: 'Professionelle PV-Anlagenplanung und Engineering-Dienstleistungen für optimale Erträge.',
	'features'    => array_filter( array(
		get_field( 'solar_sys_service_1_feature_1' ) ?: 'Dachanalyse & Standortbewertung',
		get_field( 'solar_sys_service_1_feature_2' ) ?: 'Ertragsberechnung & Simulation',
		get_field( 'solar_sys_service_1_feature_3' ) ?: 'Genehmigungen & Dokumentation',
		get_field( 'solar_sys_service_1_feature_4' ) ?: 'Technische Auslegung',
	) ),
	'link'        => get_field( 'solar_sys_service_1_link' ) ?: home_url( '/solar-systems/planung/' ),
);

// Service 2 - Installation
$service_2_icon = get_field( 'solar_sys_service_2_icon' ) ?: 'tool';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon ] ?? $icon_svgs['tool'],
	'title'       => get_field( 'solar_sys_service_2_title' ) ?: 'Installation',
	'description' => get_field( 'solar_sys_service_2_description' ) ?: 'Fachgerechte Montage und Installation Ihrer Photovoltaikanlage durch erfahrene Experten.',
	'features'    => array_filter( array(
		get_field( 'solar_sys_service_2_feature_1' ) ?: 'Dach- und Freiflächenmontage',
		get_field( 'solar_sys_service_2_feature_2' ) ?: 'Elektroinstallation',
		get_field( 'solar_sys_service_2_feature_3' ) ?: 'Wechselrichter-Integration',
		get_field( 'solar_sys_service_2_feature_4' ) ?: 'Inbetriebnahme & Übergabe',
	) ),
	'link'        => get_field( 'solar_sys_service_2_link' ) ?: home_url( '/solar-systems/installation/' ),
);

// Service 3 - Drohnenaufnahmen
$service_3_icon = get_field( 'solar_sys_service_3_icon' ) ?: 'camera';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon ] ?? $icon_svgs['camera'],
	'title'       => get_field( 'solar_sys_service_3_title' ) ?: 'Drohnenaufnahmen',
	'description' => get_field( 'solar_sys_service_3_description' ) ?: 'Präzise Dachanalyse und Thermografie mit modernster Drohnentechnologie.',
	'features'    => array_filter( array(
		get_field( 'solar_sys_service_3_feature_1' ) ?: 'Thermografie-Inspektion',
		get_field( 'solar_sys_service_3_feature_2' ) ?: 'Schadensanalyse',
		get_field( 'solar_sys_service_3_feature_3' ) ?: 'Hochauflösende Dokumentation',
		get_field( 'solar_sys_service_3_feature_4' ) ?: 'Effizienzprüfung',
	) ),
	'link'        => get_field( 'solar_sys_service_3_link' ) ?: home_url( '/drohnenaufnahmen/' ),
);

// Service 4 - Reinigungsservice
$service_4_icon = get_field( 'solar_sys_service_4_icon' ) ?: 'droplet';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon ] ?? $icon_svgs['droplet'],
	'title'       => get_field( 'solar_sys_service_4_title' ) ?: 'Reinigungsservice',
	'description' => get_field( 'solar_sys_service_4_description' ) ?: 'Professionelle Reinigung Ihrer Solarmodule für maximale Leistung und Langlebigkeit.',
	'features'    => array_filter( array(
		get_field( 'solar_sys_service_4_feature_1' ) ?: 'Professionelle Modulreinigung',
		get_field( 'solar_sys_service_4_feature_2' ) ?: '',
		get_field( 'solar_sys_service_4_feature_3' ) ?: 'Ertragssteigerung bis 20%',
		get_field( 'solar_sys_service_4_feature_4' ) ?: 'Umweltfreundliche Methoden',
	) ),
	'link'        => get_field( 'solar_sys_service_4_link' ) ?: home_url( '/reinigungsservice/' ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

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
		<h2 id="services-heading" class="sr-only">Unsere Solar-Dienstleistungen</h2>
		<div class="feature-grid feature-grid--2col">
			<?php foreach ( $services as $service ) : ?>
				<?php
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => $service['icon'],
					'title'       => $service['title'],
					'description' => $service['description'],
					'features'    => $service['features'],
					'link'        => $service['link'],
					'variant'     => 'default',
				) );
				?>
			<?php endforeach; ?>
		</div>

	</div>
</section>

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
