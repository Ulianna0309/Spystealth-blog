<?php
get_header();
$category = get_queried_object();
?>
    <main class="main-content category-page archive-page archive-page--<?php echo $category->slug; ?>" data-main-content="<?php echo $category->slug; ?>">
        <?php
            get_template_part( 'template-parts/category/category-hero');
            get_template_part( 'template-parts/category/category-posts');
        ?>
    </main>
<?php
get_footer();









