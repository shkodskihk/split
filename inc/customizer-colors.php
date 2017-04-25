<?php
/**
 * Split Color Customizer.
 *
 * @package split
 */

class Split_Customizer_Colors {
  
  public $colors = array();
  
  public $split_css_colors = array(
    'light-grey' =>         '#f3f3f3',
    'dark-grey' =>          '#333333',
    'primary-color' =>      '#e8702a',
    'secondary-color' =>    '#0ea7b5',
    'tertiary-color' =>     '#ffbe4f',
    'border-color' =>       '#bbbbbb',
    'font-color' =>         '#333333',
    'link-color' =>         '#0ea7b5',
  );






  public function __construct() {
    $this->colors = array(
      'header_textcolor'                => $this->split_css_colors['font-color'],
      'background_color'                => 'ffffff',
      'split_header_background_color'   => '#ffffff',
      
      'split_footer_background_color'   => $this->split_css_colors['light-grey'],
      'split_footer_textcolor'          => $this->split_css_colors['font-color'],
      'split_footer_link_color'         => $this->split_css_colors['secondary-color'],

      'primary-color'           => $this->split_css_colors['primary-color'],
      'secondary-color'         => $this->split_css_colors['secondary-color'],
      'tertiary-color'          => $this->split_css_colors['tertiary-color'],

      'split_text_color'        => $this->split_css_colors['font-color'],
      'split_heading_color'     => $this->split_css_colors['font-color'],
      'split_link_color'        => $this->split_css_colors['link-color'],

      'split_button_text_color'         => '#ffffff',
      'split_button_background_color'   => $this->split_css_colors['secondary-color'],
    );

    add_action( 'customize_register' , array( $this, 'add_customizer_settings' ) );
    add_action( 'wp_head', array( $this, 'print_output_css' ), 20 );
  }





  function add_customizer_settings( $wp_customize ) {

    /* CHANGE DEFAULT COLORS */
    $wp_customize->get_setting( 'header_textcolor' )->default = $this->colors['header_textcolor'];
    $wp_customize->get_setting( 'background_color' )->default = $this->colors['background_color'];


    /* SETTING: HEADER BACKGROUND COLOR */
    $wp_customize->add_setting( 'split_header_background_color', array(
      'default'       => $this->colors['split_header_background_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_header_background_color',
      array(
        'label'     => __( 'Header Background', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_header_background_color',
        'priority'  => 20,
      )));



    /* SEPARATOR: Footer Colors */
    $wp_customize->add_setting( 'split_footer_colors_separator', array(
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'sanitize_callback'    => 'sanitize_text_field',
      ));
    $wp_customize->add_control( new Split_Customize_Separator_Control( 
      $wp_customize,
      'split_footer_colors_separator',
      array(
        'label'     => __( 'Footer Colors', 'split' ),
        'section'   => 'colors',
        'priority'  => 20,
        'settings'  => 'split_footer_colors_separator',
      )));

    /* SETTING: FOOTER BACKGROUND COLOR */
    $wp_customize->add_setting( 'split_footer_background_color', array(
      'default'       => $this->colors['split_footer_background_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_footer_background_color',
      array(
        'label'     => __( 'Footer Background', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_footer_background_color',
        'priority'  => 20,
      )));

    /* SETTING: FOOTER TEXT COLOR */
    $wp_customize->add_setting( 'split_footer_textcolor', array(
      'default'       => $this->colors['split_footer_textcolor'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_footer_textcolor',
      array(
        'label'     => __( 'Footer Text Color', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_footer_textcolor',
        'priority'  => 20,
      )));

    /* SETTING: FOOTER LINK COLOR */
    $wp_customize->add_setting( 'split_footer_link_color', array(
      'default'       => $this->colors['split_footer_link_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_footer_link_color',
      array(
        'label'     => __( 'Footer Link Color', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_footer_link_color',
        'priority'  => 20,
      )));



    /* SEPARATOR: Brand Colors */
    $wp_customize->add_setting( 'split_brand_colors_separator', array(
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'sanitize_callback'    => 'sanitize_text_field',
      ));
    $wp_customize->add_control( new Split_Customize_Separator_Control( 
      $wp_customize,
      'split_brand_colors_separator',
      array(
        'label'     => __( 'Brand Colors', 'split' ),
        'section'   => 'colors',
        'priority'  => 20,
        'settings'  => 'split_brand_colors_separator',
      )));

    /* SETTING: PRIMARY COLOR */
    $wp_customize->add_setting( 'split_primary_color', array(
      'default'       => $this->colors['primary-color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_primary_color',
      array(
        'label'     => __( 'Primary', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_primary_color',
        'priority'  => 20,
      )));

    /* SETTING: SECONDARY COLOR */
    $wp_customize->add_setting( 'split_secondary_color', array(
      'default'       => $this->colors['secondary-color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_secondary_color',
      array(
        'label'     => __( 'Secondary', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_secondary_color',
        'priority'  => 20,
      )));

    /* SETTING: TERTIARY COLOR */
    $wp_customize->add_setting( 'split_tertiary_color', array(
      'default'       => $this->colors['tertiary-color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_tertiary_color',
      array(
        'label'     => __( 'Tertiary', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_tertiary_color',
        'priority'  => 20,
      )));




    /* SEPARATOR: Text Colors */
    $wp_customize->add_setting( 'split_text_colors_separator', array(
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'sanitize_callback'    => 'sanitize_text_field',
      ));
    $wp_customize->add_control( new Split_Customize_Separator_Control( 
      $wp_customize,
      'split_text_colors_separator',
      array(
        'label'     => __( 'Text Colors', 'split' ),
        'section'   => 'colors',
        'priority'  => 30,
        'settings'  => 'split_text_colors_separator',
      )));

    /* SETTING: TEXT COLOR */
    $wp_customize->add_setting( 'split_text_color', array(
      'default'       => $this->colors['split_text_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_text_color',
      array(
        'label'     => __( 'Text', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_text_color',
        'priority'  => 30,
      )));

    /* SETTING: HEADING COLOR */
    $wp_customize->add_setting( 'split_heading_color', array(
      'default'       => $this->colors['split_heading_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_heading_color',
      array(
        'label'     => __( 'Heading', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_heading_color',
        'priority'  => 30,
      )));

    /* SETTING: LINK COLOR */
    $wp_customize->add_setting( 'split_link_color', array(
      'default'       => $this->colors['split_link_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_link_color',
      array(
        'label'     => __( 'Link', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_link_color',
        'priority'  => 30,
      )));





    /* SEPARATOR: Button Colors */
    $wp_customize->add_setting( 'split_button_colors_separator', array(
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'sanitize_callback'    => 'sanitize_text_field',
      ));
    $wp_customize->add_control( new Split_Customize_Separator_Control( 
      $wp_customize,
      'split_button_colors_separator',
      array(
        'label'     => __( 'Button Colors', 'split' ),
        'section'   => 'colors',
        'priority'  => 30,
        'settings'  => 'split_button_colors_separator',
      )));

    /* SETTING: BUTTON TEXT COLOR */
    $wp_customize->add_setting( 'split_button_text_color', array(
      'default'       => $this->colors['split_button_text_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_button_text_color',
      array(
        'label'     => __( 'Button Text', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_button_text_color',
        'priority'  => 30,
      )));

    /* SETTING: BUTTON BACKGROUND COLOR */
    $wp_customize->add_setting( 'split_button_background_color', array(
      'default'       => $this->colors['split_button_background_color'],
      'type'          => 'theme_mod',
      'capability'    => 'edit_theme_options',
      'transport'     => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
      ));
    $wp_customize->add_control( new WP_Customize_Color_Control( 
      $wp_customize,
      'split_button_background_color',
      array(
        'label'     => __( 'Button Background', 'split' ),
        'section'   => 'colors',
        'settings'  => 'split_button_background_color',
        'priority'  => 30,
      )));

  }






  function render_button_variant_css($variant_name, $args = array()) {
    ?>
    .button.button-<?php echo esc_attr($variant_name); ?>,
    button.button-<?php echo esc_attr($variant_name); ?>,
    input[type="submit"].button-<?php echo esc_attr($variant_name); ?>,
    input[type="reset"].button-<?php echo esc_attr($variant_name); ?>,
    input[type="button"].button-<?php echo esc_attr($variant_name); ?> {
      <?php echo !empty($args['color']) ? esc_attr( 'color: ' . $args['color'] . ';' ) : ''; ?>
      <?php echo !empty($args['background_color']) ? esc_attr( 'background-color: ' . $args['background_color'] . ';' ) : ''; ?>
      <?php echo !empty($args['border_color']) ? esc_attr( 'border-color: ' . $args['border_color'] . ';' ) : esc_attr( 'border-color: ' . $args['background_color'] . ';' ); ?>
    }
    .button.button-<?php echo esc_attr($variant_name); ?>:hover,
    button.button-<?php echo esc_attr($variant_name); ?>:hover,
    input[type="submit"].button-<?php echo esc_attr($variant_name); ?>:hover,
    input[type="reset"].button-<?php echo esc_attr($variant_name); ?>:hover,
    input[type="button"].button-<?php echo esc_attr($variant_name); ?>:hover,
    .button.button-<?php echo esc_attr($variant_name); ?>:focus,
    button.button-<?php echo esc_attr($variant_name); ?>:focus,
    input[type="submit"].button-<?php echo esc_attr($variant_name); ?>:focus,
    input[type="reset"].button-<?php echo esc_attr($variant_name); ?>:focus,
    input[type="button"].button-<?php echo esc_attr($variant_name); ?>:focus,
    .button.button-<?php echo esc_attr($variant_name); ?>:active,
    button.button-<?php echo esc_attr($variant_name); ?>:active,
    input[type="submit"].button-<?php echo esc_attr($variant_name); ?>:active,
    input[type="reset"].button-<?php echo esc_attr($variant_name); ?>:active,
    input[type="button"].button-<?php echo esc_attr($variant_name); ?>:active {
      <?php echo !empty($args['hover_color']) ? esc_attr( 'color: ' . $args['hover_color'] . ';' ) : ''; ?>
      <?php echo !empty($args['hover_background_color']) ? esc_attr( 'background-color: ' . $args['hover_background_color'] . ';' ) : ''; ?>
      <?php echo !empty($args['hover_border_color']) ? esc_attr( 'border-color: ' . $args['hover_border_color'] . ';' ) : esc_attr( 'border-color: ' . $args['hover_background_color'] . ';' ); ?>
    }
    
    <?php
  }





  function print_output_css() {
    $output = '';

    // Start output buffering
    ob_start();

    $header_textcolor_esc = esc_attr( get_theme_mod( 'header_textcolor', $this->colors['header_textcolor'] ) );
    $background_color_esc = esc_attr( get_theme_mod( 'custom-background', $this->colors['background_color'] ) );
    $header_background_color_esc = esc_attr( get_theme_mod( 'split_header_background_color', $this->colors['split_header_background_color'] ) );

    $footer_background_color_esc = esc_attr( get_theme_mod( 'split_footer_background_color', $this->colors['split_footer_background_color'] ) );
    $footer_textcolor_esc = esc_attr( get_theme_mod( 'split_footer_textcolor', $this->colors['split_footer_textcolor'] ) );
    $footer_link_color_esc = esc_attr( get_theme_mod( 'split_footer_link_color', $this->colors['split_footer_link_color'] ) );

    $primary_color_esc = esc_attr( get_theme_mod( 'split_primary_color', $this->colors['primary-color'] ) );
    $secondary_color_esc = esc_attr( get_theme_mod( 'split_secondary_color', $this->colors['secondary-color'] ) );
    $tertiary_color_esc = esc_attr( get_theme_mod( 'split_tertiary_color', $this->colors['tertiary-color'] ) );

    $text_color_esc = esc_attr( get_theme_mod( 'split_text_color', $this->colors['split_text_color'] ) );
    $heading_color_esc = esc_attr( get_theme_mod( 'split_heading_color', $this->colors['split_heading_color'] ) );
    $link_color_esc = esc_attr( get_theme_mod( 'split_link_color', $this->colors['split_link_color'] ) );

    $button_text_color_esc = esc_attr( get_theme_mod( 'split_button_text_color', $this->colors['split_button_text_color'] ) ); 
    $button_background_color_esc = esc_attr( get_theme_mod( 'split_button_background_color', $this->colors['split_button_background_color'] ) );
    
    ?>
        <?php if ( is_customize_preview() ) : ?>
        /* default text color */
        body { background-color: #<?php echo $background_color_esc; ?>; }
        <?php endif ?>
        /* default text color */
        body { color: <?php echo $text_color_esc; ?>; }
        /* header */
        .site-header { background-color: <?php echo $header_background_color_esc; ?>; }
        .site-branding .site-title,
        .site-branding .site-description,
        .site-header { color: #<?php echo $header_textcolor_esc; ?>;  }
        /* footer */
        .site-footer {
            background-color: <?php echo $footer_background_color_esc; ?>;
            color: <?php echo $footer_textcolor_esc; ?>;
        }
        .site-footer a { color: <?php echo $footer_link_color_esc; ?>; }
        /* Headings */
        h1, h2, h3, h4, h5, h6 { color: <?php echo $heading_color_esc; ?>; }
        /* Links */
        a { color: <?php echo $link_color_esc; ?>; }
        a:hover, a:focus, a:active { color: <?php echo esc_attr( split_adjust_brightness( $link_color_esc, -25 ) . (is_customize_preview() ? ' !important' : '') ); ?>; }
        /* Default Buttons */
        .button, button, input[type=submit], input[type=reset], input[type=button] {
            color: <?php echo $button_text_color_esc; ?>;
            background-color: <?php echo $button_background_color_esc; ?>;
        }
        .button:hover, button:hover, input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover,
        .button:focus, button:focus, input[type=submit]:focus, input[type=reset]:focus, input[type=button]:focus,
        .button:active, button:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:active {
            color: <?php echo $button_text_color_esc; ?>;
            background-color: <?php echo esc_attr( split_adjust_brightness( $button_background_color_esc, -25) . (is_customize_preview() ? ' !important' : '') ); ?>;
        }
        /* Color Modifiers */
        .primary-background { background-color: <?php echo $primary_color_esc; ?>; }
        .secondary-background { background-color: <?php echo $secondary_color_esc; ?>; }
        .tertiary-background { background-color: <?php echo $tertiary_color_esc; ?>; }

        <?php
          /* RENDER BUTTON VARIANTS */

          $this->render_button_variant_css(
            'primary',
            array(
              'color'                     => '#ffffff',
              'background_color'          => $primary_color_esc,
              'border_color'              => '',
              'hover_color'               => '#ffffff',
              'hover_background_color'    => split_adjust_brightness( $primary_color_esc, -25 ) . (is_customize_preview() ? ' !important' : ''),
              'hover_border_color'        => '',
            ));

          $this->render_button_variant_css(
            'secondary',
            array(
              'color'                     => '#ffffff',
              'background_color'          => $secondary_color_esc,
              'border_color'              => '',
              'hover_color'               => '#ffffff',
              'hover_background_color'    => split_adjust_brightness( $secondary_color_esc, -25 ) . (is_customize_preview() ? ' !important' : ''),
              'hover_border_color'        => '',
            ));

          $this->render_button_variant_css(
            'tertiary',
            array(
              'color'                     => '#ffffff',
              'background_color'          => $tertiary_color_esc,
              'border_color'              => '',
              'hover_color'               => '#ffffff',
              'hover_background_color'    => split_adjust_brightness( $tertiary_color_esc, -25 ) . (is_customize_preview() ? ' !important' : ''),
              'hover_border_color'        => '',
            ));
        ?>
    <?php

    // Release output buffering
    $output = ob_get_clean();

    echo '<style type="text/css">' . $output . '</style>';
  }

}





// Initialize Class
$split_customizer_color = new Split_Customizer_Colors();
