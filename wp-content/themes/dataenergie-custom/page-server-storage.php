<?php
/**
 * Template Name: Server und Storage
 *
 * Enterprise Server und Storage Lösungen sayfası.
 * On-Premise ve Hybrid Infrastruktur hizmetleri.
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
	'harddrive'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>',
	'database'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'cpu'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>',
	'layers'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>',
	'refresh'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>',
	'zap'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
	'trending'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>',
	'settings'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
	'check'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'storage_hero_tag' ) ?: 'Server & Storage';
$hero_subtitle = get_field( 'storage_hero_subtitle' ) ?: 'Enterprise-Hardware für maximale Leistung und Zuverlässigkeit';

// Service 1 - Enterprise Server
$service_1 = array(
	'icon'        => $icon_svgs['server'],
	'title'       => get_field( 'storage_service_1_title' ) ?: 'Enterprise Server',
	'description' => get_field( 'storage_service_1_description' ) ?: 'Leistungsstarke Server-Lösungen für Ihre Rechenzentren. Von Rack-Servern bis zu Blade-Systemen für jede Anforderung.',
	'features'    => array_filter( array(
		get_field( 'storage_service_1_feature_1' ) ?: 'HPE ProLiant & Dell PowerEdge',
		get_field( 'storage_service_1_feature_2' ) ?: 'Blade-Server & Rack-Systeme',
		get_field( 'storage_service_1_feature_3' ) ?: 'Hochverfügbarkeits-Cluster',
		get_field( 'storage_service_1_feature_4' ) ?: 'GPU-Server für AI/ML',
	) ),
);

// Service 2 - Storage Solutions
$service_2 = array(
	'icon'        => $icon_svgs['harddrive'],
	'title'       => get_field( 'storage_service_2_title' ) ?: 'Storage-Lösungen',
	'description' => get_field( 'storage_service_2_description' ) ?: 'Enterprise-Storage für kritische Daten. NAS, SAN und All-Flash-Arrays für höchste Performance und Verfügbarkeit.',
	'features'    => array_filter( array(
		get_field( 'storage_service_2_feature_1' ) ?: 'All-Flash & Hybrid Arrays',
		get_field( 'storage_service_2_feature_2' ) ?: 'NetApp, Dell EMC, HPE Nimble',
		get_field( 'storage_service_2_feature_3' ) ?: 'SAN & NAS Architekturen',
		get_field( 'storage_service_2_feature_4' ) ?: 'Deduplizierung & Kompression',
	) ),
);

// Service 3 - Backup & Recovery
$service_3 = array(
	'icon'        => $icon_svgs['database'],
	'title'       => get_field( 'storage_service_3_title' ) ?: 'Backup & Disaster Recovery',
	'description' => get_field( 'storage_service_3_description' ) ?: 'Zuverlässige Datensicherung und schnelle Wiederherstellung. Tape, Disk und Cloud-basierte Backup-Lösungen.',
	'features'    => array_filter( array(
		get_field( 'storage_service_3_feature_1' ) ?: 'Veeam & Commvault',
		get_field( 'storage_service_3_feature_2' ) ?: 'Tape-Libraries & VTL',
		get_field( 'storage_service_3_feature_3' ) ?: 'Disaster Recovery Sites',
		get_field( 'storage_service_3_feature_4' ) ?: 'Air-Gap Backup Solutions',
	) ),
);

// Service 4 - Hyperconverged Infrastructure
$service_4 = array(
	'icon'        => $icon_svgs['layers'],
	'title'       => get_field( 'storage_service_4_title' ) ?: 'Hyperconverged Infrastructure',
	'description' => get_field( 'storage_service_4_description' ) ?: 'Konvergente Systeme für vereinfachte IT. Compute, Storage und Netzwerk in einer integrierten Plattform.',
	'features'    => array_filter( array(
		get_field( 'storage_service_4_feature_1' ) ?: 'VMware vSAN & Nutanix',
		get_field( 'storage_service_4_feature_2' ) ?: 'Dell VxRail & HPE SimpliVity',
		get_field( 'storage_service_4_feature_3' ) ?: 'Einfache Skalierung',
		get_field( 'storage_service_4_feature_4' ) ?: 'Integriertes Management',
	) ),
);

// Service 5 - Virtualization
$service_5 = array(
	'icon'        => $icon_svgs['cpu'],
	'title'       => get_field( 'storage_service_5_title' ) ?: 'Virtualisierung',
	'description' => get_field( 'storage_service_5_description' ) ?: 'VMware und Hyper-V Umgebungen. Design, Migration und Optimierung Ihrer virtualisierten Infrastruktur.',
	'features'    => array_filter( array(
		get_field( 'storage_service_5_feature_1' ) ?: 'VMware vSphere & vCenter',
		get_field( 'storage_service_5_feature_2' ) ?: 'Microsoft Hyper-V',
		get_field( 'storage_service_5_feature_3' ) ?: 'P2V & V2V Migrationen',
		get_field( 'storage_service_5_feature_4' ) ?: 'Performance-Optimierung',
	) ),
);

// Service 6 - Maintenance & Support
$service_6 = array(
	'icon'        => $icon_svgs['settings'],
	'title'       => get_field( 'storage_service_6_title' ) ?: 'Wartung & Support',
	'description' => get_field( 'storage_service_6_description' ) ?: 'Professioneller Support für Ihre Hardware. Wartungsverträge, Ersatzteil-Service und 24/7 Notfall-Unterstützung.',
	'features'    => array_filter( array(
		get_field( 'storage_service_6_feature_1' ) ?: '24/7 Hardware-Support',
		get_field( 'storage_service_6_feature_2' ) ?: 'Ersatzteil-Vorhaltung',
		get_field( 'storage_service_6_feature_3' ) ?: 'Firmware-Updates',
		get_field( 'storage_service_6_feature_4' ) ?: 'Proaktives Monitoring',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4, $service_5, $service_6 );

// Benefits section
$benefits = array(
	array(
		'icon'  => $icon_svgs['zap'],
		'title' => 'High Performance',
		'desc'  => 'Maximale Leistung für anspruchsvolle Workloads und kritische Anwendungen.',
	),
	array(
		'icon'  => $icon_svgs['shield'],
		'title' => 'Enterprise-Grade',
		'desc'  => 'Bewährte Hardware führender Hersteller mit höchster Zuverlässigkeit.',
	),
	array(
		'icon'  => $icon_svgs['headphones'],
		'title' => 'Experten-Support',
		'desc'  => 'Zertifizierte Techniker für Installation, Wartung und Problemlösung.',
	),
);

// Technology Partners
$partners = array(
	array(
		'name' => 'HPE',
		'desc' => 'Platinum Partner',
	),
	array(
		'name' => 'Dell Technologies',
		'desc' => 'Titanium Partner',
	),
	array(
		'name' => 'NetApp',
		'desc' => 'Gold Partner',
	),
	array(
		'name' => 'VMware',
		'desc' => 'Enterprise Partner',
	),
);

// CTA Section
$cta_title       = get_field( 'storage_cta_title' ) ?: 'Ihr IT-Infrastruktur Projekt?';
$cta_description = get_field( 'storage_cta_description' ) ?: 'Wir beraten Sie bei der Auswahl der optimalen Server- und Storage-Lösung für Ihre Anforderungen.';
$cta_button_text = get_field( 'storage_cta_button_text' ) ?: 'Beratungsgespräch vereinbaren';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="storage-services-heading">
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

		<!-- Technology Partners Badge -->
		<div class="tech-partners">
			<div class="tech-partners__header">
				<span class="tech-partners__label">Technology Partners</span>
			</div>
			<div class="tech-partners__grid">
				<?php foreach ( $partners as $partner ) : ?>
					<div class="tech-partner-item">
						<span class="tech-partner-item__name"><?php echo esc_html( $partner['name'] ); ?></span>
						<span class="tech-partner-item__level"><?php echo esc_html( $partner['desc'] ); ?></span>
					</div>
				<?php endforeach; ?>
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
		<h2 id="storage-services-heading" class="section-title text-center mt-xl">Unsere Server & Storage Services</h2>
		<p class="section-description text-center mb-xl">Umfassende Hardware-Lösungen für Ihre IT-Infrastruktur</p>

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

		<!-- Use Cases Section -->
		<div class="use-cases-section">
			<h2 class="section-title text-center">Typische Einsatzszenarien</h2>
			<p class="section-description text-center mb-xl">Passende Lösungen für unterschiedliche Anforderungen</p>

			<div class="use-cases-grid">
				<div class="use-case-card">
					<div class="use-case-card__icon" aria-hidden="true">
						<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $icon_svgs['database'];
						?>
					</div>
					<h3 class="use-case-card__title">Datenbank-Server</h3>
					<p class="use-case-card__description">Hochperformante Server für SQL, Oracle und NoSQL-Datenbanken mit maximaler IOPS.</p>
				</div>
				<div class="use-case-card">
					<div class="use-case-card__icon" aria-hidden="true">
						<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $icon_svgs['cpu'];
						?>
					</div>
					<h3 class="use-case-card__title">Virtualisierung</h3>
					<p class="use-case-card__description">VMware vSphere und Hyper-V Cluster für konsolidierte, effiziente Infrastrukturen.</p>
				</div>
				<div class="use-case-card">
					<div class="use-case-card__icon" aria-hidden="true">
						<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $icon_svgs['trending'];
						?>
					</div>
					<h3 class="use-case-card__title">Big Data & Analytics</h3>
					<p class="use-case-card__description">Skalierbare Speicherlösungen für Data Lakes und Analytics-Workloads.</p>
				</div>
				<div class="use-case-card">
					<div class="use-case-card__icon" aria-hidden="true">
						<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $icon_svgs['refresh'];
						?>
					</div>
					<h3 class="use-case-card__title">Disaster Recovery</h3>
					<p class="use-case-card__description">Replikation und Failover-Lösungen für Geschäftskontinuität.</p>
				</div>
			</div>
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
