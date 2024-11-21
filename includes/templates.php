<?php

// Función para utilizar la plantilla personalizada para el tipo de post 'ideas'
function pgp_single_template( $template ) {
    global $post;

    if ( 'ideas' === $post->post_type && locate_template( array( 'templates/single-image.php' ) ) !== $template ) {
        return plugin_dir_path( __FILE__ ) . 'templates/single-image.php';
    }

    return $template;
}
add_filter( 'single_template', 'pgp_single_template' );
