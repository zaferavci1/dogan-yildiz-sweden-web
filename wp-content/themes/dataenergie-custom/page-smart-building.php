<?php
/**
 * Template Name: Smart Building
 *
 * Smart Building Solutions (WashSlot) hizmetleri sayfası.
 * Microsoft 365 sayfası ile aynı tasarım yapısı kullanılmaktadır.
 *
 * @package Dataenergie
 * @version 2.0.0
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
	'users'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
);

// =============================================================================
// CONTENT DATA
// =============================================================================

// Hero Section
$hero_tag      = 'Business Solutions';
$hero_subtitle = 'Digitale Waschslot-Reservierung';

// Problem Section
$problems = array(
	'Doppelbelegungen',
	'Konflikten zwischen Bewohnern',
	'Zetteln, Listen oder inoffiziellen Regeln',
	'Fehlender Übersicht für Verwaltungen',
);
$problem_result = 'Ergebnis: Unzufriedenheit und Aufwand.';

// Solution Section
$solution_title       = 'Unsere Lösung';
$solution_subtitle    = 'Digitale Waschslot-Reservierung';
$solution_description = 'WashSlot ermöglicht eine einfache, digitale Buchung von Waschmaschinen – für Bewohner, Verwaltung und Betreiber.';
$solution_tagline     = 'Fair. Transparent. Einfach.';

// Funktionen (Funktionsübersicht)
$funktionen = array(
	'Waschslot-Reservierung',
	'Benutzer- & Hausverwaltung',
	'Zeitfenster-Logik',
	'QR-Code oder Login',
	'Nutzungsübersicht & Statistiken',
	'Cloud-basierte Lösung',
);

// Mehrwert (Ihr Mehrwert)
$mehrwert = array(
	'Klare Regeln ohne Diskussionen',
	'Weniger Aufwand für Verwaltung',
	'Zufriedenere Nutzer',
	'Skalierbar für mehrere Liegenschaften',
	'Einfache Einführung',
);

// Zielgruppe
$zielgruppen = array(
	'Liegenschaftsverwaltungen',
	'Wohnanlagen',
	'Unternehmen mit Gemeinschaftswaschräumen',
	'Genossenschaften',
	'Facility Management',
);

// CTA Section
$cta_title       = 'Möchten Sie Waschräume stressfrei organisieren?';
$cta_description = 'Lernen Sie WashSlot kennen – die einfache Lösung für gemeinschaftliche Waschräume.';
$cta_button_text = 'Lösung ansehen';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
) );
?>

<section class="page-content" aria-labelledby="sb-main-heading">
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
					<p class="problem-box__intro">Gemeinschaftliche Waschräume führen oft zu:</p>
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
				<h2 id="sb-main-heading" class="section-title"><?php echo esc_html( $solution_subtitle ); ?></h2>
				<p class="section-description"><?php echo esc_html( $solution_description ); ?></p>
				<p class="solution-tagline"><strong><?php echo esc_html( $solution_tagline ); ?></strong></p>
			</div>
		</div>

		<!-- Two Column: Funktionen & Mehrwert -->
		<div class="m365-two-columns">
			<!-- Funktionen -->
			<div class="m365-column">
				<div class="column-header">
					<div class="column-icon" aria-hidden="true">
						<?php echo $icon_svgs['settings']; ?>
					</div>
					<h3 class="column-title">Funktionen</h3>
					<span class="column-subtitle">Funktionsübersicht</span>
				</div>
				<ul class="check-list">
					<?php foreach ( $funktionen as $item ) : ?>
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
					<h3 class="column-title">Vorteile</h3>
					<span class="column-subtitle">Ihr Mehrwert</span>
				</div>
				<ul class="check-list check-list--success">
					<?php foreach ( $mehrwert as $item ) : ?>
						<li class="check-list__item">
							<span class="check-list__icon" aria-hidden="true"><?php echo $icon_svgs['check']; ?></span>
							<?php echo esc_html( $item ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<!-- Zielgruppe -->
		<div class="m365-zielgruppe-section">
			<h2 class="section-title text-center">Für wen geeignet?</h2>
			<div class="zielgruppe-tags">
				<?php foreach ( $zielgruppen as $zielgruppe ) : ?>
					<span class="zielgruppe-tag">
						<span class="zielgruppe-tag__icon" aria-hidden="true"><?php echo $icon_svgs['users']; ?></span>
						<?php echo esc_html( $zielgruppe ); ?>
					</span>
				<?php endforeach; ?>
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
