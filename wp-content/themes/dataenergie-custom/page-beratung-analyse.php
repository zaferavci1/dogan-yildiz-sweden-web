<?php
/**
 * Template Name: Beratung & Analyse
 *
 * IT-Beratung und Analyse Dienstleistungen Seite.
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
	'clipboard'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
	'search'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
	'target'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
	'compass'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>',
	'check-circle' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
	'bar-chart'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
	'shield'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
	'cloud'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
	'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>',
	'dollar-sign' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>',
	'users'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'award'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>',
);

// =============================================================================
// ACF DATEN MIT FALLBACK - ACF FREE KOMPATIBEL
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'beratung_hero_tag' ) ?: 'Governance & Risk Assessment';
$hero_subtitle = get_field( 'beratung_hero_subtitle' ) ?: 'DataEnergie analysiert Ihre Microsoft-365-Umgebung systematisch und erstellt eine klare, managementtaugliche Übersicht über Risiken, Sicherheitsstatus und Optimierungspotenziale.';

// Intro tagline
$intro_tagline = 'Kein Tool-Chaos. Keine unverständlichen Reports. Klare Aussagen und priorisierte Empfehlungen.';

// Was wir analysieren - Analyse-Schwerpunkte
$analyse_schwerpunkte = array(
	'Identity & Access Security (Entra ID)',
	'MFA-Abdeckung & Authentifizierungsmethoden',
	'Administrator- & Privileged-Rollen',
	'Conditional-Access-Policies',
	'Guest- & External-User-Risiken',
	'Governance- und Policy-Lücken',
	'Technische Sicherheits- und Konfigurationsrisiken',
);

// Ergebnisse für Sie
$ergebnisse = array(
	'Management-Report (PDF)',
	'Übersichtlicher Risiko-Score',
	'Klar priorisierte Top-Risiken',
	'Konkrete Handlungsempfehlungen',
	'Technische und strategische Sicht',
);

$ideal_fuer = array(
	'IT-Leitung',
	'Geschäftsführung',
	'Compliance / Security-Verantwortliche',
);

// Warum DataEnergie?
$vorteile = array(
	'Fokus auf Microsoft 365 & Security',
	'Governance- und Risiko-Know-how',
	'Klare, strukturierte Methodik',
	'Schweizer Markt & Anforderungen',
	'Verständlich für Management UND Technik',
);

$vorteil_tagline = 'Wir zeigen nicht nur was falsch ist, sondern was als Nächstes sinnvoll ist.';

// Für wen ist dieses Assessment geeignet?
$zielgruppen = array(
	'KMU & Organisationen mit Microsoft 365',
	'Unternehmen vor Security- oder MFA-Einführung',
	'IT-Leitungen, die Transparenz brauchen',
	'Management, das fundierte Entscheidungen treffen will',
	'Vorbereitung auf Audits oder interne Reviews',
);

// Ablauf (Prozessschritte)
$process_steps = array(
	array(
		'number' => '01',
		'icon'   => $icon_svgs['clipboard'],
		'title'  => 'Erstgespräch & Zieldefinition',
		'desc'   => 'Gemeinsame Definition Ihrer Ziele und Anforderungen in einem unverbindlichen Erstgespräch.',
	),
	array(
		'number' => '02',
		'icon'   => $icon_svgs['search'],
		'title'  => 'Technische Analyse',
		'desc'   => 'Systematische Analyse Ihrer Microsoft-365-Umgebung und Sicherheitskonfiguration.',
	),
	array(
		'number' => '03',
		'icon'   => $icon_svgs['bar-chart'],
		'title'  => 'Auswertung & Risiko-Bewertung',
		'desc'   => 'Strukturierte Bewertung der identifizierten Risiken und Priorisierung der Massnahmen.',
	),
	array(
		'number' => '04',
		'icon'   => $icon_svgs['check-circle'],
		'title'  => 'Management-Report & Besprechung',
		'desc'   => 'Präsentation der Ergebnisse mit konkreten Handlungsempfehlungen für Ihr Management.',
	),
);

// CTA Section
$cta_title       = get_field( 'beratung_cta_title' ) ?: 'Möchten Sie Klarheit über Ihre IT-Risiken?';
$cta_description = get_field( 'beratung_cta_desc' ) ?: 'Vereinbaren Sie ein unverbindliches Erstgespräch. Wir zeigen Ihnen, wo Sie stehen – und was wirklich zählt.';
$cta_button_text = get_field( 'beratung_cta_button' ) ?: 'Erstgespräch anfragen';

// Check SVG for lists
$check_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content governance-assessment" aria-labelledby="governance-heading">
	<div class="container">

		<!-- Intro Tagline -->
		<div class="assessment-intro" style="text-align: center; max-width: 800px; margin: 0 auto var(--spacing-xl);">
			<p style="font-size: 1.125rem; color: var(--color-primary); font-weight: 500; font-style: italic;">
				<?php echo esc_html( $intro_tagline ); ?>
			</p>
		</div>

		<!-- Was wir analysieren -->
		<div class="assessment-section" style="margin-bottom: var(--spacing-xl);">
			<h2 id="governance-heading" class="section-title">Was wir analysieren</h2>
			<p class="section-description" style="margin-bottom: var(--spacing-md);">Analyse-Schwerpunkte</p>
			<div class="assessment-card" style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--spacing-lg);">
				<ul class="check-list-modern" role="list">
					<?php foreach ( $analyse_schwerpunkte as $item ) : ?>
						<li>
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG
							echo $check_svg;
							?>
							<span><?php echo esc_html( $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<!-- Ergebnisse für Sie -->
		<div class="assessment-section" style="margin-bottom: var(--spacing-xl);">
			<h2 class="section-title">Ergebnisse für Sie</h2>
			<p class="section-description" style="margin-bottom: var(--spacing-md);">Klare Resultate statt Rohdaten</p>
			<div class="assessment-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--spacing-lg);">
				<!-- Sie erhalten -->
				<div class="assessment-card" style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--spacing-lg);">
					<h3 style="font-size: 1rem; font-weight: 600; color: var(--color-primary); margin-bottom: var(--spacing-sm);">Sie erhalten:</h3>
					<ul class="check-list-modern" role="list">
						<?php foreach ( $ergebnisse as $item ) : ?>
							<li>
								<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG
								echo $check_svg;
								?>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<!-- Ideal für -->
				<div class="assessment-card" style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--spacing-lg);">
					<h3 style="font-size: 1rem; font-weight: 600; color: var(--color-primary); margin-bottom: var(--spacing-sm);">Ideal für:</h3>
					<ul class="check-list-modern" role="list">
						<?php foreach ( $ideal_fuer as $item ) : ?>
							<li>
								<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG
								echo $check_svg;
								?>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Warum DataEnergie? -->
		<div class="assessment-section" style="margin-bottom: var(--spacing-xl);">
			<h2 class="section-title">Warum DataEnergie?</h2>
			<p class="section-description" style="margin-bottom: var(--spacing-md);">Ihr Vorteil</p>
			<div class="assessment-card" style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--spacing-lg);">
				<ul class="check-list-modern" role="list">
					<?php foreach ( $vorteile as $item ) : ?>
						<li>
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG
							echo $check_svg;
							?>
							<span><?php echo esc_html( $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
				<p style="font-size: 1rem; color: var(--color-primary); font-weight: 500; font-style: italic; margin-top: var(--spacing-md); padding-top: var(--spacing-md); border-top: 1px solid var(--color-border);">
					<?php echo esc_html( $vorteil_tagline ); ?>
				</p>
			</div>
		</div>

		<!-- Für wen ist dieses Assessment geeignet? -->
		<div class="assessment-section" style="margin-bottom: var(--spacing-xl);">
			<h2 class="section-title">Für wen ist dieses Assessment geeignet?</h2>
			<div class="assessment-card" style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--spacing-lg);">
				<ul class="check-list-modern" role="list">
					<?php foreach ( $zielgruppen as $item ) : ?>
						<li>
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG
							echo $check_svg;
							?>
							<span><?php echo esc_html( $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<!-- Ablauf -->
		<div class="process-section" aria-labelledby="process-heading" style="margin-bottom: var(--spacing-xl);">
			<h2 id="process-heading" class="section-title text-center">Ablauf</h2>
			<p class="section-description text-center mb-xl">Einfach & effizient</p>

			<div class="process-steps">
				<?php foreach ( $process_steps as $index => $step ) : ?>
					<article class="process-step">
						<div class="process-step__number" aria-hidden="true"><?php echo esc_html( $step['number'] ); ?></div>
						<div class="process-step__icon" aria-hidden="true">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized above
							echo $step['icon'];
							?>
						</div>
						<h3 class="process-step__title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="process-step__desc"><?php echo esc_html( $step['desc'] ); ?></p>
						<?php if ( $index < count( $process_steps ) - 1 ) : ?>
							<div class="process-step__connector" aria-hidden="true"></div>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>

			<p style="text-align: center; font-size: 0.9375rem; color: var(--color-text-secondary); margin-top: var(--spacing-lg);">
				Dauer: wenige Tage – kein Betriebsunterbruch
			</p>
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
