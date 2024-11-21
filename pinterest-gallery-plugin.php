<?php
/**
 * Plugin Name: Galería BarmetMedia
 * Description: Un plugin de galería de imágenes con estilo moderno
 * Version: 1.0
 * Author: <a href="https://barmetmedia.com/" target="blank">BarmetMedia</a>
 * Text Domain: pinterest-gallery-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Salir si se accede directamente.
}

// Cargar archivos de funcionalidad
require_once plugin_dir_path( __FILE__ ) . 'includes/post-types.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/taxonomies.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/enqueue.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/templates.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/settings.php';