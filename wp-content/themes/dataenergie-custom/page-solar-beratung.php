<?php
/**
 * Template Name: Solar Beratung
 *
 * Solar Danışmanlık sayfası - Modern SaaS tasarım.
 * Vercel/Linear design estetiğinde.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 2.1.0
 */

get_header();

// =============================================================================
// SVG ICONS MAP
// =============================================================================
$icon_svgs = array(
	'clipboard' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
	'search'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
	'file'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
	'target'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
	'sun'       => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>',
);

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero Section
$hero_tag      = get_field( 'beratung_hero_tag' ) ?: 'Solar Beratung';
$hero_subtitle = get_field( 'beratung_hero_subtitle' ) ?: 'Der erste Schritt zu Ihrer eigenen Solaranlage';

// Intro Section
$intro_title = get_field( 'beratung_intro_title' ) ?: 'Ihre Energiezukunft beginnt hier';
$intro_text  = get_field( 'beratung_intro_text' ) ?: 'Eine Solaranlage ist eine Investition in die Zukunft. Deshalb nehmen wir uns Zeit für eine umfassende Beratung. Wir analysieren Ihre Situation, erklären die Möglichkeiten und entwickeln gemeinsam die optimale Lösung für Ihr Zuhause oder Ihr Unternehmen.';
$card_title  = get_field( 'beratung_card_title' ) ?: 'Kostenlose Beratung';
$card_text   = get_field( 'beratung_card_text' ) ?: 'Vereinbaren Sie jetzt Ihren unverbindlichen Beratungstermin.';

// Benefits
$benefits = array_filter( array(
	get_field( 'beratung_benefit_1' ) ?: 'Kostenlose Erstberatung',
	get_field( 'beratung_benefit_2' ) ?: 'Unverbindliche Offerte',
	get_field( 'beratung_benefit_3' ) ?: 'Erfahrene Solarexperten',
	get_field( 'beratung_benefit_4' ) ?: 'Individuelle Lösungen',
	get_field( 'beratung_benefit_5' ) ?: 'Förderberatung inklusive',
	get_field( 'beratung_benefit_6' ) ?: 'Finanzierungsoptionen',
) );

// Process Section
$process_title = get_field( 'beratung_process_title' ) ?: 'So funktioniert unsere Beratung';
$process_desc  = get_field( 'beratung_process_description' ) ?: 'In vier Schritten zu Ihrer massgeschneiderten Solarlösung.';

// Process Steps
$step_1_icon_key = get_field( 'beratung_step_1_icon' ) ?: 'search';
$step_2_icon_key = get_field( 'beratung_step_2_icon' ) ?: 'clipboard';
$step_3_icon_key = get_field( 'beratung_step_3_icon' ) ?: 'file';
$step_4_icon_key = get_field( 'beratung_step_4_icon' ) ?: 'target';

$steps = array(
	array(
		'number'      => get_field( 'beratung_step_1_number' ) ?: '01',
		'icon'        => $icon_svgs[ $step_1_icon_key ] ?? $icon_svgs['search'],
		'title'       => get_field( 'beratung_step_1_title' ) ?: 'Standortanalyse',
		'description' => get_field( 'beratung_step_1_description' ) ?: 'Wir analysieren Ihr Dach, die Ausrichtung, Verschattung und die baulichen Gegebenheiten vor Ort.',
	),
	array(
		'number'      => get_field( 'beratung_step_2_number' ) ?: '02',
		'icon'        => $icon_svgs[ $step_2_icon_key ] ?? $icon_svgs['clipboard'],
		'title'       => get_field( 'beratung_step_2_title' ) ?: 'Bedarfsermittlung',
		'description' => get_field( 'beratung_step_2_description' ) ?: 'Gemeinsam ermitteln wir Ihren Stromverbrauch und definieren die optimale Anlagengrösse.',
	),
	array(
		'number'      => get_field( 'beratung_step_3_number' ) ?: '03',
		'icon'        => $icon_svgs[ $step_3_icon_key ] ?? $icon_svgs['file'],
		'title'       => get_field( 'beratung_step_3_title' ) ?: 'Detailplanung',
		'description' => get_field( 'beratung_step_3_description' ) ?: 'Wir erstellen eine massgeschneiderte Planung mit 3D-Visualisierung und Ertragsberechnung.',
	),
	array(
		'number'      => get_field( 'beratung_step_4_number' ) ?: '04',
		'icon'        => $icon_svgs[ $step_4_icon_key ] ?? $icon_svgs['target'],
		'title'       => get_field( 'beratung_step_4_title' ) ?: 'Offerte',
		'description' => get_field( 'beratung_step_4_description' ) ?: 'Sie erhalten eine transparente Offerte mit allen Kosten, Fördermöglichkeiten und Amortisationszeit.',
	),
);

// CTA Section
$cta_title       = get_field( 'beratung_cta_title' ) ?: 'Bereit für Ihre Solaranlage?';
$cta_description = get_field( 'beratung_cta_description' ) ?: 'Kontaktieren Sie uns für eine kostenlose und unverbindliche Beratung.';
$cta_button_text = get_field( 'beratung_cta_button_text' ) ?: 'Jetzt Beratung anfragen';
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

<!-- Intro Section -->
<section class="solar-intro" aria-labelledby="intro-heading">
	<div class="container">
		<div class="solar-intro__grid">
			<div class="solar-intro__content">
				<h2 id="intro-heading" class="solar-intro__title"><?php echo esc_html( $intro_title ); ?></h2>
				<p class="solar-intro__text"><?php echo esc_html( $intro_text ); ?></p>
				<div class="solar-intro__benefits">
					<ul class="benefit-tags">
						<?php foreach ( $benefits as $benefit ) : ?>
							<li class="benefit-tag">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span><?php echo esc_html( $benefit ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="solar-intro__visual">
				<div class="solar-intro__card">
					<div class="solar-intro__card-icon">
						<?php echo $icon_svgs['sun']; // phpcs:ignore ?>
					</div>
					<h3 class="solar-intro__card-title"><?php echo esc_html( $card_title ); ?></h3>
					<p class="solar-intro__card-text"><?php echo esc_html( $card_text ); ?></p>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary">
						Termin vereinbaren
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Process Steps -->
<section class="solar-process" aria-labelledby="process-heading">
	<div class="container">
		<div class="section-header">
			<span class="section-tag section-tag--solar">Unser Prozess</span>
			<h2 id="process-heading" class="section-title"><?php echo esc_html( $process_title ); ?></h2>
			<p class="section-description"><?php echo esc_html( $process_desc ); ?></p>
		</div>

		<div class="process-steps">
			<?php foreach ( $steps as $index => $step ) : ?>
				<div class="process-step">
					<div class="process-step__number"><?php echo esc_html( $step['number'] ); ?></div>
					<div class="process-step__icon">
						<?php echo $step['icon']; // phpcs:ignore ?>
					</div>
					<h3 class="process-step__title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p class="process-step__description"><?php echo esc_html( $step['description'] ); ?></p>
					<?php if ( $index < count( $steps ) - 1 ) : ?>
						<div class="process-step__connector" aria-hidden="true"></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
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

<?php get_footer(); ?>
