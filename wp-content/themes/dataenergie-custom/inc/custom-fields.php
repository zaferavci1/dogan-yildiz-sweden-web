<?php
/**
 * Dataenergie Custom Theme - Custom Post Types & ACF Fields
 *
 * @package Dataenergie
 * @version 1.0.0
 */

// Doğrudan erişimi engelle
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ==========================================================================
   1. CUSTOM POST TYPE: REFERANSLAR (Projects)
   ========================================================================== */

/**
 * Referanslar (Projects) Custom Post Type
 */
function dataenergie_register_project_cpt() {
    $labels = array(
        'name'                  => _x( 'Referanslar', 'Post Type General Name', 'dataenergie' ),
        'singular_name'         => _x( 'Referans', 'Post Type Singular Name', 'dataenergie' ),
        'menu_name'             => __( 'Referanslar', 'dataenergie' ),
        'name_admin_bar'        => __( 'Referans', 'dataenergie' ),
        'archives'              => __( 'Referans Arşivi', 'dataenergie' ),
        'attributes'            => __( 'Referans Özellikleri', 'dataenergie' ),
        'parent_item_colon'     => __( 'Üst Referans:', 'dataenergie' ),
        'all_items'             => __( 'Tüm Referanslar', 'dataenergie' ),
        'add_new_item'          => __( 'Yeni Referans Ekle', 'dataenergie' ),
        'add_new'               => __( 'Yeni Ekle', 'dataenergie' ),
        'new_item'              => __( 'Yeni Referans', 'dataenergie' ),
        'edit_item'             => __( 'Referans Düzenle', 'dataenergie' ),
        'update_item'           => __( 'Referans Güncelle', 'dataenergie' ),
        'view_item'             => __( 'Referansı Görüntüle', 'dataenergie' ),
        'view_items'            => __( 'Referansları Görüntüle', 'dataenergie' ),
        'search_items'          => __( 'Referans Ara', 'dataenergie' ),
        'not_found'             => __( 'Bulunamadı', 'dataenergie' ),
        'not_found_in_trash'    => __( 'Çöp kutusunda bulunamadı', 'dataenergie' ),
        'featured_image'        => __( 'Öne Çıkan Görsel', 'dataenergie' ),
        'set_featured_image'    => __( 'Öne çıkan görseli ayarla', 'dataenergie' ),
        'remove_featured_image' => __( 'Öne çıkan görseli kaldır', 'dataenergie' ),
        'use_featured_image'    => __( 'Öne çıkan görsel olarak kullan', 'dataenergie' ),
        'insert_into_item'      => __( 'Referansa ekle', 'dataenergie' ),
        'uploaded_to_this_item' => __( 'Bu referansa yüklendi', 'dataenergie' ),
        'items_list'            => __( 'Referans listesi', 'dataenergie' ),
        'items_list_navigation' => __( 'Referans listesi navigasyonu', 'dataenergie' ),
        'filter_items_list'     => __( 'Referans listesini filtrele', 'dataenergie' ),
    );

    $args = array(
        'label'               => __( 'Referans', 'dataenergie' ),
        'description'         => __( 'Şirket referansları ve tamamlanmış projeler', 'dataenergie' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'taxonomies'          => array( 'project_category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-portfolio',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => 'referanslar',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'rewrite'             => array(
            'slug'       => 'referans',
            'with_front' => false,
        ),
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'dataenergie_register_project_cpt', 0 );

/* ==========================================================================
   2. TAKSONOMI: PROJE KATEGORİSİ
   ========================================================================== */

/**
 * Proje Kategorisi Taksonomisi
 */
function dataenergie_register_project_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Proje Kategorileri', 'Taxonomy General Name', 'dataenergie' ),
        'singular_name'              => _x( 'Proje Kategorisi', 'Taxonomy Singular Name', 'dataenergie' ),
        'menu_name'                  => __( 'Kategoriler', 'dataenergie' ),
        'all_items'                  => __( 'Tüm Kategoriler', 'dataenergie' ),
        'parent_item'                => __( 'Üst Kategori', 'dataenergie' ),
        'parent_item_colon'          => __( 'Üst Kategori:', 'dataenergie' ),
        'new_item_name'              => __( 'Yeni Kategori Adı', 'dataenergie' ),
        'add_new_item'               => __( 'Yeni Kategori Ekle', 'dataenergie' ),
        'edit_item'                  => __( 'Kategori Düzenle', 'dataenergie' ),
        'update_item'                => __( 'Kategori Güncelle', 'dataenergie' ),
        'view_item'                  => __( 'Kategori Görüntüle', 'dataenergie' ),
        'separate_items_with_commas' => __( 'Kategorileri virgülle ayırın', 'dataenergie' ),
        'add_or_remove_items'        => __( 'Kategori ekle veya kaldır', 'dataenergie' ),
        'choose_from_most_used'      => __( 'En çok kullanılanlardan seç', 'dataenergie' ),
        'popular_items'              => __( 'Popüler Kategoriler', 'dataenergie' ),
        'search_items'               => __( 'Kategori Ara', 'dataenergie' ),
        'not_found'                  => __( 'Bulunamadı', 'dataenergie' ),
        'no_terms'                   => __( 'Kategori yok', 'dataenergie' ),
        'items_list'                 => __( 'Kategori listesi', 'dataenergie' ),
        'items_list_navigation'      => __( 'Kategori listesi navigasyonu', 'dataenergie' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => false,
        'show_in_rest'      => true,
        'rewrite'           => array(
            'slug'         => 'referans-kategori',
            'with_front'   => false,
            'hierarchical' => true,
        ),
    );

    register_taxonomy( 'project_category', array( 'project' ), $args );
}
add_action( 'init', 'dataenergie_register_project_taxonomy', 0 );

/**
 * Varsayılan proje kategorilerini ekle
 */
function dataenergie_insert_default_project_terms() {
    // Sadece kategori yoksa ekle
    if ( ! term_exists( 'Solar', 'project_category' ) ) {
        wp_insert_term(
            'Solar',
            'project_category',
            array(
                'description' => 'Güneş enerjisi projeleri',
                'slug'        => 'solar',
            )
        );
    }

    if ( ! term_exists( 'IT', 'project_category' ) ) {
        wp_insert_term(
            'IT',
            'project_category',
            array(
                'description' => 'Bilgi teknolojileri projeleri',
                'slug'        => 'it',
            )
        );
    }
}
add_action( 'init', 'dataenergie_insert_default_project_terms', 10 );

/* ==========================================================================
   3. ACF ALAN GRUPLARI
   ========================================================================== */

/**
 * ACF aktif mi kontrol et
 */
function dataenergie_check_acf() {
    return function_exists( 'acf_add_local_field_group' );
}

/**
 * ACF Alan Gruplarını Tanımla
 */
function dataenergie_register_acf_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    /* -------------------------------------------------------------------------
       A. ANA SAYFA ALANLARI (Homepage Settings)
       ------------------------------------------------------------------------- */
    acf_add_local_field_group( array(
        'key'      => 'group_homepage_settings',
        'title'    => 'Ana Sayfa Ayarları',
        'fields'   => array(
            // SEKME 1: HERO
            array(
                'key'   => 'field_hero_tab',
                'label' => 'Hero Bölümü',
                'name'  => '',
                'type'  => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'          => 'field_hero_title_it',
                'label'        => 'Hero Başlık - IT',
                'name'         => 'hero_title_it',
                'type'         => 'text',
                'instructions' => 'IT sektörü için ana sayfa hero başlığı',
                'placeholder'  => 'Dijital Dönüşümde Güvenilir Çözüm Ortağınız',
                'maxlength'    => 100,
            ),
            array(
                'key'          => 'field_hero_title_solar',
                'label'        => 'Hero Başlık - Solar',
                'name'         => 'hero_title_solar',
                'type'         => 'text',
                'instructions' => 'Solar sektörü için ana sayfa hero başlığı',
                'placeholder'  => 'Sürdürülebilir Enerji Çözümleri',
                'maxlength'    => 100,
            ),
            array(
                'key'           => 'field_hero_image_it',
                'label'         => 'Hero Görsel - IT',
                'name'          => 'hero_image_it',
                'type'          => 'image',
                'instructions'  => 'IT sektörü için hero arka plan görseli (Önerilen: 1920x1080px)',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'jpg, jpeg, png, webp',
            ),
            array(
                'key'           => 'field_hero_image_solar',
                'label'         => 'Hero Görsel - Solar',
                'name'          => 'hero_image_solar',
                'type'          => 'image',
                'instructions'  => 'Solar sektörü için hero arka plan görseli (Önerilen: 1920x1080px)',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'jpg, jpeg, png, webp',
            ),

            // SEKME 2: IT SERVICES
            array(
                'key'       => 'field_it_services_tab',
                'label'     => 'IT Services',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'     => 'field_it_services_heading',
                'label'   => 'IT Services Kartları',
                'name'    => '',
                'type'    => 'message',
                'message' => '<strong>Ana sayfada gösterilecek 6 IT hizmeti kartını düzenleyin.</strong>',
            ),

            // IT Service 1
            array(
                'key'     => 'field_it_service_1_heading',
                'label'   => 'Hizmet 1',
                'name'    => '',
                'type'    => 'message',
                'message' => '<hr>',
            ),
            array(
                'key'           => 'field_it_service_1_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_1_title',
                'type'          => 'text',
                'default_value' => 'Microsoft 365 & Modern Workplace',
                'maxlength'     => 100,
            ),
            array(
                'key'           => 'field_it_service_1_url',
                'label'         => 'Link URL',
                'name'          => 'it_service_1_url',
                'type'          => 'url',
                'default_value' => '/microsoft-365/',
                'placeholder'   => '/microsoft-365/',
            ),
            array(
                'key'           => 'field_it_service_1_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_1_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Effiziente Zusammenarbeit beginnt mit der richtigen Plattform. Wir konzipieren, implementieren und betreiben Microsoft-365-Umgebungen, die Sicherheit, Governance und Benutzerfreundlichkeit vereinen.',
            ),
            array(
                'key'           => 'field_it_service_1_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_1_feature_1',
                'type'          => 'text',
                'default_value' => 'Tenant-Design & Migration',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_1_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_1_feature_2',
                'type'          => 'text',
                'default_value' => 'Microsoft Teams & SharePoint Strukturen',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_1_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_1_feature_3',
                'type'          => 'text',
                'default_value' => 'Entra ID, Conditional Access & MFA',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_1_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_1_feature_4',
                'type'          => 'text',
                'default_value' => 'Governance & Zugriffskonzepte',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // IT Service 2
            array(
                'key'     => 'field_it_service_2_heading',
                'label'   => 'Hizmet 2',
                'name'    => '',
                'type'    => 'message',
                'message' => '<hr>',
            ),
            array(
                'key'           => 'field_it_service_2_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_2_title',
                'type'          => 'text',
                'default_value' => 'Security & Zero Trust',
                'maxlength'     => 100,
            ),
            array(
                'key'           => 'field_it_service_2_url',
                'label'         => 'Link URL',
                'name'          => 'it_service_2_url',
                'type'          => 'url',
                'default_value' => '/cybersecurity/',
                'placeholder'   => '/cybersecurity/',
            ),
            array(
                'key'           => 'field_it_service_2_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_2_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'IT-Sicherheit beginnt bei Identitäten. Wir entwickeln ganzheitliche Sicherheitskonzepte nach dem Zero-Trust-Prinzip und schützen Benutzer, Daten und Systeme vor modernen Bedrohungen.',
            ),
            array(
                'key'           => 'field_it_service_2_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_2_feature_1',
                'type'          => 'text',
                'default_value' => 'Zero-Trust Architektur',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_2_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_2_feature_2',
                'type'          => 'text',
                'default_value' => 'MFA & Passwordless Authentication',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_2_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_2_feature_3',
                'type'          => 'text',
                'default_value' => 'Privileged Access & Admin-Sicherheit',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_2_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_2_feature_4',
                'type'          => 'text',
                'default_value' => 'Guest- & External-User-Management',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // IT Service 3
            array(
                'key'     => 'field_it_service_3_heading',
                'label'   => 'Hizmet 3',
                'name'    => '',
                'type'    => 'message',
                'message' => '<hr>',
            ),
            array(
                'key'           => 'field_it_service_3_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_3_title',
                'type'          => 'text',
                'default_value' => 'IT Governance & Risk Assessment',
                'maxlength'     => 100,
            ),
            array(
                'key'           => 'field_it_service_3_url',
                'label'         => 'Link URL',
                'name'          => 'it_service_3_url',
                'type'          => 'url',
                'default_value' => '/beratung-analyse/',
                'placeholder'   => '/beratung-analyse/',
            ),
            array(
                'key'           => 'field_it_service_3_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_3_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Transparenz über Risiken ist die Basis guter Entscheidungen. Mit strukturierten IT-Governance- und Security-Assessments identifizieren wir Risiken, Sicherheitslücken und Optimierungspotenziale.',
            ),
            array(
                'key'           => 'field_it_service_3_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_3_feature_1',
                'type'          => 'text',
                'default_value' => 'Management-Report (PDF)',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_3_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_3_feature_2',
                'type'          => 'text',
                'default_value' => 'Risiko-Score & Prioritäten',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_3_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_3_feature_3',
                'type'          => 'text',
                'default_value' => 'Konkrete Handlungsempfehlungen',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_3_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_3_feature_4',
                'type'          => 'text',
                'default_value' => 'Compliance- & Sicherheitsübersicht',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // IT Service 4
            array(
                'key'     => 'field_it_service_4_heading',
                'label'   => 'Hizmet 4',
                'name'    => '',
                'type'    => 'message',
                'message' => '<hr>',
            ),
            array(
                'key'           => 'field_it_service_4_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_4_title',
                'type'          => 'text',
                'default_value' => 'Cloud & Hybrid IT',
                'maxlength'     => 100,
            ),
            array(
                'key'           => 'field_it_service_4_url',
                'label'         => 'Link URL',
                'name'          => 'it_service_4_url',
                'type'          => 'url',
                'default_value' => '/cloud-solutions/',
                'placeholder'   => '/cloud-solutions/',
            ),
            array(
                'key'           => 'field_it_service_4_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_4_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Cloud-Lösungen, die zu Ihrer Realität passen. Wir planen und betreiben Azure- und Hybrid-Infrastrukturen, die bestehende Systeme nahtlos integrieren und zukunftssicher skalierbar sind.',
            ),
            array(
                'key'           => 'field_it_service_4_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_4_feature_1',
                'type'          => 'text',
                'default_value' => 'Azure Architektur & Landing Zones',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_4_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_4_feature_2',
                'type'          => 'text',
                'default_value' => 'Hybrid AD / Entra ID',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_4_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_4_feature_3',
                'type'          => 'text',
                'default_value' => 'Backup & Disaster Recovery',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_4_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_4_feature_4',
                'type'          => 'text',
                'default_value' => 'Kosten- & Sicherheitsoptimierung',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // IT Service 5
            array(
                'key'     => 'field_it_service_5_heading',
                'label'   => 'Hizmet 5',
                'name'    => '',
                'type'    => 'message',
                'message' => '<hr>',
            ),
            array(
                'key'           => 'field_it_service_5_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_5_title',
                'type'          => 'text',
                'default_value' => 'Automation & IT Efficiency',
                'maxlength'     => 100,
            ),
            array(
                'key'           => 'field_it_service_5_url',
                'label'         => 'Link URL',
                'name'          => 'it_service_5_url',
                'type'          => 'url',
                'default_value' => '/it-services/',
                'placeholder'   => '/it-services/',
            ),
            array(
                'key'           => 'field_it_service_5_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_5_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Weniger manuelle Arbeit. Mehr Kontrolle. Durch gezielte Automatisierung reduzieren wir Fehler, beschleunigen Prozesse und erhöhen die Betriebssicherheit Ihrer IT.',
            ),
            array(
                'key'           => 'field_it_service_5_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_5_feature_1',
                'type'          => 'text',
                'default_value' => 'Benutzer- & Zugriffsautomatisierung',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_5_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_5_feature_2',
                'type'          => 'text',
                'default_value' => 'Microsoft 365 Provisioning',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_5_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_5_feature_3',
                'type'          => 'text',
                'default_value' => 'Security Checks & Reports',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_5_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_5_feature_4',
                'type'          => 'text',
                'default_value' => 'Skript- & Prozessautomatisierung',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // IT Service 6
            array(
                'key'     => 'field_it_service_6_heading',
                'label'   => 'Hizmet 6',
                'name'    => '',
                'type'    => 'message',
                'message' => '<hr>',
            ),
            array(
                'key'           => 'field_it_service_6_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_6_title',
                'type'          => 'text',
                'default_value' => 'IT Support & Managed Services',
                'maxlength'     => 100,
            ),
            array(
                'key'           => 'field_it_service_6_url',
                'label'         => 'Link URL',
                'name'          => 'it_service_6_url',
                'type'          => 'url',
                'default_value' => '/it-outsourcing/',
                'placeholder'   => '/it-outsourcing/',
            ),
            array(
                'key'           => 'field_it_service_6_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_6_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Zuverlässiger IT-Betrieb ohne Komplexität. Wir übernehmen den stabilen Betrieb Ihrer IT-Umgebung – strukturiert, transparent und mit klaren Zuständigkeiten.',
            ),
            array(
                'key'           => 'field_it_service_6_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_6_feature_1',
                'type'          => 'text',
                'default_value' => '1st & 2nd Level Support',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_6_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_6_feature_2',
                'type'          => 'text',
                'default_value' => 'Monitoring & Wartung',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_6_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_6_feature_3',
                'type'          => 'text',
                'default_value' => 'Incident- & Problem-Management',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_6_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_6_feature_4',
                'type'          => 'text',
                'default_value' => 'SLA-basierte Services',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // SEKME 3: KURUMSAL
            array(
                'key'       => 'field_about_tab',
                'label'     => 'Kurumsal',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'          => 'field_about_teaser_text',
                'label'        => 'Hakkımızda Özet Metni',
                'name'         => 'about_teaser_text',
                'type'         => 'textarea',
                'instructions' => 'Ana sayfada görünecek kısa kurumsal tanıtım metni (2-3 cümle)',
                'rows'         => 4,
                'maxlength'    => 500,
                'placeholder'  => 'Dataenergie olarak, IT ve enerji sektörlerinde yenilikçi çözümler sunuyoruz...',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_type',
                    'operator' => '==',
                    'value'    => 'front_page',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => array(
            0 => 'the_content',
            1 => 'excerpt',
            2 => 'discussion',
            3 => 'comments',
            4 => 'revisions',
            5 => 'slug',
            6 => 'author',
            7 => 'format',
            8 => 'featured_image',
            9 => 'categories',
            10 => 'tags',
            11 => 'send-trackbacks',
        ),
        'active'   => true,
        'show_in_rest' => false,
    ) );

    /* -------------------------------------------------------------------------
       B. PROJE DETAYLARI (Project Details)
       ------------------------------------------------------------------------- */
    acf_add_local_field_group( array(
        'key'    => 'group_project_details',
        'title'  => 'Proje Detayları',
        'fields' => array(
            array(
                'key'          => 'field_project_location',
                'label'        => 'Konum',
                'name'         => 'project_location',
                'type'         => 'text',
                'instructions' => 'Projenin gerçekleştirildiği konum',
                'placeholder'  => 'Zürich, CH',
                'maxlength'    => 100,
            ),
            array(
                'key'            => 'field_project_date',
                'label'          => 'Proje Tarihi',
                'name'           => 'project_date',
                'type'           => 'date_picker',
                'instructions'   => 'Projenin tamamlanma tarihi',
                'display_format' => 'd.m.Y',
                'return_format'  => 'Y-m-d',
                'first_day'      => 1,
            ),
            array(
                'key'          => 'field_project_capacity',
                'label'        => 'Kapasite / Ölçek',
                'name'         => 'project_capacity',
                'type'         => 'text',
                'instructions' => 'Proje kapasitesi veya ölçeği (örn: 15 kWp, 50 kullanıcı)',
                'placeholder'  => '15 kWp',
                'maxlength'    => 50,
            ),
            // NOT: Gallery alanı ACF Pro gerektirir
            // ACF Free kullanıyorsanız birden fazla image alanı ekleyebilirsiniz:
            array(
                'key'           => 'field_project_image_1',
                'label'         => 'Proje Görseli 1',
                'name'          => 'project_image_1',
                'type'          => 'image',
                'instructions'  => 'Proje ana görseli',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'jpg, jpeg, png, webp',
            ),
            array(
                'key'           => 'field_project_image_2',
                'label'         => 'Proje Görseli 2',
                'name'          => 'project_image_2',
                'type'          => 'image',
                'instructions'  => 'Ek proje görseli (opsiyonel)',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'jpg, jpeg, png, webp',
            ),
            array(
                'key'           => 'field_project_image_3',
                'label'         => 'Proje Görseli 3',
                'name'          => 'project_image_3',
                'type'          => 'image',
                'instructions'  => 'Ek proje görseli (opsiyonel)',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'jpg, jpeg, png, webp',
            ),
            array(
                'key'           => 'field_project_image_4',
                'label'         => 'Proje Görseli 4',
                'name'          => 'project_image_4',
                'type'          => 'image',
                'instructions'  => 'Ek proje görseli (opsiyonel)',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'jpg, jpeg, png, webp',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'project',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
        'show_in_rest'          => false,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_acf_fields' );

/**
 * Über Uns (About) Sayfa Alanlarını Tanımla
 * ACF Free uyumlu - Repeater yerine sabit grup alanlar kullanılıyor
 */
function dataenergie_register_about_page_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_about_page',
        'title'  => 'Über Uns Sayfa Ayarları',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array(
                'key'       => 'field_about_hero_tab',
                'label'     => 'Hero',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_about_hero_subtitle',
                'label'         => 'Hero Alt Başlık',
                'name'          => 'about_hero_subtitle',
                'type'          => 'text',
                'instructions'  => 'Hero bölümünde görünecek slogan',
                'default_value' => 'DataEnergie – Strukturierte IT, digitale Lösungen und nachhaltige Energie',
            ),

            // =========================================
            // SEKME 2: UNSERE HALTUNG
            // =========================================
            array(
                'key'       => 'field_about_haltung_tab',
                'label'     => 'Unsere Haltung',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_about_haltung_title',
                'label'         => 'Başlık',
                'name'          => 'about_haltung_title',
                'type'          => 'text',
                'default_value' => 'Klarheit statt Komplexität',
            ),
            array(
                'key'           => 'field_about_haltung_text',
                'label'         => 'Açıklama',
                'name'          => 'about_haltung_text',
                'type'          => 'textarea',
                'rows'          => 4,
                'default_value' => 'In einer zunehmend digitalen Welt entstehen Risiken oft dort, wo Übersicht fehlt. Unsere Arbeit zielt darauf ab, Komplexität zu reduzieren, Risiken sichtbar zu machen und tragfähige Entscheidungen zu ermöglichen.',
            ),
            array(
                'key'           => 'field_about_haltung_note',
                'label'         => 'Alt Not',
                'name'          => 'about_haltung_note',
                'type'          => 'text',
                'default_value' => 'Wir glauben nicht an Standardlösungen, sondern an passende Lösungen.',
            ),

            // =========================================
            // SEKME 3: WAS UNS AUSZEICHNET
            // =========================================
            array(
                'key'       => 'field_about_auszeichnet_tab',
                'label'     => 'Was uns auszeichnet',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array( 'key' => 'field_about_auszeichnet_1', 'label' => 'Özellik 1', 'name' => 'about_auszeichnet_1', 'type' => 'text', 'default_value' => 'Strukturierte Vorgehensweise statt Ad-hoc-IT' ),
            array( 'key' => 'field_about_auszeichnet_2', 'label' => 'Özellik 2', 'name' => 'about_auszeichnet_2', 'type' => 'text', 'default_value' => 'Fokus auf Microsoft 365, Security & Governance' ),
            array( 'key' => 'field_about_auszeichnet_3', 'label' => 'Özellik 3', 'name' => 'about_auszeichnet_3', 'type' => 'text', 'default_value' => 'Eigene digitale Lösungen mit klar definiertem Nutzen' ),
            array( 'key' => 'field_about_auszeichnet_4', 'label' => 'Özellik 4', 'name' => 'about_auszeichnet_4', 'type' => 'text', 'default_value' => 'Kombination aus Beratung, Umsetzung und Betrieb' ),
            array( 'key' => 'field_about_auszeichnet_5', 'label' => 'Özellik 5', 'name' => 'about_auszeichnet_5', 'type' => 'text', 'default_value' => 'Verständnis für technische und geschäftliche Anforderungen' ),
            array( 'key' => 'field_about_auszeichnet_6', 'label' => 'Özellik 6', 'name' => 'about_auszeichnet_6', 'type' => 'text', 'default_value' => 'Ausrichtung auf den Schweizer Markt' ),

            // =========================================
            // SEKME 4: UNSERE SCHWERPUNKTE
            // =========================================
            array(
                'key'       => 'field_about_schwerpunkt_tab',
                'label'     => 'Unsere Schwerpunkte',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array( 'key' => 'field_about_schwerpunkt_1_title', 'label' => 'Schwerpunkt 1 - Başlık', 'name' => 'about_schwerpunkt_1_title', 'type' => 'text', 'default_value' => 'IT Services', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_about_schwerpunkt_1_desc', 'label' => 'Schwerpunkt 1 - Açıklama', 'name' => 'about_schwerpunkt_1_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Governance-orientierte IT-Services mit Fokus auf Microsoft 365, Security, Cloud und Automatisierung.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_about_schwerpunkt_2_title', 'label' => 'Schwerpunkt 2 - Başlık', 'name' => 'about_schwerpunkt_2_title', 'type' => 'text', 'default_value' => 'Digitale Lösungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_about_schwerpunkt_2_desc', 'label' => 'Schwerpunkt 2 - Açıklama', 'name' => 'about_schwerpunkt_2_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Eigene, modulare Lösungen wie Workforce Management & Zeiterfassung sowie Smart-Building-Anwendungen.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_about_schwerpunkt_3_title', 'label' => 'Schwerpunkt 3 - Başlık', 'name' => 'about_schwerpunkt_3_title', 'type' => 'text', 'default_value' => 'Energielösungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_about_schwerpunkt_3_desc', 'label' => 'Schwerpunkt 3 - Açıklama', 'name' => 'about_schwerpunkt_3_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Planung und Umsetzung nachhaltiger Photovoltaik-Systeme für Unternehmen und Immobilien.', 'wrapper' => array( 'width' => '50' ) ),

            // =========================================
            // SEKME 5: FÜR WEN WIR ARBEITEN
            // =========================================
            array(
                'key'       => 'field_about_zielgruppe_tab',
                'label'     => 'Für wen wir arbeiten',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array( 'key' => 'field_about_zielgruppe_1', 'label' => 'Zielgruppe 1', 'name' => 'about_zielgruppe_1', 'type' => 'text', 'default_value' => 'KMU und Organisationen' ),
            array( 'key' => 'field_about_zielgruppe_2', 'label' => 'Zielgruppe 2', 'name' => 'about_zielgruppe_2', 'type' => 'text', 'default_value' => 'IT-Leitungen und Geschäftsführungen' ),
            array( 'key' => 'field_about_zielgruppe_3', 'label' => 'Zielgruppe 3', 'name' => 'about_zielgruppe_3', 'type' => 'text', 'default_value' => 'HR- und Verwaltungsabteilungen' ),
            array( 'key' => 'field_about_zielgruppe_4', 'label' => 'Zielgruppe 4', 'name' => 'about_zielgruppe_4', 'type' => 'text', 'default_value' => 'Immobilienverwaltungen' ),
            array( 'key' => 'field_about_zielgruppe_5', 'label' => 'Zielgruppe 5', 'name' => 'about_zielgruppe_5', 'type' => 'text', 'default_value' => 'Unternehmen mit hohen Anforderungen an Sicherheit und Struktur' ),

            // =========================================
            // SEKME 6: UNSERE ARBEITSWEISE
            // =========================================
            array(
                'key'       => 'field_about_arbeitsweise_tab',
                'label'     => 'Unsere Arbeitsweise',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array( 'key' => 'field_about_arbeitsweise_title', 'label' => 'Slogan', 'name' => 'about_arbeitsweise_title', 'type' => 'text', 'default_value' => 'Strukturiert. Transparent. Verlässlich.' ),
            array( 'key' => 'field_about_arbeitsweise_1', 'label' => 'Punkt 1', 'name' => 'about_arbeitsweise_1', 'type' => 'text', 'default_value' => 'Klare Zieldefinition' ),
            array( 'key' => 'field_about_arbeitsweise_2', 'label' => 'Punkt 2', 'name' => 'about_arbeitsweise_2', 'type' => 'text', 'default_value' => 'Verständliche Kommunikation' ),
            array( 'key' => 'field_about_arbeitsweise_3', 'label' => 'Punkt 3', 'name' => 'about_arbeitsweise_3', 'type' => 'text', 'default_value' => 'Nachvollziehbare Ergebnisse' ),
            array( 'key' => 'field_about_arbeitsweise_4', 'label' => 'Punkt 4', 'name' => 'about_arbeitsweise_4', 'type' => 'text', 'default_value' => 'Saubere Dokumentation' ),
            array( 'key' => 'field_about_arbeitsweise_5', 'label' => 'Punkt 5', 'name' => 'about_arbeitsweise_5', 'type' => 'text', 'default_value' => 'Langfristige Partnerschaften' ),
            array( 'key' => 'field_about_arbeitsweise_note', 'label' => 'Alt Not', 'name' => 'about_arbeitsweise_note', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Unser Anspruch ist nicht, möglichst viel zu verkaufen – sondern sinnvolle und nachhaltige Lösungen zu liefern.' ),

            // =========================================
            // SEKME 7: CTA
            // =========================================
            array(
                'key'       => 'field_about_cta_tab',
                'label'     => 'CTA',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array( 'key' => 'field_about_cta_title', 'label' => 'CTA Başlık', 'name' => 'about_cta_title', 'type' => 'text', 'default_value' => 'Möchten Sie mehr über DataEnergie erfahren?' ),
            array( 'key' => 'field_about_cta_description', 'label' => 'CTA Açıklama', 'name' => 'about_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Gerne stellen wir uns und unsere Arbeitsweise in einem unverbindlichen Gespräch vor.' ),
            array( 'key' => 'field_about_cta_button_text', 'label' => 'Buton Metni', 'name' => 'about_cta_button_text', 'type' => 'text', 'default_value' => 'Erstgespräch anfragen' ),
        ),
        'location'       => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-uber-uns.php',
                ),
            ),
        ),
        'menu_order'     => 0,
        'position'       => 'normal',
        'style'          => 'default',
        'label_placement'=> 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            'excerpt',
            'discussion',
            'comments',
            'revisions',
            'author',
            'format',
            'categories',
            'tags',
        ),
        'active'         => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_about_page_fields' );

/* ==========================================================================
   4. THEME OPTIONS SAYFASI (Site Ayarları) - ACF FREE UYUMLU
   ========================================================================== */

/**
 * Site Ayarları için gizli Custom Post Type oluştur (ACF Free uyumlu)
 */
function dataenergie_register_site_settings_cpt() {
    $args = array(
        'labels'              => array(
            'name'          => 'Site Ayarları',
            'singular_name' => 'Site Ayarı',
            'edit_item'     => 'Site Ayarlarını Düzenle',
        ),
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => false, // Admin menüsünde gizle, özel link ekleyeceğiz
        'query_var'           => false,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'supports'            => array( 'title' ),
        'menu_icon'           => 'dashicons-admin-settings',
    );
    register_post_type( 'site_settings', $args );
}
add_action( 'init', 'dataenergie_register_site_settings_cpt' );

/**
 * Site Ayarları postu yoksa oluştur
 */
function dataenergie_create_settings_post() {
    $settings_post = get_posts( array(
        'post_type'   => 'site_settings',
        'post_status' => 'publish',
        'numberposts' => 1,
    ) );

    if ( empty( $settings_post ) ) {
        wp_insert_post( array(
            'post_title'  => 'Site Ayarları',
            'post_type'   => 'site_settings',
            'post_status' => 'publish',
        ) );
    }
}
add_action( 'after_switch_theme', 'dataenergie_create_settings_post' );
add_action( 'admin_init', 'dataenergie_create_settings_post' );

/**
 * Site Ayarları Post ID'sini al
 */
function dataenergie_get_settings_post_id() {
    $settings_post = get_posts( array(
        'post_type'   => 'site_settings',
        'post_status' => 'publish',
        'numberposts' => 1,
    ) );

    return ! empty( $settings_post ) ? $settings_post[0]->ID : 0;
}

/**
 * Admin menüsüne Site Ayarları linki ekle
 */
function dataenergie_add_settings_menu() {
    $post_id = dataenergie_get_settings_post_id();
    if ( $post_id ) {
        add_menu_page(
            'Site Ayarları',
            'Site Ayarları',
            'edit_posts',
            'post.php?post=' . $post_id . '&action=edit',
            '',
            'dashicons-admin-settings',
            80
        );
    }
}
add_action( 'admin_menu', 'dataenergie_add_settings_menu' );

/**
 * Site Ayarları menü öğesini aktif göster
 */
function dataenergie_settings_menu_highlight( $parent_file ) {
    global $current_screen, $post;

    if ( isset( $current_screen->post_type ) && $current_screen->post_type === 'site_settings' ) {
        $post_id = dataenergie_get_settings_post_id();
        return 'post.php?post=' . $post_id . '&action=edit';
    }

    return $parent_file;
}
add_filter( 'parent_file', 'dataenergie_settings_menu_highlight' );

/**
 * Site Ayarları Alanlarını Tanımla
 */
function dataenergie_register_options_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_site_settings',
        'title'  => 'Genel Site Ayarları',
        'fields' => array(
            // İLETİŞİM BİLGİLERİ SEKMESİ
            array(
                'key'       => 'field_contact_tab',
                'label'     => 'İletişim Bilgileri',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'          => 'field_phone_number',
                'label'        => 'Telefon Numarası',
                'name'         => 'phone_number',
                'type'         => 'text',
                'instructions' => 'Şirket telefon numarası',
                'placeholder'  => '044 501 73 73',
                'maxlength'    => 30,
            ),
            array(
                'key'          => 'field_mobile_number',
                'label'        => 'Mobil Numarası',
                'name'         => 'mobile_number',
                'type'         => 'text',
                'instructions' => 'Şirket mobil numarası',
                'placeholder'  => '076 216 27 73',
                'maxlength'    => 30,
            ),
            array(
                'key'          => 'field_email_address',
                'label'        => 'E-posta Adresi',
                'name'         => 'email_address',
                'type'         => 'email',
                'instructions' => 'Şirket e-posta adresi',
                'placeholder'  => 'info@dataenergie.ch',
            ),
            array(
                'key'          => 'field_address_text',
                'label'        => 'Adres',
                'name'         => 'address_text',
                'type'         => 'textarea',
                'instructions' => 'Şirket adresi',
                'rows'         => 4,
                'placeholder'  => "Dataenergie GmbH\nGewerbestrasse 19\n6314 Unterägeri\nSchweiz",
            ),

            // SOSYAL MEDYA SEKMESİ
            array(
                'key'       => 'field_social_tab',
                'label'     => 'Sosyal Medya',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'          => 'field_facebook_url',
                'label'        => 'Facebook URL',
                'name'         => 'facebook_url',
                'type'         => 'url',
                'instructions' => 'Facebook sayfa linki',
                'placeholder'  => 'https://facebook.com/dataenergie',
            ),
            array(
                'key'          => 'field_linkedin_url',
                'label'        => 'LinkedIn URL',
                'name'         => 'linkedin_url',
                'type'         => 'url',
                'instructions' => 'LinkedIn şirket sayfası linki',
                'placeholder'  => 'https://linkedin.com/company/dataenergie',
            ),
            array(
                'key'          => 'field_instagram_url',
                'label'        => 'Instagram URL',
                'name'         => 'instagram_url',
                'type'         => 'url',
                'instructions' => 'Instagram profil linki',
                'placeholder'  => 'https://instagram.com/dataenergie',
            ),
            array(
                'key'          => 'field_twitter_url',
                'label'        => 'X (Twitter) URL',
                'name'         => 'twitter_url',
                'type'         => 'url',
                'instructions' => 'X (Twitter) profil linki',
                'placeholder'  => 'https://x.com/dataenergie',
            ),

            // FOOTER SEKMESİ
            array(
                'key'       => 'field_footer_tab',
                'label'     => 'Footer Ayarları',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_footer_logo_text',
                'label'         => 'Footer Logo Metni',
                'name'          => 'footer_logo_text',
                'type'          => 'text',
                'instructions'  => 'Footer logo metni (örn: Data)',
                'default_value' => 'Data',
                'placeholder'   => 'Data',
                'maxlength'     => 50,
            ),
            array(
                'key'           => 'field_footer_logo_accent',
                'label'         => 'Footer Logo Accent',
                'name'          => 'footer_logo_accent',
                'type'          => 'text',
                'instructions'  => 'Footer logo vurgulu kısmı (örn: energie)',
                'default_value' => 'energie',
                'placeholder'   => 'energie',
                'maxlength'     => 50,
            ),
            array(
                'key'           => 'field_footer_description',
                'label'         => 'Footer Açıklama',
                'name'          => 'footer_description',
                'type'          => 'textarea',
                'instructions'  => 'Footer altındaki şirket açıklaması',
                'default_value' => 'Ihr zuverlässiger Partner für professionelle IT-Dienstleistungen und nachhaltige Solar-Energielösungen. Wir verbinden technische Expertise mit umweltbewusstem Handeln für eine bessere Zukunft.',
                'rows'          => 4,
            ),
            array(
                'key'           => 'field_footer_copyright',
                'label'         => 'Copyright Metni',
                'name'          => 'footer_copyright',
                'type'          => 'text',
                'instructions'  => 'Footer copyright metni. {year} yazarsanız otomatik yıl eklenir.',
                'default_value' => '© {year} Dataenergie GmbH. Alle Rechte vorbehalten.',
                'placeholder'   => '© {year} Dataenergie GmbH. Alle Rechte vorbehalten.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'site_settings',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_options_fields' );

/* ==========================================================================
   5. YARDIMCI FONKSİYONLAR
   ========================================================================== */

/**
 * Site ayarlarından değer al (shorthand) - ACF Free uyumlu
 *
 * @param string $field_name Alan adı
 * @param mixed  $default    Varsayılan değer
 * @return mixed
 */
function dataenergie_get_option( $field_name, $default = '' ) {
    if ( ! function_exists( 'get_field' ) ) {
        return $default;
    }

    // Site Settings post ID'sini al
    $settings_post_id = dataenergie_get_settings_post_id();

    if ( ! $settings_post_id ) {
        return $default;
    }

    $value = get_field( $field_name, $settings_post_id );
    return $value ? $value : $default;
}

/**
 * Telefon numarasını temizle (href için)
 *
 * @param string $phone Telefon numarası
 * @return string
 */
function dataenergie_clean_phone( $phone ) {
    return preg_replace( '/[^0-9+]/', '', $phone );
}

/**
 * ACF yüklü değilse admin notice göster
 */
function dataenergie_acf_admin_notice() {
    if ( dataenergie_check_acf() ) {
        return;
    }

    $screen = get_current_screen();

    // Sadece belirli sayfalarda göster
    if ( ! in_array( $screen->id, array( 'dashboard', 'themes', 'plugins' ) ) ) {
        return;
    }
    ?>
    <div class="notice notice-warning is-dismissible">
        <p>
            <strong>Dataenergie Theme:</strong>
            Bu tema tam olarak çalışabilmesi için
            <a href="https://www.advancedcustomfields.com/" target="_blank" rel="noopener">Advanced Custom Fields</a>
            eklentisinin (Free veya Pro) yüklü ve aktif olmasını gerektirir.
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'dataenergie_acf_admin_notice' );

/**
 * Flush rewrite rules on theme activation
 */
function dataenergie_rewrite_flush() {
    dataenergie_register_project_cpt();
    dataenergie_register_project_taxonomy();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'dataenergie_rewrite_flush' );

/* ==========================================================================
   6. OTOMATİK SAYFA OLUŞTURMA
   ========================================================================== */

/**
 * Tema aktifleştiğinde gerekli sayfaları oluştur
 */
function dataenergie_create_default_pages() {
    // Sadece bir kez çalışsın
    if ( get_option( 'dataenergie_pages_created' ) ) {
        return;
    }

    // Oluşturulacak sayfalar
    $pages = array(
        array(
            'title'   => 'IT Services',
            'slug'    => 'it-services',
            'content' => '<!-- IT Services sayfası içeriği buraya eklenecek -->',
        ),
        array(
            'title'   => 'Solar Systems',
            'slug'    => 'solar-systems',
            'content' => '<!-- Solar Systems sayfası içeriği buraya eklenecek -->',
        ),
        array(
            'title'   => 'Kontakt',
            'slug'    => 'contact',
            'content' => '<!-- İletişim formu buraya eklenecek -->',
        ),
    );

    $created_pages = array();

    foreach ( $pages as $page_data ) {
        // Sayfa zaten var mı kontrol et
        $existing_page = get_page_by_path( $page_data['slug'] );

        if ( ! $existing_page ) {
            // Sayfayı oluştur
            $page_id = wp_insert_post( array(
                'post_title'   => $page_data['title'],
                'post_name'    => $page_data['slug'],
                'post_content' => $page_data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => 1,
            ) );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                $created_pages[] = $page_data['title'];
            }
        }
    }

    // Flag'i ayarla - bir daha çalışmasın
    update_option( 'dataenergie_pages_created', true );

    // Oluşturulan sayfaları kaydet (admin notice için)
    if ( ! empty( $created_pages ) ) {
        set_transient( 'dataenergie_pages_created_notice', $created_pages, 60 );
    }
}
add_action( 'after_switch_theme', 'dataenergie_create_default_pages' );

/**
 * Sayfa oluşturma bildirimi göster
 */
function dataenergie_pages_created_notice() {
    $created_pages = get_transient( 'dataenergie_pages_created_notice' );

    if ( $created_pages ) {
        $page_list = implode( ', ', $created_pages );
        ?>
        <div class="notice notice-success is-dismissible">
            <p>
                <strong>Dataenergie Theme:</strong>
                Şu sayfalar otomatik oluşturuldu: <strong><?php echo esc_html( $page_list ); ?></strong>
            </p>
        </div>
        <?php
        delete_transient( 'dataenergie_pages_created_notice' );
    }
}
add_action( 'admin_notices', 'dataenergie_pages_created_notice' );

/* ==========================================================================
   7. LEGAL PAGES ACF FIELDS (Datenschutz & Impressum)
   ACF Free Uyumlu - Repeater/Gallery/Options Page yok
   ========================================================================== */

/**
 * Impressum (Legal Notice) Sayfa Alanlarını Tanımla
 * ACF Free uyumlu - Tüm şirket bilgileri için sabit alanlar
 */
function dataenergie_register_impressum_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_impressum_page',
        'title'  => 'Impressum - Şirket Bilgileri',
        'fields' => array(
            // =========================================
            // SEKME 1: ŞİRKET BİLGİLERİ
            // =========================================
            array(
                'key'       => 'field_impressum_company_tab',
                'label'     => 'Unternehmen',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_impressum_company_name',
                'label'         => 'Firmenname',
                'name'          => 'company_name',
                'type'          => 'text',
                'instructions'  => 'Tam şirket adı (örn: Dataenergie GmbH)',
                'placeholder'   => 'Dataenergie GmbH',
                'maxlength'     => 100,
                'default_value' => 'Dataenergie GmbH',
            ),
            array(
                'key'           => 'field_impressum_company_address',
                'label'         => 'Strasse und Hausnummer',
                'name'          => 'company_address',
                'type'          => 'text',
                'instructions'  => 'Sokak adresi ve bina numarası',
                'placeholder'   => 'Musterstrasse 123',
                'maxlength'     => 150,
                'default_value' => 'Musterstrasse 123',
            ),
            array(
                'key'           => 'field_impressum_company_city',
                'label'         => 'PLZ und Stadt',
                'name'          => 'company_city',
                'type'          => 'text',
                'instructions'  => 'Posta kodu ve şehir',
                'placeholder'   => '12345 Musterstadt',
                'maxlength'     => 100,
                'default_value' => '12345 Musterstadt',
            ),
            array(
                'key'           => 'field_impressum_company_country',
                'label'         => 'Land',
                'name'          => 'company_country',
                'type'          => 'text',
                'instructions'  => 'Ülke',
                'placeholder'   => 'Deutschland',
                'maxlength'     => 50,
                'default_value' => 'Deutschland',
            ),

            // =========================================
            // SEKME 2: İLETİŞİM
            // =========================================
            array(
                'key'       => 'field_impressum_contact_tab',
                'label'     => 'Kontakt',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_impressum_phone',
                'label'         => 'Telefon',
                'name'          => 'company_phone',
                'type'          => 'text',
                'instructions'  => 'Telefon numarası (uluslararası formatta)',
                'placeholder'   => '+49 123 456789',
                'maxlength'     => 30,
                'default_value' => '+49 123 456789',
            ),
            array(
                'key'           => 'field_impressum_fax',
                'label'         => 'Telefax',
                'name'          => 'company_fax',
                'type'          => 'text',
                'instructions'  => 'Faks numarası (opsiyonel)',
                'placeholder'   => '+49 123 456780',
                'maxlength'     => 30,
            ),
            array(
                'key'           => 'field_impressum_email',
                'label'         => 'E-Mail',
                'name'          => 'company_email',
                'type'          => 'email',
                'instructions'  => 'Genel iletişim e-posta adresi',
                'placeholder'   => 'info@dataenergie.de',
                'default_value' => 'info@dataenergie.de',
            ),
            array(
                'key'           => 'field_impressum_privacy_email',
                'label'         => 'Datenschutz E-Mail',
                'name'          => 'privacy_email',
                'type'          => 'email',
                'instructions'  => 'Gizlilik/GDPR için özel e-posta (opsiyonel)',
                'placeholder'   => 'datenschutz@dataenergie.de',
            ),

            // =========================================
            // SEKME 3: YÖNETİM / KAYIT
            // =========================================
            array(
                'key'       => 'field_impressum_legal_tab',
                'label'     => 'Rechtliches',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_impressum_ceo',
                'label'         => 'Geschäftsführer',
                'name'          => 'ceo_name',
                'type'          => 'text',
                'instructions'  => 'Yetkili temsilci / Şirket müdürü adı',
                'placeholder'   => 'Max Mustermann',
                'maxlength'     => 100,
                'default_value' => 'Max Mustermann',
            ),
            array(
                'key'           => 'field_impressum_register_court',
                'label'         => 'Registergericht',
                'name'          => 'register_court',
                'type'          => 'text',
                'instructions'  => 'Sicil mahkemesi',
                'placeholder'   => 'Amtsgericht Musterstadt',
                'maxlength'     => 100,
                'default_value' => 'Amtsgericht Musterstadt',
            ),
            array(
                'key'           => 'field_impressum_register_number',
                'label'         => 'Registernummer',
                'name'          => 'register_number',
                'type'          => 'text',
                'instructions'  => 'Ticaret sicil numarası (HRB/HRA)',
                'placeholder'   => 'HRB 12345',
                'maxlength'     => 50,
                'default_value' => 'HRB 12345',
            ),
            array(
                'key'           => 'field_impressum_vat_id',
                'label'         => 'Umsatzsteuer-ID',
                'name'          => 'vat_id',
                'type'          => 'text',
                'instructions'  => 'KDV kimlik numarası (§ 27a UStG)',
                'placeholder'   => 'DE123456789',
                'maxlength'     => 20,
                'default_value' => 'DE123456789',
            ),
            array(
                'key'           => 'field_impressum_responsible',
                'label'         => 'Inhaltlich Verantwortlicher',
                'name'          => 'responsible_content',
                'type'          => 'text',
                'instructions'  => 'İçerikten sorumlu kişi (§ 55 Abs. 2 RStV)',
                'placeholder'   => 'Max Mustermann',
                'maxlength'     => 100,
                'default_value' => 'Max Mustermann',
            ),

            // =========================================
            // SEKME 4: EK BİLGİLER
            // =========================================
            array(
                'key'       => 'field_impressum_extra_tab',
                'label'     => 'Zusätzlich',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'          => 'field_impressum_professional_title',
                'label'        => 'Berufsbezeichnung',
                'name'         => 'professional_title',
                'type'         => 'text',
                'instructions' => 'Meslek unvanı (opsiyonel, reglementé meslekler için)',
                'placeholder'  => 'Ingenieur, Rechtsanwalt vb.',
                'maxlength'    => 100,
            ),
            array(
                'key'          => 'field_impressum_chamber',
                'label'        => 'Kammer',
                'name'         => 'chamber_name',
                'type'         => 'text',
                'instructions' => 'Meslek odası (opsiyonel)',
                'placeholder'  => 'IHK Musterstadt',
                'maxlength'    => 100,
            ),
            array(
                'key'          => 'field_impressum_website',
                'label'        => 'Website URL',
                'name'         => 'website_url',
                'type'         => 'url',
                'instructions' => 'Ana web sitesi URL',
                'placeholder'  => 'https://www.dataenergie.de',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-impressum.php',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => array(
            0 => 'excerpt',
            1 => 'discussion',
            2 => 'comments',
            3 => 'revisions',
            4 => 'author',
            5 => 'format',
            6 => 'categories',
            7 => 'tags',
            8 => 'send-trackbacks',
        ),
        'active'       => true,
        'show_in_rest' => false,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_impressum_fields' );

/**
 * Datenschutz (Privacy Policy) Sayfa Alanlarını Tanımla
 * ACF Free uyumlu
 */
function dataenergie_register_datenschutz_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_datenschutz_page',
        'title'  => 'Datenschutz - Ayarlar',
        'fields' => array(
            // =========================================
            // SEKME 1: GENEL
            // =========================================
            array(
                'key'       => 'field_datenschutz_general_tab',
                'label'     => 'Allgemein',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'            => 'field_datenschutz_last_updated',
                'label'          => 'Zuletzt aktualisiert',
                'name'           => 'datenschutz_last_updated',
                'type'           => 'date_picker',
                'instructions'   => 'Bu gizlilik politikasının son güncellenme tarihi',
                'display_format' => 'd.m.Y',
                'return_format'  => 'd.m.Y',
                'first_day'      => 1,
            ),
            array(
                'key'           => 'field_datenschutz_intro',
                'label'         => 'Einleitung',
                'name'          => 'datenschutz_intro',
                'type'          => 'textarea',
                'instructions'  => 'Gizlilik politikası giriş metni (opsiyonel - varsayılan metin kullanılır)',
                'rows'          => 4,
                'placeholder'   => 'Wir nehmen den Schutz Ihrer persönlichen Daten sehr ernst...',
            ),

            // =========================================
            // SEKME 2: VERİ SORUMLUSU
            // =========================================
            array(
                'key'       => 'field_datenschutz_controller_tab',
                'label'     => 'Verantwortlicher',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'     => 'field_datenschutz_note',
                'label'   => 'Bilgi',
                'name'    => '',
                'type'    => 'message',
                'message' => '<div style="background:#f0f6fc;border:1px solid #0366d6;border-radius:4px;padding:12px;"><strong>Not:</strong> Bu alanları boş bırakırsanız, Impressum sayfasındaki şirket bilgileri otomatik olarak kullanılır.</div>',
            ),
            array(
                'key'          => 'field_datenschutz_dpo_name',
                'label'        => 'Datenschutzbeauftragter Name',
                'name'         => 'dpo_name',
                'type'         => 'text',
                'instructions' => 'Veri koruma görevlisi adı (opsiyonel)',
                'placeholder'  => 'Max Mustermann',
                'maxlength'    => 100,
            ),
            array(
                'key'          => 'field_datenschutz_dpo_email',
                'label'        => 'Datenschutzbeauftragter E-Mail',
                'name'         => 'dpo_email',
                'type'         => 'email',
                'instructions' => 'Veri koruma görevlisi e-posta adresi',
                'placeholder'  => 'datenschutz@dataenergie.de',
            ),
            array(
                'key'          => 'field_datenschutz_dpo_phone',
                'label'        => 'Datenschutzbeauftragter Telefon',
                'name'         => 'dpo_phone',
                'type'         => 'text',
                'instructions' => 'Veri koruma görevlisi telefon numarası',
                'placeholder'  => '+49 123 456789',
                'maxlength'    => 30,
            ),

            // =========================================
            // SEKME 3: COOKIES
            // =========================================
            array(
                'key'       => 'field_datenschutz_cookies_tab',
                'label'     => 'Cookies',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_datenschutz_cookies_enabled',
                'label'         => 'Cookie-Nutzung',
                'name'          => 'cookies_enabled',
                'type'          => 'true_false',
                'instructions'  => 'Bu sitede cookie kullanılıyor mu?',
                'default_value' => 1,
                'ui'            => 1,
                'ui_on_text'    => 'Ja',
                'ui_off_text'   => 'Nein',
            ),
            array(
                'key'          => 'field_datenschutz_cookies_text',
                'label'        => 'Cookie-Hinweis Text',
                'name'         => 'cookies_text',
                'type'         => 'textarea',
                'instructions' => 'Cookie açıklaması için ek metin (opsiyonel)',
                'rows'         => 4,
            ),

            // =========================================
            // SEKME 4: ANALİTİK
            // =========================================
            array(
                'key'       => 'field_datenschutz_analytics_tab',
                'label'     => 'Analyse-Tools',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_datenschutz_ga_enabled',
                'label'         => 'Google Analytics',
                'name'          => 'ga_enabled',
                'type'          => 'true_false',
                'instructions'  => 'Google Analytics kullanılıyor mu?',
                'default_value' => 0,
                'ui'            => 1,
                'ui_on_text'    => 'Ja',
                'ui_off_text'   => 'Nein',
            ),
            array(
                'key'           => 'field_datenschutz_ga_anonymize',
                'label'         => 'IP-Anonymisierung',
                'name'          => 'ga_anonymize',
                'type'          => 'true_false',
                'instructions'  => 'IP anonymizasyonu aktif mi?',
                'default_value' => 1,
                'ui'            => 1,
                'ui_on_text'    => 'Ja',
                'ui_off_text'   => 'Nein',
            ),
            array(
                'key'          => 'field_datenschutz_other_tools',
                'label'        => 'Weitere Tools',
                'name'         => 'other_analytics_tools',
                'type'         => 'textarea',
                'instructions' => 'Diğer analitik araçları (her satıra bir tane)',
                'rows'         => 4,
                'placeholder'  => "Matomo\nHotjar\nMicrosoft Clarity",
            ),

            // =========================================
            // SEKME 5: HOSTING
            // =========================================
            array(
                'key'       => 'field_datenschutz_hosting_tab',
                'label'     => 'Hosting',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'          => 'field_datenschutz_hoster_name',
                'label'        => 'Hosting-Anbieter',
                'name'         => 'hoster_name',
                'type'         => 'text',
                'instructions' => 'Hosting sağlayıcının adı',
                'placeholder'  => 'Hetzner Online GmbH',
                'maxlength'    => 100,
            ),
            array(
                'key'          => 'field_datenschutz_hoster_address',
                'label'        => 'Hosting-Anbieter Adresse',
                'name'         => 'hoster_address',
                'type'         => 'textarea',
                'instructions' => 'Hosting sağlayıcının adresi',
                'rows'         => 3,
                'placeholder'  => "Industriestr. 25\n91710 Gunzenhausen\nDeutschland",
            ),
            array(
                'key'          => 'field_datenschutz_hoster_url',
                'label'        => 'Hosting-Anbieter Website',
                'name'         => 'hoster_url',
                'type'         => 'url',
                'instructions' => 'Hosting sağlayıcının web sitesi',
                'placeholder'  => 'https://www.hetzner.de',
            ),
            array(
                'key'          => 'field_datenschutz_server_location',
                'label'        => 'Server-Standort',
                'name'         => 'server_location',
                'type'         => 'select',
                'instructions' => 'Sunucu konumu',
                'choices'      => array(
                    'eu'      => 'Europäische Union',
                    'de'      => 'Deutschland',
                    'ch'      => 'Schweiz',
                    'usa'     => 'USA',
                    'other'   => 'Sonstige',
                ),
                'default_value' => 'eu',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-datenschutz.php',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => array(
            0 => 'excerpt',
            1 => 'discussion',
            2 => 'comments',
            3 => 'revisions',
            4 => 'author',
            5 => 'format',
            6 => 'categories',
            7 => 'tags',
            8 => 'send-trackbacks',
        ),
        'active'       => true,
        'show_in_rest' => false,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_datenschutz_fields' );

/* ==========================================================================
   8. IT SAYFALARI ACF ALANLARI (ACF Free Uyumlu)
   ========================================================================== */

/**
 * Ortak ikon seçenekleri (IT ve Solar sayfaları için)
 */
function dataenergie_get_icon_choices() {
    return array(
        'cloud'      => 'Cloud',
        'shield'     => 'Shield',
        'headphones' => 'Headphones',
        'server'     => 'Server',
        'database'   => 'Database',
        'lock'       => 'Lock',
        'wifi'       => 'WiFi',
        'monitor'    => 'Monitor',
        'settings'   => 'Settings',
        'refresh'    => 'Refresh',
        'refresh-cw' => 'Refresh CW',
        'activity'   => 'Activity',
        'phone'      => 'Phone',
        'tool'       => 'Tool',
        'check'      => 'Check Circle',
        'clock'      => 'Clock',
        'clipboard'  => 'Clipboard',
        'search'     => 'Search',
        'file'       => 'File Text',
        'target'     => 'Target',
        'zap'        => 'Zap (Lightning)',
        'sun'        => 'Sun',
        'battery'    => 'Battery',
        'home'       => 'Home',
        'aperture'   => 'Aperture',
        'sparkles'   => 'Sparkles',
    );
}

/**
 * IT Services sayfası ACF alanları
 * ACF Free uyumlu - 3 hizmet kartı için sabit alanlar
 */
function dataenergie_register_it_services_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_it_services',
        'title'  => 'IT Services - Sayfa İçerikleri',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array(
                'key'       => 'field_it_hero_tab',
                'label'     => 'Hero',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_it_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 'it_hero_tag',
                'type'          => 'text',
                'maxlength'     => 50,
                'default_value' => 'IT Solutions',
            ),
            array(
                'key'           => 'field_it_hero_subtitle',
                'label'         => 'Hero Alt Başlık',
                'name'          => 'it_hero_subtitle',
                'type'          => 'text',
                'maxlength'     => 200,
                'default_value' => 'Professionelle IT-Infrastruktur für Ihr Unternehmen',
            ),

            // =========================================
            // SEKME 2: HİZMET 1
            // =========================================
            array(
                'key'       => 'field_it_service1_tab',
                'label'     => 'Hizmet 1',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_it_service_1_icon',
                'label'         => 'İkon',
                'name'          => 'it_service_1_icon',
                'type'          => 'select',
                'choices'       => $icon_choices,
                'default_value' => 'cloud',
                'wrapper'       => array( 'width' => '30' ),
            ),
            array(
                'key'           => 'field_it_service_1_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_1_title',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Microsoft 365 & Cloud',
                'wrapper'       => array( 'width' => '70' ),
            ),
            array(
                'key'           => 'field_it_service_1_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_1_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Wir unterstützen Sie bei der Migration in die Cloud. Mit Microsoft 365, Exchange Online und Teams optimieren wir Ihre Zusammenarbeit.',
            ),
            array(
                'key'           => 'field_it_service_1_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_1_feature_1',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Exchange Online & Outlook',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_1_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_1_feature_2',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Teams & SharePoint',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_1_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_1_feature_3',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'OneDrive for Business',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_1_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_1_feature_4',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Sichere Cloud-Migration',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // =========================================
            // SEKME 3: HİZMET 2
            // =========================================
            array(
                'key'       => 'field_it_service2_tab',
                'label'     => 'Hizmet 2',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_it_service_2_icon',
                'label'         => 'İkon',
                'name'          => 'it_service_2_icon',
                'type'          => 'select',
                'choices'       => $icon_choices,
                'default_value' => 'shield',
                'wrapper'       => array( 'width' => '30' ),
            ),
            array(
                'key'           => 'field_it_service_2_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_2_title',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Netzwerk & Sicherheit',
                'wrapper'       => array( 'width' => '70' ),
            ),
            array(
                'key'           => 'field_it_service_2_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_2_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Eine stabile und sichere Netzwerkinfrastruktur ist das Rückgrat Ihres Unternehmens. Wir planen und realisieren Ihre IT-Sicherheit.',
            ),
            array(
                'key'           => 'field_it_service_2_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_2_feature_1',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Firewall & VPN Lösungen',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_2_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_2_feature_2',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'WLAN & LAN Infrastruktur',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_2_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_2_feature_3',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Endpoint Protection',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_2_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_2_feature_4',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Backup & Disaster Recovery',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // =========================================
            // SEKME 4: HİZMET 3
            // =========================================
            array(
                'key'       => 'field_it_service3_tab',
                'label'     => 'Hizmet 3',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_it_service_3_icon',
                'label'         => 'İkon',
                'name'          => 'it_service_3_icon',
                'type'          => 'select',
                'choices'       => $icon_choices,
                'default_value' => 'headphones',
                'wrapper'       => array( 'width' => '30' ),
            ),
            array(
                'key'           => 'field_it_service_3_title',
                'label'         => 'Başlık',
                'name'          => 'it_service_3_title',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'IT Support & Wartung',
                'wrapper'       => array( 'width' => '70' ),
            ),
            array(
                'key'           => 'field_it_service_3_description',
                'label'         => 'Açıklama',
                'name'          => 'it_service_3_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Unser Support-Team steht Ihnen bei technischen Problemen zur Seite. Wir bieten schnelle Hilfe per Fernwartung oder vor Ort.',
            ),
            array(
                'key'           => 'field_it_service_3_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'it_service_3_feature_1',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Helpdesk & User Support',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_3_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'it_service_3_feature_2',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Systemwartung & Updates',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_3_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'it_service_3_feature_3',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'Hardware Beschaffung & Installation',
                'wrapper'       => array( 'width' => '50' ),
            ),
            array(
                'key'           => 'field_it_service_3_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'it_service_3_feature_4',
                'type'          => 'text',
                'maxlength'     => 100,
                'default_value' => 'IT-Consulting',
                'wrapper'       => array( 'width' => '50' ),
            ),

            // =========================================
            // SEKME 5: CTA
            // =========================================
            array(
                'key'       => 'field_it_cta_tab',
                'label'     => 'CTA',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_it_cta_title',
                'label'         => 'CTA Başlık',
                'name'          => 'it_cta_title',
                'type'          => 'text',
                'maxlength'     => 150,
                'default_value' => 'Haben Sie Fragen zu unseren IT-Dienstleistungen?',
            ),
            array(
                'key'           => 'field_it_cta_description',
                'label'         => 'CTA Açıklama',
                'name'          => 'it_cta_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Wir beraten Sie gerne unverbindlich zu Ihren individuellen Anforderungen.',
            ),
            array(
                'key'           => 'field_it_cta_button_text',
                'label'         => 'Buton Metni',
                'name'          => 'it_cta_button_text',
                'type'          => 'text',
                'maxlength'     => 50,
                'default_value' => 'Kontakt aufnehmen',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-it-services.php',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active'                => true,
        'show_in_rest'          => false,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_it_services_fields' );

/**
 * Cloud Solutions sayfası ACF alanları
 * ACF Free uyumlu - 3 hizmet kartı için sabit alanlar
 */
function dataenergie_register_cloud_solutions_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_cloud_solutions',
        'title'  => 'Cloud Solutions - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array(
                'key'       => 'field_cloud_hero_tab',
                'label'     => 'Hero',
                'type'      => 'tab',
                'placement' => 'left',
            ),
            array(
                'key'           => 'field_cloud_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 'cloud_hero_tag',
                'type'          => 'text',
                'default_value' => 'Cloud Lösungen',
            ),
            array(
                'key'           => 'field_cloud_hero_subtitle',
                'label'         => 'Hero Alt Başlık',
                'name'          => 'cloud_hero_subtitle',
                'type'          => 'text',
                'default_value' => 'Moderne Cloud-Infrastruktur für Ihr Unternehmen',
            ),

            // HİZMET 1
            array( 'key' => 'field_cloud_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cloud_service_1_icon', 'label' => 'İkon', 'name' => 'cloud_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'cloud', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_cloud_service_1_title', 'label' => 'Başlık', 'name' => 'cloud_service_1_title', 'type' => 'text', 'default_value' => 'Microsoft 365', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_cloud_service_1_description', 'label' => 'Açıklama', 'name' => 'cloud_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Die komplette Office-Suite aus der Cloud. E-Mail, Kalender, Dokumentenverwaltung und Teamarbeit – alles in einer Plattform.' ),
            array( 'key' => 'field_cloud_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'cloud_service_1_feature_1', 'type' => 'text', 'default_value' => 'Exchange Online', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'cloud_service_1_feature_2', 'type' => 'text', 'default_value' => 'SharePoint & OneDrive', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'cloud_service_1_feature_3', 'type' => 'text', 'default_value' => 'Microsoft Teams', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'cloud_service_1_feature_4', 'type' => 'text', 'default_value' => 'Office Apps (Word, Excel, PowerPoint)', 'wrapper' => array( 'width' => '50' ) ),

            // HİZMET 2
            array( 'key' => 'field_cloud_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cloud_service_2_icon', 'label' => 'İkon', 'name' => 'cloud_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'server', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_cloud_service_2_title', 'label' => 'Başlık', 'name' => 'cloud_service_2_title', 'type' => 'text', 'default_value' => 'Microsoft Azure', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_cloud_service_2_description', 'label' => 'Açıklama', 'name' => 'cloud_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Skalierbare Cloud-Infrastruktur für anspruchsvolle Unternehmensanwendungen. Von virtuellen Servern bis hin zu KI-Diensten.' ),
            array( 'key' => 'field_cloud_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'cloud_service_2_feature_1', 'type' => 'text', 'default_value' => 'Virtual Machines', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'cloud_service_2_feature_2', 'type' => 'text', 'default_value' => 'Azure Active Directory', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'cloud_service_2_feature_3', 'type' => 'text', 'default_value' => 'Backup & Recovery', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'cloud_service_2_feature_4', 'type' => 'text', 'default_value' => 'Hybride Cloud-Lösungen', 'wrapper' => array( 'width' => '50' ) ),

            // HİZMET 3
            array( 'key' => 'field_cloud_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cloud_service_3_icon', 'label' => 'İkon', 'name' => 'cloud_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'refresh', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_cloud_service_3_title', 'label' => 'Başlık', 'name' => 'cloud_service_3_title', 'type' => 'text', 'default_value' => 'Cloud-Migration', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_cloud_service_3_description', 'label' => 'Açıklama', 'name' => 'cloud_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Wir begleiten Sie bei der sicheren Migration Ihrer bestehenden Systeme in die Cloud. Schritt für Schritt, ohne Betriebsunterbrechung.' ),
            array( 'key' => 'field_cloud_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'cloud_service_3_feature_1', 'type' => 'text', 'default_value' => 'Analyse & Planung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'cloud_service_3_feature_2', 'type' => 'text', 'default_value' => 'Datenmigration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'cloud_service_3_feature_3', 'type' => 'text', 'default_value' => 'Schulung & Support', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cloud_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'cloud_service_3_feature_4', 'type' => 'text', 'default_value' => 'Laufende Optimierung', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_cloud_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cloud_cta_title', 'label' => 'CTA Başlık', 'name' => 'cloud_cta_title', 'type' => 'text', 'default_value' => 'Bereit für die Cloud?' ),
            array( 'key' => 'field_cloud_cta_description', 'label' => 'CTA Açıklama', 'name' => 'cloud_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Kontaktieren Sie uns für eine unverbindliche Beratung zu Ihren Cloud-Möglichkeiten.' ),
            array( 'key' => 'field_cloud_cta_button_text', 'label' => 'Buton Metni', 'name' => 'cloud_cta_button_text', 'type' => 'text', 'default_value' => 'Beratung anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-cloud-solutions.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_cloud_solutions_fields' );

/**
 * IT Infrastructure sayfası ACF alanları
 */
function dataenergie_register_it_infrastructure_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_it_infrastructure',
        'title'  => 'IT Infrastructure - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_infra_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_infra_hero_tag', 'label' => 'Hero Tag', 'name' => 'infra_hero_tag', 'type' => 'text', 'default_value' => 'IT Infrastruktur' ),
            array( 'key' => 'field_infra_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'infra_hero_subtitle', 'type' => 'text', 'default_value' => 'Zuverlässige IT-Infrastruktur für Ihr Unternehmen' ),

            // HİZMET 1
            array( 'key' => 'field_infra_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_infra_service_1_icon', 'label' => 'İkon', 'name' => 'infra_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'server', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_infra_service_1_title', 'label' => 'Başlık', 'name' => 'infra_service_1_title', 'type' => 'text', 'default_value' => 'Server & Virtualisierung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_infra_service_1_description', 'label' => 'Açıklama', 'name' => 'infra_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Moderne Server-Lösungen für maximale Leistung und Verfügbarkeit. Von der Planung bis zur Wartung.' ),
            array( 'key' => 'field_infra_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'infra_service_1_feature_1', 'type' => 'text', 'default_value' => 'Windows & Linux Server', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'infra_service_1_feature_2', 'type' => 'text', 'default_value' => 'VMware & Hyper-V', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'infra_service_1_feature_3', 'type' => 'text', 'default_value' => 'Hochverfügbarkeit', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'infra_service_1_feature_4', 'type' => 'text', 'default_value' => 'Performance Monitoring', 'wrapper' => array( 'width' => '50' ) ),

            // HİZMET 2
            array( 'key' => 'field_infra_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_infra_service_2_icon', 'label' => 'İkon', 'name' => 'infra_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'wifi', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_infra_service_2_title', 'label' => 'Başlık', 'name' => 'infra_service_2_title', 'type' => 'text', 'default_value' => 'Netzwerk Infrastruktur', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_infra_service_2_description', 'label' => 'Açıklama', 'name' => 'infra_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Schnelle und sichere Netzwerke für reibungslose Kommunikation im Unternehmen.' ),
            array( 'key' => 'field_infra_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'infra_service_2_feature_1', 'type' => 'text', 'default_value' => 'Strukturierte Verkabelung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'infra_service_2_feature_2', 'type' => 'text', 'default_value' => 'WLAN Planung & Ausbau', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'infra_service_2_feature_3', 'type' => 'text', 'default_value' => 'Switches & Router', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'infra_service_2_feature_4', 'type' => 'text', 'default_value' => 'VPN & Remote Access', 'wrapper' => array( 'width' => '50' ) ),

            // HİZMET 3
            array( 'key' => 'field_infra_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_infra_service_3_icon', 'label' => 'İkon', 'name' => 'infra_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'database', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_infra_service_3_title', 'label' => 'Başlık', 'name' => 'infra_service_3_title', 'type' => 'text', 'default_value' => 'Storage & Datensicherung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_infra_service_3_description', 'label' => 'Açıklama', 'name' => 'infra_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Sichere Speicherlösungen für Ihre wertvollen Unternehmensdaten.' ),
            array( 'key' => 'field_infra_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'infra_service_3_feature_1', 'type' => 'text', 'default_value' => 'NAS & SAN Systeme', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'infra_service_3_feature_2', 'type' => 'text', 'default_value' => 'Backup Lösungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'infra_service_3_feature_3', 'type' => 'text', 'default_value' => 'Disaster Recovery', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_infra_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'infra_service_3_feature_4', 'type' => 'text', 'default_value' => 'Datenverschlüsselung', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_infra_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_infra_cta_title', 'label' => 'CTA Başlık', 'name' => 'infra_cta_title', 'type' => 'text', 'default_value' => 'Infrastruktur-Check gewünscht?' ),
            array( 'key' => 'field_infra_cta_description', 'label' => 'CTA Açıklama', 'name' => 'infra_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir analysieren Ihre bestehende IT-Infrastruktur und zeigen Optimierungspotenziale auf.' ),
            array( 'key' => 'field_infra_cta_button_text', 'label' => 'Buton Metni', 'name' => 'infra_cta_button_text', 'type' => 'text', 'default_value' => 'Analyse anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-it-infrastructure.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_it_infrastructure_fields' );

/**
 * Cybersecurity sayfası ACF alanları
 * ACF Free uyumlu - 4 hizmet kartı için sabit alanlar
 */
function dataenergie_register_cybersecurity_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_cybersecurity',
        'title'  => 'Cybersecurity - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_cyber_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cyber_hero_tag', 'label' => 'Hero Tag', 'name' => 'cyber_hero_tag', 'type' => 'text', 'default_value' => 'Cybersecurity' ),
            array( 'key' => 'field_cyber_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'cyber_hero_subtitle', 'type' => 'text', 'default_value' => 'Umfassender Schutz für Ihre digitalen Assets' ),

            // HİZMET 1
            array( 'key' => 'field_cyber_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cyber_service_1_icon', 'label' => 'İkon', 'name' => 'cyber_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'shield', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_cyber_service_1_title', 'label' => 'Başlık', 'name' => 'cyber_service_1_title', 'type' => 'text', 'default_value' => 'Endpoint Security', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_cyber_service_1_description', 'label' => 'Açıklama', 'name' => 'cyber_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Schützen Sie alle Endgeräte in Ihrem Unternehmen vor Malware und Cyberangriffen.' ),
            array( 'key' => 'field_cyber_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'cyber_service_1_feature_1', 'type' => 'text', 'default_value' => 'Antivirus & Anti-Malware', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'cyber_service_1_feature_2', 'type' => 'text', 'default_value' => 'EDR (Endpoint Detection)', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'cyber_service_1_feature_3', 'type' => 'text', 'default_value' => 'Patch Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'cyber_service_1_feature_4', 'type' => 'text', 'default_value' => 'Mobile Device Management', 'wrapper' => array( 'width' => '50' ) ),

            // HİZMET 2
            array( 'key' => 'field_cyber_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cyber_service_2_icon', 'label' => 'İkon', 'name' => 'cyber_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'lock', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_cyber_service_2_title', 'label' => 'Başlık', 'name' => 'cyber_service_2_title', 'type' => 'text', 'default_value' => 'Netzwerksicherheit', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_cyber_service_2_description', 'label' => 'Açıklama', 'name' => 'cyber_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Sichere Netzwerkarchitektur und Überwachung zum Schutz vor externen Bedrohungen.' ),
            array( 'key' => 'field_cyber_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'cyber_service_2_feature_1', 'type' => 'text', 'default_value' => 'Next-Gen Firewalls', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'cyber_service_2_feature_2', 'type' => 'text', 'default_value' => 'Intrusion Detection', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'cyber_service_2_feature_3', 'type' => 'text', 'default_value' => 'Network Segmentation', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'cyber_service_2_feature_4', 'type' => 'text', 'default_value' => 'Zero Trust Architecture', 'wrapper' => array( 'width' => '50' ) ),

            // HİZMET 3
            array( 'key' => 'field_cyber_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cyber_service_3_icon', 'label' => 'İkon', 'name' => 'cyber_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'activity', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_cyber_service_3_title', 'label' => 'Başlık', 'name' => 'cyber_service_3_title', 'type' => 'text', 'default_value' => 'Security Monitoring', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_cyber_service_3_description', 'label' => 'Açıklama', 'name' => 'cyber_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Kontinuierliche Überwachung Ihrer IT-Systeme für schnelle Reaktion auf Bedrohungen.' ),
            array( 'key' => 'field_cyber_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'cyber_service_3_feature_1', 'type' => 'text', 'default_value' => 'SIEM Integration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'cyber_service_3_feature_2', 'type' => 'text', 'default_value' => '24/7 Überwachung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'cyber_service_3_feature_3', 'type' => 'text', 'default_value' => 'Incident Response', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'cyber_service_3_feature_4', 'type' => 'text', 'default_value' => 'Threat Intelligence', 'wrapper' => array( 'width' => '50' ) ),

            // HİZMET 4
            array( 'key' => 'field_cyber_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cyber_service_4_icon', 'label' => 'İkon', 'name' => 'cyber_service_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'clipboard', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_cyber_service_4_title', 'label' => 'Başlık', 'name' => 'cyber_service_4_title', 'type' => 'text', 'default_value' => 'Security Awareness', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_cyber_service_4_description', 'label' => 'Açıklama', 'name' => 'cyber_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Schulung und Sensibilisierung Ihrer Mitarbeiter für Cybersicherheit.' ),
            array( 'key' => 'field_cyber_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'cyber_service_4_feature_1', 'type' => 'text', 'default_value' => 'Phishing Simulationen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'cyber_service_4_feature_2', 'type' => 'text', 'default_value' => 'Security Trainings', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'cyber_service_4_feature_3', 'type' => 'text', 'default_value' => 'Policy Development', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_cyber_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'cyber_service_4_feature_4', 'type' => 'text', 'default_value' => 'Compliance Beratung', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_cyber_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_cyber_cta_title', 'label' => 'CTA Başlık', 'name' => 'cyber_cta_title', 'type' => 'text', 'default_value' => 'Sicherheitscheck für Ihr Unternehmen?' ),
            array( 'key' => 'field_cyber_cta_description', 'label' => 'CTA Açıklama', 'name' => 'cyber_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir analysieren Ihre Sicherheitslage und identifizieren Schwachstellen.' ),
            array( 'key' => 'field_cyber_cta_button_text', 'label' => 'Buton Metni', 'name' => 'cyber_cta_button_text', 'type' => 'text', 'default_value' => 'Sicherheitscheck anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-cybersecurity.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_cybersecurity_fields' );

/**
 * Legal sayfalar için yardımcı fonksiyon
 * Impressum ve Datenschutz sayfaları arasında veri paylaşımı
 *
 * @param string $field_name Alan adı
 * @param mixed  $default    Varsayılan değer
 * @return mixed
 */
function dataenergie_get_company_info( $field_name, $default = '' ) {
    if ( ! function_exists( 'get_field' ) ) {
        return $default;
    }

    // Önce mevcut sayfadan al
    $value = get_field( $field_name );
    if ( ! empty( $value ) ) {
        return $value;
    }

    // Impressum sayfasından al
    $impressum_page = get_page_by_path( 'impressum' );
    if ( $impressum_page ) {
        $value = get_field( $field_name, $impressum_page->ID );
        if ( ! empty( $value ) ) {
            return $value;
        }
    }

    return $default;
}

/* ==========================================================================
   9. SOLAR SAYFALARI ACF ALANLARI (ACF Free Uyumlu)
   ========================================================================== */

/**
 * Solar Beratung sayfası ACF alanları
 * ACF Free uyumlu - Beratung ve process steps için sabit alanlar
 */
function dataenergie_register_solar_beratung_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_solar_beratung',
        'title'  => 'Solar Beratung - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_beratung_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_beratung_hero_tag', 'label' => 'Hero Tag', 'name' => 'beratung_hero_tag', 'type' => 'text', 'default_value' => 'Solar Beratung' ),
            array( 'key' => 'field_beratung_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'beratung_hero_subtitle', 'type' => 'text', 'default_value' => 'Der erste Schritt zu Ihrer eigenen Solaranlage' ),

            // INTRO
            array( 'key' => 'field_beratung_intro_tab', 'label' => 'Intro', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_beratung_intro_title', 'label' => 'Intro Başlık', 'name' => 'beratung_intro_title', 'type' => 'text', 'default_value' => 'Ihre Energiezukunft beginnt hier' ),
            array( 'key' => 'field_beratung_intro_text', 'label' => 'Intro Metin', 'name' => 'beratung_intro_text', 'type' => 'textarea', 'rows' => 4, 'default_value' => 'Eine Solaranlage ist eine Investition in die Zukunft. Deshalb nehmen wir uns Zeit für eine umfassende Beratung. Wir analysieren Ihre Situation, erklären die Möglichkeiten und entwickeln gemeinsam die optimale Lösung für Ihr Zuhause oder Ihr Unternehmen.' ),
            array( 'key' => 'field_beratung_card_title', 'label' => 'Kart Başlık', 'name' => 'beratung_card_title', 'type' => 'text', 'default_value' => 'Kostenlose Beratung' ),
            array( 'key' => 'field_beratung_card_text', 'label' => 'Kart Metin', 'name' => 'beratung_card_text', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Vereinbaren Sie jetzt Ihren unverbindlichen Beratungstermin.' ),

            // BENEFITS
            array( 'key' => 'field_beratung_benefits_tab', 'label' => 'Benefits', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_beratung_benefit_1', 'label' => 'Benefit 1', 'name' => 'beratung_benefit_1', 'type' => 'text', 'default_value' => 'Kostenlose Erstberatung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_benefit_2', 'label' => 'Benefit 2', 'name' => 'beratung_benefit_2', 'type' => 'text', 'default_value' => 'Unverbindliche Offerte', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_benefit_3', 'label' => 'Benefit 3', 'name' => 'beratung_benefit_3', 'type' => 'text', 'default_value' => 'Erfahrene Solarexperten', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_benefit_4', 'label' => 'Benefit 4', 'name' => 'beratung_benefit_4', 'type' => 'text', 'default_value' => 'Individuelle Lösungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_benefit_5', 'label' => 'Benefit 5', 'name' => 'beratung_benefit_5', 'type' => 'text', 'default_value' => 'Förderberatung inklusive', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_benefit_6', 'label' => 'Benefit 6', 'name' => 'beratung_benefit_6', 'type' => 'text', 'default_value' => 'Finanzierungsoptionen', 'wrapper' => array( 'width' => '50' ) ),

            // PROCESS STEPS
            array( 'key' => 'field_beratung_process_tab', 'label' => 'Prozess', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_beratung_process_title', 'label' => 'Section Başlık', 'name' => 'beratung_process_title', 'type' => 'text', 'default_value' => 'So funktioniert unsere Beratung' ),
            array( 'key' => 'field_beratung_process_desc', 'label' => 'Section Açıklama', 'name' => 'beratung_process_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'In vier Schritten zu Ihrer massgeschneiderten Solarlösung.' ),

            // Step 1
            array( 'key' => 'field_beratung_step_1_number', 'label' => 'Adım 1 Numara', 'name' => 'beratung_step_1_number', 'type' => 'text', 'default_value' => '01', 'wrapper' => array( 'width' => '20' ) ),
            array( 'key' => 'field_beratung_step_1_icon', 'label' => 'Adım 1 İkon', 'name' => 'beratung_step_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'search', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_beratung_step_1_title', 'label' => 'Adım 1 Başlık', 'name' => 'beratung_step_1_title', 'type' => 'text', 'default_value' => 'Standortanalyse', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_step_1_description', 'label' => 'Adım 1 Açıklama', 'name' => 'beratung_step_1_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir analysieren Ihr Dach, die Ausrichtung, Verschattung und die baulichen Gegebenheiten vor Ort.' ),

            // Step 2
            array( 'key' => 'field_beratung_step_2_number', 'label' => 'Adım 2 Numara', 'name' => 'beratung_step_2_number', 'type' => 'text', 'default_value' => '02', 'wrapper' => array( 'width' => '20' ) ),
            array( 'key' => 'field_beratung_step_2_icon', 'label' => 'Adım 2 İkon', 'name' => 'beratung_step_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'clipboard', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_beratung_step_2_title', 'label' => 'Adım 2 Başlık', 'name' => 'beratung_step_2_title', 'type' => 'text', 'default_value' => 'Bedarfsermittlung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_step_2_description', 'label' => 'Adım 2 Açıklama', 'name' => 'beratung_step_2_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Gemeinsam ermitteln wir Ihren Stromverbrauch und definieren die optimale Anlagengrösse.' ),

            // Step 3
            array( 'key' => 'field_beratung_step_3_number', 'label' => 'Adım 3 Numara', 'name' => 'beratung_step_3_number', 'type' => 'text', 'default_value' => '03', 'wrapper' => array( 'width' => '20' ) ),
            array( 'key' => 'field_beratung_step_3_icon', 'label' => 'Adım 3 İkon', 'name' => 'beratung_step_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'file', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_beratung_step_3_title', 'label' => 'Adım 3 Başlık', 'name' => 'beratung_step_3_title', 'type' => 'text', 'default_value' => 'Detailplanung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_step_3_description', 'label' => 'Adım 3 Açıklama', 'name' => 'beratung_step_3_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir erstellen eine massgeschneiderte Planung mit 3D-Visualisierung und Ertragsberechnung.' ),

            // Step 4
            array( 'key' => 'field_beratung_step_4_number', 'label' => 'Adım 4 Numara', 'name' => 'beratung_step_4_number', 'type' => 'text', 'default_value' => '04', 'wrapper' => array( 'width' => '20' ) ),
            array( 'key' => 'field_beratung_step_4_icon', 'label' => 'Adım 4 İkon', 'name' => 'beratung_step_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'target', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_beratung_step_4_title', 'label' => 'Adım 4 Başlık', 'name' => 'beratung_step_4_title', 'type' => 'text', 'default_value' => 'Offerte', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_beratung_step_4_description', 'label' => 'Adım 4 Açıklama', 'name' => 'beratung_step_4_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Sie erhalten eine transparente Offerte mit allen Kosten, Fördermöglichkeiten und Amortisationszeit.' ),

            // CTA
            array( 'key' => 'field_beratung_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_beratung_cta_title', 'label' => 'CTA Başlık', 'name' => 'beratung_cta_title', 'type' => 'text', 'default_value' => 'Bereit für Ihre Solaranlage?' ),
            array( 'key' => 'field_beratung_cta_description', 'label' => 'CTA Açıklama', 'name' => 'beratung_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Kontaktieren Sie uns für eine kostenlose und unverbindliche Beratung.' ),
            array( 'key' => 'field_beratung_cta_button_text', 'label' => 'Buton Metni', 'name' => 'beratung_cta_button_text', 'type' => 'text', 'default_value' => 'Jetzt Beratung anfragen' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-solar-beratung.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_solar_beratung_fields' );

/**
 * Solar Installation sayfası ACF alanları
 * ACF Free uyumlu - Stats, Services ve Timeline için sabit alanlar
 */
function dataenergie_register_solar_installation_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_solar_installation',
        'title'  => 'Solar Installation - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_install_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_install_hero_tag', 'label' => 'Hero Tag', 'name' => 'install_hero_tag', 'type' => 'text', 'default_value' => 'Solar Installation' ),
            array( 'key' => 'field_install_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'install_hero_subtitle', 'type' => 'text', 'default_value' => 'Professionelle Montage durch zertifizierte Experten' ),

            // STATS
            array( 'key' => 'field_install_stats_tab', 'label' => 'İstatistikler', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_install_stat_1_number', 'label' => 'Stat 1 Sayı', 'name' => 'install_stat_1_number', 'type' => 'text', 'default_value' => '500+', 'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_install_stat_1_label', 'label' => 'Stat 1 Etiket', 'name' => 'install_stat_1_label', 'type' => 'text', 'default_value' => 'Installationen', 'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_install_stat_2_number', 'label' => 'Stat 2 Sayı', 'name' => 'install_stat_2_number', 'type' => 'text', 'default_value' => '15+', 'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_install_stat_2_label', 'label' => 'Stat 2 Etiket', 'name' => 'install_stat_2_label', 'type' => 'text', 'default_value' => 'Jahre Erfahrung', 'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_install_stat_3_number', 'label' => 'Stat 3 Sayı', 'name' => 'install_stat_3_number', 'type' => 'text', 'default_value' => '100%', 'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_install_stat_3_label', 'label' => 'Stat 3 Etiket', 'name' => 'install_stat_3_label', 'type' => 'text', 'default_value' => 'Kundenzufriedenheit', 'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_install_stat_4_number', 'label' => 'Stat 4 Sayı', 'name' => 'install_stat_4_number', 'type' => 'text', 'default_value' => '48h', 'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_install_stat_4_label', 'label' => 'Stat 4 Etiket', 'name' => 'install_stat_4_label', 'type' => 'text', 'default_value' => 'Durchschnittliche Montagezeit', 'wrapper' => array( 'width' => '25' ) ),

            // SERVICES SECTION
            array( 'key' => 'field_install_services_tab', 'label' => 'Hizmetler', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_install_services_title', 'label' => 'Section Başlık', 'name' => 'install_services_title', 'type' => 'text', 'default_value' => 'Komplettservice für Ihre Solaranlage' ),
            array( 'key' => 'field_install_services_desc', 'label' => 'Section Açıklama', 'name' => 'install_services_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Von der Planung bis zur Inbetriebnahme – professionell und zuverlässig.' ),

            // Service 1
            array( 'key' => 'field_install_service_1_icon', 'label' => 'Hizmet 1 İkon', 'name' => 'install_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'tool', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_install_service_1_title', 'label' => 'Hizmet 1 Başlık', 'name' => 'install_service_1_title', 'type' => 'text', 'default_value' => 'Professionelle Montage', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_install_service_1_description', 'label' => 'Hizmet 1 Açıklama', 'name' => 'install_service_1_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Unsere zertifizierten Installateure montieren Ihre Anlage fachgerecht und sicher.' ),
            array( 'key' => 'field_install_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'install_service_1_feature_1', 'type' => 'text', 'default_value' => 'Aufdach & Indach-Systeme', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'install_service_1_feature_2', 'type' => 'text', 'default_value' => 'Flachdach-Lösungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'install_service_1_feature_3', 'type' => 'text', 'default_value' => 'Fassadeninstallation', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'install_service_1_feature_4', 'type' => 'text', 'default_value' => 'Carport & Terrassenüberdachung', 'wrapper' => array( 'width' => '50' ) ),

            // Service 2
            array( 'key' => 'field_install_service_2_icon', 'label' => 'Hizmet 2 İkon', 'name' => 'install_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'shield', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_install_service_2_title', 'label' => 'Hizmet 2 Başlık', 'name' => 'install_service_2_title', 'type' => 'text', 'default_value' => 'Qualitätsgarantie', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_install_service_2_description', 'label' => 'Hizmet 2 Açıklama', 'name' => 'install_service_2_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir verwenden nur hochwertige Komponenten namhafter Hersteller.' ),
            array( 'key' => 'field_install_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'install_service_2_feature_1', 'type' => 'text', 'default_value' => 'Premium-Solarmodule', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'install_service_2_feature_2', 'type' => 'text', 'default_value' => 'Hochwertige Wechselrichter', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'install_service_2_feature_3', 'type' => 'text', 'default_value' => '25 Jahre Modulgarantie', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'install_service_2_feature_4', 'type' => 'text', 'default_value' => '10 Jahre Installationsgarantie', 'wrapper' => array( 'width' => '50' ) ),

            // Service 3
            array( 'key' => 'field_install_service_3_icon', 'label' => 'Hizmet 3 İkon', 'name' => 'install_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'check', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_install_service_3_title', 'label' => 'Hizmet 3 Başlık', 'name' => 'install_service_3_title', 'type' => 'text', 'default_value' => 'Schlüsselfertige Übergabe', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_install_service_3_description', 'label' => 'Hizmet 3 Açıklama', 'name' => 'install_service_3_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Von der Bewilligung bis zur Inbetriebnahme – alles aus einer Hand.' ),
            array( 'key' => 'field_install_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'install_service_3_feature_1', 'type' => 'text', 'default_value' => 'Baubewilligung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'install_service_3_feature_2', 'type' => 'text', 'default_value' => 'Netzanschluss', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'install_service_3_feature_3', 'type' => 'text', 'default_value' => 'Anmeldung beim EVU', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'install_service_3_feature_4', 'type' => 'text', 'default_value' => 'Inbetriebnahme & Einweisung', 'wrapper' => array( 'width' => '50' ) ),

            // Service 4
            array( 'key' => 'field_install_service_4_icon', 'label' => 'Hizmet 4 İkon', 'name' => 'install_service_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'clock', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_install_service_4_title', 'label' => 'Hizmet 4 Başlık', 'name' => 'install_service_4_title', 'type' => 'text', 'default_value' => 'Schnelle Umsetzung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_install_service_4_description', 'label' => 'Hizmet 4 Açıklama', 'name' => 'install_service_4_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Effiziente Projektabwicklung für eine zeitnahe Inbetriebnahme.' ),
            array( 'key' => 'field_install_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'install_service_4_feature_1', 'type' => 'text', 'default_value' => 'Kurze Planungszeit', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'install_service_4_feature_2', 'type' => 'text', 'default_value' => 'Termingerechte Montage', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'install_service_4_feature_3', 'type' => 'text', 'default_value' => 'Minimale Bauzeit', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'install_service_4_feature_4', 'type' => 'text', 'default_value' => 'Sofortige Stromproduktion', 'wrapper' => array( 'width' => '50' ) ),

            // TIMELINE
            array( 'key' => 'field_install_timeline_tab', 'label' => 'Timeline', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_install_timeline_title', 'label' => 'Timeline Başlık', 'name' => 'install_timeline_title', 'type' => 'text', 'default_value' => 'Ihre Installation in 5 Schritten' ),
            array( 'key' => 'field_install_timeline_1_title', 'label' => 'Adım 1 Başlık', 'name' => 'install_timeline_1_title', 'type' => 'text', 'default_value' => 'Beratung & Planung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_1_text', 'label' => 'Adım 1 Metin', 'name' => 'install_timeline_1_text', 'type' => 'text', 'default_value' => 'Individuelle Beratung und detaillierte Anlagenplanung.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_2_title', 'label' => 'Adım 2 Başlık', 'name' => 'install_timeline_2_title', 'type' => 'text', 'default_value' => 'Bewilligung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_2_text', 'label' => 'Adım 2 Metin', 'name' => 'install_timeline_2_text', 'type' => 'text', 'default_value' => 'Wir kümmern uns um alle notwendigen Bewilligungen.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_3_title', 'label' => 'Adım 3 Başlık', 'name' => 'install_timeline_3_title', 'type' => 'text', 'default_value' => 'Materiallieferung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_3_text', 'label' => 'Adım 3 Metin', 'name' => 'install_timeline_3_text', 'type' => 'text', 'default_value' => 'Termingerechte Lieferung aller Komponenten.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_4_title', 'label' => 'Adım 4 Başlık', 'name' => 'install_timeline_4_title', 'type' => 'text', 'default_value' => 'Montage', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_4_text', 'label' => 'Adım 4 Metin', 'name' => 'install_timeline_4_text', 'type' => 'text', 'default_value' => 'Professionelle Installation durch unser Expertenteam.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_5_title', 'label' => 'Adım 5 Başlık', 'name' => 'install_timeline_5_title', 'type' => 'text', 'default_value' => 'Inbetriebnahme', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_install_timeline_5_text', 'label' => 'Adım 5 Metin', 'name' => 'install_timeline_5_text', 'type' => 'text', 'default_value' => 'Netzanschluss, Tests und Übergabe an Sie.', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_install_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_install_cta_title', 'label' => 'CTA Başlık', 'name' => 'install_cta_title', 'type' => 'text', 'default_value' => 'Bereit für die Installation?' ),
            array( 'key' => 'field_install_cta_description', 'label' => 'CTA Açıklama', 'name' => 'install_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Kontaktieren Sie uns für ein unverbindliches Angebot.' ),
            array( 'key' => 'field_install_cta_button_text', 'label' => 'Buton Metni', 'name' => 'install_cta_button_text', 'type' => 'text', 'default_value' => 'Offerte anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-solar-installation.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_solar_installation_fields' );

/**
 * Reinigung (Temizlik Hizmetleri) sayfası ACF alanları
 * ACF Free uyumlu - 4 hizmet kartı için sabit alanlar
 */
function dataenergie_register_reinigung_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_reinigung',
        'title'  => 'Reinigung - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_reinigung_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_reinigung_hero_tag', 'label' => 'Hero Tag', 'name' => 'reinigung_hero_tag', 'type' => 'text', 'default_value' => 'Reinigung' ),
            array( 'key' => 'field_reinigung_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'reinigung_hero_subtitle', 'type' => 'text', 'default_value' => 'Professionelle Reinigungslösungen für Ihr Unternehmen' ),

            // SERVICES
            array( 'key' => 'field_reinigung_services_tab', 'label' => 'Hizmetler', 'type' => 'tab', 'placement' => 'left' ),

            // Service 1 - Gebäudereinigung
            array( 'key' => 'field_reinigung_service_1_icon', 'label' => 'Hizmet 1 İkon', 'name' => 'reinigung_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'home', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_reinigung_service_1_title', 'label' => 'Hizmet 1 Başlık', 'name' => 'reinigung_service_1_title', 'type' => 'text', 'default_value' => 'Gebäudereinigung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_reinigung_service_1_description', 'label' => 'Hizmet 1 Açıklama', 'name' => 'reinigung_service_1_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Umfassende Reinigung für Büros, Praxen und Geschäftsräume.' ),
            array( 'key' => 'field_reinigung_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'reinigung_service_1_feature_1', 'type' => 'text', 'default_value' => 'Büroreinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'reinigung_service_1_feature_2', 'type' => 'text', 'default_value' => 'Praxisreinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'reinigung_service_1_feature_3', 'type' => 'text', 'default_value' => 'Empfangsbereich', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'reinigung_service_1_feature_4', 'type' => 'text', 'default_value' => 'Sanitäranlagen', 'wrapper' => array( 'width' => '50' ) ),

            // Service 2 - Unterhaltsreinigung
            array( 'key' => 'field_reinigung_service_2_icon', 'label' => 'Hizmet 2 İkon', 'name' => 'reinigung_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'refresh-cw', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_reinigung_service_2_title', 'label' => 'Hizmet 2 Başlık', 'name' => 'reinigung_service_2_title', 'type' => 'text', 'default_value' => 'Unterhaltsreinigung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_reinigung_service_2_description', 'label' => 'Hizmet 2 Açıklama', 'name' => 'reinigung_service_2_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Regelmässige Reinigung nach Ihrem Zeitplan.' ),
            array( 'key' => 'field_reinigung_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'reinigung_service_2_feature_1', 'type' => 'text', 'default_value' => 'Tägliche Reinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'reinigung_service_2_feature_2', 'type' => 'text', 'default_value' => 'Wöchentliche Reinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'reinigung_service_2_feature_3', 'type' => 'text', 'default_value' => 'Flexible Termine', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'reinigung_service_2_feature_4', 'type' => 'text', 'default_value' => 'Qualitätskontrolle', 'wrapper' => array( 'width' => '50' ) ),

            // Service 3 - Glasreinigung
            array( 'key' => 'field_reinigung_service_3_icon', 'label' => 'Hizmet 3 İkon', 'name' => 'reinigung_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'aperture', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_reinigung_service_3_title', 'label' => 'Hizmet 3 Başlık', 'name' => 'reinigung_service_3_title', 'type' => 'text', 'default_value' => 'Glasreinigung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_reinigung_service_3_description', 'label' => 'Hizmet 3 Açıklama', 'name' => 'reinigung_service_3_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Professionelle Fenster- und Glasflächenreinigung.' ),
            array( 'key' => 'field_reinigung_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'reinigung_service_3_feature_1', 'type' => 'text', 'default_value' => 'Fensterreinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'reinigung_service_3_feature_2', 'type' => 'text', 'default_value' => 'Glasfassaden', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'reinigung_service_3_feature_3', 'type' => 'text', 'default_value' => 'Schaufenster', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'reinigung_service_3_feature_4', 'type' => 'text', 'default_value' => 'Wintergärten', 'wrapper' => array( 'width' => '50' ) ),

            // Service 4 - Spezialreinigung
            array( 'key' => 'field_reinigung_service_4_icon', 'label' => 'Hizmet 4 İkon', 'name' => 'reinigung_service_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'sparkles', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_reinigung_service_4_title', 'label' => 'Hizmet 4 Başlık', 'name' => 'reinigung_service_4_title', 'type' => 'text', 'default_value' => 'Spezialreinigung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_reinigung_service_4_description', 'label' => 'Hizmet 4 Açıklama', 'name' => 'reinigung_service_4_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Sonderreinigungen für besondere Anforderungen.' ),
            array( 'key' => 'field_reinigung_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'reinigung_service_4_feature_1', 'type' => 'text', 'default_value' => 'Baureinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'reinigung_service_4_feature_2', 'type' => 'text', 'default_value' => 'Grundreinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'reinigung_service_4_feature_3', 'type' => 'text', 'default_value' => 'Teppichreinigung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_reinigung_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'reinigung_service_4_feature_4', 'type' => 'text', 'default_value' => 'Steinbodenreinigung', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_reinigung_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_reinigung_cta_title', 'label' => 'CTA Başlık', 'name' => 'reinigung_cta_title', 'type' => 'text', 'default_value' => 'Saubere Räume, klarer Kopf' ),
            array( 'key' => 'field_reinigung_cta_description', 'label' => 'CTA Açıklama', 'name' => 'reinigung_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Kontaktieren Sie uns für ein unverbindliches Angebot.' ),
            array( 'key' => 'field_reinigung_cta_button_text', 'label' => 'Buton Metni', 'name' => 'reinigung_cta_button_text', 'type' => 'text', 'default_value' => 'Offerte anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-reinigung.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_reinigung_fields' );

/**
 * Solar Systems sayfası ACF alanları
 */
function dataenergie_register_solar_systems_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_solar_systems',
        'title'  => 'Solar Systems - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_solar_sys_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_solar_sys_hero_tag', 'label' => 'Hero Tag', 'name' => 'solar_sys_hero_tag', 'type' => 'text', 'default_value' => 'Renewable Energy' ),
            array( 'key' => 'field_solar_sys_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'solar_sys_hero_subtitle', 'type' => 'text', 'default_value' => 'Nachhaltige Energielösungen für Ihre Zukunft' ),

            // SERVICE 1
            array( 'key' => 'field_solar_sys_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_solar_sys_service_1_icon', 'label' => 'İkon', 'name' => 'solar_sys_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'sun' ),
            array( 'key' => 'field_solar_sys_service_1_title', 'label' => 'Başlık', 'name' => 'solar_sys_service_1_title', 'type' => 'text', 'default_value' => 'Photovoltaik Anlagen' ),
            array( 'key' => 'field_solar_sys_service_1_description', 'label' => 'Açıklama', 'name' => 'solar_sys_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Produzieren Sie Ihren eigenen Strom. Wir planen und installieren Photovoltaikanlagen für Einfamilienhäuser, Gewerbe und Industrie.' ),
            array( 'key' => 'field_solar_sys_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'solar_sys_service_1_feature_1', 'type' => 'text', 'default_value' => 'Individuelle Planung & Auslegung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'solar_sys_service_1_feature_2', 'type' => 'text', 'default_value' => 'Hochleistungs-Module', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'solar_sys_service_1_feature_3', 'type' => 'text', 'default_value' => 'Dachintegration & Aufdach', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'solar_sys_service_1_feature_4', 'type' => 'text', 'default_value' => 'Schlüsselfertige Installation', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_solar_sys_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_solar_sys_service_2_icon', 'label' => 'İkon', 'name' => 'solar_sys_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'battery' ),
            array( 'key' => 'field_solar_sys_service_2_title', 'label' => 'Başlık', 'name' => 'solar_sys_service_2_title', 'type' => 'text', 'default_value' => 'Stromspeicher' ),
            array( 'key' => 'field_solar_sys_service_2_description', 'label' => 'Açıklama', 'name' => 'solar_sys_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Maximieren Sie Ihren Eigenverbrauch. Mit modernen Batteriespeichern nutzen Sie Ihren Solarstrom auch nachts oder bei schlechtem Wetter.' ),
            array( 'key' => 'field_solar_sys_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'solar_sys_service_2_feature_1', 'type' => 'text', 'default_value' => 'Lithium-Ionen Technologie', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'solar_sys_service_2_feature_2', 'type' => 'text', 'default_value' => 'Notstromfähigkeit', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'solar_sys_service_2_feature_3', 'type' => 'text', 'default_value' => 'Intelligentes Energiemanagement', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'solar_sys_service_2_feature_4', 'type' => 'text', 'default_value' => 'Unabhängigkeit vom Stromnetz', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_solar_sys_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_solar_sys_service_3_icon', 'label' => 'İkon', 'name' => 'solar_sys_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'zap' ),
            array( 'key' => 'field_solar_sys_service_3_title', 'label' => 'Başlık', 'name' => 'solar_sys_service_3_title', 'type' => 'text', 'default_value' => 'E-Mobilität' ),
            array( 'key' => 'field_solar_sys_service_3_description', 'label' => 'Açıklama', 'name' => 'solar_sys_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Tanken Sie Sonne. Wir installieren Ladestationen (Wallboxen) für Ihr Elektroauto, perfekt integriert in Ihr Energiesystem.' ),
            array( 'key' => 'field_solar_sys_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'solar_sys_service_3_feature_1', 'type' => 'text', 'default_value' => 'Wallbox Installation', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'solar_sys_service_3_feature_2', 'type' => 'text', 'default_value' => 'Intelligente Ladesteuerung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'solar_sys_service_3_feature_3', 'type' => 'text', 'default_value' => 'PV-Überschussladen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_solar_sys_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'solar_sys_service_3_feature_4', 'type' => 'text', 'default_value' => 'Lastmanagement', 'wrapper' => array( 'width' => '50' ) ),

            // PROJECTS
            array( 'key' => 'field_solar_sys_projects_tab', 'label' => 'Projeler', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_solar_sys_projects_title', 'label' => 'Section Başlık', 'name' => 'solar_sys_projects_title', 'type' => 'text', 'default_value' => 'Unsere Projekte' ),
            array( 'key' => 'field_solar_sys_projects_description', 'label' => 'Section Açıklama', 'name' => 'solar_sys_projects_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Ausgewählte Photovoltaik-Projekte unserer Kunden' ),
            array( 'key' => 'field_solar_sys_projects_count', 'label' => 'Proje Sayısı', 'name' => 'solar_sys_projects_count', 'type' => 'number', 'default_value' => 3, 'min' => 1, 'max' => 6 ),

            // CTA
            array( 'key' => 'field_solar_sys_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_solar_sys_cta_title', 'label' => 'CTA Başlık', 'name' => 'solar_sys_cta_title', 'type' => 'text', 'default_value' => 'Interessiert an einer Solaranlage?' ),
            array( 'key' => 'field_solar_sys_cta_description', 'label' => 'CTA Açıklama', 'name' => 'solar_sys_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Fordern Sie jetzt Ihre unverbindliche Offerte an.' ),
            array( 'key' => 'field_solar_sys_cta_button_text', 'label' => 'Buton Metni', 'name' => 'solar_sys_cta_button_text', 'type' => 'text', 'default_value' => 'Offerte anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-solar-systems.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_solar_systems_fields' );

/**
 * Microsoft Azure Cloud Sayfa Alanlarını Tanımla
 * ACF Free uyumlu
 */
function dataenergie_register_azure_page_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    // İkon seçenekleri
    $icon_choices = array(
        'azure'      => 'Azure (Şimşek)',
        'cloud'      => 'Bulut (Cloud)',
        'server'     => 'Sunucu (Server)',
        'database'   => 'Veritabanı (Database)',
        'shield'     => 'Kalkan (Shield)',
        'cpu'        => 'İşlemci (CPU)',
        'network'    => 'Ağ (Network)',
        'lock'       => 'Kilit (Lock)',
        'globe'      => 'Dünya (Globe)',
        'refresh'    => 'Yenile (Refresh)',
    );

    acf_add_local_field_group( array(
        'key'    => 'group_azure_page',
        'title'  => 'Microsoft Azure Cloud Sayfa Ayarları',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array( 'key' => 'field_azure_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_hero_tag', 'label' => 'Hero Etiket', 'name' => 'azure_hero_tag', 'type' => 'text', 'default_value' => 'Microsoft Azure' ),
            array( 'key' => 'field_azure_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'azure_hero_subtitle', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Skalierbare Cloud-Infrastruktur für Ihr Unternehmen' ),

            // =========================================
            // SEKME 2: SERVICE 1
            // =========================================
            array( 'key' => 'field_azure_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_service_1_title', 'label' => 'Başlık', 'name' => 'azure_service_1_title', 'type' => 'text', 'default_value' => 'Azure Virtual Machines' ),
            array( 'key' => 'field_azure_service_1_description', 'label' => 'Açıklama', 'name' => 'azure_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Flexible und skalierbare virtuelle Maschinen für jede Arbeitslast. Windows und Linux VMs mit Enterprise-Performance.' ),
            array( 'key' => 'field_azure_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'azure_service_1_feature_1', 'type' => 'text', 'default_value' => 'Windows & Linux VMs', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'azure_service_1_feature_2', 'type' => 'text', 'default_value' => 'Automatische Skalierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'azure_service_1_feature_3', 'type' => 'text', 'default_value' => 'Reserved Instances für Kosteneinsparung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'azure_service_1_feature_4', 'type' => 'text', 'default_value' => 'Spot VMs für variable Workloads', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_azure_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_service_2_title', 'label' => 'Başlık', 'name' => 'azure_service_2_title', 'type' => 'text', 'default_value' => 'Azure Active Directory' ),
            array( 'key' => 'field_azure_service_2_description', 'label' => 'Açıklama', 'name' => 'azure_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Identitäts- und Zugriffsverwaltung für Ihre Cloud-Umgebung. Single Sign-On und Multi-Faktor-Authentifizierung.' ),
            array( 'key' => 'field_azure_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'azure_service_2_feature_1', 'type' => 'text', 'default_value' => 'Single Sign-On (SSO)', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'azure_service_2_feature_2', 'type' => 'text', 'default_value' => 'Multi-Faktor-Authentifizierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'azure_service_2_feature_3', 'type' => 'text', 'default_value' => 'Conditional Access Policies', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'azure_service_2_feature_4', 'type' => 'text', 'default_value' => 'Azure AD B2B & B2C', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_azure_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_service_3_title', 'label' => 'Başlık', 'name' => 'azure_service_3_title', 'type' => 'text', 'default_value' => 'Azure Backup & Site Recovery' ),
            array( 'key' => 'field_azure_service_3_description', 'label' => 'Açıklama', 'name' => 'azure_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Zuverlässige Datensicherung und Disaster Recovery. Schützen Sie Ihre kritischen Workloads vor Datenverlust.' ),
            array( 'key' => 'field_azure_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'azure_service_3_feature_1', 'type' => 'text', 'default_value' => 'Automatisierte Backups', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'azure_service_3_feature_2', 'type' => 'text', 'default_value' => 'Geo-redundante Speicherung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'azure_service_3_feature_3', 'type' => 'text', 'default_value' => 'Site Recovery für VMs', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'azure_service_3_feature_4', 'type' => 'text', 'default_value' => 'Schnelle Wiederherstellung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4
            array( 'key' => 'field_azure_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_service_4_title', 'label' => 'Başlık', 'name' => 'azure_service_4_title', 'type' => 'text', 'default_value' => 'Hybride Cloud-Lösungen' ),
            array( 'key' => 'field_azure_service_4_description', 'label' => 'Açıklama', 'name' => 'azure_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Nahtlose Integration von On-Premises und Cloud. Azure Arc und Azure Stack für hybride Szenarien.' ),
            array( 'key' => 'field_azure_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'azure_service_4_feature_1', 'type' => 'text', 'default_value' => 'Azure Arc Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'azure_service_4_feature_2', 'type' => 'text', 'default_value' => 'Azure Stack HCI', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'azure_service_4_feature_3', 'type' => 'text', 'default_value' => 'VPN & ExpressRoute', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'azure_service_4_feature_4', 'type' => 'text', 'default_value' => 'Einheitliche Verwaltung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 5
            array( 'key' => 'field_azure_service5_tab', 'label' => 'Hizmet 5', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_service_5_title', 'label' => 'Başlık', 'name' => 'azure_service_5_title', 'type' => 'text', 'default_value' => 'Azure Kubernetes Service' ),
            array( 'key' => 'field_azure_service_5_description', 'label' => 'Açıklama', 'name' => 'azure_service_5_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Managed Kubernetes für containerisierte Anwendungen. Einfache Bereitstellung, Skalierung und Verwaltung.' ),
            array( 'key' => 'field_azure_service_5_feature_1', 'label' => 'Özellik 1', 'name' => 'azure_service_5_feature_1', 'type' => 'text', 'default_value' => 'Managed Kubernetes Cluster', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_5_feature_2', 'label' => 'Özellik 2', 'name' => 'azure_service_5_feature_2', 'type' => 'text', 'default_value' => 'Azure Container Registry', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_5_feature_3', 'label' => 'Özellik 3', 'name' => 'azure_service_5_feature_3', 'type' => 'text', 'default_value' => 'DevOps Integration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_5_feature_4', 'label' => 'Özellik 4', 'name' => 'azure_service_5_feature_4', 'type' => 'text', 'default_value' => 'Auto-Scaling & Load Balancing', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 6
            array( 'key' => 'field_azure_service6_tab', 'label' => 'Hizmet 6', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_service_6_title', 'label' => 'Başlık', 'name' => 'azure_service_6_title', 'type' => 'text', 'default_value' => 'Azure Security Center' ),
            array( 'key' => 'field_azure_service_6_description', 'label' => 'Açıklama', 'name' => 'azure_service_6_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Umfassender Cloud-Sicherheit mit Threat Protection und Compliance. Sichern Sie Ihre Cloud-Ressourcen ab.' ),
            array( 'key' => 'field_azure_service_6_feature_1', 'label' => 'Özellik 1', 'name' => 'azure_service_6_feature_1', 'type' => 'text', 'default_value' => 'Threat Protection', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_6_feature_2', 'label' => 'Özellik 2', 'name' => 'azure_service_6_feature_2', 'type' => 'text', 'default_value' => 'Security Posture Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_6_feature_3', 'label' => 'Özellik 3', 'name' => 'azure_service_6_feature_3', 'type' => 'text', 'default_value' => 'Compliance-Überwachung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_azure_service_6_feature_4', 'label' => 'Özellik 4', 'name' => 'azure_service_6_feature_4', 'type' => 'text', 'default_value' => 'Azure Defender', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_azure_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_azure_cta_title', 'label' => 'CTA Başlık', 'name' => 'azure_cta_title', 'type' => 'text', 'default_value' => 'Bereit für Azure?' ),
            array( 'key' => 'field_azure_cta_description', 'label' => 'CTA Açıklama', 'name' => 'azure_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir beraten Sie gerne zur optimalen Azure-Strategie für Ihr Unternehmen.' ),
            array( 'key' => 'field_azure_cta_button_text', 'label' => 'Buton Metni', 'name' => 'azure_cta_button_text', 'type' => 'text', 'default_value' => 'Kostenlose Beratung' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-microsoft-azure.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_azure_page_fields' );

/**
 * Swisscom DCS+ Cloud Sayfa Alanlarını Tanımla
 * ACF Free uyumlu
 */
function dataenergie_register_swisscom_page_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    // İkon seçenekleri
    $icon_choices = array(
        'cloud'      => 'Bulut (Cloud)',
        'server'     => 'Sunucu (Server)',
        'database'   => 'Veritabanı (Database)',
        'shield'     => 'Kalkan (Shield)',
        'lock'       => 'Kilit (Lock)',
        'network'    => 'Ağ (Network)',
        'globe'      => 'Dünya (Globe)',
        'flag'       => 'Bayrak (Flag)',
        'check'      => 'Onay (Check)',
        'zap'        => 'Şimşek (Zap)',
        'headphones' => 'Kulaklık (Headphones)',
        'settings'   => 'Ayarlar (Settings)',
    );

    acf_add_local_field_group( array(
        'key'    => 'group_swisscom_page',
        'title'  => 'Swisscom DCS+ Cloud Sayfa Ayarları',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array( 'key' => 'field_swisscom_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_hero_tag', 'label' => 'Hero Etiket', 'name' => 'swisscom_hero_tag', 'type' => 'text', 'default_value' => 'Swisscom DCS+' ),
            array( 'key' => 'field_swisscom_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'swisscom_hero_subtitle', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Enterprise Cloud aus der Schweiz - Datenschutz garantiert' ),

            // =========================================
            // SEKME 2: SERVICE 1
            // =========================================
            array( 'key' => 'field_swisscom_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_service_1_title', 'label' => 'Başlık', 'name' => 'swisscom_service_1_title', 'type' => 'text', 'default_value' => 'DCS+ Infrastructure' ),
            array( 'key' => 'field_swisscom_service_1_description', 'label' => 'Açıklama', 'name' => 'swisscom_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Enterprise-grade Infrastruktur aus Schweizer Rechenzentren. Virtualisierte Server und Storage mit höchster Verfügbarkeit.' ),
            array( 'key' => 'field_swisscom_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'swisscom_service_1_feature_1', 'type' => 'text', 'default_value' => 'VMware-basierte Virtualisierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'swisscom_service_1_feature_2', 'type' => 'text', 'default_value' => 'Tier 3+ Rechenzentren', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'swisscom_service_1_feature_3', 'type' => 'text', 'default_value' => 'SSD-Storage mit hoher IOPS', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'swisscom_service_1_feature_4', 'type' => 'text', 'default_value' => 'Dedizierte Ressourcen verfügbar', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_swisscom_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_service_2_title', 'label' => 'Başlık', 'name' => 'swisscom_service_2_title', 'type' => 'text', 'default_value' => 'Swiss Data Sovereignty' ),
            array( 'key' => 'field_swisscom_service_2_description', 'label' => 'Açıklama', 'name' => 'swisscom_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Ihre Daten bleiben in der Schweiz. DSGVO-konform und unter Schweizer Datenschutzrecht geschützt.' ),
            array( 'key' => 'field_swisscom_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'swisscom_service_2_feature_1', 'type' => 'text', 'default_value' => 'Daten 100% in der Schweiz', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'swisscom_service_2_feature_2', 'type' => 'text', 'default_value' => 'DSGVO & DSG konform', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'swisscom_service_2_feature_3', 'type' => 'text', 'default_value' => 'Keine US CLOUD Act Bedenken', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'swisscom_service_2_feature_4', 'type' => 'text', 'default_value' => 'Schweizer Ansprechpartner', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_swisscom_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_service_3_title', 'label' => 'Başlık', 'name' => 'swisscom_service_3_title', 'type' => 'text', 'default_value' => 'Managed Cloud Services' ),
            array( 'key' => 'field_swisscom_service_3_description', 'label' => 'Açıklama', 'name' => 'swisscom_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Full-Managed IT-Infrastruktur. Monitoring, Patching und Support durch Swisscom-Experten.' ),
            array( 'key' => 'field_swisscom_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'swisscom_service_3_feature_1', 'type' => 'text', 'default_value' => '24/7 Monitoring & Support', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'swisscom_service_3_feature_2', 'type' => 'text', 'default_value' => 'Automatisiertes Patching', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'swisscom_service_3_feature_3', 'type' => 'text', 'default_value' => 'Incident Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'swisscom_service_3_feature_4', 'type' => 'text', 'default_value' => 'Monatliche Reports', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4
            array( 'key' => 'field_swisscom_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_service_4_title', 'label' => 'Başlık', 'name' => 'swisscom_service_4_title', 'type' => 'text', 'default_value' => 'DCS+ Backup & Recovery' ),
            array( 'key' => 'field_swisscom_service_4_description', 'label' => 'Açıklama', 'name' => 'swisscom_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Zuverlässige Backup-Lösungen mit garantierter Wiederherstellung. Geo-redundante Speicherung in Schweizer Rechenzentren.' ),
            array( 'key' => 'field_swisscom_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'swisscom_service_4_feature_1', 'type' => 'text', 'default_value' => 'Veeam Backup as a Service', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'swisscom_service_4_feature_2', 'type' => 'text', 'default_value' => 'Geo-redundante Speicherung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'swisscom_service_4_feature_3', 'type' => 'text', 'default_value' => 'Granulare Wiederherstellung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'swisscom_service_4_feature_4', 'type' => 'text', 'default_value' => 'Langzeit-Archivierung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 5
            array( 'key' => 'field_swisscom_service5_tab', 'label' => 'Hizmet 5', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_service_5_title', 'label' => 'Başlık', 'name' => 'swisscom_service_5_title', 'type' => 'text', 'default_value' => 'DCS+ Security Services' ),
            array( 'key' => 'field_swisscom_service_5_description', 'label' => 'Açıklama', 'name' => 'swisscom_service_5_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Umfassende Sicherheitslösungen für Ihre Cloud-Umgebung. Firewall, DDoS-Schutz und Vulnerability Management.' ),
            array( 'key' => 'field_swisscom_service_5_feature_1', 'label' => 'Özellik 1', 'name' => 'swisscom_service_5_feature_1', 'type' => 'text', 'default_value' => 'Next-Gen Firewall', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_5_feature_2', 'label' => 'Özellik 2', 'name' => 'swisscom_service_5_feature_2', 'type' => 'text', 'default_value' => 'DDoS Protection', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_5_feature_3', 'label' => 'Özellik 3', 'name' => 'swisscom_service_5_feature_3', 'type' => 'text', 'default_value' => 'Web Application Firewall', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_5_feature_4', 'label' => 'Özellik 4', 'name' => 'swisscom_service_5_feature_4', 'type' => 'text', 'default_value' => 'Security Operations Center', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 6
            array( 'key' => 'field_swisscom_service6_tab', 'label' => 'Hizmet 6', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_service_6_title', 'label' => 'Başlık', 'name' => 'swisscom_service_6_title', 'type' => 'text', 'default_value' => 'Enterprise Connectivity' ),
            array( 'key' => 'field_swisscom_service_6_description', 'label' => 'Açıklama', 'name' => 'swisscom_service_6_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Direkte Anbindung an Ihr Unternehmensnetzwerk. Private Connect und dedizierte Verbindungen.' ),
            array( 'key' => 'field_swisscom_service_6_feature_1', 'label' => 'Özellik 1', 'name' => 'swisscom_service_6_feature_1', 'type' => 'text', 'default_value' => 'Private Connect', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_6_feature_2', 'label' => 'Özellik 2', 'name' => 'swisscom_service_6_feature_2', 'type' => 'text', 'default_value' => 'VPN-Anbindung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_6_feature_3', 'label' => 'Özellik 3', 'name' => 'swisscom_service_6_feature_3', 'type' => 'text', 'default_value' => 'Dedizierte Leitungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_swisscom_service_6_feature_4', 'label' => 'Özellik 4', 'name' => 'swisscom_service_6_feature_4', 'type' => 'text', 'default_value' => 'Multi-Cloud Networking', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_swisscom_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_swisscom_cta_title', 'label' => 'CTA Başlık', 'name' => 'swisscom_cta_title', 'type' => 'text', 'default_value' => 'Interessiert an DCS+ Cloud?' ),
            array( 'key' => 'field_swisscom_cta_description', 'label' => 'CTA Açıklama', 'name' => 'swisscom_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Erfahren Sie, wie Swisscom DCS+ Ihre Daten sicher in der Schweiz hostet.' ),
            array( 'key' => 'field_swisscom_cta_button_text', 'label' => 'Buton Metni', 'name' => 'swisscom_cta_button_text', 'type' => 'text', 'default_value' => 'Beratung anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-swisscom-dcs.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_swisscom_page_fields' );

/**
 * Server und Storage Sayfa Alanları
 */
function dataenergie_register_storage_page_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_storage_page',
        'title'  => 'Server & Storage Sayfa Ayarları',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array( 'key' => 'field_storage_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_hero_tag', 'label' => 'Hero Etiket', 'name' => 'storage_hero_tag', 'type' => 'text', 'default_value' => 'Server & Storage' ),
            array( 'key' => 'field_storage_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'storage_hero_subtitle', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Enterprise-Hardware für maximale Leistung und Zuverlässigkeit' ),

            // =========================================
            // SEKME 2: SERVICE 1 - Enterprise Server
            // =========================================
            array( 'key' => 'field_storage_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_service_1_title', 'label' => 'Başlık', 'name' => 'storage_service_1_title', 'type' => 'text', 'default_value' => 'Enterprise Server' ),
            array( 'key' => 'field_storage_service_1_description', 'label' => 'Açıklama', 'name' => 'storage_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Leistungsstarke Server-Lösungen für Ihre Rechenzentren. Von Rack-Servern bis zu Blade-Systemen für jede Anforderung.' ),
            array( 'key' => 'field_storage_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'storage_service_1_feature_1', 'type' => 'text', 'default_value' => 'HPE ProLiant & Dell PowerEdge', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'storage_service_1_feature_2', 'type' => 'text', 'default_value' => 'Blade-Server & Rack-Systeme', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'storage_service_1_feature_3', 'type' => 'text', 'default_value' => 'Hochverfügbarkeits-Cluster', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'storage_service_1_feature_4', 'type' => 'text', 'default_value' => 'GPU-Server für AI/ML', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2 - Storage Solutions
            array( 'key' => 'field_storage_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_service_2_title', 'label' => 'Başlık', 'name' => 'storage_service_2_title', 'type' => 'text', 'default_value' => 'Storage-Lösungen' ),
            array( 'key' => 'field_storage_service_2_description', 'label' => 'Açıklama', 'name' => 'storage_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Enterprise-Storage für kritische Daten. NAS, SAN und All-Flash-Arrays für höchste Performance und Verfügbarkeit.' ),
            array( 'key' => 'field_storage_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'storage_service_2_feature_1', 'type' => 'text', 'default_value' => 'All-Flash & Hybrid Arrays', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'storage_service_2_feature_2', 'type' => 'text', 'default_value' => 'NetApp, Dell EMC, HPE Nimble', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'storage_service_2_feature_3', 'type' => 'text', 'default_value' => 'SAN & NAS Architekturen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'storage_service_2_feature_4', 'type' => 'text', 'default_value' => 'Deduplizierung & Kompression', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3 - Backup & Recovery
            array( 'key' => 'field_storage_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_service_3_title', 'label' => 'Başlık', 'name' => 'storage_service_3_title', 'type' => 'text', 'default_value' => 'Backup & Disaster Recovery' ),
            array( 'key' => 'field_storage_service_3_description', 'label' => 'Açıklama', 'name' => 'storage_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Zuverlässige Datensicherung und schnelle Wiederherstellung. Tape, Disk und Cloud-basierte Backup-Lösungen.' ),
            array( 'key' => 'field_storage_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'storage_service_3_feature_1', 'type' => 'text', 'default_value' => 'Veeam & Commvault', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'storage_service_3_feature_2', 'type' => 'text', 'default_value' => 'Tape-Libraries & VTL', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'storage_service_3_feature_3', 'type' => 'text', 'default_value' => 'Disaster Recovery Sites', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'storage_service_3_feature_4', 'type' => 'text', 'default_value' => 'Air-Gap Backup Solutions', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4 - HCI
            array( 'key' => 'field_storage_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_service_4_title', 'label' => 'Başlık', 'name' => 'storage_service_4_title', 'type' => 'text', 'default_value' => 'Hyperconverged Infrastructure' ),
            array( 'key' => 'field_storage_service_4_description', 'label' => 'Açıklama', 'name' => 'storage_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Konvergente Systeme für vereinfachte IT. Compute, Storage und Netzwerk in einer integrierten Plattform.' ),
            array( 'key' => 'field_storage_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'storage_service_4_feature_1', 'type' => 'text', 'default_value' => 'VMware vSAN & Nutanix', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'storage_service_4_feature_2', 'type' => 'text', 'default_value' => 'Dell VxRail & HPE SimpliVity', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'storage_service_4_feature_3', 'type' => 'text', 'default_value' => 'Einfache Skalierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'storage_service_4_feature_4', 'type' => 'text', 'default_value' => 'Integriertes Management', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 5 - Virtualization
            array( 'key' => 'field_storage_service5_tab', 'label' => 'Hizmet 5', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_service_5_title', 'label' => 'Başlık', 'name' => 'storage_service_5_title', 'type' => 'text', 'default_value' => 'Virtualisierung' ),
            array( 'key' => 'field_storage_service_5_description', 'label' => 'Açıklama', 'name' => 'storage_service_5_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'VMware und Hyper-V Umgebungen. Design, Migration und Optimierung Ihrer virtualisierten Infrastruktur.' ),
            array( 'key' => 'field_storage_service_5_feature_1', 'label' => 'Özellik 1', 'name' => 'storage_service_5_feature_1', 'type' => 'text', 'default_value' => 'VMware vSphere & vCenter', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_5_feature_2', 'label' => 'Özellik 2', 'name' => 'storage_service_5_feature_2', 'type' => 'text', 'default_value' => 'Microsoft Hyper-V', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_5_feature_3', 'label' => 'Özellik 3', 'name' => 'storage_service_5_feature_3', 'type' => 'text', 'default_value' => 'P2V & V2V Migrationen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_5_feature_4', 'label' => 'Özellik 4', 'name' => 'storage_service_5_feature_4', 'type' => 'text', 'default_value' => 'Performance-Optimierung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 6 - Maintenance
            array( 'key' => 'field_storage_service6_tab', 'label' => 'Hizmet 6', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_service_6_title', 'label' => 'Başlık', 'name' => 'storage_service_6_title', 'type' => 'text', 'default_value' => 'Wartung & Support' ),
            array( 'key' => 'field_storage_service_6_description', 'label' => 'Açıklama', 'name' => 'storage_service_6_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Professioneller Support für Ihre Hardware. Wartungsverträge, Ersatzteil-Service und 24/7 Notfall-Unterstützung.' ),
            array( 'key' => 'field_storage_service_6_feature_1', 'label' => 'Özellik 1', 'name' => 'storage_service_6_feature_1', 'type' => 'text', 'default_value' => '24/7 Hardware-Support', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_6_feature_2', 'label' => 'Özellik 2', 'name' => 'storage_service_6_feature_2', 'type' => 'text', 'default_value' => 'Ersatzteil-Vorhaltung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_6_feature_3', 'label' => 'Özellik 3', 'name' => 'storage_service_6_feature_3', 'type' => 'text', 'default_value' => 'Firmware-Updates', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_storage_service_6_feature_4', 'label' => 'Özellik 4', 'name' => 'storage_service_6_feature_4', 'type' => 'text', 'default_value' => 'Proaktives Monitoring', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_storage_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_storage_cta_title', 'label' => 'CTA Başlık', 'name' => 'storage_cta_title', 'type' => 'text', 'default_value' => 'Ihr IT-Infrastruktur Projekt?' ),
            array( 'key' => 'field_storage_cta_description', 'label' => 'CTA Açıklama', 'name' => 'storage_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir beraten Sie bei der Auswahl der optimalen Server- und Storage-Lösung für Ihre Anforderungen.' ),
            array( 'key' => 'field_storage_cta_button_text', 'label' => 'Buton Metni', 'name' => 'storage_cta_button_text', 'type' => 'text', 'default_value' => 'Beratungsgespräch vereinbaren' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-server-storage.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_storage_page_fields' );

/**
 * Virtualisierung Sayfa Alanları
 */
function dataenergie_register_virtualisierung_page_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_virtualisierung_page',
        'title'  => 'Virtualisierung Sayfa Ayarları',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array( 'key' => 'field_virt_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_hero_tag', 'label' => 'Hero Etiket', 'name' => 'virt_hero_tag', 'type' => 'text', 'default_value' => 'Virtualisierung' ),
            array( 'key' => 'field_virt_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'virt_hero_subtitle', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Effiziente IT-Infrastruktur durch moderne Virtualisierungstechnologien' ),

            // =========================================
            // SEKME 2: SERVICE 1 - VMware vSphere
            // =========================================
            array( 'key' => 'field_virt_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_service_1_title', 'label' => 'Başlık', 'name' => 'virt_service_1_title', 'type' => 'text', 'default_value' => 'VMware vSphere' ),
            array( 'key' => 'field_virt_service_1_description', 'label' => 'Açıklama', 'name' => 'virt_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Die führende Virtualisierungsplattform für Enterprise-Umgebungen. Maximale Flexibilität und Zuverlässigkeit für Ihre kritischen Workloads.' ),
            array( 'key' => 'field_virt_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'virt_service_1_feature_1', 'type' => 'text', 'default_value' => 'ESXi Hypervisor Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'virt_service_1_feature_2', 'type' => 'text', 'default_value' => 'vCenter Server Administration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'virt_service_1_feature_3', 'type' => 'text', 'default_value' => 'vMotion & Storage vMotion', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'virt_service_1_feature_4', 'type' => 'text', 'default_value' => 'High Availability Cluster', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2 - Microsoft Hyper-V
            array( 'key' => 'field_virt_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_service_2_title', 'label' => 'Başlık', 'name' => 'virt_service_2_title', 'type' => 'text', 'default_value' => 'Microsoft Hyper-V' ),
            array( 'key' => 'field_virt_service_2_description', 'label' => 'Açıklama', 'name' => 'virt_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Native Windows-Virtualisierung mit nahtloser Integration in Ihre Microsoft-Infrastruktur. Ideal für Windows-basierte Workloads.' ),
            array( 'key' => 'field_virt_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'virt_service_2_feature_1', 'type' => 'text', 'default_value' => 'Windows Server Integration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'virt_service_2_feature_2', 'type' => 'text', 'default_value' => 'Live Migration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'virt_service_2_feature_3', 'type' => 'text', 'default_value' => 'Failover Clustering', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'virt_service_2_feature_4', 'type' => 'text', 'default_value' => 'System Center Integration', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3 - Container & Kubernetes
            array( 'key' => 'field_virt_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_service_3_title', 'label' => 'Başlık', 'name' => 'virt_service_3_title', 'type' => 'text', 'default_value' => 'Container & Kubernetes' ),
            array( 'key' => 'field_virt_service_3_description', 'label' => 'Açıklama', 'name' => 'virt_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Moderne Container-Orchestrierung für Cloud-native Anwendungen. Schnelle Bereitstellung und effiziente Ressourcennutzung.' ),
            array( 'key' => 'field_virt_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'virt_service_3_feature_1', 'type' => 'text', 'default_value' => 'Docker Container Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'virt_service_3_feature_2', 'type' => 'text', 'default_value' => 'Kubernetes Cluster Setup', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'virt_service_3_feature_3', 'type' => 'text', 'default_value' => 'CI/CD Pipeline Integration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'virt_service_3_feature_4', 'type' => 'text', 'default_value' => 'Container Registry', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4 - VDI
            array( 'key' => 'field_virt_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_service_4_title', 'label' => 'Başlık', 'name' => 'virt_service_4_title', 'type' => 'text', 'default_value' => 'Virtual Desktop (VDI)' ),
            array( 'key' => 'field_virt_service_4_description', 'label' => 'Açıklama', 'name' => 'virt_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Sichere virtuelle Arbeitsplätze für flexibles Arbeiten. Zentrale Verwaltung und Zugriff von überall.' ),
            array( 'key' => 'field_virt_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'virt_service_4_feature_1', 'type' => 'text', 'default_value' => 'VMware Horizon', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'virt_service_4_feature_2', 'type' => 'text', 'default_value' => 'Microsoft AVD/WVD', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'virt_service_4_feature_3', 'type' => 'text', 'default_value' => 'Citrix Virtual Apps', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'virt_service_4_feature_4', 'type' => 'text', 'default_value' => 'Persistent & Non-Persistent', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 5 - Storage Virtualisierung
            array( 'key' => 'field_virt_service5_tab', 'label' => 'Hizmet 5', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_service_5_title', 'label' => 'Başlık', 'name' => 'virt_service_5_title', 'type' => 'text', 'default_value' => 'Storage Virtualisierung' ),
            array( 'key' => 'field_virt_service_5_description', 'label' => 'Açıklama', 'name' => 'virt_service_5_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Abstrahieren Sie Ihren Speicher für maximale Flexibilität. Software-Defined Storage und Hyper-Converged Infrastructure.' ),
            array( 'key' => 'field_virt_service_5_feature_1', 'label' => 'Özellik 1', 'name' => 'virt_service_5_feature_1', 'type' => 'text', 'default_value' => 'VMware vSAN', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_5_feature_2', 'label' => 'Özellik 2', 'name' => 'virt_service_5_feature_2', 'type' => 'text', 'default_value' => 'Storage Spaces Direct', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_5_feature_3', 'label' => 'Özellik 3', 'name' => 'virt_service_5_feature_3', 'type' => 'text', 'default_value' => 'Nutanix HCI', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_5_feature_4', 'label' => 'Özellik 4', 'name' => 'virt_service_5_feature_4', 'type' => 'text', 'default_value' => 'Deduplication & Compression', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 6 - Netzwerk Virtualisierung
            array( 'key' => 'field_virt_service6_tab', 'label' => 'Hizmet 6', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_service_6_title', 'label' => 'Başlık', 'name' => 'virt_service_6_title', 'type' => 'text', 'default_value' => 'Netzwerk Virtualisierung' ),
            array( 'key' => 'field_virt_service_6_description', 'label' => 'Açıklama', 'name' => 'virt_service_6_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Software-Defined Networking für agile und sichere Netzwerkinfrastruktur. Micro-Segmentierung und zentrale Steuerung.' ),
            array( 'key' => 'field_virt_service_6_feature_1', 'label' => 'Özellik 1', 'name' => 'virt_service_6_feature_1', 'type' => 'text', 'default_value' => 'VMware NSX', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_6_feature_2', 'label' => 'Özellik 2', 'name' => 'virt_service_6_feature_2', 'type' => 'text', 'default_value' => 'Virtual Switches & Routers', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_6_feature_3', 'label' => 'Özellik 3', 'name' => 'virt_service_6_feature_3', 'type' => 'text', 'default_value' => 'Micro-Segmentation', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_virt_service_6_feature_4', 'label' => 'Özellik 4', 'name' => 'virt_service_6_feature_4', 'type' => 'text', 'default_value' => 'Network Automation', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_virt_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_virt_cta_title', 'label' => 'CTA Başlık', 'name' => 'virt_cta_title', 'type' => 'text', 'default_value' => 'Bereit für moderne Virtualisierung?' ),
            array( 'key' => 'field_virt_cta_description', 'label' => 'CTA Açıklama', 'name' => 'virt_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Lassen Sie uns gemeinsam Ihre IT-Infrastruktur optimieren und zukunftssicher gestalten.' ),
            array( 'key' => 'field_virt_cta_button_text', 'label' => 'Buton Metni', 'name' => 'virt_cta_button_text', 'type' => 'text', 'default_value' => 'Kostenlose Analyse anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-virtualisierung.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_virtualisierung_page_fields' );

/**
 * IT Governance & Risk Assessment Sayfa Alanları
 */
function dataenergie_register_beratung_page_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_beratung_page',
        'title'  => 'IT Governance & Risk Assessment Sayfa Ayarları',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array( 'key' => 'field_it_beratung_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_hero_tag', 'label' => 'Hero Etiket', 'name' => 'beratung_hero_tag', 'type' => 'text', 'default_value' => 'IT Governance & Risk Assessment' ),
            array( 'key' => 'field_it_beratung_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'beratung_hero_subtitle', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Strategische IT-Beratung für nachhaltigen Unternehmenserfolg' ),

            // =========================================
            // SEKME 2: PROZESSSCHRITTE
            // =========================================
            array( 'key' => 'field_it_beratung_steps_tab', 'label' => 'Prozessschritte', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_step_1_title', 'label' => 'Schritt 1 Titel', 'name' => 'beratung_step_1_title', 'type' => 'text', 'default_value' => 'Anfrage & Erstgespräch', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_step_1_desc', 'label' => 'Schritt 1 Beschreibung', 'name' => 'beratung_step_1_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Erstes Kennenlernen und Erfassung Ihrer Anforderungen und Ziele in einem unverbindlichen Beratungsgespräch.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_step_2_title', 'label' => 'Schritt 2 Titel', 'name' => 'beratung_step_2_title', 'type' => 'text', 'default_value' => 'Ist-Analyse', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_step_2_desc', 'label' => 'Schritt 2 Beschreibung', 'name' => 'beratung_step_2_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Detaillierte Analyse Ihrer bestehenden IT-Infrastruktur, Prozesse und Systeme.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_step_3_title', 'label' => 'Schritt 3 Titel', 'name' => 'beratung_step_3_title', 'type' => 'text', 'default_value' => 'Strategieentwicklung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_step_3_desc', 'label' => 'Schritt 3 Beschreibung', 'name' => 'beratung_step_3_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Entwicklung einer massgeschneiderten IT-Strategie mit konkreten Handlungsempfehlungen.', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_step_4_title', 'label' => 'Schritt 4 Titel', 'name' => 'beratung_step_4_title', 'type' => 'text', 'default_value' => 'Implementierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_step_4_desc', 'label' => 'Schritt 4 Beschreibung', 'name' => 'beratung_step_4_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Begleitung bei der Umsetzung und kontinuierliche Optimierung Ihrer IT-Landschaft.', 'wrapper' => array( 'width' => '50' ) ),

            // =========================================
            // SEKME 3: HIZMET 1 - IT-Strategie Beratung
            // =========================================
            array( 'key' => 'field_it_beratung_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_service_1_title', 'label' => 'Başlık', 'name' => 'beratung_service_1_title', 'type' => 'text', 'default_value' => 'IT-Strategie Beratung' ),
            array( 'key' => 'field_it_beratung_service_1_desc', 'label' => 'Açıklama', 'name' => 'beratung_service_1_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Entwicklung einer zukunftssicheren IT-Strategie, die Ihre Geschäftsziele optimal unterstützt.' ),
            array( 'key' => 'field_it_beratung_service_1_f1', 'label' => 'Özellik 1', 'name' => 'beratung_service_1_f1', 'type' => 'text', 'default_value' => 'Strategische IT-Roadmap', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_1_f2', 'label' => 'Özellik 2', 'name' => 'beratung_service_1_f2', 'type' => 'text', 'default_value' => 'Technology Assessment', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_1_f3', 'label' => 'Özellik 3', 'name' => 'beratung_service_1_f3', 'type' => 'text', 'default_value' => 'Vendor-unabhängige Beratung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_1_f4', 'label' => 'Özellik 4', 'name' => 'beratung_service_1_f4', 'type' => 'text', 'default_value' => 'ROI-Analyse', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 2 - Infrastruktur-Analyse
            array( 'key' => 'field_it_beratung_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_service_2_title', 'label' => 'Başlık', 'name' => 'beratung_service_2_title', 'type' => 'text', 'default_value' => 'Infrastruktur-Analyse' ),
            array( 'key' => 'field_it_beratung_service_2_desc', 'label' => 'Açıklama', 'name' => 'beratung_service_2_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Umfassende Analyse Ihrer IT-Infrastruktur mit konkreten Optimierungsvorschlägen.' ),
            array( 'key' => 'field_it_beratung_service_2_f1', 'label' => 'Özellik 1', 'name' => 'beratung_service_2_f1', 'type' => 'text', 'default_value' => 'Netzwerk-Assessment', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_2_f2', 'label' => 'Özellik 2', 'name' => 'beratung_service_2_f2', 'type' => 'text', 'default_value' => 'Server & Storage Analyse', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_2_f3', 'label' => 'Özellik 3', 'name' => 'beratung_service_2_f3', 'type' => 'text', 'default_value' => 'Performance-Monitoring', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_2_f4', 'label' => 'Özellik 4', 'name' => 'beratung_service_2_f4', 'type' => 'text', 'default_value' => 'Kapazitätsplanung', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 3 - Security Assessment
            array( 'key' => 'field_it_beratung_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_service_3_title', 'label' => 'Başlık', 'name' => 'beratung_service_3_title', 'type' => 'text', 'default_value' => 'Security Assessment' ),
            array( 'key' => 'field_it_beratung_service_3_desc', 'label' => 'Açıklama', 'name' => 'beratung_service_3_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Identifikation von Sicherheitslücken und Entwicklung einer robusten Security-Strategie.' ),
            array( 'key' => 'field_it_beratung_service_3_f1', 'label' => 'Özellik 1', 'name' => 'beratung_service_3_f1', 'type' => 'text', 'default_value' => 'Schwachstellen-Analyse', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_3_f2', 'label' => 'Özellik 2', 'name' => 'beratung_service_3_f2', 'type' => 'text', 'default_value' => 'Penetrationstests', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_3_f3', 'label' => 'Özellik 3', 'name' => 'beratung_service_3_f3', 'type' => 'text', 'default_value' => 'Compliance-Check', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_3_f4', 'label' => 'Özellik 4', 'name' => 'beratung_service_3_f4', 'type' => 'text', 'default_value' => 'Security-Roadmap', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 4 - Cloud-Readiness Assessment
            array( 'key' => 'field_it_beratung_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_service_4_title', 'label' => 'Başlık', 'name' => 'beratung_service_4_title', 'type' => 'text', 'default_value' => 'Cloud-Readiness Assessment' ),
            array( 'key' => 'field_it_beratung_service_4_desc', 'label' => 'Açıklama', 'name' => 'beratung_service_4_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Analyse Ihrer Cloud-Bereitschaft und Entwicklung einer optimalen Migrationsstrategie.' ),
            array( 'key' => 'field_it_beratung_service_4_f1', 'label' => 'Özellik 1', 'name' => 'beratung_service_4_f1', 'type' => 'text', 'default_value' => 'Workload-Analyse', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_4_f2', 'label' => 'Özellik 2', 'name' => 'beratung_service_4_f2', 'type' => 'text', 'default_value' => 'TCO-Berechnung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_4_f3', 'label' => 'Özellik 3', 'name' => 'beratung_service_4_f3', 'type' => 'text', 'default_value' => 'Migrations-Roadmap', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_4_f4', 'label' => 'Özellik 4', 'name' => 'beratung_service_4_f4', 'type' => 'text', 'default_value' => 'Hybrid-Cloud Strategie', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 5 - Digitale Transformation
            array( 'key' => 'field_it_beratung_service5_tab', 'label' => 'Hizmet 5', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_service_5_title', 'label' => 'Başlık', 'name' => 'beratung_service_5_title', 'type' => 'text', 'default_value' => 'Digitale Transformation' ),
            array( 'key' => 'field_it_beratung_service_5_desc', 'label' => 'Açıklama', 'name' => 'beratung_service_5_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Begleitung Ihres Unternehmens auf dem Weg zur digitalen Exzellenz.' ),
            array( 'key' => 'field_it_beratung_service_5_f1', 'label' => 'Özellik 1', 'name' => 'beratung_service_5_f1', 'type' => 'text', 'default_value' => 'Prozessoptimierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_5_f2', 'label' => 'Özellik 2', 'name' => 'beratung_service_5_f2', 'type' => 'text', 'default_value' => 'Automatisierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_5_f3', 'label' => 'Özellik 3', 'name' => 'beratung_service_5_f3', 'type' => 'text', 'default_value' => 'Change Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_5_f4', 'label' => 'Özellik 4', 'name' => 'beratung_service_5_f4', 'type' => 'text', 'default_value' => 'Schulung & Enablement', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 6 - IT-Kosten Optimierung
            array( 'key' => 'field_it_beratung_service6_tab', 'label' => 'Hizmet 6', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_service_6_title', 'label' => 'Başlık', 'name' => 'beratung_service_6_title', 'type' => 'text', 'default_value' => 'IT-Kosten Optimierung' ),
            array( 'key' => 'field_it_beratung_service_6_desc', 'label' => 'Açıklama', 'name' => 'beratung_service_6_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Identifikation von Einsparpotenzialen ohne Kompromisse bei Qualität und Leistung.' ),
            array( 'key' => 'field_it_beratung_service_6_f1', 'label' => 'Özellik 1', 'name' => 'beratung_service_6_f1', 'type' => 'text', 'default_value' => 'Lizenz-Optimierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_6_f2', 'label' => 'Özellik 2', 'name' => 'beratung_service_6_f2', 'type' => 'text', 'default_value' => 'Vertragsverhandlungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_6_f3', 'label' => 'Özellik 3', 'name' => 'beratung_service_6_f3', 'type' => 'text', 'default_value' => 'Konsolidierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_it_beratung_service_6_f4', 'label' => 'Özellik 4', 'name' => 'beratung_service_6_f4', 'type' => 'text', 'default_value' => 'Kostencontrolling', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_it_beratung_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_it_beratung_cta_title', 'label' => 'CTA Başlık', 'name' => 'beratung_cta_title', 'type' => 'text', 'default_value' => 'Bereit für die Zukunft?' ),
            array( 'key' => 'field_it_beratung_cta_desc', 'label' => 'CTA Açıklama', 'name' => 'beratung_cta_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Vereinbaren Sie jetzt ein unverbindliches Erstgespräch und entdecken Sie Ihr IT-Potenzial.' ),
            array( 'key' => 'field_it_beratung_cta_button', 'label' => 'Buton Metni', 'name' => 'beratung_cta_button', 'type' => 'text', 'default_value' => 'Kostenlose Erstberatung' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-beratung-analyse.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_beratung_page_fields' );

/**
 * IT Outsourcing Sayfa Alanları
 */
function dataenergie_register_outsourcing_page_fields() {
    if ( ! dataenergie_check_acf() ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_outsourcing_page',
        'title'  => 'IT Outsourcing Sayfa Ayarları',
        'fields' => array(
            // =========================================
            // SEKME 1: HERO
            // =========================================
            array( 'key' => 'field_outsourcing_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_hero_tag', 'label' => 'Hero Etiket', 'name' => 'outsourcing_hero_tag', 'type' => 'text', 'default_value' => 'IT Outsourcing' ),
            array( 'key' => 'field_outsourcing_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'outsourcing_hero_subtitle', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Fokussieren Sie sich auf Ihr Kerngeschäft - wir kümmern uns um Ihre IT' ),

            // =========================================
            // SEKME 2: HIZMET 1 - Helpdesk & Support
            // =========================================
            array( 'key' => 'field_outsourcing_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_service_1_title', 'label' => 'Başlık', 'name' => 'outsourcing_service_1_title', 'type' => 'text', 'default_value' => 'Helpdesk & Support' ),
            array( 'key' => 'field_outsourcing_service_1_desc', 'label' => 'Açıklama', 'name' => 'outsourcing_service_1_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Professioneller 1st & 2nd Level Support für Ihre Mitarbeiter. Schnelle Reaktionszeiten und kompetente Hilfe.' ),
            array( 'key' => 'field_outsourcing_service_1_f1', 'label' => 'Özellik 1', 'name' => 'outsourcing_service_1_f1', 'type' => 'text', 'default_value' => '1st & 2nd Level Support', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_1_f2', 'label' => 'Özellik 2', 'name' => 'outsourcing_service_1_f2', 'type' => 'text', 'default_value' => 'Ticket-Management System', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_1_f3', 'label' => 'Özellik 3', 'name' => 'outsourcing_service_1_f3', 'type' => 'text', 'default_value' => 'Remote & Vor-Ort Support', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_1_f4', 'label' => 'Özellik 4', 'name' => 'outsourcing_service_1_f4', 'type' => 'text', 'default_value' => 'Definierte SLAs', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 2 - Infrastructure Management
            array( 'key' => 'field_outsourcing_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_service_2_title', 'label' => 'Başlık', 'name' => 'outsourcing_service_2_title', 'type' => 'text', 'default_value' => 'Infrastructure Management' ),
            array( 'key' => 'field_outsourcing_service_2_desc', 'label' => 'Açıklama', 'name' => 'outsourcing_service_2_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Proaktive Verwaltung und Wartung Ihrer gesamten IT-Infrastruktur.' ),
            array( 'key' => 'field_outsourcing_service_2_f1', 'label' => 'Özellik 1', 'name' => 'outsourcing_service_2_f1', 'type' => 'text', 'default_value' => 'Server & Storage Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_2_f2', 'label' => 'Özellik 2', 'name' => 'outsourcing_service_2_f2', 'type' => 'text', 'default_value' => 'Netzwerk-Administration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_2_f3', 'label' => 'Özellik 3', 'name' => 'outsourcing_service_2_f3', 'type' => 'text', 'default_value' => 'Patch Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_2_f4', 'label' => 'Özellik 4', 'name' => 'outsourcing_service_2_f4', 'type' => 'text', 'default_value' => 'Performance Monitoring', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 3 - Cloud Management
            array( 'key' => 'field_outsourcing_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_service_3_title', 'label' => 'Başlık', 'name' => 'outsourcing_service_3_title', 'type' => 'text', 'default_value' => 'Cloud Management' ),
            array( 'key' => 'field_outsourcing_service_3_desc', 'label' => 'Açıklama', 'name' => 'outsourcing_service_3_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Verwaltung Ihrer Cloud-Umgebungen in Azure, AWS oder hybriden Setups.' ),
            array( 'key' => 'field_outsourcing_service_3_f1', 'label' => 'Özellik 1', 'name' => 'outsourcing_service_3_f1', 'type' => 'text', 'default_value' => 'Azure & Microsoft 365', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_3_f2', 'label' => 'Özellik 2', 'name' => 'outsourcing_service_3_f2', 'type' => 'text', 'default_value' => 'Cloud-Optimierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_3_f3', 'label' => 'Özellik 3', 'name' => 'outsourcing_service_3_f3', 'type' => 'text', 'default_value' => 'Cost Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_3_f4', 'label' => 'Özellik 4', 'name' => 'outsourcing_service_3_f4', 'type' => 'text', 'default_value' => 'Hybrid Cloud Support', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 4 - Security Operations
            array( 'key' => 'field_outsourcing_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_service_4_title', 'label' => 'Başlık', 'name' => 'outsourcing_service_4_title', 'type' => 'text', 'default_value' => 'Security Operations' ),
            array( 'key' => 'field_outsourcing_service_4_desc', 'label' => 'Açıklama', 'name' => 'outsourcing_service_4_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Kontinuierlicher Schutz Ihrer IT durch Monitoring, Incident Response und Prävention.' ),
            array( 'key' => 'field_outsourcing_service_4_f1', 'label' => 'Özellik 1', 'name' => 'outsourcing_service_4_f1', 'type' => 'text', 'default_value' => '24/7 Security Monitoring', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_4_f2', 'label' => 'Özellik 2', 'name' => 'outsourcing_service_4_f2', 'type' => 'text', 'default_value' => 'Incident Response', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_4_f3', 'label' => 'Özellik 3', 'name' => 'outsourcing_service_4_f3', 'type' => 'text', 'default_value' => 'Vulnerability Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_4_f4', 'label' => 'Özellik 4', 'name' => 'outsourcing_service_4_f4', 'type' => 'text', 'default_value' => 'Security Awareness', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 5 - Backup & Disaster Recovery
            array( 'key' => 'field_outsourcing_service5_tab', 'label' => 'Hizmet 5', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_service_5_title', 'label' => 'Başlık', 'name' => 'outsourcing_service_5_title', 'type' => 'text', 'default_value' => 'Backup & Disaster Recovery' ),
            array( 'key' => 'field_outsourcing_service_5_desc', 'label' => 'Açıklama', 'name' => 'outsourcing_service_5_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Zuverlässige Datensicherung und schnelle Wiederherstellung im Ernstfall.' ),
            array( 'key' => 'field_outsourcing_service_5_f1', 'label' => 'Özellik 1', 'name' => 'outsourcing_service_5_f1', 'type' => 'text', 'default_value' => 'Automatisierte Backups', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_5_f2', 'label' => 'Özellik 2', 'name' => 'outsourcing_service_5_f2', 'type' => 'text', 'default_value' => 'Disaster Recovery Planung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_5_f3', 'label' => 'Özellik 3', 'name' => 'outsourcing_service_5_f3', 'type' => 'text', 'default_value' => 'Regelmässige Tests', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_5_f4', 'label' => 'Özellik 4', 'name' => 'outsourcing_service_5_f4', 'type' => 'text', 'default_value' => 'Geo-redundante Speicherung', 'wrapper' => array( 'width' => '50' ) ),

            // HIZMET 6 - Workplace Management
            array( 'key' => 'field_outsourcing_service6_tab', 'label' => 'Hizmet 6', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_service_6_title', 'label' => 'Başlık', 'name' => 'outsourcing_service_6_title', 'type' => 'text', 'default_value' => 'Workplace Management' ),
            array( 'key' => 'field_outsourcing_service_6_desc', 'label' => 'Açıklama', 'name' => 'outsourcing_service_6_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Verwaltung aller Endgeräte und Arbeitsplätze Ihrer Mitarbeiter.' ),
            array( 'key' => 'field_outsourcing_service_6_f1', 'label' => 'Özellik 1', 'name' => 'outsourcing_service_6_f1', 'type' => 'text', 'default_value' => 'Device Lifecycle Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_6_f2', 'label' => 'Özellik 2', 'name' => 'outsourcing_service_6_f2', 'type' => 'text', 'default_value' => 'Software Deployment', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_6_f3', 'label' => 'Özellik 3', 'name' => 'outsourcing_service_6_f3', 'type' => 'text', 'default_value' => 'Endpoint Security', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_outsourcing_service_6_f4', 'label' => 'Özellik 4', 'name' => 'outsourcing_service_6_f4', 'type' => 'text', 'default_value' => 'Mobile Device Management', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_outsourcing_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_outsourcing_cta_title', 'label' => 'CTA Başlık', 'name' => 'outsourcing_cta_title', 'type' => 'text', 'default_value' => 'Entlasten Sie Ihr Team' ),
            array( 'key' => 'field_outsourcing_cta_desc', 'label' => 'CTA Açıklama', 'name' => 'outsourcing_cta_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Erfahren Sie, wie IT Outsourcing Ihr Unternehmen voranbringt.' ),
            array( 'key' => 'field_outsourcing_cta_button', 'label' => 'Buton Metni', 'name' => 'outsourcing_cta_button', 'type' => 'text', 'default_value' => 'Unverbindliches Angebot' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-it-outsourcing.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_outsourcing_page_fields' );

/* ==========================================================================
   IT SERVICES PAGE - 6 SERVICE CARDS
   ========================================================================== */
function dataenergie_register_it_services_page_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'    => 'group_it_services_page',
        'title'  => 'IT Services Sayfası - 6 Hizmet Kartı',
        'fields' => array(
            // SERVICE 1
            array( 'key' => 'field_itsp_service1_tab', 'label' => 'Service 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_itsp_service_1_title', 'label' => 'Başlık', 'name' => 'itsp_service_1_title', 'type' => 'text', 'default_value' => 'Microsoft 365 & Modern Workplace' ),
            array( 'key' => 'field_itsp_service_1_desc', 'label' => 'Açıklama', 'name' => 'itsp_service_1_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Effiziente Zusammenarbeit beginnt mit der richtigen Plattform. Wir konzipieren, implementieren und betreiben Microsoft-365-Umgebungen, die Sicherheit, Governance und Benutzerfreundlichkeit vereinen.' ),
            array( 'key' => 'field_itsp_service_1_f1', 'label' => 'Feature 1', 'name' => 'itsp_service_1_f1', 'type' => 'text', 'default_value' => 'Tenant-Design & Migration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_1_f2', 'label' => 'Feature 2', 'name' => 'itsp_service_1_f2', 'type' => 'text', 'default_value' => 'Microsoft Teams & SharePoint Strukturen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_1_f3', 'label' => 'Feature 3', 'name' => 'itsp_service_1_f3', 'type' => 'text', 'default_value' => 'Entra ID, Conditional Access & MFA', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_1_f4', 'label' => 'Feature 4', 'name' => 'itsp_service_1_f4', 'type' => 'text', 'default_value' => 'Governance & Zugriffskonzepte', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_itsp_service2_tab', 'label' => 'Service 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_itsp_service_2_title', 'label' => 'Başlık', 'name' => 'itsp_service_2_title', 'type' => 'text', 'default_value' => 'Security & Zero Trust' ),
            array( 'key' => 'field_itsp_service_2_desc', 'label' => 'Açıklama', 'name' => 'itsp_service_2_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'IT-Sicherheit beginnt bei Identitäten. Wir entwickeln ganzheitliche Sicherheitskonzepte nach dem Zero-Trust-Prinzip und schützen Benutzer, Daten und Systeme vor modernen Bedrohungen.' ),
            array( 'key' => 'field_itsp_service_2_f1', 'label' => 'Feature 1', 'name' => 'itsp_service_2_f1', 'type' => 'text', 'default_value' => 'Zero-Trust Architektur', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_2_f2', 'label' => 'Feature 2', 'name' => 'itsp_service_2_f2', 'type' => 'text', 'default_value' => 'MFA & Passwordless Authentication', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_2_f3', 'label' => 'Feature 3', 'name' => 'itsp_service_2_f3', 'type' => 'text', 'default_value' => 'Privileged Access & Admin-Sicherheit', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_2_f4', 'label' => 'Feature 4', 'name' => 'itsp_service_2_f4', 'type' => 'text', 'default_value' => 'Guest- & External-User-Management', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_itsp_service3_tab', 'label' => 'Service 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_itsp_service_3_title', 'label' => 'Başlık', 'name' => 'itsp_service_3_title', 'type' => 'text', 'default_value' => 'IT Governance & Risk Assessment' ),
            array( 'key' => 'field_itsp_service_3_desc', 'label' => 'Açıklama', 'name' => 'itsp_service_3_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Transparenz über Risiken ist die Basis guter Entscheidungen. Mit strukturierten IT-Governance- und Security-Assessments identifizieren wir Risiken, Sicherheitslücken und Optimierungspotenziale.' ),
            array( 'key' => 'field_itsp_service_3_f1', 'label' => 'Feature 1', 'name' => 'itsp_service_3_f1', 'type' => 'text', 'default_value' => 'Management-Report (PDF)', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_3_f2', 'label' => 'Feature 2', 'name' => 'itsp_service_3_f2', 'type' => 'text', 'default_value' => 'Risiko-Score & Prioritäten', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_3_f3', 'label' => 'Feature 3', 'name' => 'itsp_service_3_f3', 'type' => 'text', 'default_value' => 'Konkrete Handlungsempfehlungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_3_f4', 'label' => 'Feature 4', 'name' => 'itsp_service_3_f4', 'type' => 'text', 'default_value' => 'Compliance- & Sicherheitsübersicht', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4
            array( 'key' => 'field_itsp_service4_tab', 'label' => 'Service 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_itsp_service_4_title', 'label' => 'Başlık', 'name' => 'itsp_service_4_title', 'type' => 'text', 'default_value' => 'Cloud & Hybrid IT' ),
            array( 'key' => 'field_itsp_service_4_desc', 'label' => 'Açıklama', 'name' => 'itsp_service_4_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Cloud-Lösungen, die zu Ihrer Realität passen. Wir planen und betreiben Azure- und Hybrid-Infrastrukturen, die bestehende Systeme nahtlos integrieren und zukunftssicher skalierbar sind.' ),
            array( 'key' => 'field_itsp_service_4_f1', 'label' => 'Feature 1', 'name' => 'itsp_service_4_f1', 'type' => 'text', 'default_value' => 'Azure Architektur & Landing Zones', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_4_f2', 'label' => 'Feature 2', 'name' => 'itsp_service_4_f2', 'type' => 'text', 'default_value' => 'Hybrid AD / Entra ID', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_4_f3', 'label' => 'Feature 3', 'name' => 'itsp_service_4_f3', 'type' => 'text', 'default_value' => 'Backup & Disaster Recovery', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_4_f4', 'label' => 'Feature 4', 'name' => 'itsp_service_4_f4', 'type' => 'text', 'default_value' => 'Kosten- & Sicherheitsoptimierung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 5
            array( 'key' => 'field_itsp_service5_tab', 'label' => 'Service 5', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_itsp_service_5_title', 'label' => 'Başlık', 'name' => 'itsp_service_5_title', 'type' => 'text', 'default_value' => 'Automation & IT Efficiency' ),
            array( 'key' => 'field_itsp_service_5_desc', 'label' => 'Açıklama', 'name' => 'itsp_service_5_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Weniger manuelle Arbeit. Mehr Kontrolle. Durch gezielte Automatisierung reduzieren wir Fehler, beschleunigen Prozesse und erhöhen die Betriebssicherheit Ihrer IT.' ),
            array( 'key' => 'field_itsp_service_5_f1', 'label' => 'Feature 1', 'name' => 'itsp_service_5_f1', 'type' => 'text', 'default_value' => 'Benutzer- & Zugriffsautomatisierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_5_f2', 'label' => 'Feature 2', 'name' => 'itsp_service_5_f2', 'type' => 'text', 'default_value' => 'Microsoft 365 Provisioning', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_5_f3', 'label' => 'Feature 3', 'name' => 'itsp_service_5_f3', 'type' => 'text', 'default_value' => 'Security Checks & Reports', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_5_f4', 'label' => 'Feature 4', 'name' => 'itsp_service_5_f4', 'type' => 'text', 'default_value' => 'Skript- & Prozessautomatisierung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 6
            array( 'key' => 'field_itsp_service6_tab', 'label' => 'Service 6', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_itsp_service_6_title', 'label' => 'Başlık', 'name' => 'itsp_service_6_title', 'type' => 'text', 'default_value' => 'IT Support & Managed Services' ),
            array( 'key' => 'field_itsp_service_6_desc', 'label' => 'Açıklama', 'name' => 'itsp_service_6_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Zuverlässiger IT-Betrieb ohne Komplexität. Wir übernehmen den stabilen Betrieb Ihrer IT-Umgebung – strukturiert, transparent und mit klaren Zuständigkeiten.' ),
            array( 'key' => 'field_itsp_service_6_f1', 'label' => 'Feature 1', 'name' => 'itsp_service_6_f1', 'type' => 'text', 'default_value' => '1st & 2nd Level Support', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_6_f2', 'label' => 'Feature 2', 'name' => 'itsp_service_6_f2', 'type' => 'text', 'default_value' => 'Monitoring & Wartung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_6_f3', 'label' => 'Feature 3', 'name' => 'itsp_service_6_f3', 'type' => 'text', 'default_value' => 'Incident- & Problem-Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_itsp_service_6_f4', 'label' => 'Feature 4', 'name' => 'itsp_service_6_f4', 'type' => 'text', 'default_value' => 'SLA-basierte Services', 'wrapper' => array( 'width' => '50' ) ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-it-services.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_it_services_page_fields' );

/* ==========================================================================
   MICROSOFT 365 PAGE - 4 SERVICE CARDS
   ========================================================================== */
function dataenergie_register_microsoft_365_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_microsoft_365',
        'title'  => 'Microsoft 365 - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_m365_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_m365_hero_tag', 'label' => 'Hero Tag', 'name' => 'm365_hero_tag', 'type' => 'text', 'default_value' => 'IT Solutions' ),
            array( 'key' => 'field_m365_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'm365_hero_subtitle', 'type' => 'text', 'default_value' => 'Produktive Zusammenarbeit mit Microsoft Cloud-Lösungen' ),

            // SERVICE 1
            array( 'key' => 'field_m365_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_m365_service_1_icon', 'label' => 'İkon', 'name' => 'm365_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'mail', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_m365_service_1_title', 'label' => 'Başlık', 'name' => 'm365_service_1_title', 'type' => 'text', 'default_value' => 'Exchange Online', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_m365_service_1_description', 'label' => 'Açıklama', 'name' => 'm365_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Professionelle E-Mail-Kommunikation mit Exchange Online. Sicherer, zuverlässiger und überall verfügbar.' ),
            array( 'key' => 'field_m365_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'm365_service_1_feature_1', 'type' => 'text', 'default_value' => '50 GB Postfach pro Benutzer', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'm365_service_1_feature_2', 'type' => 'text', 'default_value' => 'Erweiterte Sicherheit & Spam-Filter', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'm365_service_1_feature_3', 'type' => 'text', 'default_value' => 'Kalender & Kontaktverwaltung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'm365_service_1_feature_4', 'type' => 'text', 'default_value' => 'Mobile Apps für iOS & Android', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_m365_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_m365_service_2_icon', 'label' => 'İkon', 'name' => 'm365_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'users', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_m365_service_2_title', 'label' => 'Başlık', 'name' => 'm365_service_2_title', 'type' => 'text', 'default_value' => 'Microsoft Teams', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_m365_service_2_description', 'label' => 'Açıklama', 'name' => 'm365_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Moderne Teamarbeit mit Chat, Videobesprechungen und gemeinsamer Dokumentenbearbeitung in Echtzeit.' ),
            array( 'key' => 'field_m365_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'm365_service_2_feature_1', 'type' => 'text', 'default_value' => 'HD-Videokonferenzen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'm365_service_2_feature_2', 'type' => 'text', 'default_value' => 'Team-Channels & Chat', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'm365_service_2_feature_3', 'type' => 'text', 'default_value' => 'Bildschirmfreigabe', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'm365_service_2_feature_4', 'type' => 'text', 'default_value' => 'Integration mit Office-Apps', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_m365_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_m365_service_3_icon', 'label' => 'İkon', 'name' => 'm365_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'cloud', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_m365_service_3_title', 'label' => 'Başlık', 'name' => 'm365_service_3_title', 'type' => 'text', 'default_value' => 'SharePoint & OneDrive', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_m365_service_3_description', 'label' => 'Açıklama', 'name' => 'm365_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Sichere Dokumentenverwaltung und Cloud-Speicher für Ihr Unternehmen mit nahtloser Office-Integration.' ),
            array( 'key' => 'field_m365_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'm365_service_3_feature_1', 'type' => 'text', 'default_value' => '1 TB Cloud-Speicher pro Benutzer', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'm365_service_3_feature_2', 'type' => 'text', 'default_value' => 'Dokumenten-Versionierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'm365_service_3_feature_3', 'type' => 'text', 'default_value' => 'Intranet & Team-Sites', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'm365_service_3_feature_4', 'type' => 'text', 'default_value' => 'Externe Freigabe mit Kontrolle', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4
            array( 'key' => 'field_m365_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_m365_service_4_icon', 'label' => 'İkon', 'name' => 'm365_service_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'shield', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_m365_service_4_title', 'label' => 'Başlık', 'name' => 'm365_service_4_title', 'type' => 'text', 'default_value' => 'Entra ID & Security', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_m365_service_4_description', 'label' => 'Açıklama', 'name' => 'm365_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Zentrale Identitäts- und Zugriffsverwaltung mit Microsoft Entra ID (ehemals Azure AD). Sicherheit und Compliance für Ihr Unternehmen.' ),
            array( 'key' => 'field_m365_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'm365_service_4_feature_1', 'type' => 'text', 'default_value' => 'Single Sign-On (SSO)', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'm365_service_4_feature_2', 'type' => 'text', 'default_value' => 'Multi-Factor Authentication', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'm365_service_4_feature_3', 'type' => 'text', 'default_value' => 'Conditional Access Policies', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_m365_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'm365_service_4_feature_4', 'type' => 'text', 'default_value' => 'Identity Protection', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_m365_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_m365_cta_title', 'label' => 'CTA Başlık', 'name' => 'm365_cta_title', 'type' => 'text', 'default_value' => 'Bereit für Microsoft 365?' ),
            array( 'key' => 'field_m365_cta_description', 'label' => 'CTA Açıklama', 'name' => 'm365_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir beraten Sie gerne zu den passenden Lizenzen und der optimalen Konfiguration für Ihr Unternehmen.' ),
            array( 'key' => 'field_m365_cta_button_text', 'label' => 'Buton Metni', 'name' => 'm365_cta_button_text', 'type' => 'text', 'default_value' => 'Jetzt beraten lassen' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-microsoft-365.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_microsoft_365_fields' );

/* ==========================================================================
   AUTOMATION & IT EFFICIENCY PAGE - 4 SERVICE CARDS
   ========================================================================== */
function dataenergie_register_automation_efficiency_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    $icon_choices = dataenergie_get_icon_choices();

    acf_add_local_field_group( array(
        'key'    => 'group_automation_efficiency',
        'title'  => 'Automation & IT Efficiency - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_auto_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_auto_hero_tag', 'label' => 'Hero Tag', 'name' => 'auto_hero_tag', 'type' => 'text', 'default_value' => 'IT Solutions' ),
            array( 'key' => 'field_auto_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'auto_hero_subtitle', 'type' => 'text', 'default_value' => 'Automatisieren Sie Ihre IT-Prozesse für mehr Effizienz und Sicherheit' ),

            // SERVICE 1
            array( 'key' => 'field_auto_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_auto_service_1_icon', 'label' => 'İkon', 'name' => 'auto_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'workflow', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_auto_service_1_title', 'label' => 'Başlık', 'name' => 'auto_service_1_title', 'type' => 'text', 'default_value' => 'Benutzer-Automatisierung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_auto_service_1_description', 'label' => 'Açıklama', 'name' => 'auto_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Automatische Benutzerkonten-Verwaltung von der Einstellung bis zum Austritt. Zugriffsrechte werden konsistent und fehlerfrei zugewiesen.' ),
            array( 'key' => 'field_auto_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'auto_service_1_feature_1', 'type' => 'text', 'default_value' => 'Onboarding-Workflows', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'auto_service_1_feature_2', 'type' => 'text', 'default_value' => 'Automatische Rechtevergabe', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'auto_service_1_feature_3', 'type' => 'text', 'default_value' => 'Offboarding-Prozesse', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'auto_service_1_feature_4', 'type' => 'text', 'default_value' => 'Lifecycle-Management', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_auto_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_auto_service_2_icon', 'label' => 'İkon', 'name' => 'auto_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'zap', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_auto_service_2_title', 'label' => 'Başlık', 'name' => 'auto_service_2_title', 'type' => 'text', 'default_value' => 'Microsoft 365 Provisioning', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_auto_service_2_description', 'label' => 'Açıklama', 'name' => 'auto_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Standardisierte und automatisierte Bereitstellung von Teams, SharePoint-Sites und Mailboxen nach Ihren Governance-Vorgaben.' ),
            array( 'key' => 'field_auto_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'auto_service_2_feature_1', 'type' => 'text', 'default_value' => 'Teams-Provisioning', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'auto_service_2_feature_2', 'type' => 'text', 'default_value' => 'SharePoint Site Creation', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'auto_service_2_feature_3', 'type' => 'text', 'default_value' => 'Exchange-Automatisierung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'auto_service_2_feature_4', 'type' => 'text', 'default_value' => 'Template-basierte Deployment', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_auto_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_auto_service_3_icon', 'label' => 'İkon', 'name' => 'auto_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'activity', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_auto_service_3_title', 'label' => 'Başlık', 'name' => 'auto_service_3_title', 'type' => 'text', 'default_value' => 'Security Checks & Monitoring', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_auto_service_3_description', 'label' => 'Açıklama', 'name' => 'auto_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Kontinuierliche automatische Sicherheitsüberprüfungen und Compliance-Monitoring Ihrer IT-Umgebung.' ),
            array( 'key' => 'field_auto_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'auto_service_3_feature_1', 'type' => 'text', 'default_value' => 'Security Compliance Checks', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'auto_service_3_feature_2', 'type' => 'text', 'default_value' => 'Automated Reporting', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'auto_service_3_feature_3', 'type' => 'text', 'default_value' => 'Anomalie-Erkennung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'auto_service_3_feature_4', 'type' => 'text', 'default_value' => 'Alerting & Notifications', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4
            array( 'key' => 'field_auto_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_auto_service_4_icon', 'label' => 'İkon', 'name' => 'auto_service_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'cpu', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_auto_service_4_title', 'label' => 'Başlık', 'name' => 'auto_service_4_title', 'type' => 'text', 'default_value' => 'PowerShell & API Integration', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_auto_service_4_description', 'label' => 'Açıklama', 'name' => 'auto_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Individuelle Automatisierungslösungen durch PowerShell-Skripte und API-Integrationen für Ihre spezifischen Anforderungen.' ),
            array( 'key' => 'field_auto_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'auto_service_4_feature_1', 'type' => 'text', 'default_value' => 'Custom PowerShell Scripts', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'auto_service_4_feature_2', 'type' => 'text', 'default_value' => 'Microsoft Graph API', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'auto_service_4_feature_3', 'type' => 'text', 'default_value' => 'Azure Automation', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_auto_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'auto_service_4_feature_4', 'type' => 'text', 'default_value' => 'Third-Party Integrationen', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_auto_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_auto_cta_title', 'label' => 'CTA Başlık', 'name' => 'auto_cta_title', 'type' => 'text', 'default_value' => 'Bereit für effizientere IT-Prozesse?' ),
            array( 'key' => 'field_auto_cta_description', 'label' => 'CTA Açıklama', 'name' => 'auto_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Lassen Sie uns gemeinsam evaluieren, welche Prozesse in Ihrer IT automatisiert werden können.' ),
            array( 'key' => 'field_auto_cta_button_text', 'label' => 'Buton Metni', 'name' => 'auto_cta_button_text', 'type' => 'text', 'default_value' => 'Automation-Potenzial analysieren' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-automation-efficiency.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_automation_efficiency_fields' );


/* ==========================================================================
   WORKFORCE MANAGEMENT PAGE - 4 SERVICE CARDS
   ========================================================================== */
function dataenergie_register_workforce_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    $icon_choices = array(
        'clock'      => 'Clock',
        'users'      => 'Users',
        'calendar'   => 'Calendar',
        'clipboard'  => 'Clipboard',
        'bar-chart'  => 'Bar Chart',
        'smartphone' => 'Smartphone',
    );

    acf_add_local_field_group( array(
        'key'    => 'group_workforce_management',
        'title'  => 'Workforce Management - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_wfm_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_wfm_hero_tag', 'label' => 'Hero Tag', 'name' => 'wfm_hero_tag', 'type' => 'text', 'default_value' => 'Business Solutions' ),
            array( 'key' => 'field_wfm_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'wfm_hero_subtitle', 'type' => 'text', 'default_value' => 'Digitale Zeiterfassung und Mitarbeiterverwaltung für Ihr Unternehmen' ),

            // SERVICE 1
            array( 'key' => 'field_wfm_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_wfm_service_1_icon', 'label' => 'İkon', 'name' => 'wfm_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'clock', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_wfm_service_1_title', 'label' => 'Başlık', 'name' => 'wfm_service_1_title', 'type' => 'text', 'default_value' => 'Digitale Zeiterfassung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_wfm_service_1_description', 'label' => 'Açıklama', 'name' => 'wfm_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Moderne und rechtskonforme Zeiterfassung für alle Mitarbeiter. Einfache Bedienung via Web, Terminal oder mobiler App.' ),
            array( 'key' => 'field_wfm_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'wfm_service_1_feature_1', 'type' => 'text', 'default_value' => 'Web-basierte Stempeluhr', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'wfm_service_1_feature_2', 'type' => 'text', 'default_value' => 'Mobile App für Aussendienst', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'wfm_service_1_feature_3', 'type' => 'text', 'default_value' => 'Hardware-Terminals', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'wfm_service_1_feature_4', 'type' => 'text', 'default_value' => 'Gesetzeskonforme Erfassung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_wfm_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_wfm_service_2_icon', 'label' => 'İkon', 'name' => 'wfm_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'calendar', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_wfm_service_2_title', 'label' => 'Başlık', 'name' => 'wfm_service_2_title', 'type' => 'text', 'default_value' => 'Absenzen & Ferien', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_wfm_service_2_description', 'label' => 'Açıklama', 'name' => 'wfm_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Übersichtliche Verwaltung von Ferien, Krankheit und anderen Abwesenheiten mit automatischen Genehmigungsworkflows.' ),
            array( 'key' => 'field_wfm_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'wfm_service_2_feature_1', 'type' => 'text', 'default_value' => 'Ferienplanung & Anträge', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'wfm_service_2_feature_2', 'type' => 'text', 'default_value' => 'Krankheitsmeldungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'wfm_service_2_feature_3', 'type' => 'text', 'default_value' => 'Genehmigungsworkflows', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'wfm_service_2_feature_4', 'type' => 'text', 'default_value' => 'Saldo-Übersicht', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_wfm_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_wfm_service_3_icon', 'label' => 'İkon', 'name' => 'wfm_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'users', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_wfm_service_3_title', 'label' => 'Başlık', 'name' => 'wfm_service_3_title', 'type' => 'text', 'default_value' => 'Personalplanung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_wfm_service_3_description', 'label' => 'Açıklama', 'name' => 'wfm_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Effiziente Schicht- und Einsatzplanung. Ressourcen optimal einsetzen und Engpässe frühzeitig erkennen.' ),
            array( 'key' => 'field_wfm_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'wfm_service_3_feature_1', 'type' => 'text', 'default_value' => 'Schichtplanung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'wfm_service_3_feature_2', 'type' => 'text', 'default_value' => 'Ressourcenübersicht', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'wfm_service_3_feature_3', 'type' => 'text', 'default_value' => 'Skill-Management', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'wfm_service_3_feature_4', 'type' => 'text', 'default_value' => 'Kapazitätsplanung', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4
            array( 'key' => 'field_wfm_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_wfm_service_4_icon', 'label' => 'İkon', 'name' => 'wfm_service_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'bar-chart', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_wfm_service_4_title', 'label' => 'Başlık', 'name' => 'wfm_service_4_title', 'type' => 'text', 'default_value' => 'Reporting & Analytics', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_wfm_service_4_description', 'label' => 'Açıklama', 'name' => 'wfm_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Detaillierte Auswertungen und Berichte für bessere Entscheidungen. Export für Lohnbuchhaltung und Controlling.' ),
            array( 'key' => 'field_wfm_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'wfm_service_4_feature_1', 'type' => 'text', 'default_value' => 'Arbeitszeit-Reports', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'wfm_service_4_feature_2', 'type' => 'text', 'default_value' => 'Überstunden-Analyse', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'wfm_service_4_feature_3', 'type' => 'text', 'default_value' => 'Lohnexport-Schnittstelle', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_wfm_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'wfm_service_4_feature_4', 'type' => 'text', 'default_value' => 'Dashboard & KPIs', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_wfm_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_wfm_cta_title', 'label' => 'CTA Başlık', 'name' => 'wfm_cta_title', 'type' => 'text', 'default_value' => 'Bereit für effizientes Workforce Management?' ),
            array( 'key' => 'field_wfm_cta_description', 'label' => 'CTA Açıklama', 'name' => 'wfm_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir zeigen Ihnen, wie Sie Zeiterfassung und Personalplanung digitalisieren können.' ),
            array( 'key' => 'field_wfm_cta_button_text', 'label' => 'Buton Metni', 'name' => 'wfm_cta_button_text', 'type' => 'text', 'default_value' => 'Demo anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-workforce-management.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_workforce_fields' );

/* ==========================================================================
   SMART BUILDING PAGE - 4 SERVICE CARDS
   ========================================================================== */
function dataenergie_register_smart_building_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    $icon_choices = array(
        'home'        => 'Home',
        'calendar'    => 'Calendar',
        'smartphone'  => 'Smartphone',
        'droplet'     => 'Droplet',
        'credit-card' => 'Credit Card',
        'settings'    => 'Settings',
    );

    acf_add_local_field_group( array(
        'key'    => 'group_smart_building',
        'title'  => 'Smart Building - Sayfa İçerikleri',
        'fields' => array(
            // HERO
            array( 'key' => 'field_sb_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_sb_hero_tag', 'label' => 'Hero Tag', 'name' => 'sb_hero_tag', 'type' => 'text', 'default_value' => 'Business Solutions' ),
            array( 'key' => 'field_sb_hero_subtitle', 'label' => 'Hero Alt Başlık', 'name' => 'sb_hero_subtitle', 'type' => 'text', 'default_value' => 'Intelligente Buchungssysteme für Gemeinschaftsräume und Waschküchen' ),

            // SERVICE 1
            array( 'key' => 'field_sb_service1_tab', 'label' => 'Hizmet 1', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_sb_service_1_icon', 'label' => 'İkon', 'name' => 'sb_service_1_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'droplet', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_sb_service_1_title', 'label' => 'Başlık', 'name' => 'sb_service_1_title', 'type' => 'text', 'default_value' => 'WashSlot Waschküchen-Buchung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_sb_service_1_description', 'label' => 'Açıklama', 'name' => 'sb_service_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Digitales Buchungssystem für Waschküchen in Mehrfamilienhäusern. Schluss mit Konflikten und handschriftlichen Listen.' ),
            array( 'key' => 'field_sb_service_1_feature_1', 'label' => 'Özellik 1', 'name' => 'sb_service_1_feature_1', 'type' => 'text', 'default_value' => 'Online-Buchung via App', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_1_feature_2', 'label' => 'Özellik 2', 'name' => 'sb_service_1_feature_2', 'type' => 'text', 'default_value' => 'Automatische Erinnerungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_1_feature_3', 'label' => 'Özellik 3', 'name' => 'sb_service_1_feature_3', 'type' => 'text', 'default_value' => 'Konfliktfreie Zeitslots', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_1_feature_4', 'label' => 'Özellik 4', 'name' => 'sb_service_1_feature_4', 'type' => 'text', 'default_value' => 'Buchungshistorie', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 2
            array( 'key' => 'field_sb_service2_tab', 'label' => 'Hizmet 2', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_sb_service_2_icon', 'label' => 'İkon', 'name' => 'sb_service_2_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'home', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_sb_service_2_title', 'label' => 'Başlık', 'name' => 'sb_service_2_title', 'type' => 'text', 'default_value' => 'Gemeinschaftsraum-Buchung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_sb_service_2_description', 'label' => 'Açıklama', 'name' => 'sb_service_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Einfache Reservierung von Gemeinschaftsräumen, Sitzungszimmern oder Hobbyräumen für alle Bewohner.' ),
            array( 'key' => 'field_sb_service_2_feature_1', 'label' => 'Özellik 1', 'name' => 'sb_service_2_feature_1', 'type' => 'text', 'default_value' => 'Raumverwaltung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_2_feature_2', 'label' => 'Özellik 2', 'name' => 'sb_service_2_feature_2', 'type' => 'text', 'default_value' => 'Kapazitätsplanung', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_2_feature_3', 'label' => 'Özellik 3', 'name' => 'sb_service_2_feature_3', 'type' => 'text', 'default_value' => 'Nutzungsregeln', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_2_feature_4', 'label' => 'Özellik 4', 'name' => 'sb_service_2_feature_4', 'type' => 'text', 'default_value' => 'Verfügbarkeitsanzeige', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 3
            array( 'key' => 'field_sb_service3_tab', 'label' => 'Hizmet 3', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_sb_service_3_icon', 'label' => 'İkon', 'name' => 'sb_service_3_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'smartphone', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_sb_service_3_title', 'label' => 'Başlık', 'name' => 'sb_service_3_title', 'type' => 'text', 'default_value' => 'Mobile App & Benachrichtigungen', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_sb_service_3_description', 'label' => 'Açıklama', 'name' => 'sb_service_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Benutzerfreundliche App für alle Bewohner mit Push-Benachrichtigungen und automatischen Erinnerungen.' ),
            array( 'key' => 'field_sb_service_3_feature_1', 'label' => 'Özellik 1', 'name' => 'sb_service_3_feature_1', 'type' => 'text', 'default_value' => 'iOS & Android App', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_3_feature_2', 'label' => 'Özellik 2', 'name' => 'sb_service_3_feature_2', 'type' => 'text', 'default_value' => 'Push-Benachrichtigungen', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_3_feature_3', 'label' => 'Özellik 3', 'name' => 'sb_service_3_feature_3', 'type' => 'text', 'default_value' => 'Kalender-Integration', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_3_feature_4', 'label' => 'Özellik 4', 'name' => 'sb_service_3_feature_4', 'type' => 'text', 'default_value' => 'Mehrsprachig', 'wrapper' => array( 'width' => '50' ) ),

            // SERVICE 4
            array( 'key' => 'field_sb_service4_tab', 'label' => 'Hizmet 4', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_sb_service_4_icon', 'label' => 'İkon', 'name' => 'sb_service_4_icon', 'type' => 'select', 'choices' => $icon_choices, 'default_value' => 'settings', 'wrapper' => array( 'width' => '30' ) ),
            array( 'key' => 'field_sb_service_4_title', 'label' => 'Başlık', 'name' => 'sb_service_4_title', 'type' => 'text', 'default_value' => 'Verwaltung & Abrechnung', 'wrapper' => array( 'width' => '70' ) ),
            array( 'key' => 'field_sb_service_4_description', 'label' => 'Açıklama', 'name' => 'sb_service_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Zentrale Verwaltungsoberfläche für Hauswarte und Immobilienverwaltungen mit Nutzungsstatistiken.' ),
            array( 'key' => 'field_sb_service_4_feature_1', 'label' => 'Özellik 1', 'name' => 'sb_service_4_feature_1', 'type' => 'text', 'default_value' => 'Admin-Dashboard', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_4_feature_2', 'label' => 'Özellik 2', 'name' => 'sb_service_4_feature_2', 'type' => 'text', 'default_value' => 'Nutzungsstatistiken', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_4_feature_3', 'label' => 'Özellik 3', 'name' => 'sb_service_4_feature_3', 'type' => 'text', 'default_value' => 'Kostenumlage', 'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_sb_service_4_feature_4', 'label' => 'Özellik 4', 'name' => 'sb_service_4_feature_4', 'type' => 'text', 'default_value' => 'Multi-Liegenschaft', 'wrapper' => array( 'width' => '50' ) ),

            // CTA
            array( 'key' => 'field_sb_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'left' ),
            array( 'key' => 'field_sb_cta_title', 'label' => 'CTA Başlık', 'name' => 'sb_cta_title', 'type' => 'text', 'default_value' => 'Interesse an Smart Building Lösungen?' ),
            array( 'key' => 'field_sb_cta_description', 'label' => 'CTA Açıklama', 'name' => 'sb_cta_description', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Wir beraten Sie gerne zu WashSlot und weiteren digitalen Lösungen für Ihre Liegenschaft.' ),
            array( 'key' => 'field_sb_cta_button_text', 'label' => 'Buton Metni', 'name' => 'sb_cta_button_text', 'type' => 'text', 'default_value' => 'Beratung anfordern' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-smart-building.php' ) ) ),
        'menu_order' => 0,
        'position' => 'normal',
        'hide_on_screen' => array( 'excerpt', 'discussion', 'comments', 'revisions', 'author', 'format', 'categories', 'tags' ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'dataenergie_register_smart_building_fields' );
