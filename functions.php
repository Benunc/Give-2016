<?php
/**
 * Give 2016 Child Theme Functions
 */


/*
 * Enqueue the parent style.css
 *
 * twentysixteen parent theme for twentsixteen-child
 *
 */
add_action( 'wp_enqueue_scripts', 'give_2016_enqueue_styles' );
function give_2016_enqueue_styles() {

    $parent_style = 'twentysixteen-css';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
}

add_filter('body_class', 'give_archive_no_sidebar');

function give_archive_no_sidebar($classes) {
    if ( is_post_type_archive('give_forms') ) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
