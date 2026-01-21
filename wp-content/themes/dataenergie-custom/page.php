<?php
/**
 * Page Template
 *
 * Standart sayfalar (Hakkımızda, İletişim vb.) için şablon.
 * Faz 3 - Sprint 3.1: Template Parçalama & Dinamikleştirme
 *
 * @package Dataenergie
 * @version 1.0.0
 */

get_header();
?>

<!-- ========================================
     PAGE CONTENT
     ======================================== -->
<section class="page-content">
    <div class="container">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>

                <!-- Page Header -->
                <header class="page-header">
                    <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
                </header>

                <!-- Featured Image (varsa) -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="page-featured-image">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'featured-img' ) ); ?>
                    </div>
                <?php endif; ?>

                <!-- Page Content (Gutenberg/Klasik Editör çıktısı) -->
                <div class="page-body entry-content">
                    <?php
                    the_content();

                    // Sayfa içi sayfalama (<!--nextpage--> için)
                    wp_link_pages( array(
                        'before' => '<nav class="page-links" aria-label="Sayfa navigasyonu"><span class="page-links-title">' . __( 'Sayfalar:', 'dataenergie' ) . '</span>',
                        'after'  => '</nav>',
                    ) );
                    ?>
                </div>

            </article>

            <?php
        endwhile;
        ?>

    </div><!-- .container -->
</section>

<?php
get_footer();
