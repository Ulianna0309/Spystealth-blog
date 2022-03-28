<?php
$term = get_queried_object();
$imageHeroID = get_field('background_image_on_category_page', $term);
?>

<section class="category-hero"
         style="background-image: url(<?= wp_get_attachment_image_url($imageHeroID, 'large'); ?>);">
    <div class="category-hero__breadcrumbs breadcrumbs breadcrumbs--white">
        <a href="https://umobix.com/" class="breadcrumbs-item">Home</a>
        <span class="breadcrumbs__separator">
            <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.16667L4.46439 5L0 0.833333L0.892737 0L6.25 5L0.892737 10L0 9.16667Z" fill="white"/></svg>
        </span>
        <a href="https://umobix.com/blog" class="breadcrumbs-item">Blog</a>
        <span class="breadcrumbs__separator">
            <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.16667L4.46439 5L0 0.833333L0.892737 0L6.25 5L0.892737 10L0 9.16667Z" fill="white"/></svg>
        </span>
        <span class="breadcrumbs-item breadcrumbs__current">
            <?php the_archive_title(); ?>
        </span>
    </div>
    <div class="category-hero__content">
        <div class="category-hero__subtitle">
            category
        </div>
        <h1 class="category-hero__title">
            <?php the_archive_title(); ?>
        </h1>
    </div>
</section>
