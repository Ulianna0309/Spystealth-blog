<?php
$term = get_queried_object();
$avatar = get_field('author-page_img', $term);
$about_the_author = get_field('author-page_text', $term);
?>

<div class="author-content container">
    <div class="author-content__container v-row">
            <!-- <img class="author-content__img"
             src="<?= $avatar; ?>"
             alt="author"> -->
            <svg style="width: 60px;margin-bottom: 20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M352 128C352 198.7 294.7 256 224 256C153.3 256 96 198.7 96 128C96 57.31 153.3 0 224 0C294.7 0 352 57.31 352 128zM209.1 359.2L176 304H272L238.9 359.2L272.2 483.1L311.7 321.9C388.9 333.9 448 400.7 448 481.3C448 498.2 434.2 512 417.3 512H30.72C13.75 512 0 498.2 0 481.3C0 400.7 59.09 333.9 136.3 321.9L175.8 483.1L209.1 359.2z"/></svg>
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