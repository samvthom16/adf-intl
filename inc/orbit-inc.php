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

	return $post_types;
} );
