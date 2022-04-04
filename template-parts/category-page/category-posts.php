<section class="articles container">
    <div class="v-row" style="width:100%">
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
                <article class="article v-col-lg-4 v-col-md-6 v-col">
                    <div class="article-content">
                        <div class="article-content__img bg-orange">
                            <img class="article-content__img-img" src="<?php 
                                    if(has_post_thumbnail()) {
                                        the_post_thumbnail_url();
                                    } else {
                                        echo get_template_directory_uri() . '/assets/img/not-found.png';
                                    }
                                ?>" alt="article-img" loading="lazy">
                        </div>
                        <div class="article-content" style="width:100%">
                            <div class="article-content__header">
                                <span class="post__time-to-read"><?php the_time('M j, Y'); ?></span>
                                <?php echo reading_time() .' read'; ?>
                            </div>
                            <div class="article-content__body" style="width:100%">
                                <a href="<?php the_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                                <p class="post__text article-content__body-text">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            <?php }
        }
        wp_reset_postdata();
        ?>
    </div>
</section>
