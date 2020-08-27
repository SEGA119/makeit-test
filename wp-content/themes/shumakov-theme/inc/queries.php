<?php

function ss_theme_posts_infinity_load_query( $posts_per_page = 10, $offset = 0 ) {
	
	return new WP_Query(array(
		'post_status' => 'publish',
		'post_type' => 'post',
		'posts_per_page' => $posts_per_page,
		'offset' => $offset,
	));
	
}