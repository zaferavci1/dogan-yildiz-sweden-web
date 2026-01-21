<?php
/**
 * Feature Card Component
 *
 * Modern SaaS-style feature card with icon, title, description and feature list.
 * Used for displaying services, features, or solutions.
 *
 * @package Dataenergie
 * @version 2.0.0
 *
 * @param string $icon_svg    Inline SVG icon markup
 * @param string $title       Card title
 * @param string $description Card description text
 * @param array  $features    Array of feature bullet points
 * @param string $variant     'default' (amber accent) or 'it' (navy accent)
 */

$icon_svg    = $args['icon_svg'] ?? '';
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$features    = $args['features'] ?? array();
$variant     = $args['variant'] ?? 'default';

// Build icon class based on variant
$icon_class = 'feature-icon';
if ( 'it' === $variant ) {
    $icon_class .= ' feature-icon--it';
}

// Check icon SVG (Feather Icons style)
$check_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>';
?>

<article class="feature-card">
    <?php if ( $icon_svg ) : ?>
        <div class="<?php echo esc_attr( $icon_class ); ?>" aria-hidden="true">
            <?php
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized in parent template
            echo $icon_svg;
            ?>
        </div>
    <?php endif; ?>

    <h3 class="feature-card__title"><?php echo esc_html( $title ); ?></h3>
    <p class="feature-card__description"><?php echo esc_html( $description ); ?></p>

    <?php if ( ! empty( $features ) ) : ?>
        <ul class="check-list-modern" role="list">
            <?php foreach ( $features as $feature ) : ?>
                <li>
                    <?php
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG
                    echo $check_svg;
                    ?>
                    <span><?php echo esc_html( $feature ); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</article>
