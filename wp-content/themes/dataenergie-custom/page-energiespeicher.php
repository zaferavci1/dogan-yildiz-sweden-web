<?php
/**
 * Template Name: Energiespeicher
 *
 * Modern SaaS Energiespeicher/Batteriespeicher hizmetleri sayfası.
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
	'battery'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line><line x1="6" y1="11" x2="6" y2="17"></line><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line><line x1="18" y1="11" x2="18" y2="17"></line></svg>',
	'zap'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
	'home'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
	'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>',
	'sun'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>',
	'shield'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'storage_hero_tag' ) ?: 'Solar Energy';
$hero_subtitle = get_field( 'storage_hero_subtitle' ) ?: 'Maximale Unabhängigkeit mit modernster Speichertechnologie';

// Service 1
$service_1_icon_key = get_field( 'storage_service_1_icon' ) ?: 'battery';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['battery'],
	'title'       => get_field( 'storage_service_1_title' ) ?: 'Lithium-Ionen-Speicher',
	'description' => get_field( 'storage_service_1_description' ) ?: 'Hochmoderne Lithium-Ionen-Batteriespeicher für maximale Effizienz und lange Lebensdauer.',
	'features'    => array_filter( array(
		get_field( 'storage_service_1_feature_1' ) ?: '10-20 Jahre Lebensdauer',
		get_field( 'storage_service_1_feature_2' ) ?: '95% Wirkungsgrad',
		get_field( 'storage_service_1_feature_3' ) ?: 'Modular erweiterbar',
		get_field( 'storage_service_1_feature_4' ) ?: 'Kompakte Bauweise',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'storage_service_2_icon' ) ?: 'home';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['home'],
	'title'       => get_field( 'storage_service_2_title' ) ?: 'Eigenverbrauchsoptimierung',
	'description' => get_field( 'storage_service_2_description' ) ?: 'Nutzen Sie Ihren selbst erzeugten Strom optimal und reduzieren Sie Ihre Abhängigkeit vom Stromnetz.',
	'features'    => array_filter( array(
		get_field( 'storage_service_2_feature_1' ) ?: 'Bis zu 80% Eigenverbrauch',
		get_field( 'storage_service_2_feature_2' ) ?: 'Intelligentes Energiemanagement',
		get_field( 'storage_service_2_feature_3' ) ?: 'Nachtversorgung gesichert',
		get_field( 'storage_service_2_feature_4' ) ?: 'App-Steuerung & Monitoring',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'storage_service_3_icon' ) ?: 'zap';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['zap'],
	'title'       => get_field( 'storage_service_3_title' ) ?: 'Notstromfähigkeit',
	'description' => get_field( 'storage_service_3_description' ) ?: 'Bleiben Sie bei Stromausfällen unabhängig mit unseren notstromfähigen Speicherlösungen.',
	'features'    => array_filter( array(
		get_field( 'storage_service_3_feature_1' ) ?: 'Unterbrechungsfreie Stromversorgung',
		get_field( 'storage_service_3_feature_2' ) ?: 'Automatische Umschaltung',
		get_field( 'storage_service_3_feature_3' ) ?: 'Kritische Verbraucher gesichert',
		get_field( 'storage_service_3_feature_4' ) ?: 'Inselbetrieb möglich',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3 );

// CTA Section
$cta_title       = get_field( 'storage_cta_title' ) ?: 'Interesse an Energiespeichern?';
$cta_description = get_field( 'storage_cta_description' ) ?: 'Wir beraten Sie gerne zu den passenden Speicherlösungen für Ihre Photovoltaikanlage.';
$cta_button_text = get_field( 'storage_cta_button_text' ) ?: 'Beratung anfordern';
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
		<h2 id="services-heading" class="sr-only">Unsere Energiespeicher-Lösungen</h2>
		<div class="feature-grid feature-grid--3col">
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
			'variant'     => 'solar',
		) );
		?>

	</div>
</section>

<?php get_footer(); ?>
