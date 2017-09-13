<?php
/**
* Enqueue Main Style Sheet & Scripts
*/

function arminas_stylesheets_scripts() {
    wp_enqueue_style( 'arminas-style', get_stylesheet_uri() );
    wp_enqueue_style( 'arminas-custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
    
    wp_register_script(
        'extra-login-css', 
        get_template_directory_uri() . '/assets/js/extra-login-css.js',
        array( 'jquery' ),
        '',
        TRUE
    );
    wp_enqueue_script( 'extra-login-css' );

}
add_action( 'wp_enqueue_scripts', 'arminas_stylesheets_scripts' );

/**
* Enable Theme Supports
*/

function arminas_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
}
add_action( 'after_setup_theme', 'arminas_support' );

/**
* Create sliders post type
*/
function arminas_create_posttype_slider() {
 
    register_post_type( 'arminas_sliders',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Sliders' ),
                'singular_name' => __( 'Slider' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'arminas_sliders'),
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'arminas_create_posttype_slider' );

/**
* Create Faq's post type
*/
function arminas_create_posttype_faqs() {
 
    register_post_type( 'arminas_faqs',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Faq\'s' ),
                'singular_name' => __( 'Faq' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'arminas_faqss'),
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'arminas_create_posttype_faqs' );

/**
* Hide admin toolbar
*/
add_filter('show_admin_bar', '__return_false');


/**
* Adding Theme Options page
*/
require_once get_template_directory()."/inc/theme_options.php";

/**
* Allow SVG upload
*/
function arminas_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'arminas_mime_types');

/**
* Add Forgot Password Link
*/

add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
return '<span class="align-right"><a href="'.wp_lostpassword_url( get_permalink() ).'">Forgot your password?</a></span>';
}

/**
* Add Remember Me Link
*/
add_action( 'login_form_bottom', 'add_keep_me_logged_in_link' );
function add_keep_me_logged_in_link() {
return '<div class="form-group keep-sign"><lebel><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Keep me signed in.</lebel></div>';
}


/**
* Remove the description tab
*/
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    return $tabs;

}

add_filter( 'woocommerce_product_tabs', 'woo_new_product_details_tab' );
function woo_new_product_details_tab( $tabs ) {
    
    
/**
* Add product details tab
*/  
    $tabs['product_details'] = array(
        'title'     => __( 'Product Details', 'woocommerce' ),
        'priority'  => 40,
        'callback'  => 'woo_new_product_details_tab_content'
    );

    $tabs['faq'] = array(
        'title'     => __( 'FAQ', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'woo_new_product_faq_tab_content'
    );

    return $tabs;

}
function woo_new_product_details_tab_content() {

    // The new tab content

    echo '<h2>New Product Tab</h2>';
    echo '<p>Here\'s your new product tab.</p>';
    
}

function woo_new_product_faq_tab_content() {

    // The new tab content

    echo '<h2>New Product Tab</h2>';
    echo '<p>Here\'s your new product tab.</p>';
    
}