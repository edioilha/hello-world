<?php
/**
 * Created by PhpStorm.
 * User: edio
 * Date: 2/27/15
 * Time: 1:53 PM
 */

/* Information Header Goes here */

/*
Plugin Name: Digg This
Plugin URI: http://wordpress.org/
Description: Digg Plugin
Author: Edio Ilha
Version: 1.0
Author URI: http://wordpress.org
*/

// include() or require() any necessary files here...
// Settings and/or Configuration Details go here...
// Tie into WordPress Hooks and any functions that should run on load.
// "Private" internal functions named with a leading underscore

function _diggthis_get_post_description() { }
function _diggthis_get_post_media_type() { }
function _diggthis_get_post_title() { }
function _diggthis_get_post_topic() { }
function _diggthis_get_post_url() { }

// The "Public" functions
function diggthis_add_js_to_doc_head() {
    echo $src = plugins_url('digg.js',__FILE__);
    //wp_register_script('diggthis', $src);
    //wp_enqueue_script ('diggthis');
}
add_action('init','diggthis_add_js_to_doc_head');

function diggthis_check_wordpress_version() { }
function diggthis_get_button() { }


/* EOF */
