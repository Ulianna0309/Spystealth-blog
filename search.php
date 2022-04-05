<?php get_header(); 
$search = get_queried_object();
?>
<main class="main-content search-content">
    <div class="articles container">
        <h1 class="v-col">Search by: "<?php echo $_GET['s'];?>"</h1>
        <div class="v-row search__container">
            <?php
            $args = array_merge( $wp_query->query, array( 'post_type' => array("post", "mypost")) );
            query_posts($args); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
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
                            <?php echo reading_time() .' read'; ?>
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
        
            <?php endwhile; else: ?>
            <p class="v-col">Поиск не дал результатов.</p>
        </div>
    </div>
 </main>
 <?php endif;?>
 <?php get_footer(); ?>