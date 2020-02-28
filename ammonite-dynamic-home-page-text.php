<?php
/**
 * Plugin Name:       Ammonite Dyanmic Home Page Text
 * Description:       Adds animated text template to new home page using the shortcode [ammonite_dyanmic_home_page_text].
 * Version:           1.0.0
 * Author:            Daniel Ellis
 * Author URI:        https://danielellisdevelopment.com/
 */

/*
  Basic Security
*/
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

/*
  Plugin Base Class
*/
if ( !class_exists( 'Ammonite_Dyanmic_Home_Page_Text' ) ) {
  class Ammonite_Dyanmic_Home_Page_Text {
    // Add class methods here
    public static function example_register_styles_and_scripts() {
      add_action( 'wp_enqueue_scripts', function() {
        // Remove jQuery dependency if unnecessary
        wp_register_script( 'ammonite-dynamic-text-template-script', plugins_url('assets/js/ammonite-dynamic-home-page-text.js', __FILE__ ), array('jquery'), '1.0.0', true );
        wp_register_style( 'ammonite-dynamic-text-template-styles', plugins_url('assets/css/ammonite-dynamic-home-page-text.css', __FILE__ ), array(), '1.0.0', 'all' );
      } );
    }

    public static function add_dynamic_text_template_shortcode() {
      // Use [Ammonite_Dyanmic_Home_Page_Text_example_shortcode] to call this shortcode
      add_shortcode( 'ammonite_dyanmic_home_page_text', array( 'Ammonite_Dyanmic_Home_Page_Text', 'dynamic_text_template_shortcode_callback' ) );
    }

    public static function dynamic_text_template_shortcode_callback() {
      // Associated scripts and styles enqueued here for improved performance
      wp_enqueue_script( 'ammonite-dynamic-text-template-script' );
      wp_enqueue_style( 'ammonite-dynamic-text-template-styles' );

      include( 'templates/ammonite-dyanmic-home-page-text-tempate.php' );
    }
  }

  // Call methods on load here
  Ammonite_Dyanmic_Home_Page_Text::example_register_styles_and_scripts();
  Ammonite_Dyanmic_Home_Page_Text::add_dynamic_text_template_shortcode();
}
