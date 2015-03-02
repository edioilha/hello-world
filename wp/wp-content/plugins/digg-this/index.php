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
define ('DIGGTHIS_BUTTON_TEMPLATE',
        '<a class="DiggThisButton DiggMedium" href="http://digg.com/submit?url=%s&amp;title=%s" rev="%s, %s">
        <span style="display:none">%s </span></a>');
define ('DIGGTHIS_DEFAULT_TOPIC','tech_news');
define('DIGGTHIS_MIN_WORDPRESS_VERSION', '3.0');

// Tie into WordPress Hooks and any functions that should run on load.

// "Private" internal functions named with a leading underscore
/**
 * Gets a short description/excerpt of the post from the content.
 *
 * @return   string   stripped of html tags and shortcodes.
 */
function _diggthis_get_post_description() {
    $excerpt        = get_the_content();
    $excerpt        = strip_shortcodes($excerpt);
    $excerpt        = strip_tags($excerpt);
    $excerpt        = substr($excerpt, 0, 350);
    $words_array    = explode(' ',$excerpt);
    $word_cnt      = count($words_array);
    return implode(' ', array_slice($words_array, 0, $word_cnt -1));
}

/**
 * Get the media type for the current post
 *
 * @return   string   a valid media type: news, image, or video.
 */
function _diggthis_get_post_media_type() {
    return 'news';
}

/**
 * Gets the title of the current post.
 *
 * @return   string   the title of the current post.
 */
function _diggthis_get_post_title() {
    $id = get_the_ID();
    return get_the_title($id);
}

/**
 * Checks current post categories to see if any WP Category is a viable
 *   Digg topic; if yes, return the first match. Otherwise, the
 *   DIGGTHIS_DEFAULT_TOPIC will be returned.
 *
 * @return   string   a viable Digg topic.
 */
function _diggthis_get_post_topic() {
    $digg_topics_array = array(
        'arts_culture','autos','baseball','basketball','business_finance',
        'celebrity','comedy','comics_animation','design','educational',
        'environment','extreme_sports','food_drink','football','gadgets',
        'gaming_news','general_sciences','golf','hardware','health',
        'hockey','linux_unix','microsoft','mods','motorsport',
        'movies','music','nintendo','odd_stuff','olympics','other_sports',
        'pc_games','people','pets_animals','playable_web_games','playstation',
        'political_opinion','politics','programming','security','soccer',
        'software','space','tech_news','television','tennis','travel_places',
        'world_news','xbox'
    );
    $category_array = get_categories();
    foreach ( $category_array as $cat ) {
        // WP replaces spaces w '-', whereas Digg uses '_'
        $category_name = preg_replace('/ \-/','_',$cat->category_nicename);
         if ( in_array ( $category_name, $digg_topics_array ) ) {
             return $category_name;
         }
    }
    //if no match, then fall to the default
    return DIGGTHIS_DEFAULT_TOPIC;
}

/**
 * Gets the URL of the current post.
 *
 * @return   string   the URL of the current post.
 */
function _diggthis_get_post_url() {
    return "http://www.tipsfor.us/";
    global $post;
    print_r($post); exit;
    //return get_permalink($post->ID);
}
add_action('init', '_diggthis_get_post_url');

// The "Public" functions
function diggthis_add_js_to_doc_head() {
    $src = plugins_url('digg.js',__FILE__);
    wp_register_script('diggthis', $src);
    wp_enqueue_script ('diggthis');
}
add_action('init','diggthis_add_js_to_doc_head');

/**
 * Checks that the current version of WordPress is current enough.
 *
 * @return none exit on fail.
 */
function diggthis_check_wordpress_version() {
    global $wp_version;
    //print_r($wp_version);
    $exit_msg = '"Digg This" requires WordPress '. DIGGTHIS_MIN_WORDPRESS_VERSION
    .' or newer <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
    if(version_compare($wp_version, DIGGTHIS_MIN_WORDPRESS_VERSION,'<')){
        exit($exit_msg);
    }
}
add_action('init', 'diggthis_check_wordpress_version');

/**
 * Adds a "Digg This" link to the post content.
 *
 * @param     string   $content   the existing post content
 * @return   string   appends a DiggThis link to the incoming $content.
 */
function diggthis_get_button($content) {
    $url    = urlencode( _diggthis_get_post_url() );
    $title      = urlencode( _diggthis_get_post_title() );
    $description   = _diggthis_get_post_description();
    $media_type   = _diggthis_get_post_media_type();
    $topic      = _diggthis_get_post_topic();
    return $content . sprintf(
        DIGGTHIS_BUTTON_TEMPLATE,
        $url,
        $title,
        $media_type,
        $topic,
        $description);
}
add_filter('content', '_diggthis_get_post_url');



/* EOF */
