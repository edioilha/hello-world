<?php
/**
 * Created by PhpStorm.
 * User: edio
 * Date: 3/9/15
 * Time: 5:30 PM
 */

/*------------------------------------------------------------------------------
Plugin Name: Content Rotator
Plugin URI: http://www.tipsfor.us/
Description: Sample plugin for rotating chunks of custom content.
Author: Everett Griffiths
Version: 0.1
Author URI: http://www.tipsfor.us/
------------------------------------------------------------------------------*/
// include() or require() any necessary files here...
include_once('includes/ContentRotatorWidget.php');

// Tie into WordPress Hooks and any functions that should run on load.
add_action('widgets_init', 'ContentRotatorWidget::register_this_widget');

/* EOF */
