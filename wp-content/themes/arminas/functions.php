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

    unset( $tabs['additional_information'] );
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

/**
* Admin panel access restriction except administrator
**/

add_action( 'init', 'arvestrix_blockusers_init' );
function arvestrix_blockusers_init() {
if ( is_admin() && ! current_user_can( 'administrator' ) &&
! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
wp_redirect( home_url() );
exit;
}
}

/**
* Change shop page link in cart page
**/

function arvestrix_empty_cart_redirect_url() {

    return home_url();
}
add_filter( 'woocommerce_return_to_shop_redirect', 'arvestrix_empty_cart_redirect_url' );


/**
* Change return to shop button text in cart page
**/

add_filter( 'gettext', 'arvestrix_change_woocommerce_return_to_shop_text', 20, 3 );

function arvestrix_change_woocommerce_return_to_shop_text( $translated_text, $text, $domain ) {

    switch ( $translated_text ) {

        case 'Return to shop' :

        $translated_text = __( 'Return to Home', 'woocommerce' );
        break;

    }

    return $translated_text;
}

/**
* Curl function for instagram api
**/
function arvestrix_instagram_api_curl_connect( $api_url ){
    $connection_c = curl_init(); // initializing
    curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
    curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
    curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
    $json_return = curl_exec( $connection_c ); // connect and get json data
    curl_close( $connection_c ); // close connection
    return json_decode( $json_return ); // decode and return
}

/**
* Fetch and display all instagram images
**/

function arvestrix_get_all_instagram_images() {
    $access_token = 'YOUR ACCESS TOKEN';
    $username = 'jonvaughns1';
    $user_search = arvestrix_instagram_api_curl_connect("https://api.instagram.com/v1/users/search?q=" . $username . "&access_token=" . $access_token);
    $user_id = $user_search->data[0]->id; // or use string 'self' to get your own media
    $return = arvestrix_instagram_api_curl_connect("https://api.instagram.com/v1/users/" . $user_id . "/media/recent?access_token=" . $access_token);

    /*foreach ($return->data as $post) {
        echo '<a href="' . $post->images->standard_resolution->url . '" class="fancybox"><img src="' . $post->images->thumbnail->url . '" /></a>';
    }*/
}


/**
* Exclude pages and posts from search query
**/

function arvestrix_SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type','product');
}
return $query;
}
 
add_filter('pre_get_posts','arvestrix_SearchFilter');




