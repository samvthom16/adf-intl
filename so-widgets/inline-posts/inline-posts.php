<?php
/*
	Widget Name: Inline Posts
	Description: Inline posts that can be displayed in a grid
	Author: Samuel V Thomas, Sputznik
	Author URI: https://sputznik.com
	Widget URI:
	Video URI:
*/
class Inline_Posts extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'inline-posts',
			// The name of the widget for display purposes.
			__('Inline Posts', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Inline posts that can be displayed in a grid', 'siteorigin-widgets'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(

				'posts' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Posts Section' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Post', 'siteorigin-widgets' ),
					'fields' => array(
						'content' => array(
							'type' 	=> 'builder',
							'label' => __( 'Post Content', 'siteorigin-widgets'),
						),
						'title' => array(
							'type' 	=> 'text',
							'label' => __( 'Post Title', 'siteorigin-widgets' ),
						),
						'excerpt' => array(
							'type' 	=> 'textarea',
							'label' => __( 'Post Excerpt', 'siteorigin-widgets' ),
						),
						'image' => array(
			        'type' => 'media',
			        'label' => __( 'Choose a media thing', 'widget-form-fields-text-domain' ),
			        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
			        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
			        'library' => 'image',
			        'fallback' => true
			    	)
					)
				),
				'height' => array(
					'type' 		=> 'text',
					'label' 	=> __( 'Column Height', 'siteorigin-widgets' ),
					'default'	=> '250px'
				),
			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/inline-posts"
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
siteorigin_widget_register('inline-posts', __FILE__, 'Inline_Posts');
