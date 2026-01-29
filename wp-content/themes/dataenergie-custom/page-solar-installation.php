<?php
/**
 * Template Name: Solar Installation
 *
 * Installation sayfası - Modern SaaS tasarım.
 * Vercel/Linear design estetiğinde.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 2.3.0
 */

get_header();

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'install_hero_tag' ) ?: 'Solar Energy';
$hero_subtitle = get_field( 'install_hero_subtitle' ) ?: 'Professionelle Montage von Photovoltaikanlagen – präzise, sicher und normgerecht.';

// Highlight Text
$highlight_text = get_field( 'install_highlight_text' ) ?: 'Unsere Installation erfolgt vollständig durch eigenes Fachpersonal. Von der Unterkonstruktion bis zur DC-seitigen Umsetzung setzen wir auf saubere Arbeit, klare Prozesse und höchste Sicherheitsstandards.';

// About Text
$about_text = get_field( 'install_about_text' ) ?: 'Wir installieren Photovoltaikanlagen für Wohn-, Gewerbe- und Industrieobjekte – präzise abgestimmt auf Planung, Statik und bauliche Gegebenheiten.';

// Dach- und Anlagentypen
$dach_typen = array(
	get_field( 'install_dach_1' ) ?: 'Flachdach',
	get_field( 'install_dach_2' ) ?: 'Schrägdach',
	get_field( 'install_dach_3' ) ?: 'Indach-Systeme',
	get_field( 'install_dach_4' ) ?: 'Fassaden-Photovoltaik',
	get_field( 'install_dach_5' ) ?: 'Carport- & Sonderkonstruktionen',
);

// Installationsumfang
$installation_umfang = array(
	get_field( 'install_umfang_1' ) ?: 'Mechanische Montage',
	get_field( 'install_umfang_2' ) ?: 'DC-Installation',
	get_field( 'install_umfang_3' ) ?: 'Vorbereitung AC-Anschluss',
	get_field( 'install_umfang_4' ) ?: 'Koordination mit Netzbetreiber',
	get_field( 'install_umfang_5' ) ?: 'Inbetriebnahmevorbereitung',
);

// Stats
$stats = array(
	array(
		'number' => get_field( 'install_stat_1_number' ) ?: '500+',
		'label'  => get_field( 'install_stat_1_label' ) ?: 'Installationen',
	),
	array(
		'number' => get_field( 'install_stat_2_number' ) ?: '15+',
		'label'  => get_field( 'install_stat_2_label' ) ?: 'Jahre Erfahrung',
	),
	array(
		'number' => get_field( 'install_stat_3_number' ) ?: '100%',
		'label'  => get_field( 'install_stat_3_label' ) ?: 'Kundenzufriedenheit',
	),
	array(
		'number' => get_field( 'install_stat_4_number' ) ?: '48h',
		'label'  => get_field( 'install_stat_4_label' ) ?: 'Durchschnittliche Montagezeit',
	),
);

// CTA Section
$cta_title       = get_field( 'install_cta_title' ) ?: 'Bereit für die Installation?';
$cta_description = get_field( 'install_cta_description' ) ?: 'Kontaktieren Sie uns für ein unverbindliches Angebot.';
$cta_button_text = get_field( 'install_cta_button_text' ) ?: 'Offerte anfordern';
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
						<h2 class="content-card__title">Dach- und Anlagentypen</h2>
						<ul class="content-card__list content-card__list--solar">
							<?php foreach ( $dach_typen as $item ) : ?>
								<?php if ( ! empty( $item ) ) : ?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="content-card__column">
						<h2 id="content-heading" class="content-card__title">Installationsumfang</h2>
						<ul class="content-card__list content-card__list--solar">
							<?php foreach ( $installation_umfang as $item ) : ?>
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
</style>

<?php get_footer(); ?>
