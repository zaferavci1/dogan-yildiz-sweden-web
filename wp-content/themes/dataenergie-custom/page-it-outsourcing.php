<?php
/**
 * Template Name: IT Outsourcing
 *
 * IT Outsourcing & Managed Services Seite.
 * Modern SaaS Design (Vercel/Linear Ästhetik).
 * ACF Free kompatibel mit Fallback-Werten.
 *
 * @package Dataenergie
 * @version 2.1.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'headphones'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
	'server'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
	'cloud'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'shield'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'database'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
	'settings'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
	'clock'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
	'trending-down' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>',
	'users'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'zap'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
	'check-circle' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
	'life-buoy'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line></svg>',
);

// =============================================================================
// ACF DATEN MIT FALLBACK - ACF FREE KOMPATIBEL
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'outsourcing_hero_tag' ) ?: 'IT Outsourcing';
$hero_subtitle = get_field( 'outsourcing_hero_subtitle' ) ?: 'Fokussieren Sie sich auf Ihr Kerngeschäft - wir kümmern uns um Ihre IT';

// Outsourcing Modelle
$models = array(
	array(
		'icon'  => $icon_svgs['settings'],
		'title' => 'Full Outsourcing',
		'desc'  => 'Komplette Auslagerung Ihrer IT-Abteilung an unser erfahrenes Team.',
	),
	array(
		'icon'  => $icon_svgs['users'],
		'title' => 'Co-Sourcing',
		'desc'  => 'Ergänzung Ihres IT-Teams mit unseren Spezialisten bei Bedarf.',
	),
	array(
		'icon'  => $icon_svgs['life-buoy'],
		'title' => 'Selective Outsourcing',
		'desc'  => 'Gezielte Auslagerung einzelner IT-Bereiche wie Support oder Security.',
	),
);

// Services
$services = array(
	array(
		'icon'        => $icon_svgs['headphones'],
		'title'       => get_field( 'outsourcing_service_1_title' ) ?: 'Helpdesk & Support',
		'description' => get_field( 'outsourcing_service_1_desc' ) ?: 'Professioneller 1st & 2nd Level Support für Ihre Mitarbeiter. Schnelle Reaktionszeiten und kompetente Hilfe.',
		'features'    => array_filter( array(
			get_field( 'outsourcing_service_1_f1' ) ?: '1st & 2nd Level Support',
			get_field( 'outsourcing_service_1_f2' ) ?: 'Ticket-Management System',
			get_field( 'outsourcing_service_1_f3' ) ?: 'Remote & Vor-Ort Support',
			get_field( 'outsourcing_service_1_f4' ) ?: 'Definierte SLAs',
		) ),
	),
	array(
		'icon'        => $icon_svgs['server'],
		'title'       => get_field( 'outsourcing_service_2_title' ) ?: 'Infrastructure Management',
		'description' => get_field( 'outsourcing_service_2_desc' ) ?: 'Proaktive Verwaltung und Wartung Ihrer gesamten IT-Infrastruktur.',
		'features'    => array_filter( array(
			get_field( 'outsourcing_service_2_f1' ) ?: 'Server & Storage Management',
			get_field( 'outsourcing_service_2_f2' ) ?: 'Netzwerk-Administration',
			get_field( 'outsourcing_service_2_f3' ) ?: 'Patch Management',
			get_field( 'outsourcing_service_2_f4' ) ?: 'Performance Monitoring',
		) ),
	),
	array(
		'icon'        => $icon_svgs['cloud'],
		'title'       => get_field( 'outsourcing_service_3_title' ) ?: 'Cloud Management',
		'description' => get_field( 'outsourcing_service_3_desc' ) ?: 'Verwaltung Ihrer Cloud-Umgebungen in Azure, AWS oder hybriden Setups.',
		'features'    => array_filter( array(
			get_field( 'outsourcing_service_3_f1' ) ?: 'Azure & Microsoft 365',
			get_field( 'outsourcing_service_3_f2' ) ?: 'Cloud-Optimierung',
			get_field( 'outsourcing_service_3_f3' ) ?: 'Cost Management',
			get_field( 'outsourcing_service_3_f4' ) ?: 'Hybrid Cloud Support',
		) ),
	),
	array(
		'icon'        => $icon_svgs['shield'],
		'title'       => get_field( 'outsourcing_service_4_title' ) ?: 'Security Operations',
		'description' => get_field( 'outsourcing_service_4_desc' ) ?: 'Kontinuierlicher Schutz Ihrer IT durch Monitoring, Incident Response und Prävention.',
		'features'    => array_filter( array(
			get_field( 'outsourcing_service_4_f1' ) ?: '24/7 Security Monitoring',
			get_field( 'outsourcing_service_4_f2' ) ?: 'Incident Response',
			get_field( 'outsourcing_service_4_f3' ) ?: 'Vulnerability Management',
			get_field( 'outsourcing_service_4_f4' ) ?: 'Security Awareness',
		) ),
	),
	array(
		'icon'        => $icon_svgs['database'],
		'title'       => get_field( 'outsourcing_service_5_title' ) ?: 'Backup & Disaster Recovery',
		'description' => get_field( 'outsourcing_service_5_desc' ) ?: 'Zuverlässige Datensicherung und schnelle Wiederherstellung im Ernstfall.',
		'features'    => array_filter( array(
			get_field( 'outsourcing_service_5_f1' ) ?: 'Automatisierte Backups',
			get_field( 'outsourcing_service_5_f2' ) ?: 'Disaster Recovery Planung',
			get_field( 'outsourcing_service_5_f3' ) ?: 'Regelmässige Tests',
			get_field( 'outsourcing_service_5_f4' ) ?: 'Geo-redundante Speicherung',
		) ),
	),
	array(
		'icon'        => $icon_svgs['settings'],
		'title'       => get_field( 'outsourcing_service_6_title' ) ?: 'Workplace Management',
		'description' => get_field( 'outsourcing_service_6_desc' ) ?: 'Verwaltung aller Endgeräte und Arbeitsplätze Ihrer Mitarbeiter.',
		'features'    => array_filter( array(
			get_field( 'outsourcing_service_6_f1' ) ?: 'Device Lifecycle Management',
			get_field( 'outsourcing_service_6_f2' ) ?: 'Software Deployment',
			get_field( 'outsourcing_service_6_f3' ) ?: 'Endpoint Security',
			get_field( 'outsourcing_service_6_f4' ) ?: 'Mobile Device Management',
		) ),
	),
);

// Vorteile
$benefits = array(
	array(
		'icon'  => $icon_svgs['trending-down'],
		'title' => 'Kalkulierbare Kosten',
		'desc'  => 'Fixe monatliche Kosten statt unvorhergesehener IT-Ausgaben.',
	),
	array(
		'icon'  => $icon_svgs['clock'],
		'title' => '24/7 Verfügbarkeit',
		'desc'  => 'Rund-um-die-Uhr Support und Monitoring für Ihre Systeme.',
	),
	array(
		'icon'  => $icon_svgs['users'],
		'title' => 'Experten-Team',
		'desc'  => 'Zugang zu zertifizierten Spezialisten ohne Rekrutierungsaufwand.',
	),
	array(
		'icon'  => $icon_svgs['zap'],
		'title' => 'Skalierbarkeit',
		'desc'  => 'Flexible Anpassung der Leistungen an Ihre Bedürfnisse.',
	),
);

// CTA Section
$cta_title       = get_field( 'outsourcing_cta_title' ) ?: 'Entlasten Sie Ihr Team';
$cta_description = get_field( 'outsourcing_cta_desc' ) ?: 'Erfahren Sie, wie IT Outsourcing Ihr Unternehmen voranbringt.';
$cta_button_text = get_field( 'outsourcing_cta_button' ) ?: 'Unverbindliches Angebot';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="outsourcing-services-heading">
	<div class="container">

		<!-- Intro Content -->
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

		<!-- Outsourcing Models -->
		<div class="outsourcing-models" aria-labelledby="models-heading">
			<h2 id="models-heading" class="section-title text-center">Unsere Outsourcing-Modelle</h2>
			<p class="section-description text-center mb-xl">Flexibel anpassbar an Ihre Anforderungen</p>

			<div class="models-grid">
				<?php foreach ( $models as $model ) : ?>
					<article class="model-card">
						<div class="model-card__icon" aria-hidden="true">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized above
							echo $model['icon'];
							?>
						</div>
						<h3 class="model-card__title"><?php echo esc_html( $model['title'] ); ?></h3>
						<p class="model-card__desc"><?php echo esc_html( $model['desc'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Benefits Section -->
		<div class="outsourcing-benefits">
			<div class="benefits-grid">
				<?php foreach ( $benefits as $benefit ) : ?>
					<div class="benefit-item">
						<div class="benefit-item__icon" aria-hidden="true">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized above
							echo $benefit['icon'];
							?>
						</div>
						<div class="benefit-item__content">
							<h3 class="benefit-item__title"><?php echo esc_html( $benefit['title'] ); ?></h3>
							<p class="benefit-item__text"><?php echo esc_html( $benefit['desc'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Services Grid -->
		<h2 id="outsourcing-services-heading" class="section-title text-center mt-xl">Unsere Managed Services</h2>
		<p class="section-description text-center mb-xl">Umfassende IT-Dienstleistungen aus einer Hand</p>

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

		<!-- SLA Info -->
		<div class="sla-info">
			<div class="sla-info__content">
				<h3 class="sla-info__title">Service Level Agreements</h3>
				<p class="sla-info__text">Alle unsere Leistungen sind durch verbindliche SLAs abgesichert. Sie erhalten definierte Reaktionszeiten, regelmässige Reports und einen dedizierten Ansprechpartner.</p>
			</div>
			<div class="sla-info__metrics">
				<div class="sla-metric">
					<span class="sla-metric__value">99.9%</span>
					<span class="sla-metric__label">Verfügbarkeit</span>
				</div>
				<div class="sla-metric">
					<span class="sla-metric__value">&lt;15min</span>
					<span class="sla-metric__label">Reaktionszeit</span>
				</div>
				<div class="sla-metric">
					<span class="sla-metric__value">24/7</span>
					<span class="sla-metric__label">Monitoring</span>
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
