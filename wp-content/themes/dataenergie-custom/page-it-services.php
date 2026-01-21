<?php
/**
 * Template Name: IT Services
 *
 * Modern SaaS IT Hizmetleri sayfası.
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
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
	'server'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'database'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'lock'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
	'wifi'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>',
	'monitor'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'it_hero_tag' ) ?: 'IT Solutions';
$hero_subtitle = get_field( 'it_hero_subtitle' ) ?: 'Professionelle IT-Infrastruktur für Ihr Unternehmen';

// Service 1
$service_1_icon_key = get_field( 'it_service_1_icon' ) ?: 'cloud';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['cloud'],
	'title'       => get_field( 'it_service_1_title' ) ?: 'Microsoft 365 & Cloud',
	'description' => get_field( 'it_service_1_description' ) ?: 'Wir unterstützen Sie bei der Migration in die Cloud. Mit Microsoft 365, Exchange Online und Teams optimieren wir Ihre Zusammenarbeit.',
	'features'    => array_filter( array(
		get_field( 'it_service_1_feature_1' ) ?: 'Exchange Online & Outlook',
		get_field( 'it_service_1_feature_2' ) ?: 'Teams & SharePoint',
		get_field( 'it_service_1_feature_3' ) ?: 'OneDrive for Business',
		get_field( 'it_service_1_feature_4' ) ?: 'Sichere Cloud-Migration',
	) ),
);

// Service 2
$service_2_icon_key = get_field( 'it_service_2_icon' ) ?: 'shield';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['shield'],
	'title'       => get_field( 'it_service_2_title' ) ?: 'Netzwerk & Sicherheit',
	'description' => get_field( 'it_service_2_description' ) ?: 'Eine stabile und sichere Netzwerkinfrastruktur ist das Rückgrat Ihres Unternehmens. Wir planen und realisieren Ihre IT-Sicherheit.',
	'features'    => array_filter( array(
		get_field( 'it_service_2_feature_1' ) ?: 'Firewall & VPN Lösungen',
		get_field( 'it_service_2_feature_2' ) ?: 'WLAN & LAN Infrastruktur',
		get_field( 'it_service_2_feature_3' ) ?: 'Endpoint Protection',
		get_field( 'it_service_2_feature_4' ) ?: 'Backup & Disaster Recovery',
	) ),
);

// Service 3
$service_3_icon_key = get_field( 'it_service_3_icon' ) ?: 'headphones';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['headphones'],
	'title'       => get_field( 'it_service_3_title' ) ?: 'IT Support & Wartung',
	'description' => get_field( 'it_service_3_description' ) ?: 'Unser Support-Team steht Ihnen bei technischen Problemen zur Seite. Wir bieten schnelle Hilfe per Fernwartung oder vor Ort.',
	'features'    => array_filter( array(
		get_field( 'it_service_3_feature_1' ) ?: 'Helpdesk & User Support',
		get_field( 'it_service_3_feature_2' ) ?: 'Systemwartung & Updates',
		get_field( 'it_service_3_feature_3' ) ?: 'Hardware Beschaffung & Installation',
		get_field( 'it_service_3_feature_4' ) ?: 'IT-Consulting',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3 );

// CTA Section
$cta_title       = get_field( 'it_cta_title' ) ?: 'Haben Sie Fragen zu unseren IT-Dienstleistungen?';
$cta_description = get_field( 'it_cta_description' ) ?: 'Wir beraten Sie gerne unverbindlich zu Ihren individuellen Anforderungen.';
$cta_button_text = get_field( 'it_cta_button_text' ) ?: 'Kontakt aufnehmen';
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
		<h2 id="services-heading" class="sr-only">Unsere IT-Dienstleistungen</h2>
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

<?php
// IT Projects/References Grid Section
get_template_part( 'template-parts/sections/projects-grid', null, array(
	'title'          => 'Unsere IT-Referenzen',
	'description'    => 'Erfolgreiche IT-Projekte für unsere Kunden',
	'category'       => 'it',
	'posts_per_page' => 3,
) );
?>

<?php get_footer(); ?>
