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
	'monitor'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
	'shield'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'book'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>',
	'cloud'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'settings'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M12 1v6m0 6v6m5.2-13.2l-4.2 4.2m0 6l4.2 4.2M23 12h-6m-6 0H1m18.2-5.2l-4.2 4.2m0 6l4.2 4.2"></path></svg>',
	'headphones' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'it_hero_tag' ) ?: 'IT Solutions';
$hero_subtitle = get_field( 'it_hero_subtitle' ) ?: 'Moderne IT-Services für Sicherheit, Effizienz und Skalierbarkeit.';
$hero_tagline  = get_field( 'it_hero_tagline' ) ?: 'Klar strukturiert. Sicher betrieben. Zukunftsfähig aufgebaut.';

// Service 1
$service_1_icon_key = get_field( 'it_service_1_icon' ) ?: 'monitor';
$service_1 = array(
	'icon'        => $icon_svgs[ $service_1_icon_key ] ?? $icon_svgs['monitor'],
	'title'       => get_field( 'itsp_service_1_title' ) ?: 'Microsoft 365 & Modern Workplace',
	'description' => get_field( 'itsp_service_1_desc' ) ?: 'Effiziente Zusammenarbeit beginnt mit der richtigen Plattform. Wir konzipieren, implementieren und betreiben Microsoft-365-Umgebungen, die Sicherheit, Governance und Benutzerfreundlichkeit vereinen. Von Exchange Online über SharePoint bis Teams und Entra ID – passgenau für Ihre Organisation.',
	'features'    => array_filter( array(
		get_field( 'itsp_service_1_f1' ) ?: 'Tenant-Design & Migration',
		get_field( 'itsp_service_1_f2' ) ?: 'Microsoft Teams & SharePoint Strukturen',
		get_field( 'itsp_service_1_f3' ) ?: 'Entra ID, Conditional Access & MFA',
		get_field( 'itsp_service_1_f4' ) ?: 'Governance & Zugriffskonzepte',
	) ),
	'link'        => home_url( '/microsoft-365/' ),
);

// Service 2
$service_2_icon_key = get_field( 'it_service_2_icon' ) ?: 'shield';
$service_2 = array(
	'icon'        => $icon_svgs[ $service_2_icon_key ] ?? $icon_svgs['shield'],
	'title'       => get_field( 'itsp_service_2_title' ) ?: 'Security & Zero Trust',
	'description' => get_field( 'itsp_service_2_desc' ) ?: 'IT-Sicherheit beginnt bei Identitäten. Wir entwickeln ganzheitliche Sicherheitskonzepte nach dem Zero-Trust-Prinzip und schützen Benutzer, Daten und Systeme vor modernen Bedrohungen.',
	'features'    => array_filter( array(
		get_field( 'itsp_service_2_f1' ) ?: 'Zero-Trust Architektur',
		get_field( 'itsp_service_2_f2' ) ?: 'MFA & Passwordless Authentication',
		get_field( 'itsp_service_2_f3' ) ?: 'Privileged Access & Admin-Sicherheit',
		get_field( 'itsp_service_2_f4' ) ?: 'Guest- & External-User-Management',
	) ),
	'link'        => home_url( '/cybersecurity/' ),
);

// Service 3
$service_3_icon_key = get_field( 'it_service_3_icon' ) ?: 'book';
$service_3 = array(
	'icon'        => $icon_svgs[ $service_3_icon_key ] ?? $icon_svgs['book'],
	'title'       => get_field( 'itsp_service_3_title' ) ?: 'IT Governance & Risk Assessment',
	'description' => get_field( 'itsp_service_3_desc' ) ?: 'Transparenz über Risiken ist die Basis guter Entscheidungen. Mit strukturierten IT-Governance- und Security-Assessments identifizieren wir Risiken, Sicherheitslücken und Optimierungspotenziale in Ihrer IT-Umgebung.',
	'features'    => array_filter( array(
		get_field( 'itsp_service_3_f1' ) ?: 'Management-Report (PDF)',
		get_field( 'itsp_service_3_f2' ) ?: 'Risiko-Score & Prioritäten',
		get_field( 'itsp_service_3_f3' ) ?: 'Konkrete Handlungsempfehlungen',
		get_field( 'itsp_service_3_f4' ) ?: 'Compliance- & Sicherheitsübersicht',
	) ),
	'link'        => home_url( '/beratung-analyse/' ),
);

// Service 4
$service_4_icon_key = get_field( 'it_service_4_icon' ) ?: 'cloud';
$service_4 = array(
	'icon'        => $icon_svgs[ $service_4_icon_key ] ?? $icon_svgs['cloud'],
	'title'       => get_field( 'itsp_service_4_title' ) ?: 'Cloud & Hybrid IT',
	'description' => get_field( 'itsp_service_4_desc' ) ?: 'Cloud-Lösungen, die zu Ihrer Realität passen. Wir planen und betreiben Azure- und Hybrid-Infrastrukturen, die bestehende Systeme nahtlos integrieren und zukunftssicher skalierbar sind.',
	'features'    => array_filter( array(
		get_field( 'itsp_service_4_f1' ) ?: 'Azure Architektur & Landing Zones',
		get_field( 'itsp_service_4_f2' ) ?: 'Hybrid AD / Entra ID',
		get_field( 'itsp_service_4_f3' ) ?: 'Backup & Disaster Recovery',
		get_field( 'itsp_service_4_f4' ) ?: 'Kosten- & Sicherheitsoptimierung',
	) ),
	'link'        => home_url( '/cloud-solutions/' ),
);

// Service 5
$service_5_icon_key = get_field( 'it_service_5_icon' ) ?: 'settings';
$service_5 = array(
	'icon'        => $icon_svgs[ $service_5_icon_key ] ?? $icon_svgs['settings'],
	'title'       => get_field( 'itsp_service_5_title' ) ?: 'Automation & IT Efficiency',
	'description' => get_field( 'itsp_service_5_desc' ) ?: 'Weniger manuelle Arbeit. Mehr Kontrolle. Durch gezielte Automatisierung reduzieren wir Fehler, beschleunigen Prozesse und erhöhen die Betriebssicherheit Ihrer IT.',
	'features'    => array_filter( array(
		get_field( 'itsp_service_5_f1' ) ?: 'Benutzer- & Zugriffsautomatisierung',
		get_field( 'itsp_service_5_f2' ) ?: 'Microsoft 365 Provisioning',
		get_field( 'itsp_service_5_f3' ) ?: 'Security Checks & Reports',
		get_field( 'itsp_service_5_f4' ) ?: 'Skript- & Prozessautomatisierung',
	) ),
	'link'        => home_url( '/automation-it-efficiency/' ),
);

// Service 6
$service_6_icon_key = get_field( 'it_service_6_icon' ) ?: 'headphones';
$service_6 = array(
	'icon'        => $icon_svgs[ $service_6_icon_key ] ?? $icon_svgs['headphones'],
	'title'       => get_field( 'itsp_service_6_title' ) ?: 'IT Support & Managed Services',
	'description' => get_field( 'itsp_service_6_desc' ) ?: 'Zuverlässiger IT-Betrieb ohne Komplexität. Wir übernehmen den stabilen Betrieb Ihrer IT-Umgebung – strukturiert, transparent und mit klaren Zuständigkeiten.',
	'features'    => array_filter( array(
		get_field( 'itsp_service_6_f1' ) ?: '1st & 2nd Level Support',
		get_field( 'itsp_service_6_f2' ) ?: 'Monitoring & Wartung',
		get_field( 'itsp_service_6_f3' ) ?: 'Incident- & Problem-Management',
		get_field( 'itsp_service_6_f4' ) ?: 'SLA-basierte Services',
	) ),
	'link'        => home_url( '/it-outsourcing/' ),
);

// Build services array
$services = array( $service_1, $service_2, $service_3, $service_4, $service_5, $service_6 );

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
	'tagline'  => $hero_tagline,
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

		<!-- Services Intro Text -->
		<div class="services-intro" style="text-align: center; max-width: 800px; margin: 0 auto var(--spacing-xl);">
			<p style="font-size: 1.125rem; color: var(--color-text-secondary); line-height: 1.7;">
				DataEnergie unterstützt Unternehmen bei Planung, Umsetzung und Betrieb moderner IT-Umgebungen – mit Fokus auf Microsoft 365, Security, Governance und Automatisierung.
			</p>
		</div>

		<!-- Services Grid -->
		<h2 id="services-heading" class="sr-only">Unsere IT-Dienstleistungen</h2>
		<div class="feature-grid feature-grid--3col feature-grid--6items">
			<?php foreach ( $services as $service ) : ?>
				<?php
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => $service['icon'],
					'title'       => $service['title'],
					'description' => $service['description'],
					'features'    => $service['features'],
					'variant'     => 'it',
					'expandable'  => true,
					'link'        => $service['link'] ?? '',
				) );
				?>
			<?php endforeach; ?>
		</div>

		<!-- Specialized Solutions Section -->
		<div class="specialized-solutions" style="margin-top: var(--spacing-xl);">
			<div class="section-header" style="margin-bottom: var(--spacing-md);">
				<span class="section-tag">Business Lösungen</span>
				<h3 class="section-title" style="font-size: 1.5rem;">Spezialisierte Lösungen</h3>
				<p class="section-description">
					Ergänzende digitale Lösungen für Ihre Geschäftsprozesse.
				</p>
			</div>
			<div class="feature-grid feature-grid--2col">
				<?php
				// Workforce Management Card
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
					'title'       => 'Workforce Management & Zeiterfassung',
					'description' => 'Digitale Zeiterfassung, Absenzen- und Personalplanung für Ihr Unternehmen. Moderne und rechtskonforme Lösungen.',
					'features'    => array(
						'Digitale Zeiterfassung',
						'Absenzen & Ferien',
						'Personalplanung',
						'Reporting & Analytics',
					),
					'variant'     => 'it',
					'expandable'  => false,
					'link'        => home_url( '/workforce-management/' ),
				) );

				// Smart Building Card
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
					'title'       => 'Smart Building Solutions',
					'description' => 'WashSlot Waschküchen-Buchung und intelligente Buchungssysteme für Gemeinschaftsräume in Liegenschaften.',
					'features'    => array(
						'WashSlot Waschküchen-Buchung',
						'Gemeinschaftsraum-Buchung',
						'Mobile App',
						'Verwaltung & Abrechnung',
					),
					'variant'     => 'it',
					'expandable'  => false,
					'link'        => home_url( '/smart-building/' ),
				) );
				?>
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
