<?php
/**
 * Template part for displaying the top footer widget area when there is an active widget
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package np-theme
 */

?>

<section id="footer-top-widget-wrapper">
	<div class="grid-container">
		<div class="grid-x align-justify">
			<?php dynamic_sidebar( 'top-footer-widget-area' ); ?>
		</div>
	</div>
</section>