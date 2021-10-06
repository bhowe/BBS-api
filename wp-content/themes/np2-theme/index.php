<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gutenberg-starter-theme
 */

get_header(); 

$blog_layout = get_theme_mod( 'blog_option', '' ); ?>

	<main id="primary" class="site-main grid-container">
		

	<?php
	if ( have_posts() ) : $postCount = 0;

		if ( is_home() && ! is_front_page() ) : ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php single_post_title(); ?></h1>
			</header>

		<?php
		endif; ?>
		<?php if ( is_active_sidebar( 'blog-widget-area' ) && !is_singular()) : ?>
			<div class="grid-x">
			<div class="medium-8">
		<?php endif; ?>
			<div class="grid-container">
				<?php if ( is_home() && ! is_front_page() ) : ?>
				<div class="blog-wrapper grid-x grid-padding-x">
				<?php else : ?>
					<div class="blog-wrapper">
				<?php endif; ?>
					<?php /* Start the Loop */
					while ( have_posts() ) : $postCount++; the_post();

						if($blog_layout === 'columns' && !is_singular()) :
							get_template_part( 'template-parts/blog', 'column' );

						elseif($blog_layout == '' && !is_singular()) :
							get_template_part( 'template-parts/blog', 'column' );

						elseif($blog_layout === 'grid' && !is_singular()) :
							get_template_part( 'template-parts/blog', 'grid' );

						else :
						/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
						get_template_part( 'template-parts/content', get_post_format() );

						endif; ?>

					<?php endwhile;

					//the_posts_navigation();

					else :
						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div>
				<?php if (function_exists('custom_pagination')) {
					custom_pagination("","",$paged);
				} ?>
			</div>
		<?php if ( is_active_sidebar( 'blog-widget-area' ) && !is_singular()) : ?>
			</div>

			<div class="sidebar blog-wrapper medium-4">
				<?php dynamic_sidebar( 'blog-widget-area' ); ?>
			</div>

			</div>
		<?php endif; ?>

		

	</main><!-- #primary -->

<?php
get_footer();