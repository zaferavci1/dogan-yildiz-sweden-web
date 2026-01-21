<?php
/**
 * Projects Grid Section
 *
 * Displays a grid of project cards from the 'project' custom post type.
 * Used primarily on the Solar Systems page to showcase reference projects.
 *
 * @package Dataenergie
 * @version 2.0.0
 *
 * @param string $title           Section title
 * @param string $description     Section description
 * @param string $category        Project category slug to filter by (e.g., 'solar', 'it')
 * @param int    $posts_per_page  Number of projects to display (default: 3)
 */

$title          = $args['title'] ?? 'Unsere Referenzprojekte';
$description    = $args['description'] ?? '';
$category       = $args['category'] ?? '';
$posts_per_page = $args['posts_per_page'] ?? 3;

// Build query args
$query_args = array(
    'post_type'      => 'project',
    'posts_per_page' => $posts_per_page,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

// Add category filter if specified
if ( ! empty( $category ) ) {
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'project_category',
            'field'    => 'slug',
            'terms'    => $category,
        ),
    );
}

$projects_query = new WP_Query( $query_args );

// Icons for meta items
$icon_location = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>';
$icon_capacity = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>';

if ( $projects_query->have_posts() ) :
?>

<section class="projects-section" aria-labelledby="projects-section-title">
    <div class="container">
        <div class="projects-section__header">
            <h2 id="projects-section-title" class="projects-section__title"><?php echo esc_html( $title ); ?></h2>
            <?php if ( $description ) : ?>
                <p class="projects-section__description"><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
        </div>

        <div class="projects-grid">
            <?php
            while ( $projects_query->have_posts() ) :
                $projects_query->the_post();

                $location = get_field( 'project_location' );
                $capacity = get_field( 'project_capacity' );
            ?>
                <a href="<?php the_permalink(); ?>" class="project-card-modern project-card-modern--link">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="project-card-modern__image">
                            <?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="project-card-modern__content">
                        <h3 class="project-card-modern__title"><?php the_title(); ?></h3>
                        <div class="project-card-modern__meta">
                            <?php if ( $location ) : ?>
                                <span class="project-card-modern__meta-item">
                                    <?php
                                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    echo $icon_location;
                                    ?>
                                    <?php echo esc_html( $location ); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ( $capacity ) : ?>
                                <span class="project-card-modern__meta-item">
                                    <?php
                                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    echo $icon_capacity;
                                    ?>
                                    <?php echo esc_html( $capacity ); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php
wp_reset_postdata();
else :
    // Fallback: Show static reference images when no projects exist
    $static_projects = array();

    if ( $category === 'solar' ) {
        $static_projects = array(
            array(
                'image'    => get_template_directory_uri() . '/assets/images/references/solar-panel-1.jpg',
                'title'    => 'Gewerbedach-Anlage',
                'location' => 'Stuttgart',
                'capacity' => '150 kWp',
            ),
            array(
                'image'    => get_template_directory_uri() . '/assets/images/references/solar-panel-2.jpg',
                'title'    => 'Einfamilienhaus',
                'location' => 'München',
                'capacity' => '12 kWp',
            ),
            array(
                'image'    => get_template_directory_uri() . '/assets/images/references/solar-panel-3.jpg',
                'title'    => 'Industrieanlage',
                'location' => 'Frankfurt',
                'capacity' => '280 kWp',
            ),
            array(
                'image'    => get_template_directory_uri() . '/assets/images/references/solar-panel-4.jpg',
                'title'    => 'Mehrfamilienhaus',
                'location' => 'Berlin',
                'capacity' => '45 kWp',
            ),
        );
    } elseif ( $category === 'it' ) {
        $static_projects = array(
            array(
                'image'    => get_template_directory_uri() . '/assets/images/references/it-services-1.jpg',
                'title'    => 'IT-Infrastruktur',
                'location' => 'Stuttgart',
                'capacity' => 'Enterprise',
            ),
            array(
                'image'    => get_template_directory_uri() . '/assets/images/references/it-services-2.jpg',
                'title'    => 'Server & Netzwerk',
                'location' => 'München',
                'capacity' => 'Data Center',
            ),
            array(
                'image'    => get_template_directory_uri() . '/assets/images/references/it-services-3.jpg',
                'title'    => 'Cloud Migration',
                'location' => 'Berlin',
                'capacity' => 'Microsoft 365',
            ),
        );
    }

    if ( ! empty( $static_projects ) ) :
?>
<section class="projects-section" aria-labelledby="projects-section-title">
    <div class="container">
        <div class="projects-section__header">
            <h2 id="projects-section-title" class="projects-section__title"><?php echo esc_html( $title ); ?></h2>
            <?php if ( $description ) : ?>
                <p class="projects-section__description"><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
        </div>

        <div class="projects-grid">
            <?php foreach ( $static_projects as $project ) : ?>
                <article class="project-card-modern">
                    <div class="project-card-modern__image">
                        <img src="<?php echo esc_url( $project['image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>" loading="lazy">
                    </div>
                    <div class="project-card-modern__content">
                        <h3 class="project-card-modern__title"><?php echo esc_html( $project['title'] ); ?></h3>
                        <div class="project-card-modern__meta">
                            <span class="project-card-modern__meta-item">
                                <?php echo $icon_location; ?>
                                <?php echo esc_html( $project['location'] ); ?>
                            </span>
                            <span class="project-card-modern__meta-item">
                                <?php echo $icon_capacity; ?>
                                <?php echo esc_html( $project['capacity'] ); ?>
                            </span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
    endif;
endif;
