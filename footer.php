<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package split
 */

?>

	</div><!-- #content -->


  <footer id="colophon" class="site-footer" role="contentinfo">
    <?php $container_class = get_theme_mod( 'split_footer_container_class', true ) ? 'container' : '' ?>
    <div class="site-footer__content <?php echo esc_attr( $container_class ); ?>">
      
      <?php if ( is_active_sidebar( 'split_footer_single' ) ) : ?>
      <div class="row">
        <div class="site-footer__single vertical-padding-bottom">
          <?php dynamic_sidebar( 'split_footer_single' ); ?>
        </div><!-- .footer-single -->
      </div>
      <?php endif; ?>

      <?php if ( is_active_sidebar( 'split_footer_left' ) 
                  || is_active_sidebar( 'split_footer_center' )
                  || is_active_sidebar( 'split_footer_right' ) ) : ?>
      <div class="row">
        <div class="site-footer__left four columns vertical-padding-bottom">
        <?php if ( is_active_sidebar( 'split_footer_left' ) ): ?>
            <?php dynamic_sidebar( 'split_footer_left' ); ?>
        <?php endif; ?>
        </div>  

        <div class="site-footer__center four columns vertical-padding-bottom">
        <?php if ( is_active_sidebar( 'split_footer_center' ) ): ?>
            <?php dynamic_sidebar( 'split_footer_center' ); ?>
        <?php endif; ?>
        </div>  

        <div class="site-footer__right four columns vertical-padding-bottom">
        <?php if ( is_active_sidebar( 'split_footer_right' ) ): ?>
            <?php dynamic_sidebar( 'split_footer_right' ); ?>
        <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>

      <div class="row">
        <div class="site-info">
          <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'split' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'split' ), 'WordPress' ); ?></a>
          <span class="sep"> | </span>
          <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'split' ), __( 'Split' , 'split'), __( '<a href="http://getunderskeleton.com" rel="designer">getunderskeleton.com</a>' , 'split') ); ?>
        </div><!-- .site-info -->
      </div><!-- .row -->

    </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
