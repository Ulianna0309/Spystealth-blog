<?php
$term = get_queried_object();
$avatar = get_field('author-page_img', $term);
$about_the_author = get_field('author-page_text', $term);
?>

<div class="author-content container">
    <div class="author-content__container v-row">
        <img class="author-content__img"
             src="<?= $avatar; ?>"
             alt="author">
            <div class="author-content__title main__title black v-col">
                <h3>
                    <?php the_author(); ?>
                </h3>
            </div>
            <div class="author-content__text post__text v-col">
                <h3>
                    <?= $about_the_author; ?>
                </h3>
            </div>
        </div>
    </div>
</div>