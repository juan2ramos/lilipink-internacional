<?php


//add image in posts
add_theme_support('post-thumbnails');
/**
define('themeDir', get_template_directory() . '/');
require(themeDir . 'functions/gallery.php');
 */


/* remove emoji comments */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* Add Menu */
add_action('init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus(
        array(
            'menuHeader' => __('Menu Header'),
            'menuFooter' => __('Menu Footer')
        )
    );
}

function template_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'template'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'template'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'template_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_styles()
{
    wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/public/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );
function theme_js()
{
    global $wp_scripts;
    wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
    wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );
    $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
    $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/public/js/main.js', '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );
/**
 * Create custom excerpt
 * @param $count
 * @return bool|string
 */
function get_excerpt($count){
    //$permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = $excerpt.'...';
    return $excerpt;
}

/**
 * create post custom
 */
function post_custom_init()
{
    $labels = array(
        'name' => _x('post_custom_init', 'post type general name', 'your-plugin-textdomain'),
        'singular_name' => _x('post_custom_init', 'post type general name', 'your-plugin-textdomain'),
        'menu_name' => _x('post_custom_init', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar' => _x('post_custom_init', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new' => _x('Añadir nuevo', 'post_custom_init', 'your-plugin-textdomain'),
        'add_new_item' => __('Añadir nuevo post_custom_init', 'your-plugin-textdomain'),
        'new_item' => __('Nuevo post_custom_init', 'your-plugin-textdomain'),
        'edit_item' => __('Editar post_custom_init', 'your-plugin-textdomain'),
        'view_item' => __('Ver post_custom_init', 'your-plugin-textdomain'),
        'all_items' => __('Todos los post_custom_init', 'your-plugin-textdomain'),
        'search_items' => __('Buscar post_custom_init', 'your-plugin-textdomain'),
        'parent_item_colon' => __('post_custom_init padre', 'your-plugin-textdomain'),
        'not_found' => __('No hemos post_custom_init Cliente.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No hemos encontrado post_custom_init en la papelera', 'your-plugin-textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description', 'your-plugin-textdomain'),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'post_custom_init'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'author', 'thumbnail')
    );

    register_post_type('post_custom_init', $args);
}

add_action('init', 'post_custom_init');