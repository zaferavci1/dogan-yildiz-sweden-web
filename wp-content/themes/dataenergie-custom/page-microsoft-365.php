<?php
/**
 * Template Name: Microsoft 365
 *
 * Modern SaaS Microsoft 365 hizmetleri sayfası.
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
	'monitor'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
	'mail'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
	'users'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'cloud'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'm365_hero_tag' ) ?: 'IT Solutions';
$hero_subtitle = get_field( 'm365_hero_subtitle' ) ?: 'Produktive Zusammenarbeit mit Microsoft Cloud-Lösungen';

// Service 1
$service_1_icon_key = get_field( 'm365_service_1_icon' ) ?: 'mail';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['mail'],
	'title'       => get_field( 'm365_service_1_title' ) ?: 'Exchange Online',
	'description' => get_field( 'm365_service_1_description' ) ?: 'Professionelle E-Mail-Kommunikation mit Exchange Online. Sicherer, zuverlässiger und überall verfügbar.',
	'features'    => array_filter( array(
		get_field( 'm365_service_1_feature_1' ) ?: '50 GB Postfach pro Benutzer',
		get_field( 'm365_service_1_feature_2' ) ?: 'Erweiterte Sicherheit & Spam-Filter',
		get_field( 'm365_service_1_feature_3' ) ?: 'Kalender & Kontaktverwaltung',
		get_field( 'm365_service_1_feature_4' ) ?: 'Mobile Apps für iOS & Android',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'm365_service_2_icon' ) ?: 'users';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['users'],
	'title'       => get_field( 'm365_service_2_title' ) ?: 'Microsoft Teams',
	'description' => get_field( 'm365_service_2_description' ) ?: 'Moderne Teamarbeit mit Chat, Videobesprechungen und gemeinsamer Dokumentenbearbeitung in Echtzeit.',
	'features'    => array_filter( array(
		get_field( 'm365_service_2_feature_1' ) ?: 'HD-Videokonferenzen',
		get_field( 'm365_service_2_feature_2' ) ?: 'Team-Channels & Chat',
		get_field( 'm365_service_2_feature_3' ) ?: 'Bildschirmfreigabe',
		get_field( 'm365_service_2_feature_4' ) ?: 'Integration mit Office-Apps',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'm365_service_3_icon' ) ?: 'cloud';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['cloud'],
	'title'       => get_field( 'm365_service_3_title' ) ?: 'SharePoint & OneDrive',
	'description' => get_field( 'm365_service_3_description' ) ?: 'Sichere Dokumentenverwaltung und Cloud-Speicher für Ihr Unternehmen mit nahtloser Office-Integration.',
	'features'    => array_filter( array(
		get_field( 'm365_service_3_feature_1' ) ?: '1 TB Cloud-Speicher pro Benutzer',
		get_field( 'm365_service_3_feature_2' ) ?: 'Dokumenten-Versionierung',
		get_field( 'm365_service_3_feature_3' ) ?: 'Intranet & Team-Sites',
		get_field( 'm365_service_3_feature_4' ) ?: 'Externe Freigabe mit Kontrolle',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3 );

// CTA Section
$cta_title       = get_field( 'm365_cta_title' ) ?: 'Bereit für Microsoft 365?';
$cta_description = get_field( 'm365_cta_description' ) ?: 'Wir beraten Sie gerne zu den passenden Lizenzen und der optimalen Konfiguration für Ihr Unternehmen.';
$cta_button_text = get_field( 'm365_cta_button_text' ) ?: 'Jetzt beraten lassen';
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
		<h2 id="services-heading" class="sr-only">Unsere Microsoft 365 Lösungen</h2>
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
