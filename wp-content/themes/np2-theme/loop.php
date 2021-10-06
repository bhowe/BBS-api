<?php
/**
 * The loop that displays posts.
 *
 * @package WordPress
 */
?>

<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'bmighty2' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'bmighty2' ); ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
	
<?php $classes = array(
	'article',
	'row',
	'align-middle',
	'clearfix'
); ?>
		<article <?php post_class($classes); ?>>
			
			<div <?php if ( has_post_thumbnail() ) { ?>class="small-12 medium-8"<?php } else { ?>class="small-12 medium-12"<?php } ?>>
				<h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="postinfo"><p>By <?php the_author(); ?>&nbsp;|&nbsp;<?php echo get_the_date(); ?>&nbsp;|&nbsp;<?php the_category(','); ?></p></div>
				<?php 
				$content = get_the_excerpt();
   				$content = preg_replace("/<img(.*?)>/si", "", $content);
  				
				if(is_sticky()) {
							the_content();
						} else {
							echo $content; 
						} ?>
			</div>

			<?php if ( has_post_thumbnail() ) { ?>
				<figure class="thumb-wrapper small-12 medium-4">
					<a href="<?php the_permalink(); ?>">
						<?php if(is_sticky()) {
							the_post_thumbnail('single-post-thumbnail');
						} else {
							the_post_thumbnail(); 
						} ?>
					</a>
				</figure>
			<?php } ?>
		</article>


<?php endwhile; ?>

<?php //if (function_exists(custom_pagination)) {
	//custom_pagination("","",$paged);
//
//} 
	?>

