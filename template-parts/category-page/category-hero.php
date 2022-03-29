<?php
$term = get_queried_object();
$imageHeroID = get_field('background_image_on_category_page', $term);
?>

<section class="category-hero container">
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
            <h1 class="category-content__title main__post black v-col"><?php the_archive_title(); ?></h1>
            <p class="category-content__text post__text v-col"><?php the_field('page-category_text'); ?></p>
        </div>
    </div>
</section>
