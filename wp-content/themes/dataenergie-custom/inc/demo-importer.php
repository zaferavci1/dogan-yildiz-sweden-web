<?php
/**
 * Dataenergie Demo Content Importer
 *
 * Temayı kurarken otomatik olarak sayfaları, menüleri ve örnek içerikleri oluşturur.
 * Faz 4 - Sprint 4.1: Otomatik İçerik Kurulumu
 *
 * @package Dataenergie
 * @version 1.0.0
 */

// Doğrudan erişimi engelle
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Demo içeriği oluştur
 */
function dataenergie_import_demo_content() {
    // Daha önce çalıştıysa tekrar çalışma
    if ( get_option( 'dataenergie_demo_imported' ) ) {
        return;
    }

    // 1. SAYFALARI OLUŞTUR
    // -------------------------------------------------------------------------
    $pages = array(
        'home' => array(
            'title'    => 'Home',
            'content'  => '',
            'template' => 'front-page.php',
        ),
        'it-services' => array(
            'title'    => 'IT Services',
            'content'  => '<!-- wp:paragraph -->
<p class="lead">Wir bieten umfassende IT-Dienstleistungen für Ihr Unternehmen. Von der Cloud-Migration bis zur Netzwerksicherheit sind wir Ihr zuverlässiger Partner für die digitale Transformation.</p>
<!-- /wp:paragraph -->',
            'template' => 'page-it-services.php',
        ),
        'it-infrastructure' => array(
            'title'    => 'IT Infrastructure',
            'content'  => '<!-- wp:paragraph -->
<p class="lead">Professionelle Server- und Netzwerkinfrastruktur für Ihr Unternehmen. Wir planen, implementieren und warten Ihre IT-Systeme nach höchsten Standards.</p>
<!-- /wp:paragraph -->',
            'template' => 'page-it-infrastructure.php',
        ),
        'cloud-solutions' => array(
            'title'    => 'Cloud Solutions',
            'content'  => '<!-- wp:paragraph -->
<p class="lead">Sichere Cloud-Migration und moderne Arbeitsplatzlösungen mit Microsoft 365 und Azure. Wir begleiten Sie auf dem Weg in die Cloud.</p>
<!-- /wp:paragraph -->',
            'template' => 'page-cloud-solutions.php',
        ),
        'cybersecurity' => array(
            'title'    => 'Cybersecurity',
            'content'  => '<!-- wp:paragraph -->
<p class="lead">Umfassender Schutz für Ihre IT-Infrastruktur. Von Firewall-Lösungen bis zu Endpoint Protection - wir sichern Ihr Unternehmen gegen Cyber-Bedrohungen.</p>
<!-- /wp:paragraph -->',
            'template' => 'page-cybersecurity.php',
        ),
        'solar-systems' => array(
            'title'    => 'Solar Systems',
            'content'  => '<!-- wp:paragraph -->
<p class="lead">Nutzen Sie die Kraft der Sonne. Wir planen und installieren Photovoltaikanlagen und Speicherlösungen für eine nachhaltige und unabhängige Energiezukunft.</p>
<!-- /wp:paragraph -->',
            'template' => 'page-solar-systems.php',
        ),
        'about' => array(
            'title'    => 'Über uns',
            'content'  => '<!-- wp:paragraph -->
<p>Dataenergie GmbH ist Ihr Experte für IT und Energie. Seit Jahren verbinden wir Technologie mit Nachhaltigkeit, um unseren Kunden zukunftssichere Lösungen zu bieten.</p>
<!-- /wp:paragraph -->',
            'template' => 'default',
        ),
        'contact' => array(
            'title'    => 'Kontakt',
            'content'  => '<!-- wp:paragraph -->
<p>Haben Sie Fragen? Wir sind gerne für Sie da. Füllen Sie einfach das Formular aus oder rufen Sie uns an.</p>
<!-- /wp:paragraph -->',
            'template' => 'page-contact.php',
        ),
        'impressum' => array(
            'title'    => 'Impressum',
            'content'  => '<!-- wp:heading -->
<h2>Angaben gemäss § 5 TMG</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Dataenergie GmbH<br>Gewerbestrasse 19<br>6314 Unterägeri<br>Schweiz</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2>Kontakt</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Telefon: 044 501 73 73<br>Mobile: 076 216 27 73<br>E-Mail: info@dataenergie.ch</p>
<!-- /wp:paragraph -->',
            'template' => 'default',
        ),
        'datenschutz' => array(
            'title'    => 'Datenschutz',
            'content'  => '<!-- wp:heading -->
<h2>Datenschutzerklärung</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Wir nehmen den Schutz Ihrer persönlichen Daten sehr ernst. Wir behandeln Ihre personenbezogenen Daten vertraulich und entsprechend der gesetzlichen Datenschutzvorschriften sowie dieser Datenschutzerklärung.</p>
<!-- /wp:paragraph -->',
            'template' => 'default',
        ),
        'agb' => array(
            'title'    => 'AGB',
            'content'  => '<!-- wp:heading -->
<h2>Allgemeine Geschäftsbedingungen</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Hier finden Sie unsere Allgemeinen Geschäftsbedingungen.</p>
<!-- /wp:paragraph -->',
            'template' => 'default',
        ),
    );

    $page_ids = array();

    foreach ( $pages as $slug => $page_data ) {
        // Sayfa var mı kontrol et
        $existing_page = get_page_by_path( $slug );

        if ( ! $existing_page ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $page_data['title'],
                'post_name'    => $slug,
                'post_content' => $page_data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                $page_ids[$slug] = $page_id;

                // Template ata
                if ( $page_data['template'] !== 'default' ) {
                    update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
                }

                // Ana sayfa ayarı
                if ( $slug === 'home' ) {
                    update_option( 'show_on_front', 'page' );
                    update_option( 'page_on_front', $page_id );
                }
            }
        } else {
            $page_ids[$slug] = $existing_page->ID;
        }
    }

    // 2. MENÜLERİ OLUŞTUR
    // -------------------------------------------------------------------------

    // Main Menu
    $main_menu_name = 'Main Menu';
    $main_menu_exists = wp_get_nav_menu_object( $main_menu_name );

    if ( ! $main_menu_exists ) {
        $menu_id = wp_create_nav_menu( $main_menu_name );

        if ( ! is_wp_error( $menu_id ) ) {
            // Menü öğelerini ekle
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => 'Home',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $page_ids['home'],
                'menu-item-type'   => 'post_type',
                'menu-item-status' => 'publish',
            ) );

            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => 'IT Services',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $page_ids['it-services'],
                'menu-item-type'   => 'post_type',
                'menu-item-status' => 'publish',
            ) );

            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => 'Solar Systems',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $page_ids['solar-systems'],
                'menu-item-type'   => 'post_type',
                'menu-item-status' => 'publish',
            ) );

            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => 'Kontakt',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $page_ids['contact'],
                'menu-item-type'   => 'post_type',
                'menu-item-status' => 'publish',
            ) );

            // Menü lokasyonunu ata
            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['main-menu'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }

    // Footer Menu
    $footer_menu_name = 'Footer Menu';
    $footer_menu_exists = wp_get_nav_menu_object( $footer_menu_name );

    if ( ! $footer_menu_exists ) {
        $menu_id = wp_create_nav_menu( $footer_menu_name );

        if ( ! is_wp_error( $menu_id ) ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => 'Impressum',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $page_ids['impressum'],
                'menu-item-type'   => 'post_type',
                'menu-item-status' => 'publish',
            ) );

            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => 'Datenschutz',
                'menu-item-object' => 'page',
                'menu-item-object-id' => $page_ids['datenschutz'],
                'menu-item-type'   => 'post_type',
                'menu-item-status' => 'publish',
            ) );

            $locations = get_theme_mod( 'nav_menu_locations' );
            $locations['footer-menu'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }

    // 3. ÖRNEK PROJELER (REFERANSLAR) OLUŞTUR
    // -------------------------------------------------------------------------

    // Solar Projesi
    if ( ! get_page_by_title( 'Solar Villa Zürich', OBJECT, 'project' ) ) {
        $project_id = wp_insert_post( array(
            'post_title'   => 'Solar Villa Zürich',
            'post_content' => 'Komplette PV-Anlage mit 15 kWp und Batteriespeicher.',
            'post_status'  => 'publish',
            'post_type'    => 'project',
        ) );

        if ( $project_id ) {
            wp_set_object_terms( $project_id, 'solar', 'project_category' );
            if ( function_exists( 'update_field' ) ) {
                update_field( 'project_location', 'Zürich, CH', $project_id );
                update_field( 'project_capacity', '15 kWp', $project_id );
                update_field( 'project_date', '2023-10-15', $project_id );
            }
        }
    }

    // IT Projesi
    if ( ! get_page_by_title( 'Cloud Migration SME', OBJECT, 'project' ) ) {
        $project_id = wp_insert_post( array(
            'post_title'   => 'Cloud Migration SME',
            'post_content' => 'Migration von On-Premise Exchange zu Microsoft 365.',
            'post_status'  => 'publish',
            'post_type'    => 'project',
        ) );

        if ( $project_id ) {
            wp_set_object_terms( $project_id, 'it', 'project_category' );
            if ( function_exists( 'update_field' ) ) {
                update_field( 'project_location', 'Bern, CH', $project_id );
                update_field( 'project_capacity', '50 Users', $project_id );
                update_field( 'project_date', '2023-09-01', $project_id );
            }
        }
    }

    // Flag ayarla
    update_option( 'dataenergie_demo_imported', true );
}

/**
 * Demo Site Ayarlarını ve Ana Sayfa Alanlarını Doldur
 * Not: Bu fonksiyon ACF yüklendikten sonra çalışmalıdır.
 */
function dataenergie_import_acf_content() {
    if ( ! function_exists( 'update_field' ) ) {
        return;
    }

    // Sadece bir kere çalışsın (demo import ile aynı flag'i kontrol edebiliriz veya yeni bir tane)
    if ( get_option( 'dataenergie_acf_imported' ) ) {
        return;
    }

    // 4. SITE AYARLARINI DOLDUR (Options Page)
    // -------------------------------------------------------------------------
    update_field( 'phone_number', '044 501 73 73', 'option' );
    update_field( 'mobile_number', '076 216 27 73', 'option' );
    update_field( 'email_address', 'info@dataenergie.ch', 'option' );
    update_field( 'address_text', "Dataenergie GmbH\nGewerbestrasse 19\n6314 Unterägeri\nSchweiz", 'option' );
    update_field( 'facebook_url', 'https://facebook.com/', 'option' );
    update_field( 'linkedin_url', 'https://linkedin.com/', 'option' );
    update_field( 'instagram_url', 'https://instagram.com/', 'option' );

    // 5. ANA SAYFA ALANLARINI DOLDUR
    // -------------------------------------------------------------------------
    $front_page_id = get_option( 'page_on_front' );
    if ( $front_page_id ) {
        update_field( 'hero_title_it', 'Professionelle IT-Lösungen', $front_page_id );
        update_field( 'hero_title_solar', 'Nachhaltige Solarenergie', $front_page_id );
        update_field( 'about_teaser_text', 'Wir verbinden Technologie und Energie. Als Schweizer Unternehmen bieten wir professionelle IT-Infrastruktur und nachhaltige erneuerbare Energielösungen nach höchsten Qualitätsstandards.', $front_page_id );
    }

    update_option( 'dataenergie_acf_imported', true );
}
add_action( 'admin_init', 'dataenergie_import_acf_content' );

// Tema aktifleştirildiğinde çalıştır
add_action( 'after_switch_theme', 'dataenergie_import_demo_content' );
