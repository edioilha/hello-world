<?php
/**
 * ContentRotator
 *
 * Helper functions that assist the ContentRotatorWidget class
 *
 * Created by PhpStorm.
 * User: edio
 * Date: 3/10/15
 * Time: 11:30 AM
 */

class ContentRotator
{
/**
 * parse
 *
 * A simple parsing function for basic templating.
 *
 * @param $tpl string A formatting string containing [+placeholders+]
 * @param $hash array An associative array containing keys and values e.g. array('key' => 'value');
 * @return string Placeholders corresponding to the keys of the hash will be replaced with the values the resulting string will be returned.
 */
    static function parse($tpl, $hash)
    {
        foreach($hash as $key => $value){
            $tpl = str_replace('[+'.$key.'+]', $value, $tpl);
        }
        return $tpl;
    }

/**
 * Fetch and return a piece of random content
 */
    static function get_random_content()
    {
        return rand(1, 1000000);
    }

/**
 * Controller that generates admin page
 */
    static function generate_admin_page()
    {
        include('admin_page.php');
    }

/**
 * Adds a menu item inside the WordPress admin
 */
    static function add_menu_item()
    {
        add_submenu_page(
            'plugins.php',                      //menu page to atach
            'Content Rotator Configuration',    //page title
            'Content Rotator',                  //menu title
            'manage_options',                   //permissions
            'content-rotation',                 //page-name used in the URL
            'ContentRotator::generate_admin_page'   //clicking callback function
        );
    }


}


/*EOF*/