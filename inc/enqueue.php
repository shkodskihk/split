<?php
/**
 * Split Theme Enqueue scripts and styles.
 *
 * @package split
 */


/**
 * Add preconnect for Google Fonts.
 */
function split_resource_hints( $urls, $relation_type ) {
  if ( wp_style_is( 'split-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
    $urls[] = array(
      'href' => 'https://fonts.gstatic.com',
      'crossorigin',
    );
  }

  return $urls;
}
add_filter( 'wp_resource_hints', 'split_resource_hints', 10, 2 );



/**
 * Enqueue scripts and styles.
 */
function split_scripts() {

  // Fonts
  wp_enqueue_style( 'split-fonts', split_fonts_url(), array(), null );

	// Styles
	wp_enqueue_style( 'split-style', get_template_directory_uri() . '/css/theme.min.css' );

	// == Scripts
	wp_enqueue_script( 'split-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'split_scripts' );





/**
 * Registers editor styles
 */
function split_add_editor_styles() {
  add_editor_style( array( 'css/editor-style.min.css', split_fonts_url() ) );
}
add_action( 'admin_init', 'split_add_editor_styles' );





/**
 * Register custom fonts.
 */
function split_fonts_url() {
  $fonts_url = '';
  $fonts     = array();
  $subsets   = 'latin,latin-ext';

  /* 
   * Translators: If there are characters in your language that are
   * not supported by Oswald, translate this to 'off'.
   * Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'split' ) ) {
    $fonts[] = 'Oswald:400,700';
  }

  /* 
   * Translators: If there are characters in your language that are
   * not supported by Open Sans, translate this to 'off'.
   * Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'split' ) ) {
    $fonts[] = 'Open Sans:Open+Sans:400,400i,700,700i';
  }



  /* 
   * Translators: If there are characters in your language that are
   * not supported by Oxygen, translate this to 'off'.
   * Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'split' ) ) {
    $fonts[] = 'Oxygen:400,700';
  }

  /* 
   * Translators: If there are characters in your language that are
   * not supported by Source Sans Pro, translate this to 'off'.
   * Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'split' ) ) {
    $fonts[] = 'Source Sans Pro:Open+Sans:400,400i,700,700i';
  }



  if ( $fonts ) {
    $fonts_url = add_query_arg( array(
      'family' => urlencode( implode( '|', $fonts ) ),
      'subset' => urlencode( $subsets ),
    ), 'https://fonts.googleapis.com/css' );
  }

  return $fonts_url;
}




/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function split_customize_preview_js() {
  wp_enqueue_script( 'split_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'split_customize_preview_js' );
