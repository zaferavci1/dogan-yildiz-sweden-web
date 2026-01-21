<?php
/**
 * Template Name: IT Infrastructure
 *
 * Modern SaaS IT Altyapı hizmetleri sayfası.
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
	'server'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'wifi'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>',
	'database'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'cloud'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'lock'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
	'monitor'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'infra_hero_tag' ) ?: 'IT Solutions';
$hero_subtitle = get_field( 'infra_hero_subtitle' ) ?: 'Professionelle Netzwerk- und Serverinfrastruktur für Ihr Unternehmen';

// Service 1
$service_1_icon_key = get_field( 'infra_service_1_icon' ) ?: 'server';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['server'],
	'title'       => get_field( 'infra_service_1_title' ) ?: 'Server & Virtualisierung',
	'description' => get_field( 'infra_service_1_description' ) ?: 'Wir planen, implementieren und warten Ihre Serverinfrastruktur. Von physischen Servern bis zur vollständigen Virtualisierung.',
	'features'    => array_filter( array(
		get_field( 'infra_service_1_feature_1' ) ?: 'Windows & Linux Server',
		get_field( 'infra_service_1_feature_2' ) ?: 'VMware & Hyper-V Virtualisierung',
		get_field( 'infra_service_1_feature_3' ) ?: 'Active Directory & Domain Services',
		get_field( 'infra_service_1_feature_4' ) ?: 'Server-Monitoring & Management',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'infra_service_2_icon' ) ?: 'wifi';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['wifi'],
	'title'       => get_field( 'infra_service_2_title' ) ?: 'Netzwerk Infrastruktur',
	'description' => get_field( 'infra_service_2_description' ) ?: 'Eine stabile und performante Netzwerkinfrastruktur ist das Rückgrat Ihres Unternehmens. Wir planen und realisieren Ihr Netzwerk.',
	'features'    => array_filter( array(
		get_field( 'infra_service_2_feature_1' ) ?: 'WLAN & LAN Infrastruktur',
		get_field( 'infra_service_2_feature_2' ) ?: 'Strukturierte Verkabelung',
		get_field( 'infra_service_2_feature_3' ) ?: 'Switches & Router',
		get_field( 'infra_service_2_feature_4' ) ?: 'Netzwerk-Dokumentation',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'infra_service_3_icon' ) ?: 'database';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['database'],
	'title'       => get_field( 'infra_service_3_title' ) ?: 'Storage & Datensicherung',
	'description' => get_field( 'infra_service_3_description' ) ?: 'Sichere Speicherlösungen und zuverlässige Backup-Strategien für Ihre geschäftskritischen Daten.',
	'features'    => array_filter( array(
		get_field( 'infra_service_3_feature_1' ) ?: 'NAS & SAN Lösungen',
		get_field( 'infra_service_3_feature_2' ) ?: 'Backup & Recovery',
		get_field( 'infra_service_3_feature_3' ) ?: 'Disaster Recovery Planung',
		get_field( 'infra_service_3_feature_4' ) ?: 'Archivierung & Compliance',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3 );

// CTA Section
$cta_title       = get_field( 'infra_cta_title' ) ?: 'Benötigen Sie eine professionelle IT-Infrastruktur?';
$cta_description = get_field( 'infra_cta_description' ) ?: 'Wir beraten Sie gerne unverbindlich zu Ihren individuellen Anforderungen.';
$cta_button_text = get_field( 'infra_cta_button_text' ) ?: 'Kontakt aufnehmen';
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
		<h2 id="services-heading" class="sr-only">Unsere Infrastruktur-Lösungen</h2>
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
