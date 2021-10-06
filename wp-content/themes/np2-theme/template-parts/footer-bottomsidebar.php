<?php
/**
 * Template part for displaying the bottom footer widget area when there is an active widget
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package np-theme
 */

?>

<?php if ( is_active_sidebar( 'top-footer-widget-area' )) {
	$alignText = 'align-justify';
} else {
	$alignText = 'align-center';
} ?>

<section id="footer-bottom-widget-wrapper">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle <?php echo $alignText; ?>">
			<div class="auto">
				<p class="small copy">
					&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
				</p>
			</div>

			<?php dynamic_sidebar( 'bottom-footer-widget-area' ); ?>
		</div>
	</div>
</section>