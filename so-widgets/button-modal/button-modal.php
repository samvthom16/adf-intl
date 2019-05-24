<?php
/*
	Widget Name: Button Modal
	Description: Button that opens a modal box
	Author: Samuel V Thomas, Sputznik
	Author URI: https://sputznik.com
	Widget URI:
	Video URI:
*/
class Button_Modal extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'button-modal',
			// The name of the widget for display purposes.
			__('Button Modal', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Button that opens a modal box', 'siteorigin-widgets'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'modal' => array(
					'type' 	=> 'builder',
					'label' => __( 'Modal Box Content', 'siteorigin-widgets'),
				),
				'text' => array(
					'type' 	=> 'text',
					'label' => __( 'Button Text', 'siteorigin-widgets' ),
				),
			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/button-modal"
		);
	}

	function get_template_name($instance) {
		return 'template';
	}
	function get_template_dir($instance) {
		return 'templates';
	}
    function get_style_name($instance) {
        return '';
    }
}
siteorigin_widget_register('button-modal', __FILE__, 'Button_Modal');
