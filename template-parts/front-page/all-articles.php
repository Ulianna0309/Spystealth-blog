<section id="primary" class="content-area articles container">
        <?php $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => '3',
            'paged' => 1,
        );
        $blog_posts = new WP_Query( $args ); ?>
        <?php if ( $blog_posts->have_posts() ) : ?>
            <div class="blog-posts v-row">
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
                               
            <?php endwhile; ?>
            </div>
            <div class="loadmore button_load-more">Load More</div>
            <span class="no-more-post"></span>
        <?php endif; ?>
    </section>