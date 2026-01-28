<?php
/**
 * Template Name: Automation & IT Efficiency
 *
 * IT-Automatisierung Beratungsseite.
 * Strukturierte Darstellung von Problem, Lösung und Mehrwert.
 *
 * @package Dataenergie
 * @version 3.0.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'alert'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>',
	'check'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
	'zap'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
	'star'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
	'users'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
);

// =============================================================================
// CONTENT DATA
// =============================================================================

// Hero Section
$hero_tag      = 'Automation';
$hero_subtitle = 'Gezielte IT-Automatisierung mit Struktur';

// Problem Section
$problem_intro = 'In vielen IT-Umgebungen läuft noch zu viel manuell:';
$problems = array(
	'Benutzer- und Zugriffsprozesse sind zeitaufwendig',
	'Fehleranfällige Routinearbeiten',
	'Fehlende Standardisierung',
	'Geringe Transparenz über Änderungen',
	'Abhängigkeit von Einzelpersonen',
);
$problem_result = 'Ergebnis: hoher Aufwand bei sinkender Kontrolle.';

// Solution Section
$solution_title       = 'Unsere Lösung';
$solution_subtitle    = 'Gezielte IT-Automatisierung mit Struktur';
$solution_description = 'DataEnergie automatisiert Prozesse dort, wo es sinnvoll ist – transparent, dokumentiert und sicher integriert in Ihre bestehende IT-Landschaft.';
$solution_tagline     = 'Automatisierung als Werkzeug – nicht als Blackbox.';

// Automatisierungs-Schwerpunkte (Was wir automatisieren)
$leistungen = array(
	'Benutzer- & Rollenprovisionierung',
	'Microsoft 365 (Teams, SharePoint, Gruppen)',
	'Identity- & Security-Prozesse',
	'Reporting & Compliance-Checks',
	'Wiederkehrende Betriebsprozesse',
	'Skript- & Workflow-Automatisierung',
);

// Mehrwert (Ergebnisse für Sie)
$mehrwert = array(
	'Deutlich weniger manueller Aufwand',
	'Reduzierte Fehlerquote',
	'Schnellere Reaktionszeiten',
	'Nachvollziehbare Prozesse',
	'Höhere Betriebssicherheit',
);
$mehrwert_tagline = 'Effizienz, die messbar und nachhaltig ist.';

// Warum DataEnergie?
$vorteile = array(
	'Tiefe Microsoft- & Automation-Expertise',
	'Praxisnahe Umsetzung statt Tool-Spielerei',
	'Fokus auf Sicherheit & Governance',
	'Saubere Dokumentation',
	'Schweizer Qualitäts- & Betriebsanspruch',
);
$vorteile_tagline = 'Wir automatisieren so, dass Ihre IT beherrschbar bleibt.';

// Zielgruppe
$zielgruppen = array(
	'IT-Teams mit hoher operativer Last',
	'Organisationen mit Microsoft 365',
	'Unternehmen mit wachsenden Strukturen',
	'IT-Leitungen mit Effizienz-Zielen',
	'KMU & mittlere Organisationen',
);

// Ablauf
$ablauf_steps = array(
	array(
		'number' => '1',
		'title'  => 'Analyse manueller Prozesse',
	),
	array(
		'number' => '2',
		'title'  => 'Identifikation von Automatisierungspotenzial',
	),
	array(
		'number' => '3',
		'title'  => 'Umsetzung & Tests',
	),
	array(
		'number' => '4',
		'title'  => 'Übergabe & Dokumentation',
	),
);
$ablauf_tagline = 'Schrittweise, kontrolliert, ohne Risiko.';

// CTA Section
$cta_title       = 'Möchten Sie Ihre IT-Prozesse vereinfachen?';
$cta_description = 'Vereinbaren Sie ein unverbindliches Erstgespräch. Wir zeigen Ihnen, wo Automatisierung echten Mehrwert bringt.';
$cta_button_text = 'Erstgespräch anfragen';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="automation-main-heading">
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

		<!-- Problem Section -->
		<div class="m365-problem-section">
			<div class="problem-box">
				<div class="problem-box__icon" aria-hidden="true">
					<?php echo $icon_svgs['alert']; ?>
				</div>
				<div class="problem-box__content">
					<h2 class="problem-box__title">Das Problem</h2>
					<p class="problem-box__intro"><?php echo esc_html( $problem_intro ); ?></p>
					<ul class="problem-list">
						<?php foreach ( $problems as $problem ) : ?>
							<li class="problem-list__item">
								<span class="problem-list__bullet" aria-hidden="true">&times;</span>
								<?php echo esc_html( $problem ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<p class="problem-box__result"><?php echo esc_html( $problem_result ); ?></p>
				</div>
			</div>
		</div>

		<!-- Solution Section -->
		<div class="m365-solution-section">
			<div class="solution-header text-center">
				<span class="section-tag"><?php echo esc_html( $solution_title ); ?></span>
				<h2 id="automation-main-heading" class="section-title"><?php echo esc_html( $solution_subtitle ); ?></h2>
				<p class="section-description"><?php echo esc_html( $solution_description ); ?></p>
				<p class="solution-tagline"><strong><?php echo esc_html( $solution_tagline ); ?></strong></p>
			</div>
		</div>

		<!-- Two Column: Automatisierungs-Schwerpunkte & Mehrwert -->
		<div class="m365-two-columns">
			<!-- Automatisierungs-Schwerpunkte -->
			<div class="m365-column">
				<div class="column-header">
					<div class="column-icon" aria-hidden="true">
						<?php echo $icon_svgs['zap']; ?>
					</div>
					<h3 class="column-title">Was wir automatisieren</h3>
					<span class="column-subtitle">Automatisierungs-Schwerpunkte</span>
				</div>
				<ul class="check-list">
					<?php foreach ( $leistungen as $item ) : ?>
						<li class="check-list__item">
							<span class="check-list__icon" aria-hidden="true"><?php echo $icon_svgs['check']; ?></span>
							<?php echo esc_html( $item ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<!-- Mehrwert -->
			<div class="m365-column">
				<div class="column-header">
					<div class="column-icon column-icon--success" aria-hidden="true">
						<?php echo $icon_svgs['star']; ?>
					</div>
					<h3 class="column-title">Ergebnisse für Sie</h3>
					<span class="column-subtitle">Konkreter Nutzen</span>
				</div>
				<ul class="check-list check-list--success">
					<?php foreach ( $mehrwert as $item ) : ?>
						<li class="check-list__item">
							<span class="check-list__icon" aria-hidden="true"><?php echo $icon_svgs['check']; ?></span>
							<?php echo esc_html( $item ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<p class="column-tagline"><?php echo esc_html( $mehrwert_tagline ); ?></p>
			</div>
		</div>

		<!-- Warum DataEnergie? -->
		<div class="m365-vorteile-section">
			<h2 class="section-title text-center">Warum DataEnergie?</h2>
			<p class="section-description text-center mb-xl">Ihr Vorteil</p>
			<div class="vorteile-grid">
				<?php foreach ( $vorteile as $vorteil ) : ?>
					<div class="vorteil-item">
						<span class="vorteil-item__icon" aria-hidden="true"><?php echo $icon_svgs['check']; ?></span>
						<span class="vorteil-item__text"><?php echo esc_html( $vorteil ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="vorteile-tagline text-center"><?php echo esc_html( $vorteile_tagline ); ?></p>
		</div>

		<!-- Zielgruppe -->
		<div class="m365-zielgruppe-section">
			<h2 class="section-title text-center">Für wen ist diese Lösung geeignet?</h2>
			<div class="zielgruppe-tags">
				<?php foreach ( $zielgruppen as $zielgruppe ) : ?>
					<span class="zielgruppe-tag">
						<span class="zielgruppe-tag__icon" aria-hidden="true"><?php echo $icon_svgs['users']; ?></span>
						<?php echo esc_html( $zielgruppe ); ?>
					</span>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Ablauf -->
		<div class="m365-ablauf-section">
			<h2 class="section-title text-center">Ablauf</h2>
			<p class="section-description text-center mb-xl">Klar & effizient</p>
			<div class="ablauf-steps">
				<?php foreach ( $ablauf_steps as $index => $step ) : ?>
					<div class="ablauf-step">
						<div class="ablauf-step__number"><?php echo esc_html( $step['number'] ); ?></div>
						<div class="ablauf-step__title"><?php echo esc_html( $step['title'] ); ?></div>
						<?php if ( $index < count( $ablauf_steps ) - 1 ) : ?>
							<div class="ablauf-step__arrow" aria-hidden="true"><?php echo $icon_svgs['arrow-right']; ?></div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="ablauf-tagline text-center"><?php echo esc_html( $ablauf_tagline ); ?></p>
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
