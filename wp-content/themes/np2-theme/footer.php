<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
?>

<footer>
	
	<?php if ( is_active_sidebar( 'top-footer-widget-area' )) { ?>
			<?php get_template_part( 'template-parts/footer', 'topsidebar' ); ?>
	<?php } else { ?>
			<?php get_template_part( 'template-parts/footer', 'plain' ); ?>
	<?php } ?>

	<?php if ( is_active_sidebar( 'bottom-footer-widget-area' )) { ?>
			<?php get_template_part( 'template-parts/footer', 'bottomsidebar' ); ?>
	<?php } ?>

</footer><!-- close footer -->
	
	<a class="exit-off-canvas" aria-label="click to close menu"></a>
	</div><!--End of inner wrap-->
</div><!-- End of wrapper for mobile push menu-->
	
<?php wp_footer(); ?>




<!-- Initialize Foundation Components -->
<script> jQuery(function() { jQuery(document).foundation(); }); </script>

</body>
</html>