<?php


define('IMG_DIR', get_template_directory_uri() . '/assets/images/');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
require get_template_directory() . '/inc/defaults.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Fake post maker
 */
require get_template_directory() . '/inc/faker.php';

/**
 * Ajax functions.
 */
require get_template_directory() . '/inc/queries.php';


/**
 * Ajax functions.
 */
require get_template_directory() . '/inc/ajax.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

