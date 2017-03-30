<?php
/**
 * Split Theme Enqueue scripts and styles.
 *
 * @package split
 */

/**
 * Enqueue scripts and styles.
 */
function split_scripts() {

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
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function split_customize_preview_js() {
  wp_enqueue_script( 'split_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'split_customize_preview_js' );



/**
 * Registers an editor stylesheet for the current theme.
 */
function split_add_editor_styles() {
  // Load 'theme.min.css' as most of it is necessary for editor as well.
  add_editor_style( array( 'css/editor-style.min.css', 'css/theme.min.css' ) );
}
add_action( 'admin_init', 'split_add_editor_styles' );
