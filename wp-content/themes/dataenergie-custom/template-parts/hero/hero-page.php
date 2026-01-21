<?php
/**
 * Modern Page Hero
 *
 * Reusable hero component for service and content pages.
 * Follows Modern SaaS design principles (Vercel/Linear style).
 *
 * @package Dataenergie
 * @version 2.0.0
 *
 * @param string $tag      Badge text (e.g., "IT Solutions")
 * @param string $title    Main heading (defaults to page title)
 * @param string $subtitle Subheading text
 * @param string $variant  'default' or 'solar' for different accent colors
 */

$tag      = $args['tag'] ?? '';
$title    = $args['title'] ?? get_the_title();
$subtitle = $args['subtitle'] ?? '';
$variant  = $args['variant'] ?? 'default';

// Build class based on variant
$class = 'page-hero-modern';
if ( 'solar' === $variant ) {
    $class .= ' page-hero-modern--solar';
}
?>

<section class="<?php echo esc_attr( $class ); ?>" role="banner" aria-labelledby="page-hero-title">
    <div class="container">
        <div class="page-hero-modern__content">
            <?php if ( $tag ) : ?>
                <span class="page-hero-modern__tag"><?php echo esc_html( $tag ); ?></span>
            <?php endif; ?>
            <h1 id="page-hero-title" class="page-hero-modern__title"><?php echo esc_html( $title ); ?></h1>
            <?php if ( $subtitle ) : ?>
                <p class="page-hero-modern__subtitle"><?php echo esc_html( $subtitle ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
