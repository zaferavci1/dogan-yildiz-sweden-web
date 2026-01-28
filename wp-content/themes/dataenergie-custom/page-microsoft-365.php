<?php
/**
 * Template Name: Microsoft 365
 *
 * Microsoft 365 Design & Betrieb Beratungsseite.
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
	'settings'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
	'star'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
	'target'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
	'users'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
	'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
);

// =============================================================================
// CONTENT DATA
// =============================================================================

// Hero Section
$hero_tag      = 'Microsoft 365';
$hero_subtitle = 'Strukturiertes Microsoft-365-Design & Betrieb für Ihr Unternehmen';

// Problem Section
$problems = array(
	'Fehlende Governance und Richtlinien',
	'Geringe Benutzerakzeptanz',
	'IT verliert die Kontrolle über die Plattform',
);
$problem_result = 'Das Resultat: Chaos statt Produktivität.';

// Solution Section
$solution_title       = 'Unsere Lösung';
$solution_subtitle    = 'Strukturiertes Microsoft-365-Design & Betrieb';
$solution_description = 'DataEnergie konzipiert Microsoft-365-Umgebungen ganzheitlich – von der technischen Architektur bis zur sicheren Nutzung im Alltag.';
$solution_tagline     = 'Einfach für Benutzer. Kontrolliert für die IT.';

// Leistungsumfang (Was wir umsetzen)
$leistungen = array(
	'Microsoft-365-Tenant Design & Setup',
	'Exchange Online, SharePoint & Teams',
	'Entra ID (Azure AD) & Identity-Konzepte',
	'Conditional Access & MFA',
	'Rollen- und Berechtigungskonzepte',
	'Governance- und Naming-Standards',
);

// Mehrwert (Ergebnisse für Sie)
$mehrwert = array(
	'Klare und skalierbare M365-Strukturen',
	'Sichere Zusammenarbeit intern & extern',
	'Reduzierte IT-Risiken',
	'Höhere Benutzerakzeptanz',
	'Nachhaltiger und wartbarer Betrieb',
);
$mehrwert_tagline = 'Für IT, Management und Endbenutzer.';

// Warum DataEnergie?
$vorteile = array(
	'Fokus auf Microsoft 365 & Security',
	'Governance-getriebene Umsetzung',
	'Praxiserprobte Konzepte',
	'Schweizer Markt & Anforderungen',
	'Klare Sprache – keine Buzzwords',
);
$vorteile_tagline = 'Wir bauen Microsoft 365 so, dass es auch in 2–3 Jahren noch funktioniert.';

// Zielgruppe
$zielgruppen = array(
	'KMU & Organisationen mit Microsoft 365',
	'Unternehmen vor oder nach Migration',
	'IT-Leitungen mit Governance-Anspruch',
	'Organisationen mit externen Partnern & Gästen',
	'Firmen mit Security- & Compliance-Fokus',
);

// Ablauf
$ablauf_steps = array(
	array(
		'number' => '1',
		'title'  => 'Erstgespräch & Zieldefinition',
	),
	array(
		'number' => '2',
		'title'  => 'Analyse bestehender Umgebung',
	),
	array(
		'number' => '3',
		'title'  => 'Architektur- & Governance-Konzept',
	),
	array(
		'number' => '4',
		'title'  => 'Umsetzung & Übergabe / Betrieb',
	),
);
$ablauf_tagline = 'Strukturiert, transparent, ohne Unterbruch.';

// CTA Section
$cta_title       = 'Möchten Sie Microsoft 365 richtig nutzen?';
$cta_description = 'Vereinbaren Sie ein unverbindliches Erstgespräch. Wir zeigen Ihnen, wie moderne Zusammenarbeit sicher funktioniert.';
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

<section class="page-content" aria-labelledby="m365-main-heading">
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
					<h2 class="problem-box__title">Typische Herausforderungen</h2>
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
				<h2 id="m365-main-heading" class="section-title"><?php echo esc_html( $solution_subtitle ); ?></h2>
				<p class="section-description"><?php echo esc_html( $solution_description ); ?></p>
				<p class="solution-tagline"><strong><?php echo esc_html( $solution_tagline ); ?></strong></p>
			</div>
		</div>

		<!-- Two Column: Leistungsumfang & Mehrwert -->
		<div class="m365-two-columns">
			<!-- Leistungsumfang -->
			<div class="m365-column">
				<div class="column-header">
					<div class="column-icon" aria-hidden="true">
						<?php echo $icon_svgs['settings']; ?>
					</div>
					<h3 class="column-title">Was wir umsetzen</h3>
					<span class="column-subtitle">Leistungsumfang</span>
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
					<span class="column-subtitle">Mehrwert für Ihr Unternehmen</span>
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
