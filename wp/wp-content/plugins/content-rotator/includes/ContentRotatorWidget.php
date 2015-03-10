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
    public $control_options = array();

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

}

/*EOF*/