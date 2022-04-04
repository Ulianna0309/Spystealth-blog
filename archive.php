<?php
get_header();
$category = get_queried_object();
?>
    <main class="main-content category-page archive-page archive-page--<?php echo $category->slug; ?>" data-main-content="<?php echo $category->slug; ?>">
        <?php
            get_template_part( 'template-parts/category-page/category-hero');
            get_template_part( 'template-parts/category-page/category-posts');
            get_template_part( 'template-parts/front-page/boost' );
        ?>
    </main>
<?php
get_footer();









