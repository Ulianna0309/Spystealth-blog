<?php
get_header();
?>
    <main id="main" class="site-main main-content">
        <div class="container">
            <div class="page-content v-row">
                <div class="v-col-lg-12">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
