<?php

function haizdesign_enqueue_styles() {

    $parent_style = 'twentysixteen-style'; // This is 'twentysixteen-style' for the Twenty Sixteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'hsrglobal-style',
        get_stylesheet_directory_uri() . '/style.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/font-awesome/font-awesome.min.css');
    if (is_front_page) {
        wp_enqueue_style( 'homestyles', get_stylesheet_directory_uri(). '/home-style.min.css' );
    }
    wp_enqueue_script('hdjquery', get_stylesheet_directory_uri() . '/js/hd.jquery.js', array(jquery), '160617', true);
}
// add some more stuff here
add_action( 'wp_enqueue_scripts', 'haizdesign_enqueue_styles' );

// This theme uses wp_nav_menu() in three locations.
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'haizdesign' ),
    'social'  => __( 'Social Links Menu', 'haizdesign' ),
    'footer'  => __( 'Footer Menu', 'haizdesign' ),
) );

// Featured image sizes
add_theme_support('post-thumbnails');
add_image_size('small-thumb', 300, 200, true);

// Limit excerpt length
function haizdesign_excerpt_length ($length) {
    return 30;
}
add_filter ('excerpt_length', 'haizdesign_excerpt_length', 999);

// Custom more link text
function haizdesign_excerpt_more() {
	$link = sprintf( '<a href="%1$s" class="more-link"><button  class="btn">%2$s</button></a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'haizdesign' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'haizdesign_excerpt_more' );

function haizdesign_theme_setup() {
	// override parent theme's 'more' text for excerpts
	remove_filter( 'excerpt_more', 'twentysixteen_excerpt_more' );
	remove_filter( 'get_the_excerpt', 'twentysixteen_excerpt_more' );
}
add_action( 'after_setup_theme', 'haizdesign_theme_setup' );
