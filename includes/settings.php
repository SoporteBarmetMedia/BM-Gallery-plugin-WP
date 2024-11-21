<?php

// Añadir página de ajustes al menú de WordPress
function pgp_add_settings_page() {
    add_options_page(
        'Ajustes Galería BM',  // Título de la página
        'Ajustes Galería BM',  // Título del menú
        'manage_options',             // Capacidad necesaria
        'pgp-gallery-settings',       // Slug
        'pgp_render_settings_page'    // Función que renderiza la página
    );
}
add_action( 'init', 'pgp_add_settings_page' );

// Renderizar la página de ajustes
function pgp_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Ajustes de la Galería Pinterest</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'pgp_gallery_settings_group' );
            do_settings_sections( 'pgp-gallery-settings' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Registrar los ajustes
function pgp_register_settings() {
    // Registrar el grupo de ajustes
    register_setting( 'pgp_gallery_settings_group', 'pgp_gallery_settings' );

    // Sección de ajustes generales
    add_settings_section(
        'pgp_general_settings_section',
        'Ajustes Generales',
        'pgp_general_settings_section_callback',
        'pgp-gallery-settings'
    );

    // Campo para definir el número de columnas en el grid
    add_settings_field(
        'pgp_grid_columns',
        'Número de columnas en la galería',
        'pgp_grid_columns_callback',
        'pgp-gallery-settings',
        'pgp_general_settings_section'
    );

    // Campo para definir el color hover de las cards
    add_settings_field(
        'pgp_hover_color',
        'Color de hover de las tarjetas',
        'pgp_hover_color_callback',
        'pgp-gallery-settings',
        'pgp_general_settings_section'
    );

    // Campo para definir el color del texto
    add_settings_field(
        'pgp_text_color',
        'Color del texto',
        'pgp_text_color_callback',
        'pgp-gallery-settings',
        'pgp_general_settings_section'
    );

    // Campo para definir el color del texto hover
    add_settings_field(
        'pgp_text_color_hover',
        'Color del texto al hacer hover',
        'pgp_text_color_hover_callback',
        'pgp-gallery-settings',
        'pgp_general_settings_section'
    );

    // Campo para definir el color del texto de la categoría
    add_settings_field(
        'pgp_category_text_color',
        'Color del texto de la categoría',
        'pgp_category_text_color_callback',
        'pgp-gallery-settings',
        'pgp_general_settings_section'
    );
	
	// Campo para definir el color hover del texto de la categoría
	add_settings_field(
    'pgp_category_color_hover',
    'Color de hover del texto de la categoría',
    'pgp_category_color_hover_callback',
    'pgp-gallery-settings',
    'pgp_general_settings_section'
);
}
add_action( 'admin_init', 'pgp_register_settings' );

// Callback para la descripción de la sección
function pgp_general_settings_section_callback() {
    echo '<p>Ajustes generales para la galería Pinterest.</p>';
}

// Callback para el campo del número de columnas
function pgp_grid_columns_callback() {
    $options = get_option( 'pgp_gallery_settings' );
    $value = isset( $options['grid_columns'] ) ? esc_attr( $options['grid_columns'] ) : 4;
    echo '<input type="number" name="pgp_gallery_settings[grid_columns]" value="' . $value . '" min="1" max="6" />';
}

// Callback para el campo del color hover
function pgp_hover_color_callback() {
    $options = get_option( 'pgp_gallery_settings' );
    $value = isset( $options['hover_color'] ) ? esc_attr( $options['hover_color'] ) : '#ff0032';
    echo '<input type="color" name="pgp_gallery_settings[hover_color]" value="' . $value . '" class="color-picker" data-default-color="#ff0032" />';
}

// Callback para el campo del color del texto
function pgp_text_color_callback() {
    $options = get_option( 'pgp_gallery_settings' );
    $value = isset( $options['text_color'] ) ? esc_attr( $options['text_color'] ) : '#000000';
    echo '<input type="color" name="pgp_gallery_settings[text_color]" value="' . $value . '" class="color-picker" data-default-color="#000000" />';
}

// Callback para el campo del color del texto hover
function pgp_text_color_hover_callback() {
    $options = get_option( 'pgp_gallery_settings' );
    $value = isset( $options['text_color_hover'] ) ? esc_attr( $options['text_color_hover'] ) : '#ffffff';
    echo '<input type="color" name="pgp_gallery_settings[text_color_hover]" value="' . $value . '" class="color-picker" data-default-color="#ffffff" />';
}

// Callback para el campo del color del texto de la categoría
function pgp_category_text_color_callback() {
    $options = get_option( 'pgp_gallery_settings' );
    $value = isset( $options['category_text_color'] ) ? esc_attr( $options['category_text_color'] ) : '#666666';
    echo '<input type="color" name="pgp_gallery_settings[category_text_color]" value="' . $value . '" class="color-picker" data-default-color="#666666" />';
}

// Callback para el campo del color hover del texto de la categoría
function pgp_category_color_hover_callback() {
    $options = get_option( 'pgp_gallery_settings' );
    $value = isset( $options['category_color_hover'] ) ? esc_attr( $options['category_color_hover'] ) : '#ffffff';
    echo '<input type="color" name="pgp_gallery_settings[category_color_hover]" value="' . $value . '" class="color-picker" data-default-color="#ffffff" />';
}