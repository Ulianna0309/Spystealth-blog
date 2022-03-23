<?php
add_action('wp_enqueue_scripts', 'spystealth_scripts');

function spystealth_scripts() {
    wp_enqueue_style( 'spystealth-style', get_stylesheet_uri() );

    wp_enqueue_script( 'spystealth-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
};

add_theme_support( 'custom-logo' );

?>