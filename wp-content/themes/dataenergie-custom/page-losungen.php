<?php
/**
 * Template Name: Lösungen
 *
 * Lösungen (Çözümler) sayfası.
 * DataEnergie'nin kendi geliştirdiği dijital çözümleri sunar.
 * Vercel/Linear design estetiğinde tasarlanmıştır.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 1.0.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'clock'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
	'droplet'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>',
	'clipboard'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
	'info'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>',
);

// =============================================================================
// CONTENT DATA
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'losungen_hero_tag' ) ?: 'Lösungen';
$hero_subtitle = get_field( 'losungen_hero_subtitle' ) ?: 'Praktische, skalierbare Lösungen für Unternehmen und Immobilien – entwickelt mit Fokus auf Effizienz, Transparenz und Nachhaltigkeit im Alltag.';
$hero_tagline  = get_field( 'losungen_hero_tagline' ) ?: 'DataEnergie entwickelt eigene digitale Lösungen für klar definierte Anwendungsfälle. Unsere Lösungen sind modular aufgebaut, lizenzbasiert verfügbar und auf den Schweizer Markt ausgerichtet.';

// Solution 0: Zeiterfassung
$solution_0 = array(
	'icon'        => $icon_svgs['clock'],
	'title'       => get_field( 'losungen_sol0_title' ) ?: 'Zeiterfassung',
	'description' => get_field( 'losungen_sol0_desc' ) ?: 'Digitale Zeiterfassung für Unternehmen – modular, transparent und an Ihre Organisation angepasst.',
	'features'    => array_filter( array(
		get_field( 'losungen_sol0_f1' ) ?: 'Arbeitszeit- & Pausenerfassung',
		get_field( 'losungen_sol0_f2' ) ?: 'Überstunden & Ferienmanagement',
		get_field( 'losungen_sol0_f3' ) ?: 'HR-Entlastung & Transparenz',
	) ),
	'link'        => home_url( '/workforce-management/' ),
);

// Solution 1: WashSlot
$solution_1 = array(
	'icon'        => $icon_svgs['droplet'],
	'title'       => get_field( 'losungen_sol1_title' ) ?: 'WashSlot',
	'description' => get_field( 'losungen_sol1_desc' ) ?: 'Digitale Buchungs- und Verwaltungslösung für gemeinschaftliche Waschmaschinen in Wohnanlagen und Betrieben.',
	'features'    => array_filter( array(
		get_field( 'losungen_sol1_f1' ) ?: 'Waschslot-Reservierung',
		get_field( 'losungen_sol1_f2' ) ?: 'Nutzerverwaltung',
		get_field( 'losungen_sol1_f3' ) ?: 'Weniger Konflikte',
	) ),
	'link'        => home_url( '/smart-building/' ),
);

// Solution 2: IT Governance & Risk Assessment
$solution_2 = array(
	'icon'        => $icon_svgs['clipboard'],
	'title'       => get_field( 'losungen_sol2_title' ) ?: 'IT Governance & Risk Assessment',
	'description' => get_field( 'losungen_sol2_desc' ) ?: 'Strukturierte Governance- und Risikoanalyse für Microsoft-365-Umgebungen – verständlich aufbereitet für IT-Leitung und Management.',
	'features'    => array_filter( array(
		get_field( 'losungen_sol2_f1' ) ?: 'IT-Risiken erkennen',
		get_field( 'losungen_sol2_f2' ) ?: 'Management-Entscheidungen absichern',
		get_field( 'losungen_sol2_f3' ) ?: 'Security-Transparenz schaffen',
	) ),
	'link'        => home_url( '/beratung-analyse/' ),
);

// Build solutions array
$solutions = array( $solution_0, $solution_1, $solution_2 );

// CTA Section
$cta_title       = get_field( 'losungen_cta_title' ) ?: 'Welche Lösung passt zu Ihrer Situation?';
$cta_description = get_field( 'losungen_cta_desc' ) ?: 'Gerne zeigen wir Ihnen, welche unserer Lösungen für Ihre Anforderungen sinnvoll ist.';
$cta_button_text = get_field( 'losungen_cta_button' ) ?: 'Unverbindliches Gespräch vereinbaren';
?>

<?php
// Hero Section
get_template_part( 'template-parts/hero/hero-page', null, array(
	'tag'      => $hero_tag,
	'title'    => get_the_title(),
	'subtitle' => $hero_subtitle,
	'tagline'  => $hero_tagline,
) );
?>

<section class="page-content" aria-labelledby="solutions-heading">
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

		<!-- Solutions Grid -->
		<h2 id="solutions-heading" class="sr-only">Unsere Lösungen</h2>
		<div class="feature-grid feature-grid--3col">
			<?php foreach ( $solutions as $solution ) : ?>
				<?php
				get_template_part( 'template-parts/sections/feature-card', null, array(
					'icon_svg'       => $solution['icon'],
					'title'          => $solution['title'],
					'description'    => $solution['description'],
					'features'       => $solution['features'],
					'features_label' => 'Use-Cases:',
					'variant'        => 'it',
					'expandable'     => false,
					'link'           => $solution['link'] ?? '',
				) );
				?>
			<?php endforeach; ?>
		</div>

		<!-- Hinweis: Abgrenzung zu IT Services -->
		<div class="hinweis-box" style="background: var(--color-bg-alt); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--spacing-xl); margin: var(--spacing-2xl) 0; display: flex; align-items: flex-start; gap: var(--spacing-md);">
			<div class="hinweis-box__icon" style="flex-shrink: 0; width: 24px; height: 24px; color: var(--color-primary);" aria-hidden="true">
				<?php echo $icon_svgs['info']; ?>
			</div>
			<div class="hinweis-box__content">
				<p style="margin: 0; color: var(--color-text); line-height: 1.6;">
					<strong>Abgrenzung zu IT Services:</strong> Unsere Lösungen sind klar definierte Angebote mit festem Leistungsumfang. Individuelle Beratung und Betrieb finden Sie unter <a href="<?php echo esc_url( home_url( '/it-services/' ) ); ?>" style="color: var(--color-primary); text-decoration: underline;">IT Services</a>.
				</p>
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
