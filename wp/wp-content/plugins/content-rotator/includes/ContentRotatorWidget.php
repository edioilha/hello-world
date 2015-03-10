<?php
/**
 * ContentRotatorWidget extends WP_Widget
 *
 * This implements a WordPress widget designed to randomize chunks of content.
 *
 * Created by PhpStorm.
 * User: edio
 * Date: 3/9/15
 * Time: 5:33 PM
 */
class ContentRotatorWidget extends WP_Widget
{
    public $name = 'Content Rotator';
    public $widget_desc = 'Rotates chunk of contents on a periodic basis';

    /* List all controllable options here along with a default value. The values can be distinct for each instance of the widget. */
    public $control_options = array(
        'title' => 'Content Rotator',
        'seconds_shelf_life' => 86400 //86400 seconds in a day
    );

    /* !!Magic Functions */
    // The constructor
    function __construct()
    {
        $widget_options = array(
            'class_name'    => __CLASS__,
            'description'   => $this->widget_desc

        );
        parent::__construct(__CLASS__, $this->name, $widget_options, $this->control_options);

    }

    //static function
    static function register_this_widget()
    {
        register_widget(__CLASS__);
    }

/**
 * Displays content to the front-end using the tpls/widget.tpl template.
 *
 * @param array $args Display arguments
 * @param array $instance The settings for the particular instance of the widget
 * @return none No direct output. This should instead print output directly.
 */
    function widget($args, $instance)
    {
        //$placeholders['content'] = ContentRotator::get_random_content();

        if(!isset($instance['manufacture_date'])
            || time() >= ($instance['manufacture_date'] + $instance['seconds_shelf_life']))
        {
            $instance['content'] = ContentRotator::get_random_content($instance);
            $instance['manufacture_date'] = time();
            $all_instances = $this->get_settings();
            $all_instances[$this->number] = $instance;
            $this->save_settings($all_instances);
        }

        $placeholders = array_merge($args, $instance);
        $tpl = file_get_contents(dirname(dirname(__FILE__)).'/tpls/widget.tpl');
        print ContentRotator::parse($tpl, $placeholders);
    }

/**
 * Displays the widget form in the manager, used for editing its settings
 *
 * @param array $instance The settings for the particular instance of the widget
 * @return none No value is returned directly, but form elements are printed.
 */
    function form($instance)
    {
        $placeholders = array();
        foreach($this->control_options as $key => $val){
            $placeholders[$key.'.id'] = $this->get_field_id($key);
            $placeholders[$key.'.name'] = $this->get_field_name($key);
            // This helps us avoid "Undefined index" notices.
            if(isset($instance[$key])){
                $placeholders[$key.'.value'] =  esc_attr($instance[$key]);

            }else{ // Use the default (for new instances)
                $placeholders[$key.'.value'] = $this->control_options[$key];
            }
        }

        $tpl = file_get_contents(dirname(dirname(__FILE__)).'/tpls/widget_controls.tpl');
        print ContentRotator::parse($tpl, $placeholders);
    }

}

/*EOF*/