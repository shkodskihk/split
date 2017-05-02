<?php

if ( !class_exists( 'WP_Customize_Control' ) ) {
  return NULL;
}



/**
 * A class to create a dropdown for all google fonts
 */
class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control
{
  private $fonts = false;

  public function __construct( $manager, $id, $args = array(), $options = array() ) {
    $this->fonts = $this->get_fonts();
    parent::__construct( $manager, $id, $args );
  }

  /**
   * Render the content of the category dropdown
   *
   * @return HTML
   */
  public function render_content() {
    if( !empty( $this->fonts ) ) {
      ?>
        <label>
          <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
          <select <?php $this->link(); ?>>
            <?php
              var_dump( $this->fonts );
              foreach ( $this->fonts as $k => $v ) {
                printf('<option value="%s" %s>%s</option>', $k, selected($this->value(), $k, false), $v->family);
              }
            ?>
          </select>
        </label>
      <?php
    }
  }





  /**
   * Get the google fonts from the API or in the cache
   *
   * @param  integer $amount
   *
   * @return String
   */
  public function get_fonts( $amount = 30 ) {
    $cache_file = get_template_directory() . '/inc/bones/customizer-google-fonts/inc/cache/google-web-fonts.json';

    //Total time the file will be cached in seconds, set to a week
    $cachetime = 604800;

    if ( !file_exists( $cache_file ) || (time() - filemtime( $cache_file )) >= $cachetime ) {
      $content = $this->get_fonts_from_api( $cache_file );
    }

    // get content from file if cache is valid or in case of error
    if ( !isset( $content ) || isset( $content->error ) ) {
      $content = json_decode( file_get_contents( $cache_file ) );
    }

    if ( $amount == 'all' ) {
      return $content->items;
    }
    else {
      return array_slice( $content->items, 0, $amount );
    }
  }





  function get_fonts_from_api( $cache_file ) {
    // Google Fonts API Key
    // Get one for your theme at:
    // https://developers.google.com/fonts/docs/developer_api
    $google_fonts_api_key = 'AIzaSyDqY4eWRXgw0MGbXS_P6mlK6hjP1akK_eo';
    $google_fonts_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=' . $google_fonts_api_key;

    $api_result = wp_remote_get( $google_fonts_api_url, array('sslverify' => false ) );
    $content = json_decode( $api_result['body'] );

    if ( isset( $content->error ) ) {
      trigger_error("Google Fonts: {$content->error->message}", E_USER_WARNING);
    }
    else {
      $fp = fopen( $cache_file, 'w' );
      fwrite( $fp, $api_result['body'] );
      fclose( $fp );
    }

    return $content;
  }



}
