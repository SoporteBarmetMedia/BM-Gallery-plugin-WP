<?php

// Registrar taxonomía de Categorías para Imágenes
function pgp_register_image_category_taxonomy() {
    $labels = array(
        'name'              => 'Categorías',
        'singular_name'     => 'Categoría',
        'search_items'      => 'Buscar Categorías',
        'all_items'         => 'Todas las Categorías',
        'parent_item'       => 'Categoría Padre',
        'parent_item_colon' => 'Categoría Padre:',
        'edit_item'         => 'Editar Categoría',
        'update_item'       => 'Actualizar Categoría',
        'add_new_item'      => 'Añadir Nueva Categoría',
        'new_item_name'     => 'Nuevo Nombre de Categoría',
        'menu_name'         => 'Categorías',
    );

    $args = array(
        'hierarchical'      => true, // Hace que funcione como categorías en lugar de etiquetas
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categoria-imagen' ),
    );

    register_taxonomy( 'image_category', array( 'ideas' ), $args );
}
add_action( 'init', 'pgp_register_image_category_taxonomy' );
