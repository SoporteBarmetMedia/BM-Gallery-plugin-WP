<?php

// Registro de un Custom Post Type para las imágenes
function pgp_register_image_post_type() {
    $labels = array(
        'name'               => 'Ideas',
        'singular_name'      => 'Idea',
        'menu_name'          => 'Galería BM',
        'name_admin_bar'     => 'Idea',
        'add_new'            => 'Añadir Nueva',
        'add_new_item'       => 'Añadir Nueva Imagen',
        'new_item'           => 'Nueva Imagen',
        'edit_item'          => 'Editar Imagen',
        'view_item'          => 'Ver Imagen',
        'all_items'          => 'Todas las Imágenes',
        'search_items'       => 'Buscar Imágenes',
        'not_found'          => 'No se encontraron imágenes.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-format-image',
        'show_in_rest'       => true,
    );

    register_post_type( 'ideas', $args );
}
add_action( 'init', 'pgp_register_image_post_type' );
