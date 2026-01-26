<?php
/**
 * Template Name: Reinigung
 *
 * Reinigungsservice (Temizlik Hizmetleri) sayfası - Modern SaaS tasarım.
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
	'home'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
	'refresh-cw' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>',
	'aperture'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>',
	'sparkles'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.912 5.813a2 2 0 0 0 1.275 1.275L21 12l-5.813 1.912a2 2 0 0 0-1.275 1.275L12 21l-1.912-5.813a2 2 0 0 0-1.275-1.275L3 12l5.813-1.912a2 2 0 0 0 1.275-1.275L12 3z"></path><path d="M5 3v4"></path><path d="M3 5h4"></path><path d="M19 17v4"></path><path d="M17 19h4"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'reinigung_hero_tag' ) ?: 'Reinigung';
$hero_subtitle = get_field( 'reinigung_hero_subtitle' ) ?: 'Professionelle Reinigungslösungen für Ihr Unternehmen';

// Service 1 - Gebäudereinigung
$service_1_icon_key = get_field( 'reinigung_service_1_icon' ) ?: 'home';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['home'],
	'title'       => get_field( 'reinigung_service_1_title' ) ?: 'Gebäudereinigung',
	'description' => get_field( 'reinigung_service_1_description' ) ?: 'Umfassende Reinigung für Büros, Praxen und Geschäftsräume.',
	'features'    => array_filter( array(
		get_field( 'reinigung_service_1_feature_1' ) ?: 'Büroreinigung',
		get_field( 'reinigung_service_1_feature_2' ) ?: 'Praxisreinigung',
		get_field( 'reinigung_service_1_feature_3' ) ?: 'Empfangsbereich',
		get_field( 'reinigung_service_1_feature_4' ) ?: 'Sanitäranlagen',
	) ),
);

// Service 2 - Unterhaltsreinigung
$service_2_icon_key = get_field( 'reinigung_service_2_icon' ) ?: 'refresh-cw';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['refresh-cw'],
	'title'       => get_field( 'reinigung_service_2_title' ) ?: 'Unterhaltsreinigung',
	'description' => get_field( 'reinigung_service_2_description' ) ?: 'Regelmässige Reinigung nach Ihrem Zeitplan.',
	'features'    => array_filter( array(
		get_field( 'reinigung_service_2_feature_1' ) ?: 'Tägliche Reinigung',
		get_field( 'reinigung_service_2_feature_2' ) ?: 'Wöchentliche Reinigung',
		get_field( 'reinigung_service_2_feature_3' ) ?: 'Flexible Termine',
		get_field( 'reinigung_service_2_feature_4' ) ?: 'Qualitätskontrolle',
	) ),
);

// Service 3 - Glasreinigung
$service_3_icon_key = get_field( 'reinigung_service_3_icon' ) ?: 'aperture';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['aperture'],
	'title'       => get_field( 'reinigung_service_3_title' ) ?: 'Glasreinigung',
	'description' => get_field( 'reinigung_service_3_description' ) ?: 'Professionelle Fenster- und Glasflächenreinigung.',
	'features'    => array_filter( array(
		get_field( 'reinigung_service_3_feature_1' ) ?: 'Fensterreinigung',
		get_field( 'reinigung_service_3_feature_2' ) ?: 'Glasfassaden',
		get_field( 'reinigung_service_3_feature_3' ) ?: 'Schaufenster',
		get_field( 'reinigung_service_3_feature_4' ) ?: 'Wintergärten',
	) ),
);

// Service 4 - Spezialreinigung
$service_4_icon_key = get_field( 'reinigung_service_4_icon' ) ?: 'sparkles';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['sparkles'],
	'title'       => get_field( 'reinigung_service_4_title' ) ?: 'Spezialreinigung',
	'description' => get_field( 'reinigung_service_4_description' ) ?: 'Sonderreinigungen für besondere Anforderungen.',
	'features'    => array_filter( array(
		get_field( 'reinigung_service_4_feature_1' ) ?: 'Baureinigung',
		get_field( 'reinigung_service_4_feature_2' ) ?: 'Grundreinigung',
		get_field( 'reinigung_service_4_feature_3' ) ?: 'Teppichreinigung',
		get_field( 'reinigung_service_4_feature_4' ) ?: 'Steinbodenreinigung',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

// CTA Section
$cta_title       = get_field( 'reinigung_cta_title' ) ?: 'Saubere Räume, klarer Kopf';
$cta_description = get_field( 'reinigung_cta_description' ) ?: 'Kontaktieren Sie uns für ein unverbindliches Angebot.';
$cta_button_text = get_field( 'reinigung_cta_button_text' ) ?: 'Offerte anfordern';
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
		<h2 id="services-heading" class="sr-only">Unsere Reinigungsdienstleistungen</h2>
		<div class="feature-grid feature-grid--4col">
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
