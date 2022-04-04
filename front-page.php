<?php
    get_header();
?>


<main class="main-content">

    <?php get_template_part( 'template-parts/front-page/main-post' );?>
    <?php get_template_part( 'template-parts/front-page/all-articles' );?>
    <?php set_button_load_more(); ?>
    <?php get_template_part( 'template-parts/front-page/editor-articles' );?>
    <?php get_template_part( 'template-parts/front-page/main-post-event' );?>
    <?php get_template_part( 'template-parts/front-page/seo-category-articles' );?>
    <?php get_template_part( 'template-parts/front-page/main-form' );?>
    <?php get_template_part( 'template-parts/front-page/marketing-category-articles' );?>
    <?php get_template_part( 'template-parts/front-page/boost' );?>
    <?php get_template_part( 'template-parts/front-page/content-category-articles' );?>
</main>


<?php 
    get_footer();
?>



