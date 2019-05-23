<?php

add_filter( 'orbit_post_type_vars', function( $post_types ){

	$post_types['statistics'] = array(
		'slug' 		=> 'statistics',
		'labels'	=> array(
			'name' 			     => 'Statistics',
			'singular_name'  => 'Statistic',
		),
		'public'	   => true,
		'supports'	 => array('title', 'editor', 'author', 'thumbnail')
	);
	/*
	$post_types['daily-digest'] = array(
		'slug' 		=> 'daily-digest',
		'labels'	=> array(
			'name' 			     => 'Daily Digests',
			'singular_name'  => 'Daily Digest',
		),
		'menu_icon'	=> 'dashicons-format-aside',
		'public'	   => true,
		'supports'	 => array('title', 'editor', 'author', 'thumbnail')
	);
	*/

	$post_types['alliance-alert'] = array(
		'slug' 		=> 'alliance-alert',
		'labels'	=> array(
			'name' 			     => 'Alliance Alerts',
			'singular_name'  => 'Alliance Alert',
		),
		'menu_icon'	=> 'dashicons-format-aside',
		'public'	   => true,
		'supports'	 => array('title', 'editor', 'author', 'thumbnail')
	);


	return $post_types;
} );
