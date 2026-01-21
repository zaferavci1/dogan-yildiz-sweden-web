<?php
/**
 * Template Name: Cybersecurity
 *
 * Modern SaaS Siber Güvenlik hizmetleri sayfası.
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
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'lock'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
	'database'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'users'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'cloud'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'server'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
	'monitor'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'cyber_hero_tag' ) ?: 'Security';
$hero_subtitle = get_field( 'cyber_hero_subtitle' ) ?: 'Umfassender Schutz für Ihre IT-Infrastruktur';

// Service 1
$service_1_icon_key = get_field( 'cyber_service_1_icon' ) ?: 'shield';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['shield'],
	'title'       => get_field( 'cyber_service_1_title' ) ?: 'Firewall & Netzwerksicherheit',
	'description' => get_field( 'cyber_service_1_description' ) ?: 'Schützen Sie Ihr Unternehmensnetzwerk mit professionellen Firewall-Lösungen und sicheren VPN-Verbindungen.',
	'features'    => array_filter( array(
		get_field( 'cyber_service_1_feature_1' ) ?: 'Next-Generation Firewalls',
		get_field( 'cyber_service_1_feature_2' ) ?: 'VPN & Remote Access',
		get_field( 'cyber_service_1_feature_3' ) ?: 'Intrusion Detection & Prevention',
		get_field( 'cyber_service_1_feature_4' ) ?: 'Netzwerk-Segmentierung',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'cyber_service_2_icon' ) ?: 'lock';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['lock'],
	'title'       => get_field( 'cyber_service_2_title' ) ?: 'Endpoint Protection',
	'description' => get_field( 'cyber_service_2_description' ) ?: 'Umfassender Schutz für alle Endgeräte in Ihrem Unternehmen - von Workstations bis zu mobilen Geräten.',
	'features'    => array_filter( array(
		get_field( 'cyber_service_2_feature_1' ) ?: 'Antivirus & Antimalware',
		get_field( 'cyber_service_2_feature_2' ) ?: 'Endpoint Detection & Response (EDR)',
		get_field( 'cyber_service_2_feature_3' ) ?: 'Mobile Device Management',
		get_field( 'cyber_service_2_feature_4' ) ?: 'Patch Management',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'cyber_service_3_icon' ) ?: 'database';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['database'],
	'title'       => get_field( 'cyber_service_3_title' ) ?: 'Backup & Disaster Recovery',
	'description' => get_field( 'cyber_service_3_description' ) ?: 'Sichern Sie Ihre geschäftskritischen Daten und stellen Sie die Geschäftskontinuität im Notfall sicher.',
	'features'    => array_filter( array(
		get_field( 'cyber_service_3_feature_1' ) ?: 'Automatisierte Backups',
		get_field( 'cyber_service_3_feature_2' ) ?: 'Offsite & Cloud Backup',
		get_field( 'cyber_service_3_feature_3' ) ?: 'Disaster Recovery Planung',
		get_field( 'cyber_service_3_feature_4' ) ?: 'Business Continuity',
	) ),
);

// Service 4
$service_4_icon_key = get_field( 'cyber_service_4_icon' ) ?: 'users';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['users'],
	'title'       => get_field( 'cyber_service_4_title' ) ?: 'Security Awareness',
	'description' => get_field( 'cyber_service_4_description' ) ?: 'Schulen Sie Ihre Mitarbeiter im sicheren Umgang mit IT-Systemen und schützen Sie sich vor Social Engineering.',
	'features'    => array_filter( array(
		get_field( 'cyber_service_4_feature_1' ) ?: 'Mitarbeiter-Schulungen',
		get_field( 'cyber_service_4_feature_2' ) ?: 'Phishing-Simulationen',
		get_field( 'cyber_service_4_feature_3' ) ?: 'Security Policies',
		get_field( 'cyber_service_4_feature_4' ) ?: 'Compliance-Beratung',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4 );

// CTA Section
$cta_title       = get_field( 'cyber_cta_title' ) ?: 'Schützen Sie Ihr Unternehmen vor Cyber-Bedrohungen';
$cta_description = get_field( 'cyber_cta_description' ) ?: 'Wir analysieren Ihre Sicherheitslage und entwickeln individuelle Schutzkonzepte.';
$cta_button_text = get_field( 'cyber_cta_button_text' ) ?: 'Kontakt aufnehmen';
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

		<!-- Services Grid - 2x2 for 4 items -->
		<h2 id="services-heading" class="sr-only">Unsere Sicherheitslösungen</h2>
		<div class="feature-grid">
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
