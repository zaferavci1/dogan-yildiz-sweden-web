<?php
/**
 * Template Name: Swisscom DCS+ Cloud
 *
 * Swisscom DCS+ (Dynamic Computing Services) Cloud sayfası.
 * İsviçre merkezli kurumsal cloud hizmetleri.
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
	'server'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'database'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'lock'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
	'network'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="2" width="6" height="6"></rect><rect x="16" y="16" width="6" height="6"></rect><rect x="2" y="16" width="6" height="6"></rect><path d="M5 16v-4h14v4"></path><line x1="12" y1="12" x2="12" y2="8"></line></svg>',
	'globe'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
	'flag'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>',
	'check'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
	'zap'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
	'settings'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'swisscom_hero_tag' ) ?: 'Swisscom DCS+';
$hero_subtitle = get_field( 'swisscom_hero_subtitle' ) ?: 'Enterprise Cloud aus der Schweiz - Datenschutz garantiert';

// Service 1 - DCS+ Infrastructure
$service_1 = array(
	'icon'        => $icon_svgs['server'],
	'title'       => get_field( 'swisscom_service_1_title' ) ?: 'DCS+ Infrastructure',
	'description' => get_field( 'swisscom_service_1_description' ) ?: 'Enterprise-grade Infrastruktur aus Schweizer Rechenzentren. Virtualisierte Server und Storage mit höchster Verfügbarkeit.',
	'features'    => array_filter( array(
		get_field( 'swisscom_service_1_feature_1' ) ?: 'VMware-basierte Virtualisierung',
		get_field( 'swisscom_service_1_feature_2' ) ?: 'Tier 3+ Rechenzentren',
		get_field( 'swisscom_service_1_feature_3' ) ?: 'SSD-Storage mit hoher IOPS',
		get_field( 'swisscom_service_1_feature_4' ) ?: 'Dedizierte Ressourcen verfügbar',
	) ),
);

// Service 2 - Swiss Data Sovereignty
$service_2 = array(
	'icon'        => $icon_svgs['flag'],
	'title'       => get_field( 'swisscom_service_2_title' ) ?: 'Swiss Data Sovereignty',
	'description' => get_field( 'swisscom_service_2_description' ) ?: 'Ihre Daten bleiben in der Schweiz. DSGVO-konform und unter Schweizer Datenschutzrecht geschützt.',
	'features'    => array_filter( array(
		get_field( 'swisscom_service_2_feature_1' ) ?: 'Daten 100% in der Schweiz',
		get_field( 'swisscom_service_2_feature_2' ) ?: 'DSGVO & DSG konform',
		get_field( 'swisscom_service_2_feature_3' ) ?: 'Keine US CLOUD Act Bedenken',
		get_field( 'swisscom_service_2_feature_4' ) ?: 'Schweizer Ansprechpartner',
	) ),
);

// Service 3 - Managed Services
$service_3 = array(
	'icon'        => $icon_svgs['settings'],
	'title'       => get_field( 'swisscom_service_3_title' ) ?: 'Managed Cloud Services',
	'description' => get_field( 'swisscom_service_3_description' ) ?: 'Full-Managed IT-Infrastruktur. Monitoring, Patching und Support durch Swisscom-Experten.',
	'features'    => array_filter( array(
		get_field( 'swisscom_service_3_feature_1' ) ?: '24/7 Monitoring & Support',
		get_field( 'swisscom_service_3_feature_2' ) ?: 'Automatisiertes Patching',
		get_field( 'swisscom_service_3_feature_3' ) ?: 'Incident Management',
		get_field( 'swisscom_service_3_feature_4' ) ?: 'Monatliche Reports',
	) ),
);

// Service 4 - DCS+ Backup
$service_4 = array(
	'icon'        => $icon_svgs['database'],
	'title'       => get_field( 'swisscom_service_4_title' ) ?: 'DCS+ Backup & Recovery',
	'description' => get_field( 'swisscom_service_4_description' ) ?: 'Zuverlässige Backup-Lösungen mit garantierter Wiederherstellung. Geo-redundante Speicherung in Schweizer Rechenzentren.',
	'features'    => array_filter( array(
		get_field( 'swisscom_service_4_feature_1' ) ?: 'Veeam Backup as a Service',
		get_field( 'swisscom_service_4_feature_2' ) ?: 'Geo-redundante Speicherung',
		get_field( 'swisscom_service_4_feature_3' ) ?: 'Granulare Wiederherstellung',
		get_field( 'swisscom_service_4_feature_4' ) ?: 'Langzeit-Archivierung',
	) ),
);

// Service 5 - Security
$service_5 = array(
	'icon'        => $icon_svgs['shield'],
	'title'       => get_field( 'swisscom_service_5_title' ) ?: 'DCS+ Security Services',
	'description' => get_field( 'swisscom_service_5_description' ) ?: 'Umfassende Sicherheitslösungen für Ihre Cloud-Umgebung. Firewall, DDoS-Schutz und Vulnerability Management.',
	'features'    => array_filter( array(
		get_field( 'swisscom_service_5_feature_1' ) ?: 'Next-Gen Firewall',
		get_field( 'swisscom_service_5_feature_2' ) ?: 'DDoS Protection',
		get_field( 'swisscom_service_5_feature_3' ) ?: 'Web Application Firewall',
		get_field( 'swisscom_service_5_feature_4' ) ?: 'Security Operations Center',
	) ),
);

// Service 6 - Connectivity
$service_6 = array(
	'icon'        => $icon_svgs['network'],
	'title'       => get_field( 'swisscom_service_6_title' ) ?: 'Enterprise Connectivity',
	'description' => get_field( 'swisscom_service_6_description' ) ?: 'Direkte Anbindung an Ihr Unternehmensnetzwerk. Private Connect und dedizierte Verbindungen.',
	'features'    => array_filter( array(
		get_field( 'swisscom_service_6_feature_1' ) ?: 'Private Connect',
		get_field( 'swisscom_service_6_feature_2' ) ?: 'VPN-Anbindung',
		get_field( 'swisscom_service_6_feature_3' ) ?: 'Dedizierte Leitungen',
		get_field( 'swisscom_service_6_feature_4' ) ?: 'Multi-Cloud Networking',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4, $service_5, $service_6 );

// Benefits section - Swiss specific advantages
$benefits = array(
	array(
		'icon'  => $icon_svgs['flag'],
		'title' => '100% Schweizer Rechenzentren',
		'desc'  => 'Alle Daten bleiben in zertifizierten Schweizer Rechenzentren.',
	),
	array(
		'icon'  => $icon_svgs['check'],
		'title' => 'ISO 27001 Zertifiziert',
		'desc'  => 'Höchste Sicherheitsstandards und Compliance-Anforderungen erfüllt.',
	),
	array(
		'icon'  => $icon_svgs['headphones'],
		'title' => '24/7 Schweizer Support',
		'desc'  => 'Lokaler Support in Ihrer Sprache, rund um die Uhr verfügbar.',
	),
);

// Why Swisscom section
$why_swisscom = array(
	array(
		'title' => 'Datensouveränität',
		'desc'  => 'Volle Kontrolle über Ihre Daten unter Schweizer Recht.',
	),
	array(
		'title' => 'Enterprise-Grade',
		'desc'  => 'Bewährte Infrastruktur für kritische Geschäftsanwendungen.',
	),
	array(
		'title' => 'Compliance Ready',
		'desc'  => 'FINMA, DSGVO und branchenspezifische Compliance.',
	),
	array(
		'title' => 'Lokale Expertise',
		'desc'  => 'Schweizer Experten verstehen Ihre Anforderungen.',
	),
);

// CTA Section
$cta_title       = get_field( 'swisscom_cta_title' ) ?: 'Interessiert an DCS+ Cloud?';
$cta_description = get_field( 'swisscom_cta_description' ) ?: 'Erfahren Sie, wie Swisscom DCS+ Ihre Daten sicher in der Schweiz hostet.';
$cta_button_text = get_field( 'swisscom_cta_button_text' ) ?: 'Beratung anfordern';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="swisscom-services-heading">
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
		<div class="cloud-partner-badge cloud-partner-badge--swisscom">
			<div class="cloud-partner-badge__icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
					<line x1="4" y1="22" x2="4" y2="15"></line>
				</svg>
			</div>
			<div class="cloud-partner-badge__content">
				<span class="cloud-partner-badge__label">Offizieller Partner</span>
				<span class="cloud-partner-badge__title">Swisscom DCS+ Cloud Partner</span>
			</div>
		</div>

		<!-- Benefits Grid -->
		<div class="cloud-benefits">
			<div class="cloud-benefits__grid">
				<?php foreach ( $benefits as $benefit ) : ?>
					<div class="cloud-benefit-card cloud-benefit-card--swisscom">
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

		<!-- Why Swisscom Section -->
		<div class="cloud-why-section">
			<h2 class="cloud-why-section__title">Warum Swisscom DCS+?</h2>
			<div class="cloud-why-grid">
				<?php foreach ( $why_swisscom as $item ) : ?>
					<div class="cloud-why-card">
						<h3 class="cloud-why-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="cloud-why-card__text"><?php echo esc_html( $item['desc'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Services Grid -->
		<h2 id="swisscom-services-heading" class="section-title text-center mt-xl">Unsere DCS+ Services</h2>
		<p class="section-description text-center mb-xl">Enterprise Cloud-Lösungen mit Schweizer Qualität</p>

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
