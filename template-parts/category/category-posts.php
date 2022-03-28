<section class="popular-posts">
    <?php
    $category = get_queried_object();
    $category_slug = $category->slug;
    $category_name = $category->name;
    $category_id = $category->term_id;

    $args = array(
        'order' => 'desc',
        'posts_per_page' => -1,
        'post_type' => 'post',
        'cat' => $category_id,
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <article class="popular-post post-card-animation">
                <div class="popular-post__content">
                    <div class="popular-post__header">
                        <span class="category-label category-label--<?= $category_slug; ?> category-label--no-changes">
                            <?= $category_name?>
                        </span>
                        <span class="popular-post__date">
                            <?php the_time('M j, Y'); ?>
                        </span>
                    </div>
                    <div class="popular-post__body">
                        <a href="<?php the_permalink(); ?>" class="popular-post__title">
                            <?php the_title(); ?>
                        </a>
                    </div>
                    <div class="popular-post__footer">
                        <div class="popular-post__author">
                            <?php the_author_posts_link(); ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php }
    }
    wp_reset_postdata();
    ?>
</section>
