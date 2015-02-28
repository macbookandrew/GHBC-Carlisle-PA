<?php
function add_custom_css() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.min.css' );
    wp_dequeue_style( 'twentythirteen-style' );
}
add_action( 'wp_enqueue_scripts', 'add_custom_css' );

include('functions-branding.php');
include('functions-church.php');
