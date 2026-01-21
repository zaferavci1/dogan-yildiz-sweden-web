<?php
/**
 * Template Name: Microsoft Azure Cloud
 *
 * Microsoft Azure Cloud hizmetleri sayfası.
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
	'azure'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 4L3 14h9l-1 6 10-10h-9l1-6z"></path></svg>',
	'cloud'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'server'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'database'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'cpu'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>',
	'network'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="2" width="6" height="6"></rect><rect x="16" y="16" width="6" height="6"></rect><rect x="2" y="16" width="6" height="6"></rect><path d="M5 16v-4h14v4"></path><line x1="12" y1="12" x2="12" y2="8"></line></svg>',
	'lock'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
	'globe'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
	'refresh'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'azure_hero_tag' ) ?: 'Microsoft Azure';
$hero_subtitle = get_field( 'azure_hero_subtitle' ) ?: 'Skalierbare Cloud-Infrastruktur für Ihr Unternehmen';

// Service 1 - Azure Virtual Machines
$service_1 = array(
	'icon'        => $icon_svgs['server'],
	'title'       => get_field( 'azure_service_1_title' ) ?: 'Azure Virtual Machines',
	'description' => get_field( 'azure_service_1_description' ) ?: 'Flexible und skalierbare virtuelle Maschinen für jede Arbeitslast. Windows und Linux VMs mit Enterprise-Performance.',
	'features'    => array_filter( array(
		get_field( 'azure_service_1_feature_1' ) ?: 'Windows & Linux VMs',
		get_field( 'azure_service_1_feature_2' ) ?: 'Automatische Skalierung',
		get_field( 'azure_service_1_feature_3' ) ?: 'Reserved Instances für Kosteneinsparung',
		get_field( 'azure_service_1_feature_4' ) ?: 'Spot VMs für variable Workloads',
	) ),
);

// Service 2 - Azure Active Directory
$service_2 = array(
	'icon'        => $icon_svgs['shield'],
	'title'       => get_field( 'azure_service_2_title' ) ?: 'Azure Active Directory',
	'description' => get_field( 'azure_service_2_description' ) ?: 'Identitäts- und Zugriffsverwaltung für Ihre Cloud-Umgebung. Single Sign-On und Multi-Faktor-Authentifizierung.',
	'features'    => array_filter( array(
		get_field( 'azure_service_2_feature_1' ) ?: 'Single Sign-On (SSO)',
		get_field( 'azure_service_2_feature_2' ) ?: 'Multi-Faktor-Authentifizierung',
		get_field( 'azure_service_2_feature_3' ) ?: 'Conditional Access Policies',
		get_field( 'azure_service_2_feature_4' ) ?: 'Azure AD B2B & B2C',
	) ),
);

// Service 3 - Azure Backup & Recovery
$service_3 = array(
	'icon'        => $icon_svgs['database'],
	'title'       => get_field( 'azure_service_3_title' ) ?: 'Azure Backup & Site Recovery',
	'description' => get_field( 'azure_service_3_description' ) ?: 'Zuverlässige Datensicherung und Disaster Recovery. Schützen Sie Ihre kritischen Workloads vor Datenverlust.',
	'features'    => array_filter( array(
		get_field( 'azure_service_3_feature_1' ) ?: 'Automatisierte Backups',
		get_field( 'azure_service_3_feature_2' ) ?: 'Geo-redundante Speicherung',
		get_field( 'azure_service_3_feature_3' ) ?: 'Site Recovery für VMs',
		get_field( 'azure_service_3_feature_4' ) ?: 'Schnelle Wiederherstellung',
	) ),
);

// Service 4 - Hybrid Cloud
$service_4 = array(
	'icon'        => $icon_svgs['network'],
	'title'       => get_field( 'azure_service_4_title' ) ?: 'Hybride Cloud-Lösungen',
	'description' => get_field( 'azure_service_4_description' ) ?: 'Nahtlose Integration von On-Premises und Cloud. Azure Arc und Azure Stack für hybride Szenarien.',
	'features'    => array_filter( array(
		get_field( 'azure_service_4_feature_1' ) ?: 'Azure Arc Management',
		get_field( 'azure_service_4_feature_2' ) ?: 'Azure Stack HCI',
		get_field( 'azure_service_4_feature_3' ) ?: 'VPN & ExpressRoute',
		get_field( 'azure_service_4_feature_4' ) ?: 'Einheitliche Verwaltung',
	) ),
);

// Service 5 - Azure Kubernetes
$service_5 = array(
	'icon'        => $icon_svgs['cpu'],
	'title'       => get_field( 'azure_service_5_title' ) ?: 'Azure Kubernetes Service',
	'description' => get_field( 'azure_service_5_description' ) ?: 'Managed Kubernetes für containerisierte Anwendungen. Einfache Bereitstellung, Skalierung und Verwaltung.',
	'features'    => array_filter( array(
		get_field( 'azure_service_5_feature_1' ) ?: 'Managed Kubernetes Cluster',
		get_field( 'azure_service_5_feature_2' ) ?: 'Azure Container Registry',
		get_field( 'azure_service_5_feature_3' ) ?: 'DevOps Integration',
		get_field( 'azure_service_5_feature_4' ) ?: 'Auto-Scaling & Load Balancing',
	) ),
);

// Service 6 - Azure Security
$service_6 = array(
	'icon'        => $icon_svgs['lock'],
	'title'       => get_field( 'azure_service_6_title' ) ?: 'Azure Security Center',
	'description' => get_field( 'azure_service_6_description' ) ?: 'Umfassender Cloud-Sicherheit mit Threat Protection und Compliance. Sichern Sie Ihre Cloud-Ressourcen ab.',
	'features'    => array_filter( array(
		get_field( 'azure_service_6_feature_1' ) ?: 'Threat Protection',
		get_field( 'azure_service_6_feature_2' ) ?: 'Security Posture Management',
		get_field( 'azure_service_6_feature_3' ) ?: 'Compliance-Überwachung',
		get_field( 'azure_service_6_feature_4' ) ?: 'Azure Defender',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4, $service_5, $service_6 );

// Benefits section
$benefits = array(
	array(
		'icon'  => $icon_svgs['globe'],
		'title' => '60+ Regionen weltweit',
		'desc'  => 'Globale Verfügbarkeit mit Rechenzentren in über 60 Regionen.',
	),
	array(
		'icon'  => $icon_svgs['shield'],
		'title' => '90+ Compliance-Zertifikate',
		'desc'  => 'Branchenführende Compliance und Datenschutz-Standards.',
	),
	array(
		'icon'  => $icon_svgs['refresh'],
		'title' => '99.99% SLA Verfügbarkeit',
		'desc'  => 'Enterprise-Grade Zuverlässigkeit für Ihre kritischen Workloads.',
	),
);

// CTA Section
$cta_title       = get_field( 'azure_cta_title' ) ?: 'Bereit für Azure?';
$cta_description = get_field( 'azure_cta_description' ) ?: 'Wir beraten Sie gerne zur optimalen Azure-Strategie für Ihr Unternehmen.';
$cta_button_text = get_field( 'azure_cta_button_text' ) ?: 'Kostenlose Beratung';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="azure-services-heading">
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

		<!-- Partner Badge -->
		<div class="cloud-partner-badge cloud-partner-badge--azure">
			<div class="cloud-partner-badge__icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<path d="M12 2L2 7l10 5 10-5-10-5z"></path>
					<path d="M2 17l10 5 10-5"></path>
					<path d="M2 12l10 5 10-5"></path>
				</svg>
			</div>
			<div class="cloud-partner-badge__content">
				<span class="cloud-partner-badge__label">Zertifizierter Partner</span>
				<span class="cloud-partner-badge__title">Microsoft Azure Cloud Partner</span>
			</div>
		</div>

		<!-- Benefits Grid -->
		<div class="cloud-benefits">
			<div class="cloud-benefits__grid">
				<?php foreach ( $benefits as $benefit ) : ?>
					<div class="cloud-benefit-card">
						<div class="cloud-benefit-card__icon" aria-hidden="true">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized above
							echo $benefit['icon'];
							?>
						</div>
						<div class="cloud-benefit-card__content">
							<h3 class="cloud-benefit-card__title"><?php echo esc_html( $benefit['title'] ); ?></h3>
							<p class="cloud-benefit-card__text"><?php echo esc_html( $benefit['desc'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Services Grid -->
		<h2 id="azure-services-heading" class="section-title text-center mt-xl">Unsere Azure Services</h2>
		<p class="section-description text-center mb-xl">Umfassende Azure-Expertise für Ihre digitale Transformation</p>

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
