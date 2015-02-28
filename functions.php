<?php
function add_custom_css() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/css/style.min.css' );
    wp_dequeue_style( 'twentyfourteen-style' );
}
add_action( 'wp_enqueue_scripts', 'add_custom_css' );

include('functions-branding.php');
include('functions-custom_post_types.php');
