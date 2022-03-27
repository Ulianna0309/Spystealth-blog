<?php
get_header();
?>

<main class="main-content category-page">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; 
		?>

		</main><!-- #main -->
	</div><!-- #primary -->


	category-seo
	

</main>
<?php
get_footer();