<?php
function add_custom_css() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.min.css' );
    wp_dequeue_style( 'twentythirteen-style' );

    // fonts
    wp_dequeue_style( 'twentythirteen-fonts' );
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false ); // dependency workaround from https://gist.github.com/thetrickster/8946567
    wp_dequeue_style( 'bitter' );

    wp_enqueue_style( 'webfonts', '//fonts.googleapis.com/css?family=Alegreya+Sans:400,700,400italic|Alegreya:400,700' );
}
add_action( 'wp_print_styles', 'add_custom_css' );

include('functions-branding.php');
include('functions-church.php');

// strip sidebar class from body_class when using full-width page template
add_filter('body_class', 'remove_full_width_body_class', 20, 2);

function remove_full_width_body_class( $wp_classes ) {
    if( is_page_template('page-no-sidebar.php') ) {
        foreach($wp_classes as $key => $value) {
            if ($value == 'sidebar') unset( $wp_classes[$key] );
        }
    }
    return $wp_classes;
}

// manually specify AMR date localization
function amr_format_date( $format, $datestamp ) { /* want a  integer timestamp or a date object  */
    global 	$amr_options,
            $amr_globaltz;

    $method = 'wp';  // v4.0.9 was none

	date_timezone_set ($datestamp, $amr_globaltz);  /* Converting here, but then some derivations wrong eg: unsetting of end date */

	if (isset($_GET['tzdebug'])) echo  '<br />'.$datestamp->format('c');

    return amr_wp_format_date ( $format, $datestamp, false);
}
