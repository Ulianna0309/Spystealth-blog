<?php
get_header();
$category = get_queried_object();
?>
    <main class="main-content category-page archive-page archive-page--<?php echo $category->slug; ?>" data-main-content="<?php echo $category->slug; ?>">
        <?php
            get_template_part( 'template-parts/category/category-hero');
            get_template_part( 'template-parts/category/category-posts');
        ?>

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









