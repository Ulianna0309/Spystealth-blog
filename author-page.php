<?php 
/*
Template Name: Author page
*/
?>

<?php 
    get_header();
?>

<main class="main-content author-page">
    <div class="author-content container">
        <div class="author-content__container v-row">
            <svg class="author-content__img" role="img" data-test="author-photo" viewBox="0 0 150 150" width="150" height="150"><title>Author Photo</title><defs><clipPath id="star" clipPathUnits="userSpaceOnUse"><path d="M127.666 40.7385C122.995 25.259 113.653 10.4831 101.158 0.280727C100.808 -0.0710794 100.224 -0.0710794 99.7565 0.163458L79.4375 9.4277C61.454 6.0269 43.3537 5.32329 25.9541 11.7731C25.4869 12.0076 25.1366 12.4767 25.1366 12.9458L23.7353 38.7449C11.7074 51.5272 2.2485 67.593 0.0297585 85.0661C-0.0870176 85.5352 0.146535 86.0043 0.613639 86.3561L22.334 101.601C27.005 116.963 36.2303 131.739 48.7254 141.941C49.1925 142.293 49.7764 142.293 50.2435 142.059C54.0971 139.713 67.9934 132.325 70.5625 133.029C88.6628 136.43 106.646 137.133 124.163 130.566C124.63 130.332 124.98 129.863 124.98 129.394L126.265 103.712C138.293 90.9296 147.751 74.8637 149.97 57.5079C150.087 57.0388 149.853 56.4525 149.386 56.218C146 53.8726 131.286 44.3738 127.666 40.7385Z"></path></clipPath></defs><image xlink:href="https://static.semrush.com/cdn-cgi/image/fit=scale-down,width=300,height=300/blog/uploads/user/3a/03/3a0358de02632f385aea72d5879b2040.jpeg" x="0" y="0" width="150" height="150" clip-path="url(#star)"></image></svg>
            <h1 class="author-content__title main__title black v-col">Michelle Ofiwe</h1>
            <h3 class="author-content__subtitle black v-col">blog editor</h3>
            <p class="author-content__text post__text v-col">Link building is the process of building links to your website. We'll help you with some tips to build links to your site.</p>
        </div>
    </div>


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



</main>

<?php 
    get_footer();
?>