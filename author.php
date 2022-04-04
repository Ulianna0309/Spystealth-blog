<?php
$term = get_queried_object();
get_header();
?>
    <main id="main" class="author-page main-content" data-main-content="author-posts">
        <section class="main-bg">
            <div class="container">
                <?php get_template_part( 'template-parts/author-page/reviews-author');?>
                <?php get_template_part( 'template-parts/author-page/author-posts');?>
                <?php get_template_part( 'template-parts/front-page/boost' );?>
            </div>
        </section>
    </main>
<?php
get_footer();


