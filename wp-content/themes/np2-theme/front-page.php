<?php
/**
 * The template for the front page.
 *
 * @package WordPress
 */

get_header(); ?>
					
<main id="primary" class="site-main grid-container">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'bmighty2' ), '', '' ); ?>
	<?php endwhile; ?>
	
	<?php if ( is_active_sidebar( 'hero-widget-area' )) : ?>
										<?php dynamic_sidebar( 'hero-widget-area' ); ?>
									<?php endif; ?>

</main>

<?php get_footer(); ?>
