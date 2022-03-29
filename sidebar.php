<?php
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        return;
    }
?>

<aside id="secondary" class="widget-area table-of-content v-col-lg-12">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
        <ul class="table-of-content__list">
            <?php 
                    $posts = get_posts( array(
                        'numberposts' => 6,
                        'orderby'     => 'date',
                        'order'       => 'desc',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        ?>
                        <?php
                            $category = get_the_category();
                            $category_name = $category[0]->name;
                            $category_link = get_category_link( $category[0] )
                        ?>
                            <li class="table-of-content__list-item">
                            <a href="<?php echo get_permalink(); ?>" class="table-of-content__list-item--link black"><?php the_title(); ?></a>
                        </li>
                    <?php
                }
                wp_reset_postdata(); // сброс
                ?>     
        </ul>
    </div>
</aside><!-- #secondary -->
