<?php

function load_more_parental_control_posts() {
    $args = unserialize(stripslashes($_POST['query']));    
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $count = 1;

    $query = new WP_Query($args);

    if( $query->have_posts() ):
        while($query->have_posts()): $query->the_post();
            if ($count == 1 || $count == 7) {
                $article_class = ' article--col-3-4';
            } else {
                $article_class = ' article--col-3';
            }
            ?>
            <article class="article post-card-animation article-parental-control<?= $article_class; ?>">
                <?php
                $imageHero = get_field('post_cover');
                if ($imageHero) {
                    echo wp_get_attachment_image($imageHero, 'full', false, array(
                        'class' => 'article__img',
                        'loading' => 'lazy'
                    ));
                }
                ?>
                <div class="article__content article__content--fix-height">
                    <div class="article__header">
                        <span class="category-label category-label--parental-control category-label--no-changes">parental control</span>
                        <span class="article__date">
                            <?php the_time('M j, Y'); ?>
                        </span>
                    </div>
                    <div class="article__body">
                        <a href="<?php the_permalink(); ?>" class="article__title">
                            <?php the_title(); ?>
                        </a>
                        <div class="article__description">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <div class="article__footer">
                        <div class="article__author">
                            <?php the_author_posts_link(); ?>
                        </div>
                        <div class="article__info">
                            <div class="article__view">
                                <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="article__svg"><path d="M5.40114 7.00012C1.74205 7.00012 0.0875 3.78649 0.0238636 3.62739C-0.00795454 3.53194 -0.00795454 3.43649 0.0238636 3.34103C0.0875 3.21376 1.74205 0.00012207 5.40114 0.00012207C9.06023 0.00012207 10.7148 3.21376 10.7784 3.37285C10.8102 3.4683 10.8102 3.56376 10.7784 3.65921C10.7148 3.78649 9.06023 7.00012 5.40114 7.00012ZM0.660227 3.50012C1.01023 4.10467 2.5375 6.36376 5.40114 6.36376C8.26477 6.36376 9.76023 4.10467 10.142 3.50012C9.79204 2.89558 8.26477 0.636486 5.40114 0.636486C2.5375 0.636486 1.04205 2.89558 0.660227 3.50012Z" fill="#646F7C"/><path d="M5.40123 6.36375C3.81032 6.36375 2.5376 5.09102 2.5376 3.50011C2.5376 1.9092 3.81032 0.636475 5.40123 0.636475C6.99214 0.636475 8.26487 1.9092 8.26487 3.50011C8.26487 5.09102 6.99214 6.36375 5.40123 6.36375ZM5.40123 1.27284C4.16032 1.27284 3.17396 2.2592 3.17396 3.50011C3.17396 4.74102 4.16032 5.72738 5.40123 5.72738C6.64214 5.72738 7.62851 4.74102 7.62851 3.50011C7.62851 2.2592 6.64214 1.27284 5.40123 1.27284Z" fill="#646F7C"/><path d="M5.40097 5.09087C4.51006 5.09087 3.81006 4.39087 3.81006 3.49997C3.81006 3.30906 3.93733 3.18178 4.12824 3.18178C4.31915 3.18178 4.44642 3.30906 4.44642 3.49997C4.44642 4.04087 4.86006 4.45451 5.40097 4.45451C5.94188 4.45451 6.35551 4.04087 6.35551 3.49997C6.35551 2.95906 5.94188 2.54542 5.40097 2.54542C5.21006 2.54542 5.08278 2.41815 5.08278 2.22724C5.08278 2.03633 5.21006 1.90906 5.40097 1.90906C6.29187 1.90906 6.99187 2.60906 6.99187 3.49997C6.99187 4.39087 6.29187 5.09087 5.40097 5.09087Z" fill="#646F7C"/></svg>
                                <?php echo getPostViews(get_the_ID()); ?>
                            </div>
                            <span class="separator"></span>
                            <a href="<?php the_permalink(); ?>#comments" class="article__comments">
                                <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="article__svg"><path d="M1.29395 5.75445L1.34147 5.56285L1.20208 5.42306C0.661632 4.8811 0.35 4.20672 0.35 3.48214C0.35 1.81631 2.0404 0.35 4.28571 0.35C6.53103 0.35 8.22143 1.81631 8.22143 3.48214C8.22143 5.14797 6.53103 6.61429 4.28571 6.61429C3.68611 6.61429 3.12009 6.50343 2.61095 6.31192L2.425 6.24197L2.26962 6.36577C1.95183 6.61897 1.37578 6.99311 0.617572 7.11217C0.647178 7.07164 0.677719 7.02865 0.708741 6.98347C0.921545 6.67351 1.17485 6.23466 1.29395 5.75445Z" stroke="#646F7C" stroke-width="0.7"/></svg>
                                <?= get_comment_count(get_post()->ID)['approved']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
            <?php
            $count++;
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_loadmore-parental-control', 'load_more_parental_control_posts');
add_action('wp_ajax_nopriv_loadmore-parental-control', 'load_more_parental_control_posts');
