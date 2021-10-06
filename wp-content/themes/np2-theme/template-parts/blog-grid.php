<?php
/**
 * Template part for displaying blog content in blog-grid.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package np-theme
 */
?>
<?php global $postCount;
if(is_paged()) { 
		$pagedClass = 'paged';
	} else {
		$pagedClass = '';
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cell medium-6 grid-layout '.$pagedClass.''); ?>>
	<div class="post-wrapper">
		<?php if ( has_post_thumbnail() ) : 
			$thumbUrl = get_the_post_thumbnail_url($post->ID, 'full');
		?>
			<div class="cell thumb-wrapper">
				<div class="thumb-inner" style="background-image:url(<?php echo $thumbUrl; ?>)">
				</div>
				<a href="<?php echo the_permalink(); ?>">
				</a>
			</div>
		<?php endif; ?>
		<div class="cell text-wrapper">
			
			<h3 class="article-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<span class="small">
				<?php the_category(', '); ?>
				<?php if($postCount == 1 && !is_paged() ) : ?>
					<span class="dot">&middot;</span>
					<p>By <?php the_author(); ?></p>
				<?php endif; ?>
			</span>
				
				<?php 
				$content = get_the_excerpt();
	   			$content = preg_replace("/<img(.*?)>/si", "", $content);
	  				
				// if(is_sticky()) {
				// 	the_content();
				// } else {
				// 	echo $content; 
				// } 
				?>
		</div>
	</div>
</article>
