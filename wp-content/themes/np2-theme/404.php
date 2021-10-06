<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package np-theme
 */

get_header(); ?>

	<main id="primary" class="site-main grid-container">

		<header class="entry-header">
	<h1 class="entry-title">
	<?php esc_html_e( 'Nothing Found', 'gutenberg-starter-theme' ); ?>
</h1>
</header><!-- .entry-header -->

		<article id="post-404" <?php post_class('grid-x grid-padding-x'); ?>>

			<div class="entry-content cell">
				
				<div class="grid-y grid-padding-y">
					<div class="cell">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</div>

				<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
				
			</div>
		</article>
	</main>
<?php
get_footer();
