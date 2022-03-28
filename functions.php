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





function true_jquery_register()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', (get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js'), false, null, true);
        wp_enqueue_script('jquery');
    }
}

add_action('init', 'true_jquery_register');


// function contributors() {
// 	global $wpdb;
// 	$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users WHERE display_name <> 'admin' ORDER BY display_name");

// 	foreach ($authors as $author ) {

// 		echo "<li>";
// 		echo "<a href=\"".get_bloginfo('url')."/author/";
// 		the_author_meta('user_nicename', $author->ID);
// 		echo "/\">";
// 		echo get_avatar($author->ID);
// 		echo "</a>";
// 		echo '<p>';
// 		echo "<a href=\"".get_bloginfo('url')."/author/";
// 		the_author_meta('user_nicename', $author->ID);
// 		echo "/\">";
// 		the_author_meta('display_name', $author->ID);
// 		echo "</a>";
// 		echo "</p>";
// 		echo "</li>";

// 	}
// }


// add_filter('single_template', function($single_template){
//     $parent = '8';
//     $categories = get_categories('child_of=' . $parent);
//     $cat_names = wp_list_pluck ($categories, 'name');

//     if(has_category('movies') || has_category($cat_names)){
//         $single_template = dirname (__FILE__) . '/single-template.php';
//     }
//     return $single_template;
// }, PHP_INT_MAX, 2);
?>