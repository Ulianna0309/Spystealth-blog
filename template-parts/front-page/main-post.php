<section class="main-post">
    <div class="container">
    <?php 
        $posts = get_posts( array(
            'numberposts' => 1,
            'category_name'    => 'main-post',
            'orderby'     => 'date',
            'order'       => 'ASC',
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );

        foreach( $posts as $post ){
            setup_postdata($post);
            ?>

            <div class="main-post__block v-row">
                <?php
                    $category = get_the_category();
                    $category_name = $category[0]->name;
                    $category_link = get_category_link( $category[0] )
                ?>
            
                <div class="main-post__desc v-col-lg-6 v-col-md-12 v-col">
                    <a href="<?php echo get_permalink(); ?>" class="main-post__desc-title post__title"><?php the_title(); ?></a>
                    <p class="post__text"><?php the_excerpt(); ?></p>
                    <div class="main-post__desc-view">
                        <span class="post__date"><?php the_time('M j, Y'); ?></span>
                        <a href="<?= $category_link?>" class="post__category">
                            <?= $category_name?>
                        </a>
                    </div>
                </div>
                <div class="v-col-lg-6 v-col-md-12 v-col" style="text-align: center;">
                    <a href="<?php echo get_permalink(); ?>">
                        <img class="main-post-event__img" src="<?php 
                        if(has_post_thumbnail()) {
                            the_post_thumbnail_url();
                        } else {
                            echo get_template_directory_uri() . '/assets/img/not-found.png';
                        }
                        ?>" alt="article-img" loading="lazy">
                    </a>
                </div>
            </div>

        <?php
        }

        wp_reset_postdata(); // сброс
        ?>

    </div>
</section>