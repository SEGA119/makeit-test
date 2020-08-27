<?php

/**
 * Enqueue scripts and styles.
 */

function ss_theme_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'google-fonts-style', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;800&display=swap' );
	wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/assets/styles/style.min.css' );
	wp_enqueue_style( 'ss-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ss-theme-script', get_template_directory_uri() . '/assets/scripts/build.min.js', '1.0', TRUE, TRUE );
  
	wp_localize_script( 'ss-theme-script', 'globals', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('ajax_nonce'),
	) );
}

add_action( 'wp_enqueue_scripts', 'ss_theme_scripts' );