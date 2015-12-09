<?php

// enqueue styles
if (!function_exists("theme_styles")) {
  function theme_styles() {
    // This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_register_style('style', get_stylesheet_uri(), array(), '1.0', 'all');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('dev-theme');
  }
}
add_action('wp_enqueue_scripts', 'theme_styles');
// enqueue javascript
if (!function_exists("theme_js")) {
  function theme_js() {
    wp_deregister_script('jquery');
    //wp_register_script('jquery', ("http://ajax.googleapis.com/…/libs/jquery/1.3.2/jquery.min.js"), false, '1.3.2', true);
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.2.min.js', false, '1.3.2', true);
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.0', true);
    wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.6.2-respond-1.1.0.min.js', '2.6.3');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('modernizr');
  }
}
add_action('wp_enqueue_scripts', 'theme_js');

if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails', array('post'));
  set_post_thumbnail_size(300, 300, true);
}

if (function_exists('add_image_size')) {
  add_image_size('category-thumb', 400, 9999); //300 pixels wide (and unlimited height)
  add_image_size('works-thumb', 840, 600, true); //(cropped)
  add_image_size('slider-thumb', 1280, 490, true); //(cropped)
  add_image_size('feature-thumb', 1366, 600, true); //(cropped)
  add_image_size('inner-thumb', 630, 210, true); //(cropped)
  add_image_size('news-thumb', 550, 270, true); //(cropped)
  add_image_size('articles-thumb', 130, 140, true); //(cropped)
  add_image_size('single-thumb', 885, 430, false); //(cropped)
}
/*add_filter( 'wp_trim_excerpt', 'my_custom_excerpt', 10, 2 );
function my_custom_excerpt($text, $raw_excerpt) {
  if( ! $raw_excerpt ) {
    $content = apply_filters( 'the_content', get_the_content() );
    $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
  }
  return $text;
}
*/
