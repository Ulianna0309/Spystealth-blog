<?php 
/*
Template Name: Blog page
*/
?>

<?php 
    get_header();
?>

<main class="main-content blog-page">
    <section class="blog-page-intro container">
        <div class="blog-page-intro__container v-row">
            <div class="blog-page-intro__desc v-col-lg-6 v-col-md-6">
                <div class="blog-page-intro__category">
                    <a class="category-label" href=""><?php the_field('blog-page_intro-category'); ?></a> 
                </div>
                <h1 class="main__title black"><?php the_field('blog-page_intro-title'); ?></h1>
                <button class="button__subscribe blog-page-intro__button" type="button"><?php the_field('blog-page_intro-link'); ?></button>
                <div class="article-content__footer">
                    <a href="#" class="post__author black"><?php the_field('blog-page_intro-author'); ?></a> 
                    <span class="post__date black"><?php the_field('blog-page_intro-date'); ?></span>
                    <span class="post__time-to-read black"><?php the_field('blog-page_intro-time'); ?></span>
                </div>
            </div>
            <div class="blog-page-intro__img v-col-lg-6 v-col-md-6">
                <?php
                    $image = get_field('blog-page_intro-img');

                    if (!empty($image)): ?>
                        <img 
                        src="<?php echo $image['url']; ?>" 
                        alt="<?php echo $image['alt']; ?>">
                    <?php endif;
                ?>
            </div>
        </div>
    </section>


    <section class="blog-page-post container">
        <div class="v-row">
            <div class="blog-page-post__aside v-col-lg-3">
                <aside class="table-of-content v-col-lg-12" data-table-of-content>
                    <h2 class="post__title black">Table of content</h2>
                    <ul class="table-of-content__list" data-table>
                        <li class="table-of-content__list-item">
                            <a class="table-of-content__list-item--link black" href="#">Move #1. Check What’s New in Your Backlink Profile</a>
                        </li>
                        <li class="table-of-content__list-item">
                            <a class="table-of-content__list-item--link black" href="#">Move #2. Get Back Any Links You’ve Lost</a>
                        </li>
                        <li class="table-of-content__list-item">
                            <a class="table-of-content__list-item--link black" href="#">Move #3. Cherry-pick New Link Building Ideas from the Right Rivals</a>
                        </li>
                        <li class="table-of-content__list-item">
                            <a class="table-of-content__list-item--link black" href="#">Move #4. Find Content Ideas to Attract Links</a>
                        </li>
                        <li class="table-of-content__list-item">
                            <a class="table-of-content__list-item--link black" href="#">Move #6. Audit Your Anchor Texts</a>
                        </li>
                        <li class="table-of-content__list-item">
                            <a class="table-of-content__list-item--link black" href="#">Move #7. Get Rid of Toxic Backlinks</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="blog-page-post__post v-col-lg-9 v-col-md-12">
                <article class="blog-page-post__article">
                    <p><?php the_field('blog-page_post-text-start'); ?></p>
                    <ul class="blog-page-post__article-list"> 
                        <li class="blog-page-post__article-list--item"><?php the_field('blog-page_post-list-item'); ?></li> 
                        <li class="blog-page-post__article-list--item"><?php the_field('blog-page_post-list-item-2'); ?></li> 
                        <li class="blog-page-post__article-list--item"><?php the_field('blog-page_post-list-item-3'); ?></li> 
                        <li class="blog-page-post__article-list--item"><?php the_field('blog-page_post-list-item-4'); ?></li>
                    </ul>
                    <h2 class="main__title black"><?php the_field('blog-page_post-title'); ?></h2>
                    <p>
                        <?php the_field('blog-page_post-text'); ?>
                    </p>
                    <h2 class="main__title black"><?php the_field('blog-page_post-title-2'); ?></h2>
                    <p><?php the_field('blog-page_post-text-2'); ?></p> 
                    <h2 class="main__title black"><?php the_field('blog-page_post-title-3'); ?></h2>
                    <p><?php the_field('blog-page_post-text-3'); ?></p>
                    <h2 class="main__title black"><?php the_field('blog-page_post-title-4'); ?></h2>
                    <p><?php the_field('blog-page_post-text-4'); ?></p>
                    
                    <div class="blog-page-get-trial">
                        <div class="blog-page-get-trial__block">
                            <div class="blog-page-get-trial__desc">
                                <a href="#" class="blog-page-get-trial__desc-title post__title"><?php the_field('blog-page_post-get-trial-title'); ?></a>
                                <p class="blog-page-get-trial__desc-text post__text"><?php the_field('blog-page_post-get-trial-text'); ?></p>
                                <a class="button__read" href="#"><?php the_field('blog-page_post-get-trial-link'); ?></a>
                            </div>
                            <div class="blog-page-get-trial__img">
                                <?php
                                    $image = get_field('blog-page_post-get-trial-img');

                                    if (!empty($image)): ?>
                                        <img 
                                        src="<?php echo $image['url']; ?>" 
                                        alt="<?php echo $image['alt']; ?>">
                                    <?php endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
        
        
                <div class="social-links">
                    <p class="social-links__text black">Share</p>
                    <div class="social-links__icons">
                        <a class="social-links__icon" href="#" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
                        </a>
                        <a class="social-links__icon" href="#" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                        </a>
                        <a class="social-links__icon" href="#" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 277.2V256.3C495.1 107.1 361.2-9.332 207.8 20.73zM239.1 304.3c-26.47 0-48-21.56-48-48.05s21.53-48.05 48-48.05s48 21.56 48 48.05S266.5 304.3 239.1 304.3z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-form container">
        <div class="blog-form__container v-row">
            <div class="header-main__logo v-col-lg-6 v-col-md-12">
                <?php the_custom_logo(); ?>
                <div class="header-main__logo-title">
                    <span class="header-main__logo-title--spy"><b>Spy</b>Stealth</span>
                    <p class="header-main__logo-title--text">Phone Tracking Software</p>
                </div>
            </div>
            <div class="blog-form__desc v-col-lg-6 v-col-md-12">
                <h1 class="main__title black">Give me the latest news!</h1>
                <p class="post__text black">
                    Want to know which websites saw the most traffic growth in your industry? Not sure why your SEO strategy doesn’t work? Or simply looking for SEO tips? Subscribe to our newsletter to receive updates on the content you care about.
                </p>
                <?php echo do_shortcode('[contact-form-7 id="156" title="Subscibe form"]'); ?>
                <div class="form-label black">By clicking “Subscribe” you agree to Spystealth
                    <a class="white__link black" target="_blank" href="#">Privacy Policy</a>
                        and consent to Spystealth using your contact data for newsletter purposes
                </div>
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

<section class="modal" data-modal-wrap>
    <div class="modal__container container" data-modal="success-send">
        <div class="modal__content">
            <div class="modal__close" data-close-modal></div>
            <img src="<?php echo bloginfo('template_url'); ?>/assets/img/anytime.png" alt="anytime" loading="lazy">
            <p class="modal__content-title post__title">Join our newsletter</p>
            <?php echo do_shortcode('[contact-form-7 id="156" title="Subscibe form"]'); ?>
            <div class="form-label black">By clicking “Subscribe” you agree to Spystealth
                <a class="white__link" target="_blank" href="#">Privacy Policy</a>
                and consent to Spystealth using your contact data for newsletter purposes
            </div>
        </div>
    </div>
</section>



</main>

<?php 
    get_footer();
?>