<?php
/**
 * Split Theme Customizer.
 *
 * @package split
 */

/*------------------------------------*\
  #CUSTOM SANITIZERS
\*------------------------------------*/
function split_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}





/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function split_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'split_customize_register' );





/*------------------------------------*\
  #HOMEPAGE
\*------------------------------------*/
function split_static_front_page_customizer( $wp_customize ) {

    /* SETTING: SHOW HOMEPAGE CONTENT */
    $wp_customize->add_setting( 'split_show_homepage_content', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'split_sanitize_checkbox',
        ));
    $wp_customize->add_control( 'split_show_homepage_content', array(
        'label'     => __( 'Show Homepage Content (DEPRECATED)', 'split' ),
        'description' => __( 'Show the content of the page selected as <code>Static Homepage</code>. The homepage supports adding widgets in the content area. We recommend using the plugin "Customizer Building Blocks" to create your homepage.', 'split' ),
        'section'   => 'static_front_page',
        'type'      => 'checkbox',
        'default'   => true
        ));

}
add_action('customize_register', 'split_static_front_page_customizer');





/*------------------------------------*\
  #PAGE SETTINGS
\*------------------------------------*/
function split_page_settings_customizer( $wp_customize ) {

    /* SECTION: PAGE SETTINGS */
    $wp_customize->add_section( 'split_page_settings_section' , array(
        'title'       => __( 'Page Settings', 'split' ),
        'description' => __( 'Configure how pages are displayed.', 'split' ),
        ));

    /* SETTING: LIMIT HEADER TO CONTAINER */
    $wp_customize->add_setting( 'split_header_container_class', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'split_sanitize_checkbox',
        ));
    $wp_customize->add_control( 'split_header_container_class', array(
        'label'     => __( 'Limit header content to container', 'split' ),
        'section'   => 'split_page_settings_section',
        'type'      => 'checkbox',
        'default'   => true
        ));

    /* SETTING: LIMIT CONTENT TO CONTAINER */
    $wp_customize->add_setting( 'split_content_container_class', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'split_sanitize_checkbox',
        ));
    $wp_customize->add_control( 'split_content_container_class', array(
        'label'     => __( 'Limit content to container', 'split' ),
        'section'   => 'split_page_settings_section',
        'type'      => 'checkbox',
        'default'   => true
        ));

    /* SETTING: LIMIT FOOTER TO CONTAINER */
    $wp_customize->add_setting( 'split_footer_container_class', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'split_sanitize_checkbox',
        ));
    $wp_customize->add_control( 'split_footer_container_class', array(
        'label'     => __( 'Limit footer content to container', 'split' ),
        'section'   => 'split_page_settings_section',
        'type'      => 'checkbox',
        'default'   => true
        ));

}
add_action('customize_register', 'split_page_settings_customizer');
