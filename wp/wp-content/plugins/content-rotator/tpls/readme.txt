The file called widget_controls.tpl contains the form elements necessary to edit a widget's settings. See widget_controls.tpl for more instructions on using that file.
The widget.tpl template is used to format the output of the widget as it is seen by the outside world, for example, on your homepage.
There are 4 primary built-in placeholders which are dictated by the template in use:
[+before_widget+]
[+after_widget+]
[+before_title+]
[+after_title+]
There are also placeholders corresponding to the ContentRotatorWidget::$control_options array keys. The values of these are bound to an instance of the widget, so two instances
of the same widget may have completely different values. These placeholders include:
[+seconds_shelf_life+]
[+title+]
Lastly, the most important placeholder:
[+content+] -- contains the random text as defined in the plugin's administration page
There are additional placeholders created from the widget() function's $args array, for example:
Array
(
[name] => Primary Widget Area
[id] => primary-widget-area
[description] => The primary widget area
[before_widget] => <li id="contentrotatorwidget-6" class="widget-container ContentRotatorWidget">
[after_widget] => </li>
[before_title] => <h3 class="widget-title">
[after_title] => </h3>
[widget_id] => contentrotatorwidget-6
[widget_name] => Content Rotator
)

Each key in this array corresponds to a placeholder. For example [+name+] and [+id+] are placeholders you can use in your widget.tpl file.
The documentation for the available placeholders occurs in this readme.txt file so that it does not display publicly.
