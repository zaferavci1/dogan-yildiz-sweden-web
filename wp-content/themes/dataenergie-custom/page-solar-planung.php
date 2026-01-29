<?php
/**
 * Template Name: Solar Planung
 *
 * Planung & Engineering sayfası - Modern SaaS tasarım.
 * Vercel/Linear design estetiğinde.
 *
 * @package Dataenergie
 * @version 2.3.0
 */

get_header();

// =============================================================================
// SAYFA İÇERİKLERİ
// =============================================================================

// Hero Section
$hero_tag      = 'Solar Energy';
$hero_subtitle = 'Unabhängige und professionelle Planung von Photovoltaikanlagen für Wohn-, Gewerbe- und Industrieprojekte.';

// Highlight Text
$highlight_text = 'Wir erstellen alle technischen Unterlagen vollständig intern – ohne Subunternehmer.';

// Leistungen - Grid kartları için
$leistungen = array(
	array(
		'icon'        => 'electrical',
		'title'       => 'Elektroschema (AC / DC)',
		'description' => 'Vollständige elektrische Schaltpläne für Wechsel- und Gleichstromsysteme',
	),
	array(
		'icon'        => 'diagram',
		'title'       => 'Strangplan',
		'description' => 'Detaillierte String-Konfiguration und Verschaltungsplanung',
	),
	array(
		'icon'        => 'modules',
		'title'       => 'Modul- und Belegungspläne',
		'description' => 'Optimierte Modulanordnung für maximale Effizienz',
	),
	array(
		'icon'        => 'blueprint',
		'title'       => 'Baupläne für Bauverfahren',
		'description' => 'Technische Zeichnungen für Baugenehmigungen',
	),
	array(
		'icon'        => 'fire',
		'title'       => 'Feuerwehrplan',
		'description' => 'Sicherheitspläne gemäss Brandschutzvorschriften',
	),
	array(
		'icon'        => 'lightning',
		'title'       => 'Blitzschutzplan',
		'description' => 'Konzepte für äusseren und inneren Blitzschutz',
	),
	array(
		'icon'        => 'safety',
		'title'       => 'Absturzsicherung',
		'description' => 'Planung von Sicherheitssystemen für Wartungsarbeiten',
	),
	array(
		'icon'        => 'document',
		'title'       => 'Technische Dokumentation',
		'description' => 'Unterlagen für Behörden und Netzbetreiber',
	),
	array(
		'icon'        => 'calculator',
		'title'       => 'Statik Kalkulation',
		'description' => 'Berechnung mit K2Base, Solarmarkt, Mysoltop etc.',
	),
);

// Vorteile
$vorteile = array(
	'Alles aus einer Hand – keine Subunternehmer',
	'Schnelle Bearbeitungszeiten',
	'Erfahrenes Ingenieurteam',
	'Normgerechte Dokumentation',
);

// CTA
$cta_title       = 'Bereit für die Planung?';
$cta_description = 'Kontaktieren Sie uns für eine kostenlose Erstberatung zu Ihrem PV-Projekt.';
$cta_button_text = 'Beratung anfordern';

// SVG Icons
function get_planung_icon( $icon ) {
	$icons = array(
		'electrical' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
		'diagram'    => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="6" y1="3" x2="6" y2="15"/><circle cx="18" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><path d="M18 9a9 9 0 0 1-9 9"/></svg>',
		'modules'    => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
		'blueprint'  => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>',
		'fire'       => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>',
		'lightning'  => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 16.326A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 .5 8.973"/><path d="m13 12-3 5h4l-3 5"/></svg>',
		'safety'     => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>',
		'document'   => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v4"/><polyline points="14 2 14 8 20 8"/><path d="m3 15 2 2 4-4"/><path d="m9 18 2 2 4-4"/></svg>',
		'calculator' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/></svg>',
	);
	return $icons[ $icon ] ?? '';
}
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

<!-- Highlight Section -->
<section class="planung-highlight">
	<div class="container">
		<div class="planung-highlight__card">
			<div class="planung-highlight__icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
					<polyline points="9 11 12 14 22 4"></polyline>
					<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
				</svg>
			</div>
			<p class="planung-highlight__text"><?php echo esc_html( $highlight_text ); ?></p>
		</div>
	</div>
</section>

<!-- Leistungen Section -->
<section class="planung-leistungen" aria-labelledby="leistungen-heading">
	<div class="container">
		<div class="section-header">
			<span class="section-tag section-tag--solar">Unsere Leistungen</span>
			<h2 id="leistungen-heading" class="section-title">Engineering & Dokumentation</h2>
			<p class="section-description">Professionelle technische Planung für Ihr PV-Projekt</p>
		</div>

		<div class="planung-grid">
			<?php foreach ( $leistungen as $leistung ) : ?>
				<div class="planung-card">
					<div class="planung-card__icon">
						<?php echo get_planung_icon( $leistung['icon'] ); ?>
					</div>
					<h3 class="planung-card__title"><?php echo esc_html( $leistung['title'] ); ?></h3>
					<p class="planung-card__description"><?php echo esc_html( $leistung['description'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Vorteile Section -->
<section class="planung-vorteile">
	<div class="container">
		<div class="planung-vorteile__inner">
			<div class="planung-vorteile__content">
				<span class="section-tag section-tag--solar">Warum wir?</span>
				<h2 class="planung-vorteile__title">Ihre Vorteile</h2>
				<ul class="planung-vorteile__list">
					<?php foreach ( $vorteile as $vorteil ) : ?>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<polyline points="20 6 9 17 4 12"></polyline>
							</svg>
							<?php echo esc_html( $vorteil ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="planung-vorteile__visual">
				<div class="planung-vorteile__badge">
					<span class="planung-vorteile__badge-number">100%</span>
					<span class="planung-vorteile__badge-text">Inhouse Engineering</span>
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
/* ==========================================================================
   PLANUNG & ENGINEERING PAGE STYLES
   ========================================================================== */

/* Highlight Section */
.planung-highlight {
	padding: var(--spacing-xl) 0;
	background: var(--color-bg);
}

.planung-highlight__card {
	display: flex;
	align-items: center;
	gap: var(--spacing-lg);
	padding: var(--spacing-lg) var(--spacing-xl);
	background: linear-gradient(135deg, rgba(6, 182, 212, 0.08) 0%, rgba(6, 182, 212, 0.03) 100%);
	border: 1px solid rgba(6, 182, 212, 0.2);
	border-radius: var(--radius-lg);
	max-width: 800px;
	margin: 0 auto;
}

.planung-highlight__icon {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 56px;
	height: 56px;
	flex-shrink: 0;
	background: var(--color-secondary);
	border-radius: var(--radius-md);
	color: var(--color-primary);
}

.planung-highlight__text {
	font-size: 1.125rem;
	font-weight: 500;
	color: var(--color-heading);
	line-height: 1.5;
	margin: 0;
}

/* Leistungen Section */
.planung-leistungen {
	padding: var(--spacing-2xl) 0 calc(var(--spacing-2xl) * 1.5);
	background: var(--color-bg-alt);
}

.planung-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: var(--spacing-lg);
}

.planung-card {
	background: var(--color-bg);
	border: 1px solid var(--color-border);
	border-radius: var(--radius-lg);
	padding: var(--spacing-lg);
	transition: all var(--transition-base);
}

.planung-card:hover {
	border-color: var(--color-secondary);
	transform: translateY(-4px);
	box-shadow: var(--shadow-md);
}

.planung-card__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 52px;
	height: 52px;
	margin-bottom: var(--spacing-md);
	background: rgba(6, 182, 212, 0.12);
	border-radius: var(--radius-md);
	color: #0891B2;
}

.planung-card__title {
	font-size: 1.0625rem;
	font-weight: 600;
	color: var(--color-heading);
	margin-bottom: var(--spacing-xs);
}

.planung-card__description {
	font-size: 0.9375rem;
	color: var(--color-text-light);
	line-height: 1.5;
	margin: 0;
}

/* Vorteile Section */
.planung-vorteile {
	padding: var(--spacing-2xl) 0;
	background: var(--color-bg);
}

.planung-vorteile__inner {
	display: grid;
	gap: var(--spacing-xl);
	align-items: center;
}

.planung-vorteile__title {
	font-size: 1.75rem;
	font-weight: 700;
	color: var(--color-heading);
	margin-bottom: var(--spacing-lg);
}

.planung-vorteile__list {
	list-style: none;
	padding: 0;
	margin: 0;
	display: flex;
	flex-direction: column;
	gap: var(--spacing-md);
}

.planung-vorteile__list li {
	display: flex;
	align-items: center;
	gap: var(--spacing-sm);
	font-size: 1rem;
	color: var(--color-text);
}

.planung-vorteile__list svg {
	flex-shrink: 0;
	color: var(--color-secondary);
}

.planung-vorteile__visual {
	display: flex;
	justify-content: center;
}

.planung-vorteile__badge {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 180px;
	height: 180px;
	background: linear-gradient(135deg, var(--color-primary) 0%, #1e293b 100%);
	border-radius: 50%;
	text-align: center;
	box-shadow: var(--shadow-lg);
}

.planung-vorteile__badge-number {
	font-size: 2.5rem;
	font-weight: 700;
	color: var(--color-secondary);
	line-height: 1;
}

.planung-vorteile__badge-text {
	font-size: 0.875rem;
	color: rgba(255, 255, 255, 0.85);
	margin-top: var(--spacing-xs);
	max-width: 120px;
}

/* Responsive */
@media (min-width: 640px) {
	.planung-grid {
		grid-template-columns: repeat(2, 1fr);
	}
}

@media (min-width: 768px) {
	.planung-highlight {
		padding: var(--spacing-2xl) 0;
	}

	.planung-highlight__card {
		padding: var(--spacing-xl) var(--spacing-2xl);
	}

	.planung-highlight__text {
		font-size: 1.25rem;
	}

	.planung-leistungen {
		padding: calc(var(--spacing-2xl) * 1.5) 0;
	}

	.planung-vorteile__inner {
		grid-template-columns: 1.5fr 1fr;
	}

	.planung-vorteile__title {
		font-size: 2rem;
	}

	.planung-vorteile__badge {
		width: 200px;
		height: 200px;
	}

	.planung-vorteile__badge-number {
		font-size: 3rem;
	}
}

@media (min-width: 1024px) {
	.planung-grid {
		grid-template-columns: repeat(3, 1fr);
	}

	.planung-vorteile {
		padding: calc(var(--spacing-2xl) * 1.5) 0;
	}

	.planung-vorteile__badge {
		width: 220px;
		height: 220px;
	}
}

@media (max-width: 640px) {
	.planung-highlight__card {
		flex-direction: column;
		text-align: center;
		padding: var(--spacing-lg);
	}

	.planung-highlight__text {
		font-size: 1rem;
	}
}
</style>

<?php get_footer(); ?>
