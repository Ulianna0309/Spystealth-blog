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
    }

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


function right_register_wp_sidebars() {

    register_sidebar(
        array(
            'id' => 'sidebar-1', 
            'name' => 'Sidebar content', 
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', 
            'before_widget' => '<div id="%1$s" class="side widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'right_register_wp_sidebars' );


## Удаляет "Рубрика: ", "Метка: ", "Категория: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
    return strip_tags( preg_replace('~^[^:]+: ~', '', $title ) );
});


## reading time
function reading_time() {
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
		$timer = " min";
	} else {
		$timer = " mins";
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}






## load-more для articles

function thecodehubs_enqueue_script_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_register_script( 'custom-script', get_stylesheet_directory_uri(). '/assets/js/load-more.js', array('jquery'), false, true );
    // Localize the script with new data
    $script_data_array = array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'security' => wp_create_nonce( 'load_more_posts' ),
    );
    wp_localize_script( 'custom-script', 'blog', $script_data_array );
    // Enqueued script with localized data.
    wp_enqueue_script( 'custom-script' ); 
  }
  add_action( 'wp_enqueue_scripts', 'thecodehubs_enqueue_script_style' );



  function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => '3',
      'paged' => $paged,
    );
    $blog_posts = new WP_Query( $args ); ?>
    <?php if ( $blog_posts->have_posts() ) : ?>
      <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
      <article class="article v-col-lg-4 v-col-md-6 v-col">
            <?php
                $category = get_the_category();
                $category_name = $category[0]->name;
                $category_link = get_category_link( $category[0] )
            ?>
            <div class="article-content">
                <div class="article-content__img bg-orange">
                    <a href="<?php echo get_permalink(); ?>">
                        <img class="article-content__img-img" src="<?php 
                            if(has_post_thumbnail()) {
                                the_post_thumbnail_url();
                            } else {
                                echo get_template_directory_uri() . '/assets/img/not-found.png';
                            }
                            ?>" alt="article-img" loading="lazy">
                    </a>
                </div>
                <div class="article-content__header">
                    <a href="<?= $category_link?>" class="post__category">
                        <?= $category_name?>
                    </a>
                    <span class="post__date"><?php the_time('M j, Y'); ?></span>
                </div>
                <div class="article-content__body">
                    <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                    <p class="post__text article-content__body-text">
                        <?php the_excerpt(); ?>
                    </p>
                </div>
                <div class="article-content__footer">
                    <div href="#" class="post__author"><?php the_author_posts_link(); ?></div>
                </div>
            </div>
        </article>
      <?php endwhile; 
    endif;
    wp_die();
  }
  add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
  add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');







  
 







  
require get_template_directory() . '/function-include/pageview_counter.php';

// функция вывода кнопки подгрузки постов
require get_template_directory() . '/function-include/set_button_load_more.php';

// Фильтрация записей на главной странице блога
require get_template_directory() . '/function-include/load_filtered_blog_posts.php';

// Подгрузка последних записей на главной странице блога
require get_template_directory() . '/function-include/load_more_all_posts.php';

// Подгрузка последних записей в категории tips
require get_template_directory() . '/function-include/load_more_tips_posts.php';

// Подгрузка последних записей в категории online safety
require get_template_directory() . '/function-include/load_more_online_safety_posts.php';

// Подгрузка последних записей в категории parental control
require get_template_directory() . '/function-include/load_more_parental_control_posts.php';

// Подгрузка последних записей на странице автора
require get_template_directory() . '/function-include/load_more_author_posts.php';

// Подгрузка отлфильтрованных простов автора
require get_template_directory() . '/function-include/load_filtered_author_posts.php';




    





?>