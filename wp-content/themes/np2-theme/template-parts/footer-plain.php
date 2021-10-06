<?php
/**
 * Template part for displaying footer when no widget are active in footer widget area
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package np-theme
 */

?>

<section id="footer-top-wrapper">	
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="small-3 footer-logo">
				<a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
			</div>
			<?php if ( !is_active_sidebar( 'bottom-footer-widget-area' )) { ?>
				<div class="cell">
					<p class="small">
						&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
					</p>
				</div>
			<?php } ?>
		</div>
	</div>
</section>