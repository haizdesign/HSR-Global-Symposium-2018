<?php

function haizdesign_enqueue_styles() {

    $parent_style = 'twentysixteen-style'; // This is 'twentysixteen-style' for the Twenty Sixteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'hsrglobal-style',
        get_stylesheet_directory_uri() . '/style.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
// add some more stuff here
add_action( 'wp_enqueue_scripts', 'haizdesign_enqueue_styles' );

// This theme uses wp_nav_menu() in three locations.
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'haizdesign' ),
    'social'  => __( 'Social Links Menu', 'haizdesign' ),
    'footer'  => __( 'Footer Menu', 'haizdesign' ),
) );
