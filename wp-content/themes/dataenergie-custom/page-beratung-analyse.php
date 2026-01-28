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
	'alert'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>',
	'clipboard'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
	'search'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
	'target'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
	'check-circle' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
	'bar-chart'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
	'users'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
);

// =============================================================================
// CONTENT DATA
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'beratung_hero_tag' ) ?: 'IT Governance & Risk Assessment';
$hero_subtitle = get_field( 'beratung_hero_subtitle' ) ?: 'Transparenz, Sicherheit und Kontrolle über Ihre IT';

// Problem Section
$problems = array(
	'Sicherheitsrisiken und Schwachstellen',
	'Administrator- und Zugriffsrechte',
	'MFA-Abdeckung und Identity-Risiken',
	'Governance-Lücken und technische Schulden',
);
$problem_result = 'Entscheidungen werden oft ohne belastbare Datenbasis getroffen.';

// Solution Section
$solution_title       = 'Unsere Lösung';
$solution_subtitle    = 'Strukturiertes IT Governance & Risk Assessment';
$solution_description = 'DataEnergie analysiert Ihre Microsoft-365-Umgebung systematisch und erstellt eine klare, managementtaugliche Übersicht über Risiken, Sicherheitsstatus und Optimierungspotenziale.';
$solution_tagline     = 'Kein Tool-Chaos. Keine unverständlichen Reports. Klare Aussagen und priorisierte Empfehlungen.';

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

<section class="page-content" aria-labelledby="governance-heading">
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
					<p class="problem-box__intro">Viele Unternehmen nutzen Microsoft 365 intensiv – aber ohne klare Übersicht über:</p>
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
				<h2 id="governance-heading" class="section-title"><?php echo esc_html( $solution_subtitle ); ?></h2>
				<p class="section-description"><?php echo esc_html( $solution_description ); ?></p>
				<p class="solution-tagline"><strong><?php echo esc_html( $solution_tagline ); ?></strong></p>
			</div>
		</div>

		<!-- Two Column: Was wir analysieren & Ergebnisse -->
		<div class="m365-two-columns">
			<!-- Was wir analysieren -->
			<div class="m365-column">
				<div class="column-header">
					<div class="column-icon" aria-hidden="true">
						<?php echo $icon_svgs['search']; ?>
					</div>
					<h3 class="column-title">Was wir analysieren</h3>
					<span class="column-subtitle">Analyse-Schwerpunkte</span>
				</div>
				<ul class="check-list">
					<?php foreach ( $analyse_schwerpunkte as $item ) : ?>
						<li class="check-list__item">
							<span class="check-list__icon" aria-hidden="true"><?php echo $check_svg; ?></span>
							<?php echo esc_html( $item ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<!-- Ergebnisse für Sie -->
			<div class="m365-column">
				<div class="column-header">
					<div class="column-icon column-icon--success" aria-hidden="true">
						<?php echo $icon_svgs['bar-chart']; ?>
					</div>
					<h3 class="column-title">Ergebnisse für Sie</h3>
					<span class="column-subtitle">Klare Resultate statt Rohdaten</span>
				</div>
				<ul class="check-list check-list--success">
					<?php foreach ( $ergebnisse as $item ) : ?>
						<li class="check-list__item">
							<span class="check-list__icon" aria-hidden="true"><?php echo $check_svg; ?></span>
							<?php echo esc_html( $item ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<p class="column-tagline">Ideal für: <?php echo esc_html( implode( ', ', $ideal_fuer ) ); ?></p>
			</div>
		</div>

		<!-- Warum DataEnergie? -->
		<div class="m365-vorteile-section">
			<h2 class="section-title text-center">Warum DataEnergie?</h2>
			<p class="section-description text-center mb-xl">Ihr Vorteil</p>
			<div class="vorteile-grid">
				<?php foreach ( $vorteile as $vorteil ) : ?>
					<div class="vorteil-item">
						<span class="vorteil-item__icon" aria-hidden="true"><?php echo $check_svg; ?></span>
						<span class="vorteil-item__text"><?php echo esc_html( $vorteil ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="vorteile-tagline text-center"><?php echo esc_html( $vorteil_tagline ); ?></p>
		</div>

		<!-- Zielgruppe -->
		<div class="m365-zielgruppe-section">
			<h2 class="section-title text-center">Für wen ist dieses Assessment geeignet?</h2>
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
			<p class="section-description text-center mb-xl">Einfach & effizient</p>
			<div class="ablauf-steps">
				<?php foreach ( $process_steps as $index => $step ) : ?>
					<div class="ablauf-step">
						<div class="ablauf-step__number"><?php echo esc_html( $step['number'] ); ?></div>
						<div class="ablauf-step__title"><?php echo esc_html( $step['title'] ); ?></div>
						<?php if ( $index < count( $process_steps ) - 1 ) : ?>
							<div class="ablauf-step__arrow" aria-hidden="true">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="ablauf-tagline text-center">Dauer: wenige Tage – kein Betriebsunterbruch</p>
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
