<?php 

if( !function_exists('ss_theme_load_fake_posts') ):

add_action('wp_loaded', 'ss_theme_load_fake_posts');

function ss_theme_load_fake_posts() {
		
	if( get_option('ss_theme_fake_posts_loaded') )
		return FALSE;
		
	$final_posts_count = 50;
	$posts_count = wp_count_posts()->publish;
		
	$need_to_load_count = $final_posts_count - $posts_count;
		
	if( $need_to_load_count > 0 ) {
		
		$fake_posts = file_get_contents('http://jsonplaceholder.typicode.com/posts');
		$fake_posts = json_decode($fake_posts, TRUE);
				
		$fake_thumbnail_id = ss_theme_save_image_from_url('https://via.placeholder.com/400x300.jpg');

		while( $need_to_load_count ) {

			$post_id = wp_insert_post( array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'post_title' => isset( $fake_posts[$need_to_load_count]['title'] ) ? $fake_posts[$need_to_load_count]['title'] : 'Lorem ipsum',
				'post_content' => isset( $fake_posts[$need_to_load_count]['body'] ) ? $fake_posts[$need_to_load_count]['body'] : 'Lorem ipsum dolor sir amet.'
			));		

			if( $fake_thumbnail_id ) {
				set_post_thumbnail( $post_id, $fake_thumbnail_id );				
			}
			
			$need_to_load_count--;
			
		}
		
		update_option('ss_theme_fake_posts_loaded', TRUE);
	}
	
}

endif;



if( !function_exists('ss_theme_save_image_from_url') ):

function ss_theme_save_image_from_url($url) {
	
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');		

    $tmp = download_url( $url );

    $file_array = array(
        'name' => basename( $url ),
        'tmp_name' => $tmp
    );

    /**
     * Check for download errors
     * if there are error unlink the temp file name
     */
    if ( is_wp_error( $tmp ) ) {
        @unlink( $file_array[ 'tmp_name' ] );
        return FALSE;
    }

    $id = media_handle_sideload( $file_array, '0' );

    if ( is_wp_error( $id ) ) {
        @unlink( $file_array['tmp_name'] );
        return FALSE;
    }

    /**
     * Get the url of the sideloaded file
     */
    $value = wp_get_attachment_url( $id );

	// Now you can do something with $value (or $id)

    return $id;

}

endif;

