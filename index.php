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
            
                <div class="main-post__desc v-col-lg-5 v-col-md-12 v-col">
                    <a href="<?php echo get_permalink(); ?>" class="main-post__desc-title post__title"><?php the_title(); ?></a>
                    <p class="main-post__desc-text post__text"><?php the_field('main-post_text'); ?></p>
                    <div class="main-post__desc-view">
                        <span class="post__date"><?php the_time('M j, Y'); ?></span>
                        <a href="<?= $category_link?>" class="post__category">
                            <?= $category_name?>
                        </a>
                        <span class="post__time-to-read"><?php the_field('main-post_time'); ?></span>
                    </div>
                </div>
                <a href="<?php echo get_permalink(); ?>" class="main-post__img v-col-lg-5 v-col-md-12 v-col">
                    <?php
                        $image = get_field('main-post_img');

                        if (!empty($image)): ?>
                            <img 
                            src="<?php echo $image['url']; ?>" 
                            alt="<?php echo $image['alt']; ?>">
                    <?php endif;?>
                </a>
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
                        <!-- <a href="#" class="post__category"><?php the_field('article_category'); ?></a> -->
                        <span class="post__time-to-read"><?php the_field('article_time'); ?></span>
                    </div>
                    <div class="article-content__body">
                        <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                        <p class="post__text article-content__body-text">
                             <?php the_field('article_text'); ?>
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
</section>
        
<div class="articles__load-more container" data-load-more-wrapper>
    <button type="button" class="button__load-more" data-load-more tabindex="0">
        load more posts
    </button>
    <ul class="articles__pagination">
        <li class="articles__pagination-item">
            <a href="" class="articles__pagination-button">1</a>
        </li>
        <li class="articles__pagination-item">
            <a href="" class="articles__pagination-button">2</a>
        </li>
        <li class="articles__pagination-item">
            <a href="" class="articles__pagination-button">3</a>
        </li>
        <li class="articles__pagination-item">
            <a href="" class="articles__pagination-button">...</a>
        </li>
        <li class="articles__pagination-item">
            <a href="" class="articles__pagination-button">123</a>
        </li>
    </ul>
</div>


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
                    <div class="article-content">
                        <div class="article-content__body">
                            <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                            <p class="post__text article-content__body-text">
                                <?php the_field('editor_text'); ?>
                            </p>
                        </div>
                        <div class="article-content__footer">
                            <a href="#" class="post__category">
                               <?php the_field('editor_category'); ?>
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
                    <article class="article v-col">
                        <div class="article-content">
                            <div class="article-content__body">
                                <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                                <p class="post__text article-content__body-text">
                                   <?php the_field('editor_text'); ?>
                                </p>
                            </div>
                            <div class="article-content__footer">
                                <a href="#" class="post__category"><?php the_field('editor_category'); ?></a>
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
                <div class="main-post-event__desc v-col-lg-6 v-col-md-12">
                    <span class="mark-round bg-orange black"><?php the_field('online-event_span'); ?></span>
                    <a href="<?php echo get_permalink(); ?>" class="main-post-event__desc-title post__title"><?php the_title(); ?></a>
                    <p class="main-post-event__desc-text post__text"><?php the_field('online-event_text'); ?></p>
                    <a class="button__register" href="<?php echo get_permalink(); ?>"><?php the_field('online-event_link'); ?></a>
                </div>
                <div class="main-post-event__img v-col-lg-6 v-col-md-12" alt="logo" loading="lazy">
                <?php
                    $image = get_field('online-event_img');

                    if (!empty($image)): ?>
                        <img 
                        src="<?php echo $image['url']; ?>" 
                        alt="<?php echo $image['alt']; ?>">
                    <?php endif;?>
                </div>
            </div>
        <?php
        }

        wp_reset_postdata(); // сброс
        ?>
</section>

<section class="seo-category container">
    <h1 class="main__title black">SEO</h1>
    <div class="seo-category__labels show-more" data-showmore>
        <a class="category-label" href="">What is SEO</a>
        <a class="category-label" href="">Keyword Research</a>
        <button type="button" class="category-label" data-btn-more>
            <svg class="category-label__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"/></svg>
        </button>
        <div class="seo-category__block show-more__content">
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
        </div>
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
                        <a href="#" class="post__category"><?php the_field('article_category'); ?></a>
                        <span class="post__time-to-read"><?php the_field('article_time'); ?></span>
                    </div>
                    <div class="article-content__body">
                        <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                        <p class="post__text article-content__body-text">
                        <?php the_field('article_text'); ?>
                        </p>
                    </div>
                    <div class="article-content__footer">
                        <a href="#" class="post__author"><?php the_field('article_author'); ?></a>
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
        <a class="category-label" href="">Marketing</a>
        <a class="category-label" href="">Keyword Research</a>
        <button type="button" class="category-label" data-btn-more>
            <svg class="category-label__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"/></svg>
        </button>
        <div class="seo-category__block show-more__content">
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
        </div>
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
                        <a href="#" class="post__category"><?php the_field('article_category'); ?></a>
                        <span class="post__time-to-read"><?php the_field('article_time'); ?></span>
                    </div>
                    <div class="article-content__body">
                        <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                        <p class="post__text article-content__body-text">
                        <?php the_field('article_text'); ?>
                        </p>
                    </div>
                    <div class="article-content__footer">
                        <a href="#" class="post__author"><?php the_field('article_author'); ?></a>
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
                    <?php
                        $image = get_field('boost_img');

                        if (!empty($image)): ?>
                            <img 
                            src="<?php echo $image['url']; ?>" 
                            alt="<?php echo $image['alt']; ?>">
                        <?php endif;
                    ?>
                </div>
                <div class="boost__desc v-col-lg-6 v-col-md-12">
                    <h1 class="main__title black boost__title"><?php the_field('boost_title'); ?></h1>
                    <button class="button__trial button__subscribe" type="button"><?php the_field('boost_link'); ?></button>
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
        <a class="category-label" href="">Marketing</a>
        <a class="category-label" href="">Keyword Research</a>
        <button type="button" class="category-label" data-btn-more>
            <svg class="category-label__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"/></svg>
        </button>
        <div class="seo-category__block show-more__content">
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
            <a class="category-label" href="">What is SEO</a>
        </div>
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
                        <a href="#" class="post__category"><?php the_field('article_category'); ?></a>
                        <span class="post__time-to-read"><?php the_field('article_time'); ?></span>
                    </div>
                    <div class="article-content__body">
                        <a href="<?php echo get_permalink(); ?>" class="post__title"><?php the_title(); ?></a>
                        <p class="post__text article-content__body-text">
                        <?php the_field('article_text'); ?>
                        </p>
                    </div>
                    <div class="article-content__footer">
                        <a href="#" class="post__author"><?php the_field('article_author'); ?></a>
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



