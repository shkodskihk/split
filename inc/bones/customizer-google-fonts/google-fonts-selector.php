<?php
/*
* Google Fonts - Underskeleton Bones
* 
* Description: Allow admin user to select font-family 
* for body and headings from google fonts API (30 most.
*/



function underskeleton_bones_customizer_google_fonts_selector( $wp_customize ) {
  require_once get_template_directory() . '/inc/bones/customizer-google-fonts/inc/google-font-dropdown-custom-control.php';

  /* SECTION: PAGE SETTINGS */
  $wp_customize->add_section( 'split_fonts_settings_section' , array(
      'title'       => __( 'Fonts', 'split' ),
      'description' => __( 'Select which fonts to use for body and headings.', 'split' ),
      ));

  $wp_customize->add_setting( 'split_body_font', array(
      'default'        => 'Roboto',
  ) );
  $wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 'split_body_font', array(
      'label'     => 'Body Font',
      'section'   => 'split_fonts_settings_section',
      'settings'  => 'split_body_font',
      'priority'  => 12
  ) ) );

}
add_action('customize_register', 'underskeleton_bones_customizer_google_fonts_selector');
