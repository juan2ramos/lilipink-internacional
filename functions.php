<?php

//add image in posts
add_theme_support('post-thumbnails');
/**
 * define('themeDir', get_template_directory() . '/');
 * require(themeDir . 'functions/gallery.php');
 */

/* remove emoji comments */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/* Add Menu */
add_action('init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus([
        'menuHeader' => __('Menu Header'),
        'menuFooter' => __('Menu Footer'),
    ]);
}

function template_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Sidebar', 'template'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'template'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}

add_action('widgets_init', 'template_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_styles()
{
    wp_enqueue_style('theme_css', get_template_directory_uri() . '/public/css/main.css');
}

add_action('wp_enqueue_scripts', 'theme_styles');
function theme_js()
{
    global $wp_scripts;
    wp_register_script('html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false);
    wp_register_script('respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false);
    $wp_scripts->add_data('html5_shiv', 'conditional', 'lt IE 9');
    $wp_scripts->add_data('respond_js', 'conditional', 'lt IE 9');
    wp_enqueue_style('theme_css2', 'https://npmcdn.com/flickity@1.2.1/dist/flickity.min.css');
    wp_enqueue_script('theme_js', get_template_directory_uri() . '/public/js/main.js', '', true, 'in_footer');
}

add_action('wp_enqueue_scripts', 'theme_js');
/**
 * Create custom excerpt
 *
 * @param $count
 *
 * @return bool|string
 */
function get_excerpt($count)
{
    //$permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = $excerpt . '...';

    return $excerpt;
}

/**
 * create post custom
 */
function post_custom_init()
{
    $labels = [
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
    ];

    $args = [
        'labels' => $labels,
        'description' => __('Description', 'your-plugin-textdomain'),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'post_custom_init'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'editor', 'author', 'thumbnail'],
    ];

    register_post_type('post_custom_init', $args);
}

add_action('init', 'post_custom_init');

add_action('rest_api_init', 'add_custom_fields');
function add_custom_fields()
{
    register_rest_field('producto', 'valor', //New Field Name in JSON RESPONSEs
        [
            'get_callback' => 'get_custom_fields', // custom function name
            'update_callback' => null,
            'schema' => null,
        ]);
    register_rest_field('producto', 'referencia', //New Field Name in JSON RESPONSEs
        [
            'get_callback' => 'get_custom_fields', // custom function name
            'update_callback' => null,
            'schema' => null,
        ]);

}

function get_custom_fields($object, $field_name, $request)
{
    return get_post_meta($object['id'], $field_name, true);
}

add_action('init', 'register_my_menus');


add_action('customize_register', 'customize_register_theme');


function customize_register_theme($wp_customize)
{
    $wp_customize->add_section('settings_theme', array(
        'title' => __('Configuración Lilipik', 'lilipink'),
        'priority' => 35
    ));

    //tel
    $wp_customize->add_setting('settings_theme[phone]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_phone', array(
        'label' => __('Teléfono', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[phone]',
    ));
    //face
    $wp_customize->add_setting('settings_theme[face]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_face', array(
        'label' => __('Facebook', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[face]',
    ));
    //ins
    $wp_customize->add_setting('settings_theme[ins]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_ins', array(
        'label' => __('Instagram', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[ins]',
    ));
    //copy1
    $wp_customize->add_setting('settings_theme[copy1]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_copy1', array(
        'label' => __('Copy 1', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[copy1]',
        'type' => 'textarea',
    ));
    //copy2
    $wp_customize->add_setting('settings_theme[copy2]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_copy2', array(
        'label' => __('Copy 2', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[copy2]',
        'type' => 'textarea',
    ));
    //facebookpdf
    $wp_customize->add_setting('settings_theme[facebookpdf]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_facebookpdf', array(
        'label' => __('Nombre facebook pdf', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[facebookpdf]',
    ));
    //inspdf
    $wp_customize->add_setting('settings_theme[inspdf]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_instagrampdf', array(
        'label' => __('Nombre Instagram pdf', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[inspdf]',
    ));
    //copypdf
    $wp_customize->add_setting('settings_theme[copypdf]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('lilipink_copypdf', array(
        'label' => __('Copy pdf', 'lilipink'),
        'section' => 'settings_theme',
        'settings' => 'settings_theme[copypdf]',
        'type' => 'textarea',
    ));
}



add_filter( 'acf_photo_gallery_caption_from_attachment', 'return_true' );






function countries_widgets_init() {
	register_sidebar( array(
		'name'          => 'Paises',
		'id'            => 'countries-id',
		'before_widget' => '<div class="Header-country">',
		'after_widget'  => '</div>',
	) );
}

add_action( 'widgets_init', 'countries_widgets_init' );








add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
//Add featured image
    register_rest_field(
        'producto', // Where to add the field (Here, blog posts. Could be an array)
        'post_image', // Name of new field (You can call this anything)
        array(
            'get_callback'    => 'get_image_src',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_image_src( $object, $field_name, $request ) {
    $feat_img_array = wp_get_attachment_image_src(
        $object['featured_media'], // Image attachment ID
        'large',  // Size.  Ex. "thumbnail", "large", "full", etc..
        true // Whether the image should be treated as an icon.
    );
    return $feat_img_array[0];
}

function ws_register_images_field() {
    register_rest_field(
        'producto',
        'imagesModal',
        array(
            'get_callback'    => 'ws_get_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'ws_register_images_field' );

function ws_get_images_urls( $object, $field_name, $request ) {

    $ids = get_post_meta($object['id'], 'fotos', true);
    $idsArray = explode(",", $ids);
    $idReturn = [wp_get_attachment_url( get_post_thumbnail_id( $object->id )  )];
    foreach ($idsArray as $id){
        $idReturn[] = wp_get_attachment_url( $id );
    }

    return $idReturn;
}



