<?php
/**
 * Simple CTA Section
 *
 * Minimal call-to-action section with title, description, and button.
 * Modern SaaS design with subtle background and border.
 *
 * @package Dataenergie
 * @version 2.0.0
 *
 * @param string $title       CTA title
 * @param string $description CTA description text
 * @param string $button_text Button label
 * @param string $button_url  Button link URL
 */

$title       = $args['title'] ?? 'Haben Sie Fragen?';
$description = $args['description'] ?? '';
$button_text = $args['button_text'] ?? 'Kontakt aufnehmen';
$button_url  = $args['button_url'] ?? home_url( '/contact/' );
?>

<section class="cta-minimal" aria-labelledby="cta-title">
    <h2 id="cta-title" class="cta-minimal__title"><?php echo esc_html( $title ); ?></h2>
    <?php if ( $description ) : ?>
        <p class="cta-minimal__text"><?php echo esc_html( $description ); ?></p>
    <?php endif; ?>
    <a href="<?php echo esc_url( $button_url ); ?>" class="btn btn-primary">
        <?php echo esc_html( $button_text ); ?>
    </a>
</section>
