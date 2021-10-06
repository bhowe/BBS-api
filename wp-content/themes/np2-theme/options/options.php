<?php

/*********** Integrate settings via customize options api *****************/

add_action( 'customize_register' , 'my_theme_options' );

function my_theme_options( $wp_customize ) {
	// Sections, settings and controls will be added here
	
	
	///// Add panel to hold all the font settings - set sections using 'panel' => 'font_options'
	$wp_customize->add_panel( 'font_options', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'          => 'Font Settings',
		'description'    => 'Change font options here',
	) );
	
		////// Add sections for all settings
			///Section for H1's
			$wp_customize->add_section(
				'bmighty2_h1_options',
				array(
					'title' => __( 'H1 Settings', 'mytheme' ),
					'priority' => 100,
					'capability' => 'edit_theme_options',
					'section' => 'bmighty2_font_options',
					'panel' => 'font_options'
				)
			);
		////// Add default settings for each section
				//////// Add default settings for h1
				$wp_customize->add_setting( 'H1_Settings',
					array(
						'default' => '424242'
					)
				); 
				$wp_customize->add_setting( 'H1_size',
					array(
						'default' => '32px'
					)
				); 
				$wp_customize->add_setting( 'h1_line_height',
					array(
						'default' => '1.25'
					)
				); 
				
				$wp_customize->add_setting( 'h1_font_family', 
					array( 
						'default' => 'Arial'
					) 
				);	
	
		///// Add Controls to adjust the settings
					//////// Add controls to change default settings for h1
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
						'label'        => __( 'Color', 'mytheme' ),
						'section'    => 'bmighty2_h1_options',
						'settings'   => 'H1_Settings',
						) 
					) );
					
					$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_size', array(
						'label'        => __( 'Font Size', 'mytheme' ),
						'section'    => 'bmighty2_h1_options',
						'settings'   => 'H1_size',
						'type' => 'number',
						'input_attrs' => array(
							'min' => '1',
							'max' => '99',
							'step' => '1',
							'placeholder' => '32',
							'style' => 'width:60px;height:30px;',
						),
						) 
					) );
					
					$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'line_height', array(
						'label'        => __( 'Line Height', 'mytheme' ),
						'section'    => 'bmighty2_h1_options',
						'settings'   => 'h1_line_height',
						'type' => 'number',
						'input_attrs' => array(
							'min' => '1',
							'max' => '5',
							'step' => '.25',
							'placeholder' => '1.25',
							'style' => 'width:60px;height:30px;',
						),
						) 
					) );
					
					$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_family', array( 
						'section'  => 'bmighty2_h1_options', 
						'settings' => 'h1_font_family',
						'label' => __('Font Family', 'mytheme'), 
						'type' => 'select', 
						'choices'  => array(
							'Lato' => 'Lato',
							'Merriweather' => 'Merriweather',
							'Open Sans' => 'Open Sans',
							'Oswald' => 'Oswald',
							'Playfair Display' => 'Playfair Display',
							'Raleway' => 'Raleway',
							'Roboto' => 'Roboto',
							'Roboto Slab' => 'Roboto Slab',
							'Vollkorn' => 'Vollkorn',
							
						),
						)
					) );
}


/**************** Output CSS *****************/
function mytheme_customize_css()
{
    ?>
		<link href='http://fonts.googleapis.com/css?family=<?php $string = get_theme_mod( 'h1_font_family', 'Arial'); $string = str_replace(' ', '+', $string); echo $string; ?>:400,300,300italic,400italic,600,600italic,700,700italic,800italic,800' rel='stylesheet' type='text/css'>
         <style type="text/css">
             h1 {
				color:<?php echo get_theme_mod('H1_Settings', '#424242'); ?>;
				font-size:<?php echo get_theme_mod('H1_size', '32px'); ?>px; 
				line-height:<?php echo get_theme_mod('h1_line_height', '1.25'); ?>;
				font-family:<?php echo get_theme_mod('h1_font_family', 'Arial'); ?>;
				}
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');