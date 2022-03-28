<?php
$term = get_queried_object();
?>
<div class="articles container">
    <div class="v-row article__container" style="width: 100%">
            <?php
            $args = array(
                'posts_per_page' => 6,
                'post_type' => 'post',
                'author' => get_queried_object() -> ID
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();

                    $post_category = get_the_category();
                    $category_link = get_category_link( $post_category[0] )
                    ?>
                    <article class="article v-col-lg-4 v-col-md-6 v-col" style="margin-bottom: 20px;">
                        <div class="article-content__img bg-orange">
                            <img class="article-content__img-img" src="<?php 
                                    if(has_post_thumbnail()) {
                                        the_post_thumbnail_url();
                                    } else {
                                        echo get_template_directory_uri() . '/assets/img/not-found.png';
                                    }
                                ?>" alt="article-img" loading="lazy">
                        </div>
                        <div class="article-content">
                            <div class="article-content__header">
                                <a href="<?= $category_link; ?>" class="post__category--<?= $post_category[0]->slug; ?>">
                                    <?= $post_category[0]->name; ?>
                                </a>
                                <span class="post__time-to-read"><?php the_time('M j, Y'); ?></span>
                            </div>
                            <div class="article-content__body">
                                <a href="<?php the_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                                <p class="post__text article-content__body-text">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                        </div>
                    </article>
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
    </div>
</div>
