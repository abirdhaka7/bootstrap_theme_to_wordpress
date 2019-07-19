<?php

function bootstrap_to_wordpress_theme_styles(){

    // Load all CSS files
    wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() .'/assets/css/bootstrap.min.css', Null , Null );

    wp_enqueue_style( 'carousel', get_template_directory_uri() .'/assets/css/carousel.css', Null , Null );

    wp_enqueue_style( 'main', get_template_directory_uri() .'/assets/css/main.css', Null , Null );

    // Load all JS files
    wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() .'/assets/js/bootstrap.bundle.min.js', array('jquery') , Null );
 

}
add_action( 'wp_enqueue_scripts', 'bootstrap_to_wordpress_theme_styles' );


function register_theme_menu(){

    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'bootstrap_to_wordpress'),
        'footer_menu'  => __('Footer Menu', 'bootstrap_to_wordpress')
    ));

}
add_action( 'init' , 'register_theme_menu' );

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


function create_widgets( $name, $id, $description){
    register_sidebar(array(
        'name'          => $name,
        'id'            => $id,
        'description'   => $description,
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}

create_widgets( 'Front Left', 'front_left', 'This is front page left widget');

create_widgets( 'Front Middle', 'front_middle', 'This is front page middle widget');

create_widgets( 'Front Right', 'front_right', 'This is front page right widget');

//page sidebar widget
create_widgets( 'Page sidebar', 'page_sidebar', 'This is page sidebar');

//Blog sidebar widget
create_widgets( 'blog sidebar', 'blog_sidebar', 'This is blog sidebar');




add_theme_support( 'post-thumbnails');


//This function will remove the extra text that will make through more tag for continue reading and also start the post single page from top
function remove_more_link_scroll($link){

    $link = preg_replace('|#more-[0-9]+|', '' , $link );
    return $link;

}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


//this function will define the length of excerpt
function control_excerpt_length( $length ){
    return 30;
}
add_filter('excerpt_length','control_excerpt_length');


//this function will remove the [...] of excerpt
function remove_dot_from_excerpt( $remove ){

    return ' <a href=" '. get_the_permalink() . ' ">Read more..</a>';

}
add_filter('excerpt_more', 'remove_dot_from_excerpt');