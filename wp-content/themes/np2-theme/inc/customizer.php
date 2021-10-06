<?php
/**
 * gutenberg-starter-theme Theme Customizer
 *
 * @package gutenberg-starter-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gutenberg_starter_theme_customize_register( $wp_customize ) {

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
    
    $wp_customize->add_setting( 'green_color_name', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'Green',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'green_color_slug', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'green',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'green_color', array(
      'default'   => '#33A798',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'dark_green_color_name', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'Dark Green',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'dark_green_color_slug', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'dark-green',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'dark_green_color', array(
      'default'   => '#287a70',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'purple_color_name', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'Purple',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'purple_color_slug', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'purple',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'purple_color', array(
      'default'   => '#794280',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_setting( 'blue_color_name', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'Blue',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'blue_color_slug', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'blue',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'blue_color', array(
      'default'   => '#2FD3F5',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_setting( 'teal_color_name', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'Teal',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'teal_color_slug', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'teal',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'teal_color', array(
      'default'   => '#14CAB3',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
     $wp_customize->add_setting( 'dark_purple_color_name', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'Dark Purple',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'dark_purple_color_slug', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'default' => 'dark-purple',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_setting( 'dark_purple_color', array(
      'default'   => '#6A5387',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    // End settings to allow users to change color palette choices


    $wp_customize->add_setting( 'footer_border_color', array(
      'default'   => $green_default,
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

     $wp_customize->add_setting( 'footer_subscribe_header_color', array(
      'default'   => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

     $wp_customize->add_setting( 'footer_subscribe_button_background_color', array(
      'default'   => $dark_green_default,
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

     $wp_customize->add_setting( 'footer_subscribe_button_text_color', array(
      'default'   => '#fff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'top_footer_background_color', array(
      'default'   => '#fff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'top_footer_header_color', array(
      'default'   => $green_default,
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'top_footer_text_color', array(
      'default'   => '#000',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'top_footer_link_color', array(
      'default'   => '#000',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'footer_background_color', array(
      'default'   => $green_default,
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'bottom_footer_header_color', array(
      'default'   => $green_default,
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'bottom_footer_text_color', array(
      'default'   => '#fff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'bottom_footer_link_color', array(
      'default'   => '#fff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'footer_icon_color', array(
      'default'   => '#fff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'footer_icon_hover_color', array(
      'default'   => $purple_default,
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'header_menu_icon_color', array(
      'default'   => $green_default,
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'header_menu_icon_color_hover', array(
      'default'   => $purple_default,
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'header_link_color', array(
      'default'   => '#fff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'header_link_hover_color', array(
      'default'   => $purple_default,
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'header_nav_background_color', array(
      'default'   => $green_default,
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'header_icon_color', array(
      'default'   => '#fff',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'header_icon_hover_color', array(
      'default'   => $purple_default,
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'script_tag', array(
      'default'   => '',
      'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'blog_option', array(
      'default'   => 'columns',
      'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'header_layout_option', array(
      'default'   => 'standard',
      'transport' => 'refresh',
    ) );

     // Start google fonts settings
    $wp_customize->add_setting( 'google_header_fonts', array(
      'default'   => 'Lato',
      'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'google_text_fonts', array(
      'default'   => 'Alegreya',
      'transport' => 'refresh',
    ) );
    // End google fonts settings

    // Add footer controls
    // start footer subscribe controls
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_subscribe_header_color', array(
      'section' => 'footer_subscribe_colors',
      'label'   => esc_html__( 'Subcribe header color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_subscribe_button_background_color', array(
      'section' => 'footer_subscribe_colors',
      'label'   => esc_html__( 'Subcribe button background color', 'bmighty2' ),
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_subscribe_button_text_color', array(
      'section' => 'footer_subscribe_colors',
      'label'   => esc_html__( 'Subcribe button text color', 'bmighty2' ),
    ) ) );

    // End footer subscribe controls

    //Start top footer controls
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_border_color', array(
      'section' => 'top_footer_colors',
      'label'   => esc_html__( 'Footer top border color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_footer_background_color', array(
      'section' => 'top_footer_colors',
      'label'   => esc_html__( 'Top footer background color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_footer_header_color', array(
      'section' => 'top_footer_colors',
      'label'   => esc_html__( 'Top footer headers color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_footer_text_color', array(
      'section' => 'top_footer_colors',
      'label'   => esc_html__( 'Top footer text color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_footer_link_color', array(
      'section' => 'top_footer_colors',
      'label'   => esc_html__( 'Top footer link color', 'bmighty2' ),
    ) ) );
    // End top footer controls

    // Start bottom footer controls
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
      'section' => 'bottom_footer_colors',
      'label'   => esc_html__( 'Bottom footer background color ( if active )', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_footer_header_color', array(
      'section' => 'bottom_footer_colors',
      'label'   => esc_html__( 'Bottom footer headers color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_footer_text_color', array(
      'section' => 'bottom_footer_colors',
      'label'   => esc_html__( 'Bottom footer text color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_footer_link_color', array(
      'section' => 'bottom_footer_colors',
      'label'   => esc_html__( 'Bottom footer link color', 'bmighty2' ),
    ) ) );
    // Stop bottom footer controls

     // Start footer icon controls
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_color', array(
      'section' => 'footer_icon_colors',
      'label'   => esc_html__( 'Footer social icons color ( if active )', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_hover_color', array(
      'section' => 'footer_icon_colors',
      'label'   => esc_html__( 'Footer social icons hover color ( if active )', 'bmighty2' ),
      'description' => esc_html__( 'Change will not show until published.', 'bmighty2' ),
    ) ) );
    // Stop footer icon controls

    // Add footer controls
    // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_border_color', array(
    //   'section' => 'footer_colors',
    //   'label'   => esc_html__( 'Footer top border color', 'bmighty2' ),
    // ) ) );

    // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_footer_background_color', array(
    //   'section' => 'footer_colors',
    //   'label'   => esc_html__( 'Top footer background color', 'bmighty2' ),
    // ) ) );

    // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
    //   'section' => 'footer_colors',
    //   'label'   => esc_html__( 'Bottom footer background color ( if active )', 'bmighty2' ),
    // ) ) );

    // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_color', array(
    //   'section' => 'footer_colors',
    //   'label'   => esc_html__( 'Footer social icons color ( if active )', 'bmighty2' ),
    // ) ) );

    // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_hover_color', array(
    //   'section' => 'footer_colors',
    //   'label'   => esc_html__( 'Footer social icons hover color ( if active )', 'bmighty2' ),
    //   'description' => esc_html__( 'Change will not show until published.', 'bmighty2' ),
    // ) ) );
    // End footer controls

    // Add header and nav controls
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_icon_color', array(
      'section' => 'header_colors',
      'label'   => esc_html__( 'Navigation mobile menu icon color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_icon_color_hover', array(
      'section' => 'header_colors',
      'label'   => esc_html__( 'Navigation mobile menu icon hover color', 'bmighty2' ),
      'description' => esc_html__( 'Change will not show until published.', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_link_color', array(
      'section' => 'header_colors',
      'label'   => esc_html__( 'Navigation menu text color', 'bmighty2' ),
    ) ) );

     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_link_hover_color', array(
      'section' => 'header_colors',
      'label'   => esc_html__( 'Navigation menu text border hover color', 'bmighty2' ),
      'description' => esc_html__( 'Change will not show until published.', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_background_color', array(
      'section' => 'header_colors',
      'label'   => esc_html__( 'Navigation background color', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_icon_color', array(
      'section' => 'header_colors',
      'label'   => esc_html__( 'Navigation social icons color ( if active )', 'bmighty2' ),
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_icon_hover_color', array(
      'section' => 'header_colors',
      'label'   => esc_html__( 'Navigation social icons hover color ( if active )', 'bmighty2' ),
      'description' => esc_html__( 'Change will not show until published.', 'bmighty2' ),
    ) ) );
    // End header and nav controls

    // Add custom color palette controls
    $wp_customize->add_control( 'green_color_name', array(
      'label' => __( 'Change the Green Primary Color', 'bmighty2' ),
      'description' => __( 'Enter the color name here', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( 'green_color_slug', array(
      'label' => __( 'Enter the color slug here' ),
      'description' => __( 'use hyphens and lowercase, example light-grey', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'green_color', array(
      'section' => 'theme_colors',
      'label'   => esc_html__( 'Enter hex color value', 'bmighty2' ),
      'description' => __( 'Click the default button to reset back to original color (Green: #33A798)', 'bmighty2' ),
    ) ) );
    $wp_customize->add_control( 'dark_green_color_name', array(
      'label' => __( 'Change the Dark Green Primary Color', 'bmighty2' ),
      'description' => __( 'Enter the color name here', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( 'dark_green_color_slug', array(
      'label' => __( 'Enter the color slug here' ),
      'description' => __( 'use hyphens and lowercase, example light-grey', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_green_color', array(
      'section' => 'theme_colors',
      'label'   => esc_html__( 'Enter hex color value', 'bmighty2' ),
      'description' => __( 'Click the default button to reset back to original color (Dark Green: #287a70)', 'bmighty2' ),
    ) ) );
    $wp_customize->add_control( 'purple_color_name', array(
      'label' => __( 'Change the Purple Primary Color', 'bmighty2' ),
      'description' => __( 'Enter the color name here', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( 'purple_color_slug', array(
      'label' => __( 'Enter the color slug here' ),
      'description' => __( 'use hyphens and lowercase, example light-grey', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'purple_color', array(
      'section' => 'theme_colors',
      'label'   => esc_html__( 'Enter hex color value', 'bmighty2' ),
      'description' => __( 'Click the default button to reset back to original color (Purple: #794280)', 'bmighty2' ),
    ) ) );
    $wp_customize->add_control( 'dark_purple_color_name', array(
      'label' => __( 'Change the Dark Purple Primary Color', 'bmighty2' ),
      'description' => __( 'Enter the color name here', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( 'dark_purple_color_slug', array(
      'label' => __( 'Enter the color slug here' ),
      'description' => __( 'use hyphens and lowercase, example light-grey', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_purple_color', array(
      'section' => 'theme_colors',
      'label'   => esc_html__( 'Enter hex color value', 'bmighty2' ),
      'description' => __( 'Click the default button to reset back to original color (Dark Purple: #6A5387)', 'bmighty2' ),
    ) ) );
    $wp_customize->add_control( 'blue_color_name', array(
      'label' => __( 'Change the Blue Primary Color', 'bmighty2' ),
      'description' => __( 'Enter the color name here', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( 'blue_color_slug', array(
      'label' => __( 'Enter the color slug here' ),
      'description' => __( 'use hyphens and lowercase, example light-grey', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blue_color', array(
      'section' => 'theme_colors',
      'label'   => esc_html__( 'Enter hex color value', 'bmighty2' ),
      'description' => __( 'Click the default button to reset back to original color (Blue: #2FD3F5)', 'bmighty2' ),
    ) ) );
    $wp_customize->add_control( 'teal_color_name', array(
      'label' => __( 'Change the Teal Primary Color', 'bmighty2' ),
      'description' => __( 'Enter the color name here', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( 'teal_color_slug', array(
      'label' => __( 'Enter the color slug here' ),
      'description' => __( 'use hyphens and lowercase, example light-grey', 'bmighty2' ),
      'type' => 'text',
      'section' => 'theme_colors',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'teal_color', array(
      'section' => 'theme_colors',
      'label'   => esc_html__( 'Enter hex color value', 'bmighty2' ),
      'description' => __( 'Click the default button to reset back to original color (Teal: #14CAB3)', 'bmighty2' ),
    ) ) );

    // End custom color palette controls

    // Add google font controls
    $font_choices = array(
      'Default' => 'Default',
      'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
      'Open Sans:400italic,700italic,400,700' => 'Open Sans',
      'Oswald:400,700' => 'Oswald',
      'Playfair Display:400,700,400italic' => 'Playfair Display',
      'Montserrat:400,700' => 'Montserrat',
      'Raleway:400,700' => 'Raleway',
      'Droid Sans:400,700' => 'Droid Sans',
      'Lato:400,700,400italic,700italic' => 'Lato',
      'Arvo:400,700,400italic,700italic' => 'Arvo',
      'Lora:400,700,400italic,700italic' => 'Lora',
      'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
      'Oxygen:400,300,700' => 'Oxygen',
      'PT Serif:400,700' => 'PT Serif',
      'PT Sans:400,700,400italic,700italic' => 'PT Sans',
      'PT Sans Narrow:400,700' => 'PT Sans Narrow',
      'Cabin:400,700,400italic' => 'Cabin',
      'Fjalla One:400' => 'Fjalla One',
      'Francois One:400' => 'Francois One',
      'Josefin Sans:400,300,600,700' => 'Josefin Sans',
      'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
      'Arimo:400,700,400italic,700italic' => 'Arimo',
      'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
      'Bitter:400,700,400italic' => 'Bitter',
      'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
      'Roboto:400,400italic,700,700italic' => 'Roboto',
      'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
      'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
      'Roboto Slab:400,700' => 'Roboto Slab',
      'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
      'Rokkitt:400' => 'Rokkitt',
    );
    $wp_customize->add_control( 'google_header_fonts', array(
      'type' => 'select',
      'label' => __( 'Select a font to use for the headers' ),
      'section' => 'google_fonts',
      'choices' => $font_choices
    ) );
    $wp_customize->add_control( 'google_text_fonts', array(
      'type' => 'select',
      'label' => __( 'Select a font to use for the body text' ),
      'section' => 'google_fonts',
      'choices' => $font_choices
    ) );

    // End google font controls

    // Add script tag controls
    $wp_customize->add_control( 'script_tag', array(
      'label' => __( 'Enter your 3rd party scripts here' ),
      'type' => 'textarea',
      'section' => 'script_area',
    ) );
    // End script tag controls

    // Add Blog Layout Controls
    $wp_customize->add_control( 'blog_option', array(
      'type' => 'radio',
      'section' => 'blog_layout', // Add a default or your own section
      'label' => __( 'Blog Layout Selection' ),
      'description' => __( 'Choose Between a masonry grid or standard grid' ),
      'choices' => array(
        'grid' => __( 'Grid' ),
        'columns' => __( 'Columns' ),
      ),
    ) );
    // End Blog Layout Controls

    // Add Header Layout Controls
    $wp_customize->add_control( 'header_layout_option', array(
      'type' => 'radio',
      'section' => 'header_layout', // Add a default or your own section
      'label' => __( 'Header Layout Selection' ),
      'description' => __( 'Choose Between a Standard Menu or Always Mobile Menu' ),
      'choices' => array(
        'standard' => __( 'Standard' ),
        'mobile' => __( 'Always Mobile' ),
      ),
    ) );
    // End Blog Layout Controls


	// Make sure the options appear in the customizer menu in their own sections
	$wp_customize->add_section( 'theme_colors' , array(
    'title' => __( 'Theme Color Palette Options', 'bmighty2' ),
    'priority' => 25, // Before Widgets.
    'description' => __( 'All 3 fields for each color need to be set in order for the change to take affect. You may need to refresh the page manually to see all the changes.', 'bmighty2' ),
  ) );

  $wp_customize->add_section( 'google_fonts' , array(
    'title' => __( 'Theme Font Options', 'bmighty2' ),
    'priority' => 25, // Before Widgets.
    'description' => __( 'Select a different google font for the theme. Default is Alegreya for text and Lato for headers.', 'bmighty2' ),
  ) );

  $wp_customize->add_section( 'header_layout' , array(
    'title' => __( 'Header Layout Options', 'bmighty2' ),
    'priority' => 28, // Before Widgets.
    //'active_callback' => function () { return is_page('14'); }
  ) );

  $wp_customize->add_section( 'header_colors' , array(
	  'title' => __( 'Navigation Color Options', 'bmighty2' ),
	  'priority' => 105, // Before Widgets.
	  //'active_callback' => function () { return is_page('14'); }
	) );

  $wp_customize->add_section( 'footer_subscribe_colors' , array(
    'title' => __( 'Footer Subscribe Widget Color Options', 'bmighty2' ),
    'priority' => 105, // Before Widgets.
    //'active_callback' => function () { return is_page('14'); }
  ) );

	$wp_customize->add_section( 'top_footer_colors' , array(
    'title' => __( 'Top Footer Color Options', 'bmighty2' ),
    'priority' => 105, // Before Widgets.
    //'active_callback' => function () { return is_page('14'); }
  ) );

  $wp_customize->add_section( 'bottom_footer_colors' , array(
    'title' => __( 'Bottom Footer Color Options', 'bmighty2' ),
    'priority' => 105, // Before Widgets.
    //'active_callback' => function () { return is_page('14'); }
  ) );

  $wp_customize->add_section( 'footer_icon_colors' , array(
    'title' => __( 'Footer Icon Color Options', 'bmighty2' ),
    'priority' => 105, // Before Widgets.
    //'active_callback' => function () { return is_page('14'); }
  ) );

  $wp_customize->add_section( 'blog_layout' , array(
    'title' => __( 'Blog Layout Options', 'bmighty2' ),
    'priority' => 105, // Before Widgets.
    'description' => 'Choose the layout for the blog grid page.'
    //'active_callback' => function () { return is_page('14'); }
  ) );

  $wp_customize->add_section( 'script_area' , array(
    'title' => __( '3rd Party Scripts (Google tracking, etc)', 'bmighty2' ),
    'priority' => 105, // Before Widgets.
    'description' => 'Enter any scripts that need to be added to the head section of the site'
    //'active_callback' => function () { return is_page('14'); }
  ) );
	
}
add_action( 'customize_register', 'gutenberg_starter_theme_customize_register' );


//Sanitizes Fonts
function linje_sanitize_fonts( $input ) {
  $valid = array(
    'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
    'Open Sans:400italic,700italic,400,700' => 'Open Sans',
    'Oswald:400,700' => 'Oswald',
    'Playfair Display:400,700,400italic' => 'Playfair Display',
    'Montserrat:400,700' => 'Montserrat',
    'Raleway:400,700' => 'Raleway',
    'Droid Sans:400,700' => 'Droid Sans',
    'Lato:400,700,400italic,700italic' => 'Lato',
    'Arvo:400,700,400italic,700italic' => 'Arvo',
    'Lora:400,700,400italic,700italic' => 'Lora',
    'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
    'Oxygen:400,300,700' => 'Oxygen',
    'PT Serif:400,700' => 'PT Serif',
    'PT Sans:400,700,400italic,700italic' => 'PT Sans',
    'PT Sans Narrow:400,700' => 'PT Sans Narrow',
    'Cabin:400,700,400italic' => 'Cabin',
    'Fjalla One:400' => 'Fjalla One',
    'Francois One:400' => 'Francois One',
    'Josefin Sans:400,300,600,700' => 'Josefin Sans',
    'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
    'Arimo:400,700,400italic,700italic' => 'Arimo',
    'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
    'Bitter:400,700,400italic' => 'Bitter',
    'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
    'Roboto:400,400italic,700,700italic' => 'Roboto',
    'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
    'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
    'Roboto Slab:400,700' => 'Roboto Slab',
    'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
    'Rokkitt:400' => 'Rokkitt',
  );

  if ( array_key_exists( $input, $valid ) ) {
    return $input;
  } else {
    return '';
  }
}

/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
function mytheme_customizer_live_preview()
{
	wp_enqueue_script( 
		  'mytheme-themecustomizer',			//Give the script an ID
		  get_template_directory_uri().'/js/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'mytheme_customizer_live_preview' );



// Return the css for the background gradient on the form wrapper
function theme_get_customizer_css() {
   // ob_start();

    $top_color = get_theme_mod( 'top_gradient_color', '' );
    $bottom_color = get_theme_mod( 'bottom_gradient_color', '' );
    $footer_border = get_theme_mod( 'footer_border_color', '' );
    $footer_subscribe_header_color = get_theme_mod( 'footer_subscribe_header_color', '' );
    $footer_subscribe_button_background_color = get_theme_mod( 'footer_subscribe_button_background_color', '' );
    $footer_subscribe_button_text_color = get_theme_mod( 'footer_subscribe_button_text_color', '' );
    $top_footer_background = get_theme_mod( 'top_footer_background_color', '' );
    $top_footer_header_color = get_theme_mod( 'top_footer_header_color', '' );
    $top_footer_text_color = get_theme_mod( 'top_footer_text_color', '' );
    $top_footer_link_color = get_theme_mod( 'top_footer_link_color', '' );
    $footer_background = get_theme_mod( 'footer_background_color', '' );
    $bottom_footer_header_color = get_theme_mod( 'bottom_footer_header_color', '' );
    $bottom_footer_text_color = get_theme_mod( 'bottom_footer_text_color', '' );
    $bottom_footer_link_color = get_theme_mod( 'bottom_footer_link_color', '' );
    $footer_icon = get_theme_mod( 'footer_icon_color', '');
    $footer_icon_hover = get_theme_mod( 'footer_icon_hover_color', '' );
    $nav_background = get_theme_mod( 'header_nav_background_color', '' );
    $header_menu_icon = get_theme_mod( 'header_menu_icon_color', '');
    $header_menu_icon_hover = get_theme_mod( 'header_menu_icon_color_hover', '');
    $header_icon = get_theme_mod( 'header_icon_color', '');
    $header_icon_hover = get_theme_mod( 'header_icon_hover_color', '' );
    $header_text = get_theme_mod( 'header_link_color', '' );
    $header_text_hover = get_theme_mod( 'header_link_hover_color', '' );
    $scripts = get_theme_mod( 'script_tag', '' );
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
    $headings_font = get_theme_mod('google_header_fonts', '');
    $text_font = get_theme_mod('google_text_fonts', '');
    
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
        /********* Start Google Fonts **********/
        <?php if ( !empty($headings_font) ) { $font_pieces = explode(":", $headings_font); ?>
          h1, h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, button.small, .button.small, input[type="submit"], .bm2-button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce a.button.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled[disabled], .woocommerce button.button.alt.disabled, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled[disabled], .woocommerce input.button.alt.disabled, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled[disabled], .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], button[type="submit"], nav.off-canvas .menu-header ul li a, nav.top-bar ul.menu li a {
            font-family: <?php echo $font_pieces[0]; ?>;
          }
        <?php } ?>
        <?php if ( !empty($text_font) ) { $font_pieces = explode(":", $text_font); ?>
          body, div, section, p, ul, ol, li, label, a, .wp-block-button__link {
            font-family: <?php echo $font_pieces[0]; ?>;
          }
        <?php } ?>
        /******** End Google Fonts **********/

        /***** Start Default Green Changes ****/
        <?php if ( !empty( $green_color ) && !empty($green_color_slug) ) { ?>
          a, h1 a, h2 a, h3 a, h4 a, h5 a, li a, .has-green-color, .has-<?php echo $green_color_slug; ?>-color, .off-canvas .widget_bm_connect_widget a.connect-icon:hover, nav.off-canvas .close-button:hover, footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) h3.widget-title, footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) a:hover, button.small.bm2-button--design-plain, button.small.bm2-button--design-link, .button.small.bm2-button--design-plain, .button.small.bm2-button--design-link, input[type="submit"].bm2-button--design-plain, input[type="submit"].bm2-button--design-link, .bm2-button.bm2-button--design-plain, .bm2-button.bm2-button--design-link, button.small.bm2-button--design-ghost .bm2-button--inner, button.small.bm2-button--ghost-button .bm2-button--inner, .button.small.bm2-button--design-ghost .bm2-button--inner, .button.small.bm2-button--ghost-button .bm2-button--inner, input[type="submit"].bm2-button--design-ghost .bm2-button--inner, input[type="submit"].bm2-button--ghost-button .bm2-button--inner, .bm2-button.bm2-button--design-ghost .bm2-button--inner, .bm2-button.bm2-button--ghost-button .bm2-button--inner, button.small.bm2-button--design-ghost:hover, button.small.bm2-button--ghost-button:hover, .button.small.bm2-button--design-ghost:hover, .button.small.bm2-button--ghost-button:hover, input[type="submit"].bm2-button--design-ghost:hover, input[type="submit"].bm2-button--ghost-button:hover, .bm2-button.bm2-button--design-ghost:hover, .bm2-button.bm2-button--ghost-button:hover, button.small.bm2-button--design-ghost:hover .bm2-button--inner, button.small.bm2-button--ghost-button:hover .bm2-button--inner, .button.small.bm2-button--design-ghost:hover .bm2-button--inner, .button.small.bm2-button--ghost-button:hover .bm2-button--inner, input[type="submit"].bm2-button--design-ghost:hover .bm2-button--inner, input[type="submit"].bm2-button--ghost-button:hover .bm2-button--inner, .bm2-button.bm2-button--design-ghost:hover .bm2-button--inner, .bm2-button.bm2-button--ghost-button:hover .bm2-button--inner, button.small.bm2-button--design-plain .bm2-button--inner, button.small.bm2-button--design-link .bm2-button--inner, .button.small.bm2-button--design-plain .bm2-button--inner, .button.small.bm2-button--design-link .bm2-button--inner, input[type="submit"].bm2-button--design-plain .bm2-button--inner, input[type="submit"].bm2-button--design-link .bm2-button--inner, .bm2-button.bm2-button--design-plain .bm2-button--inner, .bm2-button.bm2-button--design-link .bm2-button--inner, button.small.bm2-button--design-plain:hover .bm2-button--inner, button.small.bm2-button--design-link:hover .bm2-button--inner, .button.small.bm2-button--design-plain:hover .bm2-button--inner, .button.small.bm2-button--design-link:hover .bm2-button--inner, input[type="submit"].bm2-button--design-plain:hover .bm2-button--inner, input[type="submit"].bm2-button--design-link:hover .bm2-button--inner, .bm2-button.bm2-button--design-plain:hover .bm2-button--inner, .bm2-button.bm2-button--design-link:hover .bm2-button--inner, .woocommerce div.product p.price, .woocommerce div.product span.price, blockquote, blockquote p {
            color: <?php echo $green_default; ?>;
          }

          button.small.bm2-button--design-ghost, button.small.bm2-button--ghost-button, .button.small.bm2-button--design-ghost, .button.small.bm2-button--ghost-button, input[type="submit"].bm2-button--design-ghost, input[type="submit"].bm2-button--ghost-button, .bm2-button.bm2-button--design-ghost, .bm2-button.bm2-button--ghost-button {
              color: <?php echo $green_default; ?>;
              border-color: <?php echo $green_default; ?>;
          }

          .has-green-background-color , .has-<?php echo $green_color_slug; ?>-background-color, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .cd-top {
            background-color: <?php echo $green_default; ?>;
          }

          .menu-icon::after {
            background:<?php echo $green_default; ?>;
            box-shadow: 0 0.875rem 0 <?php echo $green_default; ?>,0 1.75rem 0 <?php echo $green_default; ?>;
          }

          nav.off-canvas .menu-header ul li ul.sub-menu {
            border-color: <?php echo $header_text_color; ?>;
          }

          nav.off-canvas .menu-header ul li a:hover, nav.off-canvas .menu-header ul li.current_page_item a, nav.off-canvas .menu-header ul li ul.sub-menu li a:hover, nav.off-canvas .menu-header ul li ul.sub-menu li.current-menu-item a:hover, nav.off-canvas .menu-header ul li ul.sub-menu li.current-menu-item a {
            border-color: <?php echo $green_default; ?>;
          }

          footer:not(.entry-footer) {
            border-top-color: <?php echo $green_default; ?>;
          }
          footer:not(.entry-footer) #footer-bottom-widget-wrapper, button.small, .button.small, button.small:hover, .button.small:hover, input[type="submit"], .bm2-button, .bm2-button:hover, .custom-pagination .page-numbers, .custom-pagination a.page-numbers, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .grid-container div.product .woocommerce-tabs ul.tabs li, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover  {
            background: <?php echo $green_default; ?>;
          }

        <?php } ?>
        /******* End Default Green Changes ****/


        /***** Start Default Purple Changes ******/

        <?php if ( !empty( $purple_color ) && !empty($purple_color_slug) ) { ?>
          .has-purple-color, .has-<?php echo $purple_color_slug; ?>-color, footer:not(.entry-footer) #footer-bottom-widget-wrapper a.connect-icon:hover {
            color: <?php echo $purple_default; ?>;
          }

          .has-purple-background-color, .has-<?php echo $purple_color_slug; ?>-background-color, .woocommerce .grid-container .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .grid-container .widget_price_filter .ui-slider .ui-slider-handle {
            background-color: <?php echo $purple_default; ?>;
          }

          nav.off-canvas, .custom-pagination .page-numbers:hover, .custom-pagination .page-numbers.current, .custom-pagination a.page-numbers:hover, .custom-pagination a.page-numbers.current, .woocommerce .grid-container div.product .woocommerce-tabs ul.tabs li.active, .woocommerce .grid-container div.product .woocommerce-tabs ul.tabs li:hover, span.onsale {
            background: <?php echo $purple_default; ?>
          }

          a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, li a:hover {
            color:<?php echo $purple_default; ?>;
          }

          .menu-icon:hover::after {
            background:<?php echo $purple_default; ?>;
            box-shadow: 0 0.875rem 0 <?php echo $purple_default; ?>,0 1.75rem 0 <?php echo $purple_default; ?>;
          }
        <?php } ?>
         /******* End Default Purple Changes ****/

        /***** Start Default Dark Purple Changes ******/

        <?php if ( !empty( $dark_purple_color ) && !empty($dark_purple_color_slug) ) { ?>
          .has-dark-purple-color, .has-<?php echo $dark_purple_color_slug; ?>-color {
            color: <?php echo $dark_purple_default; ?>;
          }

          .has-dark-purple-background-color, .has-<?php echo $dark_purple_color_slug; ?>-background-color {
            background-color: <?php echo $dark_purple_default; ?>;
          }
        <?php } ?>
         /******* End Default Dark Purple Changes ****/

         /***** Start Default Blue Changes ******/
        <?php if ( !empty( $blue_color ) && !empty($blue_color_slug) ) { ?>
          .has-blue-color, .has-<?php echo $blue_color_slug; ?>-color {
            color: <?php echo $blue_default; ?>;
          }

          .has-blue-background-color, .has-<?php echo $blue_color_slug; ?>-background-color {
            background-color: <?php echo $blue_default; ?>;
          }
        <?php } ?>
         /******* End Default Blue Changes ****/

        /***** Start Default Teal Changes ******/

        <?php if ( !empty( $teal_color ) && !empty($teal_color_slug) ) { ?>
          .has-teal-color, .has-<?php echo $teal_color_slug; ?>-color {
            color: <?php echo $teal_default; ?>;
          }

          .has-teal-background-color, .has-<?php echo $teal_color_slug; ?>-background-color {
            background-color: <?php echo $teal_default; ?>;
          }
        <?php } ?>
         /******* End Default Teal Changes ****/

         /***** Start Default Header Color Changes ******/
        <?php if ( !empty( $header_icon ) ) { ?>
          .off-canvas .widget_bm_connect_widget a.connect-icon, .top-bar .widget_bm_connect_widget a.connect-icon {
            color:<?php echo $header_icon; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $header_icon_hover ) ) { ?>
          .off-canvas .widget_bm_connect_widget a.connect-icon:hover, .top-bar .widget_bm_connect_widget a.connect-icon:hover {
            color:<?php echo $header_icon_hover; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $nav_background ) ) { ?>
          nav.off-canvas, .sticky-container .sticky.is-anchored, .sticky-container .sticky.is-stuck, nav.top-bar ul.menu li ul.sub-menu {
            background: <?php echo $nav_background; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $header_text ) ) { ?>
          nav.off-canvas .menu-header ul li a, .off-canvas .widget_bm_connect_widget h3.widget-title, nav.off-canvas .close-button, nav.top-bar ul.menu li a {
            color: <?php echo $header_text; ?>;
          }
          .dropdown.menu.medium-horizontal > li.is-dropdown-submenu-parent > a::after {
            border-color: <?php echo $header_text; ?> transparent transparent;
          }
        <?php } ?>
        <?php if ( !empty( $header_text_hover ) ) { ?>
          nav.off-canvas .menu-header ul li a:hover, nav.off-canvas .menu-header ul li.current_page_item a, nav.off-canvas .menu-header ul li ul.sub-menu li a:hover, nav.off-canvas .menu-header ul li ul.sub-menu li.current-menu-item a:hover, nav.off-canvas .menu-header ul li ul.sub-menu li.current-menu-item a, nav.top-bar ul.menu li a:hover, nav.top-bar ul.menu li ul.sub-menu li a:hover, nav.top-bar ul.menu li.current-menu-item a, nav.top-bar ul.menu li ul.sub-menu li.current-menu-item a {
            border-color: <?php echo $header_text_hover; ?>;
          }
          nav.off-canvas .close-button:hover {
            color: <?php echo $header_text_hover; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $header_menu_icon ) ) { ?>
          .menu-icon::after {
            background:<?php echo $header_menu_icon; ?>;
            box-shadow: 0 0.875rem 0 <?php echo $header_menu_icon; ?>,0 1.75rem 0 <?php echo $header_menu_icon; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $header_menu_icon_hover ) ) { ?>
          .menu-icon:hover::after {
            background:<?php echo $header_menu_icon_hover; ?>;
            box-shadow: 0 0.875rem 0 <?php echo $header_menu_icon_hover; ?>,0 1.75rem 0 <?php echo $header_menu_icon_hover; ?>;
          }
        <?php } ?>
        /******* End Default Header Color Changes ****/

        /***** Start Default Footer Color Changes ******/
        <?php if ( !empty( $footer_border ) ) { ?>
          footer:not(.entry-footer) {
          	border-top-color: <?php echo $footer_border; ?>;
          }
        <?php } ?>

         <?php if ( !empty( $footer_subscribe_header_color ) ) { ?>
          footer:not(.entry-footer) .widget_cm_subscribe_form h3.widget-title {
            color: <?php echo $footer_subscribe_header_color; ?>;
          }
        <?php } ?>

        <?php if ( !empty( $footer_subscribe_button_background_color ) ) { ?>
          footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm input[type="submit"], footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm .button.small {
            background: <?php echo $footer_subscribe_button_background_color; ?>;
          }
        <?php } ?>

        <?php if ( !empty( $footer_subscribe_button_text_color ) ) { ?>
          footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm input[type="submit"], footer:not(.entry-footer) .widget_cm_subscribe_form #subscribe #subForm .button.small {
            color: <?php echo $footer_subscribe_button_text_color; ?>;
          }
        <?php } ?>
        
         <?php if ( !empty( $top_footer_background ) ) { ?>
          footer:not(.entry-footer) {
            background: <?php echo $top_footer_background; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $top_footer_header_color ) ) { ?>
          footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) h3.widget-title {
            color: <?php echo $top_footer_header_color; ?>;
            border-color: <?php echo $top_footer_header_color; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $top_footer_text_color ) ) { ?>
          footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) p, footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) li {
            color: <?php echo $top_footer_text_color; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $top_footer_link_color ) ) { ?>
          footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) a, footer:not(.entry-footer) #footer-top-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) a:hover {
            color: <?php echo $top_footer_link_color; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $footer_background ) ) { ?>
          footer:not(.entry-footer) #footer-bottom-widget-wrapper {
          	background: <?php echo $footer_background; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $bottom_footer_header_color ) ) { ?>
          footer:not(.entry-footer) #footer-bottom-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) h3.widget-title {
            color: <?php echo $bottom_footer_header_color; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $bottom_footer_text_color ) ) { ?>
          footer:not(.entry-footer) #footer-bottom-widget-wrapper p, footer:not(.entry-footer) #footer-bottom-widget-wrapper li {
            color: <?php echo $bottom_footer_text_color; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $bottom_footer_link_color ) ) { ?>
          footer:not(.entry-footer) #footer-bottom-widget-wrapper a, footer:not(.entry-footer) #footer-bottom-widget-wrapper a:hover {
            color: <?php echo $bottom_footer_link_color; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $footer_icon ) ) { ?>
          footer:not(.entry-footer) #footer-bottom-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) a.connect-icon {
          	color: <?php echo $footer_icon; ?>;
          }
        <?php } ?>
        <?php if ( !empty( $footer_icon_hover ) ) { ?>
          footer:not(.entry-footer) #footer-bottom-widget-wrapper .widget-container:not(.widget_cm_subscribe_form) a.connect-icon:hover {
          	color: <?php echo $footer_icon_hover; ?>;
          }
        <?php } ?>
         /******* End Default Footer Color Changes ****/
        
  		</style>

      <?php if(!empty($scripts)) {
        echo $scripts; 
      } ?>

      <?php

   // $css = ob_get_clean();
    //return $css;
}

add_action( 'wp_head', 'theme_get_customizer_css');

/**
 * This function adds some styles to the WordPress Customizer
 */
function my_customizer_styles() { ?>
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
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );