<?php

function ss_theme_default_error() {
	return __('Something went wrong', 'ss-theme');
}

add_action('wp_ajax_load_more_posts', 'ss_theme_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'ss_theme_load_more_posts');


function ss_theme_load_more_posts() {
	
	check_ajax_referer( 'ajax_nonce', 'nonce' );
	
	$response = array(
		'success' => false,
		'msg' => ss_theme_default_error(),
	);
	
	$params = $_POST['params'];
	
	if( is_array($params) && $params ) {
		
		$query = ss_theme_posts_infinity_load_query( 10, $params['posts'] );	
		
		if( $query->have_posts() ){
			
			ob_start();
		
			$posts = 0;
			while( $query->have_posts() ){ 
				$query->the_post();
		
				get_template_part('template-parts/content/content', 'post');
				$posts++;
			}
			
			$response['msg'] = __('Posts successfuly loaded', 'ss-theme');
			$response['success'] = true;
			$response['posts'] = $posts;
			$response['html'] = ob_get_clean();
			
		} else {
			$response['msg'] = __('No more posts', 'ss-theme');
			$response['success'] = true;
		}
		
	} else {
		$response['msg'] = __('Wrong request', 'ss-theme');
	}
	
	wp_die(json_encode($response));
	
}