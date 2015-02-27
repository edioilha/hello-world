<?php
/**
 * @package My WP Plugin
 * @version 1.0.0
 */
/*
Plugin Name: My WP Plugin
Plugin URI: http://wordpress.org/
Description: This is just my first plugin test
Author: Edio Ilha
Version: 1.0
Author URI: http;//wordpress.org/
*/

/**
 * Created by PhpStorm.
 * User: edio
 * Date: 2/26/15
 * Time: 11:35 AM
 */

add_shortcode('twitter', function($atts, $content){
    //print_r($content); die();
    $atts = shortcode_atts(
      array(
          'username' => 'edioilha',
          'content'  => !empty($content) ? $content : 'Me segue no Twitter!'
      ), $atts
    );

    extract($atts);

    if(!isset($atts['username'])) $atts['username'] = 'edioilha';
    return "<a href='http://twitter.com/$username'>$content</a>";
});
