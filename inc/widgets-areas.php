<?php
/**
 * split Widget Areas Initializations.
 *
 * @package split
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function split_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'split' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here.', 'split' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'split_widgets_init' );



/*------------------------------------*\
  #SHOP WIDGET AREAS
\*------------------------------------*/
function split_shop_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Shop Sidebar', 'split' ),
    'id'            => 'sidebar-shop',
    'description'   => __( 'Add widgets to shop sidebar here.', 'split' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'split_shop_widgets_init' );



/*------------------------------------*\
  #FOOTER WIDGET AREAS
\*------------------------------------*/
function split_footer_widgets_init() {

  /* #FOOTER WIDGETS 1 COLUMN */
  register_sidebar( array(
    'name'          => __( 'Footer Single', 'split' ),
    'id'            => 'split_footer_single',
    'description'   => __( 'Widgets for one column footer.', 'split' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );


  /* #FOOTER WIDGETS 3 COLUMNS */
  register_sidebar( array(
    'name'          => __( 'Footer Left', 'split' ),
    'id'            => 'split_footer_left',
    'description'   => __( 'Widgets for left column on three columns footer.', 'split' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Center', 'split' ),
    'id'            => 'split_footer_center',
    'description'   => __( 'Widgets for center column on three columns footer.', 'split' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Right', 'split' ),
    'id'            => 'split_footer_right',
    'description'   => __( 'Widgets for right column on three columns footer.', 'split' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

}
add_action( 'widgets_init', 'split_footer_widgets_init', 1000);
