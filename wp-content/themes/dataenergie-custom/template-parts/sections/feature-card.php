<?php
/**
 * Feature Card Component
 *
 * Modern SaaS-style feature card with icon, title, description and feature list.
 * Used for displaying services, features, or solutions.
 *
 * @package Dataenergie
 * @version 2.1.0
 *
 * @param string $icon_svg      Inline SVG icon markup
 * @param string $title         Card title
 * @param string $description   Card description text
 * @param array  $features      Array of feature bullet points
 * @param string $variant       'default' (amber accent) or 'it' (navy accent)
 * @param bool   $expandable    Enable accordion/expandable mode (default: false)
 * @param string $expanded_content Additional content shown when expanded (optional)
 * @param string $link          Optional link URL to make card clickable
 */

$icon_svg         = $args['icon_svg'] ?? '';
$title            = $args['title'] ?? '';
$description      = $args['description'] ?? '';
$features         = $args['features'] ?? array();
$features_label   = $args['features_label'] ?? 'Schwerpunkte';
$variant          = $args['variant'] ?? 'default';
$expandable       = $args['expandable'] ?? false;
$expanded_content = $args['expanded_content'] ?? '';
$link             = $args['link'] ?? '';

// Build icon class based on variant
$icon_class = 'feature-icon';
if ( 'it' === $variant ) {
    $icon_class .= ' feature-icon--it';
}

// Build card class
$card_class = 'feature-card';
if ( $expandable ) {
    $card_class .= ' feature-card--expandable';
}
if ( $link ) {
    $card_class .= ' feature-card--clickable';
}

// Generate unique ID for accordion
$unique_id = 'feature-' . wp_unique_id();

// Check icon SVG (Feather Icons style)
$check_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>';

// Chevron icon for accordion
$chevron_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feature-card__chevron"><polyline points="6 9 12 15 18 9"></polyline></svg>';
?>

<?php if ( $link ) : ?>
<a href="<?php echo esc_url( $link ); ?>" class="feature-card__link">
<?php endif; ?>

<article class="<?php echo esc_attr( $card_class ); ?>" <?php echo $expandable ? 'data-expandable="true"' : ''; ?>>
    <div class="feature-card__header" <?php echo $expandable ? 'role="button" tabindex="0" aria-expanded="false" aria-controls="' . esc_attr( $unique_id ) . '"' : ''; ?>>
        <?php if ( $icon_svg ) : ?>
            <div class="<?php echo esc_attr( $icon_class ); ?>" aria-hidden="true">
                <?php
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is sanitized in parent template
                echo $icon_svg;
                ?>
            </div>
        <?php endif; ?>

        <div class="feature-card__header-content">
            <h3 class="feature-card__title"><?php echo esc_html( $title ); ?></h3>
            <p class="feature-card__description"><?php echo esc_html( $description ); ?></p>
        </div>

        <?php if ( $expandable ) : ?>
            <div class="feature-card__toggle" aria-hidden="true">
                <?php
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG
                echo $chevron_svg;
                ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="feature-card__body" id="<?php echo esc_attr( $unique_id ); ?>" <?php echo $expandable ? 'aria-hidden="true"' : ''; ?>>
        <?php if ( ! empty( $features ) ) : ?>
            <?php if ( $features_label ) : ?>
                <span class="feature-card__features-label"><?php echo esc_html( $features_label ); ?>:</span>
            <?php endif; ?>
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

        <?php if ( $expandable && $expanded_content ) : ?>
            <div class="feature-card__expanded-content">
                <?php
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Content is controlled by theme
                echo wp_kses_post( $expanded_content );
                ?>
            </div>
        <?php endif; ?>
    </div>
</article>

<?php if ( $link ) : ?>
</a>
<?php endif; ?>
