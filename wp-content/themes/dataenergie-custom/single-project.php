<?php
/**
 * Single Project/Reference Template
 *
 * Displays individual project/reference details with image gallery.
 * Follows Modern SaaS design principles (Vercel/Linear aesthetic).
 *
 * @package Dataenergie
 * @version 2.0.0
 */

get_header();

// =============================================================================
// GET PROJECT DATA
// =============================================================================

$location = get_field( 'project_location' );
$capacity = get_field( 'project_capacity' );
$date     = get_field( 'project_date' );

// Collect gallery images
$gallery_images = array();
for ( $i = 1; $i <= 4; $i++ ) {
    $image = get_field( 'project_image_' . $i );
    if ( $image ) {
        $gallery_images[] = $image;
    }
}

// Get category info
$categories     = get_the_terms( get_the_ID(), 'project_category' );
$category_name  = '';
$category_slug  = '';
if ( $categories && ! is_wp_error( $categories ) ) {
    $category_name = $categories[0]->name;
    $category_slug = $categories[0]->slug;
}

// Determine variant based on category
$variant = ( 'solar' === $category_slug ) ? 'solar' : 'it';

// Back URL - go to appropriate service page
$back_url = ( 'solar' === $category_slug )
    ? home_url( '/solar-systeme/' )
    : home_url( '/it-services/' );
$back_text = ( 'solar' === $category_slug )
    ? 'Alle Solar-Projekte'
    : 'Alle IT-Referenzen';

// =============================================================================
// SVG ICONS
// =============================================================================
$icons = array(
    'arrow-left' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
    'map-pin'    => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
    'zap'        => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
    'calendar'   => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
    'expand'     => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 3 21 3 21 9"></polyline><polyline points="9 21 3 21 3 15"></polyline><line x1="21" y1="3" x2="14" y2="10"></line><line x1="3" y1="21" x2="10" y2="14"></line></svg>',
    'close'      => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
    'chevron-left'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>',
    'chevron-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>',
);
?>

<main class="single-project single-project--<?php echo esc_attr( $variant ); ?>" role="main">

    <!-- ===================================================================
         BREADCRUMB / BACK NAVIGATION
         =================================================================== -->
    <nav class="project-nav" aria-label="<?php esc_attr_e( 'Zurück zur Übersicht', 'dataenergie' ); ?>">
        <div class="container">
            <a href="<?php echo esc_url( $back_url ); ?>" class="project-nav__back">
                <?php echo $icons['arrow-left']; ?>
                <span><?php echo esc_html( $back_text ); ?></span>
            </a>
        </div>
    </nav>

    <!-- ===================================================================
         PROJECT HEADER
         =================================================================== -->
    <header class="project-header">
        <div class="container">
            <div class="project-header__inner">
                <!-- Left: Content -->
                <div class="project-header__content">
                    <?php if ( $category_name ) : ?>
                        <span class="project-header__badge project-header__badge--<?php echo esc_attr( $category_slug ); ?>">
                            <?php echo esc_html( $category_name ); ?>
                        </span>
                    <?php endif; ?>

                    <h1 class="project-header__title"><?php the_title(); ?></h1>

                    <?php if ( $location || $capacity || $date ) : ?>
                        <ul class="project-header__meta" role="list">
                            <?php if ( $location ) : ?>
                                <li class="project-header__meta-item">
                                    <?php echo $icons['map-pin']; ?>
                                    <span><?php echo esc_html( $location ); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if ( $capacity ) : ?>
                                <li class="project-header__meta-item">
                                    <?php echo $icons['zap']; ?>
                                    <span><?php echo esc_html( $capacity ); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if ( $date ) : ?>
                                <li class="project-header__meta-item">
                                    <?php echo $icons['calendar']; ?>
                                    <span><?php echo esc_html( date_i18n( 'F Y', strtotime( $date ) ) ); ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- ===================================================================
         FEATURED IMAGE (HERO)
         =================================================================== -->
    <?php if ( has_post_thumbnail() ) : ?>
        <section class="project-hero-image" aria-label="<?php esc_attr_e( 'Projektbild', 'dataenergie' ); ?>">
            <div class="container">
                <figure class="project-hero-image__figure">
                    <?php
                    the_post_thumbnail( 'large', array(
                        'class'   => 'project-hero-image__img',
                        'loading' => 'eager',
                    ) );
                    ?>
                </figure>
            </div>
        </section>
    <?php endif; ?>

    <!-- ===================================================================
         PROJECT CONTENT
         =================================================================== -->
    <?php if ( get_the_content() ) : ?>
        <section class="project-content" aria-labelledby="project-description-heading">
            <div class="container">
                <div class="project-content__wrapper">
                    <h2 id="project-description-heading" class="sr-only">
                        <?php esc_html_e( 'Projektbeschreibung', 'dataenergie' ); ?>
                    </h2>
                    <div class="project-content__text entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ===================================================================
         IMAGE GALLERY
         =================================================================== -->
    <?php if ( ! empty( $gallery_images ) ) : ?>
        <section class="project-gallery" aria-labelledby="gallery-heading">
            <div class="container">
                <header class="project-gallery__header">
                    <h2 id="gallery-heading" class="project-gallery__title">
                        <?php esc_html_e( 'Projektbilder', 'dataenergie' ); ?>
                    </h2>
                    <p class="project-gallery__count">
                        <?php
                        printf(
                            esc_html( _n( '%d Bild', '%d Bilder', count( $gallery_images ), 'dataenergie' ) ),
                            count( $gallery_images )
                        );
                        ?>
                    </p>
                </header>

                <div class="project-gallery__grid project-gallery__grid--<?php echo count( $gallery_images ); ?>">
                    <?php foreach ( $gallery_images as $index => $image ) : ?>
                        <?php
                        // Handle both ACF array and ID formats
                        if ( is_array( $image ) ) {
                            $img_id       = $image['ID'];
                            $img_url      = $image['sizes']['large'] ?? $image['url'];
                            $img_full_url = $image['url'];
                            $img_alt      = $image['alt'] ?: get_the_title();
                        } else {
                            $img_id       = $image;
                            $img_url      = wp_get_attachment_image_url( $image, 'large' );
                            $img_full_url = wp_get_attachment_image_url( $image, 'full' );
                            $img_alt      = get_post_meta( $image, '_wp_attachment_image_alt', true ) ?: get_the_title();
                        }
                        ?>
                        <button
                            type="button"
                            class="project-gallery__item"
                            data-lightbox-index="<?php echo esc_attr( $index ); ?>"
                            data-lightbox-src="<?php echo esc_url( $img_full_url ); ?>"
                            data-lightbox-alt="<?php echo esc_attr( $img_alt ); ?>"
                            aria-label="<?php printf( esc_attr__( 'Bild %d vergrössern', 'dataenergie' ), $index + 1 ); ?>"
                        >
                            <img
                                src="<?php echo esc_url( $img_url ); ?>"
                                alt="<?php echo esc_attr( $img_alt ); ?>"
                                class="project-gallery__img"
                                loading="lazy"
                            >
                            <span class="project-gallery__overlay">
                                <?php echo $icons['expand']; ?>
                            </span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Lightbox Modal -->
        <div
            class="lightbox"
            role="dialog"
            aria-modal="true"
            aria-label="<?php esc_attr_e( 'Bildergalerie', 'dataenergie' ); ?>"
            hidden
        >
            <div class="lightbox__backdrop"></div>
            <div class="lightbox__content">
                <button type="button" class="lightbox__close" aria-label="<?php esc_attr_e( 'Schliessen', 'dataenergie' ); ?>">
                    <?php echo $icons['close']; ?>
                </button>
                <button type="button" class="lightbox__nav lightbox__nav--prev" aria-label="<?php esc_attr_e( 'Vorheriges Bild', 'dataenergie' ); ?>">
                    <?php echo $icons['chevron-left']; ?>
                </button>
                <figure class="lightbox__figure">
                    <img src="" alt="" class="lightbox__img">
                    <figcaption class="lightbox__caption"></figcaption>
                </figure>
                <button type="button" class="lightbox__nav lightbox__nav--next" aria-label="<?php esc_attr_e( 'Nächstes Bild', 'dataenergie' ); ?>">
                    <?php echo $icons['chevron-right']; ?>
                </button>
                <div class="lightbox__counter">
                    <span class="lightbox__current">1</span> / <span class="lightbox__total"><?php echo count( $gallery_images ); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- ===================================================================
         CALL TO ACTION
         =================================================================== -->
    <section class="project-cta">
        <div class="container">
            <?php
            get_template_part( 'template-parts/sections/cta-simple', null, array(
                'title'       => ( 'solar' === $category_slug )
                    ? __( 'Interesse an einer Solaranlage?', 'dataenergie' )
                    : __( 'Interesse an unseren IT-Lösungen?', 'dataenergie' ),
                'description' => __( 'Kontaktieren Sie uns für eine unverbindliche Beratung.', 'dataenergie' ),
                'button_text' => __( 'Kontakt aufnehmen', 'dataenergie' ),
                'button_url'  => home_url( '/kontakt/' ),
            ) );
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
