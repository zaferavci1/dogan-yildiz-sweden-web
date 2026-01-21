<?php
/**
 * Template Name: Solar Wartung
 *
 * Solar Bakım ve Servis sayfası - Modern SaaS tasarım.
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
	'settings' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
	'refresh'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>',
	'activity' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>',
	'phone'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'wartung_hero_tag' ) ?: 'Solar Wartung';
$hero_subtitle = get_field( 'wartung_hero_subtitle' ) ?: 'Maximale Leistung für Ihre Solaranlage';

// Services Overview Section
$overview_title = get_field( 'wartung_overview_title' ) ?: 'Rundum-Service für Ihre Anlage';
$overview_desc  = get_field( 'wartung_overview_description' ) ?: 'Damit Ihre Solaranlage jahrelang optimal funktioniert.';

// Services
$service_1_icon_key = get_field( 'wartung_service_1_icon' ) ?: 'settings';
$service_2_icon_key = get_field( 'wartung_service_2_icon' ) ?: 'refresh';
$service_3_icon_key = get_field( 'wartung_service_3_icon' ) ?: 'activity';
$service_4_icon_key = get_field( 'wartung_service_4_icon' ) ?: 'phone';

$services = array(
	array(
		'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['settings'],
		'title'       => get_field( 'wartung_service_1_title' ) ?: 'Regelmässige Wartung',
		'description' => get_field( 'wartung_service_1_description' ) ?: 'Professionelle Inspektion und Wartung für maximale Lebensdauer Ihrer Anlage.',
	),
	array(
		'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['refresh'],
		'title'       => get_field( 'wartung_service_2_title' ) ?: 'Modulreinigung',
		'description' => get_field( 'wartung_service_2_description' ) ?: 'Fachgerechte Reinigung der Solarmodule für optimalen Ertrag.',
	),
	array(
		'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['activity'],
		'title'       => get_field( 'wartung_service_3_title' ) ?: 'Monitoring',
		'description' => get_field( 'wartung_service_3_description' ) ?: 'Kontinuierliche Überwachung der Anlagenleistung und schnelle Fehlererkennung.',
	),
	array(
		'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['phone'],
		'title'       => get_field( 'wartung_service_4_title' ) ?: 'Support & Service',
		'description' => get_field( 'wartung_service_4_description' ) ?: 'Schnelle Hilfe bei Störungen und kompetenter technischer Support.',
	),
);

// CTA Section
$cta_title       = get_field( 'wartung_cta_title' ) ?: 'Wartung benötigt?';
$cta_description = get_field( 'wartung_cta_description' ) ?: 'Kontaktieren Sie uns für einen Wartungstermin oder bei Störungen.';
$cta_button_text = get_field( 'wartung_cta_button_text' ) ?: 'Termin vereinbaren';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => 'Wartung & Service',
	'subtitle' => $hero_subtitle,
	'variant'  => 'solar',
) );
?>

<!-- Services Overview -->
<section class="solar-services-overview" aria-labelledby="services-overview-heading">
	<div class="container">
		<div class="section-header">
			<span class="section-tag section-tag--solar">Unsere Services</span>
			<h2 id="services-overview-heading" class="section-title"><?php echo esc_html( $overview_title ); ?></h2>
			<p class="section-description"><?php echo esc_html( $overview_desc ); ?></p>
		</div>

		<div class="service-overview-grid">
			<?php foreach ( $services as $service ) : ?>
				<div class="service-overview-card">
					<div class="service-overview-card__icon">
						<?php echo $service['icon']; // phpcs:ignore ?>
					</div>
					<h3 class="service-overview-card__title"><?php echo esc_html( $service['title'] ); ?></h3>
					<p class="service-overview-card__description"><?php echo esc_html( $service['description'] ); ?></p>
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
