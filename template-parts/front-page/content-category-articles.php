<section class="seo-category container content-category">
        <h1 class="main__title black">Content</h1>
        <div class="seo-category__labels show-more" data-showmore>
            <?php 
                $posts = get_posts( array(
                    'numberposts' => -1,
                    'category_name'    => 'content-category',
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $posts as $post ){
                    setup_postdata($post);
                    ?>
                    <?php
                        $category = get_the_category();
                        $category_name = $category[0]->name;
                        $category_link = get_category_link( $category[0] )
                    ?>
                    <a href="<?php echo get_permalink(); ?>" class="category-label"><?php the_title(); ?></a>
                <?php
            }
            wp_reset_postdata(); // сброс
            ?>
        </div>

        <div class="articles">
            <div class="v-row">

            <?php 
            $posts = get_posts( array(
                'numberposts' => 3,
                'category_name'    => 'content-category',
                'orderby'     => 'date',
                'order'       => 'ASC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            foreach( $posts as $post ){
                setup_postdata($post);
                ?>
                <article class="article v-col-lg-4 v-col-md-6 v-col">
                    <?php
                        $category = get_the_category();
                        $category_name = $category[0]->name;
                        $category_link = get_category_link( $category[0] )
                    ?>
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
                        <div class="article-content__header">
                            <a href="<?= $category_link?>" class="post__category">
                                <?= $category_name?>
                            </a>
                        </div>
                        <div class="article-content__body">
                            <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                            <p class="post__text article-content__body-text">
                            <?php the_excerpt(); ?>
                            </p>
                        </div>
                        <div class="article-content__footer">
                            <div href="#" class="post__author"><?php the_author_posts_link(); ?></div>
                            <span class="post__date"><?php the_time('M j, Y'); ?></span>
                        </div>
                    </div>
                </article>

            <?php
            }

            wp_reset_postdata(); // сброс
            ?>
            </div>
        </div>
    </section>