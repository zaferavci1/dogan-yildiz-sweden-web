<?php
/**
 * Dataenergie Custom Theme - Functions
 *
 * @package Dataenergie
 * @version 1.0.0
 */

// Doğrudan erişimi engelle
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Tema kurulumu
 */
function dataenergie_setup() {
    // Sayfa başlığı desteği
    add_theme_support( 'title-tag' );

    // Öne çıkan görsel desteği
    add_theme_support( 'post-thumbnails' );

    // HTML5 desteği
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Menü tanımlamaları
    register_nav_menus( array(
        'main-menu'   => __( 'Main Menu', 'dataenergie' ),
        'footer-menu' => __( 'Footer Menu', 'dataenergie' ),
    ) );

    // Custom logo desteği
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'dataenergie_setup' );

/**
 * CSS ve JavaScript dosyalarını yükle
 */
function dataenergie_scripts() {
    // Tema ana stil dosyası (style.css)
    wp_enqueue_style(
        'dataenergie-style',
        get_stylesheet_uri(),
        array(),
        '2.2.0'
    );

    // Ek stil dosyası
    wp_enqueue_style(
        'dataenergie-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array( 'dataenergie-style' ),
        '2.1.0'
    );

    // Ana JavaScript dosyası (footer'da yükle)
    wp_enqueue_script(
        'dataenergie-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '2.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'dataenergie_scripts' );

/**
 * Google Fonts preload için header'a link ekle
 * Not: Preconnect linkleri header.php'de manuel olarak eklendi
 * Bu fonksiyon ek optimizasyon sağlar
 */
function dataenergie_preload_fonts() {
    ?>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <?php
}
add_action( 'wp_head', 'dataenergie_preload_fonts', 1 );

/**
 * Body class'a özel sınıflar ekle
 */
function dataenergie_body_classes( $classes ) {
    // Ana sayfa için
    if ( is_front_page() ) {
        $classes[] = 'is-front-page';
    }

    // Tek sayfa için
    if ( is_singular() ) {
        $classes[] = 'is-singular';
    }

    return $classes;
}
add_filter( 'body_class', 'dataenergie_body_classes' );

/**
 * Excerpt uzunluğunu özelleştir
 */
function dataenergie_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'dataenergie_excerpt_length' );

/**
 * Excerpt "more" metnini özelleştir
 */
function dataenergie_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'dataenergie_excerpt_more' );

/**
 * Menü öğelerine aria-current özniteliği ekle (erişilebilirlik)
 */
function dataenergie_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    if ( $item->current ) {
        $atts['aria-current'] = 'page';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'dataenergie_nav_menu_link_attributes', 10, 4 );

/**
 * Custom Post Types ve ACF alanlarını yükle
 */
require_once get_template_directory() . '/inc/custom-fields.php';

/**
 * Demo İçerik İçe Aktarıcı (Otomatik Kurulum)
 */
require_once get_template_directory() . '/inc/demo-importer.php';

