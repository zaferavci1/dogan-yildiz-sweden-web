<?php
/**
 * Template Name: Cloud Solutions
 *
 * Modern SaaS Cloud hizmetleri sayfası.
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
	'cloud'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'grid'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
	'refresh'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'server'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'database'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'lock'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'cloud_hero_tag' ) ?: 'Cloud Services';
$hero_subtitle = get_field( 'cloud_hero_subtitle' ) ?: 'Sichere Cloud-Migration und moderne Arbeitsplatzlösungen';

// Service 1
$service_1_icon_key = get_field( 'cloud_service_1_icon' ) ?: 'grid';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['cloud'],
	'title'       => get_field( 'cloud_service_1_title' ) ?: 'Microsoft 365',
	'description' => get_field( 'cloud_service_1_description' ) ?: 'Wir unterstützen Sie bei der Migration in die Cloud. Mit Microsoft 365, Exchange Online und Teams optimieren wir Ihre Zusammenarbeit.',
	'features'    => array_filter( array(
		get_field( 'cloud_service_1_feature_1' ) ?: 'Exchange Online & Outlook',
		get_field( 'cloud_service_1_feature_2' ) ?: 'Teams & SharePoint',
		get_field( 'cloud_service_1_feature_3' ) ?: 'OneDrive for Business',
		get_field( 'cloud_service_1_feature_4' ) ?: 'Microsoft 365 Lizenzverwaltung',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'cloud_service_2_icon' ) ?: 'cloud';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['cloud'],
	'title'       => get_field( 'cloud_service_2_title' ) ?: 'Microsoft Azure',
	'description' => get_field( 'cloud_service_2_description' ) ?: 'Azure-Integration und hybride Infrastrukturen für flexible Arbeitsmodelle und skalierbare Geschäftslösungen.',
	'features'    => array_filter( array(
		get_field( 'cloud_service_2_feature_1' ) ?: 'Azure Virtual Machines',
		get_field( 'cloud_service_2_feature_2' ) ?: 'Azure Active Directory',
		get_field( 'cloud_service_2_feature_3' ) ?: 'Hybride Cloud-Lösungen',
		get_field( 'cloud_service_2_feature_4' ) ?: 'Azure Backup & Site Recovery',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'cloud_service_3_icon' ) ?: 'refresh';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['refresh'],
	'title'       => get_field( 'cloud_service_3_title' ) ?: 'Cloud-Migration',
	'description' => get_field( 'cloud_service_3_description' ) ?: 'Sichere und reibungslose Migration Ihrer bestehenden Infrastruktur in die Cloud mit minimaler Ausfallzeit.',
	'features'    => array_filter( array(
		get_field( 'cloud_service_3_feature_1' ) ?: 'Migrationsplanung & Strategie',
		get_field( 'cloud_service_3_feature_2' ) ?: 'Datenmigration',
		get_field( 'cloud_service_3_feature_3' ) ?: 'Anwendungs-Modernisierung',
		get_field( 'cloud_service_3_feature_4' ) ?: 'Post-Migration Support',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3 );

// CTA Section
$cta_title       = get_field( 'cloud_cta_title' ) ?: 'Bereit für die Cloud?';
$cta_description = get_field( 'cloud_cta_description' ) ?: 'Wir beraten Sie gerne unverbindlich zu Ihren individuellen Cloud-Anforderungen.';
$cta_button_text = get_field( 'cloud_cta_button_text' ) ?: 'Kontakt aufnehmen';
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
		<h2 id="services-heading" class="sr-only">Unsere Cloud-Lösungen</h2>
		<div class="feature-grid feature-grid--3col">
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
