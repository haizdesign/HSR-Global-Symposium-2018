<?php

function haizdesign_enqueue_styles() {

    $parent_style = 'twentysixteen-style'; // This is 'twentysixteen-style' for the Twenty Sixteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'hsrglobal-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'mobile-menu', get_stylesheet_directory_uri() . '/mobile-menu/css/styles.css' );
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/font-awesome/font-awesome.min.css');
    if (is_front_page) {
        wp_enqueue_style( 'homestyles', get_stylesheet_directory_uri(). '/home-style.css' );
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
add_image_size('medium-thumb', 640, 400, true);

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
    add_editor_style( array( '/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );
}
add_action( 'after_setup_theme', 'haizdesign_theme_setup' );

// show featured images in dashboard
add_image_size( 'haizdesign-admin-post-featured-image', 120, 120, false );

// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);

// Add the column
function haizdesign_add_post_admin_thumbnail_column($haizdesign_columns){
    $haizdesign_columns['haizdesign_thumb'] = __('Featured Image');
    return $haizdesign_columns;
}

// Let's manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);

// Here we are grabbing featured-thumbnail size post thumbnail and displaying it
function haizdesign_show_post_thumbnail_column($haizdesign_columns, $haizdesign_id){
    switch($haizdesign_columns){
        case 'haizdesign_thumb':
        if( function_exists('the_post_thumbnail') )
            echo the_post_thumbnail( 'haizdesign-admin-post-featured-image' );
        else
            echo 'hmm... your theme doesn\'t support featured image...';
        break;
    }
}

// wrapper for featured images
if ( ! function_exists( 'twentysixteen_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own twentysixteen_post_thumbnail() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) :
    ?>

    <div class="post-thumbnail">
        <?php
        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
        if(!empty($get_description)){//If description is not empty show the div
            echo '<div class="thumbnail-inner"><div class="featured-caption">' . $get_description . '</div></div>';
            }
        the_post_thumbnail();
        ?>
    </div><!-- .post-thumbnail -->

    <?php else : ?>

    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
    </a>

    <?php endif; // End is_singular()
}
endif;

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/* custom login screen */
function haizdesign_loginpage_logo_link($url) {
    return get_bloginfo('wpurl');
}
function haizdesign_loginpage_logo_title($message) {
    return get_bloginfo('name');
}
function haizdesign_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/custom-login.css" />';
}
add_filter("login_headerurl","haizdesign_loginpage_logo_link");
add_filter("login_headertitle","haizdesign_loginpage_logo_title");
add_action('login_head', 'haizdesign_custom_login');


