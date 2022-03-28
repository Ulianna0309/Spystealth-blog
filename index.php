<?php
    get_header();
?>


<main class="main-content">
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


    <section class="articles container">
        <div class="v-row">

        <?php 
            $posts = get_posts( array(
                'numberposts' => -1,
                'category_name'    => 'article',
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
            <?php
            }

            wp_reset_postdata(); // сброс
            ?>

        </div>
    </section>



    <section class="editor-post container v-row">
        <h1 class="main__title black v-col">Editors' Choice</h1>
        <div class="articles">

            <?php 
                $posts = get_posts( array(
                    'numberposts' => -1,
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
                    'numberposts' => -1,
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

    <section class="main-post-event container">
        <?php 
            $posts = get_posts( array(
                'numberposts' => 1,
                'category_name'    => 'online-event',
                'orderby'     => 'date',
                'order'       => 'ASC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            foreach( $posts as $post ){
                setup_postdata($post);
                ?>
                <div class="main-post-event__block v-row">
                    <?php
                        $category = get_the_category();
                        $category_name = $category[0]->name;
                        $category_link = get_category_link( $category[0] )
                    ?>
                    <div class="main-post-event__desc v-col-lg-6 v-col-md-12">
                        <a href="<?= $category_link?>" class="mark-round bg-orange black">
                                <?= $category_name?>
                        </a>
                        <a href="<?php echo get_permalink(); ?>" class="main-post-event__desc-title post__title"><?php the_title(); ?></a>
                        <p class="main-post-event__desc-text post__text"><?php the_excerpt(); ?></p>
                        <a class="button__register" data-subscribe><?php the_field('online-event_link'); ?></a>
                    </div>
                    <div class="v-col-lg-6 v-col-md-12 v-col" style="text-align:center;">
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
    </section>

    <section class="seo-category container">
        <h1 class="main__title black">SEO</h1>
        <div class="seo-category__labels show-more">
        <?php 
                $posts = get_posts( array(
                    'numberposts' => -1,
                    'category_name'    => 'seo-category',
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
                'numberposts' => -1,
                'category_name'    => 'seo-category',
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
                            <span class="post__time-to-read"><?php the_field('article_time'); ?></span>
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


    <section class="main-form container">
        <div class="main-form__container v-row">
            <div class="main-form__desc v-col-lg-5">
                <h1 class="main__title black">Give me the latest news!</h1>
                <p class="post__text black">
                    Want to know which websites saw the most traffic growth in your industry? Not sure why your SEO strategy doesn’t work? Or simply looking for SEO tips? Subscribe to our newsletter to receive updates on the content you care about.
                </p>

                <?php echo do_shortcode('[contact-form-7 id="156" title="Subscibe form"]'); ?>
                <div class="form-label black">By clicking “Subscribe” you agree to Spystealth
                    <a class="white__link" target="_blank" href="#">Privacy Policy</a>
                    and consent to Spystealth using your contact data for newsletter purposes
                </div>
            </div>
            <img class="main-form__img v-col-lg-5" src="<?php echo bloginfo('template_url'); ?>/assets/img/anytime.png" alt="anytime" loading="lazy">
        </div>
    </section>

    <section class="seo-category container marketing-category">
        <h1 class="main__title black">Marketing</h1>
        <div class="seo-category__labels show-more" data-showmore>
        <?php 
                $posts = get_posts( array(
                    'numberposts' => -1,
                    'category_name'    => 'marketing-category',
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
                'numberposts' => -1,
                'category_name'    => 'marketing-category',
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



    <section class="boost container v-row">
        <?php 
            $posts = get_posts( array(
                'numberposts' => 1,
                'category_name'    => 'boost',
                'orderby'     => 'date',
                'order'       => 'ASC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            foreach( $posts as $post ){
                setup_postdata($post);
                ?>

                <section class="boost container v-row">
                    <div class="boost__img v-col-lg-6 v-col-md-12">
                        <img class="article-content__img-img" src="<?php 
                                    if(has_post_thumbnail()) {
                                        the_post_thumbnail_url();
                                    } else {
                                        echo get_template_directory_uri() . '/assets/img/not-found.png';
                                    }
                        ?>" alt="article-img" loading="lazy">
                    </div>
                    <div class="boost__desc v-col-lg-6 v-col-md-12">
                        <h1 class="main__title black boost__title"><?php the_title(); ?></h1>
                        <button class="button__trial button__subscribe" type="button" data-subscribe>GET TRIAL</button>
                    </div>
                </section>

                <?php
        }

        wp_reset_postdata(); // сброс
        ?>
    </section>

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

</main>


<?php 
    get_footer();
?>



