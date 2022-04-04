<section class="editor-post container v-row">
        <h1 class="main__title black v-col">Editors' Choice</h1>
        <div class="articles">

            <?php 
                $posts = get_posts( array(
                    'numberposts' => 4,
                    'category_name'    => 'editor',
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $posts as $post ){
                    setup_postdata($post);
                    ?>
        
                    <article class="article v-col-lg-6 v-col-md-6 v-col">
                        <?php
                            $category = get_the_category();
                            $category_name = $category[0]->name;
                            $category_link = get_category_link( $category[0] )
                        ?>
                        <div class="article-content">
                            <div class="article-content__body">
                                <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                                <p class="post__text article-content__body-text">
                                <?php the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="article-content__footer">
                                <a href="<?= $category_link?>" class="post__category">
                                    <?= $category_name?>
                                </a>
                                <span class="post__date">
                                    <?php the_time('M j, Y'); ?>
                                </span>
                            </div>
                        </div>
                    </article>

                    <?php
                }

                wp_reset_postdata(); // сброс
                ?>
            
        </div>

        <div class="swiper editor-post__slider hidden__desktop" data-slider-editor-posts>
            <div class="swiper-wrapper editor-post__container">
            <?php 
                $posts = get_posts( array(
                    'numberposts' => 4,
                    'category_name'    => 'editor',
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $posts as $post ){
                    setup_postdata($post);
                    ?>
                    <div class="swiper-slide editor-post__side">
                        <?php
                            $category = get_the_category();
                            $category_name = $category[0]->name;
                            $category_link = get_category_link( $category[0] )
                        ?>
                        <article class="article v-col">
                            <div class="article-content">
                                <div class="article-content__body">
                                    <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                                    <p class="post__text article-content__body-text">
                                    <?php the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="article-content__footer">
                                    <a href="<?= $category_link?>" class="post__category">
                                        <?= $category_name?>
                                    </a>
                                    <span class="post__date"><?php the_time('M j, Y'); ?></span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <?php
                }

                wp_reset_postdata(); // сброс
                ?>
            </div>
            <div class="swiper-pagination editor-post__pagination"></div>
        </div>
    </section>