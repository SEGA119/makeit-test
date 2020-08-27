<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'ss_theme_setup' ) ) :
	function ss_theme_setup() {

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'ss-theme' )
		) );

	}
endif; 
add_action( 'after_setup_theme', 'ss_theme_setup' );

/**
 * Register widget area.
 */
function ss_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'ss-theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ss-theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ss_theme_widgets_init' );

/**
 * JavaScript Detection.
 */
function ss_theme_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'ss_theme_javascript_detection', 0 );