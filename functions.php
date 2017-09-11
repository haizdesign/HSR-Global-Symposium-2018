<?php

function haizdesign_enqueue_styles() {

    $parent_style = 'twentysixteen-style'; // This is 'twentysixteen-style' for the Twenty Sixteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'hsrglobal-style',
        get_stylesheet_directory_uri() . '/hsr.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/font-awesome/font-awesome.min.css');
    if (is_front_page) {
        wp_enqueue_style( 'homestyles', get_stylesheet_directory_uri(). '/home-style.css' );
    }
    wp_enqueue_script('haizdesign-jquery', get_stylesheet_directory_uri() . '/js/hd.jquery.js', array(jquery), '160617', true);
    wp_enqueue_script( 'haizdesign-search', get_stylesheet_directory_uri() . '/js/hide-search.js', array(), '060717', true );
}
// load the scripts
add_action( 'wp_enqueue_scripts', 'haizdesign_enqueue_styles' );

// This theme uses wp_nav_menu() in three locations.
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'haizdesign' ),
    'social'  => __( 'Social Links Menu', 'haizdesign' ),
    'footer'  => __( 'Footer Menu', 'haizdesign' ),
) );

//  add new sidebar for top page nav
function header_widgets_init() {
    register_sidebar( array(
        'name' => 'Top Page Navigation',
        'description' => 'Leave this blank and add your menu on the editor page',
        'id' => 'topnav_sidebar',
        'before_widget' => '<div class="top-nav site-inner">',
        'after_widget' => '</div>',
    ) );
}

add_action( 'widgets_init', 'header_widgets_init' );

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
	$link = sprintf( '<a href="%1$s" class="more-link button">%2$s</a>',
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

//  icons for devices etc
add_action('wp_head', 'add_site_icons');
function add_site_icons() {
    ?>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri();?>/favicon.png" />
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri();?>/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="58x58" href="<?php echo get_stylesheet_directory_uri();?>/icons/apple-touch-icon-58x58.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/icons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri();?>/icons/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/icons/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/icons/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/icons/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/icons/apple-touch-icon-152x152.png" />
<?php
}
//  remove google fonts
function haizdesign_dequeue_google_fonts() {
    wp_dequeue_style( 'twentysixteen-fonts' );
}
add_action( 'wp_enqueue_scripts', 'haizdesign_dequeue_google_fonts', 20 );

//  hide url field on comment form
function haizdesign_disable_comment_url($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','haizdesign_disable_comment_url');

// show featured images in dashboard
add_image_size( 'haizdesign-admin-post-featured-image', 120, 120, false );

// Add the posts and pages columns filter. They both use the same function.
add_filter('manage_posts_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);

// Add the column
function haizdesign_add_post_admin_thumbnail_column($haizdesign_columns){
    $haizdesign_columns['haizdesign_thumb'] = __('Featured Image');
    return $haizdesign_columns;
}

// Manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);

// Get featured-thumbnail size post thumbnail and display it
function haizdesign_show_post_thumbnail_column($haizdesign_columns, $haizdesign_id){
    switch($haizdesign_columns){
        case 'haizdesign_thumb':
        if( function_exists('the_post_thumbnail') ) {
            echo the_post_thumbnail( 'haizdesign-admin-post-featured-image' );
        }
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
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('topnav_sidebar') ) : endif;
    ?>

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

/* scrollup */
function haizdesign_scrollup() {
    echo '<a href="#masthead" id="scrollup"></a>';
}
add_action( 'haizdesign_after_footer', 'haizdesign_scrollup', 10 );

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

//  keynote speakers cpt
if ( ! function_exists('keynote_speakers_post_type') ) {

    function keynote_speakers_post_type() {

        $labels = array(
            'name'                  => _x( 'Keynote Speakers', 'Post Type General Name', 'twentysixteen' ),
            'singular_name'         => _x( 'Keynote Speaker', 'Post Type Singular Name', 'twentysixteen' ),
            'menu_name'             => __( 'Keynote Speakers', 'twentysixteen' ),
            'name_admin_bar'        => __( 'Keynote Speaker', 'twentysixteen' ),
            'archives'              => __( 'Speakers Archives', 'twentysixteen' ),
            'attributes'            => __( 'Speaker Attributes', 'twentysixteen' ),
            'parent_item_colon'     => __( 'Parent Item:', 'twentysixteen' ),
            'all_items'             => __( 'All Keynote Speakers', 'twentysixteen' ),
            'add_new_item'          => __( 'Add New Keynote Speaker', 'twentysixteen' ),
            'add_new'               => __( 'Add New Speaker', 'twentysixteen' ),
            'new_item'              => __( 'New Keynote Speaker', 'twentysixteen' ),
            'edit_item'             => __( 'Edit Speaker', 'twentysixteen' ),
            'update_item'           => __( 'Update Speaker', 'twentysixteen' ),
            'view_item'             => __( 'View Speaker', 'twentysixteen' ),
            'view_items'            => __( 'View Keynote Speakers', 'twentysixteen' ),
            'search_items'          => __( 'Search Keynote Speakers', 'twentysixteen' ),
            'not_found'             => __( 'Speaker Not found', 'twentysixteen' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'twentysixteen' ),
            'featured_image'        => __( 'Featured Image', 'twentysixteen' ),
            'set_featured_image'    => __( 'Set featured image', 'twentysixteen' ),
            'remove_featured_image' => __( 'Remove featured image', 'twentysixteen' ),
            'use_featured_image'    => __( 'Use as featured image', 'twentysixteen' ),
            'insert_into_item'      => __( 'Insert into speaker', 'twentysixteen' ),
            'uploaded_to_this_item' => __( 'Uploaded to this keynote speaker', 'twentysixteen' ),
            'items_list'            => __( 'Keynote Speakers list', 'twentysixteen' ),
            'items_list_navigation' => __( 'Speakers list navigation', 'twentysixteen' ),
            'filter_items_list'     => __( 'Filter speakers list', 'twentysixteen' ),
        );
        $args = array(
            'label'                 => __( 'Keynote Speaker', 'twentysixteen' ),
            'description'           => __( 'Custom post type for the HSR Keynote Speakers', 'twentysixteen' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-microphone',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,        
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'keynote_speakers', $args );

    }
    add_action( 'init', 'keynote_speakers_post_type', 0 );

}
