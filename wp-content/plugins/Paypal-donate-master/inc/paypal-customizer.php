<?php
/**
 * paypal-starter-theme Theme Customizer
 *
 * @package paypal-starter-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function paypal_starter_theme_customize_register( $wp_customize ) {

  // Add settings to allow users to change color palette choices
    $green_color = get_theme_mod( 'green_color', '' );
    $green_color_slug = get_theme_mod( 'green_color_slug', '' );
    $dark_green_color = get_theme_mod( 'dark_green_color', '' );
    $dark_green_color_slug = get_theme_mod( 'dark_green_color_slug', '' );
    $purple_color = get_theme_mod( 'purple_color', '' );
    $purple_color_slug = get_theme_mod( 'purple_color_slug', '' );
    $blue_color = get_theme_mod( 'blue_color', '' );
    $blue_color_slug = get_theme_mod( 'blue_color_slug', '' );
    $teal_color = get_theme_mod( 'teal_color', '' );
    $teal_color_slug = get_theme_mod( 'teal_color_slug', '' );
    $dark_purple_color = get_theme_mod( 'dark_purple_color', '' );
    $dark_purple_slug = get_theme_mod( 'dark_purple_color_slug', '' );
  
    if ( !empty( $green_color ) && !empty($green_color_slug) ) { 
      $green_default = $green_color;
    } else {
      $green_default = '#33a798';
    }

    if( $green_color === '#33a798' ) {
      set_theme_mod( 'green_color_name', 'Green' );
      set_theme_mod( 'green_color_slug', 'green' );
    } else {
      get_theme_mod( 'green_color_name', $default = false );
      get_theme_mod( 'green_color_slug', $default = false );
    }

    if ( !empty( $dark_green_color ) && !empty($dark_green_color_slug) ) { 
      $dark_green_default = $dark_green_color;
    } else {
      $dark_green_default = '#287a70';
    }

    if( $dark_green_color === '#287a70' ) {
      set_theme_mod( 'dark_green_color_name', 'Dark Green' );
      set_theme_mod( 'dark_green_color_slug', 'dark-green' );
    } else {
      get_theme_mod( 'dark_green_color_name', $default = false );
      get_theme_mod( 'dark_green_color_slug', $default = false );
    }

    if ( !empty( $purple_color ) && !empty($purple_color_slug) ) { 
      $purple_default = $purple_color;
    } else {
      $purple_default = '#794280';
    }

    if( $purple_color === '#794280' ) {
      set_theme_mod( 'purple_color_name', 'Purple' );
      set_theme_mod( 'purple_color_slug', 'purple' );
    } else {
      get_theme_mod( 'purple_color_name', $default = false );
      get_theme_mod( 'purple_color_slug', $default = false );
    }    

    if ( !empty( $blue_color ) && !empty($blue_color_slug) ) { 
      $blue_default = $blue_color;
    } else {
      $blue_default = '#2fd3f5';
    }

    if( $blue_color === '#2fd3f5' ) {
      set_theme_mod( 'blue_color_name', 'Blue' );
      set_theme_mod( 'blue_color_slug', 'blue' );
    } else {
      get_theme_mod( 'blue_color_name', $default = false );
      get_theme_mod( 'blue_color_slug', $default = false );
    }

    if ( !empty( $teal_color ) && !empty($teal_color_slug) ) { 
      $teal_default = $teal_color;
    } else {
      $teal_default = '#14cab3';
    }

    if( $teal_color === '#14cab3' ) {
      set_theme_mod( 'teal_color_name', 'Teal' );
      set_theme_mod( 'teal_color_slug', 'teal' );
    } else {
      get_theme_mod( 'teal_color_name', $default = false );
      get_theme_mod( 'teal_color_slug', $default = false );
    }

    if ( !empty( $dark_purple_color ) && !empty($dark_purple_color_slug) ) { 
      $dark_purple_default = $dark_purple_color;
    } else {
      $dark_purple_default = '#6a5387';
    }

    if( $dark_purple_color === '#6a5387' ) {
      set_theme_mod( 'dark_purple_color_name', 'Dark Purple' );
      set_theme_mod( 'dark_purple_color_slug', 'dark-purple' );
    } else {
      get_theme_mod( 'dark_purple_color_name', $default = false );
      get_theme_mod( 'dark_purple_color_slug', $default = false );
    }
// var_dump($dark_purple_color);

	// Add customizer support to allow user to modify the paypal form fields
  $wp_customize->add_setting( 'donate_layout', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_select',
    'default' => '',
  ) );
	$wp_customize->add_setting( 'donate_email', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => 'email@email.com',
	  'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'sanitize_email',
	) );

  $wp_customize->add_setting( 'donate_redirect', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => '',
    'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'esc_url_raw',
  ) );

  $wp_customize->add_setting( 'donate_cancel_redirect', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => '',
    'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'esc_url_raw',
  ) );

	$wp_customize->add_setting( 'donate_header', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

  $wp_customize->add_setting( 'donate_header_color', array(
      'default'   => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_setting( 'amount1', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '10',
	  // 'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

  $wp_customize->add_setting( 'block_text1', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.',
    // 'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );

	$wp_customize->add_setting( 'amount2', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '25',
	  // 'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

  $wp_customize->add_setting( 'block_text2', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.',
    // 'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );

	$wp_customize->add_setting( 'amount3', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '50',
	  // 'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

  $wp_customize->add_setting( 'block_text3', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.',
    // 'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );

	$wp_customize->add_setting( 'amount4', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '100',
	  // 'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

   $wp_customize->add_setting( 'block_text4', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.',
    // 'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );

	$wp_customize->add_setting( 'amount5', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '250',
	  // 'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

   $wp_customize->add_setting( 'block_text5', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.',
    // 'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );

	$wp_customize->add_setting( 'amount6', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '500',
	  // 'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

   $wp_customize->add_setting( 'block_text6', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.',
    // 'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );

	$wp_customize->add_setting( 'amount7', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '1000',
	  // 'transport' => 'postMessage', // or postMessage
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

   $wp_customize->add_setting( 'block_text7', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'Aliquam sed nisl porttitor nisl laoreet semper nec iaculis nibh. Vitae vestibulum.',
    // 'transport' => 'postMessage', // or postMessage
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );

	$wp_customize->add_setting( 'top_gradient_color', array(
      'default'   => $green_default,
      //'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'bottom_gradient_color', array(
      'default'   => $dark_green_default,
      //'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'donate_label_color', array(
      'default'   => '',
       'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

   $paypal_layout = get_theme_mod( 'donate_layout', '');
	// Add controls for user to change settings in the form
	$wp_customize->add_control( 
      'donate_layout', 
      array(
          'label' => esc_html__( 'Select Layout Option' ),
          'section' => 'donate_form',
          'type' => 'select',
          'choices' => array(
              '' => esc_html__('Please select'),
              'two_page' => esc_html__('Button rows w/o text'),
              'two_columns' => esc_html__('Button columns w/ text'),            
          )
      )
  );
  $wp_customize->add_control( 'donate_email', array(
	  'label' => __( 'Enter Your Paypal Address Here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( 'donate_redirect', array(
    'label' => __( 'Enter Your Thank You Page Slug Here (example: /thank-you)' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

  $wp_customize->add_control( 'donate_cancel_redirect', array(
    'label' => __( 'Enter A Page Slug Here To Redirect Users To If They Cancel The Payment  (example: /cancel-page)' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( 'donate_header', array(
	  'label' => __( 'Enter you custom form title here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'donate_header_color', array(
      'section' => 'donate_form',
      'label'   => esc_html__( 'Form title color', 'bmighty2' ),
    ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'donate_label_color', array(
      'section' => 'donate_form',
      'label'   => esc_html__( 'Name and Address form label colors. Placeholder colors will change after updating.', 'bmighty2' ),
    ) ) );

	$wp_customize->add_control( 'amount1', array(
	  'label' => __( 'Enter an amount for the first preset box here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( 'block_text1', array(
    'label' => __( 'Enter a message about the donation level here' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( 'amount2', array(
	  'label' => __( 'Enter an amount for the second preset box here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( 'block_text2', array(
    'label' => __( 'Enter a message about the donation level here' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( 'amount3', array(
	  'label' => __( 'Enter an amount for the third preset box here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( 'block_text3', array(
    'label' => __( 'Enter a message about the donation level here' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( 'amount4', array(
	  'label' => __( 'Enter an amount for the fourth preset box here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( 'block_text4', array(
    'label' => __( 'Enter a message about the donation level here' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( 'amount5', array(
	  'label' => __( 'Enter an amount for the fifth preset box here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( 'block_text5', array(
    'label' => __( 'Enter a message about the donation level here' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( 'amount6', array(
	  'label' => __( 'Enter an amount for the sixth preset box here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );

  $wp_customize->add_control( 'block_text6', array(
    'label' => __( 'Enter a message about the donation level here' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( 'amount7', array(
	  'label' => __( 'Enter an amount for the seventh preset box here' ),
	  'type' => 'text',
	  'section' => 'donate_form',
	) );
  $wp_customize->add_control( 'block_text7', array(
    'label' => __( 'Enter a message about the donation level here' ),
    'type' => 'text',
    'section' => 'donate_form',
  ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_gradient_color', array(
      'section' => 'donate_form',
      'label'   => esc_html__( 'Top gradient color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_gradient_color', array(
      'section' => 'donate_form',
      'label'   => esc_html__( 'Bottom gradient color', 'bmighty2' ),
    ) ) );
    // End donate form controls

	// Make sure the options appear in the customizer menu in their own sections
	$wp_customize->add_section( 'donate_form' , array(
	  'title' => __( 'Donate Form Settings', 'bmighty2' ),
	  'priority' => 105, // Before Widgets.
	  'description' => ' Leave fields blank to not show. Enter whole number amounts, decimals will be added automatically. Example, enter 10, not 10.00'
	  //'active_callback' => function () { return is_page('14'); }
	) );

  
	
}
add_action( 'customize_register', 'paypal_starter_theme_customize_register' );

//select sanitization function
function sanitize_select( $input, $setting ){
  
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                      
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
      
}

// Return the css for the background gradient on the form wrapper
function paypal_get_customizer_css() {
   // ob_start();

    $top_color = get_theme_mod( 'top_gradient_color', '' );
    $bottom_color = get_theme_mod( 'bottom_gradient_color', '' );
    $green_color = get_theme_mod( 'green_color', '' );
    $green_color_slug = get_theme_mod( 'green_color_slug', '' );
    $purple_color = get_theme_mod( 'purple_color', '' );
    $purple_color_slug = get_theme_mod( 'purple_color_slug', '' );
    $blue_color = get_theme_mod( 'blue_color', '' );
    $blue_color_slug = get_theme_mod( 'blue_color_slug', '' );
    $teal_color = get_theme_mod( 'teal_color', '' );
    $teal_color_slug = get_theme_mod( 'teal_color_slug', '' );
    $dark_purple_color = get_theme_mod( 'dark_purple_color', '' );
    $dark_purple_slug = get_theme_mod( 'dark_purple_color_slug', '' );
    $dark_green_color = get_theme_mod( 'dark_green_color', '' );
    $dark_green_color_slug = get_theme_mod( 'dark_green_color_slug', '' );
    $title_color = get_theme_mod( 'donate_header_color', '' );
    $label_color = get_theme_mod( 'donate_label_color', '' );
    
    if ( !empty( $dark_green_color ) && !empty($dark_green_color_slug) ) { 
      $dark_green_default = $dark_green_color;
    } else {
      $dark_green_default = '#287a70';
    }
  
    if ( !empty( $green_color ) && !empty($green_color_slug) ) { 
      $green_default = $green_color;
    } else {
      $green_default = '#33A798';
    }

    if ( !empty( $purple_color ) && !empty($purple_color_slug) ) { 
      $purple_default = $purple_color;
    } else {
      $purple_default = '#794280';
    }

    if ( !empty( $blue_color ) && !empty($blue_color_slug) ) { 
      $blue_default = $blue_color;
    } else {
      $blue_default = '#2FD3F5';
    }

    if ( !empty( $teal_color ) && !empty($teal_color_slug) ) { 
      $teal_default = $teal_color;
    } else {
      $teal_default = '#14CAB3';
    }

    if ( !empty( $dark_purple_color ) && !empty($dark_purple_color_slug) ) { 
      $dark_purple_default = $dark_purple_color;
    } else {
      $dark_purple_default = '#6A5387';
    }

    if ( !empty( $header_text ) ) { 
      $header_text_color = $header_text;
    } else {
      $header_text_color = '#FFF';
    }
    ?>

      <style type="text/css">
        /***** Start Default Green Changes ****/
        <?php if ( !empty( $green_color ) && !empty($green_color_slug) ) { ?>
          .donate-form .buttongroup .buttons-flex label:hover, .donate-form .buttongroup .buttons-flex label.selected, .donate-form a.continue, .donate-form input[type="submit"]  {
            background: <?php echo $green_default; ?>;
          }

          .donate-form {
            background: <?php echo $green_default; ?>;
            background: -moz-linear-gradient(top, <?php echo $green_default; ?> 0%, <?php echo $dark_green_default; ?> 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, <?php echo $green_default; ?>), color-stop(100%, <?php echo $dark_green_default; ?>));
            background: -webkit-linear-gradient(top, <?php echo $green_default; ?> 0%, <?php echo $dark_green_default; ?> 100%);
            background: -o-linear-gradient(top, <?php echo $green_default; ?> 0%, <?php echo $dark_green_default; ?> 100%);
            background: -ms-linear-gradient(top, <?php echo $green_default; ?> 0%, <?php echo $dark_green_default; ?> 100%);
            background: linear-gradient(to bottom, <?php echo $green_default; ?> 0%, <?php echo $dark_green_default; ?> 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $green_default; ?>', endColorstr='<?php echo $dark_green_default; ?>', GradientType=0 );
          }
        <?php } ?>
        /******* End Default Green Changes ****/

        <?php if ( !empty( $purple_color ) && !empty($purple_color_slug) ) { ?>
          .donate-form a.continue:hover {
            background: <?php echo $purple_default; ?>
          }
        <?php } ?>
         /******* End Default Purple Changes ****/

        
        /***** Start Default Donate Form Color Changes ******/

        <?php if ( !empty( $top_color ) ) { ?>
          .donate-form {
            background: <?php echo $top_color; ?>;
        		background: -moz-linear-gradient(top, <?php echo $top_color; ?> 0%, <?php echo $bottom_color; ?> 100%);
        		background: -webkit-gradient(left top, left bottom, color-stop(0%, <?php echo $top_color; ?>), color-stop(100%, <?php echo $bottom_color; ?>));
        		background: -webkit-linear-gradient(top, <?php echo $top_color; ?> 0%, <?php echo $bottom_color; ?> 100%);
        		background: -o-linear-gradient(top, <?php echo $top_color; ?> 0%, <?php echo $bottom_color; ?> 100%);
        		background: -ms-linear-gradient(top, <?php echo $top_color; ?> 0%, <?php echo $bottom_color; ?> 100%);
        		background: linear-gradient(to bottom, <?php echo $top_color; ?> 0%, <?php echo $bottom_color; ?> 100%);
        		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $top_color; ?>', endColorstr='<?php echo $bottom_color; ?>', GradientType=0 );
          }
          .donate-form .buttongroup .buttons-flex.two-columns .textgroup:hover, .donate-form .buttongroup .buttons-flex.two-columns .textgroup.selected, .donate-form .buttongroup.frequency .buttons-flex.two-columns label:hover, .donate-form .buttongroup.frequency .buttons-flex.two-columns label.selected {
            background: <?php echo $top_color; ?>;
          }
          .donate-form .buttongroup .buttons-flex.two-columns .textgroup {
            border-bottom:1px solid <?php echo $top_color; ?>;
          }
          .donate-form .buttongroup.frequency .buttons-flex.two-columns label {
            border-right:1px solid <?php echo $top_color; ?>;
          }
        <?php } ?>

        <?php if ( !empty( $title_color ) ) { ?>
          .donate-headline h3.widget-title {
            color: <?php echo $title_color; ?>;
          }
        <?php } ?>

        <?php if ( !empty( $label_color ) ) { ?>
          .donate-form .control-group.two-columns .control-group-wrap label, .donate-form .control-group.two-columns .control-group-wrap input[type="text"]::placeholder, .donate-form .control-group.two-columns .control-group-wrap input[type="email"]::placeholder {
            color: <?php echo $label_color; ?>;
          }
          .donate-form .control-group.two-columns .control-group-wrap input[type="text"], .donate-form .control-group.two-columns .control-group-wrap input[type="email"] {
            border-bottom: 1px solid <?php echo $label_color; ?>;
          }
        <?php } ?>
         /******* End Default Donate Form Color Changes ****/
        }
  		</style>

      <?php if(!empty($scripts)) {
        echo $scripts; 
      } ?>

      <?php

   // $css = ob_get_clean();
    //return $css;
}

add_action( 'wp_head', 'paypal_get_customizer_css');

/**
 * This function adds some styles to the WordPress Customizer
 */
function paypal_customizer_styles() { ?>
  <style>
    label[for="_customize-input-blog_option-radio-grid"]::after {
      content: '';
      background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2019/09/brooke-cagle-193476-unsplash.png);
      background-size: 50px;
      height: 50px;
      display: block;
      background-repeat: no-repeat;
    }

    label[for="_customize-input-blog_option-radio-columns"]::after {
      content: '';
      background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2019/09/brooke-cagle-193476-unsplash.png);
      background-size: 50px;
      height: 50px;
      display: block;
      background-repeat: no-repeat;
    }
    ul#sub-accordion-section-theme_colors li.customize-control-color {
      border-bottom: 1px solid #000;
      padding-bottom:15px;
    }
  </style>
  <?php

}
add_action( 'customize_controls_print_styles', 'paypal_customizer_styles', 999 );