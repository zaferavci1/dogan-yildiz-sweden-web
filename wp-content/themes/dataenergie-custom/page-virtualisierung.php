<?php
/**
 * Template Name: Virtualisierung
 *
 * Virtualisierung (Sanallaştırma) hizmetleri sayfası.
 * VMware, Hyper-V, Container ve VDI çözümleri.
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
	'layers'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>',
	'server'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'box'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
	'monitor'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
	'cpu'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>',
	'hard-drive' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'zap'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
	'trending'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>',
	'settings'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
	'refresh'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>',
	'copy'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'virt_hero_tag' ) ?: 'Virtualisierung';
$hero_subtitle = get_field( 'virt_hero_subtitle' ) ?: 'Effiziente IT-Infrastruktur durch moderne Virtualisierungstechnologien';

// Service 1 - VMware vSphere
$service_1 = array(
	'icon'        => $icon_svgs['layers'],
	'title'       => get_field( 'virt_service_1_title' ) ?: 'VMware vSphere',
	'description' => get_field( 'virt_service_1_description' ) ?: 'Die führende Virtualisierungsplattform für Enterprise-Umgebungen. Maximale Flexibilität und Zuverlässigkeit für Ihre kritischen Workloads.',
	'features'    => array_filter( array(
		get_field( 'virt_service_1_feature_1' ) ?: 'ESXi Hypervisor Management',
		get_field( 'virt_service_1_feature_2' ) ?: 'vCenter Server Administration',
		get_field( 'virt_service_1_feature_3' ) ?: 'vMotion & Storage vMotion',
		get_field( 'virt_service_1_feature_4' ) ?: 'High Availability Cluster',
	) ),
);

// Service 2 - Microsoft Hyper-V
$service_2 = array(
	'icon'        => $icon_svgs['server'],
	'title'       => get_field( 'virt_service_2_title' ) ?: 'Microsoft Hyper-V',
	'description' => get_field( 'virt_service_2_description' ) ?: 'Native Windows-Virtualisierung mit nahtloser Integration in Ihre Microsoft-Infrastruktur. Ideal für Windows-basierte Workloads.',
	'features'    => array_filter( array(
		get_field( 'virt_service_2_feature_1' ) ?: 'Windows Server Integration',
		get_field( 'virt_service_2_feature_2' ) ?: 'Live Migration',
		get_field( 'virt_service_2_feature_3' ) ?: 'Failover Clustering',
		get_field( 'virt_service_2_feature_4' ) ?: 'System Center Integration',
	) ),
);

// Service 3 - Container & Kubernetes
$service_3 = array(
	'icon'        => $icon_svgs['box'],
	'title'       => get_field( 'virt_service_3_title' ) ?: 'Container & Kubernetes',
	'description' => get_field( 'virt_service_3_description' ) ?: 'Moderne Container-Orchestrierung für Cloud-native Anwendungen. Schnelle Bereitstellung und effiziente Ressourcennutzung.',
	'features'    => array_filter( array(
		get_field( 'virt_service_3_feature_1' ) ?: 'Docker Container Management',
		get_field( 'virt_service_3_feature_2' ) ?: 'Kubernetes Cluster Setup',
		get_field( 'virt_service_3_feature_3' ) ?: 'CI/CD Pipeline Integration',
		get_field( 'virt_service_3_feature_4' ) ?: 'Container Registry',
	) ),
);

// Service 4 - VDI (Virtual Desktop Infrastructure)
$service_4 = array(
	'icon'        => $icon_svgs['monitor'],
	'title'       => get_field( 'virt_service_4_title' ) ?: 'Virtual Desktop (VDI)',
	'description' => get_field( 'virt_service_4_description' ) ?: 'Sichere virtuelle Arbeitsplätze für flexibles Arbeiten. Zentrale Verwaltung und Zugriff von überall.',
	'features'    => array_filter( array(
		get_field( 'virt_service_4_feature_1' ) ?: 'VMware Horizon',
		get_field( 'virt_service_4_feature_2' ) ?: 'Microsoft AVD/WVD',
		get_field( 'virt_service_4_feature_3' ) ?: 'Citrix Virtual Apps',
		get_field( 'virt_service_4_feature_4' ) ?: 'Persistent & Non-Persistent',
	) ),
);

// Service 5 - Storage Virtualisierung
$service_5 = array(
	'icon'        => $icon_svgs['hard-drive'],
	'title'       => get_field( 'virt_service_5_title' ) ?: 'Storage Virtualisierung',
	'description' => get_field( 'virt_service_5_description' ) ?: 'Abstrahieren Sie Ihren Speicher für maximale Flexibilität. Software-Defined Storage und Hyper-Converged Infrastructure.',
	'features'    => array_filter( array(
		get_field( 'virt_service_5_feature_1' ) ?: 'VMware vSAN',
		get_field( 'virt_service_5_feature_2' ) ?: 'Storage Spaces Direct',
		get_field( 'virt_service_5_feature_3' ) ?: 'Nutanix HCI',
		get_field( 'virt_service_5_feature_4' ) ?: 'Deduplication & Compression',
	) ),
);

// Service 6 - Netzwerk Virtualisierung
$service_6 = array(
	'icon'        => $icon_svgs['copy'],
	'title'       => get_field( 'virt_service_6_title' ) ?: 'Netzwerk Virtualisierung',
	'description' => get_field( 'virt_service_6_description' ) ?: 'Software-Defined Networking für agile und sichere Netzwerkinfrastruktur. Micro-Segmentierung und zentrale Steuerung.',
	'features'    => array_filter( array(
		get_field( 'virt_service_6_feature_1' ) ?: 'VMware NSX',
		get_field( 'virt_service_6_feature_2' ) ?: 'Virtual Switches & Routers',
		get_field( 'virt_service_6_feature_3' ) ?: 'Micro-Segmentation',
		get_field( 'virt_service_6_feature_4' ) ?: 'Network Automation',
	) ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4, $service_5, $service_6 );

// Benefits section - Virtualization advantages
$benefits = array(
	array(
		'icon'  => $icon_svgs['trending'],
		'title' => 'Bis 70% Kostenersparnis',
		'desc'  => 'Reduzieren Sie Hardware-Kosten durch effiziente Ressourcenauslastung.',
	),
	array(
		'icon'  => $icon_svgs['zap'],
		'title' => 'Schnelle Bereitstellung',
		'desc'  => 'Neue Server und Umgebungen in Minuten statt Wochen bereitstellen.',
	),
	array(
		'icon'  => $icon_svgs['shield'],
		'title' => 'Erhöhte Sicherheit',
		'desc'  => 'Isolierung, Snapshots und schnelle Recovery für maximalen Schutz.',
	),
);

// Why Virtualization section
$why_virtualization = array(
	array(
		'title' => 'Ressourceneffizienz',
		'desc'  => 'Maximale Auslastung Ihrer Hardware-Investitionen.',
	),
	array(
		'title' => 'Business Continuity',
		'desc'  => 'Disaster Recovery und Hochverfügbarkeit integriert.',
	),
	array(
		'title' => 'Skalierbarkeit',
		'desc'  => 'Einfach Ressourcen hinzufügen ohne Hardware-Tausch.',
	),
	array(
		'title' => 'Vereinfachtes Management',
		'desc'  => 'Zentrale Verwaltung aller virtuellen Ressourcen.',
	),
);

// Technology Partners
$partners = array(
	array(
		'name' => 'VMware',
		'desc' => 'vSphere Partner',
	),
	array(
		'name' => 'Microsoft',
		'desc' => 'Hyper-V Specialist',
	),
	array(
		'name' => 'Nutanix',
		'desc' => 'HCI Partner',
	),
	array(
		'name' => 'Citrix',
		'desc' => 'VDI Solutions',
	),
);

// CTA Section
$cta_title       = get_field( 'virt_cta_title' ) ?: 'Bereit für moderne Virtualisierung?';
$cta_description = get_field( 'virt_cta_description' ) ?: 'Lassen Sie uns gemeinsam Ihre IT-Infrastruktur optimieren und zukunftssicher gestalten.';
$cta_button_text = get_field( 'virt_cta_button_text' ) ?: 'Kostenlose Analyse anfordern';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="virtualisierung-services-heading">
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
		<div class="virt-partners">
			<span class="virt-partners__label">Unsere Technologie-Partner</span>
			<div class="virt-partners__grid">
				<?php foreach ( $partners as $partner ) : ?>
					<div class="virt-partner-item">
						<span class="virt-partner-item__name"><?php echo esc_html( $partner['name'] ); ?></span>
						<span class="virt-partner-item__desc"><?php echo esc_html( $partner['desc'] ); ?></span>
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

		<!-- Why Virtualization Section -->
		<div class="cloud-why-section">
			<h2 class="cloud-why-section__title">Warum Virtualisierung?</h2>
			<div class="cloud-why-grid">
				<?php foreach ( $why_virtualization as $item ) : ?>
					<div class="cloud-why-card">
						<h3 class="cloud-why-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="cloud-why-card__text"><?php echo esc_html( $item['desc'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Services Grid -->
		<h2 id="virtualisierung-services-heading" class="section-title text-center mt-xl">Unsere Virtualisierungslösungen</h2>
		<p class="section-description text-center mb-xl">Von Hypervisor bis Container - wir implementieren die passende Lösung</p>

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
		<div class="virt-usecases">
			<h2 class="virt-usecases__title">Typische Einsatzszenarien</h2>
			<div class="virt-usecases__grid">
				<div class="virt-usecase">
					<div class="virt-usecase__icon" aria-hidden="true">
						<?php echo $icon_svgs['server']; // phpcs:ignore ?>
					</div>
					<h3 class="virt-usecase__title">Server-Konsolidierung</h3>
					<p class="virt-usecase__text">Mehrere physische Server auf wenige leistungsstarke Hosts konsolidieren und Kosten senken.</p>
				</div>
				<div class="virt-usecase">
					<div class="virt-usecase__icon" aria-hidden="true">
						<?php echo $icon_svgs['refresh']; // phpcs:ignore ?>
					</div>
					<h3 class="virt-usecase__title">Test & Entwicklung</h3>
					<p class="virt-usecase__text">Schnelle Bereitstellung von Testumgebungen mit einfachem Reset durch Snapshots.</p>
				</div>
				<div class="virt-usecase">
					<div class="virt-usecase__icon" aria-hidden="true">
						<?php echo $icon_svgs['shield']; // phpcs:ignore ?>
					</div>
					<h3 class="virt-usecase__title">Disaster Recovery</h3>
					<p class="virt-usecase__text">VM-Replikation und automatisches Failover für unterbrechungsfreien Betrieb.</p>
				</div>
				<div class="virt-usecase">
					<div class="virt-usecase__icon" aria-hidden="true">
						<?php echo $icon_svgs['monitor']; // phpcs:ignore ?>
					</div>
					<h3 class="virt-usecase__title">Remote Work</h3>
					<p class="virt-usecase__text">VDI-Lösungen für sicheres und produktives Arbeiten von überall.</p>
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
