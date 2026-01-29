<?php
/**
 * Dataenergie Custom Theme - ACF Field Groups
 *
 * ACF Pro olmadan çalışır. ACF Free ile uyumlu.
 * Alanlar programatik olarak tanımlanır.
 *
 * @package Dataenergie
 * @version 1.0.0
 */

// Doğrudan erişimi engelle
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * ACF Field Groups - Über Uns Page
 */
function dataenergie_register_acf_uber_uns_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'      => 'group_uber_uns_page',
        'title'    => 'Über Uns - Sayfa İçerikleri',
        'fields'   => array(
            // =================================================================
            // HERO SECTION
            // =================================================================
            array(
                'key'   => 'field_uber_uns_hero_tab',
                'label' => 'Hero Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_about_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 'about_hero_tag',
                'type'          => 'text',
                'default_value' => 'Über uns',
                'placeholder'   => 'Über uns',
                'instructions'  => 'Üst köşedeki küçük etiket metni',
            ),
            array(
                'key'           => 'field_about_hero_title',
                'label'         => 'Hero Başlık',
                'name'          => 'about_hero_title',
                'type'          => 'text',
                'default_value' => 'Wer wir sind',
                'placeholder'   => 'Wer wir sind',
                'instructions'  => 'Ana başlık',
            ),
            array(
                'key'           => 'field_about_hero_lead',
                'label'         => 'Hero Alt Başlık',
                'name'          => 'about_hero_lead',
                'type'          => 'text',
                'default_value' => 'Strukturierte IT, digitale Lösungen und nachhaltige Energie',
                'placeholder'   => 'Slogan veya kısa açıklama',
                'instructions'  => 'Başlığın altındaki slogan',
            ),
            array(
                'key'           => 'field_about_hero_card_1',
                'label'         => 'Hero Kart 1',
                'name'          => 'about_hero_card_1',
                'type'          => 'textarea',
                'rows'          => 4,
                'default_value' => 'DataEnergie begleitet Unternehmen und Immobilien mit gleichwertigem Fokus auf moderne IT-Services und nachhaltige Solarlösungen. Wir planen, realisieren und betreiben stabile IT-Infrastrukturen ebenso wie zukunftsfähige Solarsysteme.',
                'instructions'  => 'Sol kart metni (IT & Solar odaklı)',
            ),
            array(
                'key'           => 'field_about_hero_card_2',
                'label'         => 'Hero Kart 2',
                'name'          => 'about_hero_card_2',
                'type'          => 'textarea',
                'rows'          => 4,
                'default_value' => 'Unser Anspruch ist es, Technologie und Energie ganzheitlich zu denken. Sicherheit, Verlässlichkeit und langfristige Wirtschaftlichkeit stehen dabei im Mittelpunkt.',
                'instructions'  => 'Sağ kart metni (Vizyon odaklı)',
            ),

            // =================================================================
            // UNSERE HALTUNG SECTION
            // =================================================================
            array(
                'key'   => 'field_uber_uns_haltung_tab',
                'label' => 'Unsere Haltung',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_about_haltung_title',
                'label'         => 'Haltung Başlık',
                'name'          => 'about_haltung_title',
                'type'          => 'text',
                'default_value' => 'Klarheit statt Komplexität',
            ),
            array(
                'key'           => 'field_about_haltung_text',
                'label'         => 'Haltung Açıklama',
                'name'          => 'about_haltung_text',
                'type'          => 'textarea',
                'rows'          => 4,
                'default_value' => 'In einer zunehmend digitalen Welt entstehen Risiken oft dort, wo Übersicht fehlt. Unsere Arbeit zielt darauf ab, Komplexität zu reduzieren, Risiken sichtbar zu machen und tragfähige Entscheidungen zu ermöglichen.',
            ),
            array(
                'key'           => 'field_about_haltung_note',
                'label'         => 'Haltung Not',
                'name'          => 'about_haltung_note',
                'type'          => 'text',
                'default_value' => 'Wir glauben nicht an Standardlösungen, sondern an passende Lösungen.',
                'instructions'  => 'Alt kısımdaki vurgulu not',
            ),

            // =================================================================
            // WAS UNS AUSZEICHNET SECTION
            // =================================================================
            array(
                'key'   => 'field_uber_uns_auszeichnet_tab',
                'label' => 'Was uns auszeichnet',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_about_auszeichnet_1',
                'label'         => 'Özellik 1',
                'name'          => 'about_auszeichnet_1',
                'type'          => 'text',
                'default_value' => 'Strukturierte Vorgehensweise statt Ad-hoc-IT',
            ),
            array(
                'key'           => 'field_about_auszeichnet_2',
                'label'         => 'Özellik 2',
                'name'          => 'about_auszeichnet_2',
                'type'          => 'text',
                'default_value' => 'Fokus auf Microsoft 365, Security & Governance',
            ),
            array(
                'key'           => 'field_about_auszeichnet_3',
                'label'         => 'Özellik 3',
                'name'          => 'about_auszeichnet_3',
                'type'          => 'text',
                'default_value' => 'Eigene digitale Lösungen mit klar definiertem Nutzen',
            ),
            array(
                'key'           => 'field_about_auszeichnet_4',
                'label'         => 'Özellik 4',
                'name'          => 'about_auszeichnet_4',
                'type'          => 'text',
                'default_value' => 'Kombination aus Beratung, Umsetzung und Betrieb',
            ),
            array(
                'key'           => 'field_about_auszeichnet_5',
                'label'         => 'Özellik 5',
                'name'          => 'about_auszeichnet_5',
                'type'          => 'text',
                'default_value' => 'Verständnis für technische und geschäftliche Anforderungen',
            ),
            array(
                'key'           => 'field_about_auszeichnet_6',
                'label'         => 'Özellik 6',
                'name'          => 'about_auszeichnet_6',
                'type'          => 'text',
                'default_value' => 'Ausrichtung auf den Schweizer Markt',
            ),

            // =================================================================
            // UNSERE SCHWERPUNKTE SECTION
            // =================================================================
            array(
                'key'   => 'field_uber_uns_schwerpunkte_tab',
                'label' => 'Unsere Schwerpunkte',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_about_schwerpunkt_1_title',
                'label'         => 'Schwerpunkt 1 - Başlık',
                'name'          => 'about_schwerpunkt_1_title',
                'type'          => 'text',
                'default_value' => 'IT Services',
            ),
            array(
                'key'           => 'field_about_schwerpunkt_1_desc',
                'label'         => 'Schwerpunkt 1 - Açıklama',
                'name'          => 'about_schwerpunkt_1_desc',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Governance-orientierte IT-Services mit Fokus auf Microsoft 365, Security, Cloud und Automatisierung.',
            ),
            array(
                'key'           => 'field_about_schwerpunkt_2_title',
                'label'         => 'Schwerpunkt 2 - Başlık',
                'name'          => 'about_schwerpunkt_2_title',
                'type'          => 'text',
                'default_value' => 'Digitale Lösungen',
            ),
            array(
                'key'           => 'field_about_schwerpunkt_2_desc',
                'label'         => 'Schwerpunkt 2 - Açıklama',
                'name'          => 'about_schwerpunkt_2_desc',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Eigene, modulare Lösungen wie Workforce Management & Zeiterfassung sowie Smart-Building-Anwendungen.',
            ),
            array(
                'key'           => 'field_about_schwerpunkt_3_title',
                'label'         => 'Schwerpunkt 3 - Başlık',
                'name'          => 'about_schwerpunkt_3_title',
                'type'          => 'text',
                'default_value' => 'Energielösungen',
            ),
            array(
                'key'           => 'field_about_schwerpunkt_3_desc',
                'label'         => 'Schwerpunkt 3 - Açıklama',
                'name'          => 'about_schwerpunkt_3_desc',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Planung und Umsetzung nachhaltiger Photovoltaik-Systeme für Unternehmen und Immobilien.',
            ),

            // =================================================================
            // FÜR WEN WIR ARBEITEN SECTION
            // =================================================================
            array(
                'key'   => 'field_uber_uns_zielgruppen_tab',
                'label' => 'Für wen wir arbeiten',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_about_zielgruppe_1',
                'label'         => 'Zielgruppe 1',
                'name'          => 'about_zielgruppe_1',
                'type'          => 'text',
                'default_value' => 'KMU und Organisationen',
            ),
            array(
                'key'           => 'field_about_zielgruppe_2',
                'label'         => 'Zielgruppe 2',
                'name'          => 'about_zielgruppe_2',
                'type'          => 'text',
                'default_value' => 'IT-Leitungen und Geschäftsführungen',
            ),
            array(
                'key'           => 'field_about_zielgruppe_3',
                'label'         => 'Zielgruppe 3',
                'name'          => 'about_zielgruppe_3',
                'type'          => 'text',
                'default_value' => 'HR- und Verwaltungsabteilungen',
            ),
            array(
                'key'           => 'field_about_zielgruppe_4',
                'label'         => 'Zielgruppe 4',
                'name'          => 'about_zielgruppe_4',
                'type'          => 'text',
                'default_value' => 'Immobilienverwaltungen',
            ),
            array(
                'key'           => 'field_about_zielgruppe_5',
                'label'         => 'Zielgruppe 5',
                'name'          => 'about_zielgruppe_5',
                'type'          => 'text',
                'default_value' => 'Unternehmen mit hohen Anforderungen an Sicherheit und Struktur',
            ),

            // =================================================================
            // UNSERE ARBEITSWEISE SECTION
            // =================================================================
            array(
                'key'   => 'field_uber_uns_arbeitsweise_tab',
                'label' => 'Unsere Arbeitsweise',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_about_arbeitsweise_title',
                'label'         => 'Arbeitsweise Başlık',
                'name'          => 'about_arbeitsweise_title',
                'type'          => 'text',
                'default_value' => 'Strukturiert. Transparent. Verlässlich.',
            ),
            array(
                'key'           => 'field_about_arbeitsweise_1',
                'label'         => 'Arbeitsweise 1',
                'name'          => 'about_arbeitsweise_1',
                'type'          => 'text',
                'default_value' => 'Klare Zieldefinition',
            ),
            array(
                'key'           => 'field_about_arbeitsweise_2',
                'label'         => 'Arbeitsweise 2',
                'name'          => 'about_arbeitsweise_2',
                'type'          => 'text',
                'default_value' => 'Verständliche Kommunikation',
            ),
            array(
                'key'           => 'field_about_arbeitsweise_3',
                'label'         => 'Arbeitsweise 3',
                'name'          => 'about_arbeitsweise_3',
                'type'          => 'text',
                'default_value' => 'Nachvollziehbare Ergebnisse',
            ),
            array(
                'key'           => 'field_about_arbeitsweise_4',
                'label'         => 'Arbeitsweise 4',
                'name'          => 'about_arbeitsweise_4',
                'type'          => 'text',
                'default_value' => 'Saubere Dokumentation',
            ),
            array(
                'key'           => 'field_about_arbeitsweise_5',
                'label'         => 'Arbeitsweise 5',
                'name'          => 'about_arbeitsweise_5',
                'type'          => 'text',
                'default_value' => 'Langfristige Partnerschaften',
            ),
            array(
                'key'           => 'field_about_arbeitsweise_note',
                'label'         => 'Arbeitsweise Not',
                'name'          => 'about_arbeitsweise_note',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Unser Anspruch ist nicht, möglichst viel zu verkaufen – sondern sinnvolle und nachhaltige Lösungen zu liefern.',
            ),

            // =================================================================
            // CTA SECTION
            // =================================================================
            array(
                'key'   => 'field_uber_uns_cta_tab',
                'label' => 'CTA Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_about_cta_title',
                'label'         => 'CTA Başlık',
                'name'          => 'about_cta_title',
                'type'          => 'text',
                'default_value' => 'Möchten Sie mehr über DataEnergie erfahren?',
            ),
            array(
                'key'           => 'field_about_cta_description',
                'label'         => 'CTA Açıklama',
                'name'          => 'about_cta_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Gerne stellen wir uns und unsere Arbeitsweise in einem unverbindlichen Gespräch vor.',
            ),
            array(
                'key'           => 'field_about_cta_button_text',
                'label'         => 'CTA Buton Metni',
                'name'          => 'about_cta_button_text',
                'type'          => 'text',
                'default_value' => 'Erstgespräch anfragen',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-uber-uns.php',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ) );
}
add_action( 'acf/init', 'dataenergie_register_acf_uber_uns_fields' );

/**
 * ACF Field Groups - PV-Reinigung Page
 */
function dataenergie_register_acf_reinigung_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'      => 'group_reinigung_page',
        'title'    => 'PV-Reinigung - Sayfa İçerikleri',
        'fields'   => array(
            // =================================================================
            // HERO SECTION
            // =================================================================
            array(
                'key'   => 'field_reinigung_hero_tab',
                'label' => 'Hero Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_reinigung_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 'reinigung_hero_tag',
                'type'          => 'text',
                'default_value' => 'Solar Energy',
                'instructions'  => 'Üst köşedeki küçük etiket metni',
            ),
            array(
                'key'           => 'field_reinigung_hero_subtitle',
                'label'         => 'Hero Alt Başlık',
                'name'          => 'reinigung_hero_subtitle',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Professionelle Reinigung von Photovoltaikanlagen zur Sicherstellung optimaler Erträge und langer Lebensdauer.',
                'instructions'  => 'Başlığın altındaki açıklama',
            ),

            // =================================================================
            // CONTENT SECTION
            // =================================================================
            array(
                'key'   => 'field_reinigung_content_tab',
                'label' => 'İçerik Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_reinigung_highlight_text',
                'label'         => 'Highlight Metin',
                'name'          => 'reinigung_highlight_text',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Die Reinigung erfolgt inklusive Sichtprüfung und Dokumentation. So erhalten Sie nicht nur saubere Module, sondern auch einen klaren Überblick über den Zustand Ihrer Anlage.',
                'instructions'  => 'Vurgulu kutu metni',
            ),
            array(
                'key'           => 'field_reinigung_about_text',
                'label'         => 'Açıklama Metni',
                'name'          => 'reinigung_about_text',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Verschmutzte Solarmodule können bis zu 30% weniger Strom erzeugen. Unsere professionelle Reinigung entfernt Schmutz, Staub, Pollen und Ablagerungen schonend und gründlich.',
                'instructions'  => 'Genel açıklama paragrafı',
            ),

            // =================================================================
            // DACHARTEN (Çatı Tipleri)
            // =================================================================
            array(
                'key'   => 'field_reinigung_dach_tab',
                'label' => 'Çatı Tipleri',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_reinigung_dach_1',
                'label'         => 'Çatı Tipi 1',
                'name'          => 'reinigung_dach_1',
                'type'          => 'text',
                'default_value' => 'Schrägdach',
            ),
            array(
                'key'           => 'field_reinigung_dach_2',
                'label'         => 'Çatı Tipi 2',
                'name'          => 'reinigung_dach_2',
                'type'          => 'text',
                'default_value' => 'Flachdach',
            ),
            array(
                'key'           => 'field_reinigung_dach_3',
                'label'         => 'Çatı Tipi 3',
                'name'          => 'reinigung_dach_3',
                'type'          => 'text',
                'default_value' => 'Indach-Anlagen',
            ),
            array(
                'key'           => 'field_reinigung_dach_4',
                'label'         => 'Çatı Tipi 4',
                'name'          => 'reinigung_dach_4',
                'type'          => 'text',
                'default_value' => 'Fassaden-Photovoltaik',
            ),
            array(
                'key'           => 'field_reinigung_dach_5',
                'label'         => 'Çatı Tipi 5',
                'name'          => 'reinigung_dach_5',
                'type'          => 'text',
                'default_value' => 'Carport- & Sonderanlagen',
            ),

            // =================================================================
            // LEISTUNGEN (Hizmetler)
            // =================================================================
            array(
                'key'   => 'field_reinigung_leistungen_tab',
                'label' => 'Hizmetler',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_reinigung_leistung_1',
                'label'         => 'Hizmet 1',
                'name'          => 'reinigung_leistung_1',
                'type'          => 'text',
                'default_value' => 'Reinigung von PV-Modulen',
            ),
            array(
                'key'           => 'field_reinigung_leistung_2',
                'label'         => 'Hizmet 2',
                'name'          => 'reinigung_leistung_2',
                'type'          => 'text',
                'default_value' => 'Entfernung von Schmutz, Staub, Pollen und Ablagerungen',
            ),
            array(
                'key'           => 'field_reinigung_leistung_3',
                'label'         => 'Hizmet 3',
                'name'          => 'reinigung_leistung_3',
                'type'          => 'text',
                'default_value' => 'Sichtprüfung der Module und Unterkonstruktion',
            ),
            array(
                'key'           => 'field_reinigung_leistung_4',
                'label'         => 'Hizmet 4',
                'name'          => 'reinigung_leistung_4',
                'type'          => 'text',
                'default_value' => 'Dokumentation des Anlagenzustands',
            ),
            array(
                'key'           => 'field_reinigung_leistung_5',
                'label'         => 'Hizmet 5',
                'name'          => 'reinigung_leistung_5',
                'type'          => 'text',
                'default_value' => 'Arbeiten mit Absturzsicherung und Sicherheitskonzept',
            ),

            // =================================================================
            // STATS (İstatistikler)
            // =================================================================
            array(
                'key'   => 'field_reinigung_stats_tab',
                'label' => 'İstatistikler',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_reinigung_stat_1_number',
                'label'         => 'İstatistik 1 - Sayı',
                'name'          => 'reinigung_stat_1_number',
                'type'          => 'text',
                'default_value' => '30%',
            ),
            array(
                'key'           => 'field_reinigung_stat_1_label',
                'label'         => 'İstatistik 1 - Etiket',
                'name'          => 'reinigung_stat_1_label',
                'type'          => 'text',
                'default_value' => 'Mehr Ertrag nach Reinigung',
            ),
            array(
                'key'           => 'field_reinigung_stat_2_number',
                'label'         => 'İstatistik 2 - Sayı',
                'name'          => 'reinigung_stat_2_number',
                'type'          => 'text',
                'default_value' => '100%',
            ),
            array(
                'key'           => 'field_reinigung_stat_2_label',
                'label'         => 'İstatistik 2 - Etiket',
                'name'          => 'reinigung_stat_2_label',
                'type'          => 'text',
                'default_value' => 'Dokumentation',
            ),
            array(
                'key'           => 'field_reinigung_stat_3_number',
                'label'         => 'İstatistik 3 - Sayı',
                'name'          => 'reinigung_stat_3_number',
                'type'          => 'text',
                'default_value' => '15+',
            ),
            array(
                'key'           => 'field_reinigung_stat_3_label',
                'label'         => 'İstatistik 3 - Etiket',
                'name'          => 'reinigung_stat_3_label',
                'type'          => 'text',
                'default_value' => 'Jahre Erfahrung',
            ),
            array(
                'key'           => 'field_reinigung_stat_4_number',
                'label'         => 'İstatistik 4 - Sayı',
                'name'          => 'reinigung_stat_4_number',
                'type'          => 'text',
                'default_value' => '500+',
            ),
            array(
                'key'           => 'field_reinigung_stat_4_label',
                'label'         => 'İstatistik 4 - Etiket',
                'name'          => 'reinigung_stat_4_label',
                'type'          => 'text',
                'default_value' => 'Gereinigte Anlagen',
            ),

            // =================================================================
            // CTA SECTION
            // =================================================================
            array(
                'key'   => 'field_reinigung_cta_tab',
                'label' => 'CTA Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_reinigung_cta_title',
                'label'         => 'CTA Başlık',
                'name'          => 'reinigung_cta_title',
                'type'          => 'text',
                'default_value' => 'Maximale Leistung für Ihre PV-Anlage',
            ),
            array(
                'key'           => 'field_reinigung_cta_description',
                'label'         => 'CTA Açıklama',
                'name'          => 'reinigung_cta_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Kontaktieren Sie uns für ein unverbindliches Angebot zur professionellen Reinigung Ihrer Photovoltaikanlage.',
            ),
            array(
                'key'           => 'field_reinigung_cta_button_text',
                'label'         => 'CTA Buton Metni',
                'name'          => 'reinigung_cta_button_text',
                'type'          => 'text',
                'default_value' => 'Offerte anfordern',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-reinigung.php',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ) );
}
add_action( 'acf/init', 'dataenergie_register_acf_reinigung_fields' );

/**
 * ACF Field Groups - Drohnenaufnahmen Page
 */
function dataenergie_register_acf_drohnen_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'      => 'group_drohnen_page',
        'title'    => 'Drohnenaufnahmen - Sayfa İçerikleri',
        'fields'   => array(
            // =================================================================
            // HERO SECTION
            // =================================================================
            array(
                'key'   => 'field_drohnen_hero_tab',
                'label' => 'Hero Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_drohnen_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 'drohnen_hero_tag',
                'type'          => 'text',
                'default_value' => 'Solar Energy',
                'instructions'  => 'Üst köşedeki küçük etiket metni',
            ),
            array(
                'key'           => 'field_drohnen_hero_subtitle',
                'label'         => 'Hero Alt Başlık',
                'name'          => 'drohnen_hero_subtitle',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Drohnenbasierte Datenerfassung für präzise Planung und Dokumentation von Photovoltaikprojekten.',
                'instructions'  => 'Başlığın altındaki açıklama',
            ),

            // =================================================================
            // CONTENT SECTION
            // =================================================================
            array(
                'key'   => 'field_drohnen_content_tab',
                'label' => 'İçerik Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_drohnen_highlight_text',
                'label'         => 'Highlight Metin',
                'name'          => 'drohnen_highlight_text',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Unsere Drohnenaufnahmen liefern die Datengrundlage für eine präzise Planung und effiziente Umsetzung Ihrer Photovoltaikprojekte – von der Erstaufnahme bis zur Baudokumentation.',
                'instructions'  => 'Vurgulu kutu metni',
            ),
            array(
                'key'           => 'field_drohnen_about_text',
                'label'         => 'Açıklama Metni',
                'name'          => 'drohnen_about_text',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Mit modernster Drohnentechnologie erfassen wir Dächer und Gebäude aus der Luft. Die gewonnenen Daten ermöglichen exakte Vermessungen, 3D-Modelle und eine lückenlose Dokumentation.',
                'instructions'  => 'Genel açıklama paragrafı',
            ),

            // =================================================================
            // LEISTUNGEN (Hizmetler)
            // =================================================================
            array(
                'key'   => 'field_drohnen_leistungen_tab',
                'label' => 'Hizmetler',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_drohnen_leistung_1',
                'label'         => 'Hizmet 1',
                'name'          => 'drohnen_leistung_1',
                'type'          => 'text',
                'default_value' => 'Drohnenaufnahmen von Dächern und Gebäuden',
            ),
            array(
                'key'           => 'field_drohnen_leistung_2',
                'label'         => 'Hizmet 2',
                'name'          => 'drohnen_leistung_2',
                'type'          => 'text',
                'default_value' => '2D-Vermessung',
            ),
            array(
                'key'           => 'field_drohnen_leistung_3',
                'label'         => 'Hizmet 3',
                'name'          => 'drohnen_leistung_3',
                'type'          => 'text',
                'default_value' => '3D-Gebäudemodelle',
            ),
            array(
                'key'           => 'field_drohnen_leistung_4',
                'label'         => 'Hizmet 4',
                'name'          => 'drohnen_leistung_4',
                'type'          => 'text',
                'default_value' => 'Bestandsaufnahmen',
            ),
            array(
                'key'           => 'field_drohnen_leistung_5',
                'label'         => 'Hizmet 5',
                'name'          => 'drohnen_leistung_5',
                'type'          => 'text',
                'default_value' => 'Datengrundlage für Planung und Bauverfahren',
            ),

            // =================================================================
            // EINSATZBEREICHE (Kullanım Alanları)
            // =================================================================
            array(
                'key'   => 'field_drohnen_einsatz_tab',
                'label' => 'Kullanım Alanları',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_drohnen_einsatz_1',
                'label'         => 'Kullanım Alanı 1',
                'name'          => 'drohnen_einsatz_1',
                'type'          => 'text',
                'default_value' => 'PV-Anlagenplanung',
            ),
            array(
                'key'           => 'field_drohnen_einsatz_2',
                'label'         => 'Kullanım Alanı 2',
                'name'          => 'drohnen_einsatz_2',
                'type'          => 'text',
                'default_value' => 'Dachinspektion',
            ),
            array(
                'key'           => 'field_drohnen_einsatz_3',
                'label'         => 'Kullanım Alanı 3',
                'name'          => 'drohnen_einsatz_3',
                'type'          => 'text',
                'default_value' => 'Baufortschrittsdokumentation',
            ),
            array(
                'key'           => 'field_drohnen_einsatz_4',
                'label'         => 'Kullanım Alanı 4',
                'name'          => 'drohnen_einsatz_4',
                'type'          => 'text',
                'default_value' => 'Verschattungsanalyse',
            ),
            array(
                'key'           => 'field_drohnen_einsatz_5',
                'label'         => 'Kullanım Alanı 5',
                'name'          => 'drohnen_einsatz_5',
                'type'          => 'text',
                'default_value' => 'Bestandsdokumentation',
            ),

            // =================================================================
            // STATS (İstatistikler)
            // =================================================================
            array(
                'key'   => 'field_drohnen_stats_tab',
                'label' => 'İstatistikler',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_drohnen_stat_1_number',
                'label'         => 'İstatistik 1 - Sayı',
                'name'          => 'drohnen_stat_1_number',
                'type'          => 'text',
                'default_value' => '200+',
            ),
            array(
                'key'           => 'field_drohnen_stat_1_label',
                'label'         => 'İstatistik 1 - Etiket',
                'name'          => 'drohnen_stat_1_label',
                'type'          => 'text',
                'default_value' => 'Drohnenflüge',
            ),
            array(
                'key'           => 'field_drohnen_stat_2_number',
                'label'         => 'İstatistik 2 - Sayı',
                'name'          => 'drohnen_stat_2_number',
                'type'          => 'text',
                'default_value' => '50\'000+',
            ),
            array(
                'key'           => 'field_drohnen_stat_2_label',
                'label'         => 'İstatistik 2 - Etiket',
                'name'          => 'drohnen_stat_2_label',
                'type'          => 'text',
                'default_value' => 'm² vermessen',
            ),
            array(
                'key'           => 'field_drohnen_stat_3_number',
                'label'         => 'İstatistik 3 - Sayı',
                'name'          => 'drohnen_stat_3_number',
                'type'          => 'text',
                'default_value' => '±2cm',
            ),
            array(
                'key'           => 'field_drohnen_stat_3_label',
                'label'         => 'İstatistik 3 - Etiket',
                'name'          => 'drohnen_stat_3_label',
                'type'          => 'text',
                'default_value' => 'Messgenauigkeit',
            ),
            array(
                'key'           => 'field_drohnen_stat_4_number',
                'label'         => 'İstatistik 4 - Sayı',
                'name'          => 'drohnen_stat_4_number',
                'type'          => 'text',
                'default_value' => '24h',
            ),
            array(
                'key'           => 'field_drohnen_stat_4_label',
                'label'         => 'İstatistik 4 - Etiket',
                'name'          => 'drohnen_stat_4_label',
                'type'          => 'text',
                'default_value' => 'Datenlieferung',
            ),

            // =================================================================
            // CTA SECTION
            // =================================================================
            array(
                'key'   => 'field_drohnen_cta_tab',
                'label' => 'CTA Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_drohnen_cta_title',
                'label'         => 'CTA Başlık',
                'name'          => 'drohnen_cta_title',
                'type'          => 'text',
                'default_value' => 'Präzise Daten für Ihr PV-Projekt',
            ),
            array(
                'key'           => 'field_drohnen_cta_description',
                'label'         => 'CTA Açıklama',
                'name'          => 'drohnen_cta_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Kontaktieren Sie uns für professionelle Drohnenaufnahmen und Vermessung.',
            ),
            array(
                'key'           => 'field_drohnen_cta_button_text',
                'label'         => 'CTA Buton Metni',
                'name'          => 'drohnen_cta_button_text',
                'type'          => 'text',
                'default_value' => 'Termin anfragen',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-solar-drohnenaufnahmen.php',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ) );
}
add_action( 'acf/init', 'dataenergie_register_acf_drohnen_fields' );

/**
 * ACF Field Groups - Solar Systems Page
 */
function dataenergie_register_acf_solar_systems_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'      => 'group_solar_systems_page',
        'title'    => 'Solar Systems - Sayfa İçerikleri',
        'fields'   => array(
            // =================================================================
            // HERO SECTION
            // =================================================================
            array(
                'key'   => 'field_solar_sys_hero_tab',
                'label' => 'Hero Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_solar_sys_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 'solar_sys_hero_tag',
                'type'          => 'text',
                'default_value' => 'Solar Services',
                'instructions'  => 'Üst köşedeki küçük etiket metni',
            ),
            array(
                'key'           => 'field_solar_sys_hero_subtitle',
                'label'         => 'Hero Alt Başlık',
                'name'          => 'solar_sys_hero_subtitle',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Von der Planung bis zur Wartung – Ihr Partner für Photovoltaik',
                'instructions'  => 'Başlığın altındaki açıklama',
            ),

            // =================================================================
            // SERVICE 1 - Planung & Engineering
            // =================================================================
            array(
                'key'   => 'field_solar_sys_service_1_tab',
                'label' => 'Servis 1: Planung & Engineering',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_icon',
                'label'         => 'İkon',
                'name'          => 'solar_sys_service_1_icon',
                'type'          => 'select',
                'choices'       => array(
                    'clipboard' => 'Clipboard (Planlama)',
                    'tool'      => 'Tool (Montaj)',
                    'camera'    => 'Camera (Drone)',
                    'droplet'   => 'Droplet (Temizlik)',
                ),
                'default_value' => 'clipboard',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_title',
                'label'         => 'Başlık',
                'name'          => 'solar_sys_service_1_title',
                'type'          => 'text',
                'default_value' => 'Planung & Engineering',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_description',
                'label'         => 'Açıklama',
                'name'          => 'solar_sys_service_1_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Professionelle PV-Anlagenplanung und Engineering-Dienstleistungen für optimale Erträge.',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'solar_sys_service_1_feature_1',
                'type'          => 'text',
                'default_value' => 'Dachanalyse & Standortbewertung',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'solar_sys_service_1_feature_2',
                'type'          => 'text',
                'default_value' => 'Ertragsberechnung & Simulation',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'solar_sys_service_1_feature_3',
                'type'          => 'text',
                'default_value' => 'Genehmigungen & Dokumentation',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'solar_sys_service_1_feature_4',
                'type'          => 'text',
                'default_value' => 'Technische Auslegung',
            ),
            array(
                'key'           => 'field_solar_sys_service_1_link',
                'label'         => 'Link URL',
                'name'          => 'solar_sys_service_1_link',
                'type'          => 'url',
                'instructions'  => 'Sayfa linki (boş bırakılırsa varsayılan kullanılır)',
            ),

            // =================================================================
            // SERVICE 2 - Installation
            // =================================================================
            array(
                'key'   => 'field_solar_sys_service_2_tab',
                'label' => 'Servis 2: Installation',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_icon',
                'label'         => 'İkon',
                'name'          => 'solar_sys_service_2_icon',
                'type'          => 'select',
                'choices'       => array(
                    'clipboard' => 'Clipboard (Planlama)',
                    'tool'      => 'Tool (Montaj)',
                    'camera'    => 'Camera (Drone)',
                    'droplet'   => 'Droplet (Temizlik)',
                ),
                'default_value' => 'tool',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_title',
                'label'         => 'Başlık',
                'name'          => 'solar_sys_service_2_title',
                'type'          => 'text',
                'default_value' => 'Installation',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_description',
                'label'         => 'Açıklama',
                'name'          => 'solar_sys_service_2_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Fachgerechte Montage und Installation Ihrer Photovoltaikanlage durch erfahrene Experten.',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'solar_sys_service_2_feature_1',
                'type'          => 'text',
                'default_value' => 'Dach- und Freiflächenmontage',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'solar_sys_service_2_feature_2',
                'type'          => 'text',
                'default_value' => 'Elektroinstallation',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'solar_sys_service_2_feature_3',
                'type'          => 'text',
                'default_value' => 'Wechselrichter-Integration',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'solar_sys_service_2_feature_4',
                'type'          => 'text',
                'default_value' => 'Inbetriebnahme & Übergabe',
            ),
            array(
                'key'           => 'field_solar_sys_service_2_link',
                'label'         => 'Link URL',
                'name'          => 'solar_sys_service_2_link',
                'type'          => 'url',
                'instructions'  => 'Sayfa linki (boş bırakılırsa varsayılan kullanılır)',
            ),

            // =================================================================
            // SERVICE 3 - Drohnenaufnahmen
            // =================================================================
            array(
                'key'   => 'field_solar_sys_service_3_tab',
                'label' => 'Servis 3: Drohnenaufnahmen',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_icon',
                'label'         => 'İkon',
                'name'          => 'solar_sys_service_3_icon',
                'type'          => 'select',
                'choices'       => array(
                    'clipboard' => 'Clipboard (Planlama)',
                    'tool'      => 'Tool (Montaj)',
                    'camera'    => 'Camera (Drone)',
                    'droplet'   => 'Droplet (Temizlik)',
                ),
                'default_value' => 'camera',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_title',
                'label'         => 'Başlık',
                'name'          => 'solar_sys_service_3_title',
                'type'          => 'text',
                'default_value' => 'Drohnenaufnahmen',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_description',
                'label'         => 'Açıklama',
                'name'          => 'solar_sys_service_3_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Präzise Dachanalyse und Thermografie mit modernster Drohnentechnologie.',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'solar_sys_service_3_feature_1',
                'type'          => 'text',
                'default_value' => 'Thermografie-Inspektion',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'solar_sys_service_3_feature_2',
                'type'          => 'text',
                'default_value' => 'Schadensanalyse',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'solar_sys_service_3_feature_3',
                'type'          => 'text',
                'default_value' => 'Hochauflösende Dokumentation',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'solar_sys_service_3_feature_4',
                'type'          => 'text',
                'default_value' => 'Effizienzprüfung',
            ),
            array(
                'key'           => 'field_solar_sys_service_3_link',
                'label'         => 'Link URL',
                'name'          => 'solar_sys_service_3_link',
                'type'          => 'url',
                'instructions'  => 'Sayfa linki (boş bırakılırsa varsayılan kullanılır)',
            ),

            // =================================================================
            // SERVICE 4 - Reinigungsservice
            // =================================================================
            array(
                'key'   => 'field_solar_sys_service_4_tab',
                'label' => 'Servis 4: Reinigungsservice',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_icon',
                'label'         => 'İkon',
                'name'          => 'solar_sys_service_4_icon',
                'type'          => 'select',
                'choices'       => array(
                    'clipboard' => 'Clipboard (Planlama)',
                    'tool'      => 'Tool (Montaj)',
                    'camera'    => 'Camera (Drone)',
                    'droplet'   => 'Droplet (Temizlik)',
                ),
                'default_value' => 'droplet',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_title',
                'label'         => 'Başlık',
                'name'          => 'solar_sys_service_4_title',
                'type'          => 'text',
                'default_value' => 'Reinigungsservice',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_description',
                'label'         => 'Açıklama',
                'name'          => 'solar_sys_service_4_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Professionelle Reinigung Ihrer Solarmodule für maximale Leistung und Langlebigkeit.',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_feature_1',
                'label'         => 'Özellik 1',
                'name'          => 'solar_sys_service_4_feature_1',
                'type'          => 'text',
                'default_value' => 'Professionelle Modulreinigung',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_feature_2',
                'label'         => 'Özellik 2',
                'name'          => 'solar_sys_service_4_feature_2',
                'type'          => 'text',
                'default_value' => '',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_feature_3',
                'label'         => 'Özellik 3',
                'name'          => 'solar_sys_service_4_feature_3',
                'type'          => 'text',
                'default_value' => 'Ertragssteigerung bis 20%',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_feature_4',
                'label'         => 'Özellik 4',
                'name'          => 'solar_sys_service_4_feature_4',
                'type'          => 'text',
                'default_value' => 'Umweltfreundliche Methoden',
            ),
            array(
                'key'           => 'field_solar_sys_service_4_link',
                'label'         => 'Link URL',
                'name'          => 'solar_sys_service_4_link',
                'type'          => 'url',
                'instructions'  => 'Sayfa linki (boş bırakılırsa varsayılan kullanılır)',
            ),

            // =================================================================
            // PROJECTS SECTION
            // =================================================================
            array(
                'key'   => 'field_solar_sys_projects_tab',
                'label' => 'Projeler Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_solar_sys_projects_title',
                'label'         => 'Projeler Başlık',
                'name'          => 'solar_sys_projects_title',
                'type'          => 'text',
                'default_value' => 'Unsere Projekte',
            ),
            array(
                'key'           => 'field_solar_sys_projects_description',
                'label'         => 'Projeler Açıklama',
                'name'          => 'solar_sys_projects_description',
                'type'          => 'text',
                'default_value' => 'Ausgewählte Photovoltaik-Projekte unserer Kunden',
            ),
            array(
                'key'           => 'field_solar_sys_projects_count',
                'label'         => 'Gösterilecek Proje Sayısı',
                'name'          => 'solar_sys_projects_count',
                'type'          => 'number',
                'default_value' => 3,
                'min'           => 1,
                'max'           => 12,
            ),

            // =================================================================
            // CTA SECTION
            // =================================================================
            array(
                'key'   => 'field_solar_sys_cta_tab',
                'label' => 'CTA Bölümü',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_solar_sys_cta_title',
                'label'         => 'CTA Başlık',
                'name'          => 'solar_sys_cta_title',
                'type'          => 'text',
                'default_value' => 'Interessiert an einer Solaranlage?',
            ),
            array(
                'key'           => 'field_solar_sys_cta_description',
                'label'         => 'CTA Açıklama',
                'name'          => 'solar_sys_cta_description',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Fordern Sie jetzt Ihre unverbindliche Offerte an.',
            ),
            array(
                'key'           => 'field_solar_sys_cta_button_text',
                'label'         => 'CTA Buton Metni',
                'name'          => 'solar_sys_cta_button_text',
                'type'          => 'text',
                'default_value' => 'Offerte anfordern',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-solar-systems.php',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ) );
}
add_action( 'acf/init', 'dataenergie_register_acf_solar_systems_fields' );
