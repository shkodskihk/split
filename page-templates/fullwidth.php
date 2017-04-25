<?php
/**
 * Template Name: Full-width
 *
 * Template for displaying pages without sidebar.
 *
 * @package split
 */

get_header(); ?>

<?php if ( !is_front_page() || get_theme_mod( 'split_show_homepage_content', true ) ) : ?>
  <div id="primary" class="content-area full-width">
    <main id="main" class="site-main" role="main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

      endwhile; // End of the loop.
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php endif; ?>

<?php get_footer(); ?>
