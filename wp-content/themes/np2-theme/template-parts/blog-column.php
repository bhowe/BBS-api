<?php
/**
 * Template part for displaying blog content in blog-column.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package np-theme
 */
?>
<?php global $postCount; $postTitle=get_the_title();
	if(is_paged()) { 
		$pagedClass = 'paged';
	} else {
		$pagedClass = '';
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cell column-layout '.$pagedClass.''); ?>>
	<div class="post-wrapper grid-x">
		<?php if ( has_post_thumbnail() ) :
			$thumbUrl = get_the_post_thumbnail_url($post->ID, 'full');
		?>
			<div class="cell medium-6 thumb-wrapper">
				<div class="thumb-inner" style="background-image:url(<?php echo $thumbUrl; ?>)">
				</div>
				<a href="<?php echo the_permalink(); ?>">
				</a>
			</div>
		<?php endif; ?>
		<div class="cell medium-6 text-wrapper">
			<span class="category-link"><?php the_category(', '); ?></span>
			<h3 class="article-title">
					<a href="<?php echo the_permalink(); ?>"><?php echo $postTitle; ?></a>
						<?php if($postCount == 1 && !is_paged() ) : ?>
							<span class="small">
								<?php the_category(', '); ?>
									<span class="dot">&middot;</span>
									<p>By <?php the_author(); ?></p>
							</span>
						<?php endif; ?>
			</h3>
			<span class="author"><p>By <?php the_author(); ?></p></span>
				
				<?php 
				$content = get_the_excerpt();
	   			$content = preg_replace("/<img(.*?)>/si", "", $content);
	  				
				if( is_sticky() ) {
					echo '<p>'.$content.'</p>';
				} elseif( $postCount == 1 && !is_paged() ) {
					echo '<p>'.$content.'</p>';
				} else {
					
				} 
				?>
		</div>
	</div>
</article>