<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<?php $headerLayout = get_theme_mod('header_layout_option', ''); ?>	
				<div class="off-canvas-wrapper"> <!--beginning of wrapper for mobile push menu-->
						<div class="inner-wrap"> <!--beginning of inner wrap for mobile push to hold page content to allow to push all content to the sides-->
						<?php if($headerLayout === 'standard') { ?>
							<header data-sticky-container id="theme-header" aria-label="site logo and navigation" style="height:auto;">
								
								<div data-sticky data-options="marginTop:0;" data-sticky-on="large" data-dynamic-height=false>
								<div class="grid-container">
								<div class="grid-x grid-padding-y align-justify align-middle">
									<div id="branding" class="small-4 medium-2">				
										<a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
									</div>

									<nav class="top-bar show-for-large auto clearfix" id="site-menu" role="navigation">
										<h2 style="display:none">Menu</h2>
											<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary', 'items_wrap' => '<ul class="menu align-spaced dropdown vertical medium-horizontal" data-dropdown-menu>%3$s</ul>' ) ); ?>
											<?php if ( is_active_sidebar( 'header-widget-area' )) { 
													 dynamic_sidebar( 'header-widget-area' ); 
											} ?>
									</nav>

									<div class="menu-wrapper auto medium-1 hide-for-large" role="navigation">
										<button tabindex="-1" aria-label="Open Menu" class="menu-button" type="button" data-toggle="offCanvasLeft">
											<span class="menu-icon" tabindex="0"></span>
										</button>
											
										<nav class="off-canvas position-top clearfix" id="offCanvasLeft" data-off-canvas>
										<button class="close-button" aria-label="Close menu" type="button" data-close>
										  <span aria-hidden="true">&times;</span>
										</button>
													<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'items_wrap' => '<ul class="off-canvas-list menu vertical">%3$s</ul>' ) ); ?>

													<?php if ( is_active_sidebar( 'header-widget-area' )) { 
															 dynamic_sidebar( 'header-widget-area' ); 
													} ?>
										</nav>
									</div>
								</div>
								</div>
							</div>
						
							</header><!--Close #header-->
						<?php } else { ?>
							<header class="grid-container alwaysMobile" id="theme-header" aria-label="site logo and navigation">
								<div class="grid-x grid-padding-y align-justify align-middle">
									<div id="branding" class="auto medium-2">				
										<a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
									</div>

									<div class="menu-wrapper auto medium-1" role="navigation">
										<button tabindex="-1" aria-label="Open Menu" class="menu-button" type="button" data-toggle="offCanvasLeft">
											<span class="menu-icon" tabindex="0"></span>
										</button>
											
										<nav class="off-canvas position-top clearfix" id="offCanvasLeft" data-off-canvas>
										<button class="close-button" aria-label="Close menu" type="button" data-close>
										  <span aria-hidden="true">&times;</span>
										</button>
													<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'items_wrap' => '<ul class="off-canvas-list menu vertical">%3$s</ul>' ) ); ?>

													<?php if ( is_active_sidebar( 'header-widget-area' )) { 
															 dynamic_sidebar( 'header-widget-area' ); 
													} ?>
										</nav>
									</div>
								</div>
							</header><!--Close #header-->
						<?php } ?>
							



<!-- <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>						 -->