<?php
// функция вывода пагинации
function set_button_load_more() {
    global $wp_query; // текущая выборка должна быть глобальной

    if ( $wp_query->max_num_pages > 1 ) { // Если страниц больше 1, показываем кнопку
        ?>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
        <div class="articles__load-more-wrap" data-load-more-wrapper>
            <span class="articles__load-more" data-load-more tabindex="0">
                <span>load more posts</span>
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z" fill="#00AE71"/></svg>
            </span>
        </div>
        <!-- <div class="articles__load-more container" data-load-more-wrapper>
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
        </div> -->
    <?php 
    }
}
