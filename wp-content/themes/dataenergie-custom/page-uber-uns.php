<?php
/**
 * Template Name: Über Uns
 *
 * Modern SaaS Hakkımızda sayfası.
 * Vercel/Linear design estetiğinde tasarlanmıştır.
 * ACF Free uyumlu - Sabit alan yapısı ile dinamik içerik.
 *
 * @package Dataenergie
 * @version 2.2.0
 */

get_header();

// SVG Icons for Values (key => svg)
$value_icons = array(
    'target' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
    'users'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
    'leaf'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>',
    'shield' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>',
    'heart'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>',
    'star'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
    'check'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
    'zap'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
);

// Placeholder icon for team
$icon_user_placeholder = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';

// =============================================================================
// ACF VERILERINI AL (FALLBACK ILE) - ACF FREE UYUMLU
// =============================================================================

// Hero
$hero_subtitle = get_field( 'about_hero_subtitle' ) ?: 'Wir verbinden IT-Expertise mit nachhaltigen Energielösungen. Seit über 15 Jahren sind wir Ihr zuverlässiger Partner in der Schweiz.';

// Story Section
$story_tag    = get_field( 'about_story_tag' ) ?: 'Unsere Geschichte';
$story_title  = get_field( 'about_story_title' ) ?: 'Von der Vision zur Realität';
$story_text_1 = get_field( 'about_story_text_1' ) ?: 'Was als kleine IT-Beratung begann, ist heute ein umfassendes Dienstleistungsunternehmen für Technologie und nachhaltige Energie. Unsere Reise startete mit dem Ziel, Schweizer Unternehmen mit modernster IT-Infrastruktur zu versorgen.';
$story_text_2 = get_field( 'about_story_text_2' ) ?: 'Mit der wachsenden Bedeutung erneuerbarer Energien haben wir unser Portfolio erweitert und bieten heute ganzheitliche Lösungen: von der Cloud-Migration bis zur Photovoltaik-Installation, alles aus einer Hand.';
$story_image  = get_field( 'about_story_image' );

// Values Section
$values_title       = get_field( 'about_values_title' ) ?: 'Unsere Werte';
$values_description = get_field( 'about_values_description' ) ?: 'Diese Grundsätze leiten unser Handeln und definieren, wer wir sind.';

// Build values array from individual fields
$values_items = array(
    array(
        'icon'        => get_field( 'value_1_icon' ) ?: 'target',
        'title'       => get_field( 'value_1_title' ) ?: 'Zuverlässigkeit',
        'description' => get_field( 'value_1_description' ) ?: 'Wir halten, was wir versprechen. Unsere Kunden können sich auf uns verlassen.',
    ),
    array(
        'icon'        => get_field( 'value_2_icon' ) ?: 'users',
        'title'       => get_field( 'value_2_title' ) ?: 'Kundennähe',
        'description' => get_field( 'value_2_description' ) ?: 'Wir verstehen Ihre Bedürfnisse und entwickeln massgeschneiderte Lösungen.',
    ),
    array(
        'icon'        => get_field( 'value_3_icon' ) ?: 'leaf',
        'title'       => get_field( 'value_3_title' ) ?: 'Nachhaltigkeit',
        'description' => get_field( 'value_3_description' ) ?: 'Wir setzen auf zukunftsfähige Technologien für Umwelt und Gesellschaft.',
    ),
    array(
        'icon'        => get_field( 'value_4_icon' ) ?: 'shield',
        'title'       => get_field( 'value_4_title' ) ?: 'Qualität',
        'description' => get_field( 'value_4_description' ) ?: 'Höchste Standards bei Produkten, Services und Kundenbetreuung.',
    ),
);

// Stats Section - Build from individual fields
$stats_items = array(
    array(
        'number' => get_field( 'stat_1_number' ) ?: '15+',
        'label'  => get_field( 'stat_1_label' ) ?: 'Jahre Erfahrung',
    ),
    array(
        'number' => get_field( 'stat_2_number' ) ?: '500+',
        'label'  => get_field( 'stat_2_label' ) ?: 'Zufriedene Kunden',
    ),
    array(
        'number' => get_field( 'stat_3_number' ) ?: '1000+',
        'label'  => get_field( 'stat_3_label' ) ?: 'Projekte realisiert',
    ),
    array(
        'number' => get_field( 'stat_4_number' ) ?: '24/7',
        'label'  => get_field( 'stat_4_label' ) ?: 'Support verfügbar',
    ),
);

// Team Section
$team_title       = get_field( 'about_team_title' ) ?: 'Unser Team';
$team_description = get_field( 'about_team_description' ) ?: 'Die Menschen hinter Dataenergie - engagiert, kompetent und für Sie da.';

// Build team members array from individual fields
$team_members = array();

// Member 1
$member_1_name = get_field( 'member_1_name' ) ?: 'Max Mustermann';
if ( $member_1_name ) {
    $team_members[] = array(
        'name'  => $member_1_name,
        'role'  => get_field( 'member_1_role' ) ?: 'Geschäftsführer',
        'bio'   => get_field( 'member_1_bio' ) ?: 'Über 20 Jahre Erfahrung in IT und erneuerbaren Energien.',
        'image' => get_field( 'member_1_image' ),
    );
}

// Member 2
$member_2_name = get_field( 'member_2_name' ) ?: 'Anna Schmidt';
if ( $member_2_name ) {
    $team_members[] = array(
        'name'  => $member_2_name,
        'role'  => get_field( 'member_2_role' ) ?: 'Leiterin IT-Services',
        'bio'   => get_field( 'member_2_bio' ) ?: 'Expertin für Cloud-Lösungen und IT-Infrastruktur.',
        'image' => get_field( 'member_2_image' ),
    );
}

// Member 3
$member_3_name = get_field( 'member_3_name' ) ?: 'Thomas Weber';
if ( $member_3_name ) {
    $team_members[] = array(
        'name'  => $member_3_name,
        'role'  => get_field( 'member_3_role' ) ?: 'Leiter Solar-Projekte',
        'bio'   => get_field( 'member_3_bio' ) ?: 'Spezialist für Photovoltaik und Energiespeicher.',
        'image' => get_field( 'member_3_image' ),
    );
}

// Member 4 (optional - only show if name is filled)
$member_4_name = get_field( 'member_4_name' );
if ( $member_4_name ) {
    $team_members[] = array(
        'name'  => $member_4_name,
        'role'  => get_field( 'member_4_role' ) ?: '',
        'bio'   => get_field( 'member_4_bio' ) ?: '',
        'image' => get_field( 'member_4_image' ),
    );
}

// Timeline Section
$timeline_title = get_field( 'about_timeline_title' ) ?: 'Unsere Meilensteine';

// Build timeline array from individual fields
$timeline_items = array(
    array(
        'year'        => get_field( 'milestone_1_year' ) ?: '2008',
        'title'       => get_field( 'milestone_1_title' ) ?: 'Gründung',
        'description' => get_field( 'milestone_1_description' ) ?: 'Dataenergie wurde als IT-Dienstleister in Zürich gegründet.',
    ),
    array(
        'year'        => get_field( 'milestone_2_year' ) ?: '2012',
        'title'       => get_field( 'milestone_2_title' ) ?: 'Erweiterung Solar',
        'description' => get_field( 'milestone_2_description' ) ?: 'Aufnahme von Solarenergie-Lösungen in unser Portfolio.',
    ),
    array(
        'year'        => get_field( 'milestone_3_year' ) ?: '2018',
        'title'       => get_field( 'milestone_3_title' ) ?: 'Cloud-Transformation',
        'description' => get_field( 'milestone_3_description' ) ?: 'Fokus auf Microsoft 365 und Azure Cloud-Services.',
    ),
    array(
        'year'        => get_field( 'milestone_4_year' ) ?: '2023',
        'title'       => get_field( 'milestone_4_title' ) ?: 'Heute',
        'description' => get_field( 'milestone_4_description' ) ?: 'Ihr zuverlässiger Partner für IT und erneuerbare Energien.',
    ),
);

// CTA Section
$cta_title       = get_field( 'about_cta_title' ) ?: 'Möchten Sie mehr erfahren?';
$cta_description = get_field( 'about_cta_description' ) ?: 'Kontaktieren Sie uns für ein unverbindliches Beratungsgespräch.';
$cta_button_text = get_field( 'about_cta_button_text' ) ?: 'Kontakt aufnehmen';
?>

<!-- ========================================
     ABOUT HERO
     ======================================== -->
<section class="about-hero" role="banner" aria-labelledby="about-hero-title">
    <div class="container">
        <div class="about-hero__content">
            <span class="about-hero__tag">Über uns</span>
            <h1 id="about-hero-title" class="about-hero__title"><?php echo esc_html( get_the_title() ); ?></h1>
            <p class="about-hero__subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
        </div>
    </div>
</section>

<!-- ========================================
     STORY SECTION
     ======================================== -->
<section class="about-story" aria-labelledby="story-title">
    <div class="container">
        <div class="about-story__grid">
            <div class="about-story__content">
                <span class="about-story__tag"><?php echo esc_html( $story_tag ); ?></span>
                <h2 id="story-title" class="about-story__title"><?php echo esc_html( $story_title ); ?></h2>
                <p class="about-story__text"><?php echo esc_html( $story_text_1 ); ?></p>
                <p class="about-story__text"><?php echo esc_html( $story_text_2 ); ?></p>
            </div>
            <div class="about-story__image">
                <?php if ( $story_image ) : ?>
                    <img src="<?php echo esc_url( $story_image['url'] ); ?>"
                         alt="<?php echo esc_attr( $story_image['alt'] ?: 'Dataenergie' ); ?>"
                         loading="lazy">
                <?php elseif ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about-placeholder.jpg' ); ?>"
                         alt="Dataenergie Team"
                         loading="lazy">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     VALUES SECTION
     ======================================== -->
<section class="values-section" aria-labelledby="values-title">
    <div class="container">
        <div class="values-section__header">
            <h2 id="values-title" class="values-section__title"><?php echo esc_html( $values_title ); ?></h2>
            <p class="values-section__description"><?php echo esc_html( $values_description ); ?></p>
        </div>

        <div class="values-grid">
            <?php foreach ( $values_items as $value ) : ?>
                <?php
                $icon_key = $value['icon'] ?? 'target';
                $icon_svg = $value_icons[ $icon_key ] ?? $value_icons['target'];
                ?>
                <article class="value-card">
                    <div class="value-card__icon" aria-hidden="true">
                        <?php echo $icon_svg; ?>
                    </div>
                    <h3 class="value-card__title"><?php echo esc_html( $value['title'] ?? '' ); ?></h3>
                    <p class="value-card__description"><?php echo esc_html( $value['description'] ?? '' ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================================
     STATS SECTION
     ======================================== -->
<section class="stats-section" aria-label="Unternehmenskennzahlen">
    <div class="container">
        <div class="stats-grid">
            <?php foreach ( $stats_items as $stat ) : ?>
                <div class="stat-card">
                    <div class="stat-card__number"><?php echo esc_html( $stat['number'] ?? '' ); ?></div>
                    <div class="stat-card__label"><?php echo esc_html( $stat['label'] ?? '' ); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================================
     TEAM SECTION
     ======================================== -->
<section class="team-section" aria-labelledby="team-title">
    <div class="container">
        <div class="team-section__header">
            <h2 id="team-title" class="team-section__title"><?php echo esc_html( $team_title ); ?></h2>
            <p class="team-section__description"><?php echo esc_html( $team_description ); ?></p>
        </div>

        <div class="team-grid">
            <?php foreach ( $team_members as $member ) : ?>
                <?php
                $member_image = $member['image'] ?? null;
                $has_image    = ! empty( $member_image );
                ?>
                <article class="team-card">
                    <div class="team-card__image <?php echo ! $has_image ? 'team-card__image--placeholder' : ''; ?>">
                        <?php if ( $has_image ) : ?>
                            <img src="<?php echo esc_url( $member_image['url'] ); ?>"
                                 alt="<?php echo esc_attr( $member['name'] ?? '' ); ?>"
                                 loading="lazy">
                        <?php else : ?>
                            <?php echo $icon_user_placeholder; ?>
                        <?php endif; ?>
                    </div>
                    <h3 class="team-card__name"><?php echo esc_html( $member['name'] ?? '' ); ?></h3>
                    <p class="team-card__role"><?php echo esc_html( $member['role'] ?? '' ); ?></p>
                    <p class="team-card__bio"><?php echo esc_html( $member['bio'] ?? '' ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================================
     TIMELINE SECTION
     ======================================== -->
<section class="timeline-section" aria-labelledby="timeline-title">
    <div class="container">
        <div class="timeline-section__header">
            <h2 id="timeline-title" class="timeline-section__title"><?php echo esc_html( $timeline_title ); ?></h2>
        </div>

        <div class="timeline">
            <?php foreach ( $timeline_items as $item ) : ?>
                <div class="timeline-item">
                    <div class="timeline-item__marker"></div>
                    <span class="timeline-item__year"><?php echo esc_html( $item['year'] ?? '' ); ?></span>
                    <h3 class="timeline-item__title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
                    <p class="timeline-item__description"><?php echo esc_html( $item['description'] ?? '' ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================================
     CTA SECTION
     ======================================== -->
<section class="page-content">
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
