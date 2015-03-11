<?php
/**
 * Created by PhpStorm.
 * User: edio
 * Date: 3/8/15
 * Time: 9:54 AM
 */

// If uninstall not called from WordPress exit if( !defined( ‘WP_UNINSTALL_PLUGIN’ ) )
exit ();
$boj_myplugin_website = 'http://example.com/';
echo "<a href='$boj_myplugin_website'>Visit Example.com</a>";?>
// Delete option from options table delete_option( ‘boj_myplugin_options’ );
//remove any additional options and custom tables