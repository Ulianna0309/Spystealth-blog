<?php
add_action('wp_enqueue_scripts', 'spystealth_scripts');

function spystealth_scripts() {
    wp_enqueue_style( 'spystealth-style', get_stylesheet_uri() );

    wp_enqueue_script( 'spystealth-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
};

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);
function filter_nav_menu_link_attributes($atts, $item, $args) {
    if ($args->menu === 'Main-menu' || "Menu-top") {
        $atts['class'] = 'header-top__menu-item--link';

        if ($item->current) {
            $atts['class'] .= ' header-top__menu-item--link--active';
        }
    };

    return $atts;
}
?>