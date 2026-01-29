<?php
/**
 * Template Name: Solar Drohnenaufnahmen
 *
 * Drohnenaufnahmen sayfası - Modern SaaS tasarım.
 * Vercel/Linear design estetiğinde.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 3.0.0
 */

get_header();

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'drohnen_hero_tag' ) ?: 'Solar Energy';
$hero_subtitle = get_field( 'drohnen_hero_subtitle' ) ?: 'Drohnenbasierte Datenerfassung für präzise Planung und Dokumentation von Photovoltaikprojekten.';

// Highlight Text
$highlight_text = get_field( 'drohnen_highlight_text' ) ?: 'Unsere Drohnenaufnahmen liefern die Datengrundlage für eine präzise Planung und effiziente Umsetzung Ihrer Photovoltaikprojekte – von der Erstaufnahme bis zur Baudokumentation.';

// About Text
$about_text = get_field( 'drohnen_about_text' ) ?: 'Mit modernster Drohnentechnologie erfassen wir Dächer und Gebäude aus der Luft. Die gewonnenen Daten ermöglichen exakte Vermessungen, 3D-Modelle und eine lückenlose Dokumentation.';

// Leistungen
$leistungen = array(
	get_field( 'drohnen_leistung_1' ) ?: 'Drohnenaufnahmen von Dächern und Gebäuden',
	get_field( 'drohnen_leistung_2' ) ?: '2D-Vermessung',
	get_field( 'drohnen_leistung_3' ) ?: '3D-Gebäudemodelle',
	get_field( 'drohnen_leistung_4' ) ?: 'Bestandsaufnahmen',
	get_field( 'drohnen_leistung_5' ) ?: 'Datengrundlage für Planung und Bauverfahren',
);

// Einsatzbereiche
$einsatzbereiche = array(
	get_field( 'drohnen_einsatz_1' ) ?: 'PV-Anlagenplanung',
	get_field( 'drohnen_einsatz_2' ) ?: 'Dachinspektion',
	get_field( 'drohnen_einsatz_3' ) ?: 'Baufortschrittsdokumentation',
	get_field( 'drohnen_einsatz_4' ) ?: 'Verschattungsanalyse',
	get_field( 'drohnen_einsatz_5' ) ?: 'Bestandsdokumentation',
);

// Stats
$stats = array(
	array(
		'number' => get_field( 'drohnen_stat_1_number' ) ?: '200+',
		'label'  => get_field( 'drohnen_stat_1_label' ) ?: 'Drohnenflüge',
	),
	array(
		'number' => get_field( 'drohnen_stat_2_number' ) ?: '50\'000+',
		'label'  => get_field( 'drohnen_stat_2_label' ) ?: 'm² vermessen',
	),
	array(
		'number' => get_field( 'drohnen_stat_3_number' ) ?: '±2cm',
		'label'  => get_field( 'drohnen_stat_3_label' ) ?: 'Messgenauigkeit',
	),
	array(
		'number' => get_field( 'drohnen_stat_4_number' ) ?: '24h',
		'label'  => get_field( 'drohnen_stat_4_label' ) ?: 'Datenlieferung',
	),
);

// Process Steps
$process_steps = array(
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
		'title'       => 'Terminplanung',
		'description' => 'Abstimmung des optimalen Flugtermins und Prüfung der Wetterbedingungen.',
	),
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"></path></svg>',
		'title'       => 'Drohnenflug',
		'description' => 'Professioneller Überflug mit zertifizierten Piloten und modernster Ausrüstung.',
	),
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
		'title'       => 'Datenverarbeitung',
		'description' => 'Erstellung von 2D-Vermessungen und 3D-Modellen aus den Aufnahmen.',
	),
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
		'title'       => 'Dokumentation',
		'description' => 'Übergabe aller Daten inkl. Berichten und exportfähigen Dateiformaten.',
	),
);

// CTA Section
$cta_title       = get_field( 'drohnen_cta_title' ) ?: 'Präzise Daten für Ihr PV-Projekt';
$cta_description = get_field( 'drohnen_cta_description' ) ?: 'Kontaktieren Sie uns für professionelle Drohnenaufnahmen und Vermessung.';
$cta_button_text = get_field( 'drohnen_cta_button_text' ) ?: 'Termin anfragen';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
	'variant'  => 'solar',
) );
?>

<!-- Stats Section -->
<section class="solar-stats">
	<div class="container">
		<div class="stats-grid">
			<?php foreach ( $stats as $stat ) : ?>
				<div class="stat-card">
					<span class="stat-card__number"><?php echo esc_html( $stat['number'] ); ?></span>
					<span class="stat-card__label"><?php echo esc_html( $stat['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Content Section -->
<section class="page-content" aria-labelledby="content-heading">
	<div class="container">
		<div class="content-card">
			<div class="content-card__body">
				<p class="content-card__highlight">
					<?php echo esc_html( $highlight_text ); ?>
				</p>

				<p class="content-card__about">
					<?php echo esc_html( $about_text ); ?>
				</p>

				<div class="content-card__grid">
					<div class="content-card__column">
						<h2 id="content-heading" class="content-card__title">Unsere Leistungen</h2>
						<ul class="content-card__list content-card__list--solar">
							<?php foreach ( $leistungen as $item ) : ?>
								<?php if ( ! empty( $item ) ) : ?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="content-card__column">
						<h2 class="content-card__title">Einsatzbereiche</h2>
						<ul class="content-card__list content-card__list--solar">
							<?php foreach ( $einsatzbereiche as $item ) : ?>
								<?php if ( ! empty( $item ) ) : ?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Process Section -->
<section class="solar-process">
	<div class="container">
		<div class="section-header">
			<span class="section-tag section-tag--solar">Ablauf</span>
			<h2 class="section-title">So funktioniert die Datenerfassung</h2>
			<p class="section-description">Von der Terminplanung bis zur fertigen Dokumentation – professionell und effizient.</p>
		</div>
		<div class="process-steps">
			<?php foreach ( $process_steps as $index => $step ) : ?>
				<div class="process-step">
					<span class="process-step__number"><?php echo sprintf( '%02d', $index + 1 ); ?></span>
					<div class="process-step__icon">
						<?php echo $step['icon']; ?>
					</div>
					<h3 class="process-step__title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p class="process-step__description"><?php echo esc_html( $step['description'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Benefits Section -->
<section class="solar-benefits">
	<div class="container">
		<div class="benefits-grid">
			<div class="benefit-card benefit-card--primary">
				<div class="benefit-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="12" r="10"></circle>
						<line x1="22" y1="12" x2="18" y2="12"></line>
						<line x1="6" y1="12" x2="2" y2="12"></line>
						<line x1="12" y1="6" x2="12" y2="2"></line>
						<line x1="12" y1="22" x2="12" y2="18"></line>
					</svg>
				</div>
				<h3 class="benefit-card__title">Präzise Daten</h3>
				<p class="benefit-card__text">Hochauflösende Aufnahmen und ±2cm Messgenauigkeit für exakte Planungsgrundlagen.</p>
			</div>
			<div class="benefit-card">
				<div class="benefit-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="12" r="10"></circle>
						<polyline points="12 6 12 12 16 14"></polyline>
					</svg>
				</div>
				<h3 class="benefit-card__title">Zeitersparnis</h3>
				<p class="benefit-card__text">Schnelle Datenerfassung und Lieferung innerhalb von 24 Stunden.</p>
			</div>
			<div class="benefit-card">
				<div class="benefit-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
					</svg>
				</div>
				<h3 class="benefit-card__title">3D-Modelle</h3>
				<p class="benefit-card__text">Detaillierte 3D-Gebäudemodelle für Visualisierung und Simulation.</p>
			</div>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="solar-cta">
	<div class="container">
		<?php
		get_template_part( 'template-parts/sections/cta-simple', null, array(
			'title'       => $cta_title,
			'description' => $cta_description,
			'button_text' => $cta_button_text,
		) );
		?>
	</div>
</section>

<style>
/* Content Card Styles */
.content-card {
	background: var(--color-bg);
	border: 1px solid var(--color-border);
	border-radius: var(--radius-lg);
	overflow: hidden;
	max-width: 900px;
	margin: 0 auto;
}

.content-card__body {
	padding: var(--spacing-xl);
}

.content-card__highlight {
	font-size: 1.125rem;
	line-height: 1.7;
	color: var(--color-text);
	margin-bottom: var(--spacing-md);
	padding: var(--spacing-md);
	background: rgba(6, 182, 212, 0.08);
	border-left: 3px solid #0891B2;
	border-radius: var(--radius-sm);
}

.content-card__about {
	font-size: 1rem;
	line-height: 1.7;
	color: var(--color-text);
	margin-bottom: var(--spacing-lg);
}

.content-card__grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: var(--spacing-xl);
}

.content-card__column {
	display: flex;
	flex-direction: column;
}

.content-card__title {
	font-size: 1.25rem;
	font-weight: 600;
	color: var(--color-heading);
	margin-bottom: var(--spacing-md);
}

.content-card__list {
	list-style: none;
	padding: 0;
	margin: 0;
	display: flex;
	flex-direction: column;
	gap: var(--spacing-sm);
}

.content-card__list li {
	position: relative;
	padding-left: var(--spacing-lg);
	font-size: 1rem;
	line-height: 1.6;
	color: var(--color-text);
}

.content-card__list li::before {
	content: "";
	position: absolute;
	left: 0;
	top: 0.5em;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: #0891B2;
}

.content-card__list--solar li::before {
	background: #0891B2;
}

/* Benefits Section */
.solar-benefits {
	padding: var(--spacing-2xl) 0;
	background: var(--color-bg);
}

.benefits-grid {
	display: grid;
	gap: var(--spacing-lg);
}

.benefit-card {
	padding: var(--spacing-xl);
	background: var(--color-bg-alt);
	border: 1px solid var(--color-border);
	border-radius: var(--radius-lg);
	text-align: center;
	transition: all var(--transition-base);
}

.benefit-card:hover {
	border-color: var(--color-secondary);
	transform: translateY(-4px);
	box-shadow: var(--shadow-md);
}

.benefit-card--primary {
	background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
	border-color: rgba(6, 182, 212, 0.2);
}

.benefit-card__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 64px;
	height: 64px;
	margin-bottom: var(--spacing-md);
	background: linear-gradient(135deg, var(--color-secondary) 0%, #0891B2 100%);
	border-radius: var(--radius-lg);
	color: var(--color-primary);
}

.benefit-card__icon svg {
	width: 32px;
	height: 32px;
}

.benefit-card__title {
	font-size: 1.125rem;
	font-weight: 600;
	color: var(--color-primary);
	margin-bottom: var(--spacing-sm);
}

.benefit-card__text {
	font-size: 0.9375rem;
	color: var(--color-text-light);
	line-height: 1.6;
	margin: 0;
}

@media (min-width: 768px) {
	.benefits-grid {
		grid-template-columns: repeat(3, 1fr);
	}

	.content-card__body {
		padding: var(--spacing-2xl);
	}
}

@media (max-width: 768px) {
	.content-card__body {
		padding: var(--spacing-lg);
	}

	.content-card__grid {
		grid-template-columns: 1fr;
		gap: var(--spacing-lg);
	}

	.content-card__highlight {
		font-size: 1rem;
	}

	.content-card__title {
		font-size: 1.125rem;
	}
}

@media (min-width: 1024px) {
	.solar-benefits {
		padding: calc(var(--spacing-2xl) * 1.5) 0;
	}
}
</style>

<?php get_footer(); ?>
