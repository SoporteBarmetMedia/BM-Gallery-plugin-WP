<?php

// Crear Shortcode para mostrar la galería con filtro de categorías
function pgp_gallery_shortcode() {
    ob_start();

    // Obtener categorías
    $categories = get_terms( array(
        'taxonomy' => 'image_category',
        'hide_empty' => true,
    ) );

    // Obtener la URL actual de la página
    $current_url = get_permalink();

    // Formulario de filtro
    echo '<form method="GET" action="' . esc_url( $current_url ) . '">';
    echo '<select name="pgp_image_category" onchange="this.form.submit()">';
    echo '<option value="">Selecciona una categoría</option>';
    foreach ( $categories as $category ) {
        $selected = ( isset( $_GET['pgp_image_category'] ) && $_GET['pgp_image_category'] == $category->term_id ) ? 'selected' : '';
        echo '<option value="' . esc_attr( $category->term_id ) . '" ' . $selected . '>' . esc_html( $category->name ) . '</option>';
    }
    echo '</select>';
    echo '</form>';

    // Obtener la categoría seleccionada
    $selected_category = isset( $_GET['pgp_image_category'] ) ? intval( $_GET['pgp_image_category'] ) : 0;

    // Argumentos de consulta
    $args = array(
        'post_type' => 'ideas',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    // Aplicar el filtro por categoría si se ha seleccionado alguna
    if ( $selected_category ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'image_category',
                'field'    => 'term_id',
                'terms'    => $selected_category,
            ),
        );
    }

    $loop = new WP_Query( $args );

    if ( $loop->have_posts() ) {
        echo '<div class="pgp-gallery">';
        while ( $loop->have_posts() ) : $loop->the_post();
            echo '<div class="pgp-gallery-item">';
            echo '<a class="pgp-gallery-card" href="' . get_permalink() . '">';
            the_post_thumbnail( 'full' );
            echo '<p class="pgp-gallery-title">' . get_the_title() . '</p>';

            // Obtener las categorías de la imagen y mostrarlas
            $categories = get_the_terms( get_the_ID(), 'image_category' );
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                echo '<p class="pgp-gallery-category">';
                foreach ( $categories as $category ) {
                    echo esc_html( $category->name ) . ' ';
                }
                echo '</p>';
            }

            echo '</a>';
            echo '</div>';
        endwhile;
        echo '</div>';
    } else {
        echo 'No hay imágenes para mostrar.';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode( 'pinterest_gallery', 'pgp_gallery_shortcode' );