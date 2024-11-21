<?php

function pgp_enqueue_styles() {
    $options = get_option( 'pgp_gallery_settings' );
    $grid_columns = isset( $options['grid_columns'] ) ? intval( $options['grid_columns'] ) : 4;
    $hover_color = isset( $options['hover_color'] ) ? esc_attr( $options['hover_color'] ) : '#ff0032';
    $text_color = isset( $options['text_color'] ) ? esc_attr( $options['text_color'] ) : '#000000';
    $text_color_hover = isset( $options['text_color_hover'] ) ? esc_attr( $options['text_color_hover'] ) : '#ffffff';
    $category_text_color = isset( $options['category_text_color'] ) ? esc_attr( $options['category_text_color'] ) : '#666666';
    $category_color_hover = isset( $options['category_color_hover'] ) ? esc_attr( $options['category_color_hover'] ) : '#ffffff';

    wp_enqueue_style( 'pgp-styles', plugin_dir_url( __FILE__ ) . '../css/style.css' );

    // Añadir estilos personalizados en línea
    $custom_css = "
        .pgp-gallery {
            grid-template-columns: repeat({$grid_columns}, 1fr);
        }
        .pgp-gallery-card:hover {
            background-color: {$hover_color};
        }
        .pgp-gallery-title {
            color: {$text_color};
        }
        .pgp-gallery-card:hover .pgp-gallery-title {
            color: {$text_color_hover};
        }
        .pgp-gallery-category {
            color: {$category_text_color};
        }
        .pgp-gallery-card:hover .pgp-gallery-category {
            color: {$category_color_hover};
        }
    ";
    wp_add_inline_style( 'pgp-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'pgp_enqueue_styles' );
