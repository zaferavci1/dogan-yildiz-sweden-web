<?php
/**
 * Template Name: Reinigung
 *
 * PV-Anlagen Reinigungsservice sayfasi - Modern SaaS tasarim.
 * Profesyonel fotovoltaik temizligi icin optimize edilmis.
 * ACF Free uyumlu - Sabit alan yapisi ile dinamik icerik.
 *
 * @package Dataenergie
 * @version 3.0.0
 */

get_header();

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'reinigung_hero_tag' ) ?: 'Solar Energy';
$hero_subtitle = get_field( 'reinigung_hero_subtitle' ) ?: 'Professionelle Reinigung von Photovoltaikanlagen zur Sicherstellung optimaler Erträge und langer Lebensdauer.';

// Highlight Text
$highlight_text = get_field( 'reinigung_highlight_text' ) ?: 'Die Reinigung erfolgt inklusive Sichtprüfung und Dokumentation. So erhalten Sie nicht nur saubere Module, sondern auch einen klaren Überblick über den Zustand Ihrer Anlage.';

// About Text
$about_text = get_field( 'reinigung_about_text' ) ?: 'Verschmutzte Solarmodule können bis zu 30% weniger Strom erzeugen. Unsere professionelle Reinigung entfernt Schmutz, Staub, Pollen und Ablagerungen schonend und gründlich.';

// Dach- und Anlagentypen
$dach_typen = array(
	get_field( 'reinigung_dach_1' ) ?: 'Schrägdach',
	get_field( 'reinigung_dach_2' ) ?: 'Flachdach',
	get_field( 'reinigung_dach_3' ) ?: 'Indach-Anlagen',
	get_field( 'reinigung_dach_4' ) ?: 'Fassaden-Photovoltaik',
	get_field( 'reinigung_dach_5' ) ?: 'Carport- & Sonderanlagen',
);

// Leistungen
$leistungen = array(
	get_field( 'reinigung_leistung_1' ) ?: 'Reinigung von PV-Modulen',
	get_field( 'reinigung_leistung_2' ) ?: 'Entfernung von Schmutz, Staub, Pollen und Ablagerungen',
	get_field( 'reinigung_leistung_3' ) ?: 'Sichtprüfung der Module und Unterkonstruktion',
	get_field( 'reinigung_leistung_4' ) ?: 'Dokumentation des Anlagenzustands',
	get_field( 'reinigung_leistung_5' ) ?: 'Arbeiten mit Absturzsicherung und Sicherheitskonzept',
);

// Stats
$stats = array(
	array(
		'number' => get_field( 'reinigung_stat_1_number' ) ?: '30%',
		'label'  => get_field( 'reinigung_stat_1_label' ) ?: 'Mehr Ertrag nach Reinigung',
	),
	array(
		'number' => get_field( 'reinigung_stat_2_number' ) ?: '100%',
		'label'  => get_field( 'reinigung_stat_2_label' ) ?: 'Dokumentation',
	),
	array(
		'number' => get_field( 'reinigung_stat_3_number' ) ?: '15+',
		'label'  => get_field( 'reinigung_stat_3_label' ) ?: 'Jahre Erfahrung',
	),
	array(
		'number' => get_field( 'reinigung_stat_4_number' ) ?: '500+',
		'label'  => get_field( 'reinigung_stat_4_label' ) ?: 'Gereinigte Anlagen',
	),
);

// Process Steps
$process_steps = array(
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>',
		'title'       => 'Analyse & Planung',
		'description' => 'Zustandsbewertung der Anlage und Festlegung des Reinigungsumfangs.',
	),
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"></path><path d="M12 18v4"></path><path d="m4.93 4.93 2.83 2.83"></path><path d="m16.24 16.24 2.83 2.83"></path><path d="M2 12h4"></path><path d="M18 12h4"></path><path d="m4.93 19.07 2.83-2.83"></path><path d="m16.24 7.76 2.83-2.83"></path></svg>',
		'title'       => 'Reinigung',
		'description' => 'Schonende Entfernung aller Verschmutzungen mit spezieller Ausrüstung.',
	),
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>',
		'title'       => 'Sichtprüfung',
		'description' => 'Prüfung der Module und Unterkonstruktion auf Schäden.',
	),
	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
		'title'       => 'Dokumentation',
		'description' => 'Ausführlicher Bericht mit Zustandsbewertung und Empfehlungen.',
	),
);

// CTA Section
$cta_title       = get_field( 'reinigung_cta_title' ) ?: 'Maximale Leistung für Ihre PV-Anlage';
$cta_description = get_field( 'reinigung_cta_description' ) ?: 'Kontaktieren Sie uns für ein unverbindliches Angebot zur professionellen Reinigung Ihrer Photovoltaikanlage.';
$cta_button_text = get_field( 'reinigung_cta_button_text' ) ?: 'Offerte anfordern';
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
						<h2 class="content-card__title">Geeignet für alle Dacharten</h2>
						<ul class="content-card__list content-card__list--solar">
							<?php foreach ( $dach_typen as $item ) : ?>
								<?php if ( ! empty( $item ) ) : ?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>

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
			<h2 class="section-title">So funktioniert unsere Reinigung</h2>
			<p class="section-description">Von der Analyse bis zur Dokumentation - professionell und transparent.</p>
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
						<path d="M12 3v18"></path>
						<rect width="18" height="18" x="3" y="3" rx="2"></rect>
						<path d="M3 9h18"></path>
						<path d="M3 15h18"></path>
					</svg>
				</div>
				<h3 class="benefit-card__title">Optimale Erträge</h3>
				<p class="benefit-card__text">Saubere Module erzeugen bis zu 30% mehr Strom als verschmutzte Anlagen.</p>
			</div>
			<div class="benefit-card">
				<div class="benefit-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
					</svg>
				</div>
				<h3 class="benefit-card__title">Längere Lebensdauer</h3>
				<p class="benefit-card__text">Regelmässige Reinigung schützt Ihre Investition und verlängert die Nutzungsdauer.</p>
			</div>
			<div class="benefit-card">
				<div class="benefit-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M9 12l2 2 4-4"></path>
						<path d="M12 3a9 9 0 1 0 9 9"></path>
					</svg>
				</div>
				<h3 class="benefit-card__title">Sicherheitskonzept</h3>
				<p class="benefit-card__text">Alle Arbeiten werden mit Absturzsicherung und professioneller Ausrüstung durchgeführt.</p>
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
