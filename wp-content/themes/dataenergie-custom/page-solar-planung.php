<?php
/**
 * Template Name: Solar Planung
 *
 * Planung & Engineering sayfası - Modern SaaS tasarım.
 * Vercel/Linear design estetiğinde.
 *
 * @package Dataenergie
 * @version 2.2.0
 */

get_header();

// Hero Section
$hero_tag      = 'Solar Energy';
$hero_subtitle = 'Unabhängige und professionelle Planung von Photovoltaikanlagen für Wohn-, Gewerbe- und Industrieprojekte.';

// Leistungen
$leistungen = array(
	'Elektroschema (AC / DC)',
	'Strangplan',
	'Modul- und Belegungspläne',
	'Baupläne für Bauverfahren',
	'Feuerwehrplan',
	'Blitzschutzplan',
	'Absturzsicherung',
	'Technische Dokumentation für Behörden und Netzbetreiber',
	'Statik Kalkulation mit (K2Base, Solarmarkt, Mysoltop etc.)',
);

// CTA
$cta_title       = 'Bereit für die Planung?';
$cta_description = 'Kontaktieren Sie uns für eine kostenlose Erstberatung.';
$cta_button_text = 'Beratung anfordern';
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

<!-- Content Section -->
<section class="page-content" aria-labelledby="content-heading">
	<div class="container">
		<div class="content-card">
			<div class="content-card__body">
				<p class="content-card__highlight">
					Wir erstellen alle technischen Unterlagen vollständig intern – ohne Subunternehmer.
				</p>

				<h2 id="content-heading" class="content-card__title">Leistungen</h2>

				<ul class="content-card__list content-card__list--solar">
					<?php foreach ( $leistungen as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
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
	max-width: 800px;
	margin: 0 auto;
}

.content-card__body {
	padding: var(--spacing-xl);
}

.content-card__highlight {
	font-size: 1.125rem;
	line-height: 1.7;
	color: var(--color-text);
	margin-bottom: var(--spacing-lg);
	padding: var(--spacing-md);
	background: rgba(6, 182, 212, 0.08);
	border-left: 3px solid #0891B2;
	border-radius: var(--radius-sm);
}

.content-card__title {
	font-size: 1.5rem;
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

	.content-card__highlight {
		font-size: 1rem;
	}

	.content-card__title {
		font-size: 1.25rem;
	}
}
</style>

<?php get_footer(); ?>
