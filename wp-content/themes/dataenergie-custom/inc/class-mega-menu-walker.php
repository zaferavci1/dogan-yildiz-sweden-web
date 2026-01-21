<?php
/**
 * Custom Walker Class for Mega Menu Navigation
 *
 * WP ADMIN MENÜ KURULUMU:
 * 1. "IT Services" veya "Solar Systems" gibi üst menü öğelerine "mega-menu" CSS class'ı ekleyin
 * 2. Alt öğeler otomatik olarak mega menü içinde gösterilir
 *
 * @package Dataenergie
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Dataenergie_Mega_Menu_Walker extends Walker_Nav_Menu {

    /**
     * Mega menü aktif mi?
     */
    private $in_mega_menu = false;

    /**
     * Mevcut mega menü parent ID
     */
    private $mega_menu_parent_id = 0;

    /**
     * Alt menü başlangıcı
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );

        if ( $depth === 0 && $this->in_mega_menu ) {
            // Mega menü dropdown container
            $output .= "\n{$indent}<div class=\"mega-menu-dropdown\">\n";
            $output .= "{$indent}\t<div class=\"mega-menu-inner\">\n";
        } elseif ( $this->in_mega_menu && $depth === 1 ) {
            // Mega menü içindeki grup linkleri
            $output .= "\n{$indent}<ul class=\"mega-menu-links\">\n";
        } else {
            // Normal dropdown
            $output .= "\n{$indent}<ul class=\"sub-menu\">\n";
        }
    }

    /**
     * Alt menü bitişi
     */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );

        if ( $depth === 0 && $this->in_mega_menu ) {
            // Mega menü container'ı kapat
            $output .= "{$indent}\t</div><!-- .mega-menu-inner -->\n";
            $output .= "{$indent}</div><!-- .mega-menu-dropdown -->\n";
            $this->in_mega_menu = false;
            $this->mega_menu_parent_id = 0;
        } elseif ( $this->in_mega_menu && $depth === 1 ) {
            $output .= "{$indent}</ul><!-- .mega-menu-links -->\n";
        } else {
            $output .= "{$indent}</ul>\n";
        }
    }

    /**
     * Menü öğesi başlangıcı
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Mega menü kontrolü
        $is_mega_menu = in_array( 'mega-menu', $classes, true );
        $has_children = in_array( 'menu-item-has-children', $classes, true );

        // Üst seviye mega menü parent
        if ( $depth === 0 && $is_mega_menu && $has_children ) {
            $this->in_mega_menu = true;
            $this->mega_menu_parent_id = $item->ID;
            $classes[] = 'mega-menu-parent';
        }

        // CSS class'larını hazırla
        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        // ID
        $id_attr = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id_attr = $id_attr ? ' id="' . esc_attr( $id_attr ) . '"' : '';

        // Link attributes
        $atts = array(
            'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
            'target' => ! empty( $item->target ) ? $item->target : '',
            'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
            'href'   => ! empty( $item->url ) ? $item->url : '',
        );

        // Mega menü içindeki grup başlığı (depth 1)
        if ( $this->in_mega_menu && $depth === 1 ) {
            $output .= "{$indent}<div class=\"mega-menu-group\">\n";

            $atts['class'] = 'mega-menu-heading';
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $title = apply_filters( 'the_title', $item->title, $item->ID );
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

            $output .= "{$indent}\t<a{$attributes}>{$title}</a>\n";
            return;
        }

        // Mega menü içindeki linkler (depth 2)
        if ( $this->in_mega_menu && $depth === 2 ) {
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $title = apply_filters( 'the_title', $item->title, $item->ID );
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

            $output .= $indent . '<li' . $id_attr . $class_names . '>';
            $output .= '<a' . $attributes . '>' . $title . '</a>';
            return;
        }

        // Normal menü öğesi (depth 0 veya mega menü dışı)
        $output .= $indent . '<li' . $id_attr . $class_names . '>';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = isset( $args->before ) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . $title . ( isset( $args->link_after ) ? $args->link_after : '' );
        $item_output .= '</a>';
        $item_output .= isset( $args->after ) ? $args->after : '';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * Menü öğesi bitişi
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ( $this->in_mega_menu && $depth === 1 ) {
            // Mega menü grubu kapat
            $output .= "\t</div><!-- .mega-menu-group -->\n";
        } elseif ( $this->in_mega_menu && $depth === 2 ) {
            $output .= "</li>\n";
        } else {
            $output .= "</li>\n";
        }
    }
}

/**
 * Mobil menü için basit Walker Class
 */
class Dataenergie_Mobile_Menu_Walker extends Walker_Nav_Menu {

    /**
     * Submenu başlangıcı
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n{$indent}<ul class=\"sub-menu\">\n";
    }

    /**
     * Submenu bitişi
     */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "{$indent}</ul>\n";
    }

    /**
     * Menü öğesi
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // mega-menu class'ını kaldır (mobilde gerekli değil)
        $classes = array_diff( $classes, array( 'mega-menu', 'mega-menu-heading' ) );

        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array(
            'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
            'target' => ! empty( $item->target ) ? $item->target : '',
            'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
            'href'   => ! empty( $item->url ) ? $item->url : '',
        );

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $output .= '<a' . $attributes . '>' . $title . '</a>';
    }

    /**
     * Menü öğesi bitişi
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}
