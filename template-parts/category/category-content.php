<?php 
/*
Template Name: Page category
*/
?>

<?php 
    get_header();
?>

<main class="main-content category-page">
    <nav class="breadcrumbs container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__link">
                    Home
                </a>
            </li>
            <li class="breadcrumbs__current-item">
            <?php the_archive_title(); ?>
            </li>
        </ul>
    </nav>


    <div class="category-content container">
        <div class="v-row">
            <h1 class="category-content__title main__post black v-col"><?php the_title(); ?></h1>
            <p class="category-content__text post__text v-col"><?php the_field('page-category_text'); ?></p>
        </div>
    </div>

    <section class="articles container">
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
                            <a href="#" class="post__title"><?php the_title(); ?></a>
                            <p class="post__text article-content__body-text">
                            <?php the_field('article_text'); ?>
                            </p>
                        </div>
                        <div class="article-content__footer">
                            <a href="#" class="post__author"><?php the_field('article_author'); ?></a>
                            <span class="post__date"><?php the_field('article_date'); ?></span>
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

</main>

<?php 
    get_footer();
?>