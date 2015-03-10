<?php
/**
 * This file is an independent controller, used to query the WordPress database
 * and provide search results for Ajax requests.
 *
 * @return string Either return nothing (i.e. no results) or return some formatted results.
 */
if (!defined('WP_PLUGIN_URL')) {
    require_once( realpath('../../../').'/wp-config.php' );
}

if(empty($_GET['s'])){
    exit;
}

$max_posts = 3;
$WP_Query_Object = new WP_Query();
$WP_Query_Object->query(array('s' => $_GET['s'] , 'showposts' => $max_posts));

if(!$WP_Query_Object->posts){
    print file_get_contents('tpls/no_results.tpl');
    exit;
}

$container  = array('content' => '');
$single_tpl = file_get_contents('tpls/single_result.tpl');

foreach($WP_Query_Object->posts as $result){
    $result->permalink = get_permalink($result->ID);
    $container['content'] .= parse($single_tpl, $result);

}

$results_container_tpl = file_get_contents('tpls/results_container.tpl');
print parse($results_container_tpl, $container);

/**
 * parse
 *
 * A simple parsing function for basic templating.
 *
 * @param $tpl string A formatting string containing [+placeholders+]
 * @param $hash array An associative array containing keys and values e.g. array('key' => 'value');
 * @return string Placeholders corresponding to the keys of the hash will be replaced with the values the resulting string will be returned.
 */
function parse($tpl, $hash){
    foreach($hash as $key => $value){
        //print_r($hash); exit;
        $tpl = str_replace('[+'.$key.'+]', $value, $tpl);
    }
    return $tpl;
}

//foreach($WP_Query_Object->posts as $result){
//    print_r($result);
//}

/* EOF */
